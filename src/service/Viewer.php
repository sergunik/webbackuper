<?php
namespace webbackuper\service;

class Viewer {
    const DELIMITER = ':';

    public static function render($template, $param = array()) {
        $template_path = self::parseTemplateName($template);
        self::validateTemplatePath($template_path);

        extract($param, EXTR_SKIP);

        ob_start();

        require_once DIR_VIEW . 'header.php';
        require_once $template_path;
        require_once DIR_VIEW . 'footer.php';

        print ob_get_clean();
    }

    public static function renderAjax($template, $param = array()) {
        $template_path = self::parseTemplateName($template);
        self::validateTemplatePath($template_path);

        extract($param, EXTR_SKIP);

        ob_start();

        require_once $template_path;

        print ob_get_clean();
    }

    private static function parseTemplateName($template) {
        if ( false === strpos($template, self::DELIMITER) ) {
            return DIR_TASK . $template . '/view.php';
        }

        list($controller, $action) = explode(':', $template);
        return DIR_VIEW . $controller . '/' . $action . '.php';
    }

    private static function validateTemplatePath($template_path) {
        if( !file_exists($template_path) ) {
            throw new \Exception('Template "'.$template_path.'" does not exist.');
        }
    }
}