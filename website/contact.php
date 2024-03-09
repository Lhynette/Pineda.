<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <a href="#" class="logo">Pineda.</a>
        <i class='bx bx-menu-alt-right' id="menu-icon"></i>
        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="about.html">About Me</a>
            <a href="blog.html">Blog/Articles</a>
            <a href="services.html">Services</a>
            <a href="contact.html" class="active">Contact</a>
        </nav>
    </header>

    <?php 
    require_once "database.php";
    $message_sent = false; // assuming this variable holds whether the message was sent successfully
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $errors = array();
        if (empty($name) || empty($email) || empty($message)) {
            array_push($errors, "All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            $sqlInsertInfo = "INSERT INTO contact_details_db (name, email, message) VALUES (?, ?, ?)";
            $stmtInsertInfo = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmtInsertInfo, $sqlInsertInfo)) {
                mysqli_stmt_bind_param($stmtInsertInfo, "sss", $name, $email, $message);
                mysqli_stmt_execute($stmtInsertInfo);
                $message_sent = true; // Set to true if message is successfully sent
                // echo "<div class='alert alert-success success-alert w-50 mx-auto text-center'>Your message has been submitted successfully.</div>";
                // Get the AccountID of the inserted user
                $accountID = mysqli_insert_id($conn);
            } else {
                die("Error in preparing SQL statement to insert user account");
            }
        }
    }
    ?>

<?php if ($message_sent): ?>
    <script>
        alert('Message sent successfully');
    </script>
<?php endif; ?>

    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me</span></h2>
        <form action="#" method="post">
            <div class="input-box">
                <input type="text" placeholder="Name" name="name">
                <input type="email" placeholder="Email Address" name="email">
                <input type="number" placeholder="Contact Number" name="contact_number">
                <input type="text" placeholder="Concern" name="concern">
            </div>
            <textarea name="message" cols="30" rows="10" placeholder="Say something"></textarea>
            <button type="submit" name="submit" class="btn back-btn">SEND MESSAGE</button>
            
            <div class="btn-container">
                <a href="login.php" class="btn back-btn">Back To Previous Page</a>
                <a href="index.html" class="btn back-btn">Back To Home Page</a>
            </div>
        </form>


    </section>

    <footer class="footer">
        <div class="footer-text">
            <p>Personal Website &copy; 2024 by Lhynette Pineda | All Rights Reserved.</p>
        </div>
        <div class="footer-iconTop">
            <a href="#home"><i class='bx bxs-up-arrow'></i></a>
        </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="script.js"></script>
</body>
</html>
