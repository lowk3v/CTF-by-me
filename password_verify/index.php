<?php
include "config.php";
    init($conn);
    function _verify($user_pass,$dbs_pass)
    {
        return password_verify(hash('sha256', $user_pass,true), $dbs_pass);
    }
    function check_input($input)
    {
        $charset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!#$%&\()*+,-./:;<=>?@[]^_`{|}~";
        if (empty($input))
            return false;
        for ($i = 0 ; $i < strlen($input); $i++)
            if(!strpos($charset,$input[$i])){
        echo $input[$i];
                return false;
        }
        return true;
    }
    if (isset($_POST["submit_login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(check_input($username) === false || check_input($password) ===false)
        {
            die("h4x0r detecteddddddddd");
        }
        $sql = "SELECT password,admin FROM users WHERE username = ?";
        $query = $conn->prepare($sql);
        $query->bind_param("s",$username);
        $query->execute();
        $query->store_result();
        if ($query->num_rows == 1)
        {
            $query->bind_result($c_pwd,$c_adm);
            $query->fetch();
            if( _verify($password,$c_pwd) )
                if($c_adm)
                   die("You are admin, here is your flag $flag");
                else
                    die("You must be admin to get flag");
        }
        die("H4x0r ?");
    }
    elseif(isset($_POST["search_user_exist"]))
    {
        $username = $_POST["username"];
        $name = $_POST["name"];
        if ( check_input($username) === false || check_input($name) === false)
        {
            die("h4x0r detected");
        }
        $sql = "SELECT id FROM users WHERE username='$username' or name='$name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            die("User exist");
        }
        die("No user");
    }
    else
    {
        highlight_file(__FILE__);
    }
?>
