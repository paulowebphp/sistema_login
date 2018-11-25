<?php 

class Conexao
{

	public static $instance;

	public static function get_instance()
	{

		if ( !isset(self::$instance) )
		{

			self::$instance = new PDO(

				"mysql:host=localhost; dbname=sistema_login;", 
				"root", 
				"", 

				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')

			);


			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}#end if

		return self::$instance;

	}#END get_instance

}#END class Conexao

 ?>