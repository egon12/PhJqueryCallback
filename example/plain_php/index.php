<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<h1>Testing PHPJQueryCallback</h1>
<p>Type this in the query and then Press Enter</p>
<pre>

write on left div
write on center div
write after right div
alert something
js: prompt('input in this');

</pre>

<form id="form1" action="controller.php">
<input type="text" name="query" />
</form>

<div id="left-div">Left Div</div>
<div id="center-div">Center Div</div>
<div id="right-div">Right Div</div>

<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js/phpjquery.js" type="text/javascript"></script>
<script>
    $(function() {
        $('#form1').phpjquerycallback();
    });
</script>

</html>
