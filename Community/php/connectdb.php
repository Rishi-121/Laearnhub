<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $emailid = $_POST['emailid'];
    $question = $_POST['question'];

    $con = mysqli_connect('localhost', 'root', '', 'learnhub', '3308');
    if ($con == false) {
        echo "Error in database connection!!";
    } else {
        $select = "SELECT * FROM `community` WHERE `question`='$question'";
        $result = mysqli_query($con, $select);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
?>
            <script>
                alert("The question already exists! Please, refer to our community for the answer");
                window.open('../question-asker.html', '_self');
            </script>
            <?php
        } else {
            $insert = "INSERT INTO `community`(`solved by`, `emailid`, `question`,`answer`,`type`) VALUES ('$username','$emailid','$question','None','unsolved')";
            $row = mysqli_query($con, $insert);
            if ($row == true) {

            ?>
                <script>
                    alert('Question added successfully!');
                    window.open('../community.php', '_self');
                </script>
<?php

            } else {
                echo "error";
            }
        }
    }
}
?>