<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Users</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your external stylesheet -->
    <style>
        /* Inline styles for specific page elements */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4158d0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #cccccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4158d0;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>User List</h2>
        <?php
        include 'db.php'; // Include your database connection file

        $sql = "SELECT id, name, email, created_at FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
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

        $conn->close();
        ?>
    </div>
</body>

</html>
