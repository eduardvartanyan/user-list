<?php

class User {

    private $connection;

    public function __construct()
    {

        $this->connection = new PDO('mysql:host=localhost;dbname=task20;charset=utf8', 'phpstorm', 'phpstorm');

    }

    public function create($user)
    {

        $insertUser = $this->connection->prepare("INSERT INTO users(id, email, first_name, last_name, age, date_created) VALUES (null, :email, :first_name, :last_name, :age, :date_created)");
        $insertUser->execute($user);

    }

    public function update($userData, $id)
    {

        $updatetUser = $this->connection->prepare("UPDATE users SET email=:email, first_name=:first_name, last_name=:last_name, age=:age WHERE id=:id");
        $updatetUser->execute(['email' => $userData['email'], 'first_name' => $userData['first_name'], 'last_name' => $userData['last_name'], 'age' => $userData['age'], 'id' => $id]);

    }

    public function delete($id)
    {

        $deletetUser = $this->connection->prepare("DELETE FROM `users` WHERE id=?");
        $deletetUser->execute([$id]);

    }

    public function getList()
    {

        $getUsersList = $this->connection->prepare("SELECT * FROM users");
        $getUsersList->execute();
        return $getUsersList->fetchAll();

    }

}