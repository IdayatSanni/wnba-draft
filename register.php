<?php
    include('templates/connect.php');
    include('templates/functions.php');

    if(isset($_POST['registerButton'])){
        // Collect form data
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = md5($_POST['password']); // MD5 hash for password

        // Check if the email already exists
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($connect, $query);
        
        if(mysqli_num_rows($result) > 0){
            set_message('Email already exists!', 'danger');
        } else {
            // Insert new user into the database
            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            $insert_result = mysqli_query($connect, $query);
            
            if($insert_result){
                set_message('Registration successful. You can now login.', 'success');
                header('Location: login.php');
                die();
            } else {
                set_message('An error occurred. Please try again later.', 'danger');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h2 class="display-3">Register</h2>
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="registerButton">Register</button>
                        <a href="login.php" class="btn btn-secondary">Back to Login</a>
                    </form>
                    <br>
                    <br>
                    <?php get_message(); ?>
                </div>
            </div>
        </div>
    </div>  

</body>
</html>
