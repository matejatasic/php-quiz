<?php
    include('Quiz.php');

    $quiz = new Quiz;

    $quiz->query = "SELECT * FROM questions";
    $total = $quiz->total_rows();
?>
<?php include('header.php'); ?>
                    <div class="bordered-card p-4">
                        <h2 class="text-center mb-4">Welcome to the PHP Quiz!</h2>
                        <p>This is: a Multipart quiz</p>
                        <p>This quiz contains: <?php echo $total; ?> questions</p>
                        <p>The quiz duration is: <?php echo $total * 0.5; ?> minutes</p>
                        <p class="mt-4 text-center">Click the button below to begin the quiz!</p>
                        <a href="questions.php?num=1" class="btn btn-primary w-25 d-block mx-auto">Start</a>
                    </div>
<?php include('footer.php');