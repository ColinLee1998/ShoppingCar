<?php
    session_start();
    unset($_SESSION['customer']);
    $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'colin', '19981217');
    $sql=$pdo->prepare('select * from customer where login=? and password=?');
    $sql->execute( [$_REQUEST['login'], $_REQUEST['password']]);
    foreach ($sql->fetch() as $row) {
        $_SESSION['customer']=[ 
            'id'=>$row['id'], 'name'=>$row['name'], 'address'=>$row['address'], 
            'login'=>$row['login'], 'password'=>$row['password']
        ];
    }

    if (isset($_SESSION['customer'])) {
        echo '您好', $_SESSION['customer']['name'], '、歡迎光臨。';
    } else {
        echo '登入的帳號密碼錯誤。';
    }
?>