<?php

#set html content variable
#set data variable for javascript if needed
#

global $aRouter, $aPage, $aResults, $aScheduler;
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

if (!isset($aRouter['date'])) $sUserSelection = time();
else $sUserSelection = strtotime($aRouter['date'] .'01 12:00:00');
$iDateMonth = date('n', time());
$aSelectOptions = array();
for ($i = $iDateMonth, $j = 0; $j <= 11; $i++, $j++)
{
	if ($j == 0) $iSelectYear = (int) date('Y', time());
	$iSelectMonth = str_pad($i, 2, 0, STR_PAD_LEFT);
	$sSelectMonth = date('F', strtotime($iSelectYear .'-'. str_pad($i, 2, 0, STR_PAD_LEFT) .'-01') );
	if ($i == 12) $i = 0; 
	if ($i == 1) $iSelectYear = $iSelectYear + 1;
	if (isset($aRouter['date']) && $aRouter['date'] == $iSelectYear.$iSelectMonth) $sSelected = 'selected';
	else $sSelected = '';
	$sOption = '<option value="'. $iSelectYear.$iSelectMonth .'" '. $sSelected .'>'. $iSelectYear .' - '. $sSelectMonth .'</option>';
	array_push($aSelectOptions, $sOption);
}

# Content 
$aTableWeekDays = array('Mon.','Tue.','Wed.','Thu.','Fri.','Sat.','Sun.');
$sTableHeaderContent = array();
foreach($aTableWeekDays as $s) array_push($sTableHeaderContent, '<th>'. $s .'</th>');

$iDateNow = date('w');
$iDatePrev = date('w', strtotime(date('Y-m-1', $sUserSelection))) - 1;
$iDateNext = 7 - date('w', strtotime(date('Y-m-t', $sUserSelection)));

$iDatePrevTable = strtotime(date('Y-m-1', $sUserSelection) .' - '. $iDatePrev .' days'); //
$iDateNextTable = strtotime(date('Y-m-t', $sUserSelection) .' + '. $iDateNext .' days'); //<<

$aPage['scheduler_content'] .= '<table>';
$aPage['scheduler_content'] .= '<thead>';
$aPage['scheduler_content'] .= '<tr><th colspan="3">';
$aPage['scheduler_content'] .= '<label for="suche_date">Wählen einen Monat aus:</label>';
$aPage['scheduler_content'] .= '<select name="date">'. implode('', $aSelectOptions) .'</select>';
$aPage['scheduler_content'] .= '</th>';
$aPage['scheduler_content'] .= '<th colspan="4">';
$aPage['scheduler_content'] .= '<label for=""><br/></label>';
$aPage['scheduler_content'] .= '<input type="submit" value="Vorlegen" />';
$aPage['scheduler_content'] .= '</th></tr>';
$aPage['scheduler_content'] .= '<tr><th colspan="7">'. date('F', $sUserSelection) .'</th></tr>';
$aPage['scheduler_content'] .= '<tr>'. implode('', $sTableHeaderContent) .'</tr></thead>';
$aPage['scheduler_content'] .= '<tbody>';

/*
# Content
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
*/


$aUpdateLink = $aRouter;
$aUpdateLink['page'] = 'planer';
#$aPage['scheduler_content'] .= '<tbody>';
$sField = '';
for ($i = $iDatePrevTable, $k=0; $i <= $iDateNextTable; $i = $i + (24*60*60), $k++)
{
	$aAppointments = array();
	foreach($aResults as $aDataDate)
	{
		if (date('Ymd', $i) == date('Ymd', (int)$aDataDate['date']))
		{
			$aUpdateLink['id'] = (int)$aDataDate['id'];
			$iKeyColor = array_rand($aColors);
			$sLinkStyle = 'background-color:'. $aColors[$iKeyColor][1] .'; color:'. $aColors[$iKeyColor][0] .';';
			$sAppointment = '<a style="'. $sLinkStyle .'" href="/?'. http_build_query($aUpdateLink) .'">'. date('H:i', $aDataDate['date']) .'</a>';
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
$aPage['scheduler_content'] .= '<tfoot><tr><td colspan="1">';
$aPage['scheduler_content'] .= '' .PHP_EOL;
$aPage['scheduler_content'] .= '</td><td colspan="5"></td><td colspan="1">';
$aPage['scheduler_content'] .= '' .PHP_EOL;
$aPage['scheduler_content'] .= '</td></tr></tfoot>';
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



?>
