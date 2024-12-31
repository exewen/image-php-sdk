<?php

declare(strict_types=1);

namespace Exewen\Image;

use Exewen\Image\Contract\ImageInterface;
use Exewen\Image\Services\PdfService;
use Exewen\Config\Contract\ConfigInterface;
use Exewen\Image\Services\QrService;

class Image implements ImageInterface
{
    private $config;
    private $pdfService;

    public function __construct(
        ConfigInterface $config,
        PdfService      $pdfService,
        QrService       $qrService
    )
    {
        $this->config     = $config;
        $this->pdfService = $pdfService;
        $this->qrService  = $qrService;
    }

    public function pdfToPng(string $pdfPath, string $outputFolder, int $page = -1, array $crop = [])
    {
        return $this->pdfService->pdfToPng($pdfPath, $outputFolder, $page, $crop);
    }

    public function qrPng(string $imagePath)
    {
        return $this->qrService->qrPng($imagePath);
    }

}
