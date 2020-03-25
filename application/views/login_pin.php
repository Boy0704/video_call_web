<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Video Call| Login</title>
        <base href="<?php echo base_url() ?>">
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/login/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/login/css/form-elements.css">
        <link rel="stylesheet" href="assets/login/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/login/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/login/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/login/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/login/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/login/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>APLIKASI</strong> Video Call To Lapas</h1>
                            <div class="description">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Silahkan Login</h3>
                                    <p>Masukkan PIN Anda di bawah ini:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">PIN ANDA</label>
                                        <input type="text" name="pin" placeholder="Pin Anda..." class="form-username form-control" id="pin" autocomplete="off" autofocus="">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div> -->
                                    <button id="btnLogin" class="btn">CALL SEKARANG!</button>
                                
                                <br>
                                

                                
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/login/js/jquery-1.11.1.min.js"></script>
        <script src="assets/login/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/login/js/jquery.backstretch.min.js"></script>
        <script src="assets/login/js/scripts.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#btnLogin').click(function() {
                    var pin = $('#pin').val();


                    if (pin != '') {

                        $.ajax({
                            url: 'web/cek_pin/'+pin,
                            type: 'GET',
                            dataType: 'json',
                        })
                        .done(function(a) {
                            console.log("success");
                            if (a.hasil == '1') {
                                swal("PIN Benar, Halaman Video Call Akan di aktifkan !", "You clicked the button!", "success");
                                window.location="web/vc/?pin="+a.pin;
                            } else if(a.hasil == '2') {
                                swal("PIN Sudah di gunakan, Silahkan Melakukan Pendaftaran Ulang untuk mendapatkan PIN !", "You clicked the button!", "warning");
                                $('#pin').val('');
                                $('#pin').focus();
                            } else if(a.hasil == '3') {
                                swal("Jadwal Anda :"+a.jadwal+" Silahkan Kunjungi Kami 5 Menit Sebelum Jadwal Anda !", "You clicked the button!", "info");
                                $('#pin').val('');
                                $('#pin').focus();
                            } else if(a.hasil == '4') {
                                swal("Waktu Anda Telah Lewat, Silahkan Mendaftar Kembali !", "You clicked the button!", "info");
                                $('#pin').val('');
                                $('#pin').focus();
                            } else {
                                swal("PIN Salah atau tidak ditemukan, Silahkan Melakukan Pendaftaran untuk mendapatkan PIN !", "You clicked the button!", "warning");
                                $('#pin').val('');
                                $('#pin').focus();
                            }
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {
                            console.log("complete");
                        });

                        
                    } else {
                        swal("PIN tidak boleh kosong !", "You clicked the button!", "info");
                    }
                    
                    

                    
                    
                });
            });
        </script>
        
        
        <!--[if lt IE 10]>
            <script src="assets/login/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>