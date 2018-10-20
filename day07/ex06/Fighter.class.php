<?php

abstract class Fighter
{
	protected $_name;
	public function __construct($n)
	{
		$this->_name = $n;
	}

	public function getName()
	{
		return($this->_name);
	}
	abstract public function fight ($target);
}

?>