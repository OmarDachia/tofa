<?php
    class Student {
        private $conn;
        private $table = "student";
        
        public function __construct($conn) {
            $this->conn = $conn;
            $this->createTable();
        }

        public function createTable(){
            $sql = "CREATE TABLE IF NOT EXISTS $this->table (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        name VARCHAR(255),
                        reg_no VARCHAR(255),
                        phone VARCHAR(20),
                        address VARCHAR(255)
                        );";
            $stmt = $this->conn->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //CRUD - Create, Read, Update, Delete
        public function create($name, $reg_no, $phone, $address) {
            $query = "INSERT INTO $this->table (name, reg_no, phone, address) VALUES (?,?,?,?)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssss", $name, $reg_no, $phone, $address);
            
            return $stmt->execute();
        }

        public function read($id) {
            $query = "SELECT * FROM $this->table WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }

        // public function update($id, $name, $age) {
        //     $query = "UPDATE $this->table SET name = :name, age = :age WHERE id = :id";
        //     $stmt = $this->conn->prepare($query);
        //     $stmt->bindParam(':id', $id);
        //     $stmt->bindParam(':name', $name);
        //     $stmt->bindParam(':age', $age);
        //     return $stmt->execute();
        // }

        // public function delete($id) {
        //     $query = "DELETE FROM $this->table WHERE id = :id";
        //     $stmt = $this->conn->prepare($query);
        //     $stmt->bindParam(':id', $id);
        //     return $stmt->execute();
        // }

        // public function getDetails() {
        //     return "Name: " . $this->name . ", Age: " . $this->age;
        // }
    }

?>