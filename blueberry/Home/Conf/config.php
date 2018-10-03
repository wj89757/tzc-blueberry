<?php
return array(
	//'配置项'=>'配置值'
	//mysql全局定义
	//SAE下固定mysql配置
    'DB_TYPE'           =>  'mysql',     // 数据库类型
    'DB_DEPLOY_TYPE'    =>  1,
    'DB_RW_SEPARATE'    =>  true,
    'DB_HOST'           =>  SAE_MYSQL_HOST_M.','.SAE_MYSQL_HOST_S, // 服务器地址
    'DB_NAME'           =>  SAE_MYSQL_DB,        // 数据库名
    'DB_USER'           =>  SAE_MYSQL_USER,    // 用户名
    'DB_PWD'            =>  SAE_MYSQL_PASS,         // 密码
    'DB_PORT'           =>  SAE_MYSQL_PORT,        // 端口
    'DB_PREFIX'             =>  'think_',          // 数据库表前缀
    
	'DEFAULT_V_LAYER'       =>  'View',            // 修改视图目录 
	
	'URL_MODEL' => '3',
	'URL_CASE_INSENSITIVE' =>true,//区分大小写
	'LAYOUT_ON'             => true,
	'LAYOUT_NAME'           => 'Public/layout',
	'DEFAULT_FILTER' =>'htmlspecialchars',
);