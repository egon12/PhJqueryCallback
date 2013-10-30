<?php 

require_once 'lib/PHPJQueryCallback.php';
$callback = new PHPJQueryCallback();


if (isset($_POST['method'])) {
    $callback->alert('Data is '.$_POST['method'].'ed.');
    $callback->send();
} else {
    $callback->alert('Error please Refresh');
    $callback->send();
}
