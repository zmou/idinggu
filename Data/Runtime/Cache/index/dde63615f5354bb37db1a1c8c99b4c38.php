<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<link rel="icon" href="favicon.ico" mce_href="#" type="image/x-icon">
    <meta name="Keywords" content="" />
    <meta name="description" content="" />

    <!--<script type="text/javascript">window.pageConfig = { compatible: true ,navId: "home" }; </script>
-->    <script type="text/javascript" src="__PUBLIC__/css/jquery-1.6.4.js"></script>
    <script type="text/javascript" src="__PUBLIC__/css/base.js"></script>
	<link type="text/css" rel="stylesheet"  href="__PUBLIC__/css/floors.css" source="widget"/>
</head>
<body>

<!--  /widget/header/header.vm -->
<!-- header -->
<div id="shortcut-2013">
	<div class="w">
		<ul class="fl lh">
			<li class="fore2"><a href="#" title="#">微乐首页</a></li>
		</ul>
		<ul class="fr lh">
			<li class="fore1" id="loginbar">您好！欢迎来到微乐！<a href="<?php echo U('login');?>">[登录]</a></li>
			<li class="fore2 ld">
				<s></s>
				<a href="#" rel="nofollow">我的订单</a>
			</li>
			<li class="fore4 ld menu" id="biz-service" data-widget="dropdown">
				<s></s>
				<span class="outline"></span>
				<span class="blank"></span>
				客户服务
				<b></b>
				<div class="dd">
					<div><a href="#" target="_blank">帮助中心</a></div>
					<div><a href="#" target="_blank" rel="nofollow">售后服务</a></div>
					<div><a href="#" target="_blank" rel="nofollow">在线客服</a></div>
					<div><a href="#" target="_blank" rel="nofollow">意见建议</a></div>
					<div><a href="#" target="_blank">客服邮箱</a></div>
				</div>
			</li>
			<li class="fore5 ld menu" id="site-nav" data-widget="dropdown">
				<s></s>
				<span class="outline"></span>
				<span class="blank"></span>
				网站导航
				<b></b>
				<div class="dd lh">
					<dl class="item fore1">
						<dt>特色栏目</dt>
						<dd>
							<div><a target="_blank" href="#o">微乐通信</a></div>
							<div><a href="#" target="_blank">校园之星</a></div>
							<div><a target="_blank" href="#">为我推荐</a></div>
							<div><a target="_blank" href="#">视频购物</a></div>
							<div><a target="_blank" href="#">微乐社区</a></div>
							<div><a target="_blank" href="#">在线读书</a></div>
							<div><a target="_blank" href="#">装机大师</a></div>
							<div><a target="_blank" href="#">微乐E卡</a></div>
							<div><a target="_blank" href="#">家装城</a></div>
							<div><a target="_blank" href="#">搭配购</a></div>
							<div><a target="_blank" href="#">我喜欢</a></div>
						</dd>
					</dl>
				</div>
			</li>
		</ul>
		<span class="clr"></span>
	</div>
</div><!--shortcut end-->
<!--shortcut end-->

<div id="o-header-2013">
	<div class="w" id="header-2013">
		<div id="logo-2013" class="ld"><a href="#" hidefocus="true"><b></b><img src="__PUBLIC__/images/logo-201502-jdww.png" width="210" height="60" alt="#"></a></div>
		<!--logo end-->
		<div id="search-2013">
			<div class="i-search ld">
				<ul id="shelper" class="hide">
				</ul>
				<div class="form">
					<input type="text" class="text" accesskey="s" id="key" autocomplete="off" onKeyDown="javascript:if(event.keyCode==13) search('key');">
					<input type="button" value="搜索" class="button" onClick="search('key');return false;">
				</div>
			</div>
			<div id="hotwords"></div>
		</div>
		<!--search end-->
		<div id="my360buy-2013">
			<dl>
				<dt class="ld"><s></s><a href="#">我的微乐</a><b></b></dt>
				<dd>
					<div class="loading-style1"><b></b>加载中，请稍候...</div>
				</dd>
			</dl>
		</div>
		<!--my360buy end-->
		<div id="settleup-2013">
			<dl>
				<dt class="ld"><s></s><span class="shopping"><span id="shopping-amount"></span></span><a href="#" id="settleup-url">去购物车结算</a> <b></b> </dt>
				<dd>
					<div class="prompt">
						<div class="loading-style1"><b></b>加载中，请稍候...</div>
					</div>
				</dd>
			</dl>
		</div>
		<!--settleup end-->
	</div>
	<!--header end-->
	<div class="w">
		<div id="nav-2013">
			<div id="categorys-2013">
				<div class="mt ld">
					<h2><a>全部商品分类<b></b></a></h2>
				</div>
			</div>
			<div id="treasure"></div>
			<ul id="navitems-2013">
				<li class="fore1" id="nav-home"><a href="#">首页</a></li>
				<li class="fore2" id="nav-ebay"><a href="#">eBay海外精选</a></li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
	/*设置导航选中*/
	(function(){if(pageConfig.navId){var object=document.getElementById("nav-"+pageConfig.navId);if(object)object.className+=" curr";}})();

	/*设置导航100%宽*/
    (function(){var a=document.getElementById("nav-2013");if(!a){return};var b=document.createElement("div");b.className="w";b.style.position="relative";b.style.paddingLeft=window.pageConfig.compatible && window.pageConfig.wideVersion?"242px":"248px";b.style.width=window.pageConfig.compatible && window.pageConfig.wideVersion?"968px":"742px";b.innerHTML=a.innerHTML;a.parentNode.className="";a.parentNode.style.width="100%";a.style.paddingLeft="0";a.style.marginBottom="0";a.innerHTML="";a.appendChild(b)})();
 </script>
<!-- /header -->
	<!--header end-->
<!--<script type="text/javascript">
	            (function(d){
            var c = d.createElement("div");
            var o = d.getElementById("o-header-2013");
            var h = d.getElementById("header-2013");

            var s    = "http://img10.360buyimg.com/jdcms/jfs/t1663/23/170808642/183166/ddc38a67/557ba345N277e32c0.jpg"
            var href = "http://sale.jd.hk/act/U7vQYJuAdt2BR3.html";
            var ext  = "#7e1b6e";

            if ( typeof s !== 'undefined' ) {
                c.id="top-banner";
                c.style.background= ext;
                c.innerHTML="<div class='w ld' clstag='firsttype|keycount|jdworldwide|dingtong'><a href='"+href+"' target='_blank'><img src='"+s+"' width=100%' /></a><div style='position:absolute;top:0px;right:0px;width:25px;height:25px;background:#fff;filter:alpha(opacity=0);opacity:0;cursor:pointer' onclick='document.getElementById(\"o-header-2013\").removeChild(document.getElementById(\"top-banner\"));'></div></div>";
                o.insertBefore(c,h);
            }
        })(document);
		</script>-->
<!-- /header -->
<!--/ /widget/header/header.vm -->
    <div class="first-screen">
        <div class="w category-wrap">

<!--  /widget/category/category.vm -->
<div id="p-category" class="p-category J_p-category">
    <div class="auto-wrap">
        <div class="menu">
		                <div class="ui-switchable-menu item fore1">
                <div class="item-cont">
					<h2>妈妈宝贝</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl1-1" href="#" title="尿裤湿巾" target="_blank">尿裤湿巾</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl1-2" href="#" title="洗护用品" target="_blank">洗护用品</a>
                </div>
            </div>
                        <div class="ui-switchable-menu item fore2">
                <div class="item-cont">
					<h2>进口奶粉</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl2-1" href="#" title="爱他美" target="_blank">爱他美</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl2-2" href="#" title="荷兰牛栏" target="_blank">荷兰牛栏</a>
                </div>
            </div>
                        <div class="ui-switchable-menu item fore3">
                <div class="item-cont">
					<h2>个护美妆</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl3-1" href="#" title="面部护肤" target="_blank">面部护肤</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl3-2" href="#" title="洗发护发" target="_blank">洗发护发</a>
                </div>
            </div>
                        <div class="ui-switchable-menu item fore4">
                <div class="item-cont">
					<h2>全球美食</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl4-1" href="#" title="进口食品" target="_blank">进口食品</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl4-2" href="#" title="休闲零食" target="_blank">休闲零食</a>
                </div>
            </div>
                        <div class="ui-switchable-menu item fore5">
                <div class="item-cont">
					<h2>营养保健</h2>
										<a clstag="firsttype|keycount|jdworldwide|fl5-1" href="#" title="营养健康" target="_blank">营养健康</a>
										<a clstag="firsttype|keycount|jdworldwide|fl5-2" href="#" title="营养成分" target="_blank">营养成分</a>
									</div>
            </div>
                        <div class="ui-switchable-menu item fore6">
                <div class="item-cont">
					<h2>家居厨具</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl6-1" href="#" title="水具酒具" target="_blank">水具酒具</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl6-2" href="#" title="烹饪锅具" target="_blank">烹饪锅具</a>
                </div>
            </div>
                        <div class="ui-switchable-menu item fore7">
                <div class="item-cont">
					<h2>服装鞋包</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl7-1" href="#" title="奢侈品" target="_blank">奢侈品</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl7-2" href="#" title="运动鞋包" target="_blank">运动鞋包</a>
                </div>
            </div>
                        <div class="ui-switchable-menu item fore8">
                <div class="item-cont">
					<h2>钟表首饰</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl8-1" href="#" title="男表" target="_blank">男表</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl8-2" href="#" title="女表" target="_blank">女表</a>
                </div>
            </div>
                        <div class="ui-switchable-menu item fore9">
                <div class="item-cont">
					<h2>数码电器</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl9-1" href="#" title="个护健康" target="_blank">个护健康</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl9-2" href="#" title="生活电器" target="_blank">生活电器</a>
                </div>
            </div>
                        <div class="ui-switchable-menu item fore10">
                <div class="item-cont">
					<h2>全球购热卖</h2>
                    <a clstag="firsttype|keycount|jdworldwide|fl10-1" href="#" title="美妆自营" target="_blank">美妆自营</a>
                    <a clstag="firsttype|keycount|jdworldwide|fl10-2" href="#" title="母婴自营" target="_blank">母婴自营</a>
                </div>
            </div>


        </div>
        <!-- /menu -->
        <div class="sub-menu" style="display:none;">
		                <div class="ui-switchable-submenu item fore1 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl1-3">
                                  <li><a href="#" target="_blank">喂养用品</a></li>
                                  <li><a href="#" target="_blank">营养辅食</a></li>
                                  <li><a href="#" target="_blank">童车童床</a></li>
                                  <li><a href="#" target="_blank">妈妈专区</a></li>
                                  <li><a href="#" target="_blank">安全座椅</a></li>
                                  <li><a href="#" target="_blank">寝具服饰</a></li>
                                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl1-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/557956ecNfbbc6197.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore2 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl2-3">
                                        <li><a href="#select" target="_blank">喜宝</a></li>
                                        <li><a href="#" target="_blank">荷兰美素</a></li>
                                        <li><a href="#" target="_blank">港版美素</a></li>
                                        <li><a href="#" target="_blank">惠氏</a></li>
                                        <li><a href="#" target="_blank">美赞臣</a></li>
                                        <li><a href="#" target="_blank">英国牛栏</a></li>
                                        <li><a href="#" target="_blank">贝拉米</a></li>
                                        <li><a href="#" target="_blank">喜宝</a></li>
                                        <li><a href="#" target="_blank">可瑞康</a></li>
                                        <li><a href="#" target="_blank">明治</a></li>
                                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl2-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/55790353N3900823a.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore3 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl3-3">
                                        <li><a href="#" target="_blank">身体护肤</a></li>
                                        <li><a href="#" target="_blank">口腔护理</a></li>
                                        <li><a href="#" target="_blank">女性护理</a></li>
                                        <li><a href="#" target="_blank">香水彩妆</a></li>
                                        <li><a href="#" target="_blank">面膜</a></li>
                                        <li><a href="#" target="_blank">防晒隔离</a></li>
                                        <li><a href="#" target="_blank">卸妆</a></li>
                                        <li><a href="#" target="_blank">套装</a></li>
                                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl3-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/5566be19Ne7595da6.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore4 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl4-3">
                                        <li><a href="#" target="_blank">饼干蛋糕</a></li>
                                        <li><a href="#" target="_blank">冲调饮品</a></li>
                                        <li><a href="#" target="_blank">糖果/巧克力</a></li>
                                        <li><a href="#" target="_blank">粮油调味</a></li>
                                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl4-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/556579e7N65285581.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore5 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl5-3">
                                        <li><a href="#" target="_blank">成人用品</a></li>
                                        <li><a href="#" target="_blank">调节免疫</a></li>
                                        <li><a href="#" target="_blank">美体塑身</a></li>
                                        <li><a href="#" target="_blank">美容养颜</a></li>
                                        <li><a href="#" target="_blank">肝肾养护</a></li>
                                        <li><a href="#" target="_blank">蛋白质</a></li>
                                        <li><a href="#" target="_blank">维生素/矿物质</a></li>
                                        <li><a href="#" target="_blank">玛咖</a></li>
                                        <li><a href="#" target="_blank">鱼油/磷脂</a></li>
                                        <li><a href="#" target="_blank">左旋肉碱</a></li>
                                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl5-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/55657a23Nb0214359.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore6 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl6-3">
				                                <li><a href="#" target="_blank">
						刀箭菜板</a></li>
						                        <li><a href="#" target="_blank">
						冷水杯</a></li>
						                        <li><a href="#" target="_blank">
						保温杯</a></li>
						                        <li><a href="#" target="_blank">
						儿童杯</a></li>
						                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl6-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/5566c7f2Nbb4b0d5f.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore7 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl7-3">
				                                <li><a href="#" target="_blank">
						太阳镜/眼镜框</a></li>
						                        <li><a href="#" target="_blank">
						饰品</a></li>
						                        <li><a href="#" target="_blank">
						时尚女鞋</a></li>
						                        <li><a href="#" target="_blank">
						流行男鞋</a></li>
						                        <li><a href="#" target="_blank">
						运动服饰</a></li>
						                        <li><a href="#" target="_blank">
						潮流女包</a></li>
						                        <li><a href="#" target="_blank">
						腰带</a></li>
						                        <li><a href="#" target="_blank">
						功能箱包</a></li>
						                        <li><a href="#" target="_blank">
						男装</a></li>
						                        <li><a href="#" target="_blank">
						女装</a></li>
						                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl7-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/5566c7f2Nbb4b0d5f.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore8 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl8-3">
				                                <li><a href="#" target="_blank">
						智能手表</a></li>
						                        <li><a href="#" target="_blank">
						珠宝首饰</a></li>
						                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl8-4">
					<a href="#" target="_blank">
						<img data-lazy-img="http://img10.360buyimg.com/jdcms/s247x202_jfs/t940/339/1013785610/10209/bf18c051/5565c3d2N5fd2c6f9.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore9 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl9-3">
				                                <li><a href="#" target="_blank">
						电风扇</a></li>
						                        <li><a href="#" target="_blank">
						净化器</a></li>
						                        <li><a href="#" target="_blank">
						扫地机器人</a></li>
						                        <li><a href="#" target="_blank">
						吸尘器</a></li>
						                        <li><a href="#" target="_blank">
						咖啡机</a></li>
						                        <li><a href="#" target="_blank">
						运动相机</a></li>
						                        <li><a href="#" target="_blank">
						耳机耳麦</a></li>
						                        <li><a href="#" target="_blank">
						打印机</a></li>
						                        <li><a href="#" target="_blank">
						剃须刀</a></li>
						                        <li><a href="#" target="_blank">
						电吹风</a></li>
						                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl9-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/5566c7f2Nbb4b0d5f.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
			            <div class="ui-switchable-submenu item fore10 ">
			                   <ul class="i-ext" clstag="firsttype|keycount|jdworldwide|fl10-3">
                                        <li><a href="#" target="_blank">名品腕表</a></li>
                                        <li><a href="#" target="_blank">珠宝配饰</a></li>
                                        <li><a href="#" target="_blank">口腔护理</a></li>
                                        <li><a href="#" target="_blank">应季家电</a></li>
                                        <li><a href="#" target="_blank">世界美食</a></li>
                                        <li><a href="#" target="_blank">夏日凉饮</a></li>
                                        <li><a href="#" target="_blank">夏季瘦身</a></li>
                                        <li><a href="#" target="_blank">营养健康</a></li>
                                        <li><a href="#" target="_blank">领带领结</a></li>
                                        <li><a href="#" target="_blank">夏季防晒</a></li>
                                </ul>
				                <div class="i-img" clstag="firsttype|keycount|jdworldwide|fl10-4">
					<a href="#" target="_blank">
						<img data-lazy-img="__PUBLIC__/images/5566c7f2Nbb4b0d5f.jpg" width="247" height="202" class="err-product">
					</a>
				</div>
            </div>
        </div>
        <!-- /sub-menu -->
    </div>
