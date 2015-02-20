<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 20/02/2015
 * Time: 22:58
 */

class Character_Block_View {

    function toHtml($id) {
        $_character = RoundZone::getModel('character')->load($id);

        echo "Your character's name is: " . $_character->getName();
    }
}