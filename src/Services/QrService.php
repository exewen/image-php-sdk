<?php
declare(strict_types=1);

namespace Exewen\Image\Services;

use Exewen\Image\Exception\ImageException;
use Zxing\QrReader;

class QrService
{

    /**
     * 图片二维码识别
     * @param string $imagePath
     * @return false
     */
    public function qrRead(string $imagePath)
    {
        if (!file_exists($imagePath)) {
            throw new ImageException("文件不存在!");
        }
        $qrCode = new QrReader($imagePath);
        return $qrCode->text();
    }
}