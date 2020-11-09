<?php
if(isset($_COOKIE['lang'])){
   if ($_COOKIE['lang'] === 'ru' || $_COOKIE['lang'] === 'en'){
       $lang = $_COOKIE['lang'];
   } else {
       setcookie('lang', 'ru', time() + 3600 * 24 * 30, '/');
       $lang = $_COOKIE['lang'];
   }
}else if (!isset($_GET['lang'])) {
    setcookie('lang', 'ru', time() + 3600 * 24 * 30, '/');
    $lang = 'ru';
} else {
    if ($_GET['lang'] === 'ru' || $_GET['lang'] === 'en') {
        $lang = $_GET['lang'];
        setcookie('lang', $_GET['lang'], time() + 3600 * 24 * 30, '/');
    } else {
        $lang = 'ru';
        setcookie('lang', 'ru', time() + 3600 * 24 * 30, '/');
    }
}

$newReqLang = [];

foreach ($_GET as $key => $value) {
    if ($key !== "lang") {
        array_push($newReqLang, "$key=$value");
    }
}

if(count($newReqLang) > 0){
    $newReqLang = join('&', $newReqLang) . '&';
} else {
    $newReqLang = join('', $newReqLang);
}
