<?php

/**
 * Created by PhpStorm.
 * User: javert
 * Date: 19.06.16.
 * Time: 18:02
 */
class AccessControl {
    /**
     * @param $accessValue
     * @param $userRoleValue
     * @return bool
     */
    static function check($accessValue, $userRoleValue) {
        if($userRoleValue>=$accessValue) {
            return true;
        } else {
            return false;
        }
    }
}