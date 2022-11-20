<?php
namespace Ankur;

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
    
    /**
     * __construct
     *
     * @return void
     */
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
    
    /**
     * select
     *
     * @param  mixed $query
     * @param  mixed $paramType
     * @param  mixed $paramArray
     * @return void
     */
    public function select($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);

        if (! empty($paramType) && ! empty($paramArray)) {

            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }

        if (! empty($resultset)) {
            return $resultset;
        }
    }
    
    /**
     * insert
     *
     * @param  mixed $query
     * @param  mixed $paramType
     * @param  mixed $paramArray
     * @return void
     */
    public function insert($query, $paramType, $paramArray)
    {
        $stmt = $this->conn->prepare($query);
        $this->bindQueryParams($stmt, $paramType, $paramArray);

        $stmt->execute();
        $insertId = $stmt->insert_id;
        return $insertId;
    }

    /**
     * To execute query
     *
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     */
    public function execute($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);

        if (! empty($paramType) && ! empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
    }

    /**
     * 1.
     * Prepares parameter binding
     * 2. Bind prameters to the sql statement
     *
     * @param string $stmt
     * @param string $paramType
     * @param array $paramArray
     */
    public function bindQueryParams($stmt, $paramType, $paramArray = array())
    {
        $paramValueReference[] = & $paramType;
        for ($i = 0; $i < count($paramArray); $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }

    /**
     * To get database results
     *
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function getRecordCount($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);
        if (! empty($paramType) && ! empty($paramArray)) {

            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
        $stmt->store_result();
        $recordCount = $stmt->num_rows;

        return $recordCount;
    }
}
