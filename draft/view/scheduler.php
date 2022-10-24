<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['scheduler_content'] = $aPage['scheduler_sidebar'] = '';
$aPage['title'] = 'Scheduler liste';


/* Content */
$aTableWeekDays = array('Mon.','Tue.','Wed.','Thu.','Fri.','Sat.','Sun.');
$sTableHeaderContent = array();
foreach($aTableWeekDays as $s) array_push($sTableHeaderContent, '<th>'. $s .'</th>');

$aPage['scheduler_content'] .= '<table>';
$aPage['scheduler_content'] .= '<thead><tr>'. implode('', $sTableHeaderContent) .'</tr></thead>';

$iDateNow = date('w');
$iDatePrev = date('w', strtotime(date('Y-m-1', time()))) - 1;
$iDateNext = 7 - date('w', strtotime(date('Y-m-t', time())));

$iDatePrevTable = strtotime(date('Y-m-1', time()) .' - '. $iDatePrev .' days'); //
$iDateNextTable = strtotime(date('Y-m-t', time()) .' + '. $iDateNext .' days'); //<<

$aPage['scheduler_content'] .= '<tbody>';
$sField = '';
for ($i = $iDatePrevTable, $k=0; $i <= $iDateNextTable; $i = $i + 86400, $k++)
{
	if (date('m', time()) == date('m', $i)) 
	$sField .= '<td><b>'. html_planer_radio_day(date('d', $i), $i) .'</b></td>';
	else $sField .= '<td>'. html_planer_radio_day(date('d', $i), $i) .'</b></td>';
	if ($k == 6){
		$k = -1;
		$aPage['scheduler_content'] .= '<tr>'. $sField .'</tr>';
		$sField = '';
	}
}
$aPage['scheduler_content'] .= '</tbody>';
$aPage['scheduler_content'] .= '</table>';


/* Sidebar */
$aPage['scheduler_sidebar'] .= '<table><thead><tr><td>Besprechungsstunde</td></tr></thead>';
$aPage['scheduler_content'] .= '<tbody>';
for ($i = 9; $i <= 15; $i++)
{
	$sField .= '<td>'. html_planer_radio_hour($i) .'</b></td>';
	$aPage['scheduler_sidebar'] .= '<tr>'. $sField .'</tr>';
	$sField = '';
}
$aPage['scheduler_content'] .= '</tbody>';
$aPage['scheduler_sidebar'] .= '<tfoot><tr><td><input type="submit" value="Einreichen"></td></tr></tfoot>';
$aPage['scheduler_sidebar'] .= '</table>';


/*
10 P	3. Daten anzeigen: Erstellen Sie einen รถffentlichen Bereich 
		mit einer Anzeige.		
*/
$aPage['content'] .= '
	<form action="/?'. http_build_query($aRouter) .'" method="post">
		<div id="content">
			<h3>Terminplaner</h3>
			<hr></br>
			'. $aPage['scheduler_content'] .'
		</div>
		<div id="sidebar">
			<h3>Stunden auswählen</h3>
			<hr></br>
			'. $aPage['scheduler_sidebar'] .'
		</div>
	</form>
';

function html_planer_radio_day($sName, $iValue){
	return '<label for="date_'. $sName .'">'. $sName .'</label>
	<input value="'. $iValue .'" type="radio" name="date_planer" id="date_'. $sName .'">';
}

function html_planer_radio_hour($i){
	return '<input value="'. str_pad($i, 2, 0, STR_PAD_LEFT) .':00:00" type="radio" name="hour_planer" id="hour_'. $i .'">
	<label for="hour_'. $i .'">'. str_pad($i, 2, 0, STR_PAD_LEFT) .':00</label>';
}

function planer_init()
{
	global $sPage;
	return true;
}



?>
