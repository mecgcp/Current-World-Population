

// Current Time Div
var source = new EventSource("live-sse.php");

source.onmessage = function(event) {
    var the_json = JSON.parse(event.data);

    if (the_json.t) {
        document.getElementById("currentTime").innerHTML = the_json.t; 
    }
    if (the_json.m) {
        document.getElementById("result_m").innerHTML = the_json.m; 
    }
    if (the_json.a) {
        document.getElementById("result_a").innerHTML = the_json.a; 
    }
    if (the_json.b) {
        document.getElementById("result_b").innerHTML = the_json.b; 
    } 
    if (the_json.c) {
        document.getElementById("result_c").innerHTML = the_json.c; 
    }
    if (the_json.d) {
        document.getElementById("result_d").innerHTML = the_json.d; 
    } 


}; 

