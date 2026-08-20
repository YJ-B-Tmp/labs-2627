<html>

<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
</head>

<body>
    <section class="section">
        <h1 class="title">User Registration</h1>
        <h2 class="subtitle">
            This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
        </h2>
        <!-- Supply the correct HTTP method and target form handler resource
     
    Complete Name
    Email Address
    Birthdate
    Contact Number
    -->
        <form method="POST" action="instructions.php">
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" name="complete_name" placeholder="Complete Name">
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" name="email" type="email" placeholder="name@email.com" />
                </div>
            </div>

            <div class="field">
                <label class="label">Birthdate</label>
                <div class="control">
                    <input class="input" name="birthdate" type="date" />
                </div>
            </div>

            <div class="field">
                <label class="label">Contact Number</label>
                <div class="control">
                    <input class="input" name="contact_number" placeholder="(+63) 123 456 7890" />
                </div>
            </div>

            <!-- Next button -->
            <button type="submit" class="button is-link" name="nextbtn" disabled>Proceed Next</button>
        </form>
    </section>
    <!-- javascript for button-->
    <script>
        const nameInput = document.getElementsByName('complete_name')[0];
        const emailInput = document.getElementsByName('email')[0];
        const nextBtn = document.getElementsByName('nextbtn')[0];

        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        function validation() {
            const nameBlankCheck = nameInput.value.trim() !== "";
            const emailCheck = emailRegex.test(emailInput.value.trim());

            if (nameBlankCheck && emailCheck) {
                nextBtn.disabled = false;
            } else if (emailCheck) {
                // not empty ***and/or*** has valid email 
                nextBtn.disabled = false;
            } else {
                nextBtn.disabled = true;
            }
        }

        nameInput.addEventListener('input', validation);
        emailInput.addEventListener('input', validation);
    </script>
</body>

</html>