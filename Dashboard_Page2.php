<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Per Organization</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Dashboard2_style.css">
    <script src="Dashboard.js" defer></script>
</head>
<body>
<div class="header">
        <h1>Details Per Project</h1>
        <ul>
            <li><a href="Dashboard_Page1.php">Go Back to Page 1</a></li>
            <li><a href="Login_Page.php">Sign Out</a></li>
        </ul>
    </div>
    
    <div class="section-title">&lt;Current Finances&gt;</div>
    <div class="committee-finance">
        <div class="Finances">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db_name = "database_4";
                $conn = new mysqli($servername, $username, $password, $db_name, 3306);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $Query = "SELECT month, budget, expenses FROM finance";
                $result = $conn->query($Query);

                if ($result->num_rows > 0) {
                    echo "<table border='1'>
                            <tr>
                                <th>Month</th>
                                <th>Budget</th>
                                <th>Expenses</th>
                                <th>Total</th>
                            </tr>";
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['month'] . "</td>
                                <td>" . $row['budget'] . "</td>
                                <td>" . $row['expenses'] . "</td>
                                <td>" . ( $row['budget'] - $row['expenses']) . "</td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No data found";
                }

                $conn->close();
            ?>
        </div>
    </div>
    
    <div id="Members_Container" style="width: 100%;">
        <div class="section-title" >&lt;Deliverables or Tasks&gt;</div>
        <div class="deliverables-board">
        <table>
            <tr>
                <th>List of Tasks/Members</th>
                <th>Member 1</th>
                <th>Member 2</th>
                <th>Member 3</th>
                <th>Member 4</th>
            </tr>
            <tr>
                <td>Task 1</td>
                <td>Responsible</td>
                <td>Consulted</td>
                <td>Informed</td>
                <td>Accountable</td>
            </tr>
            <tr>
                <td>Task 2</td>
                <td>Accountable</td>
                <td>Responsible</td>
                <td>Consulted</td>
                <td>Informed</td>
            </tr>
            <tr>
                <td>Task 3</td>
                <td>Informed</td>
                <td>Accountable</td>
                <td>Responsible</td>
                <td>Consulted</td>
            </tr>  
        </table>
        </div>
    </div>
    
    
    <div id="Committee_Container" style="display: none; width: 100%;">
        <div class="section-title" >&lt;Deliverables or Tasks&gt;</div>
        <div class="deliverables-board">
        <table>
            <tr>
                <th>List of Tasks/Committee</th>
                <th>Committee 1</th>
                <th>Committee 2</th>
                <th>Committee 3</th>
                <th>Committee 4</th>
            </tr>
            <tr>
                <td>Task 1</td>
                <td>Responsible</td>
                <td>Consulted</td>
                <td>Informed</td>
                <td>Accountable</td>
            </tr>
            <tr>
                <td>Task 2</td>
                <td>Accountable</td>
                <td>Responsible</td>
                <td>Consulted</td>
                <td>Informed</td>
            </tr>
            <tr>
                <td>Task 3</td>
                <td>Informed</td>
                <td>Accountable</td>
                <td>Responsible</td>
            <td>Consulted</td>
            </tr>
        </table>
        </div>
    </div>
    
    
    <button id="switch_button">Switch Table</button>
</body>
</html>
