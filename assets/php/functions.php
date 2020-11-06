<?php
/*
                            _
   ____                    | |
  / __ \__      _____  _ __| | __ ____
 / / _` \ \ /\ / / _ \| '__| |/ /|_  /
| | (_| |\ V  V / (_) | |  |   <  / /
 \ \__,_| \_/\_/ \___/|_|  |_|\_\/___|
  \____/

        http://www.atworkz.de
           info@atworkz.de
_______________________________________

       Screenly OSE Monitoring
             Functions
_______________________________________
*/


function timeago($timestamp) {
   $strTime = array("second", "minute", "hour", "day", "month", "year");
   $length = array("60","60","24","30","12","10");

   $currentTime = time();
   if($currentTime >= $timestamp) {
		$diff     = time()- $timestamp;
		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
		$diff = $diff / $length[$i];
		}
		$diff = round($diff);
		return $diff . " " . $strTime[$i] . "(s) ago ";
   }
}


function redirect($url, $time = 0){
  echo '<meta http-equiv="refresh" content="'.$time.';URL='.$url.'">';
}

function sysinfo($style, $message, $refresh = false){
  echo '
  <script>
    localStorage.setItem("notification_style", "'.$style.'");
    localStorage.setItem("notification_message", "'.$message.'");
    localStorage.setItem("notification_counter", "1");
  </script>';
}

function timezone($selected = ''){
  $select = NULL;
  $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
  for ($i=0; $i < count($tzlist); $i++)
  {
    $select .= '<option value="'.$tzlist[$i].'"'.($tzlist[$i] == $selected ? 'selected':'').'>'.$tzlist[$i].'</option>';
  }
  return $select;
}

function getPlayerCount(){
  global $db;
  $playerCount = $db->query("SELECT COUNT(*) AS counter FROM player");
  $playerCount = $playerCount->fetchArray(SQLITE3_ASSOC);
  $playerCount = $playerCount['counter'];
  return $playerCount;
}