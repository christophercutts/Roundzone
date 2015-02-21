<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 20/02/2015
 * Time: 22:18
 */

class Character_Model_Character extends Rz_Model_Db {

    var $table = "character";

    public function getName() {
        return $this->data['name'];
    }

} 