<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Area</title>
    <?php
        include('views/base/styles.php');
    ?>
</head>
<body>
    <?php
        include('views/base/navbar_logged.php');
    ?>

    <main role="main" class="container">
        <?php
        include('views/base/errors.php');
        ?>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($users as $u) {
                    ?>
                <tr>
                    <th scope="row"><?= $u->getId() ?></th>
                    <td><?=htmlspecialchars($u->getName(),ENT_QUOTES,'UTF-8') ?></td>
                    <td><?=htmlspecialchars($u->getLastName(),ENT_QUOTES,'UTF-8')?></td>
                    <td><?=htmlspecialchars($u->getSurName(),ENT_QUOTES,'UTF-8')?></td>
                    <td><?=htmlspecialchars($u->getEmail(),ENT_QUOTES,'UTF-8')?></td>
                    <td><i class="fas fa-edit clickable-icon" data-toggle="modal" data-target="#editModal-<?=$u->getId()?>"></i></td>
                    <td><i class="fas fa-trash clickable-icon" data-toggle="modal" data-target="#deleteModal-<?=$u->getId()?>"></i></td>
                </tr>
            <?php
                }
            ?>
            </tbody>

        </table>

    </main><!-- /.container -->
    <div id="add_button">
        <button type="button" class="btn btn-default btn-circle btn-xl add" data-toggle="modal" data-target="#add-user"><i class="fa fa-plus" ></i></button>
    </div>
    <?php
        foreach($users as $u)
        {
            include('views/base/modal_delete.php');
            include('views/base/modal_edit.php');
        }

    ?>

    <?php
        include('views/base/modal_add.php');
    ?>
    <?php
        include('views/base/scripts.php');
    ?>
</body>
</html>
