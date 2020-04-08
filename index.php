<?php
include '/core/Loader.php'; // 引入加载器
include '/core/Config.php';
spl_autoload_register("Loader::autoload");
require_once './vendor/autoload.php'; // 加载自动加载文件
$config = new Config();
$config->load();
//获取路径
$path_info = str_replace('/index.php', '', $_SERVER['REQUEST_URI']);
if ($path_info == '/') {
    $path_info = Config::get_config('def_path');
}

$config_info = Config::get_config();

$db = new PDO($config_info['db.dsn'], $config_info['db.username'], $config_info['db.password']);
$list = $db->query("select * from admin")->fetchAll();
print_r($list);exit;
exit;


$path_info_arr = explode('/', $path_info);
$controller = 'app' . DIRECTORY_SEPARATOR . "controller" . DIRECTORY_SEPARATOR . ucfirst($path_info_arr[1]);
//控制器
$obj = new $controller();
//方法
$action = empty($path_info_arr[2]) ? 'index' : $path_info_arr[2];
//print_r($obj);exit;
//输出结果
exit($obj->$action());

