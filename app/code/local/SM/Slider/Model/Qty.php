<?php
class SM_Slider_Model_Qty extends Mage_Core_Model_Abstract{
    public function toOptionArray()
    {
        return array(
            array('value'=>0, 'label'=>Mage::helper('slider')->__('0 img')),
            array('value'=>2, 'label'=>Mage::helper('slider')->__('2 img')),
            array('value'=>4, 'label'=>Mage::helper('slider')->__('4 img')),
            array('value'=>6, 'label'=>Mage::helper('slider')->__('6 img')),
            array('value'=>8, 'label'=>Mage::helper('slider')->__('8 img')),
            array('value'=>10, 'label'=>Mage::helper('slider')->__('10 img')),
        );
    }
}