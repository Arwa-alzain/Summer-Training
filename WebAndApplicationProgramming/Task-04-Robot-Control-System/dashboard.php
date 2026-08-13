<?php

require_once 'db.php';

/* Get robot state */
$robotQuery = $conn->query(
    "SELECT command, updated_at
     FROM robot_state
     WHERE id = 1"
);

$robot = $robotQuery->fetch_assoc();


/* Get voice commands */
$voiceQuery = $conn->query(
    "SELECT id, text_output, created_at
     FROM voice_commands
     ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Robot Dashboard</title>


<style>

body {

    margin: 0;

    font-family: Arial, Helvetica, sans-serif;

    background: #f5f5f5;

    color: #222;

}


.container {

    width: 90%;

    max-width: 1000px;

    margin: 40px auto;

}


h1 {

    text-align: center;

    margin-bottom: 30px;

}


.cards {

    display: grid;

    grid-template-columns:
        repeat(auto-fit, minmax(250px, 1fr));

    gap: 20px;

    margin-bottom: 30px;

}


.card {

    background: white;

    padding: 25px;

    border-radius: 15px;

    box-shadow:
        0 2px 10px rgba(0,0,0,0.08);

}


.card h2 {

    margin-top: 0;

    font-size: 20px;

}


.command {

    font-size: 30px;

    font-weight: bold;

    margin: 15px 0;

}


.time {

    color: #777;

    font-size: 14px;

}


table {

    width: 100%;

    border-collapse: collapse;

    background: white;

    border-radius: 15px;

    overflow: hidden;

}


th,
td {

    padding: 15px;

    border-bottom: 1px solid #eee;

    text-align: center;

}


th {

    background: #222;

    color: white;

}


tr:hover {

    background: #f8f8f8;

}


.buttons {

    text-align: center;

    margin-bottom: 30px;

}


.btn {

    display: inline-block;

    padding: 12px 20px;

    margin: 5px;

    border-radius: 10px;

    text-decoration: none;

    border: none;

    cursor: pointer;

    font-size: 15px;

}


.refresh {

    background: #222;

    color: white;

}


.control {

    background: white;

    color: #222;

    border: 1px solid #ccc;

}


.empty {

    padding: 30px;

    text-align: center;

    color: #777;

}


</style>

</head>


<body>


<div class="container">


<h1>
    🤖 Robot Dashboard
</h1>


<!-- Buttons -->

<div class="buttons">

    <a
        href="index.html"
        class="btn control">

        🎮 Control Panel

    </a>


    <button
        class="btn refresh"
        onclick="location.reload()">

        🔄 Refresh

    </button>

</div>



<!-- Current Robot State -->

<div class="cards">


<div class="card">

    <h2>
        🤖 Current Robot Command
    </h2>


    <div class="command">

        <?php

        if ($robot) {

            $commandMap = [

                'F' => 'Forward',

                'B' => 'Backward',

                'L' => 'Left',

                'R' => 'Right',

                'S' => 'Stop'

            ];


            $currentCommand =
                $commandMap[$robot['command']]
                ?? $robot['command'];


            echo htmlspecialchars(
                $currentCommand
            );

        } else {

            echo "Unknown";

        }

        ?>

    </div>


    <?php if ($robot): ?>

        <div class="time">

            Last update:

            <?php
            echo htmlspecialchars(
                $robot['updated_at']
            );
            ?>

        </div>

    <?php endif; ?>

</div>


</div>



<!-- Voice Commands -->

<div class="card">

<h2>
    🎤 Voice Commands
</h2>


<?php if ($voiceQuery && $voiceQuery->num_rows > 0): ?>


<table>

<thead>

<tr>

    <th>ID</th>

    <th>Text</th>

    <th>Time</th>

</tr>

</thead>


<tbody>


<?php while (
    $row = $voiceQuery->fetch_assoc()
): ?>


<tr>

    <td>

        <?php
        echo htmlspecialchars(
            $row['id']
        );
        ?>

    </td>


    <td>

        <?php
        echo htmlspecialchars(
            $row['text_output']
        );
        ?>

    </td>


    <td>

        <?php
        echo htmlspecialchars(
            $row['created_at']
        );
        ?>

    </td>

</tr>


<?php endwhile; ?>


</tbody>

</table>


<?php else: ?>


<div class="empty">

    لا توجد أوامر صوتية محفوظة حتى الآن.

</div>


<?php endif; ?>


</div>


</div>


</body>

</html>


<?php

$conn->close();

?>
