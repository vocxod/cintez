
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- modx_site_content
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `modx_site_content`;

CREATE TABLE `modx_site_content`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(20) DEFAULT 'document' NOT NULL,
    `ontent_type` VARCHAR(50),
    `pagetitle` VARCHAR(255) DEFAULT '' NOT NULL,
    `longtitle` VARCHAR(255) DEFAULT '' NOT NULL,
    `description` VARCHAR(255) DEFAULT '' NOT NULL,
    `alias` VARCHAR(255) DEFAULT '',
    `link_attributes` VARCHAR(255) DEFAULT '' NOT NULL,
    `published` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `pub_date` INTEGER(20) DEFAULT 0 NOT NULL,
    `unpub_date` INTEGER(20) DEFAULT 0 NOT NULL,
    `parent` INTEGER(10) DEFAULT 0 NOT NULL,
    `isfolder` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `introtext` TEXT,
    `content` TEXT,
    `richtext` tinyint(1) unsigned DEFAULT 1 NOT NULL,
    `template` INTEGER(10) DEFAULT 0 NOT NULL,
    `menuindex` INTEGER(10) DEFAULT 0 NOT NULL,
    `searchable` tinyint(1) unsigned DEFAULT 1 NOT NULL,
    `cacheable` tinyint(1) unsigned DEFAULT 1 NOT NULL,
    `createdby` INTEGER(10) DEFAULT 0 NOT NULL,
    `createdon` INTEGER(20) DEFAULT 0 NOT NULL,
    `editedby` INTEGER(10) DEFAULT 0 NOT NULL,
    `editedon` INTEGER(20) DEFAULT 0 NOT NULL,
    `ddeleted` INTEGER,
    `deletedon` INTEGER(20) DEFAULT 0 NOT NULL,
    `deletedby` INTEGER(10) DEFAULT 0 NOT NULL,
    `publishedon` INTEGER(20) DEFAULT 0 NOT NULL,
    `publishedby` INTEGER(10) DEFAULT 0 NOT NULL,
    `menutitle` VARCHAR(255) DEFAULT '' NOT NULL,
    `donthit` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `privateweb` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `privatemgr` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `content_dispo` TINYINT(1) DEFAULT 0 NOT NULL,
    `hidemenu` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `class_key` VARCHAR(100) DEFAULT 'modDocument' NOT NULL,
    `context_key` VARCHAR(100) DEFAULT 'web' NOT NULL,
    `content_type` int(11) unsigned DEFAULT 1 NOT NULL,
    `uri` TEXT,
    `uri_override` TINYINT(1) DEFAULT 0 NOT NULL,
    `hide_children_in_tree` TINYINT(1) DEFAULT 0 NOT NULL,
    `show_in_tree` TINYINT(1) DEFAULT 1 NOT NULL,
    `properties` TEXT,
    PRIMARY KEY (`id`),
    INDEX `alias` (`alias`),
    INDEX `published` (`published`),
    INDEX `pub_date` (`pub_date`),
    INDEX `unpub_date` (`unpub_date`),
    INDEX `parent` (`parent`),
    INDEX `isfolder` (`isfolder`),
    INDEX `template` (`template`),
    INDEX `menuindex` (`menuindex`),
    INDEX `searchable` (`searchable`),
    INDEX `cacheable` (`cacheable`),
    INDEX `hidemenu` (`hidemenu`),
    INDEX `class_key` (`class_key`),
    INDEX `context_key` (`context_key`),
    INDEX `uri` (`uri`(333)),
    INDEX `uri_override` (`uri_override`),
    INDEX `hide_children_in_tree` (`hide_children_in_tree`),
    INDEX `show_in_tree` (`show_in_tree`),
    INDEX `cache_refresh_idx` (`parent`, `menuindex`, `id`),
    INDEX `content_ft_idx` (`pagetitle`, `longtitle`, `description`, `introtext`, `content`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- modx_site_tmplvar_contentvalues
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `modx_site_tmplvar_contentvalues`;

CREATE TABLE `modx_site_tmplvar_contentvalues`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `tmplvarid` INTEGER(10) DEFAULT 0 NOT NULL,
    `contentid` INTEGER(10) DEFAULT 0 NOT NULL,
    `value` TEXT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `tmplvarid` (`tmplvarid`),
    INDEX `contentid` (`contentid`),
    INDEX `tv_cnt` (`tmplvarid`, `contentid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_address
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_address`;

CREATE TABLE `oc_address`
(
    `address_id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_id` INTEGER NOT NULL,
    `firstname` VARCHAR(32) NOT NULL,
    `lastname` VARCHAR(32) NOT NULL,
    `company` VARCHAR(40) NOT NULL,
    `address_1` VARCHAR(128) NOT NULL,
    `address_2` VARCHAR(128) NOT NULL,
    `city` VARCHAR(128) NOT NULL,
    `postcode` VARCHAR(10) NOT NULL,
    `country_id` INTEGER DEFAULT 0 NOT NULL,
    `zone_id` INTEGER DEFAULT 0 NOT NULL,
    `custom_field` TEXT NOT NULL,
    PRIMARY KEY (`address_id`),
    INDEX `customer_id` (`customer_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_api
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_api`;

CREATE TABLE `oc_api`
(
    `api_id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(64) NOT NULL,
    `key` TEXT NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`api_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_api_ip
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_api_ip`;

CREATE TABLE `oc_api_ip`
(
    `api_ip_id` INTEGER NOT NULL AUTO_INCREMENT,
    `api_id` INTEGER NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    PRIMARY KEY (`api_ip_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_api_session
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_api_session`;

CREATE TABLE `oc_api_session`
(
    `api_session_id` INTEGER NOT NULL AUTO_INCREMENT,
    `api_id` INTEGER NOT NULL,
    `session_id` VARCHAR(32) NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`api_session_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_attribute
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_attribute`;

CREATE TABLE `oc_attribute`
(
    `attribute_id` INTEGER NOT NULL AUTO_INCREMENT,
    `attribute_group_id` INTEGER NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`attribute_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_attribute_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_attribute_description`;

CREATE TABLE `oc_attribute_description`
(
    `attribute_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`attribute_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_attribute_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_attribute_group`;

CREATE TABLE `oc_attribute_group`
(
    `attribute_group_id` INTEGER NOT NULL AUTO_INCREMENT,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`attribute_group_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_attribute_group_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_attribute_group_description`;

CREATE TABLE `oc_attribute_group_description`
(
    `attribute_group_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`attribute_group_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_banner
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_banner`;

CREATE TABLE `oc_banner`
(
    `banner_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_banner_image
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_banner_image`;

CREATE TABLE `oc_banner_image`
(
    `banner_image_id` INTEGER NOT NULL AUTO_INCREMENT,
    `banner_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `title` VARCHAR(64) NOT NULL,
    `link` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `sort_order` INTEGER(3) DEFAULT 0 NOT NULL,
    `description` TEXT,
    `background_color` VARCHAR(6),
    `effect_image` VARCHAR(255),
    `effect_title` VARCHAR(255),
    `effect_description` VARCHAR(255),
    PRIMARY KEY (`banner_image_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_cart
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_cart`;

CREATE TABLE `oc_cart`
(
    `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `api_id` INTEGER NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `session_id` VARCHAR(32) NOT NULL,
    `product_id` INTEGER NOT NULL,
    `recurring_id` INTEGER NOT NULL,
    `option` TEXT NOT NULL,
    `quantity` INTEGER(5) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`cart_id`),
    INDEX `cart_id` (`api_id`, `customer_id`, `session_id`, `product_id`, `recurring_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- oc_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_category`;

CREATE TABLE `oc_category`
(
    `category_id` INTEGER NOT NULL AUTO_INCREMENT,
    `image` VARCHAR(255),
    `parent_id` INTEGER DEFAULT 0 NOT NULL,
    `top` TINYINT(1) NOT NULL,
    `column` INTEGER DEFAULT 1,
    `sort_order` INTEGER(3) DEFAULT 0 NOT NULL,
    `status` INTEGER DEFAULT 0,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    `category_site_id` INTEGER,
    `css` VARCHAR(64) DEFAULT '0',
    PRIMARY KEY (`category_id`),
    INDEX `parent_id` (`parent_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_category_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_category_description`;

CREATE TABLE `oc_category_description`
(
    `category_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `meta_title` VARCHAR(255) NOT NULL,
    `meta_description` VARCHAR(255) NOT NULL,
    `meta_keyword` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`category_id`,`language_id`),
    INDEX `name` (`name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_category_filter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_category_filter`;

CREATE TABLE `oc_category_filter`
(
    `category_id` INTEGER NOT NULL,
    `filter_id` INTEGER NOT NULL,
    PRIMARY KEY (`category_id`,`filter_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_category_path
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_category_path`;

CREATE TABLE `oc_category_path`
(
    `category_id` INTEGER NOT NULL,
    `path_id` INTEGER NOT NULL,
    `level` INTEGER NOT NULL,
    PRIMARY KEY (`category_id`,`path_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_category_to_layout
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_category_to_layout`;

CREATE TABLE `oc_category_to_layout`
(
    `category_id` INTEGER NOT NULL,
    `store_id` INTEGER NOT NULL,
    `layout_id` INTEGER NOT NULL,
    PRIMARY KEY (`category_id`,`store_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_category_to_store
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_category_to_store`;

CREATE TABLE `oc_category_to_store`
(
    `category_id` INTEGER NOT NULL,
    `store_id` INTEGER NOT NULL,
    PRIMARY KEY (`category_id`,`store_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_country
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_country`;

CREATE TABLE `oc_country`
(
    `country_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    `iso_code_2` VARCHAR(2) NOT NULL,
    `iso_code_3` VARCHAR(3) NOT NULL,
    `address_format` TEXT NOT NULL,
    `postcode_required` TINYINT(1) NOT NULL,
    `status` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`country_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_coupon
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_coupon`;

CREATE TABLE `oc_coupon`
(
    `coupon_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    `code` VARCHAR(20) NOT NULL,
    `type` CHAR NOT NULL,
    `discount` DECIMAL(15,4) NOT NULL,
    `logged` TINYINT(1) NOT NULL,
    `shipping` TINYINT(1) NOT NULL,
    `total` DECIMAL(15,4) NOT NULL,
    `date_start` DATE DEFAULT '0000-00-00' NOT NULL,
    `date_end` DATE DEFAULT '0000-00-00' NOT NULL,
    `uses_total` INTEGER NOT NULL,
    `uses_customer` VARCHAR(11) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_coupon_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_coupon_category`;

CREATE TABLE `oc_coupon_category`
(
    `coupon_id` INTEGER NOT NULL,
    `category_id` INTEGER NOT NULL,
    PRIMARY KEY (`coupon_id`,`category_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_coupon_history
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_coupon_history`;

CREATE TABLE `oc_coupon_history`
(
    `coupon_history_id` INTEGER NOT NULL AUTO_INCREMENT,
    `coupon_id` INTEGER NOT NULL,
    `order_id` INTEGER NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `amount` DECIMAL(15,4) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`coupon_history_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_coupon_product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_coupon_product`;

CREATE TABLE `oc_coupon_product`
(
    `coupon_product_id` INTEGER NOT NULL AUTO_INCREMENT,
    `coupon_id` INTEGER NOT NULL,
    `product_id` INTEGER NOT NULL,
    PRIMARY KEY (`coupon_product_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_cron
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_cron`;

CREATE TABLE `oc_cron`
(
    `cron_id` INTEGER NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(64) NOT NULL,
    `cycle` VARCHAR(12) NOT NULL,
    `action` TEXT NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`cron_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_currency
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_currency`;

CREATE TABLE `oc_currency`
(
    `currency_id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(32) NOT NULL,
    `code` VARCHAR(3) NOT NULL,
    `symbol_left` VARCHAR(12) NOT NULL,
    `symbol_right` VARCHAR(12) NOT NULL,
    `decimal_place` CHAR NOT NULL,
    `value` DOUBLE(15,8) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date_modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`currency_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_custom_field
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_custom_field`;

CREATE TABLE `oc_custom_field`
(
    `custom_field_id` INTEGER NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(32) NOT NULL,
    `value` TEXT NOT NULL,
    `validation` VARCHAR(255) NOT NULL,
    `location` VARCHAR(10) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`custom_field_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_custom_field_customer_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_custom_field_customer_group`;

CREATE TABLE `oc_custom_field_customer_group`
(
    `custom_field_id` INTEGER NOT NULL,
    `customer_group_id` INTEGER NOT NULL,
    `required` TINYINT(1) NOT NULL,
    PRIMARY KEY (`custom_field_id`,`customer_group_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_custom_field_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_custom_field_description`;

CREATE TABLE `oc_custom_field_description`
(
    `custom_field_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`custom_field_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_custom_field_value
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_custom_field_value`;

CREATE TABLE `oc_custom_field_value`
(
    `custom_field_value_id` INTEGER NOT NULL AUTO_INCREMENT,
    `custom_field_id` INTEGER NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`custom_field_value_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_custom_field_value_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_custom_field_value_description`;

CREATE TABLE `oc_custom_field_value_description`
(
    `custom_field_value_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `custom_field_id` INTEGER NOT NULL,
    `name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`custom_field_value_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer`;

CREATE TABLE `oc_customer`
(
    `customer_id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_group_id` INTEGER NOT NULL,
    `store_id` INTEGER DEFAULT 0 NOT NULL,
    `language_id` INTEGER NOT NULL,
    `firstname` VARCHAR(32) NOT NULL,
    `lastname` VARCHAR(32) NOT NULL,
    `email` VARCHAR(96) NOT NULL,
    `telephone` VARCHAR(32) NOT NULL,
    `fax` VARCHAR(32) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `salt` VARCHAR(9) NOT NULL,
    `cart` TEXT,
    `wishlist` TEXT,
    `newsletter` TINYINT(1) DEFAULT 0 NOT NULL,
    `address_id` INTEGER DEFAULT 0 NOT NULL,
    `custom_field` TEXT NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `safe` TINYINT(1) NOT NULL,
    `token` TEXT NOT NULL,
    `code` VARCHAR(40) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_activity
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_activity`;

CREATE TABLE `oc_customer_activity`
(
    `customer_activity_id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_id` INTEGER NOT NULL,
    `key` VARCHAR(64) NOT NULL,
    `data` TEXT NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_activity_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_affiliate
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_affiliate`;

CREATE TABLE `oc_customer_affiliate`
(
    `customer_id` INTEGER NOT NULL,
    `company` VARCHAR(40) NOT NULL,
    `website` VARCHAR(255) NOT NULL,
    `tracking` VARCHAR(64) NOT NULL,
    `commission` DECIMAL(4,2) DEFAULT 0.00 NOT NULL,
    `tax` VARCHAR(64) NOT NULL,
    `payment` VARCHAR(6) NOT NULL,
    `cheque` VARCHAR(100) NOT NULL,
    `paypal` VARCHAR(64) NOT NULL,
    `bank_name` VARCHAR(64) NOT NULL,
    `bank_branch_number` VARCHAR(64) NOT NULL,
    `bank_swift_code` VARCHAR(64) NOT NULL,
    `bank_account_name` VARCHAR(64) NOT NULL,
    `bank_account_number` VARCHAR(64) NOT NULL,
    `custom_field` TEXT NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_approval
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_approval`;

CREATE TABLE `oc_customer_approval`
(
    `customer_approval_id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_id` INTEGER NOT NULL,
    `type` VARCHAR(9) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_approval_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_group`;

CREATE TABLE `oc_customer_group`
(
    `customer_group_id` INTEGER NOT NULL AUTO_INCREMENT,
    `approval` INTEGER(1) NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`customer_group_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_group_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_group_description`;

CREATE TABLE `oc_customer_group_description`
(
    `customer_group_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(32) NOT NULL,
    `description` TEXT NOT NULL,
    PRIMARY KEY (`customer_group_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_history
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_history`;

CREATE TABLE `oc_customer_history`
(
    `customer_history_id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_id` INTEGER NOT NULL,
    `comment` TEXT NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_history_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_ip
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_ip`;

CREATE TABLE `oc_customer_ip`
(
    `customer_ip_id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_id` INTEGER NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_ip_id`),
    INDEX `ip` (`ip`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_login
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_login`;

CREATE TABLE `oc_customer_login`
(
    `customer_login_id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(96) NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `total` INTEGER(4) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`customer_login_id`),
    INDEX `email` (`email`),
    INDEX `ip` (`ip`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_online
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_online`;

CREATE TABLE `oc_customer_online`
(
    `ip` VARCHAR(40) NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `url` TEXT NOT NULL,
    `referer` TEXT NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`ip`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_reward
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_reward`;

CREATE TABLE `oc_customer_reward`
(
    `customer_reward_id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_id` INTEGER DEFAULT 0 NOT NULL,
    `order_id` INTEGER DEFAULT 0 NOT NULL,
    `description` TEXT NOT NULL,
    `points` INTEGER(8) DEFAULT 0 NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_reward_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_search
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_search`;

CREATE TABLE `oc_customer_search`
(
    `customer_search_id` INTEGER NOT NULL AUTO_INCREMENT,
    `store_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `keyword` VARCHAR(255) NOT NULL,
    `category_id` INTEGER,
    `sub_category` TINYINT(1) NOT NULL,
    `description` TINYINT(1) NOT NULL,
    `products` INTEGER NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_search_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_transaction
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_transaction`;

CREATE TABLE `oc_customer_transaction`
(
    `customer_transaction_id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_id` INTEGER NOT NULL,
    `order_id` INTEGER NOT NULL,
    `description` TEXT NOT NULL,
    `amount` DECIMAL(15,4) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_transaction_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_customer_wishlist
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_customer_wishlist`;

CREATE TABLE `oc_customer_wishlist`
(
    `customer_id` INTEGER NOT NULL,
    `product_id` INTEGER NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`customer_id`,`product_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_download
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_download`;

CREATE TABLE `oc_download`
(
    `download_id` INTEGER NOT NULL AUTO_INCREMENT,
    `filename` VARCHAR(160) NOT NULL,
    `mask` VARCHAR(128) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`download_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_download_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_download_description`;

CREATE TABLE `oc_download_description`
(
    `download_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`download_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_event
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_event`;

CREATE TABLE `oc_event`
(
    `event_id` INTEGER NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(64) NOT NULL,
    `trigger` TEXT NOT NULL,
    `action` TEXT NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`event_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_extension
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_extension`;

CREATE TABLE `oc_extension`
(
    `extension_id` INTEGER NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(32) NOT NULL,
    `code` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`extension_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_extension_install
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_extension_install`;

CREATE TABLE `oc_extension_install`
(
    `extension_install_id` INTEGER NOT NULL AUTO_INCREMENT,
    `extension_id` INTEGER NOT NULL,
    `extension_download_id` INTEGER NOT NULL,
    `filename` VARCHAR(255) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`extension_install_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_extension_path
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_extension_path`;

CREATE TABLE `oc_extension_path`
(
    `extension_path_id` INTEGER NOT NULL AUTO_INCREMENT,
    `extension_install_id` INTEGER NOT NULL,
    `path` VARCHAR(255) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`extension_path_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_filter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_filter`;

CREATE TABLE `oc_filter`
(
    `filter_id` INTEGER NOT NULL AUTO_INCREMENT,
    `filter_group_id` INTEGER NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`filter_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_filter_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_filter_description`;

CREATE TABLE `oc_filter_description`
(
    `filter_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `filter_group_id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`filter_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_filter_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_filter_group`;

CREATE TABLE `oc_filter_group`
(
    `filter_group_id` INTEGER NOT NULL AUTO_INCREMENT,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`filter_group_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_filter_group_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_filter_group_description`;

CREATE TABLE `oc_filter_group_description`
(
    `filter_group_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`filter_group_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_geo_zone
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_geo_zone`;

CREATE TABLE `oc_geo_zone`
(
    `geo_zone_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`geo_zone_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_information
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_information`;

CREATE TABLE `oc_information`
(
    `information_id` INTEGER NOT NULL AUTO_INCREMENT,
    `bottom` INTEGER(1) DEFAULT 0 NOT NULL,
    `sort_order` INTEGER(3) DEFAULT 0 NOT NULL,
    `status` TINYINT(1) DEFAULT 1 NOT NULL,
    `isnews` INTEGER DEFAULT 0,
    `onhome` INTEGER DEFAULT 0,
    `artice_id` INTEGER DEFAULT 0,
    PRIMARY KEY (`information_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_information_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_information_description`;

CREATE TABLE `oc_information_description`
(
    `information_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `title` VARCHAR(255),
    `description` TEXT NOT NULL,
    `meta_title` VARCHAR(255) NOT NULL,
    `meta_description` VARCHAR(255) NOT NULL,
    `meta_keyword` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`information_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_information_to_layout
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_information_to_layout`;

CREATE TABLE `oc_information_to_layout`
(
    `information_id` INTEGER NOT NULL,
    `store_id` INTEGER NOT NULL,
    `layout_id` INTEGER NOT NULL,
    PRIMARY KEY (`information_id`,`store_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_information_to_store
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_information_to_store`;

CREATE TABLE `oc_information_to_store`
(
    `information_id` INTEGER NOT NULL,
    `store_id` INTEGER NOT NULL,
    PRIMARY KEY (`information_id`,`store_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_language
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_language`;

CREATE TABLE `oc_language`
(
    `language_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `code` VARCHAR(5) NOT NULL,
    `locale` VARCHAR(255) NOT NULL,
    `image` VARCHAR(64) NOT NULL,
    `directory` VARCHAR(32) NOT NULL,
    `sort_order` INTEGER(3) DEFAULT 0 NOT NULL,
    `status` TINYINT(1) NOT NULL,
    PRIMARY KEY (`language_id`),
    INDEX `name` (`name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_layout
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_layout`;

CREATE TABLE `oc_layout`
(
    `layout_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`layout_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_layout_module
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_layout_module`;

CREATE TABLE `oc_layout_module`
(
    `layout_module_id` INTEGER NOT NULL AUTO_INCREMENT,
    `layout_id` INTEGER NOT NULL,
    `code` VARCHAR(64) NOT NULL,
    `position` VARCHAR(14) NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`layout_module_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_layout_route
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_layout_route`;

CREATE TABLE `oc_layout_route`
(
    `layout_route_id` INTEGER NOT NULL AUTO_INCREMENT,
    `layout_id` INTEGER NOT NULL,
    `store_id` INTEGER NOT NULL,
    `route` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`layout_route_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_length_class
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_length_class`;

CREATE TABLE `oc_length_class`
(
    `length_class_id` INTEGER NOT NULL AUTO_INCREMENT,
    `value` DECIMAL(15,8) NOT NULL,
    PRIMARY KEY (`length_class_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_length_class_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_length_class_description`;

CREATE TABLE `oc_length_class_description`
(
    `length_class_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `title` VARCHAR(32) NOT NULL,
    `unit` VARCHAR(4) NOT NULL,
    PRIMARY KEY (`length_class_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_location
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_location`;

CREATE TABLE `oc_location`
(
    `location_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `address` TEXT NOT NULL,
    `telephone` VARCHAR(32) NOT NULL,
    `fax` VARCHAR(32) NOT NULL,
    `geocode` VARCHAR(32) NOT NULL,
    `image` VARCHAR(255),
    `open` TEXT NOT NULL,
    `comment` TEXT NOT NULL,
    PRIMARY KEY (`location_id`),
    INDEX `name` (`name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_manufacturer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_manufacturer`;

CREATE TABLE `oc_manufacturer`
(
    `manufacturer_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `image` VARCHAR(255),
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_manufacturer_to_store
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_manufacturer_to_store`;

CREATE TABLE `oc_manufacturer_to_store`
(
    `manufacturer_id` INTEGER NOT NULL,
    `store_id` INTEGER NOT NULL,
    PRIMARY KEY (`manufacturer_id`,`store_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_marketing
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_marketing`;

CREATE TABLE `oc_marketing`
(
    `marketing_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `description` TEXT NOT NULL,
    `code` VARCHAR(64) NOT NULL,
    `clicks` INTEGER(5) DEFAULT 0 NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`marketing_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_marketing_report
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_marketing_report`;

CREATE TABLE `oc_marketing_report`
(
    `marketing_history_id` INTEGER NOT NULL AUTO_INCREMENT,
    `marketing_id` INTEGER NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `country` VARCHAR(2) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`marketing_history_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_modification
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_modification`;

CREATE TABLE `oc_modification`
(
    `modification_id` INTEGER NOT NULL AUTO_INCREMENT,
    `extension_install_id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `code` VARCHAR(64) NOT NULL,
    `author` VARCHAR(64) NOT NULL,
    `version` VARCHAR(32) NOT NULL,
    `link` VARCHAR(255) NOT NULL,
    `xml` TEXT NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`modification_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_module
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_module`;

CREATE TABLE `oc_module`
(
    `module_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `code` VARCHAR(32) NOT NULL,
    `setting` TEXT NOT NULL,
    PRIMARY KEY (`module_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_option
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_option`;

CREATE TABLE `oc_option`
(
    `option_id` INTEGER NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(32) NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`option_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_option_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_option_description`;

CREATE TABLE `oc_option_description`
(
    `option_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`option_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_option_value
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_option_value`;

CREATE TABLE `oc_option_value`
(
    `option_value_id` INTEGER NOT NULL AUTO_INCREMENT,
    `option_id` INTEGER NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`option_value_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_option_value_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_option_value_description`;

CREATE TABLE `oc_option_value_description`
(
    `option_value_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `option_id` INTEGER NOT NULL,
    `name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`option_value_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order`;

CREATE TABLE `oc_order`
(
    `order_id` INTEGER NOT NULL AUTO_INCREMENT,
    `invoice_no` INTEGER DEFAULT 0 NOT NULL,
    `invoice_prefix` VARCHAR(26) NOT NULL,
    `store_id` INTEGER DEFAULT 0 NOT NULL,
    `store_name` VARCHAR(64) NOT NULL,
    `store_url` VARCHAR(255) NOT NULL,
    `customer_id` INTEGER DEFAULT 0 NOT NULL,
    `customer_group_id` INTEGER DEFAULT 0 NOT NULL,
    `firstname` VARCHAR(32) NOT NULL,
    `lastname` VARCHAR(32) NOT NULL,
    `email` VARCHAR(96) NOT NULL,
    `telephone` VARCHAR(32) NOT NULL,
    `fax` VARCHAR(32) NOT NULL,
    `custom_field` TEXT NOT NULL,
    `payment_firstname` VARCHAR(32) NOT NULL,
    `payment_lastname` VARCHAR(32) NOT NULL,
    `payment_company` VARCHAR(60) NOT NULL,
    `payment_address_1` VARCHAR(128) NOT NULL,
    `payment_address_2` VARCHAR(128) NOT NULL,
    `payment_city` VARCHAR(128) NOT NULL,
    `payment_postcode` VARCHAR(10) NOT NULL,
    `payment_country` VARCHAR(128) NOT NULL,
    `payment_country_id` INTEGER NOT NULL,
    `payment_zone` VARCHAR(128) NOT NULL,
    `payment_zone_id` INTEGER NOT NULL,
    `payment_address_format` TEXT NOT NULL,
    `payment_custom_field` TEXT NOT NULL,
    `payment_method` VARCHAR(128) NOT NULL,
    `payment_code` VARCHAR(128) NOT NULL,
    `shipping_firstname` VARCHAR(32) NOT NULL,
    `shipping_lastname` VARCHAR(32) NOT NULL,
    `shipping_company` VARCHAR(40) NOT NULL,
    `shipping_address_1` VARCHAR(128) NOT NULL,
    `shipping_address_2` VARCHAR(128) NOT NULL,
    `shipping_city` VARCHAR(128) NOT NULL,
    `shipping_postcode` VARCHAR(10) NOT NULL,
    `shipping_country` VARCHAR(128) NOT NULL,
    `shipping_country_id` INTEGER NOT NULL,
    `shipping_zone` VARCHAR(128) NOT NULL,
    `shipping_zone_id` INTEGER NOT NULL,
    `shipping_address_format` TEXT NOT NULL,
    `shipping_custom_field` TEXT NOT NULL,
    `shipping_method` VARCHAR(128) NOT NULL,
    `shipping_code` VARCHAR(128) NOT NULL,
    `comment` TEXT NOT NULL,
    `total` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `order_status_id` INTEGER DEFAULT 0 NOT NULL,
    `affiliate_id` INTEGER NOT NULL,
    `commission` DECIMAL(15,4) NOT NULL,
    `marketing_id` INTEGER NOT NULL,
    `tracking` VARCHAR(64) NOT NULL,
    `language_id` INTEGER NOT NULL,
    `currency_id` INTEGER NOT NULL,
    `currency_code` VARCHAR(3) NOT NULL,
    `currency_value` DECIMAL(15,8) DEFAULT 1.00000000 NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `forwarded_ip` VARCHAR(40) NOT NULL,
    `user_agent` VARCHAR(255) NOT NULL,
    `accept_language` VARCHAR(255) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`order_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_history
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_history`;

CREATE TABLE `oc_order_history`
(
    `order_history_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `order_status_id` INTEGER NOT NULL,
    `notify` TINYINT(1) DEFAULT 0 NOT NULL,
    `comment` TEXT NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`order_history_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_option
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_option`;

CREATE TABLE `oc_order_option`
(
    `order_option_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `order_product_id` INTEGER NOT NULL,
    `product_option_id` INTEGER NOT NULL,
    `product_option_value_id` INTEGER DEFAULT 0 NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `value` TEXT NOT NULL,
    `type` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`order_option_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_product`;

CREATE TABLE `oc_order_product`
(
    `order_product_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `product_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `model` VARCHAR(64) NOT NULL,
    `quantity` INTEGER(4) NOT NULL,
    `price` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `total` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `tax` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `reward` INTEGER(8) NOT NULL,
    PRIMARY KEY (`order_product_id`),
    INDEX `order_id` (`order_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_recurring
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_recurring`;

CREATE TABLE `oc_order_recurring`
(
    `order_recurring_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `reference` VARCHAR(255) NOT NULL,
    `product_id` INTEGER NOT NULL,
    `product_name` VARCHAR(255) NOT NULL,
    `product_quantity` INTEGER NOT NULL,
    `recurring_id` INTEGER NOT NULL,
    `recurring_name` VARCHAR(255) NOT NULL,
    `recurring_description` VARCHAR(255) NOT NULL,
    `recurring_frequency` VARCHAR(25) NOT NULL,
    `recurring_cycle` SMALLINT NOT NULL,
    `recurring_duration` SMALLINT NOT NULL,
    `recurring_price` DECIMAL(10,4) NOT NULL,
    `trial` TINYINT(1) NOT NULL,
    `trial_frequency` VARCHAR(25) NOT NULL,
    `trial_cycle` SMALLINT NOT NULL,
    `trial_duration` SMALLINT NOT NULL,
    `trial_price` DECIMAL(10,4) NOT NULL,
    `status` TINYINT NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`order_recurring_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_recurring_transaction
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_recurring_transaction`;

CREATE TABLE `oc_order_recurring_transaction`
(
    `order_recurring_transaction_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_recurring_id` INTEGER NOT NULL,
    `reference` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `amount` DECIMAL(10,4) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`order_recurring_transaction_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_shipment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_shipment`;

CREATE TABLE `oc_order_shipment`
(
    `order_shipment_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `shipping_courier_id` VARCHAR(255) DEFAULT '' NOT NULL,
    `tracking_number` VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (`order_shipment_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_status`;

CREATE TABLE `oc_order_status`
(
    `order_status_id` INTEGER NOT NULL AUTO_INCREMENT,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`order_status_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_total
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_total`;

CREATE TABLE `oc_order_total`
(
    `order_total_id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `code` VARCHAR(32) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `value` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `sort_order` INTEGER(3) NOT NULL,
    PRIMARY KEY (`order_total_id`),
    INDEX `order_id` (`order_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_order_voucher
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_order_voucher`;

CREATE TABLE `oc_order_voucher`
(
    `order_voucher_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `voucher_id` INTEGER NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `code` VARCHAR(10) NOT NULL,
    `from_name` VARCHAR(64) NOT NULL,
    `from_email` VARCHAR(96) NOT NULL,
    `to_name` VARCHAR(64) NOT NULL,
    `to_email` VARCHAR(96) NOT NULL,
    `voucher_theme_id` INTEGER NOT NULL,
    `message` TEXT NOT NULL,
    `amount` DECIMAL(15,4) NOT NULL,
    PRIMARY KEY (`order_voucher_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product`;

CREATE TABLE `oc_product`
(
    `product_id` INTEGER NOT NULL AUTO_INCREMENT,
    `model` VARCHAR(64) NOT NULL,
    `sku` VARCHAR(64) NOT NULL,
    `upc` VARCHAR(12) NOT NULL,
    `ean` VARCHAR(14) NOT NULL,
    `jan` VARCHAR(13) NOT NULL,
    `isbn` VARCHAR(17) NOT NULL,
    `mpn` VARCHAR(64) NOT NULL,
    `location` VARCHAR(128) NOT NULL,
    `quantity` INTEGER(4) DEFAULT 0 NOT NULL,
    `stock_status_id` INTEGER NOT NULL,
    `image` VARCHAR(255),
    `manufacturer_id` INTEGER NOT NULL,
    `shipping` TINYINT(1) DEFAULT 1 NOT NULL,
    `price` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `points` INTEGER(8) DEFAULT 0 NOT NULL,
    `tax_class_id` INTEGER NOT NULL,
    `date_available` DATE DEFAULT '0000-00-00' NOT NULL,
    `weight` DECIMAL(15,8) DEFAULT 0.00000000 NOT NULL,
    `weight_class_id` INTEGER DEFAULT 0 NOT NULL,
    `length` DECIMAL(15,8) DEFAULT 0.00000000 NOT NULL,
    `width` DECIMAL(15,8) DEFAULT 0.00000000 NOT NULL,
    `height` DECIMAL(15,8) DEFAULT 0.00000000 NOT NULL,
    `length_class_id` INTEGER DEFAULT 0 NOT NULL,
    `subtract` TINYINT(1) DEFAULT 1 NOT NULL,
    `minimum` INTEGER DEFAULT 1 NOT NULL,
    `sort_order` INTEGER DEFAULT 0 NOT NULL,
    `status` TINYINT(1) DEFAULT 0 NOT NULL,
    `viewed` INTEGER(5) DEFAULT 0 NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    `status2` INTEGER DEFAULT 0,
    PRIMARY KEY (`product_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_attribute
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_attribute`;

CREATE TABLE `oc_product_attribute`
(
    `product_id` INTEGER NOT NULL,
    `attribute_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `text` TEXT NOT NULL,
    PRIMARY KEY (`product_id`,`attribute_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_description`;

CREATE TABLE `oc_product_description`
(
    `product_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `tag` TEXT NOT NULL,
    `meta_title` VARCHAR(255) NOT NULL,
    `meta_description` VARCHAR(255) NOT NULL,
    `meta_keyword` VARCHAR(255) NOT NULL,
    `newslatest` TEXT,
    `show_newslatest` INTEGER,
    PRIMARY KEY (`product_id`,`language_id`),
    INDEX `name` (`name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_discount
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_discount`;

CREATE TABLE `oc_product_discount`
(
    `product_discount_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER NOT NULL,
    `customer_group_id` INTEGER NOT NULL,
    `quantity` INTEGER(4) DEFAULT 0 NOT NULL,
    `priority` INTEGER(5) DEFAULT 1 NOT NULL,
    `price` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `date_start` DATE DEFAULT '0000-00-00' NOT NULL,
    `date_end` DATE DEFAULT '0000-00-00' NOT NULL,
    PRIMARY KEY (`product_discount_id`),
    INDEX `product_id` (`product_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_filter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_filter`;

CREATE TABLE `oc_product_filter`
(
    `product_id` INTEGER NOT NULL,
    `filter_id` INTEGER NOT NULL,
    `liked` INTEGER DEFAULT 0,
    PRIMARY KEY (`product_id`,`filter_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_image
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_image`;

CREATE TABLE `oc_product_image`
(
    `product_image_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER NOT NULL,
    `image` VARCHAR(255),
    `sort_order` INTEGER(3) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`product_image_id`),
    INDEX `product_id` (`product_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_option
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_option`;

CREATE TABLE `oc_product_option`
(
    `product_option_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER NOT NULL,
    `option_id` INTEGER NOT NULL,
    `value` TEXT NOT NULL,
    `required` TINYINT(1) NOT NULL,
    PRIMARY KEY (`product_option_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_option_value
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_option_value`;

CREATE TABLE `oc_product_option_value`
(
    `product_option_value_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_option_id` INTEGER NOT NULL,
    `product_id` INTEGER NOT NULL,
    `option_id` INTEGER NOT NULL,
    `option_value_id` INTEGER NOT NULL,
    `quantity` INTEGER(3) NOT NULL,
    `subtract` TINYINT(1) NOT NULL,
    `price` DECIMAL(15,4) NOT NULL,
    `price_prefix` VARCHAR(1) NOT NULL,
    `points` INTEGER(8) NOT NULL,
    `points_prefix` VARCHAR(1) NOT NULL,
    `weight` DECIMAL(15,8) NOT NULL,
    `weight_prefix` VARCHAR(1) NOT NULL,
    PRIMARY KEY (`product_option_value_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_recurring
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_recurring`;

CREATE TABLE `oc_product_recurring`
(
    `product_id` INTEGER NOT NULL,
    `recurring_id` INTEGER NOT NULL,
    `customer_group_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`,`recurring_id`,`customer_group_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_related
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_related`;

CREATE TABLE `oc_product_related`
(
    `product_id` INTEGER NOT NULL,
    `related_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`,`related_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_reward
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_reward`;

CREATE TABLE `oc_product_reward`
(
    `product_reward_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER DEFAULT 0 NOT NULL,
    `customer_group_id` INTEGER DEFAULT 0 NOT NULL,
    `points` INTEGER(8) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`product_reward_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_special
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_special`;

CREATE TABLE `oc_product_special`
(
    `product_special_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER NOT NULL,
    `customer_group_id` INTEGER NOT NULL,
    `priority` INTEGER(5) DEFAULT 1 NOT NULL,
    `price` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `date_start` DATE DEFAULT '0000-00-00' NOT NULL,
    `date_end` DATE DEFAULT '0000-00-00' NOT NULL,
    PRIMARY KEY (`product_special_id`),
    INDEX `product_id` (`product_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_to_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_to_category`;

CREATE TABLE `oc_product_to_category`
(
    `product_id` INTEGER NOT NULL,
    `category_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`,`category_id`),
    INDEX `category_id` (`category_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_to_download
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_to_download`;

CREATE TABLE `oc_product_to_download`
(
    `product_id` INTEGER NOT NULL,
    `download_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`,`download_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_to_layout
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_to_layout`;

CREATE TABLE `oc_product_to_layout`
(
    `product_id` INTEGER NOT NULL,
    `store_id` INTEGER NOT NULL,
    `layout_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`,`store_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_product_to_store
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_product_to_store`;

CREATE TABLE `oc_product_to_store`
(
    `product_id` INTEGER NOT NULL,
    `store_id` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`product_id`,`store_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_recurring
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_recurring`;

CREATE TABLE `oc_recurring`
(
    `recurring_id` INTEGER NOT NULL AUTO_INCREMENT,
    `price` DECIMAL(10,4) NOT NULL,
    `frequency` enum('day','week','semi_month','month','year') NOT NULL,
    `duration` int(10) unsigned NOT NULL,
    `cycle` int(10) unsigned NOT NULL,
    `trial_status` TINYINT NOT NULL,
    `trial_price` DECIMAL(10,4) NOT NULL,
    `trial_frequency` enum('day','week','semi_month','month','year') NOT NULL,
    `trial_duration` int(10) unsigned NOT NULL,
    `trial_cycle` int(10) unsigned NOT NULL,
    `status` TINYINT NOT NULL,
    `sort_order` INTEGER NOT NULL,
    PRIMARY KEY (`recurring_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_recurring_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_recurring_description`;

CREATE TABLE `oc_recurring_description`
(
    `recurring_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`recurring_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_return
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_return`;

CREATE TABLE `oc_return`
(
    `return_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `product_id` INTEGER NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `firstname` VARCHAR(32) NOT NULL,
    `lastname` VARCHAR(32) NOT NULL,
    `email` VARCHAR(96) NOT NULL,
    `telephone` VARCHAR(32) NOT NULL,
    `product` VARCHAR(255) NOT NULL,
    `model` VARCHAR(64) NOT NULL,
    `quantity` INTEGER(4) NOT NULL,
    `opened` TINYINT(1) NOT NULL,
    `return_reason_id` INTEGER NOT NULL,
    `return_action_id` INTEGER NOT NULL,
    `return_status_id` INTEGER NOT NULL,
    `comment` TEXT,
    `date_ordered` DATE DEFAULT '0000-00-00' NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`return_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_return_action
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_return_action`;

CREATE TABLE `oc_return_action`
(
    `return_action_id` INTEGER NOT NULL AUTO_INCREMENT,
    `language_id` INTEGER DEFAULT 0 NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`return_action_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_return_history
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_return_history`;

CREATE TABLE `oc_return_history`
(
    `return_history_id` INTEGER NOT NULL AUTO_INCREMENT,
    `return_id` INTEGER NOT NULL,
    `return_status_id` INTEGER NOT NULL,
    `notify` TINYINT(1) NOT NULL,
    `comment` TEXT NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`return_history_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_return_reason
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_return_reason`;

CREATE TABLE `oc_return_reason`
(
    `return_reason_id` INTEGER NOT NULL AUTO_INCREMENT,
    `language_id` INTEGER DEFAULT 0 NOT NULL,
    `name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`return_reason_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_return_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_return_status`;

CREATE TABLE `oc_return_status`
(
    `return_status_id` INTEGER NOT NULL AUTO_INCREMENT,
    `language_id` INTEGER DEFAULT 0 NOT NULL,
    `name` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`return_status_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_review
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_review`;

CREATE TABLE `oc_review`
(
    `review_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `author` VARCHAR(64) NOT NULL,
    `text` TEXT NOT NULL,
    `rating` INTEGER(1) NOT NULL,
    `status` TINYINT(1) DEFAULT 0 NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`review_id`),
    INDEX `product_id` (`product_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_seo_url
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_seo_url`;

CREATE TABLE `oc_seo_url`
(
    `seo_url_id` INTEGER NOT NULL AUTO_INCREMENT,
    `store_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `query` VARCHAR(255) NOT NULL,
    `keyword` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`seo_url_id`),
    INDEX `query` (`query`),
    INDEX `keyword` (`keyword`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_session
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_session`;

CREATE TABLE `oc_session`
(
    `session_id` VARCHAR(32) NOT NULL,
    `data` TEXT NOT NULL,
    `expire` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`session_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- oc_setting
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_setting`;

CREATE TABLE `oc_setting`
(
    `setting_id` INTEGER NOT NULL AUTO_INCREMENT,
    `store_id` INTEGER DEFAULT 0 NOT NULL,
    `code` VARCHAR(128) NOT NULL,
    `key` VARCHAR(128) NOT NULL,
    `value` TEXT NOT NULL,
    `serialized` TINYINT(1) NOT NULL,
    PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_shipping_courier
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_shipping_courier`;

CREATE TABLE `oc_shipping_courier`
(
    `shipping_courier_id` INTEGER NOT NULL,
    `shipping_courier_code` VARCHAR(255) DEFAULT '' NOT NULL,
    `shipping_courier_name` VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (`shipping_courier_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_statistics
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_statistics`;

CREATE TABLE `oc_statistics`
(
    `statistics_id` INTEGER NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(64) NOT NULL,
    `value` DECIMAL(15,4) NOT NULL,
    PRIMARY KEY (`statistics_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_stock_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_stock_status`;

CREATE TABLE `oc_stock_status`
(
    `stock_status_id` INTEGER NOT NULL AUTO_INCREMENT,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`stock_status_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_store
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_store`;

CREATE TABLE `oc_store`
(
    `store_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `ssl` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`store_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_tax_class
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_tax_class`;

CREATE TABLE `oc_tax_class`
(
    `tax_class_id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(32) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`tax_class_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_tax_rate
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_tax_rate`;

CREATE TABLE `oc_tax_rate`
(
    `tax_rate_id` INTEGER NOT NULL AUTO_INCREMENT,
    `geo_zone_id` INTEGER DEFAULT 0 NOT NULL,
    `name` VARCHAR(32) NOT NULL,
    `rate` DECIMAL(15,4) DEFAULT 0.0000 NOT NULL,
    `type` CHAR NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`tax_rate_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_tax_rate_to_customer_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_tax_rate_to_customer_group`;

CREATE TABLE `oc_tax_rate_to_customer_group`
(
    `tax_rate_id` INTEGER NOT NULL,
    `customer_group_id` INTEGER NOT NULL,
    PRIMARY KEY (`tax_rate_id`,`customer_group_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_tax_rule
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_tax_rule`;

CREATE TABLE `oc_tax_rule`
(
    `tax_rule_id` INTEGER NOT NULL AUTO_INCREMENT,
    `tax_class_id` INTEGER NOT NULL,
    `tax_rate_id` INTEGER NOT NULL,
    `based` VARCHAR(10) NOT NULL,
    `priority` INTEGER(5) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`tax_rule_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_theme
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_theme`;

CREATE TABLE `oc_theme`
(
    `theme_id` INTEGER NOT NULL AUTO_INCREMENT,
    `store_id` INTEGER NOT NULL,
    `theme` VARCHAR(64) NOT NULL,
    `route` VARCHAR(64) NOT NULL,
    `code` TEXT NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`theme_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_translation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_translation`;

CREATE TABLE `oc_translation`
(
    `translation_id` INTEGER NOT NULL AUTO_INCREMENT,
    `store_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `route` VARCHAR(64) NOT NULL,
    `key` VARCHAR(64) NOT NULL,
    `value` TEXT NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`translation_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_upload
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_upload`;

CREATE TABLE `oc_upload`
(
    `upload_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `filename` VARCHAR(255) NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`upload_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_user`;

CREATE TABLE `oc_user`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_group_id` INTEGER NOT NULL,
    `username` VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `salt` VARCHAR(9) NOT NULL,
    `firstname` VARCHAR(32) NOT NULL,
    `lastname` VARCHAR(32) NOT NULL,
    `email` VARCHAR(96) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `code` VARCHAR(40) NOT NULL,
    `ip` VARCHAR(40) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_user_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_user_group`;

CREATE TABLE `oc_user_group`
(
    `user_group_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `permission` TEXT NOT NULL,
    PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_voucher
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_voucher`;

CREATE TABLE `oc_voucher`
(
    `voucher_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `code` VARCHAR(10) NOT NULL,
    `from_name` VARCHAR(64) NOT NULL,
    `from_email` VARCHAR(96) NOT NULL,
    `to_name` VARCHAR(64) NOT NULL,
    `to_email` VARCHAR(96) NOT NULL,
    `voucher_theme_id` INTEGER NOT NULL,
    `message` TEXT NOT NULL,
    `amount` DECIMAL(15,4) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`voucher_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_voucher_history
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_voucher_history`;

CREATE TABLE `oc_voucher_history`
(
    `voucher_history_id` INTEGER NOT NULL AUTO_INCREMENT,
    `voucher_id` INTEGER NOT NULL,
    `order_id` INTEGER NOT NULL,
    `amount` DECIMAL(15,4) NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`voucher_history_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_voucher_theme
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_voucher_theme`;

CREATE TABLE `oc_voucher_theme`
(
    `voucher_theme_id` INTEGER NOT NULL AUTO_INCREMENT,
    `image` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`voucher_theme_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_voucher_theme_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_voucher_theme_description`;

CREATE TABLE `oc_voucher_theme_description`
(
    `voucher_theme_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `name` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`voucher_theme_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_weight_class
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_weight_class`;

CREATE TABLE `oc_weight_class`
(
    `weight_class_id` INTEGER NOT NULL AUTO_INCREMENT,
    `value` DECIMAL(15,8) DEFAULT 0.00000000 NOT NULL,
    PRIMARY KEY (`weight_class_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_weight_class_description
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_weight_class_description`;

CREATE TABLE `oc_weight_class_description`
(
    `weight_class_id` INTEGER NOT NULL,
    `language_id` INTEGER NOT NULL,
    `title` VARCHAR(32) NOT NULL,
    `unit` VARCHAR(4) NOT NULL,
    PRIMARY KEY (`weight_class_id`,`language_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_zone
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_zone`;

CREATE TABLE `oc_zone`
(
    `zone_id` INTEGER NOT NULL AUTO_INCREMENT,
    `country_id` INTEGER NOT NULL,
    `name` VARCHAR(128) NOT NULL,
    `code` VARCHAR(32) NOT NULL,
    `status` TINYINT(1) DEFAULT 1 NOT NULL,
    `sort_order` INTEGER DEFAULT 0,
    PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- oc_zone_to_geo_zone
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `oc_zone_to_geo_zone`;

CREATE TABLE `oc_zone_to_geo_zone`
(
    `zone_to_geo_zone_id` INTEGER NOT NULL AUTO_INCREMENT,
    `country_id` INTEGER NOT NULL,
    `zone_id` INTEGER DEFAULT 0 NOT NULL,
    `geo_zone_id` INTEGER NOT NULL,
    `date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`zone_to_geo_zone_id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
