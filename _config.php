<?php
    //declaration de la constante url
    $url = $_SERVER['SCRIPT_NAME'];
    $tables = ['/index.php'];
    foreach ($tables as $table){
    $verif = preg_match('#'.$table.'#', $url);
    if ($verif) {
        $var = $table;
    }
    $url = explode($var, $url);
}

    //declaration de la constante root
    $root = $_SERVER['DOCUMENT_ROOT'];

    // constante url
    define('URL', $url[0]);

    // constante root
    define('ROOT', $root.URL);
    
    // Constante model
    define('MODEL', value: ROOT.'/models');
    // Constante view
    define('VIEW', ROOT.'/views');
    // Constante controller
    define('CONTROLLER', ROOT.'/controllers');
?>