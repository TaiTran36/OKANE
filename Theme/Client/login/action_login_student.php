<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 11/3/2019
 * Time: 5:37 PM
 */
//Khai báo sử dụng session
session_start();

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['login']))
{
    $servername = "localhost";
    $database = "db_web";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_query($conn,"SET NAMES 'UTF8'");

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['pass']);



    // mã hóa pasword
//    $password = md5($password);

    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($conn,"SELECT student_code FROM intern_students WHERE student_code='$username'");

    $row = mysqli_fetch_array($query);
    if (!$query || mysqli_num_rows($query) == 0) {
        header('Content-Type: application/json');
        echo json_encode("error_name");


    }
        //Lấy mật khẩu trong database ra

     else if ($password != $row['student_code']) {
         header('Content-Type: application/json');
         echo json_encode("error_pass");

        }

    else {
       // $q1 = mysqli_query($conn,"SELECT * FROM intern_students WHERE student_code='$username'");
        //$r = mysqli_num_rows($q1);
        //var_dump($q1);
        $_SESSION['username'] = $username;
        header('Content-Type: application/json');
        echo json_encode("success");
        $sql = "Select full_name from intern_students WHERE  student_code = '$username'";
        $user_infor = mysqli_query($conn,$sql);
        if (mysqli_num_rows($user_infor) > 0)
        {
            // Sử dụng vòng lặp while để lặp kết quả
            while($row = mysqli_fetch_assoc($user_infor)) {
                $_SESSION['full_name'] = $row['full_name'];
            }
        }
    }
    exit();
}
?>

