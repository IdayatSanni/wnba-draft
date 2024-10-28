<?php
require('../../templates/connect.php');

$playerID = $_GET['id'];
$query = "
    SELECT p.*
    FROM wnba_drafts p
    WHERE p.player_id = '$playerID'
";
$playerResult = mysqli_query($connect, $query);

// Check if the query was successful and fetch the player's data
if ($playerResult && mysqli_num_rows($playerResult) > 0) {
    $player = mysqli_fetch_assoc($playerResult);
} else {
    echo "Error fetching player data or player not found: " . mysqli_error($connect);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../../templates/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Delete Player</h1>
            <p>Are you sure you want to delete the player <strong><?php echo htmlspecialchars($player['Player']); ?></strong>?</p>
            <p><strong>Team:</strong> <?php echo htmlspecialchars($player['Team']); ?></p>
            <p><strong>College:</strong> <?php echo htmlspecialchars($player['College']); ?></p>

            <form method="POST" action="deleteScript.php">
                <input type="hidden" name="player_id" value="<?php echo htmlspecialchars($playerID); ?>">
                <button type="submit" class="btn btn-danger" name="deletePlayer">Delete Player</button>
                <a href="playerAdmin.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include('../../templates/footer.php'); ?>
</html>
