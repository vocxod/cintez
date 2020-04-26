<?php

namespace Map;

use \OcCart;
use \OcCartQuery;
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
 * This class defines the structure of the 'oc_cart' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCartTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCartTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_cart';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCart';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCart';

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
     * the column name for the cart_id field
     */
    const COL_CART_ID = 'oc_cart.cart_id';

    /**
     * the column name for the api_id field
     */
    const COL_API_ID = 'oc_cart.api_id';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_cart.customer_id';

    /**
     * the column name for the session_id field
     */
    const COL_SESSION_ID = 'oc_cart.session_id';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_cart.product_id';

    /**
     * the column name for the recurring_id field
     */
    const COL_RECURRING_ID = 'oc_cart.recurring_id';

    /**
     * the column name for the option field
     */
    const COL_OPTION = 'oc_cart.option';

    /**
     * the column name for the quantity field
     */
    const COL_QUANTITY = 'oc_cart.quantity';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_cart.date_added';

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
        self::TYPE_PHPNAME       => array('CartId', 'ApiId', 'CustomerId', 'SessionId', 'ProductId', 'RecurringId', 'Option', 'Quantity', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('cartId', 'apiId', 'customerId', 'sessionId', 'productId', 'recurringId', 'option', 'quantity', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcCartTableMap::COL_CART_ID, OcCartTableMap::COL_API_ID, OcCartTableMap::COL_CUSTOMER_ID, OcCartTableMap::COL_SESSION_ID, OcCartTableMap::COL_PRODUCT_ID, OcCartTableMap::COL_RECURRING_ID, OcCartTableMap::COL_OPTION, OcCartTableMap::COL_QUANTITY, OcCartTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('cart_id', 'api_id', 'customer_id', 'session_id', 'product_id', 'recurring_id', 'option', 'quantity', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CartId' => 0, 'ApiId' => 1, 'CustomerId' => 2, 'SessionId' => 3, 'ProductId' => 4, 'RecurringId' => 5, 'Option' => 6, 'Quantity' => 7, 'DateAdded' => 8, ),
        self::TYPE_CAMELNAME     => array('cartId' => 0, 'apiId' => 1, 'customerId' => 2, 'sessionId' => 3, 'productId' => 4, 'recurringId' => 5, 'option' => 6, 'quantity' => 7, 'dateAdded' => 8, ),
        self::TYPE_COLNAME       => array(OcCartTableMap::COL_CART_ID => 0, OcCartTableMap::COL_API_ID => 1, OcCartTableMap::COL_CUSTOMER_ID => 2, OcCartTableMap::COL_SESSION_ID => 3, OcCartTableMap::COL_PRODUCT_ID => 4, OcCartTableMap::COL_RECURRING_ID => 5, OcCartTableMap::COL_OPTION => 6, OcCartTableMap::COL_QUANTITY => 7, OcCartTableMap::COL_DATE_ADDED => 8, ),
        self::TYPE_FIELDNAME     => array('cart_id' => 0, 'api_id' => 1, 'customer_id' => 2, 'session_id' => 3, 'product_id' => 4, 'recurring_id' => 5, 'option' => 6, 'quantity' => 7, 'date_added' => 8, ),
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
        $this->setName('oc_cart');
        $this->setPhpName('OcCart');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCart');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('cart_id', 'CartId', 'INTEGER', true, null, null);
        $this->addColumn('api_id', 'ApiId', 'INTEGER', true, null, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('session_id', 'SessionId', 'VARCHAR', true, 32, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('recurring_id', 'RecurringId', 'INTEGER', true, null, null);
        $this->addColumn('option', 'Option', 'LONGVARCHAR', true, null, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, 5, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CartId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CartId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CartId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CartId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CartId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CartId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CartId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcCartTableMap::CLASS_DEFAULT : OcCartTableMap::OM_CLASS;
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
     * @return array           (OcCart object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCartTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCartTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCartTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCartTableMap::OM_CLASS;
            /** @var OcCart $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCartTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCartTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCartTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCart $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCartTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCartTableMap::COL_CART_ID);
            $criteria->addSelectColumn(OcCartTableMap::COL_API_ID);
            $criteria->addSelectColumn(OcCartTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcCartTableMap::COL_SESSION_ID);
            $criteria->addSelectColumn(OcCartTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcCartTableMap::COL_RECURRING_ID);
            $criteria->addSelectColumn(OcCartTableMap::COL_OPTION);
            $criteria->addSelectColumn(OcCartTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(OcCartTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.cart_id');
            $criteria->addSelectColumn($alias . '.api_id');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.session_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.recurring_id');
            $criteria->addSelectColumn($alias . '.option');
            $criteria->addSelectColumn($alias . '.quantity');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCartTableMap::DATABASE_NAME)->getTable(OcCartTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCartTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCartTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCartTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCart or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCart object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCartTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCart) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCartTableMap::DATABASE_NAME);
            $criteria->add(OcCartTableMap::COL_CART_ID, (array) $values, Criteria::IN);
        }

        $query = OcCartQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCartTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCartTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_cart table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCartQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCart or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCart object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCartTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCart object
        }

        if ($criteria->containsKey(OcCartTableMap::COL_CART_ID) && $criteria->keyContainsValue(OcCartTableMap::COL_CART_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcCartTableMap::COL_CART_ID.')');
        }


        // Set the correct dbName
        $query = OcCartQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCartTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCartTableMap::buildTableMap();
