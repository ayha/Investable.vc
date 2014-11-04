<?php
$q = "SELECT * FROM ext_industries ORDER BY industry ASC";
$result = $modx->query($q);

if (!is_object($result)) {
   return false;
}else{
   $output = "";
   while( $row = $result->fetch(PDO::FETCH_ASSOC)){
      $rowOutput = Array();
      $rowOutput["value"] = $row["industry"];
      $rowOutput["display_text"] = $row["industry"];
      $output .= $modx->getChunk("option_item", $rowOutput);
   }
   return $output;
}

return false;
return;
