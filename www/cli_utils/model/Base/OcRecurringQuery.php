<?php

namespace Base;

use \OcRecurring as ChildOcRecurring;
use \OcRecurringQuery as ChildOcRecurringQuery;
use \Exception;
use \PDO;
use Map\OcRecurringTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_recurring' table.
 *
 *
 *
 * @method     ChildOcRecurringQuery orderByRecurringId($order = Criteria::ASC) Order by the recurring_id column
 * @method     ChildOcRecurringQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildOcRecurringQuery orderByFrequency($order = Criteria::ASC) Order by the frequency column
 * @method     ChildOcRecurringQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method     ChildOcRecurringQuery orderByCycle($order = Criteria::ASC) Order by the cycle column
 * @method     ChildOcRecurringQuery orderByTrialStatus($order = Criteria::ASC) Order by the trial_status column
 * @method     ChildOcRecurringQuery orderByTrialPrice($order = Criteria::ASC) Order by the trial_price column
 * @method     ChildOcRecurringQuery orderByTrialFrequency($order = Criteria::ASC) Order by the trial_frequency column
 * @method     ChildOcRecurringQuery orderByTrialDuration($order = Criteria::ASC) Order by the trial_duration column
 * @method     ChildOcRecurringQuery orderByTrialCycle($order = Criteria::ASC) Order by the trial_cycle column
 * @method     ChildOcRecurringQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcRecurringQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcRecurringQuery groupByRecurringId() Group by the recurring_id column
 * @method     ChildOcRecurringQuery groupByPrice() Group by the price column
 * @method     ChildOcRecurringQuery groupByFrequency() Group by the frequency column
 * @method     ChildOcRecurringQuery groupByDuration() Group by the duration column
 * @method     ChildOcRecurringQuery groupByCycle() Group by the cycle column
 * @method     ChildOcRecurringQuery groupByTrialStatus() Group by the trial_status column
 * @method     ChildOcRecurringQuery groupByTrialPrice() Group by the trial_price column
 * @method     ChildOcRecurringQuery groupByTrialFrequency() Group by the trial_frequency column
 * @method     ChildOcRecurringQuery groupByTrialDuration() Group by the trial_duration column
 * @method     ChildOcRecurringQuery groupByTrialCycle() Group by the trial_cycle column
 * @method     ChildOcRecurringQuery groupByStatus() Group by the status column
 * @method     ChildOcRecurringQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcRecurringQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcRecurringQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcRecurringQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcRecurringQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcRecurringQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcRecurringQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcRecurring findOne(ConnectionInterface $con = null) Return the first ChildOcRecurring matching the query
 * @method     ChildOcRecurring findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcRecurring matching the query, or a new ChildOcRecurring object populated from the query conditions when no match is found
 *
 * @method     ChildOcRecurring findOneByRecurringId(int $recurring_id) Return the first ChildOcRecurring filtered by the recurring_id column
 * @method     ChildOcRecurring findOneByPrice(string $price) Return the first ChildOcRecurring filtered by the price column
 * @method     ChildOcRecurring findOneByFrequency(string $frequency) Return the first ChildOcRecurring filtered by the frequency column
 * @method     ChildOcRecurring findOneByDuration(int $duration) Return the first ChildOcRecurring filtered by the duration column
 * @method     ChildOcRecurring findOneByCycle(int $cycle) Return the first ChildOcRecurring filtered by the cycle column
 * @method     ChildOcRecurring findOneByTrialStatus(int $trial_status) Return the first ChildOcRecurring filtered by the trial_status column
 * @method     ChildOcRecurring findOneByTrialPrice(string $trial_price) Return the first ChildOcRecurring filtered by the trial_price column
 * @method     ChildOcRecurring findOneByTrialFrequency(string $trial_frequency) Return the first ChildOcRecurring filtered by the trial_frequency column
 * @method     ChildOcRecurring findOneByTrialDuration(int $trial_duration) Return the first ChildOcRecurring filtered by the trial_duration column
 * @method     ChildOcRecurring findOneByTrialCycle(int $trial_cycle) Return the first ChildOcRecurring filtered by the trial_cycle column
 * @method     ChildOcRecurring findOneByStatus(int $status) Return the first ChildOcRecurring filtered by the status column
 * @method     ChildOcRecurring findOneBySortOrder(int $sort_order) Return the first ChildOcRecurring filtered by the sort_order column *

 * @method     ChildOcRecurring requirePk($key, ConnectionInterface $con = null) Return the ChildOcRecurring by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOne(ConnectionInterface $con = null) Return the first ChildOcRecurring matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcRecurring requireOneByRecurringId(int $recurring_id) Return the first ChildOcRecurring filtered by the recurring_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByPrice(string $price) Return the first ChildOcRecurring filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByFrequency(string $frequency) Return the first ChildOcRecurring filtered by the frequency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByDuration(int $duration) Return the first ChildOcRecurring filtered by the duration column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByCycle(int $cycle) Return the first ChildOcRecurring filtered by the cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByTrialStatus(int $trial_status) Return the first ChildOcRecurring filtered by the trial_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByTrialPrice(string $trial_price) Return the first ChildOcRecurring filtered by the trial_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByTrialFrequency(string $trial_frequency) Return the first ChildOcRecurring filtered by the trial_frequency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByTrialDuration(int $trial_duration) Return the first ChildOcRecurring filtered by the trial_duration column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByTrialCycle(int $trial_cycle) Return the first ChildOcRecurring filtered by the trial_cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneByStatus(int $status) Return the first ChildOcRecurring filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcRecurring requireOneBySortOrder(int $sort_order) Return the first ChildOcRecurring filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcRecurring[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcRecurring objects based on current ModelCriteria
 * @method     ChildOcRecurring[]|ObjectCollection findByRecurringId(int $recurring_id) Return ChildOcRecurring objects filtered by the recurring_id column
 * @method     ChildOcRecurring[]|ObjectCollection findByPrice(string $price) Return ChildOcRecurring objects filtered by the price column
 * @method     ChildOcRecurring[]|ObjectCollection findByFrequency(string $frequency) Return ChildOcRecurring objects filtered by the frequency column
 * @method     ChildOcRecurring[]|ObjectCollection findByDuration(int $duration) Return ChildOcRecurring objects filtered by the duration column
 * @method     ChildOcRecurring[]|ObjectCollection findByCycle(int $cycle) Return ChildOcRecurring objects filtered by the cycle column
 * @method     ChildOcRecurring[]|ObjectCollection findByTrialStatus(int $trial_status) Return ChildOcRecurring objects filtered by the trial_status column
 * @method     ChildOcRecurring[]|ObjectCollection findByTrialPrice(string $trial_price) Return ChildOcRecurring objects filtered by the trial_price column
 * @method     ChildOcRecurring[]|ObjectCollection findByTrialFrequency(string $trial_frequency) Return ChildOcRecurring objects filtered by the trial_frequency column
 * @method     ChildOcRecurring[]|ObjectCollection findByTrialDuration(int $trial_duration) Return ChildOcRecurring objects filtered by the trial_duration column
 * @method     ChildOcRecurring[]|ObjectCollection findByTrialCycle(int $trial_cycle) Return ChildOcRecurring objects filtered by the trial_cycle column
 * @method     ChildOcRecurring[]|ObjectCollection findByStatus(int $status) Return ChildOcRecurring objects filtered by the status column
 * @method     ChildOcRecurring[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcRecurring objects filtered by the sort_order column
 * @method     ChildOcRecurring[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcRecurringQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcRecurringQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcRecurring', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcRecurringQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcRecurringQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcRecurringQuery) {
            return $criteria;
        }
        $query = new ChildOcRecurringQuery();
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
     * @return ChildOcRecurring|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcRecurringTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcRecurringTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcRecurring A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT recurring_id, price, frequency, duration, cycle, trial_status, trial_price, trial_frequency, trial_duration, trial_cycle, status, sort_order FROM oc_recurring WHERE recurring_id = :p0';
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
            /** @var ChildOcRecurring $obj */
            $obj = new ChildOcRecurring();
            $obj->hydrate($row);
            OcRecurringTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcRecurring|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcRecurringTableMap::COL_RECURRING_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcRecurringTableMap::COL_RECURRING_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the recurring_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRecurringId(1234); // WHERE recurring_id = 1234
     * $query->filterByRecurringId(array(12, 34)); // WHERE recurring_id IN (12, 34)
     * $query->filterByRecurringId(array('min' => 12)); // WHERE recurring_id > 12
     * </code>
     *
     * @param     mixed $recurringId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringId($recurringId = null, $comparison = null)
    {
        if (is_array($recurringId)) {
            $useMinMax = false;
            if (isset($recurringId['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_RECURRING_ID, $recurringId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recurringId['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_RECURRING_ID, $recurringId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_RECURRING_ID, $recurringId, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the frequency column
     *
     * Example usage:
     * <code>
     * $query->filterByFrequency('fooValue');   // WHERE frequency = 'fooValue'
     * $query->filterByFrequency('%fooValue%', Criteria::LIKE); // WHERE frequency LIKE '%fooValue%'
     * </code>
     *
     * @param     string $frequency The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByFrequency($frequency = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($frequency)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_FREQUENCY, $frequency, $comparison);
    }

    /**
     * Filter the query on the duration column
     *
     * Example usage:
     * <code>
     * $query->filterByDuration(1234); // WHERE duration = 1234
     * $query->filterByDuration(array(12, 34)); // WHERE duration IN (12, 34)
     * $query->filterByDuration(array('min' => 12)); // WHERE duration > 12
     * </code>
     *
     * @param     mixed $duration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByDuration($duration = null, $comparison = null)
    {
        if (is_array($duration)) {
            $useMinMax = false;
            if (isset($duration['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_DURATION, $duration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duration['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_DURATION, $duration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_DURATION, $duration, $comparison);
    }

    /**
     * Filter the query on the cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByCycle(1234); // WHERE cycle = 1234
     * $query->filterByCycle(array(12, 34)); // WHERE cycle IN (12, 34)
     * $query->filterByCycle(array('min' => 12)); // WHERE cycle > 12
     * </code>
     *
     * @param     mixed $cycle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByCycle($cycle = null, $comparison = null)
    {
        if (is_array($cycle)) {
            $useMinMax = false;
            if (isset($cycle['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_CYCLE, $cycle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cycle['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_CYCLE, $cycle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_CYCLE, $cycle, $comparison);
    }

    /**
     * Filter the query on the trial_status column
     *
     * Example usage:
     * <code>
     * $query->filterByTrialStatus(1234); // WHERE trial_status = 1234
     * $query->filterByTrialStatus(array(12, 34)); // WHERE trial_status IN (12, 34)
     * $query->filterByTrialStatus(array('min' => 12)); // WHERE trial_status > 12
     * </code>
     *
     * @param     mixed $trialStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialStatus($trialStatus = null, $comparison = null)
    {
        if (is_array($trialStatus)) {
            $useMinMax = false;
            if (isset($trialStatus['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_STATUS, $trialStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trialStatus['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_STATUS, $trialStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_STATUS, $trialStatus, $comparison);
    }

    /**
     * Filter the query on the trial_price column
     *
     * Example usage:
     * <code>
     * $query->filterByTrialPrice(1234); // WHERE trial_price = 1234
     * $query->filterByTrialPrice(array(12, 34)); // WHERE trial_price IN (12, 34)
     * $query->filterByTrialPrice(array('min' => 12)); // WHERE trial_price > 12
     * </code>
     *
     * @param     mixed $trialPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialPrice($trialPrice = null, $comparison = null)
    {
        if (is_array($trialPrice)) {
            $useMinMax = false;
            if (isset($trialPrice['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_PRICE, $trialPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trialPrice['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_PRICE, $trialPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_PRICE, $trialPrice, $comparison);
    }

    /**
     * Filter the query on the trial_frequency column
     *
     * Example usage:
     * <code>
     * $query->filterByTrialFrequency('fooValue');   // WHERE trial_frequency = 'fooValue'
     * $query->filterByTrialFrequency('%fooValue%', Criteria::LIKE); // WHERE trial_frequency LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trialFrequency The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialFrequency($trialFrequency = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trialFrequency)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_FREQUENCY, $trialFrequency, $comparison);
    }

    /**
     * Filter the query on the trial_duration column
     *
     * Example usage:
     * <code>
     * $query->filterByTrialDuration(1234); // WHERE trial_duration = 1234
     * $query->filterByTrialDuration(array(12, 34)); // WHERE trial_duration IN (12, 34)
     * $query->filterByTrialDuration(array('min' => 12)); // WHERE trial_duration > 12
     * </code>
     *
     * @param     mixed $trialDuration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialDuration($trialDuration = null, $comparison = null)
    {
        if (is_array($trialDuration)) {
            $useMinMax = false;
            if (isset($trialDuration['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_DURATION, $trialDuration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trialDuration['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_DURATION, $trialDuration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_DURATION, $trialDuration, $comparison);
    }

    /**
     * Filter the query on the trial_cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByTrialCycle(1234); // WHERE trial_cycle = 1234
     * $query->filterByTrialCycle(array(12, 34)); // WHERE trial_cycle IN (12, 34)
     * $query->filterByTrialCycle(array('min' => 12)); // WHERE trial_cycle > 12
     * </code>
     *
     * @param     mixed $trialCycle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialCycle($trialCycle = null, $comparison = null)
    {
        if (is_array($trialCycle)) {
            $useMinMax = false;
            if (isset($trialCycle['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_CYCLE, $trialCycle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trialCycle['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_CYCLE, $trialCycle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_TRIAL_CYCLE, $trialCycle, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the sort_order column
     *
     * Example usage:
     * <code>
     * $query->filterBySortOrder(1234); // WHERE sort_order = 1234
     * $query->filterBySortOrder(array(12, 34)); // WHERE sort_order IN (12, 34)
     * $query->filterBySortOrder(array('min' => 12)); // WHERE sort_order > 12
     * </code>
     *
     * @param     mixed $sortOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcRecurringTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcRecurringTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcRecurring $ocRecurring Object to remove from the list of results
     *
     * @return $this|ChildOcRecurringQuery The current query, for fluid interface
     */
    public function prune($ocRecurring = null)
    {
        if ($ocRecurring) {
            $this->addUsingAlias(OcRecurringTableMap::COL_RECURRING_ID, $ocRecurring->getRecurringId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_recurring table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcRecurringTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcRecurringTableMap::clearInstancePool();
            OcRecurringTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcRecurringTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcRecurringTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcRecurringTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcRecurringTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcRecurringQuery
