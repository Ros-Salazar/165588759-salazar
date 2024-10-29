<?php
    include "database.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $delete_event = "DELETE FROM events WHERE id = $id";

        if ($conn -> query($delete_event)) {
            echo "Event deleted successfully.";
        } else {
            echo "Error deleting event.";
        }
    }

    header("Location: index.php");
?>