<?php
namespace core\sql;

use PDO;

class QueryBuilder
{
    private $pdo;
    private $table;
    private $select = "*";
    private $where = "";
    private $params = [];
    private $join = "";
    private $groupBy = "";
    private $having = "";
    private $orderBy = "";
    private $limit = "";

    public function __construct()
    {
        include_once __DIR__."/../../config/const.php";
        $dbcn = new DbConnection(_HOST,_PORT,_DB,_USER, _PSWD,);
        $cn = $dbcn->connect();
        $this->pdo = $cn;
    }

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function select($columns)
    {
        $this->select = $columns;
        return $this;
    }

    public function where($conditions)
    {
        $this->where = "WHERE $conditions";
        return $this;
    }

    public function orderBy($column, $direction = "ASC")
    {
        $this->orderBy = "ORDER BY $column $direction";
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = "LIMIT $limit";
        return $this;
    }

    public function join($table, $condition)
    {
        $this->join .= " JOIN $table ON $condition";
        return $this;
    }

    public function leftJoin($table, $condition)
    {
        $this->join .= " LEFT JOIN $table ON $condition";
        return $this;
    }

    public function rightJoin($table, $condition)
    {
        $this->join .= " RIGHT JOIN $table ON $condition";
        return $this;
    }

    public function innerJoin($table, $condition)
    {
        $this->join .= " INNER JOIN $table ON $condition";
        return $this;
    }

    public function groupBy($column)
    {
        $this->groupBy = "GROUP BY $column";
        return $this;
    }

    public function having($conditions)
    {
        $this->having = "HAVING $conditions";
        return $this;
    }

    public function insert($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
        $this->execute($sql, $data);
        return $this->pdo->lastInsertId();
    }

    public function update($data)
    {
        $set = [];
        foreach ($data as $column => $value) {
            $set[] = "$column = :$column";
        }
        $set = implode(", ", $set);
        $sql = "UPDATE $this->table SET $set $this->where";
        return $this->execute($sql, $data);
    }

    public function delete()
    {
        $sql = "DELETE FROM $this->table $this->where";
        return $this->execute($sql, $this->params);
    }

    public function count()
    {
        $sql = "SELECT COUNT(*) FROM $this->table $this->join $this->where";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($this->params);
        return $stmt->fetchColumn();
    }

    public function get()
    {
        $sql = "SELECT $this->select FROM $this->table $this->join $this->where  $this->groupBy $this->having $this->orderBy $this->limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($this->params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function first()
    {
        $result = $this->limit(1)->get();
        return !empty($result) ? $result[0] : null;
    }
    
    private function execute($sql, $params)
    {
        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    public function beginTransaction() {
        $this->pdo->beginTransaction();
    }

    public function commit() {
        $this->pdo->commit();
    }

    public function rollback() {
        $this->pdo->rollback();
    }

    public function __destruct() {
        $this->pdo = null;
    }
}    
