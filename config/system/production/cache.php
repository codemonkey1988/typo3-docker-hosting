<?php

if (class_exists('redis')) {
    return [
        'SYS' => [
            'caching' => [
                'cacheConfigurations' => [
                    'cache_hash' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class,
                        'options' => [
                            'defaultLifetime' => 3600,
                            'hostname' => 'redis',
                            'database' => 2,
                        ],
                    ],
                    'cache_pages' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class,
                        'options' => [
                            'defaultLifetime' => 3600,
                            'hostname' => 'redis',
                            'database' => 3,
                        ],
                    ],
                    'cache_pagesection' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class,
                        'options' => [
                            'defaultLifetime' => 3600,
                            'hostname' => 'redis',
                            'database' => 4,
                        ],
                    ],
                    'cache_rootline' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class,
                        'options' => [
                            'defaultLifetime' => 3600,
                            'hostname' => 'redis',
                            'database' => 5,
                        ],
                    ],
                    'extbase_datamapfactory_datamap' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class,
                        'options' => [
                            'defaultLifetime' => 3600,
                            'hostname' => 'redis',
                            'database' => 6,
                        ],
                    ],
                    'extbase_reflection' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class,
                        'options' => [
                            'defaultLifetime' => 3600,
                            'hostname' => 'redis',
                            'database' => 7,
                        ],
                    ],
                    'cache_imagesizes' => [
                        'backend' => \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class,
                        'options' => [
                            'defaultLifetime' => 3600,
                            'hostname' => 'redis',
                            'database' => 8,
                        ],
                    ],
                ],
            ],
        ],
    ];
}

return [];
