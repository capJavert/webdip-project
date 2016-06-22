<?php

require_once(__DIR__."/../config.php");

/**
 * Class Router
 *
 */
class Router {
    private static $route;
    private static $params = array();
    private static $protocol;
    private static $https = false;

    /**
     * Parse request URI
     * @return mixed
     */
    public static function parse() {
        $referer = explode("/WebDiP/2015_projekti/WebDiP2015x005/backend/services", $_SERVER['REQUEST_URI']);
        //$referer = str_replace("/form", "", $referer);
        $route = explode("?", $referer[1]);
        self::$route = rtrim($route[0], "/");

        var_dump(self::$route) or die;

        return self::$route;
    }

    /**
     * Get URL params
     * @return array
     */
    public static function params() {
        self::$params = $_GET;

        return self::$params;
    }

    /**
     * @param $key
     * @return string|null
     */
    public static function getParam($key) {
        $params = self::params();

        return array_key_exists($key, $params) ? $params[$key]:null;
    }

    /**
     * Get protocol
     * @return mixed
     */
    public static function protocol() {
        self::$protocol = $_SERVER['SERVER_PROTOCOL'];

        return self::$protocol;
    }

    /**
     * Check if on secure connection
     * @param bool $redirect
     * @return bool
     */
    public static function isSecure($redirect = false) {
        if(isset($_SERVER['HTTPS'])) {
            if ($_SERVER['HTTPS'] == "on" && $redirect) {
                header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
                exit();
            }

            self::$https = $_SERVER["HTTPS"] != "on" ? false:true;
        }

        return self::$https;
    }

    public static function isGetForm() {
        $referer = explode("/WebDiP/2015_projekti/WebDiP2015x005/backend/services/data/form", $_SERVER['REQUEST_URI']);
        if(count($referer)>1) {
            return true;
        } else {
            return false;
        }
    }
}