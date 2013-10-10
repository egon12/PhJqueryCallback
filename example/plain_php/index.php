<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<link href="css/style.css" rel="stylesheet"/>
<h1>Testing PHPJQueryCallback</h1>
<p>Type this in the query and then Press Enter</p>
<pre>

write on left div
write before center div
write after right div
alert something
copy left to right
js: prompt('input in this');

</pre>

<form id="form1" action="controller.php">
<input type="text" name="query" />
</form>

<div id="left-div"  class="test-div" >Left Div</div>
<div id="center-div"class="test-div" >Center Div</div>
<div id="right-div" class="test-div" >Right Div</div>

<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js/phpjquery.js" type="text/javascript"></script>
<script>
    $(function() {
        $('#form1').phpjquerycallback();
    });
</script>

</html>
