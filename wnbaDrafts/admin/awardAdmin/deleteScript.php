
<?php
if (isset($_POST['deleteAward'])) {
    $awardID = $_POST['award_id'];

    require('../../templates/connect.php');

    $query = "DELETE FROM `wnba_awards_id` WHERE `award_id` = '$awardID'";
    $deleteAward = mysqli_query($connect, $query);

    if ($deleteAward) {
        header("Location: awardAdmin.php");
        exit; 
    } else {
        echo "There was an error deleting the award: " . mysqli_error($connect); 
    }
}
?>
