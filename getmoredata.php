<?php 
	require('./wordnik/Swagger.php');

//	$time_start = microtime(true); 
	$wordinput = strtolower(trim($_POST["wordinput"])) ;
	write_log("MORE DATA:" . $wordinput);

	list($defs, $syns) = get_data_wordnik($wordinput);
	$jsontext = get_json($defs,$syns);
	//$htmltext = get_html($defs,$syns);
	//echo $htmltext ;
	echo $jsontext ;

	//write_log("$output");
	//write_log("FINISHED\n");

/////////////////////////////////////////////////////////////////////
	
	function get_json($defs,$syns){
/*
{ "moredata": {
     "SYNONYM": ["word1","word2","word3"] ,
     "ANTONYM": ["word1","word2","word3"] ,
     "HYPERNYM": ["word1","word2","word3"] ,
     "DEFINITION": ["def1","def2","def3"]
    }
}
 			 */
		$maxdefs = 8 ;
		$defarray = array() ;
		foreach($defs as $key => $defobj) {
			array_push($defarray,$defobj->text);
			$maxdefs-- ;
			if($maxdefs == 0 ) break ;
		}

		$snymarray = array() ;
		$anymarray = array() ;
		$hnymarray = array() ;
		$relations = array("synonym", "antonym", "hypernym");
		foreach($syns as $key => $relatedobj) {
			if( in_array($relatedobj->relationshipType, $relations)) {
				if($relatedobj->relationshipType == "synonym"){
					foreach ($relatedobj->words as $mykey => $value) {
						array_push($snymarray, $value);
					}
				} else
				if($relatedobj->relationshipType == "antonym"){
					foreach ($relatedobj->words as $mykey => $value) {
						array_push($anymarray, $value);
					}
				} else
				if($relatedobj->relationshipType == "hypernym"){
					foreach ($relatedobj->words as $mykey => $value) {
						array_push($hnymarray, $value);
					}
				}
			} 
		}

	
		return json_encode(array('SYNONYM' => $snymarray,'ANTONYM' => $anymarray,'HYPERNYM' => $hnymarray,'DEFINITION' => $defarray));
		//echo var_dump($syns);
	}

	function get_data_wordnik($word){
		$myAPIKey = 'a7cc8f936ad50f6ea100f01558a0562d20faf1fedfbf345ed';
		$client = new APIClient($myAPIKey, 'http://api.wordnik.com/v4');
		$wordApi = new WordApi($client);

		$synobject = $wordApi->getRelatedWords($word, null, 'false', 200) ;

		//getDefinitions($word, $partOfSpeech=null, $sourceDictionaries=null, $limit=null, 
        //                       $includeRelated=null, $useCanonical=null, $includeTags=null)
		$defobject = $wordApi->getDefinitions($word, null, 'all', 200,null, null, null);
		
		return array($defobject, $synobject) ;
	}

	function get_html($defs,$syns){
		// Definitions, Synonyms, Antonyms, Hypernyms
		$relations = array("synonym", "antonym", "hypernym");
		$maxdefs = 8 ;
		//$headhtml = "<h3>Synonym    Antonym    Hypernym    Definition</h3>" ;
		$defhtml = "<strong>DEFINITIONS</strong></br>";
		foreach($defs as $key => $defobj) {
			//$defhtml = $defhtml . "$defobj->text      [$defobj->sourceDictionary] </br>" ;
			$defhtml = $defhtml . "=>$defobj->text </br>" ;
			$maxdefs-- ;
			if($maxdefs == 0 ) break ;
		}
	//echo $defhtml ;
		$relhtml = "" ;
		$wordsinrow = 4 ; 
		foreach($syns as $key => $relatedobj) {
			if( in_array($relatedobj->relationshipType, $relations)) {
				
				$relhtml = $relhtml . "<strong>".  strtoupper($relatedobj->relationshipType) .  "</strong></br>";
				$counter = 0 ;
				foreach ($relatedobj->words as $mykey => $value) {
					 $relhtml = $relhtml . "$value     " ;
					 $counter++ ;
					 if(($counter % $wordsinrow) == 0) {$relhtml = $relhtml . "</br>";} 
				}
				$relhtml = $relhtml . "</br>"; 
			} 
		}
		
		$rethtml =  $headhtml . $relhtml . $defhtml ;
		return ($rethtml) ;
	}

	function write_log($message){
		$now = date("H:i:s.u");
		file_put_contents("./log/my-errors.log", "\n$now :$message", FILE_APPEND | LOCK_EX);
	}		

?>