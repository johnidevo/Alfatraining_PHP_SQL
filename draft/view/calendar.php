<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['script'] = '';
$aPage['title'] = 'Suche';

$iDateCurrentMonth = date('n', time());
var_dump($iDateCurrentMonth);

$aPage['content'] .= '
	<div id="sidebar">
	</div>
	<div id="content">
		<h3>Suche</h3>
		<hr></br>
		<label for="cars">Wählen Sie einen Monat aus: </label>
		<select name="cars" id="cars">
			<option value="volvo">Volvo</option>
			<option value="saab">Saab</option>
			<option value="mercedes">Mercedes</option>
			<option value="audi">Audi</option>
		</select>
	</div>
';



function calendar_init()
{
	global $aRouter;
	return true;
}


?>
