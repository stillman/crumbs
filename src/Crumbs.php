<?php

namespace Stillman\Crumbs;

abstract class Crumbs
{
	public $hideLastLink = false;

	/** @var Crumb[] */
	protected $crumbs = [];

	protected $viewFile = __DIR__.'/../views/crumbs.php';

	public function render(string $name, ...$args) : string
	{
		$crumbs = $this->getCrumbs($name, ...$args);
		ob_start();
		require $this->viewFile;

		return ob_get_clean();
	}

	public function getCrumbs(string $name, ...$args) : array
	{
		$crumbs = $this->compile($name, ...$args);

		$crumbs_cnt = count($crumbs);

		if ($crumbs_cnt) {
			// Mark crumb as last
			$crumbs[$crumbs_cnt - 1]->setIsLast(true);
		}

		return $crumbs;
	}

	protected function compile(string $name, ...$args) : array
	{
		$result = [];

		$builder = new CrumbsBuilder();

		if (!isset($this->crumbs[$name])) {
			$this->crumbs[$name] = $this->getData($name);
		}

		call_user_func($this->crumbs[$name], $builder, ...$args);

		if ($builder->getParent()) {
			$parent = $this->compile($builder->getParent(), $builder->getParentArgs());

			foreach ($parent as $p) {
				$result[] = $p;
			}
		}

		foreach ($builder->getData() as $crumb) {
			$result[] = $crumb;
		}

		return $result;
	}

	abstract public function getData(string $name) : \Closure;
}
