<?php

class House {
	public function introduce()	{
		echo ("house " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : \"" . $this->getHouseMotto() . "\"" . PHP_EOL);
	}
}

?>