<?php

class ContactsRepository extends Db
{
    public function getById($id) {
        $stmt = $this->conn->prepare("
            SELECT 
                * 
            FROM 
               user_credentials 
            WHERE 
                id = $id;
            ");
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("
            SELECT 
                * 
            FROM 
                user_credentials
            ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}