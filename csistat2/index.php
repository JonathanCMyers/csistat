<!DOCTYPE html>

<!-- 

Author: Jonathan Myers
Date Last Modified: 10/14/2015

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

  <title>

     Jonathan Myers; Achnic LLC

  </title>

  <!-- CSS -->
  <link rel="stylesheet" href="../public/css/poole.css">
  <link rel="stylesheet" href="../public/css/syntax.css">
  <link rel="stylesheet" href="../public/css/hyde.css">
  <link rel="stylesheet" href="../public/css/responsiveGoogle.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700|Abril+Fatface">

  <!-- Icons -->
  <link rel="shortcut icon" href="../public/icon.ico">

  <!-- RSS -->
  <link rel="alternate" type="application/rss+xml" title="RSS" href="/atom.xml">
<style>
.error {color: #FF0000; }
</style>
</head>

<body>

<?php// require_once('/var/www/html/requireMeTitle.php') ?>

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
   $q1a = $q1b = $q1c = $q1d = $q1e = "";
   $q2a = $q2b = $q2c = $q2d = $q2e = $q2f = $q2g = "";
   $q3 = "";
   $q4a = $q4b = $q4c = $q4d = $q4e = "";
   $q5 = "";
   $q6 = "";
   $q7 = "";
   $q8 = "";
   $q9 = "";
   $q10 = "";
   $q11 = "";
   $q12a = $q12b = $q12c = $q12d = $q12e = $q12f = $q12g = "";

   $answers = "";
   $redo_questions = "";

   // Refresh the variables if the user submits
   // This allows the variables to be auto-filled after a page refresh, in the event that a
    // user did not complete the form, so that the user does not have to re-fill all the 
    // information.
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $baylorid = test_input($_POST["baylorid"]);
      $q1a = test_input($_POST["q1a"]);
      $q1b = test_input($_POST["q1b"]);
      $q1c = test_input($_POST["q1c"]);
      $q1d = test_input($_POST["q1d"]);
      $q1e = test_input($_POST["q1e"]);

      $q2a = test_input($_POST["q2a"]);
      $q2b = test_input($_POST["q2b"]);
      $q2c = test_input($_POST["q2c"]);
      $q2d = test_input($_POST["q2d"]);
      $q2e = test_input($_POST["q2e"]);
      $q2f = test_input($_POST["q2f"]);
      $q2g = test_input($_POST["q2g"]);

      $q3 = test_input($_POST["q3"]);

      $q4a = test_input($_POST["q4a"]);
      $q4b = test_input($_POST["q4b"]);
      $q4c = test_input($_POST["q4c"]);
      $q4d = test_input($_POST["q4d"]);
      $q4e = test_input($_POST["q4e"]);

      $q5 = test_input($_POST["q5"]);
      $q6 = test_input($_POST["q6"]);
      $q7 = test_input($_POST["q7"]);
      $q8 = test_input($_POST["q8"]);
      $q9 = test_input($_POST["q9"]);
      $q10 = test_input($_POST["q10"]);
      $q11 = test_input($_POST["q11"]);

      $q12a = test_input($_POST["q12a"]);
      $q12b = test_input($_POST["q12b"]);
      $q12c = test_input($_POST["q12c"]);
      $q12d = test_input($_POST["q12d"]);
      $q12e = test_input($_POST["q12e"]);
      $q12f = test_input($_POST["q12f"]);
      $q12g = test_input($_POST["q12g"]);

      // Start a transaction, so you can roll back if necessary.
      $sql = "START TRANSACTION";
      if(mysqli_query($conn, $sql)) {
         echo "Transaction Started Successfully.";
      } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      // Establish a savepoint: in the event that a question wasn't answered, we can rollback.
      $sql = "SAVEPOINT ADDING_DATA";
      if(mysqli_query($conn, $sql)) {
         echo "Savepoint Added Successfully.";
      } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
 
      // If there is at least one field submitted for question 1, store it in the database
      if($q1a != "" || $q1b != "" || $q1c != "" || $q1d != "" || $q1e != "") {
         $answers = $answers . "q1";
         if($q1a != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 1, 'a')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 1a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q1b != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 1, 'b')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 1b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q1c != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 1, 'c')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 1c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q1d != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 1, 'd')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 1d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q1e != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 1, 'e')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 1e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else {
      // Otherwise, add #1 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q1";
      }

      // If there is at least one field submitted for question 2, store it in the database
      if($q2a != "" || $q2b != "" || $q2c != "" || $q2d != "" || $q2e != "" || $q2f != "" || $q2g != "") {
         $answers = $answers . "q2";
         if($q2a != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 2, 'a')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 2a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q2b != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 2, 'b')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 2b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q2c != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 2, 'c')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 2c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q2d != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 2, 'd')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 2d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q2e != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 2, 'e')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 2e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q2f != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 2, 'f')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 2f Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q2g != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 2, 'g')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 2g Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else {
         // Otherwise, add #2 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q2";
      }

      // If there is at least one field submitted for question 3, store it in the database
      if($q3 != "") { 
         $answers = $answers . "q3";
         $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 3, '" . $q3 . "')";
         if(mysqli_query($conn, $sql)) {
            echo "Question 3 added successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {
         // Otherwise, add #3 to the list of questions that weren't answered.
         $redo_questions  = $redo_questions . "q3";
      }
         
      // If there is at least one field submitted for question 4, store it in the database
      if($q4a != "" || $q4b != "" || $q4c != "" || $q4d != "" || $q4e != "") {
         $answers = $answers . "q4";
         if($q4a != "") { 
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'a')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 4a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q4b != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'b')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 4b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q4c != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'c')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 4c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q4d != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'd')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 4d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q4e != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 4, 'e')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 4e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else { 
         // Otherwise, add #4 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q4";
      }
      
      // If there is an answer submitted for question 5, store it in the database 
      if($q5 != "") {
         $q5 = str_replace('\'', '\'\'', $q5);
         $answers = $answers . "q5";
         $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 5, '" . $q5 . "')";
         if(mysqli_query($conn, $sql)) {
            echo "Question 5 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else { 
         // Otherwise, add #5 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q5"; 
      }

      // If there is an answer submitted for question 6, store it in the database
      if($q6 != "") {
         $q6 = str_replace('\'', '\'\'', $q6);
         $answers = $answers . "q6";
         $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 6, '" . $q6 . "')";
         if(mysqli_query($conn, $sql)) {
            echo "Question 6 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {
         // Otherwise, add #6 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q6";
      }

      // If there is an answer submitted for question 7, store it in the database
      if($q7 != "") {
         $q7 = str_replace('\'', '\'\'', $q7);
         $answers = $answers . "q7";
         $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 7, '" . $q7 . "')";
         if(mysqli_query($conn, $sql)) {
            echo "Question 7 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {
         // Otherwise, add #7 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q7";
      }

      // If there is at least one field submitted for question 8, store it in the database
      if($q8 != "") {
         $answers = $answers . "q8";
         $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 8, '" . $q8 . "')";
         if(mysqli_query($conn, $sql)) {
            echo "Question 8 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {
         // Otherwise, add #8 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q8";
      }

      // If there is at least one field submitted for question 9, store it in the database
      if($q9 != "") {
         $answers = $answers . "q9";
         $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 9, '" . $q9 . "')";
         if(mysqli_query($conn, $sql)) {
            echo "Question 9 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {
         // Otherwise, add #9 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q9";
      }

      // If there is at least one field submitted for question 10, store it in the database
      if($q10 != "") {
         $answers = $answers . "q10";
         $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 10, '" . $q10 . "')";
         if(mysqli_query($conn, $sql)) {
            echo "Question 10 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {
         // Otherwise, add #10 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q10";
      }

      // If there is at least one field submitted for question 11, store it in the database
      if($q11 != "") {
         $answers = $answers . "q11";
         $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                 VALUES (" . $baylorid . ", 11, '" . $q11 . "')";
         if(mysqli_query($conn, $sql)) {
            echo "Question 11 Added Successfully.";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
      } else {
         // Otherwise, add #11 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q11";
      }

      // If there is at least one field submitted for question 12, store it in the database
      if($q12a != "" || $q12b != "" || $q12c != "" || $q12d != "" || $q12e != "" || $q12f != "" || $q12g != "") {
         $answers = $answers . "q12";
          if($q12a != "") {
          $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 12, 'a')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 12a Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q12b != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 12, 'b')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 12b Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q12c != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 12, 'c')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 12c Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q12d != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 12, 'd')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 12d Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q12e != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 12, 'e')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 12e Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         } 
         if($q12f != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 12, 'f')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 12f Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
         if($q12g != "") {
            $sql = "INSERT INTO Questions_Answers2 (id, question_number, question_answer)
                    VALUES (" . $baylorid . ", 12, 'g')";
            if(mysqli_query($conn, $sql)) {
               echo "Question 12g Added Successfully.";
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
         }
      } else {
         // Otherwise, add #12 to the list of questions that weren't answered.
         $redo_questions = $redo_questions . "q12";
      }
      
      // Check to see if all questions that require input had input present.
      if($redo_questions == "" && $baylorid != "") { 
         $sql = "INSERT INTO Answered_Questions2 (id, answer)
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
      } else { // If not, rollback to before any data was added.
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
  
   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }   
