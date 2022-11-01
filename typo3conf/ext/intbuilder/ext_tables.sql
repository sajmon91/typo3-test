CREATE TABLE pages (
    int_top_pages           INT(11) unsigned DEFAULT 0 NOT NULL,
    int_bottom_pages1       INT(11) unsigned DEFAULT 0 NOT NULL,
    int_bottom_pages2       INT(11) unsigned DEFAULT 0 NOT NULL,
    int_bottom_pages3       INT(11) unsigned DEFAULT 0 NOT NULL,
    int_bottom_pages4       INT(11) unsigned DEFAULT 0 NOT NULL,
    int_icons1              INT(11) unsigned DEFAULT 0 NOT NULL,
    int_icons2              INT(11) unsigned DEFAULT 0 NOT NULL,
    int_icons3              INT(11) unsigned DEFAULT 0 NOT NULL,
    int_icons4              INT(11) unsigned DEFAULT 0 NOT NULL,
    int_header1             VARCHAR(255) DEFAULT '' NOT NULL,
    int_header2             VARCHAR(255) DEFAULT '' NOT NULL,
    int_header3             VARCHAR(255) DEFAULT '' NOT NULL,
    int_header4             VARCHAR(255) DEFAULT '' NOT NULL,
    int_new                 TINYINT(4) DEFAULT 0 NOT NULL,
    int_image1              INT(11) unsigned DEFAULT 0 NOT NULL,
    int_footer_teaser_title VARCHAR(255) DEFAULT '' NOT NULL,
    int_footer_teaser       INT(11) unsigned DEFAULT 0 NOT NULL,
    int_header_desktop      INT(11) unsigned DEFAULT 0 NOT NULL,
    int_header_mobile       INT(11) unsigned DEFAULT 0 NOT NULL,
    int_footer_desktop      INT(11) unsigned DEFAULT 0 NOT NULL,
    int_footer_mobile       INT(11) unsigned DEFAULT 0 NOT NULL,
);

-- Connection tables for Pages and Top Pages
CREATE TABLE tx_intbuilder_pages_toppages_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);

-- Connection tables for Pages and Bottom Pages 1
CREATE TABLE tx_intbuilder_pages_bottompages1_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);

-- Connection tables for Pages and Bottom Pages 2
CREATE TABLE tx_intbuilder_pages_bottompages2_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);

-- Connection tables for Pages and Bottom Pages 3
CREATE TABLE tx_intbuilder_pages_bottompages3_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);

-- Connection tables for Pages and Bottom Pages 4
CREATE TABLE tx_intbuilder_pages_bottompages4_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);


