<?php

spl_autoload_register(function($class) {
	$prefix = "Includes\\";
	$baseDir = __DIR__."/";

	$len = strlen($prefix);

	if(strncmp($prefix,$class,$len)!==0) {
		return;
	}

	$relativeClass = substr($class,$len);

	$file = str_replace("\\","/",$baseDir.$relativeClass).".php";

	if(file_exists($file)) {
		require $file;
	}
});

function json_response($code = 200, $message = null) {
    header_remove();
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    header('Content-Type: application/json');

    return json_encode(array(
        'status' => $code < 300,
        'message' => $message
    ));
}