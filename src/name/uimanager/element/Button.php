<?php

namespace name\uimanager\element;

final class Button{

    public const IMAGE_TYPE_PATH = 'path';
    public const IMAGE_TYPE_URL = 'url';

    public string $imageType = '';
    public string $imagePath = '';

    public function __construct(public string $text){
    }

    public function addImage(string $imageType, string $imagePath) : self{
        $this->imageType = $imageType;
        $this->imagePath = $imagePath;
        return $this;
    }

    public function getData() : array{
        $data = [
            'text' => $this->text
        ];
        if($this->imageType !== ''){
            $data['image'] = [
                'type' => $this->imageType,
                'data' => $this->imagePath
            ];
        }
        return $data;
    }
}