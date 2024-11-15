<!DOCTYPE html>
<html lang="en">

<?php include('../../templates/header.php'); ?>

<div class="container">
    <div class="row mb-4 align-items-center">
      <div class="col-md-6">
        <h1 class="display-4">Awards Administration</h1>
        <a href="addAward.php" class="btn btn-secondary">Add Award</a>
      </div>
      <div class="col-md-6">
        <form method="GET" action="" class="mb-4">
          <input type="text" name="search" class="form-control" placeholder="Search by Award" aria-label="Search">
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Award ID</th>
                <th>Player Name</th>
                <th>Year</th>
                <th>Award</th>
                <th>Team</th>
                <th>Awardee</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            require('../../templates/connect.php');

            
            $searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';

            
            $query = "
                SELECT a.award_id, a.`When`, a.Award, a.Team, a.Awardee, a.Notes, p.Player 
                FROM wnba_awards_id a
                JOIN wnba_drafts p ON a.player_id = p.player_id
            ";

            
            if (!empty($searchQuery)) {
                $query .= " WHERE a.Award LIKE '%$searchQuery%'"; 
            }

            $awardsResult = mysqli_query($connect, $query);

            
            $awards = mysqli_fetch_all($awardsResult, MYSQLI_ASSOC);

            foreach ($awards as $award): ?>
                <tr>
                    <td><?php echo htmlspecialchars($award['award_id']); ?></td>
                    <td><?php echo htmlspecialchars($award['Player']); ?></td>
                    <td><?php echo htmlspecialchars($award['When']); ?></td>
                    <td><?php echo htmlspecialchars($award['Award']); ?></td>
                    <td><?php echo htmlspecialchars($award['Team']); ?></td>
                    <td><?php echo htmlspecialchars($award['Awardee']); ?></td>
                    <td><?php echo htmlspecialchars($award['Notes']); ?></td>
                    <td>
                        <a href="updateAward.php?id=<?php echo $award['award_id']; ?>" class="btn btn-warning btn-sm">Update</a>
                        <form method="GET" action="deleteAward.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $award['award_id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" name="deleteAward">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include('../../templates/footer.php'); ?>
</html>
