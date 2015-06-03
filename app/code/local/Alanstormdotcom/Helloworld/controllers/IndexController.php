<?php
class Alanstormdotcom_Helloworld_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
//        echo 'Hello Index!';
        $this->loadLayout();
        $this->renderLayout();
    }

    public function goodbyeAction() {
//        echo 'Goodbye World!';
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * url: helloworld/index/params?foo=bar&baz=eof
     */
    public function paramsAction() {
        echo '<dl>';
        foreach($this->getRequest()->getParams() as $key=>$value) {
            echo '<dt><strong>Param: </strong>'.$key.'</dt>';
            echo '<dl><strong>Value: </strong>'.$value.'</dl>';
        }
        echo '</dl>';
    }

    public function testAction(){
        echo Mage::getStoreConfig('helloworld_options/messages/hello_message');
    }
}