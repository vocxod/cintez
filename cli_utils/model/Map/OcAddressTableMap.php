<?php

namespace Map;

use \OcAddress;
use \OcAddressQuery;
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
 * This class defines the structure of the 'oc_address' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcAddressTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcAddressTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_address';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcAddress';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcAddress';

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
     * the column name for the address_id field
     */
    const COL_ADDRESS_ID = 'oc_address.address_id';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_address.customer_id';

    /**
     * the column name for the firstname field
     */
    const COL_FIRSTNAME = 'oc_address.firstname';

    /**
     * the column name for the lastname field
     */
    const COL_LASTNAME = 'oc_address.lastname';

    /**
     * the column name for the company field
     */
    const COL_COMPANY = 'oc_address.company';

    /**
     * the column name for the address_1 field
     */
    const COL_ADDRESS_1 = 'oc_address.address_1';

    /**
     * the column name for the address_2 field
     */
    const COL_ADDRESS_2 = 'oc_address.address_2';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'oc_address.city';

    /**
     * the column name for the postcode field
     */
    const COL_POSTCODE = 'oc_address.postcode';

    /**
     * the column name for the country_id field
     */
    const COL_COUNTRY_ID = 'oc_address.country_id';

    /**
     * the column name for the zone_id field
     */
    const COL_ZONE_ID = 'oc_address.zone_id';

    /**
     * the column name for the custom_field field
     */
    const COL_CUSTOM_FIELD = 'oc_address.custom_field';

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
        self::TYPE_PHPNAME       => array('AddressId', 'CustomerId', 'Firstname', 'Lastname', 'Company', 'Address1', 'Address2', 'City', 'Postcode', 'CountryId', 'ZoneId', 'CustomField', ),
        self::TYPE_CAMELNAME     => array('addressId', 'customerId', 'firstname', 'lastname', 'company', 'address1', 'address2', 'city', 'postcode', 'countryId', 'zoneId', 'customField', ),
        self::TYPE_COLNAME       => array(OcAddressTableMap::COL_ADDRESS_ID, OcAddressTableMap::COL_CUSTOMER_ID, OcAddressTableMap::COL_FIRSTNAME, OcAddressTableMap::COL_LASTNAME, OcAddressTableMap::COL_COMPANY, OcAddressTableMap::COL_ADDRESS_1, OcAddressTableMap::COL_ADDRESS_2, OcAddressTableMap::COL_CITY, OcAddressTableMap::COL_POSTCODE, OcAddressTableMap::COL_COUNTRY_ID, OcAddressTableMap::COL_ZONE_ID, OcAddressTableMap::COL_CUSTOM_FIELD, ),
        self::TYPE_FIELDNAME     => array('address_id', 'customer_id', 'firstname', 'lastname', 'company', 'address_1', 'address_2', 'city', 'postcode', 'country_id', 'zone_id', 'custom_field', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AddressId' => 0, 'CustomerId' => 1, 'Firstname' => 2, 'Lastname' => 3, 'Company' => 4, 'Address1' => 5, 'Address2' => 6, 'City' => 7, 'Postcode' => 8, 'CountryId' => 9, 'ZoneId' => 10, 'CustomField' => 11, ),
        self::TYPE_CAMELNAME     => array('addressId' => 0, 'customerId' => 1, 'firstname' => 2, 'lastname' => 3, 'company' => 4, 'address1' => 5, 'address2' => 6, 'city' => 7, 'postcode' => 8, 'countryId' => 9, 'zoneId' => 10, 'customField' => 11, ),
        self::TYPE_COLNAME       => array(OcAddressTableMap::COL_ADDRESS_ID => 0, OcAddressTableMap::COL_CUSTOMER_ID => 1, OcAddressTableMap::COL_FIRSTNAME => 2, OcAddressTableMap::COL_LASTNAME => 3, OcAddressTableMap::COL_COMPANY => 4, OcAddressTableMap::COL_ADDRESS_1 => 5, OcAddressTableMap::COL_ADDRESS_2 => 6, OcAddressTableMap::COL_CITY => 7, OcAddressTableMap::COL_POSTCODE => 8, OcAddressTableMap::COL_COUNTRY_ID => 9, OcAddressTableMap::COL_ZONE_ID => 10, OcAddressTableMap::COL_CUSTOM_FIELD => 11, ),
        self::TYPE_FIELDNAME     => array('address_id' => 0, 'customer_id' => 1, 'firstname' => 2, 'lastname' => 3, 'company' => 4, 'address_1' => 5, 'address_2' => 6, 'city' => 7, 'postcode' => 8, 'country_id' => 9, 'zone_id' => 10, 'custom_field' => 11, ),
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
        $this->setName('oc_address');
        $this->setPhpName('OcAddress');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcAddress');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('address_id', 'AddressId', 'INTEGER', true, null, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('company', 'Company', 'VARCHAR', true, 40, null);
        $this->addColumn('address_1', 'Address1', 'VARCHAR', true, 128, null);
        $this->addColumn('address_2', 'Address2', 'VARCHAR', true, 128, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 128, null);
        $this->addColumn('postcode', 'Postcode', 'VARCHAR', true, 10, null);
        $this->addColumn('country_id', 'CountryId', 'INTEGER', true, null, 0);
        $this->addColumn('zone_id', 'ZoneId', 'INTEGER', true, null, 0);
        $this->addColumn('custom_field', 'CustomField', 'LONGVARCHAR', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AddressId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AddressId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AddressId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AddressId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AddressId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AddressId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('AddressId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcAddressTableMap::CLASS_DEFAULT : OcAddressTableMap::OM_CLASS;
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
     * @return array           (OcAddress object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcAddressTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcAddressTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcAddressTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcAddressTableMap::OM_CLASS;
            /** @var OcAddress $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcAddressTableMap::addInstanceToPool($obj, $key);
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
            $key = OcAddressTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcAddressTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcAddress $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcAddressTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcAddressTableMap::COL_ADDRESS_ID);
            $criteria->addSelectColumn(OcAddressTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcAddressTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(OcAddressTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(OcAddressTableMap::COL_COMPANY);
            $criteria->addSelectColumn(OcAddressTableMap::COL_ADDRESS_1);
            $criteria->addSelectColumn(OcAddressTableMap::COL_ADDRESS_2);
            $criteria->addSelectColumn(OcAddressTableMap::COL_CITY);
            $criteria->addSelectColumn(OcAddressTableMap::COL_POSTCODE);
            $criteria->addSelectColumn(OcAddressTableMap::COL_COUNTRY_ID);
            $criteria->addSelectColumn(OcAddressTableMap::COL_ZONE_ID);
            $criteria->addSelectColumn(OcAddressTableMap::COL_CUSTOM_FIELD);
        } else {
            $criteria->addSelectColumn($alias . '.address_id');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.company');
            $criteria->addSelectColumn($alias . '.address_1');
            $criteria->addSelectColumn($alias . '.address_2');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.postcode');
            $criteria->addSelectColumn($alias . '.country_id');
            $criteria->addSelectColumn($alias . '.zone_id');
            $criteria->addSelectColumn($alias . '.custom_field');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcAddressTableMap::DATABASE_NAME)->getTable(OcAddressTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcAddressTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcAddressTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcAddressTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcAddress or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcAddress object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcAddressTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcAddress) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcAddressTableMap::DATABASE_NAME);
            $criteria->add(OcAddressTableMap::COL_ADDRESS_ID, (array) $values, Criteria::IN);
        }

        $query = OcAddressQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcAddressTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcAddressTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_address table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcAddressQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcAddress or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcAddress object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcAddressTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcAddress object
        }

        if ($criteria->containsKey(OcAddressTableMap::COL_ADDRESS_ID) && $criteria->keyContainsValue(OcAddressTableMap::COL_ADDRESS_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcAddressTableMap::COL_ADDRESS_ID.')');
        }


        // Set the correct dbName
        $query = OcAddressQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcAddressTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcAddressTableMap::buildTableMap();
