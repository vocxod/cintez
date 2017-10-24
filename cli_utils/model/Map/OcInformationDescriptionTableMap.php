<?php

namespace Map;

use \OcInformationDescription;
use \OcInformationDescriptionQuery;
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
 * This class defines the structure of the 'oc_information_description' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcInformationDescriptionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcInformationDescriptionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_information_description';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcInformationDescription';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcInformationDescription';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the information_id field
     */
    const COL_INFORMATION_ID = 'oc_information_description.information_id';

    /**
     * the column name for the language_id field
     */
    const COL_LANGUAGE_ID = 'oc_information_description.language_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'oc_information_description.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'oc_information_description.description';

    /**
     * the column name for the meta_title field
     */
    const COL_META_TITLE = 'oc_information_description.meta_title';

    /**
     * the column name for the meta_description field
     */
    const COL_META_DESCRIPTION = 'oc_information_description.meta_description';

    /**
     * the column name for the meta_keyword field
     */
    const COL_META_KEYWORD = 'oc_information_description.meta_keyword';

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
        self::TYPE_PHPNAME       => array('InformationId', 'LanguageId', 'Title', 'Description', 'MetaTitle', 'MetaDescription', 'MetaKeyword', ),
        self::TYPE_CAMELNAME     => array('informationId', 'languageId', 'title', 'description', 'metaTitle', 'metaDescription', 'metaKeyword', ),
        self::TYPE_COLNAME       => array(OcInformationDescriptionTableMap::COL_INFORMATION_ID, OcInformationDescriptionTableMap::COL_LANGUAGE_ID, OcInformationDescriptionTableMap::COL_TITLE, OcInformationDescriptionTableMap::COL_DESCRIPTION, OcInformationDescriptionTableMap::COL_META_TITLE, OcInformationDescriptionTableMap::COL_META_DESCRIPTION, OcInformationDescriptionTableMap::COL_META_KEYWORD, ),
        self::TYPE_FIELDNAME     => array('information_id', 'language_id', 'title', 'description', 'meta_title', 'meta_description', 'meta_keyword', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('InformationId' => 0, 'LanguageId' => 1, 'Title' => 2, 'Description' => 3, 'MetaTitle' => 4, 'MetaDescription' => 5, 'MetaKeyword' => 6, ),
        self::TYPE_CAMELNAME     => array('informationId' => 0, 'languageId' => 1, 'title' => 2, 'description' => 3, 'metaTitle' => 4, 'metaDescription' => 5, 'metaKeyword' => 6, ),
        self::TYPE_COLNAME       => array(OcInformationDescriptionTableMap::COL_INFORMATION_ID => 0, OcInformationDescriptionTableMap::COL_LANGUAGE_ID => 1, OcInformationDescriptionTableMap::COL_TITLE => 2, OcInformationDescriptionTableMap::COL_DESCRIPTION => 3, OcInformationDescriptionTableMap::COL_META_TITLE => 4, OcInformationDescriptionTableMap::COL_META_DESCRIPTION => 5, OcInformationDescriptionTableMap::COL_META_KEYWORD => 6, ),
        self::TYPE_FIELDNAME     => array('information_id' => 0, 'language_id' => 1, 'title' => 2, 'description' => 3, 'meta_title' => 4, 'meta_description' => 5, 'meta_keyword' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('oc_information_description');
        $this->setPhpName('OcInformationDescription');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcInformationDescription');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('information_id', 'InformationId', 'INTEGER', true, null, null);
        $this->addPrimaryKey('language_id', 'LanguageId', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 64, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', true, null, null);
        $this->addColumn('meta_title', 'MetaTitle', 'VARCHAR', true, 255, null);
        $this->addColumn('meta_description', 'MetaDescription', 'VARCHAR', true, 255, null);
        $this->addColumn('meta_keyword', 'MetaKeyword', 'VARCHAR', true, 255, null);
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
     * @param \OcInformationDescription $obj A \OcInformationDescription object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getInformationId() || is_scalar($obj->getInformationId()) || is_callable([$obj->getInformationId(), '__toString']) ? (string) $obj->getInformationId() : $obj->getInformationId()), (null === $obj->getLanguageId() || is_scalar($obj->getLanguageId()) || is_callable([$obj->getLanguageId(), '__toString']) ? (string) $obj->getLanguageId() : $obj->getLanguageId())]);
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
     * @param mixed $value A \OcInformationDescription object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \OcInformationDescription) {
                $key = serialize([(null === $value->getInformationId() || is_scalar($value->getInformationId()) || is_callable([$value->getInformationId(), '__toString']) ? (string) $value->getInformationId() : $value->getInformationId()), (null === $value->getLanguageId() || is_scalar($value->getLanguageId()) || is_callable([$value->getLanguageId(), '__toString']) ? (string) $value->getLanguageId() : $value->getLanguageId())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \OcInformationDescription object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('LanguageId', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('InformationId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcInformationDescriptionTableMap::CLASS_DEFAULT : OcInformationDescriptionTableMap::OM_CLASS;
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
     * @return array           (OcInformationDescription object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcInformationDescriptionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcInformationDescriptionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcInformationDescriptionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcInformationDescriptionTableMap::OM_CLASS;
            /** @var OcInformationDescription $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcInformationDescriptionTableMap::addInstanceToPool($obj, $key);
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
            $key = OcInformationDescriptionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcInformationDescriptionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcInformationDescription $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcInformationDescriptionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcInformationDescriptionTableMap::COL_INFORMATION_ID);
            $criteria->addSelectColumn(OcInformationDescriptionTableMap::COL_LANGUAGE_ID);
            $criteria->addSelectColumn(OcInformationDescriptionTableMap::COL_TITLE);
            $criteria->addSelectColumn(OcInformationDescriptionTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(OcInformationDescriptionTableMap::COL_META_TITLE);
            $criteria->addSelectColumn(OcInformationDescriptionTableMap::COL_META_DESCRIPTION);
            $criteria->addSelectColumn(OcInformationDescriptionTableMap::COL_META_KEYWORD);
        } else {
            $criteria->addSelectColumn($alias . '.information_id');
            $criteria->addSelectColumn($alias . '.language_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.meta_title');
            $criteria->addSelectColumn($alias . '.meta_description');
            $criteria->addSelectColumn($alias . '.meta_keyword');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcInformationDescriptionTableMap::DATABASE_NAME)->getTable(OcInformationDescriptionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcInformationDescriptionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcInformationDescriptionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcInformationDescriptionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcInformationDescription or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcInformationDescription object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationDescriptionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcInformationDescription) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcInformationDescriptionTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(OcInformationDescriptionTableMap::COL_INFORMATION_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(OcInformationDescriptionTableMap::COL_LANGUAGE_ID, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = OcInformationDescriptionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcInformationDescriptionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcInformationDescriptionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_information_description table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcInformationDescriptionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcInformationDescription or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcInformationDescription object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationDescriptionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcInformationDescription object
        }


        // Set the correct dbName
        $query = OcInformationDescriptionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcInformationDescriptionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcInformationDescriptionTableMap::buildTableMap();
