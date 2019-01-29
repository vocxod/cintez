<?php

namespace Base;

use \OcVoucherHistory as ChildOcVoucherHistory;
use \OcVoucherHistoryQuery as ChildOcVoucherHistoryQuery;
use \Exception;
use \PDO;
use Map\OcVoucherHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_voucher_history' table.
 *
 *
 *
 * @method     ChildOcVoucherHistoryQuery orderByVoucherHistoryId($order = Criteria::ASC) Order by the voucher_history_id column
 * @method     ChildOcVoucherHistoryQuery orderByVoucherId($order = Criteria::ASC) Order by the voucher_id column
 * @method     ChildOcVoucherHistoryQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcVoucherHistoryQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildOcVoucherHistoryQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcVoucherHistoryQuery groupByVoucherHistoryId() Group by the voucher_history_id column
 * @method     ChildOcVoucherHistoryQuery groupByVoucherId() Group by the voucher_id column
 * @method     ChildOcVoucherHistoryQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcVoucherHistoryQuery groupByAmount() Group by the amount column
 * @method     ChildOcVoucherHistoryQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcVoucherHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcVoucherHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcVoucherHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcVoucherHistoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcVoucherHistoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcVoucherHistoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcVoucherHistory findOne(ConnectionInterface $con = null) Return the first ChildOcVoucherHistory matching the query
 * @method     ChildOcVoucherHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcVoucherHistory matching the query, or a new ChildOcVoucherHistory object populated from the query conditions when no match is found
 *
 * @method     ChildOcVoucherHistory findOneByVoucherHistoryId(int $voucher_history_id) Return the first ChildOcVoucherHistory filtered by the voucher_history_id column
 * @method     ChildOcVoucherHistory findOneByVoucherId(int $voucher_id) Return the first ChildOcVoucherHistory filtered by the voucher_id column
 * @method     ChildOcVoucherHistory findOneByOrderId(int $order_id) Return the first ChildOcVoucherHistory filtered by the order_id column
 * @method     ChildOcVoucherHistory findOneByAmount(string $amount) Return the first ChildOcVoucherHistory filtered by the amount column
 * @method     ChildOcVoucherHistory findOneByDateAdded(string $date_added) Return the first ChildOcVoucherHistory filtered by the date_added column *

 * @method     ChildOcVoucherHistory requirePk($key, ConnectionInterface $con = null) Return the ChildOcVoucherHistory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucherHistory requireOne(ConnectionInterface $con = null) Return the first ChildOcVoucherHistory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcVoucherHistory requireOneByVoucherHistoryId(int $voucher_history_id) Return the first ChildOcVoucherHistory filtered by the voucher_history_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucherHistory requireOneByVoucherId(int $voucher_id) Return the first ChildOcVoucherHistory filtered by the voucher_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucherHistory requireOneByOrderId(int $order_id) Return the first ChildOcVoucherHistory filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucherHistory requireOneByAmount(string $amount) Return the first ChildOcVoucherHistory filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucherHistory requireOneByDateAdded(string $date_added) Return the first ChildOcVoucherHistory filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcVoucherHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcVoucherHistory objects based on current ModelCriteria
 * @method     ChildOcVoucherHistory[]|ObjectCollection findByVoucherHistoryId(int $voucher_history_id) Return ChildOcVoucherHistory objects filtered by the voucher_history_id column
 * @method     ChildOcVoucherHistory[]|ObjectCollection findByVoucherId(int $voucher_id) Return ChildOcVoucherHistory objects filtered by the voucher_id column
 * @method     ChildOcVoucherHistory[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcVoucherHistory objects filtered by the order_id column
 * @method     ChildOcVoucherHistory[]|ObjectCollection findByAmount(string $amount) Return ChildOcVoucherHistory objects filtered by the amount column
 * @method     ChildOcVoucherHistory[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcVoucherHistory objects filtered by the date_added column
 * @method     ChildOcVoucherHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcVoucherHistoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcVoucherHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcVoucherHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcVoucherHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcVoucherHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcVoucherHistoryQuery) {
            return $criteria;
        }
        $query = new ChildOcVoucherHistoryQuery();
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
     * @return ChildOcVoucherHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcVoucherHistoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcVoucherHistoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcVoucherHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT voucher_history_id, voucher_id, order_id, amount, date_added FROM oc_voucher_history WHERE voucher_history_id = :p0';
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
            /** @var ChildOcVoucherHistory $obj */
            $obj = new ChildOcVoucherHistory();
            $obj->hydrate($row);
            OcVoucherHistoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcVoucherHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcVoucherHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_HISTORY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcVoucherHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_HISTORY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the voucher_history_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVoucherHistoryId(1234); // WHERE voucher_history_id = 1234
     * $query->filterByVoucherHistoryId(array(12, 34)); // WHERE voucher_history_id IN (12, 34)
     * $query->filterByVoucherHistoryId(array('min' => 12)); // WHERE voucher_history_id > 12
     * </code>
     *
     * @param     mixed $voucherHistoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcVoucherHistoryQuery The current query, for fluid interface
     */
    public function filterByVoucherHistoryId($voucherHistoryId = null, $comparison = null)
    {
        if (is_array($voucherHistoryId)) {
            $useMinMax = false;
            if (isset($voucherHistoryId['min'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_HISTORY_ID, $voucherHistoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucherHistoryId['max'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_HISTORY_ID, $voucherHistoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_HISTORY_ID, $voucherHistoryId, $comparison);
    }

    /**
     * Filter the query on the voucher_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVoucherId(1234); // WHERE voucher_id = 1234
     * $query->filterByVoucherId(array(12, 34)); // WHERE voucher_id IN (12, 34)
     * $query->filterByVoucherId(array('min' => 12)); // WHERE voucher_id > 12
     * </code>
     *
     * @param     mixed $voucherId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcVoucherHistoryQuery The current query, for fluid interface
     */
    public function filterByVoucherId($voucherId = null, $comparison = null)
    {
        if (is_array($voucherId)) {
            $useMinMax = false;
            if (isset($voucherId['min'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_ID, $voucherId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucherId['max'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_ID, $voucherId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_ID, $voucherId, $comparison);
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
     * @return $this|ChildOcVoucherHistoryQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherHistoryTableMap::COL_ORDER_ID, $orderId, $comparison);
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
     * @return $this|ChildOcVoucherHistoryQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherHistoryTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildOcVoucherHistoryQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcVoucherHistoryTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherHistoryTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcVoucherHistory $ocVoucherHistory Object to remove from the list of results
     *
     * @return $this|ChildOcVoucherHistoryQuery The current query, for fluid interface
     */
    public function prune($ocVoucherHistory = null)
    {
        if ($ocVoucherHistory) {
            $this->addUsingAlias(OcVoucherHistoryTableMap::COL_VOUCHER_HISTORY_ID, $ocVoucherHistory->getVoucherHistoryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_voucher_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcVoucherHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcVoucherHistoryTableMap::clearInstancePool();
            OcVoucherHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcVoucherHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcVoucherHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcVoucherHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcVoucherHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcVoucherHistoryQuery
