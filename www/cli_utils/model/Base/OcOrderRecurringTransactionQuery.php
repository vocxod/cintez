<?php

namespace Base;

use \OcOrderRecurringTransaction as ChildOcOrderRecurringTransaction;
use \OcOrderRecurringTransactionQuery as ChildOcOrderRecurringTransactionQuery;
use \Exception;
use \PDO;
use Map\OcOrderRecurringTransactionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_order_recurring_transaction' table.
 *
 *
 *
 * @method     ChildOcOrderRecurringTransactionQuery orderByOrderRecurringTransactionId($order = Criteria::ASC) Order by the order_recurring_transaction_id column
 * @method     ChildOcOrderRecurringTransactionQuery orderByOrderRecurringId($order = Criteria::ASC) Order by the order_recurring_id column
 * @method     ChildOcOrderRecurringTransactionQuery orderByReference($order = Criteria::ASC) Order by the reference column
 * @method     ChildOcOrderRecurringTransactionQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOcOrderRecurringTransactionQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildOcOrderRecurringTransactionQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcOrderRecurringTransactionQuery groupByOrderRecurringTransactionId() Group by the order_recurring_transaction_id column
 * @method     ChildOcOrderRecurringTransactionQuery groupByOrderRecurringId() Group by the order_recurring_id column
 * @method     ChildOcOrderRecurringTransactionQuery groupByReference() Group by the reference column
 * @method     ChildOcOrderRecurringTransactionQuery groupByType() Group by the type column
 * @method     ChildOcOrderRecurringTransactionQuery groupByAmount() Group by the amount column
 * @method     ChildOcOrderRecurringTransactionQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcOrderRecurringTransactionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOrderRecurringTransactionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOrderRecurringTransactionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOrderRecurringTransactionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOrderRecurringTransactionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOrderRecurringTransactionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOrderRecurringTransaction findOne(ConnectionInterface $con = null) Return the first ChildOcOrderRecurringTransaction matching the query
 * @method     ChildOcOrderRecurringTransaction findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOrderRecurringTransaction matching the query, or a new ChildOcOrderRecurringTransaction object populated from the query conditions when no match is found
 *
 * @method     ChildOcOrderRecurringTransaction findOneByOrderRecurringTransactionId(int $order_recurring_transaction_id) Return the first ChildOcOrderRecurringTransaction filtered by the order_recurring_transaction_id column
 * @method     ChildOcOrderRecurringTransaction findOneByOrderRecurringId(int $order_recurring_id) Return the first ChildOcOrderRecurringTransaction filtered by the order_recurring_id column
 * @method     ChildOcOrderRecurringTransaction findOneByReference(string $reference) Return the first ChildOcOrderRecurringTransaction filtered by the reference column
 * @method     ChildOcOrderRecurringTransaction findOneByType(string $type) Return the first ChildOcOrderRecurringTransaction filtered by the type column
 * @method     ChildOcOrderRecurringTransaction findOneByAmount(string $amount) Return the first ChildOcOrderRecurringTransaction filtered by the amount column
 * @method     ChildOcOrderRecurringTransaction findOneByDateAdded(string $date_added) Return the first ChildOcOrderRecurringTransaction filtered by the date_added column *

 * @method     ChildOcOrderRecurringTransaction requirePk($key, ConnectionInterface $con = null) Return the ChildOcOrderRecurringTransaction by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurringTransaction requireOne(ConnectionInterface $con = null) Return the first ChildOcOrderRecurringTransaction matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderRecurringTransaction requireOneByOrderRecurringTransactionId(int $order_recurring_transaction_id) Return the first ChildOcOrderRecurringTransaction filtered by the order_recurring_transaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurringTransaction requireOneByOrderRecurringId(int $order_recurring_id) Return the first ChildOcOrderRecurringTransaction filtered by the order_recurring_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurringTransaction requireOneByReference(string $reference) Return the first ChildOcOrderRecurringTransaction filtered by the reference column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurringTransaction requireOneByType(string $type) Return the first ChildOcOrderRecurringTransaction filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurringTransaction requireOneByAmount(string $amount) Return the first ChildOcOrderRecurringTransaction filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderRecurringTransaction requireOneByDateAdded(string $date_added) Return the first ChildOcOrderRecurringTransaction filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderRecurringTransaction[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOrderRecurringTransaction objects based on current ModelCriteria
 * @method     ChildOcOrderRecurringTransaction[]|ObjectCollection findByOrderRecurringTransactionId(int $order_recurring_transaction_id) Return ChildOcOrderRecurringTransaction objects filtered by the order_recurring_transaction_id column
 * @method     ChildOcOrderRecurringTransaction[]|ObjectCollection findByOrderRecurringId(int $order_recurring_id) Return ChildOcOrderRecurringTransaction objects filtered by the order_recurring_id column
 * @method     ChildOcOrderRecurringTransaction[]|ObjectCollection findByReference(string $reference) Return ChildOcOrderRecurringTransaction objects filtered by the reference column
 * @method     ChildOcOrderRecurringTransaction[]|ObjectCollection findByType(string $type) Return ChildOcOrderRecurringTransaction objects filtered by the type column
 * @method     ChildOcOrderRecurringTransaction[]|ObjectCollection findByAmount(string $amount) Return ChildOcOrderRecurringTransaction objects filtered by the amount column
 * @method     ChildOcOrderRecurringTransaction[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcOrderRecurringTransaction objects filtered by the date_added column
 * @method     ChildOcOrderRecurringTransaction[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOrderRecurringTransactionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOrderRecurringTransactionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOrderRecurringTransaction', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOrderRecurringTransactionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOrderRecurringTransactionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOrderRecurringTransactionQuery) {
            return $criteria;
        }
        $query = new ChildOcOrderRecurringTransactionQuery();
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
     * @return ChildOcOrderRecurringTransaction|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderRecurringTransactionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOrderRecurringTransactionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcOrderRecurringTransaction A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT order_recurring_transaction_id, order_recurring_id, reference, type, amount, date_added FROM oc_order_recurring_transaction WHERE order_recurring_transaction_id = :p0';
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
            /** @var ChildOcOrderRecurringTransaction $obj */
            $obj = new ChildOcOrderRecurringTransaction();
            $obj->hydrate($row);
            OcOrderRecurringTransactionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcOrderRecurringTransaction|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_TRANSACTION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_TRANSACTION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_recurring_transaction_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderRecurringTransactionId(1234); // WHERE order_recurring_transaction_id = 1234
     * $query->filterByOrderRecurringTransactionId(array(12, 34)); // WHERE order_recurring_transaction_id IN (12, 34)
     * $query->filterByOrderRecurringTransactionId(array('min' => 12)); // WHERE order_recurring_transaction_id > 12
     * </code>
     *
     * @param     mixed $orderRecurringTransactionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function filterByOrderRecurringTransactionId($orderRecurringTransactionId = null, $comparison = null)
    {
        if (is_array($orderRecurringTransactionId)) {
            $useMinMax = false;
            if (isset($orderRecurringTransactionId['min'])) {
                $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_TRANSACTION_ID, $orderRecurringTransactionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderRecurringTransactionId['max'])) {
                $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_TRANSACTION_ID, $orderRecurringTransactionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_TRANSACTION_ID, $orderRecurringTransactionId, $comparison);
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
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function filterByOrderRecurringId($orderRecurringId = null, $comparison = null)
    {
        if (is_array($orderRecurringId)) {
            $useMinMax = false;
            if (isset($orderRecurringId['min'])) {
                $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_ID, $orderRecurringId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderRecurringId['max'])) {
                $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_ID, $orderRecurringId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_ID, $orderRecurringId, $comparison);
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
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function filterByReference($reference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reference)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOrderRecurringTransaction $ocOrderRecurringTransaction Object to remove from the list of results
     *
     * @return $this|ChildOcOrderRecurringTransactionQuery The current query, for fluid interface
     */
    public function prune($ocOrderRecurringTransaction = null)
    {
        if ($ocOrderRecurringTransaction) {
            $this->addUsingAlias(OcOrderRecurringTransactionTableMap::COL_ORDER_RECURRING_TRANSACTION_ID, $ocOrderRecurringTransaction->getOrderRecurringTransactionId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_order_recurring_transaction table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderRecurringTransactionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOrderRecurringTransactionTableMap::clearInstancePool();
            OcOrderRecurringTransactionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderRecurringTransactionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOrderRecurringTransactionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOrderRecurringTransactionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOrderRecurringTransactionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOrderRecurringTransactionQuery
