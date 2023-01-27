<?
$strJson = file_get_contents('pass.json');
$arr = json_decode($strJson, true);
if (!empty($_POST['url'])) {
    $res = [];
    foreach($arr as $el) {
        if ($el['url'] != urldecode($_GET['url'])) {
            array_push($res, $el);
        } else {
            $el = [
                'cont' => $_POST['cont'],
                'url' => $_POST['url'],
                'user' => $_POST['user'],
                'pass' => $_POST['pass']
            ];
            array_push($res, $el);
        }
    }
    $str = json_encode($res, JSON_PRETTY_PRINT);
    file_put_contents('pass.json', $str);
    header('Location: ./');
} else {
    $e = [];
    foreach($arr as $el) {
        if ($el['url'] == urldecode($_GET['url'])) {
            $e = $el;
        }
    }
?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="">
                <input class="form-control" type="text" name="cont" value="<?=$e['cont']?>" />
                <input class="form-control" type="url" name="url" value="<?=$e['url']?>" />
                <input class="form-control" type="text" name="user" value="<?=$e['user']?>" />
                <input class="form-control" type="password" name="pass" value="<?=$e['pass']?>" />
                <input class="btn btn-info" type="submit" value="Modifica" />
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?
    }
    ?>