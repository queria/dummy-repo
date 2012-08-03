<?php

abstract class BaseDBSelector extends BaseDB {

    protected static function _find($query_base, $filters=array(), $first=false) {

        $where = '';
        if(!empty($filters)) {
            $where .= ' WHERE '.implode(' AND ', $filters);
        }
        $query = $query_base.$where;

        $instanceClass = get_called_class();
        $instanceClass = substr( // strip last 's' from 'Accounts' etc
            $instanceClass,
            0,
            strlen($instanceClass)-1
        );

        if($first) {
            return BaseDBObject::_fromDB(
                self::$_db->get_first($query),
                $instanceClass
            );
        } 
        $found = self::$_db->get_array($query);
        $arr = array();
        foreach($found as $key=>$info) {
            $arr[$key] = BaseDBObject::_fromDB($info, $instanceClass);
        }
        return $arr;
    }

    public static function findAll() {
        return static::find();
    }

    public static function findBy($key, $value, $single=false) {
        $value = self::_safe($value);
        return static::find(
            array("{$key} = '{$value}'"),
            $single
        );
    }

    // reimplement in subclasses
    // in this method you should call _find with query_base specified
    abstract public static function find($filters, $first);
}

?>
