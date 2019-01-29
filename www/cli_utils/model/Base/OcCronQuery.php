<?php

namespace Base;

use \OcCron as ChildOcCron;
use \OcCronQuery as ChildOcCronQuery;
use \Exception;
use \PDO;
use Map\OcCronTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_cron' table.
 *
 *
 *
 * @method     ChildOcCronQuery orderByCronId($order = Criteria::ASC) Order by the cron_id column
 * @method     ChildOcCronQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcCronQuery orderByCycle($order = Criteria::ASC) Order by the cycle column
 * @method     ChildOcCronQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ChildOcCronQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcCronQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcCronQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 *
 * @method     ChildOcCronQuery groupByCronId() Group by the cron_id column
 * @method     ChildOcCronQuery groupByCode() Group by the code column
 * @method     ChildOcCronQuery groupByCycle() Group by the cycle column
 * @method     ChildOcCronQuery groupByAction() Group by the action column
 * @method     ChildOcCronQuery groupByStatus() Group by the status column
 * @method     ChildOcCronQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcCronQuery groupByDateModified() Group by the date_modified column
 *
 * @method     ChildOcCronQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCronQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCronQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCronQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCronQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCronQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCron findOne(ConnectionInterface $con = null) Return the first ChildOcCron matching the query
 * @method     ChildOcCron findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCron matching the query, or a new ChildOcCron object populated from the query conditions when no match is found
 *
 * @method     ChildOcCron findOneByCronId(int $cron_id) Return the first ChildOcCron filtered by the cron_id column
 * @method     ChildOcCron findOneByCode(string $code) Return the first ChildOcCron filtered by the code column
 * @method     ChildOcCron findOneByCycle(string $cycle) Return the first ChildOcCron filtered by the cycle column
 * @method     ChildOcCron findOneByAction(string $action) Return the first ChildOcCron filtered by the action column
 * @method     ChildOcCron findOneByStatus(boolean $status) Return the first ChildOcCron filtered by the status column
 * @method     ChildOcCron findOneByDateAdded(string $date_added) Return the first ChildOcCron filtered by the date_added column
 * @method     ChildOcCron findOneByDateModified(string $date_modified) Return the first ChildOcCron filtered by the date_modified column *

 * @method     ChildOcCron requirePk($key, ConnectionInterface $con = null) Return the ChildOcCron by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCron requireOne(ConnectionInterface $con = null) Return the first ChildOcCron matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCron requireOneByCronId(int $cron_id) Return the first ChildOcCron filtered by the cron_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCron requireOneByCode(string $code) Return the first ChildOcCron filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCron requireOneByCycle(string $cycle) Return the first ChildOcCron filtered by the cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCron requireOneByAction(string $action) Return the first ChildOcCron filtered by the action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCron requireOneByStatus(boolean $status) Return the first ChildOcCron filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCron requireOneByDateAdded(string $date_added) Return the first ChildOcCron filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCron requireOneByDateModified(string $date_modified) Return the first ChildOcCron filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCron[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCron objects based on current ModelCriteria
 * @method     ChildOcCron[]|ObjectCollection findByCronId(int $cron_id) Return ChildOcCron objects filtered by the cron_id column
 * @method     ChildOcCron[]|ObjectCollection findByCode(string $code) Return ChildOcCron objects filtered by the code column
 * @method     ChildOcCron[]|ObjectCollection findByCycle(string $cycle) Return ChildOcCron objects filtered by the cycle column
 * @method     ChildOcCron[]|ObjectCollection findByAction(string $action) Return ChildOcCron objects filtered by the action column
 * @method     ChildOcCron[]|ObjectCollection findByStatus(boolean $status) Return ChildOcCron objects filtered by the status column
 * @method     ChildOcCron[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCron objects filtered by the date_added column
 * @method     ChildOcCron[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcCron objects filtered by the date_modified column
 * @method     ChildOcCron[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCronQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCronQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCron', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCronQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCronQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCronQuery) {
            return $criteria;
        }
        $query = new ChildOcCronQuery();
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
     * @return ChildOcCron|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCronTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCronTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCron A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT cron_id, code, cycle, action, status, date_added, date_modified FROM oc_cron WHERE cron_id = :p0';
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
            /** @var ChildOcCron $obj */
            $obj = new ChildOcCron();
            $obj->hydrate($row);
            OcCronTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCron|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCronTableMap::COL_CRON_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCronTableMap::COL_CRON_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the cron_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCronId(1234); // WHERE cron_id = 1234
     * $query->filterByCronId(array(12, 34)); // WHERE cron_id IN (12, 34)
     * $query->filterByCronId(array('min' => 12)); // WHERE cron_id > 12
     * </code>
     *
     * @param     mixed $cronId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByCronId($cronId = null, $comparison = null)
    {
        if (is_array($cronId)) {
            $useMinMax = false;
            if (isset($cronId['min'])) {
                $this->addUsingAlias(OcCronTableMap::COL_CRON_ID, $cronId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cronId['max'])) {
                $this->addUsingAlias(OcCronTableMap::COL_CRON_ID, $cronId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCronTableMap::COL_CRON_ID, $cronId, $comparison);
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
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCronTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByCycle('fooValue');   // WHERE cycle = 'fooValue'
     * $query->filterByCycle('%fooValue%', Criteria::LIKE); // WHERE cycle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cycle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByCycle($cycle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cycle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCronTableMap::COL_CYCLE, $cycle, $comparison);
    }

    /**
     * Filter the query on the action column
     *
     * Example usage:
     * <code>
     * $query->filterByAction('fooValue');   // WHERE action = 'fooValue'
     * $query->filterByAction('%fooValue%', Criteria::LIKE); // WHERE action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $action The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByAction($action = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($action)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCronTableMap::COL_ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCronTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCronTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCronTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCronTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
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
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcCronTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcCronTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCronTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCron $ocCron Object to remove from the list of results
     *
     * @return $this|ChildOcCronQuery The current query, for fluid interface
     */
    public function prune($ocCron = null)
    {
        if ($ocCron) {
            $this->addUsingAlias(OcCronTableMap::COL_CRON_ID, $ocCron->getCronId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_cron table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCronTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCronTableMap::clearInstancePool();
            OcCronTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCronTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCronTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCronTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCronTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCronQuery
