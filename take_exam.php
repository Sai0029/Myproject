<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Exam</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            padding: 20px;
        }

        /* Style for red color */
        .red-text {
            color: red;
        }

        .question-container {
            margin-bottom: 30px;
        }

        .timer-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        .timer {
            position: fixed;
            display: none; 
            top: 10px;
            right: 10px;
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .options-list {
            list-style-type: none; /* Remove bullets */
        }
    </style>
</head>
<body>
<div class="container">
<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION["username"];
    ?>
    <h1 class="mb-4">All The Best! <?php echo $username; ?></h1>
    <?php
    // Check if exam_title is set in the URL
    if (isset($_GET['exam_title'])) {
        $examTitle = $_GET['exam_title'];
        // Render the hidden input field with exam_title
        echo '<input type="hidden" id="examTitleInput" name="exam_title" value="' . $examTitle . '">';
    }
    ?>
    <div class="text-center mb-4">
        <button id="markAttendanceBtn" class="btn btn-primary">Mark Attendance</button>
    </div>
    <div class="question-container">
        <form id="examForm" action="submit_action.php" method="POST" style="display: none;">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
    <input type="hidden" name="exam_title" value="<?php echo $examTitle; ?>">
            <?php

            if (!isset($_SESSION["username"])) {
                header("Location: login.php");
                exit();
            }

            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "1234";
            $database = "myproject";

            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_GET['exam_title']) && isset($_GET['difficulty'])) {
                $examTitle = $_GET['exam_title'];
                $examDifficulty = $_GET['difficulty'];

                // Fetch time limit from the database based on exam details
                $fetch_time_limit_sql = "SELECT time_limit FROM exams WHERE exam_title='$examTitle' AND difficulty='$examDifficulty'";
                $time_limit_result = $conn->query($fetch_time_limit_sql);

                if ($time_limit_result && $time_limit_result->num_rows > 0) {
                    $row = $time_limit_result->fetch_assoc();
                    $timeLimitMinutes = $row['time_limit']; // Time limit in minutes
                } else {
                    // Set default time limit if not found in database
                    $timeLimitMinutes = 30; // Default to 30 minutes
                }

                // Fetch question limit from the database
                $fetch_question_limit_sql = "SELECT question_limit FROM exams WHERE exam_title='$examTitle' AND difficulty='$examDifficulty'";
                $question_limit_result = $conn->query($fetch_question_limit_sql);

                if ($question_limit_result && $question_limit_result->num_rows > 0) {
                    $row = $question_limit_result->fetch_assoc();
                    $questionLimit = $row['question_limit']; // Number of questions to display
                } else {
                    // Set default question limit if not found in database
                    $questionLimit = 5; // Default to 5 questions
                }

                // Logic to fetch questions based on exam title and difficulty with the specified limit
                $fetch_questions_sql = "SELECT * FROM questions WHERE topic='$examTitle' AND difficulty='$examDifficulty' ORDER BY RAND() LIMIT $questionLimit";
                $result = $conn->query($fetch_questions_sql);

                $questionNumber = 1; // Initialize question number

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='mb-3'>";
                        echo "<p><strong>Question $questionNumber:</strong> " . $row["question_text"] . "</p>";
                        $question_id = $row["id"];
                        $fetch_options_sql = "SELECT * FROM options WHERE question_id='$question_id'";
                        $options_result = $conn->query($fetch_options_sql);

                        echo "<ul class='options-list'>";
                        while ($option_row = $options_result->fetch_assoc()) {
                            echo "<li><input type='radio' name='answer_$question_id' value='{$option_row['id']}' required>{$option_row['option_text']}</li>";
                        }
                        echo "</ul>";
                        echo "</div>";
                        
                        $questionNumber++; // Increment question number
                    }
                    echo "<button type='submit' id='submitExam'>Submit Exam</button>";
                } else {
                    echo "No questions available for the selected topic and difficulty.";
                }
            }
            ?>
        </form>
    </div>
