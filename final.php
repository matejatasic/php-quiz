<?php
    include('header.php');
    session_start();
?>
    <div class="bordered-card p-4">
        <h2 class="text-center mb-4">Congratulations, you finished the test!</h2>
        <p>Your score is: <?php echo $_SESSION['score'] ?></p>
        <p class="mt-4 text-center">Click the button below to try again.</p>
        <a href="questions.php?num=1" class="btn btn-primary w-25 d-block mx-auto">Try again</a>
    </div>
    <?php session_unset() ?>
<?php
    include('footer.php');
?>