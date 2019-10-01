<?php

namespace BKD\ODBCDriver;

use Illuminate\Support\Arr;
use Illuminate\Database\Connectors\Connector;
use Illuminate\Database\Connectors\ConnectorInterface;
use PDO;

/**
 * Class ODBCDriverConnector
 * @package BKD\ODBCDriver
 */
class ODBCDriverConnector extends Connector implements ConnectorInterface
{

    public function connect(array $config)
    {
        $dsn = $this->getDsn($config);

        $options = $this->getOptions($config);

        $connection = $this->createConnection($dsn, $config, $options);

        return $connection;
    }

    protected function getDsn(array $config)
    {
        extract($config);
        //$dsn = "odbc:{$dsn}; Uid={$username}; Pwd={$password}; Database={$database}";
        return "odbc:{$dsn}";
    }

    /**
     * Create a new PDO connection.
     *
     * @param  string  $dsn
     * @param  array   $config
     * @param  array   $options
     * @return \PDO
     */
    public function createConnection($dsn, array $config, array $options)
    {
        $username = Arr::get($config, 'username');
        $password = Arr::get($config, 'password');

        return new PDO($dsn, $username, $password, $options);
    }
}