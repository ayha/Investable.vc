<?php
if(empty($userid)){
$user = $modx->getUser();
$userid = $user->get("id");
}
$config = $modx->getConfig();

$prefix = $config["table_prefix"];

//[[!getResources? &parents=`36`  &tpl=`startup_list_chunk` &sortby=`{"publishedon":"DESC","menuindex":"ASC"}` //&limit=`100` &depth=`0` &showHidden=`1` &includeContent=`0` &hideContainers=`0` &includeTVs=`1` //&processTVs=`1` ]]

$query = "SELECT DISTINCT e.companyid FROM ext_favourite_company e LEFT JOIN ".$prefix."site_content c ON e.companyid = c.id WHERE e.userid ='".$userid."' AND c.published = 1";


$result = $modx->query($query);

if(is_object($result)){
   if($getCount == 1){
      return $result->rowCount();
   }else{
   $companyids = Array();
   while( $row = $result->fetch(PDO::FETCH_ASSOC)){
      array_push($companyids, $row["companyid"]);
   }
   
   $ids = implode(",", $companyids);
   if(empty($ids)){
 return "You do not have any favourite company at the moment.";
   }else{
   $params = Array("resources"=>$ids, "tpl"=>"startup_list_chunk", "sortby"=>'{"publishedon":"DESC","menuindex":"ASC"}', "limit"=>"1000", "depth"=>0, "showHidden"=>0, "includeTVs"=>1, "processTVs"=>1, "showUnpublished"=>0);
    return $modx->runSnippet("getResources", $params);
    }
}
}else{
   return "You do not have any favourite company at the moment.";
}
return;
