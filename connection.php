<?php 

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $connect = mysqli_connect(
        'db', 
        'root', 
        $_ENV['MYSQL_ROOT_PASSWORD'], 
        'estoque'
    );
} catch (mysqli_sql_exception $error) {
    error_log($error->getMessage());
    die('Erro na conexão com o banco de dados.');
}
