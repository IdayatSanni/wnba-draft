<?php
require('../../templates/connect.php');


$awardID = $_GET['id'];
$query = "
    SELECT a.*, p.Player 
    FROM wnba_awards_id a
    JOIN wnba_drafts p ON a.player_id = p.player_id
    WHERE a.award_id = '$awardID'
";
$awardResult = mysqli_query($connect, $query);
$award = $awardResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../../templates/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Update Award</h1>
            <form method="POST" action="updateScript.php">
                <div class="mb-3">
                    <label for="player" class="form-label">Player Name</label>
                    <input type="text" class="form-control" id="player" name="player_id" value="<?php echo htmlspecialchars($award['player_id']); ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="When" class="form-label">Year</label>
                    <input type="number" class="form-control" id="When" name="When" value="<?php echo htmlspecialchars($award['When']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="Award" class="form-label">Award</label>
                    <input type="text" class="form-control" id="Award" name="Award" value="<?php echo htmlspecialchars($award['Award']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="Team" class="form-label">Team</label>
                    <input type="text" class="form-control" id="Team" name="Team" value="<?php echo htmlspecialchars($award['Team']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="Awardee" class="form-label">Awardee</label>
                    <input type="text" class="form-control" id="Awardee" name="Awardee" value="<?php echo htmlspecialchars($award['Awardee']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="Notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="Notes" name="Notes"><?php echo htmlspecialchars($award['Notes']); ?></textarea>
                </div>

                <input type="hidden" name="award_id" value="<?php echo htmlspecialchars($awardID); ?>">
                <button type="submit" class="btn btn-primary" name="updateAward">Update Award</button>
            </form>
        </div>
    </div>
</div>

<?php include('../../templates/footer.php'); ?>
</html>
