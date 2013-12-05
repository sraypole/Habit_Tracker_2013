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
        min-height:80px; 
        font-size:11px; 
        position:relative; 
} * html div.calendar-day { height:80px; }

td.calendar-day:hover        
{ 
        background:#ECEFF5; 
}

td.calendar-day-blank        
{ 
        background:#EEE; 
        min-height:80px; 
} * html div.calendar-day-blank { height:80px; }

td.calendar-day-head 
{ 
        background:#CCC; 
        font-weight:bold; 
        text-align:center; 
        width:120px; 
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
        margin:-34px -5px 0 0; 
        width:20px; 
        text-align:center; 
        border-bottom:1px solid #000; 
        border-right:1px solid #000; 
}

/* Shared style */
td.calendar-day, td.calendar-day-blank 
{ 
        width:120px; 
        height:80px; 
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

function draw_calendar($month, $year)
{
        //Draw table
        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

        //Table headings
        $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

        //Variables for days and weeks
        $running_day = date('w',mktime(0,0,0,$month,1,$year));
        $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
        $days_in_week = 1;
        $day_counter = 0;

        //Row for week one
        $calendar.= '<tr class="calendar-row">';

        //Print "blank" days until first day of the current month
        for ($x = 0; $x < $running_day; $x++)
        {
                $calendar.= '<td class="calendar-day-blank"> </td>';
                $days_in_week++;
        }

        //Continue days of the month
        for ($list_day = 1; $list_day <= $days_in_month; $list_day++)
        {
                $calendar.= '<td class="calendar-day">';
                        //Add in number for day
                        $calendar.= '<div class="day-number">'.$list_day.'</div>';

                        /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
                        $calendar.= str_repeat('<p> </p>',2);
                        
                $calendar.= '</td>';
                if ($running_day == 6)
                {
                        $calendar.= '</tr>';
                        if (($day_counter + 1) != $days_in_month)
                        {
                                $calendar.= '<tr class="calendar-row">';
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
                        $calendar.= '<td class="calendar-day-blank"> </td>';
                }
        }

        //Final row
        $calendar.= '</tr>';

        //End table
        $calendar.= '</table>';
        
        //Return result
        return $calendar;
}

echo "<h2>".$month[date('m') - 1]." ".date('Y')."</h2>";
/*echo date('Y/m/d H:i:s');*/
echo draw_calendar(date('m'), date('Y'));
?>
</body>

</html>
