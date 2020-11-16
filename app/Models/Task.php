<?php
namespace App\Models;

class Task {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllTasks() {
        $this->db->query('SELECT * FROM tasks');
        $results = $this->db->resultSet();

        return $results;
    }
}