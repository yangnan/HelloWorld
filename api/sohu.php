<?php
				header("Content-Type: text/xml");
				include("../define.php");
				include("../config/db.config.php");
				$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
				echo $xml;
				$date_time=time();
				mysql_connect(db_config::$dbconfig["db_server"],db_config::$dbconfig["db_user"],db_config::$dbconfig["db_pwd"]);
				mysql_select_db(__DATANAME__);


				?>
				<ActivitySet>
					<?php
					   $sql=mysql_query("select * from ".__PREFIX_TAB__ ."config limit 1");
					   $row=mysql_fetch_array($sql);
				   ?>
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