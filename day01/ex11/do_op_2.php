#!/usr/bin/php
<?PHP
	
    if ($argc != 2)
    {
        echo "Incorrect Parameters\n";
        exit();
    }
    $count = str_replace(" ", "", $argv[1]);

    if (strpos($count, "+") != FALSE)
        $tab = explode("+", $count);
    else if (strpos($count, "-") != FALSE)
        $tab = explode("-", $count);
    else if (strpos($count, "*") != FALSE)
        $tab = explode("*", $count);
    else if (strpos($count, "/") != FALSE)
        $tab = explode("/", $count);
    else if (strpos($count, "%") != FALSE)
        $tab = explode("%", $count);
    else
    {
        echo "Syntax Error\n";
        exit();
    }
    if (count($tab) != 2)
    {
        echo "Syntax Error\n";
        exit();
    }
    if (ctype_digit($tab[0]) && ctype_digit($tab[1]))
    {
        if (strpos($count, "+") != FALSE)
            echo ($tab[0] + $tab[1]);
        else if (strpos($count, "-") != FALSE)
            echo ($tab[0] - $tab[1]);
        else if (strpos($count, "*") != FALSE)
            echo ($tab[0] * $tab[1]);
        else if (strpos($count, "/") != FALSE)
            echo ($tab[0] / $tab[1]);
        else if (strpos($count, "%") != FALSE)
            echo ($tab[0] % $tab[1]);
        echo("\n");
    }
    else
        echo "Syntax Error\n";
?>
