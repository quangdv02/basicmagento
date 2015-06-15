<?php
class SM_Slider_Block_Adminhtml_Image_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'slider';
        $this->_controller = 'adminhtml_image';
        $this->_mode = 'edit';

        $this->_updateButton('save', 'label', Mage::helper('slider')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('slider')->__('Delete Item'));
    }

    public function getHeaderText()
    {
        if( Mage::registry('image_data') && Mage::registry('image_data')->getId() ) {
            return Mage::helper('slider')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('image_data')->getTitle()));
        } else {
            return Mage::helper('slider')->__('Add Item');
        }
    }
}