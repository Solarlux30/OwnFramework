<?php 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


function is_leap_year(?int $year = null): bool
{
    if (null === $year) {
        $year = (int)date('Y');
    }

    return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
}



$routes = new Symfony\Component\Routing\RouteCollection();
$routes->add('hello', new Symfony\Component\Routing\Route('/hello/{name}', [
    'name' => 'World',
    '_controller' => function (Request $request): Response {
        $request->attributes->set('foo','bar');

        $response = render_template($request);

        $response->headers->set('Content-Type','text/plain');

        return $response;
    },
]));
$routes->add('bye', new Symfony\Component\Routing\Route('/bye'));


$routes->add('leap_year', new Symfony\Component\Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => function (Request $request): Response {
        if (is_leap_year($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    }
]));


return $routes;



