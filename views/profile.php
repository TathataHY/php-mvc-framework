<?php

use app\core\View;


/** @var View $this */

$this->title = 'Profile';

?>

<h1>Profile</h1>

<form action="" method="post">
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" id="subject">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>