CREATE TABLE tt_content (
    -- Default fields
    int_identifier       VARCHAR(255) DEFAULT '' NOT NULL,

    int_header1          VARCHAR(255) DEFAULT '' NOT NULL,
    int_header2          VARCHAR(255) DEFAULT '' NOT NULL,
    int_header3          VARCHAR(255) DEFAULT '' NOT NULL,

    int_subheader1       VARCHAR(255) DEFAULT '' NOT NULL,
    int_subheader2       VARCHAR(255) DEFAULT '' NOT NULL,
    int_subheader3       VARCHAR(255) DEFAULT '' NOT NULL,

    int_lead1            TEXT,
    int_lead2            TEXT,
    int_lead3            TEXT,

    int_text1            TEXT,
    int_text2            TEXT,
    int_text3            TEXT,

    int_link_phone1      VARCHAR(50)  DEFAULT '' NOT NULL,
    int_link_phone2      VARCHAR(50)  DEFAULT '' NOT NULL,
    int_link_phone3      VARCHAR(50)  DEFAULT '' NOT NULL,

    int_link_mail1       VARCHAR(50)  DEFAULT '' NOT NULL,
    int_link_mail2       VARCHAR(50)  DEFAULT '' NOT NULL,
    int_link_mail3       VARCHAR(50)  DEFAULT '' NOT NULL,

    int_link_external1   VARCHAR(255) DEFAULT '' NOT NULL,
    int_link_external2   VARCHAR(255) DEFAULT '' NOT NULL,
    int_link_external3   VARCHAR(255) DEFAULT '' NOT NULL,

    int_link_page1       VARCHAR(255) DEFAULT '' NOT NULL,
    int_link_page2       VARCHAR(255) DEFAULT '' NOT NULL,
    int_link_page3       VARCHAR(255) DEFAULT '' NOT NULL,

    int_link_file1       VARCHAR(255) DEFAULT '' NOT NULL,
    int_link_file2       VARCHAR(255) DEFAULT '' NOT NULL,
    int_link_file3       VARCHAR(255) DEFAULT '' NOT NULL,

    int_link1            VARCHAR(255) DEFAULT '' NOT NULL,
    int_link2            VARCHAR(255) DEFAULT '' NOT NULL,
    int_link3            VARCHAR(255) DEFAULT '' NOT NULL,

    int_image1           INT(11) unsigned DEFAULT 0 NOT NULL,
    int_image2           INT(11) unsigned DEFAULT 0 NOT NULL,
    int_image3           INT(11) unsigned DEFAULT 0 NOT NULL,

    int_video1           VARCHAR(255) DEFAULT '' NOT NULL,
    int_video2           VARCHAR(255) DEFAULT '' NOT NULL,
    int_video3           VARCHAR(255) DEFAULT '' NOT NULL,

    int_number1          INT(11) unsigned DEFAULT 0 NOT NULL,
    int_number2          INT(11) unsigned DEFAULT 0 NOT NULL,
    int_number3          INT(11) unsigned DEFAULT 0 NOT NULL,

    int_float1           FLOAT(11) unsigned DEFAULT 0.00 NOT NULL,
    int_float2           FLOAT(11) unsigned DEFAULT 0.00 NOT NULL,
    int_float3           FLOAT(11) unsigned DEFAULT 0.00 NOT NULL,

    int_select1          VARCHAR(255) DEFAULT '' NOT NULL,
    int_select2          VARCHAR(255) DEFAULT '' NOT NULL,
    int_select3          VARCHAR(255) DEFAULT '' NOT NULL,

    int_checkbox1        TINYINT(4) DEFAULT 0 NOT NULL,
    int_checkbox2        TINYINT(4) DEFAULT 0 NOT NULL,
    int_checkbox3        TINYINT(4) DEFAULT 0 NOT NULL,

    -- Content specific fields
    int_width_container  VARCHAR(20)  DEFAULT '' NOT NULL,
    int_background_color VARCHAR(20)  DEFAULT '' NOT NULL,
    int_image_position   VARCHAR(20)  DEFAULT '' NOT NULL,
    int_column_count     VARCHAR(20)  DEFAULT '' NOT NULL,

    -- Plugin tt_content integration
    int_parent_news      INT(11) unsigned DEFAULT 0 NOT NULL
);

CREATE TABLE tt_content (
    int_irre_heroslider        INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_accordion         INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_tabs              INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_teaserbox         INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_teaserboxicon     INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_teaserboximage    INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_download          INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_usp               INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_boxteaser         INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_teasersliderbox   INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_teasersliderimage INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_itemteaser        INT(11) unsigned DEFAULT 0 NOT NULL,
    int_irre_references        INT(11) unsigned DEFAULT 0 NOT NULL,
);

