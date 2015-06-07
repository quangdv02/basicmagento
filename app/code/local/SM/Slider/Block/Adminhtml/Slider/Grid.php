<?php
class SM_Slider_Block_Adminhtml_Slider_Grid extends Mage_Adminhtml_Block_Widget_Grid{

    public function __construct()    {
        parent::__construct();
        $this->setId('sliderGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()    {
        $collection = Mage::getModel('slider/slider')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()    {
        $this->addColumn('entity_id',
            array(
                'header' => 'ID',
                'align'  =>'right',
                'width'  => '50px',
                'index'  => 'entity_id',
            ));
        $this->addColumn('title',
            array(
                'header' => 'Title',
                'align'  =>'left',
                'index'  => 'title',
            ));
        $this->addColumn('content', array(
            'header' => 'Content',
            'align'  =>'left',
            'index'  => 'content',
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

    protected function _prepareMassaction()    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('slider');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'    => Mage::helper('slider')->__('Delete'),
            'url'      => $this->getUrl('*/*/massDelete'),
            'confirm'  => Mage::helper('slider')->__('Are you sure?')
        ));
        return $this;
    }

    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}