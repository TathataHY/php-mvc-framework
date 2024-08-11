<?php

use app\core\form\Form;
use app\core\View;
use app\models\LoginForm;


/** @var LoginForm $model */
/** @var View $this */

$this->title = 'Login';

?>

<h1>Login</h1>

<?php $form = Form::begin('/login', 'post'); ?>

<?= $form->field($model, 'email')->emailField(); ?>
<?= $form->field($model, 'password')->passwordField(); ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?= Form::end(); ?>