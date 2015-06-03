<?php
class SM_Slider_Model_Type extends Mage_Core_Model_Abstract{
    public function toOptionArray()
    {
        return array(
            array('value'=>1, 'label'=>Mage::helper('slider')->__('type 1')),
            array('value'=>2, 'label'=>Mage::helper('slider')->__('type 2')),
            array('value'=>3, 'label'=>Mage::helper('slider')->__('type 3')),
            array('value'=>4, 'label'=>Mage::helper('slider')->__('type 4')),
        );
    }
}