<?php
require_once("Functions/general.php");

function incluirClasses($nomeClasse)
{
    if (file_exists($nomeClasse . ".php")) {
        require_once($nomeClasse . ".php");
    }
}

function procurarDiretorio($nomeClasses)
{
    $pages = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    $pasta = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    $array_paths = array(

        // Caso for chamado dentro de backend, classes ou outro dentro de classes:
        '',
        '' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR,
        '..' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR,

        // Caso for chamado desde o dominio:
        'backend' . DIRECTORY_SEPARATOR,
        'backend' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR,
        'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR,
        'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
        'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR,
        'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        'app' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR,
        'app' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR,
        'app' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR,
        'app' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
        'app' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR,
        'app' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        'app' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        'app' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,

        // Caso for chamar desde dentro de uma das pastas dentro de backend:
        $pasta,
        $pasta . 'backend' . DIRECTORY_SEPARATOR,
        $pasta . 'config' . DIRECTORY_SEPARATOR,
        $pasta . 'model' . DIRECTORY_SEPARATOR,
        $pasta . 'controller' . DIRECTORY_SEPARATOR,
        $pasta . 'view' . DIRECTORY_SEPARATOR,
        $pasta . 'backend' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR,
        $pasta . 'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
        $pasta . 'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR,
        $pasta . 'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR,
        // Call templates:
        $pasta . 'controller' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        $pasta . 'model' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        $pasta . 'view' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        $pasta . 'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        $pasta . 'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        $pasta . 'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,

        // Caso for chamado desde uma pages de um dos dashboard:
        $pages . 'backend' . DIRECTORY_SEPARATOR,
        $pages . 'backend' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR,
        $pages . 'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR,
        $pages . 'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
        $pages . 'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR,
        
        // Call templates:
        $pages . 'backend' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        $pages . 'backend' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,
        $pages . 'backend' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR,

    );

    foreach ($array_paths as $dir) {
        $arquivo = $dir . $nomeClasses . ".php";
        if (file_exists($arquivo)) {
            require_once($arquivo);
        }
    }
}

//spl_autoload_register("incluirClasses");
spl_autoload_register("procurarDiretorio");
