PHPJqueryCallback
=================

Call jquery from php with ajax

Sometimes when you need robust User Interface It's safer to validate in
PHP and then send instruction to client what it has to do.

To use it with CodeIgniter put PHPJqueryCallback.php in Library
And then 

<pre>
$this->load->library('PHPJQueryCallback');
$callback = new PHPJqueryCallback();
$callback->alert('something');
$callback->send();
</pre>

API
Not all of jquery API can be used

<pre> 
$callback->alert($msg); 
</pre>

<pre>
$callback->html($selector, $msg);
</pre>

<pre>
$callback->append($selector, $msg);
</pre>

<pre>
$callback->focus($selector);
</pre>

<pre>
$callback->val();
</pre>
Set the value of input

<pre>
$callback->redirect($url);
</pre>
Redirect to another page. Ajax Redirect

<pre>
$callback->jseval($js_script);
</pre>
Execute javascript. *Not Recomended* 
It will make your code hard to read


Multiple callback

You can use the function multiple times like

<pre>
$callback->html('#hole1', 'This is hole 1');
$callback->html('#hole2', 'This is hole 2');
$callback->send();
</pre>
