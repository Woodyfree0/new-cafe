<?
namespace Model;
class RosterModel {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission for creating a new roster entry
            $data = [
                'Date' => $_POST['Date'],
                'FirstName' => $_POST['FirstName'],
                'LastName' => $_POST['LastName'],
                'StaffID' => $_POST['StaffID']
            ];

            if ($this->model->create($data)) {
                // Successfully created a new entry
                header('Location: /crud/roster/read'); // Redirect to the read page
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
        // Retrieve and display the list of roster entries
        $entries = $this->model->read();
        include 'view/read.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission for updating a roster entry
            $id = $_POST['ID'];
            $data = [
                'Date' => $_POST['Date'],
                'FirstName' => $_POST['FirstName'],
                'LastName' => $_POST['LastName'],
                'StaffID' => $_POST['StaffID']
            ];

            if ($this->model->update($id, $data)) {
                // Successfully updated the entry
                header('Location: /crud/roster/read'); // Redirect to the read page
            } else {
                // Handle the error, e.g., display an error message or log it
                echo 'Error updating the roster entry';
            }
        } else {
            // Display the form for updating a roster entry
            $id = $_GET['id']; // Get the ID of the entry to be updated
            $entry = $this->model->getEntryById($id); // You may need a method in your model to fetch a single entry
            include 'view/update.php';
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission for deleting a roster entry
            $id = $_POST['ID'];

            if ($this->model->delete($id)) {
                // Successfully deleted the entry
                header('Location: /crud/roster/read'); // Redirect to the read page
            } else {
                // Handle the error, e.g., display an error message or log it
                echo 'Error deleting the roster entry';
            }
        } else {
            // Display the confirmation form for deleting a roster entry
            $id = $_GET['id']; // Get the ID of the entry to be deleted
            $entry = $this->model->getEntryById($id); // You may need a method in your model to fetch a single entry
            include 'view/delete.php';
        }
    }
}

?>