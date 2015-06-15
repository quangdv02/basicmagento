<?php
class SM_Slider_Block_Adminhtml_Image_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form{

    protected function _prepareForm()
    {
        $sliderId = $this->getRequest()->getParam('slider_id');
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('image_form', array('legend'=>Mage::helper('slider')->__('Image information')));

        $fieldset->addField('slider_id', 'hidden', array(
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'slider_id',
            'value'     => $sliderId,
        ));

        $fieldset->addField('description', 'editor', array(
            'label'     => Mage::helper('slider')->__('Description'),
            'title'     => Mage::helper('slider')->__('Description'),
            'class'     => 'required-entry',
            'style'     => 'width:98%; height:200px;',
            'wysiwyg'   => false,
            'required'  => true,
            'name'      => 'description',
        ));


        $fieldset->addField('image', 'text', array(
            'name'      => 'image',
            'label'     => Mage::helper('slider')->__('Image'),
            'required'  => true,
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