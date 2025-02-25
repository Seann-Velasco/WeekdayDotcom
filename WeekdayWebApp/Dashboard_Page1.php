<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Per Organization</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Dashboard1_style.css">
</head>
<body>
    <div class="header">
        <h1>Project Per Organization</h1>
        <ul>
            <li><a href="Dashboard_Page2.php">Go to Page 2</a></li>
            <li><a href="Login_Page.php">Sign Out</a></li>
        </ul>
    </div>

    <div class="section-title">&lt;Current Task&gt;</div>
    <div class="task-timeline">
        <p><strong>&#187; December 2024</strong></p>
        <div class="members">
            <?php 
                $members = ['Member 1', 'Member 2', 'Member 3'];
                foreach ($members as $member) {
                    echo "<div>&#10133; $member</div>";
                }
            ?>
        </div>
    </div>

    <div class="section-title">&lt;Current Task Project Table&gt;</div>
    <div class="task-board">
        <?php 
            $tasks = [
                'Not started' => ['Member 1', 'Member 2', 'Member 3'],
                'In progress' => ['Member 4'],
                'Done' => ['Member 5']
            ];
        ?>
        
        <div class="column">
            <h3>&#9679; Not started <small><?php echo count($tasks['Not started']); ?></small></h3>
            <?php 
                foreach ($tasks['Not started'] as $task) {
                    echo "<div class='task'>$task</div>";
                }
            ?>
        </div>

        <div class="column">
            <h3>&#128309; In progress <small><?php echo count($tasks['In progress']); ?></small></h3>
            <?php 
                foreach ($tasks['In progress'] as $task) {
                    echo "<div class='task'>$task</div>";
                }
            ?>
        </div>

        <div class="column">
            <h3>&#128994; Done <small><?php echo count($tasks['Done']); ?></small></h3>
            <?php 
                foreach ($tasks['Done'] as $task) {
                    echo "<div class='task'>$task</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>
