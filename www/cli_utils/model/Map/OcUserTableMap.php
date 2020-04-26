<?php

namespace Map;

use \OcUser;
use \OcUserQuery;
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
 * This class defines the structure of the 'oc_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcUserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcUserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_user';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcUser';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcUser';

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
     * the column name for the user_id field
     */
    const COL_USER_ID = 'oc_user.user_id';

    /**
     * the column name for the user_group_id field
     */
    const COL_USER_GROUP_ID = 'oc_user.user_group_id';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'oc_user.username';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'oc_user.password';

    /**
     * the column name for the salt field
     */
    const COL_SALT = 'oc_user.salt';

    /**
     * the column name for the firstname field
     */
    const COL_FIRSTNAME = 'oc_user.firstname';

    /**
     * the column name for the lastname field
     */
    const COL_LASTNAME = 'oc_user.lastname';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'oc_user.email';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'oc_user.image';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_user.code';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'oc_user.ip';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_user.status';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_user.date_added';

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
        self::TYPE_PHPNAME       => array('UserId', 'UserGroupId', 'Username', 'Password', 'Salt', 'Firstname', 'Lastname', 'Email', 'Image', 'Code', 'Ip', 'Status', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('userId', 'userGroupId', 'username', 'password', 'salt', 'firstname', 'lastname', 'email', 'image', 'code', 'ip', 'status', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcUserTableMap::COL_USER_ID, OcUserTableMap::COL_USER_GROUP_ID, OcUserTableMap::COL_USERNAME, OcUserTableMap::COL_PASSWORD, OcUserTableMap::COL_SALT, OcUserTableMap::COL_FIRSTNAME, OcUserTableMap::COL_LASTNAME, OcUserTableMap::COL_EMAIL, OcUserTableMap::COL_IMAGE, OcUserTableMap::COL_CODE, OcUserTableMap::COL_IP, OcUserTableMap::COL_STATUS, OcUserTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('user_id', 'user_group_id', 'username', 'password', 'salt', 'firstname', 'lastname', 'email', 'image', 'code', 'ip', 'status', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('UserId' => 0, 'UserGroupId' => 1, 'Username' => 2, 'Password' => 3, 'Salt' => 4, 'Firstname' => 5, 'Lastname' => 6, 'Email' => 7, 'Image' => 8, 'Code' => 9, 'Ip' => 10, 'Status' => 11, 'DateAdded' => 12, ),
        self::TYPE_CAMELNAME     => array('userId' => 0, 'userGroupId' => 1, 'username' => 2, 'password' => 3, 'salt' => 4, 'firstname' => 5, 'lastname' => 6, 'email' => 7, 'image' => 8, 'code' => 9, 'ip' => 10, 'status' => 11, 'dateAdded' => 12, ),
        self::TYPE_COLNAME       => array(OcUserTableMap::COL_USER_ID => 0, OcUserTableMap::COL_USER_GROUP_ID => 1, OcUserTableMap::COL_USERNAME => 2, OcUserTableMap::COL_PASSWORD => 3, OcUserTableMap::COL_SALT => 4, OcUserTableMap::COL_FIRSTNAME => 5, OcUserTableMap::COL_LASTNAME => 6, OcUserTableMap::COL_EMAIL => 7, OcUserTableMap::COL_IMAGE => 8, OcUserTableMap::COL_CODE => 9, OcUserTableMap::COL_IP => 10, OcUserTableMap::COL_STATUS => 11, OcUserTableMap::COL_DATE_ADDED => 12, ),
        self::TYPE_FIELDNAME     => array('user_id' => 0, 'user_group_id' => 1, 'username' => 2, 'password' => 3, 'salt' => 4, 'firstname' => 5, 'lastname' => 6, 'email' => 7, 'image' => 8, 'code' => 9, 'ip' => 10, 'status' => 11, 'date_added' => 12, ),
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
        $this->setName('oc_user');
        $this->setPhpName('OcUser');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcUser');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('user_id', 'UserId', 'INTEGER', true, null, null);
        $this->addColumn('user_group_id', 'UserGroupId', 'INTEGER', true, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', true, 20, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('salt', 'Salt', 'VARCHAR', true, 9, null);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 96, null);
        $this->addColumn('image', 'Image', 'VARCHAR', true, 255, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 40, null);
        $this->addColumn('ip', 'Ip', 'VARCHAR', true, 40, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcUserTableMap::CLASS_DEFAULT : OcUserTableMap::OM_CLASS;
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
     * @return array           (OcUser object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcUserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcUserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcUserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcUserTableMap::OM_CLASS;
            /** @var OcUser $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcUserTableMap::addInstanceToPool($obj, $key);
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
            $key = OcUserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcUserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcUser $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcUserTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcUserTableMap::COL_USER_ID);
            $criteria->addSelectColumn(OcUserTableMap::COL_USER_GROUP_ID);
            $criteria->addSelectColumn(OcUserTableMap::COL_USERNAME);
            $criteria->addSelectColumn(OcUserTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(OcUserTableMap::COL_SALT);
            $criteria->addSelectColumn(OcUserTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(OcUserTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(OcUserTableMap::COL_EMAIL);
            $criteria->addSelectColumn(OcUserTableMap::COL_IMAGE);
            $criteria->addSelectColumn(OcUserTableMap::COL_CODE);
            $criteria->addSelectColumn(OcUserTableMap::COL_IP);
            $criteria->addSelectColumn(OcUserTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcUserTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.user_group_id');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.salt');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.ip');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcUserTableMap::DATABASE_NAME)->getTable(OcUserTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcUserTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcUserTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcUserTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcUser or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcUser object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcUserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcUser) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcUserTableMap::DATABASE_NAME);
            $criteria->add(OcUserTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = OcUserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcUserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcUserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcUserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcUser or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcUser object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcUserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcUser object
        }

        if ($criteria->containsKey(OcUserTableMap::COL_USER_ID) && $criteria->keyContainsValue(OcUserTableMap::COL_USER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcUserTableMap::COL_USER_ID.')');
        }


        // Set the correct dbName
        $query = OcUserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcUserTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcUserTableMap::buildTableMap();
