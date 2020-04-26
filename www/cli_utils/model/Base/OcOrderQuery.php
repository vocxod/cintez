<?php

namespace Base;

use \OcOrder as ChildOcOrder;
use \OcOrderQuery as ChildOcOrderQuery;
use \Exception;
use \PDO;
use Map\OcOrderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_order' table.
 *
 *
 *
 * @method     ChildOcOrderQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcOrderQuery orderByInvoiceNo($order = Criteria::ASC) Order by the invoice_no column
 * @method     ChildOcOrderQuery orderByInvoicePrefix($order = Criteria::ASC) Order by the invoice_prefix column
 * @method     ChildOcOrderQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildOcOrderQuery orderByStoreName($order = Criteria::ASC) Order by the store_name column
 * @method     ChildOcOrderQuery orderByStoreUrl($order = Criteria::ASC) Order by the store_url column
 * @method     ChildOcOrderQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcOrderQuery orderByCustomerGroupId($order = Criteria::ASC) Order by the customer_group_id column
 * @method     ChildOcOrderQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildOcOrderQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildOcOrderQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildOcOrderQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     ChildOcOrderQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildOcOrderQuery orderByCustomField($order = Criteria::ASC) Order by the custom_field column
 * @method     ChildOcOrderQuery orderByPaymentFirstname($order = Criteria::ASC) Order by the payment_firstname column
 * @method     ChildOcOrderQuery orderByPaymentLastname($order = Criteria::ASC) Order by the payment_lastname column
 * @method     ChildOcOrderQuery orderByPaymentCompany($order = Criteria::ASC) Order by the payment_company column
 * @method     ChildOcOrderQuery orderByPaymentAddress1($order = Criteria::ASC) Order by the payment_address_1 column
 * @method     ChildOcOrderQuery orderByPaymentAddress2($order = Criteria::ASC) Order by the payment_address_2 column
 * @method     ChildOcOrderQuery orderByPaymentCity($order = Criteria::ASC) Order by the payment_city column
 * @method     ChildOcOrderQuery orderByPaymentPostcode($order = Criteria::ASC) Order by the payment_postcode column
 * @method     ChildOcOrderQuery orderByPaymentCountry($order = Criteria::ASC) Order by the payment_country column
 * @method     ChildOcOrderQuery orderByPaymentCountryId($order = Criteria::ASC) Order by the payment_country_id column
 * @method     ChildOcOrderQuery orderByPaymentZone($order = Criteria::ASC) Order by the payment_zone column
 * @method     ChildOcOrderQuery orderByPaymentZoneId($order = Criteria::ASC) Order by the payment_zone_id column
 * @method     ChildOcOrderQuery orderByPaymentAddressFormat($order = Criteria::ASC) Order by the payment_address_format column
 * @method     ChildOcOrderQuery orderByPaymentCustomField($order = Criteria::ASC) Order by the payment_custom_field column
 * @method     ChildOcOrderQuery orderByPaymentMethod($order = Criteria::ASC) Order by the payment_method column
 * @method     ChildOcOrderQuery orderByPaymentCode($order = Criteria::ASC) Order by the payment_code column
 * @method     ChildOcOrderQuery orderByShippingFirstname($order = Criteria::ASC) Order by the shipping_firstname column
 * @method     ChildOcOrderQuery orderByShippingLastname($order = Criteria::ASC) Order by the shipping_lastname column
 * @method     ChildOcOrderQuery orderByShippingCompany($order = Criteria::ASC) Order by the shipping_company column
 * @method     ChildOcOrderQuery orderByShippingAddress1($order = Criteria::ASC) Order by the shipping_address_1 column
 * @method     ChildOcOrderQuery orderByShippingAddress2($order = Criteria::ASC) Order by the shipping_address_2 column
 * @method     ChildOcOrderQuery orderByShippingCity($order = Criteria::ASC) Order by the shipping_city column
 * @method     ChildOcOrderQuery orderByShippingPostcode($order = Criteria::ASC) Order by the shipping_postcode column
 * @method     ChildOcOrderQuery orderByShippingCountry($order = Criteria::ASC) Order by the shipping_country column
 * @method     ChildOcOrderQuery orderByShippingCountryId($order = Criteria::ASC) Order by the shipping_country_id column
 * @method     ChildOcOrderQuery orderByShippingZone($order = Criteria::ASC) Order by the shipping_zone column
 * @method     ChildOcOrderQuery orderByShippingZoneId($order = Criteria::ASC) Order by the shipping_zone_id column
 * @method     ChildOcOrderQuery orderByShippingAddressFormat($order = Criteria::ASC) Order by the shipping_address_format column
 * @method     ChildOcOrderQuery orderByShippingCustomField($order = Criteria::ASC) Order by the shipping_custom_field column
 * @method     ChildOcOrderQuery orderByShippingMethod($order = Criteria::ASC) Order by the shipping_method column
 * @method     ChildOcOrderQuery orderByShippingCode($order = Criteria::ASC) Order by the shipping_code column
 * @method     ChildOcOrderQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildOcOrderQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildOcOrderQuery orderByOrderStatusId($order = Criteria::ASC) Order by the order_status_id column
 * @method     ChildOcOrderQuery orderByAffiliateId($order = Criteria::ASC) Order by the affiliate_id column
 * @method     ChildOcOrderQuery orderByCommission($order = Criteria::ASC) Order by the commission column
 * @method     ChildOcOrderQuery orderByMarketingId($order = Criteria::ASC) Order by the marketing_id column
 * @method     ChildOcOrderQuery orderByTracking($order = Criteria::ASC) Order by the tracking column
 * @method     ChildOcOrderQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcOrderQuery orderByCurrencyId($order = Criteria::ASC) Order by the currency_id column
 * @method     ChildOcOrderQuery orderByCurrencyCode($order = Criteria::ASC) Order by the currency_code column
 * @method     ChildOcOrderQuery orderByCurrencyValue($order = Criteria::ASC) Order by the currency_value column
 * @method     ChildOcOrderQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildOcOrderQuery orderByForwardedIp($order = Criteria::ASC) Order by the forwarded_ip column
 * @method     ChildOcOrderQuery orderByUserAgent($order = Criteria::ASC) Order by the user_agent column
 * @method     ChildOcOrderQuery orderByAcceptLanguage($order = Criteria::ASC) Order by the accept_language column
 * @method     ChildOcOrderQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcOrderQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 *
 * @method     ChildOcOrderQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcOrderQuery groupByInvoiceNo() Group by the invoice_no column
 * @method     ChildOcOrderQuery groupByInvoicePrefix() Group by the invoice_prefix column
 * @method     ChildOcOrderQuery groupByStoreId() Group by the store_id column
 * @method     ChildOcOrderQuery groupByStoreName() Group by the store_name column
 * @method     ChildOcOrderQuery groupByStoreUrl() Group by the store_url column
 * @method     ChildOcOrderQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcOrderQuery groupByCustomerGroupId() Group by the customer_group_id column
 * @method     ChildOcOrderQuery groupByFirstname() Group by the firstname column
 * @method     ChildOcOrderQuery groupByLastname() Group by the lastname column
 * @method     ChildOcOrderQuery groupByEmail() Group by the email column
 * @method     ChildOcOrderQuery groupByTelephone() Group by the telephone column
 * @method     ChildOcOrderQuery groupByFax() Group by the fax column
 * @method     ChildOcOrderQuery groupByCustomField() Group by the custom_field column
 * @method     ChildOcOrderQuery groupByPaymentFirstname() Group by the payment_firstname column
 * @method     ChildOcOrderQuery groupByPaymentLastname() Group by the payment_lastname column
 * @method     ChildOcOrderQuery groupByPaymentCompany() Group by the payment_company column
 * @method     ChildOcOrderQuery groupByPaymentAddress1() Group by the payment_address_1 column
 * @method     ChildOcOrderQuery groupByPaymentAddress2() Group by the payment_address_2 column
 * @method     ChildOcOrderQuery groupByPaymentCity() Group by the payment_city column
 * @method     ChildOcOrderQuery groupByPaymentPostcode() Group by the payment_postcode column
 * @method     ChildOcOrderQuery groupByPaymentCountry() Group by the payment_country column
 * @method     ChildOcOrderQuery groupByPaymentCountryId() Group by the payment_country_id column
 * @method     ChildOcOrderQuery groupByPaymentZone() Group by the payment_zone column
 * @method     ChildOcOrderQuery groupByPaymentZoneId() Group by the payment_zone_id column
 * @method     ChildOcOrderQuery groupByPaymentAddressFormat() Group by the payment_address_format column
 * @method     ChildOcOrderQuery groupByPaymentCustomField() Group by the payment_custom_field column
 * @method     ChildOcOrderQuery groupByPaymentMethod() Group by the payment_method column
 * @method     ChildOcOrderQuery groupByPaymentCode() Group by the payment_code column
 * @method     ChildOcOrderQuery groupByShippingFirstname() Group by the shipping_firstname column
 * @method     ChildOcOrderQuery groupByShippingLastname() Group by the shipping_lastname column
 * @method     ChildOcOrderQuery groupByShippingCompany() Group by the shipping_company column
 * @method     ChildOcOrderQuery groupByShippingAddress1() Group by the shipping_address_1 column
 * @method     ChildOcOrderQuery groupByShippingAddress2() Group by the shipping_address_2 column
 * @method     ChildOcOrderQuery groupByShippingCity() Group by the shipping_city column
 * @method     ChildOcOrderQuery groupByShippingPostcode() Group by the shipping_postcode column
 * @method     ChildOcOrderQuery groupByShippingCountry() Group by the shipping_country column
 * @method     ChildOcOrderQuery groupByShippingCountryId() Group by the shipping_country_id column
 * @method     ChildOcOrderQuery groupByShippingZone() Group by the shipping_zone column
 * @method     ChildOcOrderQuery groupByShippingZoneId() Group by the shipping_zone_id column
 * @method     ChildOcOrderQuery groupByShippingAddressFormat() Group by the shipping_address_format column
 * @method     ChildOcOrderQuery groupByShippingCustomField() Group by the shipping_custom_field column
 * @method     ChildOcOrderQuery groupByShippingMethod() Group by the shipping_method column
 * @method     ChildOcOrderQuery groupByShippingCode() Group by the shipping_code column
 * @method     ChildOcOrderQuery groupByComment() Group by the comment column
 * @method     ChildOcOrderQuery groupByTotal() Group by the total column
 * @method     ChildOcOrderQuery groupByOrderStatusId() Group by the order_status_id column
 * @method     ChildOcOrderQuery groupByAffiliateId() Group by the affiliate_id column
 * @method     ChildOcOrderQuery groupByCommission() Group by the commission column
 * @method     ChildOcOrderQuery groupByMarketingId() Group by the marketing_id column
 * @method     ChildOcOrderQuery groupByTracking() Group by the tracking column
 * @method     ChildOcOrderQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcOrderQuery groupByCurrencyId() Group by the currency_id column
 * @method     ChildOcOrderQuery groupByCurrencyCode() Group by the currency_code column
 * @method     ChildOcOrderQuery groupByCurrencyValue() Group by the currency_value column
 * @method     ChildOcOrderQuery groupByIp() Group by the ip column
 * @method     ChildOcOrderQuery groupByForwardedIp() Group by the forwarded_ip column
 * @method     ChildOcOrderQuery groupByUserAgent() Group by the user_agent column
 * @method     ChildOcOrderQuery groupByAcceptLanguage() Group by the accept_language column
 * @method     ChildOcOrderQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcOrderQuery groupByDateModified() Group by the date_modified column
 *
 * @method     ChildOcOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOrderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOrderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOrderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOrder findOne(ConnectionInterface $con = null) Return the first ChildOcOrder matching the query
 * @method     ChildOcOrder findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOrder matching the query, or a new ChildOcOrder object populated from the query conditions when no match is found
 *
 * @method     ChildOcOrder findOneByOrderId(int $order_id) Return the first ChildOcOrder filtered by the order_id column
 * @method     ChildOcOrder findOneByInvoiceNo(int $invoice_no) Return the first ChildOcOrder filtered by the invoice_no column
 * @method     ChildOcOrder findOneByInvoicePrefix(string $invoice_prefix) Return the first ChildOcOrder filtered by the invoice_prefix column
 * @method     ChildOcOrder findOneByStoreId(int $store_id) Return the first ChildOcOrder filtered by the store_id column
 * @method     ChildOcOrder findOneByStoreName(string $store_name) Return the first ChildOcOrder filtered by the store_name column
 * @method     ChildOcOrder findOneByStoreUrl(string $store_url) Return the first ChildOcOrder filtered by the store_url column
 * @method     ChildOcOrder findOneByCustomerId(int $customer_id) Return the first ChildOcOrder filtered by the customer_id column
 * @method     ChildOcOrder findOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcOrder filtered by the customer_group_id column
 * @method     ChildOcOrder findOneByFirstname(string $firstname) Return the first ChildOcOrder filtered by the firstname column
 * @method     ChildOcOrder findOneByLastname(string $lastname) Return the first ChildOcOrder filtered by the lastname column
 * @method     ChildOcOrder findOneByEmail(string $email) Return the first ChildOcOrder filtered by the email column
 * @method     ChildOcOrder findOneByTelephone(string $telephone) Return the first ChildOcOrder filtered by the telephone column
 * @method     ChildOcOrder findOneByFax(string $fax) Return the first ChildOcOrder filtered by the fax column
 * @method     ChildOcOrder findOneByCustomField(string $custom_field) Return the first ChildOcOrder filtered by the custom_field column
 * @method     ChildOcOrder findOneByPaymentFirstname(string $payment_firstname) Return the first ChildOcOrder filtered by the payment_firstname column
 * @method     ChildOcOrder findOneByPaymentLastname(string $payment_lastname) Return the first ChildOcOrder filtered by the payment_lastname column
 * @method     ChildOcOrder findOneByPaymentCompany(string $payment_company) Return the first ChildOcOrder filtered by the payment_company column
 * @method     ChildOcOrder findOneByPaymentAddress1(string $payment_address_1) Return the first ChildOcOrder filtered by the payment_address_1 column
 * @method     ChildOcOrder findOneByPaymentAddress2(string $payment_address_2) Return the first ChildOcOrder filtered by the payment_address_2 column
 * @method     ChildOcOrder findOneByPaymentCity(string $payment_city) Return the first ChildOcOrder filtered by the payment_city column
 * @method     ChildOcOrder findOneByPaymentPostcode(string $payment_postcode) Return the first ChildOcOrder filtered by the payment_postcode column
 * @method     ChildOcOrder findOneByPaymentCountry(string $payment_country) Return the first ChildOcOrder filtered by the payment_country column
 * @method     ChildOcOrder findOneByPaymentCountryId(int $payment_country_id) Return the first ChildOcOrder filtered by the payment_country_id column
 * @method     ChildOcOrder findOneByPaymentZone(string $payment_zone) Return the first ChildOcOrder filtered by the payment_zone column
 * @method     ChildOcOrder findOneByPaymentZoneId(int $payment_zone_id) Return the first ChildOcOrder filtered by the payment_zone_id column
 * @method     ChildOcOrder findOneByPaymentAddressFormat(string $payment_address_format) Return the first ChildOcOrder filtered by the payment_address_format column
 * @method     ChildOcOrder findOneByPaymentCustomField(string $payment_custom_field) Return the first ChildOcOrder filtered by the payment_custom_field column
 * @method     ChildOcOrder findOneByPaymentMethod(string $payment_method) Return the first ChildOcOrder filtered by the payment_method column
 * @method     ChildOcOrder findOneByPaymentCode(string $payment_code) Return the first ChildOcOrder filtered by the payment_code column
 * @method     ChildOcOrder findOneByShippingFirstname(string $shipping_firstname) Return the first ChildOcOrder filtered by the shipping_firstname column
 * @method     ChildOcOrder findOneByShippingLastname(string $shipping_lastname) Return the first ChildOcOrder filtered by the shipping_lastname column
 * @method     ChildOcOrder findOneByShippingCompany(string $shipping_company) Return the first ChildOcOrder filtered by the shipping_company column
 * @method     ChildOcOrder findOneByShippingAddress1(string $shipping_address_1) Return the first ChildOcOrder filtered by the shipping_address_1 column
 * @method     ChildOcOrder findOneByShippingAddress2(string $shipping_address_2) Return the first ChildOcOrder filtered by the shipping_address_2 column
 * @method     ChildOcOrder findOneByShippingCity(string $shipping_city) Return the first ChildOcOrder filtered by the shipping_city column
 * @method     ChildOcOrder findOneByShippingPostcode(string $shipping_postcode) Return the first ChildOcOrder filtered by the shipping_postcode column
 * @method     ChildOcOrder findOneByShippingCountry(string $shipping_country) Return the first ChildOcOrder filtered by the shipping_country column
 * @method     ChildOcOrder findOneByShippingCountryId(int $shipping_country_id) Return the first ChildOcOrder filtered by the shipping_country_id column
 * @method     ChildOcOrder findOneByShippingZone(string $shipping_zone) Return the first ChildOcOrder filtered by the shipping_zone column
 * @method     ChildOcOrder findOneByShippingZoneId(int $shipping_zone_id) Return the first ChildOcOrder filtered by the shipping_zone_id column
 * @method     ChildOcOrder findOneByShippingAddressFormat(string $shipping_address_format) Return the first ChildOcOrder filtered by the shipping_address_format column
 * @method     ChildOcOrder findOneByShippingCustomField(string $shipping_custom_field) Return the first ChildOcOrder filtered by the shipping_custom_field column
 * @method     ChildOcOrder findOneByShippingMethod(string $shipping_method) Return the first ChildOcOrder filtered by the shipping_method column
 * @method     ChildOcOrder findOneByShippingCode(string $shipping_code) Return the first ChildOcOrder filtered by the shipping_code column
 * @method     ChildOcOrder findOneByComment(string $comment) Return the first ChildOcOrder filtered by the comment column
 * @method     ChildOcOrder findOneByTotal(string $total) Return the first ChildOcOrder filtered by the total column
 * @method     ChildOcOrder findOneByOrderStatusId(int $order_status_id) Return the first ChildOcOrder filtered by the order_status_id column
 * @method     ChildOcOrder findOneByAffiliateId(int $affiliate_id) Return the first ChildOcOrder filtered by the affiliate_id column
 * @method     ChildOcOrder findOneByCommission(string $commission) Return the first ChildOcOrder filtered by the commission column
 * @method     ChildOcOrder findOneByMarketingId(int $marketing_id) Return the first ChildOcOrder filtered by the marketing_id column
 * @method     ChildOcOrder findOneByTracking(string $tracking) Return the first ChildOcOrder filtered by the tracking column
 * @method     ChildOcOrder findOneByLanguageId(int $language_id) Return the first ChildOcOrder filtered by the language_id column
 * @method     ChildOcOrder findOneByCurrencyId(int $currency_id) Return the first ChildOcOrder filtered by the currency_id column
 * @method     ChildOcOrder findOneByCurrencyCode(string $currency_code) Return the first ChildOcOrder filtered by the currency_code column
 * @method     ChildOcOrder findOneByCurrencyValue(string $currency_value) Return the first ChildOcOrder filtered by the currency_value column
 * @method     ChildOcOrder findOneByIp(string $ip) Return the first ChildOcOrder filtered by the ip column
 * @method     ChildOcOrder findOneByForwardedIp(string $forwarded_ip) Return the first ChildOcOrder filtered by the forwarded_ip column
 * @method     ChildOcOrder findOneByUserAgent(string $user_agent) Return the first ChildOcOrder filtered by the user_agent column
 * @method     ChildOcOrder findOneByAcceptLanguage(string $accept_language) Return the first ChildOcOrder filtered by the accept_language column
 * @method     ChildOcOrder findOneByDateAdded(string $date_added) Return the first ChildOcOrder filtered by the date_added column
 * @method     ChildOcOrder findOneByDateModified(string $date_modified) Return the first ChildOcOrder filtered by the date_modified column *

 * @method     ChildOcOrder requirePk($key, ConnectionInterface $con = null) Return the ChildOcOrder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOne(ConnectionInterface $con = null) Return the first ChildOcOrder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrder requireOneByOrderId(int $order_id) Return the first ChildOcOrder filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByInvoiceNo(int $invoice_no) Return the first ChildOcOrder filtered by the invoice_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByInvoicePrefix(string $invoice_prefix) Return the first ChildOcOrder filtered by the invoice_prefix column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByStoreId(int $store_id) Return the first ChildOcOrder filtered by the store_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByStoreName(string $store_name) Return the first ChildOcOrder filtered by the store_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByStoreUrl(string $store_url) Return the first ChildOcOrder filtered by the store_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByCustomerId(int $customer_id) Return the first ChildOcOrder filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcOrder filtered by the customer_group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByFirstname(string $firstname) Return the first ChildOcOrder filtered by the firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByLastname(string $lastname) Return the first ChildOcOrder filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByEmail(string $email) Return the first ChildOcOrder filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByTelephone(string $telephone) Return the first ChildOcOrder filtered by the telephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByFax(string $fax) Return the first ChildOcOrder filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByCustomField(string $custom_field) Return the first ChildOcOrder filtered by the custom_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentFirstname(string $payment_firstname) Return the first ChildOcOrder filtered by the payment_firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentLastname(string $payment_lastname) Return the first ChildOcOrder filtered by the payment_lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentCompany(string $payment_company) Return the first ChildOcOrder filtered by the payment_company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentAddress1(string $payment_address_1) Return the first ChildOcOrder filtered by the payment_address_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentAddress2(string $payment_address_2) Return the first ChildOcOrder filtered by the payment_address_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentCity(string $payment_city) Return the first ChildOcOrder filtered by the payment_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentPostcode(string $payment_postcode) Return the first ChildOcOrder filtered by the payment_postcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentCountry(string $payment_country) Return the first ChildOcOrder filtered by the payment_country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentCountryId(int $payment_country_id) Return the first ChildOcOrder filtered by the payment_country_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentZone(string $payment_zone) Return the first ChildOcOrder filtered by the payment_zone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentZoneId(int $payment_zone_id) Return the first ChildOcOrder filtered by the payment_zone_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentAddressFormat(string $payment_address_format) Return the first ChildOcOrder filtered by the payment_address_format column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentCustomField(string $payment_custom_field) Return the first ChildOcOrder filtered by the payment_custom_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentMethod(string $payment_method) Return the first ChildOcOrder filtered by the payment_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByPaymentCode(string $payment_code) Return the first ChildOcOrder filtered by the payment_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingFirstname(string $shipping_firstname) Return the first ChildOcOrder filtered by the shipping_firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingLastname(string $shipping_lastname) Return the first ChildOcOrder filtered by the shipping_lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingCompany(string $shipping_company) Return the first ChildOcOrder filtered by the shipping_company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingAddress1(string $shipping_address_1) Return the first ChildOcOrder filtered by the shipping_address_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingAddress2(string $shipping_address_2) Return the first ChildOcOrder filtered by the shipping_address_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingCity(string $shipping_city) Return the first ChildOcOrder filtered by the shipping_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingPostcode(string $shipping_postcode) Return the first ChildOcOrder filtered by the shipping_postcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingCountry(string $shipping_country) Return the first ChildOcOrder filtered by the shipping_country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingCountryId(int $shipping_country_id) Return the first ChildOcOrder filtered by the shipping_country_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingZone(string $shipping_zone) Return the first ChildOcOrder filtered by the shipping_zone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingZoneId(int $shipping_zone_id) Return the first ChildOcOrder filtered by the shipping_zone_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingAddressFormat(string $shipping_address_format) Return the first ChildOcOrder filtered by the shipping_address_format column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingCustomField(string $shipping_custom_field) Return the first ChildOcOrder filtered by the shipping_custom_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingMethod(string $shipping_method) Return the first ChildOcOrder filtered by the shipping_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByShippingCode(string $shipping_code) Return the first ChildOcOrder filtered by the shipping_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByComment(string $comment) Return the first ChildOcOrder filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByTotal(string $total) Return the first ChildOcOrder filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByOrderStatusId(int $order_status_id) Return the first ChildOcOrder filtered by the order_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByAffiliateId(int $affiliate_id) Return the first ChildOcOrder filtered by the affiliate_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByCommission(string $commission) Return the first ChildOcOrder filtered by the commission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByMarketingId(int $marketing_id) Return the first ChildOcOrder filtered by the marketing_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByTracking(string $tracking) Return the first ChildOcOrder filtered by the tracking column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByLanguageId(int $language_id) Return the first ChildOcOrder filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByCurrencyId(int $currency_id) Return the first ChildOcOrder filtered by the currency_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByCurrencyCode(string $currency_code) Return the first ChildOcOrder filtered by the currency_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByCurrencyValue(string $currency_value) Return the first ChildOcOrder filtered by the currency_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByIp(string $ip) Return the first ChildOcOrder filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByForwardedIp(string $forwarded_ip) Return the first ChildOcOrder filtered by the forwarded_ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByUserAgent(string $user_agent) Return the first ChildOcOrder filtered by the user_agent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByAcceptLanguage(string $accept_language) Return the first ChildOcOrder filtered by the accept_language column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByDateAdded(string $date_added) Return the first ChildOcOrder filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrder requireOneByDateModified(string $date_modified) Return the first ChildOcOrder filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrder[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOrder objects based on current ModelCriteria
 * @method     ChildOcOrder[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcOrder objects filtered by the order_id column
 * @method     ChildOcOrder[]|ObjectCollection findByInvoiceNo(int $invoice_no) Return ChildOcOrder objects filtered by the invoice_no column
 * @method     ChildOcOrder[]|ObjectCollection findByInvoicePrefix(string $invoice_prefix) Return ChildOcOrder objects filtered by the invoice_prefix column
 * @method     ChildOcOrder[]|ObjectCollection findByStoreId(int $store_id) Return ChildOcOrder objects filtered by the store_id column
 * @method     ChildOcOrder[]|ObjectCollection findByStoreName(string $store_name) Return ChildOcOrder objects filtered by the store_name column
 * @method     ChildOcOrder[]|ObjectCollection findByStoreUrl(string $store_url) Return ChildOcOrder objects filtered by the store_url column
 * @method     ChildOcOrder[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcOrder objects filtered by the customer_id column
 * @method     ChildOcOrder[]|ObjectCollection findByCustomerGroupId(int $customer_group_id) Return ChildOcOrder objects filtered by the customer_group_id column
 * @method     ChildOcOrder[]|ObjectCollection findByFirstname(string $firstname) Return ChildOcOrder objects filtered by the firstname column
 * @method     ChildOcOrder[]|ObjectCollection findByLastname(string $lastname) Return ChildOcOrder objects filtered by the lastname column
 * @method     ChildOcOrder[]|ObjectCollection findByEmail(string $email) Return ChildOcOrder objects filtered by the email column
 * @method     ChildOcOrder[]|ObjectCollection findByTelephone(string $telephone) Return ChildOcOrder objects filtered by the telephone column
 * @method     ChildOcOrder[]|ObjectCollection findByFax(string $fax) Return ChildOcOrder objects filtered by the fax column
 * @method     ChildOcOrder[]|ObjectCollection findByCustomField(string $custom_field) Return ChildOcOrder objects filtered by the custom_field column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentFirstname(string $payment_firstname) Return ChildOcOrder objects filtered by the payment_firstname column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentLastname(string $payment_lastname) Return ChildOcOrder objects filtered by the payment_lastname column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentCompany(string $payment_company) Return ChildOcOrder objects filtered by the payment_company column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentAddress1(string $payment_address_1) Return ChildOcOrder objects filtered by the payment_address_1 column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentAddress2(string $payment_address_2) Return ChildOcOrder objects filtered by the payment_address_2 column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentCity(string $payment_city) Return ChildOcOrder objects filtered by the payment_city column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentPostcode(string $payment_postcode) Return ChildOcOrder objects filtered by the payment_postcode column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentCountry(string $payment_country) Return ChildOcOrder objects filtered by the payment_country column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentCountryId(int $payment_country_id) Return ChildOcOrder objects filtered by the payment_country_id column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentZone(string $payment_zone) Return ChildOcOrder objects filtered by the payment_zone column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentZoneId(int $payment_zone_id) Return ChildOcOrder objects filtered by the payment_zone_id column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentAddressFormat(string $payment_address_format) Return ChildOcOrder objects filtered by the payment_address_format column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentCustomField(string $payment_custom_field) Return ChildOcOrder objects filtered by the payment_custom_field column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentMethod(string $payment_method) Return ChildOcOrder objects filtered by the payment_method column
 * @method     ChildOcOrder[]|ObjectCollection findByPaymentCode(string $payment_code) Return ChildOcOrder objects filtered by the payment_code column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingFirstname(string $shipping_firstname) Return ChildOcOrder objects filtered by the shipping_firstname column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingLastname(string $shipping_lastname) Return ChildOcOrder objects filtered by the shipping_lastname column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingCompany(string $shipping_company) Return ChildOcOrder objects filtered by the shipping_company column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingAddress1(string $shipping_address_1) Return ChildOcOrder objects filtered by the shipping_address_1 column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingAddress2(string $shipping_address_2) Return ChildOcOrder objects filtered by the shipping_address_2 column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingCity(string $shipping_city) Return ChildOcOrder objects filtered by the shipping_city column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingPostcode(string $shipping_postcode) Return ChildOcOrder objects filtered by the shipping_postcode column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingCountry(string $shipping_country) Return ChildOcOrder objects filtered by the shipping_country column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingCountryId(int $shipping_country_id) Return ChildOcOrder objects filtered by the shipping_country_id column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingZone(string $shipping_zone) Return ChildOcOrder objects filtered by the shipping_zone column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingZoneId(int $shipping_zone_id) Return ChildOcOrder objects filtered by the shipping_zone_id column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingAddressFormat(string $shipping_address_format) Return ChildOcOrder objects filtered by the shipping_address_format column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingCustomField(string $shipping_custom_field) Return ChildOcOrder objects filtered by the shipping_custom_field column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingMethod(string $shipping_method) Return ChildOcOrder objects filtered by the shipping_method column
 * @method     ChildOcOrder[]|ObjectCollection findByShippingCode(string $shipping_code) Return ChildOcOrder objects filtered by the shipping_code column
 * @method     ChildOcOrder[]|ObjectCollection findByComment(string $comment) Return ChildOcOrder objects filtered by the comment column
 * @method     ChildOcOrder[]|ObjectCollection findByTotal(string $total) Return ChildOcOrder objects filtered by the total column
 * @method     ChildOcOrder[]|ObjectCollection findByOrderStatusId(int $order_status_id) Return ChildOcOrder objects filtered by the order_status_id column
 * @method     ChildOcOrder[]|ObjectCollection findByAffiliateId(int $affiliate_id) Return ChildOcOrder objects filtered by the affiliate_id column
 * @method     ChildOcOrder[]|ObjectCollection findByCommission(string $commission) Return ChildOcOrder objects filtered by the commission column
 * @method     ChildOcOrder[]|ObjectCollection findByMarketingId(int $marketing_id) Return ChildOcOrder objects filtered by the marketing_id column
 * @method     ChildOcOrder[]|ObjectCollection findByTracking(string $tracking) Return ChildOcOrder objects filtered by the tracking column
 * @method     ChildOcOrder[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcOrder objects filtered by the language_id column
 * @method     ChildOcOrder[]|ObjectCollection findByCurrencyId(int $currency_id) Return ChildOcOrder objects filtered by the currency_id column
 * @method     ChildOcOrder[]|ObjectCollection findByCurrencyCode(string $currency_code) Return ChildOcOrder objects filtered by the currency_code column
 * @method     ChildOcOrder[]|ObjectCollection findByCurrencyValue(string $currency_value) Return ChildOcOrder objects filtered by the currency_value column
 * @method     ChildOcOrder[]|ObjectCollection findByIp(string $ip) Return ChildOcOrder objects filtered by the ip column
 * @method     ChildOcOrder[]|ObjectCollection findByForwardedIp(string $forwarded_ip) Return ChildOcOrder objects filtered by the forwarded_ip column
 * @method     ChildOcOrder[]|ObjectCollection findByUserAgent(string $user_agent) Return ChildOcOrder objects filtered by the user_agent column
 * @method     ChildOcOrder[]|ObjectCollection findByAcceptLanguage(string $accept_language) Return ChildOcOrder objects filtered by the accept_language column
 * @method     ChildOcOrder[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcOrder objects filtered by the date_added column
 * @method     ChildOcOrder[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcOrder objects filtered by the date_modified column
 * @method     ChildOcOrder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOrderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOrderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOrder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOrderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOrderQuery) {
            return $criteria;
        }
        $query = new ChildOcOrderQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcOrder|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOrderTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOcOrder A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT order_id, invoice_no, invoice_prefix, store_id, store_name, store_url, customer_id, customer_group_id, firstname, lastname, email, telephone, fax, custom_field, payment_firstname, payment_lastname, payment_company, payment_address_1, payment_address_2, payment_city, payment_postcode, payment_country, payment_country_id, payment_zone, payment_zone_id, payment_address_format, payment_custom_field, payment_method, payment_code, shipping_firstname, shipping_lastname, shipping_company, shipping_address_1, shipping_address_2, shipping_city, shipping_postcode, shipping_country, shipping_country_id, shipping_zone, shipping_zone_id, shipping_address_format, shipping_custom_field, shipping_method, shipping_code, comment, total, order_status_id, affiliate_id, commission, marketing_id, tracking, language_id, currency_id, currency_code, currency_value, ip, forwarded_ip, user_agent, accept_language, date_added, date_modified FROM oc_order WHERE order_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOcOrder $obj */
            $obj = new ChildOcOrder();
            $obj->hydrate($row);
            OcOrderTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildOcOrder|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOrderTableMap::COL_ORDER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOrderTableMap::COL_ORDER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderId(1234); // WHERE order_id = 1234
     * $query->filterByOrderId(array(12, 34)); // WHERE order_id IN (12, 34)
     * $query->filterByOrderId(array('min' => 12)); // WHERE order_id > 12
     * </code>
     *
     * @param     mixed $orderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the invoice_no column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoiceNo(1234); // WHERE invoice_no = 1234
     * $query->filterByInvoiceNo(array(12, 34)); // WHERE invoice_no IN (12, 34)
     * $query->filterByInvoiceNo(array('min' => 12)); // WHERE invoice_no > 12
     * </code>
     *
     * @param     mixed $invoiceNo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByInvoiceNo($invoiceNo = null, $comparison = null)
    {
        if (is_array($invoiceNo)) {
            $useMinMax = false;
            if (isset($invoiceNo['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_INVOICE_NO, $invoiceNo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invoiceNo['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_INVOICE_NO, $invoiceNo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_INVOICE_NO, $invoiceNo, $comparison);
    }

    /**
     * Filter the query on the invoice_prefix column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoicePrefix('fooValue');   // WHERE invoice_prefix = 'fooValue'
     * $query->filterByInvoicePrefix('%fooValue%', Criteria::LIKE); // WHERE invoice_prefix LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invoicePrefix The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByInvoicePrefix($invoicePrefix = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invoicePrefix)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_INVOICE_PREFIX, $invoicePrefix, $comparison);
    }

    /**
     * Filter the query on the store_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreId(1234); // WHERE store_id = 1234
     * $query->filterByStoreId(array(12, 34)); // WHERE store_id IN (12, 34)
     * $query->filterByStoreId(array('min' => 12)); // WHERE store_id > 12
     * </code>
     *
     * @param     mixed $storeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the store_name column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreName('fooValue');   // WHERE store_name = 'fooValue'
     * $query->filterByStoreName('%fooValue%', Criteria::LIKE); // WHERE store_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $storeName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByStoreName($storeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($storeName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_STORE_NAME, $storeName, $comparison);
    }

    /**
     * Filter the query on the store_url column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreUrl('fooValue');   // WHERE store_url = 'fooValue'
     * $query->filterByStoreUrl('%fooValue%', Criteria::LIKE); // WHERE store_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $storeUrl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByStoreUrl($storeUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($storeUrl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_STORE_URL, $storeUrl, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the customer_group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerGroupId(1234); // WHERE customer_group_id = 1234
     * $query->filterByCustomerGroupId(array(12, 34)); // WHERE customer_group_id IN (12, 34)
     * $query->filterByCustomerGroupId(array('min' => 12)); // WHERE customer_group_id > 12
     * </code>
     *
     * @param     mixed $customerGroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByCustomerGroupId($customerGroupId = null, $comparison = null)
    {
        if (is_array($customerGroupId)) {
            $useMinMax = false;
            if (isset($customerGroupId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerGroupId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId, $comparison);
    }

    /**
     * Filter the query on the firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
     * $query->filterByFirstname('%fooValue%', Criteria::LIKE); // WHERE firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%', Criteria::LIKE); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the telephone column
     *
     * Example usage:
     * <code>
     * $query->filterByTelephone('fooValue');   // WHERE telephone = 'fooValue'
     * $query->filterByTelephone('%fooValue%', Criteria::LIKE); // WHERE telephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telephone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByTelephone($telephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_TELEPHONE, $telephone, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%', Criteria::LIKE); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the custom_field column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomField('fooValue');   // WHERE custom_field = 'fooValue'
     * $query->filterByCustomField('%fooValue%', Criteria::LIKE); // WHERE custom_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customField The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByCustomField($customField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customField)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_CUSTOM_FIELD, $customField, $comparison);
    }

    /**
     * Filter the query on the payment_firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentFirstname('fooValue');   // WHERE payment_firstname = 'fooValue'
     * $query->filterByPaymentFirstname('%fooValue%', Criteria::LIKE); // WHERE payment_firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentFirstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentFirstname($paymentFirstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentFirstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_FIRSTNAME, $paymentFirstname, $comparison);
    }

    /**
     * Filter the query on the payment_lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentLastname('fooValue');   // WHERE payment_lastname = 'fooValue'
     * $query->filterByPaymentLastname('%fooValue%', Criteria::LIKE); // WHERE payment_lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentLastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentLastname($paymentLastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentLastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_LASTNAME, $paymentLastname, $comparison);
    }

    /**
     * Filter the query on the payment_company column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentCompany('fooValue');   // WHERE payment_company = 'fooValue'
     * $query->filterByPaymentCompany('%fooValue%', Criteria::LIKE); // WHERE payment_company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentCompany The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentCompany($paymentCompany = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentCompany)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_COMPANY, $paymentCompany, $comparison);
    }

    /**
     * Filter the query on the payment_address_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentAddress1('fooValue');   // WHERE payment_address_1 = 'fooValue'
     * $query->filterByPaymentAddress1('%fooValue%', Criteria::LIKE); // WHERE payment_address_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentAddress1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentAddress1($paymentAddress1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentAddress1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_ADDRESS_1, $paymentAddress1, $comparison);
    }

    /**
     * Filter the query on the payment_address_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentAddress2('fooValue');   // WHERE payment_address_2 = 'fooValue'
     * $query->filterByPaymentAddress2('%fooValue%', Criteria::LIKE); // WHERE payment_address_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentAddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentAddress2($paymentAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentAddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_ADDRESS_2, $paymentAddress2, $comparison);
    }

    /**
     * Filter the query on the payment_city column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentCity('fooValue');   // WHERE payment_city = 'fooValue'
     * $query->filterByPaymentCity('%fooValue%', Criteria::LIKE); // WHERE payment_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentCity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentCity($paymentCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentCity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_CITY, $paymentCity, $comparison);
    }

    /**
     * Filter the query on the payment_postcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentPostcode('fooValue');   // WHERE payment_postcode = 'fooValue'
     * $query->filterByPaymentPostcode('%fooValue%', Criteria::LIKE); // WHERE payment_postcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentPostcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentPostcode($paymentPostcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentPostcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_POSTCODE, $paymentPostcode, $comparison);
    }

    /**
     * Filter the query on the payment_country column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentCountry('fooValue');   // WHERE payment_country = 'fooValue'
     * $query->filterByPaymentCountry('%fooValue%', Criteria::LIKE); // WHERE payment_country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentCountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentCountry($paymentCountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentCountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_COUNTRY, $paymentCountry, $comparison);
    }

    /**
     * Filter the query on the payment_country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentCountryId(1234); // WHERE payment_country_id = 1234
     * $query->filterByPaymentCountryId(array(12, 34)); // WHERE payment_country_id IN (12, 34)
     * $query->filterByPaymentCountryId(array('min' => 12)); // WHERE payment_country_id > 12
     * </code>
     *
     * @param     mixed $paymentCountryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentCountryId($paymentCountryId = null, $comparison = null)
    {
        if (is_array($paymentCountryId)) {
            $useMinMax = false;
            if (isset($paymentCountryId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_COUNTRY_ID, $paymentCountryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentCountryId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_COUNTRY_ID, $paymentCountryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_COUNTRY_ID, $paymentCountryId, $comparison);
    }

    /**
     * Filter the query on the payment_zone column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentZone('fooValue');   // WHERE payment_zone = 'fooValue'
     * $query->filterByPaymentZone('%fooValue%', Criteria::LIKE); // WHERE payment_zone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentZone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentZone($paymentZone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentZone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_ZONE, $paymentZone, $comparison);
    }

    /**
     * Filter the query on the payment_zone_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentZoneId(1234); // WHERE payment_zone_id = 1234
     * $query->filterByPaymentZoneId(array(12, 34)); // WHERE payment_zone_id IN (12, 34)
     * $query->filterByPaymentZoneId(array('min' => 12)); // WHERE payment_zone_id > 12
     * </code>
     *
     * @param     mixed $paymentZoneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentZoneId($paymentZoneId = null, $comparison = null)
    {
        if (is_array($paymentZoneId)) {
            $useMinMax = false;
            if (isset($paymentZoneId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_ZONE_ID, $paymentZoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentZoneId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_ZONE_ID, $paymentZoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_ZONE_ID, $paymentZoneId, $comparison);
    }

    /**
     * Filter the query on the payment_address_format column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentAddressFormat('fooValue');   // WHERE payment_address_format = 'fooValue'
     * $query->filterByPaymentAddressFormat('%fooValue%', Criteria::LIKE); // WHERE payment_address_format LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentAddressFormat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentAddressFormat($paymentAddressFormat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentAddressFormat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_ADDRESS_FORMAT, $paymentAddressFormat, $comparison);
    }

    /**
     * Filter the query on the payment_custom_field column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentCustomField('fooValue');   // WHERE payment_custom_field = 'fooValue'
     * $query->filterByPaymentCustomField('%fooValue%', Criteria::LIKE); // WHERE payment_custom_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentCustomField The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentCustomField($paymentCustomField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentCustomField)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_CUSTOM_FIELD, $paymentCustomField, $comparison);
    }

    /**
     * Filter the query on the payment_method column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentMethod('fooValue');   // WHERE payment_method = 'fooValue'
     * $query->filterByPaymentMethod('%fooValue%', Criteria::LIKE); // WHERE payment_method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentMethod The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentMethod($paymentMethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentMethod)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_METHOD, $paymentMethod, $comparison);
    }

    /**
     * Filter the query on the payment_code column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentCode('fooValue');   // WHERE payment_code = 'fooValue'
     * $query->filterByPaymentCode('%fooValue%', Criteria::LIKE); // WHERE payment_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentCode($paymentCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_PAYMENT_CODE, $paymentCode, $comparison);
    }

    /**
     * Filter the query on the shipping_firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingFirstname('fooValue');   // WHERE shipping_firstname = 'fooValue'
     * $query->filterByShippingFirstname('%fooValue%', Criteria::LIKE); // WHERE shipping_firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingFirstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingFirstname($shippingFirstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingFirstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_FIRSTNAME, $shippingFirstname, $comparison);
    }

    /**
     * Filter the query on the shipping_lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingLastname('fooValue');   // WHERE shipping_lastname = 'fooValue'
     * $query->filterByShippingLastname('%fooValue%', Criteria::LIKE); // WHERE shipping_lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingLastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingLastname($shippingLastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingLastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_LASTNAME, $shippingLastname, $comparison);
    }

    /**
     * Filter the query on the shipping_company column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCompany('fooValue');   // WHERE shipping_company = 'fooValue'
     * $query->filterByShippingCompany('%fooValue%', Criteria::LIKE); // WHERE shipping_company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCompany The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingCompany($shippingCompany = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCompany)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_COMPANY, $shippingCompany, $comparison);
    }

    /**
     * Filter the query on the shipping_address_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingAddress1('fooValue');   // WHERE shipping_address_1 = 'fooValue'
     * $query->filterByShippingAddress1('%fooValue%', Criteria::LIKE); // WHERE shipping_address_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingAddress1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingAddress1($shippingAddress1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingAddress1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_ADDRESS_1, $shippingAddress1, $comparison);
    }

    /**
     * Filter the query on the shipping_address_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingAddress2('fooValue');   // WHERE shipping_address_2 = 'fooValue'
     * $query->filterByShippingAddress2('%fooValue%', Criteria::LIKE); // WHERE shipping_address_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingAddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingAddress2($shippingAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingAddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_ADDRESS_2, $shippingAddress2, $comparison);
    }

    /**
     * Filter the query on the shipping_city column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCity('fooValue');   // WHERE shipping_city = 'fooValue'
     * $query->filterByShippingCity('%fooValue%', Criteria::LIKE); // WHERE shipping_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingCity($shippingCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_CITY, $shippingCity, $comparison);
    }

    /**
     * Filter the query on the shipping_postcode column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingPostcode('fooValue');   // WHERE shipping_postcode = 'fooValue'
     * $query->filterByShippingPostcode('%fooValue%', Criteria::LIKE); // WHERE shipping_postcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingPostcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingPostcode($shippingPostcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingPostcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_POSTCODE, $shippingPostcode, $comparison);
    }

    /**
     * Filter the query on the shipping_country column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCountry('fooValue');   // WHERE shipping_country = 'fooValue'
     * $query->filterByShippingCountry('%fooValue%', Criteria::LIKE); // WHERE shipping_country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingCountry($shippingCountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_COUNTRY, $shippingCountry, $comparison);
    }

    /**
     * Filter the query on the shipping_country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCountryId(1234); // WHERE shipping_country_id = 1234
     * $query->filterByShippingCountryId(array(12, 34)); // WHERE shipping_country_id IN (12, 34)
     * $query->filterByShippingCountryId(array('min' => 12)); // WHERE shipping_country_id > 12
     * </code>
     *
     * @param     mixed $shippingCountryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingCountryId($shippingCountryId = null, $comparison = null)
    {
        if (is_array($shippingCountryId)) {
            $useMinMax = false;
            if (isset($shippingCountryId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_COUNTRY_ID, $shippingCountryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingCountryId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_COUNTRY_ID, $shippingCountryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_COUNTRY_ID, $shippingCountryId, $comparison);
    }

    /**
     * Filter the query on the shipping_zone column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingZone('fooValue');   // WHERE shipping_zone = 'fooValue'
     * $query->filterByShippingZone('%fooValue%', Criteria::LIKE); // WHERE shipping_zone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingZone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingZone($shippingZone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingZone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_ZONE, $shippingZone, $comparison);
    }

    /**
     * Filter the query on the shipping_zone_id column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingZoneId(1234); // WHERE shipping_zone_id = 1234
     * $query->filterByShippingZoneId(array(12, 34)); // WHERE shipping_zone_id IN (12, 34)
     * $query->filterByShippingZoneId(array('min' => 12)); // WHERE shipping_zone_id > 12
     * </code>
     *
     * @param     mixed $shippingZoneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingZoneId($shippingZoneId = null, $comparison = null)
    {
        if (is_array($shippingZoneId)) {
            $useMinMax = false;
            if (isset($shippingZoneId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_ZONE_ID, $shippingZoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingZoneId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_ZONE_ID, $shippingZoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_ZONE_ID, $shippingZoneId, $comparison);
    }

    /**
     * Filter the query on the shipping_address_format column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingAddressFormat('fooValue');   // WHERE shipping_address_format = 'fooValue'
     * $query->filterByShippingAddressFormat('%fooValue%', Criteria::LIKE); // WHERE shipping_address_format LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingAddressFormat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingAddressFormat($shippingAddressFormat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingAddressFormat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_ADDRESS_FORMAT, $shippingAddressFormat, $comparison);
    }

    /**
     * Filter the query on the shipping_custom_field column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCustomField('fooValue');   // WHERE shipping_custom_field = 'fooValue'
     * $query->filterByShippingCustomField('%fooValue%', Criteria::LIKE); // WHERE shipping_custom_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCustomField The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingCustomField($shippingCustomField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCustomField)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_CUSTOM_FIELD, $shippingCustomField, $comparison);
    }

    /**
     * Filter the query on the shipping_method column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingMethod('fooValue');   // WHERE shipping_method = 'fooValue'
     * $query->filterByShippingMethod('%fooValue%', Criteria::LIKE); // WHERE shipping_method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingMethod The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingMethod($shippingMethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingMethod)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_METHOD, $shippingMethod, $comparison);
    }

    /**
     * Filter the query on the shipping_code column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCode('fooValue');   // WHERE shipping_code = 'fooValue'
     * $query->filterByShippingCode('%fooValue%', Criteria::LIKE); // WHERE shipping_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByShippingCode($shippingCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_SHIPPING_CODE, $shippingCode, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the order_status_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderStatusId(1234); // WHERE order_status_id = 1234
     * $query->filterByOrderStatusId(array(12, 34)); // WHERE order_status_id IN (12, 34)
     * $query->filterByOrderStatusId(array('min' => 12)); // WHERE order_status_id > 12
     * </code>
     *
     * @param     mixed $orderStatusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByOrderStatusId($orderStatusId = null, $comparison = null)
    {
        if (is_array($orderStatusId)) {
            $useMinMax = false;
            if (isset($orderStatusId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_ORDER_STATUS_ID, $orderStatusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderStatusId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_ORDER_STATUS_ID, $orderStatusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_ORDER_STATUS_ID, $orderStatusId, $comparison);
    }

    /**
     * Filter the query on the affiliate_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAffiliateId(1234); // WHERE affiliate_id = 1234
     * $query->filterByAffiliateId(array(12, 34)); // WHERE affiliate_id IN (12, 34)
     * $query->filterByAffiliateId(array('min' => 12)); // WHERE affiliate_id > 12
     * </code>
     *
     * @param     mixed $affiliateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByAffiliateId($affiliateId = null, $comparison = null)
    {
        if (is_array($affiliateId)) {
            $useMinMax = false;
            if (isset($affiliateId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_AFFILIATE_ID, $affiliateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($affiliateId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_AFFILIATE_ID, $affiliateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_AFFILIATE_ID, $affiliateId, $comparison);
    }

    /**
     * Filter the query on the commission column
     *
     * Example usage:
     * <code>
     * $query->filterByCommission(1234); // WHERE commission = 1234
     * $query->filterByCommission(array(12, 34)); // WHERE commission IN (12, 34)
     * $query->filterByCommission(array('min' => 12)); // WHERE commission > 12
     * </code>
     *
     * @param     mixed $commission The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByCommission($commission = null, $comparison = null)
    {
        if (is_array($commission)) {
            $useMinMax = false;
            if (isset($commission['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_COMMISSION, $commission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($commission['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_COMMISSION, $commission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_COMMISSION, $commission, $comparison);
    }

    /**
     * Filter the query on the marketing_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingId(1234); // WHERE marketing_id = 1234
     * $query->filterByMarketingId(array(12, 34)); // WHERE marketing_id IN (12, 34)
     * $query->filterByMarketingId(array('min' => 12)); // WHERE marketing_id > 12
     * </code>
     *
     * @param     mixed $marketingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByMarketingId($marketingId = null, $comparison = null)
    {
        if (is_array($marketingId)) {
            $useMinMax = false;
            if (isset($marketingId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_MARKETING_ID, $marketingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_MARKETING_ID, $marketingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_MARKETING_ID, $marketingId, $comparison);
    }

    /**
     * Filter the query on the tracking column
     *
     * Example usage:
     * <code>
     * $query->filterByTracking('fooValue');   // WHERE tracking = 'fooValue'
     * $query->filterByTracking('%fooValue%', Criteria::LIKE); // WHERE tracking LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tracking The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByTracking($tracking = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tracking)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_TRACKING, $tracking, $comparison);
    }

    /**
     * Filter the query on the language_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguageId(1234); // WHERE language_id = 1234
     * $query->filterByLanguageId(array(12, 34)); // WHERE language_id IN (12, 34)
     * $query->filterByLanguageId(array('min' => 12)); // WHERE language_id > 12
     * </code>
     *
     * @param     mixed $languageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
    }

    /**
     * Filter the query on the currency_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrencyId(1234); // WHERE currency_id = 1234
     * $query->filterByCurrencyId(array(12, 34)); // WHERE currency_id IN (12, 34)
     * $query->filterByCurrencyId(array('min' => 12)); // WHERE currency_id > 12
     * </code>
     *
     * @param     mixed $currencyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByCurrencyId($currencyId = null, $comparison = null)
    {
        if (is_array($currencyId)) {
            $useMinMax = false;
            if (isset($currencyId['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_CURRENCY_ID, $currencyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currencyId['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_CURRENCY_ID, $currencyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_CURRENCY_ID, $currencyId, $comparison);
    }

    /**
     * Filter the query on the currency_code column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrencyCode('fooValue');   // WHERE currency_code = 'fooValue'
     * $query->filterByCurrencyCode('%fooValue%', Criteria::LIKE); // WHERE currency_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $currencyCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByCurrencyCode($currencyCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($currencyCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_CURRENCY_CODE, $currencyCode, $comparison);
    }

    /**
     * Filter the query on the currency_value column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrencyValue(1234); // WHERE currency_value = 1234
     * $query->filterByCurrencyValue(array(12, 34)); // WHERE currency_value IN (12, 34)
     * $query->filterByCurrencyValue(array('min' => 12)); // WHERE currency_value > 12
     * </code>
     *
     * @param     mixed $currencyValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByCurrencyValue($currencyValue = null, $comparison = null)
    {
        if (is_array($currencyValue)) {
            $useMinMax = false;
            if (isset($currencyValue['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_CURRENCY_VALUE, $currencyValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currencyValue['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_CURRENCY_VALUE, $currencyValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_CURRENCY_VALUE, $currencyValue, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%', Criteria::LIKE); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_IP, $ip, $comparison);
    }

    /**
     * Filter the query on the forwarded_ip column
     *
     * Example usage:
     * <code>
     * $query->filterByForwardedIp('fooValue');   // WHERE forwarded_ip = 'fooValue'
     * $query->filterByForwardedIp('%fooValue%', Criteria::LIKE); // WHERE forwarded_ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $forwardedIp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByForwardedIp($forwardedIp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($forwardedIp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_FORWARDED_IP, $forwardedIp, $comparison);
    }

    /**
     * Filter the query on the user_agent column
     *
     * Example usage:
     * <code>
     * $query->filterByUserAgent('fooValue');   // WHERE user_agent = 'fooValue'
     * $query->filterByUserAgent('%fooValue%', Criteria::LIKE); // WHERE user_agent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userAgent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByUserAgent($userAgent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userAgent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_USER_AGENT, $userAgent, $comparison);
    }

    /**
     * Filter the query on the accept_language column
     *
     * Example usage:
     * <code>
     * $query->filterByAcceptLanguage('fooValue');   // WHERE accept_language = 'fooValue'
     * $query->filterByAcceptLanguage('%fooValue%', Criteria::LIKE); // WHERE accept_language LIKE '%fooValue%'
     * </code>
     *
     * @param     string $acceptLanguage The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByAcceptLanguage($acceptLanguage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($acceptLanguage)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_ACCEPT_LANGUAGE, $acceptLanguage, $comparison);
    }

    /**
     * Filter the query on the date_added column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAdded('2011-03-14'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded('now'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded(array('max' => 'yesterday')); // WHERE date_added > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAdded The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified('2011-03-14'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified('now'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified(array('max' => 'yesterday')); // WHERE date_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcOrderTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOrder $ocOrder Object to remove from the list of results
     *
     * @return $this|ChildOcOrderQuery The current query, for fluid interface
     */
    public function prune($ocOrder = null)
    {
        if ($ocOrder) {
            $this->addUsingAlias(OcOrderTableMap::COL_ORDER_ID, $ocOrder->getOrderId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOrderTableMap::clearInstancePool();
            OcOrderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOrderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOrderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOrderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOrderQuery
