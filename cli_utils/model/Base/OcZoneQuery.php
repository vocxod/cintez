<?php

namespace Base;

use \OcZone as ChildOcZone;
use \OcZoneQuery as ChildOcZoneQuery;
use \Exception;
use \PDO;
use Map\OcZoneTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_zone' table.
 *
 *
 *
 * @method     ChildOcZoneQuery orderByZoneId($order = Criteria::ASC) Order by the zone_id column
 * @method     ChildOcZoneQuery orderByCountryId($order = Criteria::ASC) Order by the country_id column
 * @method     ChildOcZoneQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcZoneQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcZoneQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcZoneQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 * @method     ChildOcZoneQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 *
 * @method     ChildOcZoneQuery groupByZoneId() Group by the zone_id column
 * @method     ChildOcZoneQuery groupByCountryId() Group by the country_id column
 * @method     ChildOcZoneQuery groupByName() Group by the name column
 * @method     ChildOcZoneQuery groupByCode() Group by the code column
 * @method     ChildOcZoneQuery groupByStatus() Group by the status column
 * @method     ChildOcZoneQuery groupBySortOrder() Group by the sort_order column
 * @method     ChildOcZoneQuery groupByLanguageId() Group by the language_id column
 *
 * @method     ChildOcZoneQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcZoneQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcZoneQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcZoneQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcZoneQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcZoneQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcZone findOne(ConnectionInterface $con = null) Return the first ChildOcZone matching the query
 * @method     ChildOcZone findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcZone matching the query, or a new ChildOcZone object populated from the query conditions when no match is found
 *
 * @method     ChildOcZone findOneByZoneId(int $zone_id) Return the first ChildOcZone filtered by the zone_id column
 * @method     ChildOcZone findOneByCountryId(int $country_id) Return the first ChildOcZone filtered by the country_id column
 * @method     ChildOcZone findOneByName(string $name) Return the first ChildOcZone filtered by the name column
 * @method     ChildOcZone findOneByCode(string $code) Return the first ChildOcZone filtered by the code column
 * @method     ChildOcZone findOneByStatus(boolean $status) Return the first ChildOcZone filtered by the status column
 * @method     ChildOcZone findOneBySortOrder(int $sort_order) Return the first ChildOcZone filtered by the sort_order column
 * @method     ChildOcZone findOneByLanguageId(int $language_id) Return the first ChildOcZone filtered by the language_id column *

 * @method     ChildOcZone requirePk($key, ConnectionInterface $con = null) Return the ChildOcZone by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcZone requireOne(ConnectionInterface $con = null) Return the first ChildOcZone matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcZone requireOneByZoneId(int $zone_id) Return the first ChildOcZone filtered by the zone_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcZone requireOneByCountryId(int $country_id) Return the first ChildOcZone filtered by the country_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcZone requireOneByName(string $name) Return the first ChildOcZone filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcZone requireOneByCode(string $code) Return the first ChildOcZone filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcZone requireOneByStatus(boolean $status) Return the first ChildOcZone filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcZone requireOneBySortOrder(int $sort_order) Return the first ChildOcZone filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcZone requireOneByLanguageId(int $language_id) Return the first ChildOcZone filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcZone[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcZone objects based on current ModelCriteria
 * @method     ChildOcZone[]|ObjectCollection findByZoneId(int $zone_id) Return ChildOcZone objects filtered by the zone_id column
 * @method     ChildOcZone[]|ObjectCollection findByCountryId(int $country_id) Return ChildOcZone objects filtered by the country_id column
 * @method     ChildOcZone[]|ObjectCollection findByName(string $name) Return ChildOcZone objects filtered by the name column
 * @method     ChildOcZone[]|ObjectCollection findByCode(string $code) Return ChildOcZone objects filtered by the code column
 * @method     ChildOcZone[]|ObjectCollection findByStatus(boolean $status) Return ChildOcZone objects filtered by the status column
 * @method     ChildOcZone[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcZone objects filtered by the sort_order column
 * @method     ChildOcZone[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcZone objects filtered by the language_id column
 * @method     ChildOcZone[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcZoneQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcZoneQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcZone', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcZoneQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcZoneQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcZoneQuery) {
            return $criteria;
        }
        $query = new ChildOcZoneQuery();
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
     * @return ChildOcZone|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcZoneTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcZoneTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcZone A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT zone_id, country_id, name, code, status, sort_order, language_id FROM oc_zone WHERE zone_id = :p0';
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
            /** @var ChildOcZone $obj */
            $obj = new ChildOcZone();
            $obj->hydrate($row);
            OcZoneTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcZone|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcZoneTableMap::COL_ZONE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcZoneTableMap::COL_ZONE_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterByZoneId($zoneId = null, $comparison = null)
    {
        if (is_array($zoneId)) {
            $useMinMax = false;
            if (isset($zoneId['min'])) {
                $this->addUsingAlias(OcZoneTableMap::COL_ZONE_ID, $zoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zoneId['max'])) {
                $this->addUsingAlias(OcZoneTableMap::COL_ZONE_ID, $zoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcZoneTableMap::COL_ZONE_ID, $zoneId, $comparison);
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
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterByCountryId($countryId = null, $comparison = null)
    {
        if (is_array($countryId)) {
            $useMinMax = false;
            if (isset($countryId['min'])) {
                $this->addUsingAlias(OcZoneTableMap::COL_COUNTRY_ID, $countryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countryId['max'])) {
                $this->addUsingAlias(OcZoneTableMap::COL_COUNTRY_ID, $countryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcZoneTableMap::COL_COUNTRY_ID, $countryId, $comparison);
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
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcZoneTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcZoneTableMap::COL_CODE, $code, $comparison);
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
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcZoneTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the sort_order column
     *
     * Example usage:
     * <code>
     * $query->filterBySortOrder(1234); // WHERE sort_order = 1234
     * $query->filterBySortOrder(array(12, 34)); // WHERE sort_order IN (12, 34)
     * $query->filterBySortOrder(array('min' => 12)); // WHERE sort_order > 12
     * </code>
     *
     * @param     mixed $sortOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcZoneTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcZoneTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcZoneTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
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
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcZoneTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcZoneTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcZoneTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcZone $ocZone Object to remove from the list of results
     *
     * @return $this|ChildOcZoneQuery The current query, for fluid interface
     */
    public function prune($ocZone = null)
    {
        if ($ocZone) {
            $this->addUsingAlias(OcZoneTableMap::COL_ZONE_ID, $ocZone->getZoneId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_zone table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcZoneTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcZoneTableMap::clearInstancePool();
            OcZoneTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcZoneTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcZoneTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcZoneTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcZoneTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcZoneQuery
