<?php

session_start();

if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $username = $_POST['username'];
    $emailid = $_POST['emailid'];
    $question = $_SESSION['question'];
    $answer = $_POST['answer'];

    $con = mysqli_connect('localhost', 'root', '', 'learnhub', '3308');
    if ($con == false) {
        echo "Error in database connection!!";
    } else {
        $insert = "INSERT INTO `community`(`solved by`, `emailid`, `question`,`answer`,`type`) VALUES ('$username','$emailid','$question','$answer','solved')";
        $row = mysqli_query($con, $insert);

        $update = "UPDATE `community` SET `type`='closed' WHERE `id`='$id'";
        mysqli_query($con, $update);

        session_destroy();

        if ($row == true) {
?>
            <script>
                alert('Thank you for your answer!');
                window.open('../community.php', '_self');
            </script>
<?php

        } else {
            echo "error";
        }
    }
}
?>