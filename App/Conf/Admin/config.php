<?php
return array(
	'TMPL_PARSE_STRING'=>array(
		//'__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Tpl/Admin/Public',
		'__PUBLIC__'=>__ROOT__.'/Public/Static',
	),
	'URL_HTML_SUFFIX'		=>	'.html',
	'SHOW_PAGE_TRACE'        => false,   // ��ʾҳ��Trace��Ϣ
	/**********************************RBAC******************************************/
	'RBAC_SUPERADMIN'		=>	'admin',
	'ADMIN_AUTH_KEY'		=>	'superadmin',
	'USER_AUTH_ON'			=>	true,
	'USER_AUTH_TYPE'		=>	1,
	'USER_AUTH_KEY'			=>	'uid',
	'NOT_AUTH_MODULE'		=>	'Index',
	'NOT_AUTH_ACTION'		=>	'addUserHandle,addRoleHandle,addNodeHandle,setAccess,artaddhandle,sortaddhandle',
	'RBAC_ROLE_TABLE'		=>	'twotree_role',
	'RBAC_USER_TABLE'		=>	'twotree_role_user',
	'RBAC_NODE_TABLE'		=>	'twotree_node',
	'RBAC_ACCESS_TABLE'		=>	'twotree_access'
);