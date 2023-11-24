<!DOCTYPE html>

<?php
include('./templates/header.php')
?>

<?php include('./config/db.php') ?>
<?php


$errors = array('email' => '', 'name' => '', 'password' => '', 'Courses' => '');

if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email is invalid <br />';
        }
    }

    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required <br />';
    } else {
        $name = $_POST['name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = 'Name must be characters only <br />';
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required <br />';
    } else {
        $password = $_POST['password'];

        // Check if the password length is at least 8 characters
        if (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters long <br />';
        }
        // Check if the password contains at least one letter, one number, and one special character
        elseif (!preg_match('/[a-zA-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[^a-zA-Z\d]/', $password)) {
            $errors['password'] = 'Password must contain at least one letter, one number, and one special character <br />';
        }
    }

    if (empty($_POST['Courses'])) {
        $errors['Courses'] = 'Courses is required <br />';
    } else {
        $Courses = $_POST['Courses'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]+)*$/', $Courses)) {
            $errors['Courses'] = 'Courses must be separated with commas and spaces <br />';
        }
    }

    if(array_filter($errors)){
        echo 'errors in the form';
    } else{
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $Courses = mysqli_real_escape_string($conn, $_POST['Courses']);

        $sql = "INSERT INTO student_account(email,name,Courses) 
        values('$email', '$name', '$Courses')";

        if(mysqli_query($conn, $sql)){

        }else {
            echo 'error' . mysqli_error($conn);
        }


        // echo '<h1>form is valid</h1>';
        header('Location: index.php');
    }
}
?>

<section class="container grey-text">
    <h4 class="center">Add</h4>
    <form action="index1.php" class="white" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars(isset($_POST['name']) ? $_POST['name'] : ''); ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : ''); ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>

        <label for="password">Password</label>
        <input type="password" name="password">
        <div class="red-text"><?php echo $errors['password']; ?></div>

        <label for="Courses">Courses (comma separated)</label>
        <input type="text" name="Courses" value="<?php echo htmlspecialchars(isset($_POST['Courses']) ? $_POST['Courses'] : ''); ?>">
        <div class="red-text"><?php echo $errors['Courses']; ?></div>

        <div class="center">
            <input type="submit" name="submit" id="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php
    include('./templates/footer.php')
    ?>
</html>
