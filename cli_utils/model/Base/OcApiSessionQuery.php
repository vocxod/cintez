<?php

namespace Base;

use \OcApiSession as ChildOcApiSession;
use \OcApiSessionQuery as ChildOcApiSessionQuery;
use \Exception;
use \PDO;
use Map\OcApiSessionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_api_session' table.
 *
 *
 *
 * @method     ChildOcApiSessionQuery orderByApiSessionId($order = Criteria::ASC) Order by the api_session_id column
 * @method     ChildOcApiSessionQuery orderByApiId($order = Criteria::ASC) Order by the api_id column
 * @method     ChildOcApiSessionQuery orderBySessionId($order = Criteria::ASC) Order by the session_id column
 * @method     ChildOcApiSessionQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildOcApiSessionQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcApiSessionQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 *
 * @method     ChildOcApiSessionQuery groupByApiSessionId() Group by the api_session_id column
 * @method     ChildOcApiSessionQuery groupByApiId() Group by the api_id column
 * @method     ChildOcApiSessionQuery groupBySessionId() Group by the session_id column
 * @method     ChildOcApiSessionQuery groupByIp() Group by the ip column
 * @method     ChildOcApiSessionQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcApiSessionQuery groupByDateModified() Group by the date_modified column
 *
 * @method     ChildOcApiSessionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcApiSessionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcApiSessionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcApiSessionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcApiSessionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcApiSessionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcApiSession findOne(ConnectionInterface $con = null) Return the first ChildOcApiSession matching the query
 * @method     ChildOcApiSession findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcApiSession matching the query, or a new ChildOcApiSession object populated from the query conditions when no match is found
 *
 * @method     ChildOcApiSession findOneByApiSessionId(int $api_session_id) Return the first ChildOcApiSession filtered by the api_session_id column
 * @method     ChildOcApiSession findOneByApiId(int $api_id) Return the first ChildOcApiSession filtered by the api_id column
 * @method     ChildOcApiSession findOneBySessionId(string $session_id) Return the first ChildOcApiSession filtered by the session_id column
 * @method     ChildOcApiSession findOneByIp(string $ip) Return the first ChildOcApiSession filtered by the ip column
 * @method     ChildOcApiSession findOneByDateAdded(string $date_added) Return the first ChildOcApiSession filtered by the date_added column
 * @method     ChildOcApiSession findOneByDateModified(string $date_modified) Return the first ChildOcApiSession filtered by the date_modified column *

 * @method     ChildOcApiSession requirePk($key, ConnectionInterface $con = null) Return the ChildOcApiSession by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiSession requireOne(ConnectionInterface $con = null) Return the first ChildOcApiSession matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcApiSession requireOneByApiSessionId(int $api_session_id) Return the first ChildOcApiSession filtered by the api_session_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiSession requireOneByApiId(int $api_id) Return the first ChildOcApiSession filtered by the api_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiSession requireOneBySessionId(string $session_id) Return the first ChildOcApiSession filtered by the session_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiSession requireOneByIp(string $ip) Return the first ChildOcApiSession filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiSession requireOneByDateAdded(string $date_added) Return the first ChildOcApiSession filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiSession requireOneByDateModified(string $date_modified) Return the first ChildOcApiSession filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcApiSession[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcApiSession objects based on current ModelCriteria
 * @method     ChildOcApiSession[]|ObjectCollection findByApiSessionId(int $api_session_id) Return ChildOcApiSession objects filtered by the api_session_id column
 * @method     ChildOcApiSession[]|ObjectCollection findByApiId(int $api_id) Return ChildOcApiSession objects filtered by the api_id column
 * @method     ChildOcApiSession[]|ObjectCollection findBySessionId(string $session_id) Return ChildOcApiSession objects filtered by the session_id column
 * @method     ChildOcApiSession[]|ObjectCollection findByIp(string $ip) Return ChildOcApiSession objects filtered by the ip column
 * @method     ChildOcApiSession[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcApiSession objects filtered by the date_added column
 * @method     ChildOcApiSession[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcApiSession objects filtered by the date_modified column
 * @method     ChildOcApiSession[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcApiSessionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcApiSessionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcApiSession', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcApiSessionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcApiSessionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcApiSessionQuery) {
            return $criteria;
        }
        $query = new ChildOcApiSessionQuery();
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
     * @return ChildOcApiSession|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcApiSessionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcApiSessionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcApiSession A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT api_session_id, api_id, session_id, ip, date_added, date_modified FROM oc_api_session WHERE api_session_id = :p0';
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
            /** @var ChildOcApiSession $obj */
            $obj = new ChildOcApiSession();
            $obj->hydrate($row);
            OcApiSessionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcApiSession|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcApiSessionTableMap::COL_API_SESSION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcApiSessionTableMap::COL_API_SESSION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the api_session_id column
     *
     * Example usage:
     * <code>
     * $query->filterByApiSessionId(1234); // WHERE api_session_id = 1234
     * $query->filterByApiSessionId(array(12, 34)); // WHERE api_session_id IN (12, 34)
     * $query->filterByApiSessionId(array('min' => 12)); // WHERE api_session_id > 12
     * </code>
     *
     * @param     mixed $apiSessionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function filterByApiSessionId($apiSessionId = null, $comparison = null)
    {
        if (is_array($apiSessionId)) {
            $useMinMax = false;
            if (isset($apiSessionId['min'])) {
                $this->addUsingAlias(OcApiSessionTableMap::COL_API_SESSION_ID, $apiSessionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($apiSessionId['max'])) {
                $this->addUsingAlias(OcApiSessionTableMap::COL_API_SESSION_ID, $apiSessionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiSessionTableMap::COL_API_SESSION_ID, $apiSessionId, $comparison);
    }

    /**
     * Filter the query on the api_id column
     *
     * Example usage:
     * <code>
     * $query->filterByApiId(1234); // WHERE api_id = 1234
     * $query->filterByApiId(array(12, 34)); // WHERE api_id IN (12, 34)
     * $query->filterByApiId(array('min' => 12)); // WHERE api_id > 12
     * </code>
     *
     * @param     mixed $apiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function filterByApiId($apiId = null, $comparison = null)
    {
        if (is_array($apiId)) {
            $useMinMax = false;
            if (isset($apiId['min'])) {
                $this->addUsingAlias(OcApiSessionTableMap::COL_API_ID, $apiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($apiId['max'])) {
                $this->addUsingAlias(OcApiSessionTableMap::COL_API_ID, $apiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiSessionTableMap::COL_API_ID, $apiId, $comparison);
    }

    /**
     * Filter the query on the session_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionId('fooValue');   // WHERE session_id = 'fooValue'
     * $query->filterBySessionId('%fooValue%', Criteria::LIKE); // WHERE session_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function filterBySessionId($sessionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiSessionTableMap::COL_SESSION_ID, $sessionId, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%', Criteria::LIKE); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiSessionTableMap::COL_IP, $ip, $comparison);
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
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcApiSessionTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcApiSessionTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiSessionTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified('2011-03-14'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified('now'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified(array('max' => 'yesterday')); // WHERE date_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcApiSessionTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcApiSessionTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiSessionTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcApiSession $ocApiSession Object to remove from the list of results
     *
     * @return $this|ChildOcApiSessionQuery The current query, for fluid interface
     */
    public function prune($ocApiSession = null)
    {
        if ($ocApiSession) {
            $this->addUsingAlias(OcApiSessionTableMap::COL_API_SESSION_ID, $ocApiSession->getApiSessionId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_api_session table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcApiSessionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcApiSessionTableMap::clearInstancePool();
            OcApiSessionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcApiSessionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcApiSessionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcApiSessionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcApiSessionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcApiSessionQuery
