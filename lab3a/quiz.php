<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'] ?? '';

$questions = retrieve_questions()['questions'];
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="color-scheme" content="light">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
</head>
<body>
<section class="section">
    <h1 class="title">Quiz</h1>
    <h2 class="subtitle">Answer all 5 questions below. This page auto-submits in <span id="countdown">60</span> seconds.</h2>

    <form method="POST" action="result.php" id="quiz-form">
        <input type="hidden" name="complete_name" value="<?php echo htmlspecialchars($complete_name); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
        <input type="hidden" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" />
        <input type="hidden" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" />
        <input type="hidden" name="agree" value="<?php echo htmlspecialchars($agree); ?>" />

        <?php foreach ($questions as $index => $question): ?>
        <div class="box">
            <p class="has-text-weight-semibold mb-3">
                <?php echo ($index + 1) . '. ' . htmlspecialchars($question['question']); ?>
            </p>
            <?php foreach ($question['options'] as $option): ?>
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio"
                            name="answers[<?php echo $index; ?>]"
                            value="<?php echo htmlspecialchars($option['key']); ?>" />
                        <?php echo htmlspecialchars($option['key'] . '. ' . $option['value']); ?>
                    </label>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>

        <button type="submit" class="button is-link">Submit</button>
    </form>
</section>

<script>
    let secondsLeft = 60;
    const countdownEl = document.getElementById('countdown');
    const quizForm = document.getElementById('quiz-form');

    const timer = setInterval(function () {
        secondsLeft -= 1;
        countdownEl.textContent = secondsLeft;
        if (secondsLeft <= 0) {
            clearInterval(timer);
            quizForm.submit();
        }
    }, 1000);
</script>
</body>
</html>