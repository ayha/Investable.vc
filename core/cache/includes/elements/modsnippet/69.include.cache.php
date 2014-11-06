<?php
$q = "SELECT * FROM ext_industries WHERE  hidden !='1' ORDER BY sort_order ASC, industry ASC";
$result = $modx->query($q);

$selected = "";
if(isset($_GET["industry"])){
   $selected = $_GET["industry"];
}

if (!is_object($result)) {
   return false;
}else{
   $output = "";
   while( $row = $result->fetch(PDO::FETCH_ASSOC)){
      $rowOutput = Array();
      $rowOutput["value"] = $row["industry"];
      $rowOutput["display_text"] = $row["industry"];
      if($row["industry"] == $selected){
         $rowOutput["selected"] = "selected";

      }
      $output .= $modx->getChunk("option_item", $rowOutput);
   }
   return $output;
}

return false;
return;
