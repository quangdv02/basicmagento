<?php
/*
 * For textfield it will be:
'input' => 'text',
'type' => 'text',

For textarea it will be:
'input' => 'textarea',
'type' => 'text',

For date field it will be:
'input' => 'date',
'type' => 'datetime',

For select list it will be:
'input' => 'select',
'type' => 'text',
 * */
$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
/**
 * Adding Different Attributes
 */

// adding attribute group
$setup->addAttributeGroup('catalog_product', 'Default', 'Special Attributes', 1000);

// the attribute added will be displayed under the group/tab Special Attributes in product edit page
$setup->addAttribute('catalog_product', 'sm_text', array(
    'group'     	=> 'SM',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Testing text',
    'backend'       => '',
    'visible'       => 1,
    'required'		=> 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'sm_date', array(
    'group'     	=> 'SM',
    'input'         => 'date',
    'type'          => 'datetime',
    'label'         => 'Testing date',
    'backend'		=> "eav/entity_attribute_backend_datetime",
    'visible'       => 1,
    'required'		=> 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'is_featured', array(
    'group'     	=> 'SM',
    'label'             => 'SM is_featured',
    'type'              => 'varchar',
    'input'             => 'select',
    'backend'           => 'eav/entity_attribute_backend_array',
    'frontend'          => '',
    'source'            => 'adminhtml/system_config_source_yesno',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => true,
    'visible_on_front'  => false,
    'visible_in_advanced_search' => false,
    'unique'            => false
));

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

$installer->endSetup();