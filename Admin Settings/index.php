<?php
require('inc/essentials.php');
require('inc/db_config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login panel</title>
    <?php require('inc/link.php');?> 
    <style>
        div.login-form{
            position : absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            width: 400px;
        }
    </style>
</head>
<body class ="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <div>
            <form method="POST" action="">
                <h4 class="bg-dark text-white py-3"> Admin Login Panel </h4>
                <div class="mb-3">
                    <input name="admin_name" type="text" required class="form-control shadow-none text-center " placeholder="Admin Name">
                </div>
                <div class="mb-5">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" required class="form-control shadow-none text-center " placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn text-black custom-bg shadow-none">Login</button>
            </form>
        </div>
        <?php
        // Define filterData function
        function filterData($data) {
            global $con;
            foreach ($data as $key => $value) {
                $data[$key] = mysqli_real_escape_string($con, htmlspecialchars(stripslashes(trim($value)), ENT_QUOTES, 'UTF-8'));
            }
            return $data;
        }

        if(isset($_POST['login']))
        {
            $frm_data = filterData($_POST);
            // Ensure the column names in the query match your database structure
            $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";

            // The keys in $frm_data should match the 'name' attributes of your form inputs
            $values = [$frm_data['admin_name'], $frm_data['password']];

            // Pass the database connection as the first argument to the select function
            $res = select($query, $values, "ss") or die(mysqli_error($con)); // Corrected argument order

            if($res->num_rows == 1){
                $row = mysqli_fetch_assoc($res);
                session_start();
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminId'] = $row['sr_no'];
                redirect('dashboard.php');
            } else {
                alert('error', 'Login failed - Invalid Credentials!!');
            }
        }
        ?>
        <?php require('inc/scripts.php')?>
    </div>
</body>
</html>
