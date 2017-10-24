<?php

namespace Base;

use \OcProductDiscount as ChildOcProductDiscount;
use \OcProductDiscountQuery as ChildOcProductDiscountQuery;
use \Exception;
use \PDO;
use Map\OcProductDiscountTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_product_discount' table.
 *
 *
 *
 * @method     ChildOcProductDiscountQuery orderByProductDiscountId($order = Criteria::ASC) Order by the product_discount_id column
 * @method     ChildOcProductDiscountQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcProductDiscountQuery orderByCustomerGroupId($order = Criteria::ASC) Order by the customer_group_id column
 * @method     ChildOcProductDiscountQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOcProductDiscountQuery orderByPriority($order = Criteria::ASC) Order by the priority column
 * @method     ChildOcProductDiscountQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildOcProductDiscountQuery orderByDateStart($order = Criteria::ASC) Order by the date_start column
 * @method     ChildOcProductDiscountQuery orderByDateEnd($order = Criteria::ASC) Order by the date_end column
 *
 * @method     ChildOcProductDiscountQuery groupByProductDiscountId() Group by the product_discount_id column
 * @method     ChildOcProductDiscountQuery groupByProductId() Group by the product_id column
 * @method     ChildOcProductDiscountQuery groupByCustomerGroupId() Group by the customer_group_id column
 * @method     ChildOcProductDiscountQuery groupByQuantity() Group by the quantity column
 * @method     ChildOcProductDiscountQuery groupByPriority() Group by the priority column
 * @method     ChildOcProductDiscountQuery groupByPrice() Group by the price column
 * @method     ChildOcProductDiscountQuery groupByDateStart() Group by the date_start column
 * @method     ChildOcProductDiscountQuery groupByDateEnd() Group by the date_end column
 *
 * @method     ChildOcProductDiscountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcProductDiscountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcProductDiscountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcProductDiscountQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcProductDiscountQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcProductDiscountQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcProductDiscount findOne(ConnectionInterface $con = null) Return the first ChildOcProductDiscount matching the query
 * @method     ChildOcProductDiscount findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcProductDiscount matching the query, or a new ChildOcProductDiscount object populated from the query conditions when no match is found
 *
 * @method     ChildOcProductDiscount findOneByProductDiscountId(int $product_discount_id) Return the first ChildOcProductDiscount filtered by the product_discount_id column
 * @method     ChildOcProductDiscount findOneByProductId(int $product_id) Return the first ChildOcProductDiscount filtered by the product_id column
 * @method     ChildOcProductDiscount findOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcProductDiscount filtered by the customer_group_id column
 * @method     ChildOcProductDiscount findOneByQuantity(int $quantity) Return the first ChildOcProductDiscount filtered by the quantity column
 * @method     ChildOcProductDiscount findOneByPriority(int $priority) Return the first ChildOcProductDiscount filtered by the priority column
 * @method     ChildOcProductDiscount findOneByPrice(string $price) Return the first ChildOcProductDiscount filtered by the price column
 * @method     ChildOcProductDiscount findOneByDateStart(string $date_start) Return the first ChildOcProductDiscount filtered by the date_start column
 * @method     ChildOcProductDiscount findOneByDateEnd(string $date_end) Return the first ChildOcProductDiscount filtered by the date_end column *

 * @method     ChildOcProductDiscount requirePk($key, ConnectionInterface $con = null) Return the ChildOcProductDiscount by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDiscount requireOne(ConnectionInterface $con = null) Return the first ChildOcProductDiscount matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductDiscount requireOneByProductDiscountId(int $product_discount_id) Return the first ChildOcProductDiscount filtered by the product_discount_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDiscount requireOneByProductId(int $product_id) Return the first ChildOcProductDiscount filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDiscount requireOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcProductDiscount filtered by the customer_group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDiscount requireOneByQuantity(int $quantity) Return the first ChildOcProductDiscount filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDiscount requireOneByPriority(int $priority) Return the first ChildOcProductDiscount filtered by the priority column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDiscount requireOneByPrice(string $price) Return the first ChildOcProductDiscount filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDiscount requireOneByDateStart(string $date_start) Return the first ChildOcProductDiscount filtered by the date_start column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDiscount requireOneByDateEnd(string $date_end) Return the first ChildOcProductDiscount filtered by the date_end column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductDiscount[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcProductDiscount objects based on current ModelCriteria
 * @method     ChildOcProductDiscount[]|ObjectCollection findByProductDiscountId(int $product_discount_id) Return ChildOcProductDiscount objects filtered by the product_discount_id column
 * @method     ChildOcProductDiscount[]|ObjectCollection findByProductId(int $product_id) Return ChildOcProductDiscount objects filtered by the product_id column
 * @method     ChildOcProductDiscount[]|ObjectCollection findByCustomerGroupId(int $customer_group_id) Return ChildOcProductDiscount objects filtered by the customer_group_id column
 * @method     ChildOcProductDiscount[]|ObjectCollection findByQuantity(int $quantity) Return ChildOcProductDiscount objects filtered by the quantity column
 * @method     ChildOcProductDiscount[]|ObjectCollection findByPriority(int $priority) Return ChildOcProductDiscount objects filtered by the priority column
 * @method     ChildOcProductDiscount[]|ObjectCollection findByPrice(string $price) Return ChildOcProductDiscount objects filtered by the price column
 * @method     ChildOcProductDiscount[]|ObjectCollection findByDateStart(string $date_start) Return ChildOcProductDiscount objects filtered by the date_start column
 * @method     ChildOcProductDiscount[]|ObjectCollection findByDateEnd(string $date_end) Return ChildOcProductDiscount objects filtered by the date_end column
 * @method     ChildOcProductDiscount[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcProductDiscountQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcProductDiscountQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcProductDiscount', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcProductDiscountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcProductDiscountQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcProductDiscountQuery) {
            return $criteria;
        }
        $query = new ChildOcProductDiscountQuery();
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
     * @return ChildOcProductDiscount|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcProductDiscountTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcProductDiscountTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcProductDiscount A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT product_discount_id, product_id, customer_group_id, quantity, priority, price, date_start, date_end FROM oc_product_discount WHERE product_discount_id = :p0';
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
            /** @var ChildOcProductDiscount $obj */
            $obj = new ChildOcProductDiscount();
            $obj->hydrate($row);
            OcProductDiscountTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcProductDiscount|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the product_discount_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductDiscountId(1234); // WHERE product_discount_id = 1234
     * $query->filterByProductDiscountId(array(12, 34)); // WHERE product_discount_id IN (12, 34)
     * $query->filterByProductDiscountId(array('min' => 12)); // WHERE product_discount_id > 12
     * </code>
     *
     * @param     mixed $productDiscountId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByProductDiscountId($productDiscountId = null, $comparison = null)
    {
        if (is_array($productDiscountId)) {
            $useMinMax = false;
            if (isset($productDiscountId['min'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID, $productDiscountId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productDiscountId['max'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID, $productDiscountId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID, $productDiscountId, $comparison);
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
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the customer_group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerGroupId(1234); // WHERE customer_group_id = 1234
     * $query->filterByCustomerGroupId(array(12, 34)); // WHERE customer_group_id IN (12, 34)
     * $query->filterByCustomerGroupId(array('min' => 12)); // WHERE customer_group_id > 12
     * </code>
     *
     * @param     mixed $customerGroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByCustomerGroupId($customerGroupId = null, $comparison = null)
    {
        if (is_array($customerGroupId)) {
            $useMinMax = false;
            if (isset($customerGroupId['min'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerGroupId['max'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId, $comparison);
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
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the priority column
     *
     * Example usage:
     * <code>
     * $query->filterByPriority(1234); // WHERE priority = 1234
     * $query->filterByPriority(array(12, 34)); // WHERE priority IN (12, 34)
     * $query->filterByPriority(array('min' => 12)); // WHERE priority > 12
     * </code>
     *
     * @param     mixed $priority The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByPriority($priority = null, $comparison = null)
    {
        if (is_array($priority)) {
            $useMinMax = false;
            if (isset($priority['min'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_PRIORITY, $priority['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priority['max'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_PRIORITY, $priority['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_PRIORITY, $priority, $comparison);
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
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the date_start column
     *
     * Example usage:
     * <code>
     * $query->filterByDateStart('2011-03-14'); // WHERE date_start = '2011-03-14'
     * $query->filterByDateStart('now'); // WHERE date_start = '2011-03-14'
     * $query->filterByDateStart(array('max' => 'yesterday')); // WHERE date_start > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateStart The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByDateStart($dateStart = null, $comparison = null)
    {
        if (is_array($dateStart)) {
            $useMinMax = false;
            if (isset($dateStart['min'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_DATE_START, $dateStart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateStart['max'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_DATE_START, $dateStart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_DATE_START, $dateStart, $comparison);
    }

    /**
     * Filter the query on the date_end column
     *
     * Example usage:
     * <code>
     * $query->filterByDateEnd('2011-03-14'); // WHERE date_end = '2011-03-14'
     * $query->filterByDateEnd('now'); // WHERE date_end = '2011-03-14'
     * $query->filterByDateEnd(array('max' => 'yesterday')); // WHERE date_end > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateEnd The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function filterByDateEnd($dateEnd = null, $comparison = null)
    {
        if (is_array($dateEnd)) {
            $useMinMax = false;
            if (isset($dateEnd['min'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_DATE_END, $dateEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateEnd['max'])) {
                $this->addUsingAlias(OcProductDiscountTableMap::COL_DATE_END, $dateEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDiscountTableMap::COL_DATE_END, $dateEnd, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcProductDiscount $ocProductDiscount Object to remove from the list of results
     *
     * @return $this|ChildOcProductDiscountQuery The current query, for fluid interface
     */
    public function prune($ocProductDiscount = null)
    {
        if ($ocProductDiscount) {
            $this->addUsingAlias(OcProductDiscountTableMap::COL_PRODUCT_DISCOUNT_ID, $ocProductDiscount->getProductDiscountId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_product_discount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductDiscountTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcProductDiscountTableMap::clearInstancePool();
            OcProductDiscountTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductDiscountTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcProductDiscountTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcProductDiscountTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcProductDiscountTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcProductDiscountQuery
