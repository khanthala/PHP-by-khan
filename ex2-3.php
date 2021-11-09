
<!--ຮັບຄ່າຈາກຟ້ອມ--->
<?php

    if(isset($_POST['btnCal'])){
        if(empty($_POST['customer'])){
            $error_cus ="<span style ='color: red'; >ກະລຸນາປ້ອນຊື່ </span>";
        }else{
            $customer =$_POST['customer'];
        }

        if(empty($_POST['price'])){
             $error_price ="<span style ='color: red'; >ກະລຸນາປ້ອນລາຄາສີນຄ້າທັງໝົດ </span>";
        }else{
            $price = $_POST['price'];
        }


    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotion Discount</title>
</head>
<body>
    <!--ສ້າງຟ້ອມ---->
    
    <form action="" method="post">
     ຊື່ລູກຄ້າ  <input type="text" name="customer" value="<?=@$customer ?>" placeholder="ປ້ອນຊື່ລູກຄ້າ"><?=@$error_cus ?><br>
     ຊື່ລູກຄ້າທັງໝົດ <input type="text" name="price" value="<?=@$price ?>" placeholder="ປ້ອນຊື່ລູກຄ້າທັງໝົດ"><?=@$error_price ?><br>
     <input type="submit" name="btnCal" value="ຄຳນວນ">
     <button onclick="window.location.reload(true">ໂຫຼດຄື່ນໃໝ່</button>
    </form>

    <!--ຄຳນວນພ້ອມສະແດງຄ່າກ້ອງຟ້ອມ--->
    <?php
        if(isset($_POST['btnCal']) && empty($error_cus) && empty($error_price)){
            //ຄຳນວນ % ສວນຫຼຸດ 
            if($price <= 100000){
                $percent = 2;
            }else if ($price <= 200000){
                $percent = 3;
            } else if ($price <= 400000){
                $percent = 5;
            }else {
                $percent = 7;
            }

            //ຄຳນວນຫາສວນຫຼຸດ ແລະ ລາຄາທີ່ຕ້ອງຈ່າຍ
            $discount = $price * $percent / 100;
            $pay = $price - $discount;

            echo "ຊື່ລູກຄ້າ             :  .$customer <br> ";
            echo "ລາຄາທັງໝົດ         : ".number_format($price, 2) ." kip <br>";
            echo "ຮັບສວນຫຼຸດ$percent% :".number_format($discount , 2) ." kip <br>";
            echo "ລາຄາທີ່ຕ້ອງຈ່າຍ       :".number_format($pay , 2) ." kip ";
        }

    ?>



</body>
</html>