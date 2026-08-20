<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}

// Supply the missing code
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'];
$answers = $_POST['answers'] ?? [];

// Use the compute_score() function from helpers.php
$score = compute_score($answers);

$formatted_birthdate = $birthdate;

if (!empty($birthdate)) {
    $date_obj = DateTime::createFromFormat('Y-m-d', $birthdate);

    if ($date_obj) {
        $formatted_birthdate = $date_obj->format('F d, Y');
    }
}

$score_class = $score > 2 ? 'is-success' : 'is-danger';

$questions = full_questions();
$correct_answers = get_answers();
?>
<html>

<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
    <!-- confetti styling -->
    <style>
        #confetti-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <!--only for 5/5-->
    <?php if ($score === MAX_QUESTION_NUMBER): ?>
        <canvas id="confetti-canvas"></canvas>
    <?php endif; ?>
    <section class="hero <?php echo $score_class; ?>">
        <div class="hero-body">
            <p class="title">Your Score <?php echo $score; ?> / <?php echo MAX_QUESTION_NUMBER ?></p>
            <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
        </div>
    </section>
    <section class="section">
        <div class="table-container">
            <table class="table is-bordered is-hoverable is-fullwidth">
                <tbody>
                    <tr>
                        <th>Input Field</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>Complete Name</td>
                        <td><?php echo $complete_name; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>Birthdate</td>
                        <td><?php echo $formatted_birthdate; ?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td><?php echo $contact_number; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- repeat question and answers w/ key -->
        <div class="table-container">
            <table class="table is-bordered is-hoverable is-fullwidth">
                <thread>
                    <tr>
                        <th>Q. Num</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Your Answer</th>
                    </tr>
                </thread>
                <tbody>
                    <?php foreach ($questions as $index => $question):
                        $correction = $correct_answers[$index];
                        $user_ans = $answers[$index] ?? null; ?>
                        <tr class="<?php echo $row_class; ?>">
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($question['question']); ?></td>
                            <td><?php echo htmlspecialchars($correction . ') ' . ans_txt($question['options'], $correction)); ?>
                            </td>
                            <!--acc for blanks-->
                            <td><?php echo $user_ans ? htmlspecialchars($user_ans . ') ' . ans_txt($question['options'], $user_ans)) : 'N/A'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <script>
        var confettiSettings = {
            target: 'confetti-canvas'
        };
        var confetti = new ConfettiGenerator(confettiSettings);
        confetti.render();

        setTimeout(function () {
            confetti.clear();
        }, 5000);
    </script>
</body>

</html>