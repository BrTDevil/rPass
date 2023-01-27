<div class="text-end">
    <a class="btn btn-sm btn-success" href="?pg=add"><i class="fas fa-plus"></i></a>
</div>
<div class="row">
    <?
    $jsonStr = file_get_contents('pass.json');
    $arr = json_decode($jsonStr, true);

    foreach($arr as $el) {
        $pass = base64_encode($el['pass']);
        echo '<div class="col-2 text-center">
        <div class="record">
        <div class="row">
        <h2 class="cont col-8 col-xs-12 text-start">' . $el['cont'] . '</h2>
        <div class="col-4  col-xs-12 text-end">
        <a class="btn btn-sm btn-primary" href="?pg=edit&url='.$el['url'].'"><i class="fas fa-edit"></i></a> 
        <a onclick="return confirm(\'Delete ?\');" class="btn btn-sm btn-danger" href="del.php?url='.$el['url'].'"><i class="fas fa-trash"></i></a>
        </div>
        </div><hr>
        <a class="block url" target="_blank" href="' . $el['url'] . '"><i class="fab fa-internet-explorer"></i> '
         . $el['url'] . '</a><br>
        <a class="block blockCopy user" data="' . $el['user'] . '"><i class="fas fa-user"></i> ' . $el['user'] . '</a> 
        <a class="block blockCopy pass" data="'.$pass.'"><i class="fas fa-key"></i></a> 
        </div>
        </div>';
    }
    ?>
</div>
