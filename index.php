<?php 
	
	define(THINK_PATH,"./ThinkPHP/");

	define(APP_HOME,"home");

	define(APP_PATH,"./home/");

	define(BACK_IP,"10.10.211.80:8080");
	/*配合SAE所设置的常量，打包前把这段代码删掉*/
/*
	define(SAE_MYSQL_HOST_M,"localhost");
	define(SAE_MYSQL_DB,"zssysdb");
	define(SAE_MYSQL_USER,"root");
	define(SAE_MYSQL_PASS,"");
	define(SAE_MYSQL_PORT,"3306");
*/
/*配合SAE所设置的常量，打包前把这段代码删掉*/
define('APP_DEBUG',True);// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
	require(THINK_PATH."ThinkPHP.php");

	


?>