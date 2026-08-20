<?php
# from the $_SERVER global variable, check if the HTTP method used is POST, if its not POST, redirect to the index.php page
# Reference: https://www.php.net/manual/en/reserved.variables.server.php

// Supply the missing code
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Supply the missing code
$complete_name = $_POST['complete_name'] ?? '';
$email = $_POST['email'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$contact_number = $_POST['contact_number'] ?? '';
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
</head>
<body>
<section class="section">
    <h1 class="title">Instructions</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity.
    </h2>

    <h3><i>Hello, <b><?php echo $complete_name?></b>! Please read the instructions carefully before proceeding</i></h3>
    <br>
    <!-- Supply the correct HTTP method and target form handler resource -->
    <form method="POST" action="quiz.php">
        <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <input type="hidden" name="birthdate" value="<?php echo $birthdate; ?>" />
        <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>" />

        <!-- Display the instruction -->
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <div class="field">
            <label class="label">Terms and conditions</label>
            <div class="control">
<!-- terms and conditions shouldnt be editable-->
                <textarea class="textarea" disabled style="color: white;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                <input type="checkbox" name="agree">
                I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>

        <!-- Start Quiz button -->
        <button type="submit" class="button is-link" name="submitBtn" disabled>Start Quiz</button>
    </form>
</section>
<!-- checkbox validation-->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkbox = document.getElementsByName('agree')[0];
        const submitBtn = document.getElementsByName('submitBtn')[0];

        // Function to update the button's disabled state
        function toggleButton() {
            submitBtn.disabled = !checkbox.checked;
        }

        // Set initial state on load
        toggleButton();

        // Listen for user interaction
        checkbox.addEventListener('change', toggleButton);
    });
</script>
</body>
</html>