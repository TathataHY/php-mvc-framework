<?php

use app\core\form\Form;
use app\core\View;
use app\models\ContactForm;


/** @var ContactForm $model */
/** @var View $this */

$this->title = 'Contact Us';

?>

<h1>Contact Us</h1>

<?php $form = Form::begin('/contact', 'post'); ?>

<?= $form->field($model, 'subject'); ?>
<?= $form->field($model, 'email')->emailField(); ?>
<?= $form->textareaField($model, 'message'); ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?= Form::end(); ?>