<?php

return array_replace_recursive(
    require __DIR__ . '/cache.php',
    [
        'DB' => [
            'Connections' => [
                'Default' => [
                    'dbname' => getenv('MYSQL_DATABASE'),
                    'host' => 'db',
                    'password' => getenv('MYSQL_PASSWORD'),
                    'port' => 3306,
                    'user' => getenv('MYSQL_USER'),
                ],
            ],
        ],
        'SYS' => [
            'encryptionKey' => getenv('TYPO3_ENCRYPTION_KEY'),
            'sitename' => getenv('TYPO3_INSTALL_SITE_NAME'),
            'trustedHostsPattern' => getenv('TYPO3_TRUSTED_HOSTS_PATTERN'),
        ],
        'BE' => [
            'installToolPassword' => getenv('TYPO3_INSTALL_TOOL_PASSWORD'),
        ],
    ]
);
