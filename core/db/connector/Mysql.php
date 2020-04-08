<?php

use PDO;
use PDOException;

/**
 * Mysql 链接
 *
 * @author Administrator
 */
class Mysql {

    public static $db;
    public static $config = [];

    public function __construct($config = []) {
        self::$config = array_merge(self::$config, $config);
    }

    /**
     * DB设置
     * @param type $config
     */
    public function set_db() {
        if (!self::$db) {
            $db = new PDO(self::$config['db.host'], self::$config['db.username'], self::$config['db.password'], array(PDO::ATTR_PERSISTENT => true));
            self::$db = $db;
        }
    }

    /**
     * 设置配置
     * @param type $config
     */
    public static function set_config($config) {
        self::$config = $config;
    }

    /**
     * 获取db
     * @return type
     */
    public function get_db() {
        $this->set_db();
        return self::$db;
    }

}
