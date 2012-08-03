<?php

class Characters extends BaseDBSelector
{

    public static function find($filters=array(), $first=false) {
        return self::_find(
            'SELECT char.*'
            .' FROM Character AS char',
            $filters,
            $first
        );
    }

    public static function findByName($char_name) {
        return self::findBy('Name', $char_name, true);
    }

    public static function findByAccount($acc_name) {
        return self::findBy('AccountID', $acc_name);
    }

    //public static function findByLevel($number) {
    //    return self::findBy('cLevel', $number);
    //}

    //public static function findByMap($number) {
    //    return self::findBy('MapNumber', $number);
    //}

    //public static function findByClass($number) {
    //    return self::findBy('Class', $number);
    //}

    //public static function findByResets($number) {
    //    return self::findBy('Resets', $number);
    //}
}

?>
