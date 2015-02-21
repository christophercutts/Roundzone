<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 20/02/2015
 * Time: 22:58
 */

class Character_Block_View extends Rz_Block_Abstract {

    var $character;

    function toHtml($id) {

        $this->setCharacter($id);

        $this->setTemplate('character/view.phtml');
        $this->render();

    }

    function setCharacter($id) {
        $this->character = RoundZone::getModel('character')->load($id);
    }

    function getCharacter() {
        return $this->character;
    }
}