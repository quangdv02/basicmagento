<?php
$installer = $this;
$installer->startSetup();
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$setup->removeAttribute( 'catalog_product', 'sm_select' );
$setup->removeAttribute( 'catalog_product', 'is_featured' );
$installer->endSetup();