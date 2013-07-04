<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "disqus".
 *
 * Auto generated 04-07-2013 14:31
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Disqus Comments',
	'description' => 'Disqus Comments',
	'category' => 'misc',
	'shy' => 0,
	'version' => '0.0.1',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Soren Malling',
	'author_email' => 'soeren@linkfactory.dk',
	'author_company' => 'Linkfactory',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.1.0-0.0.0',
			'typo3' => '4.5.0-6.1.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:6:{s:16:"ext_autoload.php";s:4:"ff8e";s:12:"ext_icon.gif";s:4:"5af7";s:14:"ext_tables.php";s:4:"5de0";s:33:"Classes/Service/DisqusService.php";s:4:"dc00";s:34:"Configuration/TypoScript/setup.txt";s:4:"ea45";s:40:"Resources/Private/Language/locallang.xml";s:4:"62af";}',
);

?>