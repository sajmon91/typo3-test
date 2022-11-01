CREATE TABLE tx_intnews_domain_model_news (
    oid                    VARCHAR(255) DEFAULT '' NOT NULL,
    name                   VARCHAR(255) DEFAULT '' NOT NULL,
    subheader              VARCHAR(255) DEFAULT '' NOT NULL,
    news_date              VARCHAR(255) DEFAULT '',
    news_type              INT(11) unsigned NOT NULL default '0',
    hide_original_language TINYINT(4) DEFAULT 0 NOT NULL,
    description_short      TEXT,
    description            TEXT,
    event_duration         TEXT,
    event_location         TEXT,
    event_address          TEXT,
    event_hall             TEXT,
    event_booth            TEXT,
    event_link             VARCHAR(255) DEFAULT '' NOT NULL,
    list_image             INT(11) unsigned NOT NULL default '0',
    header_image           INT(11) unsigned NOT NULL default '0',
    files                  INT(11) unsigned NOT NULL default '0',
    authors                INT(11) unsigned NOT NULL default '0',
    contents               INT(11) unsigned NOT NULL default '0',
    categories             INT(11) unsigned NOT NULL default '0',

    -- Slug
    slug                   VARCHAR(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_intnews_news_category_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);

CREATE TABLE tx_intnews_news_author_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);

CREATE TABLE tx_intnews_news_content_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);
