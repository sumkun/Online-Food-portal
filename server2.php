<?php

        session_start();

     
        $username="ddddd";
        $password="ddddd";

        $error=array();

    

        $db = mysqli_connect('localhost','root','','my_database_test') or die("could not connect to DataBase");

        
       if(!empty($_POST)) {
            
           
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
       
        }


        if(empty($email)) {
            array_push($error, "Email is required");
        }
        if(empty($password)) {
            array_push($error, "Password is required");
        }
       
        //check db for existing usename & password
        // $user_check_query= "SELECT * FROM register_data WHERE username = '$username' or email = '$email' LIMIT 1";
        // $result = mysqli_query($db, $user_check_query);
        // $user = mysqli_fetch_assoc($result);
        // if($user){
        //     if($user['username']===$username){
        //         array_push($error, "Username Already Exists");
        //     } 
        //     if($user['email']===$email){
        //         array_push($error, "This Email id has a registerd Username");
        //     }
        // }

//         if(count($error == 0)){
//             $qry = "INSERT INTO register_data ( name, username, email, password) 
//                    VALUES('$name','$username','$email','$password_1')" ;

// mysqli_query($db, $qry);
//     $_SESSION['username'] = $username;
//     $_SESSION['success'] = "You are now Logged In";

// header('location : first.php');

//         }


        //Register if NO ERROR
//         if(count($error == 0){
//             // $password = md5($password_1) ;//Encription
//             $qry = "INSERT INTO register_data ( name, username, email, password) 
//             VALUES('$name','$username','$email','$password')" 

//     mysqli_query($db, $qry);
//     $_SESSION['username'] = $username;
//     $_SESSION['success'] = "You are now Logged In";

// header('location : first.php');
//         }
            
        
    

    //    LOGIN 

        // if(isset($_POST['login_user'])){
        //     $username = mysqli_real_escape_string($db, $_POST['username']);
        //     $password = mysqli_real_escape_string($db, $_POST['password_1']);
        //     if(empty($username)){
        //         array_push($error, "Username is required");
        //     }
        //     if(empty($password)){
        //         array_push($error, "Password is required");
        //     }
            if(count($error) == 0){

             //   $password = md5($password);
           

           //  echo $email.'';
           //  echo $password.'';

                $query = "SELECT * from register_data WHERE email = '$email' AND password='$password' ";
                $results = mysqli_query($db, $query);
                
               
                if(mysqli_num_rows($results)){

                    echo 'LoggedIn';
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Logged In Successfully";

                    //  header("location:first.php");

             
                }else {
                    array_push($error, " Wrong username or password");
                    echo 'LoggedNot';
                }
            }

        

?>