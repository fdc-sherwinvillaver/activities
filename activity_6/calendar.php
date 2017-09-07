<?php 
	$month = $_POST['month'];
	$year = $_POST['year'];
	// echo json_encode($_POST);
	echo calendar($month,$year);

	function calendar($month,$year){
		$calendar = "<table class='table table-responsive table-bordered'>";
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();
		$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$calendar .= "<thead>";
		$calendar .= "<tr>";
		//print all Headers
		for($x = 0; $x < sizeof($headings); $x++){
			$calendar .= "<th class='text-center'>".$headings[$x]."</th>";
		}
		$calendar .= "</tr>";
		$calendar .= "</thead>";
		$calendar .= "<tbody class='text-right'>";
		$calendar .= "<tr>";
		for($i = 0; $i < $running_day; $i++){
			$calendar .= "<td> </td>";
			$days_in_this_week++;
		}
		for($list_day = 1; $list_day <= $days_in_month; $list_day++){
			if(date('d') == $list_day){
				$calendar.= "<td style='background-color:#b3e5fc;'>";
				$calendar.= "<div style='color:red; height:90px;'>".$list_day."</div>";
			}
			else{
				$calendar.= "<td>";
				$calendar.= "<div style='height:90px;'>".$list_day."</div>";
			}
				/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p></p>',1);
			$calendar.= '</td>';
			if($running_day == 6){
				$calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month){
					$calendar.= '<tr>';
				}
				$running_day = -1;
				$days_in_this_week = 0;
			}
			$days_in_this_week++; $running_day++; $day_counter++;
		}
		if($days_in_this_week < 8){
			for($x = 1; $x <= (8 - $days_in_this_week); $x++){
				$calendar.= '<td class="calendar-day-np"> </td>';
			}
		}
		/* final row */
		$calendar.= '</tr>';
		$calendar .= "</tbody>";
		$calendar .= "</table>";
		return $calendar;
	}
?>