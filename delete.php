<?php

session_start();
echo "<h1>DELETE INFORMATION</h1>";

echo "Are you sure you want to delete the user?";
?>
<html>
<body>
<form method="post" action="delete2.php" method="post">

		<input type="submit" name="delete" value="Delete">

	</form>
</body>
</html>
