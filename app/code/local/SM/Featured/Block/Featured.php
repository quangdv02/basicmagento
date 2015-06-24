<?php
class SM_Featured_Block_Featured extends Mage_Core_Block_Template{

    public function getFeaturedProduct(){
        $current_category = Mage::registry('current_category');
        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('is_featured',1);
        if($current_category)
            $collection->addCategoryFilter($current_category);
        return $collection;
    }
}