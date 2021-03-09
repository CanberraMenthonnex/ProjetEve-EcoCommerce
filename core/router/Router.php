<?php
namespace Core\Router;

interface IERouter {
    public function __construct( string $url);
    public function parse();
    public function setUrl(string $url);
}

class Router implements IERouter {

    const HTTP_GET = "GET";
    const HTTP_POST = "POST";
    const HTTP_DELETE = "DELETE";
    const HTTP_PUT = "PUT";

    /*
     * CURRENT URL
     * **/
    private string $_url;
    /*
     * FOR STORING ALL ROUTES
     * */
    private array $store = [
        self::HTTP_GET => [],
        self::HTTP_POST => [],
        self::HTTP_PUT => [],
        self::HTTP_DELETE => []
    ];


    public function __construct( string $url )
    {
        $this->_url = trim($url, "/");
    }

    /*
     * FOR CHANGING CURRENT URL
     * @param string url
     * */
    public function setUrl(string $url) {
        $this->_url = $url;
    }

    /*
     * CATCH HTTP GET REQUEST
     * @param string $path
     * @param function $action
     * **/
    public function get (string $path, string $controller, string $action) : void {
        $this->createRoute(self::HTTP_GET,$path, $controller, $action);
    }

    /*
     * CATCH HTTP POST REQUEST
     * **/
    public function post (string $path, string $controller, string $action) : void {
        $this->createRoute(self::HTTP_POST, $path, $controller, $action);
    }

    /*
     * CATCH HTTP DELETE REQUEST
     * **/
    public function delete (string $path, string $controller, string $action) {
        $this->createRoute(self::HTTP_DELETE, $path, $controller, $action);
    }

    /*
     *CATCH PUT REQUEST
     *  **/
    public function update (string $path, string $controller, string $action) {
        $this->createRoute(self::HTTP_PUT, $path, $controller, $action);
    }

    /*
     * FOR CHOOSING THE CORRECT ROUTE TYPE
     * @param string $method
     * @param string $path
     * @param function $action
     * */
    private function createRoute( string $method, string $path, string $controller, string $action) : void {

        $parts = explode(":", $path);

        $parts = array_map(function ($arg) {
            return trim($arg, "/");
        }, $parts);
        $this->store[$method][] = new Route($parts[0], array_slice($parts, 1), $controller, $action);
        
    }

    /*
     * FOR PARSING URL AND USING CORRECT FUNCTION
     * **/
    public function parse () : void {

        $httpMethod = $_SERVER["REQUEST_METHOD"];

        $currentRoute = $this->parseRoutes($this->store[$httpMethod]);

        if (!$currentRoute) {
            header("HTTP/1.0 404 Not Found");
            die();
        }

        $currentRoute->activate();

    }

    /*
     * FOR PARSING ROUTES COLLECTION
     * **/
    private function parseRoutes($routeCollection)   {

        $route = array_filter($routeCollection, function ($item) {
            return $item->find ($this->_url);
        });

        return array_shift($route);
    }
}