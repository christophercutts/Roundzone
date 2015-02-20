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

        echo "Your name is " . $_character->getName() . "<br />";

        echo $_character->getName() . " is " . $_character->getData('age') . " years old. <br />";

        echo $_character->getName() . " is a " . $_character->getData('class');

    }
}