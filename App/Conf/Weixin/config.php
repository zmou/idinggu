<?php
return array(
	'TMPL_PARSE_STRING'=>array(
		'__PUBLIC__'=>__ROOT__.'/Public/Weixin',
	),
	'URL_HTML_SUFFIX'		=>	'.html',
	'SHOW_PAGE_TRACE'        => false,   // ��ʾҳ��Trace��Ϣ
	'TMPL_ACTION_ERROR' => TMPL_PATH . 'Weixin/Public/jump.html', 		//����ҳ��	
	'TMPL_ACTION_SUCCESS' => TMPL_PATH . 'Weixin/Public/jump.html', 	//�ɹ�ҳ��	
);