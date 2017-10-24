<?php

namespace Base;

use \OcCoupon as ChildOcCoupon;
use \OcCouponQuery as ChildOcCouponQuery;
use \Exception;
use \PDO;
use Map\OcCouponTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_coupon' table.
 *
 *
 *
 * @method     ChildOcCouponQuery orderByCouponId($order = Criteria::ASC) Order by the coupon_id column
 * @method     ChildOcCouponQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcCouponQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcCouponQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOcCouponQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildOcCouponQuery orderByLogged($order = Criteria::ASC) Order by the logged column
 * @method     ChildOcCouponQuery orderByShipping($order = Criteria::ASC) Order by the shipping column
 * @method     ChildOcCouponQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildOcCouponQuery orderByDateStart($order = Criteria::ASC) Order by the date_start column
 * @method     ChildOcCouponQuery orderByDateEnd($order = Criteria::ASC) Order by the date_end column
 * @method     ChildOcCouponQuery orderByUsesTotal($order = Criteria::ASC) Order by the uses_total column
 * @method     ChildOcCouponQuery orderByUsesCustomer($order = Criteria::ASC) Order by the uses_customer column
 * @method     ChildOcCouponQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcCouponQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcCouponQuery groupByCouponId() Group by the coupon_id column
 * @method     ChildOcCouponQuery groupByName() Group by the name column
 * @method     ChildOcCouponQuery groupByCode() Group by the code column
 * @method     ChildOcCouponQuery groupByType() Group by the type column
 * @method     ChildOcCouponQuery groupByDiscount() Group by the discount column
 * @method     ChildOcCouponQuery groupByLogged() Group by the logged column
 * @method     ChildOcCouponQuery groupByShipping() Group by the shipping column
 * @method     ChildOcCouponQuery groupByTotal() Group by the total column
 * @method     ChildOcCouponQuery groupByDateStart() Group by the date_start column
 * @method     ChildOcCouponQuery groupByDateEnd() Group by the date_end column
 * @method     ChildOcCouponQuery groupByUsesTotal() Group by the uses_total column
 * @method     ChildOcCouponQuery groupByUsesCustomer() Group by the uses_customer column
 * @method     ChildOcCouponQuery groupByStatus() Group by the status column
 * @method     ChildOcCouponQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcCouponQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCouponQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCouponQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCouponQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCouponQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCouponQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCoupon findOne(ConnectionInterface $con = null) Return the first ChildOcCoupon matching the query
 * @method     ChildOcCoupon findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCoupon matching the query, or a new ChildOcCoupon object populated from the query conditions when no match is found
 *
 * @method     ChildOcCoupon findOneByCouponId(int $coupon_id) Return the first ChildOcCoupon filtered by the coupon_id column
 * @method     ChildOcCoupon findOneByName(string $name) Return the first ChildOcCoupon filtered by the name column
 * @method     ChildOcCoupon findOneByCode(string $code) Return the first ChildOcCoupon filtered by the code column
 * @method     ChildOcCoupon findOneByType(string $type) Return the first ChildOcCoupon filtered by the type column
 * @method     ChildOcCoupon findOneByDiscount(string $discount) Return the first ChildOcCoupon filtered by the discount column
 * @method     ChildOcCoupon findOneByLogged(boolean $logged) Return the first ChildOcCoupon filtered by the logged column
 * @method     ChildOcCoupon findOneByShipping(boolean $shipping) Return the first ChildOcCoupon filtered by the shipping column
 * @method     ChildOcCoupon findOneByTotal(string $total) Return the first ChildOcCoupon filtered by the total column
 * @method     ChildOcCoupon findOneByDateStart(string $date_start) Return the first ChildOcCoupon filtered by the date_start column
 * @method     ChildOcCoupon findOneByDateEnd(string $date_end) Return the first ChildOcCoupon filtered by the date_end column
 * @method     ChildOcCoupon findOneByUsesTotal(int $uses_total) Return the first ChildOcCoupon filtered by the uses_total column
 * @method     ChildOcCoupon findOneByUsesCustomer(string $uses_customer) Return the first ChildOcCoupon filtered by the uses_customer column
 * @method     ChildOcCoupon findOneByStatus(boolean $status) Return the first ChildOcCoupon filtered by the status column
 * @method     ChildOcCoupon findOneByDateAdded(string $date_added) Return the first ChildOcCoupon filtered by the date_added column *

 * @method     ChildOcCoupon requirePk($key, ConnectionInterface $con = null) Return the ChildOcCoupon by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOne(ConnectionInterface $con = null) Return the first ChildOcCoupon matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCoupon requireOneByCouponId(int $coupon_id) Return the first ChildOcCoupon filtered by the coupon_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByName(string $name) Return the first ChildOcCoupon filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByCode(string $code) Return the first ChildOcCoupon filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByType(string $type) Return the first ChildOcCoupon filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByDiscount(string $discount) Return the first ChildOcCoupon filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByLogged(boolean $logged) Return the first ChildOcCoupon filtered by the logged column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByShipping(boolean $shipping) Return the first ChildOcCoupon filtered by the shipping column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByTotal(string $total) Return the first ChildOcCoupon filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByDateStart(string $date_start) Return the first ChildOcCoupon filtered by the date_start column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByDateEnd(string $date_end) Return the first ChildOcCoupon filtered by the date_end column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByUsesTotal(int $uses_total) Return the first ChildOcCoupon filtered by the uses_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByUsesCustomer(string $uses_customer) Return the first ChildOcCoupon filtered by the uses_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByStatus(boolean $status) Return the first ChildOcCoupon filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCoupon requireOneByDateAdded(string $date_added) Return the first ChildOcCoupon filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCoupon[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCoupon objects based on current ModelCriteria
 * @method     ChildOcCoupon[]|ObjectCollection findByCouponId(int $coupon_id) Return ChildOcCoupon objects filtered by the coupon_id column
 * @method     ChildOcCoupon[]|ObjectCollection findByName(string $name) Return ChildOcCoupon objects filtered by the name column
 * @method     ChildOcCoupon[]|ObjectCollection findByCode(string $code) Return ChildOcCoupon objects filtered by the code column
 * @method     ChildOcCoupon[]|ObjectCollection findByType(string $type) Return ChildOcCoupon objects filtered by the type column
 * @method     ChildOcCoupon[]|ObjectCollection findByDiscount(string $discount) Return ChildOcCoupon objects filtered by the discount column
 * @method     ChildOcCoupon[]|ObjectCollection findByLogged(boolean $logged) Return ChildOcCoupon objects filtered by the logged column
 * @method     ChildOcCoupon[]|ObjectCollection findByShipping(boolean $shipping) Return ChildOcCoupon objects filtered by the shipping column
 * @method     ChildOcCoupon[]|ObjectCollection findByTotal(string $total) Return ChildOcCoupon objects filtered by the total column
 * @method     ChildOcCoupon[]|ObjectCollection findByDateStart(string $date_start) Return ChildOcCoupon objects filtered by the date_start column
 * @method     ChildOcCoupon[]|ObjectCollection findByDateEnd(string $date_end) Return ChildOcCoupon objects filtered by the date_end column
 * @method     ChildOcCoupon[]|ObjectCollection findByUsesTotal(int $uses_total) Return ChildOcCoupon objects filtered by the uses_total column
 * @method     ChildOcCoupon[]|ObjectCollection findByUsesCustomer(string $uses_customer) Return ChildOcCoupon objects filtered by the uses_customer column
 * @method     ChildOcCoupon[]|ObjectCollection findByStatus(boolean $status) Return ChildOcCoupon objects filtered by the status column
 * @method     ChildOcCoupon[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCoupon objects filtered by the date_added column
 * @method     ChildOcCoupon[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCouponQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCouponQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCoupon', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCouponQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCouponQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCouponQuery) {
            return $criteria;
        }
        $query = new ChildOcCouponQuery();
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
     * @return ChildOcCoupon|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCouponTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCouponTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCoupon A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT coupon_id, name, code, type, discount, logged, shipping, total, date_start, date_end, uses_total, uses_customer, status, date_added FROM oc_coupon WHERE coupon_id = :p0';
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
            /** @var ChildOcCoupon $obj */
            $obj = new ChildOcCoupon();
            $obj->hydrate($row);
            OcCouponTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCoupon|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCouponTableMap::COL_COUPON_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCouponTableMap::COL_COUPON_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByCouponId($couponId = null, $comparison = null)
    {
        if (is_array($couponId)) {
            $useMinMax = false;
            if (isset($couponId['min'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_COUPON_ID, $couponId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($couponId['max'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_COUPON_ID, $couponId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_COUPON_ID, $couponId, $comparison);
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
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_CODE, $code, $comparison);
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
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the discount column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscount(1234); // WHERE discount = 1234
     * $query->filterByDiscount(array(12, 34)); // WHERE discount IN (12, 34)
     * $query->filterByDiscount(array('min' => 12)); // WHERE discount > 12
     * </code>
     *
     * @param     mixed $discount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (is_array($discount)) {
            $useMinMax = false;
            if (isset($discount['min'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_DISCOUNT, $discount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discount['max'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_DISCOUNT, $discount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_DISCOUNT, $discount, $comparison);
    }

    /**
     * Filter the query on the logged column
     *
     * Example usage:
     * <code>
     * $query->filterByLogged(true); // WHERE logged = true
     * $query->filterByLogged('yes'); // WHERE logged = true
     * </code>
     *
     * @param     boolean|string $logged The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByLogged($logged = null, $comparison = null)
    {
        if (is_string($logged)) {
            $logged = in_array(strtolower($logged), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_LOGGED, $logged, $comparison);
    }

    /**
     * Filter the query on the shipping column
     *
     * Example usage:
     * <code>
     * $query->filterByShipping(true); // WHERE shipping = true
     * $query->filterByShipping('yes'); // WHERE shipping = true
     * </code>
     *
     * @param     boolean|string $shipping The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByShipping($shipping = null, $comparison = null)
    {
        if (is_string($shipping)) {
            $shipping = in_array(strtolower($shipping), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_SHIPPING, $shipping, $comparison);
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
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByDateStart($dateStart = null, $comparison = null)
    {
        if (is_array($dateStart)) {
            $useMinMax = false;
            if (isset($dateStart['min'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_DATE_START, $dateStart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateStart['max'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_DATE_START, $dateStart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_DATE_START, $dateStart, $comparison);
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
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByDateEnd($dateEnd = null, $comparison = null)
    {
        if (is_array($dateEnd)) {
            $useMinMax = false;
            if (isset($dateEnd['min'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_DATE_END, $dateEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateEnd['max'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_DATE_END, $dateEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_DATE_END, $dateEnd, $comparison);
    }

    /**
     * Filter the query on the uses_total column
     *
     * Example usage:
     * <code>
     * $query->filterByUsesTotal(1234); // WHERE uses_total = 1234
     * $query->filterByUsesTotal(array(12, 34)); // WHERE uses_total IN (12, 34)
     * $query->filterByUsesTotal(array('min' => 12)); // WHERE uses_total > 12
     * </code>
     *
     * @param     mixed $usesTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByUsesTotal($usesTotal = null, $comparison = null)
    {
        if (is_array($usesTotal)) {
            $useMinMax = false;
            if (isset($usesTotal['min'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_USES_TOTAL, $usesTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usesTotal['max'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_USES_TOTAL, $usesTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_USES_TOTAL, $usesTotal, $comparison);
    }

    /**
     * Filter the query on the uses_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByUsesCustomer('fooValue');   // WHERE uses_customer = 'fooValue'
     * $query->filterByUsesCustomer('%fooValue%', Criteria::LIKE); // WHERE uses_customer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usesCustomer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByUsesCustomer($usesCustomer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usesCustomer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_USES_CUSTOMER, $usesCustomer, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCouponTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCouponTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCoupon $ocCoupon Object to remove from the list of results
     *
     * @return $this|ChildOcCouponQuery The current query, for fluid interface
     */
    public function prune($ocCoupon = null)
    {
        if ($ocCoupon) {
            $this->addUsingAlias(OcCouponTableMap::COL_COUPON_ID, $ocCoupon->getCouponId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_coupon table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCouponTableMap::clearInstancePool();
            OcCouponTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCouponTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCouponTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCouponTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCouponTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCouponQuery
