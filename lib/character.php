<?php

class Character extends BaseDBObject
{
    protected function _init_attr_list() {
        return Array(
            'account' => 'AccountID',
            'name' => 'Name',
            'class' => 'Class',
            'level' => 'cLevel',
            'resets' => 'Resets',
            'map' => 'MapNumber'
        );
    }

    public function name() {
        return $this->_attr['Name'];
    }

    public function level() {
        return $this->_attr['cLevel'];
    }

    public function resets() {
        return $this->_attr['Resets'];
    }

    public function to_s() {
        return 'Character('.$this->name().':'.$this->level().'/'.$this->resets().')';
    }
}

?>