</div>
<!--/ /widget/category/category.vm -->
        </div>

<!--  /widget/slider/slider.vm -->
<div class="p-slider J_p-slider">
    <div class="slider-wrap">
        <ul>

            <script>
            (function(cfg, doc) {
                var data = [

                    {
                        width: 742,
                        height: 474,
                        href: "#",
                        src: "__PUBLIC__/images/5577b1edN40296bf1.jpg",
                        ext1: " #91005f",
                        index: "0"
                    }
                    ,
                    {
                        width: 742,
                        height: 474,
                        href: "#",
                        src: "__PUBLIC__/images/557a4dadN182ca250.jpg",
                        ext1: "#830292",
                        index: "1"
                    }
                    ,
                    {
                        width: 742,
                        height: 474,
                        href: "http://sale.jd.hk/act/qzURoWJ2vPw.html",
                        src: "__PUBLIC__/images/5577e3a7N3772dbaa.jpg",
                        ext1: "#d56e07",
                        index: "2"
                    }
                    ,
                    {
                        width: 742,
                        height: 474,
                        href: "http://sale.jd.hk/act/0cuNwls2Q51Vx4Y.html",
                        src: "__PUBLIC__/images/5578158aNbd4d7f6f.jpg",
                        ext1: "#b70040",
                        index: "3"
                    }
                    ,
                    {
                        width: 742,
                        height: 474,
                        href: "#",
                        src: "__PUBLIC__/images/557aa950N0553fbf5.jpg",
                        ext1: "#c20045",
                        index: "4"
                    }
					,
                    {
                        width: 742,
                        height: 474,
                        href: "#",
                        src: "__PUBLIC__/images/557ba626N04c44b9e.jpg",
                        ext1: "#f2a00a",
                        index: "5"
                    }

                ];

                var currentItem;
                var result = [];

                for( var i = 0; i < data.length; i++ ) {
                    currentItem = data[i];
                    var html = '\
                        <li class="item ui-slider-item '+ (currentItem.index=='0'?'selected':'') +'" style="background-color: '+ currentItem.ext1 +';">\
                            <div class="i-wrap">\
                                <div class="i-inner">\
                                    <a target="_blank" class="i-link" clstag="firsttype|keycount|jdworldwide|djd'+(i+1)+'" href="'+ currentItem.href +'">\
                                        <img data-img="1" class="err-product" '+ (currentItem.index=='0'?'src':'data-src') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="474" />\
                                    </a>\
                                </div>\
                            </div>\
                        </li>';

                    result.push(html);
                }

                doc.write(result.join(''));
            })(pageConfig, document);
            </script>
        </ul>
    </div>
    <div class="slider-trigger">
        <a class="ui-slider-trigger" href="javascript:;"></a>
        <a class="ui-slider-trigger" href="javascript:;"></a>
        <a class="ui-slider-trigger" href="javascript:;"></a>
        <a class="ui-slider-trigger" href="javascript:;"></a>
        <a class="ui-slider-trigger" href="javascript:;"></a>
		<a class="ui-slider-trigger" href="javascript:;"></a>
    </div>
    <div class="slider-page">
        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
    </div>
</div>

<!--/ /widget/slider/slider.vm -->
        <div class="w">

<!--  /widget/imgList/imgList.vm -->
<ul class="slider-banner">
       <li class="fore1" clstag='firsttype|keycount|jdworldwide|xjd1'>
        <a href="#" target="_blank">
            <img class="loading-style2" data-lazy-img="__PUBLIC__/images/557aa541N928bfb9b.jpg" width="247" height="215" alt="" />
        </a>
    </li>
        <li class="fore1" clstag='firsttype|keycount|jdworldwide|xjd2'>
        <a href="#" target="_blank">
            <img class="loading-style2" data-lazy-img="__PUBLIC__/images/557a4517N47d09e27.jpg" width="247" height="215" alt="" />
        </a>
    </li>
    </ul>
<!--/ /widget/imgList/imgList.vm -->
        </div>
	    <div class="w">

<!--  /widget/auth/auth.vm -->
<div class="m m-auth">
	<div class="mc auth-bd">

		<script>
			(function(doc, win) {
				var img = {
					srcA: "__PUBLIC__/images/55516bb2N6e635922.jpg",
					srcB: "__PUBLIC__/images/55516bc3N4a9a4f48.jpg"
				};
				var src = pageConfig.wideVersion&&pageConfig.compatible ? img.srcA : img.srcB;
				var wid = pageConfig.wideVersion&&pageConfig.compatible ? 1210 : 990;

				var authImg = '<img width="' + wid + '" height="80" data-lazy-img="' + src + '"">';
				doc.write(authImg);
			})(document, window);
		</script>
	</div>
</div>
<!--/ /widget/auth/auth.vm -->
	    </div>
    </div>
    <div class="w" id="floorContent">

<!--  /widget/second-kill/second-kill.vm -->
<div data-idx="0" class="m m-floor m-floor-a" id="floor1" clstag="firsttype|keycount|jdworldwide|xsqg1">
	<div class="mt floor-hd">
		<h2><img class="" src="__PUBLIC__/images/floor-title-01.jpg" data-lazy-img="done" alt="限时抢购" height="27" width="217"></h2>

		<div id="countdowns" class="ui-countdown"><div class="ui-countdown-bg"><span class="ui-countdown-num" id="countdownshour">08</span><span class="ui-countdown-num" id="countdownsminutes">02</span><span class="ui-countdown-num" id="countdownsseconds">58</span></div></div>


	</div>
	<div class="mc floor-bd" id="limitbuy">
		<ul>


		</ul>

	</div>
</div>
<script type="text/javascript">
var timer = {};
var timerContainer = {};
var timerTool = {};
var restTime = function(t) {
        if (t <= 0)
                return [0, 0, 0];
        var h = Math.floor(t / 3600000);
        var mt = t % 3600000;
        var m = Math.floor(mt / 60000);
        var st = t % 60000;
        var s = Math.floor(st / 1000);
        return [h, m, s];
};
var changeShow = function(id) {
        timer[id] = timer[id] - 1000;
        var t = restTime(timer[id]);

        if (t[0] == 0 && t[1] == 0 && t[2] == 0) {
                //timerContainer["t" + id].html("抢购结束!<a href='#none' onclick='contentInit()'>刷新</a>");
				$("#countdownshour").html('0'+t[0]);
				$("#countdownsminutes").html('0'+t[1]);
				$("#countdownsseconds").html('0'+t[2]);
                clearInterval(timerTool[id]);
        } else {

				if(t[0]<10 && t[0]>=0) {
				 $("#countdownshour").html('0'+t[0]);
				}else{
				 $("#countdownshour").html(t[0]);
				}
				if(t[1]<10 && t[1]>=0) {
				  $("#countdownsminutes").html('0'+t[1]);
				}else{
				  $("#countdownsminutes").html(t[1]);
				}

				if(t[2]<10 && t[2]>=0) {
				  $("#countdownsseconds").html('0'+t[2]);
				}else{
				  $("#countdownsseconds").html(t[2]);
				}
        }
};
var freshTime = function(tb, te, tn, id) {
        //tn = Date.parse(tn.replace(/-/g, "/"));
        //te = Date.parse(te.replace(/-/g, "/"));
		tn = Math.round(new Date().getTime());
		var date = new Date();
        date.setHours(23);
        date.setMinutes(59);
        date.setSeconds(59);
		te = Math.round(date.getTime());
        timer[id] = te - tn;
        changeShow(id);
        timerTool[id]=setInterval("changeShow('" + id + "')", 1000);
};
var limitBuyRfid=1000919;
var contentInit = function() {
   jQuery.ajax({
        url: "http://qiang.jd.com/HomePageNewLimitBuy.ashx?callback=?",
		timeout:5000,
                data: { ids: limitBuyRfid },
                dataType: "jsonp",
                success: function(r,status,jqXHR) {
					  //console.log(jqXHR.status);
		              if (r && r.data && (r.data.length > 0)) {
                                var data = r.data[0];
                                var content = [];
                                var product = null;
								//获取的商品池数据
								var phpGoods = '[{"skuId":"1950352058","saleAttr":"jfs\/t1501\/208\/86650931\/16252\/510e63d9\/55559accN383570c7.jpg"},{"skuId":"1951020133","saleAttr":"jfs\/t1123\/225\/1039807135\/18597\/e5db55d7\/5568688cN4c7f8409.jpg"},{"skuId":"1950298057","saleAttr":"jfs\/t1186\/328\/1091734004\/27020\/27e7d82a\/5570fd9bN63ab580a.jpg"},{"skuId":"1950257346","saleAttr":"jfs\/t1150\/222\/1110125441\/28000\/d2843d41\/55765945Ne17eaf92.jpg"},{"skuId":"1950242168","saleAttr":"jfs\/t1102\/289\/1073661147\/64053\/4d964741\/55765982N66ed90a2.jpg"},{"skuId":"1950351589","saleAttr":"jfs\/t1111\/219\/1122404356\/35471\/3b9a9631\/5576cdf4N466920be.jpg"},{"skuId":"1951109703","saleAttr":"jfs\/t1009\/9\/1129132961\/75965\/6bc75c17\/557a4464Nc0b18144.jpg"}]';
								var phpObj = eval('(' + phpGoods + ')');
								num = phpObj.length;

                                for (var i = 0, j = data.pros.length; i < j; i++) {
									   product = data.pros[i];
									   for(var p=0;p<num;p++) {
									     pnum = phpObj[p];
										 if((pnum['skuId']==product.id)&&(pnum['saleAttr']!='')) {
										   //console.log("111");
										   product.tp = pnum['saleAttr'];
										   var s=product.tp.indexOf('/');
										   product.tp = product.tp.substring(s);

										   product.tp = 'http://img11.360buyimg.com/jdcms/s200x255_jfs'+product.tp;

										 }else{
										   //console.log("222");
										   product.tp = product.tp;
										   t1=product.tp.indexOf('/n3/jfs/');
										   if(t1!=-1) {
                                             t1 = t1+8;
                                             nsr = product.tp.substring(t1);
										     product.tp = 'http://img11.360buyimg.com/jdcms/s200x255_jfs/'+nsr;
										     product.tp = product.tp;
										   }

										 }
									   }//for end


										if((num==undefined)||(num=='undefined')) {
										   //console.log("333");
										   t1=product.tp.indexOf('/n3/jfs/');
										   if(t1!=-1) {
                                             t1 = t1+8;
                                             nsr = product.tp.substring(t1);
										     product.tp = 'http://img11.360buyimg.com/jdcms/s200x255_jfs/'+nsr;
										     product.tp = product.tp;
										   }

										}

									   if((product.tb<=product.st)&&(product.te>=product.st)) {
									     content.push('<li class="item fore'+(i+1)+'"><a href="http://item.jd.com/' + product.id + '.html" target="_blank" title="'+unescape(product.mc)+'"><img src="'+product.tp+'" class="p-img" data-lazy-img="done" alt="'+unescape(product.mc)+'" height="255" width="200"><span class="p-name">'+unescape(product.mc)+'</span></a><div class="p-price"><em>'+"&yen;"+'</em>'+product.qg+'</div></li>');
									   }

								}//for end

								jQuery("#limitbuy ul").html(content.join(""));
								for (var i = 0, j = data.pros.length; i < j; i++) {
                                        product = data.pros[i];
										if((product.tb<=product.st)&&(product.te>=product.st)) {
                                          timerContainer["t" + product.id] = $("#t" + product.id);
                                          freshTime(product.tb, product.te, product.st, product.id);
										}
                                }
					  }else{
					      $("#floor1").hide();
				          $('.ui-elevator a:first-child').hide();
					  }
				},//success end
				error:function() {
				  $("#floor1").hide();
				  $('.ui-elevator a:first-child').hide();
				}

   });
}
contentInit();
</script>
<!--/ /widget/second-kill/second-kill.vm -->



