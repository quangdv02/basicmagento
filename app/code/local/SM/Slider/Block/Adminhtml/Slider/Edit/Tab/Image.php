<?php
class SM_Slider_Block_Adminhtml_Slider_Edit_Tab_Image extends Mage_Adminhtml_Block_Widget_Grid{
    public function __construct()
    {
        parent::__construct();
        $this->setId('imageGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    // add button new image
    public function getMainButtonsHtml()
    {
        $sliderId = Mage::app()->getRequest()->getParam('id');
        $html = parent::getMainButtonsHtml(); //get the parent class buttons
        $addButton = $this->getLayout()->createBlock('adminhtml/widget_button') //create the add button
        ->setData(array(
                'label' => Mage::helper('adminhtml')->__('Add New Image'),
                'onclick' => "setLocation('" . $this->getUrl('*/image/new/slider_id/' . $sliderId) . "')",
                'class' => 'add'
            ))->toHtml();
        return $addButton . $html;
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('slider/image')
            ->getCollection()
            ->addFieldToFilter('slider_id', $this->getRequest()->getParam('id'));
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => Mage::helper('slider')->__('ID'),
            'align' => 'center',
            'width' => '50px',
            'index' => 'entity_id',
        ));

        $this->addColumn('description', array(
            'header' => 'Description',
            'align'  =>'left',
            'index'  => 'description',
        ));

        $this->addColumn('image', array(
            'header' => 'Image',
            'align'  =>'center',
            'index'  => 'image',
        ));

        $this->addColumn('action',
            array(
                'header'    => 'Action',
                'width'     => '100px',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('slider')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
            ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/editimage', array('id' => $row->getId(), 'slider_id' => $row->getSliderId()));
    }

}