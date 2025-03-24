<?php
declare(strict_types=1);

namespace Exewen\Image;

use Exewen\Di\ServiceProvider;
use Exewen\Image\Contract\ImageInterface;

class ImageProvider extends ServiceProvider
{

    /**
     * 服务注册
     * @return void
     */
    public function register()
    {
        $this->container->singleton(ImageInterface::class);
    }

}