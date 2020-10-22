<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Simple shop extension',
    'description' => 'An extension to manage a stock.',
    'category' => 'plugin',
    'author' => 'Ihor Kulmatytskyy',
    'author_company' => 'Resultify',
    'author_email' => 'ihor.kulmatytskyy@resultify.se',
    'state' => 'alpha',
    'clearCacheOnLoad' => true,
    'version' => '0.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.0.0-10.99.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];