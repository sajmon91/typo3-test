<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "content_slug".
 *
 * Auto generated 25-02-2022 11:36
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Speaking URL fragments (anchors)',
  'description' => 'Adds a slug field for human-readable anchors ("domain.com/page/#my-section") to TYPO3 content elements. By default, this anchor is rendered as the header\'s id attribute.',
  'category' => 'fe',
  'version' => '2.1.0',
  'state' => 'stable',
  'uploadfolder' => false,
  'clearcacheonload' => false,
  'author' => 'Sebastian Klein',
  'author_email' => 'sebastian@sebkln.de',
  'author_company' => NULL,
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '10.4.0-11.5.99',
      'fluid_styled_content' => '',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

