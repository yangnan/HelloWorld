<?PHP
require_once("../define.php");
require_once("../config/db.config.php");
require_once(__FRAME__."/page/page.class.php");
require_once(__FRAME__."/db/DB.config.php");
require_once(__FRAME__."/db/DBFactory.class.php");
require_once(__FRAME__."/db/SqlBuilder.class.php");
require_once(__FRAME__."/sendmail/email.class.php");
require_once(__ROOT__ . "/common/common.php");
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author jeffxie <jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-4-22
 */
$pagenow = empty($refre)?$viewpage:$refre; //当前页面,如果没有来路,就将当前页面发送给后端
$conn = DBFactory::createDb(__DATANAME__);
$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","*");
//执行添加函数
$data = $conn->getAll($strSQL);
header("Content-Type: text/xml");
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo $xml;
$date_time=time();
$sql=SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*")." LIMIT 1";
$row=$conn->getRow($sql);
?>
<ActivitySet>
    <Site><?php echo $row["config_website_name"];?></Site>
    <SiteUrl><?php echo $row["config_website"];?></SiteUrl>
    <Update></Update>
    <?php
        $strSQL = "select i.*,c.city_name,s.seller_name from ".__PREFIX_TAB__ ."groupon_info as i, ".__PREFIX_TAB__ ."city as c, ".__PREFIX_TAB__ ."seller as s where i.groupon_city_id=c.id and i.groupon_seller_id=s.id order by i.id desc";
        $arr_info=mysql_query($strSQL);
        while($rows=mysql_fetch_array($arr_info)){
        $http=$_SERVER["HTTP_HOST"];
    ?>
    <Activity>
       <Title>
          <?php echo $rows["groupon_title"];?>
       </Title>
       <Url>
          <?php echo "http://".$http."/?tg=/index/list";?>
       </Url>
       <Description>
          <?php echo $rows["groupon_content"];?>
       </Description>
       <ImageUrl>
          <?php
             $arr_a=explode(",",$rows["groupon_pic"]);
             echo "http://".$http."/uploadfiles/".$arr_a[0];
         ?>
       </ImageUrl>
       <CityName><?php echo $rows["city_name"];?></CityName>
       <AreaCode/>
       <Value><?php echo $rows["groupon_prime_price"];?></Value>
       <Price><?php echo $rows["groupon_present_price"];?></Price>
       <ReBate>
          <?php
          if($rows["groupon_present_price"]!=$rows["groupon_prime_price"]){
             echo round(($rows["groupon_present_price"]/$rows["groupon_prime_price"])*10,1);
          }else{
             echo "0";
          }
          ?>
      </ReBate>
       <StartTime><?php echo date("YmdHis",$rows["groupon_start_time"])?></StartTime>
       <EndTime><?php echo date("YmdHis",$rows["groupon_end_time"])?></EndTime>
       <Quantity/>
       <Bought>
           <?php
              $id=$rows[id];
              $Bought = mysql_query("select * from ".__PREFIX_TAB__ ."order where order_groupon_id=$id and order_state=1");
              echo count($Bought);
           ?>
       </Bought>
       <MinBought><?php echo $rows["groupon_num"]?></MinBought>
       <BoughtLimit>1</BoughtLimit>
        <Goods>
           <Name><?php echo $rows["groupon_shop_name"];?></Name>
           <ProviderName><?php echo $rows["seller_name"];?></ProviderName>
           <ImageUrlSet>
              <?php
                 $arr_b=explode(",",$rows["groupon_pic"]);
                 echo "http://".$http."/uploadfiles/".$arr_b[0];
             ?>
           </ImageUrlSet>
           <Contact><?php echo $rows["groupon_contact_name"];?></Contact>
           <Telephone><?php echo $rows["groupon_telephone"];?></Telephone>
           <Address><?php echo $rows["groupon_address"];?></Address>
           <Description><?php echo $rows["groupon_content"];?></Description>
      </Goods>
      </Activity>
      <?php }?>
  </ActivitySet>