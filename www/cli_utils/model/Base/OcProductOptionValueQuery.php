<?php

namespace Base;

use \OcProductOptionValue as ChildOcProductOptionValue;
use \OcProductOptionValueQuery as ChildOcProductOptionValueQuery;
use \Exception;
use \PDO;
use Map\OcProductOptionValueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_product_option_value' table.
 *
 *
 *
 * @method     ChildOcProductOptionValueQuery orderByProductOptionValueId($order = Criteria::ASC) Order by the product_option_value_id column
 * @method     ChildOcProductOptionValueQuery orderByProductOptionId($order = Criteria::ASC) Order by the product_option_id column
 * @method     ChildOcProductOptionValueQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcProductOptionValueQuery orderByOptionId($order = Criteria::ASC) Order by the option_id column
 * @method     ChildOcProductOptionValueQuery orderByOptionValueId($order = Criteria::ASC) Order by the option_value_id column
 * @method     ChildOcProductOptionValueQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOcProductOptionValueQuery orderBySubtract($order = Criteria::ASC) Order by the subtract column
 * @method     ChildOcProductOptionValueQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildOcProductOptionValueQuery orderByPricePrefix($order = Criteria::ASC) Order by the price_prefix column
 * @method     ChildOcProductOptionValueQuery orderByPoints($order = Criteria::ASC) Order by the points column
 * @method     ChildOcProductOptionValueQuery orderByPointsPrefix($order = Criteria::ASC) Order by the points_prefix column
 * @method     ChildOcProductOptionValueQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildOcProductOptionValueQuery orderByWeightPrefix($order = Criteria::ASC) Order by the weight_prefix column
 *
 * @method     ChildOcProductOptionValueQuery groupByProductOptionValueId() Group by the product_option_value_id column
 * @method     ChildOcProductOptionValueQuery groupByProductOptionId() Group by the product_option_id column
 * @method     ChildOcProductOptionValueQuery groupByProductId() Group by the product_id column
 * @method     ChildOcProductOptionValueQuery groupByOptionId() Group by the option_id column
 * @method     ChildOcProductOptionValueQuery groupByOptionValueId() Group by the option_value_id column
 * @method     ChildOcProductOptionValueQuery groupByQuantity() Group by the quantity column
 * @method     ChildOcProductOptionValueQuery groupBySubtract() Group by the subtract column
 * @method     ChildOcProductOptionValueQuery groupByPrice() Group by the price column
 * @method     ChildOcProductOptionValueQuery groupByPricePrefix() Group by the price_prefix column
 * @method     ChildOcProductOptionValueQuery groupByPoints() Group by the points column
 * @method     ChildOcProductOptionValueQuery groupByPointsPrefix() Group by the points_prefix column
 * @method     ChildOcProductOptionValueQuery groupByWeight() Group by the weight column
 * @method     ChildOcProductOptionValueQuery groupByWeightPrefix() Group by the weight_prefix column
 *
 * @method     ChildOcProductOptionValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcProductOptionValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcProductOptionValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcProductOptionValueQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcProductOptionValueQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcProductOptionValueQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcProductOptionValue findOne(ConnectionInterface $con = null) Return the first ChildOcProductOptionValue matching the query
 * @method     ChildOcProductOptionValue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcProductOptionValue matching the query, or a new ChildOcProductOptionValue object populated from the query conditions when no match is found
 *
 * @method     ChildOcProductOptionValue findOneByProductOptionValueId(int $product_option_value_id) Return the first ChildOcProductOptionValue filtered by the product_option_value_id column
 * @method     ChildOcProductOptionValue findOneByProductOptionId(int $product_option_id) Return the first ChildOcProductOptionValue filtered by the product_option_id column
 * @method     ChildOcProductOptionValue findOneByProductId(int $product_id) Return the first ChildOcProductOptionValue filtered by the product_id column
 * @method     ChildOcProductOptionValue findOneByOptionId(int $option_id) Return the first ChildOcProductOptionValue filtered by the option_id column
 * @method     ChildOcProductOptionValue findOneByOptionValueId(int $option_value_id) Return the first ChildOcProductOptionValue filtered by the option_value_id column
 * @method     ChildOcProductOptionValue findOneByQuantity(int $quantity) Return the first ChildOcProductOptionValue filtered by the quantity column
 * @method     ChildOcProductOptionValue findOneBySubtract(boolean $subtract) Return the first ChildOcProductOptionValue filtered by the subtract column
 * @method     ChildOcProductOptionValue findOneByPrice(string $price) Return the first ChildOcProductOptionValue filtered by the price column
 * @method     ChildOcProductOptionValue findOneByPricePrefix(string $price_prefix) Return the first ChildOcProductOptionValue filtered by the price_prefix column
 * @method     ChildOcProductOptionValue findOneByPoints(int $points) Return the first ChildOcProductOptionValue filtered by the points column
 * @method     ChildOcProductOptionValue findOneByPointsPrefix(string $points_prefix) Return the first ChildOcProductOptionValue filtered by the points_prefix column
 * @method     ChildOcProductOptionValue findOneByWeight(string $weight) Return the first ChildOcProductOptionValue filtered by the weight column
 * @method     ChildOcProductOptionValue findOneByWeightPrefix(string $weight_prefix) Return the first ChildOcProductOptionValue filtered by the weight_prefix column *

 * @method     ChildOcProductOptionValue requirePk($key, ConnectionInterface $con = null) Return the ChildOcProductOptionValue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOne(ConnectionInterface $con = null) Return the first ChildOcProductOptionValue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductOptionValue requireOneByProductOptionValueId(int $product_option_value_id) Return the first ChildOcProductOptionValue filtered by the product_option_value_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByProductOptionId(int $product_option_id) Return the first ChildOcProductOptionValue filtered by the product_option_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByProductId(int $product_id) Return the first ChildOcProductOptionValue filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByOptionId(int $option_id) Return the first ChildOcProductOptionValue filtered by the option_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByOptionValueId(int $option_value_id) Return the first ChildOcProductOptionValue filtered by the option_value_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByQuantity(int $quantity) Return the first ChildOcProductOptionValue filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneBySubtract(boolean $subtract) Return the first ChildOcProductOptionValue filtered by the subtract column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByPrice(string $price) Return the first ChildOcProductOptionValue filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByPricePrefix(string $price_prefix) Return the first ChildOcProductOptionValue filtered by the price_prefix column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByPoints(int $points) Return the first ChildOcProductOptionValue filtered by the points column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByPointsPrefix(string $points_prefix) Return the first ChildOcProductOptionValue filtered by the points_prefix column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByWeight(string $weight) Return the first ChildOcProductOptionValue filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductOptionValue requireOneByWeightPrefix(string $weight_prefix) Return the first ChildOcProductOptionValue filtered by the weight_prefix column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductOptionValue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcProductOptionValue objects based on current ModelCriteria
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByProductOptionValueId(int $product_option_value_id) Return ChildOcProductOptionValue objects filtered by the product_option_value_id column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByProductOptionId(int $product_option_id) Return ChildOcProductOptionValue objects filtered by the product_option_id column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByProductId(int $product_id) Return ChildOcProductOptionValue objects filtered by the product_id column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByOptionId(int $option_id) Return ChildOcProductOptionValue objects filtered by the option_id column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByOptionValueId(int $option_value_id) Return ChildOcProductOptionValue objects filtered by the option_value_id column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByQuantity(int $quantity) Return ChildOcProductOptionValue objects filtered by the quantity column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findBySubtract(boolean $subtract) Return ChildOcProductOptionValue objects filtered by the subtract column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByPrice(string $price) Return ChildOcProductOptionValue objects filtered by the price column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByPricePrefix(string $price_prefix) Return ChildOcProductOptionValue objects filtered by the price_prefix column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByPoints(int $points) Return ChildOcProductOptionValue objects filtered by the points column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByPointsPrefix(string $points_prefix) Return ChildOcProductOptionValue objects filtered by the points_prefix column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByWeight(string $weight) Return ChildOcProductOptionValue objects filtered by the weight column
 * @method     ChildOcProductOptionValue[]|ObjectCollection findByWeightPrefix(string $weight_prefix) Return ChildOcProductOptionValue objects filtered by the weight_prefix column
 * @method     ChildOcProductOptionValue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcProductOptionValueQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcProductOptionValueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcProductOptionValue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcProductOptionValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcProductOptionValueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcProductOptionValueQuery) {
            return $criteria;
        }
        $query = new ChildOcProductOptionValueQuery();
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
     * @return ChildOcProductOptionValue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcProductOptionValueTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcProductOptionValueTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcProductOptionValue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT product_option_value_id, product_option_id, product_id, option_id, option_value_id, quantity, subtract, price, price_prefix, points, points_prefix, weight, weight_prefix FROM oc_product_option_value WHERE product_option_value_id = :p0';
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
            /** @var ChildOcProductOptionValue $obj */
            $obj = new ChildOcProductOptionValue();
            $obj->hydrate($row);
            OcProductOptionValueTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcProductOptionValue|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the product_option_value_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductOptionValueId(1234); // WHERE product_option_value_id = 1234
     * $query->filterByProductOptionValueId(array(12, 34)); // WHERE product_option_value_id IN (12, 34)
     * $query->filterByProductOptionValueId(array('min' => 12)); // WHERE product_option_value_id > 12
     * </code>
     *
     * @param     mixed $productOptionValueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByProductOptionValueId($productOptionValueId = null, $comparison = null)
    {
        if (is_array($productOptionValueId)) {
            $useMinMax = false;
            if (isset($productOptionValueId['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID, $productOptionValueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productOptionValueId['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID, $productOptionValueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID, $productOptionValueId, $comparison);
    }

    /**
     * Filter the query on the product_option_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductOptionId(1234); // WHERE product_option_id = 1234
     * $query->filterByProductOptionId(array(12, 34)); // WHERE product_option_id IN (12, 34)
     * $query->filterByProductOptionId(array('min' => 12)); // WHERE product_option_id > 12
     * </code>
     *
     * @param     mixed $productOptionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByProductOptionId($productOptionId = null, $comparison = null)
    {
        if (is_array($productOptionId)) {
            $useMinMax = false;
            if (isset($productOptionId['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_ID, $productOptionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productOptionId['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_ID, $productOptionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_ID, $productOptionId, $comparison);
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
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the option_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionId(1234); // WHERE option_id = 1234
     * $query->filterByOptionId(array(12, 34)); // WHERE option_id IN (12, 34)
     * $query->filterByOptionId(array('min' => 12)); // WHERE option_id > 12
     * </code>
     *
     * @param     mixed $optionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByOptionId($optionId = null, $comparison = null)
    {
        if (is_array($optionId)) {
            $useMinMax = false;
            if (isset($optionId['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_OPTION_ID, $optionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($optionId['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_OPTION_ID, $optionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_OPTION_ID, $optionId, $comparison);
    }

    /**
     * Filter the query on the option_value_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionValueId(1234); // WHERE option_value_id = 1234
     * $query->filterByOptionValueId(array(12, 34)); // WHERE option_value_id IN (12, 34)
     * $query->filterByOptionValueId(array('min' => 12)); // WHERE option_value_id > 12
     * </code>
     *
     * @param     mixed $optionValueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByOptionValueId($optionValueId = null, $comparison = null)
    {
        if (is_array($optionValueId)) {
            $useMinMax = false;
            if (isset($optionValueId['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_OPTION_VALUE_ID, $optionValueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($optionValueId['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_OPTION_VALUE_ID, $optionValueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_OPTION_VALUE_ID, $optionValueId, $comparison);
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
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the subtract column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtract(true); // WHERE subtract = true
     * $query->filterBySubtract('yes'); // WHERE subtract = true
     * </code>
     *
     * @param     boolean|string $subtract The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterBySubtract($subtract = null, $comparison = null)
    {
        if (is_string($subtract)) {
            $subtract = in_array(strtolower($subtract), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_SUBTRACT, $subtract, $comparison);
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
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the price_prefix column
     *
     * Example usage:
     * <code>
     * $query->filterByPricePrefix('fooValue');   // WHERE price_prefix = 'fooValue'
     * $query->filterByPricePrefix('%fooValue%', Criteria::LIKE); // WHERE price_prefix LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pricePrefix The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByPricePrefix($pricePrefix = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricePrefix)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRICE_PREFIX, $pricePrefix, $comparison);
    }

    /**
     * Filter the query on the points column
     *
     * Example usage:
     * <code>
     * $query->filterByPoints(1234); // WHERE points = 1234
     * $query->filterByPoints(array(12, 34)); // WHERE points IN (12, 34)
     * $query->filterByPoints(array('min' => 12)); // WHERE points > 12
     * </code>
     *
     * @param     mixed $points The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByPoints($points = null, $comparison = null)
    {
        if (is_array($points)) {
            $useMinMax = false;
            if (isset($points['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_POINTS, $points['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($points['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_POINTS, $points['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_POINTS, $points, $comparison);
    }

    /**
     * Filter the query on the points_prefix column
     *
     * Example usage:
     * <code>
     * $query->filterByPointsPrefix('fooValue');   // WHERE points_prefix = 'fooValue'
     * $query->filterByPointsPrefix('%fooValue%', Criteria::LIKE); // WHERE points_prefix LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pointsPrefix The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByPointsPrefix($pointsPrefix = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pointsPrefix)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_POINTS_PREFIX, $pointsPrefix, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight(1234); // WHERE weight = 1234
     * $query->filterByWeight(array(12, 34)); // WHERE weight IN (12, 34)
     * $query->filterByWeight(array('min' => 12)); // WHERE weight > 12
     * </code>
     *
     * @param     mixed $weight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (is_array($weight)) {
            $useMinMax = false;
            if (isset($weight['min'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_WEIGHT, $weight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weight['max'])) {
                $this->addUsingAlias(OcProductOptionValueTableMap::COL_WEIGHT, $weight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_WEIGHT, $weight, $comparison);
    }

    /**
     * Filter the query on the weight_prefix column
     *
     * Example usage:
     * <code>
     * $query->filterByWeightPrefix('fooValue');   // WHERE weight_prefix = 'fooValue'
     * $query->filterByWeightPrefix('%fooValue%', Criteria::LIKE); // WHERE weight_prefix LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weightPrefix The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByWeightPrefix($weightPrefix = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weightPrefix)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductOptionValueTableMap::COL_WEIGHT_PREFIX, $weightPrefix, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcProductOptionValue $ocProductOptionValue Object to remove from the list of results
     *
     * @return $this|ChildOcProductOptionValueQuery The current query, for fluid interface
     */
    public function prune($ocProductOptionValue = null)
    {
        if ($ocProductOptionValue) {
            $this->addUsingAlias(OcProductOptionValueTableMap::COL_PRODUCT_OPTION_VALUE_ID, $ocProductOptionValue->getProductOptionValueId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_product_option_value table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductOptionValueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcProductOptionValueTableMap::clearInstancePool();
            OcProductOptionValueTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductOptionValueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcProductOptionValueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcProductOptionValueTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcProductOptionValueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcProductOptionValueQuery
