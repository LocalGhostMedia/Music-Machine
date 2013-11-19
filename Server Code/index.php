<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
// Should add better php password protection
if($user == "user"
&& $pass == "password")
{
        include("index2.html");
}
if(isset($_POST)&&$pass!='password')
{?>

        <form method="POST" action="index.php">
        User <input type="TEXT" name="user"></input>
        Pass <input type="TEXT" name="pass"></input>
        <input type="submit" name="submit"></input>
        </form>
<?php }
?>
