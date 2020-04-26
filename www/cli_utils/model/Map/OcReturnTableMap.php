<?php

namespace Map;

use \OcReturn;
use \OcReturnQuery;
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
 * This class defines the structure of the 'oc_return' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcReturnTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcReturnTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_return';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcReturn';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcReturn';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 19;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 19;

    /**
     * the column name for the return_id field
     */
    const COL_RETURN_ID = 'oc_return.return_id';

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'oc_return.order_id';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_return.product_id';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_return.customer_id';

    /**
     * the column name for the firstname field
     */
    const COL_FIRSTNAME = 'oc_return.firstname';

    /**
     * the column name for the lastname field
     */
    const COL_LASTNAME = 'oc_return.lastname';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'oc_return.email';

    /**
     * the column name for the telephone field
     */
    const COL_TELEPHONE = 'oc_return.telephone';

    /**
     * the column name for the product field
     */
    const COL_PRODUCT = 'oc_return.product';

    /**
     * the column name for the model field
     */
    const COL_MODEL = 'oc_return.model';

    /**
     * the column name for the quantity field
     */
    const COL_QUANTITY = 'oc_return.quantity';

    /**
     * the column name for the opened field
     */
    const COL_OPENED = 'oc_return.opened';

    /**
     * the column name for the return_reason_id field
     */
    const COL_RETURN_REASON_ID = 'oc_return.return_reason_id';

    /**
     * the column name for the return_action_id field
     */
    const COL_RETURN_ACTION_ID = 'oc_return.return_action_id';

    /**
     * the column name for the return_status_id field
     */
    const COL_RETURN_STATUS_ID = 'oc_return.return_status_id';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'oc_return.comment';

    /**
     * the column name for the date_ordered field
     */
    const COL_DATE_ORDERED = 'oc_return.date_ordered';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_return.date_added';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'oc_return.date_modified';

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
        self::TYPE_PHPNAME       => array('ReturnId', 'OrderId', 'ProductId', 'CustomerId', 'Firstname', 'Lastname', 'Email', 'Telephone', 'Product', 'Model', 'Quantity', 'Opened', 'ReturnReasonId', 'ReturnActionId', 'ReturnStatusId', 'Comment', 'DateOrdered', 'DateAdded', 'DateModified', ),
        self::TYPE_CAMELNAME     => array('returnId', 'orderId', 'productId', 'customerId', 'firstname', 'lastname', 'email', 'telephone', 'product', 'model', 'quantity', 'opened', 'returnReasonId', 'returnActionId', 'returnStatusId', 'comment', 'dateOrdered', 'dateAdded', 'dateModified', ),
        self::TYPE_COLNAME       => array(OcReturnTableMap::COL_RETURN_ID, OcReturnTableMap::COL_ORDER_ID, OcReturnTableMap::COL_PRODUCT_ID, OcReturnTableMap::COL_CUSTOMER_ID, OcReturnTableMap::COL_FIRSTNAME, OcReturnTableMap::COL_LASTNAME, OcReturnTableMap::COL_EMAIL, OcReturnTableMap::COL_TELEPHONE, OcReturnTableMap::COL_PRODUCT, OcReturnTableMap::COL_MODEL, OcReturnTableMap::COL_QUANTITY, OcReturnTableMap::COL_OPENED, OcReturnTableMap::COL_RETURN_REASON_ID, OcReturnTableMap::COL_RETURN_ACTION_ID, OcReturnTableMap::COL_RETURN_STATUS_ID, OcReturnTableMap::COL_COMMENT, OcReturnTableMap::COL_DATE_ORDERED, OcReturnTableMap::COL_DATE_ADDED, OcReturnTableMap::COL_DATE_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('return_id', 'order_id', 'product_id', 'customer_id', 'firstname', 'lastname', 'email', 'telephone', 'product', 'model', 'quantity', 'opened', 'return_reason_id', 'return_action_id', 'return_status_id', 'comment', 'date_ordered', 'date_added', 'date_modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ReturnId' => 0, 'OrderId' => 1, 'ProductId' => 2, 'CustomerId' => 3, 'Firstname' => 4, 'Lastname' => 5, 'Email' => 6, 'Telephone' => 7, 'Product' => 8, 'Model' => 9, 'Quantity' => 10, 'Opened' => 11, 'ReturnReasonId' => 12, 'ReturnActionId' => 13, 'ReturnStatusId' => 14, 'Comment' => 15, 'DateOrdered' => 16, 'DateAdded' => 17, 'DateModified' => 18, ),
        self::TYPE_CAMELNAME     => array('returnId' => 0, 'orderId' => 1, 'productId' => 2, 'customerId' => 3, 'firstname' => 4, 'lastname' => 5, 'email' => 6, 'telephone' => 7, 'product' => 8, 'model' => 9, 'quantity' => 10, 'opened' => 11, 'returnReasonId' => 12, 'returnActionId' => 13, 'returnStatusId' => 14, 'comment' => 15, 'dateOrdered' => 16, 'dateAdded' => 17, 'dateModified' => 18, ),
        self::TYPE_COLNAME       => array(OcReturnTableMap::COL_RETURN_ID => 0, OcReturnTableMap::COL_ORDER_ID => 1, OcReturnTableMap::COL_PRODUCT_ID => 2, OcReturnTableMap::COL_CUSTOMER_ID => 3, OcReturnTableMap::COL_FIRSTNAME => 4, OcReturnTableMap::COL_LASTNAME => 5, OcReturnTableMap::COL_EMAIL => 6, OcReturnTableMap::COL_TELEPHONE => 7, OcReturnTableMap::COL_PRODUCT => 8, OcReturnTableMap::COL_MODEL => 9, OcReturnTableMap::COL_QUANTITY => 10, OcReturnTableMap::COL_OPENED => 11, OcReturnTableMap::COL_RETURN_REASON_ID => 12, OcReturnTableMap::COL_RETURN_ACTION_ID => 13, OcReturnTableMap::COL_RETURN_STATUS_ID => 14, OcReturnTableMap::COL_COMMENT => 15, OcReturnTableMap::COL_DATE_ORDERED => 16, OcReturnTableMap::COL_DATE_ADDED => 17, OcReturnTableMap::COL_DATE_MODIFIED => 18, ),
        self::TYPE_FIELDNAME     => array('return_id' => 0, 'order_id' => 1, 'product_id' => 2, 'customer_id' => 3, 'firstname' => 4, 'lastname' => 5, 'email' => 6, 'telephone' => 7, 'product' => 8, 'model' => 9, 'quantity' => 10, 'opened' => 11, 'return_reason_id' => 12, 'return_action_id' => 13, 'return_status_id' => 14, 'comment' => 15, 'date_ordered' => 16, 'date_added' => 17, 'date_modified' => 18, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $this->setName('oc_return');
        $this->setPhpName('OcReturn');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcReturn');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('return_id', 'ReturnId', 'INTEGER', true, null, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 96, null);
        $this->addColumn('telephone', 'Telephone', 'VARCHAR', true, 32, null);
        $this->addColumn('product', 'Product', 'VARCHAR', true, 255, null);
        $this->addColumn('model', 'Model', 'VARCHAR', true, 64, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, 4, null);
        $this->addColumn('opened', 'Opened', 'BOOLEAN', true, 1, null);
        $this->addColumn('return_reason_id', 'ReturnReasonId', 'INTEGER', true, null, null);
        $this->addColumn('return_action_id', 'ReturnActionId', 'INTEGER', true, null, null);
        $this->addColumn('return_status_id', 'ReturnStatusId', 'INTEGER', true, null, null);
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('date_ordered', 'DateOrdered', 'DATE', true, null, '0000-00-00');
        $this->addColumn('date_added', 'DateAdded', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReturnId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ReturnId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcReturnTableMap::CLASS_DEFAULT : OcReturnTableMap::OM_CLASS;
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
     * @return array           (OcReturn object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcReturnTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcReturnTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcReturnTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcReturnTableMap::OM_CLASS;
            /** @var OcReturn $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcReturnTableMap::addInstanceToPool($obj, $key);
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
            $key = OcReturnTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcReturnTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcReturn $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcReturnTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcReturnTableMap::COL_RETURN_ID);
            $criteria->addSelectColumn(OcReturnTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OcReturnTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcReturnTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcReturnTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(OcReturnTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(OcReturnTableMap::COL_EMAIL);
            $criteria->addSelectColumn(OcReturnTableMap::COL_TELEPHONE);
            $criteria->addSelectColumn(OcReturnTableMap::COL_PRODUCT);
            $criteria->addSelectColumn(OcReturnTableMap::COL_MODEL);
            $criteria->addSelectColumn(OcReturnTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(OcReturnTableMap::COL_OPENED);
            $criteria->addSelectColumn(OcReturnTableMap::COL_RETURN_REASON_ID);
            $criteria->addSelectColumn(OcReturnTableMap::COL_RETURN_ACTION_ID);
            $criteria->addSelectColumn(OcReturnTableMap::COL_RETURN_STATUS_ID);
            $criteria->addSelectColumn(OcReturnTableMap::COL_COMMENT);
            $criteria->addSelectColumn(OcReturnTableMap::COL_DATE_ORDERED);
            $criteria->addSelectColumn(OcReturnTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OcReturnTableMap::COL_DATE_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.return_id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.telephone');
            $criteria->addSelectColumn($alias . '.product');
            $criteria->addSelectColumn($alias . '.model');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.opened');
            $criteria->addSelectColumn($alias . '.return_reason_id');
            $criteria->addSelectColumn($alias . '.return_action_id');
            $criteria->addSelectColumn($alias . '.return_status_id');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.date_ordered');
            $criteria->addSelectColumn($alias . '.date_added');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcReturnTableMap::DATABASE_NAME)->getTable(OcReturnTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcReturnTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcReturnTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcReturnTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcReturn or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcReturn object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcReturn) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcReturnTableMap::DATABASE_NAME);
            $criteria->add(OcReturnTableMap::COL_RETURN_ID, (array) $values, Criteria::IN);
        }

        $query = OcReturnQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcReturnTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcReturnTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_return table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcReturnQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcReturn or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcReturn object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcReturn object
        }

        if ($criteria->containsKey(OcReturnTableMap::COL_RETURN_ID) && $criteria->keyContainsValue(OcReturnTableMap::COL_RETURN_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcReturnTableMap::COL_RETURN_ID.')');
        }


        // Set the correct dbName
        $query = OcReturnQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcReturnTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcReturnTableMap::buildTableMap();
