<?php

class NightsWatch implements IFighter {
	
	private $fighter = array();

	public function recruit ($who) {
		$this->fighter[] = $who;
	}

	public function fight() {

		foreach ($this->fighter as $who)
		{
			$tmp_class = new ReflectionClass($who);
			$class_methods = $tmp_class->getMethods();

			foreach ($class_methods as $method) {
				if ($method->getName() == 'fight')
					$who->fight();
			}
		}
	}
}

?>