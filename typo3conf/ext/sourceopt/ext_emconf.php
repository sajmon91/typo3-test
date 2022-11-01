<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "sourceopt".
 *
 * Auto generated 25-02-2022 11:35
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Source Optimization',
  'description' => 'Optimization of the final page: reformatting the (x)html output, removal of new lines, quotes and optional combine referenced SVGs into one symbol-file via <use/>.',
  'category' => 'fe',
  'version' => '4.0.3',
  'state' => 'stable',
  'uploadfolder' => true,
  'clearcacheonload' => true,
  'author' => 'Dr. Ronald P. Steiner, Boris Nicolai, Tim Lochmueller, Marcus Förster',
  'author_email' => 'ronald.steiner@googlemail.com, boris.nicolai@andavida.com, tim@fruit-lab.de',
  'author_company' => NULL,
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '9.5.17-11.5.99',
      'php' => '7.3.0-8.0.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

