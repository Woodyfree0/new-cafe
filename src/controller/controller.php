<?php
namespace MyApp\controller;

use MyApp\model\model;
use mysqli;
use Exception;

class controller {
    private $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function create($data) {
        try {
            $query = "INSERT INTO roster (Date, FirstName, LastName, StaffID) VALUES (
                '" . $data['Date'] . "',
                '" . $data['FirstName'] . "',
                '" . $data['LastName'] . "',
                '" . $data['StaffID'] . "'
            )";
            $result = $this->db->query($query);

            if (!$result) {
                throw new Exception("Failed to insert data");
            }

            return $result;
        } catch (Exception $e) {
            // Handle database error
            return false;
        }
    }

    public function read() {
        try {
            $query = "SELECT * FROM Roster";
            $result = $this->db->query($query);
    
            if (!$result) {
                throw new Exception("Query execution failed");
            }
    
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
    
            // Include the view file and pass $data to it
            include('src/view/read.php');
    
            return $data;
        } catch (Exception $e) {
            // Handle any exceptions, e.g., log the error
            echo "An error occurred: " . $e->getMessage();
            return [];
        }
    }
    

    public function update($id, $data) {
        try {
            $query = "UPDATE roster SET
                Date = '" . $data['Date'] . "',
                FirstName = '" . $data['FirstName'] . "',
                LastName = '" . $data['LastName'] . "',
                StaffID = '" . $data['StaffID'] . "'
                WHERE ID = $id";
            $result = $this->db->query($query);

            if (!$result) {
                throw new Exception("Failed to update data");
            }

            return $result;
        } catch (Exception $e) {
            // Handle database error
            return false;
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM roster WHERE ID = $id";
            $result = $this->db->query($query);

            if (!$result) {
                echo ("Failed to delete data");
            }

            return $result;
        } catch (Exception $e) {
            // Handle database error
            return false;
        }
    }
}
?>
