<?php

/**
 * Description of Student
 *
 * @author Reggie Te
 */
class Student {

    //put your code here
    private $_userid;
    private $_studentid;
    private $_client;

    public function __construct($studentid = null, $client = null) {
        $this->_studentid = $studentid;
        $this->_client = $client;
        $this->_userid = Session::get('usercodeid');
    }

    public function setUserId($userid) {
        $this->_userid = $userid;
    }

    public function setStudentId($studentid) {

        $this->_studentid = $studentid;
    }

    public function setStudentIdFromSession() {

        if (empty(Session::get('currentStudentId'))) {
            
            $this->_studentid = filter_var($_GET['ref'], FILTER_SANITIZE_STRING);
            $_SESSION['currentStudentId'] = $this->_studentid;
            
            //echo $_SESSION['currentStudentId'] ;
           // $_SESSION['currentStudentName']=  $this->getName();
        } else {
            $this->_studentid = $_SESSION['currentStudentId'];
            //$_SESSION['currentStudentName']=  $this->getName();
        }
    }

    public function getCode() {

        return $this->getStudentDetails()[0]['id'];
    }

    public function getFirstName() {

        return $this->getStudentDetails()[0]['firstname'];
    }
    public function getLastName() {

        return $this->getStudentDetails()[0]['lastname'];
    }
    public function getDOB() {

        return $this->getStudentDetails()[0]['dob'];
    }
    public function getGender() {

        return $this->getStudentDetails()[0]['gender'];
    }
    public function getAge() {

        return $this->getStudentDetails()[0]['age'];
    }
    public function getPoints() {

        return $this->getStudentDetails()[0]['points'];
    }
    public function getSpecialNeeds() {

        return $this->getStudentDetails()[0]['special_needs'];
    }
    public function getSchools() {

        return $this->getStudentDetails()[0]['schools'];
    }
    public function getAccepted() {

        return $this->getStudentDetails()[0]['accepted'];
    }
    public function getState() {

        return $this->getStudentDetails()[0]['state'];
    }
   

    public function getDate() {

        return $this->getStudentDetails()[0]['date'];
    }

    public function getLastUpDate() {

        //return $this->getStudentDetails()[0]['lastupdate'];
    }

    public function saveChange($data = array()) {

        return $this->_client->update('students', $data, "parent_id='$this->_userid' AND id='$this->_studentid' ");
    }

    public function getAllStudents() {

        return $this->_client->select("SELECT * FROM students WHERE parent_id=:id ", array(":id" => $this->_userid));
    }

    public function delete() {
        if (Upload::deleteFiles($this->_userid, $this->_studentid, 'students')) {
            return $this->_client->delete('students', "id='$this->_studentid' AND parent_id='" . $this->_userid . "'");
        } else {
            return false;
        }
    }

    public function getStudentCount() {
        $count = 0;
        foreach ($this->getAllStudents() as $key => $value) {
            $count++;
        }

        return $count;
    }

    private function getStudentDetails() {

        return $this->_client->select("SELECT * FROM students WHERE parent_id=:id AND id=:studentid LIMIT 1", array(":id" => $this->_userid, ':studentid' => $this->_studentid));
    }

}
