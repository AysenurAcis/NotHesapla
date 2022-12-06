<?php
    session_start(); // Session başlatılır
    date_default_timezone_set("Turkey"); // Tarih formatı Türkiye'ye göre atanır
    $msg = "";
    if (isset($_POST['login'])){   //Post metoduyla gelen login parametresini varlığı kontrol edilir
        if ($_POST['username'] == 'bpr' && $_POST['password'] == '123') {   //Post metoduyla gelen username-password doğruluğu kontrol edilir
            $_SESSION['username']   = 'bpr';                // Sessiona kullanıcı adı kaydedilir
            $_SESSION['loginTime']  = date("H:i");   // Sessiona giriş saati kaydedilir
            $_SESSION['valid']      = true;                 // Sessiona giriş kontrolü için kullanılacak valid değeri kaydedilir
            header("Location: NotEkle.php");         // Sayfa yönlendirmesi yapılır
        } else {
            $msg = 'Kullanıcı Bilgileri Hatalı';            // Kullanıcı adı şifre hatalıysa uyarı mesajı gönderilir
        }
    }
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Not Ortalaması Hesaplama</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                margin     : 0;
                padding    : 0;
                font-family: montserrat, serif;
                background: linear-gradient(120deg,#2980b9,#8e44ad);
                height: 100vh;
                overflow: hidden;
            }
            .card{
                position        : absolute;
                top          : 50%;
                left         : 50%;
                transform    : translate(-50%,-50%);
                width        : 400px;
                background   : white;
                border-radius: 10px;
                padding: 10px;
            }
            .card h2{
                text-align   : center;
                padding      : 0 0 20px 0;
                border-bottom: 1px solid silver;
            }
            .error-message{
                margin: 10px;
                color: red;
            }
            .field{
                position: relative;
                height: 30px;
                width: calc(100% - 40px);
                border-radius: 10px;
                border: 2px solid #adadad;
                margin: 10px;
                padding: 10px;
            }
            .btn{
                position: relative;
                height: 50px;
                width: calc(100% - 18px);
                border-radius: 10px;
                border: none;
                margin: 10px;
                color: #ffffff;
                background-color: #2980b9;
            }
        </style>
    </head>
    <body>
    <div class="card">
        <h2>Giriş Ekranı</h2>
        <p class="error-message"><?php echo $msg ?></p>
        <div>
            <form role="form" method="post">
                <input   type="text"     class="field" name="username" placeholder="Kullanıcı Adı" required><br>
                <input   type="password" class="field" name="password" placeholder="Parola" required><br>
                <button  type="submit"   class="btn"   name="login">GİRİŞ</button>
                <br>
            </form>
        </div>
    </div>
    </body>
</html>