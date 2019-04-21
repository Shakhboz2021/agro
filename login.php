<?php
include('db_connect.php');
$query = "CALL `getViloyatlar`()";
$results = $db->query($query);
?>
    <!DOCTYPE html>
    <html lang="en" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="images/icon.png">
        <title>Реестр </title>

        <link href="css/lib/owl.carousel.min.css" rel="stylesheet"/>
        <link href="css/lib/owl.theme.default.min.css" rel="stylesheet"/>
        <!-- Bootstrap Core CSS -->
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
        <!--[if lt IE 9]>
        <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <script>
        function getFilial(val) {
            $.ajax({
                type: "POST",
                url: "getFilial.php",
                data: 'vil_id=' + val,
                success: function (data) {
                    $("#filial-list").html(data);
                    getCity();
                }
            });
        }

        function check(value) {
            if (value.length === 9) {
                document.getElementById("ButtonCheck").disabled = false;
                document.getElementById("ButtonCheck").style.cursor = 'pointer';
            }
        }

        function getInfo() {

            let setCaptcha = document.getElementById('captcha').innerText;
            let enteredCaptcha = document.getElementById('captchaInfo').value;
            if (enteredCaptcha.length === 0) {
                alert('Tekshirish kodini kiriting')
            } else {
                if (setCaptcha === enteredCaptcha) {
                    alert('Check info by INN from database');
                } else {
                    alert('Tekshirish kodi noto\'g\'ri');
                }
            }


        }

        function setCaptcha() {
            var captcha = Math.floor((Math.random() * 100000) + 9999);
            document.getElementById('captcha').innerHTML = captcha;
        }
    </script>

    <body>

    <div class="login-bg2 h-100"
         style=" background-image: url('images/1.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
        <div class="container-fluid h-100">
            <div class="row justify-content-between h-100">
                <div class="col-xl-4">

                </div>
                <div class="col-xl-3 p-0">
                    <div class="form-input-content login-form bg-white">
                        <div>
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="#">
                                        <img src="images/login.png" alt="Uzfk">
                                    </a>
                                </div>
                                <h4 class="text-center mt-4">ФEРМEР ХЎЖАЛИКЛАРИ АХБОРОТ МАРКАЗИ</h4>
                                <form action="server.php" method="post">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Вилоят</label>
                                                <select name="viloyatc" class="form-control"
                                                        onChange="getFilial(this.value);">
                                                    <option value disabled selected>Вилоятни номи</option>
                                                    <?php foreach ($results as $viloyat) { ?>
                                                        <option value="<?php echo $viloyat["vil_id"]; ?>">
                                                            <?php echo $viloyat["viloyat"]; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">


                                                <label>Филиал</label>
                                                <select name="filialc" id="filial-list" class="form-control">
                                                    <option value="">Филиални номи</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label></label>
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="Фойдаланувчи"
                                                   name="staff_login">
                                        </div>
                                        <div class="form-group">

                                            <input type="password" class="form-control" placeholder="Пароль"
                                                   name="staff_password">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="submit">
                                        КИРИШ
                                    </button>
                                </form>
                                <div class="check-info-parent">
                                    <button class="check-info" data-toggle="modal" data-target='#checkInfo'>
                                        Ma'lumotlarni tekshirish
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="checkInfo" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content myModal">
                                            <p class="title">Ma'lumotlaringizni tekshiring</p>
                                            <input type="text" placeholder="INN raqamingizni kitiring" id="innInfo"
                                                   onkeyup="check(this.value)"
                                                   onchange="this.value=this.value.replace(/[^\d]/,'')" maxlength="9"
                                                   class="form-control" autofocus onfocus="setCaptcha()">
                                            <p class="captcha" id="captcha"></p>
                                            <input type="text" placeholder="Yuqoridagi raqamni kitiring"
                                                   id="captchaInfo" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                   maxlength="6" class="form-control">
                                            <button id="ButtonCheck" onclick="getInfo()" class="btn-info checkButton"
                                                    disabled>Tekshirish
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!--    <div class="container-fluid">-->
    <!--        <div class="row">-->
    <!--            <div class="col-xl-1">-->
    <!--            </div>-->
    <!--            <div class="card">-->
    <!--                Янгликлар ҳақида қисқача маълумот-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <div style="position: absolute;
  bottom: 20px;
  left: 25%;">
        © 2018 - 𝕆'ℤ𝔹𝔼𝕂𝕀𝕊𝕋𝕆ℕ 𝔽𝔼ℝ𝕄𝔼ℝ,𝔻𝔼𝕏ℚ𝕆ℕ 𝕏𝕆'𝕁𝔸𝕃𝕀𝕂𝕃𝔸ℝ𝕀 𝕍𝔸 𝕋𝕆𝕄𝕆ℝℚ𝔸 𝕐𝔼ℝ 𝔼𝔾𝔸𝕃𝔸ℝ𝕀
        𝕂𝔼ℕ𝔾𝔸𝕊ℍ𝕀
    </div>
    </body>

    </html>
<?php include('footer-js.php'); ?>