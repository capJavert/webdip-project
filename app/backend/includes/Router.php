<?php

/**
 * Class Router
 *
 */
class Router {
    public static $route;
    public static $params = array();
    public static $protocol;

    /**
     * @return mixed
     */
    public static function parse() {
        $referer = explode("/backend/services", $_SERVER['REQUEST_URI']);
        self::$route = $referer[1];

        return self::$route;
    }

    /**
     * @return array
     */
    public static function params() {
        self::$params = $_GET;

        return self::$params;
    }

    /**
     * @return mixed
     */
    public static function protocol() {
        self::$protocol = $_SERVER['SERVER_PROTOCOL'];

        return self::$protocol;
    }
}