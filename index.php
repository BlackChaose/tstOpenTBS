<?php

require_once('library/tbs_class.php');
require_once('library/tbs_plugin_opentbs.php');
define('REL_FNAME','files/result.odt');
define('FILE_NAME',$_SERVER["DOCUMENT_ROOT"].'/'.REL_FNAME);

$TBS = new clsTinyButStrong;
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);


$TBS->LoadTemplate('templates/tsttpl1.odt', OPENTBS_ALREADY_UTF8);

//$TBS->PlugIn(OPENTBS_DEBUG_XML_SHOW);
$arr=array(
    'title'=>'Это просто заголовок!',
    'tst' => 'Это другой тест!',
    'name' => 'Alfred',
    'age' => '33',
);
$arr2=array(
    'title'=>'Это просто заголовок 2',
    'tst' => 'Это другой тест 2',
    'name' => 'Ivan',
    'age' => '24',
);
$arr3=array(
    'title'=>'Это просто заголовок 3',
    'tst' => 'Это другой тест 3',
    'name' => 'Reno',
    'age' => '',
);
$arr4=array(
    'title'=>'Это просто заголовок 4',
    'tst' => 'Это другой тест 4',
    'age' => '87',
    'name' => '',
);

$data=array($arr, $arr2,$arr3,$arr4);



$TBS->MergeBlock('krit',$data);

$title="bla";
$tst="ogo";

$data2=array(
    array(
        'type' => 'танк',
        'model' => 'Т34',
        'color' => 'оливковый',
        'nums' => '232',
    ),
    array(
        'note' => 'Тульские пряники',
        'probeg' => 2000,
        'sale' => 'не продаётся!',
        'options' => array(
            'radio' => 1,
            'tv' => 0,
            'sputnik' => 1,
            'inet' => 0,
            'music' => 1,
        ),
        'host' => 'Albert Einstein',
        'rateClose' => '03:08:2019'
    ),
    array(
        'type' => 'танк',
        'model' => 'Т80',
        'color' => 'чёрный',
        'nums' => '5',
    ),
    array(
        'note' => 'Доватор',
        'probeg' => 193923,
        'sale' => 'не продаётся!',
        'options' => array(
            'radio' => 0,
            'tv' => 0,
            'sputnik' => 0,
            'inet' => 0,
            'music' => 1,
        ),
        'host' => 'John Rembo',
        'rateClose' => '02:06:2019'
    ),
    array(
        'type' => 'танк',
        'model' => 'Т72',
        'color' => 'оливковый',
        'nums' => '83',
    ),
    array(
        'note' => 'Гостинец',
        'probeg' => 133420,
        'sale' => 'не продаётся!',
        'options' => array(
            'radio' => 1,
            'tv' => 1,
            'sputnik' => 1,
            'inet' => 1,
            'music' => 1,
        ),
        'host' => 'Дядя Вася',
        'rateClose' => '01:03:2019'
    ),
);

$TBS->MergeBlock('krit2',array($data2)); //attention: обернули массив блоков в ещё один массив!
if(!empty($_GET['download'])){
    $TBS->Show(OPENTBS_DOWNLOAD, REL_FNAME);
}



echo "<pre>";
    //print_r($GLOBALS);
    print_r($data);
    print_r($data2);
echo "</pre>";

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>tst</title>
</head>
<body>
<h1>tst OpenTBS </h1>

<a href="<?=$_SERVER['HOST']?>?download=1"> result </a>

</body>
</html>
