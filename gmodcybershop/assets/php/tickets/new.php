<?php
require ('../steamauth/steamauth.php');

if(isset($_SESSION['steamid'])) {
	require('../../../config.php');
?>
<style>
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
    .inputko{
        background: #181818;
        border: none;
        padding: 10px;
        border-bottom: 2px solid gray;
        color: darkgray;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        font-size: 20px;
        width: 100%;
        height: 30px;
    }
    .sumbitko{
        width: 100%;
        font-size: 20px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        background: #181818;
        border: none;
        padding: 10px;
        border-bottom: 2px solid gray;
        color: darkgray;
        cursor: pointer;
    }
    textarea{
        margin-top: 10px;
        background: #181818;
        border: none;
        padding: 10px;
        border-bottom: 2px solid gray;
        color: darkgray;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        font-size: 20px;
        width: 100%;
        resize: none;
        height: 200px;
    }
</style>
<div>
    <input class="inputko" type="text" id="theme" placeholder="Тема" maxlength="50">
    <textarea maxlength="1000" id="msg" placeholder="Сообщение"></textarea>
    <input class="sumbitko" type="submit" onclick="ticketcreate()" placeholder="Отправить">
</div>

<?php } ?>