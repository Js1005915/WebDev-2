<?php
echo "Hello World!";

$credits = 5;

$spins = 0;

$letters = ['a', 'b', 'c'];

$spin = [];
$payout = [];

$x = 0;


while($credits < 500 and $spins < 20) {
    $answer = null;
    $spins += 1;
    for ($i = 0; $i < 3; $i++){
        $let = array_rand($letters, 1);
        $answer = $answer . $letters[$let];
    }
    
    $points_earned = match ($answer) {
        'aaa', 'bbb', 'ccc' => 100,
        'aab', 'aac', 'aba', 'baa', 'abb', 'bba', 'bab', 'bcc', 'cbc', 'ccb', 'acc', 'cac', 'cca', 'aca', 'bcb' => 50,
        default => 0
    };
    $credits += $points_earned;
    
    $spin[] = $answer;
    $payout[] = $points_earned;


}
foreach ($spin as $sp){

    echo("$sp Payout $payout[$x] <br>" );

    $x += 1;
}
echo("Game Over. Total winnings: $credits Credits")

?>