<?php
	require('draft.php');
?>

<!doctype html>
<html lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>

<table>
	<thead>
		<tr>
			<th>Month</th>
			<th>Savings</th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			<td>January</td>
			<td>$100</td>
		</tr>
	</tbody>

	<tfoot>
		<tr>
			<td>Sum</td>
			<td>$180</td>
		</tr>
	</tfoot>
</table> 
	
<?php

	var_dump(array(
		__FILE__,
		'BIN_BIN_BIN_BIN',
		BIN,
		file_get_contents(DRAFT .'static/main.js'),
		file_exists(BIN .'.gitkeep')
	));
	var_dump('####+');
	var_dump(scandir(DRAFT));
	
	var_dump(scandir(DRAFT));
	
	print '<script type="text/javascript">'. file_get_contents(DRAFT .'static/main.js') .'</script>';
?>
	
</body>

</html>