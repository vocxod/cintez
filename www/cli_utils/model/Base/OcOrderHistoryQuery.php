<?php

namespace Base;

use \OcOrderHistory as ChildOcOrderHistory;
use \OcOrderHistoryQuery as ChildOcOrderHistoryQuery;
use \Exception;
use \PDO;
use Map\OcOrderHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_order_history' table.
 *
 *
 *
 * @method     ChildOcOrderHistoryQuery orderByOrderHistoryId($order = Criteria::ASC) Order by the order_history_id column
 * @method     ChildOcOrderHistoryQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcOrderHistoryQuery orderByOrderStatusId($order = Criteria::ASC) Order by the order_status_id column
 * @method     ChildOcOrderHistoryQuery orderByNotify($order = Criteria::ASC) Order by the notify column
 * @method     ChildOcOrderHistoryQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildOcOrderHistoryQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcOrderHistoryQuery groupByOrderHistoryId() Group by the order_history_id column
 * @method     ChildOcOrderHistoryQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcOrderHistoryQuery groupByOrderStatusId() Group by the order_status_id column
 * @method     ChildOcOrderHistoryQuery groupByNotify() Group by the notify column
 * @method     ChildOcOrderHistoryQuery groupByComment() Group by the comment column
 * @method     ChildOcOrderHistoryQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcOrderHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOrderHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOrderHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOrderHistoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOrderHistoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOrderHistoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOrderHistory findOne(ConnectionInterface $con = null) Return the first ChildOcOrderHistory matching the query
 * @method     ChildOcOrderHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOrderHistory matching the query, or a new ChildOcOrderHistory object populated from the query conditions when no match is found
 *
 * @method     ChildOcOrderHistory findOneByOrderHistoryId(int $order_history_id) Return the first ChildOcOrderHistory filtered by the order_history_id column
 * @method     ChildOcOrderHistory findOneByOrderId(int $order_id) Return the first ChildOcOrderHistory filtered by the order_id column
 * @method     ChildOcOrderHistory findOneByOrderStatusId(int $order_status_id) Return the first ChildOcOrderHistory filtered by the order_status_id column
 * @method     ChildOcOrderHistory findOneByNotify(boolean $notify) Return the first ChildOcOrderHistory filtered by the notify column
 * @method     ChildOcOrderHistory findOneByComment(string $comment) Return the first ChildOcOrderHistory filtered by the comment column
 * @method     ChildOcOrderHistory findOneByDateAdded(string $date_added) Return the first ChildOcOrderHistory filtered by the date_added column *

 * @method     ChildOcOrderHistory requirePk($key, ConnectionInterface $con = null) Return the ChildOcOrderHistory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderHistory requireOne(ConnectionInterface $con = null) Return the first ChildOcOrderHistory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderHistory requireOneByOrderHistoryId(int $order_history_id) Return the first ChildOcOrderHistory filtered by the order_history_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderHistory requireOneByOrderId(int $order_id) Return the first ChildOcOrderHistory filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderHistory requireOneByOrderStatusId(int $order_status_id) Return the first ChildOcOrderHistory filtered by the order_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderHistory requireOneByNotify(boolean $notify) Return the first ChildOcOrderHistory filtered by the notify column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderHistory requireOneByComment(string $comment) Return the first ChildOcOrderHistory filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderHistory requireOneByDateAdded(string $date_added) Return the first ChildOcOrderHistory filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOrderHistory objects based on current ModelCriteria
 * @method     ChildOcOrderHistory[]|ObjectCollection findByOrderHistoryId(int $order_history_id) Return ChildOcOrderHistory objects filtered by the order_history_id column
 * @method     ChildOcOrderHistory[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcOrderHistory objects filtered by the order_id column
 * @method     ChildOcOrderHistory[]|ObjectCollection findByOrderStatusId(int $order_status_id) Return ChildOcOrderHistory objects filtered by the order_status_id column
 * @method     ChildOcOrderHistory[]|ObjectCollection findByNotify(boolean $notify) Return ChildOcOrderHistory objects filtered by the notify column
 * @method     ChildOcOrderHistory[]|ObjectCollection findByComment(string $comment) Return ChildOcOrderHistory objects filtered by the comment column
 * @method     ChildOcOrderHistory[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcOrderHistory objects filtered by the date_added column
 * @method     ChildOcOrderHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOrderHistoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOrderHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOrderHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOrderHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOrderHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOrderHistoryQuery) {
            return $criteria;
        }
        $query = new ChildOcOrderHistoryQuery();
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
     * @return ChildOcOrderHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderHistoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOrderHistoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcOrderHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT order_history_id, order_id, order_status_id, notify, comment, date_added FROM oc_order_history WHERE order_history_id = :p0';
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
            /** @var ChildOcOrderHistory $obj */
            $obj = new ChildOcOrderHistory();
            $obj->hydrate($row);
            OcOrderHistoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcOrderHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_HISTORY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_HISTORY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_history_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderHistoryId(1234); // WHERE order_history_id = 1234
     * $query->filterByOrderHistoryId(array(12, 34)); // WHERE order_history_id IN (12, 34)
     * $query->filterByOrderHistoryId(array('min' => 12)); // WHERE order_history_id > 12
     * </code>
     *
     * @param     mixed $orderHistoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function filterByOrderHistoryId($orderHistoryId = null, $comparison = null)
    {
        if (is_array($orderHistoryId)) {
            $useMinMax = false;
            if (isset($orderHistoryId['min'])) {
                $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_HISTORY_ID, $orderHistoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderHistoryId['max'])) {
                $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_HISTORY_ID, $orderHistoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_HISTORY_ID, $orderHistoryId, $comparison);
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
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the order_status_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderStatusId(1234); // WHERE order_status_id = 1234
     * $query->filterByOrderStatusId(array(12, 34)); // WHERE order_status_id IN (12, 34)
     * $query->filterByOrderStatusId(array('min' => 12)); // WHERE order_status_id > 12
     * </code>
     *
     * @param     mixed $orderStatusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function filterByOrderStatusId($orderStatusId = null, $comparison = null)
    {
        if (is_array($orderStatusId)) {
            $useMinMax = false;
            if (isset($orderStatusId['min'])) {
                $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_STATUS_ID, $orderStatusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderStatusId['max'])) {
                $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_STATUS_ID, $orderStatusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_STATUS_ID, $orderStatusId, $comparison);
    }

    /**
     * Filter the query on the notify column
     *
     * Example usage:
     * <code>
     * $query->filterByNotify(true); // WHERE notify = true
     * $query->filterByNotify('yes'); // WHERE notify = true
     * </code>
     *
     * @param     boolean|string $notify The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function filterByNotify($notify = null, $comparison = null)
    {
        if (is_string($notify)) {
            $notify = in_array(strtolower($notify), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcOrderHistoryTableMap::COL_NOTIFY, $notify, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderHistoryTableMap::COL_COMMENT, $comment, $comparison);
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
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcOrderHistoryTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcOrderHistoryTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderHistoryTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOrderHistory $ocOrderHistory Object to remove from the list of results
     *
     * @return $this|ChildOcOrderHistoryQuery The current query, for fluid interface
     */
    public function prune($ocOrderHistory = null)
    {
        if ($ocOrderHistory) {
            $this->addUsingAlias(OcOrderHistoryTableMap::COL_ORDER_HISTORY_ID, $ocOrderHistory->getOrderHistoryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_order_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOrderHistoryTableMap::clearInstancePool();
            OcOrderHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOrderHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOrderHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOrderHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOrderHistoryQuery
