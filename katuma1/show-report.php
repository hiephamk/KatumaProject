<?php 
$title= "Show Report";
include "header.php";
?>
<div class="main-container">
    <div class="main-content">
        <?php
        include './Database/db.php';
        
        $sql = "SELECT * FROM data";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Start the table and define the headers
            echo "
            <table class='table text-left w-100' style='margin: 30px auto;'>
                <thead>
                    <tr>
                        <th style='border: 1px #333 solid; width: 200px'>General Condition</th>
                        <th style='border: 1px #333 solid; width: 200px'>Water Temperature</th>
                        <th style='border: 1px #333 solid; width: 200px'>Algae Status</th>
                        <th style='border: 1px #333 solid; width: 200px'>Swimming Allowed</th>
                        <th style='border: 1px #333 solid; width: 200px'>Updated On</th>
                    </tr>
                </thead>
                <tbody>
            ";
            // Fetch each row and generate a table row for each record
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td style='border: 1px #333 solid;'>" . $row['lake_cond'] . "</td>
                    <td style='border: 1px #333 solid;'>" . $row['water_temp'] . "</td>
                    <td style='border: 1px #333 solid;'>" . $row['kind_algae'] . "</td>
                    <td style='border: 1px #333 solid;'>" . $row['swim_true'] . "</td>
                    <td style='border: 1px #333 solid;'>" . $row['update_time'] . "</td>
                </tr>
                ";
            }
            echo "
                </tbody>
            </table>
            ";
        } else {
            echo "No results found.";
        }
        ?>
    </div>
</div>
<?php include "footer.php"; ?>