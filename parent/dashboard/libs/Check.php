<?php

class Check {

    private $_client;
    private $_table;
    
    function __construct($client,$table) {
        $this->_client=$client;
        $this->_table=$table;
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

    public function id($id) {
        
        return $this->DataQuery("nationalid", $id);
    }


    /**
     * 
     * @param string $table
     * @param string $name
     * @param string $value
     * @param object $client
     * @return boolean
     */
    private function DataQuery($name, $value) {
        $count = 0;

        $result = $this->_client->select("Select * from $this->_table where $name=:$name AND parent_id!=:id", array(":$name" => $value,":id"=>  Session::get('usercodeid')));
        foreach ($result as $key => $value) {
            $count++;
        }

        return $count > 0 ? true : false;
    }
    
    public function DoubleDataQuery($firstname, $lastname) {
        $count = 0;

        $result = $this->_client->select("Select * from students where firstname=:firstname and lastname=:lastname ", array(":firstname" => $firstname,":lastname"=>$lastname));
        foreach ($result as $key => $value) {
            $count++;
        }

        return $count > 0 ? true : false;
    }

}
