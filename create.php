<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Create</title>
</head>

<body>
    <form action="php/create.php" method="POST">
        <div class="mb-3">
            <label for="create_fullName" class="form-label">Full name</label>
            <input type="text" class="form-control" id="create_fullName" name="create_fullName">
        </div>
        <div class="mb-3">
            <label for="create_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="create_email" name="create_email">
        </div>
        <div class="mb-3">
            <label for="create_password" class="form-label">Password</label>
            <input type="password" class="form-control" id="create_password" name="create_password">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="create_role" id="create_admin_role" checked value="admin">
            <label class="form-check-label" for="create_admin_role">
                Admin
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="create_role" id="create_user_role" value="user">
            <label class="form-check-label" for="create_user_role">
                User
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="home.php">Back</a>
</body>

</html>