?>

<h2>CSI 1095 Survey</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br><br>
Last 4 Digits of Baylor ID Number: <input type="text" name="baylorid" value="<?php echo $baylorid;?>">
<br><br>

<strong>1) </strong>Which of the following best describes your willingness to seek help outside of the classroom in your computer science course(s) through a professor's office hours? (You may select more than one answer choice)
<br>
   <input type="checkbox" name="q1a"
   <?php if(isset($q1a) && $q1a == "a") echo "checked";?>
   value="a">I have gone to a professor's office hours, and it was helpful.
<br>
   <input type="checkbox" name="q1b"
   <?php if(isset($q1b) && $q1b == "b") echo "checked";?>
   value="b">I have gone to a professor's office hours, and it was not helpful.
<br>
   <input type="checkbox" name="q1c"
   <?php if(isset($q1c) && $q1c == "c") echo "checked";?>
   value="c">I would like to go to a professor's office hours, but I feel intimidated.
<br>
   <input type="checkbox" name="q1d"
   <?php if(isset($q1d) && $q1d == "d") echo "checked";?>
   value="d">I feel as though I am doing decently enough in the course that I do not need to go to office hours.
<br>
   <input type="checkbox" name="q1e"
   <?php if(isset($q1e) && $q1e == "e") echo "checked";?>
   value="e">I don't have a strong desire to go to office hours.
