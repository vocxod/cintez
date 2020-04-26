<?php

namespace Map;

use \OcOrderProduct;
use \OcOrderProductQuery;
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
 * This class defines the structure of the 'oc_order_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcOrderProductTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcOrderProductTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_order_product';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcOrderProduct';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcOrderProduct';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the order_product_id field
     */
    const COL_ORDER_PRODUCT_ID = 'oc_order_product.order_product_id';

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'oc_order_product.order_id';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_order_product.product_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'oc_order_product.name';

    /**
     * the column name for the model field
     */
    const COL_MODEL = 'oc_order_product.model';

    /**
     * the column name for the quantity field
     */
    const COL_QUANTITY = 'oc_order_product.quantity';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'oc_order_product.price';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'oc_order_product.total';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'oc_order_product.tax';

    /**
     * the column name for the reward field
     */
    const COL_REWARD = 'oc_order_product.reward';

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
        self::TYPE_PHPNAME       => array('OrderProductId', 'OrderId', 'ProductId', 'Name', 'Model', 'Quantity', 'Price', 'Total', 'Tax', 'Reward', ),
        self::TYPE_CAMELNAME     => array('orderProductId', 'orderId', 'productId', 'name', 'model', 'quantity', 'price', 'total', 'tax', 'reward', ),
        self::TYPE_COLNAME       => array(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID, OcOrderProductTableMap::COL_ORDER_ID, OcOrderProductTableMap::COL_PRODUCT_ID, OcOrderProductTableMap::COL_NAME, OcOrderProductTableMap::COL_MODEL, OcOrderProductTableMap::COL_QUANTITY, OcOrderProductTableMap::COL_PRICE, OcOrderProductTableMap::COL_TOTAL, OcOrderProductTableMap::COL_TAX, OcOrderProductTableMap::COL_REWARD, ),
        self::TYPE_FIELDNAME     => array('order_product_id', 'order_id', 'product_id', 'name', 'model', 'quantity', 'price', 'total', 'tax', 'reward', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('OrderProductId' => 0, 'OrderId' => 1, 'ProductId' => 2, 'Name' => 3, 'Model' => 4, 'Quantity' => 5, 'Price' => 6, 'Total' => 7, 'Tax' => 8, 'Reward' => 9, ),
        self::TYPE_CAMELNAME     => array('orderProductId' => 0, 'orderId' => 1, 'productId' => 2, 'name' => 3, 'model' => 4, 'quantity' => 5, 'price' => 6, 'total' => 7, 'tax' => 8, 'reward' => 9, ),
        self::TYPE_COLNAME       => array(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID => 0, OcOrderProductTableMap::COL_ORDER_ID => 1, OcOrderProductTableMap::COL_PRODUCT_ID => 2, OcOrderProductTableMap::COL_NAME => 3, OcOrderProductTableMap::COL_MODEL => 4, OcOrderProductTableMap::COL_QUANTITY => 5, OcOrderProductTableMap::COL_PRICE => 6, OcOrderProductTableMap::COL_TOTAL => 7, OcOrderProductTableMap::COL_TAX => 8, OcOrderProductTableMap::COL_REWARD => 9, ),
        self::TYPE_FIELDNAME     => array('order_product_id' => 0, 'order_id' => 1, 'product_id' => 2, 'name' => 3, 'model' => 4, 'quantity' => 5, 'price' => 6, 'total' => 7, 'tax' => 8, 'reward' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('oc_order_product');
        $this->setPhpName('OcOrderProduct');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcOrderProduct');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('order_product_id', 'OrderProductId', 'INTEGER', true, null, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('model', 'Model', 'VARCHAR', true, 64, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, 4, null);
        $this->addColumn('price', 'Price', 'DECIMAL', true, 15, 0);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, 0);
        $this->addColumn('tax', 'Tax', 'DECIMAL', true, 15, 0);
        $this->addColumn('reward', 'Reward', 'INTEGER', true, 8, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderProductId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderProductId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderProductId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderProductId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderProductId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderProductId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('OrderProductId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcOrderProductTableMap::CLASS_DEFAULT : OcOrderProductTableMap::OM_CLASS;
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
     * @return array           (OcOrderProduct object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcOrderProductTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcOrderProductTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcOrderProductTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcOrderProductTableMap::OM_CLASS;
            /** @var OcOrderProduct $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcOrderProductTableMap::addInstanceToPool($obj, $key);
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
            $key = OcOrderProductTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcOrderProductTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcOrderProduct $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcOrderProductTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_NAME);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_MODEL);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_PRICE);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_TOTAL);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_TAX);
            $criteria->addSelectColumn(OcOrderProductTableMap::COL_REWARD);
        } else {
            $criteria->addSelectColumn($alias . '.order_product_id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.model');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tax');
            $criteria->addSelectColumn($alias . '.reward');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcOrderProductTableMap::DATABASE_NAME)->getTable(OcOrderProductTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcOrderProductTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcOrderProductTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcOrderProductTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcOrderProduct or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcOrderProduct object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderProductTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcOrderProduct) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcOrderProductTableMap::DATABASE_NAME);
            $criteria->add(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID, (array) $values, Criteria::IN);
        }

        $query = OcOrderProductQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcOrderProductTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcOrderProductTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_order_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcOrderProductQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcOrderProduct or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcOrderProduct object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderProductTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcOrderProduct object
        }

        if ($criteria->containsKey(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID) && $criteria->keyContainsValue(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcOrderProductTableMap::COL_ORDER_PRODUCT_ID.')');
        }


        // Set the correct dbName
        $query = OcOrderProductQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcOrderProductTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcOrderProductTableMap::buildTableMap();
