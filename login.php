<?php
    include('templates/connect.php');
    include('templates/functions.php');
    
    if(isset($_POST['loginButton'])){
        $query = 'SELECT * 
                    FROM users
                    WHERE email = "' . $_POST['email'] . '"
                    AND password = "' . md5($_POST['password']) . '"
                    LIMIT 1';
        
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result)){
            $record = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $record['id'];
            $_SESSION['email'] = $record['email'];
            header('Location: index.php');
            die();
        }else{
            set_message('No Records Found','danger');
            header('Location: login.php');
            die();
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<div class="container-fluid">

    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <h2 class="display-3">Login</h2>
          <?php get_message(); ?>
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary" name="loginButton">Submit</button>
          </form>
        </div>
      </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>
</html>
