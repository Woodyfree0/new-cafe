<?php

namespace MyApp\model;

use mysqli;

class model {
    private $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function create($data) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission for creating a new roster entry
            $Date = $data['Date'];
            $FirstName = $data['FirstName'];
            $LastName = $data['LastName'];
            $StaffID = $data['StaffID'];

            $query = "INSERT INTO roster (Date, FirstName, LastName, StaffID) VALUES ('$Date', '$FirstName', '$LastName', '$StaffID')";

            if ($this->db->query($query)) {
                // Successfully created a new entry
                header('Location: /crud/roster/read');
            } else {
                // Handle the error, e.g., display an error message or log it
                echo 'Error creating the roster entry';
            }
        } else {
            // Display the form for creating a new entry
            include 'view/create.php';
        }
    }

    public function read() {
        $query = "SELECT * FROM roster";
        $result = $this->db->query($query);
        $data = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function update($id, $data) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission for updating a roster entry
            $Date = $data['Date'];
            $FirstName = $data['FirstName'];
            $LastName = $data['LastName'];
            $StaffID = $data['StaffID'];

            $query = "UPDATE roster SET Date = '$Date', FirstName = '$FirstName', LastName = '$LastName', StaffID = '$StaffID' WHERE ID = $id";

            if ($this->db->query($query)) {
                // Successfully updated the entry
                header('Location: /crud/roster/read');
            } else {
                // Handle the error, e.g., display an error message or log it
                echo 'Error updating the roster entry';
            }
        } else {
            // Display the form for updating a roster entry
            $id = $_GET['id'];
            $entry = $this->getEntryById($id);
            include 'view/update.php';
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $query = "DELETE FROM roster WHERE ID = $id";

            if ($this->db->query($query)) {
                // Successfully deleted the entry
                header('Location: /crud/roster/read');
            } else {
                // Handle the error, e.g., display an error message or log it
                echo 'Error deleting the roster entry';
            }
        } else {
            // Display the confirmation form for deleting a roster entry
            $id = $_GET['id'];
            $entry = $this->getEntryById($id);
            include 'view/delete.php';
        }
    }
    public function getEntryById($id) {
        $query = "SELECT * FROM roster WHERE ID = $id";
        $result = $this->db->query($query);
        
        if ($result) {
            return $result->fetch_assoc();
        } else {
            // Handle the error, e.g., display an error message or return an empty array
            return array();
        }
    }
}
?>
