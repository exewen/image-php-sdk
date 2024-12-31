<?php

declare(strict_types=1);

namespace Exewen\Image;

use Exewen\Image\Constants\ImageEnum;
use Exewen\Image\Contract\ImageInterface;

class ConfigRegister
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                ImageInterface::class => Image::class,
            ],

        ];
    }
}
