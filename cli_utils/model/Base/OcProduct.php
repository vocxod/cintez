<?php

namespace Base;

use \OcProductQuery as ChildOcProductQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\OcProductTableMap;
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
 * Base class that represents a row from the 'oc_product' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class OcProduct implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OcProductTableMap';


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
     * The value for the product_id field.
     *
     * @var        int
     */
    protected $product_id;

    /**
     * The value for the model field.
     *
     * @var        string
     */
    protected $model;

    /**
     * The value for the sku field.
     *
     * @var        string
     */
    protected $sku;

    /**
     * The value for the upc field.
     *
     * @var        string
     */
    protected $upc;

    /**
     * The value for the ean field.
     *
     * @var        string
     */
    protected $ean;

    /**
     * The value for the jan field.
     *
     * @var        string
     */
    protected $jan;

    /**
     * The value for the isbn field.
     *
     * @var        string
     */
    protected $isbn;

    /**
     * The value for the mpn field.
     *
     * @var        string
     */
    protected $mpn;

    /**
     * The value for the location field.
     *
     * @var        string
     */
    protected $location;

    /**
     * The value for the quantity field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $quantity;

    /**
     * The value for the stock_status_id field.
     *
     * @var        int
     */
    protected $stock_status_id;

    /**
     * The value for the image field.
     *
     * @var        string
     */
    protected $image;

    /**
     * The value for the manufacturer_id field.
     *
     * @var        int
     */
    protected $manufacturer_id;

    /**
     * The value for the shipping field.
     *
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $shipping;

    /**
     * The value for the price field.
     *
     * Note: this column has a database default value of: '0.0000'
     * @var        string
     */
    protected $price;

    /**
     * The value for the points field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $points;

    /**
     * The value for the tax_class_id field.
     *
     * @var        int
     */
    protected $tax_class_id;

    /**
     * The value for the date_available field.
     *
     * Note: this column has a database default value of: NULL
     * @var        DateTime
     */
    protected $date_available;

    /**
     * The value for the weight field.
     *
     * Note: this column has a database default value of: '0.00000000'
     * @var        string
     */
    protected $weight;

    /**
     * The value for the weight_class_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $weight_class_id;

    /**
     * The value for the length field.
     *
     * Note: this column has a database default value of: '0.00000000'
     * @var        string
     */
    protected $length;

    /**
     * The value for the width field.
     *
     * Note: this column has a database default value of: '0.00000000'
     * @var        string
     */
    protected $width;

    /**
     * The value for the height field.
     *
     * Note: this column has a database default value of: '0.00000000'
     * @var        string
     */
    protected $height;

    /**
     * The value for the length_class_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $length_class_id;

    /**
     * The value for the subtract field.
     *
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $subtract;

    /**
     * The value for the minimum field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $minimum;

    /**
     * The value for the sort_order field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $sort_order;

    /**
     * The value for the status field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $status;

    /**
     * The value for the viewed field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $viewed;

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
     * The value for the status2 field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $status2;

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
        $this->quantity = 0;
        $this->shipping = true;
        $this->price = '0.0000';
        $this->points = 0;
        $this->date_available = PropelDateTime::newInstance(NULL, null, 'DateTime');
        $this->weight = '0.00000000';
        $this->weight_class_id = 0;
        $this->length = '0.00000000';
        $this->width = '0.00000000';
        $this->height = '0.00000000';
        $this->length_class_id = 0;
        $this->subtract = true;
        $this->minimum = 1;
        $this->sort_order = 0;
        $this->status = false;
        $this->viewed = 0;
        $this->date_modified = PropelDateTime::newInstance(NULL, null, 'DateTime');
        $this->status2 = 0;
    }

    /**
     * Initializes internal state of Base\OcProduct object.
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
     * Compares this with another <code>OcProduct</code> instance.  If
     * <code>obj</code> is an instance of <code>OcProduct</code>, delegates to
     * <code>equals(OcProduct)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|OcProduct The current object, for fluid interface
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
     * Get the [product_id] column value.
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Get the [model] column value.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get the [sku] column value.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Get the [upc] column value.
     *
     * @return string
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * Get the [ean] column value.
     *
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Get the [jan] column value.
     *
     * @return string
     */
    public function getJan()
    {
        return $this->jan;
    }

    /**
     * Get the [isbn] column value.
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Get the [mpn] column value.
     *
     * @return string
     */
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * Get the [location] column value.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the [quantity] column value.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the [stock_status_id] column value.
     *
     * @return int
     */
    public function getStockStatusId()
    {
        return $this->stock_status_id;
    }

    /**
     * Get the [image] column value.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the [manufacturer_id] column value.
     *
     * @return int
     */
    public function getManufacturerId()
    {
        return $this->manufacturer_id;
    }

    /**
     * Get the [shipping] column value.
     *
     * @return boolean
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Get the [shipping] column value.
     *
     * @return boolean
     */
    public function isShipping()
    {
        return $this->getShipping();
    }

    /**
     * Get the [price] column value.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [points] column value.
     *
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Get the [tax_class_id] column value.
     *
     * @return int
     */
    public function getTaxClassId()
    {
        return $this->tax_class_id;
    }

    /**
     * Get the [optionally formatted] temporal [date_available] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateAvailable($format = NULL)
    {
        if ($format === null) {
            return $this->date_available;
        } else {
            return $this->date_available instanceof \DateTimeInterface ? $this->date_available->format($format) : null;
        }
    }

    /**
     * Get the [weight] column value.
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get the [weight_class_id] column value.
     *
     * @return int
     */
    public function getWeightClassId()
    {
        return $this->weight_class_id;
    }

    /**
     * Get the [length] column value.
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Get the [width] column value.
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the [height] column value.
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the [length_class_id] column value.
     *
     * @return int
     */
    public function getLengthClassId()
    {
        return $this->length_class_id;
    }

    /**
     * Get the [subtract] column value.
     *
     * @return boolean
     */
    public function getSubtract()
    {
        return $this->subtract;
    }

    /**
     * Get the [subtract] column value.
     *
     * @return boolean
     */
    public function isSubtract()
    {
        return $this->getSubtract();
    }

    /**
     * Get the [minimum] column value.
     *
     * @return int
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * Get the [sort_order] column value.
     *
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sort_order;
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
     * Get the [viewed] column value.
     *
     * @return int
     */
    public function getViewed()
    {
        return $this->viewed;
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
     * Get the [status2] column value.
     *
     * @return int
     */
    public function getStatus2()
    {
        return $this->status2;
    }

    /**
     * Set the value of [product_id] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setProductId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->product_id !== $v) {
            $this->product_id = $v;
            $this->modifiedColumns[OcProductTableMap::COL_PRODUCT_ID] = true;
        }

        return $this;
    } // setProductId()

    /**
     * Set the value of [model] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setModel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->model !== $v) {
            $this->model = $v;
            $this->modifiedColumns[OcProductTableMap::COL_MODEL] = true;
        }

        return $this;
    } // setModel()

    /**
     * Set the value of [sku] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[OcProductTableMap::COL_SKU] = true;
        }

        return $this;
    } // setSku()

    /**
     * Set the value of [upc] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setUpc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->upc !== $v) {
            $this->upc = $v;
            $this->modifiedColumns[OcProductTableMap::COL_UPC] = true;
        }

        return $this;
    } // setUpc()

    /**
     * Set the value of [ean] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setEan($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ean !== $v) {
            $this->ean = $v;
            $this->modifiedColumns[OcProductTableMap::COL_EAN] = true;
        }

        return $this;
    } // setEan()

    /**
     * Set the value of [jan] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setJan($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->jan !== $v) {
            $this->jan = $v;
            $this->modifiedColumns[OcProductTableMap::COL_JAN] = true;
        }

        return $this;
    } // setJan()

    /**
     * Set the value of [isbn] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setIsbn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->isbn !== $v) {
            $this->isbn = $v;
            $this->modifiedColumns[OcProductTableMap::COL_ISBN] = true;
        }

        return $this;
    } // setIsbn()

    /**
     * Set the value of [mpn] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setMpn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mpn !== $v) {
            $this->mpn = $v;
            $this->modifiedColumns[OcProductTableMap::COL_MPN] = true;
        }

        return $this;
    } // setMpn()

    /**
     * Set the value of [location] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setLocation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->location !== $v) {
            $this->location = $v;
            $this->modifiedColumns[OcProductTableMap::COL_LOCATION] = true;
        }

        return $this;
    } // setLocation()

    /**
     * Set the value of [quantity] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->quantity !== $v) {
            $this->quantity = $v;
            $this->modifiedColumns[OcProductTableMap::COL_QUANTITY] = true;
        }

        return $this;
    } // setQuantity()

    /**
     * Set the value of [stock_status_id] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setStockStatusId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->stock_status_id !== $v) {
            $this->stock_status_id = $v;
            $this->modifiedColumns[OcProductTableMap::COL_STOCK_STATUS_ID] = true;
        }

        return $this;
    } // setStockStatusId()

    /**
     * Set the value of [image] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->image !== $v) {
            $this->image = $v;
            $this->modifiedColumns[OcProductTableMap::COL_IMAGE] = true;
        }

        return $this;
    } // setImage()

    /**
     * Set the value of [manufacturer_id] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setManufacturerId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->manufacturer_id !== $v) {
            $this->manufacturer_id = $v;
            $this->modifiedColumns[OcProductTableMap::COL_MANUFACTURER_ID] = true;
        }

        return $this;
    } // setManufacturerId()

    /**
     * Sets the value of the [shipping] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setShipping($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->shipping !== $v) {
            $this->shipping = $v;
            $this->modifiedColumns[OcProductTableMap::COL_SHIPPING] = true;
        }

        return $this;
    } // setShipping()

    /**
     * Set the value of [price] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[OcProductTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [points] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setPoints($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->points !== $v) {
            $this->points = $v;
            $this->modifiedColumns[OcProductTableMap::COL_POINTS] = true;
        }

        return $this;
    } // setPoints()

    /**
     * Set the value of [tax_class_id] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setTaxClassId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tax_class_id !== $v) {
            $this->tax_class_id = $v;
            $this->modifiedColumns[OcProductTableMap::COL_TAX_CLASS_ID] = true;
        }

        return $this;
    } // setTaxClassId()

    /**
     * Sets the value of [date_available] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setDateAvailable($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_available !== null || $dt !== null) {
            if ( ($dt != $this->date_available) // normalized values don't match
                || ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
                 ) {
                $this->date_available = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OcProductTableMap::COL_DATE_AVAILABLE] = true;
            }
        } // if either are not null

        return $this;
    } // setDateAvailable()

    /**
     * Set the value of [weight] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setWeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->weight !== $v) {
            $this->weight = $v;
            $this->modifiedColumns[OcProductTableMap::COL_WEIGHT] = true;
        }

        return $this;
    } // setWeight()

    /**
     * Set the value of [weight_class_id] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setWeightClassId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->weight_class_id !== $v) {
            $this->weight_class_id = $v;
            $this->modifiedColumns[OcProductTableMap::COL_WEIGHT_CLASS_ID] = true;
        }

        return $this;
    } // setWeightClassId()

    /**
     * Set the value of [length] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setLength($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->length !== $v) {
            $this->length = $v;
            $this->modifiedColumns[OcProductTableMap::COL_LENGTH] = true;
        }

        return $this;
    } // setLength()

    /**
     * Set the value of [width] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setWidth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->width !== $v) {
            $this->width = $v;
            $this->modifiedColumns[OcProductTableMap::COL_WIDTH] = true;
        }

        return $this;
    } // setWidth()

    /**
     * Set the value of [height] column.
     *
     * @param string $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setHeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->height !== $v) {
            $this->height = $v;
            $this->modifiedColumns[OcProductTableMap::COL_HEIGHT] = true;
        }

        return $this;
    } // setHeight()

    /**
     * Set the value of [length_class_id] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setLengthClassId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->length_class_id !== $v) {
            $this->length_class_id = $v;
            $this->modifiedColumns[OcProductTableMap::COL_LENGTH_CLASS_ID] = true;
        }

        return $this;
    } // setLengthClassId()

    /**
     * Sets the value of the [subtract] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setSubtract($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->subtract !== $v) {
            $this->subtract = $v;
            $this->modifiedColumns[OcProductTableMap::COL_SUBTRACT] = true;
        }

        return $this;
    } // setSubtract()

    /**
     * Set the value of [minimum] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setMinimum($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->minimum !== $v) {
            $this->minimum = $v;
            $this->modifiedColumns[OcProductTableMap::COL_MINIMUM] = true;
        }

        return $this;
    } // setMinimum()

    /**
     * Set the value of [sort_order] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setSortOrder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sort_order !== $v) {
            $this->sort_order = $v;
            $this->modifiedColumns[OcProductTableMap::COL_SORT_ORDER] = true;
        }

        return $this;
    } // setSortOrder()

    /**
     * Sets the value of the [status] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\OcProduct The current object (for fluent API support)
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
            $this->modifiedColumns[OcProductTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [viewed] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setViewed($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->viewed !== $v) {
            $this->viewed = $v;
            $this->modifiedColumns[OcProductTableMap::COL_VIEWED] = true;
        }

        return $this;
    } // setViewed()

    /**
     * Sets the value of [date_added] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setDateAdded($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_added !== null || $dt !== null) {
            if ($this->date_added === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_added->format("Y-m-d H:i:s.u")) {
                $this->date_added = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OcProductTableMap::COL_DATE_ADDED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateAdded()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ( ($dt != $this->date_modified) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s.u') === NULL) // or the entered value matches the default
                 ) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OcProductTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Set the value of [status2] column.
     *
     * @param int $v new value
     * @return $this|\OcProduct The current object (for fluent API support)
     */
    public function setStatus2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status2 !== $v) {
            $this->status2 = $v;
            $this->modifiedColumns[OcProductTableMap::COL_STATUS2] = true;
        }

        return $this;
    } // setStatus2()

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
            if ($this->quantity !== 0) {
                return false;
            }

            if ($this->shipping !== true) {
                return false;
            }

            if ($this->price !== '0.0000') {
                return false;
            }

            if ($this->points !== 0) {
                return false;
            }

            if ($this->date_available && $this->date_available->format('Y-m-d') !== NULL) {
                return false;
            }

            if ($this->weight !== '0.00000000') {
                return false;
            }

            if ($this->weight_class_id !== 0) {
                return false;
            }

            if ($this->length !== '0.00000000') {
                return false;
            }

            if ($this->width !== '0.00000000') {
                return false;
            }

            if ($this->height !== '0.00000000') {
                return false;
            }

            if ($this->length_class_id !== 0) {
                return false;
            }

            if ($this->subtract !== true) {
                return false;
            }

            if ($this->minimum !== 1) {
                return false;
            }

            if ($this->sort_order !== 0) {
                return false;
            }

            if ($this->status !== false) {
                return false;
            }

            if ($this->viewed !== 0) {
                return false;
            }

            if ($this->date_modified && $this->date_modified->format('Y-m-d H:i:s.u') !== NULL) {
                return false;
            }

            if ($this->status2 !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OcProductTableMap::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->product_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OcProductTableMap::translateFieldName('Model', TableMap::TYPE_PHPNAME, $indexType)];
            $this->model = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OcProductTableMap::translateFieldName('Sku', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sku = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OcProductTableMap::translateFieldName('Upc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->upc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OcProductTableMap::translateFieldName('Ean', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ean = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OcProductTableMap::translateFieldName('Jan', TableMap::TYPE_PHPNAME, $indexType)];
            $this->jan = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OcProductTableMap::translateFieldName('Isbn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->isbn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OcProductTableMap::translateFieldName('Mpn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mpn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OcProductTableMap::translateFieldName('Location', TableMap::TYPE_PHPNAME, $indexType)];
            $this->location = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OcProductTableMap::translateFieldName('Quantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OcProductTableMap::translateFieldName('StockStatusId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->stock_status_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OcProductTableMap::translateFieldName('Image', TableMap::TYPE_PHPNAME, $indexType)];
            $this->image = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OcProductTableMap::translateFieldName('ManufacturerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->manufacturer_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OcProductTableMap::translateFieldName('Shipping', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipping = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OcProductTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OcProductTableMap::translateFieldName('Points', TableMap::TYPE_PHPNAME, $indexType)];
            $this->points = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OcProductTableMap::translateFieldName('TaxClassId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tax_class_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OcProductTableMap::translateFieldName('DateAvailable', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->date_available = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OcProductTableMap::translateFieldName('Weight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OcProductTableMap::translateFieldName('WeightClassId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weight_class_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : OcProductTableMap::translateFieldName('Length', TableMap::TYPE_PHPNAME, $indexType)];
            $this->length = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : OcProductTableMap::translateFieldName('Width', TableMap::TYPE_PHPNAME, $indexType)];
            $this->width = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : OcProductTableMap::translateFieldName('Height', TableMap::TYPE_PHPNAME, $indexType)];
            $this->height = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : OcProductTableMap::translateFieldName('LengthClassId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->length_class_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : OcProductTableMap::translateFieldName('Subtract', TableMap::TYPE_PHPNAME, $indexType)];
            $this->subtract = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : OcProductTableMap::translateFieldName('Minimum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->minimum = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : OcProductTableMap::translateFieldName('SortOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sort_order = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : OcProductTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : OcProductTableMap::translateFieldName('Viewed', TableMap::TYPE_PHPNAME, $indexType)];
            $this->viewed = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : OcProductTableMap::translateFieldName('DateAdded', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_added = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : OcProductTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : OcProductTableMap::translateFieldName('Status2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status2 = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 32; // 32 = OcProductTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\OcProduct'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(OcProductTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOcProductQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see OcProduct::setDeleted()
     * @see OcProduct::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOcProductQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductTableMap::DATABASE_NAME);
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
                OcProductTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[OcProductTableMap::COL_PRODUCT_ID] = true;
        if (null !== $this->product_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OcProductTableMap::COL_PRODUCT_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OcProductTableMap::COL_PRODUCT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'product_id';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_MODEL)) {
            $modifiedColumns[':p' . $index++]  = 'model';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_SKU)) {
            $modifiedColumns[':p' . $index++]  = 'sku';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_UPC)) {
            $modifiedColumns[':p' . $index++]  = 'upc';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_EAN)) {
            $modifiedColumns[':p' . $index++]  = 'ean';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_JAN)) {
            $modifiedColumns[':p' . $index++]  = 'jan';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_ISBN)) {
            $modifiedColumns[':p' . $index++]  = 'isbn';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_MPN)) {
            $modifiedColumns[':p' . $index++]  = 'mpn';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_LOCATION)) {
            $modifiedColumns[':p' . $index++]  = 'location';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'quantity';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_STOCK_STATUS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'stock_status_id';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'image';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_MANUFACTURER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'manufacturer_id';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_SHIPPING)) {
            $modifiedColumns[':p' . $index++]  = 'shipping';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_POINTS)) {
            $modifiedColumns[':p' . $index++]  = 'points';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_TAX_CLASS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'tax_class_id';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_DATE_AVAILABLE)) {
            $modifiedColumns[':p' . $index++]  = 'date_available';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_WEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'weight';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_WEIGHT_CLASS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'weight_class_id';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_LENGTH)) {
            $modifiedColumns[':p' . $index++]  = 'length';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'width';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'height';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_LENGTH_CLASS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'length_class_id';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_SUBTRACT)) {
            $modifiedColumns[':p' . $index++]  = 'subtract';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_MINIMUM)) {
            $modifiedColumns[':p' . $index++]  = 'minimum';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_SORT_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'sort_order';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_VIEWED)) {
            $modifiedColumns[':p' . $index++]  = 'viewed';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_DATE_ADDED)) {
            $modifiedColumns[':p' . $index++]  = 'date_added';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(OcProductTableMap::COL_STATUS2)) {
            $modifiedColumns[':p' . $index++]  = 'status2';
        }

        $sql = sprintf(
            'INSERT INTO oc_product (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'product_id':
                        $stmt->bindValue($identifier, $this->product_id, PDO::PARAM_INT);
                        break;
                    case 'model':
                        $stmt->bindValue($identifier, $this->model, PDO::PARAM_STR);
                        break;
                    case 'sku':
                        $stmt->bindValue($identifier, $this->sku, PDO::PARAM_STR);
                        break;
                    case 'upc':
                        $stmt->bindValue($identifier, $this->upc, PDO::PARAM_STR);
                        break;
                    case 'ean':
                        $stmt->bindValue($identifier, $this->ean, PDO::PARAM_STR);
                        break;
                    case 'jan':
                        $stmt->bindValue($identifier, $this->jan, PDO::PARAM_STR);
                        break;
                    case 'isbn':
                        $stmt->bindValue($identifier, $this->isbn, PDO::PARAM_STR);
                        break;
                    case 'mpn':
                        $stmt->bindValue($identifier, $this->mpn, PDO::PARAM_STR);
                        break;
                    case 'location':
                        $stmt->bindValue($identifier, $this->location, PDO::PARAM_STR);
                        break;
                    case 'quantity':
                        $stmt->bindValue($identifier, $this->quantity, PDO::PARAM_INT);
                        break;
                    case 'stock_status_id':
                        $stmt->bindValue($identifier, $this->stock_status_id, PDO::PARAM_INT);
                        break;
                    case 'image':
                        $stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
                        break;
                    case 'manufacturer_id':
                        $stmt->bindValue($identifier, $this->manufacturer_id, PDO::PARAM_INT);
                        break;
                    case 'shipping':
                        $stmt->bindValue($identifier, (int) $this->shipping, PDO::PARAM_INT);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case 'points':
                        $stmt->bindValue($identifier, $this->points, PDO::PARAM_INT);
                        break;
                    case 'tax_class_id':
                        $stmt->bindValue($identifier, $this->tax_class_id, PDO::PARAM_INT);
                        break;
                    case 'date_available':
                        $stmt->bindValue($identifier, $this->date_available ? $this->date_available->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'weight':
                        $stmt->bindValue($identifier, $this->weight, PDO::PARAM_STR);
                        break;
                    case 'weight_class_id':
                        $stmt->bindValue($identifier, $this->weight_class_id, PDO::PARAM_INT);
                        break;
                    case 'length':
                        $stmt->bindValue($identifier, $this->length, PDO::PARAM_STR);
                        break;
                    case 'width':
                        $stmt->bindValue($identifier, $this->width, PDO::PARAM_STR);
                        break;
                    case 'height':
                        $stmt->bindValue($identifier, $this->height, PDO::PARAM_STR);
                        break;
                    case 'length_class_id':
                        $stmt->bindValue($identifier, $this->length_class_id, PDO::PARAM_INT);
                        break;
                    case 'subtract':
                        $stmt->bindValue($identifier, (int) $this->subtract, PDO::PARAM_INT);
                        break;
                    case 'minimum':
                        $stmt->bindValue($identifier, $this->minimum, PDO::PARAM_INT);
                        break;
                    case 'sort_order':
                        $stmt->bindValue($identifier, $this->sort_order, PDO::PARAM_INT);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, (int) $this->status, PDO::PARAM_INT);
                        break;
                    case 'viewed':
                        $stmt->bindValue($identifier, $this->viewed, PDO::PARAM_INT);
                        break;
                    case 'date_added':
                        $stmt->bindValue($identifier, $this->date_added ? $this->date_added->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'date_modified':
                        $stmt->bindValue($identifier, $this->date_modified ? $this->date_modified->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'status2':
                        $stmt->bindValue($identifier, $this->status2, PDO::PARAM_INT);
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
        $this->setProductId($pk);

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
        $pos = OcProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getProductId();
                break;
            case 1:
                return $this->getModel();
                break;
            case 2:
                return $this->getSku();
                break;
            case 3:
                return $this->getUpc();
                break;
            case 4:
                return $this->getEan();
                break;
            case 5:
                return $this->getJan();
                break;
            case 6:
                return $this->getIsbn();
                break;
            case 7:
                return $this->getMpn();
                break;
            case 8:
                return $this->getLocation();
                break;
            case 9:
                return $this->getQuantity();
                break;
            case 10:
                return $this->getStockStatusId();
                break;
            case 11:
                return $this->getImage();
                break;
            case 12:
                return $this->getManufacturerId();
                break;
            case 13:
                return $this->getShipping();
                break;
            case 14:
                return $this->getPrice();
                break;
            case 15:
                return $this->getPoints();
                break;
            case 16:
                return $this->getTaxClassId();
                break;
            case 17:
                return $this->getDateAvailable();
                break;
            case 18:
                return $this->getWeight();
                break;
            case 19:
                return $this->getWeightClassId();
                break;
            case 20:
                return $this->getLength();
                break;
            case 21:
                return $this->getWidth();
                break;
            case 22:
                return $this->getHeight();
                break;
            case 23:
                return $this->getLengthClassId();
                break;
            case 24:
                return $this->getSubtract();
                break;
            case 25:
                return $this->getMinimum();
                break;
            case 26:
                return $this->getSortOrder();
                break;
            case 27:
                return $this->getStatus();
                break;
            case 28:
                return $this->getViewed();
                break;
            case 29:
                return $this->getDateAdded();
                break;
            case 30:
                return $this->getDateModified();
                break;
            case 31:
                return $this->getStatus2();
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

        if (isset($alreadyDumpedObjects['OcProduct'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['OcProduct'][$this->hashCode()] = true;
        $keys = OcProductTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getProductId(),
            $keys[1] => $this->getModel(),
            $keys[2] => $this->getSku(),
            $keys[3] => $this->getUpc(),
            $keys[4] => $this->getEan(),
            $keys[5] => $this->getJan(),
            $keys[6] => $this->getIsbn(),
            $keys[7] => $this->getMpn(),
            $keys[8] => $this->getLocation(),
            $keys[9] => $this->getQuantity(),
            $keys[10] => $this->getStockStatusId(),
            $keys[11] => $this->getImage(),
            $keys[12] => $this->getManufacturerId(),
            $keys[13] => $this->getShipping(),
            $keys[14] => $this->getPrice(),
            $keys[15] => $this->getPoints(),
            $keys[16] => $this->getTaxClassId(),
            $keys[17] => $this->getDateAvailable(),
            $keys[18] => $this->getWeight(),
            $keys[19] => $this->getWeightClassId(),
            $keys[20] => $this->getLength(),
            $keys[21] => $this->getWidth(),
            $keys[22] => $this->getHeight(),
            $keys[23] => $this->getLengthClassId(),
            $keys[24] => $this->getSubtract(),
            $keys[25] => $this->getMinimum(),
            $keys[26] => $this->getSortOrder(),
            $keys[27] => $this->getStatus(),
            $keys[28] => $this->getViewed(),
            $keys[29] => $this->getDateAdded(),
            $keys[30] => $this->getDateModified(),
            $keys[31] => $this->getStatus2(),
        );
        if ($result[$keys[17]] instanceof \DateTimeInterface) {
            $result[$keys[17]] = $result[$keys[17]]->format('c');
        }

        if ($result[$keys[29]] instanceof \DateTimeInterface) {
            $result[$keys[29]] = $result[$keys[29]]->format('c');
        }

        if ($result[$keys[30]] instanceof \DateTimeInterface) {
            $result[$keys[30]] = $result[$keys[30]]->format('c');
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
     * @return $this|\OcProduct
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OcProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\OcProduct
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setProductId($value);
                break;
            case 1:
                $this->setModel($value);
                break;
            case 2:
                $this->setSku($value);
                break;
            case 3:
                $this->setUpc($value);
                break;
            case 4:
                $this->setEan($value);
                break;
            case 5:
                $this->setJan($value);
                break;
            case 6:
                $this->setIsbn($value);
                break;
            case 7:
                $this->setMpn($value);
                break;
            case 8:
                $this->setLocation($value);
                break;
            case 9:
                $this->setQuantity($value);
                break;
            case 10:
                $this->setStockStatusId($value);
                break;
            case 11:
                $this->setImage($value);
                break;
            case 12:
                $this->setManufacturerId($value);
                break;
            case 13:
                $this->setShipping($value);
                break;
            case 14:
                $this->setPrice($value);
                break;
            case 15:
                $this->setPoints($value);
                break;
            case 16:
                $this->setTaxClassId($value);
                break;
            case 17:
                $this->setDateAvailable($value);
                break;
            case 18:
                $this->setWeight($value);
                break;
            case 19:
                $this->setWeightClassId($value);
                break;
            case 20:
                $this->setLength($value);
                break;
            case 21:
                $this->setWidth($value);
                break;
            case 22:
                $this->setHeight($value);
                break;
            case 23:
                $this->setLengthClassId($value);
                break;
            case 24:
                $this->setSubtract($value);
                break;
            case 25:
                $this->setMinimum($value);
                break;
            case 26:
                $this->setSortOrder($value);
                break;
            case 27:
                $this->setStatus($value);
                break;
            case 28:
                $this->setViewed($value);
                break;
            case 29:
                $this->setDateAdded($value);
                break;
            case 30:
                $this->setDateModified($value);
                break;
            case 31:
                $this->setStatus2($value);
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
        $keys = OcProductTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setProductId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setModel($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSku($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUpc($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEan($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setJan($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setIsbn($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setMpn($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setLocation($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setQuantity($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setStockStatusId($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setImage($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setManufacturerId($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setShipping($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPrice($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPoints($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTaxClassId($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setDateAvailable($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setWeight($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setWeightClassId($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setLength($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setWidth($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setHeight($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setLengthClassId($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setSubtract($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setMinimum($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setSortOrder($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setStatus($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setViewed($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setDateAdded($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setDateModified($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setStatus2($arr[$keys[31]]);
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
     * @return $this|\OcProduct The current object, for fluid interface
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
        $criteria = new Criteria(OcProductTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OcProductTableMap::COL_PRODUCT_ID)) {
            $criteria->add(OcProductTableMap::COL_PRODUCT_ID, $this->product_id);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_MODEL)) {
            $criteria->add(OcProductTableMap::COL_MODEL, $this->model);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_SKU)) {
            $criteria->add(OcProductTableMap::COL_SKU, $this->sku);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_UPC)) {
            $criteria->add(OcProductTableMap::COL_UPC, $this->upc);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_EAN)) {
            $criteria->add(OcProductTableMap::COL_EAN, $this->ean);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_JAN)) {
            $criteria->add(OcProductTableMap::COL_JAN, $this->jan);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_ISBN)) {
            $criteria->add(OcProductTableMap::COL_ISBN, $this->isbn);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_MPN)) {
            $criteria->add(OcProductTableMap::COL_MPN, $this->mpn);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_LOCATION)) {
            $criteria->add(OcProductTableMap::COL_LOCATION, $this->location);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_QUANTITY)) {
            $criteria->add(OcProductTableMap::COL_QUANTITY, $this->quantity);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_STOCK_STATUS_ID)) {
            $criteria->add(OcProductTableMap::COL_STOCK_STATUS_ID, $this->stock_status_id);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_IMAGE)) {
            $criteria->add(OcProductTableMap::COL_IMAGE, $this->image);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_MANUFACTURER_ID)) {
            $criteria->add(OcProductTableMap::COL_MANUFACTURER_ID, $this->manufacturer_id);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_SHIPPING)) {
            $criteria->add(OcProductTableMap::COL_SHIPPING, $this->shipping);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_PRICE)) {
            $criteria->add(OcProductTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_POINTS)) {
            $criteria->add(OcProductTableMap::COL_POINTS, $this->points);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_TAX_CLASS_ID)) {
            $criteria->add(OcProductTableMap::COL_TAX_CLASS_ID, $this->tax_class_id);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_DATE_AVAILABLE)) {
            $criteria->add(OcProductTableMap::COL_DATE_AVAILABLE, $this->date_available);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_WEIGHT)) {
            $criteria->add(OcProductTableMap::COL_WEIGHT, $this->weight);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_WEIGHT_CLASS_ID)) {
            $criteria->add(OcProductTableMap::COL_WEIGHT_CLASS_ID, $this->weight_class_id);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_LENGTH)) {
            $criteria->add(OcProductTableMap::COL_LENGTH, $this->length);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_WIDTH)) {
            $criteria->add(OcProductTableMap::COL_WIDTH, $this->width);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_HEIGHT)) {
            $criteria->add(OcProductTableMap::COL_HEIGHT, $this->height);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_LENGTH_CLASS_ID)) {
            $criteria->add(OcProductTableMap::COL_LENGTH_CLASS_ID, $this->length_class_id);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_SUBTRACT)) {
            $criteria->add(OcProductTableMap::COL_SUBTRACT, $this->subtract);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_MINIMUM)) {
            $criteria->add(OcProductTableMap::COL_MINIMUM, $this->minimum);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_SORT_ORDER)) {
            $criteria->add(OcProductTableMap::COL_SORT_ORDER, $this->sort_order);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_STATUS)) {
            $criteria->add(OcProductTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_VIEWED)) {
            $criteria->add(OcProductTableMap::COL_VIEWED, $this->viewed);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_DATE_ADDED)) {
            $criteria->add(OcProductTableMap::COL_DATE_ADDED, $this->date_added);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(OcProductTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(OcProductTableMap::COL_STATUS2)) {
            $criteria->add(OcProductTableMap::COL_STATUS2, $this->status2);
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
        $criteria = ChildOcProductQuery::create();
        $criteria->add(OcProductTableMap::COL_PRODUCT_ID, $this->product_id);

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
        $validPk = null !== $this->getProductId();

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
        return $this->getProductId();
    }

    /**
     * Generic method to set the primary key (product_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setProductId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getProductId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \OcProduct (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setModel($this->getModel());
        $copyObj->setSku($this->getSku());
        $copyObj->setUpc($this->getUpc());
        $copyObj->setEan($this->getEan());
        $copyObj->setJan($this->getJan());
        $copyObj->setIsbn($this->getIsbn());
        $copyObj->setMpn($this->getMpn());
        $copyObj->setLocation($this->getLocation());
        $copyObj->setQuantity($this->getQuantity());
        $copyObj->setStockStatusId($this->getStockStatusId());
        $copyObj->setImage($this->getImage());
        $copyObj->setManufacturerId($this->getManufacturerId());
        $copyObj->setShipping($this->getShipping());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setPoints($this->getPoints());
        $copyObj->setTaxClassId($this->getTaxClassId());
        $copyObj->setDateAvailable($this->getDateAvailable());
        $copyObj->setWeight($this->getWeight());
        $copyObj->setWeightClassId($this->getWeightClassId());
        $copyObj->setLength($this->getLength());
        $copyObj->setWidth($this->getWidth());
        $copyObj->setHeight($this->getHeight());
        $copyObj->setLengthClassId($this->getLengthClassId());
        $copyObj->setSubtract($this->getSubtract());
        $copyObj->setMinimum($this->getMinimum());
        $copyObj->setSortOrder($this->getSortOrder());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setViewed($this->getViewed());
        $copyObj->setDateAdded($this->getDateAdded());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setStatus2($this->getStatus2());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setProductId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \OcProduct Clone of current object.
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
        $this->product_id = null;
        $this->model = null;
        $this->sku = null;
        $this->upc = null;
        $this->ean = null;
        $this->jan = null;
        $this->isbn = null;
        $this->mpn = null;
        $this->location = null;
        $this->quantity = null;
        $this->stock_status_id = null;
        $this->image = null;
        $this->manufacturer_id = null;
        $this->shipping = null;
        $this->price = null;
        $this->points = null;
        $this->tax_class_id = null;
        $this->date_available = null;
        $this->weight = null;
        $this->weight_class_id = null;
        $this->length = null;
        $this->width = null;
        $this->height = null;
        $this->length_class_id = null;
        $this->subtract = null;
        $this->minimum = null;
        $this->sort_order = null;
        $this->status = null;
        $this->viewed = null;
        $this->date_added = null;
        $this->date_modified = null;
        $this->status2 = null;
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
        return (string) $this->exportTo(OcProductTableMap::DEFAULT_STRING_FORMAT);
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
