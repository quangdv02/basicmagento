<?php
class SM_Slider_IndexController extends Mage_Core_Controller_Front_Action{
    public function indexAction(){
        $this->loadLayout();
        $this->renderLayout();
    }

    public function testAction(){
        $collection = Mage::getModel('slider/slider')->getCollection()->getData();
        print_r($collection);
    }
}