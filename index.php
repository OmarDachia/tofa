<?php
    require_once 'config.php';
    require_once 'student.php';

    $student = new Student($conn);
    // echo $student->createTable();

    // echo $student->create("Umar Dachia", "1014", "08181818081", "Hotoro unguwar gabas");
    print_r($student->read(3));
    // echo $student->update(1, "Jane Doe", "9876543210", "456 Elm St");
    // echo $student->delete(1);
?>