<style>
    .main{
        position: relative;
        font-family: Montserrat-Regular;
        color: darkgray;
        width: 100%;
        height: 100%;
    }
    .gridka{
        display: grid;
        grid-template-columns: 50vw 50vw;
        grid-template-rows: 1fr;
        width: 100%;
        height: 100%;
        position: relative;
    }
    .kartinka{
        position: relative;
        width: 100%;
        height: 100%;
    }
    .kartinka img{
        top: 0; bottom: 0; right: 0; left: 0;
        margin: auto;
        width: calc(100% - 15vw);
        height: auto;
        position: absolute;
        animation: move 2s ease-in-out;
        object-fit: contain;
    }
    .textu h2{ color: white; margin-top: 35vh; }
    .textu{
        width: calc(100% - 15vw);
        padding: 15px;
        height: 100%;
        position: relative;
        top: 0; bottom: 0;
        margin: 0 auto;
        text-align: center;
        animation: optic 2s ease-in-out;
    }
    .statpartn{
        color: #118EF7;
        font-size: 23px;
        cursor: pointer;
    }
    @keyframes optic {   
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes move {   
        0% {
            left: 10vw;
            opacity: 0;
        }   
        100% {
            left: 0;
            opacity: 1;
        }
    }
    @media (max-width: 1080px) {
        .gridka{
            grid-template-columns: 1fr;
        }
        .kartinka{
            display: none;
        }
    }
    .teleport{
        color: white;
        font-size: 25px;
        cursor: pointer;
        line-height: 20px;
    }
    .partersgrid{
        display: grid;
        grid-template-columns: repeat( auto-fill, minmax(147px, 137px) );
        width: 85vw;
        right: 0;
        left: 0;
        margin: auto;
    }
    .partersgrid div{
        margin: 10px;
    }
    .partersgrid img{
        border: 2px solid darkgray;
        border-radius: 250px;
        padding: 2px;
        width: 125px;
        height: 125px;
        text-align: center;
    }
    .partersgrid a{
        color: white;
        text-decoration: none;
        transition: 1s;
    }
    .partersgrid a:hover{
        color: darkgray;
    }
</style>
<div class="main">
    <div class="gridka">
        <div class="textu">
            <h2>Партнерская программа</h2>
            <div>Нас интересуют активные и стремящиеся к росту сообщества люди, которые проявляют любовь к своему комьюнити. Мы хотим поддержать сервера, которые поддерживают нас. Отбор в партнерскую программу мы проводим тщательно и рассматриваем каждую кандидатуру.</div>
            <br>
            <div class="statpartn">Стать партнером</div>
            <br>
            <div class="teleport" onclick="document.getElementById('partersgrid').scrollIntoView({behavior: 'smooth', block: 'start'});">Наши партнеры<br><i class="far fa-angle-down"></i></div>
        </div>
        <div class="kartinka"><img src="./assets/img/person1.png"></div>
    </div>
    <div class="partersgrid" id="partersgrid">
        <?php
            require ('./config.php');
            $conn = new mysqli($servername, $username, $password, $db_name);
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM `partners` ORDER BY `id` DESC";
            $resultsa = mysqli_query($conn, $sql);
            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                $partnerid = $rowa['id'];
                $partnername = $rowa['name'];
                $partnerurl = $rowa['url'];
                $partnerava = $rowa['ava'];
        ?>
        <div>
            <img src="./uploads/partners/<?php echo $partnerava; ?>">
            <br>
            <div style="text-align: center;"><a href="<?php echo $partnerurl; ?>"><?php echo $partnername; ?> <i class="fas fa-external-link-alt"></i></a></div>
        </div>
        <?php } mysqli_close($conn); ?>
    </div>
</div>