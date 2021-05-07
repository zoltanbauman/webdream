<?php
require_once __DIR__.'/../vendor/autoload.php';

/**
 * @var \BaumanZoltan\Models\Business $business
 */
$business = include_once __DIR__.'/../resource/testBusines.php';
?>
<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table { border: 1px solid; width: 100%; padding: 0; margin: 0; }
        table td { border: 1px solid; padding: 0; margin: 0; }
    </style>
</head>
<body>
<h1>Aktuális raktár készlet:</h1>
<h2>Termékenként</h2>
<table>
    <?php foreach($business->getProducts()->getProducts() as $storageItem) { ?>
        <tr>
            <td><?php print $storageItem->getProduct()->getSku(); ?></td>
            <td><?php print $storageItem->getQuantity(); ?> db</td>
        </tr>
    <?php } ?>
    <tr>
        <td>Szabad hely:</td>
        <td><?php print $business->getFreeCapacity() ?> db</td>
    </tr>
</table>

<h2>Raktáranként</h2>
<?php foreach($business->getStorages() as $storage) { ?>
    <h3><?php print $storage->getName() ?> (<?php print $storage->getAddress() ?>)</h3>
    <table>
    <?php foreach($storage->getProducts() as $storageItem) { ?>
        <tr>
            <td><?php print $storageItem->getProduct()->getSku() ?></td>
            <td><?php print $storageItem->getQuantity() ?> db</td>
        </tr>
    <?php } ?>
    </table>
<?php } ?>
</body>
</html>