<br><br>

<strong>2) </strong>Which of the following best describes your willingness to seek help outside of the classroom in your computer science course(s) through an available computer science tutoring resource? (You may select more than one answer choice)
<br>
   <input type="checkbox" name="q2a"
   <?php if(isset($q2a) && $q2a == "a") echo "checked";?>
   value="a">I have gone to computer science tutoring, and it was helpful.
<br>
   <input type="checkbox" name="q2b"
   <?php if(isset($q2b) && $q2b == "b") echo "checked";?>
   value="b">I have gone to computer science tutoring, and it was not helpful.
<br>
   <input type="checkbox" name="q2c"
   <?php if(isset($q2c) && $q2c == "c") echo "checked";?>
   value="c">I have gone to computer science tutoring, and I received incorrect guidance.
<br>
   <input type="checkbox" name="q2d"
   <?php if(isset($q2d) && $q2d == "d") echo "checked";?>
   value="d">I would like to go to computer science tutoring, but I feel intimidated.
<br>
   <input type="checkbox" name="q2e"
   <?php if(isset($q2e) && $q2e == "e") echo "checked";?>
   value="e">I would like to go to computer science tutoring, but I feel as though I would not benefit from it.
<br>
   <input type="checkbox" name="q2f"
   <?php if(isset($q2f) && $q2f == "f") echo "checked";?>
   value="f">I feel as though I am doing decently enough in the course that I do not need to go to computer science tutoring.
<br>
   <input type="checkbox" name="q2g"
   <?php if(isset($q2g) && $q2g == "g") echo "checked";?>
   value="g">I don't have a strong desire to go to computer science tutoring.
