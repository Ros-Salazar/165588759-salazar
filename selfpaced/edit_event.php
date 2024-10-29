<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Edit Event</title>
</head>
<body class="poppins-regular">
    <h2 class="poppins-bold">Edit Event</h2>

    <?php
        include "database.php";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $show_event = "SELECT * FROM events WHERE id = $id";

            $event = $conn -> query($show_event);

            if ($event && $event -> num_rows > 0) {
                $event_row = $event -> fetch_assoc();
                $event_name = $event_row['event_name'];
                $description = $event_row['description'];
                $event_date = $event_row['event_date'];
            } else {
                echo "Event Not Found";
            }
        } else {
            echo "No Event ID provided.";
        }
    ?>

    <form method="post" action="edit_event.php">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
        Event Name: <br> <input type="text" name="event_name" value="<?php echo htmlspecialchars($event_name); ?>"> <br>
        Event Description: <br> <textarea name="description" rows="4" cols="50"><?php echo htmlspecialchars($description); ?></textarea> <br>
        Event Date: <br> <input type="date" name="event_date" value="<?php echo htmlspecialchars($event_date); ?>"> <br> <br>
        <input type="submit" value="Edit Event" class="poppins-regular">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $event_name = $_POST["event_name"];
            $description = $_POST["description"];
            $event_date = $_POST["event_date"];

            if (empty($event_name) || empty($description) || empty($event_date)) {
                echo "Please complete the form to edit event.";
            } else {
                $edit_event = "UPDATE events SET event_name = '$event_name', description = '$description', event_date = '$event_date' WHERE id = $id";

                if ($conn -> query($edit_event)) {
                    echo "Event edited successfully.";
                } else {
                    echo "Error editing event.";
                }
            }

        }
    ?>
    <br> <br>
    <a href="index.php"><- Back to Home</a>
</body>
</html>