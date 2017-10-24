<?php

namespace Base;

use \OcOrderRecurringQuery as ChildOcOrderRecurringQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\OcOrderRecurringTableMap;
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
 * Base class that represents a row from the 'oc_order_recurring' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class OcOrderRecurring implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OcOrderRecurringTableMap';


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
     * The value for the order_recurring_id field.
     *
     * @var        int
     */
    protected $order_recurring_id;

    /**
     * The value for the order_id field.
     *
     * @var        int
     */
    protected $order_id;

    /**
     * The value for the reference field.
     *
     * @var        string
     */
    protected $reference;

    /**
     * The value for the product_id field.
     *
     * @var        int
     */
    protected $product_id;

    /**
     * The value for the product_name field.
     *
     * @var        string
     */
    protected $product_name;

    /**
     * The value for the product_quantity field.
     *
     * @var        int
     */
    protected $product_quantity;

    /**
     * The value for the recurring_id field.
     *
     * @var        int
     */
    protected $recurring_id;

    /**
     * The value for the recurring_name field.
     *
     * @var        string
     */
    protected $recurring_name;

    /**
     * The value for the recurring_description field.
     *
     * @var        string
     */
    protected $recurring_description;

    /**
     * The value for the recurring_frequency field.
     *
     * @var        string
     */
    protected $recurring_frequency;

    /**
     * The value for the recurring_cycle field.
     *
     * @var        int
     */
    protected $recurring_cycle;

    /**
     * The value for the recurring_duration field.
     *
     * @var        int
     */
    protected $recurring_duration;

    /**
     * The value for the recurring_price field.
     *
     * @var        string
     */
    protected $recurring_price;

    /**
     * The value for the trial field.
     *
     * @var        boolean
     */
    protected $trial;

    /**
     * The value for the trial_frequency field.
     *
     * @var        string
     */
    protected $trial_frequency;

    /**
     * The value for the trial_cycle field.
     *
     * @var        int
     */
    protected $trial_cycle;

    /**
     * The value for the trial_duration field.
     *
     * @var        int
     */
    protected $trial_duration;

    /**
     * The value for the trial_price field.
     *
     * @var        string
     */
    protected $trial_price;

    /**
     * The value for the status field.
     *
     * @var        int
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
    }

    /**
     * Initializes internal state of Base\OcOrderRecurring object.
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
     * Compares this with another <code>OcOrderRecurring</code> instance.  If
     * <code>obj</code> is an instance of <code>OcOrderRecurring</code>, delegates to
     * <code>equals(OcOrderRecurring)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|OcOrderRecurring The current object, for fluid interface
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
     * Get the [order_recurring_id] column value.
     *
     * @return int
     */
    public function getOrderRecurringId()
    {
        return $this->order_recurring_id;
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
     * Get the [reference] column value.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Get the [product_id] column value.
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Get the [product_name] column value.
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Get the [product_quantity] column value.
     *
     * @return int
     */
    public function getProductQuantity()
    {
        return $this->product_quantity;
    }

    /**
     * Get the [recurring_id] column value.
     *
     * @return int
     */
    public function getRecurringId()
    {
        return $this->recurring_id;
    }

    /**
     * Get the [recurring_name] column value.
     *
     * @return string
     */
    public function getRecurringName()
    {
        return $this->recurring_name;
    }

    /**
     * Get the [recurring_description] column value.
     *
     * @return string
     */
    public function getRecurringDescription()
    {
        return $this->recurring_description;
    }

    /**
     * Get the [recurring_frequency] column value.
     *
     * @return string
     */
    public function getRecurringFrequency()
    {
        return $this->recurring_frequency;
    }

    /**
     * Get the [recurring_cycle] column value.
     *
     * @return int
     */
    public function getRecurringCycle()
    {
        return $this->recurring_cycle;
    }

    /**
     * Get the [recurring_duration] column value.
     *
     * @return int
     */
    public function getRecurringDuration()
    {
        return $this->recurring_duration;
    }

    /**
     * Get the [recurring_price] column value.
     *
     * @return string
     */
    public function getRecurringPrice()
    {
        return $this->recurring_price;
    }

    /**
     * Get the [trial] column value.
     *
     * @return boolean
     */
    public function getTrial()
    {
        return $this->trial;
    }

    /**
     * Get the [trial] column value.
     *
     * @return boolean
     */
    public function isTrial()
    {
        return $this->getTrial();
    }

    /**
     * Get the [trial_frequency] column value.
     *
     * @return string
     */
    public function getTrialFrequency()
    {
        return $this->trial_frequency;
    }

    /**
     * Get the [trial_cycle] column value.
     *
     * @return int
     */
    public function getTrialCycle()
    {
        return $this->trial_cycle;
    }

    /**
     * Get the [trial_duration] column value.
     *
     * @return int
     */
    public function getTrialDuration()
    {
        return $this->trial_duration;
    }

    /**
     * Get the [trial_price] column value.
     *
     * @return string
     */
    public function getTrialPrice()
    {
        return $this->trial_price;
    }

    /**
     * Get the [status] column value.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
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
     * Set the value of [order_recurring_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setOrderRecurringId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_recurring_id !== $v) {
            $this->order_recurring_id = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID] = true;
        }

        return $this;
    } // setOrderRecurringId()

    /**
     * Set the value of [order_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setOrderId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_id !== $v) {
            $this->order_id = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_ORDER_ID] = true;
        }

        return $this;
    } // setOrderId()

    /**
     * Set the value of [reference] column.
     *
     * @param string $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reference !== $v) {
            $this->reference = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_REFERENCE] = true;
        }

        return $this;
    } // setReference()

    /**
     * Set the value of [product_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setProductId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->product_id !== $v) {
            $this->product_id = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_PRODUCT_ID] = true;
        }

        return $this;
    } // setProductId()

    /**
     * Set the value of [product_name] column.
     *
     * @param string $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setProductName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->product_name !== $v) {
            $this->product_name = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_PRODUCT_NAME] = true;
        }

        return $this;
    } // setProductName()

    /**
     * Set the value of [product_quantity] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setProductQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->product_quantity !== $v) {
            $this->product_quantity = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY] = true;
        }

        return $this;
    } // setProductQuantity()

    /**
     * Set the value of [recurring_id] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setRecurringId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recurring_id !== $v) {
            $this->recurring_id = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_RECURRING_ID] = true;
        }

        return $this;
    } // setRecurringId()

    /**
     * Set the value of [recurring_name] column.
     *
     * @param string $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setRecurringName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->recurring_name !== $v) {
            $this->recurring_name = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_RECURRING_NAME] = true;
        }

        return $this;
    } // setRecurringName()

    /**
     * Set the value of [recurring_description] column.
     *
     * @param string $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setRecurringDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->recurring_description !== $v) {
            $this->recurring_description = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_RECURRING_DESCRIPTION] = true;
        }

        return $this;
    } // setRecurringDescription()

    /**
     * Set the value of [recurring_frequency] column.
     *
     * @param string $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setRecurringFrequency($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->recurring_frequency !== $v) {
            $this->recurring_frequency = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_RECURRING_FREQUENCY] = true;
        }

        return $this;
    } // setRecurringFrequency()

    /**
     * Set the value of [recurring_cycle] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setRecurringCycle($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recurring_cycle !== $v) {
            $this->recurring_cycle = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_RECURRING_CYCLE] = true;
        }

        return $this;
    } // setRecurringCycle()

    /**
     * Set the value of [recurring_duration] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setRecurringDuration($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recurring_duration !== $v) {
            $this->recurring_duration = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_RECURRING_DURATION] = true;
        }

        return $this;
    } // setRecurringDuration()

    /**
     * Set the value of [recurring_price] column.
     *
     * @param string $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setRecurringPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->recurring_price !== $v) {
            $this->recurring_price = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_RECURRING_PRICE] = true;
        }

        return $this;
    } // setRecurringPrice()

    /**
     * Sets the value of the [trial] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setTrial($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->trial !== $v) {
            $this->trial = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_TRIAL] = true;
        }

        return $this;
    } // setTrial()

    /**
     * Set the value of [trial_frequency] column.
     *
     * @param string $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setTrialFrequency($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->trial_frequency !== $v) {
            $this->trial_frequency = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_TRIAL_FREQUENCY] = true;
        }

        return $this;
    } // setTrialFrequency()

    /**
     * Set the value of [trial_cycle] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setTrialCycle($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trial_cycle !== $v) {
            $this->trial_cycle = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_TRIAL_CYCLE] = true;
        }

        return $this;
    } // setTrialCycle()

    /**
     * Set the value of [trial_duration] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setTrialDuration($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trial_duration !== $v) {
            $this->trial_duration = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_TRIAL_DURATION] = true;
        }

        return $this;
    } // setTrialDuration()

    /**
     * Set the value of [trial_price] column.
     *
     * @param string $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setTrialPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->trial_price !== $v) {
            $this->trial_price = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_TRIAL_PRICE] = true;
        }

        return $this;
    } // setTrialPrice()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[OcOrderRecurringTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Sets the value of [date_added] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\OcOrderRecurring The current object (for fluent API support)
     */
    public function setDateAdded($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_added !== null || $dt !== null) {
            if ($this->date_added === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_added->format("Y-m-d H:i:s.u")) {
                $this->date_added = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OcOrderRecurringTableMap::COL_DATE_ADDED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OcOrderRecurringTableMap::translateFieldName('OrderRecurringId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->order_recurring_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OcOrderRecurringTableMap::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->order_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OcOrderRecurringTableMap::translateFieldName('Reference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reference = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OcOrderRecurringTableMap::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->product_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OcOrderRecurringTableMap::translateFieldName('ProductName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->product_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OcOrderRecurringTableMap::translateFieldName('ProductQuantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->product_quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OcOrderRecurringTableMap::translateFieldName('RecurringId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recurring_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OcOrderRecurringTableMap::translateFieldName('RecurringName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recurring_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OcOrderRecurringTableMap::translateFieldName('RecurringDescription', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recurring_description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OcOrderRecurringTableMap::translateFieldName('RecurringFrequency', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recurring_frequency = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OcOrderRecurringTableMap::translateFieldName('RecurringCycle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recurring_cycle = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OcOrderRecurringTableMap::translateFieldName('RecurringDuration', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recurring_duration = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OcOrderRecurringTableMap::translateFieldName('RecurringPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recurring_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OcOrderRecurringTableMap::translateFieldName('Trial', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trial = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OcOrderRecurringTableMap::translateFieldName('TrialFrequency', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trial_frequency = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OcOrderRecurringTableMap::translateFieldName('TrialCycle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trial_cycle = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OcOrderRecurringTableMap::translateFieldName('TrialDuration', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trial_duration = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OcOrderRecurringTableMap::translateFieldName('TrialPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trial_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OcOrderRecurringTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OcOrderRecurringTableMap::translateFieldName('DateAdded', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_added = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 20; // 20 = OcOrderRecurringTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\OcOrderRecurring'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderRecurringTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOcOrderRecurringQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see OcOrderRecurring::setDeleted()
     * @see OcOrderRecurring::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderRecurringTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOcOrderRecurringQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderRecurringTableMap::DATABASE_NAME);
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
                OcOrderRecurringTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID] = true;
        if (null !== $this->order_recurring_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID)) {
            $modifiedColumns[':p' . $index++]  = 'order_recurring_id';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_ORDER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'order_id';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'reference';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_PRODUCT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'product_id';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_PRODUCT_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'product_name';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'product_quantity';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_ID)) {
            $modifiedColumns[':p' . $index++]  = 'recurring_id';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'recurring_name';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'recurring_description';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_FREQUENCY)) {
            $modifiedColumns[':p' . $index++]  = 'recurring_frequency';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_CYCLE)) {
            $modifiedColumns[':p' . $index++]  = 'recurring_cycle';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_DURATION)) {
            $modifiedColumns[':p' . $index++]  = 'recurring_duration';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'recurring_price';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL)) {
            $modifiedColumns[':p' . $index++]  = 'trial';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL_FREQUENCY)) {
            $modifiedColumns[':p' . $index++]  = 'trial_frequency';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL_CYCLE)) {
            $modifiedColumns[':p' . $index++]  = 'trial_cycle';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL_DURATION)) {
            $modifiedColumns[':p' . $index++]  = 'trial_duration';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'trial_price';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_DATE_ADDED)) {
            $modifiedColumns[':p' . $index++]  = 'date_added';
        }

        $sql = sprintf(
            'INSERT INTO oc_order_recurring (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'order_recurring_id':
                        $stmt->bindValue($identifier, $this->order_recurring_id, PDO::PARAM_INT);
                        break;
                    case 'order_id':
                        $stmt->bindValue($identifier, $this->order_id, PDO::PARAM_INT);
                        break;
                    case 'reference':
                        $stmt->bindValue($identifier, $this->reference, PDO::PARAM_STR);
                        break;
                    case 'product_id':
                        $stmt->bindValue($identifier, $this->product_id, PDO::PARAM_INT);
                        break;
                    case 'product_name':
                        $stmt->bindValue($identifier, $this->product_name, PDO::PARAM_STR);
                        break;
                    case 'product_quantity':
                        $stmt->bindValue($identifier, $this->product_quantity, PDO::PARAM_INT);
                        break;
                    case 'recurring_id':
                        $stmt->bindValue($identifier, $this->recurring_id, PDO::PARAM_INT);
                        break;
                    case 'recurring_name':
                        $stmt->bindValue($identifier, $this->recurring_name, PDO::PARAM_STR);
                        break;
                    case 'recurring_description':
                        $stmt->bindValue($identifier, $this->recurring_description, PDO::PARAM_STR);
                        break;
                    case 'recurring_frequency':
                        $stmt->bindValue($identifier, $this->recurring_frequency, PDO::PARAM_STR);
                        break;
                    case 'recurring_cycle':
                        $stmt->bindValue($identifier, $this->recurring_cycle, PDO::PARAM_INT);
                        break;
                    case 'recurring_duration':
                        $stmt->bindValue($identifier, $this->recurring_duration, PDO::PARAM_INT);
                        break;
                    case 'recurring_price':
                        $stmt->bindValue($identifier, $this->recurring_price, PDO::PARAM_STR);
                        break;
                    case 'trial':
                        $stmt->bindValue($identifier, (int) $this->trial, PDO::PARAM_INT);
                        break;
                    case 'trial_frequency':
                        $stmt->bindValue($identifier, $this->trial_frequency, PDO::PARAM_STR);
                        break;
                    case 'trial_cycle':
                        $stmt->bindValue($identifier, $this->trial_cycle, PDO::PARAM_INT);
                        break;
                    case 'trial_duration':
                        $stmt->bindValue($identifier, $this->trial_duration, PDO::PARAM_INT);
                        break;
                    case 'trial_price':
                        $stmt->bindValue($identifier, $this->trial_price, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
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

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setOrderRecurringId($pk);

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
        $pos = OcOrderRecurringTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getOrderRecurringId();
                break;
            case 1:
                return $this->getOrderId();
                break;
            case 2:
                return $this->getReference();
                break;
            case 3:
                return $this->getProductId();
                break;
            case 4:
                return $this->getProductName();
                break;
            case 5:
                return $this->getProductQuantity();
                break;
            case 6:
                return $this->getRecurringId();
                break;
            case 7:
                return $this->getRecurringName();
                break;
            case 8:
                return $this->getRecurringDescription();
                break;
            case 9:
                return $this->getRecurringFrequency();
                break;
            case 10:
                return $this->getRecurringCycle();
                break;
            case 11:
                return $this->getRecurringDuration();
                break;
            case 12:
                return $this->getRecurringPrice();
                break;
            case 13:
                return $this->getTrial();
                break;
            case 14:
                return $this->getTrialFrequency();
                break;
            case 15:
                return $this->getTrialCycle();
                break;
            case 16:
                return $this->getTrialDuration();
                break;
            case 17:
                return $this->getTrialPrice();
                break;
            case 18:
                return $this->getStatus();
                break;
            case 19:
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

        if (isset($alreadyDumpedObjects['OcOrderRecurring'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['OcOrderRecurring'][$this->hashCode()] = true;
        $keys = OcOrderRecurringTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getOrderRecurringId(),
            $keys[1] => $this->getOrderId(),
            $keys[2] => $this->getReference(),
            $keys[3] => $this->getProductId(),
            $keys[4] => $this->getProductName(),
            $keys[5] => $this->getProductQuantity(),
            $keys[6] => $this->getRecurringId(),
            $keys[7] => $this->getRecurringName(),
            $keys[8] => $this->getRecurringDescription(),
            $keys[9] => $this->getRecurringFrequency(),
            $keys[10] => $this->getRecurringCycle(),
            $keys[11] => $this->getRecurringDuration(),
            $keys[12] => $this->getRecurringPrice(),
            $keys[13] => $this->getTrial(),
            $keys[14] => $this->getTrialFrequency(),
            $keys[15] => $this->getTrialCycle(),
            $keys[16] => $this->getTrialDuration(),
            $keys[17] => $this->getTrialPrice(),
            $keys[18] => $this->getStatus(),
            $keys[19] => $this->getDateAdded(),
        );
        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
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
     * @return $this|\OcOrderRecurring
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OcOrderRecurringTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\OcOrderRecurring
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setOrderRecurringId($value);
                break;
            case 1:
                $this->setOrderId($value);
                break;
            case 2:
                $this->setReference($value);
                break;
            case 3:
                $this->setProductId($value);
                break;
            case 4:
                $this->setProductName($value);
                break;
            case 5:
                $this->setProductQuantity($value);
                break;
            case 6:
                $this->setRecurringId($value);
                break;
            case 7:
                $this->setRecurringName($value);
                break;
            case 8:
                $this->setRecurringDescription($value);
                break;
            case 9:
                $this->setRecurringFrequency($value);
                break;
            case 10:
                $this->setRecurringCycle($value);
                break;
            case 11:
                $this->setRecurringDuration($value);
                break;
            case 12:
                $this->setRecurringPrice($value);
                break;
            case 13:
                $this->setTrial($value);
                break;
            case 14:
                $this->setTrialFrequency($value);
                break;
            case 15:
                $this->setTrialCycle($value);
                break;
            case 16:
                $this->setTrialDuration($value);
                break;
            case 17:
                $this->setTrialPrice($value);
                break;
            case 18:
                $this->setStatus($value);
                break;
            case 19:
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
        $keys = OcOrderRecurringTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setOrderRecurringId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setOrderId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setReference($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setProductId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setProductName($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setProductQuantity($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRecurringId($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setRecurringName($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setRecurringDescription($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setRecurringFrequency($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setRecurringCycle($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setRecurringDuration($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setRecurringPrice($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTrial($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTrialFrequency($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setTrialCycle($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTrialDuration($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setTrialPrice($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setStatus($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setDateAdded($arr[$keys[19]]);
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
     * @return $this|\OcOrderRecurring The current object, for fluid interface
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
        $criteria = new Criteria(OcOrderRecurringTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID)) {
            $criteria->add(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, $this->order_recurring_id);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_ORDER_ID)) {
            $criteria->add(OcOrderRecurringTableMap::COL_ORDER_ID, $this->order_id);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_REFERENCE)) {
            $criteria->add(OcOrderRecurringTableMap::COL_REFERENCE, $this->reference);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_PRODUCT_ID)) {
            $criteria->add(OcOrderRecurringTableMap::COL_PRODUCT_ID, $this->product_id);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_PRODUCT_NAME)) {
            $criteria->add(OcOrderRecurringTableMap::COL_PRODUCT_NAME, $this->product_name);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY)) {
            $criteria->add(OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY, $this->product_quantity);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_ID)) {
            $criteria->add(OcOrderRecurringTableMap::COL_RECURRING_ID, $this->recurring_id);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_NAME)) {
            $criteria->add(OcOrderRecurringTableMap::COL_RECURRING_NAME, $this->recurring_name);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_DESCRIPTION)) {
            $criteria->add(OcOrderRecurringTableMap::COL_RECURRING_DESCRIPTION, $this->recurring_description);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_FREQUENCY)) {
            $criteria->add(OcOrderRecurringTableMap::COL_RECURRING_FREQUENCY, $this->recurring_frequency);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_CYCLE)) {
            $criteria->add(OcOrderRecurringTableMap::COL_RECURRING_CYCLE, $this->recurring_cycle);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_DURATION)) {
            $criteria->add(OcOrderRecurringTableMap::COL_RECURRING_DURATION, $this->recurring_duration);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_RECURRING_PRICE)) {
            $criteria->add(OcOrderRecurringTableMap::COL_RECURRING_PRICE, $this->recurring_price);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL)) {
            $criteria->add(OcOrderRecurringTableMap::COL_TRIAL, $this->trial);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL_FREQUENCY)) {
            $criteria->add(OcOrderRecurringTableMap::COL_TRIAL_FREQUENCY, $this->trial_frequency);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL_CYCLE)) {
            $criteria->add(OcOrderRecurringTableMap::COL_TRIAL_CYCLE, $this->trial_cycle);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL_DURATION)) {
            $criteria->add(OcOrderRecurringTableMap::COL_TRIAL_DURATION, $this->trial_duration);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_TRIAL_PRICE)) {
            $criteria->add(OcOrderRecurringTableMap::COL_TRIAL_PRICE, $this->trial_price);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_STATUS)) {
            $criteria->add(OcOrderRecurringTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(OcOrderRecurringTableMap::COL_DATE_ADDED)) {
            $criteria->add(OcOrderRecurringTableMap::COL_DATE_ADDED, $this->date_added);
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
        $criteria = ChildOcOrderRecurringQuery::create();
        $criteria->add(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, $this->order_recurring_id);

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
        $validPk = null !== $this->getOrderRecurringId();

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
        return $this->getOrderRecurringId();
    }

    /**
     * Generic method to set the primary key (order_recurring_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setOrderRecurringId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getOrderRecurringId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \OcOrderRecurring (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setOrderId($this->getOrderId());
        $copyObj->setReference($this->getReference());
        $copyObj->setProductId($this->getProductId());
        $copyObj->setProductName($this->getProductName());
        $copyObj->setProductQuantity($this->getProductQuantity());
        $copyObj->setRecurringId($this->getRecurringId());
        $copyObj->setRecurringName($this->getRecurringName());
        $copyObj->setRecurringDescription($this->getRecurringDescription());
        $copyObj->setRecurringFrequency($this->getRecurringFrequency());
        $copyObj->setRecurringCycle($this->getRecurringCycle());
        $copyObj->setRecurringDuration($this->getRecurringDuration());
        $copyObj->setRecurringPrice($this->getRecurringPrice());
        $copyObj->setTrial($this->getTrial());
        $copyObj->setTrialFrequency($this->getTrialFrequency());
        $copyObj->setTrialCycle($this->getTrialCycle());
        $copyObj->setTrialDuration($this->getTrialDuration());
        $copyObj->setTrialPrice($this->getTrialPrice());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setDateAdded($this->getDateAdded());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setOrderRecurringId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \OcOrderRecurring Clone of current object.
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
        $this->order_recurring_id = null;
        $this->order_id = null;
        $this->reference = null;
        $this->product_id = null;
        $this->product_name = null;
        $this->product_quantity = null;
        $this->recurring_id = null;
        $this->recurring_name = null;
        $this->recurring_description = null;
        $this->recurring_frequency = null;
        $this->recurring_cycle = null;
        $this->recurring_duration = null;
        $this->recurring_price = null;
        $this->trial = null;
        $this->trial_frequency = null;
        $this->trial_cycle = null;
        $this->trial_duration = null;
        $this->trial_price = null;
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
        return (string) $this->exportTo(OcOrderRecurringTableMap::DEFAULT_STRING_FORMAT);
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
