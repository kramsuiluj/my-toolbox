<?php 

class User {

    private $db;

    function __construct ($conn) {
        $this->db = $conn;
    }

    public function saveUserData($username, $email, $contact, $pass, $cpass) {

        try {

            // Sets the SQL query to be executed.
            $sql = "INSERT INTO users (username, email, contact, pass, c_pass) VALUES (:username, :email, :contact, :pass, :cpass)";

            // Prepares the SQL query for execution.
            $stmt = $this->db->prepare($sql);

            // Bind the real value to the placeholders.
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':pass', $pass);
            $stmt->bindparam(':cpass', $cpass);

            // Execute the SQL query.
            $stmt->execute();

            return true;

        } catch (PDOException $e) {

            echo "There was an error while inserting data to the database: " . $e->getMessage();
            return false;

        }

    }


}

?>