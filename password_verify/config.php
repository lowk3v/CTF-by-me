<?php
$server = "localhost";
$userdb = "root";
$passdb = "toor";
$dbname = "ctf";
$flag = "KMACTF{have_fun_12321321321321343}";
$conn = new mysqli($server, $userdb, $passdb, $dbname) or die("Connection error");
?>

<?php
function init($conn)
{
    $query = "SELECT * FROM users";
    if(empty(mysqli_query($conn,$query)))
    {
        $table_users_query = "CREATE TABLE users(id INT(9) AUTO_INCREMENT PRIMARY KEY,name VARCHAR(256) NOT NULL, username VARCHAR(255) NOT NULL , password VARCHAR(255) NOT NULL ,  admin TINYINT NOT NULL)";
        mysqli_query($conn,$table_users_query);
        $pass = password_hash(hash('sha256', "YibgTOA?N7[9",true), PASSWORD_DEFAULT);
        $user_query = "INSERT INTO users(name,username,password,admin) VALUES ('admin','admin','$pass',true)";
        mysqli_query($conn,$user_query);
    }
}
?>
