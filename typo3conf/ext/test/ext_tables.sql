CREATE TABLE tx_test_domain_model_news (
	title varchar(255) NOT NULL DEFAULT '',
	description text,
	img int(11) unsigned NOT NULL DEFAULT '0',
	categories int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_test_domain_model_newscategory (
	name varchar(255) NOT NULL DEFAULT '',
	news int(11) unsigned NOT NULL DEFAULT '0'
);
