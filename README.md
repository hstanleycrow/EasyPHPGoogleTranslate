# EasyPHPGoogleTranslate
Easy Google translate API V2 client for PHP

This project abstract the google translate api version 2.0 in PHP. 
This is a easy way to implement and use the Google API Translations into PHP and his spirit is to keep it simple and easy to use.


## Examples of usage
This exampleas are using [DotEnv](https://github.com/vlucas/phpdotenv) to configure the APIKey, but you can setup it as you wwant.

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
