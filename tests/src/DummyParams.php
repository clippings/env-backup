<?php

namespace CL\EnvBackup\Test;

use CL\EnvBackup\Params;
use CL\EnvBackup\Notset;

/**
 * Used in testing
 *
 * @package Openbuildings\EnvironmentBackup
 * @author Ivan Kerin
 * @copyright  (c) 2011-2013 Despark Ltd.
 */
class DummyParams implements Params {

	public $variables = array();

	public function set($name, $value)
	{
		if ($value instanceof Notset)
		{
			unset($this->variables[$name]);
		}
		else
		{
			$this->variables[$name] = $value;
		}
	}

	public function get($name)
	{
		return isset($this->variables[$name]) ? $this->variables[$name] : new Notset;
	}

	public function has($name)
	{
		return strpos($name, 'test_') === 0;
	}
}
