<?php
Class Color
{
	public $red;
	public $green;
	public $blue;
	static $verbose = FALSE;

	public function __construct( array $color )
	{
		if (array_key_exists('red', $color) && array_key_exists('green', $color) && array_key_exists('blue', $color))
		{
			$this->red = intval($color['red']);
			$this->green = intval($color['green']);
			$this->blue = intval($color['blue']);
		}
		else if (array_key_exists('rgb', $color))
		{
			$rgb = intval($color['rgb']);
			$this->red = ($rgb >> 16) & 0xFF;
			$this->green = ($rgb >> 8) & 0xFF;
			$this->blue = ($rgb) & 0xFF;
		}
		if (self::$verbose == TRUE)
			print("$this constructed.".PHP_EOL);
	}

	public function __toString()
	{
		return sprintf("Color ( red: %3d, green: %3d, blue: %3d ) ", $this->red, $this->green, $this->blue);
	}

	static function doc()
	{
		echo (file_get_contents("Color.doc.txt"));
	}

	function add( Color $rhs )
	{
		return new Color( array('red' => $this->red + $rhs->red, 'green' => $this->green + $rhs->green, 'blue' => $this->blue + $rhs->blue));
	}

	function sub( Color $rhs )
	{
		return new Color( array('red' => $this->red - $rhs->red, 'green' => $this->green - $rhs->green, 'blue' => $this->blue - $rhs->blue));
	}

	function mult( $f )
	{
		return new Color( array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f));
	}

	function __destruct()
	{
		if (self::$verbose == TRUE)
			print("$this destructed.".PHP_EOL);
		return ;
	}
}

?>
