<?php

namespace Map;

use \OcCustomerLogin;
use \OcCustomerLoginQuery;
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
 * This class defines the structure of the 'oc_customer_login' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCustomerLoginTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCustomerLoginTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_customer_login';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCustomerLogin';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCustomerLogin';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the customer_login_id field
     */
    const COL_CUSTOMER_LOGIN_ID = 'oc_customer_login.customer_login_id';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'oc_customer_login.email';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'oc_customer_login.ip';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'oc_customer_login.total';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_customer_login.date_added';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'oc_customer_login.date_modified';

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
        self::TYPE_PHPNAME       => array('CustomerLoginId', 'Email', 'Ip', 'Total', 'DateAdded', 'DateModified', ),
        self::TYPE_CAMELNAME     => array('customerLoginId', 'email', 'ip', 'total', 'dateAdded', 'dateModified', ),
        self::TYPE_COLNAME       => array(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID, OcCustomerLoginTableMap::COL_EMAIL, OcCustomerLoginTableMap::COL_IP, OcCustomerLoginTableMap::COL_TOTAL, OcCustomerLoginTableMap::COL_DATE_ADDED, OcCustomerLoginTableMap::COL_DATE_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('customer_login_id', 'email', 'ip', 'total', 'date_added', 'date_modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CustomerLoginId' => 0, 'Email' => 1, 'Ip' => 2, 'Total' => 3, 'DateAdded' => 4, 'DateModified' => 5, ),
        self::TYPE_CAMELNAME     => array('customerLoginId' => 0, 'email' => 1, 'ip' => 2, 'total' => 3, 'dateAdded' => 4, 'dateModified' => 5, ),
        self::TYPE_COLNAME       => array(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID => 0, OcCustomerLoginTableMap::COL_EMAIL => 1, OcCustomerLoginTableMap::COL_IP => 2, OcCustomerLoginTableMap::COL_TOTAL => 3, OcCustomerLoginTableMap::COL_DATE_ADDED => 4, OcCustomerLoginTableMap::COL_DATE_MODIFIED => 5, ),
        self::TYPE_FIELDNAME     => array('customer_login_id' => 0, 'email' => 1, 'ip' => 2, 'total' => 3, 'date_added' => 4, 'date_modified' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('oc_customer_login');
        $this->setPhpName('OcCustomerLogin');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCustomerLogin');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('customer_login_id', 'CustomerLoginId', 'INTEGER', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 96, null);
        $this->addColumn('ip', 'Ip', 'VARCHAR', true, 40, null);
        $this->addColumn('total', 'Total', 'INTEGER', true, 4, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerLoginId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerLoginId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerLoginId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerLoginId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerLoginId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerLoginId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CustomerLoginId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcCustomerLoginTableMap::CLASS_DEFAULT : OcCustomerLoginTableMap::OM_CLASS;
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
     * @return array           (OcCustomerLogin object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCustomerLoginTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCustomerLoginTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCustomerLoginTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCustomerLoginTableMap::OM_CLASS;
            /** @var OcCustomerLogin $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCustomerLoginTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCustomerLoginTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCustomerLoginTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCustomerLogin $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCustomerLoginTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID);
            $criteria->addSelectColumn(OcCustomerLoginTableMap::COL_EMAIL);
            $criteria->addSelectColumn(OcCustomerLoginTableMap::COL_IP);
            $criteria->addSelectColumn(OcCustomerLoginTableMap::COL_TOTAL);
            $criteria->addSelectColumn(OcCustomerLoginTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OcCustomerLoginTableMap::COL_DATE_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.customer_login_id');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.ip');
            $criteria->addSelectColumn($alias . '.total');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCustomerLoginTableMap::DATABASE_NAME)->getTable(OcCustomerLoginTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCustomerLoginTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCustomerLoginTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCustomerLoginTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCustomerLogin or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCustomerLogin object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerLoginTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCustomerLogin) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCustomerLoginTableMap::DATABASE_NAME);
            $criteria->add(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID, (array) $values, Criteria::IN);
        }

        $query = OcCustomerLoginQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCustomerLoginTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCustomerLoginTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_customer_login table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCustomerLoginQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCustomerLogin or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCustomerLogin object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerLoginTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCustomerLogin object
        }

        if ($criteria->containsKey(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID) && $criteria->keyContainsValue(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID.')');
        }


        // Set the correct dbName
        $query = OcCustomerLoginQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCustomerLoginTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCustomerLoginTableMap::buildTableMap();
