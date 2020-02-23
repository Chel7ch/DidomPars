<?php

namespace DB;

class DBPdoCRUD
{
    public  $sql;

    public function __construct(\DB\IDBConnection $pdo)
    {
        $this->sql = $pdo;
    }

    public function connect()
    {
        return $this->sql->connect();
    }

    public function prepareInsert($benefit = [])
    {
        $tab = 'INSERT INTO ' . TAB_NAME . '(links,';
        $val = ' VALUES';
        for ($i = 0; $i < TAB_FIELDS; $i++)
            $tab .= 'field' . ($i + 1) . ',';

        for ($i = 0; $i < count($benefit); $i++)
            $val .= '(' . $benefit[$i] . '),';

        $tab = substr($tab, 0, -1);
        $val = substr($val, 0, -1);
        $query = $tab . ')' . $val . ';';

        return $query;
    }

    public function insertDB($sql=''){
        $this->connect()->exec($sql);
    }

    public function selectDB($sql='')
    {
        $sql = 'SELECT * FROM '. TAB_NAME;

        $st = $this->connect()->query($sql);
        $results = $st->fetchAll();

        foreach ($results as $row) {
            echo $row['id'] . ' ';
            echo $row['links'] . ' ';
            echo $row['field1'] . '<br> ';
//            echo $row['field2'].' ';
//            echo $row['field3'].'<br> ';
        }
    }

}