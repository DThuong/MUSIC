<?php 

if($_SERVER['SERVER_NAME'] == "localhost")
{
	//for local server
	define("ROOT", "http://localhost/MUSIC/music/public");
	define("DBDRIVER", "mysql");
	define("DBHOST", "localhost");
	define("DBUSER", "root");
	define("DBPASS", "");
	define("DBNAME", "music-player");
}else{
	//for online server
	define("ROOT", "http://www.mywebsite.com");	

	define("DBDRIVER", "mysql");
	define("DBHOST", "localhost");
	define("DBUSER", "root");
	define("DBPASS", "");
	define("DBNAME", "music");
}
