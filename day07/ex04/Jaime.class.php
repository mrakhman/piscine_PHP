<?php

class Jaime extends Lannister {
	public function sleepWith($who)
	{
		$who = new ReflectionClass($who);

		if ($who->getName() == 'Tyrion')
			echo "Not even if I'm drunk !" . PHP_EOL;
		else if ($who->getName() == 'Sansa')
			echo "Let's do this." . PHP_EOL;
		else if ($who->getName() == 'Cersei')
			echo "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
	}
}

?>