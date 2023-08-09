<?php
namespace App\Modules\Image;

class Cropper
{
    private array $errors = [];
    private $cropResult;

    public function __construct(
        private \App\Model\Entity\Image $image,
        private \Cake\Http\ServerRequest $request,
        private array $imageSize,
        private array $file,
    ) {
    }

    public function crop()
    {
        if ($this->image->x_axis + $this->image->width > $this->imageSize[0]) {
            $this->errors[] = 'Left and width values go beyond image boudries';
        }

        if ($this->image->y_axis + $this->image->height > $this->imageSize[1]) {
            $this->errors[] = 'Top and height values go beyond image boudries';
        }

        if (empty($this->errors)) {
            if (\preg_match('/(.*\/png)/', $this->file['mediaType'])) {
                $this->cropPng();
            } elseif (\preg_match('/(.*\/jpeg|.*\/jpg)/', $this->file['mediaType'])) {
                $this->cropJpeg();
            }
        }

        return $this->cropResult;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function cropPng()
    {
        $imageToCrop = \imagecreatefrompng($this->file['tmp_name']);
        $this->cropResult = \imagecrop($imageToCrop, ['x' => $this->request->getData('x_axis'),
            'y' => $this->request->getData('y_axis'),
            'width' => $this->request->getData('width'),
            'height' => $this->request->getData('height')
        ]);
    }

    private function cropJpeg()
    {
        $imageToCrop = \imagecreatefromjpeg($this->file['tmp_name']);
        $this->cropResult = \imagecrop($imageToCrop, ['x' => $this->request->getData('x_axis'),
            'y' => $this->request->getData('y_axis'),
            'width' => $this->request->getData('width'),
            'height' => $this->request->getData('height')
        ]);
    }
}
