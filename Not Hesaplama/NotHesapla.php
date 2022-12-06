<?php
    session_start();
    if(!isset($_SESSION['valid']) || !$_SESSION['valid']){
        header("Location: index.php");
    }

    if(isset($_GET["logout"])) {
        session_start();
        session_destroy();
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        $_SESSION['valid'] = false;
        header("Location: index.php");
    }

    $ata160 = $_SESSION['ata-160'];
    $ing101 = $_SESSION['ing-101'];
    $mat173 = $_SESSION['mat-173'];
    $bpr223 = $_SESSION['bpr-223'];

    $ortalama = ($ata160 + $ing101 + $mat173 + $bpr223) / 4;

    if($ortalama >= 88 && $ortalama <= 100 ){
        $harfNotu = "AA";
        $katSayi = "4.00";
    }
    else if($ortalama >= 81 && $ortalama <= 87 ){
        $harfNotu = "BA";
        $katSayi = "3.50";
    }
    else if($ortalama >= 74 && $ortalama <= 80 ){
        $harfNotu = "BB";
        $katSayi = "3.00";
    }
    else if($ortalama >= 67 && $ortalama <= 73 ){
        $harfNotu = "CB";
        $katSayi = "2.50";
    }
    else if($ortalama >= 60 && $ortalama <= 66 ){
        $harfNotu = "CC";
        $katSayi = "2.00";
    }
    else if($ortalama >= 53 && $ortalama <= 59 ){
        $harfNotu = "DC";
        $katSayi = "1.50";
    }
    else if($ortalama >= 46 && $ortalama <= 52 ){
        $harfNotu = "DD";
        $katSayi = "1.00";
    }
    else if($ortalama >= 39 && $ortalama <= 45 ){
        $harfNotu = "FD";
        $katSayi = "0.50";
    }
    else if($ortalama >= 0 && $ortalama <= 38 ){
        $harfNotu = "FF";
        $katSayi = "0.00";
    }
    else {
        $harfNotu = "--";
        $katSayi = "-.--";
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
                position     : absolute;
                top          : 50%;
                left         : 50%;
                transform    : translate(-50%,-50%);
                width        : 50%;
                background   : white;
                border-radius: 10px;
                padding: 10px;
            }
            .card h2{
                text-align   : center;
                padding      : 0 0 20px 0;
                border-bottom: 1px solid silver;
            }
            label {
                display: grid;
                gap: 10px;
                grid-template-columns: auto 100px;
                margin: 10px;
            }
            span {
                line-height: 40px;
            }
            b{
                padding: 10px;
            }
            .footer-text {
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div class="card">
        <h2>Genel Not Ortalaması Hesaplama Modülü</h2>
        <label>
            <span>ATA-160 Atatürk İlkeleri ve İnkılap Tarihi I</span>
            <b><?php echo $ata160 ?></b>
        </label>
        <label>
            <span>ING-101 İngilizce I</span>
            <b><?php echo $ing101 ?></b>
        </label>
        <label>
            <span>MAT-173 Kalkülüse Giriş</span>
            <b><?php echo $mat173 ?></b>
        </label>
        <label>
            <span>BPR-223 İnternet Programcılığı - 1</span>
            <b><?php echo $bpr223 ?></b>
        </label>
        <hr>
        <label>
            <span>Ortalama Not:</span>
            <b><?php echo $ortalama ?></b>
        </label>
        <label>
            <span>GNO:</span>
            <b><?php echo $katSayi ?></b>
        </label>
        <label>
            <span>GNO Harf Karşılığı:</span>
            <b><?php echo $harfNotu ?></b>
        </label>
        <hr>
        <label> <a href="NotEkle.php">Tekrar Hesapla</a>
        <a href="?logout"">Çıkış Yap</a></label>
        <p class="footer-text"><?php echo "Sistem Giriş Saati ".$_SESSION['loginTime']?></p>
    </div>
    </body>
</html>