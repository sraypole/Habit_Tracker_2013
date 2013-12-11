<!DOCTYPE html>
<head>
<title>Calendar</title>

<style>
h2
{
	text-align:center;
}

table.calendar
{ 
	border-left:1px solid #000; 
	margin-right:auto; 
	margin-left:auto;
}

tr.calendar-row {}

td.calendar-day	
{ 
	min-height:70px; 
	font-size:11px; 
	position:relative; 
} * html div.calendar-day { height:70px; }

td.calendar-day-blank	
{ 
	background:#EEE; 
	min-height:70px; 
} * html div.calendar-day-blank { height:70px; }

td.calendar-day-head 
{ 
	background:#CCC; 
	font-weight:bold; 
	text-align:center; 
	width:110px; 
	padding:5px; 
	border-bottom:1px solid #000; 
	border-top:1px solid #000; 
	border-right:1px solid #000; 
}

div.day-number		
{ 
	background:#FFF; 
	padding:2px; 
	color:#000; 
	font-size:14px; 
	font-weight:bold; 
	float:left; 
	margin:0px -5px 0 0; 
	width:20px; 
	text-align:center; 
	border-bottom:1px solid #000; 
	border-right:1px solid #000; 
}

/* Shared style */
td.calendar-day, td.calendar-day-blank 
{ 
	width:110px; 
	height:70px; 
	padding:0px; 
	border-bottom:1px solid #000; 
	border-right:1px solid #000; 
}
</style>
</head>

<body>
<?php
//Draws a calendar

$month = array("January","February","March","April","May","June","July","August","September","October","November","December");

echo "<h2>".$month[date('m') - 1]." ".date('Y')."</h2>";

//Draw table

echo '<table cellpadding="0" cellspacing="0" class="calendar">';

//Table headings
$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
echo '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

//Variables for days and weeks
$running_day = date('w',mktime(0,0,0,date('m'),1,date('y')));
$days_in_month = date('t',mktime(0,0,0,date('m'),1,date('y')));
$days_in_week = 1;
$day_counter = 0;

//Row for week one

echo '<tr class="calendar-row">';

//Print "blank" days until first day of the current month
for ($x = 0; $x < $running_day; $x++)
{
	
	echo '<td class="calendar-day-blank"> </td>';
	
	$days_in_week++;
}

//Continue days of the month
for ($list_day = 1; $list_day <= $days_in_month; $list_day++)
{
	if ($list_day > date('d'))
	{
	
	echo '<td class="calendar-day">';
	?>
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	
	<td width="120" height="80" background="lock.png" valign="top">
	
	<!--<a href="test.html"><?php echo '<div class="day-number">'.$list_day.'</div>';?></a>-->
	<?php echo '<div class="day-number">'.$list_day.'</div>';?>
	</td>
	
	</tr>
	</table>
		
	<?php 
	}
	else
	{
	
	echo '<td class="calendar-day">';
	?>
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	
	<td width="120" height="80" background="blank.png" valign="top">
	
	<a href="test.php?ID=<?php echo $list_day; ?>"><?php echo '<div class="day-number">'.$list_day.'</div>';?></a>
	</td>
	
	</tr>
	</table>
		
	<?php 

	}
		//Add in number for day
		//echo str_repeat('<p> </p>',2);
		
		echo '</td>';
	
	if ($running_day == 6)
	{
		echo '</tr>';
		if (($day_counter + 1) != $days_in_month)
		{
			echo '<tr class="calendar-row">';
			
		}
		$running_day = -1;
		$days_in_week = 0;
	}
	$days_in_week++; 
	$running_day++; 
	$day_counter++;
}

//Finish the rest of the days in the week
if ($days_in_week < 8 && $days_in_week != 1)
{
	for ($x = 1; $x <= (8 - $days_in_week); $x++)
	{
		echo '<td class="calendar-day-blank"> </td>';
	}
}


echo '</tr>';
echo '</table>';

?>
</body>

</html>
