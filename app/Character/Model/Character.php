<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 20/02/2015
 * Time: 22:18
 */

class Character_Model_Character extends Rz_Model_Abstract {

    var $dataSource = array(
        12 => array(
            'name'      => 'Billy',
            'age'       => 23,
            'gender'    => 'Male',
            'class'     => 'Mage'
        ),
        21 => array(
            'name'      => 'James',
            'age'       => 22,
            'gender'    => 'Male',
            'class'     => 'Rogue'
        ),
    );


    public function load($id) {
        $this->id = $id;
        $this->data = $this->dataSource[$this->id];
        return $this;
    }

    public function getName() {
        return $this->data['name'];
    }

} 