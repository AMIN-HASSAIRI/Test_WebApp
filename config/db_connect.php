<?php
    $host     ='sql103.epizy.com';
    $dbname   ='epiz_30859677_db_products';
    $username ='epiz_30859677';
    $password ='kP8Dz1tgLRpGu'; 

    //set DSN (data source name)
    $dsn      ='mysql:host='.$host.';dbname='.$dbname; 

    // connect to database
    try{
        //create a PDO instance
        $conn= new PDO($dsn,$username,$password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
	// check connection
	catch(PDOException $e){
        echo "Connection failed!" .$e->getMessage();
    }
?>