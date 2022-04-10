<style>
    .main{
        position: relative;
        font-family: Montserrat-Regular;
        color: darkgray;
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
    .maincatu1 h1{
        color: darkgray;
        animation: optic 2s ease-in-out;
        position: relative;
        text-align: center;
        opacity: 1;
    }
    .maincatu1{
        margin-top: 10vh;
        display: grid;
        grid-template-rows: 50px 10px 90px;
        position: relative;
    }
    .maincatu1 div{
        color: darkgray;
        animation: optic 2s ease-in-out;
        position: relative;
        text-align: center;
        opacity: 1;
    }
    .maincatu1 img{
        position: relative;
        margin: auto;
        display: block;
        width: auto;
        margin-top: 5vh;
        height: 50vh;
        animation: move 1s ease-in-out;
        opacity: 1;
        object-fit: contain;
    }
    .mainsamolet img{
        position: absolute;
        top: -5vh;
        right: 10vw;
        width: auto;
        height: 25vh;
        object-fit: contain;
        animation: optic 2s ease-in-out;
    }
    
    
    .maincatu2{
        margin-top: 12vh;
        display: grid;
        grid-template-rows: 100px 200px 200px 200px 200px 100px;
        position: relative;
        width: 100%;
    }
    .maincatu2 h2{
        color: darkgray;
        animation: optic 2s ease-in-out;
        position: relative;
        text-align: center;
        opacity: 1;
    }
    .mainleft{
        display: grid;
        grid-template-columns: 250px 500px;
        grid-template-rows: 100%;
        position: relative;
        width: 750px;
        height: 100%;
        float: left;
        left: 7vw;
    }
    .mainleft img{
        position: relative;
        margin: auto;
        display: block;
        width: auto;
        height: 100%;
        animation: move 1s ease-in-out;
        opacity: 1;
        object-fit: contain;
    }
    .mainright{
        right: 7vw;
        margin: auto;
        position: absolute;
        display: grid;
        grid-template-columns: 500px 250px;
        grid-template-rows: 100%;
        width: 750px;
        height: 100%;
        text-align: right;
    }
    .mainright img{
        position: relative;
        margin: auto;
        display: block;
        width: auto;
        height: 100%;
        animation: move 1s ease-in-out;
        opacity: 1;
        object-fit: contain;
    }
    .mainzaglav{
        font-size: 25px;
        color: white;
        position: relative;
        margin-left: -50px;
    }
    .mainzaglavright{
        font-size: 25px;
        color: white;
        position: relative;
        margin-right: -50px;
    }
    .mainpoch{
        font-size: 18px;
    }
    
    @media (max-width: 1920px) {
        .mainsamolet img{
            position: absolute;
            top: -5vh;
            right: 20vw;
        }
    }
    @media (max-width: 1600px) {
        .mainsamolet img{
            position: absolute;
            top: -5vh;
            right: 15vw;
        }
    }
    @media (max-width: 1280px) {
        .mainsamolet img{
            position: absolute;
            top: -5vh;
            right: 10vw;
        }
    }
    @media (max-width: 1080px) {
        .maincatu1 img{
            width: 100%;
            height: 40vh;
        }
        .mainsamolet img{ display: none; }
        .maincatu2{
            margin-top: 16vh;
            text-align: center;
        }
        .mainzaglav {
            margin-left: 0px;
        }
        .mainleft img {
            display: none;
        }
        .imagedif {
            display: none;
        }
        .mainright img{
            display: none;
        }
        .mainleft{
            grid-template-columns: 500px;
            width: 500px;
            position: relative;
            left: 0;
            right: 0;
            margin: auto;
        }
        .mainright{
            grid-template-columns: 500px;
            width: 500px;
            position: relative;
            left: 0;
            right: 0;
            margin: auto;
            text-align: center;
        }
        .mainzaglavright{
            margin-right: 0px;
        }
    }
    @media (max-width: 1080px) {
        
    }
</style>
<div class="main">
	    <div class="mainsamolet"><img src="./assets/img/fly.png"></div>
	<div class="maincatu1">
	    <div><h1>GmodCyberShop</h1></div>
	        <div></div>
	    <div>Вы всегда мечтали получать доход со своего аддона?<br>Все это осуществимо с нашей площадкой CyberGmodShop.<br>На нашей площадке ты сможешь без проблем выставить <br>свои работы на продажу, без каких либо оплат.</div>
	    <div><img src="./assets/img/person.png"></div>
    </div>
    <div class="maincatu2">
        <div><h2>Почему мы?</h2></div>
        <div class="mainleft">
            <div class="imagedif"><img src="./assets/img/main1.png"></div>
            <div>
                <div class="mainzaglav">Работа – деньги</div>
                <div class="mainpoch">Вы уже знаете, что: ‘Каждый труд должен быть справедливо оплачен’, именно мы это хотим вам предподнести. На площадке gmodstore, не каждый сможет проявить свое творчество. Из-за высоких требований. Но только не тут! Почти каждый желающий сможет выложить свой аддон!</div>
            </div>
        </div>
            <div style="width: 100%; height: 100%; position: relative;">
                <div class="mainright">
                    <div>
                        <div class="mainzaglavright">Поддержка 24/7</div>
                        <div class="mainpoch">Наша поддержка всегда к вашим услугам. Мы работаем в любой день, даже в выходные. Поэтому все ваши проблемы, будут быстро решены. </div>
                    </div>
                    <div class="imagedif"><img src="./assets/img/main2.png"></div>
                </div>
            </div>
        <div class="mainleft">
            <div class="imagedif"><img src="./assets/img/main3.png"></div>
            <div>
                <div class="mainzaglav">Вывод денег</div>
                <div class="mainpoch">Мы стремимся к выводу за пару секунд и за маленькие проценты. На вывод идет всего лишь с комиссией - 5% ! Все сресдтва идут исключительно на содержание машины.</div>
            </div>
        </div>
            <div style="width: 100%; height: 100%; position: relative;">
                <div class="mainright">
                <div>
                    <div class="mainzaglavright">Защита данных</div>
                    <div class="mainpoch">Все ваши скрипты хранятся надежно. И кроме вас и ваших покупателей никто не будет иметь к ним доступ.</div>
                </div>
                <div class="imagedif"><img src="./assets/img/main4.png"></div>
            </div>
        </div>
    </div>
</div>