<?php


namespace App;


class View
{
    //Отображаем шаблон

    public static function display($template, array $params = [])
    {
        ob_start();

        foreach ($params as $index => $value) {
            $$index = $value;
        }

        require_once $template;

        $content = ob_get_contents();

        ob_end_clean();

        echo $content;
    }

}