<?php
require('../../templates/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../../templates/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Add Award</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="addScript.php">
                <div class="mb-3">
                    <label for="player_id" class="form-label">Player ID</label>
                    <input type="text" class="form-control" id="player_id" name="player_id" required>
                </div>

                <div class="mb-3">
                    <label for="When" class="form-label">Year</label>
                    <input type="text" class="form-control" id="When" name="When" required placeholder="Enter year (e.g., 2023)">
                </div>

                <div class="mb-3">
                    <label for="Award" class="form-label">Award</label>
                    <input type="text" class="form-control" id="Award" name="Award" required>
                </div>

                <div class="mb-3">
                    <label for="Team" class="form-label">Team</label>
                    <input type="text" class="form-control" id="Team" name="Team" required>
                </div>

                <div class="mb-3">
                    <label for="Awardee" class="form-label">Awardee</label>
                    <input type="text" class="form-control" id="Awardee" name="Awardee" required>
                </div>

                <div class="mb-3">
                    <label for="Notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="Notes" name="Notes"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="addAward">Add Award</button>
            </form>
        </div>
    </div>
</div>

<?php include('../../templates/footer.php'); ?>
</html>
