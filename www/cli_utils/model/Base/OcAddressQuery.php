<?php

namespace Base;

use \OcAddress as ChildOcAddress;
use \OcAddressQuery as ChildOcAddressQuery;
use \Exception;
use \PDO;
use Map\OcAddressTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_address' table.
 *
 *
 *
 * @method     ChildOcAddressQuery orderByAddressId($order = Criteria::ASC) Order by the address_id column
 * @method     ChildOcAddressQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcAddressQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildOcAddressQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildOcAddressQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildOcAddressQuery orderByAddress1($order = Criteria::ASC) Order by the address_1 column
 * @method     ChildOcAddressQuery orderByAddress2($order = Criteria::ASC) Order by the address_2 column
 * @method     ChildOcAddressQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildOcAddressQuery orderByPostcode($order = Criteria::ASC) Order by the postcode column
 * @method     ChildOcAddressQuery orderByCountryId($order = Criteria::ASC) Order by the country_id column
 * @method     ChildOcAddressQuery orderByZoneId($order = Criteria::ASC) Order by the zone_id column
 * @method     ChildOcAddressQuery orderByCustomField($order = Criteria::ASC) Order by the custom_field column
 *
 * @method     ChildOcAddressQuery groupByAddressId() Group by the address_id column
 * @method     ChildOcAddressQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcAddressQuery groupByFirstname() Group by the firstname column
 * @method     ChildOcAddressQuery groupByLastname() Group by the lastname column
 * @method     ChildOcAddressQuery groupByCompany() Group by the company column
 * @method     ChildOcAddressQuery groupByAddress1() Group by the address_1 column
 * @method     ChildOcAddressQuery groupByAddress2() Group by the address_2 column
 * @method     ChildOcAddressQuery groupByCity() Group by the city column
 * @method     ChildOcAddressQuery groupByPostcode() Group by the postcode column
 * @method     ChildOcAddressQuery groupByCountryId() Group by the country_id column
 * @method     ChildOcAddressQuery groupByZoneId() Group by the zone_id column
 * @method     ChildOcAddressQuery groupByCustomField() Group by the custom_field column
 *
 * @method     ChildOcAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcAddressQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcAddressQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcAddressQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcAddress findOne(ConnectionInterface $con = null) Return the first ChildOcAddress matching the query
 * @method     ChildOcAddress findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcAddress matching the query, or a new ChildOcAddress object populated from the query conditions when no match is found
 *
 * @method     ChildOcAddress findOneByAddressId(int $address_id) Return the first ChildOcAddress filtered by the address_id column
 * @method     ChildOcAddress findOneByCustomerId(int $customer_id) Return the first ChildOcAddress filtered by the customer_id column
 * @method     ChildOcAddress findOneByFirstname(string $firstname) Return the first ChildOcAddress filtered by the firstname column
 * @method     ChildOcAddress findOneByLastname(string $lastname) Return the first ChildOcAddress filtered by the lastname column
 * @method     ChildOcAddress findOneByCompany(string $company) Return the first ChildOcAddress filtered by the company column
 * @method     ChildOcAddress findOneByAddress1(string $address_1) Return the first ChildOcAddress filtered by the address_1 column
 * @method     ChildOcAddress findOneByAddress2(string $address_2) Return the first ChildOcAddress filtered by the address_2 column
 * @method     ChildOcAddress findOneByCity(string $city) Return the first ChildOcAddress filtered by the city column
 * @method     ChildOcAddress findOneByPostcode(string $postcode) Return the first ChildOcAddress filtered by the postcode column
 * @method     ChildOcAddress findOneByCountryId(int $country_id) Return the first ChildOcAddress filtered by the country_id column
 * @method     ChildOcAddress findOneByZoneId(int $zone_id) Return the first ChildOcAddress filtered by the zone_id column
 * @method     ChildOcAddress findOneByCustomField(string $custom_field) Return the first ChildOcAddress filtered by the custom_field column *

 * @method     ChildOcAddress requirePk($key, ConnectionInterface $con = null) Return the ChildOcAddress by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOne(ConnectionInterface $con = null) Return the first ChildOcAddress matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcAddress requireOneByAddressId(int $address_id) Return the first ChildOcAddress filtered by the address_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByCustomerId(int $customer_id) Return the first ChildOcAddress filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByFirstname(string $firstname) Return the first ChildOcAddress filtered by the firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByLastname(string $lastname) Return the first ChildOcAddress filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByCompany(string $company) Return the first ChildOcAddress filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByAddress1(string $address_1) Return the first ChildOcAddress filtered by the address_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByAddress2(string $address_2) Return the first ChildOcAddress filtered by the address_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByCity(string $city) Return the first ChildOcAddress filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByPostcode(string $postcode) Return the first ChildOcAddress filtered by the postcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByCountryId(int $country_id) Return the first ChildOcAddress filtered by the country_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByZoneId(int $zone_id) Return the first ChildOcAddress filtered by the zone_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcAddress requireOneByCustomField(string $custom_field) Return the first ChildOcAddress filtered by the custom_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcAddress[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcAddress objects based on current ModelCriteria
 * @method     ChildOcAddress[]|ObjectCollection findByAddressId(int $address_id) Return ChildOcAddress objects filtered by the address_id column
 * @method     ChildOcAddress[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcAddress objects filtered by the customer_id column
 * @method     ChildOcAddress[]|ObjectCollection findByFirstname(string $firstname) Return ChildOcAddress objects filtered by the firstname column
 * @method     ChildOcAddress[]|ObjectCollection findByLastname(string $lastname) Return ChildOcAddress objects filtered by the lastname column
 * @method     ChildOcAddress[]|ObjectCollection findByCompany(string $company) Return ChildOcAddress objects filtered by the company column
 * @method     ChildOcAddress[]|ObjectCollection findByAddress1(string $address_1) Return ChildOcAddress objects filtered by the address_1 column
 * @method     ChildOcAddress[]|ObjectCollection findByAddress2(string $address_2) Return ChildOcAddress objects filtered by the address_2 column
 * @method     ChildOcAddress[]|ObjectCollection findByCity(string $city) Return ChildOcAddress objects filtered by the city column
 * @method     ChildOcAddress[]|ObjectCollection findByPostcode(string $postcode) Return ChildOcAddress objects filtered by the postcode column
 * @method     ChildOcAddress[]|ObjectCollection findByCountryId(int $country_id) Return ChildOcAddress objects filtered by the country_id column
 * @method     ChildOcAddress[]|ObjectCollection findByZoneId(int $zone_id) Return ChildOcAddress objects filtered by the zone_id column
 * @method     ChildOcAddress[]|ObjectCollection findByCustomField(string $custom_field) Return ChildOcAddress objects filtered by the custom_field column
 * @method     ChildOcAddress[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcAddressQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcAddressQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcAddress', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcAddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcAddressQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcAddressQuery) {
            return $criteria;
        }
        $query = new ChildOcAddressQuery();
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
     * @return ChildOcAddress|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcAddressTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcAddressTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcAddress A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT address_id, customer_id, firstname, lastname, company, address_1, address_2, city, postcode, country_id, zone_id, custom_field FROM oc_address WHERE address_id = :p0';
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
            /** @var ChildOcAddress $obj */
            $obj = new ChildOcAddress();
            $obj->hydrate($row);
            OcAddressTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcAddress|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcAddressTableMap::COL_ADDRESS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcAddressTableMap::COL_ADDRESS_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByAddressId($addressId = null, $comparison = null)
    {
        if (is_array($addressId)) {
            $useMinMax = false;
            if (isset($addressId['min'])) {
                $this->addUsingAlias(OcAddressTableMap::COL_ADDRESS_ID, $addressId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($addressId['max'])) {
                $this->addUsingAlias(OcAddressTableMap::COL_ADDRESS_ID, $addressId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_ADDRESS_ID, $addressId, $comparison);
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
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcAddressTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcAddressTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
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
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_FIRSTNAME, $firstname, $comparison);
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
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%', Criteria::LIKE); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the address_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address_1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%', Criteria::LIKE); // WHERE address_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_ADDRESS_1, $address1, $comparison);
    }

    /**
     * Filter the query on the address_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address_2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%', Criteria::LIKE); // WHERE address_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_ADDRESS_2, $address2, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the postcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPostcode('fooValue');   // WHERE postcode = 'fooValue'
     * $query->filterByPostcode('%fooValue%', Criteria::LIKE); // WHERE postcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $postcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByPostcode($postcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($postcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_POSTCODE, $postcode, $comparison);
    }

    /**
     * Filter the query on the country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryId(1234); // WHERE country_id = 1234
     * $query->filterByCountryId(array(12, 34)); // WHERE country_id IN (12, 34)
     * $query->filterByCountryId(array('min' => 12)); // WHERE country_id > 12
     * </code>
     *
     * @param     mixed $countryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByCountryId($countryId = null, $comparison = null)
    {
        if (is_array($countryId)) {
            $useMinMax = false;
            if (isset($countryId['min'])) {
                $this->addUsingAlias(OcAddressTableMap::COL_COUNTRY_ID, $countryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countryId['max'])) {
                $this->addUsingAlias(OcAddressTableMap::COL_COUNTRY_ID, $countryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_COUNTRY_ID, $countryId, $comparison);
    }

    /**
     * Filter the query on the zone_id column
     *
     * Example usage:
     * <code>
     * $query->filterByZoneId(1234); // WHERE zone_id = 1234
     * $query->filterByZoneId(array(12, 34)); // WHERE zone_id IN (12, 34)
     * $query->filterByZoneId(array('min' => 12)); // WHERE zone_id > 12
     * </code>
     *
     * @param     mixed $zoneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByZoneId($zoneId = null, $comparison = null)
    {
        if (is_array($zoneId)) {
            $useMinMax = false;
            if (isset($zoneId['min'])) {
                $this->addUsingAlias(OcAddressTableMap::COL_ZONE_ID, $zoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zoneId['max'])) {
                $this->addUsingAlias(OcAddressTableMap::COL_ZONE_ID, $zoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_ZONE_ID, $zoneId, $comparison);
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
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function filterByCustomField($customField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customField)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcAddressTableMap::COL_CUSTOM_FIELD, $customField, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcAddress $ocAddress Object to remove from the list of results
     *
     * @return $this|ChildOcAddressQuery The current query, for fluid interface
     */
    public function prune($ocAddress = null)
    {
        if ($ocAddress) {
            $this->addUsingAlias(OcAddressTableMap::COL_ADDRESS_ID, $ocAddress->getAddressId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_address table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcAddressTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcAddressTableMap::clearInstancePool();
            OcAddressTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcAddressTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcAddressTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcAddressTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcAddressTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcAddressQuery
