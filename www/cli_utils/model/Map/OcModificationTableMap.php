<?php

namespace Map;

use \OcModification;
use \OcModificationQuery;
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
 * This class defines the structure of the 'oc_modification' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcModificationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcModificationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_modification';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcModification';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcModification';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the modification_id field
     */
    const COL_MODIFICATION_ID = 'oc_modification.modification_id';

    /**
     * the column name for the extension_install_id field
     */
    const COL_EXTENSION_INSTALL_ID = 'oc_modification.extension_install_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'oc_modification.name';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'oc_modification.code';

    /**
     * the column name for the author field
     */
    const COL_AUTHOR = 'oc_modification.author';

    /**
     * the column name for the version field
     */
    const COL_VERSION = 'oc_modification.version';

    /**
     * the column name for the link field
     */
    const COL_LINK = 'oc_modification.link';

    /**
     * the column name for the xml field
     */
    const COL_XML = 'oc_modification.xml';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_modification.status';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_modification.date_added';

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
        self::TYPE_PHPNAME       => array('ModificationId', 'ExtensionInstallId', 'Name', 'Code', 'Author', 'Version', 'Link', 'Xml', 'Status', 'DateAdded', ),
        self::TYPE_CAMELNAME     => array('modificationId', 'extensionInstallId', 'name', 'code', 'author', 'version', 'link', 'xml', 'status', 'dateAdded', ),
        self::TYPE_COLNAME       => array(OcModificationTableMap::COL_MODIFICATION_ID, OcModificationTableMap::COL_EXTENSION_INSTALL_ID, OcModificationTableMap::COL_NAME, OcModificationTableMap::COL_CODE, OcModificationTableMap::COL_AUTHOR, OcModificationTableMap::COL_VERSION, OcModificationTableMap::COL_LINK, OcModificationTableMap::COL_XML, OcModificationTableMap::COL_STATUS, OcModificationTableMap::COL_DATE_ADDED, ),
        self::TYPE_FIELDNAME     => array('modification_id', 'extension_install_id', 'name', 'code', 'author', 'version', 'link', 'xml', 'status', 'date_added', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ModificationId' => 0, 'ExtensionInstallId' => 1, 'Name' => 2, 'Code' => 3, 'Author' => 4, 'Version' => 5, 'Link' => 6, 'Xml' => 7, 'Status' => 8, 'DateAdded' => 9, ),
        self::TYPE_CAMELNAME     => array('modificationId' => 0, 'extensionInstallId' => 1, 'name' => 2, 'code' => 3, 'author' => 4, 'version' => 5, 'link' => 6, 'xml' => 7, 'status' => 8, 'dateAdded' => 9, ),
        self::TYPE_COLNAME       => array(OcModificationTableMap::COL_MODIFICATION_ID => 0, OcModificationTableMap::COL_EXTENSION_INSTALL_ID => 1, OcModificationTableMap::COL_NAME => 2, OcModificationTableMap::COL_CODE => 3, OcModificationTableMap::COL_AUTHOR => 4, OcModificationTableMap::COL_VERSION => 5, OcModificationTableMap::COL_LINK => 6, OcModificationTableMap::COL_XML => 7, OcModificationTableMap::COL_STATUS => 8, OcModificationTableMap::COL_DATE_ADDED => 9, ),
        self::TYPE_FIELDNAME     => array('modification_id' => 0, 'extension_install_id' => 1, 'name' => 2, 'code' => 3, 'author' => 4, 'version' => 5, 'link' => 6, 'xml' => 7, 'status' => 8, 'date_added' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('oc_modification');
        $this->setPhpName('OcModification');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcModification');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('modification_id', 'ModificationId', 'INTEGER', true, null, null);
        $this->addColumn('extension_install_id', 'ExtensionInstallId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 64, null);
        $this->addColumn('author', 'Author', 'VARCHAR', true, 64, null);
        $this->addColumn('version', 'Version', 'VARCHAR', true, 32, null);
        $this->addColumn('link', 'Link', 'VARCHAR', true, 255, null);
        $this->addColumn('xml', 'Xml', 'LONGVARCHAR', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ModificationId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ModificationId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ModificationId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ModificationId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ModificationId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ModificationId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ModificationId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcModificationTableMap::CLASS_DEFAULT : OcModificationTableMap::OM_CLASS;
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
     * @return array           (OcModification object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcModificationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcModificationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcModificationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcModificationTableMap::OM_CLASS;
            /** @var OcModification $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcModificationTableMap::addInstanceToPool($obj, $key);
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
            $key = OcModificationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcModificationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcModification $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcModificationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcModificationTableMap::COL_MODIFICATION_ID);
            $criteria->addSelectColumn(OcModificationTableMap::COL_EXTENSION_INSTALL_ID);
            $criteria->addSelectColumn(OcModificationTableMap::COL_NAME);
            $criteria->addSelectColumn(OcModificationTableMap::COL_CODE);
            $criteria->addSelectColumn(OcModificationTableMap::COL_AUTHOR);
            $criteria->addSelectColumn(OcModificationTableMap::COL_VERSION);
            $criteria->addSelectColumn(OcModificationTableMap::COL_LINK);
            $criteria->addSelectColumn(OcModificationTableMap::COL_XML);
            $criteria->addSelectColumn(OcModificationTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcModificationTableMap::COL_DATE_ADDED);
        } else {
            $criteria->addSelectColumn($alias . '.modification_id');
            $criteria->addSelectColumn($alias . '.extension_install_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.author');
            $criteria->addSelectColumn($alias . '.version');
            $criteria->addSelectColumn($alias . '.link');
            $criteria->addSelectColumn($alias . '.xml');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcModificationTableMap::DATABASE_NAME)->getTable(OcModificationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcModificationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcModificationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcModificationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcModification or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcModification object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcModificationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcModification) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcModificationTableMap::DATABASE_NAME);
            $criteria->add(OcModificationTableMap::COL_MODIFICATION_ID, (array) $values, Criteria::IN);
        }

        $query = OcModificationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcModificationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcModificationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_modification table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcModificationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcModification or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcModification object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcModificationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcModification object
        }

        if ($criteria->containsKey(OcModificationTableMap::COL_MODIFICATION_ID) && $criteria->keyContainsValue(OcModificationTableMap::COL_MODIFICATION_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcModificationTableMap::COL_MODIFICATION_ID.')');
        }


        // Set the correct dbName
        $query = OcModificationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcModificationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcModificationTableMap::buildTableMap();
