<?php

namespace Map;

use \OcProductOptionValue;
use \OcProductOptionValueQuery;
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
 * This class defines the structure of the 'oc_product_option_value' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcProductOptionValueTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcProductOptionValueTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_product_option_value';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcProductOptionValue';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcProductOptionValue';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the product_option_value_id field
     */
    const COL_PRODUCT_OPTION_VALUE_ID = 'oc_product_option_value.product_option_value_id';

    /**
     * the column name for the product_option_id field
     */
    const COL_PRODUCT_OPTION_ID = 'oc_product_option_value.product_option_id';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_product_option_value.product_id';

    /**
     * the column name for the option_id field
     */
    const COL_OPTION_ID = 'oc_product_option_value.option_id';

    /**
     * the column name for the option_value_id field
     */
    const COL_OPTION_VALUE_ID = 'oc_product_option_value.option_value_id';

    /**
     * the column name for the quantity field
     */
    const COL_QUANTITY = 'oc_product_option_value.quantity';

    /**
     * the column name for the subtract field
     */
    const COL_SUBTRACT = 'oc_product_option_value.subtract';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'oc_product_option_value.price';

    /**
     * the column name for the price_prefix field
     */
    const COL_PRICE_PREFIX = 'oc_product_option_value.price_prefix';

    /**
     * the column name for the points field
     */
    const COL_POINTS = 'oc_product_option_value.points';

    /**
     * the column name for the points_prefix field
     */
    const COL_POINTS_PREFIX = 'oc_product_option_value.points_prefix';

    /**
     * the column name for the weight field
     */
    const COL_WEIGHT = 'oc_product_option_value.weight';

    /**
     * the column name for the weight_prefix field
     */
    const COL_WEIGHT_PREFIX = 'oc_product_option_value.weight_prefix';

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
        self::TYPE_PHPNAME       => array('ProductOptionValueId', 'ProductOptionId', 'ProductId', 'OptionId', 'OptionValueId', 'Quantity', 'Subtract', 'Price', 'PricePrefix', 'Points', 'PointsPrefix', 'Weight', 'WeightPrefix', ),
        self::TYPE_CAMELNAME     => array('productOptionValueId', 'productOptionId', 'productId', 'optionId', 'optionValueId', 'quantity', 'subtract', 'price', 'pricePrefix', 'points', 'pointsPrefix', 'weight', 'weightPrefix', ),
        self::TYPE_COLNAME       => array(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID, OcProductOptionValueTableMap::COL_PRODUCT_OPTION_ID, OcProductOptionValueTableMap::COL_PRODUCT_ID, OcProductOptionValueTableMap::COL_OPTION_ID, OcProductOptionValueTableMap::COL_OPTION_VALUE_ID, OcProductOptionValueTableMap::COL_QUANTITY, OcProductOptionValueTableMap::COL_SUBTRACT, OcProductOptionValueTableMap::COL_PRICE, OcProductOptionValueTableMap::COL_PRICE_PREFIX, OcProductOptionValueTableMap::COL_POINTS, OcProductOptionValueTableMap::COL_POINTS_PREFIX, OcProductOptionValueTableMap::COL_WEIGHT, OcProductOptionValueTableMap::COL_WEIGHT_PREFIX, ),
        self::TYPE_FIELDNAME     => array('product_option_value_id', 'product_option_id', 'product_id', 'option_id', 'option_value_id', 'quantity', 'subtract', 'price', 'price_prefix', 'points', 'points_prefix', 'weight', 'weight_prefix', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ProductOptionValueId' => 0, 'ProductOptionId' => 1, 'ProductId' => 2, 'OptionId' => 3, 'OptionValueId' => 4, 'Quantity' => 5, 'Subtract' => 6, 'Price' => 7, 'PricePrefix' => 8, 'Points' => 9, 'PointsPrefix' => 10, 'Weight' => 11, 'WeightPrefix' => 12, ),
        self::TYPE_CAMELNAME     => array('productOptionValueId' => 0, 'productOptionId' => 1, 'productId' => 2, 'optionId' => 3, 'optionValueId' => 4, 'quantity' => 5, 'subtract' => 6, 'price' => 7, 'pricePrefix' => 8, 'points' => 9, 'pointsPrefix' => 10, 'weight' => 11, 'weightPrefix' => 12, ),
        self::TYPE_COLNAME       => array(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID => 0, OcProductOptionValueTableMap::COL_PRODUCT_OPTION_ID => 1, OcProductOptionValueTableMap::COL_PRODUCT_ID => 2, OcProductOptionValueTableMap::COL_OPTION_ID => 3, OcProductOptionValueTableMap::COL_OPTION_VALUE_ID => 4, OcProductOptionValueTableMap::COL_QUANTITY => 5, OcProductOptionValueTableMap::COL_SUBTRACT => 6, OcProductOptionValueTableMap::COL_PRICE => 7, OcProductOptionValueTableMap::COL_PRICE_PREFIX => 8, OcProductOptionValueTableMap::COL_POINTS => 9, OcProductOptionValueTableMap::COL_POINTS_PREFIX => 10, OcProductOptionValueTableMap::COL_WEIGHT => 11, OcProductOptionValueTableMap::COL_WEIGHT_PREFIX => 12, ),
        self::TYPE_FIELDNAME     => array('product_option_value_id' => 0, 'product_option_id' => 1, 'product_id' => 2, 'option_id' => 3, 'option_value_id' => 4, 'quantity' => 5, 'subtract' => 6, 'price' => 7, 'price_prefix' => 8, 'points' => 9, 'points_prefix' => 10, 'weight' => 11, 'weight_prefix' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('oc_product_option_value');
        $this->setPhpName('OcProductOptionValue');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcProductOptionValue');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('product_option_value_id', 'ProductOptionValueId', 'INTEGER', true, null, null);
        $this->addColumn('product_option_id', 'ProductOptionId', 'INTEGER', true, null, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('option_id', 'OptionId', 'INTEGER', true, null, null);
        $this->addColumn('option_value_id', 'OptionValueId', 'INTEGER', true, null, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, 3, null);
        $this->addColumn('subtract', 'Subtract', 'BOOLEAN', true, 1, null);
        $this->addColumn('price', 'Price', 'DECIMAL', true, 15, null);
        $this->addColumn('price_prefix', 'PricePrefix', 'VARCHAR', true, 1, null);
        $this->addColumn('points', 'Points', 'INTEGER', true, 8, null);
        $this->addColumn('points_prefix', 'PointsPrefix', 'VARCHAR', true, 1, null);
        $this->addColumn('weight', 'Weight', 'DECIMAL', true, 15, null);
        $this->addColumn('weight_prefix', 'WeightPrefix', 'VARCHAR', true, 1, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductOptionValueId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductOptionValueId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductOptionValueId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductOptionValueId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductOptionValueId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductOptionValueId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ProductOptionValueId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcProductOptionValueTableMap::CLASS_DEFAULT : OcProductOptionValueTableMap::OM_CLASS;
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
     * @return array           (OcProductOptionValue object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcProductOptionValueTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcProductOptionValueTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcProductOptionValueTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcProductOptionValueTableMap::OM_CLASS;
            /** @var OcProductOptionValue $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcProductOptionValueTableMap::addInstanceToPool($obj, $key);
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
            $key = OcProductOptionValueTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcProductOptionValueTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcProductOptionValue $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcProductOptionValueTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_ID);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_OPTION_ID);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_OPTION_VALUE_ID);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_SUBTRACT);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_PRICE);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_PRICE_PREFIX);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_POINTS);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_POINTS_PREFIX);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_WEIGHT);
            $criteria->addSelectColumn(OcProductOptionValueTableMap::COL_WEIGHT_PREFIX);
        } else {
            $criteria->addSelectColumn($alias . '.product_option_value_id');
            $criteria->addSelectColumn($alias . '.product_option_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.option_id');
            $criteria->addSelectColumn($alias . '.option_value_id');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.subtract');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.price_prefix');
            $criteria->addSelectColumn($alias . '.points');
            $criteria->addSelectColumn($alias . '.points_prefix');
            $criteria->addSelectColumn($alias . '.weight');
            $criteria->addSelectColumn($alias . '.weight_prefix');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcProductOptionValueTableMap::DATABASE_NAME)->getTable(OcProductOptionValueTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcProductOptionValueTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcProductOptionValueTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcProductOptionValueTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcProductOptionValue or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcProductOptionValue object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductOptionValueTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcProductOptionValue) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcProductOptionValueTableMap::DATABASE_NAME);
            $criteria->add(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID, (array) $values, Criteria::IN);
        }

        $query = OcProductOptionValueQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcProductOptionValueTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcProductOptionValueTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_product_option_value table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcProductOptionValueQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcProductOptionValue or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcProductOptionValue object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductOptionValueTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcProductOptionValue object
        }

        if ($criteria->containsKey(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID) && $criteria->keyContainsValue(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID.')');
        }


        // Set the correct dbName
        $query = OcProductOptionValueQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcProductOptionValueTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcProductOptionValueTableMap::buildTableMap();
