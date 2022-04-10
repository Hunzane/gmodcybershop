<?php

if(isset($_GET['r'])) {
    $query = trim($_GET['r']);
    if($query == 'main'){} else
    if($query == 'catalog'){} else
    if($query == 'rules'){} else
    if($query == 'partners'){} else
    if($query == 'aboutus'){} else
    {require_once('./assets/php/dmitrygrc/user/404.php');}
}

if($query == 'main'){
    require_once('./assets/php/dmitrygrc/user/main.php');
} else 
if($query == 'catalog'){
    require_once('./assets/php/dmitrygrc/user/catalog.php');
} else 
if($query == 'rules'){
    require_once('./assets/php/dmitrygrc/user/rules.php');
} else 
if($query == 'partners'){
    require_once('./assets/php/dmitrygrc/user/partners.php');
} else 
if($query == 'aboutus'){
    require_once('./assets/php/dmitrygrc/user/aboutus.php');
} 

?>