<?php
class SM_Bestseller_Block_Bestseller extends Mage_Core_Block_Template{

    public function getQty(){
        $type = Mage::getStoreConfig('bestseller_options/option/qty');
        return $type;
    }

    public function getBestSellerProduct(){
        $category = Mage::registry('current_category');
        $products = Mage::getResourceModel('reports/product_collection')
            ->addOrderedQty()
            ->addAttributeToSelect('*')
            ->setOrder('ordered_qty', 'desc')->setPageSize($this->getQty())->load();

        if($category)
            $products->addCategoryFilter($category);

//        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
//        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
//        $products->setPageSize(3)->setCurPage(1)
        return $products;
    }

    public function getStartDate(){
        $type = Mage::getStoreConfig('bestseller_options/option/start_date');
        return $type;
    }

    public function getEndDate(){
        $type = Mage::getStoreConfig('bestseller_options/option/end_date');
        return $type;
    }

}