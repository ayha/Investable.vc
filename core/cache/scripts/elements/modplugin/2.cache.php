<?php  return '$basePath = $modx->getOption(\'base_path\');
$corePath = $modx->getOption(\'core_path\');
$id = $resource->get(\'id\');
$tpl = $modx->getOption(\'pdfTpl\', $scriptProperties, \'pdfTpl\');
$css = $modx->getOption(\'cssTpl\', $scriptProperties, \'cssTpl\');
$createField = $modx->getOption(\'pdfTV\', $scriptProperties, \'createPDF\');
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, null);
$siteurl = $modx->getOption(\'site_url\');
$params = array();
$assetsPath = $modx->getOption(\'assets_path\');

$createPDF = $resource->getTVValue($createField);
if($createPDF != \'1\') {
   @unlink($assetsPath.$id.\'.pdf\'); //remove file if it exists
   return false; //exit plugin
}

$params = $resource->toArray();

$tvs = $modx->getCollection(\'modTemplateVar\');
foreach ($tvs as $tv) {
    $params[$tv->get(\'name\')] = (empty($processTVs) ? $tv->getValue($id) : $tv->renderOutput($id));
    if($tv->get(\'name\') == \'pdfTpl\' && $tv->getValue($id) != \'\' ) {
        $tpl = $tv->getValue($id);
    }
}

$html = $modx->getChunk($tpl, $params);
$css = $modx->getChunk($css, $params);
unset($params);

require_once($corePath.\'components/htmltopdf/mpdf.php\');

$mpdf = new mPDF(\'utf-8\', \'A4\', \'8\', \'\', 10, 10, 7, 7, 10, 10);
$mpdf->charset_in = \'utf-8\';
$stylesheet = $css;
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->list_indent_first_level = 0; 
$mpdf->WriteHTML($html, 2);
$mpdf->Output($assetsPath.\'pdf/\'.$id.\'.pdf\', \'F\');
return;
';