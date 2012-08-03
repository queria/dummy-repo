<?php

class Base {
    public function to_s() {
        return get_called_class().'()';
    }
    public function __toString() {
        return $this->to_s();
    }
}

class Null extends Base {
    public function is_null() {
        return true;
    }
}

?>
