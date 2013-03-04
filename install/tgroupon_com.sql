SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `tg_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL COMMENT '管理员用户名',
  `admin_password` varchar(50) NOT NULL COMMENT '密码',
  `admin_regip` varchar(20) NOT NULL COMMENT '注册ip',
  `admin_regtime` int(11) NOT NULL COMMENT '注册时间',
  `admin_lastip` varchar(20) NOT NULL COMMENT '最后登录ip',
  `admin_lasttime` int(11) NOT NULL COMMENT '最后登录时间',
  `level` int(11) NOT NULL COMMENT '等级1为超级',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;



INSERT INTO `tg_admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 0, '', 0, 1);


CREATE TABLE `tg_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_page` int(11) NOT NULL COMMENT '首页，列表页等等 ',
  `ads_position` int(11) NOT NULL COMMENT '1为头部,2为提醒,3为底部,4为左右',
  `ads_type` int(11) NOT NULL COMMENT '1文字,2图片',
  `ads_name` varchar(255) NOT NULL COMMENT '名称',
  `ads_content` text NOT NULL COMMENT '内容',
  `ads_pub_time` int(11) NOT NULL COMMENT '提交时间',
  `ads_start_time` int(11) NOT NULL COMMENT '开始时间',
  `ads_end_time` int(11) NOT NULL COMMENT '结束时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL COMMENT '省级表id',
  `city_name` varchar(50) NOT NULL COMMENT '城市名称',
  `city_initials` char(55) NOT NULL COMMENT '首字母',
  `nav_language` varchar(11) NOT NULL COMMENT '语言导航',
  `status` int(11) NOT NULL COMMENT '0开启1不开启',
  `sorting` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='团购城市表' AUTO_INCREMENT=2 ;



INSERT INTO `tg_city` VALUES (1, 1, '北京', 'BJ', 'cn', 0, 1);



CREATE TABLE `tg_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_type` int(11) NOT NULL COMMENT '1评论2关注',
  `comment_groupon_id` int(11) NOT NULL COMMENT '产品id',
  `comment_users_id` int(11) NOT NULL COMMENT '用户id',
  `comment_content` text NOT NULL COMMENT '内容',
  `comment_time` int(11) NOT NULL COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config_sms_key` varchar(255) NOT NULL COMMENT '短信密钥',
  `config_frum_status` int(11) NOT NULL COMMENT '论坛0开启1不开启',
  `config_website_name` varchar(255) NOT NULL COMMENT '网站名称',
  `config_mode_set` int(11) NOT NULL COMMENT '团购模式设定',
  `config_language` varchar(45) NOT NULL COMMENT '语言设置',
  `config_website_logo` varchar(255) NOT NULL COMMENT 'Logo地址',
  `config_admin_email` varchar(60) NOT NULL COMMENT '管理员邮箱',
  `config_contact` varchar(255) NOT NULL,
  `config_mobile` varchar(55) NOT NULL,
  `config_contactman` varchar(55) NOT NULL,
  `config_website` varchar(255) NOT NULL COMMENT '网站地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站设置表' AUTO_INCREMENT=2 ;



INSERT INTO `tg_config` VALUES (1, '123456', 1, 'tgroupon', 1, 'cn', '4da81a7d1e1ae.png', 'jeffxie@boshengsof.com', 'qq:81356625', '15210637282', '老老仙', 'www.thinkgroupon.com');



CREATE TABLE `tg_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_name` varchar(255) NOT NULL COMMENT '邮箱地址',
  `email_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='邮件订阅表' AUTO_INCREMENT=2 ;



INSERT INTO `tg_email` VALUES (1, 'admin@admin.com', 1302858998);



