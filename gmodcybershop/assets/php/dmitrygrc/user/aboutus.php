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
        width: calc(100% - 25vw);
        height: auto;
        position: absolute;
        animation: move 2s ease-in-out;
        object-fit: contain;
    }
    .textu h2{ color: white; margin-top: 25vh; }
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
        color: white;
        font-size: 23px;
    }
    
    .connectus{
        font-size: 20px;
        cursor: pointer;
    }
    .cybershop{
        background-image: -webkit-linear-gradient(left, #0D6CFF, #118EF7);
        background-image: -moz-linear-gradient(left, #0D6CFF, #118EF7);
        background-image: -ms-linear-gradient(left, #0D6CFF, #118EF7);
        background-image: -o-linear-gradient(left, #0D6CFF, #118EF7);
        background-image: linear-gradient(to right, #0D6CFF, #118EF7);
        color:transparent;
        -webkit-background-clip: text;
        background-clip: text;
    }
    .connectcat{
        display: grid;
        grid-template-columns: 1fr 1fr;
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
    .discordicontainer{
        width: 100%;
        height: 92px;
        position: relative;
    }
    .discordict{
        top: 0; left: 0; bottom: 0; right: 0;
        margin: auto;
        position: absolute;
        display: grid;
        grid-template-columns: 275px 275px;
        gap: 10px;
        width:550px;
        height: 92px;
    }
    .discorduserct {
        width: 275px;
        height: 96px;
        display: grid;
        grid-template-columns: 96px 120px;
    }
    .discorduserava img{
        width: 92px;
        height: 92px;
        border-radius: 250px;
    }
    .discorduserid{
        color: darkgray;
        font-size: 20px;
        top: 0; left: 5px; bottom: 0;
        margin: auto;
        position: relative;
    }
    @media (max-width: 1350px) {
        .discordict{
            height: 184px;
            width: 275px;
            grid-template-columns: 275px;
        }
        .discordicontainer{
            height: 184px;
        }
    }
    @media (max-width: 1080px) {
        .discordict{
            height: 92px;
            width: 550px;
            grid-template-columns: 275px 275px;
        }
        .discordicontainer{
            height: 92px;
        }
        .gridka{
            grid-template-columns: 1fr;
        }
        .kartinka{
            display: none;
        }
    }
    @media (max-width: 630px) {
        .discordict{
            height: 184px;
            width: 275px;
            grid-template-columns: 275px;
        }
        .discordicontainer{
            height: 184px;
        }
    }
</style>
<div class="main">
    <div class="gridka">
        <div class="textu">
            <h2>О нас</h2>
            <div><b class="cybershop">GMOD CYBER SHOP</b> — команда из обычных людей, которая пытается облегчить жизнь другим людям, как бы странно это не звучало. Вместе с нами вы сможете открыть свой сервер или просто заработать! Наша цель - это создать хорошую среду для разработчиков и потребителей.</div>
            <br>
            <div class="statpartn">Руководство</div>
            <br>
            <a href="https://discord.gg/JKb9Y8zQCF" target="_blank">
                <div class="discordicontainer">
                    <div class="discordict">
                        <div class="discorduserct">
                            <div class="discorduserava"><img src="./assets/img/vaguard.png"></div>
                            <div class="discorduserid">Vanguard#2396</div>
                        </div>
                        <div class="discorduserct">
                            <div class="discorduserava"><img src="./assets/img/huzane.gif"></div>
                            <div class="discorduserid">Huzane#2000</div>
                        </div>
                    </div>
                </div>
            </a>
            <br>
            <div class="connectcat">
                <div class="cybershop connectus" onclick="req('login')"><b>присоединиться к нам</b></div>
                <div class="connectus" onclick="req('catalog')"><b>посмотреть каталог</b></div>
            </div>
        </div>
        <div class="kartinka"><img src="./assets/img/person.png"></div>
    </div>
</div>