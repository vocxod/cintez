<?php

namespace Map;

use \OcReturnHistory;
use \OcReturnHistoryQuery;
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
 * This class defines the structure of the 'oc_return_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcReturnHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcReturnHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_return_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcReturnHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcReturnHistory';

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
     * the column name for the return_history_id field
     */
    const COL_RETURN_HISTORY_ID = 'oc_return_history.return_history_id';

    /**
     * the column name for the return_id field
     */
    const COL_RETURN_ID = 'oc_return_history.return_id';

    /**
     * the column name for the return_status_id field
     */
    const COL_RETURN_STATUS_ID = 'oc_return_history.return_status_id';

    /**
     * the column name for the notify field
     */
    const COL_NOTIFY = 'oc_return_history.notify';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'oc_return_history.comment';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_return_history.date_added';

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
        self::TYPE_PHPNAME       => array('ReturnHistoryId', 'ReturnId', 'ReturnStatusId', 'Notify', 'Comment', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('returnHistoryId', 'returnId', 'returnStatusId', 'notify', 'comment', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID, OcReturnHistoryTableMap::COL_RETURN_ID, OcReturnHistoryTableMap::COL_RETURN_STATUS_ID, OcReturnHistoryTableMap::COL_NOTIFY, OcReturnHistoryTableMap::COL_COMMENT, OcReturnHistoryTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('return_history_id', 'return_id', 'return_status_id', 'notify', 'comment', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ReturnHistoryId' => 0, 'ReturnId' => 1, 'ReturnStatusId' => 2, 'Notify' => 3, 'Comment' => 4, 'DateAdded' => 5, ),
        self::TYPE_CAMELNAME     => array('returnHistoryId' => 0, 'returnId' => 1, 'returnStatusId' => 2, 'notify' => 3, 'comment' => 4, 'dateAdded' => 5, ),
        self::TYPE_COLNAME       => array(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID => 0, OcReturnHistoryTableMap::COL_RETURN_ID => 1, OcReturnHistoryTableMap::COL_RETURN_STATUS_ID => 2, OcReturnHistoryTableMap::COL_NOTIFY => 3, OcReturnHistoryTableMap::COL_COMMENT => 4, OcReturnHistoryTableMap::COL_DATE_ADDED => 5, ),
        self::TYPE_FIELDNAME     => array('return_history_id' => 0, 'return_id' => 1, 'return_status_id' => 2, 'notify' => 3, 'comment' => 4, 'date_added' => 5, ),
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
        $this->setName('oc_return_history');
        $this->setPhpName('OcReturnHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcReturnHistory');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('return_history_id', 'ReturnHistoryId', 'INTEGER', true, null, null);
        $this->addColumn('return_id', 'ReturnId', 'INTEGER', true, null, null);
        $this->addColumn('return_status_id', 'ReturnStatusId', 'INTEGER', true, null, null);
        $this->addColumn('notify', 'Notify', 'BOOLEAN', true, 1, null);
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnHistoryId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnHistoryId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnHistoryId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnHistoryId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnHistoryId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnHistoryId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ReturnHistoryId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcReturnHistoryTableMap::CLASS_DEFAULT : OcReturnHistoryTableMap::OM_CLASS;
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
     * @return array           (OcReturnHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcReturnHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcReturnHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcReturnHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcReturnHistoryTableMap::OM_CLASS;
            /** @var OcReturnHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcReturnHistoryTableMap::addInstanceToPool($obj, $key);
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
            $key = OcReturnHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcReturnHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcReturnHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcReturnHistoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID);
            $criteria->addSelectColumn(OcReturnHistoryTableMap::COL_RETURN_ID);
            $criteria->addSelectColumn(OcReturnHistoryTableMap::COL_RETURN_STATUS_ID);
            $criteria->addSelectColumn(OcReturnHistoryTableMap::COL_NOTIFY);
            $criteria->addSelectColumn(OcReturnHistoryTableMap::COL_COMMENT);
            $criteria->addSelectColumn(OcReturnHistoryTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.return_history_id');
            $criteria->addSelectColumn($alias . '.return_id');
            $criteria->addSelectColumn($alias . '.return_status_id');
            $criteria->addSelectColumn($alias . '.notify');
            $criteria->addSelectColumn($alias . '.comment');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcReturnHistoryTableMap::DATABASE_NAME)->getTable(OcReturnHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcReturnHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcReturnHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcReturnHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcReturnHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcReturnHistory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcReturnHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcReturnHistoryTableMap::DATABASE_NAME);
            $criteria->add(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID, (array) $values, Criteria::IN);
        }

        $query = OcReturnHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcReturnHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcReturnHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_return_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcReturnHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcReturnHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcReturnHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcReturnHistory object
        }

        if ($criteria->containsKey(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID) && $criteria->keyContainsValue(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID.')');
        }


        // Set the correct dbName
        $query = OcReturnHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcReturnHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcReturnHistoryTableMap::buildTableMap();
