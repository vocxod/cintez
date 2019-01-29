<?php

namespace Base;

use \OcOrderRecurring as ChildOcOrderRecurring;
use \OcOrderRecurringQuery as ChildOcOrderRecurringQuery;
use \Exception;
use \PDO;
use Map\OcOrderRecurringTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_order_recurring' table.
 *
 *
 *
 * @method     ChildOcOrderRecurringQuery orderByOrderRecurringId($order = Criteria::ASC) Order by the order_recurring_id column
 * @method     ChildOcOrderRecurringQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcOrderRecurringQuery orderByReference($order = Criteria::ASC) Order by the reference column
 * @method     ChildOcOrderRecurringQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcOrderRecurringQuery orderByProductName($order = Criteria::ASC) Order by the product_name column
 * @method     ChildOcOrderRecurringQuery orderByProductQuantity($order = Criteria::ASC) Order by the product_quantity column
 * @method     ChildOcOrderRecurringQuery orderByRecurringId($order = Criteria::ASC) Order by the recurring_id column
 * @method     ChildOcOrderRecurringQuery orderByRecurringName($order = Criteria::ASC) Order by the recurring_name column
 * @method     ChildOcOrderRecurringQuery orderByRecurringDescription($order = Criteria::ASC) Order by the recurring_description column
 * @method     ChildOcOrderRecurringQuery orderByRecurringFrequency($order = Criteria::ASC) Order by the recurring_frequency column
 * @method     ChildOcOrderRecurringQuery orderByRecurringCycle($order = Criteria::ASC) Order by the recurring_cycle column
 * @method     ChildOcOrderRecurringQuery orderByRecurringDuration($order = Criteria::ASC) Order by the recurring_duration column
 * @method     ChildOcOrderRecurringQuery orderByRecurringPrice($order = Criteria::ASC) Order by the recurring_price column
 * @method     ChildOcOrderRecurringQuery orderByTrial($order = Criteria::ASC) Order by the trial column
 * @method     ChildOcOrderRecurringQuery orderByTrialFrequency($order = Criteria::ASC) Order by the trial_frequency column
 * @method     ChildOcOrderRecurringQuery orderByTrialCycle($order = Criteria::ASC) Order by the trial_cycle column
 * @method     ChildOcOrderRecurringQuery orderByTrialDuration($order = Criteria::ASC) Order by the trial_duration column
 * @method     ChildOcOrderRecurringQuery orderByTrialPrice($order = Criteria::ASC) Order by the trial_price column
 * @method     ChildOcOrderRecurringQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcOrderRecurringQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcOrderRecurringQuery groupByOrderRecurringId() Group by the order_recurring_id column
 * @method     ChildOcOrderRecurringQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcOrderRecurringQuery groupByReference() Group by the reference column
 * @method     ChildOcOrderRecurringQuery groupByProductId() Group by the product_id column
 * @method     ChildOcOrderRecurringQuery groupByProductName() Group by the product_name column
 * @method     ChildOcOrderRecurringQuery groupByProductQuantity() Group by the product_quantity column
 * @method     ChildOcOrderRecurringQuery groupByRecurringId() Group by the recurring_id column
 * @method     ChildOcOrderRecurringQuery groupByRecurringName() Group by the recurring_name column
 * @method     ChildOcOrderRecurringQuery groupByRecurringDescription() Group by the recurring_description column
 * @method     ChildOcOrderRecurringQuery groupByRecurringFrequency() Group by the recurring_frequency column
 * @method     ChildOcOrderRecurringQuery groupByRecurringCycle() Group by the recurring_cycle column
 * @method     ChildOcOrderRecurringQuery groupByRecurringDuration() Group by the recurring_duration column
 * @method     ChildOcOrderRecurringQuery groupByRecurringPrice() Group by the recurring_price column
 * @method     ChildOcOrderRecurringQuery groupByTrial() Group by the trial column
 * @method     ChildOcOrderRecurringQuery groupByTrialFrequency() Group by the trial_frequency column
 * @method     ChildOcOrderRecurringQuery groupByTrialCycle() Group by the trial_cycle column
 * @method     ChildOcOrderRecurringQuery groupByTrialDuration() Group by the trial_duration column
 * @method     ChildOcOrderRecurringQuery groupByTrialPrice() Group by the trial_price column
 * @method     ChildOcOrderRecurringQuery groupByStatus() Group by the status column
 * @method     ChildOcOrderRecurringQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcOrderRecurringQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOrderRecurringQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOrderRecurringQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOrderRecurringQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOrderRecurringQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOrderRecurringQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOrderRecurring findOne(ConnectionInterface $con = null) Return the first ChildOcOrderRecurring matching the query
 * @method     ChildOcOrderRecurring findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOrderRecurring matching the query, or a new ChildOcOrderRecurring object populated from the query conditions when no match is found
 *
 * @method     ChildOcOrderRecurring findOneByOrderRecurringId(int $order_recurring_id) Return the first ChildOcOrderRecurring filtered by the order_recurring_id column
 * @method     ChildOcOrderRecurring findOneByOrderId(int $order_id) Return the first ChildOcOrderRecurring filtered by the order_id column
 * @method     ChildOcOrderRecurring findOneByReference(string $reference) Return the first ChildOcOrderRecurring filtered by the reference column
 * @method     ChildOcOrderRecurring findOneByProductId(int $product_id) Return the first ChildOcOrderRecurring filtered by the product_id column
 * @method     ChildOcOrderRecurring findOneByProductName(string $product_name) Return the first ChildOcOrderRecurring filtered by the product_name column
 * @method     ChildOcOrderRecurring findOneByProductQuantity(int $product_quantity) Return the first ChildOcOrderRecurring filtered by the product_quantity column
 * @method     ChildOcOrderRecurring findOneByRecurringId(int $recurring_id) Return the first ChildOcOrderRecurring filtered by the recurring_id column
 * @method     ChildOcOrderRecurring findOneByRecurringName(string $recurring_name) Return the first ChildOcOrderRecurring filtered by the recurring_name column
 * @method     ChildOcOrderRecurring findOneByRecurringDescription(string $recurring_description) Return the first ChildOcOrderRecurring filtered by the recurring_description column
 * @method     ChildOcOrderRecurring findOneByRecurringFrequency(string $recurring_frequency) Return the first ChildOcOrderRecurring filtered by the recurring_frequency column
 * @method     ChildOcOrderRecurring findOneByRecurringCycle(int $recurring_cycle) Return the first ChildOcOrderRecurring filtered by the recurring_cycle column
 * @method     ChildOcOrderRecurring findOneByRecurringDuration(int $recurring_duration) Return the first ChildOcOrderRecurring filtered by the recurring_duration column
 * @method     ChildOcOrderRecurring findOneByRecurringPrice(string $recurring_price) Return the first ChildOcOrderRecurring filtered by the recurring_price column
 * @method     ChildOcOrderRecurring findOneByTrial(boolean $trial) Return the first ChildOcOrderRecurring filtered by the trial column
 * @method     ChildOcOrderRecurring findOneByTrialFrequency(string $trial_frequency) Return the first ChildOcOrderRecurring filtered by the trial_frequency column
 * @method     ChildOcOrderRecurring findOneByTrialCycle(int $trial_cycle) Return the first ChildOcOrderRecurring filtered by the trial_cycle column
 * @method     ChildOcOrderRecurring findOneByTrialDuration(int $trial_duration) Return the first ChildOcOrderRecurring filtered by the trial_duration column
 * @method     ChildOcOrderRecurring findOneByTrialPrice(string $trial_price) Return the first ChildOcOrderRecurring filtered by the trial_price column
 * @method     ChildOcOrderRecurring findOneByStatus(int $status) Return the first ChildOcOrderRecurring filtered by the status column
 * @method     ChildOcOrderRecurring findOneByDateAdded(string $date_added) Return the first ChildOcOrderRecurring filtered by the date_added column *

 * @method     ChildOcOrderRecurring requirePk($key, ConnectionInterface $con = null) Return the ChildOcOrderRecurring by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOne(ConnectionInterface $con = null) Return the first ChildOcOrderRecurring matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderRecurring requireOneByOrderRecurringId(int $order_recurring_id) Return the first ChildOcOrderRecurring filtered by the order_recurring_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByOrderId(int $order_id) Return the first ChildOcOrderRecurring filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByReference(string $reference) Return the first ChildOcOrderRecurring filtered by the reference column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByProductId(int $product_id) Return the first ChildOcOrderRecurring filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByProductName(string $product_name) Return the first ChildOcOrderRecurring filtered by the product_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByProductQuantity(int $product_quantity) Return the first ChildOcOrderRecurring filtered by the product_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByRecurringId(int $recurring_id) Return the first ChildOcOrderRecurring filtered by the recurring_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByRecurringName(string $recurring_name) Return the first ChildOcOrderRecurring filtered by the recurring_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByRecurringDescription(string $recurring_description) Return the first ChildOcOrderRecurring filtered by the recurring_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByRecurringFrequency(string $recurring_frequency) Return the first ChildOcOrderRecurring filtered by the recurring_frequency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByRecurringCycle(int $recurring_cycle) Return the first ChildOcOrderRecurring filtered by the recurring_cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByRecurringDuration(int $recurring_duration) Return the first ChildOcOrderRecurring filtered by the recurring_duration column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByRecurringPrice(string $recurring_price) Return the first ChildOcOrderRecurring filtered by the recurring_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByTrial(boolean $trial) Return the first ChildOcOrderRecurring filtered by the trial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByTrialFrequency(string $trial_frequency) Return the first ChildOcOrderRecurring filtered by the trial_frequency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByTrialCycle(int $trial_cycle) Return the first ChildOcOrderRecurring filtered by the trial_cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByTrialDuration(int $trial_duration) Return the first ChildOcOrderRecurring filtered by the trial_duration column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByTrialPrice(string $trial_price) Return the first ChildOcOrderRecurring filtered by the trial_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByStatus(int $status) Return the first ChildOcOrderRecurring filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurring requireOneByDateAdded(string $date_added) Return the first ChildOcOrderRecurring filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderRecurring[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOrderRecurring objects based on current ModelCriteria
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByOrderRecurringId(int $order_recurring_id) Return ChildOcOrderRecurring objects filtered by the order_recurring_id column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcOrderRecurring objects filtered by the order_id column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByReference(string $reference) Return ChildOcOrderRecurring objects filtered by the reference column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByProductId(int $product_id) Return ChildOcOrderRecurring objects filtered by the product_id column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByProductName(string $product_name) Return ChildOcOrderRecurring objects filtered by the product_name column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByProductQuantity(int $product_quantity) Return ChildOcOrderRecurring objects filtered by the product_quantity column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByRecurringId(int $recurring_id) Return ChildOcOrderRecurring objects filtered by the recurring_id column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByRecurringName(string $recurring_name) Return ChildOcOrderRecurring objects filtered by the recurring_name column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByRecurringDescription(string $recurring_description) Return ChildOcOrderRecurring objects filtered by the recurring_description column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByRecurringFrequency(string $recurring_frequency) Return ChildOcOrderRecurring objects filtered by the recurring_frequency column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByRecurringCycle(int $recurring_cycle) Return ChildOcOrderRecurring objects filtered by the recurring_cycle column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByRecurringDuration(int $recurring_duration) Return ChildOcOrderRecurring objects filtered by the recurring_duration column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByRecurringPrice(string $recurring_price) Return ChildOcOrderRecurring objects filtered by the recurring_price column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByTrial(boolean $trial) Return ChildOcOrderRecurring objects filtered by the trial column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByTrialFrequency(string $trial_frequency) Return ChildOcOrderRecurring objects filtered by the trial_frequency column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByTrialCycle(int $trial_cycle) Return ChildOcOrderRecurring objects filtered by the trial_cycle column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByTrialDuration(int $trial_duration) Return ChildOcOrderRecurring objects filtered by the trial_duration column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByTrialPrice(string $trial_price) Return ChildOcOrderRecurring objects filtered by the trial_price column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByStatus(int $status) Return ChildOcOrderRecurring objects filtered by the status column
 * @method     ChildOcOrderRecurring[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcOrderRecurring objects filtered by the date_added column
 * @method     ChildOcOrderRecurring[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOrderRecurringQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOrderRecurringQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOrderRecurring', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOrderRecurringQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOrderRecurringQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOrderRecurringQuery) {
            return $criteria;
        }
        $query = new ChildOcOrderRecurringQuery();
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
     * @return ChildOcOrderRecurring|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderRecurringTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOrderRecurringTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcOrderRecurring A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT order_recurring_id, order_id, reference, product_id, product_name, product_quantity, recurring_id, recurring_name, recurring_description, recurring_frequency, recurring_cycle, recurring_duration, recurring_price, trial, trial_frequency, trial_cycle, trial_duration, trial_price, status, date_added FROM oc_order_recurring WHERE order_recurring_id = :p0';
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
            /** @var ChildOcOrderRecurring $obj */
            $obj = new ChildOcOrderRecurring();
            $obj->hydrate($row);
            OcOrderRecurringTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcOrderRecurring|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_recurring_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderRecurringId(1234); // WHERE order_recurring_id = 1234
     * $query->filterByOrderRecurringId(array(12, 34)); // WHERE order_recurring_id IN (12, 34)
     * $query->filterByOrderRecurringId(array('min' => 12)); // WHERE order_recurring_id > 12
     * </code>
     *
     * @param     mixed $orderRecurringId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByOrderRecurringId($orderRecurringId = null, $comparison = null)
    {
        if (is_array($orderRecurringId)) {
            $useMinMax = false;
            if (isset($orderRecurringId['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, $orderRecurringId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderRecurringId['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, $orderRecurringId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, $orderRecurringId, $comparison);
    }

    /**
     * Filter the query on the order_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderId(1234); // WHERE order_id = 1234
     * $query->filterByOrderId(array(12, 34)); // WHERE order_id IN (12, 34)
     * $query->filterByOrderId(array('min' => 12)); // WHERE order_id > 12
     * </code>
     *
     * @param     mixed $orderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the reference column
     *
     * Example usage:
     * <code>
     * $query->filterByReference('fooValue');   // WHERE reference = 'fooValue'
     * $query->filterByReference('%fooValue%', Criteria::LIKE); // WHERE reference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reference The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByReference($reference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reference)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
     * </code>
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the product_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductName('fooValue');   // WHERE product_name = 'fooValue'
     * $query->filterByProductName('%fooValue%', Criteria::LIKE); // WHERE product_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByProductName($productName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_PRODUCT_NAME, $productName, $comparison);
    }

    /**
     * Filter the query on the product_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByProductQuantity(1234); // WHERE product_quantity = 1234
     * $query->filterByProductQuantity(array(12, 34)); // WHERE product_quantity IN (12, 34)
     * $query->filterByProductQuantity(array('min' => 12)); // WHERE product_quantity > 12
     * </code>
     *
     * @param     mixed $productQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByProductQuantity($productQuantity = null, $comparison = null)
    {
        if (is_array($productQuantity)) {
            $useMinMax = false;
            if (isset($productQuantity['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY, $productQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productQuantity['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY, $productQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_PRODUCT_QUANTITY, $productQuantity, $comparison);
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
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringId($recurringId = null, $comparison = null)
    {
        if (is_array($recurringId)) {
            $useMinMax = false;
            if (isset($recurringId['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_ID, $recurringId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recurringId['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_ID, $recurringId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_ID, $recurringId, $comparison);
    }

    /**
     * Filter the query on the recurring_name column
     *
     * Example usage:
     * <code>
     * $query->filterByRecurringName('fooValue');   // WHERE recurring_name = 'fooValue'
     * $query->filterByRecurringName('%fooValue%', Criteria::LIKE); // WHERE recurring_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $recurringName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringName($recurringName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($recurringName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_NAME, $recurringName, $comparison);
    }

    /**
     * Filter the query on the recurring_description column
     *
     * Example usage:
     * <code>
     * $query->filterByRecurringDescription('fooValue');   // WHERE recurring_description = 'fooValue'
     * $query->filterByRecurringDescription('%fooValue%', Criteria::LIKE); // WHERE recurring_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $recurringDescription The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringDescription($recurringDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($recurringDescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_DESCRIPTION, $recurringDescription, $comparison);
    }

    /**
     * Filter the query on the recurring_frequency column
     *
     * Example usage:
     * <code>
     * $query->filterByRecurringFrequency('fooValue');   // WHERE recurring_frequency = 'fooValue'
     * $query->filterByRecurringFrequency('%fooValue%', Criteria::LIKE); // WHERE recurring_frequency LIKE '%fooValue%'
     * </code>
     *
     * @param     string $recurringFrequency The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringFrequency($recurringFrequency = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($recurringFrequency)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_FREQUENCY, $recurringFrequency, $comparison);
    }

    /**
     * Filter the query on the recurring_cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByRecurringCycle(1234); // WHERE recurring_cycle = 1234
     * $query->filterByRecurringCycle(array(12, 34)); // WHERE recurring_cycle IN (12, 34)
     * $query->filterByRecurringCycle(array('min' => 12)); // WHERE recurring_cycle > 12
     * </code>
     *
     * @param     mixed $recurringCycle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringCycle($recurringCycle = null, $comparison = null)
    {
        if (is_array($recurringCycle)) {
            $useMinMax = false;
            if (isset($recurringCycle['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_CYCLE, $recurringCycle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recurringCycle['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_CYCLE, $recurringCycle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_CYCLE, $recurringCycle, $comparison);
    }

    /**
     * Filter the query on the recurring_duration column
     *
     * Example usage:
     * <code>
     * $query->filterByRecurringDuration(1234); // WHERE recurring_duration = 1234
     * $query->filterByRecurringDuration(array(12, 34)); // WHERE recurring_duration IN (12, 34)
     * $query->filterByRecurringDuration(array('min' => 12)); // WHERE recurring_duration > 12
     * </code>
     *
     * @param     mixed $recurringDuration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringDuration($recurringDuration = null, $comparison = null)
    {
        if (is_array($recurringDuration)) {
            $useMinMax = false;
            if (isset($recurringDuration['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_DURATION, $recurringDuration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recurringDuration['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_DURATION, $recurringDuration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_DURATION, $recurringDuration, $comparison);
    }

    /**
     * Filter the query on the recurring_price column
     *
     * Example usage:
     * <code>
     * $query->filterByRecurringPrice(1234); // WHERE recurring_price = 1234
     * $query->filterByRecurringPrice(array(12, 34)); // WHERE recurring_price IN (12, 34)
     * $query->filterByRecurringPrice(array('min' => 12)); // WHERE recurring_price > 12
     * </code>
     *
     * @param     mixed $recurringPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringPrice($recurringPrice = null, $comparison = null)
    {
        if (is_array($recurringPrice)) {
            $useMinMax = false;
            if (isset($recurringPrice['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_PRICE, $recurringPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recurringPrice['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_PRICE, $recurringPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_RECURRING_PRICE, $recurringPrice, $comparison);
    }

    /**
     * Filter the query on the trial column
     *
     * Example usage:
     * <code>
     * $query->filterByTrial(true); // WHERE trial = true
     * $query->filterByTrial('yes'); // WHERE trial = true
     * </code>
     *
     * @param     boolean|string $trial The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByTrial($trial = null, $comparison = null)
    {
        if (is_string($trial)) {
            $trial = in_array(strtolower($trial), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL, $trial, $comparison);
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
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialFrequency($trialFrequency = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trialFrequency)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_FREQUENCY, $trialFrequency, $comparison);
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
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialCycle($trialCycle = null, $comparison = null)
    {
        if (is_array($trialCycle)) {
            $useMinMax = false;
            if (isset($trialCycle['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_CYCLE, $trialCycle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trialCycle['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_CYCLE, $trialCycle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_CYCLE, $trialCycle, $comparison);
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
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialDuration($trialDuration = null, $comparison = null)
    {
        if (is_array($trialDuration)) {
            $useMinMax = false;
            if (isset($trialDuration['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_DURATION, $trialDuration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trialDuration['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_DURATION, $trialDuration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_DURATION, $trialDuration, $comparison);
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
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByTrialPrice($trialPrice = null, $comparison = null)
    {
        if (is_array($trialPrice)) {
            $useMinMax = false;
            if (isset($trialPrice['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_PRICE, $trialPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trialPrice['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_PRICE, $trialPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_TRIAL_PRICE, $trialPrice, $comparison);
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
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcOrderRecurringTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOrderRecurring $ocOrderRecurring Object to remove from the list of results
     *
     * @return $this|ChildOcOrderRecurringQuery The current query, for fluid interface
     */
    public function prune($ocOrderRecurring = null)
    {
        if ($ocOrderRecurring) {
            $this->addUsingAlias(OcOrderRecurringTableMap::COL_ORDER_RECURRING_ID, $ocOrderRecurring->getOrderRecurringId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_order_recurring table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderRecurringTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOrderRecurringTableMap::clearInstancePool();
            OcOrderRecurringTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderRecurringTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOrderRecurringTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOrderRecurringTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOrderRecurringTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOrderRecurringQuery
