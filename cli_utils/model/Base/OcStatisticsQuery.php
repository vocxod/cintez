<?php

namespace Base;

use \OcStatistics as ChildOcStatistics;
use \OcStatisticsQuery as ChildOcStatisticsQuery;
use \Exception;
use \PDO;
use Map\OcStatisticsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_statistics' table.
 *
 *
 *
 * @method     ChildOcStatisticsQuery orderByStatisticsId($order = Criteria::ASC) Order by the statistics_id column
 * @method     ChildOcStatisticsQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcStatisticsQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     ChildOcStatisticsQuery groupByStatisticsId() Group by the statistics_id column
 * @method     ChildOcStatisticsQuery groupByCode() Group by the code column
 * @method     ChildOcStatisticsQuery groupByValue() Group by the value column
 *
 * @method     ChildOcStatisticsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcStatisticsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcStatisticsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcStatisticsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcStatisticsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcStatisticsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcStatistics findOne(ConnectionInterface $con = null) Return the first ChildOcStatistics matching the query
 * @method     ChildOcStatistics findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcStatistics matching the query, or a new ChildOcStatistics object populated from the query conditions when no match is found
 *
 * @method     ChildOcStatistics findOneByStatisticsId(int $statistics_id) Return the first ChildOcStatistics filtered by the statistics_id column
 * @method     ChildOcStatistics findOneByCode(string $code) Return the first ChildOcStatistics filtered by the code column
 * @method     ChildOcStatistics findOneByValue(string $value) Return the first ChildOcStatistics filtered by the value column *

 * @method     ChildOcStatistics requirePk($key, ConnectionInterface $con = null) Return the ChildOcStatistics by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcStatistics requireOne(ConnectionInterface $con = null) Return the first ChildOcStatistics matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcStatistics requireOneByStatisticsId(int $statistics_id) Return the first ChildOcStatistics filtered by the statistics_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcStatistics requireOneByCode(string $code) Return the first ChildOcStatistics filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcStatistics requireOneByValue(string $value) Return the first ChildOcStatistics filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcStatistics[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcStatistics objects based on current ModelCriteria
 * @method     ChildOcStatistics[]|ObjectCollection findByStatisticsId(int $statistics_id) Return ChildOcStatistics objects filtered by the statistics_id column
 * @method     ChildOcStatistics[]|ObjectCollection findByCode(string $code) Return ChildOcStatistics objects filtered by the code column
 * @method     ChildOcStatistics[]|ObjectCollection findByValue(string $value) Return ChildOcStatistics objects filtered by the value column
 * @method     ChildOcStatistics[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcStatisticsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcStatisticsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcStatistics', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcStatisticsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcStatisticsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcStatisticsQuery) {
            return $criteria;
        }
        $query = new ChildOcStatisticsQuery();
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
     * @return ChildOcStatistics|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcStatisticsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcStatisticsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcStatistics A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT statistics_id, code, value FROM oc_statistics WHERE statistics_id = :p0';
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
            /** @var ChildOcStatistics $obj */
            $obj = new ChildOcStatistics();
            $obj->hydrate($row);
            OcStatisticsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcStatistics|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcStatisticsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcStatisticsTableMap::COL_STATISTICS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcStatisticsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcStatisticsTableMap::COL_STATISTICS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the statistics_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatisticsId(1234); // WHERE statistics_id = 1234
     * $query->filterByStatisticsId(array(12, 34)); // WHERE statistics_id IN (12, 34)
     * $query->filterByStatisticsId(array('min' => 12)); // WHERE statistics_id > 12
     * </code>
     *
     * @param     mixed $statisticsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcStatisticsQuery The current query, for fluid interface
     */
    public function filterByStatisticsId($statisticsId = null, $comparison = null)
    {
        if (is_array($statisticsId)) {
            $useMinMax = false;
            if (isset($statisticsId['min'])) {
                $this->addUsingAlias(OcStatisticsTableMap::COL_STATISTICS_ID, $statisticsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statisticsId['max'])) {
                $this->addUsingAlias(OcStatisticsTableMap::COL_STATISTICS_ID, $statisticsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcStatisticsTableMap::COL_STATISTICS_ID, $statisticsId, $comparison);
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
     * @return $this|ChildOcStatisticsQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcStatisticsTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcStatisticsQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(OcStatisticsTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(OcStatisticsTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcStatisticsTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcStatistics $ocStatistics Object to remove from the list of results
     *
     * @return $this|ChildOcStatisticsQuery The current query, for fluid interface
     */
    public function prune($ocStatistics = null)
    {
        if ($ocStatistics) {
            $this->addUsingAlias(OcStatisticsTableMap::COL_STATISTICS_ID, $ocStatistics->getStatisticsId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_statistics table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcStatisticsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcStatisticsTableMap::clearInstancePool();
            OcStatisticsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcStatisticsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcStatisticsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcStatisticsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcStatisticsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcStatisticsQuery
