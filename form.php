<style>
    label {
        display: inline-block;
        width: 15%;
    }
</style>

<h2>Student Result Form</h2>

<form action="" method="POST">
    <label for="student_name">Student Name</label>
    <input type="text" id="student_name" name="student_name" value="<?php echo htmlspecialchars($student_name ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br><br>
    
    <label for="matric_no">Matric No.</label>
    <input type="text" id="matric_no" name="matric_no" value="<?php echo htmlspecialchars($matric_no ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br><br>
    
    <label for="subject_name">Subject Name</label>
    <input type="text" id="subject_name" name="subject_name" value="<?php echo htmlspecialchars($subject_name ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br><br>
    
    <label for="subject_code">Subject Code</label>
    <input type="text" id="subject_code" name="subject_code" value="<?php echo htmlspecialchars($subject_code ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br><br>
    
    <label for="test1">Test 1</label>
    <input type="text" id="test1" name="test1" value="<?php echo htmlspecialchars($test1 ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br><br>
    
    <label for="test2">Test 2</label>
    <input type="text" id="test2" name="test2" value="<?php echo htmlspecialchars($test2 ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br><br>
    
    <label for="final_exam">Final Examination</label>
    <input type="text" id="final_exam" name="final_exam" value="<?php echo htmlspecialchars($final_exam ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br><br>
    
    <input type="submit" name="submit" value="Submit"><br><br>
</form>