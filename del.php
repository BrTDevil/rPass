<?
$strJson = file_get_contents('pass.json');
$arr = json_decode($strJson, true);
$res = [];
foreach($arr as $el) {
    if ($el['url'] != urldecode($_GET['url'])) {
        array_push($res, $el);
    }
}
$str = json_encode($res, JSON_PRETTY_PRINT);
file_put_contents('pass.json', $str);
header('Location: ./');