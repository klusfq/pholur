<?php
/**
 * 三层封装
 * 1. 上层api，专注于用户使用/实例化
 * 2. 中层封装，专注于类型变换（php类型 -> cData类型）
 * 3. 下层交互，专注于调用libc接口（动态链接库函数、cData类型 -> PLDB_*类型）
 */
use \Pholo\Utils\Loger;

require __DIR__ . '/../vendor/autoload.php';

const PRO_INIT_PATH = __DIR__ . '/../include';

Loger::setColor();

Loger::info(PRO_INIT_PATH);

$db = \Pholo\Database::openFile('./data/pholo.db');

$col = $db->collection('study');

// step 1
$doc = new Pholo\Document([
    'user' => 'klusfq',
]);

$oList = Pholo\Internal\BaseCURD::find($db, $col, $doc);

var_dump($oList);

// step 2
