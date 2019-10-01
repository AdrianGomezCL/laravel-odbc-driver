<?php

namespace BKD\ODBCDriver;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Processors\Processor;

/**
 * Class ODBCDriverProcessor
 * @package BKD\ODBCDriver
 */
class ODBCDriverProcessor extends Processor
{

    /**
     * Process an  "insert get ID" query.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @param  string  $sql
     * @param  array   $values
     * @param  string  $sequence
     * @return int
     */
    public function processInsertGetId(Builder $query, $sql, $values, $sequence = null)
    {
        $query->getConnection()->insert($sql, $values);

        try {
            $id = $query->getConnection()->getPdo()->lastInsertId();
        } catch (\PDOException $e) {
            if ($e->getCode() == 'IM001') {
                $sth = $query->getConnection()->getPdo()->query("SELECT CAST(COALESCE(SCOPE_IDENTITY(), @@IDENTITY) AS int)");
                $sth->execute();
                $result = $sth->fetch();
                $id = $result[0];
            } else throw $e;
        }

        return is_numeric($id) ? (int) $id : $id;
    }
}
