$(function(){
	/*
	   地区联动
	   */
	$.post("index.php?g=Admin&m=Ajax&a=province",'',function(json){
		var html='<option value="">-请选择-</option>';
		$.each(json,function(i,obj){
			html+='<option value='+obj.id+'>'+obj.region_name+'</option>';
		});
		$("#province").html(html);
	},'json');

	$("#province").change(function(){
		$("#city").html('<option value="">-城市-</option>');
		$("#district").html('<option value="">-区县-</option>');
		$.post("index.php?g=Admin&m=Ajax&a=city",{'parent_id':$(this).val()},function(json){
			var html='<option value="">-请选择-</option>';
			$.each(json,function(i,obj){
				html+='<option value='+obj.id+'>'+obj.region_name+'</option>';
			});
			$("#city").html(html);
		},'json');
	});

	$("#city").change(function(){
		$("#district").html('<option value="">-区县-</option>');
		$.post("index.php?g=Admin&m=Ajax&a=district",{'parent_id':$(this).val()},function(json){
			var html='<option value="">-请选择-</option>';
			$.each(json,function(i,obj){
				html+='<option value='+obj.id+'>'+obj.region_name+'</option>';
			});
			$("#district").html(html);
		},'json');
	});

	$("#school").change(function(){
		$("#build").html('<option value="">-请选择-</option>');
		$.post("index.php?g=Admin&m=Ajax&a=build",{'sch_id':$(this).val()},function(json){
			var html='<option>-请选择-</option>';
			$.each(json,function(i,obj){
				html+='<option value='+obj.id+'>'+obj.name+'</option>';
			});
			$("#build").html(html);
		},'json');
	});


	/*
	   当前登录管理员
	   */
	$('#user-curr').bind('click',function(){
		$(".user-info").slideToggle('fast');
	});
	$('#user-curr').bind('mouseover',function(){
		$(".user-info").slideDown('fast');
	});

	/*
	   只能输入数字
	   */
	$(".num,.number").keyup(function(){
		if(isNaN($(this).val())){
			$(this).val('');
		}
	});

	/*
	   操作前确认
	   */
	$(".confirm").click(function(){
		if(!confirm('确认操作？')){
			return false;	
		}
	});

});

/*function alert(data){
  artDialog({content:data, style:'alert', lock:false}, function(){});	
  }*/

/*
   正则校验银行卡
   */
var bank_card = function (bankno){
	var lastNum=bankno.substr(bankno.length-1,1);//取出最后一位（与luhm进行比较）

	var first15Num=bankno.substr(0,bankno.length-1);//前15或18位
	var newArr=new Array();
	for(var i=first15Num.length-1;i>-1;i--){    //前15或18位倒序存进数组
		newArr.push(first15Num.substr(i,1));
	}
	var arrJiShu=new Array();  //奇数位*2的积 <9
	var arrJiShu2=new Array(); //奇数位*2的积 >9

	var arrOuShu=new Array();  //偶数位数组
	for(var j=0;j<newArr.length;j++){
		if((j+1)%2==1){//奇数位
			if(parseInt(newArr[j])*2<9)
				arrJiShu.push(parseInt(newArr[j])*2);
			else
				arrJiShu2.push(parseInt(newArr[j])*2);
		}
		else //偶数位
			arrOuShu.push(newArr[j]);
	}

	var jishu_child1=new Array();//奇数位*2 >9 的分割之后的数组个位数
	var jishu_child2=new Array();//奇数位*2 >9 的分割之后的数组十位数
	for(var h=0;h<arrJiShu2.length;h++){
		jishu_child1.push(parseInt(arrJiShu2[h])%10);
		jishu_child2.push(parseInt(arrJiShu2[h])/10);
	}       

	var sumJiShu=0; //奇数位*2 < 9 的数组之和
	var sumOuShu=0; //偶数位数组之和
	var sumJiShuChild1=0; //奇数位*2 >9 的分割之后的数组个位数之和
	var sumJiShuChild2=0; //奇数位*2 >9 的分割之后的数组十位数之和
	var sumTotal=0;
	for(var m=0;m<arrJiShu.length;m++){
		sumJiShu=sumJiShu+parseInt(arrJiShu[m]);
	}

	for(var n=0;n<arrOuShu.length;n++){
		sumOuShu=sumOuShu+parseInt(arrOuShu[n]);
	}

	for(var p=0;p<jishu_child1.length;p++){
		sumJiShuChild1=sumJiShuChild1+parseInt(jishu_child1[p]);
		sumJiShuChild2=sumJiShuChild2+parseInt(jishu_child2[p]);
	}     
	//计算总和
	sumTotal=parseInt(sumJiShu)+parseInt(sumOuShu)+parseInt(sumJiShuChild1)+parseInt(sumJiShuChild2);

	//计算Luhm值
	var k= parseInt(sumTotal)%10==0?10:parseInt(sumTotal)%10;       
	var luhm= 10-k;

	if(lastNum==luhm){
		//$("#banknoInfo").html("Luhm验证通过");
		return true;
	}
	else{
		//$("#banknoInfo").html("银行卡号必须符合Luhm校验");
		return false;
	}       
}

var mobile=function(content){
	//var regex = /^13[0-9]{9}$|^15[0-9]{9}$|^18[0-9]{9}$/;  
	var regex = /^(13[0-9]|15[012356789]|17[012356789]|18[0-9]|14[57])[0-9]{8}$/;
	if (regex.test(content)) {  
		return true;  
	}else{
		return false;  
	}  

}

var check_id_card = function(content)
{
	var regex = /(^[1-9]{15}$)|(^[0-9]{17}([0-9]|X|x)$)/;
	if (regex.test(content)) {  
		return true;  
	}else{
		return false;  
	}  

}
