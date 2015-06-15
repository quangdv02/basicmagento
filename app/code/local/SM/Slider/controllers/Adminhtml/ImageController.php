<?php
class SM_Slider_Adminhtml_ImageController extends Mage_Adminhtml_Controller_Action{

    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('slider/items')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
        return $this;
    }

    public function indexAction(){
        $this->_title($this->__('Manage Slider'));
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('slider/adminhtml_image'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $imgId     = $this->getRequest()->getParam('id');
        $imgModel  = Mage::getModel('slider/image')->load($imgId);

        if ($imgModel->getId() || $imgId == 0) {

            Mage::register('image_data', $imgModel);

            $this->loadLayout();
            $this->_setActiveMenu('slider/items');

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('slider/adminhtml_image_edit'))
                ->_addLeft($this->getLayout()->createBlock('slider/adminhtml_image_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('slider')->__('Item does not exist'));
            $this->_redirect('*/*/');
        }
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function saveAction()
    {
        if ( $this->getRequest()->getPost() ) {
            try {
                $postData = $this->getRequest()->getPost();
                $imgModel = Mage::getModel('slider/image');

                $imgModel->setId($this->getRequest()->getParam('id'))
                    ->setDescription($postData['description'])
                    ->setImage($postData['image'])
                    ->setSliderId($postData['slider_id'])
                    ->save();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setsliderData(false);

                $this->_redirect('*/slider/edit/id/'.$postData['slider_id']);
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setsliderData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $imgModel = Mage::getModel('<module>/<module>');

                $imgModel->setId($this->getRequest()->getParam('id'))
                    ->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
    /**
     * Product grid for AJAX request.
     * Sort and filter result for example.
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('slider/adminhtml_image_grid')->toHtml()
        );
    }
}