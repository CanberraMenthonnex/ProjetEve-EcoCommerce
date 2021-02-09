<?php 

namespace Core\View\Template;

interface ITemplate {
    /**
     * For rendering a view to client
     * 
     * @param string $content
     */
    public function render(string $content);

    /**
     * For setting the template name to display
     * 
     * @param string $view
     * @return ITemplate
     */
    public function setTemplateView(string $view) : self;

    /**
     * For transimitting some variables to render context
     * 
     * @param array $vars ( ["var name" => value] )
     * @return ITemplate
     */
    public function transmitVarToContext(array $vars) : self;
}