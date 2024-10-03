<?php 
$title = "Search Result";
include "header.php";
?>
<div class="main-container">
    <div class="main-content">
        <div>
            <h1 class="text-center bg-body-secondary w-100">The result of search will be shown here:</h1>
        </div>
    
        <h5></h5>
    
        <?php
        include "./Database/db.php";
        if (isset($_POST['submit']) && ($_POST['submit'])) {
            include 'Database/db.php';
            $keyword = $_POST['submit'];
    
            $sql = "SELECT * FROM data WHERE (
                lake_cond like '%$keyword%' or
                water_temp like '%$keyword%' or
                kind_algae like '%$keyword%' or
                swim_true like '%$keyword%' or
                update_time like '%$keyword%'
                )";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            echo '<h5 class="fw-bold fst-italic text-primary">There are ' . $rowcount . ' results:</h5>';
        ?>
        <div class="d-flex flex-wrap container" style="box-sizing:border-box; margin:20px 0 20px auto;">
            <?php
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
        }
            ?>
        </div>
    </div>
</div>
<?php include "footer.php"?>