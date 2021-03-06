<?php
class SM_Slider_Block_Adminhtml_Image_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('image_form', array('legend'=>Mage::helper('slider')->__('Image information')));


        $fieldset->addField('description', 'editor', array(
            'label'     => Mage::helper('slider')->__('Description'),
            'title'     => Mage::helper('slider')->__('Description'),
            'class'     => 'required-entry',
            'style'     => 'width:98%; height:200px;',
            'wysiwyg'   => false,
            'required'  => true,
            'name'      => 'description',
        ));


        $fieldset->addField('slider_id', 'text', array(
            'name'      => 'slider_id',
            'label'     => Mage::helper('slider')->__('slider id'),
            'required'  => false,
        ));

        $fieldset->addField('image', 'file', array(
            'name' => 'image',
            'label'     => Mage::helper('slider')->__('Upload Images'),
//            'class'     => 'required-entry',
            'required'  => false,
        ));

        if ( Mage::getSingleton('adminhtml/session')->getImageData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getImageData());
            Mage::getSingleton('adminhtml/session')->setImageData(null);
        } elseif ( Mage::registry('image_data') ) {
        $form->setValues(Mage::registry('image_data')->getData());
    }
        return parent::_prepareForm();
    }
}