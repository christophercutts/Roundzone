<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 21/02/2015
 * Time: 00:44
 */

abstract class Rz_Block_Abstract {

    var $template;

    public function setTemplate($template) {
        $this->template = $template;
    }

    public function render() {
        include 'design/' . $this->template;
    }
} 