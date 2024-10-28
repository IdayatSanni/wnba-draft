<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<div class="container mt-4">

    <div class="row mb-4 align-items-center">
      <div class="col-md-6">
          <h2>WNBA Players and their awards</h2>
      </div>
      <div class="col-md-6">
          <form method="GET" action="" class="d-flex">
              <input type="text" name="search" class="form-control me-2" placeholder="Search by Player Name" aria-label="Search">
              <button type="submit" class="btn btn-primary">Search</button>
          </form>
      </div>
    </div>

    <div class="row">
      <?php
      require('templates/connect.php');

      $searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';

      
      $query = "
          SELECT d.*, COUNT(a.Award) AS award_count 
          FROM wnba_drafts d 
          LEFT JOIN wnba_awards_id a ON d.player_id = a.player_id 
      ";

      
      if (!empty($searchQuery)) {
          $query .= " WHERE d.Player LIKE '%$searchQuery%'";  
      }

      
      $query .= " GROUP BY d.player_id";

      
      if (empty($searchQuery)) {
          $query .= " ORDER BY award_count DESC"; 
      }

      $players = mysqli_query($connect, $query);

      
      if (mysqli_num_rows($players) > 0) {
          foreach ($players as $player) {
              echo '
              <div class="col-md-4 mb-4">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">' . htmlspecialchars($player['Player']) . '</h5>
                          <h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($player['Team']) . '</h6>
                          <p class="card-text">' . htmlspecialchars($player['College']) . '</p>';
              
              
              if ($player['award_count'] > 0) {
                  echo '<p>Number of Awards: ' . (int)$player['award_count'] . '</p>';
              }

              echo '
                    <a href="viewAwards.php?player_id=' . $player['player_id'] . '" class="btn btn-info">View Awards</a>
                    </div>
                  </div>
              </div>';
          }
      } else {
          echo '<div class="col-md-12"><p class="text-center">No players found.</p></div>';
      }
      ?>

    </div>
</div>

<?php include('templates/footer.php'); ?>
</html>
