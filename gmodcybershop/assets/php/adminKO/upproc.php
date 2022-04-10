<?php
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
    $typ = (int) $_GET['typ'];
    require ('../steamauth/steamauth.php');
    if(isset($_SESSION['steamid'])) {
        
        require('../../../config.php');
        
        $conn = new mysqli($servername, $username, $password, $db_name);
        $conn->set_charset("utf8");
        
        $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $utype = $rowa['type'];
        }
        
        if($utype == 'admin'){
            
            $sql = "SELECT * FROM `uploads` WHERE `id`='$query'";
            $resultsa = mysqli_query($conn, $sql);
            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                $upid = $rowa['id'];
                $upname = $rowa['name'];
                $updescription = $rowa['description'];
                $upimages = $rowa['images'];
                $upprice = $rowa['price'];
                $upfile = $rowa['file'];
                $upauthor = $rowa['author'];
                $upimages = json_decode($upimages, true);
            }
            
            if($typ == '1'){
                
                $datetime = date('Y-m-d');
                $sqlc = "INSERT INTO `products` (`id`, `name`, `description`, `images`, `price`, `file`, `author`, `date`) VALUES (NULL, '$upname', '$updescription', '-', '$upprice', '$upfile', '$upauthor', '$datetime')";
                mysqli_query($conn, $sqlc);
                $uploadid = mysqli_insert_id($conn);
                $imgs = '{
   "logo": "./uploads/'.$uploadid.'_0.jpg'.'",
   "gallery":{
      "1": "./uploads/'.$uploadid.'_1.jpg'.'",
      "2": "'.(!$upimages['gallery'][2] === '-' ? "./uploads/".$uploadid."_2.jpg" : "-").'",
      "3": "'.(!$upimages['gallery'][3] === '-' ? "./uploads/".$uploadid."_3.jpg" : "-").'",
      "4": "'.(!$upimages['gallery'][4] === '-' ? "./uploads/".$uploadid."_4.jpg" : "-").'",
      "5": "'.(!$upimages['gallery'][5] === '-' ? "./uploads/".$uploadid."_5.jpg" : "-").'",
      "6": "'.(!$upimages['gallery'][6] === '-' ? "./uploads/".$uploadid."_6.jpg" : "-").'",
      "7": "'.(!$upimages['gallery'][7] === '-' ? "./uploads/".$uploadid."_7.jpg" : "-").'",
      "8": "'.(!$upimages['gallery'][8] === '-' ? "./uploads/".$uploadid."_8.jpg" : "-").'",
      "9": "'.(!$upimages['gallery'][9] === '-' ? "./uploads/".$uploadid."_9.jpg" : "-").'",
      "10": "'.(!$upimages['gallery'][10] === '-' ? "./uploads/".$uploadid."_10.jpg" : "-").'"
   }
}';
                $sqlc = "UPDATE `products` SET `images`='$imgs',`name`='$upname',`description`='$updescription',`file`='$upfile' WHERE `id` = '$uploadid';";
                mysqli_query($conn, $sqlc);
                
                shell_exec('ffmpeg -i ../../.'.$upimages['logo'].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_0.jpg');
                shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][1].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_1.jpg');
                if($upimages['gallery'][2] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][2].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_3.jpg'); }
                if($upimages['gallery'][3] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][3].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_3.jpg'); }
                if($upimages['gallery'][4] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][4].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_4.jpg'); }
                if($upimages['gallery'][5] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][5].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_5.jpg'); }
                if($upimages['gallery'][6] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][6].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_6.jpg'); }
                if($upimages['gallery'][7] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][7].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_7.jpg'); }
                if($upimages['gallery'][8] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][8].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_8.jpg'); }
                if($upimages['gallery'][9] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][9].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_9.jpg'); }
                if($upimages['gallery'][10] != '-'){ shell_exec('ffmpeg -i ../../.'.$upimages['gallery'][10].'.jpg -s 1280x720 ../../../uploads/'.$uploadid.'_10.jpg'); }
                    $format = pathinfo($upfile, PATHINFO_EXTENSION);
                shell_exec('mv ../../../uploads/tmp/'.$upfile.' ../../../uploads/'.$uploadid.'_addon.'.$format);
                shell_exec('rm ../../.'.$upimages['logo'].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][1].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][2].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][3].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][4].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][5].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][6].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][7].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][8].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][9].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][10].'.jpg');
                
                $sqlc = "DELETE FROM `uploads` WHERE `id`='$query'";
                mysqli_query($conn, $sqlc);
                
                echo 'OK';
                
            } else
            if($typ == '2'){
                
                shell_exec('rm ../../../uploads/tmp/'.$upfile);
                shell_exec('rm ../../.'.$upimages['logo'].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][1].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][2].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][3].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][4].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][5].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][6].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][7].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][8].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][9].'.jpg');
                shell_exec('rm ../../.'.$upimages['gallery'][10].'.jpg');
                
                $sqlc = "DELETE FROM `uploads` WHERE `id`='$upid'";
                mysqli_query($conn, $sqlc);
                
                echo 'OK';
                
            }
        }
    mysqli_close($conn); }
}
?>