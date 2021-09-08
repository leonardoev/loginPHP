<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['email']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>HOME</title>
    </head>

    <body>
        <?php
        if ($_SESSION['role'] == 'admin') { ?>
            <h5>Welcome <?= $_SESSION['fullName'] ?>!</h5>
            <a href="logout.php" class="btn btn-dark">Logout</a>
            <a href="create.php">Create</a> |
            <div class="p-3">
                <?php include 'php/members.php';
                if (mysqli_num_rows($res) > 0) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($rows = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $rows['fullName'] ?></td>
                                    <td><?= $rows['email'] ?></td>
                                    <td><?= $rows['role'] ?></td>
                                    <td>
                                        <a href="php/edit.php?id=<?php echo $rows['id']?>">Edit</a> |
                                        <a  href="php/delete.php?id=<?php echo $rows['id']?>" >Delete</a>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        <?php } else { ?>
            <h5>Welcome <?= $_SESSION['fullName'] ?>!</h5>
            <a href="logout.php" class="btn btn-dark">Logout</a>
            <div class="p-3">
                <?php include 'php/members.php';
                if (mysqli_num_rows($res) > 0) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($rows = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $rows['fullName'] ?></td>
                                    <td><?= $rows['email'] ?></td>
                                    <td><?= $rows['role'] ?></td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        <?php } ?>
    </body>

    </html>
<?php } else {
    header("Location: index.php");
} ?>