<?php
namespace Core\Router;

interface IERoute {
    public function getPath() : string;
    public function activate() : void;
    public function find( string $path ) : bool;
}

class Route implements IERoute {


    /*
     * FUNCTIONAL PATH FOR STARTING ACTION
     * @string
     * **/
    protected $_path;

    /**
     * ROUTE PARAMS (FOR DYNAMIC ROUTES)
     */
    private $_params = [];

    /**
     * Controller (MVC) where finding the action method
     */
    protected $_controller;

    /*
     * ACTION TO START
     * @function
     * **/
    protected $_action;



    /*
     * @param string $path
     * @param function $action
     * **/
    public function __construct(string $path, array $params, string $controller, $action)
    {
        $this->_path =$path;
        $this->_params = $params;
        $this->_action = $action;
        $this->_controller = $controller;
        
    }

    /*
     *
     * FOR GETTING CURRENT PATH
     * return string
     */
    public function getPath() : string {
        return $this->_path;

    }
    /*
     *FOR STARTING CURRENT ACTION
     *
     */
    public function activate() : void{
        $controller = new $this->_controller();
        call_user_func_array([$controller,$this->_action], $this->_params);
    }

    /*
     * FOR CHECKING IF THE PATH IS COMPATIBLE WITH THE CURRENT PATH
     * @param string path
     * return boolean
     * **/
    public function find (string $url) : bool {

        if($this->_path === "") return $url === $this->_path;

        $isFind = preg_match("#^".preg_quote($this->_path)."#", $url);
       
        if($isFind) {
            $parts = explode($this->_path, $url);
            $parts = array_filter($parts);
           

            if($parts) {
                
                $parts = array_values($parts);  
                $args = explode("/",$parts[0]);
                $args = array_filter($args);
                
                if(count($args) !== count($this->_params)) return false;

                $this->_params = array_combine($this->_params,$args);
            }
            return true;
        }        
        return false;
    }



}