<?php

namespace Base;

use \OcCountry as ChildOcCountry;
use \OcCountryQuery as ChildOcCountryQuery;
use \Exception;
use \PDO;
use Map\OcCountryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_country' table.
 *
 *
 *
 * @method     ChildOcCountryQuery orderByCountryId($order = Criteria::ASC) Order by the country_id column
 * @method     ChildOcCountryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcCountryQuery orderByIsoCode2($order = Criteria::ASC) Order by the iso_code_2 column
 * @method     ChildOcCountryQuery orderByIsoCode3($order = Criteria::ASC) Order by the iso_code_3 column
 * @method     ChildOcCountryQuery orderByAddressFormat($order = Criteria::ASC) Order by the address_format column
 * @method     ChildOcCountryQuery orderByPostcodeRequired($order = Criteria::ASC) Order by the postcode_required column
 * @method     ChildOcCountryQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildOcCountryQuery groupByCountryId() Group by the country_id column
 * @method     ChildOcCountryQuery groupByName() Group by the name column
 * @method     ChildOcCountryQuery groupByIsoCode2() Group by the iso_code_2 column
 * @method     ChildOcCountryQuery groupByIsoCode3() Group by the iso_code_3 column
 * @method     ChildOcCountryQuery groupByAddressFormat() Group by the address_format column
 * @method     ChildOcCountryQuery groupByPostcodeRequired() Group by the postcode_required column
 * @method     ChildOcCountryQuery groupByStatus() Group by the status column
 *
 * @method     ChildOcCountryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCountryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCountryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCountryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCountryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCountryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCountry findOne(ConnectionInterface $con = null) Return the first ChildOcCountry matching the query
 * @method     ChildOcCountry findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCountry matching the query, or a new ChildOcCountry object populated from the query conditions when no match is found
 *
 * @method     ChildOcCountry findOneByCountryId(int $country_id) Return the first ChildOcCountry filtered by the country_id column
 * @method     ChildOcCountry findOneByName(string $name) Return the first ChildOcCountry filtered by the name column
 * @method     ChildOcCountry findOneByIsoCode2(string $iso_code_2) Return the first ChildOcCountry filtered by the iso_code_2 column
 * @method     ChildOcCountry findOneByIsoCode3(string $iso_code_3) Return the first ChildOcCountry filtered by the iso_code_3 column
 * @method     ChildOcCountry findOneByAddressFormat(string $address_format) Return the first ChildOcCountry filtered by the address_format column
 * @method     ChildOcCountry findOneByPostcodeRequired(boolean $postcode_required) Return the first ChildOcCountry filtered by the postcode_required column
 * @method     ChildOcCountry findOneByStatus(boolean $status) Return the first ChildOcCountry filtered by the status column *

 * @method     ChildOcCountry requirePk($key, ConnectionInterface $con = null) Return the ChildOcCountry by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCountry requireOne(ConnectionInterface $con = null) Return the first ChildOcCountry matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCountry requireOneByCountryId(int $country_id) Return the first ChildOcCountry filtered by the country_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCountry requireOneByName(string $name) Return the first ChildOcCountry filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCountry requireOneByIsoCode2(string $iso_code_2) Return the first ChildOcCountry filtered by the iso_code_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCountry requireOneByIsoCode3(string $iso_code_3) Return the first ChildOcCountry filtered by the iso_code_3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCountry requireOneByAddressFormat(string $address_format) Return the first ChildOcCountry filtered by the address_format column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCountry requireOneByPostcodeRequired(boolean $postcode_required) Return the first ChildOcCountry filtered by the postcode_required column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCountry requireOneByStatus(boolean $status) Return the first ChildOcCountry filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCountry[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCountry objects based on current ModelCriteria
 * @method     ChildOcCountry[]|ObjectCollection findByCountryId(int $country_id) Return ChildOcCountry objects filtered by the country_id column
 * @method     ChildOcCountry[]|ObjectCollection findByName(string $name) Return ChildOcCountry objects filtered by the name column
 * @method     ChildOcCountry[]|ObjectCollection findByIsoCode2(string $iso_code_2) Return ChildOcCountry objects filtered by the iso_code_2 column
 * @method     ChildOcCountry[]|ObjectCollection findByIsoCode3(string $iso_code_3) Return ChildOcCountry objects filtered by the iso_code_3 column
 * @method     ChildOcCountry[]|ObjectCollection findByAddressFormat(string $address_format) Return ChildOcCountry objects filtered by the address_format column
 * @method     ChildOcCountry[]|ObjectCollection findByPostcodeRequired(boolean $postcode_required) Return ChildOcCountry objects filtered by the postcode_required column
 * @method     ChildOcCountry[]|ObjectCollection findByStatus(boolean $status) Return ChildOcCountry objects filtered by the status column
 * @method     ChildOcCountry[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCountryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCountryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCountry', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCountryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCountryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCountryQuery) {
            return $criteria;
        }
        $query = new ChildOcCountryQuery();
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
     * @return ChildOcCountry|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCountryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCountryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCountry A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT country_id, name, iso_code_2, iso_code_3, address_format, postcode_required, status FROM oc_country WHERE country_id = :p0';
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
            /** @var ChildOcCountry $obj */
            $obj = new ChildOcCountry();
            $obj->hydrate($row);
            OcCountryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCountry|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCountryTableMap::COL_COUNTRY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCountryTableMap::COL_COUNTRY_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByCountryId($countryId = null, $comparison = null)
    {
        if (is_array($countryId)) {
            $useMinMax = false;
            if (isset($countryId['min'])) {
                $this->addUsingAlias(OcCountryTableMap::COL_COUNTRY_ID, $countryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countryId['max'])) {
                $this->addUsingAlias(OcCountryTableMap::COL_COUNTRY_ID, $countryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCountryTableMap::COL_COUNTRY_ID, $countryId, $comparison);
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
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCountryTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the iso_code_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByIsoCode2('fooValue');   // WHERE iso_code_2 = 'fooValue'
     * $query->filterByIsoCode2('%fooValue%', Criteria::LIKE); // WHERE iso_code_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isoCode2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByIsoCode2($isoCode2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isoCode2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCountryTableMap::COL_ISO_CODE_2, $isoCode2, $comparison);
    }

    /**
     * Filter the query on the iso_code_3 column
     *
     * Example usage:
     * <code>
     * $query->filterByIsoCode3('fooValue');   // WHERE iso_code_3 = 'fooValue'
     * $query->filterByIsoCode3('%fooValue%', Criteria::LIKE); // WHERE iso_code_3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isoCode3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByIsoCode3($isoCode3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isoCode3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCountryTableMap::COL_ISO_CODE_3, $isoCode3, $comparison);
    }

    /**
     * Filter the query on the address_format column
     *
     * Example usage:
     * <code>
     * $query->filterByAddressFormat('fooValue');   // WHERE address_format = 'fooValue'
     * $query->filterByAddressFormat('%fooValue%', Criteria::LIKE); // WHERE address_format LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addressFormat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByAddressFormat($addressFormat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addressFormat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCountryTableMap::COL_ADDRESS_FORMAT, $addressFormat, $comparison);
    }

    /**
     * Filter the query on the postcode_required column
     *
     * Example usage:
     * <code>
     * $query->filterByPostcodeRequired(true); // WHERE postcode_required = true
     * $query->filterByPostcodeRequired('yes'); // WHERE postcode_required = true
     * </code>
     *
     * @param     boolean|string $postcodeRequired The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByPostcodeRequired($postcodeRequired = null, $comparison = null)
    {
        if (is_string($postcodeRequired)) {
            $postcodeRequired = in_array(strtolower($postcodeRequired), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCountryTableMap::COL_POSTCODE_REQUIRED, $postcodeRequired, $comparison);
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
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCountryTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCountry $ocCountry Object to remove from the list of results
     *
     * @return $this|ChildOcCountryQuery The current query, for fluid interface
     */
    public function prune($ocCountry = null)
    {
        if ($ocCountry) {
            $this->addUsingAlias(OcCountryTableMap::COL_COUNTRY_ID, $ocCountry->getCountryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_country table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCountryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCountryTableMap::clearInstancePool();
            OcCountryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCountryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCountryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCountryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCountryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCountryQuery
