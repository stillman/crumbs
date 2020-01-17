<?php

namespace Stillman\Crumbs;

class CrumbsBuilder
{
	protected $parent = null;
	protected $parentArgs = [];

	protected $data = [];

	public function push(string $name, ?string $path = null)
	{
		$this->data[] = new Crumb($name, $path);
		return $this;
	}

	public function extends(string $name, ...$args)
	{
		$this->parent = $name;
		$this->parentArgs = $args;

		return $this;
	}

	public function getParent() : ?string
	{
		return $this->parent;
	}

	public function getParentArgs() : array
	{
		return $this->parentArgs;
	}

	public function getData() : array
	{
		return $this->data;
	}
}
