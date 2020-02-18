<?php
require_once('konek.php');
$user="";
$pass="";
$usereror="";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST['USERNAME'];
    $query = "SELECT * FROM resto WHERE username = '$user'";
    $result = $koneksi->query($query);
    $row = $result->fetch_assoc();
    if ($row['username'] != ""){
        $usereror = "Username Kejupuk";
    }else{
        $user = $_POST ['USERNAME'];
        $pass = $_POST ['PASSWORD'];
        $query = "insert into resto (username,password) values ('$user','$pass')";
        $koneksi->query($query);
        header("Location: Tampil.php");
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="text-align: center;"class = "div">
    <p style="margin-top:30px; font-size : 25pt";>Register</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <input type="text" name="USERNAME" placeholder="USERNAME" value="<?php echo $user?>">
        <br/>
    <input type="password" name="PASSWORD" placeholder="PASSWORD" value="<?php echo $pass?>">
        <br/>
        <input type="submit" name="Register" value="Register">
    </div>
</body>
</html>