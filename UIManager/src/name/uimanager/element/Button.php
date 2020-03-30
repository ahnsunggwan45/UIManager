<?php

namespace name\uimanager\element;

class Button
{

    /**
     * for in-client side images
     */
    const IMAGE_TYPE_PATH = 'path';

    /**
     * for other images
     */
    const IMAGE_TYPE_URL = 'url';

    /**
     *
     * @va string May contains 'path' or 'url'
     */
    protected $imageType = '';

    /**
     *
     * @va string
     */
    protected $imagePath = '';

    /**
     *
     * @param string $text
     *            Button text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Add image to button
     *
     * @param string $imageType
     * @param string $imagePath
     * @throws \Exception
     * @return self
     */
    public function addImage($imageType, $imagePath): self
    {
        if ($imageType != self::IMAGE_TYPE_PATH && $imageType != self::IMAGE_TYPE_URL) {
            throw new \Exception(__CLASS__ . '::' . __METHOD__ . ' Invalid image type');
        }
        $this->imageType = $imageType;
        $this->imagePath = $imagePath;
        return $this;
    }

    /**
     * Return array.
     * Calls only in SimpleForm class
     *
     * @return array
     */
    public function getData()
    {
        $data = [
            'text' => $this->text
        ];
        if ($this->imageType != '') {
            $data['image'] = [
                'type' => $this->imageType,
                'data' => $this->imagePath
            ];
        }
        return $data;
    }
}