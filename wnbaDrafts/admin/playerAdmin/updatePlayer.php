<?php
require('../../templates/connect.php');

$playerID = $_GET['id'];
$query = "
    SELECT * 
    FROM wnba_drafts 
    WHERE player_id = '$playerID'
";
$playerResult = mysqli_query($connect, $query);
$player = $playerResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../../templates/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Update Player</h1>
            <form method="POST" action="updateScript.php">
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year" value="<?php echo htmlspecialchars($player['Year']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="round" class="form-label">Round</label>
                    <input type="number" class="form-control" id="round" name="round" value="<?php echo htmlspecialchars($player['Round']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="pick" class="form-label">Pick</label>
                    <input type="number" class="form-control" id="pick" name="pick" value="<?php echo htmlspecialchars($player['Pick']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="team" class="form-label">Team</label>
                    <input type="text" class="form-control" id="team" name="team" value="<?php echo htmlspecialchars($player['Team']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="player" class="form-label">Player Name</label>
                    <input type="text" class="form-control" id="player" name="player" value="<?php echo htmlspecialchars($player['Player']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="prior_team" class="form-label">Prior Team</label>
                    <input type="text" class="form-control" id="prior_team" name="prior_team" value="<?php echo htmlspecialchars($player['Prior Team']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="college" class="form-label">College</label>
                    <input type="text" class="form-control" id="college" name="college" value="<?php echo htmlspecialchars($player['College']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="trade_notes" class="form-label">Trade Notes</label>
                    <textarea class="form-control" id="trade_notes" name="trade_notes"><?php echo htmlspecialchars($player['Trade Notes']); ?></textarea>
                </div>

                <input type="hidden" name="player_id" value="<?php echo htmlspecialchars($playerID); ?>">
                <button type="submit" class="btn btn-primary" name="updatePlayer">Update Player</button>
            </form>
        </div>
    </div>
</div>

<?php include('../../templates/footer.php'); ?>
</html>
