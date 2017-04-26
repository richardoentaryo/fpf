<?php
/**
 *
 */
class Database
{
    // this is the singleton instance
    // only returns one pdo connection instance
    private $pdo = null;

    private $dsn = null;

    private $dbUsername = null;

    private $dbPassword = null;

    private $statement = null;

    static $instance;

    private function __construct()
    {
        $this->dbUsername = Config::get("DB_USER");
        $this->dbPassword = Config::get("DB_PASS");

        if(Config::get("DB_DSN") == "mysql")
        {
            $this->dsn = 'mysql:' .
            'host='     . Config::get("DB_HOST") . ';' .
            'dbname='   . Config::get("DB_NAME");
        }
        else if(Config::get("DB_DSN") == "pgsql")
        {
            $this->dsn = 'pgsql:' .
            'host='     . Config::get("DB_HOST") . ';' .
            'dbname='   . Config::get("DB_NAME");
        }
        else if(Config::get("DB_DSN") == "sqlsrv")
        {
            $this->dsn = 'sqlsrv:' .
            'Server='   . Config::get("DB_HOST") . ';' .
            'Database=' . Config::get("DB_NAME");
        }
        else if(Config::get("DB_DSN") == "firebird")
        {
            $this->dsn = 'firebird:' .
            'dbname='   . Config::get("DB_NAME") . ';' .
            'host='     . Config::get("DB_HOST");
        }

        try {
			$this->pdo = new PDO($this->dsn, $this->dbUsername, $this->dbPassword);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Connection failed with error message : " . $e->getMessage();
		}
    }

    private function __clone(){}

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getInstanceOfPDO()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }

    public function executeQuery($query)
    {
        $pdo = self::getInstanceOfPDO();

        $statement = $pdo->prepare($query);
		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
    }

    // this method is not going to be used in most scenario
    public function getPDO()
    {
        return $this->pdo;
    }
}

?>
