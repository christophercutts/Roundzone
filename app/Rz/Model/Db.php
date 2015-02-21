<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 21/02/2015
 * Time: 22:30
 */

abstract class Rz_Model_Db extends Rz_Model_Abstract {

    var $db;
    var $result;
    var $table;

    public function load($id) {
        $this->id = $id;
        $this->data = $this->getOne($this->id);
        return $this;
    }

    function getOne($id) {
        $this->connect();
        if(!$this->result = $this->db->query("SELECT * FROM `" . $this->table . "` WHERE `id`='" . $id . "'")){
            die('There was an error running the query [' . $this->db->error . ']');
        }
        return $this->result->fetch_assoc();
    }

    function connect() {
        $this->db = new mysqli('localhost', 'roundzone', 'bneVEyqmBudCDYx3', 'roundzone');
        if($this->db->connect_errno > 0){
            die('Unable to connect to database [' . $this->db->connect_error . ']');
        }
    }

} 