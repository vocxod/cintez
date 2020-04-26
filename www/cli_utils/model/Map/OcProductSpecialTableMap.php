<?php

namespace Map;

use \OcProductSpecial;
use \OcProductSpecialQuery;
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
 * This class defines the structure of the 'oc_product_special' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcProductSpecialTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcProductSpecialTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_product_special';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcProductSpecial';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcProductSpecial';

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
     * the column name for the product_special_id field
     */
    const COL_PRODUCT_SPECIAL_ID = 'oc_product_special.product_special_id';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_product_special.product_id';

    /**
     * the column name for the customer_group_id field
     */
    const COL_CUSTOMER_GROUP_ID = 'oc_product_special.customer_group_id';

    /**
     * the column name for the priority field
     */
    const COL_PRIORITY = 'oc_product_special.priority';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'oc_product_special.price';

    /**
     * the column name for the date_start field
     */
    const COL_DATE_START = 'oc_product_special.date_start';

    /**
     * the column name for the date_end field
     */
    const COL_DATE_END = 'oc_product_special.date_end';

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
        self::TYPE_PHPNAME       => array('ProductSpecialId', 'ProductId', 'CustomerGroupId', 'Priority', 'Price', 'DateStart', 'DateEnd', ),
        self::TYPE_CAMELNAME     => array('productSpecialId', 'productId', 'customerGroupId', 'priority', 'price', 'dateStart', 'dateEnd', ),
        self::TYPE_COLNAME       => array(OcProductSpecialTableMap::COL_PRODUCT_SPECIAL_ID, OcProductSpecialTableMap::COL_PRODUCT_ID, OcProductSpecialTableMap::COL_CUSTOMER_GROUP_ID, OcProductSpecialTableMap::COL_PRIORITY, OcProductSpecialTableMap::COL_PRICE, OcProductSpecialTableMap::COL_DATE_START, OcProductSpecialTableMap::COL_DATE_END, ),
        self::TYPE_FIELDNAME     => array('product_special_id', 'product_id', 'customer_group_id', 'priority', 'price', 'date_start', 'date_end', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ProductSpecialId' => 0, 'ProductId' => 1, 'CustomerGroupId' => 2, 'Priority' => 3, 'Price' => 4, 'DateStart' => 5, 'DateEnd' => 6, ),
        self::TYPE_CAMELNAME     => array('productSpecialId' => 0, 'productId' => 1, 'customerGroupId' => 2, 'priority' => 3, 'price' => 4, 'dateStart' => 5, 'dateEnd' => 6, ),
        self::TYPE_COLNAME       => array(OcProductSpecialTableMap::COL_PRODUCT_SPECIAL_ID => 0, OcProductSpecialTableMap::COL_PRODUCT_ID => 1, OcProductSpecialTableMap::COL_CUSTOMER_GROUP_ID => 2, OcProductSpecialTableMap::COL_PRIORITY => 3, OcProductSpecialTableMap::COL_PRICE => 4, OcProductSpecialTableMap::COL_DATE_START => 5, OcProductSpecialTableMap::COL_DATE_END => 6, ),
        self::TYPE_FIELDNAME     => array('product_special_id' => 0, 'product_id' => 1, 'customer_group_id' => 2, 'priority' => 3, 'price' => 4, 'date_start' => 5, 'date_end' => 6, ),
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
        $this->setName('oc_product_special');
        $this->setPhpName('OcProductSpecial');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcProductSpecial');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('product_special_id', 'ProductSpecialId', 'INTEGER', true, null, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('customer_group_id', 'CustomerGroupId', 'INTEGER', true, null, null);
        $this->addColumn('priority', 'Priority', 'INTEGER', true, 5, 1);
        $this->addColumn('price', 'Price', 'DECIMAL', true, 15, 0);
        $this->addColumn('date_start', 'DateStart', 'DATE', true, null, '0000-00-00');
        $this->addColumn('date_end', 'DateEnd', 'DATE', true, null, '0000-00-00');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductSpecialId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductSpecialId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductSpecialId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductSpecialId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductSpecialId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductSpecialId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ProductSpecialId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcProductSpecialTableMap::CLASS_DEFAULT : OcProductSpecialTableMap::OM_CLASS;
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
     * @return array           (OcProductSpecial object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcProductSpecialTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcProductSpecialTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcProductSpecialTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcProductSpecialTableMap::OM_CLASS;
            /** @var OcProductSpecial $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcProductSpecialTableMap::addInstanceToPool($obj, $key);
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
            $key = OcProductSpecialTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcProductSpecialTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcProductSpecial $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcProductSpecialTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcProductSpecialTableMap::COL_PRODUCT_SPECIAL_ID);
            $criteria->addSelectColumn(OcProductSpecialTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcProductSpecialTableMap::COL_CUSTOMER_GROUP_ID);
            $criteria->addSelectColumn(OcProductSpecialTableMap::COL_PRIORITY);
            $criteria->addSelectColumn(OcProductSpecialTableMap::COL_PRICE);
            $criteria->addSelectColumn(OcProductSpecialTableMap::COL_DATE_START);
            $criteria->addSelectColumn(OcProductSpecialTableMap::COL_DATE_END);
        } else {
            $criteria->addSelectColumn($alias . '.product_special_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.customer_group_id');
            $criteria->addSelectColumn($alias . '.priority');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.date_start');
            $criteria->addSelectColumn($alias . '.date_end');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcProductSpecialTableMap::DATABASE_NAME)->getTable(OcProductSpecialTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcProductSpecialTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcProductSpecialTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcProductSpecialTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcProductSpecial or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcProductSpecial object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductSpecialTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcProductSpecial) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcProductSpecialTableMap::DATABASE_NAME);
            $criteria->add(OcProductSpecialTableMap::COL_PRODUCT_SPECIAL_ID, (array) $values, Criteria::IN);
        }

        $query = OcProductSpecialQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcProductSpecialTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcProductSpecialTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_product_special table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcProductSpecialQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcProductSpecial or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcProductSpecial object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductSpecialTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcProductSpecial object
        }

        if ($criteria->containsKey(OcProductSpecialTableMap::COL_PRODUCT_SPECIAL_ID) && $criteria->keyContainsValue(OcProductSpecialTableMap::COL_PRODUCT_SPECIAL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcProductSpecialTableMap::COL_PRODUCT_SPECIAL_ID.')');
        }


        // Set the correct dbName
        $query = OcProductSpecialQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcProductSpecialTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcProductSpecialTableMap::buildTableMap();
