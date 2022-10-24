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
	$sField .= '<td><b>'. html_scheduler_radio_day(date('d', $i), $i) .'</b></td>';
	else $sField .= '<td>'. html_scheduler_radio_day(date('d', $i), $i) .'</b></td>';
	if ($k == 6){
		$k = -1;
		$aPage['scheduler_content'] .= '<tr>'. $sField .'</tr>';
		$sField = '';
	}
}
$aPage['scheduler_content'] .= '</tbody>';
$aPage['scheduler_content'] .= '</table>';

/*
10 P	5. Daten bearbeiten: Erstellen Sie einen internen Bereich 
		mit einer Anzeige der Verwaltungsübersicht inkl. Sortierung der Daten.		
*/
$aPage['content'] .= '
	<form action="/?'. http_build_query($aRouter) .'" method="post">
		<div id="content">
			<h3>Scheduler liste</h3>
			<hr></br>
			'. $aPage['scheduler_content'] .'
		</div>
	</form>
';

function html_scheduler_radio_day($sName, $iValue){
	return '<label for="date_'. $sName .'">'. $sName .'</label>';
}




?>
