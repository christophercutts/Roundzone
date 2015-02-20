<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 20/02/2015
 * Time: 23:18
 */

abstract class Rz_Model_Abstract extends RoundZone {

    public function getData($key) {
        return $this->data[$key];
    }
} 