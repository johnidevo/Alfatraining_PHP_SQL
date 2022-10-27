<?php

#set html content variable
#set data variable for javascript if needed
#

global $aRouter, $aPage, $aResults, $aScheduler;
$aPage = array();
$aPage['content'] = $aPage['planer_content'] = $aPage['scheduler_sidebar'] = '';
$aPage['title'] = 'Scheduler liste';
$aColors = array(
	array('#000', '#febc56'), 
	array('#000', '#8cc63f'), 
	array('#fff', '#0071bc'), 
	array('#fff', '#93005d'), 
	array('#fff', '#662d91')
);

# uri
if (!isset($aRouter['month'])) $sUserSelection = time();
else $sUserSelection = strtotime($aRouter['month'] .'01 12:00:00');

/* Content */
$aTableWeekDays = array('Mon.','Tue.','Wed.','Thu.','Fri.','Sat.','Sun.');
$sTableHeaderContent = array();
foreach($aTableWeekDays as $s) array_push($sTableHeaderContent, '<th>'. $s .'</th>');
# month name and navi
if (!isset($aRouter['month'])) $sLinkFootDate = time();
else $sLinkFootDate = strtotime($aRouter['month'] .'01 12:00:00');
$sMonthPrev = strtotime(date('Y-m-d 12:00:00', $sLinkFootDate) .' - 1 Month');
$sMonthNext = strtotime(date('Y-m-d 12:00:00', $sLinkFootDate) .' + 1 Month');
$aMonthPrev = $aRouter;
$aMonthPrev['month'] = date('Ym', $sMonthPrev);
$aMonthNext = $aRouter;
$aMonthNext['month'] = date('Ym', $sMonthNext);

$aPage['planer_content'] .= '<table>';
$aPage['planer_content'] .= '<thead>';

$aPage['planer_content'] .= '<tr>';
$aPage['planer_content'] .= '<td colspan="1" style="text-align: left;">';
$aPage['planer_content'] .= '<button><a href="/?'. http_build_query($aMonthPrev) .'">'. date('F', $sMonthPrev) .'</a></button>';
$aPage['planer_content'] .= '</td>';
$aPage['planer_content'] .= '<td colspan="5" style="text-align: center;"><b>'. date('F Y', $sUserSelection) .'</b></td>';
$aPage['planer_content'] .= '<td colspan="1" style="text-align: right;">';
$aPage['planer_content'] .= '<button><a href="/?'. http_build_query($aMonthNext) .'">'. date('F', $sMonthNext) .'</a></button>';
$aPage['planer_content'] .= '</td>';
$aPage['planer_content'] .= '</tr>';

#$aPage['planer_content'] .= '<tr><th colspan="7">'. date('F Y', $sUserSelection) .'</th></tr>';
#$aPage['planer_content'] .= '<tr>'. implode('', $sTableHeaderContent) .'</tr>';

$aPage['planer_content'] .= '</thead>';

$iDateNow = date('w');
$iDatePrev = date('w', strtotime(date('Y-m-1', $sUserSelection))) - 1;
$iDateNext = 7 - date('w', strtotime(date('Y-m-t', $sUserSelection)));

$iDatePrevTable = strtotime(date('Y-m-1', $sUserSelection) .' - '. $iDatePrev .' days'); //
$iDateNextTable = strtotime(date('Y-m-t', $sUserSelection) .' + '. $iDateNext .' days'); //<<

$aUpdateLink = $aRouter;
$aUpdateLink['page'] = 'planer';

$aPage['planer_content'] .= '<tbody>';
$sField = '';
for ($i = $iDatePrevTable, $k=0; $i <= $iDateNextTable; $i = $i + (24*60*60), $k++)
{
	# appointments
	$aAppointments = array();
	foreach($aResults as $aDataDate)
	{
		if (date('Ymd', $i) == date('Ymd', (int)$aDataDate['date']))
		{
			$aUpdateLink['update'] = (int)$aDataDate['id'];
			$iKeyColor = array_rand($aColors);
			$sLinkStyle = 'background-color:'. $aColors[$iKeyColor][1] .'; color:'. $aColors[$iKeyColor][0] .';';
			$sAppointment = '<a style="'. $sLinkStyle .'" href="/?'. http_build_query($aUpdateLink) .'">'. date('H:i', $aDataDate['date']) .'</a>';
			array_push($aAppointments, $sAppointment);
		}
	}
	
	# calendar
	$sField .= '<td>';
	if (date('Ym', time()) == date('Ym', $i)) 
		$sField .= '<b>'. html_scheduler_label_day(date('d', $i), $i) .'</b><br/>';
	else 
		$sField .= html_scheduler_label_day(date('d', $i), $i) .'<br/>';
	$sField .= implode(PHP_EOL, $aAppointments);
	$sField .= '</td>';
	
	if ($k == 6){
		$k = -1;
		$aPage['planer_content'] .= '<tr>'. $sField .'</tr>';
		$sField = '';
	}
}

# table footer
/*
if (!isset($aRouter['month'])) $sLinkFootDate = time();
else $sLinkFootDate = strtotime($aRouter['month'] .'01 12:00:00');
$sMonthPrev = strtotime(date('Y-m-d 12:00:00', $sLinkFootDate) .' - 1 Month');
$sMonthNext = strtotime(date('Y-m-d 12:00:00', $sLinkFootDate) .' + 1 Month');
$aMonthPrev = $aRouter;
$aMonthPrev['month'] = date('Ym', $sMonthPrev);
$aMonthNext = $aRouter;
$aMonthNext['month'] = date('Ym', $sMonthNext);

$aPage['planer_content'] .= '<tfoot><tr>';
$aPage['planer_content'] .= '<td colspan="1">';
$aPage['planer_content'] .= '<button><a href="/?'. http_build_query($aMonthPrev) .'">'. date('F', $sMonthPrev) .'</a></button>';
$aPage['planer_content'] .= '</td>';
$aPage['planer_content'] .= '<td colspan="4"></td>';
$aPage['planer_content'] .= '<td colspan="1">';
$aPage['planer_content'] .= '<button><a href="/?'. http_build_query($aMonthNext) .'">'. date('F', $sMonthNext) .'</a></button>';
$aPage['planer_content'] .= '</td>';
$aPage['planer_content'] .= '</tr></tfoot>';
$aPage['planer_content'] .= '</tbody>';
$aPage['planer_content'] .= '</table>';
*/
/*
10 P	5. Daten bearbeiten: Erstellen Sie einen internen Bereich 
		mit einer Anzeige der Verwaltungsübersicht inkl. Sortierung der Daten.		
*/
$aPage['content'] .= '
	<form action="/?'. http_build_query($aRouter) .'" method="post">
		<div id="content">
			<h3>Scheduler liste</h3>
			<hr></br>
			'. $aPage['planer_content'] .'
		</div>
	</form>
';

function html_scheduler_label_day($sName, $iValue){
	return '<label for="date_'. $sName .'">'. $sName .'</label>';
}



?>
