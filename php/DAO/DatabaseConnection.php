<?php

class DatabaseConnection {
	private static $instance;
	private $config;
	private $conn;

	private function __construct() {
		$this->config = parse_ini_file($_SESSION["root"].'php/Configuration/dataBaseConfig.ini.php');
		$host = $this->config['mysql_host'];
		$dbname = $this->config['mysql_dbname'];
		$username = $this->config['mysql_username'];
		$password = $this->config['mysql_password'];

		$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
		try {
			$this->conn = new PDO($dsn, $username, $password);
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (Exception $ex) {
			die('Unable to connect: ' . $ex->getMessage());
		}
	}
	
 	public static function getInstance()
	{
		if(!self::$instance)
		{
			self::$instance = new DatabaseConnection();
		}

		return self::$instance;
	}

	public function getConnection()
	{
		return $this->conn;
	}

}

?>