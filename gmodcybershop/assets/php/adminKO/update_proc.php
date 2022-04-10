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
            
            $sql = "SELECT * FROM `products_updates` WHERE `id`='$query'";
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
                
                $sql = "SELECT * FROM `products` WHERE `id`='$query'";
                $resultsa = mysqli_query($conn, $sql);
                while ($rowa = mysqli_fetch_assoc($resultsa)) {
                    $huetapid = $rowa['id'];
                    $huetapname = $rowa['name'];
                    $huetapdescription = $rowa['description'];
                    $huetapimages = $rowa['images'];
                    $huetapprice = $rowa['price'];
                    $huetapfile = $rowa['file'];
                    $huetapauthor = $rowa['author'];
                    $huetapimages = json_decode($huetapimages, true);
                }
                
                if($huetapimages['logo'] == $upimages['logo']){
                    
                }
$imgs = '{
   "logo": "'.($upimages['logo'] === $huetapimages['logo'] ? $huetapimages['logo'] : "./uploads/".$huetapid."_0.jpg").'",
   "gallery":{
      "1": "'.($upimages['gallery'][1] === $huetapimages['gallery'][1] ? $huetapimages['gallery'][1] : "./uploads/".$huetapid."_1.jpg").'",
      "2": "'.($upimages['gallery'][2] === $huetapimages['gallery'][2] ? $huetapimages['gallery'][2] : "./uploads/".$huetapid."_2.jpg").'",
      "3": "'.($upimages['gallery'][3] === $huetapimages['gallery'][3] ? $huetapimages['gallery'][3] : "./uploads/".$huetapid."_3.jpg").'",
      "4": "'.($upimages['gallery'][4] === $huetapimages['gallery'][4] ? $huetapimages['gallery'][4] : "./uploads/".$huetapid."_4.jpg").'",
      "5": "'.($upimages['gallery'][5] === $huetapimages['gallery'][5] ? $huetapimages['gallery'][5] : "./uploads/".$huetapid."_5.jpg").'",
      "6": "'.($upimages['gallery'][6] === $huetapimages['gallery'][6] ? $huetapimages['gallery'][6] : "./uploads/".$huetapid."_6.jpg").'",
      "7": "'.($upimages['gallery'][7] === $huetapimages['gallery'][7] ? $huetapimages['gallery'][7] : "./uploads/".$huetapid."_7.jpg").'",
      "8": "'.($upimages['gallery'][8] === $huetapimages['gallery'][8] ? $huetapimages['gallery'][8] : "./uploads/".$huetapid."_8.jpg").'",
      "9": "'.($upimages['gallery'][9] === $huetapimages['gallery'][9] ? $huetapimages['gallery'][9] : "./uploads/".$huetapid."_9.jpg").'",
      "10": "'.($upimages['gallery'][10] === $huetapimages['gallery'][10] ? $huetapimages['gallery'][10] : "./uploads/".$huetapid."_10.jpg").'"
   }
}';
                
                if($upimages['logo'] != $huetapimages['logo']){shell_exec('ffmpeg -y -i ../../.'.$upimages['logo'].' -s 1280x720 ../../../uploads/'.$huetapid.'_0.jpg');}
                if($upimages['gallery'][1] != $huetapimages['gallery'][1]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][1].' -s 1280x720 ../../../uploads/'.$huetapid.'_1.jpg');}
                if($upimages['gallery'][2] != $huetapimages['gallery'][2]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][2].' -s 1280x720 ../../../uploads/'.$huetapid.'_2.jpg');}
                if($upimages['gallery'][3] != $huetapimages['gallery'][3]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][3].' -s 1280x720 ../../../uploads/'.$huetapid.'_3.jpg');}
                if($upimages['gallery'][4] != $huetapimages['gallery'][4]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][4].' -s 1280x720 ../../../uploads/'.$huetapid.'_4.jpg');}
                if($upimages['gallery'][5] != $huetapimages['gallery'][5]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][5].' -s 1280x720 ../../../uploads/'.$huetapid.'_5.jpg');}
                if($upimages['gallery'][6] != $huetapimages['gallery'][6]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][6].' -s 1280x720 ../../../uploads/'.$huetapid.'_6.jpg');}
                if($upimages['gallery'][7] != $huetapimages['gallery'][7]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][7].' -s 1280x720 ../../../uploads/'.$huetapid.'_7.jpg');}
                if($upimages['gallery'][8] != $huetapimages['gallery'][8]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][8].' -s 1280x720 ../../../uploads/'.$huetapid.'_8.jpg');}
                if($upimages['gallery'][9] != $huetapimages['gallery'][9]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][9].' -s 1280x720 ../../../uploads/'.$huetapid.'_9.jpg');}
                if($upimages['gallery'][10] != $huetapimages['gallery'][10]){shell_exec('ffmpeg -y -i ../../.'.$upimages['gallery'][10].' -s 1280x720 ../../../uploads/'.$huetapid.'_10.jpg');}
                shell_exec('mv ../../../uploads/tmp/updates/'.$upfile.' ../../../uploads/'.$upfile);
                if($upimages['logo'] != $huetapimages['logo']){shell_exec('rm ../../.'.$upimages['logo'].'.jpg');}
                if($upimages['gallery'][1] != $huetapimages['gallery'][1]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_0.jpg');}
                if($upimages['gallery'][1] != $huetapimages['gallery'][1]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_1.jpg');}
                if($upimages['gallery'][2] != $huetapimages['gallery'][2]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_2.jpg');}
                if($upimages['gallery'][3] != $huetapimages['gallery'][3]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_3.jpg');}
                if($upimages['gallery'][4] != $huetapimages['gallery'][4]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_4.jpg');}
                if($upimages['gallery'][5] != $huetapimages['gallery'][5]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_5.jpg');}
                if($upimages['gallery'][6] != $huetapimages['gallery'][6]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_6.jpg');}
                if($upimages['gallery'][7] != $huetapimages['gallery'][7]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_7.jpg');}
                if($upimages['gallery'][8] != $huetapimages['gallery'][8]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_8.jpg');}
                if($upimages['gallery'][9] != $huetapimages['gallery'][9]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_9.jpg');}
                if($upimages['gallery'][10] != $huetapimages['gallery'][10]){shell_exec('rm ../../../uploads/tmp/updates/'.$huetapid.'_10.jpg');}
                
                $sqlc = "UPDATE `products` SET `images`='$imgs',`name`='$upname',`description`='$updescription',`price`='$upprice',`file`='$upfile' WHERE `id` = '$huetapid';";
                mysqli_query($conn, $sqlc);
                
                $sqlc = "DELETE FROM `products_updates` WHERE `id`='$upid'";
                mysqli_query($conn, $sqlc);
                
                echo 'OK';
            } else
            if($typ == '2'){
                
                shell_exec('rm ../../../uploads/tmp/updates/'.$upfile);
                if($upimages['logo'] != $huetapimages['logo']){shell_exec('rm ../../.'.$upimages['logo'].'.jpg');}
                if($upimages['gallery'][1] != $huetapimages['gallery'][1]){shell_exec('rm ../../.'.$upimages['gallery'][1].'.jpg');}
                if($upimages['gallery'][2] != $huetapimages['gallery'][2]){shell_exec('rm ../../.'.$upimages['gallery'][2].'.jpg');}
                if($upimages['gallery'][3] != $huetapimages['gallery'][3]){shell_exec('rm ../../.'.$upimages['gallery'][3].'.jpg');}
                if($upimages['gallery'][4] != $huetapimages['gallery'][4]){shell_exec('rm ../../.'.$upimages['gallery'][4].'.jpg');}
                if($upimages['gallery'][5] != $huetapimages['gallery'][5]){shell_exec('rm ../../.'.$upimages['gallery'][5].'.jpg');}
                if($upimages['gallery'][6] != $huetapimages['gallery'][6]){shell_exec('rm ../../.'.$upimages['gallery'][6].'.jpg');}
                if($upimages['gallery'][7] != $huetapimages['gallery'][7]){shell_exec('rm ../../.'.$upimages['gallery'][7].'.jpg');}
                if($upimages['gallery'][8] != $huetapimages['gallery'][8]){shell_exec('rm ../../.'.$upimages['gallery'][8].'.jpg');}
                if($upimages['gallery'][9] != $huetapimages['gallery'][9]){shell_exec('rm ../../.'.$upimages['gallery'][9].'.jpg');}
                if($upimages['gallery'][10] != $huetapimages['gallery'][10]){shell_exec('rm ../../.'.$upimages['gallery'][10].'.jpg');}
                
                $sqlc = "DELETE FROM `products_updates` WHERE `id`='$upid'";
                mysqli_query($conn, $sqlc);
                
                echo 'OK';
                
            }
        }
    mysqli_close($conn); }
}
?>