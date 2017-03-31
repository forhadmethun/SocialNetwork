<?php include("inc/header.inc.php"); ?>

<?php

$reg = @$_POST['reg'];
$fn = "";
$ln = "";
$un = "";
$em = "";
$em2= "";
$pswd = "";
$pswd2 ="";
$d = "";


//register form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d");


if($reg)
{
    if($em = $em2)
    {
        $u_check = mysql_query("select username from user where username = '$un'");
        $check = mysql_num_rows($u_check);

        //check whether email already exists
        $e_check = mysql_query("SELECT mail FROM user WHERE mail='$em'");
        //Count the number rows returned 
        $email_check  = mysql_num_rows($e_check);





        if($check == 0){
            if($email_check ==0){
                if($fn && $ln && $un && $em && $em2 && $pswd && $pswd2)
                {
                    if($pswd  = $pswd2)
                    {
                        if(strlen($un) >25 || strlen($fn)>25 || strlen($ln)>25)
                        {
                            echo "The maximum Limit for username/ First name/ Last name is 25 characters!";
                        }
                        else{
                            if(strlen($pswd)>30 || strlen($pswd)<5){
                                echo "Your Password must be within 5 to 30 characters long!";

                            }
                            else{
                                $pswd = md5($pswd);
                                $pswd2 = md5($pswd2);
                                echo "inserting to database....";
                                $result = mysql_query("INSERT INTO user values('','M','$fn','$ln','$em','$pswd','$d','$un','bio goes here','','')");
                                

                                if(mysql_errno())
                                {
                                    echo "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing <br>\n$query\n<br>";
                                }

                                //if($query->query($))
                                /*
                                if ($u_check->query($query) === TRUE) {
                                        echo "New record created successfully";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                    */

                                    die("<h2> Welcome to Jogajog  </h2>Login to your account to get started ...");

                                }
                            }
                        }
                        else{
                            echo "Your password don't match!";
                        }
                    }
                    else{
                        echo "Fill in all in the forms!";
                    }
                }
                else{
                    echo "Mail already taken!";
                }
            }
            else{
                echo "UserName don't match";
            }
        }
        else{
            echo "Mail Doesn't match......";
        }
        }

        if(isset($_POST['user_login']) && isset($_POST['password_login'])){
            $user_login = preg_replace('#A-Za-z0-9#i', '', $_POST["user_login"]);

            $password_login = preg_replace('#A-Za-z0-9#i', '', $_POST["password_login"]);
            $password_login_md5 = md5($password_login);
            $sql = mysql_query("SELECT user_id FROM user WHERE username = '$user_login' AND password='$password_login_md5' LIMIT 1");
            $userCount = mysql_num_rows($sql);
            if($userCount ==1)
            {
                while($row = mysql_fetch_array($sql)){
                    $user_id = $row["user_id"];
                }
                $_SESSION["user_login"] = $user_login;
                $_SESSION["user_id"] = $user_id;
                header("location: homepage.php");
                exit();

            }else{
                echo 'That information is incorrect, try again';
                exit();
            }
        }

        ?>

        <div style="width: 800px; margin: 0px auto 0px auto; align="center" ">
            <table>
                <tr>
                    <td width="60%" valign="top">
                        <h2>Already a Member? Sign in below!</h2>
                        <form action="index.php" method="POST">
                            <input type="text" name="user_login" size="25" placeholder = "Username"><br/><br/>
                            <input type="password" name="password_login" size="25" placeholder = "password"> <br/><br/>
                            <input type="submit" name="login" value="Login">
                        </form>
                    </td>
                    <td width="40%" valign=""top>
                        <h2>Sign Up Below...</h2>


                        <form action="#" method="POST">
                            <br><br>
                            <input type="text" name="fname" size="25" placeholder="First Name" /> <br><br>
                            <input type="text" name="lname" size="25" placeholder="Last Name" /><br><br>
                            <input type="text" name="username" size="25" placeholder="User Name" /><br><br>
                            <input type="text" name="email" size="25" placeholder="Email Address" /><br><br>
                            <input type="text" name="email2" size="25" placeholder="Enter Your Email Address Again" /><br><br>
                            <input type="password" name="password" size="25" placeholder="Password" /><br><br>
                            <input type="password" name="password2" size="25" placeholder="Enter password again" /><br><br>
                            <input type="submit" name="reg" size="25" placeholder="Sign Up!" /><br><br>

                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <?php include("inc/footer.inc.php"); ?>
