<?php  return '$config = $modx->getConfig();

$q = "SELECT s.* FROM ext_stage s WHERE hidden !=\'1\' ORDER BY s.sort_order ASC, s.stage ASC";
$result = $modx->query($q);
$selected = "";
if(isset($_GET["stage"])){
   $selected = $_GET["stage"];
}

if (!is_object($result)) {
   return false;
}else{
   $output = "";
   while( $row = $result->fetch(PDO::FETCH_ASSOC)){
      $rowOutput = Array();
      $rowOutput["value"] = $row["stage"];
      $rowOutput["display_text"] = $row["stage"];
      if($row["stage"] == $selected){
         $rowOutput["selected"] = "selected";
      }
      $output .= $modx->getChunk("option_item", $rowOutput);
   }
   return $output;
}

return false;
return;
';