<?php
ob_start();
session_start();

function logoutbutton() {
	echo "<form action='' method='get'><button style='cursor: pointer; background: none; border: none;' name='logout' type='submit'><i class='fas fa-sign-out-alt'></i>Выход</button></form>"; //logout button
}

function loginbutton($buttonstyle = "square") {
	$button['rectangle'] = "01";
	$button['square'] = "02";
	$button = "<a href='?login'>Авторизация</a>";
	
	echo $button;
}

if (isset($_GET['login'])){
	require 'openid.php';
	try {
		require 'SteamConfig.php';
		$openid = new LightOpenID($steamauth['domainname']);
		
		if(!$openid->mode) {
			$openid->identity = 'https://steamcommunity.com/openid';
			header('Location: ' . $openid->authUrl());
		} elseif ($openid->mode == 'cancel') {
			echo 'User has canceled authentication!';
		} else {
			if($openid->validate()) { 
				$id = $openid->identity;
				$ptn = "/^https?:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
				preg_match($ptn, $id, $matches);
				
				$_SESSION['steamid'] = $matches[1];
				
				    $servername = "2.56.88.208";
                    $username = "admin_gmodcyber";
                    $password = "a67RfTaTdJ";
                    $db_name = "admin_gmodcyber";
                
                    $conn = new mysqli($servername, $username, $password, $db_name);
                    $conn->set_charset("utf8");
                    
                    $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
                    $resultsa = mysqli_query($conn, $sql);
                    while ($rowa = mysqli_fetch_assoc($resultsa)) {
                        $uid = $rowa['id'];
                    }
                    if($uid == null) {
                            $url = file_get_contents("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$steamauth['apikey']."&steamids=".$_SESSION['steamid']); 
                        	$content = json_decode($url, true);
                        	$_SESSION['steam_personaname'] = $content['response']['players'][0]['personaname'];
                        	$_SESSION['steam_profileurl'] = $content['response']['players'][0]['profileurl'];
                        	$_SESSION['steam_avatarfull'] = $content['response']['players'][0]['avatarfull'];
                        $sqlc = "INSERT INTO `users` (`id`, `steamid`, `login`, `avatar`, `url`, `description`, `balance`, `type`) VALUES (NULL, '".$_SESSION['steamid']."', '".$_SESSION['steam_personaname']."', '".$_SESSION['steam_avatarfull']."', '".$_SESSION['steam_profileurl']."', 'Привет, меня зовут ".$_SESSION['steam_personaname']." ...', '0', 'user')";
                	    mysqli_query($conn, $sqlc);
                	    mysqli_close($conn);
                    }
                    
				if (!headers_sent()) {
					header('Location: '.$steamauth['loginpage']);
					exit;
				} else {
					?>
					<script type="text/javascript">
						window.location.href="<?=$steamauth['loginpage']?>";
					</script>
					<noscript>
						<meta http-equiv="refresh" content="0;url=<?=$steamauth['loginpage']?>" />
					</noscript>
					<?php
					exit;
				}

			} else {
				echo "User is not logged in.\n";
			}
		}
	} catch(ErrorException $e) {
		echo $e->getMessage();
	}
}

if (isset($_GET['logout'])){
	require 'SteamConfig.php';
	session_unset();
	session_destroy();
	header('Location: '.$steamauth['logoutpage']);
	exit;
}

if (isset($_GET['update'])){
	unset($_SESSION['steam_uptodate']);
	require 'userInfo.php';
	header('Location: '.$_SERVER['PHP_SELF']);
	exit;
}

// Version 4.0

?>
