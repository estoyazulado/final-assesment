<?php
include "db.php";

// Get the search input safely
$search = $_GET['search'] ?? "";

// Correctly format the like variable using the $search variable
$like = "%" . $search . "%";

// Prepare the query
$sql = $conn->prepare("SELECT * FROM result WHERE student_name
LIKE ? OR matric_no LIKE ? OR subject_name LIKE ? OR subject_code LIKE ?");

$sql->bind_param("ssss", $like, $like, $like, $like);
$sql->execute();
$result = $sql->get_result();

include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading System</title>
</head>

<body>

    <h2>Student Records</h2>

    <a href="add.php">+ Add Result</a>

    <form method="get">
        <input type="text" name="search" placeholder="Search by name or ID" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
        <a href="index.php">Show All</a>
    </form>

    <div>
        <table border="2">
            <tr>
                <th>No.</th>
                <th>Student Name</th>
                <th>Metric No.</th>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Test 1 (20%)</th>
                <th>Test 2 (30%)</th>
                <th>Final (50%)</th>
                <th>Total (100%)</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>

            <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['matric_no']) . "</td>";
                echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['subject_code']) . "</td>";
                echo "<td>" . htmlspecialchars($row['test1']) . "</td>";
                echo "<td>" . htmlspecialchars($row['test2']) . "</td>";
                echo "<td>" . htmlspecialchars($row['final_exam']) . "</td>";
                echo "<td>" . htmlspecialchars($row['total_marks']) . "</td>";
                echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "'><button type='button'>Edit</button></a> ";
                echo "<form method='POST' action='delete.php' style='display:inline;' onsubmit='return confirm(\"Are you sure you want to delete this record?\");'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<button type='submit'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>