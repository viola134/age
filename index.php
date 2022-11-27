<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students age</title>
    <style>
table, td {
    border: 1px solid black;
}
td {
    text-align: center;
}
    </style>
</head>
<body>
<?php
include "db.php";
$months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
$days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
function age($a, $b){
    return $a['age'] <=> $b['age'];
}
uasort($students, "age");
echo "<table><tr><td>Name</td><td>Bitrthday</td></tr>";
foreach ($students as $key => $student) {
    $students_name = $student['name'];
    $students_age = getdate($student["age"]);
    $day = 'Date: '. $students_age['mday'].", ";
    $month = 'Month: '. $months[$students_age['mon']-1].", ";
    $week_day = 'Day of the week: '. $days[$students_age['wday']-1];
    echo "<tr><td>$students_name</td><td>$day $month $week_day</td></tr>";
}
echo "</table>";?>
</body>
</html>