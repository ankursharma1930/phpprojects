<?php
use Annon;

Class Config {
    /**
     * you can change the constant value later
     * 
     */
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "root";
    const DATABASENAME = 'user-registration';
    /**
     * Make this private for security reason
     */
    private $conn;

    function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getConnection(){
        try{
            $connection = new \mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASENAME);
            if(mysqli_connect_errno()){
                trigger_error("There is erro in DB conenction");
                return;
            }
            $connection->set_charset("utf8");
            return $connection;

        } catch(Exception $e) {
            echo "DB error";
        }
    }
}
