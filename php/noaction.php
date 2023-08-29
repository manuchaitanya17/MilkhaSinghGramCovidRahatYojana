<!-- SERVER SIDE -->
<!-- FROM THAT PARTICULAR CLIENT SIDE A POST REQUEST IS SEND TO THE SERVER WHERE THIS PHP FILE EXISTS, THIS FILE GETS INTERPRETED BY PHP INTERPRETER AND RETURN THE HTML OUTPUT TO BROWSER. -->

<?php

// B. HOW SERVER SIDE IS MANAGED.

// I. SETTING VARIABLES:
// 1.  Two variables are set two use them executing something ang and something not. Both are set to false.

$showAlert = false;
$showerror = false;


// II. SERVER DATABASE CONNECTION:
// 1. Setting Variables(4) confirming POST HTTP Request. Everthing after this is in this if block only.

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "MSGCRY";

    // 2. After setting variables the connection is made using mysqli_connect() which return a boolean.
    $conn = mysqli_connect($server, $username, $password, $database);

    // III. SETTING PHP ALGORTIHM FOR FURTHER CALCULATIONS:
    // 1. Setting the field values(name) to PHP Variables, these values comes along with Request in HTTP POST Request.

    $name = $_POST['name'];
    $aadhar = $_POST['aadhar'];
    $age = $_POST['$age'];
    $reason = $_POST['reason'];
    $countryCode = $_POST['countryCode'];
    //2. Fetching the username from database, do this username exist already. If it already exists we return Username already Exists. This is done using following code:

    $sql = "INSERT INTO `Users` (`Name`, `Aadhar`, `Age`, `Reason`, `City`) VALUES ('$name', '$aadhar', '$age', '$reason', '$countryCode')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: home.html');
    }
}
?>
















<!-- A. CLIENT SIDE -->
<!-- THE CLIENT TYPED WWW.ISECURE.COM, THE CLIENT WILL DIRECTED TO THIS HTML PAGE -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>


<!-- I. NAVIAGTION BAR -->
  <?php require 'Partials/navBar.php' ?>
  <!-- B4. As we discussed server will return a HTML via HTTP response. -->


<!-- II. ALERT BAR -->
 <?php
// A. ALERT BAR BEFORE SIGNUP
// 1. The default value of a boolean data type is false, hence showAlert and showerror both are false hence no code execution 
// by PHP Interpreter.


// B. ALERT BAR AFTER SIGNUP
//1. After signup this showAlert value be true then, this code is executed.

 if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> Your account has been Successfull created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
 }

// 2. After signup if Account already exist or if password and confirm password dont't match then it returns the String which stores respectively.

 if($showerror){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong> ' .$showerror. '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
 }

 
?>


<!-- III. HEADING -->
  <h1 class="text-center">Sign Up to your Website</h1>



<!-- IV. FORM -->

<!-- 1. The user interacts with the form by entering information into the input fields. -->
<!-- 2. When the user clicks the submit button, the browser collects all the form data, packages it into an HTTP request, and sends it to the server. The data is sent to the URL specified in the action attribute of the <form> element and using the method specified in the method attribute (typically "GET" or "POST"). -->
<!-- 3. For every filed we need to remember the name attribute as it is used by PHP Interpreter -->

  <form action="/Projects/Project-1/signup.php" method="post">

  <div class="mb-3 col-md-3">
    <label for="username" class="form-label">Username</label>
    <input type="email" maxlength="11" class="form-control" id="username" aria-describedby="emailHelp" name="username">
    </div>

  <div class="mb-3 col-md-3 ">
    <label for="password" class="form-label">Password</label>
    <input type="password" maxlength="30" class="form-control" id="password" name="password">>
  </div>

  <div class="mb-3 col-md-3 ">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" maxlength="30" class="form-control" id="cpassword" name="cpassword" >>
  </div>

  <button type="submit" class="btn btn-primary">Sign-Up</button>
</form>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

 </body>
</html>
