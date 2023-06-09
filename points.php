<?php 
 include_once('dbConfig.php');
 $bu = $_GET['bu'];
 $u_id = $_GET['u_id'];
 $querys = mysqli_query($db, "SELECT * FROM user WHERE u_id = '$u_id'");
 $ruser = mysqli_fetch_array($querys);
 $query = mysqli_query($db,"SELECT * FROM vm_info WHERE vm_id = '$bu'");
 $vm_name = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-widtp> h>, initial-scale=1.0">
    <title>Vending Machine</title>
    <link rel="icon" href="/pic/logo-title1.png" type="image/icon type">

    <link href="/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <body>
    <header>
      <div class="header-container">
          <a class="logo-header-text"  href="/index.php">สาขา <?=$vm_name['vm_name']?></a>
          <a href="/admin_login.php">
              <img src="/pic/logo.png" class="logo-header-img">
          </a>
      </div>
    </header>

    <nav>
      <div class="slider">
          <figure>
              <div class="nav-container">
                  <img class="banner-header-img" src="/pic/bn1.png"> 
             </div>

              <div class="nav-container">
                  <img class="banner-header-img" src="/pic/bn2.png"> 
             </div>

              <div class="nav-container">
                  <img class="banner-header-img" src="/pic/bn3.png"> 
             </div>

             <div class="nav-container">
                  <img class="banner-header-img" src="/pic/bn4.png"> 
             </div>

          </figure>
      </div>
  </nav>

  <div class="banner-add">
    <div class="banner-add-home">
      <img class="banner-add-img" src="/pic/b1.png">
    </div>
  </div>

    <div class="text-container">
      <div class="text-icon-point">
        <div class="text-icon">
          <div class="text">
            <p> 1.เลือกรายการสินค้า</p>
          </div>
  
          <div class="icon">
            <i class="fa-solid fa-circle-chevron-right"></i>
          </div>
  
          <div class="text">
            <p>2.เลือกวิธีชำระเงิน</p>
          </div>
  
          <div class="icon">
            <i class="fa-solid fa-circle-chevron-right"></i>
          </div>
  
          <div class="text">
            <p>3.รับสินค้า</p>
          </div>
        </div>

        <div class="point-text">
          <a class="logo-point"  href="/phone_points.php?bu=<?=$bu?>">คะเเนนสะสม</a>
        </div>

      </div>
    </div>

    <div class="container-all">
        <div class="container-all-back-closed">
            <div class="container-all-back">
                <a class="logo-back"  href="/home.php?bu=<?=$bu?>">ย้อนกลับ</a>
            </div>

            <div class="container-all-closed">
                <a class="fa-solid fa-circle-xmark" href="/home.php?bu=<?=$bu?>"
                   style="text-decoration: none; color: #383838;" ></a>
            </div>
        </div>

        <div class="container-product">
            <div class="text-number-all">
                <div class="text-name-number1" >
                      <p class="text-number1">หมายเลขโทรศัพท์</p>
                      <p class="text-number2"><?=$ruser['phone']?></p> 
                </div>

                <hr>

                <div class="text-name-number2">
                    <div class="text-name-number-all">
                        <div class="text-name-left">
                            <p class="text-number3"><?=$ruser['points']?></p>
                            <p class="text-number1">คะเเนนสะสม</p>
                        </div>

                        <div class="text-name-right">
                            <p class="text-number2"><?=$ruser['balance']?></p>
                            <p class="text-number1">เครดิตเงินเกิน</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    

        <div class="container-product">
            <div class="button-all-points">
                <div class="button-left-right">
                    <div class="button-left">
                        <a class="button-all-left" href="/index.php?bu=<?=$bu?>">ยกเลิก</a>
                    </div>
        
                    <div class="button-right">
                        <a class="button-all-right" href="/home.php?bu=<?=$bu?>&u_id=<?=$u_id?>">สั่งสินค้า</a>
                    </div>
                </div>
            
            </div>
        </div>

    </div>
        

    <footer>
        <div class="footer-container">
          <div class="footer-button-logo">
              <div class="footer-button">
                <p class="button-text">เลือกภาษา</p>
                <button class="button-thai">ไทย</button>
                <button class="button-eng">Eng</button>
              </div>
    
              <div class="foorter-logo">
                <img src="/pic/school-of-engineering.png" class="logo-university">
              </div>
          </div>
          
        </div>
      </footer>


  </body>
</html>