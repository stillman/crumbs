<?php

use Stillman\Crumbs\Crumbs;
use Stillman\Crumbs\CrumbsBuilder;

class DemoCrumbs extends Crumbs
{
	public function getData(string $name) : Closure
	{
		switch ($name) {
			case 'home': return function(CrumbsBuilder $crumbs) {
				$crumbs->push('Home', '/');
			};

			case 'articles': return function(CrumbsBuilder $crumbs) {
				$crumbs->extends('home');
				$crumbs->push('Articles', '/articles');
			};

			case 'article': return function(CrumbsBuilder $crumbs, Article $article) {
				$crumbs->extends('articles');
				$crumbs->push($article->name, '/articles/'.$article->id);
			};

			default:
				throw new RuntimeException("Crumb '{$name}' not found");
		}
	}
}