<!--  /widget/global-shops/global-shops.vm 3-->
<div class="m m-floor" id="national">
	<div class="mt floor-hd">
		<h2><img data-lazy-img="http://misc.360buyimg.com/product/jdww/1.0.0/css/i/floor-title-national.jpg" width="250" height="27" alt="国家馆"></h2>
		<div class="extra">
			<ul>
				<li class="ui-switchable-item item fore1 curr" clstag="firsttype|keycount|jdworldwide|gjg1">
					<a>美加<em>USA&amp;Canada</em></a>
				</li>
				<li class="ui-switchable-item item fore2" clstag="firsttype|keycount|jdworldwide|gjg2">
					<a>日本<em>Japan</em></a>
				</li>
				<li class="ui-switchable-item item fore3" clstag="firsttype|keycount|jdworldwide|gjg3">
					<a>韩国<em>Korea</em></a>
				</li>
				<li class="ui-switchable-item item fore4" clstag="firsttype|keycount|jdworldwide|gjg4">
					<a>澳新<em>Australia&New Zealand</em></a>
				</li>
				<li class="ui-switchable-item item fore5" clstag="firsttype|keycount|jdworldwide|gjg5">
					<a>欧洲<em>Europe</em></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="mc floor-bd">
	   		<div class="ui-switchable-panel">
			<div class="side-img">
			    				<a clstag="firsttype|keycount|jdworldwide|gjg1-1"
				 target="_blank" class="fore1">
				<img data-lazy-img="__PUBLIC__/images/555d986dNfe29eb89.jpg" width="247"></a>
								<a clstag="firsttype|keycount|jdworldwide|gjg1-2"
				 target="_blank" class="fore2">
				<img data-lazy-img="__PUBLIC__/images/555d9896N187f5925.jpg" width="247"></a>
							</div>
			<div class="main-inner">
				<ul class="main-body">
									<li clstag="firsttype|keycount|jdworldwide|gjg1-6" class="item fore1">
						<a href="#" class="p-img" target="_blank">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556fb54eNa1b4ab5f.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg1-7" class="item fore2">
						<a href="#" class="p-img" target="_blank">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556fe916N86fb6ce3.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg1-8" class="item fore3">
						<a href="#" class="p-img" target="_blank">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556fe916N86fb6ce3.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg1-9" class="item fore4">
						<a href="#" class="p-img" target="_blank">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/5565c5acN382d1f45.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg1-10" class="item fore5">
						<a href="#" class="p-img" target="_blank">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/5565c581N13c6e6a5.jpg" class="">
						</a>
					</li>


				</ul>
				<ul class="main-extra">
				    					<li clstag="firsttype|keycount|jdworldwide|gjg1-10" class="item fore1">
						<a href="#" class="p-img"  target="_blank">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55765b79Nfccf71a4.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950961439"></em></strong></span>
						</a>
					</li>
										<li clstag="firsttype|keycount|jdworldwide|gjg1-11" class="item fore2">
						<a href="#" class="p-img"  target="_blank">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55718640Nc5422660.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950306008"></em></strong></span>
						</a>
					</li>
									</ul>
			</div>
						<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [{"width":494,"height":241,"href":"http:\/\/mall.jd.hk\/index-119665.html","alt":"","src":"http:\/\/img14.360buyimg.com\/jdcms\/s494x241_jfs\/t832\/347\/1081108792\/221843\/13c66edc\/5571711aN9e924b56.jpg","index":0},{"width":494,"height":241,"href":"http:\/\/sale.jd.hk\/act\/bIA8lKMNsQ.html","alt":"","src":"http:\/\/img13.360buyimg.com\/jdcms\/s494x241_jfs\/t781\/161\/1136606131\/82809\/e57c4a8c\/55795d0aN6f578d64.jpg","index":1},{"width":494,"height":241,"href":"http:\/\/sale.jd.hk\/mall\/FMlfp05TWIHumK.html","alt":"","src":"http:\/\/img11.360buyimg.com\/jdcms\/s494x241_jfs\/t1036\/77\/1065713703\/392047\/384f40a0\/556fb2dfNe2e96596.jpg","index":2}];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li clstag="firsttype|keycount|jdworldwide|gjg1-'+(i+3)+'" class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="241" alt="'+ currentItem.alt +'" />\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
		</div>
				<div class="ui-switchable-panel">
			<div class="side-img">
								<a clstag="firsttype|keycount|jdworldwide|gjg2-1"
				href="#" target="_blank" class="fore1"><span>进入日本馆</span>                 <img data-lazy-img="__PUBLIC__/images/55668182N54f8bb3d.jpg" width="247"></a>
								<a clstag="firsttype|keycount|jdworldwide|gjg2-2"
				href="#" target="_blank" class="fore2">                 <img data-lazy-img="__PUBLIC__/images/55668182N54f8bb3d.jpg" width="247"></a>
							</div>
			<div class="main-inner">
				<ul class="main-body">
										<li clstag="firsttype|keycount|jdworldwide|gjg2-6" class="item fore1">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556ffce2N65e8bb47.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg2-7" class="item fore2">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556ffce2N65e8bb47.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg2-8" class="item fore3">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556ffce2N65e8bb47.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg2-9" class="item fore4">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556ffce2N65e8bb47.jpg" class="">
						</a>
					</li>

				</ul>
				<ul class="main-extra">
										<li clstag="firsttype|keycount|jdworldwide|gjg2-10" class="item fore1">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556ffce2N65e8bb47.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950262100"></em></strong></span>
						</a>
					</li>
										<li clstag="firsttype|keycount|jdworldwide|gjg2-11" class="item fore2">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556ffce2N65e8bb47.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950908522"></em></strong></span>
						</a>
					</li>
										<li clstag="firsttype|keycount|jdworldwide|gjg2-12" class="item fore3">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556ffce2N65e8bb47.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950070832"></em></strong></span>
						</a>
					</li>
									</ul>
			</div>
						<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [{"width":494,"height":241,"href":"http:\/\/mall.jd.hk\/view_page-22419471.html","alt":"","src":"http:\/\/img14.360buyimg.com\/jdcms\/s494x241_jfs\/t1447\/122\/232081686\/82218\/3eb19da8\/55669843Nfd86db3e.jpg","index":0},{"width":494,"height":241,"href":"http:\/\/sale.jd.hk\/mall\/86IYETdJjNPG.html","alt":"","src":"http:\/\/img14.360buyimg.com\/jdcms\/s494x241_jfs\/t1186\/345\/1070911648\/98978\/2013e02b\/556fb5abNf82ff1fd.jpg","index":1},{"width":494,"height":241,"href":"http:\/\/sale.jd.hk\/mall\/LMiRY631cdfvC.html","alt":"","src":"http:\/\/img14.360buyimg.com\/jdcms\/s494x241_jfs\/t1537\/69\/286591874\/73840\/35a3448a\/556fb5cbNb8aa4407.jpg","index":2}];
					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li clstag="firsttype|keycount|jdworldwide|gjg2-'+(i+3)+'" class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="241" alt="'+ currentItem.alt +'" />\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
		</div>
				<div class="ui-switchable-panel">
			<div class="side-img">
				 				<a clstag="firsttype|keycount|jdworldwide|gjg3-1"
				 target="_blank" class="fore1">
				      <img data-lazy-img="__PUBLIC__/images/556681b1N12dd9439.jpg" width="247"></a>
								<a clstag="firsttype|keycount|jdworldwide|gjg3-2"
				 target="_blank" class="fore2">
				      <img data-lazy-img="__PUBLIC__/images/556681b1N12dd9439.jpg" width="247"></a>
							</div>
			<div class="main-inner">
				<ul class="main-body">
										<li  clstag="firsttype|keycount|jdworldwide|gjg3-6" class="item fore1">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557167d7N302db99e.jpg" class="">
						</a>
					</li>
									<li  clstag="firsttype|keycount|jdworldwide|gjg3-7" class="item fore2">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557167d7N302db99e.jpg" class="">
						</a>
					</li>
									<li  clstag="firsttype|keycount|jdworldwide|gjg3-8" class="item fore3">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557167d7N302db99e.jpg" class="">
						</a>
					</li>
									<li  clstag="firsttype|keycount|jdworldwide|gjg3-9" class="item fore4">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557167d7N302db99e.jpg" class="">
						</a>
					</li>


				</ul>
				<ul class="main-extra">
										<li clstag="firsttype|keycount|jdworldwide|gjg3-10" class="item fore1">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557167d7N302db99e.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950780011"></em></strong></span>
						</a>
					</li>
										<li clstag="firsttype|keycount|jdworldwide|gjg3-11" class="item fore2">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557167d7N302db99e.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950245029"></em></strong></span>
						</a>
					</li>
										<li clstag="firsttype|keycount|jdworldwide|gjg3-12" class="item fore3">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557167d7N302db99e.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950762094"></em></strong></span>
						</a>
					</li>
									</ul>
			</div>
						<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [{"width":494,"height":241,"href":"http:\/\/mall.jd.hk\/advance_search-391850-121907-118742-0-0-0-1-1-24.html?keyword=%25E9%259F%25A9%25E5%259B%25BD","alt":"","src":"http:\/\/img14.360buyimg.com\/jdcms\/s494x241_jfs\/t1237\/94\/1055750191\/83060\/86a3eb37\/556e7ab1N3b48cf78.jpg","index":0},{"width":494,"height":241,"href":"http:\/\/mall.jd.hk\/index-122086.html","alt":"","src":"http:\/\/img10.360buyimg.com\/jdcms\/s494x241_jfs\/t1075\/319\/996992855\/79628\/b8c77039\/55716a13N01df21d3.jpg","index":1},{"width":494,"height":241,"href":"http:\/\/mall.jd.hk\/index-118134.html","alt":"","src":"http:\/\/img10.360buyimg.com\/jdcms\/s494x241_jfs\/t1297\/305\/330566707\/52666\/75831c78\/5566e9c7Nbff8d575.jpg","index":2}];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li clstag="firsttype|keycount|jdworldwide|gjg3-'+(i+3)+'" class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="241" alt="'+ currentItem.alt +'" />\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
		</div>
				<div class="ui-switchable-panel">
			<div class="side-img">
								<a clstag="firsttype|keycount|jdworldwide|gjg4-1"
				 target="_blank" class="fore1">
				      <img data-lazy-img="__PUBLIC__/images/5565de39N682e996e.jpg" width="247"></a>
								<a clstag="firsttype|keycount|jdworldwide|gjg4-2"
				 target="_blank" class="fore2">
				      <img data-lazy-img="__PUBLIC__/images/5565de39N682e996e.jpg" width="247"></a>
							</div>
			<div class="main-inner">
				<ul class="main-body">

										<li clstag="firsttype|keycount|jdworldwide|gjg4-6" class="item fore1">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55768960Nf042eec7.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg4-7" class="item fore2">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55768960Nf042eec7.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg4-8" class="item fore3">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55768960Nf042eec7.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg4-9" class="item fore4">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55768960Nf042eec7.jpg" class="">
						</a>
					</li>

				</ul>
				<ul class="main-extra">
					 					<li clstag="firsttype|keycount|jdworldwide|gjg4-10" class="item fore1">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55768960Nf042eec7.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950228251"></em></strong></span>
						</a>
					</li>
										<li clstag="firsttype|keycount|jdworldwide|gjg4-11" class="item fore2">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55768960Nf042eec7.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950295177"></em></strong></span>
						</a>
					</li>
										<li clstag="firsttype|keycount|jdworldwide|gjg4-12" class="item fore3">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/55768960Nf042eec7.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950235688"></em></strong></span>
						</a>
					</li>
									</ul>
			</div>
						<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [{"width":494,"height":241,"href":"http:\/\/zzhbest.jd.hk\/","alt":"","src":"http:\/\/img13.360buyimg.com\/jdcms\/s494x241_jfs\/t1375\/91\/337901744\/120072\/d3ec39c3\/55768913Ne010d90a.jpg","index":0},{"width":494,"height":241,"href":"http:\/\/mall.jd.hk\/view_search-408999-2627038-1-0-20-1.html","alt":"","src":"http:\/\/img11.360buyimg.com\/jdcms\/s494x241_jfs\/t976\/112\/929928471\/114123\/2710b2f\/55670846N61f71b4d.jpg","index":1},{"width":494,"height":241,"href":"http:\/\/sale.jd.hk\/mall\/xaCyX1ZWNe.html","alt":"","src":"http:\/\/img14.360buyimg.com\/jdcms\/s494x241_jfs\/t1453\/97\/291553301\/85839\/107fc944\/556fba51Na9d32bab.jpg","index":2}];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li clstag="firsttype|keycount|jdworldwide|gjg4-'+(i+3)+'" class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="241" alt="'+ currentItem.alt +'" />\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
		</div>
				<div class="ui-switchable-panel">
			<div class="side-img">
								<a clstag="firsttype|keycount|jdworldwide|gjg5-1"
				 target="_blank" class="fore1">
				      <img data-lazy-img="__PUBLIC__/images/55668281Nb88da5b7.jpg" width="247"></a>
								<a clstag="firsttype|keycount|jdworldwide|gjg5-2"
				 target="_blank" class="fore2">
				      <img data-lazy-img="__PUBLIC__/images/55668281Nb88da5b7.jpg" width="247"></a>
							</div>
			<div class="main-inner">
				<ul class="main-body">
										<li clstag="firsttype|keycount|jdworldwide|gjg5-6" class="item fore1">
						<a  target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557689e2Nb3ef65d2.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg5-7" class="item fore2">
						<a  target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557689e2Nb3ef65d2.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg5-8" class="item fore3">
						<a  target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557689e2Nb3ef65d2.jpg" class="">
						</a>
					</li>
									<li clstag="firsttype|keycount|jdworldwide|gjg5-9" class="item fore4">
						<a  target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557689e2Nb3ef65d2.jpg" class="">
						</a>
					</li>

				</ul>
				<ul class="main-extra">
					 					<li clstag="firsttype|keycount|jdworldwide|gjg5-10" class="item fore1">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/557a425bN6f2bb573.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950676786"></em></strong></span>
						</a>
					</li>
										<li clstag="firsttype|keycount|jdworldwide|gjg5-11" class="item fore2">
						<a target="_blank" href="#" class="p-img">
							<img data-lazy-img="done" width="247" height="241"
							src="__PUBLIC__/images/556edac7Nc8266929.jpg" class="">
							<span class="p-price"><strong class="price">&yen;<em class="J-p-1950219380"></em></strong></span>
						</a>
					</li>
									</ul>
			</div>
						<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [{"width":494,"height":241,"href":"http:\/\/sale.jd.hk\/mall\/nOJtx7V28u.html","alt":"","src":"http:\/\/img13.360buyimg.com\/jdcms\/s494x241_jfs\/t1078\/21\/1063933867\/79761\/abd75f5b\/556fbac9Nd5baf1a4.jpg","index":0},{"width":494,"height":241,"href":"http:\/\/mall.jd.hk\/index-134617.html","alt":"","src":"http:\/\/img10.360buyimg.com\/jdcms\/s494x241_jfs\/t1174\/299\/916319355\/73039\/940947ee\/5565c775N19a34e09.jpg","index":1},{"width":494,"height":241,"href":"http:\/\/mall.jd.hk\/index-126976.html","alt":"","src":"http:\/\/img10.360buyimg.com\/jdcms\/s494x241_jfs\/t1264\/40\/1159336161\/42867\/8d7cf41e\/557a443cN4dc6df8b.jpg","index":2}];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li clstag="firsttype|keycount|jdworldwide|gjg5-'+(i+3)+'" class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="241" alt="'+ currentItem.alt +'" />\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
		</div>
	</div>
	<div class="mb floor-ft">
		<ul clstag="firsttype|keycount|jdworldwide|gjglogo">
            			<li class="item fore1">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/556fbbbcNb4f56171.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore2">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/556fbbbcNb4f56171.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore3">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="http://img13.360buyimg.com/jdcms/s140x60_jfs/t1195/6/1008928548/6576/31030cb8/5565a23aN00f9ef38.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore4">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/556fbbbcNb4f56171.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore5">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/556fbbbcNb4f56171.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore6">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/556fbbbcNb4f56171.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore7">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/556fbbbcNb4f56171.jpg" width="140" height="60">
				</a>
			</li>

		</ul>
	</div>
