<?php

namespace Map;

use \OcTheme;
use \OcThemeQuery;
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
 * This class defines the structure of the 'oc_theme' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcThemeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcThemeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_theme';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcTheme';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcTheme';

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
     * the column name for the theme_id field
     */
    const COL_THEME_ID = 'oc_theme.theme_id';

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'oc_theme.store_id';

    /**
     * the column name for the theme field
     */
    const COL_THEME = 'oc_theme.theme';

    /**
     * the column name for the route field
     */
    const COL_ROUTE = 'oc_theme.route';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_theme.code';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_theme.date_added';

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
        self::TYPE_PHPNAME       => array('ThemeId', 'StoreId', 'Theme', 'Route', 'Code', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('themeId', 'storeId', 'theme', 'route', 'code', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcThemeTableMap::COL_THEME_ID, OcThemeTableMap::COL_STORE_ID, OcThemeTableMap::COL_THEME, OcThemeTableMap::COL_ROUTE, OcThemeTableMap::COL_CODE, OcThemeTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('theme_id', 'store_id', 'theme', 'route', 'code', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ThemeId' => 0, 'StoreId' => 1, 'Theme' => 2, 'Route' => 3, 'Code' => 4, 'DateAdded' => 5, ),
        self::TYPE_CAMELNAME     => array('themeId' => 0, 'storeId' => 1, 'theme' => 2, 'route' => 3, 'code' => 4, 'dateAdded' => 5, ),
        self::TYPE_COLNAME       => array(OcThemeTableMap::COL_THEME_ID => 0, OcThemeTableMap::COL_STORE_ID => 1, OcThemeTableMap::COL_THEME => 2, OcThemeTableMap::COL_ROUTE => 3, OcThemeTableMap::COL_CODE => 4, OcThemeTableMap::COL_DATE_ADDED => 5, ),
        self::TYPE_FIELDNAME     => array('theme_id' => 0, 'store_id' => 1, 'theme' => 2, 'route' => 3, 'code' => 4, 'date_added' => 5, ),
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
        $this->setName('oc_theme');
        $this->setPhpName('OcTheme');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcTheme');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('theme_id', 'ThemeId', 'INTEGER', true, null, null);
        $this->addColumn('store_id', 'StoreId', 'INTEGER', true, null, null);
        $this->addColumn('theme', 'Theme', 'VARCHAR', true, 64, null);
        $this->addColumn('route', 'Route', 'VARCHAR', true, 64, null);
        $this->addColumn('code', 'Code', 'LONGVARCHAR', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ThemeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ThemeId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ThemeId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ThemeId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ThemeId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ThemeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ThemeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcThemeTableMap::CLASS_DEFAULT : OcThemeTableMap::OM_CLASS;
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
     * @return array           (OcTheme object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcThemeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcThemeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcThemeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcThemeTableMap::OM_CLASS;
            /** @var OcTheme $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcThemeTableMap::addInstanceToPool($obj, $key);
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
            $key = OcThemeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcThemeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcTheme $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcThemeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcThemeTableMap::COL_THEME_ID);
            $criteria->addSelectColumn(OcThemeTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(OcThemeTableMap::COL_THEME);
            $criteria->addSelectColumn(OcThemeTableMap::COL_ROUTE);
            $criteria->addSelectColumn(OcThemeTableMap::COL_CODE);
            $criteria->addSelectColumn(OcThemeTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.theme_id');
            $criteria->addSelectColumn($alias . '.store_id');
            $criteria->addSelectColumn($alias . '.theme');
            $criteria->addSelectColumn($alias . '.route');
            $criteria->addSelectColumn($alias . '.code');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcThemeTableMap::DATABASE_NAME)->getTable(OcThemeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcThemeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcThemeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcThemeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcTheme or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcTheme object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcThemeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcTheme) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcThemeTableMap::DATABASE_NAME);
            $criteria->add(OcThemeTableMap::COL_THEME_ID, (array) $values, Criteria::IN);
        }

        $query = OcThemeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcThemeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcThemeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_theme table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcThemeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcTheme or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcTheme object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcThemeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcTheme object
        }

        if ($criteria->containsKey(OcThemeTableMap::COL_THEME_ID) && $criteria->keyContainsValue(OcThemeTableMap::COL_THEME_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcThemeTableMap::COL_THEME_ID.')');
        }


        // Set the correct dbName
        $query = OcThemeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcThemeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcThemeTableMap::buildTableMap();
