<?php

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
        $referer = explode("/backend/services", $_SERVER['REQUEST_URI']);
        $route = explode("?", $referer[1]);
        self::$route = rtrim($route[0], "/");

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
}