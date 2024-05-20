<?php

require 'vendor/autoload.php'; // Autoload PHPWord

use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;

// Set up the document
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$imagePath = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png'; 
// Add a section
$section = $phpWord->addSection();

// Add a header
$header = $section->addHeader();
$table = $header->addTable();
$table->addRow();
$table->addCell(4500)->addImage($imagePath, array('width' => 200, 'height' => 200));

// Add a footer
$footer = $section->addFooter();
$table = $footer->addTable();
$table->addRow();
$table->addCell(4500)->addText('Footer Content Here');

// HTML content to be converted to Word
$section->addText('Hello,<b>fdgssdfds</b>');

$section->addImage($imagePath, array('width' => 200, 'height' => 200));

$section->addPageBreak();
$section->addImage($imagePath, array('width' => 200, 'height' => 100));

// Save the Word document
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');

$filename = 'generated_document.docx';
$phpWord->save($filename);

echo "Word document generated successfully: $filename";
?>