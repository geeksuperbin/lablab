<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;

/**
 * ppt 实现类，月例会就靠你了
 */
class PowerPointController extends Controller
{


    public function index(){

        //实例化一个幻灯片实例
        $objPHPPowerPoint = new PhpPresentation();

        //创建幻灯片
        $currentSlide = $objPHPPowerPoint->getActiveSlide();

        // 创建一个形状（绘图）
        $shape = $currentSlide->createDrawingShape();
        $shape->setName('PHPPresentation logo')
            ->setDescription('PHPPresentation logo')
            ->setPath('../resources/my.png')
            ->setHeight(300)
            ->setOffsetX(30)
            ->setOffsetY(30);
        $shape->getShadow()->setVisible(true)
            ->setDirection(45)
            ->setDistance(10);

        // 创建形状（文本）
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
        $textRun = $shape->createTextRun('月例会报告');
        $textRun->getFont()->setBold(true)
            ->setSize(60)
            ->setColor( new Color( 'FFE06B20' ) );

//        $chartShape = $currentSlide->createChartShape();


        $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');

        $fileName = '2018年10月Geek彬月例会报告';
        $oWriterPPTX->save(public_path()."/ppt/${fileName}.pptx");


    }
}
