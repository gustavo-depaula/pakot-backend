<?php
// Application middleware

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $response, $next) {
    $response = $next($request, $response);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->add(function ($request, $response, $next) {
	if ($request->isPost()) {
		$parsed_request = $request->getParsedBody();
		if (array_key_exists('unhackable', $parsed_request))
		    $response = $next($request, $response);
	} else {
	    $response = $next($request, $response);
	}

	return $response;
});