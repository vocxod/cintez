<?php

namespace Base;

use \OcCouponHistory as ChildOcCouponHistory;
use \OcCouponHistoryQuery as ChildOcCouponHistoryQuery;
use \Exception;
use \PDO;
use Map\OcCouponHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_coupon_history' table.
 *
 *
 *
 * @method     ChildOcCouponHistoryQuery orderByCouponHistoryId($order = Criteria::ASC) Order by the coupon_history_id column
 * @method     ChildOcCouponHistoryQuery orderByCouponId($order = Criteria::ASC) Order by the coupon_id column
 * @method     ChildOcCouponHistoryQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcCouponHistoryQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcCouponHistoryQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildOcCouponHistoryQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcCouponHistoryQuery groupByCouponHistoryId() Group by the coupon_history_id column
 * @method     ChildOcCouponHistoryQuery groupByCouponId() Group by the coupon_id column
 * @method     ChildOcCouponHistoryQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcCouponHistoryQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcCouponHistoryQuery groupByAmount() Group by the amount column
 * @method     ChildOcCouponHistoryQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcCouponHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCouponHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCouponHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCouponHistoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCouponHistoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCouponHistoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCouponHistory findOne(ConnectionInterface $con = null) Return the first ChildOcCouponHistory matching the query
 * @method     ChildOcCouponHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCouponHistory matching the query, or a new ChildOcCouponHistory object populated from the query conditions when no match is found
 *
 * @method     ChildOcCouponHistory findOneByCouponHistoryId(int $coupon_history_id) Return the first ChildOcCouponHistory filtered by the coupon_history_id column
 * @method     ChildOcCouponHistory findOneByCouponId(int $coupon_id) Return the first ChildOcCouponHistory filtered by the coupon_id column
 * @method     ChildOcCouponHistory findOneByOrderId(int $order_id) Return the first ChildOcCouponHistory filtered by the order_id column
 * @method     ChildOcCouponHistory findOneByCustomerId(int $customer_id) Return the first ChildOcCouponHistory filtered by the customer_id column
 * @method     ChildOcCouponHistory findOneByAmount(string $amount) Return the first ChildOcCouponHistory filtered by the amount column
 * @method     ChildOcCouponHistory findOneByDateAdded(string $date_added) Return the first ChildOcCouponHistory filtered by the date_added column *

 * @method     ChildOcCouponHistory requirePk($key, ConnectionInterface $con = null) Return the ChildOcCouponHistory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponHistory requireOne(ConnectionInterface $con = null) Return the first ChildOcCouponHistory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCouponHistory requireOneByCouponHistoryId(int $coupon_history_id) Return the first ChildOcCouponHistory filtered by the coupon_history_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponHistory requireOneByCouponId(int $coupon_id) Return the first ChildOcCouponHistory filtered by the coupon_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponHistory requireOneByOrderId(int $order_id) Return the first ChildOcCouponHistory filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponHistory requireOneByCustomerId(int $customer_id) Return the first ChildOcCouponHistory filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponHistory requireOneByAmount(string $amount) Return the first ChildOcCouponHistory filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponHistory requireOneByDateAdded(string $date_added) Return the first ChildOcCouponHistory filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCouponHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCouponHistory objects based on current ModelCriteria
 * @method     ChildOcCouponHistory[]|ObjectCollection findByCouponHistoryId(int $coupon_history_id) Return ChildOcCouponHistory objects filtered by the coupon_history_id column
 * @method     ChildOcCouponHistory[]|ObjectCollection findByCouponId(int $coupon_id) Return ChildOcCouponHistory objects filtered by the coupon_id column
 * @method     ChildOcCouponHistory[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcCouponHistory objects filtered by the order_id column
 * @method     ChildOcCouponHistory[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcCouponHistory objects filtered by the customer_id column
 * @method     ChildOcCouponHistory[]|ObjectCollection findByAmount(string $amount) Return ChildOcCouponHistory objects filtered by the amount column
 * @method     ChildOcCouponHistory[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCouponHistory objects filtered by the date_added column
 * @method     ChildOcCouponHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCouponHistoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCouponHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCouponHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCouponHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCouponHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCouponHistoryQuery) {
            return $criteria;
        }
        $query = new ChildOcCouponHistoryQuery();
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
     * @return ChildOcCouponHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCouponHistoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCouponHistoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCouponHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT coupon_history_id, coupon_id, order_id, customer_id, amount, date_added FROM oc_coupon_history WHERE coupon_history_id = :p0';
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
            /** @var ChildOcCouponHistory $obj */
            $obj = new ChildOcCouponHistory();
            $obj->hydrate($row);
            OcCouponHistoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCouponHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the coupon_history_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponHistoryId(1234); // WHERE coupon_history_id = 1234
     * $query->filterByCouponHistoryId(array(12, 34)); // WHERE coupon_history_id IN (12, 34)
     * $query->filterByCouponHistoryId(array('min' => 12)); // WHERE coupon_history_id > 12
     * </code>
     *
     * @param     mixed $couponHistoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function filterByCouponHistoryId($couponHistoryId = null, $comparison = null)
    {
        if (is_array($couponHistoryId)) {
            $useMinMax = false;
            if (isset($couponHistoryId['min'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID, $couponHistoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($couponHistoryId['max'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID, $couponHistoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID, $couponHistoryId, $comparison);
    }

    /**
     * Filter the query on the coupon_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponId(1234); // WHERE coupon_id = 1234
     * $query->filterByCouponId(array(12, 34)); // WHERE coupon_id IN (12, 34)
     * $query->filterByCouponId(array('min' => 12)); // WHERE coupon_id > 12
     * </code>
     *
     * @param     mixed $couponId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function filterByCouponId($couponId = null, $comparison = null)
    {
        if (is_array($couponId)) {
            $useMinMax = false;
            if (isset($couponId['min'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_ID, $couponId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($couponId['max'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_ID, $couponId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_ID, $couponId, $comparison);
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
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponHistoryTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponHistoryTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponHistoryTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCouponHistoryTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponHistoryTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCouponHistory $ocCouponHistory Object to remove from the list of results
     *
     * @return $this|ChildOcCouponHistoryQuery The current query, for fluid interface
     */
    public function prune($ocCouponHistory = null)
    {
        if ($ocCouponHistory) {
            $this->addUsingAlias(OcCouponHistoryTableMap::COL_COUPON_HISTORY_ID, $ocCouponHistory->getCouponHistoryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_coupon_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCouponHistoryTableMap::clearInstancePool();
            OcCouponHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCouponHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCouponHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCouponHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCouponHistoryQuery
