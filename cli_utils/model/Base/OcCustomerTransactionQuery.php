<?php

namespace Base;

use \OcCustomerTransaction as ChildOcCustomerTransaction;
use \OcCustomerTransactionQuery as ChildOcCustomerTransactionQuery;
use \Exception;
use \PDO;
use Map\OcCustomerTransactionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_customer_transaction' table.
 *
 *
 *
 * @method     ChildOcCustomerTransactionQuery orderByCustomerTransactionId($order = Criteria::ASC) Order by the customer_transaction_id column
 * @method     ChildOcCustomerTransactionQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcCustomerTransactionQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcCustomerTransactionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildOcCustomerTransactionQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildOcCustomerTransactionQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcCustomerTransactionQuery groupByCustomerTransactionId() Group by the customer_transaction_id column
 * @method     ChildOcCustomerTransactionQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcCustomerTransactionQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcCustomerTransactionQuery groupByDescription() Group by the description column
 * @method     ChildOcCustomerTransactionQuery groupByAmount() Group by the amount column
 * @method     ChildOcCustomerTransactionQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcCustomerTransactionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomerTransactionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomerTransactionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomerTransactionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomerTransactionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomerTransactionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomerTransaction findOne(ConnectionInterface $con = null) Return the first ChildOcCustomerTransaction matching the query
 * @method     ChildOcCustomerTransaction findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomerTransaction matching the query, or a new ChildOcCustomerTransaction object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomerTransaction findOneByCustomerTransactionId(int $customer_transaction_id) Return the first ChildOcCustomerTransaction filtered by the customer_transaction_id column
 * @method     ChildOcCustomerTransaction findOneByCustomerId(int $customer_id) Return the first ChildOcCustomerTransaction filtered by the customer_id column
 * @method     ChildOcCustomerTransaction findOneByOrderId(int $order_id) Return the first ChildOcCustomerTransaction filtered by the order_id column
 * @method     ChildOcCustomerTransaction findOneByDescription(string $description) Return the first ChildOcCustomerTransaction filtered by the description column
 * @method     ChildOcCustomerTransaction findOneByAmount(string $amount) Return the first ChildOcCustomerTransaction filtered by the amount column
 * @method     ChildOcCustomerTransaction findOneByDateAdded(string $date_added) Return the first ChildOcCustomerTransaction filtered by the date_added column *

 * @method     ChildOcCustomerTransaction requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomerTransaction by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerTransaction requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomerTransaction matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerTransaction requireOneByCustomerTransactionId(int $customer_transaction_id) Return the first ChildOcCustomerTransaction filtered by the customer_transaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerTransaction requireOneByCustomerId(int $customer_id) Return the first ChildOcCustomerTransaction filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerTransaction requireOneByOrderId(int $order_id) Return the first ChildOcCustomerTransaction filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerTransaction requireOneByDescription(string $description) Return the first ChildOcCustomerTransaction filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerTransaction requireOneByAmount(string $amount) Return the first ChildOcCustomerTransaction filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerTransaction requireOneByDateAdded(string $date_added) Return the first ChildOcCustomerTransaction filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerTransaction[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomerTransaction objects based on current ModelCriteria
 * @method     ChildOcCustomerTransaction[]|ObjectCollection findByCustomerTransactionId(int $customer_transaction_id) Return ChildOcCustomerTransaction objects filtered by the customer_transaction_id column
 * @method     ChildOcCustomerTransaction[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcCustomerTransaction objects filtered by the customer_id column
 * @method     ChildOcCustomerTransaction[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcCustomerTransaction objects filtered by the order_id column
 * @method     ChildOcCustomerTransaction[]|ObjectCollection findByDescription(string $description) Return ChildOcCustomerTransaction objects filtered by the description column
 * @method     ChildOcCustomerTransaction[]|ObjectCollection findByAmount(string $amount) Return ChildOcCustomerTransaction objects filtered by the amount column
 * @method     ChildOcCustomerTransaction[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCustomerTransaction objects filtered by the date_added column
 * @method     ChildOcCustomerTransaction[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomerTransactionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomerTransactionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomerTransaction', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomerTransactionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomerTransactionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomerTransactionQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomerTransactionQuery();
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
     * @return ChildOcCustomerTransaction|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomerTransactionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomerTransactionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCustomerTransaction A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT customer_transaction_id, customer_id, order_id, description, amount, date_added FROM oc_customer_transaction WHERE customer_transaction_id = :p0';
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
            /** @var ChildOcCustomerTransaction $obj */
            $obj = new ChildOcCustomerTransaction();
            $obj->hydrate($row);
            OcCustomerTransactionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCustomerTransaction|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_TRANSACTION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_TRANSACTION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the customer_transaction_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerTransactionId(1234); // WHERE customer_transaction_id = 1234
     * $query->filterByCustomerTransactionId(array(12, 34)); // WHERE customer_transaction_id IN (12, 34)
     * $query->filterByCustomerTransactionId(array('min' => 12)); // WHERE customer_transaction_id > 12
     * </code>
     *
     * @param     mixed $customerTransactionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function filterByCustomerTransactionId($customerTransactionId = null, $comparison = null)
    {
        if (is_array($customerTransactionId)) {
            $useMinMax = false;
            if (isset($customerTransactionId['min'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_TRANSACTION_ID, $customerTransactionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerTransactionId['max'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_TRANSACTION_ID, $customerTransactionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_TRANSACTION_ID, $customerTransactionId, $comparison);
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
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
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
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTransactionTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTransactionTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTransactionTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCustomerTransactionTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTransactionTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomerTransaction $ocCustomerTransaction Object to remove from the list of results
     *
     * @return $this|ChildOcCustomerTransactionQuery The current query, for fluid interface
     */
    public function prune($ocCustomerTransaction = null)
    {
        if ($ocCustomerTransaction) {
            $this->addUsingAlias(OcCustomerTransactionTableMap::COL_CUSTOMER_TRANSACTION_ID, $ocCustomerTransaction->getCustomerTransactionId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_customer_transaction table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerTransactionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomerTransactionTableMap::clearInstancePool();
            OcCustomerTransactionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerTransactionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomerTransactionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomerTransactionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomerTransactionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomerTransactionQuery
