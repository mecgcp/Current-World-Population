<?php

######################################################

// This is all boilerplate code for bug-free SSE connections
ini_set('zlib.output_compression', 0);
ini_set('output_buffering', 'Off');
ini_set('implicit_flush', 1);

ob_implicit_flush(true);

while (ob_get_level()) {
    ob_end_clean();
}

ob_start();

header('Content-Type: text/event-stream; charset=UTF-8');
header('Cache-Control: no-store'); 
header('X-Accel-Buffering: no');

######################################################


// Include our common code and libraries
// These are down here so we can kill
// the session and release the file lock
include 'libraries/config.php';
include 'libraries/functions.php';
include 'libraries/reads.php';
include 'libraries/writes.php';

// We also need to close a session if one was opened.
session_write_close();


######################################################
//
sse_push_message('i', [memory_get_usage()]);


while (true) {

    $time = date('r');
    
    sse_push_message('t', [$time]);


    // creating a variable for my current population function
    $the_population = current_population();


    if($the_population != $current_population) {
        sse_push_message('m', [$the_population]);
        $current_population = $the_population;
    }

    //sleep(2);
    $i++;

    if ($i == 15) {
        sse_push_message('u', [$ever_loop]);
        
        $ever_loop++;
        $i = 0;
    }

    // creating a variable for my current malePopulation function
    $the_malePopulation = current_malePopulation();


    if($the_malePopulation != $current_malePopulation) {
        sse_push_message('a', [$the_malePopulation]);
        $current_malePopulation = $the_malePopulation;
    }

    //sleep(2);
    $i++;

    if ($i == 15) {
        sse_push_message('u', [$ever_loop]);
        
        $ever_loop++;
        $i = 0;
    }

    // creating a variable for my current femalePopulation function
    $the_femalePopulation = current_femalePopulation();


    if($the_femalePopulation != $current_femalePopulation) {
        sse_push_message('b', [$the_femalePopulation]);
        $current_femalePopulation = $the_femalePopulation;
    }

    //sleep(2);
    $i++;

    if ($i == 15) {
        sse_push_message('u', [$ever_loop]);
        
        $ever_loop++;
        $i = 0;
    }

    // creating a variable for my current birth function
    $the_births = current_births();


    if($the_births != $current_births) {
        sse_push_message('c', [$the_births]);
        $current_births = $the_births;
    }

    //sleep(2);
    $i++;

    if ($i == 15) {
        sse_push_message('u', [$ever_loop]);
        
        $ever_loop++;
        $i = 0;
    }

    // creating a variable for my current death function
    $the_deaths = current_deaths();


    if($the_deaths != $current_deaths) {
        sse_push_message('d', [$the_deaths]);
        $current_deaths = $the_deaths;
    }

    sleep(1);
    $i++;

    if ($i == 15) {
        sse_push_message('u', [$ever_loop]);
        
        $ever_loop++;
        $i = 0;
    }
}




?>
