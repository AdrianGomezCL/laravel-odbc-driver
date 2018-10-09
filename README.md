# laravel-odbc-driver

ODBC Driver for Laravel 5.5+

### Prerequisites
The composer.json file use the "auto discover" function so you must have laravel ^5.5

### Installation

#### Add vcs repository to composer.json
```
"repositories": [
    { "type": "vcs", "url": "https://github.com/AdrianGomezCL/laravel-odbc-driver" }
],
```

#### Add require to composer.json
```
"require": {
  "agomez/laravel-odbc-driver" : "1.0"
}
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
            'grammar' => 'DB2',
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

### Original
* Cody Covey @ https://github.com/ccovey/odbc-driver