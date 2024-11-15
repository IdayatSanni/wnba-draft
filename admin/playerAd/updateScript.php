<?php
if (isset($_POST['updatePlayer'])) {
    $playerID = $_POST['player_id'];
    $playerName = $_POST['player'];
    $round = $_POST['round'];
    $pick = $_POST['pick'];
    $team = $_POST['team'];
    $priorTeam = $_POST['prior_team'];
    $college = $_POST['college'];
    $tradeNotes = $_POST['trade_notes'];

    require('../../templates/connect.php');

    $query = "UPDATE `wnba_drafts` SET 
        `Player` = '" . mysqli_real_escape_string($connect, $playerName) . "',
        `Round` = '" . mysqli_real_escape_string($connect, $round) . "',
        `Pick` = '" . mysqli_real_escape_string($connect, $pick) . "',
        `Team` = '" . mysqli_real_escape_string($connect, $team) . "',
        `Prior Team` = '" . mysqli_real_escape_string($connect, $priorTeam) . "',
        `College` = '" . mysqli_real_escape_string($connect, $college) . "',
        `Trade Notes` = '" . mysqli_real_escape_string($connect, $tradeNotes) . "'
        WHERE `player_id` = '" . mysqli_real_escape_string($connect, $playerID) . "'"; 

    $updatePlayer = mysqli_query($connect, $query);

    if ($updatePlayer) {
        header("Location: playerAdmin.php");
        exit; 
    } else {
        echo "There was an error updating the player: " . mysqli_error($connect); 
    }
}
?>
