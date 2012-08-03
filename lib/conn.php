<?php

class DBConnection
{
    private static $_instance;
    private $_c;

    private function __construct($srv, $user, $pwd, $dbname='MuOnline', $port=1433) {
        $srv .= ':'.$port;
        $this->_c = @mssql_connect($srv, $user, $pwd);
        if(!$this->_c) {
            throw new Exception('Unable to connect to database at '.$srv);
        }
        mssql_select_db($dbname,$this->_c);
    }

    public function __destruct() {
        if($this->_c) {
            mssql_close($this->_c);
        }
    }

    public static function get($config=null) {
        if(!self::$_instance) {
            global $cfg;
            if(!$config) {
                $config = $cfg['db'];
            }
            self::$_instance = new DBConnection(
                $config['host'],
                $config['user'],
                $config['pwd'],
                $config['name'],
                $config['port']
            );
        }
        return self::$_instance;
    }

    public function q($query) {
        $res = @mssql_query($query);
        if(!$res) {
            throw new Exception('SQL Error: '.mssql_get_last_message().' in '.$query);
        }
        return $res;
    }

    public function get_first($query) {
        //$query .= ' LIMIT 1';
        $res = $this->q($query);
        if(!$res || mssql_num_rows($res) == 0) { return null; }
        return mssql_fetch_array($res);
    }

    public function get_array($query) {
        $arr = array();
        $res = $this->q($query);
        if(!$res) {
            return array();
        }
        while($row = mssql_fetch_array($res)) {
            $arr[] = $row;
        }
        return $arr;
    }


}

?>
