<?php 
	
	define(THINK_PATH,"./ThinkPHP/");

	define(APP_HOME,"admin");

	define(APP_PATH,"./admin/");

	//define(ADMIN_TOKEN,"s98f34hif23fv0yefu4==");
	define(NUM_PER_PAGE, 10);//每页显示的数据条数
	define(BACK_URL,"http://10.10.211.68:8080/CarGo");
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