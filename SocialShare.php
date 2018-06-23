<?php

if (function_exists('wfLoadExtension')) {
    wfLoadExtension('SocialShare');
    $wgMessagesDirs['SocialShare'] = __DIR__ . '/i18n';
    wfWarn(
        'Deprecated PHP entry point used for extension. Please use wfLoadExtension instead, ' .
        'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
    );
    return;
} else {
    die('This extension requires MediaWiki 1.25+');
}