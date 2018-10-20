<?php

Class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	static $verbose = FALSE;

	public function __construct( array $vertex )
	{
		if (array_key_exists('x', $vertex) && array_key_exists('y', $vertex) && array_key_exists('z', $vertex))
		{
			$this->_x = $vertex['x'];
			$this->_y = $vertex['y'];
			$this->_z = $vertex['z'];
		}
		if (array_key_exists('w', $vertex))
			$this->_w = $vertex['w'];
		if (array_key_exists('color', $vertex))
			$this->_color = new Color(array('red' => $vertex['color']->red, 'green' => $vertex['color']->green, 'blue' => $vertex['color']->blue));
		else
			$this->_color = ( new Color( array( 'red' => 255, 'green' => 255, 'blue' => 255 )));

		if (self::$verbose == TRUE)
			print("$this constructed".PHP_EOL);
		return ;
	}

	public function __toString()
	{
		if (self::$verbose == TRUE)
			return sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		else
			return sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	public static function doc()
	{
		return(file_get_contents("Vertex.doc.txt"));
	}

	function __destruct()
	{
		if (self::$verbose == TRUE)
			print("$this destructed".PHP_EOL);
		return ;
	}

	function getX()
	{
		return($this->_x);
	}
	function setX($x)
	{
		$this->_x = $x;
	}
	function getY()
	{
		return($this->_y);
	}
	function setY($y)
	{
		$this->_y = $y;
	}
	function getZ()
	{
		return($this->_z);
	}
	function setZ($z)
	{
		$this->_z = $z;
	}
	function getW()
	{
		return($this->_w);
	}
	function setW($w)
	{
		$this->_w = $w;
	}
		function getColor()
	{
		return($this->_color);
	}
	function setColor($color)
	{
		$this->_color = $color;
	}
}

?>