CREATE TABLE `tg_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '快递公司ID',
  `express_name` varchar(255) NOT NULL COMMENT '快递公司名称',
  `express_address` varchar(255) NOT NULL COMMENT '快递公司地址',
  `express_phone` varchar(30) NOT NULL COMMENT '快递公司电话',
  `express_mobile` varchar(30) NOT NULL COMMENT '快递公司手机',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;



INSERT INTO `tg_express` VALUES (1, '邮政', '黑白', '3737', '73783');
INSERT INTO `tg_express` VALUES (2, '宅急送', '北京', '123456789', '1300000000');
INSERT INTO `tg_express` VALUES (3, '快递', '街角', '985635', '4554554');
INSERT INTO `tg_express` VALUES (4, '物流', '任意', '545454', '78878');
INSERT INTO `tg_express` VALUES (5, '中国外运', '海运', '215456', '8787989');
INSERT INTO `tg_express` VALUES (6, '运通', '随便', '54456564', '6565465');
INSERT INTO `tg_express` VALUES (7, '公交', '地铁', '465546', '564546546');
INSERT INTO `tg_express` VALUES (8, '申通', '天津', '1236', '154656541');
INSERT INTO `tg_express` VALUES (14, '佳吉', '上海', '88888888', '13555555555');


CREATE TABLE `tg_extra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extra_class` int(11) NOT NULL COMMENT '类型',
  `extra_title` varchar(255) NOT NULL COMMENT '标题',
  `extra_content` text NOT NULL COMMENT '内容',
  `status` tinyint(1) NOT NULL COMMENT '0隐藏1显示',
  `pubtime` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='号外表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_extra_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extra_class` varchar(100) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='号外类别表' AUTO_INCREMENT=3 ;



INSERT INTO `tg_extra_class` VALUES (1, '文字');
INSERT INTO `tg_extra_class` VALUES (2, '图片');


CREATE TABLE `tg_foot_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `fid` int(11) NOT NULL COMMENT '父id',
  `foot_nav_title` varchar(50) NOT NULL COMMENT '底部导航名称',
  `foot_nav_link` varchar(255) NOT NULL COMMENT '底部导航链接',
  `foot_nav_lang` varchar(10) NOT NULL COMMENT '底部导航语言',
  `foot_nav_sorting` int(11) NOT NULL COMMENT '底部排序',
  `foot_nav_pubtime` int(11) NOT NULL COMMENT '时间',
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foot_nav_lang` (`foot_nav_lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;



INSERT INTO `tg_foot_nav` VALUES (27, 0, '用户帮助', '', 'cn', 1, 1302933452, '用户帮助');
INSERT INTO `tg_foot_nav` VALUES (24, 0, '获取更新', '', 'cn', 2, 1302932974, '获取更新');
INSERT INTO `tg_foot_nav` VALUES (25, 0, '商务合作', '', 'cn', 3, 1302933009, '商务合作');
INSERT INTO `tg_foot_nav` VALUES (26, 0, '公司信息', '', 'cn', 4, 1302933039, '公司信息');
INSERT INTO `tg_foot_nav` VALUES (28, 27, '玩转TG', '', 'cn', 1, 1302939974, '<img style="width: 500px; height: 333px;" src="../../../../../uploadfiles/201104161302936300.jpg">');
INSERT INTO `tg_foot_nav` VALUES (29, 27, '常见问题', '', 'cn', 2, 1306484276, '<font style="font-family: 幼圆; font-weight: bold; color: rgb(51, 153, 153);" size="3">1.TG网是什么？</font><br><br>&nbsp;&nbsp; <font size="2.6666666666666665">由TG网为您提供的餐厅、酒吧、KTV、SPA、美发、健身、瑜伽、演出、影院等特色商家，</font><font color="#000000"><font style="font-size: 10pt;" size="2"><font size="2.6666666666666665">定期为 您提供一单精品消费。只要凑够最低团购人数，就能享受无敌折扣价。</font><br><br></font></font><font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;">2.如何购买？<br><br></span></font><font style="color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;">&nbsp; <font style="color: rgb(0, 0, 0);" size="2.6666666666666665"><span style="font-family: 宋体;">只要在时间截止之前点击“购买”，然后按照提示填写订单付款购买即可。</span></font></span></font><font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;"><br><br></span></font><font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;">3.怎么支付货款？<br><br></span></font>&nbsp;&nbsp;&nbsp; 财付通<br>&nbsp;&nbsp;&nbsp; 手机支付<br><font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;"></span></font>&nbsp;&nbsp;&nbsp; 支付宝<br><br><font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;">4.团购人数不够怎么办？<br><br></span></font><font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;"></span></font><font style="color: rgb(0, 0, 0);" size="2.3333333333333335"><span style="font-family: 幼圆;">&nbsp;&nbsp; <font style="color: rgb(0, 0, 0);" size="2.6666666666666665">如果人数不足，很抱歉，只能取消这次团购。</font></span></font><font style="color: rgb(0, 0, 0);" size="2.6666666666666665">已支付的款项，TG网将立即返还。您不&nbsp; 会有任何损失，但失去了以超低折扣价享受精品消费的机会。如果您很希望这次团购成交，邀请您的朋友一起来购买吧！</font><br><br>\r\n<font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;">5.如何退订团购邮件？</span></font><br><br>&nbsp;&nbsp; <font size="2.6666666666666665">如不想继续接收TG每日推荐邮件，点击邮件上方的“取消订阅”即可！</font><br><br><font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;">6.什么情况下可以退款？</span></font><br><br>&nbsp;&nbsp;<font size="2.6666666666666665"> 您好，以下情况可以退款：<br>&nbsp;&nbsp; 1. 团购结束时没有凑够团购人数；<br>&nbsp;&nbsp; 2. \r\n团购成功后，商家因意外原因临时出现停业或搬家的情况。（我们会在第一时间将您当时支 付的款项退还给您）<br>&nbsp;&nbsp; 3. 团购成功后，7天内未消费，无条件退款。</font><br>&nbsp;<font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;"><br>&nbsp; </span></font><br><font style="font-weight: bold; color: rgb(51, 153, 153);" size="3"><span style="font-family: 幼圆;"><br></span></font><br>');
INSERT INTO `tg_foot_nav` VALUES (30, 24, '邮件订阅', '', 'cn', 1, 1302943422, '邮件订阅可以把所关注的信息，定时发送到你的邮箱，让你及时了解最新的团购情况');
INSERT INTO `tg_foot_nav` VALUES (31, 25, '提供团购信息', '', 'cn', 1, 1302943570, '用户可以向网站提出申请，要发布的团购信息');
INSERT INTO `tg_foot_nav` VALUES (32, 27, '问题反馈', '', 'cn', 3, 1302943210, '问题反馈是把所出现的问题向网站回馈');
INSERT INTO `tg_foot_nav` VALUES (33, 26, '关于TG', '', 'cn', 1, 1302943962, '<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:DrawingGridVerticalSpacing>7.8 磅</w:DrawingGridVerticalSpacing>\r\n  <w:DisplayHorizontalDrawingGridEvery>0</w:DisplayHorizontalDrawingGridEvery>\r\n  <w:DisplayVerticalDrawingGridEvery>2</w:DisplayVerticalDrawingGridEvery>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>ZH-CN</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:SpaceForUL/>\r\n   <w:BalanceSingleByteDoubleByteWidth/>\r\n   <w:DoNotLeaveBackslashAlone/>\r\n   <w:ULTrailSpace/>\r\n   <w:DoNotExpandShiftReturn/>\r\n   <w:AdjustLineHeightInTable/>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:DontVertAlignCellWithSp/>\r\n   <w:DontBreakConstrainedForcedTables/>\r\n   <w:DontVertAlignInTxbx/>\r\n   <w:Word11KerningPairs/>\r\n   <w:CachedColBalance/>\r\n   <w:UseFELayout/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"/>\r\n   <m:brkBin m:val="before"/>\r\n   <m:brkBinSub m:val="&#45;-"/>\r\n   <m:smallFrac m:val="off"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val="0"/>\r\n   <m:rMargin m:val="0"/>\r\n   <m:defJc m:val="centerGroup"/>\r\n   <m:wrapIndent m:val="1440"/>\r\n   <m:intLim m:val="subSup"/>\r\n   <m:naryLim m:val="undOvr"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"/>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:普通表格;\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin:0cm;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.5pt;\r\n	mso-bidi-font-size:11.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-font-kerning:1.0pt;}\r\n</style>\r\n<![endif]-->\r\n\r\n\r\n\r\n\r\n\r\n<p class="MsoNormal"><span lang="EN-US">&nbsp;&nbsp;&nbsp; <font size="3">TGroupon</font></span><font size="3"><span style="font-family: 宋体;">团购系统是由北京博胜神舟科技有限公司出品</span><span lang="EN-US">,</span><span style="font-family: 宋体;">由行业顶尖高手亲自操刀</span><span lang="EN-US">,</span><span style="font-family: 宋体;">历经</span><span lang="EN-US">2010</span><span style="font-family: 宋体;">，</span><span lang="EN-US">2011</span><span style="font-family: 宋体;">两年时间打造最智能化的团购系统</span><span lang="EN-US">TGrouponV3.0,</span><span style="font-family: 宋体;">资深产品设计提供市场需求与用户体验需求，迎合市场需要</span><span lang="EN-US">,</span><span style="font-family: 宋体;">并由数位高级程序人员夜以继日的创造着梦幻般的神话。</span></font></p>\r\n\r\n<p class="MsoNormal"><font size="3"><span lang="EN-US">&nbsp;&nbsp; TGrouponV3.0</span><span style="font-family: 宋体;">负载均衡能力更强劲</span><span lang="EN-US">,</span><span style="font-family: 宋体;">功能更加齐备完善</span><span lang="EN-US">,</span><span style="font-family: 宋体;">有利于营销人员管理运营</span><span lang="EN-US">.</span></font></p>\r\n\r\n<p class="MsoNormal"><font size="3"><span style="font-family: 宋体;">&nbsp;&nbsp; 技术核心由</span><span lang="EN-US">TG</span><span style="font-family: 宋体;">开发团队自主研发而成，易于扩展，修改，智能化升级。</span></font></p>\r\n\r\n');
INSERT INTO `tg_foot_nav` VALUES (36, 26, '隐私声明', '', 'cn', 4, 1306484638, '<div style="font-family: 宋体;" class="sect">\r\n                    <p><font size="2.3333333333333335">&nbsp;&nbsp;&nbsp; TG（www.thinkgroupon.com）以此声明对本站用户隐私保护的许诺。TG的隐私声明正在不断改进中，随着本站服务范围的扩大，会随时更新隐私声明。我们欢迎您随时查看隐私声明。</font></p>\r\n                    <h4 style="font-weight: bold;"><font size="3">&nbsp;隐私政策</font></h4>\r\n                    <p><font size="2.3333333333333335">&nbsp;&nbsp;&nbsp; TG非常重视对用户隐私权的保护，用户的邮件及手机号等个人资料为用户重要隐私，TG承诺不会将个人资料用作它途；承诺不会在未获得用户许可的情况下擅自将用户的个人资料信息出租或出售给任何第三方，但以下情况除外：</font></p>\r\n                    <ol class="list"><li><font size="2.3333333333333335">用户同意让第三方共享资料；</font></li><li><font size="2.3333333333333335">用户同意公开其个人资料，享受为其提供的产品和服务；</font></li><li><font size="2.3333333333333335">本站需要听从法庭传票、法律命令或遵循法律程序；</font></li><li><font size="2.3333333333333335">本站发现用户违反了本站服务条款或本站其它使用规定。</font></li></ol>\r\n                    <h4><font size="3">&nbsp;使用说明</font></h4>\r\n                    <p><font size="2.3333333333333335">&nbsp;&nbsp;&nbsp; TG用户可以通过设定的密码来保护账户和资料安全。用户应当对其密码的保密负全部责任。请不要和他人分享此信息。如果您使用的是公共电脑，请在离开电脑时退出TG以保证您的信息不被后来的使用者获取。</font></p>\r\n                    <h4><font size="3">&nbsp;服务条款</font></h4>\r\n                    <p><font size="2.3333333333333335">&nbsp;&nbsp;&nbsp; 使用TG的服务同时受本站<span style="text-decoration: underline;">用户协议</span>的<span style="text-decoration: underline;"></span>约束。</font></p>\r\n                </div>');



CREATE TABLE `tg_frilink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frilink_title` varchar(50) NOT NULL COMMENT '网站名称',
  `frilink_url` varchar(255) NOT NULL COMMENT '网址',
  `status` tinyint(1) NOT NULL COMMENT '0隐藏1显示',
  `pubtime` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接表' AUTO_INCREMENT=5 ;


INSERT INTO `tg_frilink` VALUES (2, '百度', 'http://www.baidu.com', 1, 0);
INSERT INTO `tg_frilink` VALUES (3, 'Google', 'http://www.google.com', 1, 0);
INSERT INTO `tg_frilink` VALUES (4, '淘宝', 'http://www.taobao.com/', 1, 0);



CREATE TABLE `tg_groupon_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类别id',
  `class_name` varchar(255) NOT NULL COMMENT '类别名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购类别表' AUTO_INCREMENT=1 ;

CREATE TABLE `tg_groupon_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupon_language` varchar(55) NOT NULL COMMENT '系统语言',
  `groupon_class_id` int(11) NOT NULL COMMENT '类别id',
  `groupon_title` varchar(255) NOT NULL COMMENT '名称',
  `groupon_shop_name` varchar(255) NOT NULL COMMENT '商品名称',
  `groupon_city_id` int(11) NOT NULL COMMENT '城市',
  `groupon_seller_id` int(11) NOT NULL COMMENT '商家id',
  `groupon_distribution_id` int(11) NOT NULL COMMENT '配送信息id',
  `groupon_company_id` int(11) NOT NULL COMMENT '快递公司id',
  `groupon_expenses` float NOT NULL COMMENT '快递费',
  `groupon_rebate` float NOT NULL COMMENT '消费返利',
  `groupon_singular` int(11) NOT NULL COMMENT '免单数',
  `groupon_prime_price` float NOT NULL COMMENT '原价',
  `groupon_present_price` float NOT NULL COMMENT '现价',
  `groupon_start_time` int(11) NOT NULL COMMENT '开始时间',
  `groupon_end_time` int(11) NOT NULL COMMENT '结束时间',
  `groupon_num` int(11) NOT NULL COMMENT '最低开团人数',
  `groupon_pic` varchar(255) NOT NULL COMMENT '轮换图片',
  `groupon_tips` text NOT NULL COMMENT '小提示',
  `groupon_content` text NOT NULL COMMENT '本单详情',
  `groupon_display_index` tinyint(1) NOT NULL COMMENT '为1首页显示',
  `groupon_mobile_phone` varchar(13) NOT NULL COMMENT '手机',
  `groupon_telephone` varchar(30) NOT NULL COMMENT '电话',
  `groupon_contact_name` varchar(25) NOT NULL COMMENT '联系人名称',
  `groupon_email` varchar(55) NOT NULL COMMENT '邮箱',
  `groupon_msn` varchar(45) NOT NULL COMMENT 'msn',
  `groupon_qq` int(12) NOT NULL COMMENT 'QQ',
  `groupon_website` varchar(55) NOT NULL COMMENT '网址',
  `groupon_address` varchar(255) NOT NULL COMMENT '地址',
  `mapstatus` int(2) NOT NULL COMMENT '1显示,2不显示地图',
  `theysay` longtext NOT NULL COMMENT '他们说',
  `websitesay` longtext NOT NULL COMMENT '本站说',
  `groupon_stop` int(11) NOT NULL COMMENT '限制条件',
  `shopman` int(11) NOT NULL DEFAULT '0' COMMENT '虚拟团购人数',
  `pubtime` int(11) NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购信息表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站日志表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_mailseting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smtp_server` varchar(255) NOT NULL COMMENT 'SMTP服务器',
  `smtp_port` int(11) NOT NULL COMMENT 'SMTP服务器端口',
  `smtp_mailboxes` varchar(255) NOT NULL COMMENT 'SMTP服务器用户邮箱',
  `smtp_accounts` varchar(255) NOT NULL COMMENT 'SMTP服务器用户账号',
  `smtp_password` varchar(55) NOT NULL COMMENT 'SMTP服务器的用户密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='邮件设置表' AUTO_INCREMENT=2 ;


INSERT INTO `tg_mailseting` VALUES (1, 'smtp.126.com', 25, 'outhand@126.com', 'outhand@126.com', '123456');

CREATE TABLE `tg_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money_users_id` int(11) NOT NULL COMMENT '用户id',
  `money_type` int(11) NOT NULL COMMENT '0充值1消费',
  `money_num` float NOT NULL,
  `money_time` int(11) NOT NULL COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资金动向表' AUTO_INCREMENT=1 ;


CREATE TABLE `tg_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `nav_title` varchar(50) NOT NULL COMMENT '导航名称',
  `nav_link` varchar(255) NOT NULL COMMENT '导航链接',
  `nav_lang` varchar(10) NOT NULL COMMENT '导航语言',
  `nav_sorting` int(11) NOT NULL COMMENT '排序',
  `nav_pubtime` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`),
  KEY `nav_lang` (`nav_lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;



INSERT INTO `tg_nav` VALUES (1, '今日团购', '?tg=/index/details', 'cn', 0, 1302932616);
INSERT INTO `tg_nav` VALUES (2, '往期团购', '?tg=/index/list', 'cn', 0, 1302929024);



CREATE TABLE `tg_news_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_class` varchar(255) NOT NULL COMMENT '类别名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站信息类别表' AUTO_INCREMENT=2 ;



INSERT INTO `tg_news_class` VALUES (1, '公司信息');



CREATE TABLE `tg_news_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_class_id` int(11) NOT NULL COMMENT '类别id',
  `news_title` varchar(255) NOT NULL COMMENT '标题',
  `news_content` text NOT NULL COMMENT '内容',
  `news_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站信息详情表' AUTO_INCREMENT=2 ;



INSERT INTO `tg_news_info` VALUES (1, 1, '关于我们', '我们是一家免费提供团购网站系统的公司,我公司致力于打造永久免费团购产品给大众!\r\n\r\nThinkGroupon团队由来自于业内大型门户网站的程序开发工程师组成,本团队成立于2010年,\r\n\r\n在新的消费领域,需要一款保证永久免费，功能齐全的产品,ThinkGroupon就是这样一款产品,\r\n\r\n欢迎大家品尝新鲜，免费的ThinkGroupon!\r\n\r\n本公司联系方式:\r\n\r\nTel: 15210637282 (技术总监手机)\r\n\r\nEmail: jeffxie@gmail.com\r\n\r\n网址:http://www.thinkgroupon.com/', 1293436670);



CREATE TABLE `tg_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='短信表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_open_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='API表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL COMMENT '订单号',
  `order_groupon_id` int(11) NOT NULL COMMENT '产品id',
  `order_users_id` int(11) NOT NULL COMMENT '用户id',
  `order_num` int(11) NOT NULL COMMENT '购买数量',
  `product_state` int(11) NOT NULL COMMENT '1发货,2已发货',
  `order_address_id` int(11) NOT NULL COMMENT '配送地址id',
  `order_remark` text NOT NULL COMMENT '留言',
  `order_status` int(11) NOT NULL COMMENT '0正常1删除',
  `order_state` int(11) NOT NULL COMMENT '0未付款1已付款',
  `order_pub_time` int(11) NOT NULL COMMENT '提交时间',
  `order_pay_time` int(11) NOT NULL COMMENT '付款时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(255) NOT NULL COMMENT '支付工具名',
  `pay_email` varchar(55) NOT NULL COMMENT '商家email',
  `pay_description` text NOT NULL COMMENT '描述',
  `pay_merchant_id` varchar(255) NOT NULL COMMENT '商户id',
  `pay_password` varchar(255) NOT NULL COMMENT '交易密匙',
  `pay_status` int(11) NOT NULL COMMENT '1开启2不开启',
  `pay_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为默认支付0为否1为是',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='支付工具表' AUTO_INCREMENT=5 ;



INSERT INTO `tg_pay` VALUES (1, '支付宝', 'xieaotian@163.com', 'alipay', '2088002043574573', 't9xagyhjoo9dm0pkfnlhv9c79tisbzsf', 1, 0);
INSERT INTO `tg_pay` VALUES (2, '腾讯财付通', 'fdsf', 'sfdsfsfs', '1207648901', '512087eccdae33b36dcef3dc2a93fe97', 1, 1);
INSERT INTO `tg_pay` VALUES (3, '网银在线', '', '', '21868575', '512087eccdae33b36dcef3dc2a93fe97', 1, 0);
INSERT INTO `tg_pay` VALUES (4, '快钱', 'fdsfds', 'fsdfdsfs', 'test', 'test', 2, 0);



CREATE TABLE `tg_ping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tg_type_id` int(11) NOT NULL COMMENT '踩点1关注2',
  `tg_sid` int(11) NOT NULL COMMENT '商户ID',
  `tg_uid` int(11) NOT NULL,
  `tg_uname` varchar(55) NOT NULL,
  `tg_content` text,
  `tg_ip` int(11) NOT NULL COMMENT 'ip',
  `tg_img` varchar(255) DEFAULT NULL,
  `tg_pubtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `tg_provide` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `provide_username` varchar(50) NOT NULL COMMENT '姓名',
  `provide_telphone` varchar(50) NOT NULL COMMENT '电话',
  `provide_contact` varchar(50) NOT NULL COMMENT '联系方式',
  `provide_city` varchar(50) NOT NULL COMMENT '团购城市',
  `provide_content` varchar(255) NOT NULL COMMENT '团购信息',
  `pubtime` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `tg_p_c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_c_name` varchar(255) NOT NULL COMMENT '省市名',
  `nav_language` varchar(11) NOT NULL COMMENT '语言导航',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='省表' AUTO_INCREMENT=2 ;


INSERT INTO `tg_p_c` VALUES (1, '北京', 'cn');



CREATE TABLE `tg_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_groupon_id` int(11) NOT NULL COMMENT '产品id',
  `question_users_id` int(11) NOT NULL COMMENT '会员id',
  `question_title` varchar(255) NOT NULL COMMENT '问题',
  `question_rely` text NOT NULL COMMENT '回答',
  `question_status` int(11) NOT NULL COMMENT '0未回复1已回复',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='本单答疑表' AUTO_INCREMENT=1 ;


CREATE TABLE `tg_rss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT '1为订阅,2为申请城市',
  `email` varchar(255) NOT NULL COMMENT '邮箱地址',
  `cityid` int(11) NOT NULL COMMENT '所要订阅的城市',
  `cityname` varchar(255) NOT NULL COMMENT '城市名称,用于申请新增城市',
  `ip` int(11) NOT NULL,
  `pubtime` int(11) NOT NULL COMMENT '订阅时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='邮件订阅表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_city_id` int(11) NOT NULL COMMENT '城市id',
  `seller_class_id` int(5) NOT NULL COMMENT '分类id',
  `seller_user_name` varchar(50) NOT NULL COMMENT '用户名',
  `seller_user_pass` varchar(50) NOT NULL COMMENT '密码 ',
  `seller_name` varchar(255) NOT NULL COMMENT '名称',
  `seller_contact` varchar(255) NOT NULL COMMENT '联系人',
  `seller_phone` varchar(50) NOT NULL COMMENT '电话',
  `seller_mobile` int(20) NOT NULL COMMENT '手机',
  `seller_status` varchar(5) NOT NULL COMMENT '商户秀',
  `seller_email` varchar(50) NOT NULL COMMENT '邮箱',
  `seller_qq` varchar(50) NOT NULL COMMENT 'QQ',
  `seller_address` text NOT NULL COMMENT '地址',
  `seller_url` varchar(255) NOT NULL COMMENT '网址',
  `seller_pic` varchar(255) NOT NULL COMMENT '商家图片',
  `seller_position` text NOT NULL COMMENT '位置信息',
  `seller_other` text NOT NULL COMMENT '其他信息1',
  `seller_else` text NOT NULL COMMENT '其他信息2',
  `seller_top` int(5) NOT NULL COMMENT '置顶(1/0)',
  `seller_bank_open` varchar(50) NOT NULL COMMENT '开户行',
  `seller_bank_name` varchar(50) NOT NULL COMMENT '开户名',
  `seller_bank_account` int(50) NOT NULL COMMENT '银行账户',
  `seller_groupon_num` int(11) NOT NULL COMMENT '产品数量',
  `seller_order_num` int(11) NOT NULL COMMENT '订单总数',
  `seller_sum` float NOT NULL COMMENT '交易总额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商家信息表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seo_page_address` varchar(255) NOT NULL COMMENT '位置',
  `seo_title` text NOT NULL COMMENT 'title标签',
  `seo_keywords` text NOT NULL COMMENT 'keywords标签',
  `seo_descript` text NOT NULL COMMENT 'description标签',
  `seo_pubtime` int(11) NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='seo优化表' AUTO_INCREMENT=2 ;



INSERT INTO `tg_seo` VALUES (1, '?tg=/index/details', 'TGroupon是最好的团购系统', 'TGroupon是最好的团购系统', 'aa', 1302929084);


CREATE TABLE `tg_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `share_title` varchar(255) NOT NULL COMMENT '标题',
  `share_content` text NOT NULL COMMENT '内容',
  `share_time` int(11) NOT NULL COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分享表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_suggestion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `suggestion_title` varchar(100) NOT NULL COMMENT '标题',
  `suggestion_content` varchar(255) NOT NULL COMMENT '内容',
  `suggestion_name` varchar(50) NOT NULL,
  `suggestion_tel` varchar(20) NOT NULL,
  `suggestion_email` varchar(50) NOT NULL,
  `pubtime` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE `tg_template` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `tg_language` varchar(55) NOT NULL COMMENT '语言',
  `template_path` varchar(100) NOT NULL COMMENT '模板路径',
  `style_name` varchar(255) NOT NULL COMMENT '风格名称',
  `template_default` int(11) NOT NULL COMMENT '默认模板',
  `template_pic` varchar(255) NOT NULL COMMENT '风格图片',
  `template_pubtime` int(11) NOT NULL COMMENT '建立时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;



INSERT INTO `tg_template` VALUES (1, 'cn', 'default', '默认风格', 1, 'preview.jpg', 1295599235);



CREATE TABLE `tg_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL COMMENT '购物券号',
  `ticket_groupon_id` int(11) NOT NULL COMMENT '产品id',
  `ticket_users_id` int(11) NOT NULL COMMENT '用户id',
  `ticket_out_time` int(11) NOT NULL COMMENT '过期时间',
  `ticket_status` int(11) NOT NULL COMMENT '0未使用1已使用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='购物券' AUTO_INCREMENT=1 ;


CREATE TABLE `tg_traffic_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `ip` int(11) NOT NULL COMMENT '访问者IP',
  `visit_url` varchar(255) NOT NULL COMMENT '访问的URL',
  `country` varchar(255) NOT NULL COMMENT '国际城市',
  `local` varchar(255) NOT NULL COMMENT '详细地理位置',
  `from_url` varchar(255) NOT NULL COMMENT '访问者来自于url',
  `access_time` int(11) NOT NULL COMMENT '访问时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='流量统计表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invite_id` int(11) NOT NULL COMMENT '邀请者id',
  `users_email` varchar(55) NOT NULL COMMENT '用户邮箱',
  `users_realname` varchar(50) NOT NULL COMMENT '用户名',
  `users_password` varchar(30) NOT NULL COMMENT '密码',
  `users_regip` varchar(30) NOT NULL COMMENT '注册ip',
  `users_regtime` int(11) NOT NULL COMMENT '注册时间',
  `users_lastip` varchar(30) NOT NULL COMMENT '最后登录ip',
  `users_lastime` int(11) NOT NULL COMMENT '最后登录时间',
  `users_money` float NOT NULL COMMENT '账户余额',
  `users_integrate` float NOT NULL COMMENT '积分',
  `users_qq` varchar(50) NOT NULL COMMENT 'QQ',
  `users_phone` varchar(50) NOT NULL COMMENT '电话',
  `users_city` varchar(255) NOT NULL COMMENT '所在城市',
  `users_type` int(11) NOT NULL DEFAULT '1' COMMENT '注册类型,1为默认,2为qq,3为开心',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表' AUTO_INCREMENT=1 ;



CREATE TABLE `tg_users_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL COMMENT '用户id',
  `users_provice_id` int(11) NOT NULL COMMENT '省id',
  `users_city_id` int(11) NOT NULL COMMENT '市id',
  `users_street` text NOT NULL COMMENT '街道地址',
  `users_postal` varchar(50) NOT NULL COMMENT '邮编',
  `users_phone` varchar(50) NOT NULL COMMENT '电话',
  `users_mobile` varchar(55) NOT NULL COMMENT '手机',
  `users_consignee` varchar(50) NOT NULL COMMENT '收货人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户地址簿' AUTO_INCREMENT=1 ;