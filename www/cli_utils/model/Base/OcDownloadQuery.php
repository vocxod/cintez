<?php

namespace Base;

use \OcDownload as ChildOcDownload;
use \OcDownloadQuery as ChildOcDownloadQuery;
use \Exception;
use \PDO;
use Map\OcDownloadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_download' table.
 *
 *
 *
 * @method     ChildOcDownloadQuery orderByDownloadId($order = Criteria::ASC) Order by the download_id column
 * @method     ChildOcDownloadQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method     ChildOcDownloadQuery orderByMask($order = Criteria::ASC) Order by the mask column
 * @method     ChildOcDownloadQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcDownloadQuery groupByDownloadId() Group by the download_id column
 * @method     ChildOcDownloadQuery groupByFilename() Group by the filename column
 * @method     ChildOcDownloadQuery groupByMask() Group by the mask column
 * @method     ChildOcDownloadQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcDownloadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcDownloadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcDownloadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcDownloadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcDownloadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcDownloadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcDownload findOne(ConnectionInterface $con = null) Return the first ChildOcDownload matching the query
 * @method     ChildOcDownload findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcDownload matching the query, or a new ChildOcDownload object populated from the query conditions when no match is found
 *
 * @method     ChildOcDownload findOneByDownloadId(int $download_id) Return the first ChildOcDownload filtered by the download_id column
 * @method     ChildOcDownload findOneByFilename(string $filename) Return the first ChildOcDownload filtered by the filename column
 * @method     ChildOcDownload findOneByMask(string $mask) Return the first ChildOcDownload filtered by the mask column
 * @method     ChildOcDownload findOneByDateAdded(string $date_added) Return the first ChildOcDownload filtered by the date_added column *

 * @method     ChildOcDownload requirePk($key, ConnectionInterface $con = null) Return the ChildOcDownload by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcDownload requireOne(ConnectionInterface $con = null) Return the first ChildOcDownload matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcDownload requireOneByDownloadId(int $download_id) Return the first ChildOcDownload filtered by the download_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcDownload requireOneByFilename(string $filename) Return the first ChildOcDownload filtered by the filename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcDownload requireOneByMask(string $mask) Return the first ChildOcDownload filtered by the mask column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcDownload requireOneByDateAdded(string $date_added) Return the first ChildOcDownload filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcDownload[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcDownload objects based on current ModelCriteria
 * @method     ChildOcDownload[]|ObjectCollection findByDownloadId(int $download_id) Return ChildOcDownload objects filtered by the download_id column
 * @method     ChildOcDownload[]|ObjectCollection findByFilename(string $filename) Return ChildOcDownload objects filtered by the filename column
 * @method     ChildOcDownload[]|ObjectCollection findByMask(string $mask) Return ChildOcDownload objects filtered by the mask column
 * @method     ChildOcDownload[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcDownload objects filtered by the date_added column
 * @method     ChildOcDownload[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcDownloadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcDownloadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcDownload', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcDownloadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcDownloadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcDownloadQuery) {
            return $criteria;
        }
        $query = new ChildOcDownloadQuery();
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
     * @return ChildOcDownload|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcDownloadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcDownloadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcDownload A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT download_id, filename, mask, date_added FROM oc_download WHERE download_id = :p0';
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
            /** @var ChildOcDownload $obj */
            $obj = new ChildOcDownload();
            $obj->hydrate($row);
            OcDownloadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcDownload|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcDownloadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcDownloadTableMap::COL_DOWNLOAD_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcDownloadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcDownloadTableMap::COL_DOWNLOAD_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the download_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDownloadId(1234); // WHERE download_id = 1234
     * $query->filterByDownloadId(array(12, 34)); // WHERE download_id IN (12, 34)
     * $query->filterByDownloadId(array('min' => 12)); // WHERE download_id > 12
     * </code>
     *
     * @param     mixed $downloadId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcDownloadQuery The current query, for fluid interface
     */
    public function filterByDownloadId($downloadId = null, $comparison = null)
    {
        if (is_array($downloadId)) {
            $useMinMax = false;
            if (isset($downloadId['min'])) {
                $this->addUsingAlias(OcDownloadTableMap::COL_DOWNLOAD_ID, $downloadId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($downloadId['max'])) {
                $this->addUsingAlias(OcDownloadTableMap::COL_DOWNLOAD_ID, $downloadId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcDownloadTableMap::COL_DOWNLOAD_ID, $downloadId, $comparison);
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
     * @return $this|ChildOcDownloadQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcDownloadTableMap::COL_FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the mask column
     *
     * Example usage:
     * <code>
     * $query->filterByMask('fooValue');   // WHERE mask = 'fooValue'
     * $query->filterByMask('%fooValue%', Criteria::LIKE); // WHERE mask LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mask The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcDownloadQuery The current query, for fluid interface
     */
    public function filterByMask($mask = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mask)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcDownloadTableMap::COL_MASK, $mask, $comparison);
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
     * @return $this|ChildOcDownloadQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcDownloadTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcDownloadTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcDownloadTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcDownload $ocDownload Object to remove from the list of results
     *
     * @return $this|ChildOcDownloadQuery The current query, for fluid interface
     */
    public function prune($ocDownload = null)
    {
        if ($ocDownload) {
            $this->addUsingAlias(OcDownloadTableMap::COL_DOWNLOAD_ID, $ocDownload->getDownloadId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_download table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcDownloadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcDownloadTableMap::clearInstancePool();
            OcDownloadTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcDownloadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcDownloadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcDownloadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcDownloadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcDownloadQuery
