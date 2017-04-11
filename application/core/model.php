<?php
class Model
{

    protected $id;
    private $db_connection;

    /**
     * @var string #table name in model
     */
    public $table_name;

    private $query_type = 'SELECT';

    private $condition;

    /**
     * не для update and insert
     * for delete change to $fild_list = ''
     */

    private $field_list = '*';

    private $query_array = [];

    private $query_string;

    private $query_limit;

    private $query_order;

    public $collection = [];

    public function __construct()
    {
        $this->db_connection = DBConnect::connect();
    }

    private function getConnection()
    {
        return $this->db_connection;
    }


    private function getQueryString()
    {
        $this->query_string = implode([
            'query_type' => $this->query_type,
            'field_list' => $this->field_list,
            'from_table' =>
                ($this->query_type == 'SELECT' || $this->query_type == 'DELETE') ? 'FROM' : NULL,
            'table_name' => $this->table_name,
            'condition' => $this->condition,
            'query_order' => $this->query_order,
            'query_limit' => $this->query_limit,
        ], ' ');
        return $this->query_string;
    }


    public function where($field, $param, $operator = 'AND')
    {
        $condition = $this->condition ? " $operator" : "WHERE";
        if (is_array($param)) {
            $this->condition .= "$condition $field IN (";
            $params = implode(array_map(function ($item) {
                return is_string($item) ?
                    //Quotes a string for use in a query
                    $this->db_connection->quote($item) : $item;
            }, $param), ', ');
            $this->condition .= $params;
            $this->condition .= ')';
        } else {
            $this->condition .= "$condition $field = '$param'";
        }
        return $this;
    }

    public function toSql()
    {
        return $this->getQueryString();
    }

    public function getId()
    {
        return $this->id;
    }

     /**
     * Возвращает объект найденой записи
     * или выбрасывает NotFoundException
     * Метод будет импользоваться на странице отображения
     * записи
     *
     */
    public function find($id)
    {
        $this->where('id', $id);
        $prepare = $this->db_connection->prepare($this->getQueryString());
        $prepare->execute();
        if (!$prepare->rowCount()) {
            throw new NotFoundException;
        }
        $prepare->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        $object = $prepare->fetch();
        return $object;
    }

    public function get()
    {
        $this->collection = [];
        $result = $this->db_connection->prepare($this->getQueryString());
        $result->execute();
        $this->collection = $result->fetchAll(PDO::FETCH_CLASS, get_class($this));
        return $this->collection;
    }

    public function delete($id)
    {
        $this->query_type = 'DELETE';
        $this->field_list = NULL;
        $this->where('id', $id);
        $this->db_connection->query($this->getQueryString());
        return $this;
    }
}