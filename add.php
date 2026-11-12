<?php
include "db.php";
include "header.php";

if (isset($_POST['submit'])) {
$student_name = $_POST['student_name'];
$matric_no = $_POST['matric_no'];
$subject_name = $_POST['subject_name'];
$subject_code = $_POST['subject_code'];
$test1 = $_POST['test1'];
$test2 = $_POST['test2'];
$final_exam = $_POST['final_exam'];

$total = $test1 + $test2 + $final_exam;

if ($total >= 80) 
    $grade = 'A';
else if ($total >= 65) 
    $grade = 'B';
else if ($total >= 50) 
    $grade = 'C';
else if ($total >= 40) 
    $grade = 'D';
else 
    $grade = 'F';

$sql = $conn->prepare("INSERT INTO result 
    (student_name, matric_no, subject_name, subject_code, test1, test2, final_exam, total_marks, grade) 
    VALUES ('$student_name', '$matric_no', '$subject_name', '$subject_code', '$test1', '$test2', '$final_exam', '$total', '$grade')");


    if ($sql -> execute()) {
        header("Location: index.php");
    }
}

$student_name = "";
$matric_no = "";
$subject_name = "";
$subject_code = "";
$subject_name = "";
$test1 = "";
$test2 = "";
$final_exam = "";
?>

<?php

include "form.php";
include "footer.php";

?>