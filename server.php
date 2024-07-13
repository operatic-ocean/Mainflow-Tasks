<?php
session_start();

//initializing variables
$username = "";
$email = "";
$errors = array();

//connecting to databse
$db = mysqli_connect('localhost','root','','bms');

//register user

if(isset($_POST['reg_user'])){
    //receiving all input from the form
    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //ensuring form filled correctly , by addding (array_push()) corresponding
    //errors into $errors array

    if(empty($username)) { array_push($errors, "Username is required"); }
    if(empty($email)) { array_push($errors, "Email is required"); }
    if(empty($password_1)) { array_push($errors, "Password is required"); }
    if($password_1 != $password_2){
        array_push($errors, "Two passwords do not match");
    }

    //first check the database tom ake sure a user does not already
    // exist with the same username and/or email

    $user_check_query = "SELECT * FROM users WHERE username ='$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user){

        if($user['username'] === $username){
            array_push($errors, "Username already exists");
        }

        if($user['email'] === $email){
            array_push($errors, "Email already exists");
        }
        
        //finally register user if there are no errors in the form 

        if(count($errors) == 0){
            $password =md5($password_1);

            $query ="INSERT INTO users (username, email, password) VALUES('$username','$email','$password')";
            
            mysqli_query($db, $query);
            header('location: login.php');
        }
    }

}

//login user

if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)){
        array_push($errors,"Username is required");
    }

    if(empty($password)){
        array_push($errors,"Password is required");
    }

    if(count($errors) == 0){
        $password = md5 ($password);
        $query = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] =  "You are now logged in" ;
            header('location: index.html');
        }else{
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>