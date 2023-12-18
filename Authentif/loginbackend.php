<?php 
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_Password = $_POST['confirm_Password'];

    if (empty($username) || empty($email) || empty($password) || empty($confirm_Password) ) {
        echo "All inputs fields are required!";
        exit();
    }

    if ($password != $confirm_password) {
        echo "Passwords do not match";
        exit();
    }
    
    $sql = "INSERT INTO contact (title, description, price, category) VALUES ('$title', '$description', $price, '$category')";
    $result = mysqli_query($conn,$sql);

}
?>