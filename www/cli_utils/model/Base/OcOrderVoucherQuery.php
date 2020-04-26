<?php

namespace Base;

use \OcOrderVoucher as ChildOcOrderVoucher;
use \OcOrderVoucherQuery as ChildOcOrderVoucherQuery;
use \Exception;
use \PDO;
use Map\OcOrderVoucherTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_order_voucher' table.
 *
 *
 *
 * @method     ChildOcOrderVoucherQuery orderByOrderVoucherId($order = Criteria::ASC) Order by the order_voucher_id column
 * @method     ChildOcOrderVoucherQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcOrderVoucherQuery orderByVoucherId($order = Criteria::ASC) Order by the voucher_id column
 * @method     ChildOcOrderVoucherQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildOcOrderVoucherQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcOrderVoucherQuery orderByFromName($order = Criteria::ASC) Order by the from_name column
 * @method     ChildOcOrderVoucherQuery orderByFromEmail($order = Criteria::ASC) Order by the from_email column
 * @method     ChildOcOrderVoucherQuery orderByToName($order = Criteria::ASC) Order by the to_name column
 * @method     ChildOcOrderVoucherQuery orderByToEmail($order = Criteria::ASC) Order by the to_email column
 * @method     ChildOcOrderVoucherQuery orderByVoucherThemeId($order = Criteria::ASC) Order by the voucher_theme_id column
 * @method     ChildOcOrderVoucherQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildOcOrderVoucherQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 *
 * @method     ChildOcOrderVoucherQuery groupByOrderVoucherId() Group by the order_voucher_id column
 * @method     ChildOcOrderVoucherQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcOrderVoucherQuery groupByVoucherId() Group by the voucher_id column
 * @method     ChildOcOrderVoucherQuery groupByDescription() Group by the description column
 * @method     ChildOcOrderVoucherQuery groupByCode() Group by the code column
 * @method     ChildOcOrderVoucherQuery groupByFromName() Group by the from_name column
 * @method     ChildOcOrderVoucherQuery groupByFromEmail() Group by the from_email column
 * @method     ChildOcOrderVoucherQuery groupByToName() Group by the to_name column
 * @method     ChildOcOrderVoucherQuery groupByToEmail() Group by the to_email column
 * @method     ChildOcOrderVoucherQuery groupByVoucherThemeId() Group by the voucher_theme_id column
 * @method     ChildOcOrderVoucherQuery groupByMessage() Group by the message column
 * @method     ChildOcOrderVoucherQuery groupByAmount() Group by the amount column
 *
 * @method     ChildOcOrderVoucherQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOrderVoucherQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOrderVoucherQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOrderVoucherQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOrderVoucherQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOrderVoucherQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOrderVoucher findOne(ConnectionInterface $con = null) Return the first ChildOcOrderVoucher matching the query
 * @method     ChildOcOrderVoucher findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOrderVoucher matching the query, or a new ChildOcOrderVoucher object populated from the query conditions when no match is found
 *
 * @method     ChildOcOrderVoucher findOneByOrderVoucherId(int $order_voucher_id) Return the first ChildOcOrderVoucher filtered by the order_voucher_id column
 * @method     ChildOcOrderVoucher findOneByOrderId(int $order_id) Return the first ChildOcOrderVoucher filtered by the order_id column
 * @method     ChildOcOrderVoucher findOneByVoucherId(int $voucher_id) Return the first ChildOcOrderVoucher filtered by the voucher_id column
 * @method     ChildOcOrderVoucher findOneByDescription(string $description) Return the first ChildOcOrderVoucher filtered by the description column
 * @method     ChildOcOrderVoucher findOneByCode(string $code) Return the first ChildOcOrderVoucher filtered by the code column
 * @method     ChildOcOrderVoucher findOneByFromName(string $from_name) Return the first ChildOcOrderVoucher filtered by the from_name column
 * @method     ChildOcOrderVoucher findOneByFromEmail(string $from_email) Return the first ChildOcOrderVoucher filtered by the from_email column
 * @method     ChildOcOrderVoucher findOneByToName(string $to_name) Return the first ChildOcOrderVoucher filtered by the to_name column
 * @method     ChildOcOrderVoucher findOneByToEmail(string $to_email) Return the first ChildOcOrderVoucher filtered by the to_email column
 * @method     ChildOcOrderVoucher findOneByVoucherThemeId(int $voucher_theme_id) Return the first ChildOcOrderVoucher filtered by the voucher_theme_id column
 * @method     ChildOcOrderVoucher findOneByMessage(string $message) Return the first ChildOcOrderVoucher filtered by the message column
 * @method     ChildOcOrderVoucher findOneByAmount(string $amount) Return the first ChildOcOrderVoucher filtered by the amount column *

 * @method     ChildOcOrderVoucher requirePk($key, ConnectionInterface $con = null) Return the ChildOcOrderVoucher by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOne(ConnectionInterface $con = null) Return the first ChildOcOrderVoucher matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderVoucher requireOneByOrderVoucherId(int $order_voucher_id) Return the first ChildOcOrderVoucher filtered by the order_voucher_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByOrderId(int $order_id) Return the first ChildOcOrderVoucher filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByVoucherId(int $voucher_id) Return the first ChildOcOrderVoucher filtered by the voucher_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByDescription(string $description) Return the first ChildOcOrderVoucher filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByCode(string $code) Return the first ChildOcOrderVoucher filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByFromName(string $from_name) Return the first ChildOcOrderVoucher filtered by the from_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByFromEmail(string $from_email) Return the first ChildOcOrderVoucher filtered by the from_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByToName(string $to_name) Return the first ChildOcOrderVoucher filtered by the to_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByToEmail(string $to_email) Return the first ChildOcOrderVoucher filtered by the to_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByVoucherThemeId(int $voucher_theme_id) Return the first ChildOcOrderVoucher filtered by the voucher_theme_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByMessage(string $message) Return the first ChildOcOrderVoucher filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderVoucher requireOneByAmount(string $amount) Return the first ChildOcOrderVoucher filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderVoucher[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOrderVoucher objects based on current ModelCriteria
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByOrderVoucherId(int $order_voucher_id) Return ChildOcOrderVoucher objects filtered by the order_voucher_id column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcOrderVoucher objects filtered by the order_id column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByVoucherId(int $voucher_id) Return ChildOcOrderVoucher objects filtered by the voucher_id column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByDescription(string $description) Return ChildOcOrderVoucher objects filtered by the description column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByCode(string $code) Return ChildOcOrderVoucher objects filtered by the code column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByFromName(string $from_name) Return ChildOcOrderVoucher objects filtered by the from_name column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByFromEmail(string $from_email) Return ChildOcOrderVoucher objects filtered by the from_email column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByToName(string $to_name) Return ChildOcOrderVoucher objects filtered by the to_name column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByToEmail(string $to_email) Return ChildOcOrderVoucher objects filtered by the to_email column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByVoucherThemeId(int $voucher_theme_id) Return ChildOcOrderVoucher objects filtered by the voucher_theme_id column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByMessage(string $message) Return ChildOcOrderVoucher objects filtered by the message column
 * @method     ChildOcOrderVoucher[]|ObjectCollection findByAmount(string $amount) Return ChildOcOrderVoucher objects filtered by the amount column
 * @method     ChildOcOrderVoucher[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOrderVoucherQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOrderVoucherQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOrderVoucher', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOrderVoucherQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOrderVoucherQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOrderVoucherQuery) {
            return $criteria;
        }
        $query = new ChildOcOrderVoucherQuery();
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
     * @return ChildOcOrderVoucher|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderVoucherTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOrderVoucherTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcOrderVoucher A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT order_voucher_id, order_id, voucher_id, description, code, from_name, from_email, to_name, to_email, voucher_theme_id, message, amount FROM oc_order_voucher WHERE order_voucher_id = :p0';
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
            /** @var ChildOcOrderVoucher $obj */
            $obj = new ChildOcOrderVoucher();
            $obj->hydrate($row);
            OcOrderVoucherTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcOrderVoucher|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_voucher_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderVoucherId(1234); // WHERE order_voucher_id = 1234
     * $query->filterByOrderVoucherId(array(12, 34)); // WHERE order_voucher_id IN (12, 34)
     * $query->filterByOrderVoucherId(array('min' => 12)); // WHERE order_voucher_id > 12
     * </code>
     *
     * @param     mixed $orderVoucherId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByOrderVoucherId($orderVoucherId = null, $comparison = null)
    {
        if (is_array($orderVoucherId)) {
            $useMinMax = false;
            if (isset($orderVoucherId['min'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID, $orderVoucherId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderVoucherId['max'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID, $orderVoucherId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID, $orderVoucherId, $comparison);
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
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the voucher_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVoucherId(1234); // WHERE voucher_id = 1234
     * $query->filterByVoucherId(array(12, 34)); // WHERE voucher_id IN (12, 34)
     * $query->filterByVoucherId(array('min' => 12)); // WHERE voucher_id > 12
     * </code>
     *
     * @param     mixed $voucherId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByVoucherId($voucherId = null, $comparison = null)
    {
        if (is_array($voucherId)) {
            $useMinMax = false;
            if (isset($voucherId['min'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_VOUCHER_ID, $voucherId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucherId['max'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_VOUCHER_ID, $voucherId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_VOUCHER_ID, $voucherId, $comparison);
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
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the from_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFromName('fooValue');   // WHERE from_name = 'fooValue'
     * $query->filterByFromName('%fooValue%', Criteria::LIKE); // WHERE from_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fromName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByFromName($fromName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fromName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_FROM_NAME, $fromName, $comparison);
    }

    /**
     * Filter the query on the from_email column
     *
     * Example usage:
     * <code>
     * $query->filterByFromEmail('fooValue');   // WHERE from_email = 'fooValue'
     * $query->filterByFromEmail('%fooValue%', Criteria::LIKE); // WHERE from_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fromEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByFromEmail($fromEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fromEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_FROM_EMAIL, $fromEmail, $comparison);
    }

    /**
     * Filter the query on the to_name column
     *
     * Example usage:
     * <code>
     * $query->filterByToName('fooValue');   // WHERE to_name = 'fooValue'
     * $query->filterByToName('%fooValue%', Criteria::LIKE); // WHERE to_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $toName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByToName($toName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($toName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_TO_NAME, $toName, $comparison);
    }

    /**
     * Filter the query on the to_email column
     *
     * Example usage:
     * <code>
     * $query->filterByToEmail('fooValue');   // WHERE to_email = 'fooValue'
     * $query->filterByToEmail('%fooValue%', Criteria::LIKE); // WHERE to_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $toEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByToEmail($toEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($toEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_TO_EMAIL, $toEmail, $comparison);
    }

    /**
     * Filter the query on the voucher_theme_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVoucherThemeId(1234); // WHERE voucher_theme_id = 1234
     * $query->filterByVoucherThemeId(array(12, 34)); // WHERE voucher_theme_id IN (12, 34)
     * $query->filterByVoucherThemeId(array('min' => 12)); // WHERE voucher_theme_id > 12
     * </code>
     *
     * @param     mixed $voucherThemeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByVoucherThemeId($voucherThemeId = null, $comparison = null)
    {
        if (is_array($voucherThemeId)) {
            $useMinMax = false;
            if (isset($voucherThemeId['min'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_VOUCHER_THEME_ID, $voucherThemeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucherThemeId['max'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_VOUCHER_THEME_ID, $voucherThemeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_VOUCHER_THEME_ID, $voucherThemeId, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%', Criteria::LIKE); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_MESSAGE, $message, $comparison);
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
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(OcOrderVoucherTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderVoucherTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOrderVoucher $ocOrderVoucher Object to remove from the list of results
     *
     * @return $this|ChildOcOrderVoucherQuery The current query, for fluid interface
     */
    public function prune($ocOrderVoucher = null)
    {
        if ($ocOrderVoucher) {
            $this->addUsingAlias(OcOrderVoucherTableMap::COL_ORDER_VOUCHER_ID, $ocOrderVoucher->getOrderVoucherId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_order_voucher table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderVoucherTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOrderVoucherTableMap::clearInstancePool();
            OcOrderVoucherTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderVoucherTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOrderVoucherTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOrderVoucherTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOrderVoucherTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOrderVoucherQuery
