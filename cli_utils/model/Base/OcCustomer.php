<?php

namespace Base;

use \OcCustomerQuery as ChildOcCustomerQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\OcCustomerTableMap;
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
 * Base class that represents a row from the 'oc_customer' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class OcCustomer implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OcCustomerTableMap';


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
     * The value for the customer_group_id field.
     *
     * @var        int
     */
    protected $customer_group_id;

    /**
     * The value for the store_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $store_id;

    /**
     * The value for the language_id field.
     *
     * @var        int
     */
    protected $language_id;

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
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * The value for the salt field.
     *
     * @var        string
     */
    protected $salt;

    /**
     * The value for the cart field.
     *
     * @var        string
     */
    protected $cart;

    /**
     * The value for the wishlist field.
     *
     * @var        string
     */
    protected $wishlist;

    /**
     * The value for the newsletter field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $newsletter;

    /**
     * The value for the address_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $address_id;

    /**
     * The value for the custom_field field.
     *
     * @var        string
     */
    protected $custom_field;

    /**
     * The value for the ip field.
     *
     * @var        string
     */
    protected $ip;

    /**
     * The value for the status field.
     *
     * @var        boolean
     */
    protected $status;

    /**
     * The value for the safe field.
     *
     * @var        boolean
     */
    protected $safe;

    /**
     * The value for the token field.
     *
     * @var        string
     */
    protected $token;

    /**
     * The value for the code field.
     *
     * @var        string
     */
    protected $code;

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
        $this->store_id = 0;
        $this->newsletter = false;
        $this->address_id = 0;
    }

    /**
     * Initializes internal state of Base\OcCustomer object.
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
     * Compares this with another <code>OcCustomer</code> instance.  If
     * <code>obj</code> is an instance of <code>OcCustomer</code>, delegates to
     * <code>equals(OcCustomer)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|OcCustomer The current object, for fluid interface
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
     * Get the [customer_group_id] column value.
     *
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->customer_group_id;
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
     * Get the [language_id] column value.
     *
     * @return int
     */
    public function getLanguageId()
    {
        return $this->language_id;
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
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [salt] column value.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Get the [cart] column value.
     *
     * @return string
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Get the [wishlist] column value.
     *
     * @return string
     */
    public function getWishlist()
    {
        return $this->wishlist;
    }

    /**
     * Get the [newsletter] column value.
     *
     * @return boolean
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * Get the [newsletter] column value.
     *
     * @return boolean
     */
    public function isNewsletter()
    {
        return $this->getNewsletter();
    }

    /**
     * Get the [address_id] column value.
     *
     * @return int
     */
    public function getAddressId()
    {
        return $this->address_id;
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
     * Get the [ip] column value.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
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
     * Get the [safe] column value.
     *
     * @return boolean
     */
    public function getSafe()
    {
        return $this->safe;
    }

    /**
     * Get the [safe] column value.
     *
     * @return boolean
     */
    public function isSafe()
    {
        return $this->getSafe();
    }

    /**
     * Get the [token] column value.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get the [code] column value.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setCustomerId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->customer_id !== $v) {
            $this->customer_id = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_CUSTOMER_ID] = true;
        }

        return $this;
    } // setCustomerId()

    /**
     * Set the value of [customer_group_id] column.
     *
     * @param int $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setCustomerGroupId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->customer_group_id !== $v) {
            $this->customer_group_id = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_CUSTOMER_GROUP_ID] = true;
        }

        return $this;
    } // setCustomerGroupId()

    /**
     * Set the value of [store_id] column.
     *
     * @param int $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setStoreId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->store_id !== $v) {
            $this->store_id = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_STORE_ID] = true;
        }

        return $this;
    } // setStoreId()

    /**
     * Set the value of [language_id] column.
     *
     * @param int $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setLanguageId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->language_id !== $v) {
            $this->language_id = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_LANGUAGE_ID] = true;
        }

        return $this;
    } // setLanguageId()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_FIRSTNAME] = true;
        }

        return $this;
    } // setFirstname()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_LASTNAME] = true;
        }

        return $this;
    } // setLastname()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [telephone] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setTelephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->telephone !== $v) {
            $this->telephone = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_TELEPHONE] = true;
        }

        return $this;
    } // setTelephone()

    /**
     * Set the value of [fax] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setFax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax !== $v) {
            $this->fax = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_FAX] = true;
        }

        return $this;
    } // setFax()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [salt] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setSalt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salt !== $v) {
            $this->salt = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_SALT] = true;
        }

        return $this;
    } // setSalt()

    /**
     * Set the value of [cart] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setCart($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cart !== $v) {
            $this->cart = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_CART] = true;
        }

        return $this;
    } // setCart()

    /**
     * Set the value of [wishlist] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setWishlist($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->wishlist !== $v) {
            $this->wishlist = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_WISHLIST] = true;
        }

        return $this;
    } // setWishlist()

    /**
     * Sets the value of the [newsletter] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setNewsletter($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->newsletter !== $v) {
            $this->newsletter = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_NEWSLETTER] = true;
        }

        return $this;
    } // setNewsletter()

    /**
     * Set the value of [address_id] column.
     *
     * @param int $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setAddressId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->address_id !== $v) {
            $this->address_id = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_ADDRESS_ID] = true;
        }

        return $this;
    } // setAddressId()

    /**
     * Set the value of [custom_field] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setCustomField($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custom_field !== $v) {
            $this->custom_field = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_CUSTOM_FIELD] = true;
        }

        return $this;
    } // setCustomField()

    /**
     * Set the value of [ip] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setIp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ip !== $v) {
            $this->ip = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_IP] = true;
        }

        return $this;
    } // setIp()

    /**
     * Sets the value of the [status] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\OcCustomer The current object (for fluent API support)
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
            $this->modifiedColumns[OcCustomerTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Sets the value of the [safe] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setSafe($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->safe !== $v) {
            $this->safe = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_SAFE] = true;
        }

        return $this;
    } // setSafe()

    /**
     * Set the value of [token] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setToken($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->token !== $v) {
            $this->token = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_TOKEN] = true;
        }

        return $this;
    } // setToken()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[OcCustomerTableMap::COL_CODE] = true;
        }

        return $this;
    } // setCode()

    /**
     * Sets the value of [date_added] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\OcCustomer The current object (for fluent API support)
     */
    public function setDateAdded($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_added !== null || $dt !== null) {
            if ($this->date_added === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_added->format("Y-m-d H:i:s.u")) {
                $this->date_added = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OcCustomerTableMap::COL_DATE_ADDED] = true;
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
            if ($this->store_id !== 0) {
                return false;
            }

            if ($this->newsletter !== false) {
                return false;
            }

            if ($this->address_id !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OcCustomerTableMap::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OcCustomerTableMap::translateFieldName('CustomerGroupId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_group_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OcCustomerTableMap::translateFieldName('StoreId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->store_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OcCustomerTableMap::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->language_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OcCustomerTableMap::translateFieldName('Firstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OcCustomerTableMap::translateFieldName('Lastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OcCustomerTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OcCustomerTableMap::translateFieldName('Telephone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->telephone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OcCustomerTableMap::translateFieldName('Fax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OcCustomerTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OcCustomerTableMap::translateFieldName('Salt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OcCustomerTableMap::translateFieldName('Cart', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cart = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OcCustomerTableMap::translateFieldName('Wishlist', TableMap::TYPE_PHPNAME, $indexType)];
            $this->wishlist = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OcCustomerTableMap::translateFieldName('Newsletter', TableMap::TYPE_PHPNAME, $indexType)];
            $this->newsletter = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OcCustomerTableMap::translateFieldName('AddressId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OcCustomerTableMap::translateFieldName('CustomField', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custom_field = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OcCustomerTableMap::translateFieldName('Ip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OcCustomerTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OcCustomerTableMap::translateFieldName('Safe', TableMap::TYPE_PHPNAME, $indexType)];
            $this->safe = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OcCustomerTableMap::translateFieldName('Token', TableMap::TYPE_PHPNAME, $indexType)];
            $this->token = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : OcCustomerTableMap::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)];
            $this->code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : OcCustomerTableMap::translateFieldName('DateAdded', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_added = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 22; // 22 = OcCustomerTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\OcCustomer'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomerTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOcCustomerQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see OcCustomer::setDeleted()
     * @see OcCustomer::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOcCustomerQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerTableMap::DATABASE_NAME);
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
                OcCustomerTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[OcCustomerTableMap::COL_CUSTOMER_ID] = true;
        if (null !== $this->customer_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OcCustomerTableMap::COL_CUSTOMER_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OcCustomerTableMap::COL_CUSTOMER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'customer_id';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_CUSTOMER_GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = 'customer_group_id';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_STORE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'store_id';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_LANGUAGE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'language_id';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'firstname';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'lastname';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_TELEPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'telephone';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_FAX)) {
            $modifiedColumns[':p' . $index++]  = 'fax';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_SALT)) {
            $modifiedColumns[':p' . $index++]  = 'salt';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_CART)) {
            $modifiedColumns[':p' . $index++]  = 'cart';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_WISHLIST)) {
            $modifiedColumns[':p' . $index++]  = 'wishlist';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_NEWSLETTER)) {
            $modifiedColumns[':p' . $index++]  = 'newsletter';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_ADDRESS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'address_id';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_CUSTOM_FIELD)) {
            $modifiedColumns[':p' . $index++]  = 'custom_field';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_IP)) {
            $modifiedColumns[':p' . $index++]  = 'ip';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_SAFE)) {
            $modifiedColumns[':p' . $index++]  = 'safe';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_TOKEN)) {
            $modifiedColumns[':p' . $index++]  = 'token';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'code';
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_DATE_ADDED)) {
            $modifiedColumns[':p' . $index++]  = 'date_added';
        }

        $sql = sprintf(
            'INSERT INTO oc_customer (%s) VALUES (%s)',
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
                    case 'customer_group_id':
                        $stmt->bindValue($identifier, $this->customer_group_id, PDO::PARAM_INT);
                        break;
                    case 'store_id':
                        $stmt->bindValue($identifier, $this->store_id, PDO::PARAM_INT);
                        break;
                    case 'language_id':
                        $stmt->bindValue($identifier, $this->language_id, PDO::PARAM_INT);
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
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'salt':
                        $stmt->bindValue($identifier, $this->salt, PDO::PARAM_STR);
                        break;
                    case 'cart':
                        $stmt->bindValue($identifier, $this->cart, PDO::PARAM_STR);
                        break;
                    case 'wishlist':
                        $stmt->bindValue($identifier, $this->wishlist, PDO::PARAM_STR);
                        break;
                    case 'newsletter':
                        $stmt->bindValue($identifier, (int) $this->newsletter, PDO::PARAM_INT);
                        break;
                    case 'address_id':
                        $stmt->bindValue($identifier, $this->address_id, PDO::PARAM_INT);
                        break;
                    case 'custom_field':
                        $stmt->bindValue($identifier, $this->custom_field, PDO::PARAM_STR);
                        break;
                    case 'ip':
                        $stmt->bindValue($identifier, $this->ip, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, (int) $this->status, PDO::PARAM_INT);
                        break;
                    case 'safe':
                        $stmt->bindValue($identifier, (int) $this->safe, PDO::PARAM_INT);
                        break;
                    case 'token':
                        $stmt->bindValue($identifier, $this->token, PDO::PARAM_STR);
                        break;
                    case 'code':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
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
        $this->setCustomerId($pk);

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
        $pos = OcCustomerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCustomerGroupId();
                break;
            case 2:
                return $this->getStoreId();
                break;
            case 3:
                return $this->getLanguageId();
                break;
            case 4:
                return $this->getFirstname();
                break;
            case 5:
                return $this->getLastname();
                break;
            case 6:
                return $this->getEmail();
                break;
            case 7:
                return $this->getTelephone();
                break;
            case 8:
                return $this->getFax();
                break;
            case 9:
                return $this->getPassword();
                break;
            case 10:
                return $this->getSalt();
                break;
            case 11:
                return $this->getCart();
                break;
            case 12:
                return $this->getWishlist();
                break;
            case 13:
                return $this->getNewsletter();
                break;
            case 14:
                return $this->getAddressId();
                break;
            case 15:
                return $this->getCustomField();
                break;
            case 16:
                return $this->getIp();
                break;
            case 17:
                return $this->getStatus();
                break;
            case 18:
                return $this->getSafe();
                break;
            case 19:
                return $this->getToken();
                break;
            case 20:
                return $this->getCode();
                break;
            case 21:
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

        if (isset($alreadyDumpedObjects['OcCustomer'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['OcCustomer'][$this->hashCode()] = true;
        $keys = OcCustomerTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCustomerId(),
            $keys[1] => $this->getCustomerGroupId(),
            $keys[2] => $this->getStoreId(),
            $keys[3] => $this->getLanguageId(),
            $keys[4] => $this->getFirstname(),
            $keys[5] => $this->getLastname(),
            $keys[6] => $this->getEmail(),
            $keys[7] => $this->getTelephone(),
            $keys[8] => $this->getFax(),
            $keys[9] => $this->getPassword(),
            $keys[10] => $this->getSalt(),
            $keys[11] => $this->getCart(),
            $keys[12] => $this->getWishlist(),
            $keys[13] => $this->getNewsletter(),
            $keys[14] => $this->getAddressId(),
            $keys[15] => $this->getCustomField(),
            $keys[16] => $this->getIp(),
            $keys[17] => $this->getStatus(),
            $keys[18] => $this->getSafe(),
            $keys[19] => $this->getToken(),
            $keys[20] => $this->getCode(),
            $keys[21] => $this->getDateAdded(),
        );
        if ($result[$keys[21]] instanceof \DateTimeInterface) {
            $result[$keys[21]] = $result[$keys[21]]->format('c');
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
     * @return $this|\OcCustomer
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OcCustomerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\OcCustomer
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCustomerId($value);
                break;
            case 1:
                $this->setCustomerGroupId($value);
                break;
            case 2:
                $this->setStoreId($value);
                break;
            case 3:
                $this->setLanguageId($value);
                break;
            case 4:
                $this->setFirstname($value);
                break;
            case 5:
                $this->setLastname($value);
                break;
            case 6:
                $this->setEmail($value);
                break;
            case 7:
                $this->setTelephone($value);
                break;
            case 8:
                $this->setFax($value);
                break;
            case 9:
                $this->setPassword($value);
                break;
            case 10:
                $this->setSalt($value);
                break;
            case 11:
                $this->setCart($value);
                break;
            case 12:
                $this->setWishlist($value);
                break;
            case 13:
                $this->setNewsletter($value);
                break;
            case 14:
                $this->setAddressId($value);
                break;
            case 15:
                $this->setCustomField($value);
                break;
            case 16:
                $this->setIp($value);
                break;
            case 17:
                $this->setStatus($value);
                break;
            case 18:
                $this->setSafe($value);
                break;
            case 19:
                $this->setToken($value);
                break;
            case 20:
                $this->setCode($value);
                break;
            case 21:
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
        $keys = OcCustomerTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCustomerId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCustomerGroupId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setStoreId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLanguageId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFirstname($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLastname($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEmail($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTelephone($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setFax($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPassword($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSalt($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCart($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setWishlist($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setNewsletter($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAddressId($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCustomField($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setIp($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setStatus($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setSafe($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setToken($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setCode($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setDateAdded($arr[$keys[21]]);
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
     * @return $this|\OcCustomer The current object, for fluid interface
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
        $criteria = new Criteria(OcCustomerTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OcCustomerTableMap::COL_CUSTOMER_ID)) {
            $criteria->add(OcCustomerTableMap::COL_CUSTOMER_ID, $this->customer_id);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_CUSTOMER_GROUP_ID)) {
            $criteria->add(OcCustomerTableMap::COL_CUSTOMER_GROUP_ID, $this->customer_group_id);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_STORE_ID)) {
            $criteria->add(OcCustomerTableMap::COL_STORE_ID, $this->store_id);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_LANGUAGE_ID)) {
            $criteria->add(OcCustomerTableMap::COL_LANGUAGE_ID, $this->language_id);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_FIRSTNAME)) {
            $criteria->add(OcCustomerTableMap::COL_FIRSTNAME, $this->firstname);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_LASTNAME)) {
            $criteria->add(OcCustomerTableMap::COL_LASTNAME, $this->lastname);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_EMAIL)) {
            $criteria->add(OcCustomerTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_TELEPHONE)) {
            $criteria->add(OcCustomerTableMap::COL_TELEPHONE, $this->telephone);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_FAX)) {
            $criteria->add(OcCustomerTableMap::COL_FAX, $this->fax);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_PASSWORD)) {
            $criteria->add(OcCustomerTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_SALT)) {
            $criteria->add(OcCustomerTableMap::COL_SALT, $this->salt);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_CART)) {
            $criteria->add(OcCustomerTableMap::COL_CART, $this->cart);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_WISHLIST)) {
            $criteria->add(OcCustomerTableMap::COL_WISHLIST, $this->wishlist);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_NEWSLETTER)) {
            $criteria->add(OcCustomerTableMap::COL_NEWSLETTER, $this->newsletter);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_ADDRESS_ID)) {
            $criteria->add(OcCustomerTableMap::COL_ADDRESS_ID, $this->address_id);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_CUSTOM_FIELD)) {
            $criteria->add(OcCustomerTableMap::COL_CUSTOM_FIELD, $this->custom_field);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_IP)) {
            $criteria->add(OcCustomerTableMap::COL_IP, $this->ip);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_STATUS)) {
            $criteria->add(OcCustomerTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_SAFE)) {
            $criteria->add(OcCustomerTableMap::COL_SAFE, $this->safe);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_TOKEN)) {
            $criteria->add(OcCustomerTableMap::COL_TOKEN, $this->token);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_CODE)) {
            $criteria->add(OcCustomerTableMap::COL_CODE, $this->code);
        }
        if ($this->isColumnModified(OcCustomerTableMap::COL_DATE_ADDED)) {
            $criteria->add(OcCustomerTableMap::COL_DATE_ADDED, $this->date_added);
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
        $criteria = ChildOcCustomerQuery::create();
        $criteria->add(OcCustomerTableMap::COL_CUSTOMER_ID, $this->customer_id);

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
     * @param      object $copyObj An object of \OcCustomer (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCustomerGroupId($this->getCustomerGroupId());
        $copyObj->setStoreId($this->getStoreId());
        $copyObj->setLanguageId($this->getLanguageId());
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setTelephone($this->getTelephone());
        $copyObj->setFax($this->getFax());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setSalt($this->getSalt());
        $copyObj->setCart($this->getCart());
        $copyObj->setWishlist($this->getWishlist());
        $copyObj->setNewsletter($this->getNewsletter());
        $copyObj->setAddressId($this->getAddressId());
        $copyObj->setCustomField($this->getCustomField());
        $copyObj->setIp($this->getIp());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setSafe($this->getSafe());
        $copyObj->setToken($this->getToken());
        $copyObj->setCode($this->getCode());
        $copyObj->setDateAdded($this->getDateAdded());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCustomerId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \OcCustomer Clone of current object.
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
        $this->customer_group_id = null;
        $this->store_id = null;
        $this->language_id = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->telephone = null;
        $this->fax = null;
        $this->password = null;
        $this->salt = null;
        $this->cart = null;
        $this->wishlist = null;
        $this->newsletter = null;
        $this->address_id = null;
        $this->custom_field = null;
        $this->ip = null;
        $this->status = null;
        $this->safe = null;
        $this->token = null;
        $this->code = null;
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
        return (string) $this->exportTo(OcCustomerTableMap::DEFAULT_STRING_FORMAT);
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
