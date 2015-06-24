<?php
class SM_Featured_Model_Qty extends Mage_Core_Model_Abstract{
    public function toOptionArray()
    {
        return array(
            array('value'=>3, 'label'=>Mage::helper('featured')->__('3 img')),
            array('value'=>6, 'label'=>Mage::helper('featured')->__('6 img')),
            array('value'=>9, 'label'=>Mage::helper('featured')->__('9 img')),
            array('value'=>12, 'label'=>Mage::helper('featured')->__('12 img')),
        );
    }
}