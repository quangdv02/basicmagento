<?php
class SM_Slider_IndexController extends Mage_Core_Controller_Front_Action{
    public function indexAction(){
        $this->loadLayout();
        $this->renderLayout();
    }

    public function testAction(){
        $slider = Mage::getModel('slider/slider')->getCollection()->addFieldToFilter('status',1)->getData();
        $sliderId = $slider[0]['entity_id'];
        $image = Mage::getModel('slider/image')->getCollection()->addFieldToFilter('slider_id',$sliderId)->getData();
        echo "<pre>";
        print_r($image);
    }
}