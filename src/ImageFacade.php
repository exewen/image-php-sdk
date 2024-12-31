<?php
declare(strict_types=1);

namespace Exewen\Image;

use Exewen\Facades\Facade;
use Exewen\Http\HttpProvider;
use Exewen\Logger\LoggerProvider;
use Exewen\Image\Contract\ImageInterface;

/**
 * @method static array pdfToImage(string $pdfPath, string $outputFolder, int $page = -1, array $crop = [])
 * @method static array qrRead(string $imagePath)
 */
class ImageFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ImageInterface::class;
    }

    public static function getProviders(): array
    {
        return [
            LoggerProvider::class,
            HttpProvider::class,
            ImageProvider::class
        ];
    }
}