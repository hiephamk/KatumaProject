<?php
ob_start();
session_start();
$title = "Login";
include 'header.php';
?>

<body>
    <div class="container w-50">
        <h3 class="text-center fw-3">LOGIN</h3>
        <form class="bg-warning p-5 m-5 rounded-3" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
            style="align-items: center; justify-items: center;">

            <div class="bg-warning text-danger">
                <?php
                if (isset($_GET['error'])) {
                    echo $_GET['error'];
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address:</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <span id="emailError" style="color: red;"></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input type="password" class="form-control" name="pass" id="password">
                <span id="passwordError" style="color: red;"></span>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me.</label>
            </div>

            <button type="submit" class=" btn-primary btn fs-4"
                style="margin:20px 0 20px 29%; width:200px; height:50px;border-radius:7px;box-shadow:2px 2px #234;"
                name="submit">Login</button>

        </form>
    </div>
    <script>
    // function to validate email
    function validateEmail() {
        const email = document.getElementById("email").value;
        const emailError = document.getElementById("emailError");

        if (email === "" || !email.includes("@")) {
            emailError.innerHTML = "Email must be in valid format! Example: abc@abc.com";
            return false;
        } else {
            emailError.innerHTML = "";
            return true;
        }
    }

    // function to validate password
    function validatePassword() {
        const password = document.getElementById("password").value;
        const passwordError = document.getElementById("passwordError");

        if (password.length < 6) {
            passwordError.innerHTML = "Password must more than 6 characters!";
            return false;
        } else {
            passwordError.innerHTML = "";
            return true;
        }
    }
    // event listeners for real time validation
    document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("password").addEventListener("input", validatePassword);
    </script>
    <div>
        <?php

        if (isset($_POST['email']) && isset($_POST['pass'])) {
            include 'Database/db.php';
            include "functions.php";

            $email = check_data($_POST['email']);
            $pass = check_data($_POST['pass']);

            if (empty($email)) {
                header("Location: login.php?error=Enter your email");
                exit();
            } else if (empty($pass)) {
                header("Location: login.php?error=Enter your password");
                exit();
            } else {
                $sql_login = "SELECT * FROM customers WHERE email='$email' AND pass = '$pass'";
                $result = mysqli_query($conn, $sql_login);
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['email'] = $row['email'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['fname'] = $row['fname'];
                        $_SESSION['lname'] = $row['lname'];
                        header("Location: user-report.php");
                        exit();
                } else {
                    header("Location: login.php?error=Incorrect email or password. Please try again!");
                }
            }
        }
        ?>
    </div>
</body>
<!--  -->
<?php include "footer.php"; ?>