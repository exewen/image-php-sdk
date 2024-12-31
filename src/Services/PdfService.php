<?php
declare(strict_types=1);

namespace Exewen\Image\Services;

use Exewen\Image\Exception\ImageException;

class PdfService
{
    /**
     * pdf 转 png
     * @param string $pdfPath
     * @param string $outputFolder
     * @param int $page
     * @param array $crop
     * @return array|mixed|string
     * @throws \ImagickException
     */
    public function pdfToPng(string $pdfPath, string $outputFolder, int $page, array $crop = [])
    {
        if (!extension_loaded('imagick')) {
            throw new ImageException("imagick扩展不存在!");
        }
        if (!file_exists($pdfPath)) {
            throw new ImageException("文件不存在!");
        }
        if (!file_exists($outputFolder)) {
            mkdir($outputFolder, 0777, true);
        }
        // 文件读取
        $im = new \Imagick();
        $im->setResolution(300, 300); // DPI设置 每英寸的像素点数
        $im->setCompressionQuality(100);
        if ($page < 1) {
            $im->readImage($pdfPath);
        } else {
            $rPage = $page - 1;
            $im->readImage($pdfPath . "[" . $rPage . "]");
        }

        // 图像裁剪
        if (!empty($crop)) {
            $cropX      = $crop[0] ?? 0; // 裁剪区域的左上角 X 坐标
            $cropY      = $crop[1] ?? 0; // 裁剪区域的左上角 Y 坐标
            $cropWidth  = $crop[2] ?? 0; // 裁剪区域的宽度
            $cropHeight = $crop[3] ?? 0; // 裁剪区域的高度
            // 裁剪图像
            $im->cropImage($cropWidth, $cropHeight, $cropX, $cropY);
        }

        // 图像保存
        $return = [];
        foreach ($im as $key => $val) {
            $val->setImageFormat('png');
            $savePage = $key + 1;
            $filename = $outputFolder . "/" . $savePage . '.png';
            if ($val->writeImage($filename)) {
                $return[$savePage] = $filename;
            }
        }

        return $return;
    }


}