<?php
class SM_Slider_Model_Resource_Image_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
    public function _construct()
    {
        $this->_init('slider/image');
    }
}