<?php

class Tyrion extends Lannister
{
	public function sleepWith($who)
	{
		$who = new ReflectionClass($who);

		if ($who->getName() == 'Jaime')
			echo "Not even if I'm drunk !" . PHP_EOL;
		else if ($who->getName() == 'Sansa')
			echo "Let's do this." . PHP_EOL;
		else if ($who->getName() == 'Cersei')
			echo "Not even if I'm drunk !" . PHP_EOL;
	}
}

?>