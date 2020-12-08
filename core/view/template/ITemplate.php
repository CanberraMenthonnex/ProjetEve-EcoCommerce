<?php 

namespace Core\View\Template;

interface ITemplate {
    /**
     * For rendering a view to client
     * 
     * @param string $content
     */
    public function render(string $content);
}