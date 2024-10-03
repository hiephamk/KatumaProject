<?php 
$title = "Register";
include_once "header.php";
?>
<div class="container main-container">
    <h3 style="color: #e74c3c;text-align: center;margin-top:30px;">REGISTER FORM</h3> <br>
    <p><span class="error">* Required field</span></p>
    <form class="row g-3 bg-warning" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="col-md-6">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname">
            <span id="fnameError" style="color: red;"></span>
        </div>
        <div class="col-md-6">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname">
            <span id="lnameError" style="color: red;"></span>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <span class="error">*</span>
            <input type="email" class="form-control" id="inputEmail4" name="email">

        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <span class="error">*</span>
            <input type="password" class="form-control" id="inputPassword4" name="pass">

        </div>
        <div class="col-6">
            <label for="inputPhone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="phone number">
        </div>
        <div class="col-6">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="addr" id="inputAddress" placeholder="Street, Building...">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1" name="term_agree">
                <label class="form-check-label" for="gridCheck1">
                    By checking this box, you are agreeing to our terms of service.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck2">
                <label class="form-check-label" for="gridCheck2">
                    Email me with news and updates (Option)
                </label>
            </div>
        </div>
        <div class="col-12" align-middle>
            <input type="submit" class="btn-primary btn fs-4" style="margin:10px 0 30px 35%; width:200px; height:50px;border-radius:5px;" name="submit" value="Register">
        </div>
    </form>
</div>

<!-- JavaScript Validation  -->
<script>
    // function to validate first name
    function validatefName() {
        const fname = document.getElementById("fname").value;
        const fnameError = document.getElementById("fnameError");

        if (fname.length < 3 || fname.length > 20) {
            fnameError.innerHTML = "First name must be between 3 and 20 characters!";
            return false;
        } else {
            fnameError.innerHTML = "";
            return true;
        }
    }

    // function to validate last name
    function validatelName() {
        const lname = document.getElementById("lname").value;
        const lnameError = document.getElementById("lnameError");

        if (lname.length < 3 || lname.length > 20) {
            lnameError.innerHTML = "Last name must be between 3 and 20 characters!";
            return false;
        } else {
            lnameError.innerHTML = "";
            return true;
        }
    }
    // event listeners for real time validation
    document.getElementById("fname").addEventListener("input", validatefName);
    document.getElementById("lname").addEventListener("input", validatelName);
</script>

<div class="container text-center"><br>
    <?php
    // Check if the 'submit' button in the form was clicked
    if (isset($_POST['submit'])) {
        // Retrieve data from the form and store it in variables
        $fname = $_POST['fname'];     // First name
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];

        // Include the database connection file
        include './Database/db.php';
        if (isset($_POST['term_agree'])) {
            $check = "select * from customers where email = '$email'";
            if ($result = mysqli_query($conn, $check)) {
                $rowcount = mysqli_num_rows($result);
                if ($rowcount >= 1) {
                    echo "<p class='text-danger'>The email has already existed</p>";
                } else {
                    $sql = "INSERT INTO customers(fname,lname,email,pass,phone,addr) VALUES ('$fname','$lname','$email','$pass','$phone','$addr')";
                    if ($conn->query($sql) === TRUE) {
                        header("Location: user-report.php");
                        exit();
                    } else {
                        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                    }
                }  $conn->close();
            } else {
                // If there was an error in the query, display an error message
                echo "<p>Error! The email or phone number have already existed. Please try an another! ";
            }
        } else {
            echo "<p class='text-danger' >Warning: You need to agree with our terms of service!</p>";
        }
    }
    ?>
</div>
<?php include "footer.php"; ?>