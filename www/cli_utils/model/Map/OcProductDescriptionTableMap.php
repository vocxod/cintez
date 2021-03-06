<?php

namespace Map;

use \OcProductDescription;
use \OcProductDescriptionQuery;
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
 * This class defines the structure of the 'oc_product_description' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcProductDescriptionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcProductDescriptionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_product_description';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcProductDescription';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcProductDescription';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_product_description.product_id';

    /**
     * the column name for the language_id field
     */
    const COL_LANGUAGE_ID = 'oc_product_description.language_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'oc_product_description.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'oc_product_description.description';

    /**
     * the column name for the tag field
     */
    const COL_TAG = 'oc_product_description.tag';

    /**
     * the column name for the meta_title field
     */
    const COL_META_TITLE = 'oc_product_description.meta_title';

    /**
     * the column name for the meta_description field
     */
    const COL_META_DESCRIPTION = 'oc_product_description.meta_description';

    /**
     * the column name for the meta_keyword field
     */
    const COL_META_KEYWORD = 'oc_product_description.meta_keyword';

    /**
     * the column name for the newslatest field
     */
    const COL_NEWSLATEST = 'oc_product_description.newslatest';

    /**
     * the column name for the show_newslatest field
     */
    const COL_SHOW_NEWSLATEST = 'oc_product_description.show_newslatest';

    /**
     * the column name for the small_description field
     */
    const COL_SMALL_DESCRIPTION = 'oc_product_description.small_description';

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
        self::TYPE_PHPNAME       => array('ProductId', 'LanguageId', 'Name', 'Description', 'Tag', 'MetaTitle', 'MetaDescription', 'MetaKeyword', 'Newslatest', 'ShowNewslatest', 'SmallDescription', ),
        self::TYPE_CAMELNAME     => array('productId', 'languageId', 'name', 'description', 'tag', 'metaTitle', 'metaDescription', 'metaKeyword', 'newslatest', 'showNewslatest', 'smallDescription', ),
        self::TYPE_COLNAME       => array(OcProductDescriptionTableMap::COL_PRODUCT_ID, OcProductDescriptionTableMap::COL_LANGUAGE_ID, OcProductDescriptionTableMap::COL_NAME, OcProductDescriptionTableMap::COL_DESCRIPTION, OcProductDescriptionTableMap::COL_TAG, OcProductDescriptionTableMap::COL_META_TITLE, OcProductDescriptionTableMap::COL_META_DESCRIPTION, OcProductDescriptionTableMap::COL_META_KEYWORD, OcProductDescriptionTableMap::COL_NEWSLATEST, OcProductDescriptionTableMap::COL_SHOW_NEWSLATEST, OcProductDescriptionTableMap::COL_SMALL_DESCRIPTION, ),
        self::TYPE_FIELDNAME     => array('product_id', 'language_id', 'name', 'description', 'tag', 'meta_title', 'meta_description', 'meta_keyword', 'newslatest', 'show_newslatest', 'small_description', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ProductId' => 0, 'LanguageId' => 1, 'Name' => 2, 'Description' => 3, 'Tag' => 4, 'MetaTitle' => 5, 'MetaDescription' => 6, 'MetaKeyword' => 7, 'Newslatest' => 8, 'ShowNewslatest' => 9, 'SmallDescription' => 10, ),
        self::TYPE_CAMELNAME     => array('productId' => 0, 'languageId' => 1, 'name' => 2, 'description' => 3, 'tag' => 4, 'metaTitle' => 5, 'metaDescription' => 6, 'metaKeyword' => 7, 'newslatest' => 8, 'showNewslatest' => 9, 'smallDescription' => 10, ),
        self::TYPE_COLNAME       => array(OcProductDescriptionTableMap::COL_PRODUCT_ID => 0, OcProductDescriptionTableMap::COL_LANGUAGE_ID => 1, OcProductDescriptionTableMap::COL_NAME => 2, OcProductDescriptionTableMap::COL_DESCRIPTION => 3, OcProductDescriptionTableMap::COL_TAG => 4, OcProductDescriptionTableMap::COL_META_TITLE => 5, OcProductDescriptionTableMap::COL_META_DESCRIPTION => 6, OcProductDescriptionTableMap::COL_META_KEYWORD => 7, OcProductDescriptionTableMap::COL_NEWSLATEST => 8, OcProductDescriptionTableMap::COL_SHOW_NEWSLATEST => 9, OcProductDescriptionTableMap::COL_SMALL_DESCRIPTION => 10, ),
        self::TYPE_FIELDNAME     => array('product_id' => 0, 'language_id' => 1, 'name' => 2, 'description' => 3, 'tag' => 4, 'meta_title' => 5, 'meta_description' => 6, 'meta_keyword' => 7, 'newslatest' => 8, 'show_newslatest' => 9, 'small_description' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('oc_product_description');
        $this->setPhpName('OcProductDescription');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcProductDescription');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addPrimaryKey('language_id', 'LanguageId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', true, null, null);
        $this->addColumn('tag', 'Tag', 'LONGVARCHAR', true, null, null);
        $this->addColumn('meta_title', 'MetaTitle', 'VARCHAR', true, 255, null);
        $this->addColumn('meta_description', 'MetaDescription', 'VARCHAR', true, 255, null);
        $this->addColumn('meta_keyword', 'MetaKeyword', 'VARCHAR', true, 255, null);
        $this->addColumn('newslatest', 'Newslatest', 'LONGVARCHAR', false, null, null);
        $this->addColumn('show_newslatest', 'ShowNewslatest', 'INTEGER', false, null, null);
        $this->addColumn('small_description', 'SmallDescription', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \OcProductDescription $obj A \OcProductDescription object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getProductId() || is_scalar($obj->getProductId()) || is_callable([$obj->getProductId(), '__toString']) ? (string) $obj->getProductId() : $obj->getProductId()), (null === $obj->getLanguageId() || is_scalar($obj->getLanguageId()) || is_callable([$obj->getLanguageId(), '__toString']) ? (string) $obj->getLanguageId() : $obj->getLanguageId())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \OcProductDescription object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \OcProductDescription) {
                $key = serialize([(null === $value->getProductId() || is_scalar($value->getProductId()) || is_callable([$value->getProductId(), '__toString']) ? (string) $value->getProductId() : $value->getProductId()), (null === $value->getLanguageId() || is_scalar($value->getLanguageId()) || is_callable([$value->getLanguageId(), '__toString']) ? (string) $value->getLanguageId() : $value->getLanguageId())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \OcProductDescription object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)])]);
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
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
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
        return $withPrefix ? OcProductDescriptionTableMap::CLASS_DEFAULT : OcProductDescriptionTableMap::OM_CLASS;
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
     * @return array           (OcProductDescription object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcProductDescriptionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcProductDescriptionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcProductDescriptionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcProductDescriptionTableMap::OM_CLASS;
            /** @var OcProductDescription $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcProductDescriptionTableMap::addInstanceToPool($obj, $key);
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
            $key = OcProductDescriptionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcProductDescriptionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcProductDescription $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcProductDescriptionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_LANGUAGE_ID);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_NAME);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_TAG);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_META_TITLE);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_META_DESCRIPTION);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_META_KEYWORD);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_NEWSLATEST);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_SHOW_NEWSLATEST);
            $criteria->addSelectColumn(OcProductDescriptionTableMap::COL_SMALL_DESCRIPTION);
        } else {
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.language_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.tag');
            $criteria->addSelectColumn($alias . '.meta_title');
            $criteria->addSelectColumn($alias . '.meta_description');
            $criteria->addSelectColumn($alias . '.meta_keyword');
            $criteria->addSelectColumn($alias . '.newslatest');
            $criteria->addSelectColumn($alias . '.show_newslatest');
            $criteria->addSelectColumn($alias . '.small_description');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcProductDescriptionTableMap::DATABASE_NAME)->getTable(OcProductDescriptionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcProductDescriptionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcProductDescriptionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcProductDescriptionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcProductDescription or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcProductDescription object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductDescriptionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcProductDescription) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcProductDescriptionTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(OcProductDescriptionTableMap::COL_PRODUCT_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(OcProductDescriptionTableMap::COL_LANGUAGE_ID, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = OcProductDescriptionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcProductDescriptionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcProductDescriptionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_product_description table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcProductDescriptionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcProductDescription or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcProductDescription object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductDescriptionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcProductDescription object
        }


        // Set the correct dbName
        $query = OcProductDescriptionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcProductDescriptionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcProductDescriptionTableMap::buildTableMap();
