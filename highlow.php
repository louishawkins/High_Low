<?php

$_mode = $argv[1];
$_min = $argv[2];
$_max = $argv[3];

if ($_mode == "-n") {

	if($argv[2] == false || $argv[3] == false){
	    $_mode = "normal";
		$_min = 0;
		$_max = 1000;
		define("NUMBER", mt_rand(0,1000));
	}
	else {
		define("NUMBER", mt_rand($_min, $_max));
	}
} 
else {
		$_min = 0;
		$_max = 1000;
		define("NUMBER", mt_rand(0,1000));	
}



echo "Welcome to the number game!\n";
echo "Guess which number I'm thinking of (between {$_min} and {$_max})!\n";

if($_mode == "-c"){echo "(It's " . NUMBER . ".)\n";}

else {
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
}

?>

