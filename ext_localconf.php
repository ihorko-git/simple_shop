<?php
defined('TYPO3_MODE') || die('Access denied');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Resultify.SimpleShop',
    'ProductList',
    [
        'SimpleShop' => 'list,new,show,buy,cart,removeFromCart',
        'Product' => 'edit,update'
    ],
    // non-cacheble actions
    [
        'SimpleShop' => 'list,new,show,buy,cart,removeFromCart',
        'Product' => 'edit,update'
    ]
);