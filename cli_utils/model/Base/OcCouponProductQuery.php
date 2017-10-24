<?php

namespace Base;

use \OcCouponProduct as ChildOcCouponProduct;
use \OcCouponProductQuery as ChildOcCouponProductQuery;
use \Exception;
use \PDO;
use Map\OcCouponProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_coupon_product' table.
 *
 *
 *
 * @method     ChildOcCouponProductQuery orderByCouponProductId($order = Criteria::ASC) Order by the coupon_product_id column
 * @method     ChildOcCouponProductQuery orderByCouponId($order = Criteria::ASC) Order by the coupon_id column
 * @method     ChildOcCouponProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 *
 * @method     ChildOcCouponProductQuery groupByCouponProductId() Group by the coupon_product_id column
 * @method     ChildOcCouponProductQuery groupByCouponId() Group by the coupon_id column
 * @method     ChildOcCouponProductQuery groupByProductId() Group by the product_id column
 *
 * @method     ChildOcCouponProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCouponProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCouponProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCouponProductQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCouponProductQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCouponProductQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCouponProduct findOne(ConnectionInterface $con = null) Return the first ChildOcCouponProduct matching the query
 * @method     ChildOcCouponProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCouponProduct matching the query, or a new ChildOcCouponProduct object populated from the query conditions when no match is found
 *
 * @method     ChildOcCouponProduct findOneByCouponProductId(int $coupon_product_id) Return the first ChildOcCouponProduct filtered by the coupon_product_id column
 * @method     ChildOcCouponProduct findOneByCouponId(int $coupon_id) Return the first ChildOcCouponProduct filtered by the coupon_id column
 * @method     ChildOcCouponProduct findOneByProductId(int $product_id) Return the first ChildOcCouponProduct filtered by the product_id column *

 * @method     ChildOcCouponProduct requirePk($key, ConnectionInterface $con = null) Return the ChildOcCouponProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponProduct requireOne(ConnectionInterface $con = null) Return the first ChildOcCouponProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCouponProduct requireOneByCouponProductId(int $coupon_product_id) Return the first ChildOcCouponProduct filtered by the coupon_product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponProduct requireOneByCouponId(int $coupon_id) Return the first ChildOcCouponProduct filtered by the coupon_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCouponProduct requireOneByProductId(int $product_id) Return the first ChildOcCouponProduct filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCouponProduct[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCouponProduct objects based on current ModelCriteria
 * @method     ChildOcCouponProduct[]|ObjectCollection findByCouponProductId(int $coupon_product_id) Return ChildOcCouponProduct objects filtered by the coupon_product_id column
 * @method     ChildOcCouponProduct[]|ObjectCollection findByCouponId(int $coupon_id) Return ChildOcCouponProduct objects filtered by the coupon_id column
 * @method     ChildOcCouponProduct[]|ObjectCollection findByProductId(int $product_id) Return ChildOcCouponProduct objects filtered by the product_id column
 * @method     ChildOcCouponProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCouponProductQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCouponProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCouponProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCouponProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCouponProductQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCouponProductQuery) {
            return $criteria;
        }
        $query = new ChildOcCouponProductQuery();
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
     * @return ChildOcCouponProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCouponProductTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCouponProductTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCouponProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT coupon_product_id, coupon_id, product_id FROM oc_coupon_product WHERE coupon_product_id = :p0';
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
            /** @var ChildOcCouponProduct $obj */
            $obj = new ChildOcCouponProduct();
            $obj->hydrate($row);
            OcCouponProductTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCouponProduct|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCouponProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_PRODUCT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCouponProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_PRODUCT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the coupon_product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponProductId(1234); // WHERE coupon_product_id = 1234
     * $query->filterByCouponProductId(array(12, 34)); // WHERE coupon_product_id IN (12, 34)
     * $query->filterByCouponProductId(array('min' => 12)); // WHERE coupon_product_id > 12
     * </code>
     *
     * @param     mixed $couponProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponProductQuery The current query, for fluid interface
     */
    public function filterByCouponProductId($couponProductId = null, $comparison = null)
    {
        if (is_array($couponProductId)) {
            $useMinMax = false;
            if (isset($couponProductId['min'])) {
                $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_PRODUCT_ID, $couponProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($couponProductId['max'])) {
                $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_PRODUCT_ID, $couponProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_PRODUCT_ID, $couponProductId, $comparison);
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
     * @return $this|ChildOcCouponProductQuery The current query, for fluid interface
     */
    public function filterByCouponId($couponId = null, $comparison = null)
    {
        if (is_array($couponId)) {
            $useMinMax = false;
            if (isset($couponId['min'])) {
                $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_ID, $couponId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($couponId['max'])) {
                $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_ID, $couponId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_ID, $couponId, $comparison);
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
     * @return $this|ChildOcCouponProductQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcCouponProductTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcCouponProductTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponProductTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCouponProduct $ocCouponProduct Object to remove from the list of results
     *
     * @return $this|ChildOcCouponProductQuery The current query, for fluid interface
     */
    public function prune($ocCouponProduct = null)
    {
        if ($ocCouponProduct) {
            $this->addUsingAlias(OcCouponProductTableMap::COL_COUPON_PRODUCT_ID, $ocCouponProduct->getCouponProductId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_coupon_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCouponProductTableMap::clearInstancePool();
            OcCouponProductTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCouponProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCouponProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCouponProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCouponProductQuery
