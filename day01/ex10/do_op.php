#!/usr/bin/php
<?PHP
	
    if ($argc != 4)
        echo "Incorrect Parameters";

    if (trim($argv[2]) == "+")
    	echo((trim($argv[1] + trim($argv[3]))));
    else if (trim($argv[2]) == "-")
    	echo((trim($argv[1] - trim($argv[3]))));
    else if (trim($argv[2]) == "*")
    	echo((trim($argv[1] * trim($argv[3]))));
    else if (trim($argv[2]) == "/")
    	echo((trim($argv[1] / trim($argv[3]))));
    else if (trim($argv[2]) == "%")
    	echo((trim($argv[1] % trim($argv[3]))));
    else
    	echo "Incorrect Parameters";
    echo "\n";

?>
