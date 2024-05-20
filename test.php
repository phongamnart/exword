<?php
require 'vendor/autoload.php';
use PhpOffice\PhpWord\Settings;
$phpWord = new \PhpOffice\PhpWord\PhpWord();


$imagePath = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png'; 

$section = $phpWord->addSection();

$html = '<p>Hello, this is a Word document generated from HTML!</p><b style="padding:100px;" >dsaaddad</b><br/>dfsfddd
        <table style="width:100%">
        <tr style="">
            <td>Invoice Date</td>
            <td>Invoice Number</td>
        </tr>
        <tr>
            <td>4 January 2024</td>
            <td>2024/xxx</td>
        </tr>
        <tr>
            <td>Terms</td>
            <td>Service Through</td>
        </tr>
        <tr>
            <td>xxx</td>
            <td>scsd</td>
        </tr>
        </table>
        ';

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);

$section->addHeader()->addImage($imagePath, array('width' => 200, 'height' => 70));
$section->addFooter()->addPreserveText('{PAGE}', null, ['alignment' => 'right']);

$imagePath = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png'; 
$section->addImage($imagePath, array('width' => 200, 'height' => 200));

$section->addPageBreak();
$section->addHeader()->addImage($imagePath, array('width' => 100, 'height' => 30));
$section->addImage($imagePath, array('width' => 200, 'height' => 200));

$filename = 'generated_document.docx';
$phpWord->save($filename);

echo "Word document generated successfully: $filename";
?>