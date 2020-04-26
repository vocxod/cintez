<?php

namespace Base;

use \OcUpload as ChildOcUpload;
use \OcUploadQuery as ChildOcUploadQuery;
use \Exception;
use \PDO;
use Map\OcUploadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_upload' table.
 *
 *
 *
 * @method     ChildOcUploadQuery orderByUploadId($order = Criteria::ASC) Order by the upload_id column
 * @method     ChildOcUploadQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcUploadQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method     ChildOcUploadQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcUploadQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcUploadQuery groupByUploadId() Group by the upload_id column
 * @method     ChildOcUploadQuery groupByName() Group by the name column
 * @method     ChildOcUploadQuery groupByFilename() Group by the filename column
 * @method     ChildOcUploadQuery groupByCode() Group by the code column
 * @method     ChildOcUploadQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcUploadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcUploadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcUploadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcUploadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcUploadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcUploadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcUpload findOne(ConnectionInterface $con = null) Return the first ChildOcUpload matching the query
 * @method     ChildOcUpload findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcUpload matching the query, or a new ChildOcUpload object populated from the query conditions when no match is found
 *
 * @method     ChildOcUpload findOneByUploadId(int $upload_id) Return the first ChildOcUpload filtered by the upload_id column
 * @method     ChildOcUpload findOneByName(string $name) Return the first ChildOcUpload filtered by the name column
 * @method     ChildOcUpload findOneByFilename(string $filename) Return the first ChildOcUpload filtered by the filename column
 * @method     ChildOcUpload findOneByCode(string $code) Return the first ChildOcUpload filtered by the code column
 * @method     ChildOcUpload findOneByDateAdded(string $date_added) Return the first ChildOcUpload filtered by the date_added column *

 * @method     ChildOcUpload requirePk($key, ConnectionInterface $con = null) Return the ChildOcUpload by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcUpload requireOne(ConnectionInterface $con = null) Return the first ChildOcUpload matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcUpload requireOneByUploadId(int $upload_id) Return the first ChildOcUpload filtered by the upload_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcUpload requireOneByName(string $name) Return the first ChildOcUpload filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcUpload requireOneByFilename(string $filename) Return the first ChildOcUpload filtered by the filename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcUpload requireOneByCode(string $code) Return the first ChildOcUpload filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcUpload requireOneByDateAdded(string $date_added) Return the first ChildOcUpload filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcUpload[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcUpload objects based on current ModelCriteria
 * @method     ChildOcUpload[]|ObjectCollection findByUploadId(int $upload_id) Return ChildOcUpload objects filtered by the upload_id column
 * @method     ChildOcUpload[]|ObjectCollection findByName(string $name) Return ChildOcUpload objects filtered by the name column
 * @method     ChildOcUpload[]|ObjectCollection findByFilename(string $filename) Return ChildOcUpload objects filtered by the filename column
 * @method     ChildOcUpload[]|ObjectCollection findByCode(string $code) Return ChildOcUpload objects filtered by the code column
 * @method     ChildOcUpload[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcUpload objects filtered by the date_added column
 * @method     ChildOcUpload[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcUploadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcUploadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcUpload', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcUploadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcUploadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcUploadQuery) {
            return $criteria;
        }
        $query = new ChildOcUploadQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcUpload|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcUploadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcUploadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOcUpload A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT upload_id, name, filename, code, date_added FROM oc_upload WHERE upload_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOcUpload $obj */
            $obj = new ChildOcUpload();
            $obj->hydrate($row);
            OcUploadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildOcUpload|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildOcUploadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcUploadTableMap::COL_UPLOAD_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcUploadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcUploadTableMap::COL_UPLOAD_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the upload_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUploadId(1234); // WHERE upload_id = 1234
     * $query->filterByUploadId(array(12, 34)); // WHERE upload_id IN (12, 34)
     * $query->filterByUploadId(array('min' => 12)); // WHERE upload_id > 12
     * </code>
     *
     * @param     mixed $uploadId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcUploadQuery The current query, for fluid interface
     */
    public function filterByUploadId($uploadId = null, $comparison = null)
    {
        if (is_array($uploadId)) {
            $useMinMax = false;
            if (isset($uploadId['min'])) {
                $this->addUsingAlias(OcUploadTableMap::COL_UPLOAD_ID, $uploadId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uploadId['max'])) {
                $this->addUsingAlias(OcUploadTableMap::COL_UPLOAD_ID, $uploadId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcUploadTableMap::COL_UPLOAD_ID, $uploadId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcUploadQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcUploadTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
     * $query->filterByFilename('%fooValue%', Criteria::LIKE); // WHERE filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcUploadQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcUploadTableMap::COL_FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcUploadQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcUploadTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the date_added column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAdded('2011-03-14'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded('now'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded(array('max' => 'yesterday')); // WHERE date_added > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAdded The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcUploadQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcUploadTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcUploadTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcUploadTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcUpload $ocUpload Object to remove from the list of results
     *
     * @return $this|ChildOcUploadQuery The current query, for fluid interface
     */
    public function prune($ocUpload = null)
    {
        if ($ocUpload) {
            $this->addUsingAlias(OcUploadTableMap::COL_UPLOAD_ID, $ocUpload->getUploadId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_upload table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcUploadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcUploadTableMap::clearInstancePool();
            OcUploadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcUploadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcUploadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcUploadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcUploadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcUploadQuery
