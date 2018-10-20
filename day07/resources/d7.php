// ex00

<?PHP
class Tyrion extends Lannister
{
	public function __construct()
	{
		parent::__construct();
		print("My name is Tyrion" . PHP_EOL);
	}
	public function getSize() {
		return "Short";
	}
}
?>

// ex01

<?PHP
class Greyjoy
{
	protected $familyMotto = "We do not sow";
}
?>

// ex02

<?PHP
class Targaryen
{
	public function getBurned()
	{
		if ($this->resistsFire())
		{
			return ("emerges naked but unharmed");
		}
		else
			return ("burns alive");
	}
	public function resistsFire()
	{
		return (False);
	}
}
?>

// ex03

<?PHP
class House
{
	public function introduce()
	{
		print("House " . $this->getHouseName() . " of "
		. $this->getHouseSeat() . " : \"" . $this->getHouseMotto() ."\"" . PHP_EOL);
	}
}
?>

//ex04

<?PHP
class Jaime extends Lannister
{
	public function sleepWith($someone)
	{
		$name = new ReflectionClass($someone);
		if ($name->getName() == "Sansa")
			print "Let's do this." . PHP_EOL;
		else if ($name->getName() == "Cersei")
			print "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
		else
			print ("Not even if I'm drunk !" . PHP_EOL);
	}
}
?>


<?PHP
class Lannister
{
	public function sleepWith($someone)
	{
	}
}
?>


// ex05

<?PHP
class NightsWatch
{
	public $fighter = Array();
	public function recruit($name)
	{
		$this->fighter[] = $name;
	}
	public function fight()
	{
		foreach ($this->fighter as $elem)
		{
			$temp = new ReflectionClass($elem);
			$methods = $temp->getMethods();
			$flag = 0;
			foreach ($methods as $methode)
			{
				if ($methode->getName() == "fight")
					$flag = 1;
			}
			if ($flag == 1)
				$elem->fight();
		}
	}
}
?>


<?PHP
interface IFighter
{
	public function fight();
}
?>


// ex06

<?PHP
class UnholyFactory
{
	public $fighter = Array();
	public function absorb($bonhomme)
	{
		$type = new ReflectionClass($bonhomme);
		if ($type->getParentClass())
		{
			$name = $bonhomme->returnName();
			if (array_key_exists($name, $this->fighter))
				print "(Factory already absorbed a fighter of type " . $name . ")" . PHP_EOL;
			else
			{
				print "(Factory absorbed a fighter of type " . $name . ")" . PHP_EOL;
				$this->fighter[$name] = $bonhomme;
			}
		}
		else
			print "(Factory can't absorb this, it's not  a fighter)" . PHP_EOL;
	}
	public function fabricate($fab)
	{
		if (array_key_exists($fab, $this->fighter))
		{
			print "(Factory fabricates a fighter of type " . $fab . ")" . PHP_EOL;
			return (clone $this->fighter[$fab]);
		}
		else
		{
			print "(Factory hasn't absorbed any fighter of type " . $fab . ")" . PHP_EOL;
			return (NULL);
		}
	}
}
?>

<?PHP
class Fighter
{
	public function __construct($name)
	{
		$this->name = $name;
	}
	public function returnName()
	{
		return ($this->name);
	}
}
?>
