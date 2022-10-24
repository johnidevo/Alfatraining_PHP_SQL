<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage, $aResults, $aScheduler;
$aPage = array();
$aPage['content'] = $aPage['scheduler_content'] = $aPage['scheduler_sidebar'] = '';
$aPage['title'] = 'Scheduler liste';
$aColors = array(
	array('#000', '#febc56'), 
	array('#000', '#8cc63f'), 
	array('#fff', '#0071bc'), 
	array('#fff', '#93005d'), 
	array('#fff', '#662d91')
);

/* Content */
$aTableWeekDays = array('Mon.','Tue.','Wed.','Thu.','Fri.','Sat.','Sun.');
$sTableHeaderContent = array();
foreach($aTableWeekDays as $s) array_push($sTableHeaderContent, '<th>'. $s .'</th>');

$aPage['scheduler_content'] .= '<table>';
$aPage['scheduler_content'] .= '<thead><tr><th colspan="7">'. date('F', time()) .'</th></tr>';
$aPage['scheduler_content'] .= '<tr>'. implode('', $sTableHeaderContent) .'</tr></thead>';

$iDateNow = date('w');
$iDatePrev = date('w', strtotime(date('Y-m-1', time()))) - 1;
$iDateNext = 7 - date('w', strtotime(date('Y-m-t', time())));

$iDatePrevTable = strtotime(date('Y-m-1', time()) .' - '. $iDatePrev .' days'); //
$iDateNextTable = strtotime(date('Y-m-t', time()) .' + '. $iDateNext .' days'); //<<

$aPage['scheduler_content'] .= '<tbody>';
$sField = '';
for ($i = $iDatePrevTable, $k=0; $i <= $iDateNextTable; $i = $i + 86400, $k++)
{
	#if (date('m', time()) == date('m', $i))
	$aAppointments = array();

	foreach($aResults as $aDataDate)
	{
		if (date('Ymd', $i) == date('Ymd', (int)$aDataDate['date']))
		{
			$iKeyColor = array_rand($aColors);
			$sAppointment = '<a style="background-color:'. $aColors[$iKeyColor][1] .'; color:'. $aColors[$iKeyColor][0] 
				.'" href="/'. $aDataDate['id'] .'">'. $aDataDate['date'] .'</a>';
			array_push($aAppointments, $sAppointment);
		}
	}
	$sField .= '<td>';
	$sField .= html_scheduler_label_day(date('d', $i), $i) .'<br/>';
	$sField .= implode(PHP_EOL, $aAppointments);
	$sField .= '</td>';
	
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

function html_scheduler_label_day($sName, $iValue){
	return '<label for="date_'. $sName .'">'. $sName .'</label>';
}


#var_dump($aResults);
#var_dump($aResults);

?>
