<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Add Event</title>
</head>
<body class="poppins-regular">
    <h2 class="poppins-bold">Add New Event</h2>

    <form method="post" action="add_event.php">
        Event Name: <br> <input type="text" name="event_name" class="long_input"> <br>
        Event Description: <br> <textarea name="description" rows="4" cols="50"></textarea> <br>
        Event Date: <br> <input type="date" name="event_date"> <br> <br>
        <input type="submit" value="+ Add Event" class="poppins-regular">
    </form>

    <?php
        include "database.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $event_name = $_POST["event_name"];
            $description = $_POST["description"];
            $event_date = $_POST["event_date"];

            if (empty($event_name) || empty($description) || empty($event_date)) {
                echo "Please complete the form to add event.";
            } else {
                $add_event = "INSERT INTO events (event_name, description, event_date) VALUES ('$event_name', '$description', '$event_date')";

                if ($conn -> query($add_event)) {
                    echo "Event added successfully.";
                } else {
                    echo "Error adding event.";
                }
            }

        } 
    ?>
    <br> <br>
    <a href="index.php"><- Back to Home</a>
</body>
</html>