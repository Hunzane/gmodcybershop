<?php
require ('./assets/php/steamauth/steamauth.php');
require ('./config.php');
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
}
if(isset($_SESSION['steamid'])) {
    $conn = new mysqli($servername, $username, $password, $db_name);
    $conn->set_charset("utf8");
    
    $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $uid = $rowa['id'];
    }
    $sql = "SELECT * FROM `products` WHERE `id`='$query'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $upid = $rowa['id'];
        $productsauthor = $rowa['author'];
        $pname = $rowa['name'];
        $pdescription = $rowa['description'];
        $pimages = $rowa['images'];
        $pprice = $rowa['price'];
        $pdate = $rowa['date'];
        $pfile = $rowa['file'];
        $pimages = json_decode($pimages, true);
    }
    $sql = "SELECT * FROM `products_updates` WHERE `id`='$upid'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $products_updates_id = $rowa['id'];
        $products_updates_author = $rowa['author'];
    }
if(isset($_GET['id'])){
    if($productsauthor == $uid){
        if($products_updates_id != ''){ ?>
    
        <style>
            body{
                background: #212121;
                padding: 0;
                margin: 0;
                width: 100%;
                height: 100%;
            }
            .main{
                width: 100%;
                height: 100%;
                position: relative;
            }
            .text{
                font-size: 25px;
                color: darkgray;
                width: 275px;
                height: 32px;
                position: absolute;
                top: 0; bottom: 0; right: 0; left: 0;
                margin: auto;
            }
            .text1{
                font-size: 25px;
                color: darkgray;
                width: 84px;
                height: 32px;
                position: absolute;
                top: 50px; bottom: 0; right: 0; left: 0;
                margin: auto;
            }
            .text1 a{
                text-decoration: none;
                color: darkred;
            }
        </style>
        <div class="main">
            <p class="text">Идет проверка изменений</p>
            <p class="text1"><a href="./">Главная</a></p>
        </div>
<?php } else { ?>
    <html>
    <head>
        <title>Изменить аддон | GmodCyberShop</title>
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
    <form action="./addonedit.php?id=<?php echo $query; ?>" method="post" enctype="multipart/form-data">
    <div class="gryadka1-0">
        <div class="addonnmae" style="border-bottom: 2px solid gray"><input id="name" name="name" maxlength="50" type="text" placeholder="Название аддона" value="<?php echo $pname; ?>"></div>
        <div class="gridka">
        <div class="gridka-1">
            <div class="gridka-1-1">
                <input class="mainimgupload" name="image1" type="file" id="uploadImage1" onchange="PreviewImage('1')">
                <img src="<?php echo $pimages[gallery][1]; ?>" id="uploadPreview1">
            </div>
            <div class="gridka-1-2">
                <div class="gridka-1-2-1">
                    <div class="gridka-1-2-1-1">
                        <div><input class="imgupload" name="image2" type="file" id="uploadImage2" onchange="PreviewImage('2')"><img id="uploadPreview2" src="<?php if($pimages[gallery][2] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][2]; } ?>"></div>
                        <div><input class="imgupload" name="image3" type="file" id="uploadImage3" onchange="PreviewImage('3')"><img id="uploadPreview3" src="<?php if($pimages[gallery][3] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][3]; } ?>"></div>
                        <div><input class="imgupload" name="image4" type="file" id="uploadImage4" onchange="PreviewImage('4')"><img id="uploadPreview4" src="<?php if($pimages[gallery][4] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][4]; } ?>"></div>
                        <div><input class="imgupload" name="image5" type="file" id="uploadImage5" onchange="PreviewImage('5')"><img id="uploadPreview5" src="<?php if($pimages[gallery][5] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][5]; } ?>"></div>
                        <div><input class="imgupload" name="image6" type="file" id="uploadImage6" onchange="PreviewImage('6')"><img id="uploadPreview6" src="<?php if($pimages[gallery][6] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][6]; } ?>"></div>
                        <div><input class="imgupload" name="image7" type="file" id="uploadImage7" onchange="PreviewImage('7')"><img id="uploadPreview7" src="<?php if($pimages[gallery][7] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][7]; } ?>"></div>
                        <div><input class="imgupload" name="image8" type="file" id="uploadImage8" onchange="PreviewImage('8')"><img id="uploadPreview8" src="<?php if($pimages[gallery][8] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][8]; } ?>"></div>
                        <div><input class="imgupload" name="image9" type="file" id="uploadImage9" onchange="PreviewImage('9')"><img id="uploadPreview9" src="<?php if($pimages[gallery][9] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][9]; } ?>"></div>
                        <div><input class="imgupload" name="image10" type="file" id="uploadImage10" onchange="PreviewImage('10')"><img id="uploadPreview10" src="<?php if($pimages[gallery][10] == '-'){ echo './assets/img/prew.png'; } else { echo $pimages[gallery][10]; } ?>"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gridka-2">
            <input class="logoimgupload" name="image0" type="file" id="uploadImage0" onchange="PreviewImage('0')">
            <img src="<?php echo $pimages[logo]; ?>" id="uploadPreview0">
            <div class="cena"><input id="price" type="text" name="price" placeholder="Цена" maxlength="10" value="<?php echo $pprice; ?>"></div>
            <div class="addon" style="color: darkgray;">Аддон: <input name="addon" type="file"></div>
                <br>
            <div class="publish"><button name="publish">ОТПРАВИТЬ</button></div>
        </div>
        </div>
        <div class="addonnmae"><textarea type="text" name="desc" id="desc" placeholder="Описание (не более 1000 символов)" maxlength="1000"><?php echo $pdescription; ?></textarea></div>
    </div>
    </form>
    </body>
    </html>
    
<?php

    if(isset($_POST["publish"])){
if(!empty($_FILES['image0']["name"])){ 
    $image0 = './uploads/tmp/updates/'.$upid.'_0.jpg';
} else {
    $image0 = $pimages[logo];
}
if(!empty($_FILES['image1']["name"])){ 
    $image1 = './uploads/tmp/updates/'.$upid.'_1.jpg';
} else {
    $image1 = $pimages[gallery][1];
}
if(!empty($_FILES['image2']["name"])){ 
    $image2 = './uploads/tmp/updates/'.$upid.'_2.jpg';
} else {
    $image2 = $pimages[gallery][2];
}
if(!empty($_FILES['image3']["name"])){ 
    $image3 = './uploads/tmp/updates/'.$upid.'_3.jpg';
} else {
    $image3 = $pimages[gallery][3];
}
if(!empty($_FILES['image4']["name"])){ 
    $image4 = './uploads/tmp/updates/'.$upid.'_4.jpg';
} else {
    $image4 = $pimages[gallery][4];
}
if(!empty($_FILES['image5']["name"])){ 
    $image5 = './uploads/tmp/updates/'.$upid.'_5.jpg';
} else {
    $image5 = $pimages[gallery][5];
}
if(!empty($_FILES['image6']["name"])){ 
    $image6 = './uploads/tmp/updates/'.$upid.'_6.jpg';
} else {
    $image6 = $pimages[gallery][6];
}
if(!empty($_FILES['image7']["name"])){ 
    $image7 = './uploads/tmp/updates/'.$upid.'_7.jpg';
} else {
    $image7 = $pimages[gallery][7];
}
if(!empty($_FILES['image8']["name"])){ 
    $image8 = './uploads/tmp/updates/'.$upid.'_8.jpg';
} else {
    $image8 = $pimages[gallery][8];
}
if(!empty($_FILES['image9']["name"])){ 
    $image9 = './uploads/tmp/updates/'.$upid.'_9.jpg';
} else {
    $image9 = $pimages[gallery][9];
}
if(!empty($_FILES['image10']["name"])){ 
    $image10 = './uploads/tmp/updates/'.$upid.'_10.jpg';
} else {
    $image10 = $pimages[gallery][10];
}

$imgs = '{
    "logo": "'.$image0.'",
    "gallery":{
       "1": "'.$image1.'",
       "2": "'.$image2.'",
       "3": "'.$image3.'",
       "4": "'.$image4.'",
       "5": "'.$image5.'",
       "6": "'.$image6.'",
       "7": "'.$image7.'",
       "8": "'.$image8.'",
       "9": "'.$image9.'",
       "10": "'.$image10.'"
    }
}';
    $error = 0;
    $valid_format = array("jpg, png, webp, ico, jpeg");
    
    if(isset($_GET['image0'])){ 
        if ($_FILES['image0']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image0']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image1'])){ 
        if ($_FILES['image1']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image1']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image2'])){ 
        if ($_FILES['image2']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image2']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image3'])){ 
        if ($_FILES['image3']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image3']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image4'])){ 
        if ($_FILES['image4']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image4']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image5'])){ 
        if ($_FILES['image5']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image5']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image6'])){ 
        if ($_FILES['image6']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image6']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image7'])){ 
        if ($_FILES['image7']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image7']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image8'])){ 
        if ($_FILES['image8']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image8']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image9'])){ 
        if ($_FILES['image9']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image9']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['image10'])){ 
        if ($_FILES['image10']['size'] <= 2097152){} else { $error = 1; } 
        $format = end(explode(".", $_FILES['image10']["name"]));
        if (in_array($format, $valid_format)){ $error = 2; }
    }
    if(isset($_GET['addon'])){
        if ($_FILES['addon']['size'] <= 15728640){} else { $error = 4; }
        $valid_formats = array("zip");
        $format = end(explode(".", $_FILES["addon"]["name"]));
        if(in_array($format, $valid_formats)){ $error = 3; }
    }
    
    if($error == '1'){ echo('<div class="error">Вес каждого скриншота не должен превышать 2 мб</div>'); } else
    if($error == '2'){ echo('<div class="error">Разрешение скриншотов должно быть jpg, png, webp, ico, jpeg</div>'); } else
    if($error == '3'){ echo('<div class="error">Аддон должен быть в zip архиве</div>'); } else
    if($error == '4'){ echo('<div class="error">Вес аддона не должен превышать 15мб</div>'); } else {
        
        $name = substr($_POST["name"], 0, 50);
        $desc = substr($_POST["desc"], 0, 1000);
        $price = substr($_POST["price"], 0, 10);
        
        $sqlc = "INSERT INTO `products_updates` (`id`, `name`, `description`, `images`, `price`, `file`, `author`) VALUES ('$upid', '$name', '$desc', '$imgs', '$price', '$pfile', '$uid')";
        mysqli_query($conn, $sqlc);
    
        $path_file = "./uploads/tmp/updates/";
        
        if(isset($_GET['addon'])){
            if(is_uploaded_file($_FILES["addon"]["tmp_name"])){
                $rand_name = $upid.'_addon';
                move_uploaded_file($_FILES["addon"]["tmp_name"], $path_file . $rand_name . ".$format");
            }
        } else {
            shell_exec('cp ./uploads/'.$pfile.' ./uploads/tmp/updates/'.$pfile);
        }
        if(isset($_FILES["image0"])){ 
            if(is_uploaded_file($_FILES["image0"]["tmp_name"])){
                $rand_name = $upid.'_0';
                move_uploaded_file($_FILES["image0"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image1"])){ 
            if(is_uploaded_file($_FILES["image1"]["tmp_name"])){
                $rand_name = $upid.'_1';
                move_uploaded_file($_FILES["image1"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image2"])){ 
            if(is_uploaded_file($_FILES["image2"]["tmp_name"])){
                $rand_name = $upid.'_2';
                move_uploaded_file($_FILES["image2"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image3"])){ 
            if(is_uploaded_file($_FILES["image3"]["tmp_name"])){
                $rand_name = $upid.'_3';
                move_uploaded_file($_FILES["image3"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image4"])){ 
            if(is_uploaded_file($_FILES["image4"]["tmp_name"])){
                $rand_name = $upid.'_4';
                move_uploaded_file($_FILES["image4"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image5"])){ 
            if(is_uploaded_file($_FILES["image5"]["tmp_name"])){
                $rand_name = $upid.'_5';
                move_uploaded_file($_FILES["image5"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image6"])){ 
            if(is_uploaded_file($_FILES["image6"]["tmp_name"])){
                $rand_name = $upid.'_6';
                move_uploaded_file($_FILES["image6"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image7"])){ 
            if(is_uploaded_file($_FILES["image7"]["tmp_name"])){
                $rand_name = $upid.'_7';
                move_uploaded_file($_FILES["image7"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image8"])){ 
            if(is_uploaded_file($_FILES["image8"]["tmp_name"])){
                $rand_name = $upid.'_8';
                move_uploaded_file($_FILES["image8"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image9"])){ 
            if(is_uploaded_file($_FILES["image9"]["tmp_name"])){
                $rand_name = $upid.'_9';
                move_uploaded_file($_FILES["image9"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        
        if(isset($_FILES["image10"])){ 
            if(is_uploaded_file($_FILES["image10"]["tmp_name"])){
                $rand_name = $upid.'_10';
                move_uploaded_file($_FILES["image10"]["tmp_name"], $path_file . $rand_name . ".jpg");
            }
        }
        header('Location: ./');
    }
}


} } } } else { header('Location: ./'); } ?>