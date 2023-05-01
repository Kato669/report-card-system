<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Student Report Management System</title>
    <!-- calender js link -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <!-- javascript syntax -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
            });
        calendar.render();
    });

    </script>
    <!-- end javascript syntax -->
</head>
<body>
    <div class="navbar">
        <div class="srms">
            <a href="index.html">Student Report Management System</a>
        </div>
        <div class="links">
            <ul>
                <li><a href="#">home</a></li>
                <li><a href="student/login.php">student</a></li>
                <li><a href="admin/login.php">admin</a></li>
            </ul>
        </div>
    </div>
    <!-- html code that calls js -->
    <div id='calendar' class="calender"></div>
    <!-- footer -->
    <footer>
        <p>copyright &copy; master care pls <div class="date"></div></p>
    </footer>
</body>
</html>