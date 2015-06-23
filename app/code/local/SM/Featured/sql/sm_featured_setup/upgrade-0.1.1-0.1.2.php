<?php
$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
$setup->addAttribute('catalog_product', 'sm_select', array(
    'group'     	    => 'SM',
    'label'             => 'Test select',
    'type'              => 'varchar',
    'input'             => 'select',
    'backend'           => 'eav/entity_attribute_backend_array',
    'frontend'          => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => true,
    'option'            => array (
        'value' => array(
            'optionone' => array('Sony'),
            'optiontwo' => array('Samsung'),
            'optionthree' => array('Apple'),
        )
    ),
    'visible_on_front'  => false,
    'visible_in_advanced_search' => false,
    'unique'            => false
));

$setup->addAttribute('catalog_product', 'is_featured', array(
    'group'     	    => 'SM',
    'label'             => 'Is featuted',
    'type'              => 'int',
    'input'             => 'boolean',
    'default'           => 0,
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => true,
));

$installer->endSetup();