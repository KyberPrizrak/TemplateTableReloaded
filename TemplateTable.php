<?php
/**
 * TemplateTableReloaded Extension
 *
 * Copyright 2006 CS "Kainaw" Wagner
 * Copyright 2015 Rusty Burchfield
 *
 * Licensed under GPLv2 or later (see COPYING)
 */

$wgExtensionCredits['parserhook'][] = array(
  'path' => __FILE__,
  'name' => 'TemplateTableReloaded',
  'version' => '1.0',
  'url' => 'https://www.mediawiki.org/wiki/Extension:TemplateTableReloaded',
  'author' => array('CS "Kainaw" Wagner', 'Rusty Burchfield'),
  'description' => 'Render a table of parameters passed to a template.',
);

$wgAutoloadClasses['TemplateTableRenderer'] = __DIR__ . '/TemplateTableRenderer.php';
$wgAutoloadClasses['TemplateTableParser'] = __DIR__ . '/TemplateTableParser.php';

$wgHooks['ParserFirstCallInit'][] = 'wfTemplateTableInit';
function wfTemplateTableInit($parser) {
  global $wgTemplateTableTagName;
  $parser->setHook($wgTemplateTableTagName, 'TemplateTableRenderer::execute');

  return true;
}

$wgHooks['BeforePageDisplay'][] = 'wfTemplateTableLoadAssets';
function wfTemplateTableLoadAssets($out, $skin) {
  $out->addModules('ext.TemplateTableReloaded');

  return true;
}

$wgResourceModules['ext.TemplateTableReloaded'] = array(
  'scripts' => 'assets/script.js',
  'styles' => 'assets/styles.css',
  'localBasePath' => __DIR__,
  'remoteExtPath' => basename(__DIR__)
);

$wgTemplateTableDefaultRowLimit = 500;
$wgTemplateTableMaxRowLimit = 1000;
$wgTemplateTableDefaultClasses = 'wikitable';
$wgTemplateTableTagName = 'ttable';
