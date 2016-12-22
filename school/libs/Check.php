<?php

class Check {

    private $_client;
    
    function __construct($client) {
       
        $this->_client=$client;
        
    }

    /**
     * 
     * @param string $table
     * @param string $name
     * @param object $client
     * @return boolean
     * 
     */
    public function name($name=null) {
        return $this->DataQuery("name", $name);
    }

    /**
     * 
     * @param string$table
     * @param string $phone
     * @param object $client
     * @return boolean
     */
    public function phone($phone) {
        return $this->DataQuery("phone", $phone);
    }

    /**
     * 
     * @param string $table
     * @param string $email
     * @param object $client
     * @return boolean
     */
    public function email($email) {
        return $this->DataQuery("email", $email);
    }

    /**
     * 
     * @param string $table
     * @param string $name
     * @param string $value
     * @param object $client
     * @return boolean
     */
    function DataQuery($name, $value) {
        $count = 0;

        $result = $this->_client->select("Select * from userdeveloper where $name=:$name", array(":$name" => $value));
        foreach ($result as $key => $value) {
            $count++;
        }

        return $count > 0 ? true : false;
    }

}
