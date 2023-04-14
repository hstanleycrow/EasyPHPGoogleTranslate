<?php

namespace App;

use CurlHandle;

class EasyPHPTranslate
{
    const ENDPOINT = 'https://translation.googleapis.com/language/translate/v2';
    private string $apiKey;

    private ?string $sourceLanguage;
    private string $targetLanguage;
    private string $originalText;
    private string $translatedText;
    private CurlRequest $httpRequest;

    function __construct(string $apiKey, CurlRequest $httpRequest)
    {
        $this->apiKey = $apiKey;
        $this->httpRequest = $httpRequest;
        $this->httpRequest->url(self::ENDPOINT);
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

    private function execute(): void
    {
        $this->httpRequest->setPost(true);
        $this->httpRequest->setPostData($this->postData());
        $this->httpRequest->setHttpHeader(['X-HTTP-Method-Override: GET']);
        $this->httpRequest->execute();
        if ($this->httpRequest->isSuccessful()) :
            $response = $this->httpRequest->getResult();
            $responseDecoded = json_decode($response, true);
            $this->translatedText = $responseDecoded['data']['translations'][0]['translatedText'];
        endif;
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

    public function wordCount($input): int
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
