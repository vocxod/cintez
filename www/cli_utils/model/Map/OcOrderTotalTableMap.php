<?php

namespace Map;

use \OcOrderTotal;
use \OcOrderTotalQuery;
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
 * This class defines the structure of the 'oc_order_total' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcOrderTotalTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcOrderTotalTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_order_total';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcOrderTotal';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcOrderTotal';

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
     * the column name for the order_total_id field
     */
    const COL_ORDER_TOTAL_ID = 'oc_order_total.order_total_id';

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'oc_order_total.order_id';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_order_total.code';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'oc_order_total.title';

    /**
     * the column name for the value field
     */
    const COL_VALUE = 'oc_order_total.value';

    /**
     * the column name for the sort_order field
     */
    const COL_SORT_ORDER = 'oc_order_total.sort_order';

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
        self::TYPE_PHPNAME       => array('OrderTotalId', 'OrderId', 'Code', 'Title', 'Value', 'SortOrder', ),
        self::TYPE_CAMELNAME     => array('orderTotalId', 'orderId', 'code', 'title', 'value', 'sortOrder', ),
        self::TYPE_COLNAME       => array(OcOrderTotalTableMap::COL_ORDER_TOTAL_ID, OcOrderTotalTableMap::COL_ORDER_ID, OcOrderTotalTableMap::COL_CODE, OcOrderTotalTableMap::COL_TITLE, OcOrderTotalTableMap::COL_VALUE, OcOrderTotalTableMap::COL_SORT_ORDER, ),
        self::TYPE_FIELDNAME     => array('order_total_id', 'order_id', 'code', 'title', 'value', 'sort_order', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('OrderTotalId' => 0, 'OrderId' => 1, 'Code' => 2, 'Title' => 3, 'Value' => 4, 'SortOrder' => 5, ),
        self::TYPE_CAMELNAME     => array('orderTotalId' => 0, 'orderId' => 1, 'code' => 2, 'title' => 3, 'value' => 4, 'sortOrder' => 5, ),
        self::TYPE_COLNAME       => array(OcOrderTotalTableMap::COL_ORDER_TOTAL_ID => 0, OcOrderTotalTableMap::COL_ORDER_ID => 1, OcOrderTotalTableMap::COL_CODE => 2, OcOrderTotalTableMap::COL_TITLE => 3, OcOrderTotalTableMap::COL_VALUE => 4, OcOrderTotalTableMap::COL_SORT_ORDER => 5, ),
        self::TYPE_FIELDNAME     => array('order_total_id' => 0, 'order_id' => 1, 'code' => 2, 'title' => 3, 'value' => 4, 'sort_order' => 5, ),
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
        $this->setName('oc_order_total');
        $this->setPhpName('OcOrderTotal');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcOrderTotal');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('order_total_id', 'OrderTotalId', 'INTEGER', true, 10, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 32, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('value', 'Value', 'DECIMAL', true, 15, 0);
        $this->addColumn('sort_order', 'SortOrder', 'INTEGER', true, 3, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderTotalId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderTotalId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderTotalId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderTotalId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderTotalId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderTotalId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('OrderTotalId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcOrderTotalTableMap::CLASS_DEFAULT : OcOrderTotalTableMap::OM_CLASS;
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
     * @return array           (OcOrderTotal object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcOrderTotalTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcOrderTotalTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcOrderTotalTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcOrderTotalTableMap::OM_CLASS;
            /** @var OcOrderTotal $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcOrderTotalTableMap::addInstanceToPool($obj, $key);
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
            $key = OcOrderTotalTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcOrderTotalTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcOrderTotal $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcOrderTotalTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcOrderTotalTableMap::COL_ORDER_TOTAL_ID);
            $criteria->addSelectColumn(OcOrderTotalTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OcOrderTotalTableMap::COL_CODE);
            $criteria->addSelectColumn(OcOrderTotalTableMap::COL_TITLE);
            $criteria->addSelectColumn(OcOrderTotalTableMap::COL_VALUE);
            $criteria->addSelectColumn(OcOrderTotalTableMap::COL_SORT_ORDER);
        } else {
            $criteria->addSelectColumn($alias . '.order_total_id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.value');
            $criteria->addSelectColumn($alias . '.sort_order');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcOrderTotalTableMap::DATABASE_NAME)->getTable(OcOrderTotalTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcOrderTotalTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcOrderTotalTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcOrderTotalTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcOrderTotal or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcOrderTotal object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderTotalTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcOrderTotal) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcOrderTotalTableMap::DATABASE_NAME);
            $criteria->add(OcOrderTotalTableMap::COL_ORDER_TOTAL_ID, (array) $values, Criteria::IN);
        }

        $query = OcOrderTotalQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcOrderTotalTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcOrderTotalTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_order_total table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcOrderTotalQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcOrderTotal or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcOrderTotal object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderTotalTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcOrderTotal object
        }

        if ($criteria->containsKey(OcOrderTotalTableMap::COL_ORDER_TOTAL_ID) && $criteria->keyContainsValue(OcOrderTotalTableMap::COL_ORDER_TOTAL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcOrderTotalTableMap::COL_ORDER_TOTAL_ID.')');
        }


        // Set the correct dbName
        $query = OcOrderTotalQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcOrderTotalTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcOrderTotalTableMap::buildTableMap();
