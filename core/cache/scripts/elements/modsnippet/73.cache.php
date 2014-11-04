<?php  return '$user = $modx->getUser();
$userid = $user->get("id");

//[[!getResources? &parents=`36`  &tpl=`startup_list_chunk` &sortby=`{"publishedon":"DESC","menuindex":"ASC"}` //&limit=`100` &depth=`0` &showHidden=`1` &includeContent=`0` &hideContainers=`0` &includeTVs=`1` //&processTVs=`1` ]]

$query = "SELECT DISTINCT companyid FROM ext_favourite_company WHERE userid =\'".$userid."\'";

$result = $modx->query($query);

if(is_object($result)){
   
   $companyids = Array();
   while( $row = $result->fetch(PDO::FETCH_ASSOC)){
      array_push($companyids, $row["companyid"]);
   }
   
   $ids = implode(",", $companyids);
   
   $params = Array("resources"=>$ids, "tpl"=>"startup_list_chunk", "sortby"=>\'{"publishedon":"DESC","menuindex":"ASC"}\', "limit"=>"1000", "depth"=>0, "showHidden"=>1, "includeTVs"=>1, "processTVs"=>1);
    return $modx->runSnippet("getResources", $params);

   return $ids;

}else{
   return "You do not have any favourite company at the moment.";
}
return;
';