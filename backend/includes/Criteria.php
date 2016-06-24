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
    public $group;
    public $limit;
    
    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = "GROUP BY ". preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $group);
    }

    /**
     * @param mixed $select
     */
    public function setSelect($select)
    {
        $this->select = $select;
    }

    /**
     * @param mixed $join
     */
    public function setJoin($join)
    {
        $this->join = $join;
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
	
	public function getQuery() {
		return "SELECT $this->select FROM TABLE_NAME $this->join $this->condition $this->order $this->group;";
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