<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['script'] = '';
$aPage['title'] = 'Suche';

$iDateCurrentMonth = date('n', time());
#var_dump($iDateCurrentMonth);
#()

echo '<pre>';
for ($i = $iDateCurrentMonth, $j = 0; $j <= 12; $i++, $j++)
{
	$iSelectYear = (int) date('Y', time());
	$iSelectMonth = date('F', strtotime($iSelectYear .'-'. str_pad($i, 2, 0, STR_PAD_LEFT) .'-01') );
	if ($i == 12) {$i = 0; $iSelectYear = $iSelectYear + 1;}
	
	var_dump(array(
		$i
		$iSelectYear,
		date('F', strtotime('2022-'. str_pad($i, 2, 0, STR_PAD_LEFT) .'-01') ), 
		str_pad($i, 2, 0, STR_PAD_LEFT)
	));
}
echo '</pre>';

$aPage['content'] .= '
	<div id="sidebar">
	</div>
	<div id="content">
		<h3>Suche</h3>
		<hr></br>
		<label for="cars">Wählen Sie einen Monat aus: </label>
		<select name="cars" id="cars">
			<option value=""></option>
		</select>
	</div>
';



function calendar_init()
{
	global $aRouter;
	return true;
}


?>
