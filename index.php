<?php
    require_once 'config.php';
    require_once 'student.php';

    $student = new Student($conn);
    // echo $student->createTable();

    // echo $student->create("John Doe", "123456", "1234567890", "123 Main St");
    print_r($student->read(1));
    // echo $student->update(1, "Jane Doe", "9876543210", "456 Elm St");
    // echo $student->delete(1);
?>