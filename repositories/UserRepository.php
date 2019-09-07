<?php
require_once('repositories/BaseRepository.php');

class UserRepository extends BaseRepository
{


    public function getUserByEmail($email): ?User
    {
        $connection = $this->getConnection();
        $statement = $connection->prepare('SELECT * from users where Email=?');
        $statement->bind_param("s", $email);
        $statement->execute();
        $record = $statement->get_result()->fetch_assoc();
        if (empty($record)) {
            return null;
        } else {
            return $this->makeUserFromRecord($record);
        }
    }

    public function getUserById($id): ?User
    {
        $connection = $this->getConnection();
        $statement = $connection->prepare('SELECT * from users where ID=?');
        $statement->bind_param("i", $id);
        $statement->execute();
        $record = $statement->get_result()->fetch_assoc();
        if (empty($record)) {
            return null;
        } else {
            return $this->makeUserFromRecord($record);
        }
    }

    public function deleteUserById($id)
    {
        $connection = $this->getConnection();
        $statement = $connection->prepare('DELETE from users where ID=?');
        $statement->bind_param("i", $id);
        $result = $statement->execute();
        return ($result===false) ? false : true;
    }

    public function addUser($name,$lastName,$surName,$email,$pass)
    {
        $connection = $this->getConnection();
        $statement = $connection->prepare('INSERT INTO users (Nombre, Apellido1, Apellido2, Email, Password)  VALUES (?,?,?,?,?)');
        $statement->bind_param("sssss",$name,$lastName,$surName,$email,$pass);
        $result = $statement->execute();
        return ($result === false) ? false : true;
    }

    public function updateUser($id,$name,$lastName,$surName,$email,$pass)
    {
        $connection = $this->getConnection();
        $statement = $connection->prepare('UPDATE users set Nombre=?,Apellido1=?,Apellido2=?,Email=?,Password=? WHERE ID = ?');
        $statement->bind_param("sssssi",$name,$lastName,$surName,$email,$pass,$id);
        $result = $statement->execute();
        return ($result === false) ? false : true;
    }

    public function getAllUsers() : ?array
    {
        $connection = $this->getConnection();
        $statement = $connection->prepare('SELECT * from users');
        $statement->execute();
        $records = $statement->get_result();
        if ($records === false) {
            return null;
        } else {
            $users = array();
            while ($record = $records->fetch_assoc()) {
                $users[] = $this->makeUserFromRecord($record);
            }
            return $users;
        }
    }

    private function makeUserFromRecord($record)
    {
        return new User($record['ID'], $record['Nombre'], $record['Apellido1'], $record['Apellido2'], $record['Email'], $record['Password']);
    }
}

?>