<?php

use Stillman\CrumbsBuilder;

spl_autoload_register(function(string $class) {
	$prefix = 'Stillman\\Crumbs\\';

	if (strpos($class, $prefix) === 0) {
		require_once __DIR__.'/../src/'.str_replace('\\', DIRECTORY_SEPARATOR, substr($class, strlen($prefix))).'.php';
	}
	else {
		require_once __DIR__.'/'.$class.'.php';
	}
});

$crumbs = new DemoCrumbs();
$crumbs->hideLastLink = true;

$article = new Article();
$article->id = 1;
$article->name = 'Sample article';

echo $crumbs->render('article', $article);