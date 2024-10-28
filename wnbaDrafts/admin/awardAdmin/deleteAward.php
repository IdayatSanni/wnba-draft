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
            <h1 class="display-4">Delete Award</h1>
            <p>Are you sure you want to delete the award for <strong><?php echo htmlspecialchars($award['Player']); ?></strong>?</p>
            <p><strong>Award:</strong> <?php echo htmlspecialchars($award['Award']); ?></p>
            <p><strong>Year:</strong> <?php echo htmlspecialchars($award['When']); ?></p>
            <p><strong>Team:</strong> <?php echo htmlspecialchars($award['Team']); ?></p>
            <p><strong>Awardee:</strong> <?php echo htmlspecialchars($award['Awardee']); ?></p>
            <p><strong>Notes:</strong> <?php echo htmlspecialchars($award['Notes']); ?></p>

            <form method="POST" action="deleteScript.php">
                <input type="hidden" name="award_id" value="<?php echo htmlspecialchars($awardID); ?>">
                <button type="submit" class="btn btn-danger" name="deleteAward">Delete Award</button>
                <a href="awardAdmin.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include('../../templates/footer.php'); ?>
</html>