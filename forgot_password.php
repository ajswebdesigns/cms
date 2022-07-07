
This site has been acquired by Toptal
(Attention! API endpoint has changed)
Save New Duplicate & Edit Just Text1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
101
102
103
104
105
106
107
108
109
<?php include "./includes/db.php";?>
<?php include "includes/header.php";?>

<?php //require "./vendor/phpmailer/phpmailer/PHPMailerAutoload.php"?>
<?php require './vendor/autoload.php';?>
<?php require "./admin/classes/Config.php"?>

<?php require_once "./admin/functions.php"?>
<?php

if (!ifItIsMethod('get') && !isset($_GET['forgot)'])) {
//    header("Location: index");
}
if (ifItIsMethod('post')) {
    if (isset($_POST['email']));
    $email = $_POST['email'];
    $length = 50;
    $token = bin2hex(openssl_random_pseudo_bytes($length));

    if (email_exists($email)) {
        $stmt = mysqli_prepare($connection, "UPDATE users SET token = '{$token}' WHERE user_email = ? ");

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
//        Configure PHPMailer
        $mail = new PHPMailer();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = Config::SMTP_HOST; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = Config::SMTP_USER; //SMTP username
        $mail->Password = Config::SMTP_PASSWORD; //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = Config::SMTP_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->isHTML(true);
        $mail->setFrom('Andrew@damitdams.com');
        $mail->addAddress($email);
        $mail->Subject = 'This is a test';
        $mail->Body = 'And this is the email body';
        if ($mail->send()) {
            echo 'it was sent';
        } else {
            echo 'it was not sent';
        }

    } else {
        echo 'Something went wrong . mysqli_error($connection)';
    }
}

?>




<!-- Page Content -->
<div class="container">

	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">


							<h3><i class="fa fa-lock fa-4x"></i></h3>
							<h2 class="text-center">Forgot Password?</h2>
							<p>You can reset your password here.</p>
							<div class="panel-body">




								<form id="register-form" role="form" autocomplete="off" class="form" method="post">

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
											<input id="email" name="email" placeholder="email address" class="form-control"  type="email">
										</div>
									</div>
									<div class="form-group">
										<input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
									</div>

									<input type="hidden" class="hide" name="token" id="token" value="">
								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<hr>

	<?php include "includes/footer.php";?>

</div> <!-- /.container -->

Copied