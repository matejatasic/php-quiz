<?php
    include('header.php');
    include('Quiz.php');

    if(isset($_POST['submit'])) {
        $message;
        if(
        $_POST['question_title'] === '' ||
        $_POST['choice1'] === '' ||
        $_POST['choice2'] === '' ||
        $_POST['choice3'] === '' ||
        $_POST['choice4'] === '' ||
        $_POST['answer'] === ''
        ) {
            $message = '
                <div class="alert alert-danger">
                    <p>Please fill out all fields!</p>
                </div>
            ';
        }
        else {
            $error = 0;
            $quiz = new Quiz;

            $quiz->data = array(
                ':question_title' => $_POST['question_title'],
            );
      
            $quiz->query = "INSERT INTO questions (question_title) VALUES(:question_title)";

            $quiz->execute_query();
        
            $quiz->query = "SELECT MAX(question_id) FROM questions";

            $max = $quiz->result();

            $answer_index = intval($_POST['answer']);

            $quiz->data = array(
                ':question_id' => $max[0][0],
            );

            for($i = 1; $i <= 4; $i++) {
                $quiz->data[':choice_title'] = htmlentities($_POST['choice'.$i]);

                if($i !== $answer_index) {
                    $quiz->data[':is_correct'] = 0;
                    $quiz->query = "INSERT INTO choices (question_id, is_correct, choice_title) VALUES(:question_id, :is_correct, :choice_title)";
                }
                else {
                    $quiz->data[':is_correct'] = 1;
                    $quiz->query = "INSERT INTO choices (question_id, is_correct, choice_title) VALUES(:question_id, :is_correct, :choice_title)";
                }
                
                $quiz->execute_query();
            }
            
            if($error > 0) {
                $message = '
                <div class="alert alert-danger">
                    <p>Failed to add the question...</p>
                </div>
                ';
            }
            else {
                $message = '
                <div class="alert alert-success">
                    <p>Successfully added the question...</p>
                </div>
                ';
            }
        }
    }
?>
<div class="bordered-card p-4 mb-3">
    <h2 class="text-center mb-4">Add a question</h2>
    <form action="add_question.php" method="post">
        <?php if(isset($message)) echo $message; ?>
        <div class="form-group">
            <label>Question Title</label>
            <input type="text" class="form-control" name="question_title" id="question_title" placeholder="Question">
        </div>
        <div class="form-group">
            <label>Choice 1</label>
            <input type="text" class="form-control" name="choice1" id="choice1" placeholder="Choice 1">
        </div>
        <div class="form-group">
            <label>Choice 2</label>
            <input type="text" class="form-control" name="choice2" id="choice2" placeholder="Choice 2">
        </div>
        <div class="form-group">
            <label>Choice 3</label>
            <input type="text" class="form-control" name="choice3" id="choice3" placeholder="Choice 3">
        </div>
        <div class="form-group">
            <label>Choice 4</label>
            <input type="text" class="form-control" name="choice4" id="choice4" placeholder="Choice 4">
        </div>
        <div class="form-group">
            <label>Right Answer</label>
            <select class="form-control" name="answer" id="answer">
                <option>Select an option</option>
                <option value="1">Choice 1</option>
                <option value="2">Choice 2</option>
                <option value="3">Choice 3</option>
                <option value="4">Choice 4</option>
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Add question">
    </form>
</div>
<?php
    include('footer.php');
?>