<?php

namespace Stillman\Crumbs;

class Crumb
{
	protected $name = '';
	protected $path = '';
	protected $isLast = false;

	public function __construct(string $name, ?string $path = null)
	{
		$this->name = $name;
		$this->path = $path;
	}

	public function getName() : string
	{
		return $this->name;
	}

	public function getPath() : ?string
	{
		return $this->path;
	}

	public function setIsLast(bool $is_last) : void
	{
		$this->isLast = $is_last;
	}

	public function isLast() : bool
	{
		return $this->isLast;
	}
}
