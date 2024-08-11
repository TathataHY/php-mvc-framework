<?php

use app\core\View;


/** @var Exception $exception */
/** @var View $this */

$this->title = 'Error';

?>

<h3>Exception: <?= $exception->getCode() ?> - <?= $exception->getMessage() ?></h3>