<br><br>

<strong>3) </strong>Which of the following best describes the frequency of your use of computer science tutoring, or a computer science professor's office hours?
<br>
   <input type="radio" name="q3"
   <?php if(isset($q3) && $q3 == "a") echo "checked";?>
   value="a">I have used one of these resources once before.
<br>
   <input type="radio" name="q3"
   <?php if(isset($q3) && $q3 == "b") echo "checked";?>
   value="b">I use one or both of these resources about once a week.
<br>
   <input type="radio" name="q3"
   <?php if(isset($q3) && $q3 == "c") echo "checked";?>
   value="c">I use one or both of these resources more than once a week.
<br><br>

<strong>4) </strong>Which of the following applies to you? (You may select more than one answer choice)
<br>
   <input type="checkbox" name="q4a"
   <?php if(isset($q4a) && $q4a == "a") echo "checked";?>
   value="a">I feel encouraged to remain in the computer science department by my family.
<br>
   <input type="checkbox" name="q4b"
   <?php if(isset($q4b) && $q4b == "b") echo "checked";?>
   value="b">I feel encouraged to remain in the computer science department by my peers.
<br>
   <input type="checkbox" name="q4c"
   <?php if(isset($q4c) && $q4c == "c") echo "checked";?>
   value="c">I feel encouraged to remain in the computer science department by the faculty.
<br>
   <input type="checkbox" name="q4d"
   <?php if(isset($q4d) && $q4d == "d") echo "checked";?>
   value="d">I have encouraged myself to remain in the computer science department.
<br>
   <input type="checkbox" name="q4e"
   <?php if(isset($q4e) && $q4e == "e") echo "checked";?>
   value="e">I do not feel encouraged to remain in the computer science department.
<br><br>

<strong>5) </strong>As far as feeling encouraged to remain, or discouraged to remain, please tell us what factors have contributed to your choice in (4).
<br>
<textarea name="q5" rows="5" cols="49"><?php echo $q5;?>
</textarea>
<br><br>

<strong>6) </strong>If you feel discouraged to remain in the department, what was the source(s) of your discouragement?
<br>
<textarea name="q6" rows="5" cols="49"><?php echo $q6;?>
</textarea>
<br><br>

<strong>7) </strong>If you feel discouraged to remain in the department, what could have been done to prevent your discouragement?
<br>
<textarea name="q7" rows="5" cols="49"><?php echo $q7;?>
</textarea>
<br><br>

<strong>8) </strong>Which of the following most applies to you?
<br>
   <input type="radio" name="q8"
   <?php if(isset($q8) && $q8 == "a") echo "checked";?>
   value="a">I feel very confident in my academic performance for Fall 2015.
<br>
   <input type="radio" name="q8"
   <?php if(isset($q8) && $q8 == "b") echo "checked";?>
   value="b">I feel somewhat confident in my academic performance for Fall 2015.
<br>
   <input type="radio" name="q8"
   <?php if(isset($q8) && $q8 == "c") echo "checked";?>
   value="c">I am neither confident nor unsure about my academic performance for Fall 2015.
<br>
   <input type="radio" name="q8"
   <?php if(isset($q8) && $q8 == "d") echo "checked";?>
   value="d">I feel somewhat less than confident in my academic performance for Fall 2015.
<br>
   <input type="radio" name="q8"
   <?php if(isset($q8) && $q8 == "e") echo "checked";?>
   value="e">I feel very unsure about my academic performance for Fall 2015.
<br><br>

<strong>9) </strong>How have the computer science written exams impacted your academic confidence?
<br>
   <input type="radio" name="q9"
   <?php if(isset($q9) && $q9 == "a") echo "checked";?>
   value="a">The exam grades have made me significantly more confident in my academic performance.
<br>
   <input type="radio" name="q9"
   <?php if(isset($q9) && $q9 == "b") echo "checked";?>
   value="b">The exam grades have made me slightly more confident in my academic performance.
<br>
   <input type="radio" name="q9"
   <?php if(isset($q9) && $q9 == "c") echo "checked";?>
   value="c">The exam grades have not impacted my confidence.
<br>
   <input type="radio" name="q9"
   <?php if(isset($q9) && $q9 == "d") echo "checked";?>
   value="d">The exam grades have made me slightly less confident in my academic performance.
<br>
   <input type="radio" name="q9"
   <?php if(isset($q9) && $q9 == "e") echo "checked";?>
   value="e">The exam grades have made me significantly less confident in my academic performance.
<br><br>

<strong>10) </strong>How have the computer science practicums impacted your academic confidence?
<br>
   <input type="radio" name="q10"
   <?php if(isset($q10) && $q10 == "a") echo "checked";?>
   value="a">The practicums have made me significantly more confident in my academic performance.
<br>
   <input type="radio" name="q10"
   <?php if(isset($q10) && $q10 == "b") echo "checked";?>
   value="b">The practicums have made me slightly more confident in my academic performance.
<br>
   <input type="radio" name="q10"
   <?php if(isset($q10) && $q10 == "c") echo "checked";?>
   value="c">The practicums have not impacted my confidence.
<br>
   <input type="radio" name="q10"
   <?php if(isset($q10) && $q10 == "d") echo "checked";?>
   value="d">The practicums have made me slightly less confident in my academic performance.
<br>
   <input type="radio" name="q10"
   <?php if(isset($q10) && $q10 == "e") echo "checked";?>
   value="e">The practicums have made me significantly less confident in my academic performance.
<br><br>

<strong>11) </strong>How prepared do you feel for Intro to Computer Science II?
<br>
   <input type="radio" name="q11"
   <?php if(isset($q11) && $q11 == "a") echo "checked";?>
   value="a">I feel very prepared.
<br>
   <input type="radio" name="q11"
   <?php if(isset($q11) && $q11 == "b") echo "checked";?>
   value="b">I feel somewhat prepared.
<br>
   <input type="radio" name="q11"
   <?php if(isset($q11) && $q11 == "c") echo "checked";?>
   value="c">I feel neither prepared nor unprepared.
<br>
   <input type="radio" name="q11"
   <?php if(isset($q11) && $q11 == "d") echo "checked";?>
   value="d">I feel somewhat prepared.
<br>
   <input type="radio" name="q11"
   <?php if(isset($q11) && $q11 == "e") echo "checked";?>
   value="e">I feel very unprepared.
<br>
   <input type="radio" name="q11"
   <?php if(isset($q11) && $q11 == "f") echo "checked";?>
   value="f">I feel unprepared, so I will not be taking Intro to Computer Science II
<br><br>
<!--
<em>Please note: There will be a CSI 1440 Boot Camp during the first week or two of the semester.</em>
<br><br>
-->

<strong>12) </strong>If you feel <strong>neither prepared nor unprepared</strong>, <strong>somewhat unprepared</strong>, or <strong>very unprepared</strong>, please select the factors that have contributed to your choice in (11). You may select more than one choice.
<br>
   <input type="checkbox" name="q12a"
   <?php if(isset($q12a) && $q12a == "a") echo "checked";?>
   value="a">Written exam grades
<br>
   <input type="checkbox" name="q12b"
   <?php if(isset($q12b) && $q12b == "b") echo "checked";?>
   value="b">Practicums
<br>
   <input type="checkbox" name="q12c"
   <?php if(isset($q12c) && $q12c == "c") echo "checked";?>
   value="c">Lab quizzes
<br>
   <input type="checkbox" name="q12d"
   <?php if(isset($q12d) && $q12d == "d") echo "checked";?>
   value="d">Lab programs
<br>
   <input type="checkbox" name="q12e"
   <?php if(isset($q12e) && $q12e == "e") echo "checked";?>
   value="e">Programming assignments
<br>
   <input type="checkbox" name="q12f"
   <?php if(isset($q12f) && $q12f == "f") echo "checked";?>
   value="f">URI assignments
<br>
<input type="checkbox" name="q12g"
   <?php if(isset($q12g) && $q12g == "g") echo "checked";?>
   value="g">It is difficult to comprehend the lecture
<br><br>

<label>
<input id="button" type="submit" value="Submit Form" />
</label>
<br><br><br>
</form>

  </body>
</html>
