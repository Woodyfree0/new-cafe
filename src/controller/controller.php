<?
namespace MyApp\controller\controller;
use PDO;
use PDOException;
class controller {
    private $db;

    public function __construct($db) {
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
            return $this->db->exec($query);
        } catch (PDOException $e) {
            // Handle database error
            return false;
        }
    }

    public function read() {
        try {
            $query = "SELECT * FROM roster";
            $result = $this->db->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle database error
            return array();
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
            return $this->db->exec($query);
        } catch (PDOException $e) {
            // Handle database error
            return false;
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM roster WHERE ID = $id";
            return $this->db->exec($query);
        } catch (PDOException $e) {
            // Handle database error
            return false;
        }
    }
}

?>