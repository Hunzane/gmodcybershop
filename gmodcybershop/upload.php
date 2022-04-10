<?php
require ('./assets/php/steamauth/steamauth.php');
require ('./config.php');

if(isset($_SESSION['steamid'])) {
    $conn = new mysqli($servername, $username, $password, $db_name);
    $conn->set_charset("utf8");
    
    $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $uid = $rowa['id'];
    }
    $sql = "SELECT * FROM `uploads` WHERE `author`='$uid'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $upid = $rowa['id'];
    }
if(!$upid == ''){} else {
?>
<html>
<head>
    <title>Загрузить аддон | GmodCyberShop</title>
    <script src="./assets/js/upload.js"></script>
</head>
<body>
<style>
    body{
        background: #212121;
    }
    .gryadka1-1{
        text-align: center;
        font-size: 25px;
        height: 40px;
    }
    .gryadka1-0{
        height: calc(100% - 40px);
        width: 100%;
        font-size: 18px;
        overflow-x: hidden;
        overflow-y: auto;
        text-align: center;
    }
    ::-webkit-scrollbar {
		width: 7px;
	}
	::-webkit-scrollbar {
		background: transparent;
		width: 2px;
		height: 7px;
		border-radius: 5px;
	}
	::-webkit-scrollbar-thumb {
		background-color: #555;
		box-shadow: inset 0 0 2px #333;
		border-radius: 5px;
	}
	::-webkit-scrollbar-corner {
		background: transparent;
		border-radius: 5px;
	}
    ::-webkit-input-placeholder {
        color: gray;
    }
    :-moz-placeholder {
       color: gray;
       opacity:  1;
    }
    ::-moz-placeholder {
       color: gray;
       opacity:  1;
    }
    :-ms-input-placeholder {
       color: gray;
    }
    ::-ms-input-placeholder {
       color: gray;
    }
    ::placeholder {
       color: gray;
    }
    .gridka{
        display: grid;
        grid-template-columns: 1fr 320px;
        width: 100%;
        height: 500px;
    }
    .addonnmae{
        color: darkgray;
        text-align: left;
    }
    .addonnmae input{
        padding: 5px;
        background: #212121;
        color: darkgray;
        font-size: 20px;
        width: 100%;
        border: none;
    }
    .gridka-2{
        height: 100%;
        border-left: 2px solid #181818;
        position: relative;
    }
    .gridka-2 img{
        width: 300px;
        height: 169px;
    }
    .gridka-1{
        padding: 5px;
    }
    .gridka-1-1{
        width: 100%;
        height: 300px;
        background: #181818;
        border-radius: 10px;
        position: relative;
    }
    .gridka-1-1 img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .gridka-1-2{
        margin-top: 10px;
        width: 100%;
        height: 180px;
        background: #181818;
        border-radius: 10px;
        overflow-y: hidden;
        overflow-x: hidden;
    }
    .gridka-1-2-1{
        width: calc(100vw - 355px);
        overflow-y: hidden;
        overflow-x: hidden;
    }
    .gridka-1-2-1-1{
        padding: 5px;
        display: grid;
        grid-template-columns: repeat(10, 275px);
        grid-template-rows: 155px;
        grid-column-gap: 10px;
        overflow-y: hidden;
        overflow-x: scroll;
        position: relative;
    }
    .gridka-1-2-1-1 img{
        width: 100%;
        height: 100%;
        border-radius: 7px;
    }
    .imgupload{
        width: 275px;
        height: calc(100% - 10px);
        border-radius: 7px;
        opacity: 0;
        position: absolute;
        overflow-y: hidden;
        overflow-x: hidden;
    }
    .mainimgupload{
        width: 100%;
        height: 100%;
        border-radius: 7px;
        opacity: 0;
        position: absolute;
        overflow-y: hidden;
        overflow-x: hidden;
    }
    textarea{
        background: #181818;
        border: none;
        padding: 10px;
        border-bottom: 2px solid gray;
        color: darkgray;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        font-size: 20px;
        width: calc(100% - 30px);
        resize: none;
        height: 200px;
    }
    .publish button{
        padding: 10px;
        font-size: 25px;
        background: #181818;
        color: white;
        border-radius: 10px;
        border:none;
    }
    .cena input{
        padding: 5px;
        background: #212121;
        color: darkgray;
        font-size: 20px;
        width: 100%;
        border: none;
        border-bottom: 1px solid gray;
    }
    .logoimgupload{
        position: absolute;
        width: 300px;
        height: 169px;
        opacity: 0;
    }
    .error{
        position: absolute;
        bottom: 0;
        width: calc(100% - 15px);
        height: 30px;
        background: darkred;
        color: white;
        font-size: 20px;
        text-align: center;
        padding-top: 5px;
    }
</style>
<form action="./upload.php" method="post" enctype="multipart/form-data">
<div class="gryadka1-0">
    <div class="addonnmae" style="border-bottom: 2px solid gray"><input id="name" name="name" maxlength="50" type="text" placeholder="Название аддона"></div>
    <div class="gridka">
    <div class="gridka-1">
        <div class="gridka-1-1">
            <input class="mainimgupload" name="image1" type="file" id="uploadImage1" onchange="PreviewImage('1')">
            <img src="./assets/img/prew.png" id="uploadPreview1">
        </div>
        <div class="gridka-1-2">
            <div class="gridka-1-2-1">
                <div class="gridka-1-2-1-1">
                    <div><input class="imgupload" name="image2" type="file" id="uploadImage2" onchange="PreviewImage('2')"><img id="uploadPreview2" src="./assets/img/prew.png"></div>
                    <div><input class="imgupload" name="image3" type="file" id="uploadImage3" onchange="PreviewImage('3')"><img id="uploadPreview3" src="./assets/img/prew.png"></div>
                    <div><input class="imgupload" name="image4" type="file" id="uploadImage4" onchange="PreviewImage('4')"><img id="uploadPreview4" src="./assets/img/prew.png"></div>
                    <div><input class="imgupload" name="image5" type="file" id="uploadImage5" onchange="PreviewImage('5')"><img id="uploadPreview5" src="./assets/img/prew.png"></div>
                    <div><input class="imgupload" name="image6" type="file" id="uploadImage6" onchange="PreviewImage('6')"><img id="uploadPreview6" src="./assets/img/prew.png"></div>
                    <div><input class="imgupload" name="image7" type="file" id="uploadImage7" onchange="PreviewImage('7')"><img id="uploadPreview7" src="./assets/img/prew.png"></div>
                    <div><input class="imgupload" name="image8" type="file" id="uploadImage8" onchange="PreviewImage('8')"><img id="uploadPreview8" src="./assets/img/prew.png"></div>
                    <div><input class="imgupload" name="image9" type="file" id="uploadImage9" onchange="PreviewImage('9')"><img id="uploadPreview9" src="./assets/img/prew.png"></div>
                    <div><input class="imgupload" name="image10" type="file" id="uploadImage10" onchange="PreviewImage('10')"><img id="uploadPreview10" src="./assets/img/prew.png"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="gridka-2">
        <input class="logoimgupload" name="image0" type="file" id="uploadImage0" onchange="PreviewImage('0')">
        <img src="./assets/img/prew.png" id="uploadPreview0">
        <div class="cena"><input id="price" type="text" name="price" placeholder="Цена" maxlength="10"></div>
        <div class="addon" style="color: darkgray;">Аддон: <input name="addon" type="file"></div>
            <br>
        <div class="publish"><button name="publish">ОПУБЛИКОВАТЬ</button></div>
    </div>
    </div>
    <div class="addonnmae"><textarea type="text" name="desc" id="desc" placeholder="Описание (не более 1000 символов)" maxlength="1000"></textarea></div>
</div>
</form>
</body>
</html>

<?php

    if(isset($_POST["publish"])){
        $sql = "SELECT * FROM `uploads` WHERE `author`='$uid'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $upid = $rowa['id'];
        }
    if($upid == ''){
        if(isset($_FILES["addon"])){
            if(isset($_POST["name"])){
                if(isset($_POST["price"])){
                    if(isset($_POST["desc"])){
                        if(isset($_FILES["image0"])){
                            if(isset($_FILES["image1"])){
                                
                                if ($_FILES['addon']['size'] <= 15728640){
                                    if ($_FILES['image0']['size'] <= 2097152){
                                        if ($_FILES['image1']['size'] <= 2097152){
                                            
                                            $error = 0;
                                            $valid_format = array("jpg, png, webp, ico, jpeg");
                                            
                                            if(isset($_FILES["image0"])){ 
                                                $format = end(explode(".", $_FILES['image0']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image1"])){ 
                                                $format = end(explode(".", $_FILES['image1']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image2"])){ 
                                                if ($_FILES['image2']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image2']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image3"])){ 
                                                if ($_FILES['image3']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image3']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image4"])){ 
                                                if ($_FILES['image4']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image4']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image5"])){ 
                                                if ($_FILES['image5']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image5']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image6"])){ 
                                                if ($_FILES['image6']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image6']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image7"])){ 
                                                if ($_FILES['image7']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image7']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image8"])){ 
                                                if ($_FILES['image8']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image8']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image9"])){ 
                                                if ($_FILES['image9']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image9']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            if(isset($_FILES["image10"])){ 
                                                if ($_FILES['image10']['size'] <= 2097152){} else { $error = 1; } 
                                                $format = end(explode(".", $_FILES['image10']["name"]));
                                                if (in_array($format, $valid_format)){ $error = 2; }
                                            }
                                            
                                            if($error == '1'){ echo('<div class="error">Вес каждого скриншота не должен превышать 2 мб</div>'); } else
                                            if($error == '2'){ echo('<div class="error">Разрешение скриншотов должно быть jpg, png, webp, ico, jpeg</div>'); } else
                                            {
                                                if($_POST["price"] == intval($_POST["price"])){
                                                    
                                                    $name = substr($_POST["name"], 0, 50);
                                                    $desc = substr($_POST["desc"], 0, 1000);
                                                    $price = substr($_POST["price"], 0, 10);
                                                    
                                                    $valid_formats = array("zip");
                                                    $format = end(explode(".", $_FILES["addon"]["name"]));
                                                    if(in_array($format, $valid_formats)){ echo('<div class="error">Аддон должен быть в zip архиве</div>'); } else {
                                                        
                                                        $sqlc = "INSERT INTO `uploads` (`id`, `name`, `description`, `images`, `price`, `file`, `author`) VALUES (NULL, '$name', '$desc', '-', '$price', '-', '$uid')";
                                                        mysqli_query($conn, $sqlc);
                                                        $uploadid = mysqli_insert_id($conn);
                                                        $imgs = '{
   "logo": "./uploads/tmp/'.$uploadid.'_0'.'",
   "gallery":{
      "1": "./uploads/tmp/'.$uploadid.'_1'.'",
      "2": "'.(!isset($_FILES["image2"]) === '' ? "./uploads/tmp/".$uploadid."_2" : "-").'",
      "3": "'.(!isset($_FILES["image3"]) === '' ? "./uploads/tmp/".$uploadid."_3" : "-").'",
      "4": "'.(!isset($_FILES["image4"]) === '' ? "./uploads/tmp/".$uploadid."_4" : "-").'",
      "5": "'.(!isset($_FILES["image5"]) === '' ? "./uploads/tmp/".$uploadid."_5" : "-").'",
      "6": "'.(!isset($_FILES["image6"]) === '' ? "./uploads/tmp/".$uploadid."_6" : "-").'",
      "7": "'.(!isset($_FILES["image7"]) === '' ? "./uploads/tmp/".$uploadid."_7" : "-").'",
      "8": "'.(!isset($_FILES["image8"]) === '' ? "./uploads/tmp/".$uploadid."_8" : "-").'",
      "9": "'.(!isset($_FILES["image9"]) === '' ? "./uploads/tmp/".$uploadid."_9" : "-").'",
      "10": "'.(!isset($_FILES["image10"]) === '' ? "./uploads/tmp/".$uploadid."_10" : "-").'"
   }
                                                        }';
                                                        $failik = $uploadid.'_addon.'.$format;
                                                        
                                                        $sqlc = "UPDATE `uploads` SET `images`='$imgs',`file`='$failik' WHERE `id` = '$uploadid';";
                                                        mysqli_query($conn, $sqlc);
                                                        
                                                        $path_file = "./uploads/tmp/";
                                                        
                                                        if(is_uploaded_file($_FILES["image0"]["tmp_name"])){
                                                            $rand_name = $uploadid.'_0';
                                                            move_uploaded_file($_FILES["image0"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                        }
                                                        if(is_uploaded_file($_FILES["image1"]["tmp_name"])){
                                                            $rand_name = $uploadid.'_1';
                                                            move_uploaded_file($_FILES["image1"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                        }
                                                        if(is_uploaded_file($_FILES["addon"]["tmp_name"])){
                                                            $rand_name = $uploadid.'_addon';
                                                            move_uploaded_file($_FILES["addon"]["tmp_name"], $path_file . $rand_name . ".$format");
                                                        }
            
                                                        if(isset($_FILES["image2"])){ 
                                                            if(is_uploaded_file($_FILES["image2"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_2';
                                                                move_uploaded_file($_FILES["image2"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
            
                                                        if(isset($_FILES["image3"])){ 
                                                            if(is_uploaded_file($_FILES["image3"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_3';
                                                                move_uploaded_file($_FILES["image3"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
            
                                                        if(isset($_FILES["image4"])){ 
                                                            if(is_uploaded_file($_FILES["image4"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_4';
                                                                move_uploaded_file($_FILES["image4"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
            
                                                        if(isset($_FILES["image5"])){ 
                                                            if(is_uploaded_file($_FILES["image5"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_5';
                                                                move_uploaded_file($_FILES["image5"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
            
                                                        if(isset($_FILES["image6"])){ 
                                                            if(is_uploaded_file($_FILES["image6"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_6';
                                                                move_uploaded_file($_FILES["image6"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
            
                                                        if(isset($_FILES["image7"])){ 
                                                            if(is_uploaded_file($_FILES["image7"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_7';
                                                                move_uploaded_file($_FILES["image7"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
            
                                                        if(isset($_FILES["image8"])){ 
                                                            if(is_uploaded_file($_FILES["image8"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_8';
                                                                move_uploaded_file($_FILES["image8"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
            
                                                        if(isset($_FILES["image9"])){ 
                                                            if(is_uploaded_file($_FILES["image9"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_9';
                                                                move_uploaded_file($_FILES["image9"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
            
                                                        if(isset($_FILES["image10"])){ 
                                                            if(is_uploaded_file($_FILES["image10"]["tmp_name"])){
                                                                $rand_name = $uploadid.'_10';
                                                                move_uploaded_file($_FILES["image10"]["tmp_name"], $path_file . $rand_name . ".jpg");
                                                            }
                                                        }
                                                        
                                                        header('Location: ./#r=cupload');
                                                        
                                                    }
                                                    
                                                } else { echo('<div class="error">Если шо, цена - это число =)</div>'); }
                                            }
                                            
                                        } else { echo('<div class="error">Вес скриншота #1 не должен превышать 2мб</div>'); }
                                    } else { echo('<div class="error">Вес превью не должен превышать 2мб</div>'); }
                                } else { echo('<div class="error">Вес аддона не должен превышать 15мб</div>'); }
                                
                            } else { echo('<div class="error">Прикрепите хотя-бы 1 скриншот</div>'); }
                        } else { echo('<div class="error">Прикрепите превью аддона</div>'); }
                    }else { echo('<div class="error">Введите описание</div>'); }
                } else { echo('<div class="error">Введите цену</div>'); }
            } else { echo('<div class="error">Введите название</div>'); }
        } else { echo('<div class="error">Вы должны прикрепить аддон</div>'); }
    } else { echo('<div class="error">Вы уже загрузили аддон</div>'); }
    }

?>

<?php } } else { header('Location: ./'); } ?>