</div>
<!--/ /widget/global-shops/global-shops.vm -->
<!--  /widget/recommended/recommended.vm -->
<div class="m m-floor m-floor-a" id="recommend">
	<div class="mt floor-hd">
		<h2><img data-lazy-img="__PUBLIC__/images/floor-title-02.jpg" width="245" height="27" alt="精选推荐"></h2>
		<div class="extra">
			<ul>
				<li class="ui-switchable-item item fore1" clstag='firsttype|keycount|jdworldwide|jptj1'>全球购自营</li>
				<li class="ui-switchable-item item fore2" clstag='firsttype|keycount|jdworldwide|jptj2'>eBay精选</li>
			</ul>
		</div>
	</div>
		<div class="mc floor-bd">
		<div class="ui-switchable-panel fore1" clstag='firsttype|keycount|jdworldwide|jptj1-1'>
			<ul>
			   				<li class="item fore1">
					<a href="#" target="_blank" title="#">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/5553782fNe9b07554.jpg" width="200" height="200" alt="【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯JNI-401-BGD">
						<span class="p-name">【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯JNI-401-BGD</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950779858'></em></strong></div>
				</li>
								<li class="item fore2">
					<a href="#" target="_blank" title="【全球购自营】水宝宝(Coppertone)无油无泪无香防晒霜/防晒乳 SPF50 237">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/55680994Nd2a62583.jpg" width="200" height="200" alt="【全球购自营】水宝宝(Coppertone)无油无泪无香防晒霜/防晒乳 SPF50 237">
						<span class="p-name">【全球购自营】水宝宝(Coppertone)无油无泪无香防晒霜/防晒乳 SPF50 237</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1951020755'></em></strong></div>
				</li>
								<li class="item fore3">
					<a href="#" target="_blank" title="【微乐全球购自营】港版美赞臣Enfagrow A+ 3段900g(1-3岁)">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/55680994Nd2a62583.jpg" width="200" height="200" alt="【微乐全球购自营】港版美赞臣Enfagrow A+ 3段900g(1-3岁)">
						<span class="p-name">【微乐全球购自营】港版美赞臣Enfagrow A+ 3段900g(1-3岁)</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950342885'></em></strong></div>
				</li>
								<li class="item fore4">
					<a href="#" target="_blank" title="【微乐全球购自营】日本原装进口 花王（Merries）纸尿裤 S82片 4-8kg">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/55680994Nd2a62583.jpg" width="200" height="200" alt="【微乐全球购自营】日本原装进口 花王（Merries）纸尿裤 S82片 4-8kg">
						<span class="p-name">【微乐全球购自营】日本原装进口 花王（Merries）纸尿裤 S82片 4-8kg</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950270265'></em></strong></div>
				</li>
								<li class="item fore5">
					<a href="#" target="_blank" title="【全球购自营】爱茉莉（Amore）吕洗发水红吕三件套2洗发水1护发素套">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/55680994Nd2a62583.jpg" width="200" height="200" alt="【全球购自营】爱茉莉（Amore）吕洗发水红吕三件套2洗发水1护发素套">
						<span class="p-name">【全球购自营】爱茉莉（Amore）吕洗发水红吕三件套2洗发水1护发素套</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950761871'></em></strong></div>
				</li>
							</ul>
		</div>
		<div class="ui-switchable-panel fore2" clstag='firsttype|keycount|jdworldwide|jptj2-1'>
			<ul>

				 				<li class="item fore1">
					<a href="#" target="_blank" title="戴尔Dell Alienware TactX键盘 (0G837)">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/55680994Nd2a62583.jpg" width="200" height="200" alt="戴尔Dell Alienware TactX键盘 (0G837)">
						<span class="p-name">戴尔Dell Alienware TactX键盘 (0G837)</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950683451'></em></strong></div>
				</li>
								<li class="item fore2">
					<a href="#" target="_blank" title="铁三角 ATH-A900X 音响发烧友 动态耳机-黑">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/55680994Nd2a62583.jpg" width="200" height="200" alt="铁三角 ATH-A900X 音响发烧友 动态耳机-黑">
						<span class="p-name">铁三角 ATH-A900X 音响发烧友 动态耳机-黑</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950994502'></em></strong></div>
				</li>
								<li class="item fore3">
					<a href="#" target="_blank" title="森海塞尔Sennheiser 馒头over-ear立体声耳机（开箱版）">
						<img class="p-img" data-lazy-img="http://img14.360buyimg.com/jdcms/s200x200_jfs/t706/218/1045803423/38459/339d9c9a/55144e46N5d0c2076.jpg" width="200" height="200" alt="森海塞尔Sennheiser 馒头over-ear立体声耳机（开箱版）">
						<span class="p-name">森海塞尔Sennheiser 馒头over-ear立体声耳机（开箱版）</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950289301'></em></strong></div>
				</li>
								<li class="item fore4">
					<a href="#" target="_blank" title="飞利浦Norelco 豪华 AquaTec 旋转剃刀-AT875">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/55680994Nd2a62583.jpg" width="200" height="200" alt="飞利浦Norelco 豪华 AquaTec 旋转剃刀-AT875">
						<span class="p-name">飞利浦Norelco 豪华 AquaTec 旋转剃刀-AT875</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950802973'></em></strong></div>
				</li>
								<li class="item fore5">
					<a href="#" target="_blank" title="莱泽曼letherman MUT EOD 多功能工具包 黑色护套">
						<img class="p-img" data-lazy-img="__PUBLIC__/images/55680994Nd2a62583.jpg" width="200" height="200" alt="莱泽曼letherman MUT EOD 多功能工具包 黑色护套">
						<span class="p-name">莱泽曼letherman MUT EOD 多功能工具包 黑色护套</span>
					</a>
					<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950303344'></em></strong></div>
				</li>


			</ul>
		</div>
	</div>
</div>
<!--/ /widget/recommended/recommended.vm -->
<!--  /widget/maternity-baby/maternity-baby.vm -->
<div class="m m-floor m-floor-c" id="floor4">
    	<div class="mt floor-hd">
		<h2><img data-lazy-img="__PUBLIC__/images/floor-title-04.jpg" width="262" height="27" alt="母婴用品"></h2>
	</div>
	<div class="mc floor-bd">
		<div class="goods">
			<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [

					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "爱他美",
					            src: "__PUBLIC__/images/557aa553N11331977.jpg",
					            index: "0"
					        }
					        ,
					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "哈斯夫",
					            src: "__PUBLIC__/images/55715b40N77457ca6.jpg",
					            index: "1"
					        }
					        ,
					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "综合澳洲",
					            src: "__PUBLIC__/images/557aa553N11331977.jpg",
					            index: "2"
					        }
					    ];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'" clstag="firsttype|keycount|jdworldwide|myyp1">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="241"/>\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
			<ul>

			   				<li class="item fore1"
				clstag='firsttype|keycount|jdworldwide|myyp3'>
					<a href="#" class="p-img" target="_blank" title="全球购荷兰牛栏Nutrilon婴幼奶粉婴儿配方奶粉1 2 3 4 5 6段 1罐装 4段(1-2岁)">
						<img data-lazy-img="__PUBLIC__/images/55790930N3f639fbe.jpg" width="247" height="241" alt="全球购荷兰牛栏Nutrilon婴幼奶粉婴儿配方奶粉1 2 3 4 5 6段 1罐装 4段(1-2岁)">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950252395'></em></strong></span>

					</a>
				</li>
								<li class="item fore2"
				clstag='firsttype|keycount|jdworldwide|myyp3'>
					<a href="#" class="p-img" target="_blank" title="【微乐全球购自营】荷兰本土Hero Baby 奶粉4段（1-2岁）700g">
						<img data-lazy-img="__PUBLIC__/images/55790930N3f639fbe.jpg" width="247" height="241" alt="【微乐全球购自营】荷兰本土Hero Baby 奶粉4段（1-2岁）700g">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1951027416'></em></strong></span>

					</a>
				</li>
								<li class="item fore3"
				clstag='firsttype|keycount|jdworldwide|myyp2'>
					<a href="#" class="p-img" target="_blank" title="美国正品 美国代购Baby Ddrops婴幼儿童宝宝维生素D3滴剂补钙VD D drops 两盒">
						<img data-lazy-img="__PUBLIC__/images/55790930N3f639fbe.jpg" width="247" height="241" alt="美国正品 美国代购Baby Ddrops婴幼儿童宝宝维生素D3滴剂补钙VD D drops 两盒">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950118202'></em></strong></span>

					</a>
				</li>
								<li class="item fore4"
				clstag='firsttype|keycount|jdworldwide|myyp2'>
					<a href="#" class="p-img" target="_blank" title="全球购美国【保税仓】挪威小鱼Nordic Naturals婴幼鳕鱼油 DHA 60ml*2">
						<img data-lazy-img="__PUBLIC__/images/55790930N3f639fbe.jpg" width="247" height="241" alt="全球购美国【保税仓】挪威小鱼Nordic Naturals婴幼鳕鱼油 DHA 60ml*2">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950342665'></em></strong></span>

					</a>
				</li>
								<li class="item fore5"
				clstag='firsttype|keycount|jdworldwide|myyp4'>
					<a href="#" class="p-img" target="_blank" title="全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤NB90片5kg以下">
						<img data-lazy-img="__PUBLIC__/images/55790930N3f639fbe.jpg" width="247" height="241" alt="全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤NB90片5kg以下">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950240517'></em></strong></span>

					</a>
				</li>
								<li class="item fore6"
				clstag='firsttype|keycount|jdworldwide|myyp4'>
					<a href="#" class="p-img" target="_blank" title="德国(BRAUN)博朗耳温枪 宝宝婴儿体温计 红外电子耳温计 儿童体温枪 IRT6020">
						<img data-lazy-img="__PUBLIC__/images/55790930N3f639fbe.jpg" width="247" height="241" alt="德国(BRAUN)博朗耳温枪 宝宝婴儿体温计 红外电子耳温计 儿童体温枪 IRT6020">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950253818'></em></strong></span>

					</a>
				</li>


			</ul>
		</div>
		<div class="recom">
			<h2>热门推荐</h2>
			<ul clstag='firsttype|keycount|jdworldwide|myyp5'>
			    			    <li class="item fore1 curr">
					<div class="p-name">
						<i>1</i>
						<a href="#" target="_blank" title="全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤S82片4-8kg">全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤S82片4-8kg</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤S82片4-8kg">
							<img data-lazy-img="__PUBLIC__/images/552892c5N9d21803f.jpg" width="140" height="140" alt="全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤S82片4-8kg">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950240515'></em></strong></span>
					</div>
				</li>
			    				<li class="item fore2">
					<div class="p-name">
						<i>2</i>
						<a href="#" target="_blank" title="全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤M64片6-11kg">全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤M64片6-11kg</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤M64片6-11kg">
							<img data-lazy-img="__PUBLIC__/images/552892c5N9d21803f.jpg" width="140" height="140" alt="全球购（Merries）正品原装花王纸尿裤 拉拉裤 尿不湿 尿片 日本本土进口 三倍透气 纸尿裤M64片6-11kg">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950240513'></em></strong></span>
					</div>
				</li>
								<li class="item fore3">
					<div class="p-name">
						<i>3</i>
						<a href="#" target="_blank" title="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 2段6-10个月800g">全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 2段6-10个月800g</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 2段6-10个月800g">
							<img data-lazy-img="__PUBLIC__/images/552892c5N9d21803f.jpg" width="140" height="140" alt="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 2段6-10个月800g">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950322871'></em></strong></span>
					</div>
				</li>
								<li class="item fore4">
					<div class="p-name">
						<i>4</i>
						<a href="#" target="_blank" title="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 3段10个月以上800g">全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 3段10个月以上800g</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 3段10个月以上800g">
							<img data-lazy-img="__PUBLIC__/images/552892c5N9d21803f.jpg" width="140" height="140" alt="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 3段10个月以上800g">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950322872'></em></strong></span>
					</div>
				</li>
								<li class="item fore5">
					<div class="p-name">
						<i>5</i>
						<a href="#" target="_blank" title="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 4段1岁以上700g">全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 4段1岁以上700g</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 4段1岁以上700g">
							<img data-lazy-img="__PUBLIC__/images/552892c5N9d21803f.jpg" width="140" height="140" alt="全球购 美素Hero Baby荷兰本土原装进口正品婴幼儿配方牛奶粉 4段1岁以上700g">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950322873'></em></strong></span>
					</div>
				</li>
							</ul>
		</div>
	</div>
	<div class="mb floor-ft">
		<ul clstag='firsttype|keycount|jdworldwide|myyp6'>
		  			<li class="item fore1">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/55307593N847b9810.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore2">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/55307593N847b9810.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore3">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/55307593N847b9810.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore4">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/55307593N847b9810.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore5">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/55307593N847b9810.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore6">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/55307593N847b9810.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore7">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/55307593N847b9810.jpg" width="140" height="60">
				</a>
			</li>


		</ul>
	</div>
</div>
<!--/ /widget/maternity-baby/maternity-baby.vm -->

