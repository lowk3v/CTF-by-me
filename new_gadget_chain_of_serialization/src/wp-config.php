<?php
define( 'WP_HOME', 'http://localhost' );
define( 'WP_SITEURL', 'http://42.112.213.83' );
define('DB_NAME', 'wordpress');
define('DB_USER', 'ctf');
define('DB_PASSWORD', 'faked');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY',         'uJK~N_>>|O~5u<!D|~$f.T}|U}r+9OrBh,?P:gB$s@r,9#8MK|py(0K-|4%A;]P(');
define('SECURE_AUTH_KEY',  'fX{qFgJV5K;K $A#SrOP7j2S^HlbDEjF,~a+>IM}Y`B*<9r6v}0!T}DO2Nix+|`N');
define('LOGGED_IN_KEY',    'N9lkPlk8n8c^cmh>0=Q((.Uq!:LHcach^7pkHEgiC6S)dr[+h(HienSuSowC$F5Y');
define('NONCE_KEY',        'I`<G|nf->@E,D0%2||s! F3dQCX?D10k MmlRYz8^_mdwx$Q?6|/[mS-#K~:`(f|');
define('AUTH_SALT',        '(.GoZ{LW/!EJ-af|BO7[|@Os~~JiLBvhO;BsiFYct!m-p!!Dy;+K#0B#>#>ZJNgf');
define('SECURE_AUTH_SALT', '-+q|&+IB)y<q%A}V~xqa8#8O |JUv,?5A0@Uhmc2O|-!~5dl3:v-=k9-VMs:Rb^o');
define('LOGGED_IN_SALT',   'm5!j2)El!U:f5Q9-#Z??rBC9y=2i2(K+}s#VmTL^4r9Kl6+GheRc6Lt<~c& ?g f');
define('NONCE_SALT',       '|aXS6JxI^8#q)n%:N,ri-05H6|B6I2*;Yy5t$}xZDh-?SkZ1-J#P+E8/31KgN=tv');


$table_prefix  = 'tbl_';
define('WP_DEBUG', false);

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
