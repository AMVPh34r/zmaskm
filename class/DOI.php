<?php

class DOI {
	public static $bEnabled = TRUE;

	private static $sHost;
	private static $sDatabase;
	private static $sUsername;
	private static $sPassword;
	private static $aOptions;
	private static $sConn;
	private static $oHandler = NULL;

	private static function load() {
		if (!is_file(PATH::$CONFIG_DIRECTORY . PATH::$DS . 'Database.php')) {
			self::$bEnabled = FALSE;
			return FALSE;
		}

		require_once 'config/Database.php';

		self::$sHost = DB::$sHost;
		self::$sDatabase = DB::$sName;
		self::$sUsername = DB::$sUser;
		self::$sPassword = DB::$sPass;
		self::$sConn = sprintf("mysql:host=%s;dbname=%s", self::$sHost, self::$sDatabase);
		self::$aOptions = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		);
	}

	public static function getPDO() {
		if (self::$oHandler === NULL) {
			self::load();

			if (self::$bEnabled === FALSE)
				return NULL;

			self::$oHandler = new PDO(self::$sConn, self::$sUsername, self::$sPassword, self::$aOptions);
		}

		return self::$oHandler;
	}
}