<?php

namespace brteam;

class rpass {

    public static function create(DB $db) {
        $sql = '
        CREATE TABLE accounts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name CHAR(64) NOT NULL,
            site CHAR(64) NOT NULL,
            user CHAR(64) NOT NULL,
            pass CHAR(128) NOT NULL
        )
        ';
        $db->execute($sql);
    }

    public static function add(DB $db) {
        $db->insert($_POST['name'], $_POST['site'], $_POST['user'], $_POST['pass']);
        echo '<script>document.location.href="./"</script>';
        exit;
    }

    public static function addForm() {
        return '
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" action="">
                    <input type="hidden" name="operation" value="add" />
                    <label>Nume cont</label>
                    <input class="form-control" type="text" name="name" placeholder="Cont" />
                    <label>Site</label>
                    <input class="form-control" type="url" name="site" placeholder="URL" />
                    <label>user</label>
                    <input class="form-control" type="text" name="user" placeholder="User" />
                    <label>Parola</label>
                    <input class="form-control" type="password" name="pass" placeholder="Parola" />
                    <input class="btn btn-success" type="submit" value="Adauga" />
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>';
    }

    public static function del(DB $db) {
        $db->delete($_GET['id']);
        header('Location: ./');
    }

    public static function list(DB $db) {
        $arr = $db->list();
        echo '
        <div class="row">';
        foreach($arr as $el) {
            $pass = base64_encode($el['pass']);
                echo '<div class="col-2 text-center">
                    <div class="record">
                        <div class="row">
                            <h2 class="cont col-8 col-xs-12 text-start">' . $el['name'] . '</h2>
                            <div class="col-4  col-xs-12 text-end">
                                <a onclick="return confirm(\'Delete ?\');" class="btn btn-sm btn-danger" href="?operation=del&id='.$el['id'].'">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div><hr>
                        <a class="block url" target="_blank" href="' . $el['site'] . '"><i class="fab fa-internet-explorer"></i> '
                        . $el['site'] . '</a><br>
                        <a class="block blockCopy user" data="' . $el['user'] . '"><i class="fas fa-user"></i> ' . $el['user'] . '</a> 
                        <a class="block blockCopy pass" data="'.$pass.'"><i class="fas fa-key"></i></a> 
                    </div>
                </div>';
        }
        echo '</div>';
    }
}