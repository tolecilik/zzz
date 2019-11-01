<?php
session_start();
require_once'backend.php';
date_default_timezone_set('Asia/Jakarta');
$tombol=$_POST['request'];
$no=$_POST['nomer'];
$otp=$_POST['otp'];
  if(isset($tombol))
    {
      if($tombol=='Get Otp')
          {
            $uro='https://otp-service.apps.dp.xl.co.id/v1/generate/'.$no.'/MYXLAPP_LOGIN_ID';
            $hro=[
                   'origin: http://localhost:9634',
                   'x-apicache-bypass: true',
                   'authorization: Basic ZGVtb2NsaWVudDpkZW1vY2xpZW50c2VjcmV0',
                   'content-type: application/json',
                   'accept: application/json, text/plain, */*',
                   'cache-control: no-cache',
                   'user-agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.157 Mobile Safari/537.36',
                   'referer: http://localhost:9634/login',
                   //accept-encoding: gzip, deflate
                   'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
                   'x-requested-with: id.co.xl.myXL'
                 ];
            $jro=['test'=>'""'];
            $dro=json_encode($jro);
            $rro=request($uro,$dro,$hro,null);
            $getmessage=json_decode($rro,true);
            if($getmessage['statusCode']=='200')
                  {
                    $msg='Kode otp telah dikirim ke '.$no;
                  }
            else{ $msg= 'Error code '.$getmessage['statusCode'];}
          }
      else if($tombol=='login')
          { // u= url , d= data , h= header
            $ulog='login-controller-service.apps.dp.xl.co.id/v1/login/otp/auth?msisdn='.$no.'&imei=d4e7f273-abb0-4128-8671-430372103258&otp='.$otp.'&channel=MYXLAPP_LOGIN_ID';
            $dlog='';
            $hlog=[
                    'h2',
                    'accept: application/json, text/plain, */*',
                    'cache-control: no-cache',
                    'origin: http://localhost:9634',
                    'x-apicache-bypass: true',
                    'authorization: Basic ZGVtb2NsaWVudDpkZW1vY2xpZW50c2VjcmV0',
                    'user-agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.157 Mobile Safari/537.36',
                    'referer: http://localhost:9634/login',
                    //'accept-encoding: gzip, deflate',
                    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
                    'x-requested-with: id.co.xl.myXL'
                  ];
             $rlog=requestc($ulog,$dlog,$hlog,'GET',null);
             $jlog=json_decode($rlog,true);
            if($jlog['statusMessage']=='OK') 
            $_SESSION['user']=[
                 $jlog,
                 $no,
                 $date,
                 $tgl
             ];
             $msg="Loading...";
             header("refresh:5;url=register-paket.php");
               
          }
      
    ;}
//proses
$filecounter=("counter.txt");
$kunjungan=file($filecounter);
$kunjungan[0]++;
$file=fopen($filecounter,"w");
fputs($file,"$kunjungan[0]");
fclose($file);
?>
<!DOCTYPE html>
<html lang="en">

<head>

<body background =' # 'bgcolor='black'>


<style>body{cursor: url(), progress !important;background:black repeat center;color:lime;} .kotak{text-align:center;background:transparant;border:solid lime
2px;border-radius:10px;position:fixed;top:2px;left:2px;left:1px;right:1px;}.kotak1{text-align:center;background:transparant;border:solid lime 2px;border-radius:10px;position:fixed;bottom:2px;left:1px;right:1px;}</style><br/><br/>


<div class="kotak">••••• Zona Red •••••</div><div class="kotak1"><blink>|"Dev By Rizred Vlo 7zer0✬"|</blink></div></center>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="dor-telcom">
  <meta name="author" content="h">

  <title>Dor-Telcom</title>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="icon.png">
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <script type='text/javascript' src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body class="bg-gradient-primary">
<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Dor XL</h1>
                </div>
                <form class="user"method="post"action="">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user"name="nomer" placeholder="Enter your number XL..."value="<?php if(isset($_POST["request"])){echo $no;};?>"required>
                  </div>
                        <div class="form-group">
                          <input type="submit"name="request" class="btn btn-secondary btn-lg btn-block"value="Get Otp">
                        </div><br>
                  
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user"name="otp" placeholder="Enter your otp..."autocomplete="off">
                  </div>
                  <div class="form-group">
                  <input type="submit"name="request" class="btn btn-secondary btn-lg btn-block"value="login">
                  </div>
                
                <hr>
                <div class="text-center">
                    <small>
                         Pengunjung: <?=
                        $kunjungan[0];
                         ?>
                    </small>
                </div>
                <hr>
                <div class="text-center">
                    <?php if(isset($_POST["request"])){
                   echo "<div class='alert alert-primary' role='alert'>"
                           .$msg.
                        "</div>";};?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

<font color="red">@copyright by Rizred Vlo 7zer0✬

  </div>

</div>
<!-- Bootstrap core JavaScript-->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/assets/js/sb-admin-2.min.js"></script>

</body>

</html>