<?php
/**
 * SpecialTemplateTable
 *
 * Copyright 2015 Rusty Burchfield
 *
 * Licensed under GPLv2 or later (see COPYING)
 */

class SpecialTemplateTable extends SpecialPage {
  function __construct() {
    parent::__construct('TemplateTable', 'read');
  }

  function execute($articleName) {
    global $wgParser, $wgUser, $wgTitle;
    $frame = false;

    $request = $this->getRequest();
    $args = $request->getQueryValues();

    $parserOptions = ParserOptions::newFromUser($wgUser);

    $table = TemplateTableRenderer::execute($articleName, $args, $parserOptions);

    $output = $this->getOutput();
    $output->addWikiText($table);
  }
}
