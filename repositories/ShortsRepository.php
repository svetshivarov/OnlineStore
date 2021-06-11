<?php


class ShortsRepository extends Db
{
    public function create($data) {
        $sql = "
            INSERT INTO products(id, title, description, prd_type, gender, razmer, price, rating, thumbnail)
            VALUES(NULL, :title, :description, :prd_type, :gender, :razmer, :price, :rating, :thumbnail)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":title", $data["title"], PDO::PARAM_STR);
        $stmt->bindValue(":prd_type", $data["prd_type"], PDO::PARAM_STR);
        $stmt->bindValue(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindValue(":gender", $data["gender"], PDO::PARAM_STR);
        $stmt->bindValue(":razmer", $data["razmer"], PDO::PARAM_STR);
        $stmt->bindValue(":price", $data["price"], PDO::PARAM_INT);
        $stmt->bindValue(":rating", $data["rating"], PDO::PARAM_INT);
        $stmt->bindValue(":thumbnail", $data["thumbnail"], PDO::PARAM_STR);
        return
            $stmt->execute();
    }

    public function getAll()
    {
        $sql = "
        SELECT
            *
        FROM
            products
        WHERE
            prd_type = 'Shorts' || prd_type = 'Pants'
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllByTopic($topic) {
        $sql = "
            SELECT
                *
            FROM
                products
            WHERE
                LOWER(title) LIKE CONCAT('%', :topic , '%') OR
                LOWER(pdr_type) LIKE CONCAT('%', :topic , '%') OR
                LOWER(description) LIKE CONCAT('%', :topic , '%')
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":topic", strtolower($topic), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    public function getById($id) {
        $sql = "
            SELECT * FROM products WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function getAllCommentsForProduct($product_id)
    {
        $sql = "
            SELECT UC.username, C.comment, C.created_at FROM products P
            INNER JOIN  comments C ON C.product_id = P.id
            INNER JOIN  user_credentials UC ON UC.id = C.user_id
            WHERE P.id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update($data) {
        $sql = "
            UPDATE
                products
            SET
                title = :title,
                prd_type = :prd_type,
                description= :description,
                gender= :gender,
                razmer = :razmer,
                price = :price,
                rating = :rating,
                thumbnail = :thumbnail
            WHERE
                id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindValue(":title", $data["title"], PDO::PARAM_STR);
        $stmt->bindValue(":prd_type", $data["prd_type"], PDO::PARAM_STR);
        $stmt->bindValue(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindValue(":gender", $data["gender"], PDO::PARAM_STR);
        $stmt->bindValue(":razmer", $data["razmer"], PDO::PARAM_STR);
        $stmt->bindValue(":price", $data["price"], PDO::PARAM_INT);
        $stmt->bindValue(":rating", $data["rating"], PDO::PARAM_INT);
        $stmt->bindValue(":thumbnail", $data["thumbnail"], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "
            DELETE FROM products WHERE id = :id
           ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function addComment($product_id, $user_id, $comment) {
        $sql = "
            INSERT INTO comments(id, product_id, user_id, comment)
            VALUES(NULL, :product_id, :user_id, :comment)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":product_id", $product_id, PDO::PARAM_INT);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
        return $stmt->execute();
    }

}