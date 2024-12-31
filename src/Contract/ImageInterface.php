<?php
declare(strict_types=1);

namespace Exewen\Image\Contract;



interface ImageInterface
{
    public function pdfToPng(string $pdfPath, string $outputFolder, int $page= -1,array $crop=[]);
    public function qrPng(string $imagePath);


}