<style>
    .main{
        position: relative;
        font-family: Montserrat-Regular;
        color: darkgray;
    }
    .main img{
        position: relative;
        margin: auto;
        display: block;
        width: 75vw;
        margin-top: 5vh;
        height: 65vh;
        animation: move 2s ease-in-out;
        opacity: 1;
        object-fit: contain;
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
    @keyframes optic {   
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    .main h1{
        color: darkgray;
        animation: optic 2s ease-in-out;
        position: relative;
        text-align: center;
        opacity: 1;
    }
    @media (max-width: 1080px) {
        .main img{
            width: 100%;
            height: 40vh;
        }
    }
    .main p{
        color: darkgray;
        animation: optic 2s ease-in-out;
        position: relative;
        text-align: center;
        opacity: 1;
    }
</style>
<div class="main">
    <div><img src="./assets/img/404.png"></div>
	<div><h1>Упс.. Проблемки</h1></div>
	<div id="404-text"><p><b>Вкладочка улетела, но обещала вернуться.</b><br><br>К сожалению данной вкладки не существует, или у вас нет к ней доступа.<br>Попробуйте связаться с администрацией</p></div>
</div>