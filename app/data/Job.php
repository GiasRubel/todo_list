<?php


namespace App\data;


use PDO;

class Job extends Database
{
    public function index()
    {
        $statement = $this->db->prepare("select * from jobs");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($title)
    {
        $sql = "INSERT INTO jobs(title) VALUES(:title)";
        $statement =  $this->db->prepare($sql);
        $statement->bindParam (":title", $title, PDO::PARAM_STR);
        if ($statement->execute()) {
            return  'data inserted successfully';
        }
    }
    public function changeTitle($title, $id)
    {
        $sql = "UPDATE jobs SET title = :title WHERE id = :id";
        $statement =  $this->db->prepare($sql);
        if ($statement->execute([':title' => $title, ':id' => $id])) {
            return  'data updated successfully';
        }
    }

    public function changeActive($id, $active)
    {
        $sql = "UPDATE jobs SET active = :active WHERE id = :id";
        $statement =  $this->db->prepare($sql);
        $statement->execute([':active' => $active, ':id' => $id]);
        return  'data changed successfully';
    }

    public function getActive()
    {
        $statement = $this->db->prepare("select * from jobs where active = 0");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCompleted()
    {
        $statement = $this->db->prepare("select * from jobs where active = 1");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function clearCompleted()
    {
        $statement = $this->db->prepare("delete from jobs where active = 1");
        $statement->execute();
        return "data deleted";
    }

    public function deleteJob($id)
    {
        $statement = $this->db->prepare("delete from jobs where id = :id");
        $statement->execute([':id' => $id]);
        return "data deleted";
    }
}