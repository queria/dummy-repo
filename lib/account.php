<?php

class Account extends BaseDBObject
{
    public function to_s() {
        return 'Account('.$this->name().')';
    }

    public function name() {
        return $this->_attr['memb___id'];
    }

    public function characters() {
        return Characters::findByAccount($this->name());
    }
}
?>
