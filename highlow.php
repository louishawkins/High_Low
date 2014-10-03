<?php

define("NUMBER", mt_rand(0,1000));

echo "Welcome to the number game!\n";
fwrite(STDOUT, "Guess which number I'm thinking of (between 0 and 1000)!\n");
echo NUMBER;

while ($guess != NUMBER) {
$guess = fgets(STDIN);


	if ($guess == NUMBER) {
		fwrite(STDOUT, "That is the correct number!\n+ 10000 points!\n");

	}

	elseif ($guess < NUMBER) {
		fwrite(STDOUT, "Guess higher!\n");
	}

	else {
		fwrite(STDOUT, "Guess lower!\n");
	}

}

?>

