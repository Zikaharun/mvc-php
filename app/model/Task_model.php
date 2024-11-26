<?php

class Task_model {
    private $table = 'task';
    private $db;

    public function __construct() {

        $this->db = new Database;

    }

    public function getAllTask() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getTaskByid($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_task = :id" );

        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addTask($data) {
        $name_task = htmlspecialchars($data['name_task']);
        $category = htmlspecialchars($data['category']);
        $notes = htmlspecialchars($data['notes']);

        $query = 'INSERT INTO task (name_task, category, notes)
                    VALUES(:name_task, :category, :notes)' ;
        
        $this->db->query($query);

        $this->db->bind('name_task', $name_task);
        $this->db->bind('category', $category);
        $this->db->bind('notes', $notes);

        $this->db->execute();


        return $this->db->rowCount();


    }

    public function delete ($id) {
        $id_task = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = "DELETE FROM task WHERE id_task = :id";
        $this->db->query($query);
        $this->db->bind('id', $id_task);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateTask($data) {

        $name_task = htmlspecialchars($data['name_task']);
        $category = htmlspecialchars($data['category']);
        $notes = htmlspecialchars($data['notes']);
        $id_task = filter_var($data['id_task'], FILTER_SANITIZE_NUMBER_INT);

        $query = 'UPDATE task SET name_task = :name_task, category = :category, notes = :notes WHERE id_task = :id';
        
        $this->db->query($query);

        $this->db->bind('name_task', $name_task);
        $this->db->bind('category', $category);
        $this->db->bind('notes', $notes);
        $this->db->bind('id', $id_task);

        $this->db->execute();

        return $this->db->rowCount();


    }

    public function updateStatus($data) {

        $id_status = filter_var($data['id_status'], FILTER_SANITIZE_NUMBER_INT);
        $status = htmlspecialchars($data['status']);

        $current_date = date("j F Y"); 

        
        $query = $data['status'] === 'done' 
            ? "UPDATE task SET status = :status, date = :current_date  WHERE id_task = :id"
            : "UPDATE task SET status = :status WHERE id_task = :id";
    

        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id',$id_status);

        if ($data['status'] === 'done') {
            $this->db->bind('current_date', $current_date);
        }
    

        $this->db->execute();

        return $this->db->rowCount();
        
    }


    public function searchTask() {
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM task WHERE name_task LIKE :keyword"; 
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }


}