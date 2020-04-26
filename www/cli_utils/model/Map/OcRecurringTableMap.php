<?php

namespace Map;

use \OcRecurring;
use \OcRecurringQuery;
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
 * This class defines the structure of the 'oc_recurring' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcRecurringTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcRecurringTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_recurring';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcRecurring';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcRecurring';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the recurring_id field
     */
    const COL_RECURRING_ID = 'oc_recurring.recurring_id';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'oc_recurring.price';

    /**
     * the column name for the frequency field
     */
    const COL_FREQUENCY = 'oc_recurring.frequency';

    /**
     * the column name for the duration field
     */
    const COL_DURATION = 'oc_recurring.duration';

    /**
     * the column name for the cycle field
     */
    const COL_CYCLE = 'oc_recurring.cycle';

    /**
     * the column name for the trial_status field
     */
    const COL_TRIAL_STATUS = 'oc_recurring.trial_status';

    /**
     * the column name for the trial_price field
     */
    const COL_TRIAL_PRICE = 'oc_recurring.trial_price';

    /**
     * the column name for the trial_frequency field
     */
    const COL_TRIAL_FREQUENCY = 'oc_recurring.trial_frequency';

    /**
     * the column name for the trial_duration field
     */
    const COL_TRIAL_DURATION = 'oc_recurring.trial_duration';

    /**
     * the column name for the trial_cycle field
     */
    const COL_TRIAL_CYCLE = 'oc_recurring.trial_cycle';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_recurring.status';

    /**
     * the column name for the sort_order field
     */
    const COL_SORT_ORDER = 'oc_recurring.sort_order';

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
        self::TYPE_PHPNAME       => array('RecurringId', 'Price', 'Frequency', 'Duration', 'Cycle', 'TrialStatus', 'TrialPrice', 'TrialFrequency', 'TrialDuration', 'TrialCycle', 'Status', 'SortOrder', ),
        self::TYPE_CAMELNAME     => array('recurringId', 'price', 'frequency', 'duration', 'cycle', 'trialStatus', 'trialPrice', 'trialFrequency', 'trialDuration', 'trialCycle', 'status', 'sortOrder', ),
        self::TYPE_COLNAME       => array(OcRecurringTableMap::COL_RECURRING_ID, OcRecurringTableMap::COL_PRICE, OcRecurringTableMap::COL_FREQUENCY, OcRecurringTableMap::COL_DURATION, OcRecurringTableMap::COL_CYCLE, OcRecurringTableMap::COL_TRIAL_STATUS, OcRecurringTableMap::COL_TRIAL_PRICE, OcRecurringTableMap::COL_TRIAL_FREQUENCY, OcRecurringTableMap::COL_TRIAL_DURATION, OcRecurringTableMap::COL_TRIAL_CYCLE, OcRecurringTableMap::COL_STATUS, OcRecurringTableMap::COL_SORT_ORDER, ),
        self::TYPE_FIELDNAME     => array('recurring_id', 'price', 'frequency', 'duration', 'cycle', 'trial_status', 'trial_price', 'trial_frequency', 'trial_duration', 'trial_cycle', 'status', 'sort_order', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('RecurringId' => 0, 'Price' => 1, 'Frequency' => 2, 'Duration' => 3, 'Cycle' => 4, 'TrialStatus' => 5, 'TrialPrice' => 6, 'TrialFrequency' => 7, 'TrialDuration' => 8, 'TrialCycle' => 9, 'Status' => 10, 'SortOrder' => 11, ),
        self::TYPE_CAMELNAME     => array('recurringId' => 0, 'price' => 1, 'frequency' => 2, 'duration' => 3, 'cycle' => 4, 'trialStatus' => 5, 'trialPrice' => 6, 'trialFrequency' => 7, 'trialDuration' => 8, 'trialCycle' => 9, 'status' => 10, 'sortOrder' => 11, ),
        self::TYPE_COLNAME       => array(OcRecurringTableMap::COL_RECURRING_ID => 0, OcRecurringTableMap::COL_PRICE => 1, OcRecurringTableMap::COL_FREQUENCY => 2, OcRecurringTableMap::COL_DURATION => 3, OcRecurringTableMap::COL_CYCLE => 4, OcRecurringTableMap::COL_TRIAL_STATUS => 5, OcRecurringTableMap::COL_TRIAL_PRICE => 6, OcRecurringTableMap::COL_TRIAL_FREQUENCY => 7, OcRecurringTableMap::COL_TRIAL_DURATION => 8, OcRecurringTableMap::COL_TRIAL_CYCLE => 9, OcRecurringTableMap::COL_STATUS => 10, OcRecurringTableMap::COL_SORT_ORDER => 11, ),
        self::TYPE_FIELDNAME     => array('recurring_id' => 0, 'price' => 1, 'frequency' => 2, 'duration' => 3, 'cycle' => 4, 'trial_status' => 5, 'trial_price' => 6, 'trial_frequency' => 7, 'trial_duration' => 8, 'trial_cycle' => 9, 'status' => 10, 'sort_order' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('oc_recurring');
        $this->setPhpName('OcRecurring');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcRecurring');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('recurring_id', 'RecurringId', 'INTEGER', true, null, null);
        $this->addColumn('price', 'Price', 'DECIMAL', true, 10, null);
        $this->addColumn('frequency', 'Frequency', 'CHAR', true, null, null);
        $this->addColumn('duration', 'Duration', 'INTEGER', true, 10, null);
        $this->addColumn('cycle', 'Cycle', 'INTEGER', true, 10, null);
        $this->addColumn('trial_status', 'TrialStatus', 'TINYINT', true, null, null);
        $this->addColumn('trial_price', 'TrialPrice', 'DECIMAL', true, 10, null);
        $this->addColumn('trial_frequency', 'TrialFrequency', 'CHAR', true, null, null);
        $this->addColumn('trial_duration', 'TrialDuration', 'INTEGER', true, 10, null);
        $this->addColumn('trial_cycle', 'TrialCycle', 'INTEGER', true, 10, null);
        $this->addColumn('status', 'Status', 'TINYINT', true, null, null);
        $this->addColumn('sort_order', 'SortOrder', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RecurringId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RecurringId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RecurringId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RecurringId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RecurringId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RecurringId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('RecurringId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcRecurringTableMap::CLASS_DEFAULT : OcRecurringTableMap::OM_CLASS;
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
     * @return array           (OcRecurring object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcRecurringTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcRecurringTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcRecurringTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcRecurringTableMap::OM_CLASS;
            /** @var OcRecurring $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcRecurringTableMap::addInstanceToPool($obj, $key);
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
            $key = OcRecurringTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcRecurringTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcRecurring $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcRecurringTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcRecurringTableMap::COL_RECURRING_ID);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_PRICE);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_FREQUENCY);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_DURATION);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_CYCLE);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_TRIAL_STATUS);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_TRIAL_PRICE);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_TRIAL_FREQUENCY);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_TRIAL_DURATION);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_TRIAL_CYCLE);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcRecurringTableMap::COL_SORT_ORDER);
        } else {
            $criteria->addSelectColumn($alias . '.recurring_id');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.frequency');
            $criteria->addSelectColumn($alias . '.duration');
            $criteria->addSelectColumn($alias . '.cycle');
            $criteria->addSelectColumn($alias . '.trial_status');
            $criteria->addSelectColumn($alias . '.trial_price');
            $criteria->addSelectColumn($alias . '.trial_frequency');
            $criteria->addSelectColumn($alias . '.trial_duration');
            $criteria->addSelectColumn($alias . '.trial_cycle');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcRecurringTableMap::DATABASE_NAME)->getTable(OcRecurringTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcRecurringTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcRecurringTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcRecurringTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcRecurring or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcRecurring object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcRecurringTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcRecurring) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcRecurringTableMap::DATABASE_NAME);
            $criteria->add(OcRecurringTableMap::COL_RECURRING_ID, (array) $values, Criteria::IN);
        }

        $query = OcRecurringQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcRecurringTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcRecurringTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_recurring table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcRecurringQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcRecurring or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcRecurring object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcRecurringTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcRecurring object
        }

        if ($criteria->containsKey(OcRecurringTableMap::COL_RECURRING_ID) && $criteria->keyContainsValue(OcRecurringTableMap::COL_RECURRING_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcRecurringTableMap::COL_RECURRING_ID.')');
        }


        // Set the correct dbName
        $query = OcRecurringQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcRecurringTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcRecurringTableMap::buildTableMap();
