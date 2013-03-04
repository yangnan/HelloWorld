<?php
header("Content-type: text/html; charset=utf-8");
require_once("../define.php");
require_once("../config/db.config.php");
require_once(__FRAME__."/db/DB.config.php");
require_once(__FRAME__."/db/DBFactory.class.php");
require_once(__FRAME__."/db/SqlBuilder.class.php");
require_once (__FRAME__.'/jpgraph/jpgraph.php');
require_once (__FRAME__.'/jpgraph/jpgraph_pie.php');
require_once (__FRAME__.'/jpgraph/jpgraph_pie3d.php');
require_once("../common/common.php");

$datatmp = countryPv();//获取城市统计
$local = getLocal();//获取来路统计
if($_GET["type"] == "from_url")
{
    $data = $local["sumfrom_url"];
    $name = $local["from_url"];
}
elseif($_GET["type"] == "country")
{
    $data = $datatmp["country_sum"];//这里放每天的流量
    $name = $datatmp["country_name"]; //这里放要统计的城市
}


$graph = new PieGraph(500,500,'auto');
$aAxisType = 'intlin'; //第一个int是X轴类型第2个lin是Y轴类型
$yScaleMin = 0; //Y轴最小值, 如果不需要设置，可以为空，或者NULL，下同
$yScaleMax = 11; //Y轴最大值
$xScaleMin = 1; //X轴最大值
$xScaleMax = 24; //X轴最大值
$graph->SetScale($aAxisType, $yScaleMin, $yScaleMax, $xScaleMin, $xScaleMax); //设置刻度模式SetScale($aAxisType,$aYMin=1,$aYMax=1,$aXMin=1,$aXMax=1)
#
$graph->img->SetMargin(40, 20, 100, 150) ; //设置图表边界



//$title = iconv("UTF-8", "gb2312", "TGroupon团购系统流量数据统计");
$title = "TGroupon团购系统流量数据统计";
$graph->title->Set($title);
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->title->SetColor("blue");
$graph->img->SetImgFormat("jpeg");

//$graph->SetScale("textlin");画线的时候才使用
//$graph->xaxis->SetTickLabels($name); 画线的时候才使用
/***
author:jeffxie <jeffxie@gmail.com>
time:2011-5-14
****/
$graph->legend->Pos(0.01,0.10);    //显示右上角的注释的位置　X，Y
$p1 = new PiePlot3D($data);
$p1->ExplodeSlice(1);
$p1->SetCenter(0.5);
$graph->legend->SetFont(FF_SIMSUN, FS_NORMAL, 9);//设置要显示的统计名称的编码为中文
//$p1->SetLegends($gDateLocale->GetShortMonth()); //设置要显示的统计名称
if(!empty($name))
{
    $p1->SetLegends($name);
}
$graph->Add($p1);
$graph->Stroke();

?>


