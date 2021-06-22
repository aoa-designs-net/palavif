<?php

namespace App\Traits;


trait MergeTransactionHistory
{
    public $current_records;
    public $params;
    protected $old;
    protected $addition;


    /**
     * Merge current records with newly created records
     * 
     * @param array $current_records
     * @param array $params
     * 
     * @return array
     */
    public static function merger(array $current_records, array $params)
    {
        return self::merge($current_records, $params);
    }

    /**
     * Merge old Transaction Record with New ones
     * 
     * @param array $old
     * @param array $addition

     * @return array
     */
    protected static function merge(array $old, array $addition)
    {
        return array_push($old, $addition) ? $old : [];
    }
}
