<?php

namespace brteam;

class DB {
    private $db;
    const DNS = 'sqlite:' . __DIR__ . '/../db/pm.db';

    public function __construct($username = null, $password = null) {
        try {
            $this->db = new \PDO(self::DNS, $username, $password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('DB connection failed: ' . $e->getMessage());
        }
    }

    public function insert($name, $site, $user, $pass) {
        $query = $this->db->prepare('INSERT INTO accounts (name, site, user, pass) VALUES (?, ?, ?, ?)');
        $query->execute([$name, $site, $user, $pass]);
    }

    public function list() {
        $sql = 'SELECT * FROM accounts';
        $query = $this->db->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function execute($sql) {
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function delete($id) {
        $query = $this->db->prepare('DELETE FROM accounts WHERE id = ?');
        $query->execute([$id]);
    }
}