<?php  return '$q = "SELECT * FROM ext_stage ORDER BY stage ASC";
$result = $modx->query($q);

if (!is_object($result)) {
   return false;
}else{
   $output = "";
   while( $row = $result->fetch(PDO::FETCH_ASSOC)){
      $rowOutput = Array();
      $rowOutput["value"] = $row["stage"];
      $rowOutput["display_text"] = $row["stage"];
      $output .= $modx->getChunk("option_item", $rowOutput);
   }
   return $output;
}

return false;
return;
';