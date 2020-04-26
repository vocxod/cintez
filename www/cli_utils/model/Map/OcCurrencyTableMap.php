<?php

namespace Map;

use \OcCurrency;
use \OcCurrencyQuery;
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
 * This class defines the structure of the 'oc_currency' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCurrencyTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCurrencyTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_currency';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCurrency';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCurrency';

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
     * the column name for the currency_id field
     */
    const COL_CURRENCY_ID = 'oc_currency.currency_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'oc_currency.title';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_currency.code';

    /**
     * the column name for the symbol_left field
     */
    const COL_SYMBOL_LEFT = 'oc_currency.symbol_left';

    /**
     * the column name for the symbol_right field
     */
    const COL_SYMBOL_RIGHT = 'oc_currency.symbol_right';

    /**
     * the column name for the decimal_place field
     */
    const COL_DECIMAL_PLACE = 'oc_currency.decimal_place';

    /**
     * the column name for the value field
     */
    const COL_VALUE = 'oc_currency.value';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_currency.status';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'oc_currency.date_modified';

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
        self::TYPE_PHPNAME       => array('CurrencyId', 'Title', 'Code', 'SymbolLeft', 'SymbolRight', 'DecimalPlace', 'Value', 'Status', 'DateModified', ),
        self::TYPE_CAMELNAME     => array('currencyId', 'title', 'code', 'symbolLeft', 'symbolRight', 'decimalPlace', 'value', 'status', 'dateModified', ),
        self::TYPE_COLNAME       => array(OcCurrencyTableMap::COL_CURRENCY_ID, OcCurrencyTableMap::COL_TITLE, OcCurrencyTableMap::COL_CODE, OcCurrencyTableMap::COL_SYMBOL_LEFT, OcCurrencyTableMap::COL_SYMBOL_RIGHT, OcCurrencyTableMap::COL_DECIMAL_PLACE, OcCurrencyTableMap::COL_VALUE, OcCurrencyTableMap::COL_STATUS, OcCurrencyTableMap::COL_DATE_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('currency_id', 'title', 'code', 'symbol_left', 'symbol_right', 'decimal_place', 'value', 'status', 'date_modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CurrencyId' => 0, 'Title' => 1, 'Code' => 2, 'SymbolLeft' => 3, 'SymbolRight' => 4, 'DecimalPlace' => 5, 'Value' => 6, 'Status' => 7, 'DateModified' => 8, ),
        self::TYPE_CAMELNAME     => array('currencyId' => 0, 'title' => 1, 'code' => 2, 'symbolLeft' => 3, 'symbolRight' => 4, 'decimalPlace' => 5, 'value' => 6, 'status' => 7, 'dateModified' => 8, ),
        self::TYPE_COLNAME       => array(OcCurrencyTableMap::COL_CURRENCY_ID => 0, OcCurrencyTableMap::COL_TITLE => 1, OcCurrencyTableMap::COL_CODE => 2, OcCurrencyTableMap::COL_SYMBOL_LEFT => 3, OcCurrencyTableMap::COL_SYMBOL_RIGHT => 4, OcCurrencyTableMap::COL_DECIMAL_PLACE => 5, OcCurrencyTableMap::COL_VALUE => 6, OcCurrencyTableMap::COL_STATUS => 7, OcCurrencyTableMap::COL_DATE_MODIFIED => 8, ),
        self::TYPE_FIELDNAME     => array('currency_id' => 0, 'title' => 1, 'code' => 2, 'symbol_left' => 3, 'symbol_right' => 4, 'decimal_place' => 5, 'value' => 6, 'status' => 7, 'date_modified' => 8, ),
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
        $this->setName('oc_currency');
        $this->setPhpName('OcCurrency');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCurrency');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('currency_id', 'CurrencyId', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 32, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 3, null);
        $this->addColumn('symbol_left', 'SymbolLeft', 'VARCHAR', true, 12, null);
        $this->addColumn('symbol_right', 'SymbolRight', 'VARCHAR', true, 12, null);
        $this->addColumn('decimal_place', 'DecimalPlace', 'CHAR', true, null, null);
        $this->addColumn('value', 'Value', 'DOUBLE', true, 15, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, null);
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CurrencyId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CurrencyId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CurrencyId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CurrencyId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CurrencyId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CurrencyId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CurrencyId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcCurrencyTableMap::CLASS_DEFAULT : OcCurrencyTableMap::OM_CLASS;
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
     * @return array           (OcCurrency object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCurrencyTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCurrencyTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCurrencyTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCurrencyTableMap::OM_CLASS;
            /** @var OcCurrency $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCurrencyTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCurrencyTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCurrencyTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCurrency $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCurrencyTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_CURRENCY_ID);
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_TITLE);
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_CODE);
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_SYMBOL_LEFT);
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_SYMBOL_RIGHT);
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_DECIMAL_PLACE);
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_VALUE);
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcCurrencyTableMap::COL_DATE_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.currency_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.symbol_left');
            $criteria->addSelectColumn($alias . '.symbol_right');
            $criteria->addSelectColumn($alias . '.decimal_place');
            $criteria->addSelectColumn($alias . '.value');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.date_modified');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCurrencyTableMap::DATABASE_NAME)->getTable(OcCurrencyTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCurrencyTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCurrencyTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCurrencyTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCurrency or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCurrency object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCurrencyTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCurrency) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCurrencyTableMap::DATABASE_NAME);
            $criteria->add(OcCurrencyTableMap::COL_CURRENCY_ID, (array) $values, Criteria::IN);
        }

        $query = OcCurrencyQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCurrencyTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCurrencyTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_currency table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCurrencyQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCurrency or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCurrency object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCurrencyTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCurrency object
        }

        if ($criteria->containsKey(OcCurrencyTableMap::COL_CURRENCY_ID) && $criteria->keyContainsValue(OcCurrencyTableMap::COL_CURRENCY_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcCurrencyTableMap::COL_CURRENCY_ID.')');
        }


        // Set the correct dbName
        $query = OcCurrencyQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCurrencyTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCurrencyTableMap::buildTableMap();
