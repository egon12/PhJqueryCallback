PHPJqueryCallback
=================

Call jquery from php with ajax

Sometimes when you need robust User Interface It's safer to validate in
PHP and then send instruction to client what it has to do.

To use it with CodeIgniter put PHPJqueryCallback.php in Library
And then 

$this->load->library('PHPJQueryCallback');

$callback = new PHPJqueryCallback();
$callback->alert('something');
$callback->destroy();

API
Not all of jquery API can be used

$callback->alert($msg);

$callback->html($selector, $msg);

$callback->append($selector, $msg);

$callback->focus($selector);

$callback->val();
Set the value of input

$callback->redirect($url);
Redirect to another page. Ajax Redirect

$callback->jseval($js_script);
Execute javascript. *Not Recomended* 
It will make your code hard to read


Multiple callback

You can use the function multiple times like
$callback->html('#hole1', 'This is hole 1');
$callback->html('#hole2', 'This is hole 2');
$callback->destroy();
