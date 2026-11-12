<?php
include("db.php");
include "header.php";

// Get ID from URL
$id = $_GET["id"] ?? 0;

// Handle form submission for update
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

    // Fixed SQL syntax (removed trailing commas and changed table name to 'result')
    $sql = $conn->prepare("UPDATE result SET
        student_name = '$student_name',
        matric_no = '$matric_no',
        subject_name = '$subject_name',
        subject_code = '$subject_code',
        test1 = '$test1',
        test2 = '$test2',
        final_exam = '$final_exam',
        total_marks = '$total',
        grade = '$grade'
        WHERE id = ?");

    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        header("Location: index.php");
        exit();
    }
}

// Fetch existing record to display in the form
$stmt = $conn->prepare("SELECT * FROM result WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

if ($row) {
    $student_name = $row['student_name'];
    $matric_no = $row['matric_no'];
    $subject_name = $row['subject_name'];
    $subject_code = $row['subject_code'];
    $test1 = $row['test1'];
    $test2 = $row['test2'];
    $final_exam = $row['final_exam'];
} else {
    // Fallback if ID doesn't exist
    $student_name = $matric_no = $subject_name = $subject_code = $test1 = $test2 = $final_exam = "";
}
?>

<h2>Edit Result</h2>

<?php
include "form.php";
include "footer.php";
?>