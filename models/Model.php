<?php


abstract class Model
{
    /**
     * @var IDB
     */
    protected $db;

    /**
     * Метод для
     *
     * @return mixed
     */
    abstract protected function getTableName():string;

    public function __construct(IDB $db)
    {
        $this->db = $db;
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = " . $id;
//        $db = new DB();
//        return $db->find($sql);
        return $this->db->find($sql); // с 7 версии можно так
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->findAll($sql);
    }
}