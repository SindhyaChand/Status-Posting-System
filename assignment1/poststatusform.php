<!Doctype html>
<html>
<head>
<title>Status Posting</title>
<link href="style.css" rel="stylesheet">
</head>

<div id ="main">

<h2>Status Posting System </h2>

<form name="poststatusform" action="poststatusprocess.php" method = "post">

<fieldset id="poststatusfieldset">
<legend>Posting Form</legend>

<p>Status Code(required):
	<input type="text"  name="statusCode" maxlength="5" value="S" required /></p>

<p>Status(required):
	<textarea name="status" cols="20" rows="2" required/></textarea></p>

<p>Share:			
	<input type="radio" name="sharetype" value="public" />Public
	<input type="radio" name="sharetype" value="friends"/>Friends
	<input type="radio" name="sharetype" value="onlyme" />Only Me</p>
<p>Date:
	<input type="date" name="date" value="<?php echo date('Y-m-d');?>" required>

<p>Permission Type:
	<input type="checkbox" name="permission" value="allowlike"/>Allow Like
	<input type="checkbox" name="permission" value="allowcomment"/>Allow Comment
	<input type="checkbox" name="permission" value="allowshare"/>Allow Share</p>

<input type="submit" value="Post"/>
<input type="reset"  value="Reset"/>
</fieldset>
<p>
<span class="alignright"><a href="index.html">Return to Home Page</a></span></p>

</form>
</div>
</body>
</html>