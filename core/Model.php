<?php

/**
 *
 */
abstract class Model
{
    // variable to store the table name of current model
    protected $table = null;

    protected $database = null;

    protected $statement = null;

    protected $pdo = null;

    public function __construct()
    {
        $this->database     = Database::getInstance();
        $this->pdo          = Database::getInstanceOfPDO();
    }

    // select all rows of a specific table
    // return both associated and indexed results
    public function fetchAll($tableName, $limit = 0, $offset = 0)
    {
        if($limit > 0)
        {
            if($offset > 0)
            {
                $query = $this->pdo->prepare("select * from " . $tableName . " limit " . $limit . " offset " . $offset);
            }
            else
            {
                $query = $this->pdo->prepare("select * from " . $tableName . " limit " . $limit);
            }
        }
        else
        {
            $query = $this->pdo->prepare("select * from " . $tableName);
        }

		$query->execute();
		return $query->fetchAll();
    }

    // select all rows of a specific table
    // return associated result
    public function fetchAllAssoc($tableName, $limit = 0, $offset = 0)
    {
        if($limit > 0)
        {
            if($offset > 0)
            {
                $query = $this->pdo->prepare("select * from " . $tableName . " limit " . $limit . " offset " . $offset);
            }
            else
            {
                $query = $this->pdo->prepare("select * from " . $tableName . " limit " . $limit);
            }
        }
        else
        {
            $query = $this->pdo->prepare("select * from " . $tableName);
        }

		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // select certain collumn of a specific table
    // return both associated and indexed results
    public function select($selectString, $tableName, $limit = 0, $offset = 0)
    {
        if($limit > 0)
        {
            if($offset > 0)
            {
                $query = $this->pdo->prepare("select " . $selectString . " from " . $tableName . " limit " . $limit . " offset " . $offset);
            }
            else
            {
                $query = $this->pdo->prepare("select " . $selectString . " from " . $tableName . " limit " . $limit);
            }
        }
        else
        {
            $query = $this->pdo->prepare("select " . $selectString . " from " . $tableName);
        }

		$query->execute();
		return $query->fetchAll();
    }

    // select certain collumn of a specific table
    // return both associated and indexed results
    public function selectWhere($selectString, $tableName, $whereClause, $limit = 0, $offset = 0)
    {

        $arrWhereStatement = array();
        $whereStatement = "";

        foreach ($whereClause as $key => $value)
        {
            $explodeKey = explode(" ", $key);

            if(count($explodeKey) == 2)
            {
                $arrWhereStatement[] = $key . $value;
            }
            else
            {
                $arrWhereStatement[] = $key . " = " . $value;
            }
        }

        if(count($arrWhereStatement >= 2))
            $whereStatement = implode(" and ", $arrWhereStatement);
        else
            $whereStatement = $arrWhereStatement[0];

        if($limit > 0)
        {
            if($offset > 0)
            {
                $query = $this->pdo->prepare("select " . $selectString . " from " . $tableName . " where " . $whereStatement . " limit " . $limit . " offset " . $offset);
            }
            else
            {
                $query = $this->pdo->prepare("select " . $selectString . " from " . $tableName . " where " . $whereStatement . " limit " . $limit);
            }
        }
        else
        {
            $query = $this->pdo->prepare("select " . $selectString . " from " . $tableName . " where " . $whereStatement);
        }

        $query->execute();
		return $query->fetchAll();
    }

    // this mmethod is for initializing the prepared statement
    public function prepare($query)
    {
        $this->statement = $this->pdo->prepare($query);
    }

    // this method below is for binding a value to a parameter
    public function bindValue($param, $value)
    {
        $type = self::getPDOType($value);
        $this->statement->bindValue($param, $value, $type);
    }

    // this method below is for binding a parameter to the specified variable name
    public function bindParam($param, &$var)
    {
        $type = self::getPDOType($var);
        $this->statement->bindParam($param, $var, $type);
    }

    // this method is utilized for executing the statement that was prepared before
    // take input param as an option
    // the param is in array of named param or something like placeholders
    // all param values all are treated as PDO::PARAM_STR.
    // returns TRUE on success and FALSE on failure
    public function execute($arr = null)
    {
        if($arr === null)  return $this->statement->execute();
        else               return $this->statement->execute($arr);
    }

    // fetch only a single column in form of 0-indexed array
    public function fetchColumn()
    {
        return $this->statement->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    // fetch the result data in form of [0-indexed][key][value] array
    public function fetchAllAssociative()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // fetch Only the next row from the result data in form of [key][value] array
    public function fetchAssociative()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    // fetch All the data in form of [0-indexed][an anonymous object
    // with property names that correspond to the column names] array
    public function fetchAllObject()
    {
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // fetch Only the next row from the result data in form of an anonymous object
    // with property names that correspond to the column names
    public function fetchObject()
    {
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    // fetch All data in form of an array indexed by both column name and 0-indexed column
    public function fetchAllBoth()
    {
        return $this->statement->fetchAll(PDO::FETCH_BOTH);
    }

    // fetch Only the next row from the result data in form of an array indexed by both column name and 0-indexed column
    public function fetchBoth()
    {
        return $this->statement->fetch(PDO::FETCH_BOTH);
    }

    // returns the number of rows affected by the last SQL statement
    public function countTableRows($tableName)
    {
        $this->prepare("select * from " . $tableName);
        $this->execute();
        return $this->statement->rowCount();
    }

    // returns the ID of the last inserted row or sequence value
    public function lastInsertedId()
    {
        return $this->pdo->lastInsertId();
    }

    // Start a transaction
    public function beginTransaction()
    {
        $this->pdo->beginTransaction();
    }

    // commit a transaction. This method will be called after beginTransaction()
    public function commit()
    {
        $this->pdo->commit();
    }

    // rollback a transaction. This method will be called after beginTransaction()
    public function rollBack()
    {
        $this->pdo->rollBack();
    }

    private static function getPdoType($value)
    {
        if(is_int($value))       { return PDO::PARAM_INT; }
        else if(is_bool($value)) { return PDO::PARAM_BOOL; }
        else if(is_null($value)) { return PDO::PARAM_NULL; }
        else                     { return PDO::PARAM_STR; }
    }
}

?>
