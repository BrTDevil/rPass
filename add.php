<?
if (!empty($_POST['url'])) {
    $strJson = file_get_contents('pass.json');
    $arr = json_decode($strJson, true);
    $el = [
        'cont' => $_POST['cont'],
        'url' => $_POST['url'],
        'user' => $_POST['user'],
        'pass' => $_POST['pass']
    ];
    array_push($arr, $el);
    $str = json_encode($arr, JSON_PRETTY_PRINT);
    file_put_contents('pass.json', $str);
    header('Location: ./');
} else {
?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method="post" action="">
            <input class="form-control" type="text" name="cont" placeholder="Cont" />
            <input class="form-control" type="url" name="url" placeholder="URL" />
            <input class="form-control" type="text" name="user" placeholder="User" />
            <input class="form-control" type="password" name="pass" placeholder="Parola" />
            <input class="btn btn-success" type="submit" value="Adauga" />
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
<?
}
?>