<!--  /widget/cosmetic-care/cosmetic-care.vm -->
<div class="m m-floor m-floor-c" id="floor5">
 	<div class="mt floor-hd">
		<h2><img data-lazy-img="__PUBLIC__/images/floor-title-05.jpg" width="252" height="27" alt="美妆个护"></h2>
	</div>
	<div class="mc floor-bd">
		<div class="goods">
			<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [

					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "D&G",
					            src: "__PUBLIC__/images/5577a0eaN9570a027.jpg",
					            index: "0"
					        }
					        ,
					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "联合利华",
					            src: "__PUBLIC__/images/5578e1c3Nc7d124c7.jpg",
					            index: "1"
					        }
					        ,
					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "Rita",
					            src: "__PUBLIC__/images/5577a0eaN9570a027.jpg",
					            index: "2"
					        }
					    ];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'">\
					                <a target="_blank" clstag="firsttype|keycount|jdworldwide|mzgh1" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="241"/>\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
			<ul>
			    				<li class="item fore1" clstag='firsttype|keycount|jdworldwide|mzgh3'>
					<a href="#" class="p-img" target="_blank" title="CD/Dior迪奥香水女士 花漾甜心女士淡香水 花漾甜心30ml">
						<img data-lazy-img="__PUBLIC__/images/5576bbecN0766168e.jpg" width="247" height="241" alt="CD/Dior迪奥香水女士 花漾甜心女士淡香水 花漾甜心30ml">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950776966'></em></strong></span>
					</a>
				</li>
								<li class="item fore2" clstag='firsttype|keycount|jdworldwide|mzgh3'>
					<a href="#" class="p-img" target="_blank" title="韩国人气款SNP动物面膜贴 美白补水提亮肤色(10片）韩国直邮 老虎">
						<img data-lazy-img="__PUBLIC__/images/5576bbecN0766168e.jpg" width="247" height="241" alt="韩国人气款SNP动物面膜贴 美白补水提亮肤色(10片）韩国直邮 老虎">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950852415'></em></strong></span>
					</a>
				</li>
								<li class="item fore3" clstag='firsttype|keycount|jdworldwide|mzgh2'>
					<a href="#" class="p-img" target="_blank" title="意大利雅琪朵婴儿洗面奶 婴儿洗护 宝宝护肤清洁 红苹果红屁屁 湿疹尿布疹 进口宝宝用品包邮">
						<img data-lazy-img="__PUBLIC__/images/5576bbecN0766168e.jpg" width="247" height="241" alt="意大利雅琪朵婴儿洗面奶 婴儿洗护 宝宝护肤清洁 红苹果红屁屁 湿疹尿布疹 进口宝宝用品包邮">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950868916'></em></strong></span>
					</a>
				</li>
								<li class="item fore4" clstag='firsttype|keycount|jdworldwide|mzgh2'>
					<a href="#" class="p-img" target="_blank" title="Cloud 9九朵云 美白面霜50ml  韩国直邮">
						<img data-lazy-img="__PUBLIC__/images/5576bbecN0766168e.jpg" width="247" height="241" alt="Cloud 9九朵云 美白面霜50ml  韩国直邮">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950219388'></em></strong></span>
					</a>
				</li>
								<li class="item fore5" clstag='firsttype|keycount|jdworldwide|mzgh4'>
					<a href="#" class="p-img" target="_blank" title="日本 资生堂 安耐晒/安热沙 防晒霜spf50 防晒乳 金色 60ml">
						<img data-lazy-img="__PUBLIC__/images/5576bbecN0766168e.jpg" width="247" height="241" alt="日本 资生堂 安耐晒/安热沙 防晒霜spf50 防晒乳 金色 60ml">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1951113875'></em></strong></span>
					</a>
				</li>
								<li class="item fore6" clstag='firsttype|keycount|jdworldwide|mzgh4'>
					<a href="#" class="p-img" target="_blank" title="Rainbow LAFEAIR 彩虹 10片/盒 熊猫动物面膜 美白保湿">
						<img data-lazy-img="__PUBLIC__/images/5576bbecN0766168e.jpg" width="247" height="241" alt="Rainbow LAFEAIR 彩虹 10片/盒 熊猫动物面膜 美白保湿">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1951017115'></em></strong></span>
					</a>
				</li>

			</ul>
		</div>
		<div class="recom">
			<h2>热门推荐</h2>
			<ul clstag='firsttype|keycount|jdworldwide|mzgh5'>
								<li class="item fore1 curr">
					<div class="p-name">
						<i>1</i>
						<a href="#" target="_blank" title="阿瓦隆Avalon防脱洗发水维他命B族群 无硅油去屑控油 洗发水414ml">阿瓦隆Avalon防脱洗发水维他命B族群 无硅油去屑控油 洗发水414ml</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="阿瓦隆Avalon防脱洗发水维他命B族群 无硅油去屑控油 洗发水414ml">
							<img data-lazy-img="__PUBLIC__/images/555d58f8N82c5f9b5.jpg" width="140" height="140" alt="阿瓦隆Avalon防脱洗发水维他命B族群 无硅油去屑控油 洗发水414ml">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950533812'></em></strong></span>
					</div>
				</li>

								<li class="item fore2">
					<div class="p-name">
						<i>2</i>
						<a href="#" target="_blank" title="3CE 高光棒 SHIMMER STICK # 粉色">3CE 高光棒 SHIMMER STICK # 粉色</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="3CE 高光棒 SHIMMER STICK # 粉色">
							<img data-lazy-img="__PUBLIC__/images/555d58f8N82c5f9b5.jpg" width="140" height="140" alt="3CE 高光棒 SHIMMER STICK # 粉色">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950638065'></em></strong></span>
					</div>
				</li>
								<li class="item fore3">
					<div class="p-name">
						<i>3</i>
						<a href="#" target="_blank" title="VDL贝壳提亮液妆前乳30ml 韩国直邮">VDL贝壳提亮液妆前乳30ml 韩国直邮</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="VDL贝壳提亮液妆前乳30ml 韩国直邮">
							<img data-lazy-img="__PUBLIC__/images/555d58f8N82c5f9b5.jpg" width="140" height="140" alt="VDL贝壳提亮液妆前乳30ml 韩国直邮">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950651744'></em></strong></span>
					</div>
				</li>
								<li class="item fore4">
					<div class="p-name">
						<i>4</i>
						<a href="#" target="_blank" title="法国原装进口贝德玛卸妆水500ml 粉水">法国原装进口贝德玛卸妆水500ml 粉水</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="法国原装进口贝德玛卸妆水500ml 粉水">
							<img data-lazy-img="__PUBLIC__/images/555d58f8N82c5f9b5.jpg" width="140" height="140" alt="法国原装进口贝德玛卸妆水500ml 粉水">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1951016375'></em></strong></span>
					</div>
				</li>
								<li class="item fore5">
					<div class="p-name">
						<i>5</i>
						<a href="#" target="_blank" title="【全球购】Royal Nectar蜂毒面膜美白补水提拉紧致50ml（新西兰直邮）">【全球购】Royal Nectar蜂毒面膜美白补水提拉紧致50ml（新西兰直邮）</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="【全球购】Royal Nectar蜂毒面膜美白补水提拉紧致50ml（新西兰直邮）">
							<img data-lazy-img="__PUBLIC__/images/555d58f8N82c5f9b5.jpg" width="140" height="140" alt="【全球购】Royal Nectar蜂毒面膜美白补水提拉紧致50ml（新西兰直邮）">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950295177'></em></strong></span>
					</div>
				</li>



			</ul>
		</div>
	</div>
	<div class="mb floor-ft">
		<ul clstag='firsttype|keycount|jdworldwide|mzgh6'>
						<li class="item fore1">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/554ccb36N9635ff43.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore2">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/554ccb36N9635ff43.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore3">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/554ccb36N9635ff43.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore4">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/554ccb36N9635ff43.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore5">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/554ccb36N9635ff43.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore6">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/554ccb36N9635ff43.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore7">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/554ccb36N9635ff43.jpg" width="140" height="60">
				</a>
			</li>
					</ul>
	</div>
</div>
<!--/ /widget/cosmetic-care/cosmetic-care.vm -->

<!--  /widget/food-health/food-health.vm -->
<div class="m m-floor m-floor-c" id="floor6">
    	<div class="mt floor-hd">
		<h2><img data-lazy-img="__PUBLIC__/images/floor-title-06.jpg" width="239" height="27" alt="食品保健"></h2>
	</div>
	<div class="mc floor-bd">
		<div class="goods">
			<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [

					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "全球大牌保健品",
					            src: "__PUBLIC__/images/557a44b9Nbc06d8b3.jpg",
					            index: "0"
					        }
					        ,
					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "康是美",
					            src: "__PUBLIC__/images/557a44daN68cb3149.jpg",
					            index: "1"
					        }
					        ,
					        {
					            width: 495,
					            height: 241,
					            href: "#",
					            alt: "分会场",
					            src: "__PUBLIC__/images/557a44b9Nbc06d8b3.jpg",
					            index: "2"
					        }
					    ];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'" clstag="firsttype|keycount|jdworldwide|spbj1">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="241"/>\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
			<ul>

								<li class="item fore1" clstag='firsttype|keycount|jdworldwide|spbj3'>
					<a href="#" class="p-img" target="_blank" title="加拿大进口 丹蒂DAN.D.PAK 葡萄干果仁燕麦片454g">
						<img data-lazy-img="__PUBLIC__/images/557aabdeN3a0ba18f.jpg" width="247" height="241" alt="加拿大进口 丹蒂DAN.D.PAK 葡萄干果仁燕麦片454g">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950297967'></em></strong></span>
					</a>
				</li>
								<li class="item fore2" clstag='firsttype|keycount|jdworldwide|spbj3'>
					<a href="#" class="p-img" target="_blank" title="herbalife美国产康宝莱奶昔 减肥瘦身代餐奶昔粉 蛋白混合饮料 快速减重套餐正品 草莓味750g1桶">
						<img data-lazy-img="__PUBLIC__/images/557aabdeN3a0ba18f.jpg" width="247" height="241" alt="herbalife美国产康宝莱奶昔 减肥瘦身代餐奶昔粉 蛋白混合饮料 快速减重套餐正品 草莓味750g1桶">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950235646'></em></strong></span>
					</a>
				</li>
								<li class="item fore3" clstag='firsttype|keycount|jdworldwide|spbj2'>
					<a href="#" class="p-img" target="_blank" title="【全球购】BARBARAS 美国进口食品 蔓越莓干燕麦片 营养水果谷物早餐麦片 369g">
						<img data-lazy-img="__PUBLIC__/images/557aabdeN3a0ba18f.jpg" width="247" height="241" alt="【全球购】BARBARAS 美国进口食品 蔓越莓干燕麦片 营养水果谷物早餐麦片 369g">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950511992'></em></strong></span>
					</a>
				</li>
								<li class="item fore4" clstag='firsttype|keycount|jdworldwide|spbj2'>
					<a href="#" class="p-img" target="_blank" title="【全球购】澳洲直邮Devondale德运成人全脂奶粉2袋装 澳洲总理推荐  618爆款">
						<img data-lazy-img="__PUBLIC__/images/557aabdeN3a0ba18f.jpg" width="247" height="241" alt="【全球购】澳洲直邮Devondale德运成人全脂奶粉2袋装 澳洲总理推荐  618爆款">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950326625'></em></strong></span>
					</a>
				</li>
								<li class="item fore5" clstag='firsttype|keycount|jdworldwide|spbj4'>
					<a href="#" class="p-img" target="_blank" title="全球购碧然德Brita德国原装进口净水机器滤芯过滤器水壶设备3.5L蓝色一壶一芯">
						<img data-lazy-img="__PUBLIC__/images/557aabdeN3a0ba18f.jpg" width="247" height="241" alt="全球购碧然德Brita德国原装进口净水机器滤芯过滤器水壶设备3.5L蓝色一壶一芯">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950305968'></em></strong></span>
					</a>
				</li>
								<li class="item fore6" clstag='firsttype|keycount|jdworldwide|spbj4'>
					<a href="#" class="p-img" target="_blank" title="【全球购】海外直邮进口星巴克Starbucks派克市场中度烘焙咖啡粉 340g">
						<img data-lazy-img="__PUBLIC__/images/557aabdeN3a0ba18f.jpg" width="247" height="241" alt="【全球购】海外直邮进口星巴克Starbucks派克市场中度烘焙咖啡粉 340g">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950690932'></em></strong></span>
					</a>
				</li>
							</ul>
		</div>
		<div class="recom">
			<h2>热门推荐</h2>
			<ul clstag='firsttype|keycount|jdworldwide|spbj5'>
			    				<li class="item fore1 curr">
					<div class="p-name">
						<i>1</i>
						<a href="#" target="_blank" title="【微乐全球购自营】澳洲原装进口 Swisse 叶绿素清体排毒口服液 薄荷味">【微乐全球购自营】澳洲原装进口 Swisse 叶绿素清体排毒口服液 薄荷味</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="【微乐全球购自营】澳洲原装进口 Swisse 叶绿素清体排毒口服液 薄荷味">
							<img data-lazy-img="__PUBLIC__/images/551d0e5bN102a7500.jpg" width="140" height="140" alt="【微乐全球购自营】澳洲原装进口 Swisse 叶绿素清体排毒口服液 薄荷味">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950334335'></em></strong></span>
					</div>
				</li>
								<li class="item fore2">
					<div class="p-name">
						<i>2</i>
						<a href="#" target="_blank" title="印度尼西亚进口 蒙蒂塔罗Monetta 杂锦卷心酥825g">印度尼西亚进口 蒙蒂塔罗Monetta 杂锦卷心酥825g</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="印度尼西亚进口 蒙蒂塔罗Monetta 杂锦卷心酥825g">
							<img data-lazy-img="__PUBLIC__/images/551d0e5bN102a7500.jpg" width="140" height="140" alt="印度尼西亚进口 蒙蒂塔罗Monetta 杂锦卷心酥825g">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950499308'></em></strong></span>
					</div>
				</li>
								<li class="item fore3">
					<div class="p-name">
						<i>3</i>
						<a href="#" target="_blank" title="美国进口 优鲜沛ocean spray 原味蔓越莓干1360g">美国进口 优鲜沛ocean spray 原味蔓越莓干1360g</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="美国进口 优鲜沛ocean spray 原味蔓越莓干1360g">
							<img data-lazy-img="__PUBLIC__/images/551d0e5bN102a7500.jpg" width="140" height="140" alt="美国进口 优鲜沛ocean spray 原味蔓越莓干1360g">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950235546'></em></strong></span>
					</div>
				</li>
								<li class="item fore4">
					<div class="p-name">
						<i>4</i>
						<a href="#" target="_blank" title="【微乐全球购自营】澳洲直采 Kids Smart 佳思敏 儿童综合维生素软糖 60粒">【微乐全球购自营】澳洲直采 Kids Smart 佳思敏 儿童综合维生素软糖 60粒</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="【微乐全球购自营】澳洲直采 Kids Smart 佳思敏 儿童综合维生素软糖 60粒">
							<img data-lazy-img="__PUBLIC__/images/551d0e5bN102a7500.jpg" width="140" height="140" alt="【微乐全球购自营】澳洲直采 Kids Smart 佳思敏 儿童综合维生素软糖 60粒">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950776943'></em></strong></span>
					</div>
				</li>
								<li class="item fore5">
					<div class="p-name">
						<i>5</i>
						<a href="#" target="_blank" title="【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯JNI-401-BGD">【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯JNI-401-BGD</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯JNI-401-BGD">
							<img data-lazy-img="__PUBLIC__/images/551d0e5bN102a7500.jpg" width="140" height="140" alt="【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯JNI-401-BGD">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950779858'></em></strong></span>
					</div>
				</li>


			</ul>

		</div>
	</div>
	<div class="mb floor-ft">
		<ul clstag='firsttype|keycount|jdworldwide|spbj6'>

						<li class="item fore1">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552cc5c9Ncce5ad17.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore2">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552cc5c9Ncce5ad17.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore3">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552cc5c9Ncce5ad17.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore4">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552cc5c9Ncce5ad17.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore5">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552cc5c9Ncce5ad17.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore6">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552cc5c9Ncce5ad17.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore7">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552cc5c9Ncce5ad17.jpg" width="140" height="60">
				</a>
			</li>

		</ul>
	</div>
