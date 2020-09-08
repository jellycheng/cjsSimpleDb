<?php
require_once __DIR__ . '/common.php';

$dbConfig = include __DIR__ . '/dbconfig.php';

$myPdo = \CjsDb\MysqlPdo::getInstance($dbConfig['xiuno']);
$tables = $myPdo->getTables();
echo "所有表sql如下：" . PHP_EOL;
var_export($tables);

echo PHP_EOL . "bbs_user表字段信息如下：" . PHP_EOL;
var_export($myPdo->getDbTableFields('bbs_user'));

echo PHP_EOL . "bbs_user表结构信息如下：" . PHP_EOL;
echo $myPdo->getDbTableSchema('bbs_user');

//查询一条记录
$selectSql = "select * from bbs_user where uid = 1";
$dataOne = $myPdo->getOne($selectSql);
var_export($dataOne);

//查询多条记录
$selectSql = "select * from bbs_user where uid in(1,2)";
$dataMore = $myPdo->get($selectSql);
var_export($dataMore);

/**
//插入记录
$time = time();
$ext = [
    'user_id'=>1234567890,
    'user_token'=>uniqid(),
    'active_time'=>$time,
    'create_time'=>$time,
    'update_time'=>$time,
];
$insertSql = \CjsDb\Util::getInsertSql('t_user_token_1', $ext);
echo $insertSql . PHP_EOL;
$insertid = $myPdo->insert($insertSql);
echo "插入ID：" . $insertid . PHP_EOL;

//更新记录
$updateSql = "update t_user_token_1 set active_time=" . $time . ",device_id='" . uniqid("", true) . "' where user_id=" . $ext['user_id'];
$affectNum = $myPdo->exec($updateSql);
echo "影响记录数：" . $affectNum . PHP_EOL;

*/



