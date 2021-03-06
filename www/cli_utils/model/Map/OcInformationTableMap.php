<?php

namespace Map;

use \OcInformation;
use \OcInformationQuery;
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
 * This class defines the structure of the 'oc_information' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcInformationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcInformationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_information';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcInformation';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcInformation';

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
     * the column name for the information_id field
     */
    const COL_INFORMATION_ID = 'oc_information.information_id';

    /**
     * the column name for the bottom field
     */
    const COL_BOTTOM = 'oc_information.bottom';

    /**
     * the column name for the sort_order field
     */
    const COL_SORT_ORDER = 'oc_information.sort_order';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_information.status';

    /**
     * the column name for the isnews field
     */
    const COL_ISNEWS = 'oc_information.isnews';

    /**
     * the column name for the onhome field
     */
    const COL_ONHOME = 'oc_information.onhome';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_information.date_added';

    /**
     * the column name for the artice_id field
     */
    const COL_ARTICE_ID = 'oc_information.artice_id';

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
        self::TYPE_PHPNAME       => array('InformationId', 'Bottom', 'SortOrder', 'Status', 'Isnews', 'Onhome', 'DateAdded', 'ArticeId', ),
        self::TYPE_CAMELNAME     => array('informationId', 'bottom', 'sortOrder', 'status', 'isnews', 'onhome', 'dateAdded', 'articeId', ),
        self::TYPE_COLNAME       => array(OcInformationTableMap::COL_INFORMATION_ID, OcInformationTableMap::COL_BOTTOM, OcInformationTableMap::COL_SORT_ORDER, OcInformationTableMap::COL_STATUS, OcInformationTableMap::COL_ISNEWS, OcInformationTableMap::COL_ONHOME, OcInformationTableMap::COL_DATE_ADDED, OcInformationTableMap::COL_ARTICE_ID, ),
        self::TYPE_FIELDNAME     => array('information_id', 'bottom', 'sort_order', 'status', 'isnews', 'onhome', 'date_added', 'artice_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('InformationId' => 0, 'Bottom' => 1, 'SortOrder' => 2, 'Status' => 3, 'Isnews' => 4, 'Onhome' => 5, 'DateAdded' => 6, 'ArticeId' => 7, ),
        self::TYPE_CAMELNAME     => array('informationId' => 0, 'bottom' => 1, 'sortOrder' => 2, 'status' => 3, 'isnews' => 4, 'onhome' => 5, 'dateAdded' => 6, 'articeId' => 7, ),
        self::TYPE_COLNAME       => array(OcInformationTableMap::COL_INFORMATION_ID => 0, OcInformationTableMap::COL_BOTTOM => 1, OcInformationTableMap::COL_SORT_ORDER => 2, OcInformationTableMap::COL_STATUS => 3, OcInformationTableMap::COL_ISNEWS => 4, OcInformationTableMap::COL_ONHOME => 5, OcInformationTableMap::COL_DATE_ADDED => 6, OcInformationTableMap::COL_ARTICE_ID => 7, ),
        self::TYPE_FIELDNAME     => array('information_id' => 0, 'bottom' => 1, 'sort_order' => 2, 'status' => 3, 'isnews' => 4, 'onhome' => 5, 'date_added' => 6, 'artice_id' => 7, ),
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
        $this->setName('oc_information');
        $this->setPhpName('OcInformation');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcInformation');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('information_id', 'InformationId', 'INTEGER', true, null, null);
        $this->addColumn('bottom', 'Bottom', 'INTEGER', true, 1, 0);
        $this->addColumn('sort_order', 'SortOrder', 'INTEGER', true, 3, 0);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, true);
        $this->addColumn('isnews', 'Isnews', 'INTEGER', false, null, 0);
        $this->addColumn('onhome', 'Onhome', 'INTEGER', false, null, 0);
        $this->addColumn('date_added', 'DateAdded', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('artice_id', 'ArticeId', 'INTEGER', false, null, 0);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcInformationTableMap::CLASS_DEFAULT : OcInformationTableMap::OM_CLASS;
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
     * @return array           (OcInformation object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcInformationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcInformationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcInformationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcInformationTableMap::OM_CLASS;
            /** @var OcInformation $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcInformationTableMap::addInstanceToPool($obj, $key);
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
            $key = OcInformationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcInformationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcInformation $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcInformationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcInformationTableMap::COL_INFORMATION_ID);
            $criteria->addSelectColumn(OcInformationTableMap::COL_BOTTOM);
            $criteria->addSelectColumn(OcInformationTableMap::COL_SORT_ORDER);
            $criteria->addSelectColumn(OcInformationTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcInformationTableMap::COL_ISNEWS);
            $criteria->addSelectColumn(OcInformationTableMap::COL_ONHOME);
            $criteria->addSelectColumn(OcInformationTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OcInformationTableMap::COL_ARTICE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.information_id');
            $criteria->addSelectColumn($alias . '.bottom');
            $criteria->addSelectColumn($alias . '.sort_order');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.isnews');
            $criteria->addSelectColumn($alias . '.onhome');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.artice_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcInformationTableMap::DATABASE_NAME)->getTable(OcInformationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcInformationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcInformationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcInformationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcInformation or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcInformation object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcInformation) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcInformationTableMap::DATABASE_NAME);
            $criteria->add(OcInformationTableMap::COL_INFORMATION_ID, (array) $values, Criteria::IN);
        }

        $query = OcInformationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcInformationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcInformationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_information table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcInformationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcInformation or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcInformation object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcInformation object
        }

        if ($criteria->containsKey(OcInformationTableMap::COL_INFORMATION_ID) && $criteria->keyContainsValue(OcInformationTableMap::COL_INFORMATION_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcInformationTableMap::COL_INFORMATION_ID.')');
        }


        // Set the correct dbName
        $query = OcInformationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcInformationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcInformationTableMap::buildTableMap();
