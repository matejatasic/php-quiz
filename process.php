<?php
    session_start();
    include('Quiz.php');
    if(!isset($_SESSION['score'])) $_SESSION['score'] = 0;


    $quiz = new Quiz;

    $quiz->data = array(
        ':question_id' => $_SESSION['num'],
    );

    $quiz->query = "SELECT * FROM questions";
    $total = $quiz->total_rows();

    $quiz->query = "SELECT * FROM choices WHERE question_id = :question_id";
    $choices = $quiz->result();

    usort($choices, function($arr1, $arr2) {
        return $arr1['is_correct'] < $arr2['is_correct'] ? 1 : -1;
    });
    
    if($_POST['choice'] === $choices[0][0]) $_SESSION['score']++;


    if($_SESSION['num'] < $total) {
        $_SESSION['num']++;
        header('Location: questions.php?num='.$_SESSION['num']);
    }
    else {
        header('Location: final.php');
    }
?>