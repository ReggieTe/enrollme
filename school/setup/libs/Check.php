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
    public function name($name) {
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

    public function id($email) {
        return $this->DataQuery("nationalid", $email);
    }

    public function facebook($email) {
        return $this->DataQuery("facebook", $email);
    }

    public function twitter($email) {
        return $this->DataQuery("twitter", $email);
    }

    public function linkedin($email) {
        return $this->DataQuery("linkedin", $email);
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
