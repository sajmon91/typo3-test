CREATE TABLE tx_intticket_domain_model_ticket (
	subject varchar(255) NOT NULL DEFAULT '',
	body text,
	notes int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_intticket_domain_model_note (
	ticket int(11) unsigned DEFAULT '0' NOT NULL,
	sender text NOT NULL DEFAULT '',
	receivers text NOT NULL DEFAULT '',
	body text
);
