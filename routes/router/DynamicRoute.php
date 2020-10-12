<?php


namespace Router;


class DynamicRoute extends Route
{
    /*
     * SEPARATOR FOR DYNAMIC PATH
     * @string
     * */
    const DELIMITER = ":";

    /*
     * KEYS FROM DYNAMIC PATH
     * */
    private $keys = [];

    /*
     * STORE PARAMS FROM DYNAMIC PATH
     * **/
    private $params = [];

    public function __construct(string $path, $action)
    {
        $parts = explode("/".self::DELIMITER, $path);

        parent::__construct(array_shift($parts), $action);

        array_map(function ($v) {
            $this->keys[]= $v;
        }, $parts);

    }

    /*
     * FOR CHECKING IF THE PATH IS COMPATIBLE WITH THE CURRENT PATH, AND CHECK IF THERE IS A DYNAMIC PATH
     * @param string path
     * return boolean
     */
    public function find(string $path): bool
    {
        $parts = explode($this->_path,$path);

        if(count($parts) === 2 && $parts[0] === "") {
            $dynamicPath = $parts[1];
            return $this->_transformDynamicPathToParams($dynamicPath);
        }

        return false;

    }

    /*
     * TRANSFORM DYNAMIC STRING PATH TO USEFUL VARIABLES IN THE ARRAY OF DYNAMIC DATA
     * @param string $path
     *
     * return true if all variables have value, otherwise return false
     * **/
    private function _transformDynamicPathToParams (string $dynamicPath) : bool {
        $params = explode("/", $dynamicPath);

        $params = array_values(array_filter($params,function ($v){return $v ? true : false;}));

        if(count($params) !== count($this->keys)) {
            return false;
        }

        for($i = 0, $c = count($params), $k = count($this->keys); $i < $c && $i < $k ; $i++) {

            $this->params[] = $params[$i];
        }

        return true;
    }

    /*
     * CALL CALLBACK ACTION
     * */
    public function activate(): void
    {
        call_user_func_array( $this->_action , $this->params ) ;
    }
}