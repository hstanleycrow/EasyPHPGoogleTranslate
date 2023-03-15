# EasyPHPGoogleTranslate
Easy Google translate API V2 client for PHP

## English Instructions
This project abstract the google translate api version 2.0 in PHP. 
This is a easy way to implement and use the Google API Translations into PHP and his spirit is to keep it simple and easy to use.

## Examples of usage
This examples are using [DotEnv](https://github.com/vlucas/phpdotenv) to configure the APIKey, but you can setup it as you wwant.

### Example 1: simple translation.
Use this code to translate from one language to another.

```php
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
```

### Example 2: Multiple language translations
With this code, you can translate a text to a final language, passing before for other languagees. This can change a little bit the translations, simulating a re-phrase, it is very simple but useful.

```php
$textToTranslate = "Hola Mundo, espero que estes bien";
$sourceLanguage = Null;
$targetLanguages = ["fr", "pt", "nl", "en"];
$translateObj = new EasyPHPTranslate($myPrivateApiKey);
$translatedText = $translateObj->multipleTranslate($textToTranslate, $targetLanguages);
echo "<pre>";
echo "Text to translate: $textToTranslate" . PHP_EOL;
echo "Final Translated Text: $translatedText" . PHP_EOL;
echo "</pre>";
```
## List of supported languages
This class try to be simple, so, the detection for a valid language is out of their scope, but maybe later.
[List of languages](https://cloud.google.com/translate/docs/languages) supported for Google Translation API V2. 

## PHP Versions
I have tested this class only in this PHP versions. So, if you have an older version and do not work, let me know.
| PHP Version |
| ------------- |
| PHP 8.0 | 
| PHP 8.1 |
| PHP 8.2 |

# Instrucciones en Español
Este proyecto abstraee la API de traducción de Google V2.0 en PHP.
Es una forma muy sencilla de usare la API de Google para traducir textos con PHP y su espiritu es mantenerlo simple y fácil de usar, sin configuraciones complejas ni nada por el estilo.

## Ejemplos de uso

Estos ejemplos usan [DotEnv](https://github.com/vlucas/phpdotenv) para configurar la API Key, pero tu puedes configurarla como te plazca.

### Ejemplo 1: traducción simple con autodetección de idioma
Usa este ejemplo para traducir un texto. Solo debes definir el lenguaje al que quieres traducir, el idioma origen lo detecta la API.

```php
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
```

### Ejemplo 2: Traducción multiple.
Con este código puedes traducir un texto a un lenguaje final pero pasando por otros lenguajes primero. De esta forma se puede cambiar un poco el resultadod de la traducción, especialmente en textos largos, simulando asi un parafraseado, simple claro pero usable.

```php
$textToTranslate = "Hola Mundo, espero que estes bien";
$sourceLanguage = Null;
$targetLanguages = ["fr", "pt", "nl", "en"];
$translateObj = new EasyPHPTranslate($myPrivateApiKey);
$translatedText = $translateObj->multipleTranslate($textToTranslate, $targetLanguages);
echo "<pre>";
echo "Text to translate: $textToTranslate" . PHP_EOL;
echo "Final Translated Text: $translatedText" . PHP_EOL;
echo "</pre>";
```
## Lista de lenguajes soportados
Esta clase intenta ser simple, por eso la validación del lenguaje esta fuera de su alcance, pero tal vez luego lo incorpore junto a otras funcionalidades.
[Lista de lenguajes](https://cloud.google.com/translate/docs/languages) soportados por la API de traducción de Google V2. 

## Versiones de PHP
He probado esta clase en estas versiones de PHP, asi qaue si tienes una version anterior y no funciona, dejame saberlo para mejorar el código.

| PHP Version |
| ------------- |
| PHP 8.0 | 
| PHP 8.1 |
| PHP 8.2 |
