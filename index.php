<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Http\Router;
use App\Controller\Pages\Home;
use App\Http\Response;

/* $obResponse = new \App\Http\Response(404, 'Olá mundo');

echo "<pre;>";
print_r($obResponse);
echo "</pre>";

$obResponse->sendResponse();

exit; */

/*echo Home :: getHome();*/

// ==========================================================

define('URL', 'http://127.0.0.1:8080/');

$obRouter = new Router(URL);

/* echo "<pre;>";
print_r($obRouter);
echo "</pre>";

exit; */

//ROTA HOME
$obRouter->get('/', [
    function() {
        return new Response(200, Home :: getHome());
    }
]);


// ==========================================================
// --- SAÍDA --- $obRouter = new Router(URL);
/*
    <pre;>App\Http\Response Object
	(
	[httpCode:App\Http\Response:private] => 200
	[headers:App\Http\Response:private] => Array
	(
	[Content-Type] => text/html
	)

	[contentType:App\Http\Response:private] => text/html
	[content:App\Http\Response:private] => Olá mundo
	)
	</pre>

*/

// ==========================================================
// --- SAÍDA --- $parseUrl = parse_url($this->url);
/* <pre;>Array
	(
	[scheme] => http
	[host] => 127.0.0.1
	[port] => 8080
	[path] => /
	)
	</pre>
	<pre;>App\Http\Router Object
		(
		[url:App\Http\Router:private] => http://127.0.0.1:8080/
		[prefix:App\Http\Router:private] =>
		[routes:App\Http\Router:private] => Array
		(
		)

		[request:App\Http\Router:private] => App\Http\Request Object
		(
		[httpMethod:App\Http\Request:private] => GET
		[uri:App\Http\Request:private] => /
		[queryParams:App\Http\Request:private] => Array
		(
		)

		[postVars:App\Http\Request:private] => Array
		(
		)

		[headers:App\Http\Request:private] => Array
		(
		[User-Agent] => PostmanRuntime/7.34.0
		[Accept] =>
		[Cache-Control] => no-cache
		[Postman-Token] => 6b766c15-13d8-4dda-a986-c3763be99a4a
		[Host] => 127.0.0.1:8080
		[Accept-Encoding] => gzip, deflate, br
		[Connection] => keep-alive
		)

		)

		)
		</pre> 
 */

// ==========================================================
// --- SAÍDA --- $parseUrl = parse_url($this->url);
/*
<pre;>App\Http\Router Object
	(
	[url:App\Http\Router:private] => http://127.0.0.1:8080/
	[prefix:App\Http\Router:private] => /
	[routes:App\Http\Router:private] => Array
	(
	)

	[request:App\Http\Router:private] => App\Http\Request Object
	(
	[httpMethod:App\Http\Request:private] => GET
	[uri:App\Http\Request:private] => /
	[queryParams:App\Http\Request:private] => Array
	(
	)

	[postVars:App\Http\Request:private] => Array
	(
	)

	[headers:App\Http\Request:private] => Array
	(
	[User-Agent] => PostmanRuntime/7.34.0
	[Accept] =>
	[Cache-Control] => no-cache
	[Postman-Token] => 14ce0d67-df0f-4404-b7d2-21363f52cc78
	[Host] => 127.0.0.1:8080
	[Accept-Encoding] => gzip, deflate, br
	[Connection] => keep-alive
	)

	)

	)
	</pre>
*/

// ==========================================================
// --- SAÍDA --- $obRouter->get('/', [function() ..........
/*
<pre;>GET</pre>
	<pre;>/</pre>
		<pre;>Array
			(
			[0] => Closure Object
			(
			)

			)
			</pre>
*/