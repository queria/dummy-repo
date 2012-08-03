<?php

abstract class BaseDB extends Base {

    protected static $_db;

    public static function init() {
        self::$_db = DBConnection::get();
    }

    public static function _safe($value) {
        return $value;
    }

    public static function _safe_num($value) {
        return $value;
    }

    public function __construct() {}
}

?>
