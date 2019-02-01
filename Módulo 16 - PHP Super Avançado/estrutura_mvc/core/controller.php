<?php
class controller
{
    public function loadTemplate($viewName, $viewData = array())
    {
        require_once('views'.DIRECTORY_SEPARATOR.'template.php');
    }

    public function loadViewInTemplate($viewName, $viewData = array())
    {
        extract($viewData);
        require_once('views'.DIRECTORY_SEPARATOR.$viewName.'.php');
    }
}