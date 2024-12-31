<?php
declare(strict_types=1);

namespace ExewenTest\Image;

use Exewen\Image\ImageFacade;

class ImageTest extends Base
{

    /**
     * 测试订单信息
     * @return void
     */
    public function testPdfToPng()
    {
        $pdfPath      = "./file/test.pdf";
        $outputFolder = "./temp";
//        $crop         = [];
        $crop         = [3140, 110, 220, 220]; // X坐标、Y坐标、长、宽
        $page     = 1;
        $result   = ImageFacade::pdfToImage($pdfPath, $outputFolder, $page, $crop);
        $pageFile = $result[$page];
//        #ini_set('memory_limit', '256M');
        $qr = ImageFacade::qrRead($pageFile);
        var_dump($qr);
        $this->assertNotEmpty($qr);
    }

}