<?php
    include('Quiz.php');
    session_start();
    
    $number = $_GET['num'];
    $_SESSION['num'] = $number;

    $quiz = new Quiz;

    $quiz->data = array(
        ':question_id' => $number,
    );
    
    $quiz->query = "SELECT * FROM questions WHERE question_id = :question_id";
    $question = $quiz->result();

    $quiz->query = "SELECT * FROM choices WHERE question_id = :question_id";
    $choices = $quiz->result();

?>
<?php include('header.php'); ?>
    <div class="bordered-card p-4">
        <?php 
            echo '<h2 class="text-center mb-4">'.$question[0][1].'</h2>';
        ?>
        
            <form action="process.php" method="post">
                <?php foreach($choices as $choice) {
                    echo '
                    <div class="form-check mb-2">
                            <input type="radio" class="form-check-input radios" name="choice" value="'.$choice['choice_id'].'" required>
                            <label class="form-check-label labels">'.$choice['choice_title'].'</label>
                    </div>
                    ';
                } 
                ?>
                <input type="submit" class="btn btn-primary" value="Next">
            </form>
    </div>
<?php include('footer.php'); ?>