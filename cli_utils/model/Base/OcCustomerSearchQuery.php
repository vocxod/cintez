<?php

namespace Base;

use \OcCustomerSearch as ChildOcCustomerSearch;
use \OcCustomerSearchQuery as ChildOcCustomerSearchQuery;
use \Exception;
use \PDO;
use Map\OcCustomerSearchTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_customer_search' table.
 *
 *
 *
 * @method     ChildOcCustomerSearchQuery orderByCustomerSearchId($order = Criteria::ASC) Order by the customer_search_id column
 * @method     ChildOcCustomerSearchQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildOcCustomerSearchQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcCustomerSearchQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcCustomerSearchQuery orderByKeyword($order = Criteria::ASC) Order by the keyword column
 * @method     ChildOcCustomerSearchQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ChildOcCustomerSearchQuery orderBySubCategory($order = Criteria::ASC) Order by the sub_category column
 * @method     ChildOcCustomerSearchQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildOcCustomerSearchQuery orderByProducts($order = Criteria::ASC) Order by the products column
 * @method     ChildOcCustomerSearchQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildOcCustomerSearchQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcCustomerSearchQuery groupByCustomerSearchId() Group by the customer_search_id column
 * @method     ChildOcCustomerSearchQuery groupByStoreId() Group by the store_id column
 * @method     ChildOcCustomerSearchQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcCustomerSearchQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcCustomerSearchQuery groupByKeyword() Group by the keyword column
 * @method     ChildOcCustomerSearchQuery groupByCategoryId() Group by the category_id column
 * @method     ChildOcCustomerSearchQuery groupBySubCategory() Group by the sub_category column
 * @method     ChildOcCustomerSearchQuery groupByDescription() Group by the description column
 * @method     ChildOcCustomerSearchQuery groupByProducts() Group by the products column
 * @method     ChildOcCustomerSearchQuery groupByIp() Group by the ip column
 * @method     ChildOcCustomerSearchQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcCustomerSearchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomerSearchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomerSearchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomerSearchQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomerSearchQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomerSearchQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomerSearch findOne(ConnectionInterface $con = null) Return the first ChildOcCustomerSearch matching the query
 * @method     ChildOcCustomerSearch findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomerSearch matching the query, or a new ChildOcCustomerSearch object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomerSearch findOneByCustomerSearchId(int $customer_search_id) Return the first ChildOcCustomerSearch filtered by the customer_search_id column
 * @method     ChildOcCustomerSearch findOneByStoreId(int $store_id) Return the first ChildOcCustomerSearch filtered by the store_id column
 * @method     ChildOcCustomerSearch findOneByLanguageId(int $language_id) Return the first ChildOcCustomerSearch filtered by the language_id column
 * @method     ChildOcCustomerSearch findOneByCustomerId(int $customer_id) Return the first ChildOcCustomerSearch filtered by the customer_id column
 * @method     ChildOcCustomerSearch findOneByKeyword(string $keyword) Return the first ChildOcCustomerSearch filtered by the keyword column
 * @method     ChildOcCustomerSearch findOneByCategoryId(int $category_id) Return the first ChildOcCustomerSearch filtered by the category_id column
 * @method     ChildOcCustomerSearch findOneBySubCategory(boolean $sub_category) Return the first ChildOcCustomerSearch filtered by the sub_category column
 * @method     ChildOcCustomerSearch findOneByDescription(boolean $description) Return the first ChildOcCustomerSearch filtered by the description column
 * @method     ChildOcCustomerSearch findOneByProducts(int $products) Return the first ChildOcCustomerSearch filtered by the products column
 * @method     ChildOcCustomerSearch findOneByIp(string $ip) Return the first ChildOcCustomerSearch filtered by the ip column
 * @method     ChildOcCustomerSearch findOneByDateAdded(string $date_added) Return the first ChildOcCustomerSearch filtered by the date_added column *

 * @method     ChildOcCustomerSearch requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomerSearch by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomerSearch matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerSearch requireOneByCustomerSearchId(int $customer_search_id) Return the first ChildOcCustomerSearch filtered by the customer_search_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByStoreId(int $store_id) Return the first ChildOcCustomerSearch filtered by the store_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByLanguageId(int $language_id) Return the first ChildOcCustomerSearch filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByCustomerId(int $customer_id) Return the first ChildOcCustomerSearch filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByKeyword(string $keyword) Return the first ChildOcCustomerSearch filtered by the keyword column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByCategoryId(int $category_id) Return the first ChildOcCustomerSearch filtered by the category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneBySubCategory(boolean $sub_category) Return the first ChildOcCustomerSearch filtered by the sub_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByDescription(boolean $description) Return the first ChildOcCustomerSearch filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByProducts(int $products) Return the first ChildOcCustomerSearch filtered by the products column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByIp(string $ip) Return the first ChildOcCustomerSearch filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerSearch requireOneByDateAdded(string $date_added) Return the first ChildOcCustomerSearch filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerSearch[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomerSearch objects based on current ModelCriteria
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByCustomerSearchId(int $customer_search_id) Return ChildOcCustomerSearch objects filtered by the customer_search_id column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByStoreId(int $store_id) Return ChildOcCustomerSearch objects filtered by the store_id column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcCustomerSearch objects filtered by the language_id column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcCustomerSearch objects filtered by the customer_id column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByKeyword(string $keyword) Return ChildOcCustomerSearch objects filtered by the keyword column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByCategoryId(int $category_id) Return ChildOcCustomerSearch objects filtered by the category_id column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findBySubCategory(boolean $sub_category) Return ChildOcCustomerSearch objects filtered by the sub_category column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByDescription(boolean $description) Return ChildOcCustomerSearch objects filtered by the description column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByProducts(int $products) Return ChildOcCustomerSearch objects filtered by the products column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByIp(string $ip) Return ChildOcCustomerSearch objects filtered by the ip column
 * @method     ChildOcCustomerSearch[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCustomerSearch objects filtered by the date_added column
 * @method     ChildOcCustomerSearch[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomerSearchQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomerSearchQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomerSearch', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomerSearchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomerSearchQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomerSearchQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomerSearchQuery();
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
     * @return ChildOcCustomerSearch|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomerSearchTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomerSearchTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCustomerSearch A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT customer_search_id, store_id, language_id, customer_id, keyword, category_id, sub_category, description, products, ip, date_added FROM oc_customer_search WHERE customer_search_id = :p0';
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
            /** @var ChildOcCustomerSearch $obj */
            $obj = new ChildOcCustomerSearch();
            $obj->hydrate($row);
            OcCustomerSearchTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCustomerSearch|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the customer_search_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerSearchId(1234); // WHERE customer_search_id = 1234
     * $query->filterByCustomerSearchId(array(12, 34)); // WHERE customer_search_id IN (12, 34)
     * $query->filterByCustomerSearchId(array('min' => 12)); // WHERE customer_search_id > 12
     * </code>
     *
     * @param     mixed $customerSearchId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByCustomerSearchId($customerSearchId = null, $comparison = null)
    {
        if (is_array($customerSearchId)) {
            $useMinMax = false;
            if (isset($customerSearchId['min'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID, $customerSearchId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerSearchId['max'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID, $customerSearchId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID, $customerSearchId, $comparison);
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
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_STORE_ID, $storeId, $comparison);
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
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
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
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the keyword column
     *
     * Example usage:
     * <code>
     * $query->filterByKeyword('fooValue');   // WHERE keyword = 'fooValue'
     * $query->filterByKeyword('%fooValue%', Criteria::LIKE); // WHERE keyword LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keyword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByKeyword($keyword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keyword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_KEYWORD, $keyword, $comparison);
    }

    /**
     * Filter the query on the category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
     * </code>
     *
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the sub_category column
     *
     * Example usage:
     * <code>
     * $query->filterBySubCategory(true); // WHERE sub_category = true
     * $query->filterBySubCategory('yes'); // WHERE sub_category = true
     * </code>
     *
     * @param     boolean|string $subCategory The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterBySubCategory($subCategory = null, $comparison = null)
    {
        if (is_string($subCategory)) {
            $subCategory = in_array(strtolower($subCategory), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_SUB_CATEGORY, $subCategory, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription(true); // WHERE description = true
     * $query->filterByDescription('yes'); // WHERE description = true
     * </code>
     *
     * @param     boolean|string $description The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (is_string($description)) {
            $description = in_array(strtolower($description), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the products column
     *
     * Example usage:
     * <code>
     * $query->filterByProducts(1234); // WHERE products = 1234
     * $query->filterByProducts(array(12, 34)); // WHERE products IN (12, 34)
     * $query->filterByProducts(array('min' => 12)); // WHERE products > 12
     * </code>
     *
     * @param     mixed $products The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByProducts($products = null, $comparison = null)
    {
        if (is_array($products)) {
            $useMinMax = false;
            if (isset($products['min'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_PRODUCTS, $products['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($products['max'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_PRODUCTS, $products['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_PRODUCTS, $products, $comparison);
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
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_IP, $ip, $comparison);
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
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCustomerSearchTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerSearchTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomerSearch $ocCustomerSearch Object to remove from the list of results
     *
     * @return $this|ChildOcCustomerSearchQuery The current query, for fluid interface
     */
    public function prune($ocCustomerSearch = null)
    {
        if ($ocCustomerSearch) {
            $this->addUsingAlias(OcCustomerSearchTableMap::COL_CUSTOMER_SEARCH_ID, $ocCustomerSearch->getCustomerSearchId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_customer_search table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerSearchTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomerSearchTableMap::clearInstancePool();
            OcCustomerSearchTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerSearchTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomerSearchTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomerSearchTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomerSearchTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomerSearchQuery
