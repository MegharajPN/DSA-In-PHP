<?php
$userMoney = 100;
$bet = $_POST['bet'];
$choice = $_POST['choice'];

$dice1 = rand(1, 6);
$dice2 = rand(1, 6);
$sum = $dice1 + $dice2;

if ($choice === "below7" && $sum < 7) {
    $userMoney += 20;
    echo "You win Rs. 20! ";
} elseif ($choice === "above7" && $sum > 7) {
    $userMoney += 20;
    echo "You win Rs. 20! ";
} elseif ($choice === "lucky7" && $sum === 7) {
    $userMoney += 30;
    echo "You win Rs. 30! ";
} else {
    $userMoney -= $bet;
    echo "You lose! ";
}

echo "Your remaining money: Rs. $userMoney";
?>
