<?php
require_once ("konek.php");
$username = "";
$password = "";
$usererr = "";
$passerr = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $query = "SELECT * FROM resto WHERE username = '$username'";
    $result = $koneksi->query($query);
    $row = $result->fetch_assoc();
    if(count($row)==0){
        $usererr = "AKUN TIDAQ ADA";
    }else{
        if($row['password']==$_POST['password']){
            header("Location: makanan.php");
        }else{
            $passerr = "password salah!!!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style3.css">
    <title>Login</title>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <tr>    
                <h1><Login</h1>         
                <td>Username :</td>
                <td><input type="text" name="username" value = "<?php echo $username;?>" /></td>
                <td><p><?php echo $usererr; ?></p></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="password" />  
                <br/>
                <td><input type="submit" name="login" value="Login" /></td></td>
                <br/>
                <td><p><?php echo $passerr; ?></p></td>
            </tr>
        
    </form>
   
</body>
