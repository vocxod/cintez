<?php

namespace Base;

use \OcOrderOption as ChildOcOrderOption;
use \OcOrderOptionQuery as ChildOcOrderOptionQuery;
use \Exception;
use \PDO;
use Map\OcOrderOptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_order_option' table.
 *
 *
 *
 * @method     ChildOcOrderOptionQuery orderByOrderOptionId($order = Criteria::ASC) Order by the order_option_id column
 * @method     ChildOcOrderOptionQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcOrderOptionQuery orderByOrderProductId($order = Criteria::ASC) Order by the order_product_id column
 * @method     ChildOcOrderOptionQuery orderByProductOptionId($order = Criteria::ASC) Order by the product_option_id column
 * @method     ChildOcOrderOptionQuery orderByProductOptionValueId($order = Criteria::ASC) Order by the product_option_value_id column
 * @method     ChildOcOrderOptionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcOrderOptionQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildOcOrderOptionQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     ChildOcOrderOptionQuery groupByOrderOptionId() Group by the order_option_id column
 * @method     ChildOcOrderOptionQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcOrderOptionQuery groupByOrderProductId() Group by the order_product_id column
 * @method     ChildOcOrderOptionQuery groupByProductOptionId() Group by the product_option_id column
 * @method     ChildOcOrderOptionQuery groupByProductOptionValueId() Group by the product_option_value_id column
 * @method     ChildOcOrderOptionQuery groupByName() Group by the name column
 * @method     ChildOcOrderOptionQuery groupByValue() Group by the value column
 * @method     ChildOcOrderOptionQuery groupByType() Group by the type column
 *
 * @method     ChildOcOrderOptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOrderOptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOrderOptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOrderOptionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOrderOptionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOrderOptionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOrderOption findOne(ConnectionInterface $con = null) Return the first ChildOcOrderOption matching the query
 * @method     ChildOcOrderOption findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOrderOption matching the query, or a new ChildOcOrderOption object populated from the query conditions when no match is found
 *
 * @method     ChildOcOrderOption findOneByOrderOptionId(int $order_option_id) Return the first ChildOcOrderOption filtered by the order_option_id column
 * @method     ChildOcOrderOption findOneByOrderId(int $order_id) Return the first ChildOcOrderOption filtered by the order_id column
 * @method     ChildOcOrderOption findOneByOrderProductId(int $order_product_id) Return the first ChildOcOrderOption filtered by the order_product_id column
 * @method     ChildOcOrderOption findOneByProductOptionId(int $product_option_id) Return the first ChildOcOrderOption filtered by the product_option_id column
 * @method     ChildOcOrderOption findOneByProductOptionValueId(int $product_option_value_id) Return the first ChildOcOrderOption filtered by the product_option_value_id column
 * @method     ChildOcOrderOption findOneByName(string $name) Return the first ChildOcOrderOption filtered by the name column
 * @method     ChildOcOrderOption findOneByValue(string $value) Return the first ChildOcOrderOption filtered by the value column
 * @method     ChildOcOrderOption findOneByType(string $type) Return the first ChildOcOrderOption filtered by the type column *

 * @method     ChildOcOrderOption requirePk($key, ConnectionInterface $con = null) Return the ChildOcOrderOption by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderOption requireOne(ConnectionInterface $con = null) Return the first ChildOcOrderOption matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderOption requireOneByOrderOptionId(int $order_option_id) Return the first ChildOcOrderOption filtered by the order_option_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderOption requireOneByOrderId(int $order_id) Return the first ChildOcOrderOption filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderOption requireOneByOrderProductId(int $order_product_id) Return the first ChildOcOrderOption filtered by the order_product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderOption requireOneByProductOptionId(int $product_option_id) Return the first ChildOcOrderOption filtered by the product_option_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderOption requireOneByProductOptionValueId(int $product_option_value_id) Return the first ChildOcOrderOption filtered by the product_option_value_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderOption requireOneByName(string $name) Return the first ChildOcOrderOption filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderOption requireOneByValue(string $value) Return the first ChildOcOrderOption filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderOption requireOneByType(string $type) Return the first ChildOcOrderOption filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderOption[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOrderOption objects based on current ModelCriteria
 * @method     ChildOcOrderOption[]|ObjectCollection findByOrderOptionId(int $order_option_id) Return ChildOcOrderOption objects filtered by the order_option_id column
 * @method     ChildOcOrderOption[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcOrderOption objects filtered by the order_id column
 * @method     ChildOcOrderOption[]|ObjectCollection findByOrderProductId(int $order_product_id) Return ChildOcOrderOption objects filtered by the order_product_id column
 * @method     ChildOcOrderOption[]|ObjectCollection findByProductOptionId(int $product_option_id) Return ChildOcOrderOption objects filtered by the product_option_id column
 * @method     ChildOcOrderOption[]|ObjectCollection findByProductOptionValueId(int $product_option_value_id) Return ChildOcOrderOption objects filtered by the product_option_value_id column
 * @method     ChildOcOrderOption[]|ObjectCollection findByName(string $name) Return ChildOcOrderOption objects filtered by the name column
 * @method     ChildOcOrderOption[]|ObjectCollection findByValue(string $value) Return ChildOcOrderOption objects filtered by the value column
 * @method     ChildOcOrderOption[]|ObjectCollection findByType(string $type) Return ChildOcOrderOption objects filtered by the type column
 * @method     ChildOcOrderOption[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOrderOptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOrderOptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOrderOption', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOrderOptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOrderOptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOrderOptionQuery) {
            return $criteria;
        }
        $query = new ChildOcOrderOptionQuery();
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
     * @return ChildOcOrderOption|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderOptionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOrderOptionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcOrderOption A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT order_option_id, order_id, order_product_id, product_option_id, product_option_value_id, name, value, type FROM oc_order_option WHERE order_option_id = :p0';
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
            /** @var ChildOcOrderOption $obj */
            $obj = new ChildOcOrderOption();
            $obj->hydrate($row);
            OcOrderOptionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcOrderOption|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_OPTION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_OPTION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_option_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderOptionId(1234); // WHERE order_option_id = 1234
     * $query->filterByOrderOptionId(array(12, 34)); // WHERE order_option_id IN (12, 34)
     * $query->filterByOrderOptionId(array('min' => 12)); // WHERE order_option_id > 12
     * </code>
     *
     * @param     mixed $orderOptionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByOrderOptionId($orderOptionId = null, $comparison = null)
    {
        if (is_array($orderOptionId)) {
            $useMinMax = false;
            if (isset($orderOptionId['min'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_OPTION_ID, $orderOptionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderOptionId['max'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_OPTION_ID, $orderOptionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_OPTION_ID, $orderOptionId, $comparison);
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
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_ID, $orderId, $comparison);
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
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByOrderProductId($orderProductId = null, $comparison = null)
    {
        if (is_array($orderProductId)) {
            $useMinMax = false;
            if (isset($orderProductId['min'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_PRODUCT_ID, $orderProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderProductId['max'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_PRODUCT_ID, $orderProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_PRODUCT_ID, $orderProductId, $comparison);
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
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByProductOptionId($productOptionId = null, $comparison = null)
    {
        if (is_array($productOptionId)) {
            $useMinMax = false;
            if (isset($productOptionId['min'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_PRODUCT_OPTION_ID, $productOptionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productOptionId['max'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_PRODUCT_OPTION_ID, $productOptionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_PRODUCT_OPTION_ID, $productOptionId, $comparison);
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
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByProductOptionValueId($productOptionValueId = null, $comparison = null)
    {
        if (is_array($productOptionValueId)) {
            $useMinMax = false;
            if (isset($productOptionValueId['min'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_PRODUCT_OPTION_VALUE_ID, $productOptionValueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productOptionValueId['max'])) {
                $this->addUsingAlias(OcOrderOptionTableMap::COL_PRODUCT_OPTION_VALUE_ID, $productOptionValueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_PRODUCT_OPTION_VALUE_ID, $productOptionValueId, $comparison);
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
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%', Criteria::LIKE); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_VALUE, $value, $comparison);
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
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderOptionTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOrderOption $ocOrderOption Object to remove from the list of results
     *
     * @return $this|ChildOcOrderOptionQuery The current query, for fluid interface
     */
    public function prune($ocOrderOption = null)
    {
        if ($ocOrderOption) {
            $this->addUsingAlias(OcOrderOptionTableMap::COL_ORDER_OPTION_ID, $ocOrderOption->getOrderOptionId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_order_option table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderOptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOrderOptionTableMap::clearInstancePool();
            OcOrderOptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderOptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOrderOptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOrderOptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOrderOptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOrderOptionQuery
