<?php

namespace Base;

use \OcCart as ChildOcCart;
use \OcCartQuery as ChildOcCartQuery;
use \Exception;
use \PDO;
use Map\OcCartTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_cart' table.
 *
 *
 *
 * @method     ChildOcCartQuery orderByCartId($order = Criteria::ASC) Order by the cart_id column
 * @method     ChildOcCartQuery orderByApiId($order = Criteria::ASC) Order by the api_id column
 * @method     ChildOcCartQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcCartQuery orderBySessionId($order = Criteria::ASC) Order by the session_id column
 * @method     ChildOcCartQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcCartQuery orderByRecurringId($order = Criteria::ASC) Order by the recurring_id column
 * @method     ChildOcCartQuery orderByOption($order = Criteria::ASC) Order by the option column
 * @method     ChildOcCartQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOcCartQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcCartQuery groupByCartId() Group by the cart_id column
 * @method     ChildOcCartQuery groupByApiId() Group by the api_id column
 * @method     ChildOcCartQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcCartQuery groupBySessionId() Group by the session_id column
 * @method     ChildOcCartQuery groupByProductId() Group by the product_id column
 * @method     ChildOcCartQuery groupByRecurringId() Group by the recurring_id column
 * @method     ChildOcCartQuery groupByOption() Group by the option column
 * @method     ChildOcCartQuery groupByQuantity() Group by the quantity column
 * @method     ChildOcCartQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcCartQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCartQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCartQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCartQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCartQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCartQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCart findOne(ConnectionInterface $con = null) Return the first ChildOcCart matching the query
 * @method     ChildOcCart findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCart matching the query, or a new ChildOcCart object populated from the query conditions when no match is found
 *
 * @method     ChildOcCart findOneByCartId(int $cart_id) Return the first ChildOcCart filtered by the cart_id column
 * @method     ChildOcCart findOneByApiId(int $api_id) Return the first ChildOcCart filtered by the api_id column
 * @method     ChildOcCart findOneByCustomerId(int $customer_id) Return the first ChildOcCart filtered by the customer_id column
 * @method     ChildOcCart findOneBySessionId(string $session_id) Return the first ChildOcCart filtered by the session_id column
 * @method     ChildOcCart findOneByProductId(int $product_id) Return the first ChildOcCart filtered by the product_id column
 * @method     ChildOcCart findOneByRecurringId(int $recurring_id) Return the first ChildOcCart filtered by the recurring_id column
 * @method     ChildOcCart findOneByOption(string $option) Return the first ChildOcCart filtered by the option column
 * @method     ChildOcCart findOneByQuantity(int $quantity) Return the first ChildOcCart filtered by the quantity column
 * @method     ChildOcCart findOneByDateAdded(string $date_added) Return the first ChildOcCart filtered by the date_added column *

 * @method     ChildOcCart requirePk($key, ConnectionInterface $con = null) Return the ChildOcCart by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOne(ConnectionInterface $con = null) Return the first ChildOcCart matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCart requireOneByCartId(int $cart_id) Return the first ChildOcCart filtered by the cart_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOneByApiId(int $api_id) Return the first ChildOcCart filtered by the api_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOneByCustomerId(int $customer_id) Return the first ChildOcCart filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOneBySessionId(string $session_id) Return the first ChildOcCart filtered by the session_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOneByProductId(int $product_id) Return the first ChildOcCart filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOneByRecurringId(int $recurring_id) Return the first ChildOcCart filtered by the recurring_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOneByOption(string $option) Return the first ChildOcCart filtered by the option column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOneByQuantity(int $quantity) Return the first ChildOcCart filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCart requireOneByDateAdded(string $date_added) Return the first ChildOcCart filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCart[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCart objects based on current ModelCriteria
 * @method     ChildOcCart[]|ObjectCollection findByCartId(int $cart_id) Return ChildOcCart objects filtered by the cart_id column
 * @method     ChildOcCart[]|ObjectCollection findByApiId(int $api_id) Return ChildOcCart objects filtered by the api_id column
 * @method     ChildOcCart[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcCart objects filtered by the customer_id column
 * @method     ChildOcCart[]|ObjectCollection findBySessionId(string $session_id) Return ChildOcCart objects filtered by the session_id column
 * @method     ChildOcCart[]|ObjectCollection findByProductId(int $product_id) Return ChildOcCart objects filtered by the product_id column
 * @method     ChildOcCart[]|ObjectCollection findByRecurringId(int $recurring_id) Return ChildOcCart objects filtered by the recurring_id column
 * @method     ChildOcCart[]|ObjectCollection findByOption(string $option) Return ChildOcCart objects filtered by the option column
 * @method     ChildOcCart[]|ObjectCollection findByQuantity(int $quantity) Return ChildOcCart objects filtered by the quantity column
 * @method     ChildOcCart[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCart objects filtered by the date_added column
 * @method     ChildOcCart[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCartQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCartQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCart', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCartQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCartQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCartQuery) {
            return $criteria;
        }
        $query = new ChildOcCartQuery();
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
     * @return ChildOcCart|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCartTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCartTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCart A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT cart_id, api_id, customer_id, session_id, product_id, recurring_id, option, quantity, date_added FROM oc_cart WHERE cart_id = :p0';
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
            /** @var ChildOcCart $obj */
            $obj = new ChildOcCart();
            $obj->hydrate($row);
            OcCartTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCart|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCartTableMap::COL_CART_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCartTableMap::COL_CART_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the cart_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCartId(1234); // WHERE cart_id = 1234
     * $query->filterByCartId(array(12, 34)); // WHERE cart_id IN (12, 34)
     * $query->filterByCartId(array('min' => 12)); // WHERE cart_id > 12
     * </code>
     *
     * @param     mixed $cartId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByCartId($cartId = null, $comparison = null)
    {
        if (is_array($cartId)) {
            $useMinMax = false;
            if (isset($cartId['min'])) {
                $this->addUsingAlias(OcCartTableMap::COL_CART_ID, $cartId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cartId['max'])) {
                $this->addUsingAlias(OcCartTableMap::COL_CART_ID, $cartId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_CART_ID, $cartId, $comparison);
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
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByApiId($apiId = null, $comparison = null)
    {
        if (is_array($apiId)) {
            $useMinMax = false;
            if (isset($apiId['min'])) {
                $this->addUsingAlias(OcCartTableMap::COL_API_ID, $apiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($apiId['max'])) {
                $this->addUsingAlias(OcCartTableMap::COL_API_ID, $apiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_API_ID, $apiId, $comparison);
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
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcCartTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcCartTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the session_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionId('fooValue');   // WHERE session_id = 'fooValue'
     * $query->filterBySessionId('%fooValue%', Criteria::LIKE); // WHERE session_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterBySessionId($sessionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_SESSION_ID, $sessionId, $comparison);
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
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcCartTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcCartTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_PRODUCT_ID, $productId, $comparison);
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
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByRecurringId($recurringId = null, $comparison = null)
    {
        if (is_array($recurringId)) {
            $useMinMax = false;
            if (isset($recurringId['min'])) {
                $this->addUsingAlias(OcCartTableMap::COL_RECURRING_ID, $recurringId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recurringId['max'])) {
                $this->addUsingAlias(OcCartTableMap::COL_RECURRING_ID, $recurringId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_RECURRING_ID, $recurringId, $comparison);
    }

    /**
     * Filter the query on the option column
     *
     * Example usage:
     * <code>
     * $query->filterByOption('fooValue');   // WHERE option = 'fooValue'
     * $query->filterByOption('%fooValue%', Criteria::LIKE); // WHERE option LIKE '%fooValue%'
     * </code>
     *
     * @param     string $option The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByOption($option = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($option)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_OPTION, $option, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OcCartTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OcCartTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_QUANTITY, $quantity, $comparison);
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
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCartTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCartTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCartTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCart $ocCart Object to remove from the list of results
     *
     * @return $this|ChildOcCartQuery The current query, for fluid interface
     */
    public function prune($ocCart = null)
    {
        if ($ocCart) {
            $this->addUsingAlias(OcCartTableMap::COL_CART_ID, $ocCart->getCartId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_cart table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCartTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCartTableMap::clearInstancePool();
            OcCartTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCartTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCartTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCartTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCartTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCartQuery
