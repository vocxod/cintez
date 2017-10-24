<?php

namespace Map;

use \OcOrderRecurring;
use \OcOrderRecurringQuery;
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
 * This class defines the structure of the 'oc_order_recurring' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcOrderRecurringTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcOrderRecurringTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_order_recurring';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcOrderRecurring';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcOrderRecurring';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the order_recurring_id field
     */
    const COL_ORDER_RECURRING_ID = 'oc_order_recurring.order_recurring_id';

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'oc_order_recurring.order_id';

    /**
     * the column name for the reference field
     */
    const COL_REFERENCE = 'oc_order_recurring.reference';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_order_recurring.product_id';

    /**
     * the column name for the product_name field
     */
    const COL_PRODUCT_NAME = 'oc_order_recurring.product_name';

    /**
     * the column name for the product_quantity field
     */
    const COL_PRODUCT_QUANTITY = 'oc_order_recurring.product_quantity';

    /**
     * the column name for the recurring_id field
     */
    const COL_RECURRING_ID = 'oc_order_recurring.recurring_id';

    /**
     * the column name for the recurring_name field
     */
    const COL_RECURRING_NAME = 'oc_order_recurring.recurring_name';

    /**
     * the column name for the recurring_description field
     */
    const COL_RECURRING_DESCRIPTION = 'oc_order_recurring.recurring_description';

    /**
     * the column name for the recurring_frequency field
     */
    const COL_RECURRING_FREQUENCY = 'oc_order_recurring.recurring_frequency';

    /**
     * the column name for the recurring_cycle field
     */
    const COL_RECURRING_CYCLE = 'oc_order_recurring.recurring_cycle';

    /**
     * the column name for the recurring_duration field
     */
    const COL_RECURRING_DURATION = 'oc_order_recurring.recurring_duration';

    /**
     * the column name for the recurring_price field
     */
    const COL_RECURRING_PRICE = 'oc_order_recurring.recurring_price';

    /**
     * the column name for the trial field
     */
    const COL_TRIAL = 'oc_order_recurring.trial';

    /**
     * the column name for the trial_frequency field
     */
    const COL_TRIAL_FREQUENCY = 'oc_order_recurring.trial_frequency';

    /**
     * the column name for the trial_cycle field
     */
    const COL_TRIAL_CYCLE = 'oc_order_recurring.trial_cycle';

    /**
     * the column name for the trial_duration field
     */
    const COL_TRIAL_DURATION = 'oc_order_recurring.trial_duration';

    /**
     * the column name for the trial_price field
     */
    const COL_TRIAL_PRICE = 'oc_order_recurring.trial_price';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_order_recurring.status';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_order_recurring.date_added';

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
        self::TYPE_PHPNAME       => array('OrderRecurringId', 'OrderId', 'Reference', 'ProductId', 'ProductName', 'ProductQuantity', 'RecurringId', 'RecurringName', 'RecurringDescription', 'RecurringFrequency', 'RecurringCycle', 'RecurringDuration', 'RecurringPrice', 'Trial', 'TrialFrequency', 'TrialCycle', 'TrialDuration', 'TrialPrice', 'Status', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('orderRecurringId', 'orderId', 'reference', 'productId', 'productName', 'productQuantity', 'recurringId', 'recurringName', 'recurringDescription', 'recurringFrequency', 'recurringCycle', 'recurringDuration', 'recurringPrice', 'trial', 'trialFrequency', 'trialCycle', 'trialDuration', 'trialPrice', 'status', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, OcOrderRecurringTableMap::COL_ORDER_ID, OcOrderRecurringTableMap::COL_REFERENCE, OcOrderRecurringTableMap::COL_PRODUCT_ID, OcOrderRecurringTableMap::COL_PRODUCT_NAME, OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY, OcOrderRecurringTableMap::COL_RECURRING_ID, OcOrderRecurringTableMap::COL_RECURRING_NAME, OcOrderRecurringTableMap::COL_RECURRING_DESCRIPTION, OcOrderRecurringTableMap::COL_RECURRING_FREQUENCY, OcOrderRecurringTableMap::COL_RECURRING_CYCLE, OcOrderRecurringTableMap::COL_RECURRING_DURATION, OcOrderRecurringTableMap::COL_RECURRING_PRICE, OcOrderRecurringTableMap::COL_TRIAL, OcOrderRecurringTableMap::COL_TRIAL_FREQUENCY, OcOrderRecurringTableMap::COL_TRIAL_CYCLE, OcOrderRecurringTableMap::COL_TRIAL_DURATION, OcOrderRecurringTableMap::COL_TRIAL_PRICE, OcOrderRecurringTableMap::COL_STATUS, OcOrderRecurringTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('order_recurring_id', 'order_id', 'reference', 'product_id', 'product_name', 'product_quantity', 'recurring_id', 'recurring_name', 'recurring_description', 'recurring_frequency', 'recurring_cycle', 'recurring_duration', 'recurring_price', 'trial', 'trial_frequency', 'trial_cycle', 'trial_duration', 'trial_price', 'status', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('OrderRecurringId' => 0, 'OrderId' => 1, 'Reference' => 2, 'ProductId' => 3, 'ProductName' => 4, 'ProductQuantity' => 5, 'RecurringId' => 6, 'RecurringName' => 7, 'RecurringDescription' => 8, 'RecurringFrequency' => 9, 'RecurringCycle' => 10, 'RecurringDuration' => 11, 'RecurringPrice' => 12, 'Trial' => 13, 'TrialFrequency' => 14, 'TrialCycle' => 15, 'TrialDuration' => 16, 'TrialPrice' => 17, 'Status' => 18, 'DateAdded' => 19, ),
        self::TYPE_CAMELNAME     => array('orderRecurringId' => 0, 'orderId' => 1, 'reference' => 2, 'productId' => 3, 'productName' => 4, 'productQuantity' => 5, 'recurringId' => 6, 'recurringName' => 7, 'recurringDescription' => 8, 'recurringFrequency' => 9, 'recurringCycle' => 10, 'recurringDuration' => 11, 'recurringPrice' => 12, 'trial' => 13, 'trialFrequency' => 14, 'trialCycle' => 15, 'trialDuration' => 16, 'trialPrice' => 17, 'status' => 18, 'dateAdded' => 19, ),
        self::TYPE_COLNAME       => array(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID => 0, OcOrderRecurringTableMap::COL_ORDER_ID => 1, OcOrderRecurringTableMap::COL_REFERENCE => 2, OcOrderRecurringTableMap::COL_PRODUCT_ID => 3, OcOrderRecurringTableMap::COL_PRODUCT_NAME => 4, OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY => 5, OcOrderRecurringTableMap::COL_RECURRING_ID => 6, OcOrderRecurringTableMap::COL_RECURRING_NAME => 7, OcOrderRecurringTableMap::COL_RECURRING_DESCRIPTION => 8, OcOrderRecurringTableMap::COL_RECURRING_FREQUENCY => 9, OcOrderRecurringTableMap::COL_RECURRING_CYCLE => 10, OcOrderRecurringTableMap::COL_RECURRING_DURATION => 11, OcOrderRecurringTableMap::COL_RECURRING_PRICE => 12, OcOrderRecurringTableMap::COL_TRIAL => 13, OcOrderRecurringTableMap::COL_TRIAL_FREQUENCY => 14, OcOrderRecurringTableMap::COL_TRIAL_CYCLE => 15, OcOrderRecurringTableMap::COL_TRIAL_DURATION => 16, OcOrderRecurringTableMap::COL_TRIAL_PRICE => 17, OcOrderRecurringTableMap::COL_STATUS => 18, OcOrderRecurringTableMap::COL_DATE_ADDED => 19, ),
        self::TYPE_FIELDNAME     => array('order_recurring_id' => 0, 'order_id' => 1, 'reference' => 2, 'product_id' => 3, 'product_name' => 4, 'product_quantity' => 5, 'recurring_id' => 6, 'recurring_name' => 7, 'recurring_description' => 8, 'recurring_frequency' => 9, 'recurring_cycle' => 10, 'recurring_duration' => 11, 'recurring_price' => 12, 'trial' => 13, 'trial_frequency' => 14, 'trial_cycle' => 15, 'trial_duration' => 16, 'trial_price' => 17, 'status' => 18, 'date_added' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('oc_order_recurring');
        $this->setPhpName('OcOrderRecurring');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcOrderRecurring');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('order_recurring_id', 'OrderRecurringId', 'INTEGER', true, null, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('reference', 'Reference', 'VARCHAR', true, 255, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('product_name', 'ProductName', 'VARCHAR', true, 255, null);
        $this->addColumn('product_quantity', 'ProductQuantity', 'INTEGER', true, null, null);
        $this->addColumn('recurring_id', 'RecurringId', 'INTEGER', true, null, null);
        $this->addColumn('recurring_name', 'RecurringName', 'VARCHAR', true, 255, null);
        $this->addColumn('recurring_description', 'RecurringDescription', 'VARCHAR', true, 255, null);
        $this->addColumn('recurring_frequency', 'RecurringFrequency', 'VARCHAR', true, 25, null);
        $this->addColumn('recurring_cycle', 'RecurringCycle', 'SMALLINT', true, null, null);
        $this->addColumn('recurring_duration', 'RecurringDuration', 'SMALLINT', true, null, null);
        $this->addColumn('recurring_price', 'RecurringPrice', 'DECIMAL', true, 10, null);
        $this->addColumn('trial', 'Trial', 'BOOLEAN', true, 1, null);
        $this->addColumn('trial_frequency', 'TrialFrequency', 'VARCHAR', true, 25, null);
        $this->addColumn('trial_cycle', 'TrialCycle', 'SMALLINT', true, null, null);
        $this->addColumn('trial_duration', 'TrialDuration', 'SMALLINT', true, null, null);
        $this->addColumn('trial_price', 'TrialPrice', 'DECIMAL', true, 10, null);
        $this->addColumn('status', 'Status', 'TINYINT', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderRecurringId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderRecurringId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderRecurringId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderRecurringId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderRecurringId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderRecurringId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('OrderRecurringId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcOrderRecurringTableMap::CLASS_DEFAULT : OcOrderRecurringTableMap::OM_CLASS;
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
     * @return array           (OcOrderRecurring object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcOrderRecurringTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcOrderRecurringTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcOrderRecurringTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcOrderRecurringTableMap::OM_CLASS;
            /** @var OcOrderRecurring $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcOrderRecurringTableMap::addInstanceToPool($obj, $key);
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
            $key = OcOrderRecurringTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcOrderRecurringTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcOrderRecurring $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcOrderRecurringTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_REFERENCE);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_PRODUCT_NAME);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_RECURRING_ID);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_RECURRING_NAME);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_RECURRING_DESCRIPTION);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_RECURRING_FREQUENCY);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_RECURRING_CYCLE);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_RECURRING_DURATION);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_RECURRING_PRICE);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_TRIAL);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_TRIAL_FREQUENCY);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_TRIAL_CYCLE);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_TRIAL_DURATION);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_TRIAL_PRICE);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcOrderRecurringTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.order_recurring_id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.reference');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.product_name');
            $criteria->addSelectColumn($alias . '.product_quantity');
            $criteria->addSelectColumn($alias . '.recurring_id');
            $criteria->addSelectColumn($alias . '.recurring_name');
            $criteria->addSelectColumn($alias . '.recurring_description');
            $criteria->addSelectColumn($alias . '.recurring_frequency');
            $criteria->addSelectColumn($alias . '.recurring_cycle');
            $criteria->addSelectColumn($alias . '.recurring_duration');
            $criteria->addSelectColumn($alias . '.recurring_price');
            $criteria->addSelectColumn($alias . '.trial');
            $criteria->addSelectColumn($alias . '.trial_frequency');
            $criteria->addSelectColumn($alias . '.trial_cycle');
            $criteria->addSelectColumn($alias . '.trial_duration');
            $criteria->addSelectColumn($alias . '.trial_price');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcOrderRecurringTableMap::DATABASE_NAME)->getTable(OcOrderRecurringTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcOrderRecurringTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcOrderRecurringTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcOrderRecurringTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcOrderRecurring or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcOrderRecurring object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderRecurringTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcOrderRecurring) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcOrderRecurringTableMap::DATABASE_NAME);
            $criteria->add(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, (array) $values, Criteria::IN);
        }

        $query = OcOrderRecurringQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcOrderRecurringTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcOrderRecurringTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_order_recurring table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcOrderRecurringQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcOrderRecurring or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcOrderRecurring object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderRecurringTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcOrderRecurring object
        }

        if ($criteria->containsKey(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID) && $criteria->keyContainsValue(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID.')');
        }


        // Set the correct dbName
        $query = OcOrderRecurringQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcOrderRecurringTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcOrderRecurringTableMap::buildTableMap();
