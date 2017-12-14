<?php
return array(
	'Child_Id' =>array(
		'Model_child::unique_childid_exists'	=>	'整理番号は使用中です。'
	),
	'InputDate' => array(
		'not_empty'				=> '[記入日]は入力必須です。',
	),
	'FamilyName' => array(
		'not_empty'				=> '[苗字]は入力必須です。',
		'max_length'			=> '[苗字]20桁数以内を入力してください。'
	),
	'GivenName' => array(
			'not_empty'				=> '[名前]は入力必須です。',
			'max_length'			=> '[名前]20桁数以内を入力してください'
	),
	'FamilyName_Spell' => array(
			'not_empty'				=> '[みょうじ]は入力必須です。',
			'max_length'			=> '[みょうじ]32桁数以内を入力してください。'
	),
	'GivenName_Spell' => array(
			'not_empty'				=> '[なまえ]は入力必須です。',
			'max_length'			=> '[なまえ]32桁数以内を入力してください。'
	),
	'NickName' => array(
			'not_empty'				=> '[家庭での呼び名]は入力必須です。',
			'max_length'			=> '[家庭での呼び名]40桁数以内を入力してください。'
	),
	'Birthday' => array(
			'not_empty'				=> '[生年月日]は入力必須です。',
			'numeric'				=> '[生年月日]必须为数字'
	),
	'Age' => array(
			'not_empty'				=> '[歳]は入力必須です。',
			'numeric'				=> '[歳]必须为数字'
	),
	'Sex' => array(
			'not_empty'				=> '[性別]は選択必須です。',
			'max_length'			=> '[性別]は選択必須です。'
	),
	'PostCode' => array(
			'not_empty'				=> '[郵便番号( - なし)]は入力必須です。',
			'max_length'			=> '[郵便番号( - なし)]16桁数以内を入力してください。'
	),
	'Address' => array(
			'not_empty'				=> '[現 住 所]は入力必須です。',
			'max_length'			=> '[現 住 所]200桁数以内を入力してください。'
	),
	'Tel' => array(
			'not_empty'				=> '[電話番号( - なし)]は入力必須です。',
			'max_length'			=> '[電話番号( - なし)]45桁数以内を入力してください。'
	),
	'USERID' => array(
			'Model_User::unique_userid_exists'	=> 'アカウントはもう使用されました。',
			'not_empty'							=> 'アカウントは入力必須です。',
			'min_length'						=> 'アカウント は4桁数以上を入力してください。',
			'max_length'						=> 'アカウント は32桁数以内を入力してください。',
	),
	'Guardian_ID' => array(
			'Model_userGuardian::unique_userGuardianId_exists'	=> 'アカウントはもう使用されました。',
			'not_empty'									=> 'アカウントは入力必須です。',
			'min_length'								=> 'アカウント は8桁数で入力してください。',
			'max_length'								=> 'アカウント は8桁数で入力してください。',
	)
);