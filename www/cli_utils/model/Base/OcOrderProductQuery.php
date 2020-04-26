<?php

namespace Base;

use \OcOrderProduct as ChildOcOrderProduct;
use \OcOrderProductQuery as ChildOcOrderProductQuery;
use \Exception;
use \PDO;
use Map\OcOrderProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_order_product' table.
 *
 *
 *
 * @method     ChildOcOrderProductQuery orderByOrderProductId($order = Criteria::ASC) Order by the order_product_id column
 * @method     ChildOcOrderProductQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcOrderProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcOrderProductQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcOrderProductQuery orderByModel($order = Criteria::ASC) Order by the model column
 * @method     ChildOcOrderProductQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOcOrderProductQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildOcOrderProductQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildOcOrderProductQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildOcOrderProductQuery orderByReward($order = Criteria::ASC) Order by the reward column
 *
 * @method     ChildOcOrderProductQuery groupByOrderProductId() Group by the order_product_id column
 * @method     ChildOcOrderProductQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcOrderProductQuery groupByProductId() Group by the product_id column
 * @method     ChildOcOrderProductQuery groupByName() Group by the name column
 * @method     ChildOcOrderProductQuery groupByModel() Group by the model column
 * @method     ChildOcOrderProductQuery groupByQuantity() Group by the quantity column
 * @method     ChildOcOrderProductQuery groupByPrice() Group by the price column
 * @method     ChildOcOrderProductQuery groupByTotal() Group by the total column
 * @method     ChildOcOrderProductQuery groupByTax() Group by the tax column
 * @method     ChildOcOrderProductQuery groupByReward() Group by the reward column
 *
 * @method     ChildOcOrderProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOrderProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOrderProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOrderProductQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOrderProductQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOrderProductQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOrderProduct findOne(ConnectionInterface $con = null) Return the first ChildOcOrderProduct matching the query
 * @method     ChildOcOrderProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOrderProduct matching the query, or a new ChildOcOrderProduct object populated from the query conditions when no match is found
 *
 * @method     ChildOcOrderProduct findOneByOrderProductId(int $order_product_id) Return the first ChildOcOrderProduct filtered by the order_product_id column
 * @method     ChildOcOrderProduct findOneByOrderId(int $order_id) Return the first ChildOcOrderProduct filtered by the order_id column
 * @method     ChildOcOrderProduct findOneByProductId(int $product_id) Return the first ChildOcOrderProduct filtered by the product_id column
 * @method     ChildOcOrderProduct findOneByName(string $name) Return the first ChildOcOrderProduct filtered by the name column
 * @method     ChildOcOrderProduct findOneByModel(string $model) Return the first ChildOcOrderProduct filtered by the model column
 * @method     ChildOcOrderProduct findOneByQuantity(int $quantity) Return the first ChildOcOrderProduct filtered by the quantity column
 * @method     ChildOcOrderProduct findOneByPrice(string $price) Return the first ChildOcOrderProduct filtered by the price column
 * @method     ChildOcOrderProduct findOneByTotal(string $total) Return the first ChildOcOrderProduct filtered by the total column
 * @method     ChildOcOrderProduct findOneByTax(string $tax) Return the first ChildOcOrderProduct filtered by the tax column
 * @method     ChildOcOrderProduct findOneByReward(int $reward) Return the first ChildOcOrderProduct filtered by the reward column *

 * @method     ChildOcOrderProduct requirePk($key, ConnectionInterface $con = null) Return the ChildOcOrderProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOne(ConnectionInterface $con = null) Return the first ChildOcOrderProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderProduct requireOneByOrderProductId(int $order_product_id) Return the first ChildOcOrderProduct filtered by the order_product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByOrderId(int $order_id) Return the first ChildOcOrderProduct filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByProductId(int $product_id) Return the first ChildOcOrderProduct filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByName(string $name) Return the first ChildOcOrderProduct filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByModel(string $model) Return the first ChildOcOrderProduct filtered by the model column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByQuantity(int $quantity) Return the first ChildOcOrderProduct filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByPrice(string $price) Return the first ChildOcOrderProduct filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByTotal(string $total) Return the first ChildOcOrderProduct filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByTax(string $tax) Return the first ChildOcOrderProduct filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderProduct requireOneByReward(int $reward) Return the first ChildOcOrderProduct filtered by the reward column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderProduct[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOrderProduct objects based on current ModelCriteria
 * @method     ChildOcOrderProduct[]|ObjectCollection findByOrderProductId(int $order_product_id) Return ChildOcOrderProduct objects filtered by the order_product_id column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcOrderProduct objects filtered by the order_id column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByProductId(int $product_id) Return ChildOcOrderProduct objects filtered by the product_id column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByName(string $name) Return ChildOcOrderProduct objects filtered by the name column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByModel(string $model) Return ChildOcOrderProduct objects filtered by the model column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByQuantity(int $quantity) Return ChildOcOrderProduct objects filtered by the quantity column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByPrice(string $price) Return ChildOcOrderProduct objects filtered by the price column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByTotal(string $total) Return ChildOcOrderProduct objects filtered by the total column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByTax(string $tax) Return ChildOcOrderProduct objects filtered by the tax column
 * @method     ChildOcOrderProduct[]|ObjectCollection findByReward(int $reward) Return ChildOcOrderProduct objects filtered by the reward column
 * @method     ChildOcOrderProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOrderProductQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOrderProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOrderProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOrderProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOrderProductQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOrderProductQuery) {
            return $criteria;
        }
        $query = new ChildOcOrderProductQuery();
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
     * @return ChildOcOrderProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderProductTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOrderProductTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcOrderProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT order_product_id, order_id, product_id, name, model, quantity, price, total, tax, reward FROM oc_order_product WHERE order_product_id = :p0';
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
            /** @var ChildOcOrderProduct $obj */
            $obj = new ChildOcOrderProduct();
            $obj->hydrate($row);
            OcOrderProductTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcOrderProduct|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderProductId(1234); // WHERE order_product_id = 1234
     * $query->filterByOrderProductId(array(12, 34)); // WHERE order_product_id IN (12, 34)
     * $query->filterByOrderProductId(array('min' => 12)); // WHERE order_product_id > 12
     * </code>
     *
     * @param     mixed $orderProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByOrderProductId($orderProductId = null, $comparison = null)
    {
        if (is_array($orderProductId)) {
            $useMinMax = false;
            if (isset($orderProductId['min'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID, $orderProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderProductId['max'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID, $orderProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID, $orderProductId, $comparison);
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
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_ID, $orderId, $comparison);
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
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the model column
     *
     * Example usage:
     * <code>
     * $query->filterByModel('fooValue');   // WHERE model = 'fooValue'
     * $query->filterByModel('%fooValue%', Criteria::LIKE); // WHERE model LIKE '%fooValue%'
     * </code>
     *
     * @param     string $model The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByModel($model = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($model)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_MODEL, $model, $comparison);
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
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_QUANTITY, $quantity, $comparison);
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
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTax(1234); // WHERE tax = 1234
     * $query->filterByTax(array(12, 34)); // WHERE tax IN (12, 34)
     * $query->filterByTax(array('min' => 12)); // WHERE tax > 12
     * </code>
     *
     * @param     mixed $tax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_TAX, $tax, $comparison);
    }

    /**
     * Filter the query on the reward column
     *
     * Example usage:
     * <code>
     * $query->filterByReward(1234); // WHERE reward = 1234
     * $query->filterByReward(array(12, 34)); // WHERE reward IN (12, 34)
     * $query->filterByReward(array('min' => 12)); // WHERE reward > 12
     * </code>
     *
     * @param     mixed $reward The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function filterByReward($reward = null, $comparison = null)
    {
        if (is_array($reward)) {
            $useMinMax = false;
            if (isset($reward['min'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_REWARD, $reward['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reward['max'])) {
                $this->addUsingAlias(OcOrderProductTableMap::COL_REWARD, $reward['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderProductTableMap::COL_REWARD, $reward, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOrderProduct $ocOrderProduct Object to remove from the list of results
     *
     * @return $this|ChildOcOrderProductQuery The current query, for fluid interface
     */
    public function prune($ocOrderProduct = null)
    {
        if ($ocOrderProduct) {
            $this->addUsingAlias(OcOrderProductTableMap::COL_ORDER_PRODUCT_ID, $ocOrderProduct->getOrderProductId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_order_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOrderProductTableMap::clearInstancePool();
            OcOrderProductTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOrderProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOrderProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOrderProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOrderProductQuery
