<!DOCTYPE html>

<!-- 
Author: Jonathan Myers
Date Last Modified: 10/1/2015

This page has been created to serve as an introductory survey for Baylor University's CSI 1095 course, in order
to provide anonymous information to the faculty about the opinions of newly enrolled computer science students. 
Various echo statements throughout the program have been commented out - these statements serve the purpose of
testing for data being added to the database. These statements have been commented out and left in, in the event
that someone else desires to use this survey page and would like to easily test each potential addition to the
database.

The server name, username, password, and database name fields have all been left blank. Values need to be input
for those in order for this page to successfully connect to a database.

-->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-us">
<head>
  <meta http-equiv="content-type" content="../text/html; charset=utf-8">

  <!-- Enable responsiveness on mobile devices-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

  <!-- Icons -->
  <link rel="shortcut icon" href="../public/icon.ico">

  <!-- RSS -->
  <link rel="alternate" type="application/rss+xml" title="RSS" href="/atom.xml">
<style>
.error {color: #FF0000; }
</style>
</head>

<body>

<?php
   // Declare the variables that are needed to connect to the database
   $servername = "localhost";
   $username = "";
   $password = "";
   $dbname = "";
   
   // Create Connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
   if($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
?>

<?php
   // Define variables and set to empty values
   $baylorid = "";
   $q1 = "";
   $q2 = "";
   $q3 = "";
   $q4a = $q4b = $q4c = $q4d = $q4e = "";
   $q5a = $q5b = $q5c = $q5d = $q5e = "";
   $q6a = $q6b = $q6c = $q6d = $q6e = $q6f = $q6g = "";
   $q7 = "";
   $q8 = "";
   $q9a = $q9b = $q9c = $q9d = $q9e = $q9f = "";
   $q10a = $q10b = $q10c = $q10d = $q10e = "";
   $q11 = "";
   $q12 = "";
   $q13 = "";
   $q14 = "";
   $q15 = "";
   $answers = "";
   $redo_questions = "";

   // Refresh the variables if the user submits
   // This allows the variables to be auto-filled after a page refresh, in the event that a
    // user did not complete the form, so that the user does not have to re-fill all the 
    // information.
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $baylorid = test_input($_POST["baylorid"]);
      $q1 = test_input($_POST["q1"]);
      $q2 = test_input($_POST["q2"]);
      $q3 = test_input($_POST["q3"]);
      $q4a = test_input($_POST["q4a"]);
      $q4b = test_input($_POST["q4b"]);
      $q4c = test_input($_POST["q4c"]);
      $q4d = test_input($_POST["q4d"]);
      $q4e = test_input($_POST["q4e"]);
      $q5a = test_input($_POST["q5a"]);
      $q5b = test_input($_POST["q5b"]);
      $q5c = test_input($_POST["q5c"]);
      $q5d = test_input($_POST["q5d"]);
      $q5e = test_input($_POST["q5e"]);
      $q6a = test_input($_POST["q6a"]);
      $q6b = test_input($_POST["q6b"]);
      $q6c = test_input($_POST["q6c"]);
      $q6d = test_input($_POST["q6d"]);
      $q6e = test_input($_POST["q6e"]);
      $q6f = test_input($_POST["q6f"]);
      $q6g = test_input($_POST["q6g"]);
      $q7 = test_input($_POST["q7"]);
      $q8 = test_input($_POST["q8"]);
      $q9a = test_input($_POST["q9a"]);
      $q9b = test_input($_POST["q9b"]);
      $q9c = test_input($_POST["q9c"]);
      $q9d = test_input($_POST["q9d"]);
      $q9e = test_input($_POST["q9e"]);
      $q9f = test_input($_POST["q9f"]);
      $q10a = test_input($_POST["q10a"]);
      $q10b = test_input($_POST["q10b"]);
      $q10c = test_input($_POST["q10c"]);
      $q10d = test_input($_POST["q10d"]);
      $q10e = test_input($_POST["q10e"]);
      $q11 = test_input($_POST["q11"]);
      $q12 = test_input($_POST["q12"]);
      $q13 = test_input($_POST["q13"]);
      $q14 = test_input($_POST["q14"]);
      $q15 = test_input($_POST["q15"]);
      
      // Start a transaction, so you can roll back if necessary.
      $sql = "START TRANSACTION";
      if(mysqli_query($conn, $sql)) {
         //echo "Transaction Started Successfully.";
      } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      // Establish a savepoint: in the event that a question wasn't answered, we can rollback.
      $sql = "SAVEPOINT ADDING_DATA";
      if(mysqli_query($conn, $sql)) {
         //echo "Savepoint Added Successfully.";
      } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
 
      if($q1 != "") { // Insert gender into SQL (if the question was answered)
         $answers = $answers . "q1";         
         $sql = "INSERT INTO ID_Genders (id, gender)
                 VALUES (" . $baylorid . ", '" . $q1 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Gender added successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {  // Otherwise, add #1 to the list of questions that weren't answered.
         $redo_questions  = $redo_questions . "q1";
      }
      
      if($q2 != "") { // Insert class into SQL (if the question was answered)
         $answers = $answers . "q2";
         $sql = "INSERT INTO ID_Classifications (id, class)
                 VALUES (" . $baylorid . ", '" . $q2 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Class added successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {  // Otherwise, add #2 to the list of questions that weren't answered.
         $redo_questions  = $redo_questions . "q2";
      }
      
      if($q3 != "" && (strlen($q3) < 3) ) { // Insert age into SQL (if the question was answered)
         $answers = $answers . "q3";
         $sql = "INSERT INTO ID_Ages (id, age)
                 VALUES (" . $baylorid . ", " . $q3 . ")";
         if(mysqli_query($conn, $sql)) {
            //echo "Age added successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {  // Otherwise, add #3 to the list of questions that weren't answered.
         $redo_questions  = $redo_questions . "q3";
      }
      
      if($q4a != "" || $q4b != "" || $q4c != "" || $q4d != "" || $q4e != "") {
         $answers = $answers . "q4";
         if($q4a != "") { 
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'a')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 4a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q4b != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'b')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 4b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q4c != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'c')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 4c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q4d != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'd')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 4d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q4e != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'e')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 4e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else { // If none of the options for 4 were selected, add 4 to the non-answered questions.
         $redo_questions = $redo_questions . "q4";
      }
      
      if($q5a != "" || $q5b != "" || $q5c != "" || $q5d != "" || $q5e != "") {
         $answers = $answers . "q5";
         if($q5a != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 5, 'a')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 5a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q5b != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 5, 'b')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 5b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q5c != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 5, 'c')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 5c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q5d != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 5, 'd')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 5d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q5e != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 5, 'e')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 5e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else { // If none of the options for 5 were selected, add 5 to the non-answered questions.
         $redo_questions = $redo_questions . "q5"; 
      }
      
      if($q6a != "" || $q6b != "" || $q6c != "" || $q6d != "" || $q6e != "" || $q6f != "" || $q6g != "") {
         $answers = $answers . "q6";
         if($q6a != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 6, 'a')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 6a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q6b != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 6, 'b')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 6b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q6c != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 6, 'c')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 6c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q6d != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 6, 'd')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 6d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q6e != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 6, 'e')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 6e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q6f != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 6, 'f')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 6f Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q6g != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 6, 'g')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 6g Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else { // If none of the options for 6 were selected, add 6 to the non-answered questions.
         $redo_questions = $redo_questions . "q6"; 
      }
      
      if($q7 != "") {
         $answers = $answers . "q7";
         $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 7, '" . $q7 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Question 7 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else { // If none of the options for 7 were selected, add 7 to the non-answered questions.
         $redo_questions = $redo_questions . "q7"; 
      }
      
      if($q8 != "") {
         $answers = $answers . "q8";
         $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 8, '" . $q8 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Question 8 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else { // If none of the options for 8 were selected, add 8 to the non-answered questions.
         $redo_questions = $redo_questions . "q8"; 
      }
      
      if($q9a != "" || $q9b != "" || $q9c != "" || $q9d != "" || $q9e != "" || $q9f != "") {
         $answers = $answers . "q9";
          if($q9a != "") {
          $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 9, 'a')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 9a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q9b != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 9, 'b')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 9b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q9c != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 9, 'c')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 9c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q9d != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 9, 'd')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 9d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q9e != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 9, 'e')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 9e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         } 
         if($q9f != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 9, 'f')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 9f Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else { // If none of the options for 9 were selected, add 9 to the non-answered questions.
         $redo_questions = $redo_questions . "q9";
      }
      
      if($q10a != "" || $q10b != "" || $q10c != "" || $q10d != "" || $q10e != "") {
         $answers = $answers . "q10";
         if($q10a != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 10, 'a')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 10a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q10b != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 10, 'b')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 10b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q10c != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 10, 'c')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 10c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q10d != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 10, 'd')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 10d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q10e != "") {
            $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 10, 'e')";
            if(mysqli_query($conn, $sql)) {
               //echo "Question 10e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else { // If none of the options for 10 were selected, add 10 to the non-answered questions.
         $redo_questions = $redo_questions . "q10";
      }
      
      if($q11 != "") {
         $answers = $answers . "q11";
         $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 11, '" . $q11 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Question 11 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else { // If 11 was not answered selected, add 11 to the non-answered questions.
         $redo_questions = $redo_questions . "q11";
      }
      
      if($q12 != "") {
         $answers = $answers . "q12";
         $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 12, '" . $q12 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Question 12 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } 
      
      if($q13 != "") {
         $answers = $answers . "q13";
         $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 13, '" . $q13 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Question 13 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      }
      
      if($q14 != "") {
         $answers = $answers . "q14";
         $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 14, '" . $q14 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Question 14 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else { // If 14 was not answered selected, add 14 to the non-answered questions.
         $redo_questions = $redo_questions . "q14";
      }
      
      if($q15 != "") {
         $answers = $answers . "q15";
         $sql = "INSERT INTO Questions_Answers (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 15, '" . $q15 . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "Question 15 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else { // If 15 was not answered selected, add 15 to the non-answered questions.
         $redo_questions = $redo_questions . "q15";
      } 
      // Check to see if all questions that require input had input present.
      if($redo_questions == "" && $baylorid != "") { 
         $sql = "INSERT INTO Answered_Questions (id, answer)
                 VALUES (" . $baylorid . ", '" . $answers . "')";
         if(mysqli_query($conn, $sql)) {
            //echo "New Record Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
         $sql = "COMMIT";
         if(mysqli_query($conn, $sql)) {
            echo "<br>Thank you! Your answers have been recorded.<br>";
            echo "<script language='javascript'>";
            echo "alert('Results received.')";
            echo "</script>";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
         mysqli_close($conn); 
      } else { // If not all required questions were answered, rollback to before any data was added to the database.
         if(!mysqli_query($conn, "ROLLBACK TO ADDING_DATA")) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
         echo "<br><font size='4' color='red'>Required questions not answered: ";
         if(strlen($redo_questions) > 2) {
            $redo_questions = str_replace("q", ", ", $redo_questions);
            $redo_questions = substr($redo_questions, 2, strlen($redo_questions));
         }
         $redo_questions = $redo_questions . ".";
         echo $redo_questions;
         if($baylorid == "") {
            echo "<br>Please enter last 4 digits of Baylor ID Number.";
         }
         echo "</font><br>";
      }
   }  
   
   // Test the input data for the submit button.
   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   } 
?>

<!-- The rest of this document is the questions that are asked on the page. -->

<h2>CSI 1095 Survey</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br><br>
Last 4 Digits of Baylor ID Number: <input type="text" name="baylorid" value="<?php echo $baylorid;?>">
<br><br>

<strong>1) </strong>What is your gender? 
<br>
   <input type="radio" name="q1"
   <?php if(isset($q1) && $q1 == "female") echo "checked";?>
   value="female">Female
<br>
   <input type="radio" name="q1"
   <?php if(isset($q1) && $q1 == "male") echo "checked";?>
   value="male">Male
<br><br>

<strong>2) </strong>What is your classification?
<br>
   <input type="radio" name="q2"
   <?php if(isset($q1) && $q1 == "female") echo "checked";?>
   value="freshman">Freshman
<br>
   <input type="radio" name="q2"
   <?php if(isset($q1) && $q1 == "male") echo "checked";?>
   value="transfer">Transfer
<br><br>

<strong>3) </strong>What is your age? 
<input type="text" name="q3" value="<?php echo$q3;?>"> 
<br><br>

<strong>4) </strong>Prior to your attendance at Baylor University, were you involved in any of the following? (You may select more than one answer choice)   
<br>
   <input type="checkbox" name="q4a"
   <?php if(isset($q4a) && $q4a == "a") echo "checked";?>
   value="a">Programming course taught in high school.
<br>
   <input type="checkbox" name="q4b"
   <?php if(isset($q4b) && $q4b == "b") echo "checked";?>
   value="b">Programming course taught outside of the classroom.
<br>
   <input type="checkbox" name="q4c"
   <?php if(isset($q4c) && $q4c == "c") echo "checked";?>
   value="c">Self-taught programming course through a certified online resource.
<br>
   <input type="checkbox" name="q4d"
   <?php if(isset($q4d) && $q4d == "d") echo "checked";?>
   value="d">Self-taught programming using free resources available online (Youtube, etc.).
<br>
   <input type="checkbox" name="q4e"
   <?php if(isset($q4e) && $q4e == "e") echo "checked";?>
   value="e">No prior programming experience.
<br><br>

<strong>5) </strong>Which of the following best describes your willingness to seek help outside of the classroom in your computer science course(s) through a professor.s office hours? (You may select more than one answer choice)
<br>
   <input type="checkbox" name="q5a"
   <?php if(isset($q5a) && $q5a == "a") echo "checked";?>
   value="a">I have gone to a professor's office hours, and it was helpful.
<br>
   <input type="checkbox" name="q5b"
   <?php if(isset($q5b) && $q5b == "b") echo "checked";?>
   value="b">I have gone to a professor's office hours, and it was not helpful.
<br>
   <input type="checkbox" name="q5c"
   <?php if(isset($q5c) && $q5c == "c") echo "checked";?>
   value="c">I would like to go to a professor.s office hours, but I feel intimidated.
<br>
   <input type="checkbox" name="q5d"
   <?php if(isset($q5d) && $q5d == "d") echo "checked";?>
   value="d">I feel as though I am doing decently enough in the course that I do not need to go to office hours.
<br>
   <input type="checkbox" name="q5e"
   <?php if(isset($q5e) && $q5e == "e") echo "checked";?>
   value="e">I don't have a strong desire to go to office hours.  
<br><br>

<strong>6) </strong>Which of the following best describes your willingness to seek help outside of the classroom in your computer science course(s) through an available computer science tutoring resource? (You may select more than one answer choice)
<br>
   <input type="checkbox" name="q6a"
   <?php if(isset($q6a) && $q6a == "a") echo "checked";?>
   value="a">I have gone to computer science tutoring, and it was helpful.
<br>
   <input type="checkbox" name="q6b"
   <?php if(isset($q6b) && $q6b == "b") echo "checked";?>
   value="b">I have gone to computer science tutoring, and it was not helpful.
<br>
   <input type="checkbox" name="q6c"
   <?php if(isset($q6c) && $q6c == "c") echo "checked";?>
   value="c">I have gone to computer science tutoring, and I received incorrect guidance.
<br>
   <input type="checkbox" name="q6d"
   <?php if(isset($q6d) && $q6d == "d") echo "checked";?>
   value="d">I would like to go to computer science tutoring, but I feel intimidated.
<br>
   <input type="checkbox" name="q6e"
   <?php if(isset($q6e) && $q6e == "e") echo "checked";?>
   value="e">I would like to go to computer science tutoring, but I feel as though I would not benefit from it.
<br>
   <input type="checkbox" name="q6f"
   <?php if(isset($q6f) && $q6f == "f") echo "checked";?>
   value="f">I feel as though I am doing decently enough in the course that I do not need to go to computer science tutoring.
<br>
   <input type="checkbox" name="q6g"
   <?php if(isset($q6g) && $q6g == "g") echo "checked";?>
   value="g">I don't have a strong desire to go to computer science tutoring.
<br><br>

<strong>7) </strong>Which of the following best describes the frequency of your use of computer science tutoring, or a computer science professor's office hours?
<br>
   <input type="radio" name="q7"
   <?php if(isset($q7) && $q7 == "a") echo "checked";?>
   value="a">I have used one of these resources once before.
<br>
   <input type="radio" name="q7"
   <?php if(isset($q7) && $q7 == "b") echo "checked";?>
   value="b">I use one or both of these resources about once a week.
<br>
   <input type="radio" name="q7"
   <?php if(isset($q7) && $q7 == "c") echo "checked";?>
   value="c">I use one or both of these resources more than once a week.
<br><br>

<strong>8) </strong>Which of the following is accurate? 
<br>
   <input type="radio" name="q8"
   <?php if(isset($q8) && $q8 == "a") echo "checked";?>
   value="a">One or more members of my family have a career that is related to computer science.
<br>
   <input type="radio" name="q8"
   <?php if(isset($q8) && $q8 == "b") echo "checked";?>
   value="b">No members of my family have a career that is related to computer science.
<br><br>

