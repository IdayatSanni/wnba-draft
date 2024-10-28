<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST['addPlayer'])) {
    $year = $_POST['year'];
    $round = $_POST['round'];
    $pick = $_POST['pick'];
    $team = $_POST['team'];
    $player = $_POST['player'];
    $priorTeam = $_POST['prior_team'];
    $college = $_POST['college'];
    $tradeNotes = $_POST['trade_notes'];

    require('../../templates/connect.php');

    $query = "INSERT INTO `wnba_drafts` (`Year`, `Round`, `Pick`, `Team`, `Player`, `Prior Team`, `College`, `Trade Notes`) VALUES (
        '" . mysqli_real_escape_string($connect, $year) . "',
        '" . mysqli_real_escape_string($connect, $round) . "',
        '" . mysqli_real_escape_string($connect, $pick) . "',
        '" . mysqli_real_escape_string($connect, $team) . "',
        '" . mysqli_real_escape_string($connect, $player) . "',
        '" . mysqli_real_escape_string($connect, $priorTeam) . "',
        '" . mysqli_real_escape_string($connect, $college) . "',
        '" . mysqli_real_escape_string($connect, $tradeNotes) . "'
    )";

    if (mysqli_query($connect, $query)) {
        header("Location: playerAdmin.php"); 
        exit;
    } else {
        echo "Error adding the player: " . mysqli_error($connect);
    }
}
?>
