<?php

namespace Map;

use \OcProductDiscount;
use \OcProductDiscountQuery;
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
 * This class defines the structure of the 'oc_product_discount' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcProductDiscountTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcProductDiscountTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_product_discount';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcProductDiscount';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcProductDiscount';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the product_discount_id field
     */
    const COL_PRODUCT_DISCOUNT_ID = 'oc_product_discount.product_discount_id';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_product_discount.product_id';

    /**
     * the column name for the customer_group_id field
     */
    const COL_CUSTOMER_GROUP_ID = 'oc_product_discount.customer_group_id';

    /**
     * the column name for the quantity field
     */
    const COL_QUANTITY = 'oc_product_discount.quantity';

    /**
     * the column name for the priority field
     */
    const COL_PRIORITY = 'oc_product_discount.priority';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'oc_product_discount.price';

    /**
     * the column name for the date_start field
     */
    const COL_DATE_START = 'oc_product_discount.date_start';

    /**
     * the column name for the date_end field
     */
    const COL_DATE_END = 'oc_product_discount.date_end';

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
        self::TYPE_PHPNAME       => array('ProductDiscountId', 'ProductId', 'CustomerGroupId', 'Quantity', 'Priority', 'Price', 'DateStart', 'DateEnd', ),
        self::TYPE_CAMELNAME     => array('productDiscountId', 'productId', 'customerGroupId', 'quantity', 'priority', 'price', 'dateStart', 'dateEnd', ),
        self::TYPE_COLNAME       => array(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID, OcProductDiscountTableMap::COL_PRODUCT_ID, OcProductDiscountTableMap::COL_CUSTOMER_GROUP_ID, OcProductDiscountTableMap::COL_QUANTITY, OcProductDiscountTableMap::COL_PRIORITY, OcProductDiscountTableMap::COL_PRICE, OcProductDiscountTableMap::COL_DATE_START, OcProductDiscountTableMap::COL_DATE_END, ),
        self::TYPE_FIELDNAME     => array('product_discount_id', 'product_id', 'customer_group_id', 'quantity', 'priority', 'price', 'date_start', 'date_end', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ProductDiscountId' => 0, 'ProductId' => 1, 'CustomerGroupId' => 2, 'Quantity' => 3, 'Priority' => 4, 'Price' => 5, 'DateStart' => 6, 'DateEnd' => 7, ),
        self::TYPE_CAMELNAME     => array('productDiscountId' => 0, 'productId' => 1, 'customerGroupId' => 2, 'quantity' => 3, 'priority' => 4, 'price' => 5, 'dateStart' => 6, 'dateEnd' => 7, ),
        self::TYPE_COLNAME       => array(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID => 0, OcProductDiscountTableMap::COL_PRODUCT_ID => 1, OcProductDiscountTableMap::COL_CUSTOMER_GROUP_ID => 2, OcProductDiscountTableMap::COL_QUANTITY => 3, OcProductDiscountTableMap::COL_PRIORITY => 4, OcProductDiscountTableMap::COL_PRICE => 5, OcProductDiscountTableMap::COL_DATE_START => 6, OcProductDiscountTableMap::COL_DATE_END => 7, ),
        self::TYPE_FIELDNAME     => array('product_discount_id' => 0, 'product_id' => 1, 'customer_group_id' => 2, 'quantity' => 3, 'priority' => 4, 'price' => 5, 'date_start' => 6, 'date_end' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('oc_product_discount');
        $this->setPhpName('OcProductDiscount');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcProductDiscount');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('product_discount_id', 'ProductDiscountId', 'INTEGER', true, null, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('customer_group_id', 'CustomerGroupId', 'INTEGER', true, null, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, 4, 0);
        $this->addColumn('priority', 'Priority', 'INTEGER', true, 5, 1);
        $this->addColumn('price', 'Price', 'DECIMAL', true, 15, 0);
        $this->addColumn('date_start', 'DateStart', 'DATE', true, null, '0000-00-00');
        $this->addColumn('date_end', 'DateEnd', 'DATE', true, null, '0000-00-00');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductDiscountId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductDiscountId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductDiscountId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductDiscountId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductDiscountId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductDiscountId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ProductDiscountId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcProductDiscountTableMap::CLASS_DEFAULT : OcProductDiscountTableMap::OM_CLASS;
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
     * @return array           (OcProductDiscount object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcProductDiscountTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcProductDiscountTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcProductDiscountTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcProductDiscountTableMap::OM_CLASS;
            /** @var OcProductDiscount $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcProductDiscountTableMap::addInstanceToPool($obj, $key);
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
            $key = OcProductDiscountTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcProductDiscountTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcProductDiscount $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcProductDiscountTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID);
            $criteria->addSelectColumn(OcProductDiscountTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcProductDiscountTableMap::COL_CUSTOMER_GROUP_ID);
            $criteria->addSelectColumn(OcProductDiscountTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(OcProductDiscountTableMap::COL_PRIORITY);
            $criteria->addSelectColumn(OcProductDiscountTableMap::COL_PRICE);
            $criteria->addSelectColumn(OcProductDiscountTableMap::COL_DATE_START);
            $criteria->addSelectColumn(OcProductDiscountTableMap::COL_DATE_END);
        } else {
            $criteria->addSelectColumn($alias . '.product_discount_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.customer_group_id');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.priority');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.date_start');
            $criteria->addSelectColumn($alias . '.date_end');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcProductDiscountTableMap::DATABASE_NAME)->getTable(OcProductDiscountTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcProductDiscountTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcProductDiscountTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcProductDiscountTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcProductDiscount or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcProductDiscount object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductDiscountTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcProductDiscount) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcProductDiscountTableMap::DATABASE_NAME);
            $criteria->add(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID, (array) $values, Criteria::IN);
        }

        $query = OcProductDiscountQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcProductDiscountTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcProductDiscountTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_product_discount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcProductDiscountQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcProductDiscount or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcProductDiscount object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductDiscountTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcProductDiscount object
        }

        if ($criteria->containsKey(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID) && $criteria->keyContainsValue(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID.')');
        }


        // Set the correct dbName
        $query = OcProductDiscountQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcProductDiscountTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcProductDiscountTableMap::buildTableMap();
