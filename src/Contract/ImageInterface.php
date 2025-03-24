<?php
declare(strict_types=1);

namespace Exewen\Image\Contract;



interface ImageInterface
{
    public function pdfToImage(string $pdfPath, string $outputFolder, int $page= -1, array $crop=[]);
    public function qrRead(string $imagePath);


}