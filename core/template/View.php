<?php

namespace core\template;


class View
{
    

    private function find($template)
    {
        $path = _ROOT_DIR_ . "/src/views/" . $template . ".php";
        if (!file_exists($path)) {
            new missViewPage($template);
            exit();
        }else{
            return $path;
        }
    }


    public static function render($template, array $vars = [])
    {
        extract($vars);
        ob_start();
        $view = new View();
        include $view->find($template);
        $page = ob_get_contents();
        ob_end_clean();

        echo $page;
    }
}
