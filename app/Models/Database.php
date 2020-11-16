<?php
namespace App\Models;

class Database
{
    private $host = 'mysql';
    private $user = 'sample_user';
    private $pass = 'sample@12368';
    private $dbname = 'sample_db';

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->dbh = new \PDO($dsn, $this->user, $this->pass, $options);
        } catch(\PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
        catch (\Exception $e)
        {
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
        $this->execute();
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
}