<?php

require_once 'User.php';

$userConnection = new User();

if (isset($_POST['add'])) {

    $userConnection->create(['email' => $_POST['email'], 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'], 'age' => $_POST['age'], 'date_created' => date('Y-m-d H:i:s')]);

}

if (isset($_POST['edit'])) {

    $userConnection->update(['email' => $_POST['email'], 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'], 'age' => $_POST['age']], $_POST['id']);

}

if (isset($_POST['delete'])) {

    $userConnection->delete($_POST['id']);

}

$users = $userConnection->getList();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Работа с пользователями</title>
    <style>

    </style>
</head>
<body>
    <h2>Список пользователей</h2>
    <table>
        <thead>
            <td>Id</td>
            <td>Email</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Возраст</td>
            <td>Дата добавления</td>
        </thead>

        <?php

        foreach ($users as $user) {

        ?>

            <tr>
                <form action="index.php" method="post">
                    <td>
                        <input type="text" name="number" value="<?=$user['id'] ?>" disabled>
                        <input type="text" name="id" value="<?=$user['id'] ?>" style="display: none">
                    </td>
                    <td><input type="text" name="email" value="<?=$user['email'] ?>"></td>
                    <td><input type="text" name="first_name" value="<?=$user['first_name'] ?>"></td>
                    <td><input type="text" name="last_name" value="<?=$user['last_name'] ?>"></td>
                    <td><input type="text" name="age" value="<?=$user['age'] ?>"></td>
                    <td><input type="text" name="date_created" value="<?=$user['date_created'] ?>" disabled></td>
                    <td><input type="submit" name="edit" value="Edit"></td>
                    <td><input type="submit" name="delete" value="Delete"></td>
                </form>
            </tr>

        <?php

        }

        ?>

    </table>

    <h2>Добавить нового пользователя</h2>
    <table>
        <thead>
            <td>Email</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Возраст</td>
        </thead>
        <tr>
            <form action="index.php" method="post">
                <td><input type="email" name="email" value=""></td>
                <td><input type="text" name="first_name" value=""></td>
                <td><input type="text" name="last_name" value=""></td>
                <td><input type="text" name="age" value=""></td>
                <td><input type="submit" name="add" value="Add"></td>
            </form>
        </tr>
    </table>

</body>
</html>