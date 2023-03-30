<?php
$servername = "localhost";
$username = ""; //your username
$password = ""; //your password
$dbname = "sys";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) FROM (
    SELECT user_id FROM company 
    JOIN company_user USING(company_id) 
    GROUP BY user_id
    HAVING COUNT(company_name) > 1) AS subq";

$result = $conn->query($sql);
echo "Количество пользователей, привязанных больше, чем к одной компании: <b>" . $result->fetch_assoc()['COUNT(*)'] . "</b>  <br>";

$sql2 = "SELECT company_name FROM company WHERE company_id NOT IN (
            SELECT company_id FROM company_user 
            WHERE user_id not IN (
                SELECT user_id FROM company 
                JOIN company_user USING(company_id) 
                GROUP BY user_id
                HAVING COUNT(company_name) = 1
                )
            )";

$result = $conn->query($sql2);
echo "Компании, в которых состоят только пользователи, не привязанные к другим компаниям:  ";

while($row = $result->fetch_assoc()) {
    echo "<b>" . $row["company_name"] . "</b> ";
}
