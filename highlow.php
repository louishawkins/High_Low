<?php

$_score = 0;
$_scorePossible = 0;

do {

$_mode = $argv[1];
$_min = $argv[2];
$_max = $argv[3];
//$_score = 0;

if ($_mode == "-n") {

	if($argc < 2 || is_numeric($_min) == false || is_numeric($_max) == false){
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

echo `clear`;
echo "*******************************************************************\n";
echo "GUESS THE NUMBER VERSION 2.0\n(c)1985\n";
echo "*******************************************************************\n\n";
echo "SCORE: {$_score}/{$_scorePossible}\n";

if($_scorePossible != 0){
	echo "ACCURACY: " . ($_score / $_scorePossible) * 100 . "%\n\n";
}
else {echo "ACCURACY: 0%\n\n";}

echo "Guess which number I'm thinking of (between {$_min} and {$_max})!\n\n";

if ($_mode == "-h"){echo "-n [number1] [number2]; will start with lower value and end with higher value.\n-c Cheat; Shows number genereated by computer and exits game.\n\n";}

else {
		$points = 1010;

		do {
  			echo "> ";
			$guess = trim(fgets(STDIN));

			if($guess == (string) '-c') {
				echo "(It's " . NUMBER . ".)\n";
				$guess = NUMBER;
				$_play = false;

			}

			elseif ($guess == NUMBER) {
				fwrite(STDOUT, "That is the correct number!\n+ {$points} points!\n");

				echo "Play again?\n> ";
				$playAgain = trim(strtolower(fgets(STDIN)));
				if ($playAgain == 'yes' || $playAgain == 'y') {$_play = true;}
				else{$_play = false;}

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
	
			echo "\n";

			
		} while ($guess != NUMBER);
}

		$_score = $_score + $points + 10;
		$_scorePossible += 1000;

} while ($_play == true);

exit(0);

?>

