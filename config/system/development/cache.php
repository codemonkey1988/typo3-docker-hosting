<?php

$coreCaches = [];
$frontendCaches = [
    'SYS' => [
        'caching' => [
            'cacheConfigurations' => [
                'fluid_template' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class,
                    'options' => null,
                ],
                'cache_hash' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class,
                    'options' => null,
                ],
                'cache_pages' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class,
                    'options' => null,
                ],
                'cache_pagesection' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class,
                    'options' => null,
                ],
            ],
        ],
    ],
];

if (getenv('DISABLE_CORE_CACHES') === '1') {
    $coreCaches = [
        'SYS' => [
            'caching' => [
                'cacheConfigurations' => [
                    'cache_core' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class,
                        'options' => null,
                    ],
                    'cache_phpcode' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class,
                        'options' => null,
                    ],
                    'cache_runtime' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class,
                        'options' => null,
                    ],
                    'cache_rootline' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class,
                        'options' => null,
                    ],
                    'cache_imagesizes' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class,
                        'options' => null,
                    ],
                    'l10n' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class,
                        'options' => null,
                    ],
                    'extbase_object' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class,
                        'options' => null,
                    ],
                    'extbase_reflection' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class,
                        'options' => null,
                    ],
                    'extbase_datamapfactory_datamap' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class,
                        'options' => null,
                    ],
                ],
            ],
        ],
    ];
}

return array_replace_recursive(
    $frontendCaches,
    $coreCaches
);
