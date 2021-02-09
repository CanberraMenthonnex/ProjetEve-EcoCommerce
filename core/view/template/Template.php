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
     * @return Template
     */
    public function setTemplateView (string $templateFileName) : self {
        $this->_templateViewName = $templateFileName;
        return $this;
    }

    /**
     * For transimitting some variables to render context
     * 
     * @param array $vars ( ["var name" => value] )
     * @return Template
     */
    public function transmitVarToContext(array $vars) : self
    {
        $this->_contextVars = $vars;
        return $this;
    }


}