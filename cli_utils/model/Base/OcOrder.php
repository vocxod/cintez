<?php

namespace Base;

use \OcOrderQuery as ChildOcOrderQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\OcOrderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'oc_order' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class OcOrder implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OcOrderTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the order_id field.
     *
     * @var        int
     */
    protected $order_id;

    /**
     * The value for the invoice_no field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $invoice_no;

    /**
     * The value for the invoice_prefix field.
     *
     * @var        string
     */
    protected $invoice_prefix;

    /**
     * The value for the store_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $store_id;

    /**
     * The value for the store_name field.
     *
     * @var        string
     */
    protected $store_name;

    /**
     * The value for the store_url field.
     *
     * @var        string
     */
    protected $store_url;

    /**
     * The value for the customer_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $customer_id;

    /**
     * The value for the customer_group_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $customer_group_id;

    /**
     * The value for the firstname field.
     *
     * @var        string
     */
    protected $firstname;

    /**
     * The value for the lastname field.
     *
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the telephone field.
     *
     * @var        string
     */
    protected $telephone;

    /**
     * The value for the fax field.
     *
     * @var        string
     */
    protected $fax;

    /**
     * The value for the custom_field field.
     *
     * @var        string
     */
    protected $custom_field;

    /**
     * The value for the payment_firstname field.
     *
     * @var        string
     */
    protected $payment_firstname;

    /**
     * The value for the payment_lastname field.
     *
     * @var        string
     */
    protected $payment_lastname;

    /**
     * The value for the payment_company field.
     *
     * @var        string
     */
    protected $payment_company;

    /**
     * The value for the payment_address_1 field.
     *
     * @var        string
     */
    protected $payment_address_1;

    /**
     * The value for the payment_address_2 field.
     *
     * @var        string
     */
    protected $payment_address_2;

    /**
     * The value for the payment_city field.
     *
     * @var        string
     */
    protected $payment_city;

    /**
     * The value for the payment_postcode field.
     *
     * @var        string
     */
    protected $payment_postcode;

    /**
     * The value for the payment_country field.
     *
     * @var        string
     */
    protected $payment_country;

    /**
     * The value for the payment_country_id field.
     *
     * @var        int
     */
    protected $payment_country_id;

    /**
     * The value for the payment_zone field.
     *
     * @var        string
     */
    protected $payment_zone;

    /**
     * The value for the payment_zone_id field.
     *
     * @var        int
     */
    protected $payment_zone_id;

    /**
     * The value for the payment_address_format field.
     *
     * @var        string
     */
    protected $payment_address_format;

    /**
     * The value for the payment_custom_field field.
     *
     * @var        string
     */
    protected $payment_custom_field;

    /**
     * The value for the payment_method field.
     *
     * @var        string
     */
    protected $payment_method;

    /**
     * The value for the payment_code field.
     *
     * @var        string
     */
    protected $payment_code;

    /**
     * The value for the shipping_firstname field.
     *
     * @var        string
     */
    protected $shipping_firstname;

    /**
     * The value for the shipping_lastname field.
     *
     * @var        string
     */
    protected $shipping_lastname;

    /**
     * The value for the shipping_company field.
     *
     * @var        string
     */
    protected $shipping_company;

    /**
     * The value for the shipping_address_1 field.
     *
     * @var        string
     */
    protected $shipping_address_1;

    /**
     * The value for the shipping_address_2 field.
     *
     * @var        string
     */
    protected $shipping_address_2;

    /**
     * The value for the shipping_city field.
     *
     * @var        string
     */
    protected $shipping_city;

    /**
     * The value for the shipping_postcode field.
     *
     * @var        string
     */
    protected $shipping_postcode;

    /**
     * The value for the shipping_country field.
     *
     * @var        string
     */
    protected $shipping_country;

    /**
     * The value for the shipping_country_id field.
     *
     * @var        int
     */
    protected $shipping_country_id;

    /**
     * The value for the shipping_zone field.
     *
     * @var        string
     */
    protected $shipping_zone;

    /**
     * The value for the shipping_zone_id field.
     *
     * @var        int
     */
    protected $shipping_zone_id;

    /**
     * The value for the shipping_address_format field.
     *
     * @var        string
     */
    protected $shipping_address_format;

    /**
     * The value for the shipping_custom_field field.
     *
     * @var        string
     */
    protected $shipping_custom_field;

    /**
     * The value for the shipping_method field.
     *
     * @var        string
     */
    protected $shipping_method;

    /**
     * The value for the shipping_code field.
     *
     * @var        string
     */
    protected $shipping_code;

    /**
     * The value for the comment field.
     *
     * @var        string
     */
    protected $comment;

    /**
     * The value for the total field.
     *
     * Note: this column has a database default value of: '0.0000'
     * @var        string
     */
    protected $total;

    /**
     * The value for the order_status_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $order_status_id;

    /**
     * The value for the affiliate_id field.
     *
     * @var        int
     */
    protected $affiliate_id;

    /**
     * The value for the commission field.
     *
     * @var        string
     */
    protected $commission;

    /**
     * The value for the marketing_id field.
     *
     * @var        int
     */
    protected $marketing_id;

    /**
     * The value for the tracking field.
     *
     * @var        string
     */
    protected $tracking;

    /**
     * The value for the language_id field.
     *
     * @var        int
     */
    protected $language_id;

    /**
     * The value for the currency_id field.
     *
     * @var        int
     */
    protected $currency_id;

    /**
     * The value for the currency_code field.
     *
     * @var        string
     */
    protected $currency_code;

    /**
     * The value for the currency_value field.
     *
     * Note: this column has a database default value of: '1.00000000'
     * @var        string
     */
    protected $currency_value;

    /**
     * The value for the ip field.
     *
     * @var        string
     */
    protected $ip;

    /**
     * The value for the forwarded_ip field.
     *
     * @var        string
     */
    protected $forwarded_ip;

    /**
     * The value for the user_agent field.
     *
     * @var        string
     */
    protected $user_agent;

    /**
     * The value for the accept_language field.
     *
     * @var        string
     */
    protected $accept_language;

    /**
     * The value for the date_added field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $date_added;

    /**
     * The value for the date_modified field.
     *
     * Note: this column has a database default value of: NULL
     * @var        DateTime
     */
    protected $date_modified;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->invoice_no = 0;
        $this->store_id = 0;
        $this->customer_id = 0;
        $this->customer_group_id = 0;
        $this->total = '0.0000';
        $this->order_status_id = 0;
        $this->currency_value = '1.00000000';
        $this->date_modified = PropelDateTime::newInstance(NULL, null, 'DateTime');
    }

    /**
     * Initializes internal state of Base\OcOrder object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>OcOrder</code> instance.  If
     * <code>obj</code> is an instance of <code>OcOrder</code>, delegates to
     * <code>equals(OcOrder)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|OcOrder The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [order_id] column value.
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Get the [invoice_no] column value.
     *
     * @return int
     */
    public function getInvoiceNo()
    {
        return $this->invoice_no;
    }

    /**
     * Get the [invoice_prefix] column value.
     *
     * @return string
     */
    public function getInvoicePrefix()
    {
        return $this->invoice_prefix;
    }

    /**
     * Get the [store_id] column value.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->store_id;
    }

    /**
     * Get the [store_name] column value.
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->store_name;
    }

    /**
     * Get the [store_url] column value.
     *
     * @return string
     */
    public function getStoreUrl()
    {
        return $this->store_url;
    }

    /**
     * Get the [customer_id] column value.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Get the [customer_group_id] column value.
     *
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->customer_group_id;
    }

    /**
     * Get the [firstname] column value.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [telephone] column value.
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Get the [fax] column value.
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Get the [custom_field] column value.
     *
     * @return string
     */
    public function getCustomField()
    {
        return $this->custom_field;
    }

    /**
     * Get the [payment_firstname] column value.
     *
     * @return string
     */
    public function getPaymentFirstname()
    {
        return $this->payment_firstname;
    }

    /**
     * Get the [payment_lastname] column value.
     *
     * @return string
     */
    public function getPaymentLastname()
    {
        return $this->payment_lastname;
    }

    /**
     * Get the [payment_company] column value.
     *
     * @return string
     */
    public function getPaymentCompany()
    {
        return $this->payment_company;
    }

    /**
     * Get the [payment_address_1] column value.
     *
     * @return string
     */
    public function getPaymentAddress1()
    {
        return $this->payment_address_1;
    }

    /**
     * Get the [payment_address_2] column value.
     *
     * @return string
     */
    public function getPaymentAddress2()
    {
        return $this->payment_address_2;
    }

    /**
     * Get the [payment_city] column value.
     *
     * @return string
     */
    public function getPaymentCity()
    {
        return $this->payment_city;
    }

    /**
     * Get the [payment_postcode] column value.
     *
     * @return string
     */
    public function getPaymentPostcode()
    {
        return $this->payment_postcode;
    }

    /**
     * Get the [payment_country] column value.
     *
     * @return string
     */
    public function getPaymentCountry()
    {
        return $this->payment_country;
    }

    /**
     * Get the [payment_country_id] column value.
     *
     * @return int
     */
    public function getPaymentCountryId()
    {
        return $this->payment_country_id;
    }

    /**
     * Get the [payment_zone] column value.
     *
     * @return string
     */
    public function getPaymentZone()
    {
        return $this->payment_zone;
    }

    /**
     * Get the [payment_zone_id] column value.
     *
     * @return int
     */
    public function getPaymentZoneId()
    {
        return $this->payment_zone_id;
    }

    /**
     * Get the [payment_address_format] column value.
     *
     * @return string
     */
    public function getPaymentAddressFormat()
    {
        return $this->payment_address_format;
    }

    /**
     * Get the [payment_custom_field] column value.
     *
     * @return string
     */
    public function getPaymentCustomField()
    {
        return $this->payment_custom_field;
    }

    /**
     * Get the [payment_method] column value.
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * Get the [payment_code] column value.
     *
     * @return string
     */
    public function getPaymentCode()
    {
        return $this->payment_code;
    }

    /**
     * Get the [shipping_firstname] column value.
     *
     * @return string
     */
    public function getShippingFirstname()
    {
        return $this->shipping_firstname;
    }

    /**
     * Get the [shipping_lastname] column value.
     *
     * @return string
     */
    public function getShippingLastname()
    {
        return $this->shipping_lastname;
    }

    /**
     * Get the [shipping_company] column value.
     *
     * @return string
     */
    public function getShippingCompany()
    {
        return $this->shipping_company;
    }

    /**
     * Get the [shipping_address_1] column value.
     *
     * @return string
     */
    public function getShippingAddress1()
    {
        return $this->shipping_address_1;
    }

    /**
     * Get the [shipping_address_2] column value.
     *
     * @return string
     */
    public function getShippingAddress2()
    {
        return $this->shipping_address_2;
    }

    /**
     * Get the [shipping_city] column value.
     *
     * @return string
     */
    public function getShippingCity()
    {
        return $this->shipping_city;
    }

    /**
     * Get the [shipping_postcode] column value.
     *
     * @return string
     */
    public function getShippingPostcode()
    {
        return $this->shipping_postcode;
    }

    /**
     * Get the [shipping_country] column value.
     *
     * @return string
     */
    public function getShippingCountry()
    {
        return $this->shipping_country;
    }

    /**
     * Get the [shipping_country_id] column value.
     *
     * @return int
     */
    public function getShippingCountryId()
    {
        return $this->shipping_country_id;
    }

    /**
     * Get the [shipping_zone] column value.
     *
     * @return string
     */
    public function getShippingZone()
    {
        return $this->shipping_zone;
    }

    /**
     * Get the [shipping_zone_id] column value.
     *
     * @return int
     */
    public function getShippingZoneId()
    {
        return $this->shipping_zone_id;
    }

    /**
     * Get the [shipping_address_format] column value.
     *
     * @return string
     */
    public function getShippingAddressFormat()
    {
        return $this->shipping_address_format;
    }

    /**
     * Get the [shipping_custom_field] column value.
     *
     * @return string
     */
    public function getShippingCustomField()
    {
        return $this->shipping_custom_field;
    }

    /**
     * Get the [shipping_method] column value.
     *
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shipping_method;
    }

    /**
     * Get the [shipping_code] column value.
     *
     * @return string
     */
    public function getShippingCode()
    {
        return $this->shipping_code;
    }

    /**
     * Get the [comment] column value.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [order_status_id] column value.
     *
     * @return int
     */
    public function getOrderStatusId()
    {
        return $this->order_status_id;
    }

    /**
     * Get the [affiliate_id] column value.
     *
     * @return int
     */
    public function getAffiliateId()
    {
        return $this->affiliate_id;
    }

    /**
     * Get the [commission] column value.
     *
     * @return string
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Get the [marketing_id] column value.
     *
     * @return int
     */
    public function getMarketingId()
    {
        return $this->marketing_id;
    }

    /**
     * Get the [tracking] column value.
     *
     * @return string
     */
    public function getTracking()
    {
        return $this->tracking;
    }

    /**
     * Get the [language_id] column value.
     *
     * @return int
     */
    public function getLanguageId()
    {
        return $this->language_id;
    }

    /**
     * Get the [currency_id] column value.
     *
     * @return int
     */
    public function getCurrencyId()
    {
        return $this->currency_id;
    }

    /**
     * Get the [currency_code] column value.
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * Get the [currency_value] column value.
     *
     * @return string
     */
    public function getCurrencyValue()
    {
        return $this->currency_value;
    }

    /**
     * Get the [ip] column value.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the [forwarded_ip] column value.
     *
     * @return string
     */
    public function getForwardedIp()
    {
        return $this->forwarded_ip;
    }

    /**
     * Get the [user_agent] column value.
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * Get the [accept_language] column value.
     *
     * @return string
     */
    public function getAcceptLanguage()
    {
        return $this->accept_language;
    }

    /**
     * Get the [optionally formatted] temporal [date_added] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateAdded($format = NULL)
    {
        if ($format === null) {
            return $this->date_added;
        } else {
            return $this->date_added instanceof \DateTimeInterface ? $this->date_added->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [date_modified] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateModified($format = NULL)
    {
        if ($format === null) {
            return $this->date_modified;
        } else {
            return $this->date_modified instanceof \DateTimeInterface ? $this->date_modified->format($format) : null;
        }
    }

    /**
     * Set the value of [order_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setOrderId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_id !== $v) {
            $this->order_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_ORDER_ID] = true;
        }

        return $this;
    } // setOrderId()

    /**
     * Set the value of [invoice_no] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setInvoiceNo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->invoice_no !== $v) {
            $this->invoice_no = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_INVOICE_NO] = true;
        }

        return $this;
    } // setInvoiceNo()

    /**
     * Set the value of [invoice_prefix] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setInvoicePrefix($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->invoice_prefix !== $v) {
            $this->invoice_prefix = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_INVOICE_PREFIX] = true;
        }

        return $this;
    } // setInvoicePrefix()

    /**
     * Set the value of [store_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setStoreId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->store_id !== $v) {
            $this->store_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_STORE_ID] = true;
        }

        return $this;
    } // setStoreId()

    /**
     * Set the value of [store_name] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setStoreName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->store_name !== $v) {
            $this->store_name = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_STORE_NAME] = true;
        }

        return $this;
    } // setStoreName()

    /**
     * Set the value of [store_url] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setStoreUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->store_url !== $v) {
            $this->store_url = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_STORE_URL] = true;
        }

        return $this;
    } // setStoreUrl()

    /**
     * Set the value of [customer_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setCustomerId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->customer_id !== $v) {
            $this->customer_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_CUSTOMER_ID] = true;
        }

        return $this;
    } // setCustomerId()

    /**
     * Set the value of [customer_group_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setCustomerGroupId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->customer_group_id !== $v) {
            $this->customer_group_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_CUSTOMER_GROUP_ID] = true;
        }

        return $this;
    } // setCustomerGroupId()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_FIRSTNAME] = true;
        }

        return $this;
    } // setFirstname()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_LASTNAME] = true;
        }

        return $this;
    } // setLastname()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [telephone] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setTelephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->telephone !== $v) {
            $this->telephone = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_TELEPHONE] = true;
        }

        return $this;
    } // setTelephone()

    /**
     * Set the value of [fax] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setFax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax !== $v) {
            $this->fax = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_FAX] = true;
        }

        return $this;
    } // setFax()

    /**
     * Set the value of [custom_field] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setCustomField($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custom_field !== $v) {
            $this->custom_field = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_CUSTOM_FIELD] = true;
        }

        return $this;
    } // setCustomField()

    /**
     * Set the value of [payment_firstname] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_firstname !== $v) {
            $this->payment_firstname = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_FIRSTNAME] = true;
        }

        return $this;
    } // setPaymentFirstname()

    /**
     * Set the value of [payment_lastname] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_lastname !== $v) {
            $this->payment_lastname = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_LASTNAME] = true;
        }

        return $this;
    } // setPaymentLastname()

    /**
     * Set the value of [payment_company] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentCompany($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_company !== $v) {
            $this->payment_company = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_COMPANY] = true;
        }

        return $this;
    } // setPaymentCompany()

    /**
     * Set the value of [payment_address_1] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentAddress1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_address_1 !== $v) {
            $this->payment_address_1 = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_ADDRESS_1] = true;
        }

        return $this;
    } // setPaymentAddress1()

    /**
     * Set the value of [payment_address_2] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_address_2 !== $v) {
            $this->payment_address_2 = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_ADDRESS_2] = true;
        }

        return $this;
    } // setPaymentAddress2()

    /**
     * Set the value of [payment_city] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_city !== $v) {
            $this->payment_city = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_CITY] = true;
        }

        return $this;
    } // setPaymentCity()

    /**
     * Set the value of [payment_postcode] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentPostcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_postcode !== $v) {
            $this->payment_postcode = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_POSTCODE] = true;
        }

        return $this;
    } // setPaymentPostcode()

    /**
     * Set the value of [payment_country] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentCountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_country !== $v) {
            $this->payment_country = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_COUNTRY] = true;
        }

        return $this;
    } // setPaymentCountry()

    /**
     * Set the value of [payment_country_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentCountryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->payment_country_id !== $v) {
            $this->payment_country_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_COUNTRY_ID] = true;
        }

        return $this;
    } // setPaymentCountryId()

    /**
     * Set the value of [payment_zone] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentZone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_zone !== $v) {
            $this->payment_zone = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_ZONE] = true;
        }

        return $this;
    } // setPaymentZone()

    /**
     * Set the value of [payment_zone_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentZoneId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->payment_zone_id !== $v) {
            $this->payment_zone_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_ZONE_ID] = true;
        }

        return $this;
    } // setPaymentZoneId()

    /**
     * Set the value of [payment_address_format] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentAddressFormat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_address_format !== $v) {
            $this->payment_address_format = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_ADDRESS_FORMAT] = true;
        }

        return $this;
    } // setPaymentAddressFormat()

    /**
     * Set the value of [payment_custom_field] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentCustomField($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_custom_field !== $v) {
            $this->payment_custom_field = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_CUSTOM_FIELD] = true;
        }

        return $this;
    } // setPaymentCustomField()

    /**
     * Set the value of [payment_method] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentMethod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_method !== $v) {
            $this->payment_method = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_METHOD] = true;
        }

        return $this;
    } // setPaymentMethod()

    /**
     * Set the value of [payment_code] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setPaymentCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_code !== $v) {
            $this->payment_code = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_PAYMENT_CODE] = true;
        }

        return $this;
    } // setPaymentCode()

    /**
     * Set the value of [shipping_firstname] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_firstname !== $v) {
            $this->shipping_firstname = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_FIRSTNAME] = true;
        }

        return $this;
    } // setShippingFirstname()

    /**
     * Set the value of [shipping_lastname] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_lastname !== $v) {
            $this->shipping_lastname = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_LASTNAME] = true;
        }

        return $this;
    } // setShippingLastname()

    /**
     * Set the value of [shipping_company] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingCompany($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_company !== $v) {
            $this->shipping_company = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_COMPANY] = true;
        }

        return $this;
    } // setShippingCompany()

    /**
     * Set the value of [shipping_address_1] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingAddress1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_address_1 !== $v) {
            $this->shipping_address_1 = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_ADDRESS_1] = true;
        }

        return $this;
    } // setShippingAddress1()

    /**
     * Set the value of [shipping_address_2] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_address_2 !== $v) {
            $this->shipping_address_2 = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_ADDRESS_2] = true;
        }

        return $this;
    } // setShippingAddress2()

    /**
     * Set the value of [shipping_city] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_city !== $v) {
            $this->shipping_city = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_CITY] = true;
        }

        return $this;
    } // setShippingCity()

    /**
     * Set the value of [shipping_postcode] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingPostcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_postcode !== $v) {
            $this->shipping_postcode = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_POSTCODE] = true;
        }

        return $this;
    } // setShippingPostcode()

    /**
     * Set the value of [shipping_country] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingCountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_country !== $v) {
            $this->shipping_country = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_COUNTRY] = true;
        }

        return $this;
    } // setShippingCountry()

    /**
     * Set the value of [shipping_country_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingCountryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->shipping_country_id !== $v) {
            $this->shipping_country_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_COUNTRY_ID] = true;
        }

        return $this;
    } // setShippingCountryId()

    /**
     * Set the value of [shipping_zone] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingZone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_zone !== $v) {
            $this->shipping_zone = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_ZONE] = true;
        }

        return $this;
    } // setShippingZone()

    /**
     * Set the value of [shipping_zone_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingZoneId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->shipping_zone_id !== $v) {
            $this->shipping_zone_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_ZONE_ID] = true;
        }

        return $this;
    } // setShippingZoneId()

    /**
     * Set the value of [shipping_address_format] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingAddressFormat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_address_format !== $v) {
            $this->shipping_address_format = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_ADDRESS_FORMAT] = true;
        }

        return $this;
    } // setShippingAddressFormat()

    /**
     * Set the value of [shipping_custom_field] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingCustomField($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_custom_field !== $v) {
            $this->shipping_custom_field = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_CUSTOM_FIELD] = true;
        }

        return $this;
    } // setShippingCustomField()

    /**
     * Set the value of [shipping_method] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingMethod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_method !== $v) {
            $this->shipping_method = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_METHOD] = true;
        }

        return $this;
    } // setShippingMethod()

    /**
     * Set the value of [shipping_code] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setShippingCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_code !== $v) {
            $this->shipping_code = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_SHIPPING_CODE] = true;
        }

        return $this;
    } // setShippingCode()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_COMMENT] = true;
        }

        return $this;
    } // setComment()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [order_status_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setOrderStatusId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_status_id !== $v) {
            $this->order_status_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_ORDER_STATUS_ID] = true;
        }

        return $this;
    } // setOrderStatusId()

    /**
     * Set the value of [affiliate_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setAffiliateId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->affiliate_id !== $v) {
            $this->affiliate_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_AFFILIATE_ID] = true;
        }

        return $this;
    } // setAffiliateId()

    /**
     * Set the value of [commission] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setCommission($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->commission !== $v) {
            $this->commission = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_COMMISSION] = true;
        }

        return $this;
    } // setCommission()

    /**
     * Set the value of [marketing_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setMarketingId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->marketing_id !== $v) {
            $this->marketing_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_MARKETING_ID] = true;
        }

        return $this;
    } // setMarketingId()

    /**
     * Set the value of [tracking] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setTracking($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tracking !== $v) {
            $this->tracking = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_TRACKING] = true;
        }

        return $this;
    } // setTracking()

    /**
     * Set the value of [language_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setLanguageId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->language_id !== $v) {
            $this->language_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_LANGUAGE_ID] = true;
        }

        return $this;
    } // setLanguageId()

    /**
     * Set the value of [currency_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setCurrencyId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->currency_id !== $v) {
            $this->currency_id = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_CURRENCY_ID] = true;
        }

        return $this;
    } // setCurrencyId()

    /**
     * Set the value of [currency_code] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setCurrencyCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->currency_code !== $v) {
            $this->currency_code = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_CURRENCY_CODE] = true;
        }

        return $this;
    } // setCurrencyCode()

    /**
     * Set the value of [currency_value] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setCurrencyValue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->currency_value !== $v) {
            $this->currency_value = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_CURRENCY_VALUE] = true;
        }

        return $this;
    } // setCurrencyValue()

    /**
     * Set the value of [ip] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setIp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ip !== $v) {
            $this->ip = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_IP] = true;
        }

        return $this;
    } // setIp()

    /**
     * Set the value of [forwarded_ip] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setForwardedIp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->forwarded_ip !== $v) {
            $this->forwarded_ip = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_FORWARDED_IP] = true;
        }

        return $this;
    } // setForwardedIp()

    /**
     * Set the value of [user_agent] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setUserAgent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_agent !== $v) {
            $this->user_agent = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_USER_AGENT] = true;
        }

        return $this;
    } // setUserAgent()

    /**
     * Set the value of [accept_language] column.
     *
     * @param string $v new value
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setAcceptLanguage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->accept_language !== $v) {
            $this->accept_language = $v;
            $this->modifiedColumns[OcOrderTableMap::COL_ACCEPT_LANGUAGE] = true;
        }

        return $this;
    } // setAcceptLanguage()

    /**
     * Sets the value of [date_added] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setDateAdded($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_added !== null || $dt !== null) {
            if ($this->date_added === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_added->format("Y-m-d H:i:s.u")) {
                $this->date_added = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OcOrderTableMap::COL_DATE_ADDED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateAdded()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\OcOrder The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ( ($dt != $this->date_modified) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s.u') === NULL) // or the entered value matches the default
                 ) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OcOrderTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->invoice_no !== 0) {
                return false;
            }

            if ($this->store_id !== 0) {
                return false;
            }

            if ($this->customer_id !== 0) {
                return false;
            }

            if ($this->customer_group_id !== 0) {
                return false;
            }

            if ($this->total !== '0.0000') {
                return false;
            }

            if ($this->order_status_id !== 0) {
                return false;
            }

            if ($this->currency_value !== '1.00000000') {
                return false;
            }

            if ($this->date_modified && $this->date_modified->format('Y-m-d H:i:s.u') !== NULL) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OcOrderTableMap::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->order_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OcOrderTableMap::translateFieldName('InvoiceNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_no = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OcOrderTableMap::translateFieldName('InvoicePrefix', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_prefix = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OcOrderTableMap::translateFieldName('StoreId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->store_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OcOrderTableMap::translateFieldName('StoreName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->store_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OcOrderTableMap::translateFieldName('StoreUrl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->store_url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OcOrderTableMap::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OcOrderTableMap::translateFieldName('CustomerGroupId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_group_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OcOrderTableMap::translateFieldName('Firstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OcOrderTableMap::translateFieldName('Lastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OcOrderTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OcOrderTableMap::translateFieldName('Telephone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->telephone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OcOrderTableMap::translateFieldName('Fax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OcOrderTableMap::translateFieldName('CustomField', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custom_field = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OcOrderTableMap::translateFieldName('PaymentFirstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OcOrderTableMap::translateFieldName('PaymentLastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OcOrderTableMap::translateFieldName('PaymentCompany', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_company = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OcOrderTableMap::translateFieldName('PaymentAddress1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_address_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OcOrderTableMap::translateFieldName('PaymentAddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_address_2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OcOrderTableMap::translateFieldName('PaymentCity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : OcOrderTableMap::translateFieldName('PaymentPostcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_postcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : OcOrderTableMap::translateFieldName('PaymentCountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_country = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : OcOrderTableMap::translateFieldName('PaymentCountryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_country_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : OcOrderTableMap::translateFieldName('PaymentZone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_zone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : OcOrderTableMap::translateFieldName('PaymentZoneId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_zone_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : OcOrderTableMap::translateFieldName('PaymentAddressFormat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_address_format = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : OcOrderTableMap::translateFieldName('PaymentCustomField', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_custom_field = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : OcOrderTableMap::translateFieldName('PaymentMethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_method = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : OcOrderTableMap::translateFieldName('PaymentCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : OcOrderTableMap::translateFieldName('ShippingFirstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : OcOrderTableMap::translateFieldName('ShippingLastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : OcOrderTableMap::translateFieldName('ShippingCompany', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_company = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : OcOrderTableMap::translateFieldName('ShippingAddress1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_address_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : OcOrderTableMap::translateFieldName('ShippingAddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_address_2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : OcOrderTableMap::translateFieldName('ShippingCity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : OcOrderTableMap::translateFieldName('ShippingPostcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_postcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : OcOrderTableMap::translateFieldName('ShippingCountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_country = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : OcOrderTableMap::translateFieldName('ShippingCountryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_country_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : OcOrderTableMap::translateFieldName('ShippingZone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_zone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : OcOrderTableMap::translateFieldName('ShippingZoneId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_zone_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : OcOrderTableMap::translateFieldName('ShippingAddressFormat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_address_format = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : OcOrderTableMap::translateFieldName('ShippingCustomField', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_custom_field = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : OcOrderTableMap::translateFieldName('ShippingMethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_method = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : OcOrderTableMap::translateFieldName('ShippingCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : OcOrderTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : OcOrderTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : OcOrderTableMap::translateFieldName('OrderStatusId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->order_status_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : OcOrderTableMap::translateFieldName('AffiliateId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->affiliate_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : OcOrderTableMap::translateFieldName('Commission', TableMap::TYPE_PHPNAME, $indexType)];
            $this->commission = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : OcOrderTableMap::translateFieldName('MarketingId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->marketing_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : OcOrderTableMap::translateFieldName('Tracking', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tracking = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : OcOrderTableMap::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->language_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : OcOrderTableMap::translateFieldName('CurrencyId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->currency_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : OcOrderTableMap::translateFieldName('CurrencyCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->currency_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : OcOrderTableMap::translateFieldName('CurrencyValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->currency_value = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : OcOrderTableMap::translateFieldName('Ip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : OcOrderTableMap::translateFieldName('ForwardedIp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->forwarded_ip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : OcOrderTableMap::translateFieldName('UserAgent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_agent = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : OcOrderTableMap::translateFieldName('AcceptLanguage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->accept_language = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : OcOrderTableMap::translateFieldName('DateAdded', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_added = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : OcOrderTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 61; // 61 = OcOrderTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\OcOrder'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOcOrderQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see OcOrder::setDeleted()
     * @see OcOrder::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOcOrderQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                OcOrderTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[OcOrderTableMap::COL_ORDER_ID] = true;
        if (null !== $this->order_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OcOrderTableMap::COL_ORDER_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OcOrderTableMap::COL_ORDER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'order_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_INVOICE_NO)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_no';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_INVOICE_PREFIX)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_prefix';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_STORE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'store_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_STORE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'store_name';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_STORE_URL)) {
            $modifiedColumns[':p' . $index++]  = 'store_url';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CUSTOMER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'customer_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CUSTOMER_GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = 'customer_group_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'firstname';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'lastname';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_TELEPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'telephone';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_FAX)) {
            $modifiedColumns[':p' . $index++]  = 'fax';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CUSTOM_FIELD)) {
            $modifiedColumns[':p' . $index++]  = 'custom_field';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'payment_firstname';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'payment_lastname';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_COMPANY)) {
            $modifiedColumns[':p' . $index++]  = 'payment_company';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ADDRESS_1)) {
            $modifiedColumns[':p' . $index++]  = 'payment_address_1';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ADDRESS_2)) {
            $modifiedColumns[':p' . $index++]  = 'payment_address_2';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'payment_city';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_POSTCODE)) {
            $modifiedColumns[':p' . $index++]  = 'payment_postcode';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'payment_country';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_COUNTRY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'payment_country_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ZONE)) {
            $modifiedColumns[':p' . $index++]  = 'payment_zone';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ZONE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'payment_zone_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ADDRESS_FORMAT)) {
            $modifiedColumns[':p' . $index++]  = 'payment_address_format';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_CUSTOM_FIELD)) {
            $modifiedColumns[':p' . $index++]  = 'payment_custom_field';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_METHOD)) {
            $modifiedColumns[':p' . $index++]  = 'payment_method';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'payment_code';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_firstname';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_lastname';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_COMPANY)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_company';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ADDRESS_1)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_address_1';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ADDRESS_2)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_address_2';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_city';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_POSTCODE)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_postcode';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_country';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_COUNTRY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_country_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ZONE)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_zone';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ZONE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_zone_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ADDRESS_FORMAT)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_address_format';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_CUSTOM_FIELD)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_custom_field';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_METHOD)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_method';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'shipping_code';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_ORDER_STATUS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'order_status_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_AFFILIATE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'affiliate_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_COMMISSION)) {
            $modifiedColumns[':p' . $index++]  = 'commission';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_MARKETING_ID)) {
            $modifiedColumns[':p' . $index++]  = 'marketing_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_TRACKING)) {
            $modifiedColumns[':p' . $index++]  = 'tracking';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_LANGUAGE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'language_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CURRENCY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'currency_id';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CURRENCY_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'currency_code';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CURRENCY_VALUE)) {
            $modifiedColumns[':p' . $index++]  = 'currency_value';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_IP)) {
            $modifiedColumns[':p' . $index++]  = 'ip';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_FORWARDED_IP)) {
            $modifiedColumns[':p' . $index++]  = 'forwarded_ip';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_USER_AGENT)) {
            $modifiedColumns[':p' . $index++]  = 'user_agent';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_ACCEPT_LANGUAGE)) {
            $modifiedColumns[':p' . $index++]  = 'accept_language';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_DATE_ADDED)) {
            $modifiedColumns[':p' . $index++]  = 'date_added';
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }

        $sql = sprintf(
            'INSERT INTO oc_order (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'order_id':
                        $stmt->bindValue($identifier, $this->order_id, PDO::PARAM_INT);
                        break;
                    case 'invoice_no':
                        $stmt->bindValue($identifier, $this->invoice_no, PDO::PARAM_INT);
                        break;
                    case 'invoice_prefix':
                        $stmt->bindValue($identifier, $this->invoice_prefix, PDO::PARAM_STR);
                        break;
                    case 'store_id':
                        $stmt->bindValue($identifier, $this->store_id, PDO::PARAM_INT);
                        break;
                    case 'store_name':
                        $stmt->bindValue($identifier, $this->store_name, PDO::PARAM_STR);
                        break;
                    case 'store_url':
                        $stmt->bindValue($identifier, $this->store_url, PDO::PARAM_STR);
                        break;
                    case 'customer_id':
                        $stmt->bindValue($identifier, $this->customer_id, PDO::PARAM_INT);
                        break;
                    case 'customer_group_id':
                        $stmt->bindValue($identifier, $this->customer_group_id, PDO::PARAM_INT);
                        break;
                    case 'firstname':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case 'lastname':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'telephone':
                        $stmt->bindValue($identifier, $this->telephone, PDO::PARAM_STR);
                        break;
                    case 'fax':
                        $stmt->bindValue($identifier, $this->fax, PDO::PARAM_STR);
                        break;
                    case 'custom_field':
                        $stmt->bindValue($identifier, $this->custom_field, PDO::PARAM_STR);
                        break;
                    case 'payment_firstname':
                        $stmt->bindValue($identifier, $this->payment_firstname, PDO::PARAM_STR);
                        break;
                    case 'payment_lastname':
                        $stmt->bindValue($identifier, $this->payment_lastname, PDO::PARAM_STR);
                        break;
                    case 'payment_company':
                        $stmt->bindValue($identifier, $this->payment_company, PDO::PARAM_STR);
                        break;
                    case 'payment_address_1':
                        $stmt->bindValue($identifier, $this->payment_address_1, PDO::PARAM_STR);
                        break;
                    case 'payment_address_2':
                        $stmt->bindValue($identifier, $this->payment_address_2, PDO::PARAM_STR);
                        break;
                    case 'payment_city':
                        $stmt->bindValue($identifier, $this->payment_city, PDO::PARAM_STR);
                        break;
                    case 'payment_postcode':
                        $stmt->bindValue($identifier, $this->payment_postcode, PDO::PARAM_STR);
                        break;
                    case 'payment_country':
                        $stmt->bindValue($identifier, $this->payment_country, PDO::PARAM_STR);
                        break;
                    case 'payment_country_id':
                        $stmt->bindValue($identifier, $this->payment_country_id, PDO::PARAM_INT);
                        break;
                    case 'payment_zone':
                        $stmt->bindValue($identifier, $this->payment_zone, PDO::PARAM_STR);
                        break;
                    case 'payment_zone_id':
                        $stmt->bindValue($identifier, $this->payment_zone_id, PDO::PARAM_INT);
                        break;
                    case 'payment_address_format':
                        $stmt->bindValue($identifier, $this->payment_address_format, PDO::PARAM_STR);
                        break;
                    case 'payment_custom_field':
                        $stmt->bindValue($identifier, $this->payment_custom_field, PDO::PARAM_STR);
                        break;
                    case 'payment_method':
                        $stmt->bindValue($identifier, $this->payment_method, PDO::PARAM_STR);
                        break;
                    case 'payment_code':
                        $stmt->bindValue($identifier, $this->payment_code, PDO::PARAM_STR);
                        break;
                    case 'shipping_firstname':
                        $stmt->bindValue($identifier, $this->shipping_firstname, PDO::PARAM_STR);
                        break;
                    case 'shipping_lastname':
                        $stmt->bindValue($identifier, $this->shipping_lastname, PDO::PARAM_STR);
                        break;
                    case 'shipping_company':
                        $stmt->bindValue($identifier, $this->shipping_company, PDO::PARAM_STR);
                        break;
                    case 'shipping_address_1':
                        $stmt->bindValue($identifier, $this->shipping_address_1, PDO::PARAM_STR);
                        break;
                    case 'shipping_address_2':
                        $stmt->bindValue($identifier, $this->shipping_address_2, PDO::PARAM_STR);
                        break;
                    case 'shipping_city':
                        $stmt->bindValue($identifier, $this->shipping_city, PDO::PARAM_STR);
                        break;
                    case 'shipping_postcode':
                        $stmt->bindValue($identifier, $this->shipping_postcode, PDO::PARAM_STR);
                        break;
                    case 'shipping_country':
                        $stmt->bindValue($identifier, $this->shipping_country, PDO::PARAM_STR);
                        break;
                    case 'shipping_country_id':
                        $stmt->bindValue($identifier, $this->shipping_country_id, PDO::PARAM_INT);
                        break;
                    case 'shipping_zone':
                        $stmt->bindValue($identifier, $this->shipping_zone, PDO::PARAM_STR);
                        break;
                    case 'shipping_zone_id':
                        $stmt->bindValue($identifier, $this->shipping_zone_id, PDO::PARAM_INT);
                        break;
                    case 'shipping_address_format':
                        $stmt->bindValue($identifier, $this->shipping_address_format, PDO::PARAM_STR);
                        break;
                    case 'shipping_custom_field':
                        $stmt->bindValue($identifier, $this->shipping_custom_field, PDO::PARAM_STR);
                        break;
                    case 'shipping_method':
                        $stmt->bindValue($identifier, $this->shipping_method, PDO::PARAM_STR);
                        break;
                    case 'shipping_code':
                        $stmt->bindValue($identifier, $this->shipping_code, PDO::PARAM_STR);
                        break;
                    case 'comment':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'order_status_id':
                        $stmt->bindValue($identifier, $this->order_status_id, PDO::PARAM_INT);
                        break;
                    case 'affiliate_id':
                        $stmt->bindValue($identifier, $this->affiliate_id, PDO::PARAM_INT);
                        break;
                    case 'commission':
                        $stmt->bindValue($identifier, $this->commission, PDO::PARAM_STR);
                        break;
                    case 'marketing_id':
                        $stmt->bindValue($identifier, $this->marketing_id, PDO::PARAM_INT);
                        break;
                    case 'tracking':
                        $stmt->bindValue($identifier, $this->tracking, PDO::PARAM_STR);
                        break;
                    case 'language_id':
                        $stmt->bindValue($identifier, $this->language_id, PDO::PARAM_INT);
                        break;
                    case 'currency_id':
                        $stmt->bindValue($identifier, $this->currency_id, PDO::PARAM_INT);
                        break;
                    case 'currency_code':
                        $stmt->bindValue($identifier, $this->currency_code, PDO::PARAM_STR);
                        break;
                    case 'currency_value':
                        $stmt->bindValue($identifier, $this->currency_value, PDO::PARAM_STR);
                        break;
                    case 'ip':
                        $stmt->bindValue($identifier, $this->ip, PDO::PARAM_STR);
                        break;
                    case 'forwarded_ip':
                        $stmt->bindValue($identifier, $this->forwarded_ip, PDO::PARAM_STR);
                        break;
                    case 'user_agent':
                        $stmt->bindValue($identifier, $this->user_agent, PDO::PARAM_STR);
                        break;
                    case 'accept_language':
                        $stmt->bindValue($identifier, $this->accept_language, PDO::PARAM_STR);
                        break;
                    case 'date_added':
                        $stmt->bindValue($identifier, $this->date_added ? $this->date_added->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'date_modified':
                        $stmt->bindValue($identifier, $this->date_modified ? $this->date_modified->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setOrderId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OcOrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getOrderId();
                break;
            case 1:
                return $this->getInvoiceNo();
                break;
            case 2:
                return $this->getInvoicePrefix();
                break;
            case 3:
                return $this->getStoreId();
                break;
            case 4:
                return $this->getStoreName();
                break;
            case 5:
                return $this->getStoreUrl();
                break;
            case 6:
                return $this->getCustomerId();
                break;
            case 7:
                return $this->getCustomerGroupId();
                break;
            case 8:
                return $this->getFirstname();
                break;
            case 9:
                return $this->getLastname();
                break;
            case 10:
                return $this->getEmail();
                break;
            case 11:
                return $this->getTelephone();
                break;
            case 12:
                return $this->getFax();
                break;
            case 13:
                return $this->getCustomField();
                break;
            case 14:
                return $this->getPaymentFirstname();
                break;
            case 15:
                return $this->getPaymentLastname();
                break;
            case 16:
                return $this->getPaymentCompany();
                break;
            case 17:
                return $this->getPaymentAddress1();
                break;
            case 18:
                return $this->getPaymentAddress2();
                break;
            case 19:
                return $this->getPaymentCity();
                break;
            case 20:
                return $this->getPaymentPostcode();
                break;
            case 21:
                return $this->getPaymentCountry();
                break;
            case 22:
                return $this->getPaymentCountryId();
                break;
            case 23:
                return $this->getPaymentZone();
                break;
            case 24:
                return $this->getPaymentZoneId();
                break;
            case 25:
                return $this->getPaymentAddressFormat();
                break;
            case 26:
                return $this->getPaymentCustomField();
                break;
            case 27:
                return $this->getPaymentMethod();
                break;
            case 28:
                return $this->getPaymentCode();
                break;
            case 29:
                return $this->getShippingFirstname();
                break;
            case 30:
                return $this->getShippingLastname();
                break;
            case 31:
                return $this->getShippingCompany();
                break;
            case 32:
                return $this->getShippingAddress1();
                break;
            case 33:
                return $this->getShippingAddress2();
                break;
            case 34:
                return $this->getShippingCity();
                break;
            case 35:
                return $this->getShippingPostcode();
                break;
            case 36:
                return $this->getShippingCountry();
                break;
            case 37:
                return $this->getShippingCountryId();
                break;
            case 38:
                return $this->getShippingZone();
                break;
            case 39:
                return $this->getShippingZoneId();
                break;
            case 40:
                return $this->getShippingAddressFormat();
                break;
            case 41:
                return $this->getShippingCustomField();
                break;
            case 42:
                return $this->getShippingMethod();
                break;
            case 43:
                return $this->getShippingCode();
                break;
            case 44:
                return $this->getComment();
                break;
            case 45:
                return $this->getTotal();
                break;
            case 46:
                return $this->getOrderStatusId();
                break;
            case 47:
                return $this->getAffiliateId();
                break;
            case 48:
                return $this->getCommission();
                break;
            case 49:
                return $this->getMarketingId();
                break;
            case 50:
                return $this->getTracking();
                break;
            case 51:
                return $this->getLanguageId();
                break;
            case 52:
                return $this->getCurrencyId();
                break;
            case 53:
                return $this->getCurrencyCode();
                break;
            case 54:
                return $this->getCurrencyValue();
                break;
            case 55:
                return $this->getIp();
                break;
            case 56:
                return $this->getForwardedIp();
                break;
            case 57:
                return $this->getUserAgent();
                break;
            case 58:
                return $this->getAcceptLanguage();
                break;
            case 59:
                return $this->getDateAdded();
                break;
            case 60:
                return $this->getDateModified();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['OcOrder'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['OcOrder'][$this->hashCode()] = true;
        $keys = OcOrderTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getOrderId(),
            $keys[1] => $this->getInvoiceNo(),
            $keys[2] => $this->getInvoicePrefix(),
            $keys[3] => $this->getStoreId(),
            $keys[4] => $this->getStoreName(),
            $keys[5] => $this->getStoreUrl(),
            $keys[6] => $this->getCustomerId(),
            $keys[7] => $this->getCustomerGroupId(),
            $keys[8] => $this->getFirstname(),
            $keys[9] => $this->getLastname(),
            $keys[10] => $this->getEmail(),
            $keys[11] => $this->getTelephone(),
            $keys[12] => $this->getFax(),
            $keys[13] => $this->getCustomField(),
            $keys[14] => $this->getPaymentFirstname(),
            $keys[15] => $this->getPaymentLastname(),
            $keys[16] => $this->getPaymentCompany(),
            $keys[17] => $this->getPaymentAddress1(),
            $keys[18] => $this->getPaymentAddress2(),
            $keys[19] => $this->getPaymentCity(),
            $keys[20] => $this->getPaymentPostcode(),
            $keys[21] => $this->getPaymentCountry(),
            $keys[22] => $this->getPaymentCountryId(),
            $keys[23] => $this->getPaymentZone(),
            $keys[24] => $this->getPaymentZoneId(),
            $keys[25] => $this->getPaymentAddressFormat(),
            $keys[26] => $this->getPaymentCustomField(),
            $keys[27] => $this->getPaymentMethod(),
            $keys[28] => $this->getPaymentCode(),
            $keys[29] => $this->getShippingFirstname(),
            $keys[30] => $this->getShippingLastname(),
            $keys[31] => $this->getShippingCompany(),
            $keys[32] => $this->getShippingAddress1(),
            $keys[33] => $this->getShippingAddress2(),
            $keys[34] => $this->getShippingCity(),
            $keys[35] => $this->getShippingPostcode(),
            $keys[36] => $this->getShippingCountry(),
            $keys[37] => $this->getShippingCountryId(),
            $keys[38] => $this->getShippingZone(),
            $keys[39] => $this->getShippingZoneId(),
            $keys[40] => $this->getShippingAddressFormat(),
            $keys[41] => $this->getShippingCustomField(),
            $keys[42] => $this->getShippingMethod(),
            $keys[43] => $this->getShippingCode(),
            $keys[44] => $this->getComment(),
            $keys[45] => $this->getTotal(),
            $keys[46] => $this->getOrderStatusId(),
            $keys[47] => $this->getAffiliateId(),
            $keys[48] => $this->getCommission(),
            $keys[49] => $this->getMarketingId(),
            $keys[50] => $this->getTracking(),
            $keys[51] => $this->getLanguageId(),
            $keys[52] => $this->getCurrencyId(),
            $keys[53] => $this->getCurrencyCode(),
            $keys[54] => $this->getCurrencyValue(),
            $keys[55] => $this->getIp(),
            $keys[56] => $this->getForwardedIp(),
            $keys[57] => $this->getUserAgent(),
            $keys[58] => $this->getAcceptLanguage(),
            $keys[59] => $this->getDateAdded(),
            $keys[60] => $this->getDateModified(),
        );
        if ($result[$keys[59]] instanceof \DateTime) {
            $result[$keys[59]] = $result[$keys[59]]->format('c');
        }

        if ($result[$keys[60]] instanceof \DateTime) {
            $result[$keys[60]] = $result[$keys[60]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\OcOrder
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OcOrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\OcOrder
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setOrderId($value);
                break;
            case 1:
                $this->setInvoiceNo($value);
                break;
            case 2:
                $this->setInvoicePrefix($value);
                break;
            case 3:
                $this->setStoreId($value);
                break;
            case 4:
                $this->setStoreName($value);
                break;
            case 5:
                $this->setStoreUrl($value);
                break;
            case 6:
                $this->setCustomerId($value);
                break;
            case 7:
                $this->setCustomerGroupId($value);
                break;
            case 8:
                $this->setFirstname($value);
                break;
            case 9:
                $this->setLastname($value);
                break;
            case 10:
                $this->setEmail($value);
                break;
            case 11:
                $this->setTelephone($value);
                break;
            case 12:
                $this->setFax($value);
                break;
            case 13:
                $this->setCustomField($value);
                break;
            case 14:
                $this->setPaymentFirstname($value);
                break;
            case 15:
                $this->setPaymentLastname($value);
                break;
            case 16:
                $this->setPaymentCompany($value);
                break;
            case 17:
                $this->setPaymentAddress1($value);
                break;
            case 18:
                $this->setPaymentAddress2($value);
                break;
            case 19:
                $this->setPaymentCity($value);
                break;
            case 20:
                $this->setPaymentPostcode($value);
                break;
            case 21:
                $this->setPaymentCountry($value);
                break;
            case 22:
                $this->setPaymentCountryId($value);
                break;
            case 23:
                $this->setPaymentZone($value);
                break;
            case 24:
                $this->setPaymentZoneId($value);
                break;
            case 25:
                $this->setPaymentAddressFormat($value);
                break;
            case 26:
                $this->setPaymentCustomField($value);
                break;
            case 27:
                $this->setPaymentMethod($value);
                break;
            case 28:
                $this->setPaymentCode($value);
                break;
            case 29:
                $this->setShippingFirstname($value);
                break;
            case 30:
                $this->setShippingLastname($value);
                break;
            case 31:
                $this->setShippingCompany($value);
                break;
            case 32:
                $this->setShippingAddress1($value);
                break;
            case 33:
                $this->setShippingAddress2($value);
                break;
            case 34:
                $this->setShippingCity($value);
                break;
            case 35:
                $this->setShippingPostcode($value);
                break;
            case 36:
                $this->setShippingCountry($value);
                break;
            case 37:
                $this->setShippingCountryId($value);
                break;
            case 38:
                $this->setShippingZone($value);
                break;
            case 39:
                $this->setShippingZoneId($value);
                break;
            case 40:
                $this->setShippingAddressFormat($value);
                break;
            case 41:
                $this->setShippingCustomField($value);
                break;
            case 42:
                $this->setShippingMethod($value);
                break;
            case 43:
                $this->setShippingCode($value);
                break;
            case 44:
                $this->setComment($value);
                break;
            case 45:
                $this->setTotal($value);
                break;
            case 46:
                $this->setOrderStatusId($value);
                break;
            case 47:
                $this->setAffiliateId($value);
                break;
            case 48:
                $this->setCommission($value);
                break;
            case 49:
                $this->setMarketingId($value);
                break;
            case 50:
                $this->setTracking($value);
                break;
            case 51:
                $this->setLanguageId($value);
                break;
            case 52:
                $this->setCurrencyId($value);
                break;
            case 53:
                $this->setCurrencyCode($value);
                break;
            case 54:
                $this->setCurrencyValue($value);
                break;
            case 55:
                $this->setIp($value);
                break;
            case 56:
                $this->setForwardedIp($value);
                break;
            case 57:
                $this->setUserAgent($value);
                break;
            case 58:
                $this->setAcceptLanguage($value);
                break;
            case 59:
                $this->setDateAdded($value);
                break;
            case 60:
                $this->setDateModified($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = OcOrderTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setOrderId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setInvoiceNo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setInvoicePrefix($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setStoreId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setStoreName($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setStoreUrl($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCustomerId($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCustomerGroupId($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setFirstname($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setLastname($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setEmail($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTelephone($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setFax($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCustomField($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPaymentFirstname($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPaymentLastname($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPaymentCompany($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setPaymentAddress1($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPaymentAddress2($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPaymentCity($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setPaymentPostcode($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setPaymentCountry($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setPaymentCountryId($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setPaymentZone($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setPaymentZoneId($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setPaymentAddressFormat($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setPaymentCustomField($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setPaymentMethod($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setPaymentCode($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setShippingFirstname($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setShippingLastname($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setShippingCompany($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setShippingAddress1($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setShippingAddress2($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setShippingCity($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setShippingPostcode($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setShippingCountry($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setShippingCountryId($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setShippingZone($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setShippingZoneId($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setShippingAddressFormat($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setShippingCustomField($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setShippingMethod($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setShippingCode($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setComment($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setTotal($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setOrderStatusId($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setAffiliateId($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setCommission($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setMarketingId($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setTracking($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setLanguageId($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setCurrencyId($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setCurrencyCode($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setCurrencyValue($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setIp($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setForwardedIp($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setUserAgent($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setAcceptLanguage($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setDateAdded($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setDateModified($arr[$keys[60]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\OcOrder The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(OcOrderTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OcOrderTableMap::COL_ORDER_ID)) {
            $criteria->add(OcOrderTableMap::COL_ORDER_ID, $this->order_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_INVOICE_NO)) {
            $criteria->add(OcOrderTableMap::COL_INVOICE_NO, $this->invoice_no);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_INVOICE_PREFIX)) {
            $criteria->add(OcOrderTableMap::COL_INVOICE_PREFIX, $this->invoice_prefix);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_STORE_ID)) {
            $criteria->add(OcOrderTableMap::COL_STORE_ID, $this->store_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_STORE_NAME)) {
            $criteria->add(OcOrderTableMap::COL_STORE_NAME, $this->store_name);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_STORE_URL)) {
            $criteria->add(OcOrderTableMap::COL_STORE_URL, $this->store_url);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CUSTOMER_ID)) {
            $criteria->add(OcOrderTableMap::COL_CUSTOMER_ID, $this->customer_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CUSTOMER_GROUP_ID)) {
            $criteria->add(OcOrderTableMap::COL_CUSTOMER_GROUP_ID, $this->customer_group_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_FIRSTNAME)) {
            $criteria->add(OcOrderTableMap::COL_FIRSTNAME, $this->firstname);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_LASTNAME)) {
            $criteria->add(OcOrderTableMap::COL_LASTNAME, $this->lastname);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_EMAIL)) {
            $criteria->add(OcOrderTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_TELEPHONE)) {
            $criteria->add(OcOrderTableMap::COL_TELEPHONE, $this->telephone);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_FAX)) {
            $criteria->add(OcOrderTableMap::COL_FAX, $this->fax);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CUSTOM_FIELD)) {
            $criteria->add(OcOrderTableMap::COL_CUSTOM_FIELD, $this->custom_field);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_FIRSTNAME)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_FIRSTNAME, $this->payment_firstname);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_LASTNAME)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_LASTNAME, $this->payment_lastname);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_COMPANY)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_COMPANY, $this->payment_company);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ADDRESS_1)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_ADDRESS_1, $this->payment_address_1);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ADDRESS_2)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_ADDRESS_2, $this->payment_address_2);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_CITY)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_CITY, $this->payment_city);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_POSTCODE)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_POSTCODE, $this->payment_postcode);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_COUNTRY)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_COUNTRY, $this->payment_country);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_COUNTRY_ID)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_COUNTRY_ID, $this->payment_country_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ZONE)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_ZONE, $this->payment_zone);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ZONE_ID)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_ZONE_ID, $this->payment_zone_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_ADDRESS_FORMAT)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_ADDRESS_FORMAT, $this->payment_address_format);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_CUSTOM_FIELD)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_CUSTOM_FIELD, $this->payment_custom_field);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_METHOD)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_METHOD, $this->payment_method);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_PAYMENT_CODE)) {
            $criteria->add(OcOrderTableMap::COL_PAYMENT_CODE, $this->payment_code);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_FIRSTNAME)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_FIRSTNAME, $this->shipping_firstname);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_LASTNAME)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_LASTNAME, $this->shipping_lastname);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_COMPANY)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_COMPANY, $this->shipping_company);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ADDRESS_1)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_ADDRESS_1, $this->shipping_address_1);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ADDRESS_2)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_ADDRESS_2, $this->shipping_address_2);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_CITY)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_CITY, $this->shipping_city);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_POSTCODE)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_POSTCODE, $this->shipping_postcode);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_COUNTRY)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_COUNTRY, $this->shipping_country);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_COUNTRY_ID)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_COUNTRY_ID, $this->shipping_country_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ZONE)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_ZONE, $this->shipping_zone);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ZONE_ID)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_ZONE_ID, $this->shipping_zone_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_ADDRESS_FORMAT)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_ADDRESS_FORMAT, $this->shipping_address_format);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_CUSTOM_FIELD)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_CUSTOM_FIELD, $this->shipping_custom_field);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_METHOD)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_METHOD, $this->shipping_method);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_SHIPPING_CODE)) {
            $criteria->add(OcOrderTableMap::COL_SHIPPING_CODE, $this->shipping_code);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_COMMENT)) {
            $criteria->add(OcOrderTableMap::COL_COMMENT, $this->comment);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_TOTAL)) {
            $criteria->add(OcOrderTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_ORDER_STATUS_ID)) {
            $criteria->add(OcOrderTableMap::COL_ORDER_STATUS_ID, $this->order_status_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_AFFILIATE_ID)) {
            $criteria->add(OcOrderTableMap::COL_AFFILIATE_ID, $this->affiliate_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_COMMISSION)) {
            $criteria->add(OcOrderTableMap::COL_COMMISSION, $this->commission);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_MARKETING_ID)) {
            $criteria->add(OcOrderTableMap::COL_MARKETING_ID, $this->marketing_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_TRACKING)) {
            $criteria->add(OcOrderTableMap::COL_TRACKING, $this->tracking);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_LANGUAGE_ID)) {
            $criteria->add(OcOrderTableMap::COL_LANGUAGE_ID, $this->language_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CURRENCY_ID)) {
            $criteria->add(OcOrderTableMap::COL_CURRENCY_ID, $this->currency_id);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CURRENCY_CODE)) {
            $criteria->add(OcOrderTableMap::COL_CURRENCY_CODE, $this->currency_code);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_CURRENCY_VALUE)) {
            $criteria->add(OcOrderTableMap::COL_CURRENCY_VALUE, $this->currency_value);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_IP)) {
            $criteria->add(OcOrderTableMap::COL_IP, $this->ip);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_FORWARDED_IP)) {
            $criteria->add(OcOrderTableMap::COL_FORWARDED_IP, $this->forwarded_ip);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_USER_AGENT)) {
            $criteria->add(OcOrderTableMap::COL_USER_AGENT, $this->user_agent);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_ACCEPT_LANGUAGE)) {
            $criteria->add(OcOrderTableMap::COL_ACCEPT_LANGUAGE, $this->accept_language);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_DATE_ADDED)) {
            $criteria->add(OcOrderTableMap::COL_DATE_ADDED, $this->date_added);
        }
        if ($this->isColumnModified(OcOrderTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(OcOrderTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildOcOrderQuery::create();
        $criteria->add(OcOrderTableMap::COL_ORDER_ID, $this->order_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getOrderId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getOrderId();
    }

    /**
     * Generic method to set the primary key (order_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setOrderId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getOrderId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \OcOrder (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setInvoiceNo($this->getInvoiceNo());
        $copyObj->setInvoicePrefix($this->getInvoicePrefix());
        $copyObj->setStoreId($this->getStoreId());
        $copyObj->setStoreName($this->getStoreName());
        $copyObj->setStoreUrl($this->getStoreUrl());
        $copyObj->setCustomerId($this->getCustomerId());
        $copyObj->setCustomerGroupId($this->getCustomerGroupId());
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setTelephone($this->getTelephone());
        $copyObj->setFax($this->getFax());
        $copyObj->setCustomField($this->getCustomField());
        $copyObj->setPaymentFirstname($this->getPaymentFirstname());
        $copyObj->setPaymentLastname($this->getPaymentLastname());
        $copyObj->setPaymentCompany($this->getPaymentCompany());
        $copyObj->setPaymentAddress1($this->getPaymentAddress1());
        $copyObj->setPaymentAddress2($this->getPaymentAddress2());
        $copyObj->setPaymentCity($this->getPaymentCity());
        $copyObj->setPaymentPostcode($this->getPaymentPostcode());
        $copyObj->setPaymentCountry($this->getPaymentCountry());
        $copyObj->setPaymentCountryId($this->getPaymentCountryId());
        $copyObj->setPaymentZone($this->getPaymentZone());
        $copyObj->setPaymentZoneId($this->getPaymentZoneId());
        $copyObj->setPaymentAddressFormat($this->getPaymentAddressFormat());
        $copyObj->setPaymentCustomField($this->getPaymentCustomField());
        $copyObj->setPaymentMethod($this->getPaymentMethod());
        $copyObj->setPaymentCode($this->getPaymentCode());
        $copyObj->setShippingFirstname($this->getShippingFirstname());
        $copyObj->setShippingLastname($this->getShippingLastname());
        $copyObj->setShippingCompany($this->getShippingCompany());
        $copyObj->setShippingAddress1($this->getShippingAddress1());
        $copyObj->setShippingAddress2($this->getShippingAddress2());
        $copyObj->setShippingCity($this->getShippingCity());
        $copyObj->setShippingPostcode($this->getShippingPostcode());
        $copyObj->setShippingCountry($this->getShippingCountry());
        $copyObj->setShippingCountryId($this->getShippingCountryId());
        $copyObj->setShippingZone($this->getShippingZone());
        $copyObj->setShippingZoneId($this->getShippingZoneId());
        $copyObj->setShippingAddressFormat($this->getShippingAddressFormat());
        $copyObj->setShippingCustomField($this->getShippingCustomField());
        $copyObj->setShippingMethod($this->getShippingMethod());
        $copyObj->setShippingCode($this->getShippingCode());
        $copyObj->setComment($this->getComment());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setOrderStatusId($this->getOrderStatusId());
        $copyObj->setAffiliateId($this->getAffiliateId());
        $copyObj->setCommission($this->getCommission());
        $copyObj->setMarketingId($this->getMarketingId());
        $copyObj->setTracking($this->getTracking());
        $copyObj->setLanguageId($this->getLanguageId());
        $copyObj->setCurrencyId($this->getCurrencyId());
        $copyObj->setCurrencyCode($this->getCurrencyCode());
        $copyObj->setCurrencyValue($this->getCurrencyValue());
        $copyObj->setIp($this->getIp());
        $copyObj->setForwardedIp($this->getForwardedIp());
        $copyObj->setUserAgent($this->getUserAgent());
        $copyObj->setAcceptLanguage($this->getAcceptLanguage());
        $copyObj->setDateAdded($this->getDateAdded());
        $copyObj->setDateModified($this->getDateModified());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setOrderId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \OcOrder Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->order_id = null;
        $this->invoice_no = null;
        $this->invoice_prefix = null;
        $this->store_id = null;
        $this->store_name = null;
        $this->store_url = null;
        $this->customer_id = null;
        $this->customer_group_id = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->telephone = null;
        $this->fax = null;
        $this->custom_field = null;
        $this->payment_firstname = null;
        $this->payment_lastname = null;
        $this->payment_company = null;
        $this->payment_address_1 = null;
        $this->payment_address_2 = null;
        $this->payment_city = null;
        $this->payment_postcode = null;
        $this->payment_country = null;
        $this->payment_country_id = null;
        $this->payment_zone = null;
        $this->payment_zone_id = null;
        $this->payment_address_format = null;
        $this->payment_custom_field = null;
        $this->payment_method = null;
        $this->payment_code = null;
        $this->shipping_firstname = null;
        $this->shipping_lastname = null;
        $this->shipping_company = null;
        $this->shipping_address_1 = null;
        $this->shipping_address_2 = null;
        $this->shipping_city = null;
        $this->shipping_postcode = null;
        $this->shipping_country = null;
        $this->shipping_country_id = null;
        $this->shipping_zone = null;
        $this->shipping_zone_id = null;
        $this->shipping_address_format = null;
        $this->shipping_custom_field = null;
        $this->shipping_method = null;
        $this->shipping_code = null;
        $this->comment = null;
        $this->total = null;
        $this->order_status_id = null;
        $this->affiliate_id = null;
        $this->commission = null;
        $this->marketing_id = null;
        $this->tracking = null;
        $this->language_id = null;
        $this->currency_id = null;
        $this->currency_code = null;
        $this->currency_value = null;
        $this->ip = null;
        $this->forwarded_ip = null;
        $this->user_agent = null;
        $this->accept_language = null;
        $this->date_added = null;
        $this->date_modified = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(OcOrderTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
