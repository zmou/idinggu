<?php
class UserRelationModel extends RelationModel{

	protected $tableName='user';

	protected $_link=array(
		'role'=>array(
			'mapping_type'=>MANY_TO_MANY,		
			'foreign_key'=>'user_id',
			'relation_key'=>'role_id',
			'relation_table'=>'twotree_role_user',
			'mapping_fields'=>'id,name,remark'
		)
	
	);
}