</div>
<!--/ /widget/food-health/food-health.vm -->

<!--  /widget/cloth-shoes/cloth-shoes.vm -->
<div class="m m-floor m-floor-d" id="floor7">
    	<div class="mt floor-hd">
		<h2><img data-lazy-img="__PUBLIC__/images/floor-title-07.jpg" width="236" height="27" alt="服饰鞋靴"></h2>
	</div>
	<div class="mc floor-bd">
		<div class="goods">
			<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [

					        {
					            width: 495,
					            height: 351,
					            href: "#",
					            alt: "Sneakerhead",
					            src: "__PUBLIC__/images/5576a87bNb8476879.jpg",
					            index: "0"
					        }
					        ,
					        {
					            width: 495,
					            height: 351,
					            href: "#",
					            alt: "NYBK",
					            src: "__PUBLIC__/images/5576a88bN1f7d7ad4.jpg",
					            index: "1"
					        }
					        ,
					        {
					            width: 495,
					            height: 351,
					            href: "#",
					            alt: "女装",
					            src: "__PUBLIC__/images/5576a87bNb8476879.jpg",
					            index: "2"
					        }
					    ];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'" clstag="firsttype|keycount|jdworldwide|fsxx1">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="351"/>\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
			<ul>
				<li class="item fore1" clstag="firsttype|keycount|jdworldwide|fsxx7">
				    					<a href="#" class="p-img" target="_blank" title="AFAbercrombie fitch 简单大方 纯色 纯棉舒适女士T恤 深蓝色609392294 S">
						<img data-lazy-img="__PUBLIC__/images/5576a850Nc9c29164.jpg" width="252" height="351" alt="AFAbercrombie fitch 简单大方 纯色 纯棉舒适女士T恤 深蓝色609392294 S">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950931699'></em></strong></span>
					</a>
				</li>
								<li class="item fore2" clstag='firsttype|keycount|jdworldwide|fsxx4'>
					<a href="#" class="p-img" target="_blank" title="Calvin Klein 春季新款 男士时尚大LOGO圆领短袖T恤衫 056 灰色 XL">
						<img data-lazy-img="__PUBLIC__/images/5576a850Nc9c29164.jpg" width="247" height="241" alt="Calvin Klein 春季新款 男士时尚大LOGO圆领短袖T恤衫 056 灰色 XL">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950868622'></em></strong></span>
					</a>
				</li>
								<li class="item fore3" clstag='firsttype|keycount|jdworldwide|fsxx5'>
					<a href="#" class="p-img" target="_blank" title="New Balance 574 NB男子经典跑鞋 运动休闲鞋 多色入 ml574 ml574snv 44">
						<img data-lazy-img="__PUBLIC__/images/5576a850Nc9c29164.jpg" width="247" height="241" alt="New Balance 574 NB男子经典跑鞋 运动休闲鞋 多色入 ml574 ml574snv 44">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950167501'></em></strong></span>
					</a>
				</li>
								<li class="item fore4" clstag='firsttype|keycount|jdworldwide|fsxx6'>
					<a href="#" class="p-img" target="_blank" title="全球购 天木兰/Timberland  男鞋商务休闲抗疲劳真皮皮鞋 5521A/5522A 5523A黑色 美码10.5">
						<img data-lazy-img="__PUBLIC__/images/5576a850Nc9c29164.jpg" width="247" height="241" alt="全球购 天木兰/Timberland  男鞋商务休闲抗疲劳真皮皮鞋 5521A/5522A 5523A黑色 美码10.5">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1951016317'></em></strong></span>
					</a>
				</li>
								<li class="item fore5" clstag='firsttype|keycount|jdworldwide|fsxx2'>
					<a href="#" class="p-img" target="_blank" title="全球购 蔻驰（COACH）女士优雅细跟黑色高跟鞋Q6605 米色 42">
						<img data-lazy-img="__PUBLIC__/images/5576a850Nc9c29164.jpg" width="247" height="241" alt="全球购 蔻驰（COACH）女士优雅细跟黑色高跟鞋Q6605 米色 42">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950693837'></em></strong></span>
					</a>
				</li>

				<li class="item fore6" clstag="firsttype|keycount|jdworldwide|fsxx3">
										<a href="#" class="p-img" target="_blank" title="全球购 burberry巴宝莉 15新款男士纯棉立体logo刺绣 格纹开襟短袖POLO衫 黑色 3459132 XXL">
						<img data-lazy-img="__PUBLIC__/images/5576a850Nc9c29164.jpg" width="252" height="351" alt="全球购 burberry巴宝莉 15新款男士纯棉立体logo刺绣 格纹开襟短袖POLO衫 黑色 3459132 XXL">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1951054932'></em></strong></span>
					</a>
				</li>


			</ul>
		</div>
		<div class="recom">
			<h2>热门推荐</h2>
			<ul clstag="firsttype|keycount|jdworldwide|fsxx8">
			   				<li class="item fore1 curr">
					<div class="p-name">
						<i>1</i>
						<a href="#" target="_blank" title="Fred Perry/弗莱德·派瑞 男装 男式短袖POLO衫 Q00028696 BLACK/GRAY LARGE">Fred Perry/弗莱德·派瑞 男装 男式短袖POLO衫 Q00028696 BLACK/GRAY LARGE</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="Fred Perry/弗莱德·派瑞 男装 男式短袖POLO衫 Q00028696 BLACK/GRAY LARGE">
							<img data-lazy-img="__PUBLIC__/images/5538ffd7Ncbc13fc4.jpg" width="140" height="140" alt="Fred Perry/弗莱德·派瑞 男装 男式短袖POLO衫 Q00028696 BLACK/GRAY LARGE">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950447021'></em></strong></span>
					</div>
				</li>

                				<li class="item fore2">
					<div class="p-name">
						<i>2</i>
						<a href="#" target="_blank" title="Calvin Klein 春季新款 男士时尚大LOGO圆领短袖T恤衫 010黑色 XL">Calvin Klein 春季新款 男士时尚大LOGO圆领短袖T恤衫 010黑色 XL</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="Calvin Klein 春季新款 男士时尚大LOGO圆领短袖T恤衫 010黑色 XL">
							<img data-lazy-img="__PUBLIC__/images/555aff0dN729d0d2c.jpg" width="140" height="140" alt="Calvin Klein 春季新款 男士时尚大LOGO圆领短袖T恤衫 010黑色 XL">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950868616'></em></strong></span>
					</div>
				</li>
								<li class="item fore3">
					<div class="p-name">
						<i>3</i>
						<a href="#" target="_blank" title="全球购 Tommy Hilfiger男装汤米希尔费格t恤圆领tee短袖美国采购 灰色 M">全球购 Tommy Hilfiger男装汤米希尔费格t恤圆领tee短袖美国采购 灰色 M</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 Tommy Hilfiger男装汤米希尔费格t恤圆领tee短袖美国采购 灰色 M">
							<img data-lazy-img="__PUBLIC__/images/555aff0dN729d0d2c.jpg" width="140" height="140" alt="全球购 Tommy Hilfiger男装汤米希尔费格t恤圆领tee短袖美国采购 灰色 M">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950509766'></em></strong></span>
					</div>
				</li>
								<li class="item fore4">
					<div class="p-name">
						<i>4</i>
						<a href="#" target="_blank" title="美国采购Tommy Hilfiger亚麻直筒裤汤米希尔费格休闲裤新款工装裤 米白色 36">美国采购Tommy Hilfiger亚麻直筒裤汤米希尔费格休闲裤新款工装裤 米白色 36</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="美国采购Tommy Hilfiger亚麻直筒裤汤米希尔费格休闲裤新款工装裤 米白色 36">
							<img data-lazy-img="__PUBLIC__/images/555aff0dN729d0d2c.jpg" width="140" height="140" alt="美国采购Tommy Hilfiger亚麻直筒裤汤米希尔费格休闲裤新款工装裤 米白色 36">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950450651'></em></strong></span>
					</div>
				</li>
								<li class="item fore5">
					<div class="p-name">
						<i>5</i>
						<a href="#" target="_blank" title="Air Jordan 1 Retro High AJ男女GS 高帮复古板鞋 保罗限量 705300-615 36">Air Jordan 1 Retro High AJ男女GS 高帮复古板鞋 保罗限量 705300-615 36</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="Air Jordan 1 Retro High AJ男女GS 高帮复古板鞋 保罗限量 705300-615 36">
							<img data-lazy-img="__PUBLIC__/images/555aff0dN729d0d2c.jpg" width="140" height="140" alt="Air Jordan 1 Retro High AJ男女GS 高帮复古板鞋 保罗限量 705300-615 36">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950312242'></em></strong></span>
					</div>
				</li>
								<li class="item fore6">
					<div class="p-name">
						<i>6</i>
						<a href="#" target="_blank" title="Air Jordan 1 High Strap AJ1男子高帮复古板鞋 魔术贴设计 342132-002 44">Air Jordan 1 High Strap AJ1男子高帮复古板鞋 魔术贴设计 342132-002 44</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="Air Jordan 1 High Strap AJ1男子高帮复古板鞋 魔术贴设计 342132-002 44">
							<img data-lazy-img="__PUBLIC__/images/555aff0dN729d0d2c.jpg" width="140" height="140" alt="Air Jordan 1 High Strap AJ1男子高帮复古板鞋 魔术贴设计 342132-002 44">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950255539'></em></strong></span>
					</div>
				</li>
								<li class="item fore7">
					<div class="p-name">
						<i>7</i>
						<a href="#" target="_blank" title="Asics Onitsuka Tiger Mexico 66 鬼冢虎经典男鞋 时尚休闲板鞋 d4j2l4410 44">Asics Onitsuka Tiger Mexico 66 鬼冢虎经典男鞋 时尚休闲板鞋 d4j2l4410 44</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="Asics Onitsuka Tiger Mexico 66 鬼冢虎经典男鞋 时尚休闲板鞋 d4j2l4410 44">
							<img data-lazy-img="__PUBLIC__/images/555aff0dN729d0d2c.jpg" width="140" height="140" alt="Asics Onitsuka Tiger Mexico 66 鬼冢虎经典男鞋 时尚休闲板鞋 d4j2l4410 44">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950314223'></em></strong></span>
					</div>
				</li>
								<li class="item fore8">
					<div class="p-name">
						<i>8</i>
						<a href="#" target="_blank" title="Nike Roshe Run Print耐克男女GS低帮跑鞋 印花运动休闲鞋 677784 677784-606 40">Nike Roshe Run Print耐克男女GS低帮跑鞋 印花运动休闲鞋 677784 677784-606 40</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="Nike Roshe Run Print耐克男女GS低帮跑鞋 印花运动休闲鞋 677784 677784-606 40">
							<img data-lazy-img="__PUBLIC__/images/555aff0dN729d0d2c.jpg" width="140" height="140" alt="Nike Roshe Run Print耐克男女GS低帮跑鞋 印花运动休闲鞋 677784 677784-606 40">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950852580'></em></strong></span>
					</div>
				</li>
							</ul>
		</div>
	</div>
	<div class="mb floor-ft">
		<ul clstag="firsttype|keycount|jdworldwide|fsxx9">

						<li class="item fore1">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/5548ce86N745b046a.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore2">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/5548ce86N745b046a.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore3">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/5548ce86N745b046a.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore4">

				<a href="#l" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/5548ce86N745b046a.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore5">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/5548ce86N745b046a.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore6">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/5548ce86N745b046a.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore7">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/5548ce86N745b046a.jpg" width="140" height="60">
				</a>
			</li>
					</ul>
	</div>
</div>
<!--/ /widget/cloth-shoes/cloth-shoes.vm -->

