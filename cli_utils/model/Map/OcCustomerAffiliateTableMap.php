<?php

namespace Map;

use \OcCustomerAffiliate;
use \OcCustomerAffiliateQuery;
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
 * This class defines the structure of the 'oc_customer_affiliate' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcCustomerAffiliateTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcCustomerAffiliateTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_customer_affiliate';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcCustomerAffiliate';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcCustomerAffiliate';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_customer_affiliate.customer_id';

    /**
     * the column name for the company field
     */
    const COL_COMPANY = 'oc_customer_affiliate.company';

    /**
     * the column name for the website field
     */
    const COL_WEBSITE = 'oc_customer_affiliate.website';

    /**
     * the column name for the tracking field
     */
    const COL_TRACKING = 'oc_customer_affiliate.tracking';

    /**
     * the column name for the commission field
     */
    const COL_COMMISSION = 'oc_customer_affiliate.commission';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'oc_customer_affiliate.tax';

    /**
     * the column name for the payment field
     */
    const COL_PAYMENT = 'oc_customer_affiliate.payment';

    /**
     * the column name for the cheque field
     */
    const COL_CHEQUE = 'oc_customer_affiliate.cheque';

    /**
     * the column name for the paypal field
     */
    const COL_PAYPAL = 'oc_customer_affiliate.paypal';

    /**
     * the column name for the bank_name field
     */
    const COL_BANK_NAME = 'oc_customer_affiliate.bank_name';

    /**
     * the column name for the bank_branch_number field
     */
    const COL_BANK_BRANCH_NUMBER = 'oc_customer_affiliate.bank_branch_number';

    /**
     * the column name for the bank_swift_code field
     */
    const COL_BANK_SWIFT_CODE = 'oc_customer_affiliate.bank_swift_code';

    /**
     * the column name for the bank_account_name field
     */
    const COL_BANK_ACCOUNT_NAME = 'oc_customer_affiliate.bank_account_name';

    /**
     * the column name for the bank_account_number field
     */
    const COL_BANK_ACCOUNT_NUMBER = 'oc_customer_affiliate.bank_account_number';

    /**
     * the column name for the custom_field field
     */
    const COL_CUSTOM_FIELD = 'oc_customer_affiliate.custom_field';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_customer_affiliate.status';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_customer_affiliate.date_added';

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
        self::TYPE_PHPNAME       => array('CustomerId', 'Company', 'Website', 'Tracking', 'Commission', 'Tax', 'Payment', 'Cheque', 'Paypal', 'BankName', 'BankBranchNumber', 'BankSwiftCode', 'BankAccountName', 'BankAccountNumber', 'CustomField', 'Status', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('customerId', 'company', 'website', 'tracking', 'commission', 'tax', 'payment', 'cheque', 'paypal', 'bankName', 'bankBranchNumber', 'bankSwiftCode', 'bankAccountName', 'bankAccountNumber', 'customField', 'status', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, OcCustomerAffiliateTableMap::COL_COMPANY, OcCustomerAffiliateTableMap::COL_WEBSITE, OcCustomerAffiliateTableMap::COL_TRACKING, OcCustomerAffiliateTableMap::COL_COMMISSION, OcCustomerAffiliateTableMap::COL_TAX, OcCustomerAffiliateTableMap::COL_PAYMENT, OcCustomerAffiliateTableMap::COL_CHEQUE, OcCustomerAffiliateTableMap::COL_PAYPAL, OcCustomerAffiliateTableMap::COL_BANK_NAME, OcCustomerAffiliateTableMap::COL_BANK_BRANCH_NUMBER, OcCustomerAffiliateTableMap::COL_BANK_SWIFT_CODE, OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NAME, OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NUMBER, OcCustomerAffiliateTableMap::COL_CUSTOM_FIELD, OcCustomerAffiliateTableMap::COL_STATUS, OcCustomerAffiliateTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('customer_id', 'company', 'website', 'tracking', 'commission', 'tax', 'payment', 'cheque', 'paypal', 'bank_name', 'bank_branch_number', 'bank_swift_code', 'bank_account_name', 'bank_account_number', 'custom_field', 'status', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CustomerId' => 0, 'Company' => 1, 'Website' => 2, 'Tracking' => 3, 'Commission' => 4, 'Tax' => 5, 'Payment' => 6, 'Cheque' => 7, 'Paypal' => 8, 'BankName' => 9, 'BankBranchNumber' => 10, 'BankSwiftCode' => 11, 'BankAccountName' => 12, 'BankAccountNumber' => 13, 'CustomField' => 14, 'Status' => 15, 'DateAdded' => 16, ),
        self::TYPE_CAMELNAME     => array('customerId' => 0, 'company' => 1, 'website' => 2, 'tracking' => 3, 'commission' => 4, 'tax' => 5, 'payment' => 6, 'cheque' => 7, 'paypal' => 8, 'bankName' => 9, 'bankBranchNumber' => 10, 'bankSwiftCode' => 11, 'bankAccountName' => 12, 'bankAccountNumber' => 13, 'customField' => 14, 'status' => 15, 'dateAdded' => 16, ),
        self::TYPE_COLNAME       => array(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID => 0, OcCustomerAffiliateTableMap::COL_COMPANY => 1, OcCustomerAffiliateTableMap::COL_WEBSITE => 2, OcCustomerAffiliateTableMap::COL_TRACKING => 3, OcCustomerAffiliateTableMap::COL_COMMISSION => 4, OcCustomerAffiliateTableMap::COL_TAX => 5, OcCustomerAffiliateTableMap::COL_PAYMENT => 6, OcCustomerAffiliateTableMap::COL_CHEQUE => 7, OcCustomerAffiliateTableMap::COL_PAYPAL => 8, OcCustomerAffiliateTableMap::COL_BANK_NAME => 9, OcCustomerAffiliateTableMap::COL_BANK_BRANCH_NUMBER => 10, OcCustomerAffiliateTableMap::COL_BANK_SWIFT_CODE => 11, OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NAME => 12, OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NUMBER => 13, OcCustomerAffiliateTableMap::COL_CUSTOM_FIELD => 14, OcCustomerAffiliateTableMap::COL_STATUS => 15, OcCustomerAffiliateTableMap::COL_DATE_ADDED => 16, ),
        self::TYPE_FIELDNAME     => array('customer_id' => 0, 'company' => 1, 'website' => 2, 'tracking' => 3, 'commission' => 4, 'tax' => 5, 'payment' => 6, 'cheque' => 7, 'paypal' => 8, 'bank_name' => 9, 'bank_branch_number' => 10, 'bank_swift_code' => 11, 'bank_account_name' => 12, 'bank_account_number' => 13, 'custom_field' => 14, 'status' => 15, 'date_added' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('oc_customer_affiliate');
        $this->setPhpName('OcCustomerAffiliate');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcCustomerAffiliate');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('company', 'Company', 'VARCHAR', true, 40, null);
        $this->addColumn('website', 'Website', 'VARCHAR', true, 255, null);
        $this->addColumn('tracking', 'Tracking', 'VARCHAR', true, 64, null);
        $this->addColumn('commission', 'Commission', 'DECIMAL', true, 4, 0);
        $this->addColumn('tax', 'Tax', 'VARCHAR', true, 64, null);
        $this->addColumn('payment', 'Payment', 'VARCHAR', true, 6, null);
        $this->addColumn('cheque', 'Cheque', 'VARCHAR', true, 100, null);
        $this->addColumn('paypal', 'Paypal', 'VARCHAR', true, 64, null);
        $this->addColumn('bank_name', 'BankName', 'VARCHAR', true, 64, null);
        $this->addColumn('bank_branch_number', 'BankBranchNumber', 'VARCHAR', true, 64, null);
        $this->addColumn('bank_swift_code', 'BankSwiftCode', 'VARCHAR', true, 64, null);
        $this->addColumn('bank_account_name', 'BankAccountName', 'VARCHAR', true, 64, null);
        $this->addColumn('bank_account_number', 'BankAccountNumber', 'VARCHAR', true, 64, null);
        $this->addColumn('custom_field', 'CustomField', 'LONGVARCHAR', true, null, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, null);
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
        return $withPrefix ? OcCustomerAffiliateTableMap::CLASS_DEFAULT : OcCustomerAffiliateTableMap::OM_CLASS;
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
     * @return array           (OcCustomerAffiliate object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcCustomerAffiliateTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcCustomerAffiliateTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcCustomerAffiliateTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcCustomerAffiliateTableMap::OM_CLASS;
            /** @var OcCustomerAffiliate $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcCustomerAffiliateTableMap::addInstanceToPool($obj, $key);
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
            $key = OcCustomerAffiliateTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcCustomerAffiliateTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcCustomerAffiliate $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcCustomerAffiliateTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_COMPANY);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_WEBSITE);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_TRACKING);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_COMMISSION);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_TAX);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_PAYMENT);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_CHEQUE);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_PAYPAL);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_BANK_NAME);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_BANK_BRANCH_NUMBER);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_BANK_SWIFT_CODE);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NAME);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NUMBER);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_CUSTOM_FIELD);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcCustomerAffiliateTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.company');
            $criteria->addSelectColumn($alias . '.website');
            $criteria->addSelectColumn($alias . '.tracking');
            $criteria->addSelectColumn($alias . '.commission');
            $criteria->addSelectColumn($alias . '.tax');
            $criteria->addSelectColumn($alias . '.payment');
            $criteria->addSelectColumn($alias . '.cheque');
            $criteria->addSelectColumn($alias . '.paypal');
            $criteria->addSelectColumn($alias . '.bank_name');
            $criteria->addSelectColumn($alias . '.bank_branch_number');
            $criteria->addSelectColumn($alias . '.bank_swift_code');
            $criteria->addSelectColumn($alias . '.bank_account_name');
            $criteria->addSelectColumn($alias . '.bank_account_number');
            $criteria->addSelectColumn($alias . '.custom_field');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcCustomerAffiliateTableMap::DATABASE_NAME)->getTable(OcCustomerAffiliateTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcCustomerAffiliateTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcCustomerAffiliateTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcCustomerAffiliateTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcCustomerAffiliate or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcCustomerAffiliate object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerAffiliateTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcCustomerAffiliate) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcCustomerAffiliateTableMap::DATABASE_NAME);
            $criteria->add(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, (array) $values, Criteria::IN);
        }

        $query = OcCustomerAffiliateQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcCustomerAffiliateTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcCustomerAffiliateTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_customer_affiliate table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcCustomerAffiliateQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcCustomerAffiliate or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcCustomerAffiliate object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerAffiliateTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcCustomerAffiliate object
        }


        // Set the correct dbName
        $query = OcCustomerAffiliateQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcCustomerAffiliateTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcCustomerAffiliateTableMap::buildTableMap();
