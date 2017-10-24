<?php

namespace Map;

use \OcOrderOption;
use \OcOrderOptionQuery;
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
 * This class defines the structure of the 'oc_order_option' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcOrderOptionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcOrderOptionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_order_option';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcOrderOption';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcOrderOption';

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
     * the column name for the order_option_id field
     */
    const COL_ORDER_OPTION_ID = 'oc_order_option.order_option_id';

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'oc_order_option.order_id';

    /**
     * the column name for the order_product_id field
     */
    const COL_ORDER_PRODUCT_ID = 'oc_order_option.order_product_id';

    /**
     * the column name for the product_option_id field
     */
    const COL_PRODUCT_OPTION_ID = 'oc_order_option.product_option_id';

    /**
     * the column name for the product_option_value_id field
     */
    const COL_PRODUCT_OPTION_VALUE_ID = 'oc_order_option.product_option_value_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'oc_order_option.name';

    /**
     * the column name for the value field
     */
    const COL_VALUE = 'oc_order_option.value';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'oc_order_option.type';

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
        self::TYPE_PHPNAME       => array('OrderOptionId', 'OrderId', 'OrderProductId', 'ProductOptionId', 'ProductOptionValueId', 'Name', 'Value', 'Type', ),
        self::TYPE_CAMELNAME     => array('orderOptionId', 'orderId', 'orderProductId', 'productOptionId', 'productOptionValueId', 'name', 'value', 'type', ),
        self::TYPE_COLNAME       => array(OcOrderOptionTableMap::COL_ORDER_OPTION_ID, OcOrderOptionTableMap::COL_ORDER_ID, OcOrderOptionTableMap::COL_ORDER_PRODUCT_ID, OcOrderOptionTableMap::COL_PRODUCT_OPTION_ID, OcOrderOptionTableMap::COL_PRODUCT_OPTION_VALUE_ID, OcOrderOptionTableMap::COL_NAME, OcOrderOptionTableMap::COL_VALUE, OcOrderOptionTableMap::COL_TYPE, ),
        self::TYPE_FIELDNAME     => array('order_option_id', 'order_id', 'order_product_id', 'product_option_id', 'product_option_value_id', 'name', 'value', 'type', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('OrderOptionId' => 0, 'OrderId' => 1, 'OrderProductId' => 2, 'ProductOptionId' => 3, 'ProductOptionValueId' => 4, 'Name' => 5, 'Value' => 6, 'Type' => 7, ),
        self::TYPE_CAMELNAME     => array('orderOptionId' => 0, 'orderId' => 1, 'orderProductId' => 2, 'productOptionId' => 3, 'productOptionValueId' => 4, 'name' => 5, 'value' => 6, 'type' => 7, ),
        self::TYPE_COLNAME       => array(OcOrderOptionTableMap::COL_ORDER_OPTION_ID => 0, OcOrderOptionTableMap::COL_ORDER_ID => 1, OcOrderOptionTableMap::COL_ORDER_PRODUCT_ID => 2, OcOrderOptionTableMap::COL_PRODUCT_OPTION_ID => 3, OcOrderOptionTableMap::COL_PRODUCT_OPTION_VALUE_ID => 4, OcOrderOptionTableMap::COL_NAME => 5, OcOrderOptionTableMap::COL_VALUE => 6, OcOrderOptionTableMap::COL_TYPE => 7, ),
        self::TYPE_FIELDNAME     => array('order_option_id' => 0, 'order_id' => 1, 'order_product_id' => 2, 'product_option_id' => 3, 'product_option_value_id' => 4, 'name' => 5, 'value' => 6, 'type' => 7, ),
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
        $this->setName('oc_order_option');
        $this->setPhpName('OcOrderOption');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcOrderOption');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('order_option_id', 'OrderOptionId', 'INTEGER', true, null, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('order_product_id', 'OrderProductId', 'INTEGER', true, null, null);
        $this->addColumn('product_option_id', 'ProductOptionId', 'INTEGER', true, null, null);
        $this->addColumn('product_option_value_id', 'ProductOptionValueId', 'INTEGER', true, null, 0);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('value', 'Value', 'LONGVARCHAR', true, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 32, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderOptionId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderOptionId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderOptionId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderOptionId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderOptionId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderOptionId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('OrderOptionId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcOrderOptionTableMap::CLASS_DEFAULT : OcOrderOptionTableMap::OM_CLASS;
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
     * @return array           (OcOrderOption object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcOrderOptionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcOrderOptionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcOrderOptionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcOrderOptionTableMap::OM_CLASS;
            /** @var OcOrderOption $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcOrderOptionTableMap::addInstanceToPool($obj, $key);
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
            $key = OcOrderOptionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcOrderOptionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcOrderOption $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcOrderOptionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcOrderOptionTableMap::COL_ORDER_OPTION_ID);
            $criteria->addSelectColumn(OcOrderOptionTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OcOrderOptionTableMap::COL_ORDER_PRODUCT_ID);
            $criteria->addSelectColumn(OcOrderOptionTableMap::COL_PRODUCT_OPTION_ID);
            $criteria->addSelectColumn(OcOrderOptionTableMap::COL_PRODUCT_OPTION_VALUE_ID);
            $criteria->addSelectColumn(OcOrderOptionTableMap::COL_NAME);
            $criteria->addSelectColumn(OcOrderOptionTableMap::COL_VALUE);
            $criteria->addSelectColumn(OcOrderOptionTableMap::COL_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.order_option_id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.order_product_id');
            $criteria->addSelectColumn($alias . '.product_option_id');
            $criteria->addSelectColumn($alias . '.product_option_value_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.value');
            $criteria->addSelectColumn($alias . '.type');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcOrderOptionTableMap::DATABASE_NAME)->getTable(OcOrderOptionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcOrderOptionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcOrderOptionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcOrderOptionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcOrderOption or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcOrderOption object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderOptionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcOrderOption) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcOrderOptionTableMap::DATABASE_NAME);
            $criteria->add(OcOrderOptionTableMap::COL_ORDER_OPTION_ID, (array) $values, Criteria::IN);
        }

        $query = OcOrderOptionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcOrderOptionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcOrderOptionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_order_option table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcOrderOptionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcOrderOption or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcOrderOption object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderOptionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcOrderOption object
        }

        if ($criteria->containsKey(OcOrderOptionTableMap::COL_ORDER_OPTION_ID) && $criteria->keyContainsValue(OcOrderOptionTableMap::COL_ORDER_OPTION_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcOrderOptionTableMap::COL_ORDER_OPTION_ID.')');
        }


        // Set the correct dbName
        $query = OcOrderOptionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcOrderOptionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcOrderOptionTableMap::buildTableMap();
