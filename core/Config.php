<?php

class Config {

    public static $config = [];

    /**
     * 加载配置
     */
    public function load() {
        $dir = __DIR__ . DIRECTORY_SEPARATOR . '../config/';
        $file = scandir($dir);
        foreach ($file as $val) {
            if ($val == '.' || $val == '..') {
                continue;
            }
            $config = include($dir . $val);
            if ($val != 'config.php') {
                //防止重命名,其他配置文件通过文件名.name的形式写入
                $path_info = pathinfo($dir . $val);
                $name = $path_info['filename'];
                $tmp = [];
                foreach ($config as $key => $value) {
                    $tmp[$name . "." . $key] = $value;
                }
                $config = $tmp;
            }
            self::set_config($config);
        }
    }

    /**
     * 获取配置
     * @param type $name
     * @return type
     */
    public static function get_config($name = '') {
        if ($name) {
            return self::$config[$name];
        }
        return self::$config;
    }

    /**
     * 设置配置
     * @param type $name
     * @param type $value
     */
    public static function set_config($name, $value = '') {
        if (is_array($name)) {
            self::$config = array_merge(self::$config, $name);
        } else {
            self::$config[$name] = $value;
        }
    }

}
