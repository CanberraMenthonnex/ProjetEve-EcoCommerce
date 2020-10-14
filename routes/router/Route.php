<?php
namespace Router;

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


    /*
     * ACTION TO START
     * @function
     * **/
    protected $_action;



    /*
     * @param string $path
     * @param function $action
     * **/
    public function __construct(string $path, $action)
    {
        $this->_path =$path;
        $this->_action = $action;
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
        $this->_action->call($this);
    }

    /*
     * FOR CHECKING IF THE PATH IS COMPATIBLE WITH THE CURRENT PATH
     * @param string path
     * return boolean
     * **/
    public function find (string $path) : bool {
        return $path === $this->_path;
    }



}
