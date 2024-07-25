<!DOCTYPE html>
<head>
<title>Dynamic Drop Down</title>
</head>
<body>
<h1>Drop Down Sample</h1>
<hr>
<select id = "country" name="country">
<option value="">Select Country</option>
<?php
foreach($country as $row)
{
echo "<option value=$row->country_id>$row->country_name</option>";
}
?>
</select>
</body>
</html>