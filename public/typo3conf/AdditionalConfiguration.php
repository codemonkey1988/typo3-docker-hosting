<?php

defined('TYPO3_MODE') || die();

$additionalConfig = dirname(dirname(__DIR__)) . '/config/system/' . strtolower(str_replace('/', '-', getenv('TYPO3_CONTEXT'))) . '/config.php';

$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
    $GLOBALS['TYPO3_CONF_VARS'],
    is_file($additionalConfig) ? require $additionalConfig : []
);
