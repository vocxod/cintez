<?php

namespace Base;

use \OcCustomer as ChildOcCustomer;
use \OcCustomerQuery as ChildOcCustomerQuery;
use \Exception;
use \PDO;
use Map\OcCustomerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_customer' table.
 *
 *
 *
 * @method     ChildOcCustomerQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcCustomerQuery orderByCustomerGroupId($order = Criteria::ASC) Order by the customer_group_id column
 * @method     ChildOcCustomerQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildOcCustomerQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcCustomerQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildOcCustomerQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildOcCustomerQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildOcCustomerQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     ChildOcCustomerQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildOcCustomerQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildOcCustomerQuery orderBySalt($order = Criteria::ASC) Order by the salt column
 * @method     ChildOcCustomerQuery orderByCart($order = Criteria::ASC) Order by the cart column
 * @method     ChildOcCustomerQuery orderByWishlist($order = Criteria::ASC) Order by the wishlist column
 * @method     ChildOcCustomerQuery orderByNewsletter($order = Criteria::ASC) Order by the newsletter column
 * @method     ChildOcCustomerQuery orderByAddressId($order = Criteria::ASC) Order by the address_id column
 * @method     ChildOcCustomerQuery orderByCustomField($order = Criteria::ASC) Order by the custom_field column
 * @method     ChildOcCustomerQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildOcCustomerQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcCustomerQuery orderBySafe($order = Criteria::ASC) Order by the safe column
 * @method     ChildOcCustomerQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method     ChildOcCustomerQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcCustomerQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcCustomerQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcCustomerQuery groupByCustomerGroupId() Group by the customer_group_id column
 * @method     ChildOcCustomerQuery groupByStoreId() Group by the store_id column
 * @method     ChildOcCustomerQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcCustomerQuery groupByFirstname() Group by the firstname column
 * @method     ChildOcCustomerQuery groupByLastname() Group by the lastname column
 * @method     ChildOcCustomerQuery groupByEmail() Group by the email column
 * @method     ChildOcCustomerQuery groupByTelephone() Group by the telephone column
 * @method     ChildOcCustomerQuery groupByFax() Group by the fax column
 * @method     ChildOcCustomerQuery groupByPassword() Group by the password column
 * @method     ChildOcCustomerQuery groupBySalt() Group by the salt column
 * @method     ChildOcCustomerQuery groupByCart() Group by the cart column
 * @method     ChildOcCustomerQuery groupByWishlist() Group by the wishlist column
 * @method     ChildOcCustomerQuery groupByNewsletter() Group by the newsletter column
 * @method     ChildOcCustomerQuery groupByAddressId() Group by the address_id column
 * @method     ChildOcCustomerQuery groupByCustomField() Group by the custom_field column
 * @method     ChildOcCustomerQuery groupByIp() Group by the ip column
 * @method     ChildOcCustomerQuery groupByStatus() Group by the status column
 * @method     ChildOcCustomerQuery groupBySafe() Group by the safe column
 * @method     ChildOcCustomerQuery groupByToken() Group by the token column
 * @method     ChildOcCustomerQuery groupByCode() Group by the code column
 * @method     ChildOcCustomerQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcCustomerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomer findOne(ConnectionInterface $con = null) Return the first ChildOcCustomer matching the query
 * @method     ChildOcCustomer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomer matching the query, or a new ChildOcCustomer object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomer findOneByCustomerId(int $customer_id) Return the first ChildOcCustomer filtered by the customer_id column
 * @method     ChildOcCustomer findOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcCustomer filtered by the customer_group_id column
 * @method     ChildOcCustomer findOneByStoreId(int $store_id) Return the first ChildOcCustomer filtered by the store_id column
 * @method     ChildOcCustomer findOneByLanguageId(int $language_id) Return the first ChildOcCustomer filtered by the language_id column
 * @method     ChildOcCustomer findOneByFirstname(string $firstname) Return the first ChildOcCustomer filtered by the firstname column
 * @method     ChildOcCustomer findOneByLastname(string $lastname) Return the first ChildOcCustomer filtered by the lastname column
 * @method     ChildOcCustomer findOneByEmail(string $email) Return the first ChildOcCustomer filtered by the email column
 * @method     ChildOcCustomer findOneByTelephone(string $telephone) Return the first ChildOcCustomer filtered by the telephone column
 * @method     ChildOcCustomer findOneByFax(string $fax) Return the first ChildOcCustomer filtered by the fax column
 * @method     ChildOcCustomer findOneByPassword(string $password) Return the first ChildOcCustomer filtered by the password column
 * @method     ChildOcCustomer findOneBySalt(string $salt) Return the first ChildOcCustomer filtered by the salt column
 * @method     ChildOcCustomer findOneByCart(string $cart) Return the first ChildOcCustomer filtered by the cart column
 * @method     ChildOcCustomer findOneByWishlist(string $wishlist) Return the first ChildOcCustomer filtered by the wishlist column
 * @method     ChildOcCustomer findOneByNewsletter(boolean $newsletter) Return the first ChildOcCustomer filtered by the newsletter column
 * @method     ChildOcCustomer findOneByAddressId(int $address_id) Return the first ChildOcCustomer filtered by the address_id column
 * @method     ChildOcCustomer findOneByCustomField(string $custom_field) Return the first ChildOcCustomer filtered by the custom_field column
 * @method     ChildOcCustomer findOneByIp(string $ip) Return the first ChildOcCustomer filtered by the ip column
 * @method     ChildOcCustomer findOneByStatus(boolean $status) Return the first ChildOcCustomer filtered by the status column
 * @method     ChildOcCustomer findOneBySafe(boolean $safe) Return the first ChildOcCustomer filtered by the safe column
 * @method     ChildOcCustomer findOneByToken(string $token) Return the first ChildOcCustomer filtered by the token column
 * @method     ChildOcCustomer findOneByCode(string $code) Return the first ChildOcCustomer filtered by the code column
 * @method     ChildOcCustomer findOneByDateAdded(string $date_added) Return the first ChildOcCustomer filtered by the date_added column *

 * @method     ChildOcCustomer requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomer requireOneByCustomerId(int $customer_id) Return the first ChildOcCustomer filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcCustomer filtered by the customer_group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByStoreId(int $store_id) Return the first ChildOcCustomer filtered by the store_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByLanguageId(int $language_id) Return the first ChildOcCustomer filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByFirstname(string $firstname) Return the first ChildOcCustomer filtered by the firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByLastname(string $lastname) Return the first ChildOcCustomer filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByEmail(string $email) Return the first ChildOcCustomer filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByTelephone(string $telephone) Return the first ChildOcCustomer filtered by the telephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByFax(string $fax) Return the first ChildOcCustomer filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByPassword(string $password) Return the first ChildOcCustomer filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneBySalt(string $salt) Return the first ChildOcCustomer filtered by the salt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByCart(string $cart) Return the first ChildOcCustomer filtered by the cart column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByWishlist(string $wishlist) Return the first ChildOcCustomer filtered by the wishlist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByNewsletter(boolean $newsletter) Return the first ChildOcCustomer filtered by the newsletter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByAddressId(int $address_id) Return the first ChildOcCustomer filtered by the address_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByCustomField(string $custom_field) Return the first ChildOcCustomer filtered by the custom_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByIp(string $ip) Return the first ChildOcCustomer filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByStatus(boolean $status) Return the first ChildOcCustomer filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneBySafe(boolean $safe) Return the first ChildOcCustomer filtered by the safe column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByToken(string $token) Return the first ChildOcCustomer filtered by the token column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByCode(string $code) Return the first ChildOcCustomer filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomer requireOneByDateAdded(string $date_added) Return the first ChildOcCustomer filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomer objects based on current ModelCriteria
 * @method     ChildOcCustomer[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcCustomer objects filtered by the customer_id column
 * @method     ChildOcCustomer[]|ObjectCollection findByCustomerGroupId(int $customer_group_id) Return ChildOcCustomer objects filtered by the customer_group_id column
 * @method     ChildOcCustomer[]|ObjectCollection findByStoreId(int $store_id) Return ChildOcCustomer objects filtered by the store_id column
 * @method     ChildOcCustomer[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcCustomer objects filtered by the language_id column
 * @method     ChildOcCustomer[]|ObjectCollection findByFirstname(string $firstname) Return ChildOcCustomer objects filtered by the firstname column
 * @method     ChildOcCustomer[]|ObjectCollection findByLastname(string $lastname) Return ChildOcCustomer objects filtered by the lastname column
 * @method     ChildOcCustomer[]|ObjectCollection findByEmail(string $email) Return ChildOcCustomer objects filtered by the email column
 * @method     ChildOcCustomer[]|ObjectCollection findByTelephone(string $telephone) Return ChildOcCustomer objects filtered by the telephone column
 * @method     ChildOcCustomer[]|ObjectCollection findByFax(string $fax) Return ChildOcCustomer objects filtered by the fax column
 * @method     ChildOcCustomer[]|ObjectCollection findByPassword(string $password) Return ChildOcCustomer objects filtered by the password column
 * @method     ChildOcCustomer[]|ObjectCollection findBySalt(string $salt) Return ChildOcCustomer objects filtered by the salt column
 * @method     ChildOcCustomer[]|ObjectCollection findByCart(string $cart) Return ChildOcCustomer objects filtered by the cart column
 * @method     ChildOcCustomer[]|ObjectCollection findByWishlist(string $wishlist) Return ChildOcCustomer objects filtered by the wishlist column
 * @method     ChildOcCustomer[]|ObjectCollection findByNewsletter(boolean $newsletter) Return ChildOcCustomer objects filtered by the newsletter column
 * @method     ChildOcCustomer[]|ObjectCollection findByAddressId(int $address_id) Return ChildOcCustomer objects filtered by the address_id column
 * @method     ChildOcCustomer[]|ObjectCollection findByCustomField(string $custom_field) Return ChildOcCustomer objects filtered by the custom_field column
 * @method     ChildOcCustomer[]|ObjectCollection findByIp(string $ip) Return ChildOcCustomer objects filtered by the ip column
 * @method     ChildOcCustomer[]|ObjectCollection findByStatus(boolean $status) Return ChildOcCustomer objects filtered by the status column
 * @method     ChildOcCustomer[]|ObjectCollection findBySafe(boolean $safe) Return ChildOcCustomer objects filtered by the safe column
 * @method     ChildOcCustomer[]|ObjectCollection findByToken(string $token) Return ChildOcCustomer objects filtered by the token column
 * @method     ChildOcCustomer[]|ObjectCollection findByCode(string $code) Return ChildOcCustomer objects filtered by the code column
 * @method     ChildOcCustomer[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCustomer objects filtered by the date_added column
 * @method     ChildOcCustomer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomerQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomerQuery();
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
     * @return ChildOcCustomer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCustomer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT customer_id, customer_group_id, store_id, language_id, firstname, lastname, email, telephone, fax, password, salt, cart, wishlist, newsletter, address_id, custom_field, ip, status, safe, token, code, date_added FROM oc_customer WHERE customer_id = :p0';
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
            /** @var ChildOcCustomer $obj */
            $obj = new ChildOcCustomer();
            $obj->hydrate($row);
            OcCustomerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCustomer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByCustomerGroupId($customerGroupId = null, $comparison = null)
    {
        if (is_array($customerGroupId)) {
            $useMinMax = false;
            if (isset($customerGroupId['min'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerGroupId['max'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId, $comparison);
    }

    /**
     * Filter the query on the store_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreId(1234); // WHERE store_id = 1234
     * $query->filterByStoreId(array(12, 34)); // WHERE store_id IN (12, 34)
     * $query->filterByStoreId(array('min' => 12)); // WHERE store_id > 12
     * </code>
     *
     * @param     mixed $storeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the language_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguageId(1234); // WHERE language_id = 1234
     * $query->filterByLanguageId(array(12, 34)); // WHERE language_id IN (12, 34)
     * $query->filterByLanguageId(array('min' => 12)); // WHERE language_id > 12
     * </code>
     *
     * @param     mixed $languageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_FIRSTNAME, $firstname, $comparison);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_LASTNAME, $lastname, $comparison);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByTelephone($telephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_TELEPHONE, $telephone, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%', Criteria::LIKE); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the salt column
     *
     * Example usage:
     * <code>
     * $query->filterBySalt('fooValue');   // WHERE salt = 'fooValue'
     * $query->filterBySalt('%fooValue%', Criteria::LIKE); // WHERE salt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterBySalt($salt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_SALT, $salt, $comparison);
    }

    /**
     * Filter the query on the cart column
     *
     * Example usage:
     * <code>
     * $query->filterByCart('fooValue');   // WHERE cart = 'fooValue'
     * $query->filterByCart('%fooValue%', Criteria::LIKE); // WHERE cart LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cart The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByCart($cart = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cart)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_CART, $cart, $comparison);
    }

    /**
     * Filter the query on the wishlist column
     *
     * Example usage:
     * <code>
     * $query->filterByWishlist('fooValue');   // WHERE wishlist = 'fooValue'
     * $query->filterByWishlist('%fooValue%', Criteria::LIKE); // WHERE wishlist LIKE '%fooValue%'
     * </code>
     *
     * @param     string $wishlist The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByWishlist($wishlist = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($wishlist)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_WISHLIST, $wishlist, $comparison);
    }

    /**
     * Filter the query on the newsletter column
     *
     * Example usage:
     * <code>
     * $query->filterByNewsletter(true); // WHERE newsletter = true
     * $query->filterByNewsletter('yes'); // WHERE newsletter = true
     * </code>
     *
     * @param     boolean|string $newsletter The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByNewsletter($newsletter = null, $comparison = null)
    {
        if (is_string($newsletter)) {
            $newsletter = in_array(strtolower($newsletter), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_NEWSLETTER, $newsletter, $comparison);
    }

    /**
     * Filter the query on the address_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAddressId(1234); // WHERE address_id = 1234
     * $query->filterByAddressId(array(12, 34)); // WHERE address_id IN (12, 34)
     * $query->filterByAddressId(array('min' => 12)); // WHERE address_id > 12
     * </code>
     *
     * @param     mixed $addressId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByAddressId($addressId = null, $comparison = null)
    {
        if (is_array($addressId)) {
            $useMinMax = false;
            if (isset($addressId['min'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_ADDRESS_ID, $addressId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($addressId['max'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_ADDRESS_ID, $addressId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_ADDRESS_ID, $addressId, $comparison);
    }

    /**
     * Filter the query on the custom_field column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomField('fooValue');   // WHERE custom_field = 'fooValue'
     * $query->filterByCustomField('%fooValue%', Criteria::LIKE); // WHERE custom_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customField The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByCustomField($customField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customField)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOM_FIELD, $customField, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%', Criteria::LIKE); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_IP, $ip, $comparison);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the safe column
     *
     * Example usage:
     * <code>
     * $query->filterBySafe(true); // WHERE safe = true
     * $query->filterBySafe('yes'); // WHERE safe = true
     * </code>
     *
     * @param     boolean|string $safe The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterBySafe($safe = null, $comparison = null)
    {
        if (is_string($safe)) {
            $safe = in_array(strtolower($safe), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_SAFE, $safe, $comparison);
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%', Criteria::LIKE); // WHERE token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $token The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByToken($token = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_TOKEN, $token, $comparison);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_CODE, $code, $comparison);
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
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCustomerTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomer $ocCustomer Object to remove from the list of results
     *
     * @return $this|ChildOcCustomerQuery The current query, for fluid interface
     */
    public function prune($ocCustomer = null)
    {
        if ($ocCustomer) {
            $this->addUsingAlias(OcCustomerTableMap::COL_CUSTOMER_ID, $ocCustomer->getCustomerId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_customer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomerTableMap::clearInstancePool();
            OcCustomerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomerQuery
