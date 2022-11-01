<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "typo3_console".
 *
 * Auto generated 11-12-2021 16:14
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'TYPO3 Console',
  'description' => 'A reliable and powerful command line interface for TYPO3 CMS',
  'category' => 'cli',
  'version' => '7.0.5',
  'state' => 'stable',
  'uploadfolder' => true,
  'clearcacheonload' => true,
  'author' => 'Helmut Hummel',
  'author_email' => 'info@helhum.io',
  'author_company' => 'helhum.io',
  'constraints' => 
  array (
    'depends' => 
    array (
      'php' => '7.4.1-8.99.99',
      'typo3' => '11.5.3-11.5.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

