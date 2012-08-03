<?php

abstract class BaseDBObject extends BaseDB {

    public static function _fromDB($info_struct, $class) {
        if(is_null($info_struct)) {
            return new Null();// $info_struct;
        }
        $obj = new $class;
        foreach($info_struct as $key=>$value) {
            $obj->_attr[$key] = $value;
        }
        return $obj;
    }

    // INSTANCE PROPERTIES
    protected $_attr;

    public function __construct() {
        $this->_attr = array();
        $this->_attrmap = $this->_init_attr_list();
        $this->_attrmap_db = array();
        foreach($this->_attrmap as $our=>$db) {
            $this->_attrmap_db[$db] = $our;
        }
    }
    // override
    protected function _init_attr_list() { return array(); }

}

?>
