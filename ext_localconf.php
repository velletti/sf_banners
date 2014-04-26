<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'DERHANSEN.' . $_EXTKEY,
	'Pi1',
	array(
		'Banner' => 'show,getBanners,click',
	),
	/* non-cacheable actions */
	array(
		'Banner' => 'getBanners,click',
	)
);

// Register cache 'sfbanners_cache'
if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache'])) {
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache'] = array();
}
// Define string frontend as default frontend, this must be set with TYPO3 4.5 and below
// and overrides the default variable frontend of 4.6
if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['frontend'])) {
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['frontend'] = 't3lib_cache_frontend_StringFrontend';
}
if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) < '4006000') {
	// Define database backend as backend for 4.5 and below (default in 4.6)
	if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['backend'])) {
		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['backend'] = 't3lib_cache_backend_DbBackend';
	}
	// Define data and tags table for 4.5 and below (obsolete in 4.6)
	if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['options'])) {
		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['options'] = array();
	}
	if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['options']['cacheTable'])) {
		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['options']['cacheTable'] = 'cf_sfbanners_cache';
	}
	if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['options']['tagsTable'])) {
		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['sfbanners_cache']['options']['tagsTable'] = 'cf_sfbanners_cache_tags';
	}
}
