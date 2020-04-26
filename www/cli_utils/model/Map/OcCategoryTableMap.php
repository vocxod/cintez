<?php

namespace Map;

use \OcCategory;
use \OcCategoryQuery;
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
 * This class defines the structure of the 'oc_category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCategoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCategoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_category';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCategory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCategory';

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
     * the column name for the category_id field
     */
    const COL_CATEGORY_ID = 'oc_category.category_id';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'oc_category.image';

    /**
     * the column name for the parent_id field
     */
    const COL_PARENT_ID = 'oc_category.parent_id';

    /**
     * the column name for the top field
     */
    const COL_TOP = 'oc_category.top';

    /**
     * the column name for the column field
     */
    const COL_COLUMN = 'oc_category.column';

    /**
     * the column name for the sort_order field
     */
    const COL_SORT_ORDER = 'oc_category.sort_order';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_category.status';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_category.date_added';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'oc_category.date_modified';

    /**
     * the column name for the category_site_id field
     */
    const COL_CATEGORY_SITE_ID = 'oc_category.category_site_id';

    /**
     * the column name for the css field
     */
    const COL_CSS = 'oc_category.css';

    /**
     * the column name for the class field
     */
    const COL_CLASS = 'oc_category.class';

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
        self::TYPE_PHPNAME       => array('CategoryId', 'Image', 'ParentId', 'Top', 'Column', 'SortOrder', 'Status', 'DateAdded', 'DateModified', 'CategorySiteId', 'Css', 'Class', ),
        self::TYPE_CAMELNAME     => array('categoryId', 'image', 'parentId', 'top', 'column', 'sortOrder', 'status', 'dateAdded', 'dateModified', 'categorySiteId', 'css', 'class', ),
        self::TYPE_COLNAME       => array(OcCategoryTableMap::COL_CATEGORY_ID, OcCategoryTableMap::COL_IMAGE, OcCategoryTableMap::COL_PARENT_ID, OcCategoryTableMap::COL_TOP, OcCategoryTableMap::COL_COLUMN, OcCategoryTableMap::COL_SORT_ORDER, OcCategoryTableMap::COL_STATUS, OcCategoryTableMap::COL_DATE_ADDED, OcCategoryTableMap::COL_DATE_MODIFIED, OcCategoryTableMap::COL_CATEGORY_SITE_ID, OcCategoryTableMap::COL_CSS, OcCategoryTableMap::COL_CLASS, ),
        self::TYPE_FIELDNAME     => array('category_id', 'image', 'parent_id', 'top', 'column', 'sort_order', 'status', 'date_added', 'date_modified', 'category_site_id', 'css', 'class', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CategoryId' => 0, 'Image' => 1, 'ParentId' => 2, 'Top' => 3, 'Column' => 4, 'SortOrder' => 5, 'Status' => 6, 'DateAdded' => 7, 'DateModified' => 8, 'CategorySiteId' => 9, 'Css' => 10, 'Class' => 11, ),
        self::TYPE_CAMELNAME     => array('categoryId' => 0, 'image' => 1, 'parentId' => 2, 'top' => 3, 'column' => 4, 'sortOrder' => 5, 'status' => 6, 'dateAdded' => 7, 'dateModified' => 8, 'categorySiteId' => 9, 'css' => 10, 'class' => 11, ),
        self::TYPE_COLNAME       => array(OcCategoryTableMap::COL_CATEGORY_ID => 0, OcCategoryTableMap::COL_IMAGE => 1, OcCategoryTableMap::COL_PARENT_ID => 2, OcCategoryTableMap::COL_TOP => 3, OcCategoryTableMap::COL_COLUMN => 4, OcCategoryTableMap::COL_SORT_ORDER => 5, OcCategoryTableMap::COL_STATUS => 6, OcCategoryTableMap::COL_DATE_ADDED => 7, OcCategoryTableMap::COL_DATE_MODIFIED => 8, OcCategoryTableMap::COL_CATEGORY_SITE_ID => 9, OcCategoryTableMap::COL_CSS => 10, OcCategoryTableMap::COL_CLASS => 11, ),
        self::TYPE_FIELDNAME     => array('category_id' => 0, 'image' => 1, 'parent_id' => 2, 'top' => 3, 'column' => 4, 'sort_order' => 5, 'status' => 6, 'date_added' => 7, 'date_modified' => 8, 'category_site_id' => 9, 'css' => 10, 'class' => 11, ),
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
        $this->setName('oc_category');
        $this->setPhpName('OcCategory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCategory');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('category_id', 'CategoryId', 'INTEGER', true, null, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 255, null);
        $this->addColumn('parent_id', 'ParentId', 'INTEGER', true, null, 0);
        $this->addColumn('top', 'Top', 'BOOLEAN', true, 1, null);
        $this->addColumn('column', 'Column', 'INTEGER', false, null, 1);
        $this->addColumn('sort_order', 'SortOrder', 'INTEGER', true, 3, 0);
        $this->addColumn('status', 'Status', 'INTEGER', false, null, 0);
        $this->addColumn('date_added', 'DateAdded', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('category_site_id', 'CategorySiteId', 'INTEGER', false, null, null);
        $this->addColumn('css', 'Css', 'VARCHAR', false, 64, '0');
        $this->addColumn('class', 'Class', 'VARCHAR', false, 255, '');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('OcCategoryDescription', '\\OcCategoryDescription', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':category_id',
    1 => ':category_id',
  ),
), null, null, 'OcCategoryDescriptions', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcCategoryTableMap::CLASS_DEFAULT : OcCategoryTableMap::OM_CLASS;
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
     * @return array           (OcCategory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCategoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCategoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCategoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCategoryTableMap::OM_CLASS;
            /** @var OcCategory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCategoryTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCategoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCategoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCategory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCategoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCategoryTableMap::COL_CATEGORY_ID);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_IMAGE);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_PARENT_ID);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_TOP);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_COLUMN);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_SORT_ORDER);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_CATEGORY_SITE_ID);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_CSS);
            $criteria->addSelectColumn(OcCategoryTableMap::COL_CLASS);
        } else {
            $criteria->addSelectColumn($alias . '.category_id');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.parent_id');
            $criteria->addSelectColumn($alias . '.top');
            $criteria->addSelectColumn($alias . '.column');
            $criteria->addSelectColumn($alias . '.sort_order');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.date_modified');
            $criteria->addSelectColumn($alias . '.category_site_id');
            $criteria->addSelectColumn($alias . '.css');
            $criteria->addSelectColumn($alias . '.class');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCategoryTableMap::DATABASE_NAME)->getTable(OcCategoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCategoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCategoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCategoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCategory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCategory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCategoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCategory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCategoryTableMap::DATABASE_NAME);
            $criteria->add(OcCategoryTableMap::COL_CATEGORY_ID, (array) $values, Criteria::IN);
        }

        $query = OcCategoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCategoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCategoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCategoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCategory or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCategory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCategoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCategory object
        }

        if ($criteria->containsKey(OcCategoryTableMap::COL_CATEGORY_ID) && $criteria->keyContainsValue(OcCategoryTableMap::COL_CATEGORY_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcCategoryTableMap::COL_CATEGORY_ID.')');
        }


        // Set the correct dbName
        $query = OcCategoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCategoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCategoryTableMap::buildTableMap();
