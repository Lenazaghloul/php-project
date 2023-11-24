<?php

include('./config/db.php');

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM student_account WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $account = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    print_r($account);

}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('./templates/header.php'); ?>

<h2 class="center">Student Information</h2>
<div class="container center">
    <?php if ($account): ?>
        <h4><?php echo htmlspecialchars($account['Name']);?></h4>
        <p><?php echo htmlspecialchars($account['Email']); ?></p>
        <p><?php echo date($account['Created_at']); ?></p>
        <p><?php echo htmlspecialchars($account['Courses']); ?></p>
       <?php else: ?>
        <h5>This user account is incorrect</h5>
         <?php endif?>
</div>

<?php
    include('./templates/footer.php')
    ?>
</html>