<?php

namespace Base;

use \OcReturn as ChildOcReturn;
use \OcReturnQuery as ChildOcReturnQuery;
use \Exception;
use \PDO;
use Map\OcReturnTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_return' table.
 *
 *
 *
 * @method     ChildOcReturnQuery orderByReturnId($order = Criteria::ASC) Order by the return_id column
 * @method     ChildOcReturnQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcReturnQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcReturnQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcReturnQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildOcReturnQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildOcReturnQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildOcReturnQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     ChildOcReturnQuery orderByProduct($order = Criteria::ASC) Order by the product column
 * @method     ChildOcReturnQuery orderByModel($order = Criteria::ASC) Order by the model column
 * @method     ChildOcReturnQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOcReturnQuery orderByOpened($order = Criteria::ASC) Order by the opened column
 * @method     ChildOcReturnQuery orderByReturnReasonId($order = Criteria::ASC) Order by the return_reason_id column
 * @method     ChildOcReturnQuery orderByReturnActionId($order = Criteria::ASC) Order by the return_action_id column
 * @method     ChildOcReturnQuery orderByReturnStatusId($order = Criteria::ASC) Order by the return_status_id column
 * @method     ChildOcReturnQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildOcReturnQuery orderByDateOrdered($order = Criteria::ASC) Order by the date_ordered column
 * @method     ChildOcReturnQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcReturnQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 *
 * @method     ChildOcReturnQuery groupByReturnId() Group by the return_id column
 * @method     ChildOcReturnQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcReturnQuery groupByProductId() Group by the product_id column
 * @method     ChildOcReturnQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcReturnQuery groupByFirstname() Group by the firstname column
 * @method     ChildOcReturnQuery groupByLastname() Group by the lastname column
 * @method     ChildOcReturnQuery groupByEmail() Group by the email column
 * @method     ChildOcReturnQuery groupByTelephone() Group by the telephone column
 * @method     ChildOcReturnQuery groupByProduct() Group by the product column
 * @method     ChildOcReturnQuery groupByModel() Group by the model column
 * @method     ChildOcReturnQuery groupByQuantity() Group by the quantity column
 * @method     ChildOcReturnQuery groupByOpened() Group by the opened column
 * @method     ChildOcReturnQuery groupByReturnReasonId() Group by the return_reason_id column
 * @method     ChildOcReturnQuery groupByReturnActionId() Group by the return_action_id column
 * @method     ChildOcReturnQuery groupByReturnStatusId() Group by the return_status_id column
 * @method     ChildOcReturnQuery groupByComment() Group by the comment column
 * @method     ChildOcReturnQuery groupByDateOrdered() Group by the date_ordered column
 * @method     ChildOcReturnQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcReturnQuery groupByDateModified() Group by the date_modified column
 *
 * @method     ChildOcReturnQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcReturnQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcReturnQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcReturnQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcReturnQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcReturnQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcReturn findOne(ConnectionInterface $con = null) Return the first ChildOcReturn matching the query
 * @method     ChildOcReturn findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcReturn matching the query, or a new ChildOcReturn object populated from the query conditions when no match is found
 *
 * @method     ChildOcReturn findOneByReturnId(int $return_id) Return the first ChildOcReturn filtered by the return_id column
 * @method     ChildOcReturn findOneByOrderId(int $order_id) Return the first ChildOcReturn filtered by the order_id column
 * @method     ChildOcReturn findOneByProductId(int $product_id) Return the first ChildOcReturn filtered by the product_id column
 * @method     ChildOcReturn findOneByCustomerId(int $customer_id) Return the first ChildOcReturn filtered by the customer_id column
 * @method     ChildOcReturn findOneByFirstname(string $firstname) Return the first ChildOcReturn filtered by the firstname column
 * @method     ChildOcReturn findOneByLastname(string $lastname) Return the first ChildOcReturn filtered by the lastname column
 * @method     ChildOcReturn findOneByEmail(string $email) Return the first ChildOcReturn filtered by the email column
 * @method     ChildOcReturn findOneByTelephone(string $telephone) Return the first ChildOcReturn filtered by the telephone column
 * @method     ChildOcReturn findOneByProduct(string $product) Return the first ChildOcReturn filtered by the product column
 * @method     ChildOcReturn findOneByModel(string $model) Return the first ChildOcReturn filtered by the model column
 * @method     ChildOcReturn findOneByQuantity(int $quantity) Return the first ChildOcReturn filtered by the quantity column
 * @method     ChildOcReturn findOneByOpened(boolean $opened) Return the first ChildOcReturn filtered by the opened column
 * @method     ChildOcReturn findOneByReturnReasonId(int $return_reason_id) Return the first ChildOcReturn filtered by the return_reason_id column
 * @method     ChildOcReturn findOneByReturnActionId(int $return_action_id) Return the first ChildOcReturn filtered by the return_action_id column
 * @method     ChildOcReturn findOneByReturnStatusId(int $return_status_id) Return the first ChildOcReturn filtered by the return_status_id column
 * @method     ChildOcReturn findOneByComment(string $comment) Return the first ChildOcReturn filtered by the comment column
 * @method     ChildOcReturn findOneByDateOrdered(string $date_ordered) Return the first ChildOcReturn filtered by the date_ordered column
 * @method     ChildOcReturn findOneByDateAdded(string $date_added) Return the first ChildOcReturn filtered by the date_added column
 * @method     ChildOcReturn findOneByDateModified(string $date_modified) Return the first ChildOcReturn filtered by the date_modified column *

 * @method     ChildOcReturn requirePk($key, ConnectionInterface $con = null) Return the ChildOcReturn by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOne(ConnectionInterface $con = null) Return the first ChildOcReturn matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcReturn requireOneByReturnId(int $return_id) Return the first ChildOcReturn filtered by the return_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByOrderId(int $order_id) Return the first ChildOcReturn filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByProductId(int $product_id) Return the first ChildOcReturn filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByCustomerId(int $customer_id) Return the first ChildOcReturn filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByFirstname(string $firstname) Return the first ChildOcReturn filtered by the firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByLastname(string $lastname) Return the first ChildOcReturn filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByEmail(string $email) Return the first ChildOcReturn filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByTelephone(string $telephone) Return the first ChildOcReturn filtered by the telephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByProduct(string $product) Return the first ChildOcReturn filtered by the product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByModel(string $model) Return the first ChildOcReturn filtered by the model column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByQuantity(int $quantity) Return the first ChildOcReturn filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByOpened(boolean $opened) Return the first ChildOcReturn filtered by the opened column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByReturnReasonId(int $return_reason_id) Return the first ChildOcReturn filtered by the return_reason_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByReturnActionId(int $return_action_id) Return the first ChildOcReturn filtered by the return_action_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByReturnStatusId(int $return_status_id) Return the first ChildOcReturn filtered by the return_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByComment(string $comment) Return the first ChildOcReturn filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByDateOrdered(string $date_ordered) Return the first ChildOcReturn filtered by the date_ordered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByDateAdded(string $date_added) Return the first ChildOcReturn filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturn requireOneByDateModified(string $date_modified) Return the first ChildOcReturn filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcReturn[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcReturn objects based on current ModelCriteria
 * @method     ChildOcReturn[]|ObjectCollection findByReturnId(int $return_id) Return ChildOcReturn objects filtered by the return_id column
 * @method     ChildOcReturn[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcReturn objects filtered by the order_id column
 * @method     ChildOcReturn[]|ObjectCollection findByProductId(int $product_id) Return ChildOcReturn objects filtered by the product_id column
 * @method     ChildOcReturn[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcReturn objects filtered by the customer_id column
 * @method     ChildOcReturn[]|ObjectCollection findByFirstname(string $firstname) Return ChildOcReturn objects filtered by the firstname column
 * @method     ChildOcReturn[]|ObjectCollection findByLastname(string $lastname) Return ChildOcReturn objects filtered by the lastname column
 * @method     ChildOcReturn[]|ObjectCollection findByEmail(string $email) Return ChildOcReturn objects filtered by the email column
 * @method     ChildOcReturn[]|ObjectCollection findByTelephone(string $telephone) Return ChildOcReturn objects filtered by the telephone column
 * @method     ChildOcReturn[]|ObjectCollection findByProduct(string $product) Return ChildOcReturn objects filtered by the product column
 * @method     ChildOcReturn[]|ObjectCollection findByModel(string $model) Return ChildOcReturn objects filtered by the model column
 * @method     ChildOcReturn[]|ObjectCollection findByQuantity(int $quantity) Return ChildOcReturn objects filtered by the quantity column
 * @method     ChildOcReturn[]|ObjectCollection findByOpened(boolean $opened) Return ChildOcReturn objects filtered by the opened column
 * @method     ChildOcReturn[]|ObjectCollection findByReturnReasonId(int $return_reason_id) Return ChildOcReturn objects filtered by the return_reason_id column
 * @method     ChildOcReturn[]|ObjectCollection findByReturnActionId(int $return_action_id) Return ChildOcReturn objects filtered by the return_action_id column
 * @method     ChildOcReturn[]|ObjectCollection findByReturnStatusId(int $return_status_id) Return ChildOcReturn objects filtered by the return_status_id column
 * @method     ChildOcReturn[]|ObjectCollection findByComment(string $comment) Return ChildOcReturn objects filtered by the comment column
 * @method     ChildOcReturn[]|ObjectCollection findByDateOrdered(string $date_ordered) Return ChildOcReturn objects filtered by the date_ordered column
 * @method     ChildOcReturn[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcReturn objects filtered by the date_added column
 * @method     ChildOcReturn[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcReturn objects filtered by the date_modified column
 * @method     ChildOcReturn[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcReturnQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcReturnQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcReturn', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcReturnQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcReturnQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcReturnQuery) {
            return $criteria;
        }
        $query = new ChildOcReturnQuery();
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
     * @return ChildOcReturn|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcReturnTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcReturnTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcReturn A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT return_id, order_id, product_id, customer_id, firstname, lastname, email, telephone, product, model, quantity, opened, return_reason_id, return_action_id, return_status_id, comment, date_ordered, date_added, date_modified FROM oc_return WHERE return_id = :p0';
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
            /** @var ChildOcReturn $obj */
            $obj = new ChildOcReturn();
            $obj->hydrate($row);
            OcReturnTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcReturn|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the return_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnId(1234); // WHERE return_id = 1234
     * $query->filterByReturnId(array(12, 34)); // WHERE return_id IN (12, 34)
     * $query->filterByReturnId(array('min' => 12)); // WHERE return_id > 12
     * </code>
     *
     * @param     mixed $returnId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByReturnId($returnId = null, $comparison = null)
    {
        if (is_array($returnId)) {
            $useMinMax = false;
            if (isset($returnId['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ID, $returnId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnId['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ID, $returnId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ID, $returnId, $comparison);
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
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_ORDER_ID, $orderId, $comparison);
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
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_PRODUCT_ID, $productId, $comparison);
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
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
     * $query->filterByFirstname('%fooValue%', Criteria::LIKE); // WHERE firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%', Criteria::LIKE); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the telephone column
     *
     * Example usage:
     * <code>
     * $query->filterByTelephone('fooValue');   // WHERE telephone = 'fooValue'
     * $query->filterByTelephone('%fooValue%', Criteria::LIKE); // WHERE telephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telephone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByTelephone($telephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_TELEPHONE, $telephone, $comparison);
    }

    /**
     * Filter the query on the product column
     *
     * Example usage:
     * <code>
     * $query->filterByProduct('fooValue');   // WHERE product = 'fooValue'
     * $query->filterByProduct('%fooValue%', Criteria::LIKE); // WHERE product LIKE '%fooValue%'
     * </code>
     *
     * @param     string $product The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByProduct($product = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($product)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_PRODUCT, $product, $comparison);
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
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByModel($model = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($model)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_MODEL, $model, $comparison);
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
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the opened column
     *
     * Example usage:
     * <code>
     * $query->filterByOpened(true); // WHERE opened = true
     * $query->filterByOpened('yes'); // WHERE opened = true
     * </code>
     *
     * @param     boolean|string $opened The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByOpened($opened = null, $comparison = null)
    {
        if (is_string($opened)) {
            $opened = in_array(strtolower($opened), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_OPENED, $opened, $comparison);
    }

    /**
     * Filter the query on the return_reason_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnReasonId(1234); // WHERE return_reason_id = 1234
     * $query->filterByReturnReasonId(array(12, 34)); // WHERE return_reason_id IN (12, 34)
     * $query->filterByReturnReasonId(array('min' => 12)); // WHERE return_reason_id > 12
     * </code>
     *
     * @param     mixed $returnReasonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByReturnReasonId($returnReasonId = null, $comparison = null)
    {
        if (is_array($returnReasonId)) {
            $useMinMax = false;
            if (isset($returnReasonId['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_RETURN_REASON_ID, $returnReasonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnReasonId['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_RETURN_REASON_ID, $returnReasonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_RETURN_REASON_ID, $returnReasonId, $comparison);
    }

    /**
     * Filter the query on the return_action_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnActionId(1234); // WHERE return_action_id = 1234
     * $query->filterByReturnActionId(array(12, 34)); // WHERE return_action_id IN (12, 34)
     * $query->filterByReturnActionId(array('min' => 12)); // WHERE return_action_id > 12
     * </code>
     *
     * @param     mixed $returnActionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByReturnActionId($returnActionId = null, $comparison = null)
    {
        if (is_array($returnActionId)) {
            $useMinMax = false;
            if (isset($returnActionId['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ACTION_ID, $returnActionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnActionId['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ACTION_ID, $returnActionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ACTION_ID, $returnActionId, $comparison);
    }

    /**
     * Filter the query on the return_status_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnStatusId(1234); // WHERE return_status_id = 1234
     * $query->filterByReturnStatusId(array(12, 34)); // WHERE return_status_id IN (12, 34)
     * $query->filterByReturnStatusId(array('min' => 12)); // WHERE return_status_id > 12
     * </code>
     *
     * @param     mixed $returnStatusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByReturnStatusId($returnStatusId = null, $comparison = null)
    {
        if (is_array($returnStatusId)) {
            $useMinMax = false;
            if (isset($returnStatusId['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_RETURN_STATUS_ID, $returnStatusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnStatusId['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_RETURN_STATUS_ID, $returnStatusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_RETURN_STATUS_ID, $returnStatusId, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the date_ordered column
     *
     * Example usage:
     * <code>
     * $query->filterByDateOrdered('2011-03-14'); // WHERE date_ordered = '2011-03-14'
     * $query->filterByDateOrdered('now'); // WHERE date_ordered = '2011-03-14'
     * $query->filterByDateOrdered(array('max' => 'yesterday')); // WHERE date_ordered > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateOrdered The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByDateOrdered($dateOrdered = null, $comparison = null)
    {
        if (is_array($dateOrdered)) {
            $useMinMax = false;
            if (isset($dateOrdered['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_DATE_ORDERED, $dateOrdered['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateOrdered['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_DATE_ORDERED, $dateOrdered['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_DATE_ORDERED, $dateOrdered, $comparison);
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
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified('2011-03-14'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified('now'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified(array('max' => 'yesterday')); // WHERE date_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcReturnTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcReturn $ocReturn Object to remove from the list of results
     *
     * @return $this|ChildOcReturnQuery The current query, for fluid interface
     */
    public function prune($ocReturn = null)
    {
        if ($ocReturn) {
            $this->addUsingAlias(OcReturnTableMap::COL_RETURN_ID, $ocReturn->getReturnId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_return table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcReturnTableMap::clearInstancePool();
            OcReturnTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcReturnTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcReturnTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcReturnTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcReturnQuery
