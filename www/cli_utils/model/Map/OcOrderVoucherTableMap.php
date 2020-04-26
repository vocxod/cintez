<?php

namespace Map;

use \OcOrderVoucher;
use \OcOrderVoucherQuery;
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
 * This class defines the structure of the 'oc_order_voucher' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcOrderVoucherTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcOrderVoucherTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_order_voucher';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcOrderVoucher';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcOrderVoucher';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the order_voucher_id field
     */
    const COL_ORDER_VOUCHER_ID = 'oc_order_voucher.order_voucher_id';

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'oc_order_voucher.order_id';

    /**
     * the column name for the voucher_id field
     */
    const COL_VOUCHER_ID = 'oc_order_voucher.voucher_id';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'oc_order_voucher.description';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_order_voucher.code';

    /**
     * the column name for the from_name field
     */
    const COL_FROM_NAME = 'oc_order_voucher.from_name';

    /**
     * the column name for the from_email field
     */
    const COL_FROM_EMAIL = 'oc_order_voucher.from_email';

    /**
     * the column name for the to_name field
     */
    const COL_TO_NAME = 'oc_order_voucher.to_name';

    /**
     * the column name for the to_email field
     */
    const COL_TO_EMAIL = 'oc_order_voucher.to_email';

    /**
     * the column name for the voucher_theme_id field
     */
    const COL_VOUCHER_THEME_ID = 'oc_order_voucher.voucher_theme_id';

    /**
     * the column name for the message field
     */
    const COL_MESSAGE = 'oc_order_voucher.message';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'oc_order_voucher.amount';

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
        self::TYPE_PHPNAME       => array('OrderVoucherId', 'OrderId', 'VoucherId', 'Description', 'Code', 'FromName', 'FromEmail', 'ToName', 'ToEmail', 'VoucherThemeId', 'Message', 'Amount', ),
        self::TYPE_CAMELNAME     => array('orderVoucherId', 'orderId', 'voucherId', 'description', 'code', 'fromName', 'fromEmail', 'toName', 'toEmail', 'voucherThemeId', 'message', 'amount', ),
        self::TYPE_COLNAME       => array(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID, OcOrderVoucherTableMap::COL_ORDER_ID, OcOrderVoucherTableMap::COL_VOUCHER_ID, OcOrderVoucherTableMap::COL_DESCRIPTION, OcOrderVoucherTableMap::COL_CODE, OcOrderVoucherTableMap::COL_FROM_NAME, OcOrderVoucherTableMap::COL_FROM_EMAIL, OcOrderVoucherTableMap::COL_TO_NAME, OcOrderVoucherTableMap::COL_TO_EMAIL, OcOrderVoucherTableMap::COL_VOUCHER_THEME_ID, OcOrderVoucherTableMap::COL_MESSAGE, OcOrderVoucherTableMap::COL_AMOUNT, ),
        self::TYPE_FIELDNAME     => array('order_voucher_id', 'order_id', 'voucher_id', 'description', 'code', 'from_name', 'from_email', 'to_name', 'to_email', 'voucher_theme_id', 'message', 'amount', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('OrderVoucherId' => 0, 'OrderId' => 1, 'VoucherId' => 2, 'Description' => 3, 'Code' => 4, 'FromName' => 5, 'FromEmail' => 6, 'ToName' => 7, 'ToEmail' => 8, 'VoucherThemeId' => 9, 'Message' => 10, 'Amount' => 11, ),
        self::TYPE_CAMELNAME     => array('orderVoucherId' => 0, 'orderId' => 1, 'voucherId' => 2, 'description' => 3, 'code' => 4, 'fromName' => 5, 'fromEmail' => 6, 'toName' => 7, 'toEmail' => 8, 'voucherThemeId' => 9, 'message' => 10, 'amount' => 11, ),
        self::TYPE_COLNAME       => array(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID => 0, OcOrderVoucherTableMap::COL_ORDER_ID => 1, OcOrderVoucherTableMap::COL_VOUCHER_ID => 2, OcOrderVoucherTableMap::COL_DESCRIPTION => 3, OcOrderVoucherTableMap::COL_CODE => 4, OcOrderVoucherTableMap::COL_FROM_NAME => 5, OcOrderVoucherTableMap::COL_FROM_EMAIL => 6, OcOrderVoucherTableMap::COL_TO_NAME => 7, OcOrderVoucherTableMap::COL_TO_EMAIL => 8, OcOrderVoucherTableMap::COL_VOUCHER_THEME_ID => 9, OcOrderVoucherTableMap::COL_MESSAGE => 10, OcOrderVoucherTableMap::COL_AMOUNT => 11, ),
        self::TYPE_FIELDNAME     => array('order_voucher_id' => 0, 'order_id' => 1, 'voucher_id' => 2, 'description' => 3, 'code' => 4, 'from_name' => 5, 'from_email' => 6, 'to_name' => 7, 'to_email' => 8, 'voucher_theme_id' => 9, 'message' => 10, 'amount' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('oc_order_voucher');
        $this->setPhpName('OcOrderVoucher');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcOrderVoucher');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('order_voucher_id', 'OrderVoucherId', 'INTEGER', true, null, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('voucher_id', 'VoucherId', 'INTEGER', true, null, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 255, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 10, null);
        $this->addColumn('from_name', 'FromName', 'VARCHAR', true, 64, null);
        $this->addColumn('from_email', 'FromEmail', 'VARCHAR', true, 96, null);
        $this->addColumn('to_name', 'ToName', 'VARCHAR', true, 64, null);
        $this->addColumn('to_email', 'ToEmail', 'VARCHAR', true, 96, null);
        $this->addColumn('voucher_theme_id', 'VoucherThemeId', 'INTEGER', true, null, null);
        $this->addColumn('message', 'Message', 'LONGVARCHAR', true, null, null);
        $this->addColumn('amount', 'Amount', 'DECIMAL', true, 15, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderVoucherId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderVoucherId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderVoucherId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderVoucherId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderVoucherId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderVoucherId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('OrderVoucherId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcOrderVoucherTableMap::CLASS_DEFAULT : OcOrderVoucherTableMap::OM_CLASS;
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
     * @return array           (OcOrderVoucher object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcOrderVoucherTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcOrderVoucherTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcOrderVoucherTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcOrderVoucherTableMap::OM_CLASS;
            /** @var OcOrderVoucher $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcOrderVoucherTableMap::addInstanceToPool($obj, $key);
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
            $key = OcOrderVoucherTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcOrderVoucherTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcOrderVoucher $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcOrderVoucherTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_VOUCHER_ID);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_CODE);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_FROM_NAME);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_FROM_EMAIL);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_TO_NAME);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_TO_EMAIL);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_VOUCHER_THEME_ID);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_MESSAGE);
            $criteria->addSelectColumn(OcOrderVoucherTableMap::COL_AMOUNT);
        } else {
            $criteria->addSelectColumn($alias . '.order_voucher_id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.voucher_id');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.from_name');
            $criteria->addSelectColumn($alias . '.from_email');
            $criteria->addSelectColumn($alias . '.to_name');
            $criteria->addSelectColumn($alias . '.to_email');
            $criteria->addSelectColumn($alias . '.voucher_theme_id');
            $criteria->addSelectColumn($alias . '.message');
            $criteria->addSelectColumn($alias . '.amount');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcOrderVoucherTableMap::DATABASE_NAME)->getTable(OcOrderVoucherTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcOrderVoucherTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcOrderVoucherTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcOrderVoucherTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcOrderVoucher or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcOrderVoucher object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderVoucherTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcOrderVoucher) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcOrderVoucherTableMap::DATABASE_NAME);
            $criteria->add(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID, (array) $values, Criteria::IN);
        }

        $query = OcOrderVoucherQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcOrderVoucherTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcOrderVoucherTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_order_voucher table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcOrderVoucherQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcOrderVoucher or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcOrderVoucher object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderVoucherTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcOrderVoucher object
        }

        if ($criteria->containsKey(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID) && $criteria->keyContainsValue(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID.')');
        }


        // Set the correct dbName
        $query = OcOrderVoucherQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcOrderVoucherTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcOrderVoucherTableMap::buildTableMap();
