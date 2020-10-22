CREATE TABLE tx_simpleshop_domain_model_product (
    name varchar(255) DEFAULT '' NOT NULL,
    description text NOT NULL,
    images int(11) unsigned NOT NULL default '0',
    price float(7, 2) DEFAULT '0' NOT NULL
);