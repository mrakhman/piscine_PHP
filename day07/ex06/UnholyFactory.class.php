<?php

class UnholyFactory {
	private $_fighter = array();
	public function absorb($class_name)
	{
		if (get_parent_class($class_name) != 'Fighter')
		{
			print ("(Factory can't absorb this, it's not  a fighter)" . PHP_EOL);
			return ;
		}
		if (!in_array($class_name, $this->_fighter))
		{
			$this->_fighter[$class_name->getName()] = $class_name;
			print ("(Factory absorbed a fighter of type " . $class_name->getName() . ")" . PHP_EOL);
		}
		else
			print ("(Factory already absorbed a fighter of type " . $class_name->getName() . ")" . PHP_EOL);

	}

	public function fabricate($requested_fighter)
	{
		if (array_key_exists($requested_fighter, $this->_fighter))
		{
			print ("(Factory fabricates a fighter of type " . $requested_fighter . ")" . PHP_EOL);
			return (clone $this->_fighter[$requested_fighter]);
		}
		else
		{
			print ("(Factory hasn't absorbed any fighter of type " . $requested_fighter . ")" . PHP_EOL);
			return NULL;
		}
	}
}

?>