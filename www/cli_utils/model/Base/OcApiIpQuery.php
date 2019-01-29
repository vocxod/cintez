<?php

namespace Base;

use \OcApiIp as ChildOcApiIp;
use \OcApiIpQuery as ChildOcApiIpQuery;
use \Exception;
use \PDO;
use Map\OcApiIpTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_api_ip' table.
 *
 *
 *
 * @method     ChildOcApiIpQuery orderByApiIpId($order = Criteria::ASC) Order by the api_ip_id column
 * @method     ChildOcApiIpQuery orderByApiId($order = Criteria::ASC) Order by the api_id column
 * @method     ChildOcApiIpQuery orderByIp($order = Criteria::ASC) Order by the ip column
 *
 * @method     ChildOcApiIpQuery groupByApiIpId() Group by the api_ip_id column
 * @method     ChildOcApiIpQuery groupByApiId() Group by the api_id column
 * @method     ChildOcApiIpQuery groupByIp() Group by the ip column
 *
 * @method     ChildOcApiIpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcApiIpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcApiIpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcApiIpQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcApiIpQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcApiIpQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcApiIp findOne(ConnectionInterface $con = null) Return the first ChildOcApiIp matching the query
 * @method     ChildOcApiIp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcApiIp matching the query, or a new ChildOcApiIp object populated from the query conditions when no match is found
 *
 * @method     ChildOcApiIp findOneByApiIpId(int $api_ip_id) Return the first ChildOcApiIp filtered by the api_ip_id column
 * @method     ChildOcApiIp findOneByApiId(int $api_id) Return the first ChildOcApiIp filtered by the api_id column
 * @method     ChildOcApiIp findOneByIp(string $ip) Return the first ChildOcApiIp filtered by the ip column *

 * @method     ChildOcApiIp requirePk($key, ConnectionInterface $con = null) Return the ChildOcApiIp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiIp requireOne(ConnectionInterface $con = null) Return the first ChildOcApiIp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcApiIp requireOneByApiIpId(int $api_ip_id) Return the first ChildOcApiIp filtered by the api_ip_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiIp requireOneByApiId(int $api_id) Return the first ChildOcApiIp filtered by the api_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcApiIp requireOneByIp(string $ip) Return the first ChildOcApiIp filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcApiIp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcApiIp objects based on current ModelCriteria
 * @method     ChildOcApiIp[]|ObjectCollection findByApiIpId(int $api_ip_id) Return ChildOcApiIp objects filtered by the api_ip_id column
 * @method     ChildOcApiIp[]|ObjectCollection findByApiId(int $api_id) Return ChildOcApiIp objects filtered by the api_id column
 * @method     ChildOcApiIp[]|ObjectCollection findByIp(string $ip) Return ChildOcApiIp objects filtered by the ip column
 * @method     ChildOcApiIp[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcApiIpQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcApiIpQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcApiIp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcApiIpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcApiIpQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcApiIpQuery) {
            return $criteria;
        }
        $query = new ChildOcApiIpQuery();
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
     * @return ChildOcApiIp|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcApiIpTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcApiIpTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcApiIp A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT api_ip_id, api_id, ip FROM oc_api_ip WHERE api_ip_id = :p0';
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
            /** @var ChildOcApiIp $obj */
            $obj = new ChildOcApiIp();
            $obj->hydrate($row);
            OcApiIpTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcApiIp|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcApiIpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcApiIpTableMap::COL_API_IP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcApiIpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcApiIpTableMap::COL_API_IP_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the api_ip_id column
     *
     * Example usage:
     * <code>
     * $query->filterByApiIpId(1234); // WHERE api_ip_id = 1234
     * $query->filterByApiIpId(array(12, 34)); // WHERE api_ip_id IN (12, 34)
     * $query->filterByApiIpId(array('min' => 12)); // WHERE api_ip_id > 12
     * </code>
     *
     * @param     mixed $apiIpId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcApiIpQuery The current query, for fluid interface
     */
    public function filterByApiIpId($apiIpId = null, $comparison = null)
    {
        if (is_array($apiIpId)) {
            $useMinMax = false;
            if (isset($apiIpId['min'])) {
                $this->addUsingAlias(OcApiIpTableMap::COL_API_IP_ID, $apiIpId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($apiIpId['max'])) {
                $this->addUsingAlias(OcApiIpTableMap::COL_API_IP_ID, $apiIpId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiIpTableMap::COL_API_IP_ID, $apiIpId, $comparison);
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
     * @return $this|ChildOcApiIpQuery The current query, for fluid interface
     */
    public function filterByApiId($apiId = null, $comparison = null)
    {
        if (is_array($apiId)) {
            $useMinMax = false;
            if (isset($apiId['min'])) {
                $this->addUsingAlias(OcApiIpTableMap::COL_API_ID, $apiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($apiId['max'])) {
                $this->addUsingAlias(OcApiIpTableMap::COL_API_ID, $apiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiIpTableMap::COL_API_ID, $apiId, $comparison);
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
     * @return $this|ChildOcApiIpQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcApiIpTableMap::COL_IP, $ip, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcApiIp $ocApiIp Object to remove from the list of results
     *
     * @return $this|ChildOcApiIpQuery The current query, for fluid interface
     */
    public function prune($ocApiIp = null)
    {
        if ($ocApiIp) {
            $this->addUsingAlias(OcApiIpTableMap::COL_API_IP_ID, $ocApiIp->getApiIpId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_api_ip table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcApiIpTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcApiIpTableMap::clearInstancePool();
            OcApiIpTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcApiIpTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcApiIpTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcApiIpTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcApiIpTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcApiIpQuery
