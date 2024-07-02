<?php

session_start();

	include("connection.php");
	include("functions.php");

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['intitule'];
    $query = "SELECT id FROM evenements WHERE intitule = '$event_name'";
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $event_id = $row['id'];

        $query = "INSERT INTO user_evenements (evenement_id, user_id) VALUES ('$event_id', '{$_SESSION['id']}')";
        mysqli_query($con, $query);

        header("Location: ".$_SERVER['REQUEST_URI']);
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .calendar {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            position: relative;
            display: flex;
        }
        
        .month {
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
            color: #333;
            position: relative;
            overflow: hidden;
            padding-top: 40px;
        }

        .month:before {
            content: "";
            position: absolute;
            top: -50px;
            left: 0;
            right: 0;
            margin: auto;
            width: 200%;
            height: 200%;
            border-radius: 50%;
            background-color: #001f3f; /* Bleu foncé */
            z-index: -1;
            transform: rotate(45deg);
        }

        .month:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle at 20% 20%, #ff6347 20%, transparent 30%);
            z-index: -1;
            opacity: 0.2;
        }
        
        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        
        .day {
            text-align: center;
            padding: 20px;
            background-color: #e0e0e0;
            border-radius: 10px;
            color: #333;
            font-weight: bold;
            position: relative;
            cursor: pointer;
            position: relative;
        }

        .day:hover {
            background-color: #d1d1d1;
        }

        .dayname {
            color: #001f3f; /* Bleu foncé */
            font-weight: bold;
        }

        .event-details {
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin-left: 20px;
        }

        .event {
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
           
        }

        #conteneur{
            display: flex;
        }
    </style>
</head>
<body>
    <div class="calendar">
        <div>
            <div class="month">Mars 2024</div>
            <div class="days">
                <?php

             

                $query = "SELECT intitule, jour FROM evenements";
                $result = $con->query($query);

                $events = [];

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $events[$row['jour']] = $row['intitule'];
                    }
                }

                $colors = []; // Tableau pour stocker les couleurs associées aux événements

                for ($i = 1; $i <= 5; $i++) {
                    for ($j = 1; $j <= 7; $j++) {
                        $day = ($i - 1) * 7 + $j;
                        $event = isset($events[$day]) ? $events[$day] : "";
                        if (!empty($event)) {
                            $color = generateRandomColor();

                            $colors[$event] = $color; // Associer chaque événement à une couleur
                            echo "<div class='day event-day' data-event='$event' style='background-color: $color;'>$day</div>";
                        } else {
                            echo "<div class='day'>$day</div>";
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="event-details">
            <h3>Événements</h3>
            <?php
            function checkIfUserRegistered($eventId, $sessionId, $con) {
                $stmt = $con->prepare("SELECT COUNT(*) AS count FROM user_evenements WHERE evenement_id = ? AND user_id = ?");
                $stmt->bind_param('ii', $eventId, $sessionId);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                
                return $row['count'] > 0;
            }
            

            function getEventId($event, $con) {
                $stmt = $con->prepare("SELECT id FROM evenements WHERE intitule = ?");
                $stmt->bind_param('s', $event);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                return $row ? $row['id'] : null;
            }
            
            

            foreach ($events as $day => $event) {
                if (!empty($event)) {
                    $color = $colors[$event]; // Récupérer la couleur associée à l'événement
                    echo "<div class='event' style='background-color: $color;'>$day: $event";
                     
                    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                        $eventId = getEventId($event, $con);
                        if (checkIfUserRegistered($eventId, $_SESSION['id'], $con)) {
                            echo "<button type='button' disabled>Déjà inscrit</button>";
                        } else {
                            echo "<form action='#' method='post'>";
                            echo "<input type='hidden' name='intitule' value='$event'>";
                            echo "<button type='submit'>S'inscrire</button>";
                            echo "</form>";
                        }
                    }
            
                    echo "</div>";
                }
            }
            
        

            function generateRandomColor() {
                return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            }
            ?>



        </div>
    </div>
</body>
</html>
