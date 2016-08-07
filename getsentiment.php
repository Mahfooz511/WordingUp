<?php 
	require('./alchemyapi/alchemyapi.php');

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
	
	$watson_total_time = 0 ;
	$watson_time_start = microtime(true); 
 
 	// get watson code here
	$sentiments = get_watson_sentiment($textinput) ;

//echo print_r($sentiments) ;
  	//write_log("After getting data from Watson");
  	$watson_total_time = $watson_total_time + (microtime(true) - $watson_time_start) ;
	write_log("Watson total time taken: " . $watson_total_time) ;
	$time_end = microtime(true);
	$process_time = $time_end - $time_start;

	$output = create_json_string($sentiments ,$process_time); 
	
	echo $output ;	

	write_log("FINISHED\n");

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////	
	function get_watson_sentiment($text){
		$alchemyapi = new AlchemyAPI('');
		
		// Get sentiment
		$response = $alchemyapi->sentiment('text',$text, null);
		if ($response['status'] == 'OK') {
			//	echo print_r($response);
			$overall_sentiment = $response['docSentiment']['type'] ;
			// if (array_key_exists('score', $response['docSentiment'])) {
			// 	echo 'score: ', $response['docSentiment']['score'], PHP_BR . PHP_EOL;
			// }
		} else {
			echo 'Error in the sentiment analysis call: ', $response['statusInfo'];
		}

		// Get emotions
		$response = $alchemyapi->emotion('text',$text, null);
		if ($response['status'] == 'OK') {
			$emotions = $response['docEmotions']; 
			arsort($emotions);
			$totalscore = 0 ;
			foreach ($emotions as $key => $value) {
				$totalscore += $value ;
			}
			// Change in percentage
			foreach ($emotions as $key => $value) {
				$emotions[$key] = round(($value / $totalscore) * 100, 0);
			}
			// echo print_r($response);
		} else {
			echo 'Error in the emotion analysis call: ', $response['statusInfo'];
		}

		$emotions['overall_sentiment'] = $overall_sentiment ;

		return ($emotions) ;
	}
	
	function create_json_string($sentiments, $process_time) {
		$result = '{ "OverallSentiment": "' . ucfirst($sentiments['overall_sentiment']) . '" , "Emotions":  [ ' ;

		foreach ($sentiments as $key => $value) {
			if(strcmp($key,'overall_sentiment') == 0 )  continue;
			$result = $result  . '{ "emotion":"' . ucfirst($key) . '", "value":"' . $value . '%"},' ;
		}
		$result = rtrim($result, ",") . ']' ;
		$result =  $result . ',"process_time": "' . $process_time . '"}' ;
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