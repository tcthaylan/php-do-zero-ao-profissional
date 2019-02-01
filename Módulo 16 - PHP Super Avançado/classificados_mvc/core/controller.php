<?php
class controller
{
    public function loadTemplate($viewName, $viewData = array())
    {
        require('views'.DIRECTORY_SEPARATOR.'template.php');
    }

    public function loadViewInTemplate($viewName, $viewData = array())
    {
        extract($viewData);
        require('views'.DIRECTORY_SEPARATOR.$viewName.'.php');
    }
}