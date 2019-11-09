<?php
include '../Connection.php';
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
    $conn = new Connection();
    $connect = $conn->Conn();

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['pass']);

    // mã hóa pasword
//    $password = md5($password);
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = $connect->query("SELECT tax_number FROM intern_organization_profile WHERE tax_number='$username'");

    $row = mysqli_fetch_array($query);
    if (!$query || mysqli_num_rows($query) == 0) {

        header('Content-Type: application/json');
        echo json_encode("error_name");
    }
    //Lấy mật khẩu trong database ra

    else if ($password != $row['tax_number']) {
        header('Content-Type: application/json');
        echo json_encode("error_pass");
    }
    else {

        $_SESSION['user'] = 'company';
        header('Content-Type: application/json');
        echo json_encode("success");
        $user_infor = $connect->query("Select organization_name from intern_organization_profile WHERE  tax_number = '$username'");
        if (mysqli_num_rows($user_infor) > 0)
        {
            // Sử dụng vòng lặp while để lặp kết quả
            while($row = mysqli_fetch_assoc($user_infor)) {
                $_SESSION['organization_name'] = $row['organization_name'];
            }
        }
    }
    exit();
}
?>

