<?php

class OrderRepository extends Db
{

         public function create($data) {
            $sql = "
                INSERT INTO orders(id, prd_name, quantity, prd_size, person_name, email, city, address)
                VALUES(NULL, :prd_name, :quantity, :prd_size, :person_name, :email, :city, :address)
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":prd_name", $data["prd_name"], PDO::PARAM_STR);
            $stmt->bindValue(":quantity", $data["quantity"], PDO::PARAM_INT);
            $stmt->bindValue(":prd_size", $data["prd_size"], PDO::PARAM_STR);
            $stmt->bindValue(":person_name", $data["person_name"], PDO::PARAM_STR);
            $stmt->bindValue(":email", $data["email"], PDO::PARAM_STR);
            $stmt->bindValue(":city", $data["city"], PDO::PARAM_STR);
            $stmt->bindValue(":address", $data["address"], PDO::PARAM_STR);
            return
                $stmt->execute();
        }
//    public function create($data) {
//        $sql = "
//            INSERT INTO orders(id, (SELECT title FROM products WHERE prd_name = :prd_name AS prd_name), quantity, price, total_price, person_name, city, address)
//            VALUES(NULL, :prd_name, :quantity, :price, :total_price, :person_name, :city, :address)
//        ";
//        $stmt = $this->conn->prepare($sql);
//        $stmt->bindValue(":prd_name", $data["prd_name"], PDO::PARAM_STR);
//        $stmt->bindValue(":quantity", $data["quantity"], PDO::PARAM_INT);
//        $stmt->bindValue(":price", $data["price"], PDO::PARAM_STR);
//        $stmt->bindValue(":total_price", $data["total_price"], PDO::PARAM_STR);
//        $stmt->bindValue(":person_name", $data["person_name"], PDO::PARAM_STR);
//        $stmt->bindValue(":city", $data["city"], PDO::PARAM_STR);
//        $stmt->bindValue(":address", $data["address"], PDO::PARAM_STR);
//        return
//            $stmt->execute();
//    }

    public function getAll()
    {
        //    SELECT o.id, p.prd_type FROM orders o JOIN products p ON p.id = o.id
        $sql = "
        SELECT
            *
        FROM
            orders
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        $sql = "
            SELECT * FROM orders WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update($data) {
        $sql = "
            UPDATE
                orders
            SET
                (SELECT title FROM products WHERE prd_name = :prd_name AS prd_name),
                quantity = :quantity,
                price = :price,
                total_price = :total_price,
                person_name = :person_name,
                city = :city,
                address = :address
            WHERE
                id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindValue(":prd_name", $data["prd_name"], PDO::PARAM_STR);
        $stmt->bindValue(":quantity", $data["quantity"], PDO::PARAM_INT);
        $stmt->bindValue(":price", $data["price"], PDO::PARAM_STR);
        $stmt->bindValue(":total_price", $data["total_price"], PDO::PARAM_STR);
        $stmt->bindValue(":person_name", $data["person_name"], PDO::PARAM_STR);
        $stmt->bindValue(":city", $data["city"], PDO::PARAM_STR);
        $stmt->bindValue(":address", $data["address"], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "
            DELETE FROM orders WHERE id = :id
           ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}