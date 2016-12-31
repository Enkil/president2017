<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

mb_internal_encoding("UTF-8");

$app['title'] = '';
$app['description'] = '';
$app['domain'] = "http://".$_SERVER['SERVER_NAME'];
$app['googleSiteVerification'] = '';
$app['yandexVerification'] = '';
$app['yandexMetrika'] = '';
$app['googleAnalytics'] = '';
$app['CallbackkillerID'] = '';

$settings['sypexGeoApiKey'] = '';

$settings['smsRecipietns'] = '';
$settings['smsRuApiKey'] = '';

$settings['EmailRecipients'] = [''];
$settings['EmailReplyTo'] = [''];
$settings['EmailFromAddr'] = '';
$settings['EmailFromName'] = '';
$settings['EmailSubject'] = "Новая заявка с сайта ". $_SERVER['SERVER_NAME'] ."";
$settings['EmailSMTPHosts'] = '';
$settings['EmailSMTPUser'] = '';
$settings['EmailSMTPPassword'] = '';
$settings['EmailSMTPSecure'] = 'tls';
$settings['EmailSMTPPort'] = 587;

$settings['fileForRequests'] = 'requests.csv';

$settings['googleSpreedSheetsAppName'] = '';
$settings['googleSpreedSheetsClientId'] = 'ХХХХ.apps.googleusercontent.com';
$settings['googleSpreedSheetsClientEmail'] = '';
$settings['googleSpreedSheetsClientSecrets'] = '';
$settings['googleSpreedSheetsP12'] = '';

$settings['googleSpreedSheetsScope'] = 'https://spreadsheets.google.com/feeds';

$settings['googleSpreedSheetsSpreedSheetID'] = 'https://spreadsheets.google.com/feeds/spreadsheets/private/full/XXXXX';
$settings['googleSpreedSheetsWorkSheetID'] = 'XXXX';


