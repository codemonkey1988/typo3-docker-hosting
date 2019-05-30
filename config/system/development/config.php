<?php

return array_replace_recursive(
    include dirname(__DIR__) . '/production/config.php',
    include __DIR__ . '/cache.php',
    [
        'SYS' => [
            'displayErrors' => 1,
            'devIPmask' => '*',
            'sqlDebug' => 1,
            'enableDeprecationLog' => 'file',
            'trustedHostsPattern' => '.*',
            'systemLogLevel' => 0,
            'exceptionalErrors' => 12290
        ],
        'BE' => [
            'debug' => true,
            'sessionTimeout' => 31536000,
            'enabledBeUserIPLock' => false,
            'lockSSL' => 0,
        ],
        'FE' => [
            'debug' => true,
            'compressionLevel' => 0,
        ],
        'GFX' => [
            'processor' => 'ImageMagick',
            'processor_effects' => '1',
            'processor_allowTemporaryMasksAsPng' => '',
            'processor_colorspace' => 'sRGB',
        ],
        'LOG' => [
            'TYPO3' => [
                'CMS' => [
                    'deprecations' => [
                        'writerConfiguration' => [
                            \TYPO3\CMS\Core\Log\LogLevel::NOTICE => [
                                \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                                    'logFileInfix' => 'deprecations',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ]
);
