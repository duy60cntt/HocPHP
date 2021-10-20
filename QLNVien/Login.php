<html>
    <head>

        <title>Login</title>
        <?php
        require("connectnv.php");
        session_start();
        if (isset($_POST['login'])) {

            $use = mysqli_real_escape_string($dbc, $_POST['use']);
            $pass = mysqli_real_escape_string($dbc, $_POST['pass']);

            if ($use != "" && $pass != "") {

                $sql_query = "select count(*) as cntUser from taikhoan where user='" . $use . "' and pass='" . $pass . "'";
                $result = mysqli_query($dbc, $sql_query);
                $row = mysqli_fetch_array($result);

                $count = $row['cntUser'];

                if ($count > 0) {
                    $_SESSION['use'] = $use;
                    $_SESSION['last_login_timestamp'] = time();


                    header('Location: H.php');
                    echo $use;
                } else {
                    echo "Mật khẩu và tài khoản không hợp lệ";
                }
            }
        }
        ?>
    </head>
    <body>
        <form method="post" action="Login.php">
            Username: <input type="text" name="use" size="25"/></br />
            Password: <input type="password" name="pass" size="25"/><br/>
            <input type="submit" name="login" value="Đăng nhập"/>
        </form>
    </body>
</html>