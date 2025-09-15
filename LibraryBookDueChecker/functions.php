<!--
=====================================================

File: functions.php

=====================================================

Developer(s): Joshua Schumann

=====================================================

-->
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cossette+Titre:wght@400;700&display=swap" rel="stylesheet">
    <title>Due Checker</title>
</head>



<?php


function calculatetime($ReturnDate, $DueDate) {


    // if return date is before due date, tells you how long you have
    if ($ReturnDate < $DueDate){

        $rd = new DateTime($ReturnDate);
        $dd = new DateTime($DueDate);

        //getting the differnce
        $diff = date_diff($rd, $dd);

        //i have no clue how this changes it from datetime to interval but chuck does and that gets him 10 big booms
        $diffFormated = $diff->format('%a day(s)');
        echo("<h1>" . $diffFormated . " until Due" . "</h1>"  . "<br>");
        echo("<h2>Return Date: </h2>" . "<h2>" . $rd->format('m-d-Y') . "</h2>" . "<br>");
        echo("<h2>Due Date: </h2>" . "<h2>" . $dd->format('m-d-Y') . "</h2>" . "<br>");
    }

        if ($ReturnDate > $DueDate){
        
        $rd = new DateTime($ReturnDate);
        $dd = new DateTime($DueDate);

        //getting the differnce
        $diff = date_diff($dd, $rd);

        //i have no clue how this changes it from datetime to interval but chuck does and that gets him 10 big booms

        $diffFormated = $diff->format('%a day(s)');
        echo("<h1>" . $diffFormated  . " past due"  . "</h1>" . "<br>");
        echo("<h2>Return Date: </h2>" . "<h2>" . $rd->format('m-d-Y') . "</h2>" . "<br>");
        echo("<h2>Due Date: </h2>" . "<h2>" . $dd->format('m-d-Y') . "</h2>" . "<br>");
    }

        if ($ReturnDate == $DueDate){
        $rd = new DateTime($ReturnDate);
        $dd = new DateTime($DueDate);
        echo("<h1>The book is due today!</h1>" . "<br>");
        echo("<h2>Return Date: </h2>" . "<h2>" . $rd->format('m-d-Y') . "</h2>" . "<br>");
        echo("<h2>Due Date: </h2>" . "<h2>" . $dd->format('m-d-Y') . "</h2>" . "<br>");
    }
}


if (isset($_POST['submit_button'])) {
    $returnDate = $_POST['ReturnDate'];
    $dueDate = $_POST['DueDate'];

    calculatetime($returnDate, $dueDate);
}



?>