function admin(query){
    ajax({
        url:"./assets/php/adminKO/admin.php?r=" + query,
        type:"post",
        result:function(data){ document.getElementById ('content').innerHTML = data; }
    })
    location.hash = 'r=' + query;
}

function userinfoloader(){
	var data = '<div class="preloaderct"><div class="lds-ripple"><div></div><div></div></div></div>'
	document.getElementById ('userinfo').innerHTML = data;
}
function userinfoajax(query) {
    // display loading image here...
    userinfoloader();
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
function userinfo(query){
    userinfoajax({
        url:"./assets/php/adminKO/userinfo.php?id=" + query,
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}

function atikview(id){
    userinfoajax({
        url:"./assets/php/adminKO/tikview.php?id=" + id,
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}

function ashop(id){
    userinfoajax({
        url:"./assets/php/adminKO/shop.php?id=" + id,
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}
function udapr(typ, id){
    userinfoajax({
        url:"./assets/php/adminKO/upproc.php?typ=" + typ + '&id=' + id,
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}

function aupdate_shop(id){
    userinfoajax({
        url:"./assets/php/adminKO/update_shop.php?id=" + id,
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}
function aupdate_shop_obr(typ, id){
    userinfoajax({
        url:"./assets/php/adminKO/update_proc.php?typ=" + typ + '&id=' + id,
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}

function apartneradd(){
    userinfoajax({
        url:"./assets/php/adminKO/partners_add.php",
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}
function apartnerdel(typ, id){
    userinfoajax({
        url:"./assets/php/adminKO/partners_proc.php?t=" + typ + '&id=' + id,
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}

function atiksendmsg(id){
    let messsage = document.getElementById('messsage').value;
    
    var datka = {
        'id': id,
        'msg': messsage
    }
    var datka = JSON.stringify(datka);

    $.ajax({
        url:"./assets/php/adminKO/tikmsgsend.php",
        data: {myData: datka},
        type: 'POST',
        success: function(response) {
            atikview(id);
        }
    });
}

function awithdraw(typ, id){
    userinfoajax({
        url:"./assets/php/adminKO/withdraw.php?typ=" + typ + '&id=' + id,
        type:"post",
        result:function(data){ document.getElementById ('userinfo').innerHTML = data; }
    })
}