<strong>9) </strong>What factors influenced your decision to major in computer science? (You may select more than one answer choice)
<br>
   <input type="checkbox" name="q9a"
   <?php if(isset($q9a) && $q9a == "a") echo "checked";?>
   value="a">My friends in high school encouraged me to choose this major.
<br>
   <input type="checkbox" name="q9b"
   <?php if(isset($q9b) && $q9b == "b") echo "checked";?>
   value="b">Computer science is a rigorous major, and that appeals to me.
<br>
   <input type="checkbox" name="q9c"
   <?php if(isset($q9c) && $q9c == "c") echo "checked";?>
   value="c">I am interested in the monetary benefits of a career in computer science.
<br>
   <input type="checkbox" name="q9d"
   <?php if(isset($q9d) && $q9d == "d") echo "checked";?>
   value="d">I enjoy programming.
<br>
   <input type="checkbox" name="q9e"
   <?php if(isset($q9e) && $q9e == "e") echo "checked";?>
   value="e">I enjoy problem solving.
<br>
   <input type="checkbox" name="q9f"
   <?php if(isset($q9f) && $q9f == "f") echo "checked";?>
   value="f">I am close with someone who has a career related to computer science, and I would like a career like theirs.
<br><br>

<strong>10) </strong>Which of the following applies to you? (You may select more than one answer choice)
<br>
   <input type="checkbox" name="q10a"
   <?php if(isset($q10a) && $q10a == "a") echo "checked";?>
   value="a">I feel encouraged to remain in the computer science department by my family.
<br>
   <input type="checkbox" name="q10b"
   <?php if(isset($q10b) && $q10b == "b") echo "checked";?>
   value="b">I feel encouraged to remain in the computer science department by my peers.
<br>
   <input type="checkbox" name="q10c"
   <?php if(isset($q10c) && $q10c == "c") echo "checked";?>
   value="c">I feel encouraged to remain in the computer science department by the faculty.
<br>
   <input type="checkbox" name="q10d"
   <?php if(isset($q10d) && $q10d == "d") echo "checked";?>
   value="d">I have encouraged myself to remain in the computer science department.
<br>
   <input type="checkbox" name="q10e"
   <?php if(isset($q10e) && $q10e == "e") echo "checked";?>
   value="e">I do not feel encouraged to remain in the computer science department.
<br><br>

<strong>11) </strong>As far as feeling encouraged to remain, or discouraged to remain, please tell us what factors have contributed to your choice in (10).
<br>
<textarea name="q11" rows="5" cols="49"><?php echo $q11;?>
</textarea>
<br><br>

<strong>12) </strong>If you feel discouraged to remain in the department, what was the source(s) of your discouragement?
<br>
<textarea name="q12" rows="5" cols="49"><?php echo $q12;?>
</textarea>
<br><br>

<strong>13) </strong>If you feel discouraged to remain in the department, what could have been done to prevent your discouragement?
<br>
<textarea name="q13" rows="5" cols="49"><?php echo $q13;?>
</textarea>
<br><br>

<strong>14) </strong>Which of the following most applies to you?
<br>
   <input type="radio" name="q14"
   <?php if(isset($q14) && $q14 == "a") echo "checked";?>
   value="a">I feel very confident in my academic performance for Fall 2015.
<br>
   <input type="radio" name="q14"
   <?php if(isset($q14) && $q14 == "b") echo "checked";?>
   value="b">I feel somewhat confident in my academic performance for Fall 2015.
<br>
   <input type="radio" name="q14"
   <?php if(isset($q14) && $q14 == "c") echo "checked";?>
   value="c">I am neither confident nor unsure about my academic performance for Fall 2015.
<br>
   <input type="radio" name="q14"
   <?php if(isset($q14) && $q14 == "d") echo "checked";?>
   value="d">I feel somewhat less than confident in my academic performance for Fall 2015.
<br>
   <input type="radio" name="q14"
   <?php if(isset($q14) && $q14 == "e") echo "checked";?>
   value="e">I feel very unsure about my academic performance for Fall 2015.
<br><br>

<strong>15) </strong>What in particular helped with your confidence or lack thereof?
<br>
<textarea name="q15" rows="5" cols="49"><?php echo $q15;?>
</textarea>
<br><br>

<!-- Submit button to input the data entered by the user --> 

<br>
<label>
<input id="button" type="submit" value="Submit Form" />
</label>
<br><br><br>
</form>

  </body>
</html>


