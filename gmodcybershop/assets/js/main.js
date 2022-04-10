function loadingImg(){
	var data = '<div class="preloaderct"><div class="lds-ripple"><div></div><div></div></div></div>'
	document.getElementById ('content').innerHTML = data;
}
function ajax(query) {
    // display loading image here...
    loadingImg();
    // request your data...
    var req = new XMLHttpRequest();
    req.open(query.type,query.url,true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            // content is loaded...hide the gif and display the content...
            if (req.responseText) {
                query.result(req.responseText);
            }
        }
    };
    req.send();
}

function req(query){
    ajax({
        url:"./obrab.php?r=" + query,
        type:"post",
        result:function(data){ document.getElementById ('content').innerHTML = data; }
    })
    location.hash = 'r=' + query;
}
function catalog(date, price){
    ajax({
        url:"./catalog.php?p=" + price + '&d=' + date,
        type:"post",
        result:function(data){ document.getElementById ('content').innerHTML = data; }
    })
}
function cabinet(query){
    ajax({
        url:"./cabinet.php?r=" + query,
        type:"post",
        result:function(data){ document.getElementById ('content').innerHTML = data; }
    })
    location.hash = 'r=' + query;
}
function shop(query, id){
    ajax({
        url:"./shop.php?r=" + query + '&id=' + id,
        type:"post",
        result:function(data){ document.getElementById ('content').innerHTML = data; }
    })
    location.hash = 'r=' + query + '#id=' + id;
}
function prof(query, id){
    ajax({
        url:"./profile.php?id=" + id,
        type:"post",
        result:function(data){ document.getElementById ('content').innerHTML = data; }
    })
    location.hash = 'r=' + query + '#id=' + id;
}


/* BUY */
function buyloadingImg(){
	var data = '<div class="preloaderct"><div class="lds-ripple"><div></div><div></div></div></div>'
	document.getElementById ('buywindow').innerHTML = data;
}
function buyajax(query) {
    // display loading image here...
    buyloadingImg();
    // request your data...
    var req = new XMLHttpRequest();
    req.open(query.type,query.url,true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            // content is loaded...hide the gif and display the content...
            if (req.responseText) {
                query.result(req.responseText);
            }
        }
    };
    req.send();
}
function buy(id){
    document.getElementById ('main').setAttribute("style","filter:blur(5px)");
    document.getElementById ('buywindow').setAttribute("style","display:block");
    buyajax({
        url:"./buy.php?id=" + id,
        type:"post",
        result:function(data){ document.getElementById ('buywindow').innerHTML = data; }
    })
}
function buyconfirm(id){
    document.getElementById ('main').setAttribute("style","filter:blur(5px)");
    document.getElementById ('buywindow').setAttribute("style","display:block");
    buyajax({
        url:"./buyconf.php?id=" + id,
        type:"post",
        result:function(data){ document.getElementById ('buywindow').innerHTML = data; }
    })
}
function closebuy(){
    document.getElementById ('main').setAttribute("style","filter:blur(0px)");
    document.getElementById ('buywindow').setAttribute("style","display:none");
}


function ticketloadimg(){
	var data = '<div class="preloaderct"><div class="lds-ripple"><div></div><div></div></div></div>'
	document.getElementById ('support').innerHTML = data;
}
function ticketajax(query) {
    // display loading image here...
    ticketloadimg();
    // request your data...
    var req = new XMLHttpRequest();
    req.open(query.type,query.url,true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            // content is loaded...hide the gif and display the content...
            if (req.responseText) {
                query.result(req.responseText);
            }
        }
    };
    req.send();
}
function ticketsnew(){
    ticketajax({
        url:"./assets/php/tickets/new.php",
        type:"post",
        result:function(data){ document.getElementById ('support').innerHTML = data; }
    })
}


function ticketcreate(){
    let theme = document.getElementById('theme').value;
    let msg = document.getElementById('msg').value;
    
    var datka = {
        'theme': theme,
        'msg': msg
    }
    var datka = JSON.stringify(datka);

    $.ajax({
        url:"./assets/php/tickets/newobr.php",
        data: {myData: datka},
        type: 'POST',
        success: function(response) {
            cabinet('csupport');
        }
    });
}
function tikview(id){
    ticketajax({
        url:"./assets/php/tickets/view.php?id=" + id,
        type:"post",
        result:function(data){ document.getElementById ('support').innerHTML = data; }
    })
}
function tiksendmsg(id){
    let messsage = document.getElementById('messsage').value;
    
    var datka = {
        'id': id,
        'msg': messsage
    }
    var datka = JSON.stringify(datka);

    $.ajax({
        url:"./assets/php/tickets/msgsend.php",
        data: {myData: datka},
        type: 'POST',
        success: function(response) {
            tikview(id);
        }
    });
}

