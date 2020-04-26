<?php

namespace Map;

use \OcReview;
use \OcReviewQuery;
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
 * This class defines the structure of the 'oc_review' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OcReviewTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OcReviewTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oc_review';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OcReview';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OcReview';

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
     * the column name for the review_id field
     */
    const COL_REVIEW_ID = 'oc_review.review_id';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'oc_review.product_id';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'oc_review.customer_id';

    /**
     * the column name for the author field
     */
    const COL_AUTHOR = 'oc_review.author';

    /**
     * the column name for the text field
     */
    const COL_TEXT = 'oc_review.text';

    /**
     * the column name for the rating field
     */
    const COL_RATING = 'oc_review.rating';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oc_review.status';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'oc_review.date_added';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'oc_review.date_modified';

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
        self::TYPE_PHPNAME       => array('ReviewId', 'ProductId', 'CustomerId', 'Author', 'Text', 'Rating', 'Status', 'DateAdded', 'DateModified', ),
        self::TYPE_CAMELNAME     => array('reviewId', 'productId', 'customerId', 'author', 'text', 'rating', 'status', 'dateAdded', 'dateModified', ),
        self::TYPE_COLNAME       => array(OcReviewTableMap::COL_REVIEW_ID, OcReviewTableMap::COL_PRODUCT_ID, OcReviewTableMap::COL_CUSTOMER_ID, OcReviewTableMap::COL_AUTHOR, OcReviewTableMap::COL_TEXT, OcReviewTableMap::COL_RATING, OcReviewTableMap::COL_STATUS, OcReviewTableMap::COL_DATE_ADDED, OcReviewTableMap::COL_DATE_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('review_id', 'product_id', 'customer_id', 'author', 'text', 'rating', 'status', 'date_added', 'date_modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ReviewId' => 0, 'ProductId' => 1, 'CustomerId' => 2, 'Author' => 3, 'Text' => 4, 'Rating' => 5, 'Status' => 6, 'DateAdded' => 7, 'DateModified' => 8, ),
        self::TYPE_CAMELNAME     => array('reviewId' => 0, 'productId' => 1, 'customerId' => 2, 'author' => 3, 'text' => 4, 'rating' => 5, 'status' => 6, 'dateAdded' => 7, 'dateModified' => 8, ),
        self::TYPE_COLNAME       => array(OcReviewTableMap::COL_REVIEW_ID => 0, OcReviewTableMap::COL_PRODUCT_ID => 1, OcReviewTableMap::COL_CUSTOMER_ID => 2, OcReviewTableMap::COL_AUTHOR => 3, OcReviewTableMap::COL_TEXT => 4, OcReviewTableMap::COL_RATING => 5, OcReviewTableMap::COL_STATUS => 6, OcReviewTableMap::COL_DATE_ADDED => 7, OcReviewTableMap::COL_DATE_MODIFIED => 8, ),
        self::TYPE_FIELDNAME     => array('review_id' => 0, 'product_id' => 1, 'customer_id' => 2, 'author' => 3, 'text' => 4, 'rating' => 5, 'status' => 6, 'date_added' => 7, 'date_modified' => 8, ),
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
        $this->setName('oc_review');
        $this->setPhpName('OcReview');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OcReview');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('review_id', 'ReviewId', 'INTEGER', true, null, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('author', 'Author', 'VARCHAR', true, 64, null);
        $this->addColumn('text', 'Text', 'LONGVARCHAR', true, null, null);
        $this->addColumn('rating', 'Rating', 'INTEGER', true, 1, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OcReviewTableMap::CLASS_DEFAULT : OcReviewTableMap::OM_CLASS;
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
     * @return array           (OcReview object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OcReviewTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OcReviewTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OcReviewTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OcReviewTableMap::OM_CLASS;
            /** @var OcReview $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OcReviewTableMap::addInstanceToPool($obj, $key);
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
            $key = OcReviewTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OcReviewTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OcReview $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OcReviewTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OcReviewTableMap::COL_REVIEW_ID);
            $criteria->addSelectColumn(OcReviewTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OcReviewTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(OcReviewTableMap::COL_AUTHOR);
            $criteria->addSelectColumn(OcReviewTableMap::COL_TEXT);
            $criteria->addSelectColumn(OcReviewTableMap::COL_RATING);
            $criteria->addSelectColumn(OcReviewTableMap::COL_STATUS);
            $criteria->addSelectColumn(OcReviewTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OcReviewTableMap::COL_DATE_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.review_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.author');
            $criteria->addSelectColumn($alias . '.text');
            $criteria->addSelectColumn($alias . '.rating');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(OcReviewTableMap::DATABASE_NAME)->getTable(OcReviewTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OcReviewTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OcReviewTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OcReviewTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OcReview or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OcReview object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OcReviewTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OcReview) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OcReviewTableMap::DATABASE_NAME);
            $criteria->add(OcReviewTableMap::COL_REVIEW_ID, (array) $values, Criteria::IN);
        }

        $query = OcReviewQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OcReviewTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OcReviewTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oc_review table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OcReviewQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OcReview or Criteria object.
     *
     * @param mixed               $criteria Criteria or OcReview object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcReviewTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OcReview object
        }

        if ($criteria->containsKey(OcReviewTableMap::COL_REVIEW_ID) && $criteria->keyContainsValue(OcReviewTableMap::COL_REVIEW_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OcReviewTableMap::COL_REVIEW_ID.')');
        }


        // Set the correct dbName
        $query = OcReviewQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OcReviewTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OcReviewTableMap::buildTableMap();
