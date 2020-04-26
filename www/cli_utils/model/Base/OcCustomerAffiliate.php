<?php

namespace Base;

use \OcCustomerAffiliateQuery as ChildOcCustomerAffiliateQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\OcCustomerAffiliateTableMap;
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
 * Base class that represents a row from the 'oc_customer_affiliate' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class OcCustomerAffiliate implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OcCustomerAffiliateTableMap';


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
     * The value for the customer_id field.
     *
     * @var        int
     */
    protected $customer_id;

    /**
     * The value for the company field.
     *
     * @var        string
     */
    protected $company;

    /**
     * The value for the website field.
     *
     * @var        string
     */
    protected $website;

    /**
     * The value for the tracking field.
     *
     * @var        string
     */
    protected $tracking;

    /**
     * The value for the commission field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $commission;

    /**
     * The value for the tax field.
     *
     * @var        string
     */
    protected $tax;

    /**
     * The value for the payment field.
     *
     * @var        string
     */
    protected $payment;

    /**
     * The value for the cheque field.
     *
     * @var        string
     */
    protected $cheque;

    /**
     * The value for the paypal field.
     *
     * @var        string
     */
    protected $paypal;

    /**
     * The value for the bank_name field.
     *
     * @var        string
     */
    protected $bank_name;

    /**
     * The value for the bank_branch_number field.
     *
     * @var        string
     */
    protected $bank_branch_number;

    /**
     * The value for the bank_swift_code field.
     *
     * @var        string
     */
    protected $bank_swift_code;

    /**
     * The value for the bank_account_name field.
     *
     * @var        string
     */
    protected $bank_account_name;

    /**
     * The value for the bank_account_number field.
     *
     * @var        string
     */
    protected $bank_account_number;

    /**
     * The value for the custom_field field.
     *
     * @var        string
     */
    protected $custom_field;

    /**
     * The value for the status field.
     *
     * @var        boolean
     */
    protected $status;

    /**
     * The value for the date_added field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $date_added;

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
        $this->commission = '0.00';
    }

    /**
     * Initializes internal state of Base\OcCustomerAffiliate object.
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
     * Compares this with another <code>OcCustomerAffiliate</code> instance.  If
     * <code>obj</code> is an instance of <code>OcCustomerAffiliate</code>, delegates to
     * <code>equals(OcCustomerAffiliate)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|OcCustomerAffiliate The current object, for fluid interface
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
     * Get the [customer_id] column value.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Get the [company] column value.
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Get the [website] column value.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
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
     * Get the [commission] column value.
     *
     * @return string
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Get the [tax] column value.
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Get the [payment] column value.
     *
     * @return string
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Get the [cheque] column value.
     *
     * @return string
     */
    public function getCheque()
    {
        return $this->cheque;
    }

    /**
     * Get the [paypal] column value.
     *
     * @return string
     */
    public function getPaypal()
    {
        return $this->paypal;
    }

    /**
     * Get the [bank_name] column value.
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bank_name;
    }

    /**
     * Get the [bank_branch_number] column value.
     *
     * @return string
     */
    public function getBankBranchNumber()
    {
        return $this->bank_branch_number;
    }

    /**
     * Get the [bank_swift_code] column value.
     *
     * @return string
     */
    public function getBankSwiftCode()
    {
        return $this->bank_swift_code;
    }

    /**
     * Get the [bank_account_name] column value.
     *
     * @return string
     */
    public function getBankAccountName()
    {
        return $this->bank_account_name;
    }

    /**
     * Get the [bank_account_number] column value.
     *
     * @return string
     */
    public function getBankAccountNumber()
    {
        return $this->bank_account_number;
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
     * Get the [status] column value.
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [status] column value.
     *
     * @return boolean
     */
    public function isStatus()
    {
        return $this->getStatus();
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
     * Set the value of [customer_id] column.
     *
     * @param int $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setCustomerId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->customer_id !== $v) {
            $this->customer_id = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_CUSTOMER_ID] = true;
        }

        return $this;
    } // setCustomerId()

    /**
     * Set the value of [company] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_COMPANY] = true;
        }

        return $this;
    } // setCompany()

    /**
     * Set the value of [website] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_WEBSITE] = true;
        }

        return $this;
    } // setWebsite()

    /**
     * Set the value of [tracking] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setTracking($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tracking !== $v) {
            $this->tracking = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_TRACKING] = true;
        }

        return $this;
    } // setTracking()

    /**
     * Set the value of [commission] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setCommission($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->commission !== $v) {
            $this->commission = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_COMMISSION] = true;
        }

        return $this;
    } // setCommission()

    /**
     * Set the value of [tax] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tax !== $v) {
            $this->tax = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_TAX] = true;
        }

        return $this;
    } // setTax()

    /**
     * Set the value of [payment] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setPayment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment !== $v) {
            $this->payment = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_PAYMENT] = true;
        }

        return $this;
    } // setPayment()

    /**
     * Set the value of [cheque] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setCheque($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cheque !== $v) {
            $this->cheque = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_CHEQUE] = true;
        }

        return $this;
    } // setCheque()

    /**
     * Set the value of [paypal] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setPaypal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->paypal !== $v) {
            $this->paypal = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_PAYPAL] = true;
        }

        return $this;
    } // setPaypal()

    /**
     * Set the value of [bank_name] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setBankName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_name !== $v) {
            $this->bank_name = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_BANK_NAME] = true;
        }

        return $this;
    } // setBankName()

    /**
     * Set the value of [bank_branch_number] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setBankBranchNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_branch_number !== $v) {
            $this->bank_branch_number = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_BANK_BRANCH_NUMBER] = true;
        }

        return $this;
    } // setBankBranchNumber()

    /**
     * Set the value of [bank_swift_code] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setBankSwiftCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_swift_code !== $v) {
            $this->bank_swift_code = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_BANK_SWIFT_CODE] = true;
        }

        return $this;
    } // setBankSwiftCode()

    /**
     * Set the value of [bank_account_name] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setBankAccountName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_account_name !== $v) {
            $this->bank_account_name = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NAME] = true;
        }

        return $this;
    } // setBankAccountName()

    /**
     * Set the value of [bank_account_number] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setBankAccountNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_account_number !== $v) {
            $this->bank_account_number = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NUMBER] = true;
        }

        return $this;
    } // setBankAccountNumber()

    /**
     * Set the value of [custom_field] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setCustomField($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custom_field !== $v) {
            $this->custom_field = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_CUSTOM_FIELD] = true;
        }

        return $this;
    } // setCustomField()

    /**
     * Sets the value of the [status] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Sets the value of [date_added] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\OcCustomerAffiliate The current object (for fluent API support)
     */
    public function setDateAdded($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_added !== null || $dt !== null) {
            if ($this->date_added === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_added->format("Y-m-d H:i:s.u")) {
                $this->date_added = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OcCustomerAffiliateTableMap::COL_DATE_ADDED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateAdded()

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
            if ($this->commission !== '0.00') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Company', TableMap::TYPE_PHPNAME, $indexType)];
            $this->company = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Website', TableMap::TYPE_PHPNAME, $indexType)];
            $this->website = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Tracking', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tracking = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Commission', TableMap::TYPE_PHPNAME, $indexType)];
            $this->commission = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Tax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Payment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Cheque', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cheque = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Paypal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->paypal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('BankName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('BankBranchNumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_branch_number = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('BankSwiftCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_swift_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('BankAccountName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_account_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('BankAccountNumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_account_number = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('CustomField', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custom_field = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OcCustomerAffiliateTableMap::translateFieldName('DateAdded', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_added = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = OcCustomerAffiliateTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\OcCustomerAffiliate'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomerAffiliateTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOcCustomerAffiliateQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see OcCustomerAffiliate::setDeleted()
     * @see OcCustomerAffiliate::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerAffiliateTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOcCustomerAffiliateQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerAffiliateTableMap::DATABASE_NAME);
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
                OcCustomerAffiliateTableMap::addInstanceToPool($this);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'customer_id';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_COMPANY)) {
            $modifiedColumns[':p' . $index++]  = 'company';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = 'website';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_TRACKING)) {
            $modifiedColumns[':p' . $index++]  = 'tracking';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_COMMISSION)) {
            $modifiedColumns[':p' . $index++]  = 'commission';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'tax';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_PAYMENT)) {
            $modifiedColumns[':p' . $index++]  = 'payment';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_CHEQUE)) {
            $modifiedColumns[':p' . $index++]  = 'cheque';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_PAYPAL)) {
            $modifiedColumns[':p' . $index++]  = 'paypal';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'bank_name';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_BRANCH_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'bank_branch_number';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_SWIFT_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'bank_swift_code';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'bank_account_name';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'bank_account_number';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_CUSTOM_FIELD)) {
            $modifiedColumns[':p' . $index++]  = 'custom_field';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_DATE_ADDED)) {
            $modifiedColumns[':p' . $index++]  = 'date_added';
        }

        $sql = sprintf(
            'INSERT INTO oc_customer_affiliate (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'customer_id':
                        $stmt->bindValue($identifier, $this->customer_id, PDO::PARAM_INT);
                        break;
                    case 'company':
                        $stmt->bindValue($identifier, $this->company, PDO::PARAM_STR);
                        break;
                    case 'website':
                        $stmt->bindValue($identifier, $this->website, PDO::PARAM_STR);
                        break;
                    case 'tracking':
                        $stmt->bindValue($identifier, $this->tracking, PDO::PARAM_STR);
                        break;
                    case 'commission':
                        $stmt->bindValue($identifier, $this->commission, PDO::PARAM_STR);
                        break;
                    case 'tax':
                        $stmt->bindValue($identifier, $this->tax, PDO::PARAM_STR);
                        break;
                    case 'payment':
                        $stmt->bindValue($identifier, $this->payment, PDO::PARAM_STR);
                        break;
                    case 'cheque':
                        $stmt->bindValue($identifier, $this->cheque, PDO::PARAM_STR);
                        break;
                    case 'paypal':
                        $stmt->bindValue($identifier, $this->paypal, PDO::PARAM_STR);
                        break;
                    case 'bank_name':
                        $stmt->bindValue($identifier, $this->bank_name, PDO::PARAM_STR);
                        break;
                    case 'bank_branch_number':
                        $stmt->bindValue($identifier, $this->bank_branch_number, PDO::PARAM_STR);
                        break;
                    case 'bank_swift_code':
                        $stmt->bindValue($identifier, $this->bank_swift_code, PDO::PARAM_STR);
                        break;
                    case 'bank_account_name':
                        $stmt->bindValue($identifier, $this->bank_account_name, PDO::PARAM_STR);
                        break;
                    case 'bank_account_number':
                        $stmt->bindValue($identifier, $this->bank_account_number, PDO::PARAM_STR);
                        break;
                    case 'custom_field':
                        $stmt->bindValue($identifier, $this->custom_field, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, (int) $this->status, PDO::PARAM_INT);
                        break;
                    case 'date_added':
                        $stmt->bindValue($identifier, $this->date_added ? $this->date_added->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

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
        $pos = OcCustomerAffiliateTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCustomerId();
                break;
            case 1:
                return $this->getCompany();
                break;
            case 2:
                return $this->getWebsite();
                break;
            case 3:
                return $this->getTracking();
                break;
            case 4:
                return $this->getCommission();
                break;
            case 5:
                return $this->getTax();
                break;
            case 6:
                return $this->getPayment();
                break;
            case 7:
                return $this->getCheque();
                break;
            case 8:
                return $this->getPaypal();
                break;
            case 9:
                return $this->getBankName();
                break;
            case 10:
                return $this->getBankBranchNumber();
                break;
            case 11:
                return $this->getBankSwiftCode();
                break;
            case 12:
                return $this->getBankAccountName();
                break;
            case 13:
                return $this->getBankAccountNumber();
                break;
            case 14:
                return $this->getCustomField();
                break;
            case 15:
                return $this->getStatus();
                break;
            case 16:
                return $this->getDateAdded();
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

        if (isset($alreadyDumpedObjects['OcCustomerAffiliate'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['OcCustomerAffiliate'][$this->hashCode()] = true;
        $keys = OcCustomerAffiliateTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCustomerId(),
            $keys[1] => $this->getCompany(),
            $keys[2] => $this->getWebsite(),
            $keys[3] => $this->getTracking(),
            $keys[4] => $this->getCommission(),
            $keys[5] => $this->getTax(),
            $keys[6] => $this->getPayment(),
            $keys[7] => $this->getCheque(),
            $keys[8] => $this->getPaypal(),
            $keys[9] => $this->getBankName(),
            $keys[10] => $this->getBankBranchNumber(),
            $keys[11] => $this->getBankSwiftCode(),
            $keys[12] => $this->getBankAccountName(),
            $keys[13] => $this->getBankAccountNumber(),
            $keys[14] => $this->getCustomField(),
            $keys[15] => $this->getStatus(),
            $keys[16] => $this->getDateAdded(),
        );
        if ($result[$keys[16]] instanceof \DateTime) {
            $result[$keys[16]] = $result[$keys[16]]->format('c');
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
     * @return $this|\OcCustomerAffiliate
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OcCustomerAffiliateTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\OcCustomerAffiliate
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCustomerId($value);
                break;
            case 1:
                $this->setCompany($value);
                break;
            case 2:
                $this->setWebsite($value);
                break;
            case 3:
                $this->setTracking($value);
                break;
            case 4:
                $this->setCommission($value);
                break;
            case 5:
                $this->setTax($value);
                break;
            case 6:
                $this->setPayment($value);
                break;
            case 7:
                $this->setCheque($value);
                break;
            case 8:
                $this->setPaypal($value);
                break;
            case 9:
                $this->setBankName($value);
                break;
            case 10:
                $this->setBankBranchNumber($value);
                break;
            case 11:
                $this->setBankSwiftCode($value);
                break;
            case 12:
                $this->setBankAccountName($value);
                break;
            case 13:
                $this->setBankAccountNumber($value);
                break;
            case 14:
                $this->setCustomField($value);
                break;
            case 15:
                $this->setStatus($value);
                break;
            case 16:
                $this->setDateAdded($value);
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
        $keys = OcCustomerAffiliateTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCustomerId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCompany($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setWebsite($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTracking($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCommission($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTax($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPayment($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCheque($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPaypal($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setBankName($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setBankBranchNumber($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setBankSwiftCode($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setBankAccountName($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setBankAccountNumber($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCustomField($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setStatus($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDateAdded($arr[$keys[16]]);
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
     * @return $this|\OcCustomerAffiliate The current object, for fluid interface
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
        $criteria = new Criteria(OcCustomerAffiliateTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, $this->customer_id);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_COMPANY)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_COMPANY, $this->company);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_WEBSITE)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_WEBSITE, $this->website);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_TRACKING)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_TRACKING, $this->tracking);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_COMMISSION)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_COMMISSION, $this->commission);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_TAX)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_TAX, $this->tax);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_PAYMENT)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_PAYMENT, $this->payment);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_CHEQUE)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_CHEQUE, $this->cheque);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_PAYPAL)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_PAYPAL, $this->paypal);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_NAME)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_BANK_NAME, $this->bank_name);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_BRANCH_NUMBER)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_BANK_BRANCH_NUMBER, $this->bank_branch_number);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_SWIFT_CODE)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_BANK_SWIFT_CODE, $this->bank_swift_code);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NAME)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NAME, $this->bank_account_name);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NUMBER)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NUMBER, $this->bank_account_number);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_CUSTOM_FIELD)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_CUSTOM_FIELD, $this->custom_field);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_STATUS)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(OcCustomerAffiliateTableMap::COL_DATE_ADDED)) {
            $criteria->add(OcCustomerAffiliateTableMap::COL_DATE_ADDED, $this->date_added);
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
        $criteria = ChildOcCustomerAffiliateQuery::create();
        $criteria->add(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, $this->customer_id);

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
        $validPk = null !== $this->getCustomerId();

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
        return $this->getCustomerId();
    }

    /**
     * Generic method to set the primary key (customer_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCustomerId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getCustomerId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \OcCustomerAffiliate (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCustomerId($this->getCustomerId());
        $copyObj->setCompany($this->getCompany());
        $copyObj->setWebsite($this->getWebsite());
        $copyObj->setTracking($this->getTracking());
        $copyObj->setCommission($this->getCommission());
        $copyObj->setTax($this->getTax());
        $copyObj->setPayment($this->getPayment());
        $copyObj->setCheque($this->getCheque());
        $copyObj->setPaypal($this->getPaypal());
        $copyObj->setBankName($this->getBankName());
        $copyObj->setBankBranchNumber($this->getBankBranchNumber());
        $copyObj->setBankSwiftCode($this->getBankSwiftCode());
        $copyObj->setBankAccountName($this->getBankAccountName());
        $copyObj->setBankAccountNumber($this->getBankAccountNumber());
        $copyObj->setCustomField($this->getCustomField());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setDateAdded($this->getDateAdded());
        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \OcCustomerAffiliate Clone of current object.
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
        $this->customer_id = null;
        $this->company = null;
        $this->website = null;
        $this->tracking = null;
        $this->commission = null;
        $this->tax = null;
        $this->payment = null;
        $this->cheque = null;
        $this->paypal = null;
        $this->bank_name = null;
        $this->bank_branch_number = null;
        $this->bank_swift_code = null;
        $this->bank_account_name = null;
        $this->bank_account_number = null;
        $this->custom_field = null;
        $this->status = null;
        $this->date_added = null;
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
        return (string) $this->exportTo(OcCustomerAffiliateTableMap::DEFAULT_STRING_FORMAT);
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
