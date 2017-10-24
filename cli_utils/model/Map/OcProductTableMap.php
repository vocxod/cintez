<?php

namespace Map;

use \OcProduct;
use \OcProductQuery;
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
 * This class defines the structure of the 'oc_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcProductTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcProductTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_product';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcProduct';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcProduct';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 32;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 32;

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_product.product_id';

    /**
     * the column name for the model field
     */
    const COL_MODEL = 'oc_product.model';

    /**
     * the column name for the sku field
     */
    const COL_SKU = 'oc_product.sku';

    /**
     * the column name for the upc field
     */
    const COL_UPC = 'oc_product.upc';

    /**
     * the column name for the ean field
     */
    const COL_EAN = 'oc_product.ean';

    /**
     * the column name for the jan field
     */
    const COL_JAN = 'oc_product.jan';

    /**
     * the column name for the isbn field
     */
    const COL_ISBN = 'oc_product.isbn';

    /**
     * the column name for the mpn field
     */
    const COL_MPN = 'oc_product.mpn';

    /**
     * the column name for the location field
     */
    const COL_LOCATION = 'oc_product.location';

    /**
     * the column name for the quantity field
     */
    const COL_QUANTITY = 'oc_product.quantity';

    /**
     * the column name for the stock_status_id field
     */
    const COL_STOCK_STATUS_ID = 'oc_product.stock_status_id';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'oc_product.image';

    /**
     * the column name for the manufacturer_id field
     */
    const COL_MANUFACTURER_ID = 'oc_product.manufacturer_id';

    /**
     * the column name for the shipping field
     */
    const COL_SHIPPING = 'oc_product.shipping';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'oc_product.price';

    /**
     * the column name for the points field
     */
    const COL_POINTS = 'oc_product.points';

    /**
     * the column name for the tax_class_id field
     */
    const COL_TAX_CLASS_ID = 'oc_product.tax_class_id';

    /**
     * the column name for the date_available field
     */
    const COL_DATE_AVAILABLE = 'oc_product.date_available';

    /**
     * the column name for the weight field
     */
    const COL_WEIGHT = 'oc_product.weight';

    /**
     * the column name for the weight_class_id field
     */
    const COL_WEIGHT_CLASS_ID = 'oc_product.weight_class_id';

    /**
     * the column name for the length field
     */
    const COL_LENGTH = 'oc_product.length';

    /**
     * the column name for the width field
     */
    const COL_WIDTH = 'oc_product.width';

    /**
     * the column name for the height field
     */
    const COL_HEIGHT = 'oc_product.height';

    /**
     * the column name for the length_class_id field
     */
    const COL_LENGTH_CLASS_ID = 'oc_product.length_class_id';

    /**
     * the column name for the subtract field
     */
    const COL_SUBTRACT = 'oc_product.subtract';

    /**
     * the column name for the minimum field
     */
    const COL_MINIMUM = 'oc_product.minimum';

    /**
     * the column name for the sort_order field
     */
    const COL_SORT_ORDER = 'oc_product.sort_order';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_product.status';

    /**
     * the column name for the viewed field
     */
    const COL_VIEWED = 'oc_product.viewed';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_product.date_added';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'oc_product.date_modified';

    /**
     * the column name for the status2 field
     */
    const COL_STATUS2 = 'oc_product.status2';

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
        self::TYPE_PHPNAME       => array('ProductId', 'Model', 'Sku', 'Upc', 'Ean', 'Jan', 'Isbn', 'Mpn', 'Location', 'Quantity', 'StockStatusId', 'Image', 'ManufacturerId', 'Shipping', 'Price', 'Points', 'TaxClassId', 'DateAvailable', 'Weight', 'WeightClassId', 'Length', 'Width', 'Height', 'LengthClassId', 'Subtract', 'Minimum', 'SortOrder', 'Status', 'Viewed', 'DateAdded', 'DateModified', 'Status2', ),
        self::TYPE_CAMELNAME     => array('productId', 'model', 'sku', 'upc', 'ean', 'jan', 'isbn', 'mpn', 'location', 'quantity', 'stockStatusId', 'image', 'manufacturerId', 'shipping', 'price', 'points', 'taxClassId', 'dateAvailable', 'weight', 'weightClassId', 'length', 'width', 'height', 'lengthClassId', 'subtract', 'minimum', 'sortOrder', 'status', 'viewed', 'dateAdded', 'dateModified', 'status2', ),
        self::TYPE_COLNAME       => array(OcProductTableMap::COL_PRODUCT_ID, OcProductTableMap::COL_MODEL, OcProductTableMap::COL_SKU, OcProductTableMap::COL_UPC, OcProductTableMap::COL_EAN, OcProductTableMap::COL_JAN, OcProductTableMap::COL_ISBN, OcProductTableMap::COL_MPN, OcProductTableMap::COL_LOCATION, OcProductTableMap::COL_QUANTITY, OcProductTableMap::COL_STOCK_STATUS_ID, OcProductTableMap::COL_IMAGE, OcProductTableMap::COL_MANUFACTURER_ID, OcProductTableMap::COL_SHIPPING, OcProductTableMap::COL_PRICE, OcProductTableMap::COL_POINTS, OcProductTableMap::COL_TAX_CLASS_ID, OcProductTableMap::COL_DATE_AVAILABLE, OcProductTableMap::COL_WEIGHT, OcProductTableMap::COL_WEIGHT_CLASS_ID, OcProductTableMap::COL_LENGTH, OcProductTableMap::COL_WIDTH, OcProductTableMap::COL_HEIGHT, OcProductTableMap::COL_LENGTH_CLASS_ID, OcProductTableMap::COL_SUBTRACT, OcProductTableMap::COL_MINIMUM, OcProductTableMap::COL_SORT_ORDER, OcProductTableMap::COL_STATUS, OcProductTableMap::COL_VIEWED, OcProductTableMap::COL_DATE_ADDED, OcProductTableMap::COL_DATE_MODIFIED, OcProductTableMap::COL_STATUS2, ),
        self::TYPE_FIELDNAME     => array('product_id', 'model', 'sku', 'upc', 'ean', 'jan', 'isbn', 'mpn', 'location', 'quantity', 'stock_status_id', 'image', 'manufacturer_id', 'shipping', 'price', 'points', 'tax_class_id', 'date_available', 'weight', 'weight_class_id', 'length', 'width', 'height', 'length_class_id', 'subtract', 'minimum', 'sort_order', 'status', 'viewed', 'date_added', 'date_modified', 'status2', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ProductId' => 0, 'Model' => 1, 'Sku' => 2, 'Upc' => 3, 'Ean' => 4, 'Jan' => 5, 'Isbn' => 6, 'Mpn' => 7, 'Location' => 8, 'Quantity' => 9, 'StockStatusId' => 10, 'Image' => 11, 'ManufacturerId' => 12, 'Shipping' => 13, 'Price' => 14, 'Points' => 15, 'TaxClassId' => 16, 'DateAvailable' => 17, 'Weight' => 18, 'WeightClassId' => 19, 'Length' => 20, 'Width' => 21, 'Height' => 22, 'LengthClassId' => 23, 'Subtract' => 24, 'Minimum' => 25, 'SortOrder' => 26, 'Status' => 27, 'Viewed' => 28, 'DateAdded' => 29, 'DateModified' => 30, 'Status2' => 31, ),
        self::TYPE_CAMELNAME     => array('productId' => 0, 'model' => 1, 'sku' => 2, 'upc' => 3, 'ean' => 4, 'jan' => 5, 'isbn' => 6, 'mpn' => 7, 'location' => 8, 'quantity' => 9, 'stockStatusId' => 10, 'image' => 11, 'manufacturerId' => 12, 'shipping' => 13, 'price' => 14, 'points' => 15, 'taxClassId' => 16, 'dateAvailable' => 17, 'weight' => 18, 'weightClassId' => 19, 'length' => 20, 'width' => 21, 'height' => 22, 'lengthClassId' => 23, 'subtract' => 24, 'minimum' => 25, 'sortOrder' => 26, 'status' => 27, 'viewed' => 28, 'dateAdded' => 29, 'dateModified' => 30, 'status2' => 31, ),
        self::TYPE_COLNAME       => array(OcProductTableMap::COL_PRODUCT_ID => 0, OcProductTableMap::COL_MODEL => 1, OcProductTableMap::COL_SKU => 2, OcProductTableMap::COL_UPC => 3, OcProductTableMap::COL_EAN => 4, OcProductTableMap::COL_JAN => 5, OcProductTableMap::COL_ISBN => 6, OcProductTableMap::COL_MPN => 7, OcProductTableMap::COL_LOCATION => 8, OcProductTableMap::COL_QUANTITY => 9, OcProductTableMap::COL_STOCK_STATUS_ID => 10, OcProductTableMap::COL_IMAGE => 11, OcProductTableMap::COL_MANUFACTURER_ID => 12, OcProductTableMap::COL_SHIPPING => 13, OcProductTableMap::COL_PRICE => 14, OcProductTableMap::COL_POINTS => 15, OcProductTableMap::COL_TAX_CLASS_ID => 16, OcProductTableMap::COL_DATE_AVAILABLE => 17, OcProductTableMap::COL_WEIGHT => 18, OcProductTableMap::COL_WEIGHT_CLASS_ID => 19, OcProductTableMap::COL_LENGTH => 20, OcProductTableMap::COL_WIDTH => 21, OcProductTableMap::COL_HEIGHT => 22, OcProductTableMap::COL_LENGTH_CLASS_ID => 23, OcProductTableMap::COL_SUBTRACT => 24, OcProductTableMap::COL_MINIMUM => 25, OcProductTableMap::COL_SORT_ORDER => 26, OcProductTableMap::COL_STATUS => 27, OcProductTableMap::COL_VIEWED => 28, OcProductTableMap::COL_DATE_ADDED => 29, OcProductTableMap::COL_DATE_MODIFIED => 30, OcProductTableMap::COL_STATUS2 => 31, ),
        self::TYPE_FIELDNAME     => array('product_id' => 0, 'model' => 1, 'sku' => 2, 'upc' => 3, 'ean' => 4, 'jan' => 5, 'isbn' => 6, 'mpn' => 7, 'location' => 8, 'quantity' => 9, 'stock_status_id' => 10, 'image' => 11, 'manufacturer_id' => 12, 'shipping' => 13, 'price' => 14, 'points' => 15, 'tax_class_id' => 16, 'date_available' => 17, 'weight' => 18, 'weight_class_id' => 19, 'length' => 20, 'width' => 21, 'height' => 22, 'length_class_id' => 23, 'subtract' => 24, 'minimum' => 25, 'sort_order' => 26, 'status' => 27, 'viewed' => 28, 'date_added' => 29, 'date_modified' => 30, 'status2' => 31, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
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
        $this->setName('oc_product');
        $this->setPhpName('OcProduct');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcProduct');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('model', 'Model', 'VARCHAR', true, 64, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 64, null);
        $this->addColumn('upc', 'Upc', 'VARCHAR', true, 12, null);
        $this->addColumn('ean', 'Ean', 'VARCHAR', true, 14, null);
        $this->addColumn('jan', 'Jan', 'VARCHAR', true, 13, null);
        $this->addColumn('isbn', 'Isbn', 'VARCHAR', true, 17, null);
        $this->addColumn('mpn', 'Mpn', 'VARCHAR', true, 64, null);
        $this->addColumn('location', 'Location', 'VARCHAR', true, 128, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, 4, 0);
        $this->addColumn('stock_status_id', 'StockStatusId', 'INTEGER', true, null, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 255, null);
        $this->addColumn('manufacturer_id', 'ManufacturerId', 'INTEGER', true, null, null);
        $this->addColumn('shipping', 'Shipping', 'BOOLEAN', true, 1, true);
        $this->addColumn('price', 'Price', 'DECIMAL', true, 15, 0);
        $this->addColumn('points', 'Points', 'INTEGER', true, 8, 0);
        $this->addColumn('tax_class_id', 'TaxClassId', 'INTEGER', true, null, null);
        $this->addColumn('date_available', 'DateAvailable', 'DATE', true, null, '0000-00-00');
        $this->addColumn('weight', 'Weight', 'DECIMAL', true, 15, 0);
        $this->addColumn('weight_class_id', 'WeightClassId', 'INTEGER', true, null, 0);
        $this->addColumn('length', 'Length', 'DECIMAL', true, 15, 0);
        $this->addColumn('width', 'Width', 'DECIMAL', true, 15, 0);
        $this->addColumn('height', 'Height', 'DECIMAL', true, 15, 0);
        $this->addColumn('length_class_id', 'LengthClassId', 'INTEGER', true, null, 0);
        $this->addColumn('subtract', 'Subtract', 'BOOLEAN', true, 1, true);
        $this->addColumn('minimum', 'Minimum', 'INTEGER', true, null, 1);
        $this->addColumn('sort_order', 'SortOrder', 'INTEGER', true, null, 0);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, false);
        $this->addColumn('viewed', 'Viewed', 'INTEGER', true, 5, 0);
        $this->addColumn('date_added', 'DateAdded', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('status2', 'Status2', 'INTEGER', false, null, 0);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcProductTableMap::CLASS_DEFAULT : OcProductTableMap::OM_CLASS;
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
     * @return array           (OcProduct object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcProductTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcProductTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcProductTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcProductTableMap::OM_CLASS;
            /** @var OcProduct $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcProductTableMap::addInstanceToPool($obj, $key);
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
            $key = OcProductTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcProductTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcProduct $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcProductTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcProductTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcProductTableMap::COL_MODEL);
            $criteria->addSelectColumn(OcProductTableMap::COL_SKU);
            $criteria->addSelectColumn(OcProductTableMap::COL_UPC);
            $criteria->addSelectColumn(OcProductTableMap::COL_EAN);
            $criteria->addSelectColumn(OcProductTableMap::COL_JAN);
            $criteria->addSelectColumn(OcProductTableMap::COL_ISBN);
            $criteria->addSelectColumn(OcProductTableMap::COL_MPN);
            $criteria->addSelectColumn(OcProductTableMap::COL_LOCATION);
            $criteria->addSelectColumn(OcProductTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(OcProductTableMap::COL_STOCK_STATUS_ID);
            $criteria->addSelectColumn(OcProductTableMap::COL_IMAGE);
            $criteria->addSelectColumn(OcProductTableMap::COL_MANUFACTURER_ID);
            $criteria->addSelectColumn(OcProductTableMap::COL_SHIPPING);
            $criteria->addSelectColumn(OcProductTableMap::COL_PRICE);
            $criteria->addSelectColumn(OcProductTableMap::COL_POINTS);
            $criteria->addSelectColumn(OcProductTableMap::COL_TAX_CLASS_ID);
            $criteria->addSelectColumn(OcProductTableMap::COL_DATE_AVAILABLE);
            $criteria->addSelectColumn(OcProductTableMap::COL_WEIGHT);
            $criteria->addSelectColumn(OcProductTableMap::COL_WEIGHT_CLASS_ID);
            $criteria->addSelectColumn(OcProductTableMap::COL_LENGTH);
            $criteria->addSelectColumn(OcProductTableMap::COL_WIDTH);
            $criteria->addSelectColumn(OcProductTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(OcProductTableMap::COL_LENGTH_CLASS_ID);
            $criteria->addSelectColumn(OcProductTableMap::COL_SUBTRACT);
            $criteria->addSelectColumn(OcProductTableMap::COL_MINIMUM);
            $criteria->addSelectColumn(OcProductTableMap::COL_SORT_ORDER);
            $criteria->addSelectColumn(OcProductTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcProductTableMap::COL_VIEWED);
            $criteria->addSelectColumn(OcProductTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OcProductTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(OcProductTableMap::COL_STATUS2);
        } else {
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.model');
            $criteria->addSelectColumn($alias . '.sku');
            $criteria->addSelectColumn($alias . '.upc');
            $criteria->addSelectColumn($alias . '.ean');
            $criteria->addSelectColumn($alias . '.jan');
            $criteria->addSelectColumn($alias . '.isbn');
            $criteria->addSelectColumn($alias . '.mpn');
            $criteria->addSelectColumn($alias . '.location');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.stock_status_id');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.manufacturer_id');
            $criteria->addSelectColumn($alias . '.shipping');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.points');
            $criteria->addSelectColumn($alias . '.tax_class_id');
            $criteria->addSelectColumn($alias . '.date_available');
            $criteria->addSelectColumn($alias . '.weight');
            $criteria->addSelectColumn($alias . '.weight_class_id');
            $criteria->addSelectColumn($alias . '.length');
            $criteria->addSelectColumn($alias . '.width');
            $criteria->addSelectColumn($alias . '.height');
            $criteria->addSelectColumn($alias . '.length_class_id');
            $criteria->addSelectColumn($alias . '.subtract');
            $criteria->addSelectColumn($alias . '.minimum');
            $criteria->addSelectColumn($alias . '.sort_order');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.viewed');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.date_modified');
            $criteria->addSelectColumn($alias . '.status2');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcProductTableMap::DATABASE_NAME)->getTable(OcProductTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcProductTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcProductTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcProductTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcProduct or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcProduct object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcProduct) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcProductTableMap::DATABASE_NAME);
            $criteria->add(OcProductTableMap::COL_PRODUCT_ID, (array) $values, Criteria::IN);
        }

        $query = OcProductQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcProductTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcProductTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcProductQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcProduct or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcProduct object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcProduct object
        }

        if ($criteria->containsKey(OcProductTableMap::COL_PRODUCT_ID) && $criteria->keyContainsValue(OcProductTableMap::COL_PRODUCT_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcProductTableMap::COL_PRODUCT_ID.')');
        }


        // Set the correct dbName
        $query = OcProductQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcProductTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcProductTableMap::buildTableMap();
