# laravel-odbc-driver

ODBC Driver for Laravel v6.0+

### Prerequisites
* The composer.json file use the "auto discover" function so you must have laravel ^6.0
* You must create a ODBC in your operating system

### Installation

### Install package with composer
```
composer require BKD/laravel-odbc-driver
```

#### Run composer update
```
composer update
```

#### Add odbc to config/database.php
```
        'odbc' => [
            'driver' => 'odbc',
            'dsn' => 'dns name',
            'grammar' => 'SqlServerGrammar',
            'username' => 'username',
            'password' => 'password',
            'database' => 'database'
        ],
```

### Test
```
@php
    $array = DB::connection('odbc')->select('raw sql query');
    dd($array);
@endphp
```

### Forked from:
* Adrian Gomez @ https://github.com/AdrianGomezCL/laravel-odbc-driver
