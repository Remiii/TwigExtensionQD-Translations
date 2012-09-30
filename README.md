Remiii Twig Extension Repository (Quick and Dirty Translations)
===============================================================

This repository hosts Remiii Twig Extension that do not belong to the core but can
be nonetheless interesting to share with other developers.

Fork this repository, add your extension, and request a pull.


Installation
------------

```
$ cp ./Remiii_Twig_Extension ProjectRoot/vendor/
```


Usage
-----

Register this Extension.

```
<?php

// web/index.php

/*
 * Path
 */
$pagePath = './' ;

/*
 * Settings
 */
require_once ( $pagePath . './../vendor/Twig/lib/Twig/Autoloader.php' ) ;

$locale = 'fr' ;
$varPrint_name = 'Remiii' ;

/*
 * Renderer
 */
Twig_Autoloader :: register ( ) ;

// Add Remiii QD i18l extension
require_once ( $pagePath . './../vendor/Remiii_Twig_Extension/src/QD_i18l.php') ;

$loader = new Twig_Loader_Filesystem ( $pagePath . './../src/views/' ) ;
$twig = new Twig_Environment ( $loader ) ;

// Add Remiii i18l extension and set locale
$twig -> addExtension ( new Remiii_Twig_Extensions_QD_i18n ( $locale , $pagePath . './../src/translations/' ) ) ;

echo $twig -> render ( 'layout.html.twig' , array (
    'varPrint_name' => $varPrint_name ,
    ) ) ;

?>
```

```
<?php

// src/translations/messages.en.php

$languagesStrings = array
(
    'hello' => 'hello' ,
    'login' => 'login' ,
    'query' => 'query'
) ;

?>
```

```
{# src/view/layout.html.twig #}
<html>
<header>
</header>
<body style="text-align:center;">
    <h1>Quick and Dirty i18l</h1>
    <p>{{ 'hello'|qdtrans }} {{ varPrint_name }}</p>
    <p>{{ 'login'|qdtrans }}</p>
    <p style="font-size:12px;">Remiii - 2012</p>
</body>
</html>
```


License
-------

This code is released under the MIT License.