<?php 
$title  = "User-Report";
include_once    "header.php";
?>
<div class="main-container">
    <div class="main-content">
        <div>
            <h1 class="text-center m-3">User Research Data Form</h1>
        </div>
        <form class="user-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Write your observation about the lake condition:</label>
              <input class="form-control" rows="3" type="text" name="lake_cond"></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">What is the current water temperature?</label>
                <input type="text" class="form-control" name="water_temp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Did you see any blue or green algae?</label>
                <input type="text" class="form-control" name="kind_algae">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Would you swim in the lake?</label>
                <input type="text" class="form-control" name="swim_true">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Give us feedback:</label>
                <input type="text" class="form-control" rows="3" name="feedback"></input>
            </div>
            <div class="form-check col-12">
                <input class="form-check-input" type="checkbox" id="gridCheck1" name="term_agree">
                <label class="form-check-label" for="gridCheck1">
                    By checking this box, you are agreeing to our terms of service.
                </label>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </div>
        </form>
        <div class="container text-center">
            <?php
            // Check if the 'submit' button in the form was clicked
            if (isset($_POST['submit'])) {
                // Retrieve data from the form and store it in variables
                $lake_cond = $_POST['lake_cond'];     // First name
                $water_temp = $_POST['water_temp'];
                $kind_algae = $_POST['kind_algae'];
                $swim_true = $_POST['swim_true'];
                $feedback = $_POST['feedback'];
        
                // Include the database connection file
                include "./Database/db.php";
                if (isset($_POST['term_agree'])) {
                    $sql = "INSERT INTO data(lake_cond,water_temp,kind_algae,swim_true,feedback) VALUES ('$lake_cond','$water_temp','$kind_algae','$swim_true','$feedback')";
                            if ($conn->query($sql) === TRUE) {
                                echo "<p class='text-center'>You have successfully submit the form. Thank You!</p>";
                            } else {
                                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                            }
                } else {
                    echo "<p class='text-danger'>Warning: You need to agree with our terms of service!</p>";
                }
                $conn->close();
            }
            ?>
        </div>
    </div>
</div>
<?php 
include "footer.php"
?>