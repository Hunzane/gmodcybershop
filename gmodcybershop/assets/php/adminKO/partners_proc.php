<?php 
if(isset($_GET['t'])) {
    $query = $_GET['t'];
    ob_start();
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
            if($query == '1'){
                $name = $_POST["name"];
                $url = $_POST["link"];
                $sqlc = "INSERT INTO `partners` (`id`, `name`, `url`, `ava`) VALUES (NULL, '$name', '$url', '-')";
                mysqli_query($conn, $sqlc);
                $uploadid = mysqli_insert_id($conn);
                $path_file = "../../../uploads/partners/";
                if(is_uploaded_file($_FILES["ava"]["tmp_name"])){
                    $rand_name = $uploadid.'_tmp';
                    move_uploaded_file($_FILES["ava"]["tmp_name"], $path_file . $rand_name . ".jpg");
                }
                shell_exec('ffmpeg -y -i ../../../uploads/partners/'.$rand_name.'.jpg -filter_complex "[0:v]scale=192:192[out]" -map "[out]" ../../../uploads/partners/'.$uploadid.'.jpg');
                shell_exec('rm ../../../uploads/partners/'.$rand_name.'.jpg');
                $sqlc = "UPDATE `partners` SET `ava`='$uploadid.jpg' WHERE `id` = '$uploadid'";
                mysqli_query($conn, $sqlc);
                header('Location: /#r=apartners');
            } else if($query == '2'){
                $idnax = $_GET['id'];
                shell_exec('rm ../../../uploads/partners/'.$idnax.'.jpg');
                $sqlc = "DELETE FROM `partners` WHERE `id`='$idnax'";
                mysqli_query($conn, $sqlc);
                echo('OK');
            }
        }
        mysqli_close($conn);
    }
}
?>