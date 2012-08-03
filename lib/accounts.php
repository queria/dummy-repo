<?php

class Accounts extends BaseDBSelector
{
    public static function find($filters=array(), $first=false) {
        return self::_find(
            'SELECT mi.*, chars.*'
            .' FROM MEMB_INFO AS mi'
            .' LEFT JOIN AccountCharacter AS chars'
            .'  ON mi.memb___id = chars.Id',
            $filters,
            $first
        );
    }

    public static function findByName($acc_name) {
        return self::findBy('memb___id', $acc_name, true);
    }

    public static function findByGuid($number) {
        return self::findBy('memb_guid', $number, true);
    }
}
?>
