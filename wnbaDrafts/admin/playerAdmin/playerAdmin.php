<!DOCTYPE html>
<html lang="en">

<?php include('../../templates/header.php'); ?>

<div class="container">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h1 class="display-4">Players Administration</h1>
            <a href="addPlayer.php" class="btn btn-secondary">Add Player</a>
        </div>
        <div class="col-md-6">
            <form method="GET" action="" class="mb-4">
                <input type="text" name="search" class="form-control" placeholder="Search by Player Name" aria-label="Search">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Player ID</th>
                <th>Year</th>
                <th>Round</th>
                <th>Pick</th>
                <th>Team</th>
                <th>Player</th>
                <th>Prior Team</th>
                <th>College</th>
                <th>Trade Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require('../../templates/connect.php');

            $searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';

            
            $query = "
                SELECT * FROM wnba_drafts
            ";

            
            if (!empty($searchQuery)) {
                $query .= " WHERE player LIKE '%$searchQuery%'"; 
            }

            $playersResult = mysqli_query($connect, $query);

            
            $players = mysqli_fetch_all($playersResult, MYSQLI_ASSOC);

            foreach ($players as $player): ?>
                <tr>
                    <td><?php echo htmlspecialchars($player['player_id']); ?></td>
                    <td><?php echo htmlspecialchars($player['Year']); ?></td>
                    <td><?php echo htmlspecialchars($player['Round']); ?></td>
                    <td><?php echo htmlspecialchars($player['Pick']); ?></td>
                    <td><?php echo htmlspecialchars($player['Team']); ?></td>
                    <td><?php echo htmlspecialchars($player['Player']); ?></td>
                    <td><?php echo htmlspecialchars($player['Prior Team']); ?></td>
                    <td><?php echo htmlspecialchars($player['College']); ?></td>
                    <td><?php echo htmlspecialchars($player['Trade Notes']); ?></td>
                    <td>
                        <a href="updatePlayer.php?id=<?php echo $player['player_id']; ?>" class="btn btn-warning btn-sm">Update</a>
                        <form method="GET" action="deletePlayer.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $player['player_id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" name="deletePlayer">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include('../../templates/footer.php'); ?>
</html>