function rateloadimg(){
	var data = '<div class="preloaderct"><div class="lds-ripple"><div></div><div></div></div></div>'
	document.getElementById ('gryadka1-0').innerHTML = data;
}
function rateajax(query) {
    // display loading image here...
    rateloadimg();
    // request your data...
    var req = new XMLHttpRequest();
    req.open(query.type,query.url,true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            // content is loaded...hide the gif and display the content...
            if (req.responseText) {
                query.result(req.responseText);
            }
        }
    };
    req.send();
}
function rate(id){
    rateajax({
        url:"./assets/php/rate/rate.php?id=" + id,
        type:"post",
        result:function(data){ document.getElementById ('gryadka1-0').innerHTML = data; }
    })
}
function rateobr(id){
    let ocenkain = document.getElementById('ocenkain').value;
    let otziv = document.getElementById('otziv').value;
    
    var datka = {
        'ocenkain': ocenkain,
        'otziv': otziv
    }
    var datka = JSON.stringify(datka);

    $.ajax({
        url:"./assets/php/rate/obr.php?id=" + id,
        data: {myData: datka},
        type: 'POST',
        success: function(response) {
            shop('shop', id)
        }
    });
}

function withdraw(){
    let winthdrawi = document.getElementById('winthdrawi').value;
    let wallet = document.getElementById('wallet').value;
    let number = document.getElementById('number').value;

    var datka = {
        'winthdrawi': winthdrawi,
        'wallet': wallet,
        'number': number
    }
    var datka = JSON.stringify(datka);

    $.ajax({
        url:"./assets/php/withdraw/withdraw.php",
        data: {myData: datka},
        type: 'POST',
        success: function(response) {
            cabinet('cwinthdraw')
        }
    });
}

function popolnit(){
    let summ = document.getElementById('summ').value;
    
    var datka = {
        'summ': summ
    }
    var datka = JSON.stringify(datka);
    
    rateajax({
        url:"./assets/php/popolnit/popolnit.php",
        data: {myData: datka},
        type:"post",
        result:function(data){ document.getElementById ('gryadka1-0').innerHTML = data; }
    })
}

function catalogsearch(){
    let serachber = document.getElementById('serachber').value;
    
    var datka = {
        'serachber': serachber
    }
    var datka = JSON.stringify(datka);

    $.ajax({
        url:"./catalog.php",
        data: {myData: datka},
        type: 'POST',
        success: function(response) {
            document.getElementById ('content').innerHTML = response;
        }
    });
}

function cabdescedit(){
    rateajax({
        url:"./assets/php/cabinet/descedit.php",
        type:"post",
        result:function(data){ document.getElementById ('gryadka1-0').innerHTML = data; }
    })
}
function cabdesceditobr(){
    let otziv = document.getElementById('otziv').value;
    
    var datka = {
        'otziv': otziv
    }
    var datka = JSON.stringify(datka);

    $.ajax({
        url:"./assets/php/cabinet/desceditobr.php",
        data: {myData: datka},
        type: 'POST',
        success: function(response) {
            cabinet('cmain')
        }
    });
}

function loadmorebtnajax(query) {
    // request your data...
    var req = new XMLHttpRequest();
    req.open(query.type,query.url,true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            // content is loaded...hide the gif and display the content...
            if (req.responseText) {
                query.result(req.responseText);
            }
        }
    };
    req.send();
}

function loadmorebtn(date, price, start, end){
    loadmorebtnajax({
        url:"./catalog_l.php?d=" + date + "&p=" + price + "&s=" + start + "&e=" + end,
        type:"post",
        result:function(data){
            document.getElementById ('catalog').innerHTML += data;
            var suka;
            var end2 = 25;
            suka = parseInt(end) + parseInt(end2);
            let lbtn = '<div onclick="loadmorebtn('+date+', '+price+', '+end+', '+suka+')">Загрузить еще...</div>';
            document.getElementById ('loadmorebtn').innerHTML = lbtn;
        }
    })
}

function stars(caunt){
    if(caunt == '1'){
        data = '<i onclick="stars(1)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(2)" class="far fa-star"></i><i onclick="stars(3)" class="far fa-star"></i><i onclick="stars(4)" class="far fa-star"></i><i onclick="stars(5)" class="far fa-star"></i>';
        document.getElementById ('ocenka').innerHTML = data;
        document.getElementById ('ocenkain').value = '1';
    } else 
    if(caunt == '2'){
        data = '<i onclick="stars(1)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(2)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(3)" class="far fa-star"></i><i onclick="stars(4)" class="far fa-star"></i><i onclick="stars(5)" class="far fa-star"></i>';
        document.getElementById ('ocenka').innerHTML = data;
        document.getElementById ('ocenkain').value = '2';
    } else 
    if(caunt == '3'){
        data = '<i onclick="stars(1)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(2)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(3)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(4)" class="far fa-star"></i><i onclick="stars(5)" class="far fa-star"></i>';
        document.getElementById ('ocenka').innerHTML = data;
        document.getElementById ('ocenkain').value = '3';
    } else 
    if(caunt == '4'){
        data = '<i onclick="stars(1)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(2)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(3)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(4)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(5)" class="far fa-star"></i>';
        document.getElementById ('ocenka').innerHTML = data;
        document.getElementById ('ocenkain').value = '4';
    } else 
    if(caunt == '5'){
        data = '<i onclick="stars(1)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(2)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(3)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(4)" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars(5)" style="color: #DCA3FC;" class="fas fa-star"></i>';
        document.getElementById ('ocenka').innerHTML = data;
        document.getElementById ('ocenkain').value = '5';
    }
}

function reloadpage(){
    window.location.href = "/";
}