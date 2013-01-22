users
	- uid			BIGINT(20) NOT NULL AUTO INCREMENT PRIMARY KEY
	- username		VARCHAR(30) NOT NULL COLLATION utf8_general_ci
	- password		VARCHAR(64) NOT NULL COLLATION utf8_general_ci
	- salt			VARCHAR(3)	NOT NULL COLLATION utf8_general_ci
	
posts
	- post_id		BIGINT(20) NOT NULL AUTO INCREMENT PRIMARY KEY
	- uid			BIGINT(20) NOT NULL FOREIGN KEY users(uid)
	- post_body 	LONGTEXT NOT NULL COLLATION utf8_general_ci
	- post_title	TEXT NOT NULL COLLATION utf8_general_ci
	- datetime		DATETIME NOT NULL DEFAULT '0000-00-00 00:00';
	
	
