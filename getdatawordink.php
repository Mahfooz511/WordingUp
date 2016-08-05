<?php 
	require('./wordnik/Swagger.php');

	$time_start = microtime(true); 
	//echo	"Your Text is:   ";
	//echo  $_POST["text"] ; 
	$textinput = trim($_POST["textinput"]) ;
	//$textinput = "this is my test result" ;

	$client_ip = $_SERVER['REMOTE_ADDR'];
	$user_agent =  $_SERVER['HTTP_USER_AGENT'];
	$client_os = getOS() ;
	//	$client_browser = get_browser();
	$client_browser = getBrowser();
	$today_date = date("Ymd"); // 20141023

	//echo $textinput ;
	write_log("STARTING");
	write_log("DATE : $today_date");
	write_log("CLIETNT IP =>$client_ip");
	write_log("CLIENT OS : $client_os");
	write_log("CLIENT BROWSER : $client_browser");

	//remove punctuations
	$texttemp = remove_punctuation($textinput);
	//$texttemp = remove_singleword($texttemp);
	$texttemp = remove_articles($texttemp);
	$texttemp = remove_numbers($texttemp) ;
	$texttemp = remove_specialchars($texttemp) ;

	// words in an array
	//$wordlist = array_unique(explode(" ", $texttemp));
	$wordlist = preg_split("/[\s,]+/",strtolower($texttemp), -1, PREG_SPLIT_NO_EMPTY) ;
	
	//load synonyms from local file
	$local_syn_array = array();
	$locallist = array_merge(file("./data/staticwordlist8k.txt"), file("./data/wordcache.txt")) ;
	for($count=0; $count<= count($locallist)-1; $count++){
		list($arrkey, $arraynlist) = explode(":", $locallist[$count]);
		$local_syn_array[$arrkey] = explode(",", trim($arraynlist));
	}

	
//write_log("Before loop of get_syn_wordnik");
	$cachecount = 0;
	$wordnik_total_time = 0 ;
	for ($count=0; $count<= count($wordlist)-1; $count++) {
		if (array_key_exists($wordlist[$count], $local_syn_array)) {
			if($local_syn_array[$wordlist[$count]][0] === '' ) continue ; 
			$wordsynarray[$wordlist[$count]] = $local_syn_array[$wordlist[$count]] ;
			write_log("   FOUND LOCALLY ===>$wordlist[$count] ") ;
			continue;
		}
		$wordnik_time_start = microtime(true); 
  		$syn_list = get_syn_wordnik($wordlist[$count]) ;
  		$wordnik_total_time = $wordnik_total_time + (microtime(true) - $wordnik_time_start) ;
  		$todays_cache[$cachecount++] = "$wordlist[$count]:" . implode(",", $syn_list) . "\n"; 
  		if(is_null($syn_list)) continue ; 
  		$wordsynarray[$wordlist[$count]] = $syn_list ;
	} //end of for loop	
	
//write_log("After loop of get_syn_wordnik");
	write_log("Wordnik total time taken: " . $wordnik_total_time) ;


	$synonyms = get_synonyms_json($wordsynarray) ; 
	$htmltext = get_html($textinput,$wordsynarray) ;  
	$syn_count = count($wordsynarray) ;
	$time_end = microtime(true);
	$process_time = $time_end - $time_start;

	$output = create_json_string($htmltext,$synonyms,$syn_count,$process_time,$language); 
	$output = str_replace(array("\r\n", "\n", "\r"), '', $output);

	echo $output ;	

	//write_log("$output");

	file_put_contents("./data/wordcache.txt", $todays_cache, FILE_APPEND | LOCK_EX);

	write_log("FINISHED\n");


