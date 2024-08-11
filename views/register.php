<?php

use app\core\form\Form;
use app\core\View;
use app\models\User;


/** @var User $model */
/** @var View $this */

$this->title = 'Register';

?>

<h1>Create an Account</h1>

<?php $form = Form::begin('/register', 'post'); ?>

<div class="row">
    <div class="col">
        <?= $form->field($model, 'firstname'); ?>
    </div>
    <div class="col">
        <?= $form->field($model, 'lastname'); ?>
    </div>
</div>
<?= $form->field($model, 'email')->emailField(); ?>
<?= $form->field($model, 'password')->passwordField(); ?>
<?= $form->field($model, 'confirmPassword')->passwordField(); ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?= Form::end(); ?>