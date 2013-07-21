<?php
$user = $_POST['user'];
$pass = $_POST['pass'];

if($user == "seeds"
&& $pass == "growing")
{
        include("index2.html");
}
if(isset($_POST)&&$pass!='growing')
{?>

        <form method="POST" action="index.php">
        User <input type="TEXT" name="user"></input>
        Pass <input type="TEXT" name="pass"></input>
        <input type="submit" name="submit"></input>
        </form>
<?}
?>