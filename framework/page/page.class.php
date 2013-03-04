<?php
/*
| jeffxie PHP分页类
| @author: jeffxie<jeffxie@gmail.com>
| @date:2011-01-13
*/
Class pageList{
 
    var $pageCount;
    var $recordCount;
    var $pages;
    var $currentPage = 1;
    var $perpage;
    var $showPageNum = 6;
    var $pageUrl;

    /*
    * @param: (int)$totalnum=记录总数
    * @param: (int)$curren_tpage=当前页
    * @param: (int)$perpage=每页显示记录数
    */

    function pageList($totalnum=0, $current_page=0, $perpage=20){
        $this->perpage = $perpage;
        $this->pageCount = $totalnum / $perpage;
        $this->recordCount = $totalnum;
        if ($_GET[page]){
            $this->currentPage = $_GET[page];
        }

        /*
        |**判断总页数,将$this->recordCount与其整数部分相减，
        |**如果为0则不用处理，如果小于1则在$this->recordCount整数部分上加1
        */

        $temStr = $this->pageCount - floor($this->pageCount);
        if ($temStr==0){
        $this->pageCount = floor($this->pageCount);
        }
        if ($temStr<1 && $temStr>0){
        $this->pageCount = floor($this->pageCount) + 1;
        }
        $this->pageUrl = $this->ParseUrl();
        $this->pageSplit();
    }

    function getStartRow(){
        return $this->perpage*($this->currentPage-1);
    }

    /*
    **页码显示计算
    */

    function pageSplit(){
        $lan = language_cp::$_TGLOBAL['uilanguage'];
        $startPage = 1;
        $endPage = $this->pageCount;
        if ($this->pageCount > $this->showPageNum){
            $startPage = $this->currentPage - 2;
            if ($startPage < 1 ){$startPage = 1;}
            $endPage = $startPage + $this->showPageNum;
            if ($endPage > $this->pageCount){
                $endPage = $this->pageCount;
             $startPage = $endPage - $this->showPageNum;
            }
        }
        if ($startPage > 1){
            $firstPage = ' <a href="'.$this->pageUrl.'page/1">'.$this->firstPageStyle.'</a>';
            $prevPage = ' <a href="'.$this->pageUrl.'page/'.($this->currentPage - 1).'">'.$this->prevPageStyle.'</a>';

			$firstPage = "<a style='color:red; font-size:12px; font-weight:bold' href='";
			$firstPage.= $this->pageUrl."page/1'>".$this->firstPageStyle."</a>";


			//$firstPage = ' <a href="'.$this->pageUrl.'page=1">首页</a>';


        }

        if ($this->currentPage == 1 && $this->pageCount>1){
		$nextPage = '<li><a href="'.$this->pageUrl.'page/'.($startPage + 1).'">'.$lan["next_page"].$this->nextPageStyle.'</a></li>';
	}
	else if ($this->currentPage == $endPage && $this->pageCount>1)
	{
		$lastPage = '<li><a href="'.$this->pageUrl.'page/'.($this->currentPage-1).'">'.$lan["up_page"].$this->lastPageStyle.'</a></li>';
	}
	else if($this->currentPage != "" && $this->pageCount!=1){
            $lastPage = '<li><a href="'.$this->pageUrl.'page/'.($this->currentPage-1).'">'.$lan["up_page"].$this->lastPageStyle.'</a></li>';
            $nextPage = '<li><a href="'.$this->pageUrl.'page/'.($this->currentPage+ 1).'">'.$lan["next_page"].$this->nextPageStyle.'</a></li>';
        }


        for ($i = $startPage ; $i <= $endPage;$i++){
            if ($this->currentPage == $i){
                $this->pages = $this->pages."<li>【".$i."】</li>"; //如果是当前页，就没有链接 author:xiezhanhui
            }else{
                $this->pages = $this->pages . ' <li><a href="'.$this->pageUrl.'page/'.$i.'">['.$i."]</a></li> ";
            }
        }
        $this->pages = $lastPage.$this->pages.$nextPage;
		$this->showPageList();
    }

    /*
    **处理URL参数
    */

    function ParseUrl(){
        $tempurl = $_SERVER['QUERY_STRING'];
        if ($tempurl != ""){
            if (array_key_exists('page',$_GET)){
                $delPagePara = "page/".$_GET['page'];
                unset($paramArray['page']);
            }
            $tempurl = str_replace($delPagePara,"",$tempurl);
            if (substr($tempurl,0,1)=="/"){
                $tempurl = substr($tempurl,1,strlen($tempurl));
             }
            if (substr($tempurl,strlen($tempurl)-1,strlen($tempurl))=="/"){
                $tempurl = substr($tempurl,0,strlen($tempurl)-1);
            }
            $tempurl = str_replace("//","/",$tempurl);
        }
        if (strlen($tempurl) > 0){$tempurl.="/";}
            return  basename($_SERVER['PHP_SELF'])."?".$tempurl;

        }

    /*
    **显示分页
    */

    function showPageList(){
        return "第".$this->pages."页";
    }


}
?>
