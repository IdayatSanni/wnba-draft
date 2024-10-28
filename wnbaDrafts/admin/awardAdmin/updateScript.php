<?php
if (isset($_POST['updateAward'])) {
    $awardID = $_POST['award_id'];
    $playerID = $_POST['player_id'];
    $year = $_POST['When'];
    $award = $_POST['Award'];
    $team = $_POST['Team'];
    $awardee = $_POST['Awardee'];
    $notes = $_POST['Notes'];

    require('../../templates/connect.php');

    $query = "UPDATE `wnba_awards_id` SET 
        `player_id` = '" . mysqli_real_escape_string($connect, $playerID) . "',
        `When` = '" . mysqli_real_escape_string($connect, $year) . "',
        `Award` = '" . mysqli_real_escape_string($connect, $award) . "',
        `Team` = '" . mysqli_real_escape_string($connect, $team) . "',
        `Awardee` = '" . mysqli_real_escape_string($connect, $awardee) . "',
        `Notes` = '" . mysqli_real_escape_string($connect, $notes) . "' 
        WHERE `award_id` = '" . mysqli_real_escape_string($connect, $awardID) . "'"; 

    $updateAward = mysqli_query($connect, $query);

    if ($updateAward) {
        header("Location: awardAdmin.php");
        exit; 
    } else {
        echo "There was an error updating the award: " . mysqli_error($connect); 
    }
}
?>
