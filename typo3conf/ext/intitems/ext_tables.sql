CREATE TABLE tx_intitems_domain_model_item (
    oid               VARCHAR(255) DEFAULT '' NOT NULL,
    name              VARCHAR(255) DEFAULT '' NOT NULL,
    description_short TEXT,
    description       TEXT,
    list_image        INT(11) unsigned NOT NULL default '0',
    header_image      INT(11) unsigned NOT NULL default '0',
    images            INT(11) unsigned NOT NULL default '0',
    files1            INT(11) unsigned NOT NULL default '0',
    files2            INT(11) unsigned NOT NULL default '0',
    files3            INT(11) unsigned NOT NULL default '0',
    properties        INT(11) unsigned DEFAULT '0' NOT NULL,
    categories        INT(11) unsigned DEFAULT '0' NOT NULL,

    -- Slug
    slug              VARCHAR(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_intitems_domain_model_itemproperty (
    item        INT(11) unsigned DEFAULT '0' NOT NULL,
    toggle_item SMALLINT (4) unsigned DEFAULT '0' NOT NULL,
    value_label VARCHAR(255) DEFAULT '' NOT NULL,
    value_type  INT(11) DEFAULT '0' NOT NULL,
    value_int   INT(11) DEFAULT '0' NOT NULL,
    value_float DOUBLE(11, 2
) DEFAULT '0' NOT NULL,
	value_input VARCHAR(255) DEFAULT '' NOT NULL,
	value_bool  SMALLINT(5) unsigned DEFAULT '0' NOT NULL,
	value_text  TEXT
);

CREATE TABLE tx_intitems_item_category_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);
