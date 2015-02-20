<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 20/02/2015
 * Time: 22:18
 */

class Character_Model_Character {

    var $id;
    var $name = "Billy";


    public function load($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

} 