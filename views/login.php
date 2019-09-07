<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <?php
        include('views/base/styles.php');
        ?>
</head>
<body>
    <?php
        include('views/base/navbar_guest.php');
    ?>

    <main role="main" class="container">
        <?php
            include('views/base/errors.php');
        ?>
        <div class="centered-col">
            <form method="POST" action="/index.php" name="formpass">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" required aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" required placeholder="Password">
                </div>
                <input type="hidden"  name="token" value="<?php echo $token; ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </main><!-- /.container -->

    <?php
        include('views/base/scripts.php');
    ?>
</body>
</html>

