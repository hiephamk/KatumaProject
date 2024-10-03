<?php
function check_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function connectdb()
{
    $servername = "web_group-24-db-1"; // Replace with your MySQL server hostname
    $username = "group_13"; // Replace with your MySQL username
    $password = "group13"; // Replace with your MySQL password
    $dbname = "group_13";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
function get_all($sql)
{
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $listproduct = $stmt->fetchAll();
    $conn = null;
    return $listproduct;
}
function get_one($sql)
{
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $listproduct = $stmt->fetch();
    $conn = null;
    return $listproduct;
}
