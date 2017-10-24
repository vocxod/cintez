<?php

namespace Map;

use \OcBannerImage;
use \OcBannerImageQuery;
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
 * This class defines the structure of the 'oc_banner_image' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcBannerImageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcBannerImageTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_banner_image';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcBannerImage';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcBannerImage';

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
     * the column name for the banner_image_id field
     */
    const COL_BANNER_IMAGE_ID = 'oc_banner_image.banner_image_id';

    /**
     * the column name for the banner_id field
     */
    const COL_BANNER_ID = 'oc_banner_image.banner_id';

    /**
     * the column name for the language_id field
     */
    const COL_LANGUAGE_ID = 'oc_banner_image.language_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'oc_banner_image.title';

    /**
     * the column name for the link field
     */
    const COL_LINK = 'oc_banner_image.link';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'oc_banner_image.image';

    /**
     * the column name for the sort_order field
     */
    const COL_SORT_ORDER = 'oc_banner_image.sort_order';

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
        self::TYPE_PHPNAME       => array('BannerImageId', 'BannerId', 'LanguageId', 'Title', 'Link', 'Image', 'SortOrder', ),
        self::TYPE_CAMELNAME     => array('bannerImageId', 'bannerId', 'languageId', 'title', 'link', 'image', 'sortOrder', ),
        self::TYPE_COLNAME       => array(OcBannerImageTableMap::COL_BANNER_IMAGE_ID, OcBannerImageTableMap::COL_BANNER_ID, OcBannerImageTableMap::COL_LANGUAGE_ID, OcBannerImageTableMap::COL_TITLE, OcBannerImageTableMap::COL_LINK, OcBannerImageTableMap::COL_IMAGE, OcBannerImageTableMap::COL_SORT_ORDER, ),
        self::TYPE_FIELDNAME     => array('banner_image_id', 'banner_id', 'language_id', 'title', 'link', 'image', 'sort_order', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('BannerImageId' => 0, 'BannerId' => 1, 'LanguageId' => 2, 'Title' => 3, 'Link' => 4, 'Image' => 5, 'SortOrder' => 6, ),
        self::TYPE_CAMELNAME     => array('bannerImageId' => 0, 'bannerId' => 1, 'languageId' => 2, 'title' => 3, 'link' => 4, 'image' => 5, 'sortOrder' => 6, ),
        self::TYPE_COLNAME       => array(OcBannerImageTableMap::COL_BANNER_IMAGE_ID => 0, OcBannerImageTableMap::COL_BANNER_ID => 1, OcBannerImageTableMap::COL_LANGUAGE_ID => 2, OcBannerImageTableMap::COL_TITLE => 3, OcBannerImageTableMap::COL_LINK => 4, OcBannerImageTableMap::COL_IMAGE => 5, OcBannerImageTableMap::COL_SORT_ORDER => 6, ),
        self::TYPE_FIELDNAME     => array('banner_image_id' => 0, 'banner_id' => 1, 'language_id' => 2, 'title' => 3, 'link' => 4, 'image' => 5, 'sort_order' => 6, ),
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
        $this->setName('oc_banner_image');
        $this->setPhpName('OcBannerImage');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcBannerImage');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('banner_image_id', 'BannerImageId', 'INTEGER', true, null, null);
        $this->addColumn('banner_id', 'BannerId', 'INTEGER', true, null, null);
        $this->addColumn('language_id', 'LanguageId', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 64, null);
        $this->addColumn('link', 'Link', 'VARCHAR', true, 255, null);
        $this->addColumn('image', 'Image', 'VARCHAR', true, 255, null);
        $this->addColumn('sort_order', 'SortOrder', 'INTEGER', true, 3, 0);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BannerImageId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BannerImageId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BannerImageId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BannerImageId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BannerImageId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BannerImageId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('BannerImageId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcBannerImageTableMap::CLASS_DEFAULT : OcBannerImageTableMap::OM_CLASS;
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
     * @return array           (OcBannerImage object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcBannerImageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcBannerImageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcBannerImageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcBannerImageTableMap::OM_CLASS;
            /** @var OcBannerImage $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcBannerImageTableMap::addInstanceToPool($obj, $key);
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
            $key = OcBannerImageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcBannerImageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcBannerImage $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcBannerImageTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcBannerImageTableMap::COL_BANNER_IMAGE_ID);
            $criteria->addSelectColumn(OcBannerImageTableMap::COL_BANNER_ID);
            $criteria->addSelectColumn(OcBannerImageTableMap::COL_LANGUAGE_ID);
            $criteria->addSelectColumn(OcBannerImageTableMap::COL_TITLE);
            $criteria->addSelectColumn(OcBannerImageTableMap::COL_LINK);
            $criteria->addSelectColumn(OcBannerImageTableMap::COL_IMAGE);
            $criteria->addSelectColumn(OcBannerImageTableMap::COL_SORT_ORDER);
        } else {
            $criteria->addSelectColumn($alias . '.banner_image_id');
            $criteria->addSelectColumn($alias . '.banner_id');
            $criteria->addSelectColumn($alias . '.language_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.link');
            $criteria->addSelectColumn($alias . '.image');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcBannerImageTableMap::DATABASE_NAME)->getTable(OcBannerImageTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcBannerImageTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcBannerImageTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcBannerImageTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcBannerImage or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcBannerImage object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcBannerImageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcBannerImage) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcBannerImageTableMap::DATABASE_NAME);
            $criteria->add(OcBannerImageTableMap::COL_BANNER_IMAGE_ID, (array) $values, Criteria::IN);
        }

        $query = OcBannerImageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcBannerImageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcBannerImageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_banner_image table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcBannerImageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcBannerImage or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcBannerImage object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcBannerImageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcBannerImage object
        }

        if ($criteria->containsKey(OcBannerImageTableMap::COL_BANNER_IMAGE_ID) && $criteria->keyContainsValue(OcBannerImageTableMap::COL_BANNER_IMAGE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcBannerImageTableMap::COL_BANNER_IMAGE_ID.')');
        }


        // Set the correct dbName
        $query = OcBannerImageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcBannerImageTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcBannerImageTableMap::buildTableMap();