/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////	
	function remove_punctuation($text) {
		$text = preg_replace("#[[:punct:]]#", " ", $text);
		return $text;
	}

	// single or double character word remove
	function remove_singleword($text) {
		$your_desired_array = array_filter($text, "less_than_three"); 
		return $your_desired_array;
	}
	function less_than_three($word) {
    		return strlen($word) < 3; 
	}
	function remove_articles ($texttemp) {
		$whatToStrip = array(" a "," an "," the "," A "," AN "," The ", " on ", " at "); // Add what you want to strip in this array
		return str_replace($whatToStrip, " ", $texttemp);

	}
	function remove_numbers($texttemp){
		return preg_replace("/[0-9]/", " ", $texttemp);
	}

	// like double space and other characters
	function remove_specialchars($texttemp){
		$texttemp = preg_replace('/\s+/', ' ',$texttemp); //remove whitespace (space, tabs, newline)
		return $texttemp ;
	}

	function get_syn_wordnik($word){
		$myAPIKey = 'a7cc8f936ad50f6ea100f01558a0562d20faf1fedfbf345ed';
		$client = new APIClient($myAPIKey, 'http://api.wordnik.com/v4');
		$wordApi = new WordApi($client);
		//write_log("Call wordink start - $word");
		write_log("   WORDNIK QUERYING ===>$word");
		$synobject = $wordApi->getRelatedWords($word, 'synonym', 'false', 10) ;
		//write_log("Call wordink END ");

		//foreach ($synobject[0]->{"words"} as $key => $value) {
		//	$myarray[$key] = $value ;
		//	echo "<br >$key  $value";
		//}
		//echo "<br> SERVER OK";
		return ($synobject[0]->{"words"}) ;
	}

	function get_synonyms_json($mysynarray) {
		$result = "" ;
		$count = 0;
		foreach ($mysynarray as $key => $value) {
			$myword = '"w' . $count . '": "' ;
		//"w2": "notice, plant, playbill, application"

			$myword = $myword . $key . ', ' ;
			foreach($value as $mykey){
				$myword = $myword . $mykey . ', ' ;
			}
			$myword = trim($myword, ", ") . '"' ;
			$count++ ;
			$result = $result . ', ' . $myword;
		}
		//write_log("GETSYNONYMJSON ==>" . trim($result,', '));
		return trim($result,', ') ;
	}
	/*function get_synonyms_json($mysynarray) {
		$result = "" ;
		$count = 0;
		foreach ($mysynarray as $key => $value) {
			$myword = '"w' . $count . '": "' ;
			foreach($value as $mykey){
				$myword = $myword . $mykey . ', ' ;
			}
			$myword = trim($myword, ", ") . '"' ;
			$count++ ;
			$result = $result . ', ' . $myword;
		}
		return trim($result,', ') ;
	}*/

	function get_html($textinput,$wordsynarray){
		$textinput = addcslashes($textinput, '"\\/');

		$count = 0;
		foreach ($wordsynarray as $key => $value) {
			$pattern = "/\b($key)\b/i" ;
			//$replacement = '<a href=\"#w' . $count . '\" rel=\"#w' . $count . '\">$1<\/a>' ; 
			$replacement = '<u><a href=\"#w' . $count . '\" rel=\"#w' . $count . '\">$1<\/a></u>' ; 
			$textinput = preg_replace ($pattern, $replacement, $textinput);
			$count++ ;
		}
		return $textinput ;
	}

	function create_json_string($htmltext,$synonyms,$syn_count,$process_time,$language) {
		$result =  '{ "html": "' . nl2br($htmltext) . '", ' . '"synonyms": { ' ;
		$result = $result .  $synonyms . '},' ;
		$result =  $result . '"syn_count": "' . $syn_count . '",' ;
		$result =  $result . '"process_time": "' . $process_time . '",' ;
		$result = $result . '"language": "en_US"' . "}" ;
		return $result ;  
	}

	function write_log($message){
		$now = date("H:i:s.u");
		file_put_contents("./log/my-errors.log", "\n$now :$message", FILE_APPEND | LOCK_EX);
	}		

	function getOS() { 

    	global $user_agent;

    	$os_platform = "Unknown OS Platform";

    	$os_array = array(
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

    	foreach ($os_array as $regex => $value) { 
	        if (preg_match($regex, $user_agent)) {
    	        $os_platform    =   $value;
        	}
    	}   
    	return $os_platform;
	}

	function getBrowser() {

	    global $user_agent;

	    $browser        =   "Unknown Browser";
	    $browser_array  =   array(
            '/msie/i'       =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/mobile/i'     =>  'Handheld Browser'
        );
	    foreach ($browser_array as $regex => $value) { 
	        if (preg_match($regex, $user_agent)) {
	            $browser    =   $value;
	        }
	    //    write_log("getBrowser=>$regex | $value");
	    }
	    	return $browser;
	}

?>