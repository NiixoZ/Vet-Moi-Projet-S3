<?php
declare(strict_types=1);

require "autoload.php";
Session::start();

$webPage = new WebPage("Boutique");

$rqt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT SHA2(lastName, 512) FROM Users
    WHERE email = "bob";
SQL);
$rqt->execute();
$a = $rqt->fetch();
var_dump($a);

echo $webPage->toHTML();