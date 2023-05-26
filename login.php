<?php
// connect to database 
$dbName = "a2zrecyclers"; 
$serverName = "localhost"; 
$serverUser = "root"; 
$serverPassword = ""; 

function login(){
    $dbName = "a2zrecyclers"; 
    $serverName = "localhost"; 
    $serverUser = "root"; 
    $serverPassword = ""; 
    $conn = new mysqli($serverName, $serverUser, $serverPassword, $dbName);
    if($conn -> connect_error){
        die("Connection error to $dbName, " . $conn->connect_error);
    }

    $sql = "SELECT password FROM login WHERE username = '{$_POST['username']}'";

    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_array();
        if ($_POST['password'] == $user[0]) {
            header("Location: index.html");
        } else {
            $message = "Incorrect password";
            return $message;
        }
    } else {
        $message = "Username not found";
        return $message;
    }
}

$message = '';
if(isset($_POST['username'])){
    $message = login();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <!------------ Logo ------------>
        <a class="logo" href="index.html"><img src="img/logo.png" alt="a2z recyclers logo"></a>

    <!------------ Navigation ------------>
    <nav class="navbar">
            <a href="#" class="nav_btn"><img src="img/hamburger.png" alt="hamburger menu icon"></a>
            <div class="menu">
                <a href="index.html">Home</a>
                <a class="current" href="login.php">Login</a>
                <a href="about.html">About Us</a>
                <a href="purpose.html">Purpose</a>
                <a href="contact.html">Contact Us</a>
                <input class="search" type="text" placeholder="Search..">
            </div>
          </nav>
    </header>

    <!---------- Clock -------------->
    <div class="clock">
    <a href="https://time.is/Sydney" id="time_is_link" rel="nofollow">Time in Sydney:</a>
    <span id="Sydney_z60b"></span>
    </div>
    <script src="//widget.time.is/t.js"></script>
    <script>
    time_is_widget.init({Sydney_z60b:{}});
    </script>

    <div class="content center">
        <div class="form">
            <h1>Welcome back!</h1>
            <form method="POST">
                <div>
                    <label for="username">Username: </label>
                    <input type="text" id="username" name="username" required>
                </div>  
                <div>
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="submit">
                    <input type="submit" value="Login">
                </div>
                <div class="error">
                    <p><?php echo $message; ?></p>
                </div>
            </form>
        </div>
    </div>

    <!------------ Footer ------------>
    <footer> 
        <div class="footer-element">
            &copy; A2Z Recyclers 2023
        </div>

        <div class="footer-element">
            <a href="privacypolicy.pdf">Privacy Policy</a>
        </div>

        <div class="footer-element">
            <a class="socials" href="facebook.com"><img src="img/facebook.png" alt="facebook icon"></a>
            <a class="socials" href="twitter.com"><img src="img/twitter.png" alt="twitter icon"></a>
            <a class="socials" href="instagram.com"><img src="img/instagram.png" alt="instagram icon"></a>
        </div>
    </footer>
</body>
</html>