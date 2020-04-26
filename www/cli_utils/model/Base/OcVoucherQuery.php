<?php

namespace Base;

use \OcVoucher as ChildOcVoucher;
use \OcVoucherQuery as ChildOcVoucherQuery;
use \Exception;
use \PDO;
use Map\OcVoucherTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_voucher' table.
 *
 *
 *
 * @method     ChildOcVoucherQuery orderByVoucherId($order = Criteria::ASC) Order by the voucher_id column
 * @method     ChildOcVoucherQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcVoucherQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcVoucherQuery orderByFromName($order = Criteria::ASC) Order by the from_name column
 * @method     ChildOcVoucherQuery orderByFromEmail($order = Criteria::ASC) Order by the from_email column
 * @method     ChildOcVoucherQuery orderByToName($order = Criteria::ASC) Order by the to_name column
 * @method     ChildOcVoucherQuery orderByToEmail($order = Criteria::ASC) Order by the to_email column
 * @method     ChildOcVoucherQuery orderByVoucherThemeId($order = Criteria::ASC) Order by the voucher_theme_id column
 * @method     ChildOcVoucherQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildOcVoucherQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildOcVoucherQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcVoucherQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcVoucherQuery groupByVoucherId() Group by the voucher_id column
 * @method     ChildOcVoucherQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcVoucherQuery groupByCode() Group by the code column
 * @method     ChildOcVoucherQuery groupByFromName() Group by the from_name column
 * @method     ChildOcVoucherQuery groupByFromEmail() Group by the from_email column
 * @method     ChildOcVoucherQuery groupByToName() Group by the to_name column
 * @method     ChildOcVoucherQuery groupByToEmail() Group by the to_email column
 * @method     ChildOcVoucherQuery groupByVoucherThemeId() Group by the voucher_theme_id column
 * @method     ChildOcVoucherQuery groupByMessage() Group by the message column
 * @method     ChildOcVoucherQuery groupByAmount() Group by the amount column
 * @method     ChildOcVoucherQuery groupByStatus() Group by the status column
 * @method     ChildOcVoucherQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcVoucherQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcVoucherQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcVoucherQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcVoucherQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcVoucherQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcVoucherQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcVoucher findOne(ConnectionInterface $con = null) Return the first ChildOcVoucher matching the query
 * @method     ChildOcVoucher findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcVoucher matching the query, or a new ChildOcVoucher object populated from the query conditions when no match is found
 *
 * @method     ChildOcVoucher findOneByVoucherId(int $voucher_id) Return the first ChildOcVoucher filtered by the voucher_id column
 * @method     ChildOcVoucher findOneByOrderId(int $order_id) Return the first ChildOcVoucher filtered by the order_id column
 * @method     ChildOcVoucher findOneByCode(string $code) Return the first ChildOcVoucher filtered by the code column
 * @method     ChildOcVoucher findOneByFromName(string $from_name) Return the first ChildOcVoucher filtered by the from_name column
 * @method     ChildOcVoucher findOneByFromEmail(string $from_email) Return the first ChildOcVoucher filtered by the from_email column
 * @method     ChildOcVoucher findOneByToName(string $to_name) Return the first ChildOcVoucher filtered by the to_name column
 * @method     ChildOcVoucher findOneByToEmail(string $to_email) Return the first ChildOcVoucher filtered by the to_email column
 * @method     ChildOcVoucher findOneByVoucherThemeId(int $voucher_theme_id) Return the first ChildOcVoucher filtered by the voucher_theme_id column
 * @method     ChildOcVoucher findOneByMessage(string $message) Return the first ChildOcVoucher filtered by the message column
 * @method     ChildOcVoucher findOneByAmount(string $amount) Return the first ChildOcVoucher filtered by the amount column
 * @method     ChildOcVoucher findOneByStatus(boolean $status) Return the first ChildOcVoucher filtered by the status column
 * @method     ChildOcVoucher findOneByDateAdded(string $date_added) Return the first ChildOcVoucher filtered by the date_added column *

 * @method     ChildOcVoucher requirePk($key, ConnectionInterface $con = null) Return the ChildOcVoucher by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOne(ConnectionInterface $con = null) Return the first ChildOcVoucher matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcVoucher requireOneByVoucherId(int $voucher_id) Return the first ChildOcVoucher filtered by the voucher_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByOrderId(int $order_id) Return the first ChildOcVoucher filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByCode(string $code) Return the first ChildOcVoucher filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByFromName(string $from_name) Return the first ChildOcVoucher filtered by the from_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByFromEmail(string $from_email) Return the first ChildOcVoucher filtered by the from_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByToName(string $to_name) Return the first ChildOcVoucher filtered by the to_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByToEmail(string $to_email) Return the first ChildOcVoucher filtered by the to_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByVoucherThemeId(int $voucher_theme_id) Return the first ChildOcVoucher filtered by the voucher_theme_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByMessage(string $message) Return the first ChildOcVoucher filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByAmount(string $amount) Return the first ChildOcVoucher filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByStatus(boolean $status) Return the first ChildOcVoucher filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcVoucher requireOneByDateAdded(string $date_added) Return the first ChildOcVoucher filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcVoucher[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcVoucher objects based on current ModelCriteria
 * @method     ChildOcVoucher[]|ObjectCollection findByVoucherId(int $voucher_id) Return ChildOcVoucher objects filtered by the voucher_id column
 * @method     ChildOcVoucher[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcVoucher objects filtered by the order_id column
 * @method     ChildOcVoucher[]|ObjectCollection findByCode(string $code) Return ChildOcVoucher objects filtered by the code column
 * @method     ChildOcVoucher[]|ObjectCollection findByFromName(string $from_name) Return ChildOcVoucher objects filtered by the from_name column
 * @method     ChildOcVoucher[]|ObjectCollection findByFromEmail(string $from_email) Return ChildOcVoucher objects filtered by the from_email column
 * @method     ChildOcVoucher[]|ObjectCollection findByToName(string $to_name) Return ChildOcVoucher objects filtered by the to_name column
 * @method     ChildOcVoucher[]|ObjectCollection findByToEmail(string $to_email) Return ChildOcVoucher objects filtered by the to_email column
 * @method     ChildOcVoucher[]|ObjectCollection findByVoucherThemeId(int $voucher_theme_id) Return ChildOcVoucher objects filtered by the voucher_theme_id column
 * @method     ChildOcVoucher[]|ObjectCollection findByMessage(string $message) Return ChildOcVoucher objects filtered by the message column
 * @method     ChildOcVoucher[]|ObjectCollection findByAmount(string $amount) Return ChildOcVoucher objects filtered by the amount column
 * @method     ChildOcVoucher[]|ObjectCollection findByStatus(boolean $status) Return ChildOcVoucher objects filtered by the status column
 * @method     ChildOcVoucher[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcVoucher objects filtered by the date_added column
 * @method     ChildOcVoucher[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcVoucherQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcVoucherQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcVoucher', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcVoucherQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcVoucherQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcVoucherQuery) {
            return $criteria;
        }
        $query = new ChildOcVoucherQuery();
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
     * @return ChildOcVoucher|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcVoucherTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcVoucherTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcVoucher A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT voucher_id, order_id, code, from_name, from_email, to_name, to_email, voucher_theme_id, message, amount, status, date_added FROM oc_voucher WHERE voucher_id = :p0';
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
            /** @var ChildOcVoucher $obj */
            $obj = new ChildOcVoucher();
            $obj->hydrate($row);
            OcVoucherTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcVoucher|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByVoucherId($voucherId = null, $comparison = null)
    {
        if (is_array($voucherId)) {
            $useMinMax = false;
            if (isset($voucherId['min'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_ID, $voucherId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucherId['max'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_ID, $voucherId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_ID, $voucherId, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_ORDER_ID, $orderId, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_CODE, $code, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByFromName($fromName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fromName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_FROM_NAME, $fromName, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByFromEmail($fromEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fromEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_FROM_EMAIL, $fromEmail, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByToName($toName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($toName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_TO_NAME, $toName, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByToEmail($toEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($toEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_TO_EMAIL, $toEmail, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByVoucherThemeId($voucherThemeId = null, $comparison = null)
    {
        if (is_array($voucherThemeId)) {
            $useMinMax = false;
            if (isset($voucherThemeId['min'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_THEME_ID, $voucherThemeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucherThemeId['max'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_THEME_ID, $voucherThemeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_THEME_ID, $voucherThemeId, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_MESSAGE, $message, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcVoucherTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcVoucherTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcVoucher $ocVoucher Object to remove from the list of results
     *
     * @return $this|ChildOcVoucherQuery The current query, for fluid interface
     */
    public function prune($ocVoucher = null)
    {
        if ($ocVoucher) {
            $this->addUsingAlias(OcVoucherTableMap::COL_VOUCHER_ID, $ocVoucher->getVoucherId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_voucher table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcVoucherTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcVoucherTableMap::clearInstancePool();
            OcVoucherTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcVoucherTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcVoucherTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcVoucherTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcVoucherTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcVoucherQuery
