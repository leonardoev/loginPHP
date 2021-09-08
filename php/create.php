<?php

include "../db_conn.php";

if (isset($_POST['create_email']) && isset($_POST['create_fullName']) 
&& isset($_POST['create_password']) && isset($_POST['create_role'])) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $email = test_input($_POST['create_email']);
    $password = test_input($_POST['create_password']);
    $role = test_input($_POST['create_role']);
    $fullName = test_input($_POST['create_fullName']);

    $password = md5($password);

    $query = "INSERT INTO users(role,email,password,fullName) VALUES ('$role','$email','$password','$fullName')";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed");
    }

    header("Location: ../home.php");

}else{
echo "asd";
}
