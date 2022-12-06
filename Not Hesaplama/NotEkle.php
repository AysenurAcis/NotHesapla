<?php
    session_start();
    if(!isset($_SESSION['valid']) || !$_SESSION['valid']){
        header("Location: index.php");
    }

    if (isset($_POST['hesapla'])){
        $_SESSION['ata-160']   = $_POST['ata-160'];
        $_SESSION['ing-101']   = $_POST['ing-101'];
        $_SESSION['mat-173']   = $_POST['mat-173'];
        $_SESSION['bpr-223']   = $_POST['bpr-223'];
        header("Location: NotHesapla.php");
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
                grid-template-columns: auto 200px;
                margin: 10px;
            }
            span {
                line-height: 40px;
            }
            .field {
                border-radius: 10px;
                border: 2px solid #adadad;
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
            .footer-text {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h2>Genel Not Ortalaması Hesaplama Modülü</h2>
            <form role="form" method="post">
                <label>
                    <span>ATA-160 Atatürk İlkeleri ve İnkılap Tarihi I</span>
                    <input type="number" class="field" name="ata-160" min="0" max="100" required>
                </label>
                <label>
                    <span>ING-101 İngilizce I</span>
                    <input type="number" class="field" name="ing-101" min="0" max="100" required>
                </label>
                <label>
                    <span>MAT-173 Kalkülüse Giriş</span>
                    <input type="number" class="field" name="mat-173" min="0" max="100" required>
                </label>
                <label>
                    <span>BPR-223 İnternet Programcılığı - 1</span>
                    <input type="number" class="field" name="bpr-223" min="0" max="100" required>
                </label>
                <button type="submit" class="btn" name="hesapla">Hesapla</button>
                <br>
            </form>
            <p class="footer-text"><?php echo "Sistem Giriş Saati ".$_SESSION['loginTime']?></p>
        </div>
    </body>
</html>