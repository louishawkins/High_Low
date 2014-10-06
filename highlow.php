<?php

$_mode = $argv[1];
$_min = $argv[2];
$_max = $argv[3];
$points = 0;

if ($_mode == "-n") {

	if($argv[2] == false || $argv[3] == false){
	    $_mode = "normal";
		$_min = 0;
		$_max = 1000;
		define("NUMBER", mt_rand(0,1000));
	}
	elseif ($_max < $_min) {
		define("NUMBER", mt_rand($_max,$_min));
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

elseif($_mode == "-h"){echo "-n [number1] [number2]; will start with lower value and end with higher value.\n-c Cheat; Enter in command line or during game. Shows number genereated by computer and exits game.\n\n";}

else {
		$points = 1010;

		do {

			$guess = trim(fgets(STDIN));

			if($guess == (string) '-c') {
				echo "(It's " . NUMBER . ".)\n";
				$guess = NUMBER;
			}

			elseif ($guess == NUMBER) {
				fwrite(STDOUT, "That is the correct number!\n+ {$points} points!\n");

			}

			elseif ($guess < NUMBER) {
				fwrite(STDOUT, "Guess higher!\n");
				if ((NUMBER - $guess) <= 10 && ($guess - NUMBER) > 5) {
					echo "You're really close!\n";
				}
				elseif ((NUMBER - $guess) <= 5) {
					echo "You're really REALLY close!\n";
				}
			}

			else {
				fwrite(STDOUT, "Guess lower!\n");
				if (($guess - NUMBER) <= 10 && ($guess - NUMBER) > 5) {
					echo "You're really close!\n";
				}
				elseif (($guess - NUMBER) <= 5) {
					echo "You're really REALLY close!\n";
				}
			}
			$points = $points - 10;
		} while ($guess != NUMBER);
};

exit(0);

?>

