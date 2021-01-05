<?php
    include('header.php');
    session_start();
?>
    <div class="bordered-card p-4 mb-3">
        <h2 class="text-center mb-4">Congratulations, you finished the test!</h2>
        <p>Your score is: <?php echo $_SESSION['score'] ?></p>
        <p class="mt-4 text-center">Click the button below to try again.</p>
        <a href="index.php" class="btn btn-primary w-25 d-block mx-auto">Try again</a>
        <p class="mt-4 text-center">If you want to add a question to this quiz, click the button below.</p>
        <a href="add_question.php" class="btn btn-info w-25 d-block mx-auto">Add question</a>
    </div>
<?php
    include('footer.php');
?>
