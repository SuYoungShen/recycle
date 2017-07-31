<?php
  try {
    $username = 'u235232766_roo';
    $password = '12345678';
    $dbname="u235232766_book";
    $dsn = "mysql:host=mysql.hostinger.com.hk;dbname=$dbname";
           $options = array(
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                 );
       $db = new PDO($dsn, $username, $password, $options);
  } catch (Exception $e) {
    echo "失敗";
  }
?>
