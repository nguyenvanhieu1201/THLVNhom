<?php
        session_start();
        $taikhoan=$_POST['data_username'];
        $matkhau=md5($_POST['data_password']);
        
        // Sau khi dang nhap
        require ("../BackEnd/ConnectionDB/DB_driver.php");

        $db = new DB_driver();
        $db->connect();

        $taikhoan = mysqli_escape_string($db->__conn, $taikhoan);
        $matkhau = mysqli_escape_string($db->__conn, $matkhau);

        $sql = "SELECT * FROM nguoidung WHERE TaiKhoan = '$taikhoan' AND MatKhau='$matkhau's";

        $dsad = $db->get_list($sql);

        if(sizeof($dsad) > 0){
            $_SESSION['currentUser'] = $dsad[0];   
            header('Location: http://localhost:8080/DoAn/admin.php');
            echo "yes";

        } else  echo "no";

        $db->dis_connect();
        ?>