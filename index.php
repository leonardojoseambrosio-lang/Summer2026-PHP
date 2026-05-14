<?php 
/*
Name: Leonardo Jose Ambrosio
ID: 200657215
Data: May/14/2026
Time: 7:14PM
Description: Lab 01 - PHP
Create a script that processes a list of students, calculates their status, and displays it safely.

 */


// Array to save students information
$students = [
["name" => "Leonardo", "score" => 100, "subject" => "PHP"],
["name" => "Peter Parker", "score" => 97, "subject" => "Java"],
["name" => "Reed Richards", "score" => 45, "subject" => "PHP"],
["name" => "Bruce Benner", "score" => 50, "subject" => "MySQL"],
];

//Function to check if the student FAIL or PASS based on the student score
    function getGradeStatus($score){
        if($score > 50){
        return "<span class='pass'>PASS</span>";
    }else{
        return "<span class='fail'>FAIL</span>";
    }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, device-width=width">
    <title>LAB 01 | List of Students</title>
    <meta name="description" content="List of students">
    <meta name="robots" content="noindex, nofollow">
</head>

<body>
    <header>
        <h1>Student List</h1>
    </header>
    <main>

        <section>
        <!-- Foreach to run for each $students elements/arguments -->
             <?php foreach($students as $student): ?>
            <div class="StudentList">
            <h3>Name: <?php echo htmlspecialchars($student['name']); ?></h3>
            <p>Grade: <?php echo htmlspecialchars($student['score']); ?></p>
            <p>Class: <?php echo htmlspecialchars($student['subject']); ?></p>
            
            <!-- Using function getGRadeStatus to check the student status (PAss/FAIL) -->
            <p>Status: <?php echo getGradeStatus($student['score']); ?> </p>
            
            </div>
            <!-- End Foreach -->
            <?php endforeach; ?>
        </section>

    </main>
    <footer>
        <!-- Count() to get the number of elements inisde the array
          and show the number of students evaluated. -->
        <p>Total Students Evaluated: <?php echo count($students); ?></p>
        
        <!-- Print Month/day/Year -->
        <p>&copy; <?php echo date("M/d/Y"); ?></p>
    </footer>


</body>
</html>
