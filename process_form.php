<?php
require 'vendor/autoload.php'; // Include PHPWord library

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Load the Word template
    $template = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');

    // Replace placeholders with form data
    $template->setValue('NAME', $name);
    $template->setValue('EMAIL', $email);

    // Save the generated Word document
    $outputFilename = 'output.docx';
    $template->saveAs($outputFilename);

    // Prompt the user to download the generated Word document
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=\"$outputFilename\"");
    readfile($outputFilename);
}
?>
