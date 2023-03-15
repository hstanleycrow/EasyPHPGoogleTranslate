<?php

namespace App;

class EasyPHPTranslate
{
    const END_POINT = 'https://translation.googleapis.com/language/translate/v2';
    private string $apiKey;

    private ?string $sourceLanguage;
    private string $targetLanguage;
    private string $originalText;
    private string $translatedText;

    function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function translate(string $text, string $targetLanguage, ?string $sourceLanguage = null): string
    {
        assert(!empty($this->apiKey), "Define your Google API KEY first");
        assert(!empty($text), "Define the text to translate");
        assert(!empty($targetLanguage), "Define the language you want to translate ");
        $this->originalText = $text;
        $this->targetLanguage = $targetLanguage;
        $this->sourceLanguage = $sourceLanguage;
        $this->execute();
        return $this->translatedText;
    }

    private function execute()
    {
        $handle = curl_init(self::END_POINT);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $this->postData());
        curl_setopt($handle, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: GET'));
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);
        curl_close($handle);
        $this->translatedText = $responseDecoded['data']['translations'][0]['translatedText'];
    }

    private function postData(): array
    {
        return array(
            'key' => $this->apiKey,
            'q' => ($this->originalText),
            'source' => $this->sourceLanguage,
            'target' => $this->targetLanguage,
        );
    }

    public function wordCount($input)
    {
        $input = strip_tags($input);
        $input = preg_split("/[\s,.]+/", $input);
        $input = str_replace('&nbsp;', "", $input);
        return count($input);
    }

    public function multipleTranslate(string $text, array $languagesList): string
    {
        assert(isset($languagesList) && count($languagesList) > 0, "Define a list of languages to translate");
        $this->originalText = $text;
        foreach ($languagesList as $lang) :
            $this->translatedText = $this->translate($text, $lang);
            $text = $this->translatedText;
            sleep(1);
        endforeach;
        return $this->translatedText;
    }
}
