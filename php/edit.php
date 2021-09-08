<?php

include "../db_conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $fullName = $row['fullName'];
        $email = $row['email'];
    }
}
if (isset($_POST['update'])) {

    $id = $_GET['id'];
    $update_fullName = $_POST['update_fullName'];
    $update_email = $_POST['update_email'];
    $update_password = md5($_POST['update_pássword']);
    $update_role = $_POST['update_role'];

    $query = "UPDATE users SET fullName = '$update_fullName', email = '$update_email', role = '$update_role', password = '$update_password' WHERE id = $id";

    $result = mysqli_query($conn, $query);

    header("Location: ../home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Edit</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <form class="border shadow p-3 rounded" action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST"style="width: 450px;">
        <h2 class="text-center p-3">Edit User</h2>
            <div class="mb-3">
                <label for="create_fullName" class="form-label">Full name</label>
                <input type="text" class="form-control" id="update_fullName" name="update_fullName" value="<?php echo $fullName; ?>">
            </div>
            <div class="mb-3">
                <label for="create_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="update_email" name="update_email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="create_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="update_password" name="update_password">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="update_role" id="update_admin_role" value="admin">
                <label class="form-check-label" for="update_admin_role">
                    Admin
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="update_role" id="update_user_role" value="user">
                <label class="form-check-label" for="update_user_role">
                    User
                </label>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Submit</button>
            <a href="../home.php">Back</a>
        </form>
    </div>
</body>

</html>