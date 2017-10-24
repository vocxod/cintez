<?php

namespace Map;

use \OcLanguage;
use \OcLanguageQuery;
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
 * This class defines the structure of the 'oc_language' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcLanguageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcLanguageTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_language';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcLanguage';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcLanguage';

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
     * the column name for the language_id field
     */
    const COL_LANGUAGE_ID = 'oc_language.language_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'oc_language.name';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_language.code';

    /**
     * the column name for the locale field
     */
    const COL_LOCALE = 'oc_language.locale';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'oc_language.image';

    /**
     * the column name for the directory field
     */
    const COL_DIRECTORY = 'oc_language.directory';

    /**
     * the column name for the sort_order field
     */
    const COL_SORT_ORDER = 'oc_language.sort_order';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_language.status';

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
        self::TYPE_PHPNAME       => array('LanguageId', 'Name', 'Code', 'Locale', 'Image', 'Directory', 'SortOrder', 'Status', ),
        self::TYPE_CAMELNAME     => array('languageId', 'name', 'code', 'locale', 'image', 'directory', 'sortOrder', 'status', ),
        self::TYPE_COLNAME       => array(OcLanguageTableMap::COL_LANGUAGE_ID, OcLanguageTableMap::COL_NAME, OcLanguageTableMap::COL_CODE, OcLanguageTableMap::COL_LOCALE, OcLanguageTableMap::COL_IMAGE, OcLanguageTableMap::COL_DIRECTORY, OcLanguageTableMap::COL_SORT_ORDER, OcLanguageTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('language_id', 'name', 'code', 'locale', 'image', 'directory', 'sort_order', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('LanguageId' => 0, 'Name' => 1, 'Code' => 2, 'Locale' => 3, 'Image' => 4, 'Directory' => 5, 'SortOrder' => 6, 'Status' => 7, ),
        self::TYPE_CAMELNAME     => array('languageId' => 0, 'name' => 1, 'code' => 2, 'locale' => 3, 'image' => 4, 'directory' => 5, 'sortOrder' => 6, 'status' => 7, ),
        self::TYPE_COLNAME       => array(OcLanguageTableMap::COL_LANGUAGE_ID => 0, OcLanguageTableMap::COL_NAME => 1, OcLanguageTableMap::COL_CODE => 2, OcLanguageTableMap::COL_LOCALE => 3, OcLanguageTableMap::COL_IMAGE => 4, OcLanguageTableMap::COL_DIRECTORY => 5, OcLanguageTableMap::COL_SORT_ORDER => 6, OcLanguageTableMap::COL_STATUS => 7, ),
        self::TYPE_FIELDNAME     => array('language_id' => 0, 'name' => 1, 'code' => 2, 'locale' => 3, 'image' => 4, 'directory' => 5, 'sort_order' => 6, 'status' => 7, ),
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
        $this->setName('oc_language');
        $this->setPhpName('OcLanguage');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcLanguage');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('language_id', 'LanguageId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 5, null);
        $this->addColumn('locale', 'Locale', 'VARCHAR', true, 255, null);
        $this->addColumn('image', 'Image', 'VARCHAR', true, 64, null);
        $this->addColumn('directory', 'Directory', 'VARCHAR', true, 32, null);
        $this->addColumn('sort_order', 'SortOrder', 'INTEGER', true, 3, 0);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcLanguageTableMap::CLASS_DEFAULT : OcLanguageTableMap::OM_CLASS;
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
     * @return array           (OcLanguage object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcLanguageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcLanguageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcLanguageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcLanguageTableMap::OM_CLASS;
            /** @var OcLanguage $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcLanguageTableMap::addInstanceToPool($obj, $key);
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
            $key = OcLanguageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcLanguageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcLanguage $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcLanguageTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcLanguageTableMap::COL_LANGUAGE_ID);
            $criteria->addSelectColumn(OcLanguageTableMap::COL_NAME);
            $criteria->addSelectColumn(OcLanguageTableMap::COL_CODE);
            $criteria->addSelectColumn(OcLanguageTableMap::COL_LOCALE);
            $criteria->addSelectColumn(OcLanguageTableMap::COL_IMAGE);
            $criteria->addSelectColumn(OcLanguageTableMap::COL_DIRECTORY);
            $criteria->addSelectColumn(OcLanguageTableMap::COL_SORT_ORDER);
            $criteria->addSelectColumn(OcLanguageTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.language_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.locale');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.directory');
            $criteria->addSelectColumn($alias . '.sort_order');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcLanguageTableMap::DATABASE_NAME)->getTable(OcLanguageTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcLanguageTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcLanguageTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcLanguageTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcLanguage or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcLanguage object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcLanguageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcLanguage) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcLanguageTableMap::DATABASE_NAME);
            $criteria->add(OcLanguageTableMap::COL_LANGUAGE_ID, (array) $values, Criteria::IN);
        }

        $query = OcLanguageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcLanguageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcLanguageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_language table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcLanguageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcLanguage or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcLanguage object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcLanguageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcLanguage object
        }

        if ($criteria->containsKey(OcLanguageTableMap::COL_LANGUAGE_ID) && $criteria->keyContainsValue(OcLanguageTableMap::COL_LANGUAGE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcLanguageTableMap::COL_LANGUAGE_ID.')');
        }


        // Set the correct dbName
        $query = OcLanguageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcLanguageTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcLanguageTableMap::buildTableMap();