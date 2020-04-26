<?php

namespace Map;

use \OcTaxRate;
use \OcTaxRateQuery;
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
 * This class defines the structure of the 'oc_tax_rate' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcTaxRateTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcTaxRateTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_tax_rate';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcTaxRate';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcTaxRate';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the tax_rate_id field
     */
    const COL_TAX_RATE_ID = 'oc_tax_rate.tax_rate_id';

    /**
     * the column name for the geo_zone_id field
     */
    const COL_GEO_ZONE_ID = 'oc_tax_rate.geo_zone_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'oc_tax_rate.name';

    /**
     * the column name for the rate field
     */
    const COL_RATE = 'oc_tax_rate.rate';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'oc_tax_rate.type';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_tax_rate.date_added';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'oc_tax_rate.date_modified';

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
        self::TYPE_PHPNAME       => array('TaxRateId', 'GeoZoneId', 'Name', 'Rate', 'Type', 'DateAdded', 'DateModified', ),
        self::TYPE_CAMELNAME     => array('taxRateId', 'geoZoneId', 'name', 'rate', 'type', 'dateAdded', 'dateModified', ),
        self::TYPE_COLNAME       => array(OcTaxRateTableMap::COL_TAX_RATE_ID, OcTaxRateTableMap::COL_GEO_ZONE_ID, OcTaxRateTableMap::COL_NAME, OcTaxRateTableMap::COL_RATE, OcTaxRateTableMap::COL_TYPE, OcTaxRateTableMap::COL_DATE_ADDED, OcTaxRateTableMap::COL_DATE_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('tax_rate_id', 'geo_zone_id', 'name', 'rate', 'type', 'date_added', 'date_modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('TaxRateId' => 0, 'GeoZoneId' => 1, 'Name' => 2, 'Rate' => 3, 'Type' => 4, 'DateAdded' => 5, 'DateModified' => 6, ),
        self::TYPE_CAMELNAME     => array('taxRateId' => 0, 'geoZoneId' => 1, 'name' => 2, 'rate' => 3, 'type' => 4, 'dateAdded' => 5, 'dateModified' => 6, ),
        self::TYPE_COLNAME       => array(OcTaxRateTableMap::COL_TAX_RATE_ID => 0, OcTaxRateTableMap::COL_GEO_ZONE_ID => 1, OcTaxRateTableMap::COL_NAME => 2, OcTaxRateTableMap::COL_RATE => 3, OcTaxRateTableMap::COL_TYPE => 4, OcTaxRateTableMap::COL_DATE_ADDED => 5, OcTaxRateTableMap::COL_DATE_MODIFIED => 6, ),
        self::TYPE_FIELDNAME     => array('tax_rate_id' => 0, 'geo_zone_id' => 1, 'name' => 2, 'rate' => 3, 'type' => 4, 'date_added' => 5, 'date_modified' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('oc_tax_rate');
        $this->setPhpName('OcTaxRate');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcTaxRate');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('tax_rate_id', 'TaxRateId', 'INTEGER', true, null, null);
        $this->addColumn('geo_zone_id', 'GeoZoneId', 'INTEGER', true, null, 0);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('rate', 'Rate', 'DECIMAL', true, 15, 0);
        $this->addColumn('type', 'Type', 'CHAR', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaxRateId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaxRateId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaxRateId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaxRateId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaxRateId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaxRateId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('TaxRateId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcTaxRateTableMap::CLASS_DEFAULT : OcTaxRateTableMap::OM_CLASS;
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
     * @return array           (OcTaxRate object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcTaxRateTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcTaxRateTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcTaxRateTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcTaxRateTableMap::OM_CLASS;
            /** @var OcTaxRate $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcTaxRateTableMap::addInstanceToPool($obj, $key);
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
            $key = OcTaxRateTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcTaxRateTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcTaxRate $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcTaxRateTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcTaxRateTableMap::COL_TAX_RATE_ID);
            $criteria->addSelectColumn(OcTaxRateTableMap::COL_GEO_ZONE_ID);
            $criteria->addSelectColumn(OcTaxRateTableMap::COL_NAME);
            $criteria->addSelectColumn(OcTaxRateTableMap::COL_RATE);
            $criteria->addSelectColumn(OcTaxRateTableMap::COL_TYPE);
            $criteria->addSelectColumn(OcTaxRateTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OcTaxRateTableMap::COL_DATE_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.tax_rate_id');
            $criteria->addSelectColumn($alias . '.geo_zone_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.rate');
            $criteria->addSelectColumn($alias . '.type');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcTaxRateTableMap::DATABASE_NAME)->getTable(OcTaxRateTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcTaxRateTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcTaxRateTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcTaxRateTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcTaxRate or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcTaxRate object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcTaxRateTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcTaxRate) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcTaxRateTableMap::DATABASE_NAME);
            $criteria->add(OcTaxRateTableMap::COL_TAX_RATE_ID, (array) $values, Criteria::IN);
        }

        $query = OcTaxRateQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcTaxRateTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcTaxRateTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_tax_rate table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcTaxRateQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcTaxRate or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcTaxRate object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcTaxRateTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcTaxRate object
        }

        if ($criteria->containsKey(OcTaxRateTableMap::COL_TAX_RATE_ID) && $criteria->keyContainsValue(OcTaxRateTableMap::COL_TAX_RATE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcTaxRateTableMap::COL_TAX_RATE_ID.')');
        }


        // Set the correct dbName
        $query = OcTaxRateQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcTaxRateTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcTaxRateTableMap::buildTableMap();
