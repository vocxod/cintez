<?php

namespace Map;

use \OcCustomerSearch;
use \OcCustomerSearchQuery;
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
 * This class defines the structure of the 'oc_customer_search' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCustomerSearchTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCustomerSearchTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_customer_search';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCustomerSearch';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCustomerSearch';

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
     * the column name for the customer_search_id field
     */
    const COL_CUSTOMER_SEARCH_ID = 'oc_customer_search.customer_search_id';

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'oc_customer_search.store_id';

    /**
     * the column name for the language_id field
     */
    const COL_LANGUAGE_ID = 'oc_customer_search.language_id';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_customer_search.customer_id';

    /**
     * the column name for the keyword field
     */
    const COL_KEYWORD = 'oc_customer_search.keyword';

    /**
     * the column name for the category_id field
     */
    const COL_CATEGORY_ID = 'oc_customer_search.category_id';

    /**
     * the column name for the sub_category field
     */
    const COL_SUB_CATEGORY = 'oc_customer_search.sub_category';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'oc_customer_search.description';

    /**
     * the column name for the products field
     */
    const COL_PRODUCTS = 'oc_customer_search.products';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'oc_customer_search.ip';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_customer_search.date_added';

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
        self::TYPE_PHPNAME       => array('CustomerSearchId', 'StoreId', 'LanguageId', 'CustomerId', 'Keyword', 'CategoryId', 'SubCategory', 'Description', 'Products', 'Ip', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('customerSearchId', 'storeId', 'languageId', 'customerId', 'keyword', 'categoryId', 'subCategory', 'description', 'products', 'ip', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID, OcCustomerSearchTableMap::COL_STORE_ID, OcCustomerSearchTableMap::COL_LANGUAGE_ID, OcCustomerSearchTableMap::COL_CUSTOMER_ID, OcCustomerSearchTableMap::COL_KEYWORD, OcCustomerSearchTableMap::COL_CATEGORY_ID, OcCustomerSearchTableMap::COL_SUB_CATEGORY, OcCustomerSearchTableMap::COL_DESCRIPTION, OcCustomerSearchTableMap::COL_PRODUCTS, OcCustomerSearchTableMap::COL_IP, OcCustomerSearchTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('customer_search_id', 'store_id', 'language_id', 'customer_id', 'keyword', 'category_id', 'sub_category', 'description', 'products', 'ip', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CustomerSearchId' => 0, 'StoreId' => 1, 'LanguageId' => 2, 'CustomerId' => 3, 'Keyword' => 4, 'CategoryId' => 5, 'SubCategory' => 6, 'Description' => 7, 'Products' => 8, 'Ip' => 9, 'DateAdded' => 10, ),
        self::TYPE_CAMELNAME     => array('customerSearchId' => 0, 'storeId' => 1, 'languageId' => 2, 'customerId' => 3, 'keyword' => 4, 'categoryId' => 5, 'subCategory' => 6, 'description' => 7, 'products' => 8, 'ip' => 9, 'dateAdded' => 10, ),
        self::TYPE_COLNAME       => array(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID => 0, OcCustomerSearchTableMap::COL_STORE_ID => 1, OcCustomerSearchTableMap::COL_LANGUAGE_ID => 2, OcCustomerSearchTableMap::COL_CUSTOMER_ID => 3, OcCustomerSearchTableMap::COL_KEYWORD => 4, OcCustomerSearchTableMap::COL_CATEGORY_ID => 5, OcCustomerSearchTableMap::COL_SUB_CATEGORY => 6, OcCustomerSearchTableMap::COL_DESCRIPTION => 7, OcCustomerSearchTableMap::COL_PRODUCTS => 8, OcCustomerSearchTableMap::COL_IP => 9, OcCustomerSearchTableMap::COL_DATE_ADDED => 10, ),
        self::TYPE_FIELDNAME     => array('customer_search_id' => 0, 'store_id' => 1, 'language_id' => 2, 'customer_id' => 3, 'keyword' => 4, 'category_id' => 5, 'sub_category' => 6, 'description' => 7, 'products' => 8, 'ip' => 9, 'date_added' => 10, ),
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
        $this->setName('oc_customer_search');
        $this->setPhpName('OcCustomerSearch');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCustomerSearch');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('customer_search_id', 'CustomerSearchId', 'INTEGER', true, null, null);
        $this->addColumn('store_id', 'StoreId', 'INTEGER', true, null, null);
        $this->addColumn('language_id', 'LanguageId', 'INTEGER', true, null, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('keyword', 'Keyword', 'VARCHAR', true, 255, null);
        $this->addColumn('category_id', 'CategoryId', 'INTEGER', false, null, null);
        $this->addColumn('sub_category', 'SubCategory', 'BOOLEAN', true, 1, null);
        $this->addColumn('description', 'Description', 'BOOLEAN', true, 1, null);
        $this->addColumn('products', 'Products', 'INTEGER', true, null, null);
        $this->addColumn('ip', 'Ip', 'VARCHAR', true, 40, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerSearchId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerSearchId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerSearchId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerSearchId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerSearchId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerSearchId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CustomerSearchId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcCustomerSearchTableMap::CLASS_DEFAULT : OcCustomerSearchTableMap::OM_CLASS;
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
     * @return array           (OcCustomerSearch object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCustomerSearchTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCustomerSearchTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCustomerSearchTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCustomerSearchTableMap::OM_CLASS;
            /** @var OcCustomerSearch $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCustomerSearchTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCustomerSearchTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCustomerSearchTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCustomerSearch $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCustomerSearchTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_LANGUAGE_ID);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_KEYWORD);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_CATEGORY_ID);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_SUB_CATEGORY);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_PRODUCTS);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_IP);
            $criteria->addSelectColumn(OcCustomerSearchTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.customer_search_id');
            $criteria->addSelectColumn($alias . '.store_id');
            $criteria->addSelectColumn($alias . '.language_id');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.keyword');
            $criteria->addSelectColumn($alias . '.category_id');
            $criteria->addSelectColumn($alias . '.sub_category');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.products');
            $criteria->addSelectColumn($alias . '.ip');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCustomerSearchTableMap::DATABASE_NAME)->getTable(OcCustomerSearchTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCustomerSearchTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCustomerSearchTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCustomerSearchTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCustomerSearch or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCustomerSearch object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerSearchTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCustomerSearch) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCustomerSearchTableMap::DATABASE_NAME);
            $criteria->add(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID, (array) $values, Criteria::IN);
        }

        $query = OcCustomerSearchQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCustomerSearchTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCustomerSearchTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_customer_search table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCustomerSearchQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCustomerSearch or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCustomerSearch object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerSearchTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCustomerSearch object
        }

        if ($criteria->containsKey(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID) && $criteria->keyContainsValue(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID.')');
        }


        // Set the correct dbName
        $query = OcCustomerSearchQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCustomerSearchTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCustomerSearchTableMap::buildTableMap();