<!--  /widget/gift-luggage/gift-luggage.vm -->
<div class="m m-floor m-floor-d" id="floor8">
    	<div class="mt floor-hd">
		<h2><img data-lazy-img="__PUBLIC__/images/floor-title-08.jpg" width="242" height="27" alt="礼品箱包"></h2>
	</div>
	<div class="mc floor-bd">
		<div class="goods">
			<div class="sm m-floor-slider">
				<script>
					(function(cfg, doc) {
					    var data = [

					        {
					            width: 495,
					            height: 351,
					            href: "#",
					            alt: "Rimova",
					            src: "__PUBLIC__/images/5576a8afN2d113ba9.jpg",
					            index: "0"
					        }
					        ,
					        {
					            width: 495,
					            height: 351,
					            href: "#",
					            alt: "浪琴",
					            src: "__PUBLIC__/images/5576a8c0N56c903d3.jpg",
					            index: "1"
					        }
					        ,
					        {
					            width: 495,
					            height: 351,
					            href: "#",
					            alt: "LV",
					            src: "__PUBLIC__/images/5576a8afN2d113ba9.jpg",
					            index: "2"
					        }
					    ];

					    var currentItem;
					    var result = [];
					    var panelHTML = [];
					    var triggerHTML = [];

					    result.push('<div class="smc floor-slider">');

					    panelHTML.push('<ul class="floor-slider-container">');
					    triggerHTML.push('<ul class="floor-slider-controls">');


					    for( var i = 0; i < data.length; i++ ) {
					        currentItem = data[i];
					        var htmlPanel = '\
					            <li class="ui-switchable-subpanel '+ (currentItem.index=='0'?'ui-switchable-panel-selected':'') +'" clstag="firsttype|keycount|jdworldwide|lpxb1">\
					                <a target="_blank" href="'+ currentItem.href +'">\
					                    <img class="err-product" '+ (currentItem.index=='0'?'src':'data-lazy-img') +'="'+ currentItem.src +'" width="'+ currentItem.width +'" height="351"/>\
					                </a>\
					            </li>';
					        var htmlTrigger='<li class="ui-switchable-subitem '+ (currentItem.index=='0'?'ui-switchable-selected':'') +'">&nbsp;</li>';


					        panelHTML.push(htmlPanel);
					        triggerHTML.push(htmlTrigger);
					    }

					    triggerHTML.push('</ul>');
					    panelHTML.push('</ul>');

					    result.push( panelHTML.join('')+triggerHTML.join('') );

					    result.push('</div>');

					    doc.write(result.join(''));

					})(pageConfig, document);
				</script>
				<div class="slider-page">
			        <a href="javascript:void(0)" class="ui-switchable-prev slider-prev">&lt;</a>
			        <a href="javascript:void(0)" class="ui-switchable-next slider-next">&gt;</a>
			    </div>
			</div>
			<ul>
				<li class="item fore1" clstag="firsttype|keycount|jdworldwide|lpxb7">
				    					<a href="#" class="p-img" target="_blank" title="全球购 天梭（TISSOT）手表 力洛克系列机械情侣表男表 T41.1.483.33">
						<img data-lazy-img="__PUBLIC__/images/5576a957Ne6582a15.jpg" width="252" height="351" alt="全球购 天梭（TISSOT）手表 力洛克系列机械情侣表男表 T41.1.483.33">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950305221'></em></strong></span>
					</a>
				</li>


								<li class="item fore2" clstag='firsttype|keycount|jdworldwide|lpxb4'>
					<a href="#" class="p-img" target="_blank" title="法国采购饺子包大号长柄帆布加厚龙骧包珑包骧Longchamp正品女包 红色">
						<img data-lazy-img="__PUBLIC__/images/5576a908N893cdab4.jpg" width="247" height="241" alt="法国采购饺子包大号长柄帆布加厚龙骧包珑包骧Longchamp正品女包 红色">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950542855'></em></strong></span>
					</a>
				</li>
								<li class="item fore3" clstag='firsttype|keycount|jdworldwide|lpxb5'>
					<a href="#" class="p-img" target="_blank" title="全球购 雷朋RayBan 飞行员系列茶色渐变男女款太阳镜墨镜 RB3025-004/51-62mm">
						<img data-lazy-img="__PUBLIC__/images/5576a908N893cdab4.jpg" width="247" height="241" alt="全球购 雷朋RayBan 飞行员系列茶色渐变男女款太阳镜墨镜 RB3025-004/51-62mm">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950324538'></em></strong></span>
					</a>
				</li>
								<li class="item fore4" clstag='firsttype|keycount|jdworldwide|lpxb6'>
					<a href="#" class="p-img" target="_blank" title="全球购 BURBERRY/博柏利 浮雕格纹时尚女士短款两折钱包夹钱夹 橙色 3945559">
						<img data-lazy-img="__PUBLIC__/images/5576a908N893cdab4.jpg" width="247" height="241" alt="全球购 BURBERRY/博柏利 浮雕格纹时尚女士短款两折钱包夹钱夹 橙色 3945559">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950292380'></em></strong></span>
					</a>
				</li>
								<li class="item fore5" clstag='firsttype|keycount|jdworldwide|lpxb2'>
					<a href="#" class="p-img" target="_blank" title="全球购 浪琴Longines瑞士手表瑰丽系列 自动机械钢带男表 L4.821.4.11.6">
						<img data-lazy-img="__PUBLIC__/images/5576a908N893cdab4.jpg" width="247" height="241" alt="全球购 浪琴Longines瑞士手表瑰丽系列 自动机械钢带男表 L4.821.4.11.6">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950477621'></em></strong></span>
					</a>
				</li>

				<li class="item fore6" clstag="firsttype|keycount|jdworldwide|lpxb3">
				    					<a href="#" class="p-img" target="_blank" title="全球购 BURBERRY/博柏利 女士经典小牛皮橙色提跨两用包 红色3925909">
						<img data-lazy-img="__PUBLIC__/images/5576a908N893cdab4.jpg" width="252" height="351" alt="全球购 BURBERRY/博柏利 女士经典小牛皮橙色提跨两用包 红色3925909">
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950922775'></em></strong></span>
					</a>
				</li>
			</ul>
		</div>
		<div class="recom">
			<h2>热门推荐</h2>
			<ul clstag="firsttype|keycount|jdworldwide|lpxb8">
			   				<li class="item fore1 curr">
					<div class="p-name">
						<i>1</i>
						<a href="#" target="_blank" title="全球购 天梭(TISSOT)手表 经典系列机械男表 T065.430.11.031.00">全球购 天梭(TISSOT)手表 经典系列机械男表 T065.430.11.031.00</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 天梭(TISSOT)手表 经典系列机械男表 T065.430.11.031.00">
							<img data-lazy-img="__PUBLIC__/images/552b5d6eN0ce8675b.jpg" width="140" height="140" alt="全球购 天梭(TISSOT)手表 经典系列机械男表 T065.430.11.031.00">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950305314'></em></strong></span>
					</div>
				</li>
				 				<li class="item fore2">
					<div class="p-name">
						<i>2</i>
						<a href="#" target="_blank" title="MCM 女包 韩国大牌 时尚新款经典LOGO女士粉色长款拉链钱包手拿包">MCM 女包 韩国大牌 时尚新款经典LOGO女士粉色长款拉链钱包手拿包</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="MCM 女包 韩国大牌 时尚新款经典LOGO女士粉色长款拉链钱包手拿包">
							<img data-lazy-img="__PUBLIC__/images/552b5d6eN0ce8675b.jpg" width="140" height="140" alt="MCM 女包 韩国大牌 时尚新款经典LOGO女士粉色长款拉链钱包手拿包">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950744548'></em></strong></span>
					</div>
				</li>
								<li class="item fore3">
					<div class="p-name">
						<i>3</i>
						<a href="#" target="_blank" title="【全球购】Coach 蔻驰 Crosby系列mini款牛皮手提包 深蓝色">【全球购】Coach 蔻驰 Crosby系列mini款牛皮手提包 深蓝色</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="【全球购】Coach 蔻驰 Crosby系列mini款牛皮手提包 深蓝色">
							<img data-lazy-img="__PUBLIC__/images/552b5d6eN0ce8675b.jpg" width="140" height="140" alt="【全球购】Coach 蔻驰 Crosby系列mini款牛皮手提包 深蓝色">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950776654'></em></strong></span>
					</div>
				</li>
								<li class="item fore4">
					<div class="p-name">
						<i>4</i>
						<a href="#" target="_blank" title="全球购 雷朋RayBan 飞行员系列灰色渐变男女款太阳墨镜RB3025 003/32-58">全球购 雷朋RayBan 飞行员系列灰色渐变男女款太阳墨镜RB3025 003/32-58</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 雷朋RayBan 飞行员系列灰色渐变男女款太阳墨镜RB3025 003/32-58">
							<img data-lazy-img="__PUBLIC__/images/552b5d6eN0ce8675b.jpg" width="140" height="140" alt="全球购 雷朋RayBan 飞行员系列灰色渐变男女款太阳墨镜RB3025 003/32-58">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950325207'></em></strong></span>
					</div>
				</li>
								<li class="item fore5">
					<div class="p-name">
						<i>5</i>
						<a href="#" target="_blank" title="全球购 卡西欧(CASIO)MTP系列简约指针皮带男表 MTP-1094E-7B">全球购 卡西欧(CASIO)MTP系列简约指针皮带男表 MTP-1094E-7B</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 卡西欧(CASIO)MTP系列简约指针皮带男表 MTP-1094E-7B">
							<img data-lazy-img="__PUBLIC__/images/552b5d6eN0ce8675b.jpg" width="140" height="140" alt="全球购 卡西欧(CASIO)MTP系列简约指针皮带男表 MTP-1094E-7B">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950668876'></em></strong></span>
					</div>
				</li>
								<li class="item fore6">
					<div class="p-name">
						<i>6</i>
						<a href="#" target="_blank" title="全球购 施华洛世奇Swarovski 水晶银色经典天鹅链坠吊坠 5007735">全球购 施华洛世奇Swarovski 水晶银色经典天鹅链坠吊坠 5007735</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 施华洛世奇Swarovski 水晶银色经典天鹅链坠吊坠 5007735">
							<img data-lazy-img="__PUBLIC__/images/552b5d6eN0ce8675b.jpg" width="140" height="140" alt="全球购 施华洛世奇Swarovski 水晶银色经典天鹅链坠吊坠 5007735">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950353130'></em></strong></span>
					</div>
				</li>
								<li class="item fore7">
					<div class="p-name">
						<i>7</i>
						<a href="#" target="_blank" title="全球购 浪琴Longines瑞士手表 名匠系列男式自动机械腕表L2.628.4.78.3">全球购 浪琴Longines瑞士手表 名匠系列男式自动机械腕表L2.628.4.78.3</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 浪琴Longines瑞士手表 名匠系列男式自动机械腕表L2.628.4.78.3">
							<img data-lazy-img="__PUBLIC__/images/552b5d6eN0ce8675b.jpg" width="140" height="140" alt="全球购 浪琴Longines瑞士手表 名匠系列男式自动机械腕表L2.628.4.78.3">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1950477647'></em></strong></span>
					</div>
				</li>
								<li class="item fore8">
					<div class="p-name">
						<i>8</i>
						<a href="#" target="_blank" title="全球购 蔻驰（COACH）浮雕经典LOGO单肩斜挎包 休闲真皮男包/箱包 71172 71168_黑色">全球购 蔻驰（COACH）浮雕经典LOGO单肩斜挎包 休闲真皮男包/箱包 71172 71168_黑色</a>
					</div>
					<div class="p-img">
						<i></i>
						<a href="#" target="_blank" title="全球购 蔻驰（COACH）浮雕经典LOGO单肩斜挎包 休闲真皮男包/箱包 71172 71168_黑色">
							<img data-lazy-img="__PUBLIC__/images/552b5d6eN0ce8675b.jpg" width="140" height="140" alt="全球购 蔻驰（COACH）浮雕经典LOGO单肩斜挎包 休闲真皮男包/箱包 71172 71168_黑色">
						</a>
						<span class="p-price"><strong class='price'>&yen;<em class='J-p-1951060956'></em></strong></span>
					</div>
				</li>


			</ul>
		</div>
	</div>
	<div class="mb floor-ft">
		<ul clstag="firsttype|keycount|jdworldwide|lpxb9">
						<li class="item fore1">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552ca22bN7ddfbcb3.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore2">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552ca22bN7ddfbcb3.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore3">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552ca22bN7ddfbcb3.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore4">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552ca22bN7ddfbcb3.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore5">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552ca22bN7ddfbcb3.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore6">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552ca22bN7ddfbcb3.jpg" width="140" height="60">
				</a>
			</li>
						<li class="item fore7">
				<a href="#" target="_blank">
					<i></i>
					<img data-lazy-img="__PUBLIC__/images/552ca22bN7ddfbcb3.jpg" width="140" height="60">
				</a>
			</li>
					</ul>
	</div>
</div>
<!--/ /widget/gift-luggage/gift-luggage.vm -->

<!--  /widget/direct-overseas/direct-overseas.vm -->
<div class="m m-floor m-floor-a" id="floor9" clstag="firsttype|keycount|jdworldwide|yyzy1">
    	<div class="mt floor-hd">
		<h2><img data-lazy-img="__PUBLIC__/images/floor-title-09.jpg" width="255" height="27" alt="悦洋直邮"></h2>
	</div>
	<div class="mc floor-bd">
		<ul>
		  			<li class="item fore1">
				<a href="#" target="_blank" title="CK卡文克莱 one香水卡文克莱卡莱优中性男士女士淡香水EDT 新款100ml">
					<img class="p-img" data-lazy-img="__PUBLIC__/images/556c0716Nae938e5c.jpg" width="200" height="287" alt="CK卡文克莱 one香水卡文克莱卡莱优中性男士女士淡香水EDT 新款100ml">
					<span class="p-name">CK卡文克莱 one香水卡文克莱卡莱优中性男士女士淡香水EDT 新款100ml</span>
				</a>
				<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950438169'></em></strong></div>
			</li>
		 			<li class="item fore2">
				<a href="#" target="_blank" title="美国直邮 Burts Bees小蜜蜂 宝宝护肤 天然滋润小麦杏树婴儿油按摩油118ml">
					<img class="p-img" data-lazy-img="__PUBLIC__/images/556c0716Nae938e5c.jpg" width="200" height="287" alt="美国直邮 Burts Bees小蜜蜂 宝宝护肤 天然滋润小麦杏树婴儿油按摩油118ml">
					<span class="p-name">美国直邮 Burts Bees小蜜蜂 宝宝护肤 天然滋润小麦杏树婴儿油按摩油118ml</span>
				</a>
				<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950225844'></em></strong></div>
			</li>
		 			<li class="item fore3">
				<a href="#" target="_blank" title="【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯500ml JNL-500 DPL">
					<img class="p-img" data-lazy-img="__PUBLIC__/images/556c0716Nae938e5c.jpg" width="200" height="287" alt="【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯500ml JNL-500 DPL">
					<span class="p-name">【微乐全球购自营】THERMOS膳魔师真空不锈钢保温杯500ml JNL-500 DPL</span>
				</a>
				<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950779863'></em></strong></div>
			</li>
		 			<li class="item fore4">
				<a href="#" target="_blank" title="Balenciage巴黎世家女包铆钉羊皮女士手拿包全球购 芒果黄">
					<img class="p-img" data-lazy-img="__PUBLIC__/images/556c0716Nae938e5c.jpg" width="200" height="287" alt="Balenciage巴黎世家女包铆钉羊皮女士手拿包全球购 芒果黄">
					<span class="p-name">Balenciage巴黎世家女包铆钉羊皮女士手拿包全球购 芒果黄</span>
				</a>
				<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950245675'></em></strong></div>
			</li>
		 			<li class="item fore5">
				<a href="#" target="_blank" title="美国直邮 Burts Bees小蜜蜂宝宝洗浴婴儿童洗发水沐浴露二合一薰衣草350ml">
					<img class="p-img" data-lazy-img="__PUBLIC__/images/556c0716Nae938e5c.jpg" width="200" height="287" alt="美国直邮 Burts Bees小蜜蜂宝宝洗浴婴儿童洗发水沐浴露二合一薰衣草350ml">
					<span class="p-name">美国直邮 Burts Bees小蜜蜂宝宝洗浴婴儿童洗发水沐浴露二合一薰衣草350ml</span>
				</a>
				<div class="p-price"><strong class='price'>&yen;<em class='J-p-1950226624'></em></strong></div>
			</li>
		 		</ul>
	</div>
