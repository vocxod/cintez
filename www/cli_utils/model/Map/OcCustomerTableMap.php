<?php

namespace Map;

use \OcCustomer;
use \OcCustomerQuery;
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
 * This class defines the structure of the 'oc_customer' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCustomerTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCustomerTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_customer';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCustomer';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCustomer';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 22;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 22;

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_customer.customer_id';

    /**
     * the column name for the customer_group_id field
     */
    const COL_CUSTOMER_GROUP_ID = 'oc_customer.customer_group_id';

    /**
     * the column name for the store_id field
     */
    const COL_STORE_ID = 'oc_customer.store_id';

    /**
     * the column name for the language_id field
     */
    const COL_LANGUAGE_ID = 'oc_customer.language_id';

    /**
     * the column name for the firstname field
     */
    const COL_FIRSTNAME = 'oc_customer.firstname';

    /**
     * the column name for the lastname field
     */
    const COL_LASTNAME = 'oc_customer.lastname';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'oc_customer.email';

    /**
     * the column name for the telephone field
     */
    const COL_TELEPHONE = 'oc_customer.telephone';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'oc_customer.fax';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'oc_customer.password';

    /**
     * the column name for the salt field
     */
    const COL_SALT = 'oc_customer.salt';

    /**
     * the column name for the cart field
     */
    const COL_CART = 'oc_customer.cart';

    /**
     * the column name for the wishlist field
     */
    const COL_WISHLIST = 'oc_customer.wishlist';

    /**
     * the column name for the newsletter field
     */
    const COL_NEWSLETTER = 'oc_customer.newsletter';

    /**
     * the column name for the address_id field
     */
    const COL_ADDRESS_ID = 'oc_customer.address_id';

    /**
     * the column name for the custom_field field
     */
    const COL_CUSTOM_FIELD = 'oc_customer.custom_field';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'oc_customer.ip';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_customer.status';

    /**
     * the column name for the safe field
     */
    const COL_SAFE = 'oc_customer.safe';

    /**
     * the column name for the token field
     */
    const COL_TOKEN = 'oc_customer.token';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_customer.code';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_customer.date_added';

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
        self::TYPE_PHPNAME       => array('CustomerId', 'CustomerGroupId', 'StoreId', 'LanguageId', 'Firstname', 'Lastname', 'Email', 'Telephone', 'Fax', 'Password', 'Salt', 'Cart', 'Wishlist', 'Newsletter', 'AddressId', 'CustomField', 'Ip', 'Status', 'Safe', 'Token', 'Code', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('customerId', 'customerGroupId', 'storeId', 'languageId', 'firstname', 'lastname', 'email', 'telephone', 'fax', 'password', 'salt', 'cart', 'wishlist', 'newsletter', 'addressId', 'customField', 'ip', 'status', 'safe', 'token', 'code', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcCustomerTableMap::COL_CUSTOMER_ID, OcCustomerTableMap::COL_CUSTOMER_GROUP_ID, OcCustomerTableMap::COL_STORE_ID, OcCustomerTableMap::COL_LANGUAGE_ID, OcCustomerTableMap::COL_FIRSTNAME, OcCustomerTableMap::COL_LASTNAME, OcCustomerTableMap::COL_EMAIL, OcCustomerTableMap::COL_TELEPHONE, OcCustomerTableMap::COL_FAX, OcCustomerTableMap::COL_PASSWORD, OcCustomerTableMap::COL_SALT, OcCustomerTableMap::COL_CART, OcCustomerTableMap::COL_WISHLIST, OcCustomerTableMap::COL_NEWSLETTER, OcCustomerTableMap::COL_ADDRESS_ID, OcCustomerTableMap::COL_CUSTOM_FIELD, OcCustomerTableMap::COL_IP, OcCustomerTableMap::COL_STATUS, OcCustomerTableMap::COL_SAFE, OcCustomerTableMap::COL_TOKEN, OcCustomerTableMap::COL_CODE, OcCustomerTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('customer_id', 'customer_group_id', 'store_id', 'language_id', 'firstname', 'lastname', 'email', 'telephone', 'fax', 'password', 'salt', 'cart', 'wishlist', 'newsletter', 'address_id', 'custom_field', 'ip', 'status', 'safe', 'token', 'code', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CustomerId' => 0, 'CustomerGroupId' => 1, 'StoreId' => 2, 'LanguageId' => 3, 'Firstname' => 4, 'Lastname' => 5, 'Email' => 6, 'Telephone' => 7, 'Fax' => 8, 'Password' => 9, 'Salt' => 10, 'Cart' => 11, 'Wishlist' => 12, 'Newsletter' => 13, 'AddressId' => 14, 'CustomField' => 15, 'Ip' => 16, 'Status' => 17, 'Safe' => 18, 'Token' => 19, 'Code' => 20, 'DateAdded' => 21, ),
        self::TYPE_CAMELNAME     => array('customerId' => 0, 'customerGroupId' => 1, 'storeId' => 2, 'languageId' => 3, 'firstname' => 4, 'lastname' => 5, 'email' => 6, 'telephone' => 7, 'fax' => 8, 'password' => 9, 'salt' => 10, 'cart' => 11, 'wishlist' => 12, 'newsletter' => 13, 'addressId' => 14, 'customField' => 15, 'ip' => 16, 'status' => 17, 'safe' => 18, 'token' => 19, 'code' => 20, 'dateAdded' => 21, ),
        self::TYPE_COLNAME       => array(OcCustomerTableMap::COL_CUSTOMER_ID => 0, OcCustomerTableMap::COL_CUSTOMER_GROUP_ID => 1, OcCustomerTableMap::COL_STORE_ID => 2, OcCustomerTableMap::COL_LANGUAGE_ID => 3, OcCustomerTableMap::COL_FIRSTNAME => 4, OcCustomerTableMap::COL_LASTNAME => 5, OcCustomerTableMap::COL_EMAIL => 6, OcCustomerTableMap::COL_TELEPHONE => 7, OcCustomerTableMap::COL_FAX => 8, OcCustomerTableMap::COL_PASSWORD => 9, OcCustomerTableMap::COL_SALT => 10, OcCustomerTableMap::COL_CART => 11, OcCustomerTableMap::COL_WISHLIST => 12, OcCustomerTableMap::COL_NEWSLETTER => 13, OcCustomerTableMap::COL_ADDRESS_ID => 14, OcCustomerTableMap::COL_CUSTOM_FIELD => 15, OcCustomerTableMap::COL_IP => 16, OcCustomerTableMap::COL_STATUS => 17, OcCustomerTableMap::COL_SAFE => 18, OcCustomerTableMap::COL_TOKEN => 19, OcCustomerTableMap::COL_CODE => 20, OcCustomerTableMap::COL_DATE_ADDED => 21, ),
        self::TYPE_FIELDNAME     => array('customer_id' => 0, 'customer_group_id' => 1, 'store_id' => 2, 'language_id' => 3, 'firstname' => 4, 'lastname' => 5, 'email' => 6, 'telephone' => 7, 'fax' => 8, 'password' => 9, 'salt' => 10, 'cart' => 11, 'wishlist' => 12, 'newsletter' => 13, 'address_id' => 14, 'custom_field' => 15, 'ip' => 16, 'status' => 17, 'safe' => 18, 'token' => 19, 'code' => 20, 'date_added' => 21, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $this->setName('oc_customer');
        $this->setPhpName('OcCustomer');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCustomer');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('customer_group_id', 'CustomerGroupId', 'INTEGER', true, null, null);
        $this->addColumn('store_id', 'StoreId', 'INTEGER', true, null, 0);
        $this->addColumn('language_id', 'LanguageId', 'INTEGER', true, null, null);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 96, null);
        $this->addColumn('telephone', 'Telephone', 'VARCHAR', true, 32, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', true, 32, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('salt', 'Salt', 'VARCHAR', true, 9, null);
        $this->addColumn('cart', 'Cart', 'LONGVARCHAR', false, null, null);
        $this->addColumn('wishlist', 'Wishlist', 'LONGVARCHAR', false, null, null);
        $this->addColumn('newsletter', 'Newsletter', 'BOOLEAN', true, 1, false);
        $this->addColumn('address_id', 'AddressId', 'INTEGER', true, null, 0);
        $this->addColumn('custom_field', 'CustomField', 'LONGVARCHAR', true, null, null);
        $this->addColumn('ip', 'Ip', 'VARCHAR', true, 40, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, null);
        $this->addColumn('safe', 'Safe', 'BOOLEAN', true, 1, null);
        $this->addColumn('token', 'Token', 'LONGVARCHAR', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 40, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcCustomerTableMap::CLASS_DEFAULT : OcCustomerTableMap::OM_CLASS;
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
     * @return array           (OcCustomer object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCustomerTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCustomerTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCustomerTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCustomerTableMap::OM_CLASS;
            /** @var OcCustomer $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCustomerTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCustomerTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCustomerTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCustomer $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCustomerTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCustomerTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_CUSTOMER_GROUP_ID);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_STORE_ID);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_LANGUAGE_ID);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_EMAIL);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_TELEPHONE);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_FAX);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_SALT);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_CART);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_WISHLIST);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_NEWSLETTER);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_ADDRESS_ID);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_CUSTOM_FIELD);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_IP);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_SAFE);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_TOKEN);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_CODE);
            $criteria->addSelectColumn(OcCustomerTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.customer_group_id');
            $criteria->addSelectColumn($alias . '.store_id');
            $criteria->addSelectColumn($alias . '.language_id');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.telephone');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.salt');
            $criteria->addSelectColumn($alias . '.cart');
            $criteria->addSelectColumn($alias . '.wishlist');
            $criteria->addSelectColumn($alias . '.newsletter');
            $criteria->addSelectColumn($alias . '.address_id');
            $criteria->addSelectColumn($alias . '.custom_field');
            $criteria->addSelectColumn($alias . '.ip');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.safe');
            $criteria->addSelectColumn($alias . '.token');
            $criteria->addSelectColumn($alias . '.code');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCustomerTableMap::DATABASE_NAME)->getTable(OcCustomerTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCustomerTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCustomerTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCustomerTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCustomer or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCustomer object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCustomer) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCustomerTableMap::DATABASE_NAME);
            $criteria->add(OcCustomerTableMap::COL_CUSTOMER_ID, (array) $values, Criteria::IN);
        }

        $query = OcCustomerQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCustomerTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCustomerTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_customer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCustomerQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCustomer or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCustomer object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCustomer object
        }

        if ($criteria->containsKey(OcCustomerTableMap::COL_CUSTOMER_ID) && $criteria->keyContainsValue(OcCustomerTableMap::COL_CUSTOMER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcCustomerTableMap::COL_CUSTOMER_ID.')');
        }


        // Set the correct dbName
        $query = OcCustomerQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCustomerTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCustomerTableMap::buildTableMap();
