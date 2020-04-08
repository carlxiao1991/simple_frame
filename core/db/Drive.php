<?php

namespace app\core\db;

/**
 * DB驱动类
 *
 * @author Administrator
 */
class Drive {

    public static $drive;

    public function __construct($config) {
        $type = "/app/core/db/connector/" . $config['db.type'];
        $type::set_config($config);
    }

    public function content() {
        
    }

}
