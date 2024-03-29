<?php
include_once('dbConfig.php');
$bu = isset($_GET['bu']);
if ($bu == "") {
    $bu = 1;
}
#$open = exec("python /var/www/html/flask_to_open_servo.py ");

#$myfile = fopen("magnetic.txt", "w");
#$msg = '1';

#fwrite($myfile ,$msg."\n");
#fclose($myfile);
$data = array(
  'message' => 'sensor'
);

#// URL of the Flask server
$url = 'http://localhost:5000/receive';

// Initialize cURL
$curl = curl_init($url);

// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// Send the request and store the response
$response = curl_exec($curl);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vending Machine</title>
    <link rel="icon" href="/pic/logo-title1.png" type="image/icon type" />

    <link href="style.css" type="text/css" rel="stylesheet" />

    <audio autoplay>
        <source src="/sound/sound-intro.mp3" type="audio/mp3">
    </audio>
</head>

<body>
    
    <nav>
    <div class="slider">
      <figure>

        <?php 
        $query = mysqli_query($db, "SELECT * FROM ad_info WHERE status = '1'");

        while ($row = mysqli_fetch_array($query)) {
            $imageURL = $row['ad_img'];
        ?>

      <div class="nav-container">
          <img class="banner-header-img" src="<?=$imageURL?>">
        </div>

        <?php 
        }
        ?>
      </figure>
    </div>
  </nav>

    <div class="banner-add">
        <div class="banner-add-home">
            <img class="banner-add-img" src="/pic/b1.png" />
        </div>
    </div>

    <div class="text-container-title">
        <div class="text-title">
            <h1>" Touch to Start "</h1>
            <h1 id="index_title"></h1>
        </div>

        <div class="button-title">
            <a id="index_button1" class="button-title-pay" href="/home.php?bu=<?= $bu ?>"></a>
            <a id="index_button2" class="button-title-point" href="/phone_points.php?bu=<?= $bu ?>"></a>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-button-logo">
                <div class="footer-button">
                    <p id="index_language" class="button-text"></p>
                    <div id="myDIV">
                        <button class="buttonTHEN active" onclick="changeLanguage('th')">ไทย</button>
                        <button class="buttonTHEN " onclick="changeLanguage('en')">Eng</button>
                    </div>
                </div>

                <div class="foorter-logo">
                    <img src="/pic/school-of-engineering.png" class="logo-university" />
                </div>
            </div>
        </div>
    </footer>

</body>

<!-- Script สำหรับภาษา -->
<script src="script.js"></script>
<script>
    function changeLanguage(lang) {

        const index_title = document.getElementById('index_title');
        const index_button1 = document.getElementById('index_button1');
        const index_button2 = document.getElementById('index_button2');
        const index_language = document.getElementById('index_language');

        if (lang === 'th') {

            index_title.innerText = 'กรุณากดหน้าจอเพื่อสั่งสินค้า';
            index_button1.innerText = ' สั่งซื้อสินค้า ';
            index_button2.innerText = ' คะเเนนสะสม ';

            index_language.innerText = 'ภาษา';

        } else if (lang === 'en') {

            index_title.innerText = 'Press the screen to order';
            index_button1.innerText = 'Place an order';
            index_button2.innerText = 'Reward points';

            index_language.innerText = 'Language';

        }
        // บันทึกภาษาที่เลือกในคุกกี้
        document.cookie = `lang=${lang}; path=/`;
    }

    function getLanguage() {
        // อ่านค่าภาษาที่เลือกจากคุกกี้
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            if (cookie.startsWith('lang=')) {
                return cookie.substring(5);
            }
        }
        // ถ้าไม่มีคุกกี้ภาษา ให้ใช้ภาษาเริ่มต้น (ภาษาไทย)
        return 'th';
    }

    window.addEventListener("load", function() {
        const lang = getLanguage();
        changeLanguage(lang);
    });
</script>
<!-- Script สำหรับภาษา -->

</html>
