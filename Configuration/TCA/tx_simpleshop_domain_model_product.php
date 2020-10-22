<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:simple_shop/Resources/Private/Language/locallang_db.xlf:tx_simpleshop_domain_model_product',
        'label' => 'name',
        'iconfile' => 'EXT:simple_shop/Resources/Public/Icons/Product.svg',
    ],
    'columns' => [
        'name' => [
            'label' => 'LLL:EXT:simple_shop/Resources/Private/Language/locallang_db.xlf:tx_simpleshop_domain_model_product.item_label',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
            ],
        ],
        'description' => [
            'label' => 'LLL:EXT:simple_shop/Resources/Private/Language/locallang_db.xlf:tx_simpleshop_domain_model_product.item_description',
            'config' => [
                'type' => 'text',
                'eval' => 'trim',
            ],
        ],
        'price' => [
            'label' => 'LLL:EXT:simple_shop/Resources/Private/Language/locallang_db.xlf:tx_simpleshop_domain_model_product.item_price',
            'config' => [
                'type' => 'input',
                'size' => '4',
                'eval' => 'double2',
            ],
        ],

        'images' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'maxitems' => 6,
                    'minitems'=> 0
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            )
        ],


    ],
    'types' => [
        '0' => ['showitem' => 'name, description, images, price'],
    ],
];