<?php
if ($_POST['change']) {
    $email = base64_decode($_GET['q']);
    $password = $_POST['password'];
    $retype = $_POST['retype_password'];
    if ($password != $retype) {
        echo '<script>alert("Password and Retype password should match!")</script>';
        header("Refresh:0 url=reset.php");
    }
    require_once 'my_functions.php';
    $db = new connection();
    $query = $db->connect()->prepare("SELECT state_change_password FROM account WHERE email= ? LIMIT 1");
    $query->bind_param('s', $email);
    $query->execute();
    $query->bind_result($state_change_password);
    if ($query->fetch()) {
        if ($state_change_password == 0) {
            echo '<script>alert("You have changed Password ")</script>';
            header("Refresh:0 url=../reset.php");
        } else {
            $email_change = base64_decode($_GET['q']);
            $query = $db->connect()->prepare("UPDATE account set password=?,state_change_password = ?  WHERE email=?");
            $status = 0;
            $new_password = md5($password);
            $query->bind_param('sis', $new_password, $status, $email_change);
            $query->execute();
            $query->close();


            $query2 = $db->connect()->prepare('SELECT id FROM account WHERE email = ? LIMIT 1');
            $query2->bind_param('s', $email_change);
            $query2->execute();
            $query2->bind_result($id);
            $query2->fetch();
            $activity = 'Change Password';
            $query = $db->connect()->prepare("INSERT INTO activity_user(id_user, Activity, type_activity) VALUES(?,?,?)");
            $opq=1;
            $query->bind_param('ssi', $id, $activity, $opq);
            $query->execute();
            $query->close();
            $query2->close();
            echo '<script>alert("Password Successfully changed")</script>';
            header("Refresh:0 url=../index.php");
        }
    } else {
        echo '<script>alert("Email not found")</script>';
        header("Refresh:0 url=../index.php");
    }
}
?>