CREATE TABLE tx_intbuilder_domain_model_irre_accordion (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    content_type      INT(11) unsigned DEFAULT 0 NOT NULL,
    text              TEXT,
    text2             TEXT,
    images            INT(11) unsigned DEFAULT 0 NOT NULL,
    videos            INT(11) unsigned DEFAULT 0 NOT NULL,
);
CREATE TABLE tx_intbuilder_domain_model_irre_heroslider (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    images            INT(11) unsigned DEFAULT 0 NOT NULL,
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    link              VARCHAR(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_intbuilder_domain_model_irre_tabs (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    content_type      INT(11) unsigned DEFAULT 0 NOT NULL,
    text              TEXT,
    text2             TEXT,
    images            INT(11) unsigned DEFAULT 0 NOT NULL,
    videos            INT(11) unsigned DEFAULT 0 NOT NULL,
);
CREATE TABLE tx_intbuilder_domain_model_irre_teaserbox (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    link              VARCHAR(255) DEFAULT '' NOT NULL
);
CREATE TABLE tx_intbuilder_domain_model_irre_teaserboxicon (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    icons             INT(11) unsigned DEFAULT 0 NOT NULL,
    link              VARCHAR(255) DEFAULT '' NOT NULL
);
CREATE TABLE tx_intbuilder_domain_model_irre_teaserboximage (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    images            INT(11) unsigned DEFAULT 0 NOT NULL,
    link              VARCHAR(255) DEFAULT '' NOT NULL
);

-- Tags and categories
CREATE TABLE tx_intbuilder_domain_model_category (
    oid              VARCHAR(255) DEFAULT '' NOT NULL,
    name             VARCHAR(255) DEFAULT '' NOT NULL,
    type             INT(11) unsigned DEFAULT 0 NOT NULL,
    parent_category  INT(11) unsigned DEFAULT 0 NOT NULL,
    child_categories INT(11) unsigned DEFAULT 0 NOT NULL,
    image1           INT(11) unsigned DEFAULT 0 NOT NULL,
    image2           INT(11) unsigned DEFAULT 0 NOT NULL,
    icon1            INT(11) unsigned DEFAULT 0 NOT NULL,
    icon2            INT(11) unsigned DEFAULT 0 NOT NULL,
    show_in_list     TINYINT(4) DEFAULT 0 NOT NULL,
    show_in_filter   TINYINT(4) DEFAULT 0 NOT NULL,

    key              OID(oid),
    key              PARENT_CATEGORY(parent_category),
    key              TYPE( type)
);

-- Tags and categories
CREATE TABLE tx_intbuilder_domain_model_author (
    name_prefix     VARCHAR(255) DEFAULT '' NOT NULL,
    first_name      VARCHAR(255) DEFAULT '' NOT NULL,
    last_name       VARCHAR(255) DEFAULT '' NOT NULL,
    author_type     INT(11) unsigned DEFAULT 0 NOT NULL,
    author_position VARCHAR(255) DEFAULT '' NOT NULL,
    author_company  VARCHAR(255) DEFAULT '' NOT NULL,
    email           VARCHAR(255) DEFAULT '' NOT NULL,
    phone           VARCHAR(255) DEFAULT '' NOT NULL,
    website         VARCHAR(255) DEFAULT '' NOT NULL,
    linkedin        VARCHAR(255) DEFAULT '' NOT NULL,
    xing            VARCHAR(255) DEFAULT '' NOT NULL,
    image           INT(11) unsigned DEFAULT 0 NOT NULL
);

-- Connection tables for Recursive Categories
CREATE TABLE tx_intbuilder_category_childcategories_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);


CREATE TABLE tx_intbuilder_domain_model_irre_download (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    header2           VARCHAR(255) DEFAULT '' NOT NULL,
    subheader1        VARCHAR(255) DEFAULT '' NOT NULL,
    subheader2        VARCHAR(255) DEFAULT '' NOT NULL,
    images            INT(11) unsigned DEFAULT 0 NOT NULL,
    files             INT(11) unsigned DEFAULT 0 NOT NULL
);

CREATE TABLE tx_intbuilder_domain_model_irre_usp (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    link              VARCHAR(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_intbuilder_domain_model_irre_boxteaser (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    link              VARCHAR(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_intbuilder_domain_model_irre_teasersliderbox (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    link              VARCHAR(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_intbuilder_domain_model_irre_teasersliderimage (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    images            INT(11) unsigned DEFAULT 0 NOT NULL,
    link              VARCHAR(255) DEFAULT '' NOT NULL
);

CREATE TABLE sys_file_reference (
    int_lightbox TINYINT(4) DEFAULT 0 NOT NULL,
);

CREATE TABLE tx_intbuilder_domain_model_irre_itemteaser (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    item_type         INT(11) unsigned DEFAULT 0 NOT NULL,
    item_priority     INT(11) unsigned DEFAULT 0 NOT NULL,
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    subheader         VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    link              VARCHAR(255) DEFAULT '' NOT NULL,
    image1            INT(11) unsigned DEFAULT 0 NOT NULL,
    image2            INT(11) unsigned DEFAULT 0 NOT NULL,
    image3            INT(11) unsigned DEFAULT 0 NOT NULL,
    logo              INT(11) unsigned DEFAULT 0 NOT NULL,
    background_color  INT(11) unsigned DEFAULT 0 NOT NULL,
    item_date         VARCHAR(255) DEFAULT '',
    tags              INT(11) unsigned DEFAULT 0 NOT NULL,
    grey_overlay      TINYINT(4) DEFAULT 0 NOT NULL
);


CREATE TABLE tx_intbuilder_itemteaser_category_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);

CREATE TABLE tx_intbuilder_domain_model_irre_references (
    -- Connection to tt_content table
    parent_tt_content INT(11) unsigned DEFAULT 0 NOT NULL,

    -- Fields
    header            VARCHAR(255) DEFAULT '' NOT NULL,
    subheader         VARCHAR(255) DEFAULT '' NOT NULL,
    text              TEXT,
    link              VARCHAR(255) DEFAULT '' NOT NULL,
    image             INT(11) unsigned DEFAULT 0 NOT NULL,
    tags              INT(11) unsigned DEFAULT 0 NOT NULL,
    grey_overlay      TINYINT(4) DEFAULT 0 NOT NULL,
);


CREATE TABLE tx_intbuilder_reference_category_mm (
    uid_local       INT(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting         INT(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign INT(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    key             UIDLOCAL(uid_local),
    key             UIDFOREIGN(uid_foreign)
);