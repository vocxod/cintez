<?php

namespace Map;

use \OcCouponHistory;
use \OcCouponHistoryQuery;
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
 * This class defines the structure of the 'oc_coupon_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCouponHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCouponHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_coupon_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCouponHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCouponHistory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the coupon_history_id field
     */
    const COL_COUPON_HISTORY_ID = 'oc_coupon_history.coupon_history_id';

    /**
     * the column name for the coupon_id field
     */
    const COL_COUPON_ID = 'oc_coupon_history.coupon_id';

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'oc_coupon_history.order_id';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_coupon_history.customer_id';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'oc_coupon_history.amount';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_coupon_history.date_added';

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
        self::TYPE_PHPNAME       => array('CouponHistoryId', 'CouponId', 'OrderId', 'CustomerId', 'Amount', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('couponHistoryId', 'couponId', 'orderId', 'customerId', 'amount', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID, OcCouponHistoryTableMap::COL_COUPON_ID, OcCouponHistoryTableMap::COL_ORDER_ID, OcCouponHistoryTableMap::COL_CUSTOMER_ID, OcCouponHistoryTableMap::COL_AMOUNT, OcCouponHistoryTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('coupon_history_id', 'coupon_id', 'order_id', 'customer_id', 'amount', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CouponHistoryId' => 0, 'CouponId' => 1, 'OrderId' => 2, 'CustomerId' => 3, 'Amount' => 4, 'DateAdded' => 5, ),
        self::TYPE_CAMELNAME     => array('couponHistoryId' => 0, 'couponId' => 1, 'orderId' => 2, 'customerId' => 3, 'amount' => 4, 'dateAdded' => 5, ),
        self::TYPE_COLNAME       => array(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID => 0, OcCouponHistoryTableMap::COL_COUPON_ID => 1, OcCouponHistoryTableMap::COL_ORDER_ID => 2, OcCouponHistoryTableMap::COL_CUSTOMER_ID => 3, OcCouponHistoryTableMap::COL_AMOUNT => 4, OcCouponHistoryTableMap::COL_DATE_ADDED => 5, ),
        self::TYPE_FIELDNAME     => array('coupon_history_id' => 0, 'coupon_id' => 1, 'order_id' => 2, 'customer_id' => 3, 'amount' => 4, 'date_added' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('oc_coupon_history');
        $this->setPhpName('OcCouponHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCouponHistory');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('coupon_history_id', 'CouponHistoryId', 'INTEGER', true, null, null);
        $this->addColumn('coupon_id', 'CouponId', 'INTEGER', true, null, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('amount', 'Amount', 'DECIMAL', true, 15, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponHistoryId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponHistoryId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponHistoryId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponHistoryId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponHistoryId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CouponHistoryId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CouponHistoryId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcCouponHistoryTableMap::CLASS_DEFAULT : OcCouponHistoryTableMap::OM_CLASS;
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
     * @return array           (OcCouponHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCouponHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCouponHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCouponHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCouponHistoryTableMap::OM_CLASS;
            /** @var OcCouponHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCouponHistoryTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCouponHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCouponHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCouponHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCouponHistoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID);
            $criteria->addSelectColumn(OcCouponHistoryTableMap::COL_COUPON_ID);
            $criteria->addSelectColumn(OcCouponHistoryTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OcCouponHistoryTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcCouponHistoryTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(OcCouponHistoryTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.coupon_history_id');
            $criteria->addSelectColumn($alias . '.coupon_id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.amount');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCouponHistoryTableMap::DATABASE_NAME)->getTable(OcCouponHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCouponHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCouponHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCouponHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCouponHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCouponHistory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCouponHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCouponHistoryTableMap::DATABASE_NAME);
            $criteria->add(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID, (array) $values, Criteria::IN);
        }

        $query = OcCouponHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCouponHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCouponHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_coupon_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCouponHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCouponHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCouponHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCouponHistory object
        }

        if ($criteria->containsKey(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID) && $criteria->keyContainsValue(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID.')');
        }


        // Set the correct dbName
        $query = OcCouponHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCouponHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCouponHistoryTableMap::buildTableMap();
