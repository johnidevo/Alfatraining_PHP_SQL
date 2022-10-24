<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['planer'] = '';

$aPage['title'] = 'Terminplaner';


$aTableWeekDays = array('Mon.','Tue.','Wed.','Thu.','Fri.','Sat.','Sun.');
$sTableHeaderContent = array();
foreach($aTableWeekDays as $s) array_push($sTableHeaderContent, '<th>'. $s .'</th>');

$aPage['planer'] .= '<form action="/?page=planer" method="post"><table>';
$aPage['planer'] .= '<thead><tr>'. implode('', $sTableHeaderContent) .'</tr></thead>';

$iDateNow = date('w');
$iDatePrev = date('w', strtotime(date('Y-m-1', time()))) - 1;
$iDateNext = 7 - date('w', strtotime(date('Y-m-t', time())));

$iDatePrevTable = strtotime(date('Y-m-1', time()) .' - '. $iDatePrev .' days'); //
$iDateNextTable = strtotime(date('Y-m-t', time()) .' + '. $iDateNext .' days'); //<<

$aPage['planer'] .= '<tbody>';
$sField = '';
for ($i = $iDatePrevTable, $k=0; $i <= $iDateNextTable; $i = $i + 86400, $k++)
{
	if (date('m', time()) == date('m', $i)) 
	$sField .= '<td><b>'. html_planer_radio(date('d', $i)) .'</b></td>';
	else $sField .= '<td>'. html_planer_radio(date('d', $i)) .'</b></td>';
	if ($k == 6){
		$k = -1;
		$aPage['planer'] .= '<tr>'. $sField .'</tr>';
		$sField = '';
	}
}
$aPage['planer'] .= '</tbody>';
$aPage['planer'] .= '</table></form>';



/*
    <label for="peas">Do you like peas?</label>
    <input type="checkbox" name="peas" id="peas">
*/

/*
10 P	3. Daten anzeigen: Erstellen Sie einen รถffentlichen Bereich 
		mit einer Anzeige.		
*/
$aPage['content'] .= '<main>
	<div class="container">
		<div id="content">
			<h3>Terminplaner</h3>
			<hr></br>
			'. $aPage['planer'] .'
		</div>
		<div id="sidebar">
		
			<h3></h3>
		</div>
	</div>
</main>';

function html_planer_radio($i){
	return '<label for="date_'. $i .'">'. $i .'</label>
	<input type="radio" name="date_planer" id="date_'. $i .'">';
}

function planer_init()
{
	#global $sPage;
	return true;
}


?>
