<?php

require_once('lib/PHPJQueryCallback.php');
$callback = new PHPJQueryCallback();

$query = $_GET['query'];

if ($query == 'write on left div')
{
    $callback->html('#left-div', $query);
} 
elseif ($query == 'write before center div')
{
    $callback->before('#center-div', $query);
}
elseif ($query == 'write after right div')
{
    $callback->after('#right-div', $query);
}
elseif ($query == 'alert something')
{
    $callback->alert('something');
}
elseif (substr($query,0,3) == 'js:')
{
    $callback->jseval(substr($query,3));
}
else
{
    $callback->alert("the controller.php not know instruction '$query'");

}

$callback->destroy();
