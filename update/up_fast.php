<?php


// 全自动更新  http://bp3-plus.52dixiaowo.com/bp3-main.zip

    session_start();
    
    $config = require("../config.php");
    
    require_once("../functions.php");
    
    force_login("/update/up_fast.php");
    
    // 下载最新版代码
    
    // 使用设置的更新地址
    $url = $config['control']['update_url'];
    
    // 如果地址为空，则默认使用赞助商源
    if(empty($url)){
        $url = "http://bp3-plus.52dixiaowo.com/bp3-main.zip";
    }
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT,"zhufenghua1998");
    
    $fp = curl_exec($ch); 
    
    $temp_uri = "./bp3-main.zip";
    
    file_put_contents($temp_uri,$fp);
    
    // 调用自动更新代码
    
    require("./up_core.php");
?>