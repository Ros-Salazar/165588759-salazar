<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Event Calendar</title>
</head>
<body class="poppins-regular">
    <h1 class="center poppins-bold">My Event Calendar</h2>
    <form action="add_event.php">
        <button type="submit" class="poppins-regular">+ Add Event</button>
    </form>
    <table>
        <tr class="poppins-medium">
            <th>Event Name</th>
            <th>Description</th>
            <th>Event Date</th>
            <th>Actions</th>
        </tr>
        <?php
            include "database.php";

            $events_query = "SELECT * FROM events ORDER BY event_date ASC";

            $show_events = $conn -> query($events_query);

            if ($show_events -> num_rows > 0) {
                while ($event_row = $show_events -> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='name-column semi-bold'>" . $event_row['event_name'] . "</td>";
                    echo "<td class='description-column'>" . $event_row['description'] . "</td>";
                    // echo "<td class='center'>" . $event_row['event_date'] . "</td>";
                    echo "<td class='center'>" . date('F j, Y', strtotime($event_row['event_date'])) . "</td>";
                    echo "<td class='center'><a href='edit_event.php?id=" . $event_row['id'] . "'>Edit</a>  <a href='delete_event.php?id=" . $event_row['id'] . "'>Delete</a></td>";
                };
            } else {
                echo "<tr><td colspan='4'>No Events</td></tr>";
            };
        ?>
        
    </table>
</body>
</html>