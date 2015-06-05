<?php
$sliders = array(
    array(
        'title' => 'slider 1',
        'content' => 'content slider 1',
    ),
    array(
        'title' => 'slider 2',
        'content' => 'content slider 2',
    ),
);

foreach ($sliders as $slider) {
    Mage::getModel('slider/slider')
        ->setData($slider)
        ->save();
}