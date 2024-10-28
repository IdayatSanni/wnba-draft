<?php
if (isset($_POST['deletePlayer'])) {
    $playerID = $_POST['player_id'];

    require('../../templates/connect.php');

    // Start a transaction
    mysqli_begin_transaction($connect);

    try {
        // Delete from the wnba_awards table first
        $deleteAwardsQuery = "DELETE FROM `wnba_awards_id` WHERE `player_id` = '" . mysqli_real_escape_string($connect, $playerID) . "'";
        $deleteAwards = mysqli_query($connect, $deleteAwardsQuery);

        // Then delete from the players table
        $deletePlayerQuery = "DELETE FROM `wnba_drafts` WHERE `player_id` = '" . mysqli_real_escape_string($connect, $playerID) . "'";
        $deletePlayer = mysqli_query($connect, $deletePlayerQuery);

        // Check if both deletions were successful
        if ($deleteAwards && $deletePlayer) {
            mysqli_commit($connect); // Commit the transaction
            header("Location: playerAdmin.php"); // Redirect to admin page after deletion
            exit;
        } else {
            mysqli_rollback($connect); // Rollback the transaction on error
            echo "There was an error deleting the player or their awards: " . mysqli_error($connect);
        }
    } catch (Exception $e) {
        mysqli_rollback($connect); // Rollback in case of exception
        echo "Error occurred: " . $e->getMessage();
    }
}
?>