</div>
    <!-- Include SweetAlert library and your custom JavaScript as needed -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
        $('#markAttendanceBtn').click(function(){
            // Capture image from camera
            captureImage();
        });
    });

    function captureImage() {
        // Create a video element to capture image from camera
        const video = document.createElement('video');
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
                video.onloadedmetadata = () => {
                    video.play();
                    // Wait for a while for camera to adjust and capture image
                    setTimeout(() => {
                        // Draw the current frame from video onto canvas
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                        // Stop video stream
                        stream.getTracks().forEach(track => track.stop());

                        // Convert canvas image to base64 string
                        const imageData = canvas.toDataURL('image/jpeg');

                        // Send image data along with attendance marking request
                        markAttendance(imageData);
                    }, 1000);
                };
            })
            .catch(error => {
                console.error('Error accessing camera:', error);
                Swal.fire({
                    title: "Error",
                    text: "Failed to access camera. Please try again.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            });
    }

    function markAttendance(imageData) {
        // AJAX call to mark attendance with image data
        $.ajax({
            type: "POST",
            url: "https://127.0.0.1:5000/mark-attendance",
            contentType: "application/json",
            data: JSON.stringify({ "username": "<?php echo $_SESSION["username"]; ?>", "image": imageData }),
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: "Attendance Marked Successfully",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                    $('#examForm').show();
                    $('#markAttendanceBtn').hide();
                    // Start the timer and other necessary actions
                    startTimer(<?php echo $timeLimitMinutes;?>);
                } else {
                    Swal.fire({
                        title: "Attendance Failed",
                        text: "No face detected. Attendance not marked.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                    $('#examForm').hide();
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: "Error",
                    text: "Error marking attendance. Please try again.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                $('#examForm').hide();
            }
        });
    }
        function startTimer(timeLimitMinutes) {
            let timeLimitSeconds = timeLimitMinutes * 60; // Convert minutes to seconds
            let timerDisplay = document.getElementById('timerDisplay');
            let timerInterval = setInterval(function() {
                let minutes = Math.floor(timeLimitSeconds / 60);
                let seconds = timeLimitSeconds % 60;

                timerDisplay.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                if (timeLimitSeconds <= 300) {
                    timerDisplay.classList.add('red-text'); // Add red color for last 5 minutes
                }

                if (timeLimitSeconds <= 0) {
                    clearInterval(timerInterval);
                    timerDisplay.innerText = 'Time\'s up!';
                    // Additional logic for handling time's up event

                    submitExamForm();
                    window.location.href = 'student_dashboard.php'; 
                }

                timeLimitSeconds--; // Decrement time
            }, 1000); // Update every second
            $("#timer").show();
        }
        function submitExamForm() {
    // Trigger click event on the submit button
    document.getElementById('submitExam').click();
}
    </script>
<script>
    // Function to detect key presses and handle warnings
    let keyPressed = false;
    document.addEventListener("keydown", function(event) {
        if (event.repeat) return; // Ignore repeated key events
        if (keyPressed) {
            console.log("Unusual activity detected.");
            Swal.fire({
                title: "Unusual Activity Detected",
                text: "Please avoid multiple key presses.",
                icon: "warning",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "student_dashboard.php"; // Redirect to student dashboard
            });
            return; // Exit function if already pressed
        }
        console.log("First key press detected.");
        Swal.fire({
            title: "Warning",
            text: "Please avoid multiple key presses.",
            icon: "warning"
        });
        keyPressed = true; // Set flag to true after first key press
    });
</script>
<script>
    document.addEventListener("visibilitychange", function() {
        if (document.visibilityState === 'hidden') {
            // User switched tabs or minimized the window
            alert("Warning: You switched tabs or minimized the window.");
            // You can add your own logic here, such as redirecting to another page
            // window.location.href = "student_dashboard.php";
        }
    });
    let tabSwitchCount = 0;

        document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === 'hidden') {
                tabSwitchCount++;
                if (tabSwitchCount >= 2) {
                    // More than 2 tab switches detected
                    alert("Warning: Excessive tab switches detected.");
                    // Redirect to student dashboard or perform other actions
                    window.location.href = "student_dashboard.php";
                }
            }
        });
    document.getElementById("markAttendanceBtn").addEventListener('click', function () {
        enterFullScreen();
    });

    function enterFullScreen() {
        const docElm = document.documentElement;
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        } else if (docElm.mozRequestFullScreen) { /* Firefox */
            docElm.mozRequestFullScreen();
        } else if (docElm.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            docElm.webkitRequestFullscreen();
        } else if (docElm.msRequestFullscreen) { /* IE/Edge */
            docElm.msRequestFullscreen();
        }
    }

    // Exit full-screen mode on Esc key press
    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape") {
            exitFullScreen();
        }
    });

    function exitFullScreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) { /* Firefox */
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) { /* Chrome, Safari & Opera */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { /* IE/Edge */
            document.msExitFullscreen();
        }
    }
</script>

    <div id="timer" class="timer">Time Left: <span id="timerDisplay"></span></div>
</body>
</html>