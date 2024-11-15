<?php
if (isset($_POST['addAward'])) {
    $playerID = $_POST['player_id'];
    $when = $_POST['When']; 
    $award = $_POST['Award'];
    $team = $_POST['Team'];
    $awardee = $_POST['Awardee'];
    $notes = $_POST['Notes'];

    require('../../templates/connect.php');

    $query = "INSERT INTO `wnba_awards_id` (`player_id`, `When`, `Award`, `Team`, `Awardee`, `Notes`) VALUES (
        '" . mysqli_real_escape_string($connect, $playerID) . "',
        '" . mysqli_real_escape_string($connect, $when) . "',
        '" . mysqli_real_escape_string($connect, $award) . "',
        '" . mysqli_real_escape_string($connect, $team) . "',
        '" . mysqli_real_escape_string($connect, $awardee) . "',
        '" . mysqli_real_escape_string($connect, $notes) . "'
    )";

    if (mysqli_query($connect, $query)) {
        header("Location: awardAdmin.php"); 
        exit;
    } else {
        echo "Error adding the award: " . mysqli_error($connect);
    }
}
?>
