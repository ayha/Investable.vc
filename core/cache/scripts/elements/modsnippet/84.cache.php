<?php  return '//[[!getUserById? &uid=`[[*founder]]` &tpl=`founder_profile`]] 

if(!empty($founders)){
   $founders = explode(",", $founders);
   
   $output = "";
   
   foreach($founders as $f){
      $output .= $modx->runSnippet("getUserById", array("uid"=>$f, "tpl"=>"founder_profile"));
   }
   return $output;
}
return;
';