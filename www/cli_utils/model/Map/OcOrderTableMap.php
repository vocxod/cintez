<?php

namespace Map;

use \OcOrder;
use \OcOrderQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'oc_order' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcOrderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcOrderTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_order';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcOrder';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcOrder';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 61;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 61;

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'oc_order.order_id';

    /**
     * the column name for the invoice_no field
     */
    const COL_INVOICE_NO = 'oc_order.invoice_no';

    /**
     * the column name for the invoice_prefix field
     */
    const COL_INVOICE_PREFIX = 'oc_order.invoice_prefix';

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'oc_order.store_id';

    /**
     * the column name for the store_name field
     */
    const COL_STORE_NAME = 'oc_order.store_name';

    /**
     * the column name for the store_url field
     */
    const COL_STORE_URL = 'oc_order.store_url';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_order.customer_id';

    /**
     * the column name for the customer_group_id field
     */
    const COL_CUSTOMER_GROUP_ID = 'oc_order.customer_group_id';

    /**
     * the column name for the firstname field
     */
    const COL_FIRSTNAME = 'oc_order.firstname';

    /**
     * the column name for the lastname field
     */
    const COL_LASTNAME = 'oc_order.lastname';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'oc_order.email';

    /**
     * the column name for the telephone field
     */
    const COL_TELEPHONE = 'oc_order.telephone';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'oc_order.fax';

    /**
     * the column name for the custom_field field
     */
    const COL_CUSTOM_FIELD = 'oc_order.custom_field';

    /**
     * the column name for the payment_firstname field
     */
    const COL_PAYMENT_FIRSTNAME = 'oc_order.payment_firstname';

    /**
     * the column name for the payment_lastname field
     */
    const COL_PAYMENT_LASTNAME = 'oc_order.payment_lastname';

    /**
     * the column name for the payment_company field
     */
    const COL_PAYMENT_COMPANY = 'oc_order.payment_company';

    /**
     * the column name for the payment_address_1 field
     */
    const COL_PAYMENT_ADDRESS_1 = 'oc_order.payment_address_1';

    /**
     * the column name for the payment_address_2 field
     */
    const COL_PAYMENT_ADDRESS_2 = 'oc_order.payment_address_2';

    /**
     * the column name for the payment_city field
     */
    const COL_PAYMENT_CITY = 'oc_order.payment_city';

    /**
     * the column name for the payment_postcode field
     */
    const COL_PAYMENT_POSTCODE = 'oc_order.payment_postcode';

    /**
     * the column name for the payment_country field
     */
    const COL_PAYMENT_COUNTRY = 'oc_order.payment_country';

    /**
     * the column name for the payment_country_id field
     */
    const COL_PAYMENT_COUNTRY_ID = 'oc_order.payment_country_id';

    /**
     * the column name for the payment_zone field
     */
    const COL_PAYMENT_ZONE = 'oc_order.payment_zone';

    /**
     * the column name for the payment_zone_id field
     */
    const COL_PAYMENT_ZONE_ID = 'oc_order.payment_zone_id';

    /**
     * the column name for the payment_address_format field
     */
    const COL_PAYMENT_ADDRESS_FORMAT = 'oc_order.payment_address_format';

    /**
     * the column name for the payment_custom_field field
     */
    const COL_PAYMENT_CUSTOM_FIELD = 'oc_order.payment_custom_field';

    /**
     * the column name for the payment_method field
     */
    const COL_PAYMENT_METHOD = 'oc_order.payment_method';

    /**
     * the column name for the payment_code field
     */
    const COL_PAYMENT_CODE = 'oc_order.payment_code';

    /**
     * the column name for the shipping_firstname field
     */
    const COL_SHIPPING_FIRSTNAME = 'oc_order.shipping_firstname';

    /**
     * the column name for the shipping_lastname field
     */
    const COL_SHIPPING_LASTNAME = 'oc_order.shipping_lastname';

    /**
     * the column name for the shipping_company field
     */
    const COL_SHIPPING_COMPANY = 'oc_order.shipping_company';

    /**
     * the column name for the shipping_address_1 field
     */
    const COL_SHIPPING_ADDRESS_1 = 'oc_order.shipping_address_1';

    /**
     * the column name for the shipping_address_2 field
     */
    const COL_SHIPPING_ADDRESS_2 = 'oc_order.shipping_address_2';

    /**
     * the column name for the shipping_city field
     */
    const COL_SHIPPING_CITY = 'oc_order.shipping_city';

    /**
     * the column name for the shipping_postcode field
     */
    const COL_SHIPPING_POSTCODE = 'oc_order.shipping_postcode';

    /**
     * the column name for the shipping_country field
     */
    const COL_SHIPPING_COUNTRY = 'oc_order.shipping_country';

    /**
     * the column name for the shipping_country_id field
     */
    const COL_SHIPPING_COUNTRY_ID = 'oc_order.shipping_country_id';

    /**
     * the column name for the shipping_zone field
     */
    const COL_SHIPPING_ZONE = 'oc_order.shipping_zone';

    /**
     * the column name for the shipping_zone_id field
     */
    const COL_SHIPPING_ZONE_ID = 'oc_order.shipping_zone_id';

    /**
     * the column name for the shipping_address_format field
     */
    const COL_SHIPPING_ADDRESS_FORMAT = 'oc_order.shipping_address_format';

    /**
     * the column name for the shipping_custom_field field
     */
    const COL_SHIPPING_CUSTOM_FIELD = 'oc_order.shipping_custom_field';

    /**
     * the column name for the shipping_method field
     */
    const COL_SHIPPING_METHOD = 'oc_order.shipping_method';

    /**
     * the column name for the shipping_code field
     */
    const COL_SHIPPING_CODE = 'oc_order.shipping_code';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'oc_order.comment';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'oc_order.total';

    /**
     * the column name for the order_status_id field
     */
    const COL_ORDER_STATUS_ID = 'oc_order.order_status_id';

    /**
     * the column name for the affiliate_id field
     */
    const COL_AFFILIATE_ID = 'oc_order.affiliate_id';

    /**
     * the column name for the commission field
     */
    const COL_COMMISSION = 'oc_order.commission';

    /**
     * the column name for the marketing_id field
     */
    const COL_MARKETING_ID = 'oc_order.marketing_id';

    /**
     * the column name for the tracking field
     */
    const COL_TRACKING = 'oc_order.tracking';

    /**
     * the column name for the language_id field
     */
    const COL_LANGUAGE_ID = 'oc_order.language_id';

    /**
     * the column name for the currency_id field
     */
    const COL_CURRENCY_ID = 'oc_order.currency_id';

    /**
     * the column name for the currency_code field
     */
    const COL_CURRENCY_CODE = 'oc_order.currency_code';

    /**
     * the column name for the currency_value field
     */
    const COL_CURRENCY_VALUE = 'oc_order.currency_value';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'oc_order.ip';

    /**
     * the column name for the forwarded_ip field
     */
    const COL_FORWARDED_IP = 'oc_order.forwarded_ip';

    /**
     * the column name for the user_agent field
     */
    const COL_USER_AGENT = 'oc_order.user_agent';

    /**
     * the column name for the accept_language field
     */
    const COL_ACCEPT_LANGUAGE = 'oc_order.accept_language';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_order.date_added';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'oc_order.date_modified';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('OrderId', 'InvoiceNo', 'InvoicePrefix', 'StoreId', 'StoreName', 'StoreUrl', 'CustomerId', 'CustomerGroupId', 'Firstname', 'Lastname', 'Email', 'Telephone', 'Fax', 'CustomField', 'PaymentFirstname', 'PaymentLastname', 'PaymentCompany', 'PaymentAddress1', 'PaymentAddress2', 'PaymentCity', 'PaymentPostcode', 'PaymentCountry', 'PaymentCountryId', 'PaymentZone', 'PaymentZoneId', 'PaymentAddressFormat', 'PaymentCustomField', 'PaymentMethod', 'PaymentCode', 'ShippingFirstname', 'ShippingLastname', 'ShippingCompany', 'ShippingAddress1', 'ShippingAddress2', 'ShippingCity', 'ShippingPostcode', 'ShippingCountry', 'ShippingCountryId', 'ShippingZone', 'ShippingZoneId', 'ShippingAddressFormat', 'ShippingCustomField', 'ShippingMethod', 'ShippingCode', 'Comment', 'Total', 'OrderStatusId', 'AffiliateId', 'Commission', 'MarketingId', 'Tracking', 'LanguageId', 'CurrencyId', 'CurrencyCode', 'CurrencyValue', 'Ip', 'ForwardedIp', 'UserAgent', 'AcceptLanguage', 'DateAdded', 'DateModified', ),
        self::TYPE_CAMELNAME     => array('orderId', 'invoiceNo', 'invoicePrefix', 'storeId', 'storeName', 'storeUrl', 'customerId', 'customerGroupId', 'firstname', 'lastname', 'email', 'telephone', 'fax', 'customField', 'paymentFirstname', 'paymentLastname', 'paymentCompany', 'paymentAddress1', 'paymentAddress2', 'paymentCity', 'paymentPostcode', 'paymentCountry', 'paymentCountryId', 'paymentZone', 'paymentZoneId', 'paymentAddressFormat', 'paymentCustomField', 'paymentMethod', 'paymentCode', 'shippingFirstname', 'shippingLastname', 'shippingCompany', 'shippingAddress1', 'shippingAddress2', 'shippingCity', 'shippingPostcode', 'shippingCountry', 'shippingCountryId', 'shippingZone', 'shippingZoneId', 'shippingAddressFormat', 'shippingCustomField', 'shippingMethod', 'shippingCode', 'comment', 'total', 'orderStatusId', 'affiliateId', 'commission', 'marketingId', 'tracking', 'languageId', 'currencyId', 'currencyCode', 'currencyValue', 'ip', 'forwardedIp', 'userAgent', 'acceptLanguage', 'dateAdded', 'dateModified', ),
        self::TYPE_COLNAME       => array(OcOrderTableMap::COL_ORDER_ID, OcOrderTableMap::COL_INVOICE_NO, OcOrderTableMap::COL_INVOICE_PREFIX, OcOrderTableMap::COL_STORE_ID, OcOrderTableMap::COL_STORE_NAME, OcOrderTableMap::COL_STORE_URL, OcOrderTableMap::COL_CUSTOMER_ID, OcOrderTableMap::COL_CUSTOMER_GROUP_ID, OcOrderTableMap::COL_FIRSTNAME, OcOrderTableMap::COL_LASTNAME, OcOrderTableMap::COL_EMAIL, OcOrderTableMap::COL_TELEPHONE, OcOrderTableMap::COL_FAX, OcOrderTableMap::COL_CUSTOM_FIELD, OcOrderTableMap::COL_PAYMENT_FIRSTNAME, OcOrderTableMap::COL_PAYMENT_LASTNAME, OcOrderTableMap::COL_PAYMENT_COMPANY, OcOrderTableMap::COL_PAYMENT_ADDRESS_1, OcOrderTableMap::COL_PAYMENT_ADDRESS_2, OcOrderTableMap::COL_PAYMENT_CITY, OcOrderTableMap::COL_PAYMENT_POSTCODE, OcOrderTableMap::COL_PAYMENT_COUNTRY, OcOrderTableMap::COL_PAYMENT_COUNTRY_ID, OcOrderTableMap::COL_PAYMENT_ZONE, OcOrderTableMap::COL_PAYMENT_ZONE_ID, OcOrderTableMap::COL_PAYMENT_ADDRESS_FORMAT, OcOrderTableMap::COL_PAYMENT_CUSTOM_FIELD, OcOrderTableMap::COL_PAYMENT_METHOD, OcOrderTableMap::COL_PAYMENT_CODE, OcOrderTableMap::COL_SHIPPING_FIRSTNAME, OcOrderTableMap::COL_SHIPPING_LASTNAME, OcOrderTableMap::COL_SHIPPING_COMPANY, OcOrderTableMap::COL_SHIPPING_ADDRESS_1, OcOrderTableMap::COL_SHIPPING_ADDRESS_2, OcOrderTableMap::COL_SHIPPING_CITY, OcOrderTableMap::COL_SHIPPING_POSTCODE, OcOrderTableMap::COL_SHIPPING_COUNTRY, OcOrderTableMap::COL_SHIPPING_COUNTRY_ID, OcOrderTableMap::COL_SHIPPING_ZONE, OcOrderTableMap::COL_SHIPPING_ZONE_ID, OcOrderTableMap::COL_SHIPPING_ADDRESS_FORMAT, OcOrderTableMap::COL_SHIPPING_CUSTOM_FIELD, OcOrderTableMap::COL_SHIPPING_METHOD, OcOrderTableMap::COL_SHIPPING_CODE, OcOrderTableMap::COL_COMMENT, OcOrderTableMap::COL_TOTAL, OcOrderTableMap::COL_ORDER_STATUS_ID, OcOrderTableMap::COL_AFFILIATE_ID, OcOrderTableMap::COL_COMMISSION, OcOrderTableMap::COL_MARKETING_ID, OcOrderTableMap::COL_TRACKING, OcOrderTableMap::COL_LANGUAGE_ID, OcOrderTableMap::COL_CURRENCY_ID, OcOrderTableMap::COL_CURRENCY_CODE, OcOrderTableMap::COL_CURRENCY_VALUE, OcOrderTableMap::COL_IP, OcOrderTableMap::COL_FORWARDED_IP, OcOrderTableMap::COL_USER_AGENT, OcOrderTableMap::COL_ACCEPT_LANGUAGE, OcOrderTableMap::COL_DATE_ADDED, OcOrderTableMap::COL_DATE_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('order_id', 'invoice_no', 'invoice_prefix', 'store_id', 'store_name', 'store_url', 'customer_id', 'customer_group_id', 'firstname', 'lastname', 'email', 'telephone', 'fax', 'custom_field', 'payment_firstname', 'payment_lastname', 'payment_company', 'payment_address_1', 'payment_address_2', 'payment_city', 'payment_postcode', 'payment_country', 'payment_country_id', 'payment_zone', 'payment_zone_id', 'payment_address_format', 'payment_custom_field', 'payment_method', 'payment_code', 'shipping_firstname', 'shipping_lastname', 'shipping_company', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_postcode', 'shipping_country', 'shipping_country_id', 'shipping_zone', 'shipping_zone_id', 'shipping_address_format', 'shipping_custom_field', 'shipping_method', 'shipping_code', 'comment', 'total', 'order_status_id', 'affiliate_id', 'commission', 'marketing_id', 'tracking', 'language_id', 'currency_id', 'currency_code', 'currency_value', 'ip', 'forwarded_ip', 'user_agent', 'accept_language', 'date_added', 'date_modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('OrderId' => 0, 'InvoiceNo' => 1, 'InvoicePrefix' => 2, 'StoreId' => 3, 'StoreName' => 4, 'StoreUrl' => 5, 'CustomerId' => 6, 'CustomerGroupId' => 7, 'Firstname' => 8, 'Lastname' => 9, 'Email' => 10, 'Telephone' => 11, 'Fax' => 12, 'CustomField' => 13, 'PaymentFirstname' => 14, 'PaymentLastname' => 15, 'PaymentCompany' => 16, 'PaymentAddress1' => 17, 'PaymentAddress2' => 18, 'PaymentCity' => 19, 'PaymentPostcode' => 20, 'PaymentCountry' => 21, 'PaymentCountryId' => 22, 'PaymentZone' => 23, 'PaymentZoneId' => 24, 'PaymentAddressFormat' => 25, 'PaymentCustomField' => 26, 'PaymentMethod' => 27, 'PaymentCode' => 28, 'ShippingFirstname' => 29, 'ShippingLastname' => 30, 'ShippingCompany' => 31, 'ShippingAddress1' => 32, 'ShippingAddress2' => 33, 'ShippingCity' => 34, 'ShippingPostcode' => 35, 'ShippingCountry' => 36, 'ShippingCountryId' => 37, 'ShippingZone' => 38, 'ShippingZoneId' => 39, 'ShippingAddressFormat' => 40, 'ShippingCustomField' => 41, 'ShippingMethod' => 42, 'ShippingCode' => 43, 'Comment' => 44, 'Total' => 45, 'OrderStatusId' => 46, 'AffiliateId' => 47, 'Commission' => 48, 'MarketingId' => 49, 'Tracking' => 50, 'LanguageId' => 51, 'CurrencyId' => 52, 'CurrencyCode' => 53, 'CurrencyValue' => 54, 'Ip' => 55, 'ForwardedIp' => 56, 'UserAgent' => 57, 'AcceptLanguage' => 58, 'DateAdded' => 59, 'DateModified' => 60, ),
        self::TYPE_CAMELNAME     => array('orderId' => 0, 'invoiceNo' => 1, 'invoicePrefix' => 2, 'storeId' => 3, 'storeName' => 4, 'storeUrl' => 5, 'customerId' => 6, 'customerGroupId' => 7, 'firstname' => 8, 'lastname' => 9, 'email' => 10, 'telephone' => 11, 'fax' => 12, 'customField' => 13, 'paymentFirstname' => 14, 'paymentLastname' => 15, 'paymentCompany' => 16, 'paymentAddress1' => 17, 'paymentAddress2' => 18, 'paymentCity' => 19, 'paymentPostcode' => 20, 'paymentCountry' => 21, 'paymentCountryId' => 22, 'paymentZone' => 23, 'paymentZoneId' => 24, 'paymentAddressFormat' => 25, 'paymentCustomField' => 26, 'paymentMethod' => 27, 'paymentCode' => 28, 'shippingFirstname' => 29, 'shippingLastname' => 30, 'shippingCompany' => 31, 'shippingAddress1' => 32, 'shippingAddress2' => 33, 'shippingCity' => 34, 'shippingPostcode' => 35, 'shippingCountry' => 36, 'shippingCountryId' => 37, 'shippingZone' => 38, 'shippingZoneId' => 39, 'shippingAddressFormat' => 40, 'shippingCustomField' => 41, 'shippingMethod' => 42, 'shippingCode' => 43, 'comment' => 44, 'total' => 45, 'orderStatusId' => 46, 'affiliateId' => 47, 'commission' => 48, 'marketingId' => 49, 'tracking' => 50, 'languageId' => 51, 'currencyId' => 52, 'currencyCode' => 53, 'currencyValue' => 54, 'ip' => 55, 'forwardedIp' => 56, 'userAgent' => 57, 'acceptLanguage' => 58, 'dateAdded' => 59, 'dateModified' => 60, ),
        self::TYPE_COLNAME       => array(OcOrderTableMap::COL_ORDER_ID => 0, OcOrderTableMap::COL_INVOICE_NO => 1, OcOrderTableMap::COL_INVOICE_PREFIX => 2, OcOrderTableMap::COL_STORE_ID => 3, OcOrderTableMap::COL_STORE_NAME => 4, OcOrderTableMap::COL_STORE_URL => 5, OcOrderTableMap::COL_CUSTOMER_ID => 6, OcOrderTableMap::COL_CUSTOMER_GROUP_ID => 7, OcOrderTableMap::COL_FIRSTNAME => 8, OcOrderTableMap::COL_LASTNAME => 9, OcOrderTableMap::COL_EMAIL => 10, OcOrderTableMap::COL_TELEPHONE => 11, OcOrderTableMap::COL_FAX => 12, OcOrderTableMap::COL_CUSTOM_FIELD => 13, OcOrderTableMap::COL_PAYMENT_FIRSTNAME => 14, OcOrderTableMap::COL_PAYMENT_LASTNAME => 15, OcOrderTableMap::COL_PAYMENT_COMPANY => 16, OcOrderTableMap::COL_PAYMENT_ADDRESS_1 => 17, OcOrderTableMap::COL_PAYMENT_ADDRESS_2 => 18, OcOrderTableMap::COL_PAYMENT_CITY => 19, OcOrderTableMap::COL_PAYMENT_POSTCODE => 20, OcOrderTableMap::COL_PAYMENT_COUNTRY => 21, OcOrderTableMap::COL_PAYMENT_COUNTRY_ID => 22, OcOrderTableMap::COL_PAYMENT_ZONE => 23, OcOrderTableMap::COL_PAYMENT_ZONE_ID => 24, OcOrderTableMap::COL_PAYMENT_ADDRESS_FORMAT => 25, OcOrderTableMap::COL_PAYMENT_CUSTOM_FIELD => 26, OcOrderTableMap::COL_PAYMENT_METHOD => 27, OcOrderTableMap::COL_PAYMENT_CODE => 28, OcOrderTableMap::COL_SHIPPING_FIRSTNAME => 29, OcOrderTableMap::COL_SHIPPING_LASTNAME => 30, OcOrderTableMap::COL_SHIPPING_COMPANY => 31, OcOrderTableMap::COL_SHIPPING_ADDRESS_1 => 32, OcOrderTableMap::COL_SHIPPING_ADDRESS_2 => 33, OcOrderTableMap::COL_SHIPPING_CITY => 34, OcOrderTableMap::COL_SHIPPING_POSTCODE => 35, OcOrderTableMap::COL_SHIPPING_COUNTRY => 36, OcOrderTableMap::COL_SHIPPING_COUNTRY_ID => 37, OcOrderTableMap::COL_SHIPPING_ZONE => 38, OcOrderTableMap::COL_SHIPPING_ZONE_ID => 39, OcOrderTableMap::COL_SHIPPING_ADDRESS_FORMAT => 40, OcOrderTableMap::COL_SHIPPING_CUSTOM_FIELD => 41, OcOrderTableMap::COL_SHIPPING_METHOD => 42, OcOrderTableMap::COL_SHIPPING_CODE => 43, OcOrderTableMap::COL_COMMENT => 44, OcOrderTableMap::COL_TOTAL => 45, OcOrderTableMap::COL_ORDER_STATUS_ID => 46, OcOrderTableMap::COL_AFFILIATE_ID => 47, OcOrderTableMap::COL_COMMISSION => 48, OcOrderTableMap::COL_MARKETING_ID => 49, OcOrderTableMap::COL_TRACKING => 50, OcOrderTableMap::COL_LANGUAGE_ID => 51, OcOrderTableMap::COL_CURRENCY_ID => 52, OcOrderTableMap::COL_CURRENCY_CODE => 53, OcOrderTableMap::COL_CURRENCY_VALUE => 54, OcOrderTableMap::COL_IP => 55, OcOrderTableMap::COL_FORWARDED_IP => 56, OcOrderTableMap::COL_USER_AGENT => 57, OcOrderTableMap::COL_ACCEPT_LANGUAGE => 58, OcOrderTableMap::COL_DATE_ADDED => 59, OcOrderTableMap::COL_DATE_MODIFIED => 60, ),
        self::TYPE_FIELDNAME     => array('order_id' => 0, 'invoice_no' => 1, 'invoice_prefix' => 2, 'store_id' => 3, 'store_name' => 4, 'store_url' => 5, 'customer_id' => 6, 'customer_group_id' => 7, 'firstname' => 8, 'lastname' => 9, 'email' => 10, 'telephone' => 11, 'fax' => 12, 'custom_field' => 13, 'payment_firstname' => 14, 'payment_lastname' => 15, 'payment_company' => 16, 'payment_address_1' => 17, 'payment_address_2' => 18, 'payment_city' => 19, 'payment_postcode' => 20, 'payment_country' => 21, 'payment_country_id' => 22, 'payment_zone' => 23, 'payment_zone_id' => 24, 'payment_address_format' => 25, 'payment_custom_field' => 26, 'payment_method' => 27, 'payment_code' => 28, 'shipping_firstname' => 29, 'shipping_lastname' => 30, 'shipping_company' => 31, 'shipping_address_1' => 32, 'shipping_address_2' => 33, 'shipping_city' => 34, 'shipping_postcode' => 35, 'shipping_country' => 36, 'shipping_country_id' => 37, 'shipping_zone' => 38, 'shipping_zone_id' => 39, 'shipping_address_format' => 40, 'shipping_custom_field' => 41, 'shipping_method' => 42, 'shipping_code' => 43, 'comment' => 44, 'total' => 45, 'order_status_id' => 46, 'affiliate_id' => 47, 'commission' => 48, 'marketing_id' => 49, 'tracking' => 50, 'language_id' => 51, 'currency_id' => 52, 'currency_code' => 53, 'currency_value' => 54, 'ip' => 55, 'forwarded_ip' => 56, 'user_agent' => 57, 'accept_language' => 58, 'date_added' => 59, 'date_modified' => 60, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('oc_order');
        $this->setPhpName('OcOrder');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcOrder');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('invoice_no', 'InvoiceNo', 'INTEGER', true, null, 0);
        $this->addColumn('invoice_prefix', 'InvoicePrefix', 'VARCHAR', true, 26, null);
        $this->addColumn('store_id', 'StoreId', 'INTEGER', true, null, 0);
        $this->addColumn('store_name', 'StoreName', 'VARCHAR', true, 64, null);
        $this->addColumn('store_url', 'StoreUrl', 'VARCHAR', true, 255, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, 0);
        $this->addColumn('customer_group_id', 'CustomerGroupId', 'INTEGER', true, null, 0);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 96, null);
        $this->addColumn('telephone', 'Telephone', 'VARCHAR', true, 32, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', true, 32, null);
        $this->addColumn('custom_field', 'CustomField', 'LONGVARCHAR', true, null, null);
        $this->addColumn('payment_firstname', 'PaymentFirstname', 'VARCHAR', true, 32, null);
        $this->addColumn('payment_lastname', 'PaymentLastname', 'VARCHAR', true, 32, null);
        $this->addColumn('payment_company', 'PaymentCompany', 'VARCHAR', true, 60, null);
        $this->addColumn('payment_address_1', 'PaymentAddress1', 'VARCHAR', true, 128, null);
        $this->addColumn('payment_address_2', 'PaymentAddress2', 'VARCHAR', true, 128, null);
        $this->addColumn('payment_city', 'PaymentCity', 'VARCHAR', true, 128, null);
        $this->addColumn('payment_postcode', 'PaymentPostcode', 'VARCHAR', true, 10, null);
        $this->addColumn('payment_country', 'PaymentCountry', 'VARCHAR', true, 128, null);
        $this->addColumn('payment_country_id', 'PaymentCountryId', 'INTEGER', true, null, null);
        $this->addColumn('payment_zone', 'PaymentZone', 'VARCHAR', true, 128, null);
        $this->addColumn('payment_zone_id', 'PaymentZoneId', 'INTEGER', true, null, null);
        $this->addColumn('payment_address_format', 'PaymentAddressFormat', 'LONGVARCHAR', true, null, null);
        $this->addColumn('payment_custom_field', 'PaymentCustomField', 'LONGVARCHAR', true, null, null);
        $this->addColumn('payment_method', 'PaymentMethod', 'VARCHAR', true, 128, null);
        $this->addColumn('payment_code', 'PaymentCode', 'VARCHAR', true, 128, null);
        $this->addColumn('shipping_firstname', 'ShippingFirstname', 'VARCHAR', true, 32, null);
        $this->addColumn('shipping_lastname', 'ShippingLastname', 'VARCHAR', true, 32, null);
        $this->addColumn('shipping_company', 'ShippingCompany', 'VARCHAR', true, 40, null);
        $this->addColumn('shipping_address_1', 'ShippingAddress1', 'VARCHAR', true, 128, null);
        $this->addColumn('shipping_address_2', 'ShippingAddress2', 'VARCHAR', true, 128, null);
        $this->addColumn('shipping_city', 'ShippingCity', 'VARCHAR', true, 128, null);
        $this->addColumn('shipping_postcode', 'ShippingPostcode', 'VARCHAR', true, 10, null);
        $this->addColumn('shipping_country', 'ShippingCountry', 'VARCHAR', true, 128, null);
        $this->addColumn('shipping_country_id', 'ShippingCountryId', 'INTEGER', true, null, null);
        $this->addColumn('shipping_zone', 'ShippingZone', 'VARCHAR', true, 128, null);
        $this->addColumn('shipping_zone_id', 'ShippingZoneId', 'INTEGER', true, null, null);
        $this->addColumn('shipping_address_format', 'ShippingAddressFormat', 'LONGVARCHAR', true, null, null);
        $this->addColumn('shipping_custom_field', 'ShippingCustomField', 'LONGVARCHAR', true, null, null);
        $this->addColumn('shipping_method', 'ShippingMethod', 'VARCHAR', true, 128, null);
        $this->addColumn('shipping_code', 'ShippingCode', 'VARCHAR', true, 128, null);
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', true, null, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, 0);
        $this->addColumn('order_status_id', 'OrderStatusId', 'INTEGER', true, null, 0);
        $this->addColumn('affiliate_id', 'AffiliateId', 'INTEGER', true, null, null);
        $this->addColumn('commission', 'Commission', 'DECIMAL', true, 15, null);
        $this->addColumn('marketing_id', 'MarketingId', 'INTEGER', true, null, null);
        $this->addColumn('tracking', 'Tracking', 'VARCHAR', true, 64, null);
        $this->addColumn('language_id', 'LanguageId', 'INTEGER', true, null, null);
        $this->addColumn('currency_id', 'CurrencyId', 'INTEGER', true, null, null);
        $this->addColumn('currency_code', 'CurrencyCode', 'VARCHAR', true, 3, null);
        $this->addColumn('currency_value', 'CurrencyValue', 'DECIMAL', true, 15, 1);
        $this->addColumn('ip', 'Ip', 'VARCHAR', true, 40, null);
        $this->addColumn('forwarded_ip', 'ForwardedIp', 'VARCHAR', true, 40, null);
        $this->addColumn('user_agent', 'UserAgent', 'VARCHAR', true, 255, null);
        $this->addColumn('accept_language', 'AcceptLanguage', 'VARCHAR', true, 255, null);
        $this->addColumn('date_added', 'DateAdded', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? OcOrderTableMap::CLASS_DEFAULT : OcOrderTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (OcOrder object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcOrderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcOrderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcOrderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcOrderTableMap::OM_CLASS;
            /** @var OcOrder $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcOrderTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = OcOrderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcOrderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcOrder $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcOrderTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(OcOrderTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_INVOICE_NO);
            $criteria->addSelectColumn(OcOrderTableMap::COL_INVOICE_PREFIX);
            $criteria->addSelectColumn(OcOrderTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_STORE_NAME);
            $criteria->addSelectColumn(OcOrderTableMap::COL_STORE_URL);
            $criteria->addSelectColumn(OcOrderTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_CUSTOMER_GROUP_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(OcOrderTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(OcOrderTableMap::COL_EMAIL);
            $criteria->addSelectColumn(OcOrderTableMap::COL_TELEPHONE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_FAX);
            $criteria->addSelectColumn(OcOrderTableMap::COL_CUSTOM_FIELD);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_FIRSTNAME);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_LASTNAME);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_COMPANY);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_ADDRESS_1);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_ADDRESS_2);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_CITY);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_POSTCODE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_COUNTRY);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_COUNTRY_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_ZONE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_ZONE_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_ADDRESS_FORMAT);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_CUSTOM_FIELD);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_METHOD);
            $criteria->addSelectColumn(OcOrderTableMap::COL_PAYMENT_CODE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_FIRSTNAME);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_LASTNAME);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_COMPANY);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_ADDRESS_1);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_ADDRESS_2);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_CITY);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_POSTCODE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_COUNTRY);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_COUNTRY_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_ZONE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_ZONE_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_ADDRESS_FORMAT);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_CUSTOM_FIELD);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_METHOD);
            $criteria->addSelectColumn(OcOrderTableMap::COL_SHIPPING_CODE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_COMMENT);
            $criteria->addSelectColumn(OcOrderTableMap::COL_TOTAL);
            $criteria->addSelectColumn(OcOrderTableMap::COL_ORDER_STATUS_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_AFFILIATE_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_COMMISSION);
            $criteria->addSelectColumn(OcOrderTableMap::COL_MARKETING_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_TRACKING);
            $criteria->addSelectColumn(OcOrderTableMap::COL_LANGUAGE_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_CURRENCY_ID);
            $criteria->addSelectColumn(OcOrderTableMap::COL_CURRENCY_CODE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_CURRENCY_VALUE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_IP);
            $criteria->addSelectColumn(OcOrderTableMap::COL_FORWARDED_IP);
            $criteria->addSelectColumn(OcOrderTableMap::COL_USER_AGENT);
            $criteria->addSelectColumn(OcOrderTableMap::COL_ACCEPT_LANGUAGE);
            $criteria->addSelectColumn(OcOrderTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OcOrderTableMap::COL_DATE_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.invoice_no');
            $criteria->addSelectColumn($alias . '.invoice_prefix');
            $criteria->addSelectColumn($alias . '.store_id');
            $criteria->addSelectColumn($alias . '.store_name');
            $criteria->addSelectColumn($alias . '.store_url');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.customer_group_id');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.telephone');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.custom_field');
            $criteria->addSelectColumn($alias . '.payment_firstname');
            $criteria->addSelectColumn($alias . '.payment_lastname');
            $criteria->addSelectColumn($alias . '.payment_company');
            $criteria->addSelectColumn($alias . '.payment_address_1');
            $criteria->addSelectColumn($alias . '.payment_address_2');
            $criteria->addSelectColumn($alias . '.payment_city');
            $criteria->addSelectColumn($alias . '.payment_postcode');
            $criteria->addSelectColumn($alias . '.payment_country');
            $criteria->addSelectColumn($alias . '.payment_country_id');
            $criteria->addSelectColumn($alias . '.payment_zone');
            $criteria->addSelectColumn($alias . '.payment_zone_id');
            $criteria->addSelectColumn($alias . '.payment_address_format');
            $criteria->addSelectColumn($alias . '.payment_custom_field');
            $criteria->addSelectColumn($alias . '.payment_method');
            $criteria->addSelectColumn($alias . '.payment_code');
            $criteria->addSelectColumn($alias . '.shipping_firstname');
            $criteria->addSelectColumn($alias . '.shipping_lastname');
            $criteria->addSelectColumn($alias . '.shipping_company');
            $criteria->addSelectColumn($alias . '.shipping_address_1');
            $criteria->addSelectColumn($alias . '.shipping_address_2');
            $criteria->addSelectColumn($alias . '.shipping_city');
            $criteria->addSelectColumn($alias . '.shipping_postcode');
            $criteria->addSelectColumn($alias . '.shipping_country');
            $criteria->addSelectColumn($alias . '.shipping_country_id');
            $criteria->addSelectColumn($alias . '.shipping_zone');
            $criteria->addSelectColumn($alias . '.shipping_zone_id');
            $criteria->addSelectColumn($alias . '.shipping_address_format');
            $criteria->addSelectColumn($alias . '.shipping_custom_field');
            $criteria->addSelectColumn($alias . '.shipping_method');
            $criteria->addSelectColumn($alias . '.shipping_code');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.order_status_id');
            $criteria->addSelectColumn($alias . '.affiliate_id');
            $criteria->addSelectColumn($alias . '.commission');
            $criteria->addSelectColumn($alias . '.marketing_id');
            $criteria->addSelectColumn($alias . '.tracking');
            $criteria->addSelectColumn($alias . '.language_id');
            $criteria->addSelectColumn($alias . '.currency_id');
            $criteria->addSelectColumn($alias . '.currency_code');
            $criteria->addSelectColumn($alias . '.currency_value');
            $criteria->addSelectColumn($alias . '.ip');
            $criteria->addSelectColumn($alias . '.forwarded_ip');
            $criteria->addSelectColumn($alias . '.user_agent');
            $criteria->addSelectColumn($alias . '.accept_language');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.date_modified');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(OcOrderTableMap::DATABASE_NAME)->getTable(OcOrderTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcOrderTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcOrderTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcOrderTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcOrder or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcOrder object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcOrder) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcOrderTableMap::DATABASE_NAME);
            $criteria->add(OcOrderTableMap::COL_ORDER_ID, (array) $values, Criteria::IN);
        }

        $query = OcOrderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcOrderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcOrderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcOrderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcOrder or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcOrder object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcOrder object
        }

        if ($criteria->containsKey(OcOrderTableMap::COL_ORDER_ID) && $criteria->keyContainsValue(OcOrderTableMap::COL_ORDER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcOrderTableMap::COL_ORDER_ID.')');
        }


        // Set the correct dbName
        $query = OcOrderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcOrderTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcOrderTableMap::buildTableMap();
