<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row">
        <?php
        require('templates/connect.php');

        
        $playerID = $_GET['player_id'];

        
        $playerQuery = "
            SELECT * FROM wnba_drafts 
            WHERE player_id = '" . mysqli_real_escape_string($connect, $playerID) . "'
        ";
        $playerResult = mysqli_query($connect, $playerQuery);
        $player = mysqli_fetch_assoc($playerResult);

        
        if ($player) {
            echo '
            <div class="col-md-12 mb-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($player['Player']) . '</h5>
                        <h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($player['Team']) . '</h6>
                        <p class="card-text">' . htmlspecialchars($player['College']) . '</p>
                    </div>
                </div>
            </div>';

            
            $awardsQuery = "
                SELECT * FROM wnba_awards_id 
                WHERE player_id = '" . mysqli_real_escape_string($connect, $playerID) . "'
            ";
            $awardsResult = mysqli_query($connect, $awardsQuery);

            echo '<div class="col-md-12 mb-4">
                    <h5>Awards Earned:</h5>';
            if (mysqli_num_rows($awardsResult) > 0) {
                echo '<ul class="list-group">';
                while ($award = mysqli_fetch_assoc($awardsResult)) {
                    echo '<li class="list-group-item">' . htmlspecialchars($award['Award']) . ' (' . htmlspecialchars($award['When']) . ')</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No awards earned.</p>';
            }
            echo '</div>';
        } else {
            echo '<p>Player not found.</p>';
        }
        ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>
</html>
