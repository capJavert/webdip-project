<?php

/**
 * Class Criteria
 */
class Criteria
{
    public $select = "*";
    public $join;
    public $condition;
    public $params = array();
    public $order;
    public $limit;

    /**
     * @param mixed $select
     */
    public function setSelect($select)
    {
        $this->select = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $select);
    }

    /**
     * @param mixed $join
     */
    public function setJoin($join)
    {
        $this->join = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $join);
    }

    /**
     * @param mixed $condition
     */
    public function setCondition($condition)
    {
        $this->condition = "WHERE ".preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $condition);
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = "ORDER BY ".preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $order);
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit)
    {
        $this->limit = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $limit);
    }

    /**
     * Add param to params array
     * @param $key
     * @param $value
     */
    public function addParam($key, $value) {
        $value = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $value);

        $this->params[":$key"] = $value;
    }
}