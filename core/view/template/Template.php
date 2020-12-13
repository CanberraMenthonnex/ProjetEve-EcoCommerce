<?php 

namespace Core\View\Template;

class Template implements ITemplate {

    private $_title = "Template";

    private $_scriptNames = [];

    private $_stylesNames = [];

    private $_templateViewName = "templateView";

    private $_contextVars = [];


    public function __construct(string $pageTitle, array $scriptsNames = [], array $stylesNames = [])
    {
        
        $this->_title = $pageTitle;
        $this->_scriptNames = $scriptsNames;
        $this->_stylesNames = $stylesNames;
    }

    /**
     * For rendering the view
     * 
     * @param string $content 
     */
    public function render (string $content) : void{
        extract($this->_contextVars);
        $templateTitle = $this->_title;
        $templateScripts = $this->_scriptNames;
        $templateStyles = $this->_stylesNames;
     
        require(ROOT . "/src/views/inc/" . $this->_templateViewName . ".php");
    }

    /**
     * For setting template file name
     * 
     * @param string $templateFileName
     */
    public function setTemplateView (string $templateFileName) {
        $this->_templateViewName = $templateFileName;
    }

    /**
     * For transimitting some variables to render context
     * 
     * @param array $vars ( ["var name" => value] )
     */
    public function transmitVarToContext(array $vars)
    {
        $this->_contextVars = $vars;
    }


}