<?php

function sse_push_message($the_key = '', $the_msg = []) {
	global $id;
	
	if ($the_key && $the_msg) {
		$output_data = [];
		$output_data[$the_key] = $the_msg;
		
			
		// Headers must be processed line by line.
		header('Content-Type: text/event-stream; charset=UTF-8');
		header('Cache-Control: no-store');

		// Set data line
		echo "id: ".$id++ . PHP_EOL;
		echo "event: message" . PHP_EOL;
		echo "retry: ". (300 * 10) . PHP_EOL;
		echo "data: " . json_encode($output_data) . PHP_EOL;

		echo PHP_EOL;
		echo str_repeat(' ', 1024*64);

		ob_flush();
		flush();

		return true;	
	}
}

function sse_end_packet() {
    echo "0" . PHP_EOL . PHP_EOL;
	echo str_repeat(' ', 1024*64);
	
    ob_flush();
    flush();
	
	fastcgi_finish_request(); // important when using php-fpm!
}

function sse_204_nocontent() {
	ob_start();

	header("HTTP/1.1 204 NO CONTENT");

	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0"); // Proxies.

	ob_end_flush(); //now the headers are sent
}

function DOMinnerHTML(DOMNode $element) { 
    $innerHTML = ""; 
    $children  = $element->childNodes;

    foreach ($children as $child) { 
        $innerHTML .= $element->ownerDocument->saveHTML($child);
    }

    return $innerHTML; 
} 

function getElementsByClass(&$parentNode, $tagName, $className) {
	$nodes=array();

	$childNodeList = $parentNode->getElementsByTagName($tagName);
	for ($i = 0; $i < $childNodeList->length; $i++) {
		$temp = $childNodeList->item($i);
		if (stripos($temp->getAttribute('class'), $className) !== false) {
			$nodes[]=$temp;
		}
	}

	return $nodes;
}


// creating a function for my current population
function current_population($url = 'https://countrymeters.info/en/World') {
	// We need to pretend this is a browser when we scrape the HTML code
	$options = array(
	'http'=>array(
		'method'=>"GET",
		'header'=>"Accept-language: en\r\n" .
				"Cookie: scndstry=".strtotime('now')."\r\n" .  // check function.stream-context-create on php.net
				"User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad 
	)
	);

	// This will add our fake user agent to the HTTP call
	$context = stream_context_create($options);

	// We stick the raw HTML document into a variable using our browser context
	$html_code = file_get_contents($url, false, $context);

	// Create a new DOMDocument object...
	$DOM = new DOMDocument;

	libxml_use_internal_errors(true);
	$DOM->loadHTML($html_code); // And load our raw HTML into it
	libxml_use_internal_errors(false);

	// Let's create a list of the <img> tags we find in the HTML document
	//$items = $DOM->getElementsByTagName('dd.mrgn-bttm-0'); 

	// Grab all content in the #header id
	$content_node = $DOM->getElementById("cp1");//population_clock");
	
	//$items = getElementsByClass($content_node, 'div', 'cp1');//will contain the three nodes under "content_node".

	// Create an empty array to load the <img>'s src attribute into
	//$population_result = [];

	// Iterate over DOMNodeList (Implements Traversable)
	//foreach ($items as $item) { 
		//$population_result[] = $item->nodeValue; //DOMinnerHTML($item); 
	//} 

	return $content_node->nodeValue; //$population_result;//[1]; //7
}

// creating a function for my malepopulation
function current_malePopulation($url = 'https://countrymeters.info/en/World') {
	// We need to pretend this is a browser when we scrape the HTML code
	$options = array(
	'http'=>array(
		'method'=>"GET",
		'header'=>"Accept-language: en\r\n" .
				"Cookie: scndstry=".strtotime('now')."\r\n" .  // check function.stream-context-create on php.net
				"User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad 
	)
	);

	$context = stream_context_create($options);

	$html_code = file_get_contents($url, false, $context);

	$DOM = new DOMDocument;

	libxml_use_internal_errors(true);
	$DOM->loadHTML($html_code); 
	libxml_use_internal_errors(false);

	$content_node = $DOM->getElementById("cp2");//

	return $content_node->nodeValue;
}

// creating a function for my femalepopulation
function current_femalePopulation($url = 'https://countrymeters.info/en/World') {
	// We need to pretend this is a browser when we scrape the HTML code
	$options = array(
	'http'=>array(
		'method'=>"GET",
		'header'=>"Accept-language: en\r\n" .
				"Cookie: scndstry=".strtotime('now')."\r\n" .  // check function.stream-context-create on php.net
				"User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad 
	)
	);

	$context = stream_context_create($options);

	$html_code = file_get_contents($url, false, $context);

	$DOM = new DOMDocument;

	libxml_use_internal_errors(true);
	$DOM->loadHTML($html_code); 
	libxml_use_internal_errors(false);

	$content_node = $DOM->getElementById("cp3");//

	return $content_node->nodeValue;
}

// creating a function for my current birth population
function current_births($url = 'https://countrymeters.info/en/World') {
	// We need to pretend this is a browser when we scrape the HTML code
	$options = array(
	'http'=>array(
		'method'=>"GET",
		'header'=>"Accept-language: en\r\n" .
				"Cookie: scndstry=".strtotime('now')."\r\n" .  // check function.stream-context-create on php.net
				"User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad 
	)
	);

	$context = stream_context_create($options);

	$html_code = file_get_contents($url, false, $context);

	$DOM = new DOMDocument;

	libxml_use_internal_errors(true);
	$DOM->loadHTML($html_code); 
	libxml_use_internal_errors(false);

	$content_node = $DOM->getElementById("cp7");//

	return $content_node->nodeValue;
}

// creating a function for my current death population
function current_deaths($url = 'https://countrymeters.info/en/World') {
	// We need to pretend this is a browser when we scrape the HTML code
	$options = array(
	'http'=>array(
		'method'=>"GET",
		'header'=>"Accept-language: en\r\n" .
				"Cookie: scndstry=".strtotime('now')."\r\n" .  // check function.stream-context-create on php.net
				"User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad 
	)
	);

	$context = stream_context_create($options);

	$html_code = file_get_contents($url, false, $context);

	$DOM = new DOMDocument;

	libxml_use_internal_errors(true);
	$DOM->loadHTML($html_code); 
	libxml_use_internal_errors(false);

	$content_node = $DOM->getElementById("cp9");//

	return $content_node->nodeValue;
}


?>