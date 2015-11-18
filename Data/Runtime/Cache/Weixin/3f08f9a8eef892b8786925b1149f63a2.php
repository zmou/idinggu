<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
  <script src="http://api.map.baidu.com/api?v=1.4" type="text/javascript"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=kibiaHenKljDBMISCEue5KzM&v=1.0"></script>
    <script type="text/javascript">
var city_name = '';
        if (window.navigator.geolocation) {
            var options = {
                enableHighAccuracy: true,
            };
            window.navigator.geolocation.getCurrentPosition(handleSuccess, handleError, options);
        } else {
            alert("浏览器不支持获取地理位置信息。");
        }
        function handleSuccess(position) {

            // 获取到当前位置经纬度  本例中是chrome浏览器取到的是google地图中的经纬度
            var lng = position.coords.longitude;
            var lat = position.coords.latitude;
            var point = new BMap.Point(lng, lat);
            var gc = new BMap.Geocoder();
            gc.getLocation(point, function (rs) {
                var addComp = rs.addressComponents;
				city_name = addComp.city.replace(/市/g, "");
                document.getElementById("cityInfo").innerText =addComp.city.replace(/市/g, "");
                //document.getElementById("districtInfo").innerText =addComp.district;
                //addComp.district + ", " + addComp.street + ", " + addComp.streetNumber 获取行政区及街道
            });
        }
        function handleError(error) {

        }
    </script>
</head>
<body class="location_bg"> 

<div style="margin-top:-15px;" class="search">
	<div class="box">
		<form action="index.php" method="get">
		<b><input name="city"  type="text" placeholder="请输入城市名称或首字母查询" value="<?php echo ($_GET['city']); ?>"/></b>
		<p><input type="hidden" name="m" value="Index"/>
		<input type="hidden" name="a" value="location_city"/>
		<input type="submit" class="btn" value=""/></p>

		</form>
	</div>
</div>

<div class="city_list1">
	<h1>定位城市</h1>
	<ul>
		<li>
			<span id="cityInfo" class="location_fail">定位失败</span>
		</li>
	</ul>
</div>

<div class="city_list1">
	<h1>热门城市</h1>
	<ul>
    <?php if(is_array($hot_city)): $i = 0; $__LIST__ = $hot_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li onclick='location.href="<?php echo U('location_school',array('city_id'=>$item['region_id']));?>"' city_id="<?php echo ($item["region_id"]); ?>"><?php echo ($item["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>    
	</ul>
</div>

<?php if(is_array($city_arr)): $i = 0; $__LIST__ = $city_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="city_list2" id="<?php echo ($key); ?>">

	<h1 ><?php echo (strtoupper($key)); ?></h1>
	<ul>
    	<?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li onclick='location.href="<?php echo U('location_school',array('city_id'=>$val['id']));?>"' city_id="<?php echo ($item["id"]); ?>"><?php echo ($val["region_name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
 
</div><?php endforeach; endif; else: echo "" ;endif; ?>   

<div class="city_nav">
	<ul>
    	<?php if(is_array($spell_arr)): $i = 0; $__LIST__ = $spell_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li><a href="#<?php echo ($item); ?>"><?php echo (strtoupper($item)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
$(function(){	
		$('#cityInfo').click(function(){
			var city_name = $(this).html();
			if(city_name != '定位失败')
			{
				window.location.href = "<?php echo U('location_school',array('city_name'=>'"+city_name+"'));?>";
			}
			else
			{
				alert(city_name);
			}
		});
})
</script>
</body>
</html>