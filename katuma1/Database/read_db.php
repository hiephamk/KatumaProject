
<?php
include 'db.php';
// SQL query to retrieve data from the 'studentsinfo' table
$sql = "SELECT * FROM news";

// Execute the SQL query and store the result
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Group</th>
                </tr>
            </thead>
            <tbody>";

    // Loop through the result set and display data in rows
    ///* <td>{$row['image']}</td>*/
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['news_desc']}</td>
                <td><img class = 'img-fluid' src={$row['image']}></td>
                <td>{$row['news_categoryId']}</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    // Display a message if no results are found
    echo "No results";
}
// close the connection when done
$conn->close();
?>