</div>
<!--/ /widget/direct-overseas/direct-overseas.vm -->
    </div>
    <div class="footer-jdww" style="height:auto;">

<!--  /widget/footer-jdww/footer-jdww.vm -->
<div class="m m-auth">
    <div class="mc auth-bd">
        <script>
            (function(doc, win) {
                var img = {
                    srcA: "__PUBLIC__/images/54f50f47Ne3f796e7.jpg",
                    srcB: "__PUBLIC__/images/54f6c759N7ed4c691.jpg"
                };
                var src = pageConfig.wideVersion&&pageConfig.compatible ? img.srcA : img.srcB;
                var wid = pageConfig.wideVersion&&pageConfig.compatible ? 1210 : 990;

                var authImg = '<img width="' + wid + '" height="121" data-lazy-img="' + src + '"">';
                doc.write(authImg);
            })(document, window);
        </script>
    </div>
</div>
<div class="w">
    <div class="m m-footer" style="height:auto;">
        <div class="mc footer-bd">
            <div class="footer-logo">
                <img data-lazy-img="__PUBLIC__/images/logo-201502-jdww-footer.jpg" width="200" height="60" alt="微乐全球购">
            </div>
			            <div class="footer-col">
                <ul>
                                        <li class="item fore1">

                        <h3><img src="__PUBLIC__/images/footer-01.jpg" width="80" height="20"></h3>
						                        <a href="#" target="_blank" title="正品保证">正品保证</a>
						                        <a href="#" target="_blank" title="海外直供">海外直供</a>
						                    </li>
                                        <li class="item fore2">

                        <h3><img src="__PUBLIC__/images/footer-02.jpg" width="80" height="20"></h3>
						                        <a href="#" target="_blank" title="购物流程">购物流程</a>
						                        <a href="#" target="_blank" title="购物须知">购物须知</a>
						                        <a href="#" target="_blank" title="售后规则">售后规则</a>
						                    </li>
                                        <li class="item fore3">

                        <h3><img src="__PUBLIC__/images/footer-03.jpg" width="80" height="20"></h3>
						                        <a href="#" target="_blank" title="微乐支付">微乐支付</a>
						                    </li>
                                        <li class="item fore4">

                        <h3><img src="__PUBLIC__/images/footer-04.jpg" width="80" height="20"></h3>
						                        <a href="#" target="_blank" title="平台规则">平台规则</a>
						                        <a href="#" target="_blank" title="入驻资质">入驻资质</a>
						                        <a href="#" target="_blank" title="联系我们">联系我们</a>
						                    </li>
                                        <li class="item fore5">
                        <h3><img src="__PUBLIC__/images/footer-05.jpg" width="80" height="20" alt="商家服务"></h3>
                        <a class="cs-tel">客服<em><span>400</span>-606-9933</em></a>
                        <a class="cs-time">服务时间<em>9:00-22:00</em></a>
                        <a class="cs-online" href="#" target="_blank" title="在线客服"><i></i>在线客服</a>
                    </li>
                </ul>
            </div>
        </div>
		<div style="padding-top:35px;height:40px;line-height:40px;text-align:center;font-size:12px;color:#828282;" class="mb footer-bm">copyright@2014-2015 weile.com 版权所有</div>
    </div>
</div>
<!--/ /widget/footer-jdww/footer-jdww.vm -->
    </div>

<!--  /widget/floors/floors.vm -->
<div class="ui-elevator">
	<a href="javascript:;" class="ui-elevator-handler fore1">限时抢购</a>
	<a href="javascript:;" class="ui-elevator-handler fore2">国家馆</a>
	<a href="javascript:;" class="ui-elevator-handler fore3">精选推荐</a>
	<a href="javascript:;" class="ui-elevator-handler fore4">母婴用品</a>
	<a href="javascript:;" class="ui-elevator-handler fore5">美妆个护</a>
	<a href="javascript:;" class="ui-elevator-handler fore6">食品保健</a>
	<a href="javascript:;" class="ui-elevator-handler fore7">服饰鞋靴</a>
	<a href="javascript:;" class="ui-elevator-handler fore8">礼品箱包</a>
	<a href="javascript:;" class="ui-elevator-handler fore9">悦洋直邮</a>
	<a href="javascript:;" class="ui-elevator-back-top">TOP</a>
</div>

<script type="text/javascript">
    var getPriceNum = function(skus, iploc, $wrap, perfix, callback) {
            skus = typeof skus === 'string' ? [skus]: skus;
            $wrap = $wrap || $('body');
            perfix = perfix || 'J-p-';

            var ipLocParam = '';

            if ( iploc !== null ) {
                if ( readCookie('ipLoc-djd') ) {
                    ipLocParam = '&area=' + readCookie('ipLoc-djd').replace(/-/g, '_');
                } else {
                    ipLocParam = '&area=1';
                }
            }
            if ( typeof skus === 'undefined' ) {
                return;
            }

            var url = 'http://p.3.cn/prices/mgets?type=1&skuIds=J_' + skus.join(',J_') + ipLocParam;
            $.ajax({
                url: url,
                dataType: 'jsonp',
                success: function (r) {
                    if (!r && !r.length) {
                        return false;
                    }

                    for (var i = 0; i < r.length; i++) {
                        if ( !r[i].id ) {
                            return false;
                        }

                        var sku = r[i].id.replace('J_', '');
                        var wmePrice = parseFloat(r[i].p);
                        var wmaPrice = parseFloat(r[i].m);
                        if (wmePrice > 0) {
                            $wrap.find('.'+ perfix + sku).html(r[i].p + '');
                            $wrap.find('.J-m-' + sku).html(r[i].m + '');
                            $wrap.find('.J-dis-' + sku).html((Math.ceil(r[i].p/r[i].m * 100) / 10).toFixed(1) + '折');
                        } else {
                            $wrap.find('.'+ perfix + sku).html('暂无报价');
                        }
                        if ( typeof callback === 'function' ) {
                            callback(sku, r[i], url);
                        }
                    }
                }
            });
        };
        getPriceNum('1950961439,J_1950306008,J_1950262100,J_1950908522,J_1950070832,J_1950780011,J_1950245029,J_1950762094,J_1950228251,J_1950295177,J_1950235688,J_1950676786,J_1950219380,J_1950779858,J_1951020755,J_1950342885,J_1950270265,J_1950761871,J_1950683451,J_1950994502,J_1950289301,J_1950802973,J_1950303344,J_1950252395,J_1951027416,J_1950118202,J_1950342665,J_1950240517,J_1950253818,J_1950240515,J_1950240513,J_1950322871,J_1950322872,J_1950322873,J_1950776966,J_1950852415,J_1950868916,J_1950219388,J_1951113875,J_1951017115,J_1950533812,J_1950638065,J_1950651744,J_1951016375,J_1950295177,J_1950297967,J_1950235646,J_1950511992,J_1950326625,J_1950305968,J_1950690932,J_1950334335,J_1950499308,J_1950235546,J_1950776943,J_1950779858,J_1950931699,J_1950868622,J_1950167501,J_1951016317,J_1950693837,J_1951054932,J_1950447021,J_1950868616,J_1950509766,J_1950450651,J_1950312242,J_1950255539,J_1950314223,J_1950852580,J_1950305221,J_1950542855,J_1950324538,J_1950292380,J_1950477621,J_1950922775,J_1950305314,J_1950744548,J_1950776654,J_1950325207,J_1950668876,J_1950353130,J_1950477647,J_1951060956,J_1950438169,J_1950225844,J_1950779863,J_1950245675,J_1950226624', '', $('.price'));
    //seajs.use('product/home_textile/0.0.1/js/home_textile.js');
</script>
<!--/ /widget/floors/floors.vm -->
<!--/ /widget/floors/floors.vm -->
<script type="text/javascript">
var jaq = jaq || [];
jaq.push(['account', 'JA2015_111140']);
jaq.push(['domain', 'jd.hk']);
jaq.push(['erp_account', '']);
(function () {
var ja = document.createElement('script');
ja.type = 'text/javascript';
ja.async = true;
ja.src = ('https:' == document.location.protocol ? 'https://cscssl' : 'http://csc') + '.jd.com/joya.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(ja, s);
})();
</script>

<script type="text/javascript" src="__PUBLIC__/css/loadFa_toJson.js?aid=0_0_6595"></script>
<script type="text/javascript" src="__PUBLIC__/css/widget.js" source="widget"></script>
</body>
</html><!-- Google Tag Manager -->
<script type="text/javascript">
    function GetCategoryID() {
        var pcat = "";
        var secondChannel = location.href.match(/(\d*)-(\d*)(.*)\.html/);
        if (secondChannel != null) {
            pcat = secondChannel[1] + "|" + secondChannel[2];
        } else {
            var firstChannel = location.href;
            switch (firstChannel) {
                case "http://channel.jd.com/electronic.html":
                    pcat = "737";
                    break;
                case "http://shouji.jd.com":
                    pcat = "9987";
                    break;
                case "http://channel.jd.com/yunyingshang.html":
                    pcat = "9987|6880";
                    break;
                case "http://channel.jd.com/shouji.html":
                    pcat = "9987|653";
                    break;
                case "http://channel.jd.com/peijian.html":
                    pcat = "9987|830";
                    break;
                case "http://channel.jd.com/digital.html":
                    pcat = "652";
                    break;
                case "http://channel.jd.com/computer.html":
                    pcat = "670";
                    break;
                case "http://channel.jd.com/home.html":
                    pcat = "1620";
                    break;
                case "http://channel.jd.com/furniture.html":
                    pcat = "9847";
                    break;
                case "http://channel.jd.com/decoration.html":
                    pcat = "9855";
                    break;
                case "http://channel.jd.com/kitchenware.html":
                    pcat = "6196";
                    break;
                case "http://channel.jd.com/clothing.html":
                    pcat = "1315";
                    break;
                case "http://channel.jd.com/shoes.html":
                    pcat = "11729";
                    break;
                case "http://channel.jd.com/beauty.html":
                    pcat = "1316";
                    break;
                case "http://channel.jd.com/bag.html":
                    pcat = "1672";
                    break;
                case "http://channel.jd.com/watch.html":
                    pcat = "5025";
                    break;
                case "http://channel.jd.com/jewellery.html":
                    pcat = "6144";
                    break;
                case "http://channel.jd.com/sports.html":
                    pcat = "1318";
                    break;
                case "http://channel.jd.com/auto.html":
                    pcat = "6728";
                    break;
                case "http://baby.jd.com":
                    pcat = "1319";
                    break;
                case "http://diannao.jd.com":
                    pcat = "670";
                    break;
                case "http://shuma.jd.com":
                    pcat = "652";
                    break;
                case "http://channel.jd.com/toys.html":
                    pcat = "6233";
                    break;
                case "http://channel.jd.com/food.html":
                    pcat = "1320";
                    break;
                case "http://channel.jd.com/pet.html":
                    pcat = "6994";
                    break;
                case "http://channel.jd.com/men.html":
                    pcat = "1315|1342";
                    break;
                case "http://channel.jd.com/women.html":
                    pcat = "1315|1343";
                    break;
                case "http://channel.jd.com/mensbag.html":
                    pcat = "1672|2576";
                    break;
                case "http://channel.jd.com/Children.html":
                    pcat = "1319|11842";
                    break;
                case "http://channel.jd.com/accessories.html":
                    pcat = "1315|1346";
                    break;
                case "http://channel.jd.com/shishangshipin.html":
                    pcat = "6144|6182";
                    break;
                case "http://channel.jd.com/zuanshi.html":
                    pcat = "6144|6160";
                    break;
                case "http://channel.jd.com/feicui.html":
                    pcat = "6144|6167";
                    break;
                case "http://channel.jd.com/silver.html":
                    pcat = "6144|6155";
                    break;
                case "http://channel.jd.com/huangjin.html":
                    pcat = "6144|6145";
                    break;
                case "http://channel.jd.com/shuijing.html":
                    pcat = "6144|6172";
                    break;
                case "http://channel.jd.com/caibao.html":
                    pcat = "6144|6174";
                    break;
                case "http://channel.jd.com/zhenzhu.html":
                    pcat = "6144|12042";
                    break;
                case "http://channel.jd.com/mushouchuan.html":
                    pcat = "6144|12041";
                    break;
                case "http://channel.jd.com/jintiao.html":
                    pcat = "6144|6146";
                    break;
                case "http://channel.jd.com/bojin.html":
                    pcat = "6144|12040";
                    break;
                case "http://channel.jd.com/luxury.html":
                    pcat = "1672";
                    break;
                case "http://channel.jd.com/yundong.html":
                    pcat = "1318";
                    break;
                case "http://channel.jd.com/mensshoes.html":
                    pcat = "11729|11730";
                    break;
                case "http://channel.jd.com/womensshoes.html":
                    pcat = "11729|11731";
                    break;
                case "http://channel.jd.com/underwear.html":
                    pcat = "1315";
                    break;
                case "http://channel.jd.com/wine.html":
                    pcat = "12259";
                    break;
                case "http://channel.jd.com/life.html":
                    pcat = "1620";
                    break;
                case "http://book.jd.com":
                    pcat = "1713";
                    break;
                case "http://channel.jd.com/freshfood.html":
                    pcat = "12218";
                    break;
                case "http://channel.jd.com/womensbag.html":
                    pcat = "1672|2575";
                    break;
                case "http://channel.jd.com/yundongcheng.html":
                    pcat = "1318|12099";
                    break;
                case "http://channel.jd.com/public/peijian.shtml":
                    pcat = "9987|830";
                    break;
            }
        }
        return pcat;
    }
    var pcatVar = GetCategoryID();

    var google_tag_params = {
        ecomm_pagetype: "category",
        ecomm_pcat: pcatVar
    };
</script>
<script type="text/javascript">dataLayer = [{
    'google_tag_params': window.google_tag_params
}];
</script>