<?php 
require_once 'config/db.php';
require_once 'config/functions.php';
$result = dispaly_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scheduled Exams</title>
  <!-- Add Bootstrap CSS link -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-dark text-white">
      <h2 class="display-6 text-center">Scheduled Exams</h2>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
          <thead class="thead-dark">
            <tr>
              <th>Course</th>
              <th>Exam Title</th>
              <th>Time Limit (mins)</th>
              <th>Question Limit</th>
              <th>Difficulty</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row["course_name"]; ?></td>
              <td><?php echo $row['exam_title']; ?></td>
              <td><?php echo $row['time_limit']; ?></td>
              <td><?php echo $row['question_limit']; ?></td>
              <td><?php echo ucfirst($row['difficulty']); ?></td>
              <td>
                <!-- "Start" button in the "Actions" column -->
                <?php
                  if ($row['exam_title'] === "CodingExam") {
                    // If exam_title is "CodingExam", call startExam function to redirect to codingexam.php
                    echo '<button class="btn btn-sm btn-primary" onclick="startExam(\''.$row['id'].'\', \''.$row['exam_title'].'\', \''.$row['difficulty'].'\')">Start</button>';
                  } else {
                    // For other exams, call startExam function to redirect to take_exam.php
                    echo '<button class="btn btn-sm btn-primary" onclick="startExam(\''.$row['id'].'\', \''.$row['exam_title'].'\', \''.$row['difficulty'].'\')">Start</button>';
                  }
                ?>
              </td>  
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
// Function to start the exam by redirecting based on exam_title
function startExam(examId, examTitle, examDifficulty) {
    if (examTitle === "CodingExam") {
        // Redirect to codingexam.php for CodingExam
        window.location.href = 'coding_exam.php';
    } else {
        // Redirect to take_exam.php for other exams
        window.location.href = `take_exam.php?exam_title=${examTitle}&difficulty=${examDifficulty}`;
    }
}
</script>
</body>
</html>
