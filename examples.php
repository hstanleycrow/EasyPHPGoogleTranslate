<?php

use Dotenv\Dotenv;
use App\EasyPHPTranslate;

require 'vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$myPrivateApiKey = $_ENV['GOOGLE_API_KEY'];

$textToTranslate = "Hola Mundo";
$sourceLanguage = Null;
$targetLanguage = "fr";
$translateObj = new EasyPHPTranslate($myPrivateApiKey);
$translatedText = $translateObj->translate($textToTranslate, $targetLanguage);
$originalTextWordCount = $translateObj->wordCount($textToTranslate);
$translatedTextWordCount = $translateObj->wordCount($translatedText);

echo "<pre>";
echo "Text to translate: $textToTranslate" . PHP_EOL;
echo "Word count: $originalTextWordCount" . PHP_EOL;
echo "Translated Text: $translatedText" . PHP_EOL;
echo "Translated Word count: $translatedTextWordCount" . PHP_EOL;
echo "</pre>";

#Multiple translations
$textToTranslate = "Hola Mundo, espero que estes bien";
$sourceLanguage = Null;
$targetLanguages = ["fr", "pt", "nl", "en"];
$translateObj = new EasyPHPTranslate($myPrivateApiKey);
$translatedText = $translateObj->multipleTranslate($textToTranslate, $targetLanguages);
echo "<pre>";
echo "Text to translate: $textToTranslate" . PHP_EOL;
echo "Final Translated Text: $translatedText" . PHP_EOL;
echo "</pre>";
