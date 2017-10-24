<?php

namespace Map;

use \OcLocation;
use \OcLocationQuery;
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
 * This class defines the structure of the 'oc_location' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcLocationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcLocationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_location';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcLocation';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcLocation';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the location_id field
     */
    const COL_LOCATION_ID = 'oc_location.location_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'oc_location.name';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'oc_location.address';

    /**
     * the column name for the telephone field
     */
    const COL_TELEPHONE = 'oc_location.telephone';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'oc_location.fax';

    /**
     * the column name for the geocode field
     */
    const COL_GEOCODE = 'oc_location.geocode';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'oc_location.image';

    /**
     * the column name for the open field
     */
    const COL_OPEN = 'oc_location.open';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'oc_location.comment';

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
        self::TYPE_PHPNAME       => array('LocationId', 'Name', 'Address', 'Telephone', 'Fax', 'Geocode', 'Image', 'Open', 'Comment', ),
        self::TYPE_CAMELNAME     => array('locationId', 'name', 'address', 'telephone', 'fax', 'geocode', 'image', 'open', 'comment', ),
        self::TYPE_COLNAME       => array(OcLocationTableMap::COL_LOCATION_ID, OcLocationTableMap::COL_NAME, OcLocationTableMap::COL_ADDRESS, OcLocationTableMap::COL_TELEPHONE, OcLocationTableMap::COL_FAX, OcLocationTableMap::COL_GEOCODE, OcLocationTableMap::COL_IMAGE, OcLocationTableMap::COL_OPEN, OcLocationTableMap::COL_COMMENT, ),
        self::TYPE_FIELDNAME     => array('location_id', 'name', 'address', 'telephone', 'fax', 'geocode', 'image', 'open', 'comment', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('LocationId' => 0, 'Name' => 1, 'Address' => 2, 'Telephone' => 3, 'Fax' => 4, 'Geocode' => 5, 'Image' => 6, 'Open' => 7, 'Comment' => 8, ),
        self::TYPE_CAMELNAME     => array('locationId' => 0, 'name' => 1, 'address' => 2, 'telephone' => 3, 'fax' => 4, 'geocode' => 5, 'image' => 6, 'open' => 7, 'comment' => 8, ),
        self::TYPE_COLNAME       => array(OcLocationTableMap::COL_LOCATION_ID => 0, OcLocationTableMap::COL_NAME => 1, OcLocationTableMap::COL_ADDRESS => 2, OcLocationTableMap::COL_TELEPHONE => 3, OcLocationTableMap::COL_FAX => 4, OcLocationTableMap::COL_GEOCODE => 5, OcLocationTableMap::COL_IMAGE => 6, OcLocationTableMap::COL_OPEN => 7, OcLocationTableMap::COL_COMMENT => 8, ),
        self::TYPE_FIELDNAME     => array('location_id' => 0, 'name' => 1, 'address' => 2, 'telephone' => 3, 'fax' => 4, 'geocode' => 5, 'image' => 6, 'open' => 7, 'comment' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('oc_location');
        $this->setPhpName('OcLocation');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcLocation');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('location_id', 'LocationId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', true, null, null);
        $this->addColumn('telephone', 'Telephone', 'VARCHAR', true, 32, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', true, 32, null);
        $this->addColumn('geocode', 'Geocode', 'VARCHAR', true, 32, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 255, null);
        $this->addColumn('open', 'Open', 'LONGVARCHAR', true, null, null);
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LocationId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LocationId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LocationId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LocationId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LocationId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LocationId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('LocationId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcLocationTableMap::CLASS_DEFAULT : OcLocationTableMap::OM_CLASS;
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
     * @return array           (OcLocation object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcLocationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcLocationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcLocationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcLocationTableMap::OM_CLASS;
            /** @var OcLocation $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcLocationTableMap::addInstanceToPool($obj, $key);
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
            $key = OcLocationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcLocationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcLocation $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcLocationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcLocationTableMap::COL_LOCATION_ID);
            $criteria->addSelectColumn(OcLocationTableMap::COL_NAME);
            $criteria->addSelectColumn(OcLocationTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(OcLocationTableMap::COL_TELEPHONE);
            $criteria->addSelectColumn(OcLocationTableMap::COL_FAX);
            $criteria->addSelectColumn(OcLocationTableMap::COL_GEOCODE);
            $criteria->addSelectColumn(OcLocationTableMap::COL_IMAGE);
            $criteria->addSelectColumn(OcLocationTableMap::COL_OPEN);
            $criteria->addSelectColumn(OcLocationTableMap::COL_COMMENT);
        } else {
            $criteria->addSelectColumn($alias . '.location_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.telephone');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.geocode');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.open');
            $criteria->addSelectColumn($alias . '.comment');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcLocationTableMap::DATABASE_NAME)->getTable(OcLocationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcLocationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcLocationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcLocationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcLocation or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcLocation object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcLocationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcLocation) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcLocationTableMap::DATABASE_NAME);
            $criteria->add(OcLocationTableMap::COL_LOCATION_ID, (array) $values, Criteria::IN);
        }

        $query = OcLocationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcLocationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcLocationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_location table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcLocationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcLocation or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcLocation object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcLocationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcLocation object
        }

        if ($criteria->containsKey(OcLocationTableMap::COL_LOCATION_ID) && $criteria->keyContainsValue(OcLocationTableMap::COL_LOCATION_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcLocationTableMap::COL_LOCATION_ID.')');
        }


        // Set the correct dbName
        $query = OcLocationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcLocationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcLocationTableMap::buildTableMap();
