#!/usr/bin/php
<?PHP
	echo "Enter a number: ";
	$number = fgets(STDIN);
	$number = trim($number);
	if (is_numeric($number))
	{
		if ($number % 2 == 0)
			echo "The number $number is even\n";
		else 
			echo "The number $number is odd\n";
	}
	else
	{
		if (feof(STDIN))
		{
			echo "\n";
			exit();
		}
		else
			echo "'$number' is not a number\n";
	}
?>
