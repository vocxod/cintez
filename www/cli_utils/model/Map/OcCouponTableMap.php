<?php

namespace Map;

use \OcCoupon;
use \OcCouponQuery;
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
 * This class defines the structure of the 'oc_coupon' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCouponTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCouponTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_coupon';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCoupon';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCoupon';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the coupon_id field
     */
    const COL_COUPON_ID = 'oc_coupon.coupon_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'oc_coupon.name';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_coupon.code';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'oc_coupon.type';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'oc_coupon.discount';

    /**
     * the column name for the logged field
     */
    const COL_LOGGED = 'oc_coupon.logged';

    /**
     * the column name for the shipping field
     */
    const COL_SHIPPING = 'oc_coupon.shipping';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'oc_coupon.total';

    /**
     * the column name for the date_start field
     */
    const COL_DATE_START = 'oc_coupon.date_start';

    /**
     * the column name for the date_end field
     */
    const COL_DATE_END = 'oc_coupon.date_end';

    /**
     * the column name for the uses_total field
     */
    const COL_USES_TOTAL = 'oc_coupon.uses_total';

    /**
     * the column name for the uses_customer field
     */
    const COL_USES_CUSTOMER = 'oc_coupon.uses_customer';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_coupon.status';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_coupon.date_added';

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
        self::TYPE_PHPNAME       => array('CouponId', 'Name', 'Code', 'Type', 'Discount', 'Logged', 'Shipping', 'Total', 'DateStart', 'DateEnd', 'UsesTotal', 'UsesCustomer', 'Status', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('couponId', 'name', 'code', 'type', 'discount', 'logged', 'shipping', 'total', 'dateStart', 'dateEnd', 'usesTotal', 'usesCustomer', 'status', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcCouponTableMap::COL_COUPON_ID, OcCouponTableMap::COL_NAME, OcCouponTableMap::COL_CODE, OcCouponTableMap::COL_TYPE, OcCouponTableMap::COL_DISCOUNT, OcCouponTableMap::COL_LOGGED, OcCouponTableMap::COL_SHIPPING, OcCouponTableMap::COL_TOTAL, OcCouponTableMap::COL_DATE_START, OcCouponTableMap::COL_DATE_END, OcCouponTableMap::COL_USES_TOTAL, OcCouponTableMap::COL_USES_CUSTOMER, OcCouponTableMap::COL_STATUS, OcCouponTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('coupon_id', 'name', 'code', 'type', 'discount', 'logged', 'shipping', 'total', 'date_start', 'date_end', 'uses_total', 'uses_customer', 'status', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CouponId' => 0, 'Name' => 1, 'Code' => 2, 'Type' => 3, 'Discount' => 4, 'Logged' => 5, 'Shipping' => 6, 'Total' => 7, 'DateStart' => 8, 'DateEnd' => 9, 'UsesTotal' => 10, 'UsesCustomer' => 11, 'Status' => 12, 'DateAdded' => 13, ),
        self::TYPE_CAMELNAME     => array('couponId' => 0, 'name' => 1, 'code' => 2, 'type' => 3, 'discount' => 4, 'logged' => 5, 'shipping' => 6, 'total' => 7, 'dateStart' => 8, 'dateEnd' => 9, 'usesTotal' => 10, 'usesCustomer' => 11, 'status' => 12, 'dateAdded' => 13, ),
        self::TYPE_COLNAME       => array(OcCouponTableMap::COL_COUPON_ID => 0, OcCouponTableMap::COL_NAME => 1, OcCouponTableMap::COL_CODE => 2, OcCouponTableMap::COL_TYPE => 3, OcCouponTableMap::COL_DISCOUNT => 4, OcCouponTableMap::COL_LOGGED => 5, OcCouponTableMap::COL_SHIPPING => 6, OcCouponTableMap::COL_TOTAL => 7, OcCouponTableMap::COL_DATE_START => 8, OcCouponTableMap::COL_DATE_END => 9, OcCouponTableMap::COL_USES_TOTAL => 10, OcCouponTableMap::COL_USES_CUSTOMER => 11, OcCouponTableMap::COL_STATUS => 12, OcCouponTableMap::COL_DATE_ADDED => 13, ),
        self::TYPE_FIELDNAME     => array('coupon_id' => 0, 'name' => 1, 'code' => 2, 'type' => 3, 'discount' => 4, 'logged' => 5, 'shipping' => 6, 'total' => 7, 'date_start' => 8, 'date_end' => 9, 'uses_total' => 10, 'uses_customer' => 11, 'status' => 12, 'date_added' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('oc_coupon');
        $this->setPhpName('OcCoupon');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCoupon');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('coupon_id', 'CouponId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 128, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 20, null);
        $this->addColumn('type', 'Type', 'CHAR', true, null, null);
        $this->addColumn('discount', 'Discount', 'DECIMAL', true, 15, null);
        $this->addColumn('logged', 'Logged', 'BOOLEAN', true, 1, null);
        $this->addColumn('shipping', 'Shipping', 'BOOLEAN', true, 1, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('date_start', 'DateStart', 'DATE', true, null, '0000-00-00');
        $this->addColumn('date_end', 'DateEnd', 'DATE', true, null, '0000-00-00');
        $this->addColumn('uses_total', 'UsesTotal', 'INTEGER', true, null, null);
        $this->addColumn('uses_customer', 'UsesCustomer', 'VARCHAR', true, 11, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, null);
        $this->addColumn('date_added', 'DateAdded', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CouponId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcCouponTableMap::CLASS_DEFAULT : OcCouponTableMap::OM_CLASS;
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
     * @return array           (OcCoupon object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCouponTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCouponTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCouponTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCouponTableMap::OM_CLASS;
            /** @var OcCoupon $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCouponTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCouponTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCouponTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCoupon $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCouponTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCouponTableMap::COL_COUPON_ID);
            $criteria->addSelectColumn(OcCouponTableMap::COL_NAME);
            $criteria->addSelectColumn(OcCouponTableMap::COL_CODE);
            $criteria->addSelectColumn(OcCouponTableMap::COL_TYPE);
            $criteria->addSelectColumn(OcCouponTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(OcCouponTableMap::COL_LOGGED);
            $criteria->addSelectColumn(OcCouponTableMap::COL_SHIPPING);
            $criteria->addSelectColumn(OcCouponTableMap::COL_TOTAL);
            $criteria->addSelectColumn(OcCouponTableMap::COL_DATE_START);
            $criteria->addSelectColumn(OcCouponTableMap::COL_DATE_END);
            $criteria->addSelectColumn(OcCouponTableMap::COL_USES_TOTAL);
            $criteria->addSelectColumn(OcCouponTableMap::COL_USES_CUSTOMER);
            $criteria->addSelectColumn(OcCouponTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcCouponTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.coupon_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.discount');
            $criteria->addSelectColumn($alias . '.logged');
            $criteria->addSelectColumn($alias . '.shipping');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.date_start');
            $criteria->addSelectColumn($alias . '.date_end');
            $criteria->addSelectColumn($alias . '.uses_total');
            $criteria->addSelectColumn($alias . '.uses_customer');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.date_added');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCouponTableMap::DATABASE_NAME)->getTable(OcCouponTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCouponTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCouponTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCouponTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCoupon or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCoupon object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCoupon) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCouponTableMap::DATABASE_NAME);
            $criteria->add(OcCouponTableMap::COL_COUPON_ID, (array) $values, Criteria::IN);
        }

        $query = OcCouponQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCouponTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCouponTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_coupon table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCouponQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCoupon or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCoupon object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCoupon object
        }

        if ($criteria->containsKey(OcCouponTableMap::COL_COUPON_ID) && $criteria->keyContainsValue(OcCouponTableMap::COL_COUPON_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcCouponTableMap::COL_COUPON_ID.')');
        }


        // Set the correct dbName
        $query = OcCouponQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCouponTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCouponTableMap::buildTableMap();
