<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 20/02/2015
 * Time: 21:56
 */

class Character_Controller_Character extends Rz_Controller_Abstract {

    function newAction() {
        echo "Create a new character";
    }

    function viewAction($id) {

        $this->loadLayout($id);
    }

}