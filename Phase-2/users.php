<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$first_user_id = 1;  // Assuming the first registered user has an ID of 1

if ($_SESSION['user_id'] == $first_user_id) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
              <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Registered At</th>
              </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                  <td>" . $row["id"] . "</td>
                  <td>" . $row["name"] . "</td>
                  <td>" . $row["email"] . "</td>
                  <td>" . $row["created_at"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }
} else {
    echo "Access denied.";
}

$conn->close();
?>
