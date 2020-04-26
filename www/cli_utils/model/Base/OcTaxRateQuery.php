<?php

namespace Base;

use \OcTaxRate as ChildOcTaxRate;
use \OcTaxRateQuery as ChildOcTaxRateQuery;
use \Exception;
use \PDO;
use Map\OcTaxRateTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_tax_rate' table.
 *
 *
 *
 * @method     ChildOcTaxRateQuery orderByTaxRateId($order = Criteria::ASC) Order by the tax_rate_id column
 * @method     ChildOcTaxRateQuery orderByGeoZoneId($order = Criteria::ASC) Order by the geo_zone_id column
 * @method     ChildOcTaxRateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcTaxRateQuery orderByRate($order = Criteria::ASC) Order by the rate column
 * @method     ChildOcTaxRateQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOcTaxRateQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcTaxRateQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 *
 * @method     ChildOcTaxRateQuery groupByTaxRateId() Group by the tax_rate_id column
 * @method     ChildOcTaxRateQuery groupByGeoZoneId() Group by the geo_zone_id column
 * @method     ChildOcTaxRateQuery groupByName() Group by the name column
 * @method     ChildOcTaxRateQuery groupByRate() Group by the rate column
 * @method     ChildOcTaxRateQuery groupByType() Group by the type column
 * @method     ChildOcTaxRateQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcTaxRateQuery groupByDateModified() Group by the date_modified column
 *
 * @method     ChildOcTaxRateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcTaxRateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcTaxRateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcTaxRateQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcTaxRateQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcTaxRateQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcTaxRate findOne(ConnectionInterface $con = null) Return the first ChildOcTaxRate matching the query
 * @method     ChildOcTaxRate findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcTaxRate matching the query, or a new ChildOcTaxRate object populated from the query conditions when no match is found
 *
 * @method     ChildOcTaxRate findOneByTaxRateId(int $tax_rate_id) Return the first ChildOcTaxRate filtered by the tax_rate_id column
 * @method     ChildOcTaxRate findOneByGeoZoneId(int $geo_zone_id) Return the first ChildOcTaxRate filtered by the geo_zone_id column
 * @method     ChildOcTaxRate findOneByName(string $name) Return the first ChildOcTaxRate filtered by the name column
 * @method     ChildOcTaxRate findOneByRate(string $rate) Return the first ChildOcTaxRate filtered by the rate column
 * @method     ChildOcTaxRate findOneByType(string $type) Return the first ChildOcTaxRate filtered by the type column
 * @method     ChildOcTaxRate findOneByDateAdded(string $date_added) Return the first ChildOcTaxRate filtered by the date_added column
 * @method     ChildOcTaxRate findOneByDateModified(string $date_modified) Return the first ChildOcTaxRate filtered by the date_modified column *

 * @method     ChildOcTaxRate requirePk($key, ConnectionInterface $con = null) Return the ChildOcTaxRate by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRate requireOne(ConnectionInterface $con = null) Return the first ChildOcTaxRate matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcTaxRate requireOneByTaxRateId(int $tax_rate_id) Return the first ChildOcTaxRate filtered by the tax_rate_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRate requireOneByGeoZoneId(int $geo_zone_id) Return the first ChildOcTaxRate filtered by the geo_zone_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRate requireOneByName(string $name) Return the first ChildOcTaxRate filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRate requireOneByRate(string $rate) Return the first ChildOcTaxRate filtered by the rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRate requireOneByType(string $type) Return the first ChildOcTaxRate filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRate requireOneByDateAdded(string $date_added) Return the first ChildOcTaxRate filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRate requireOneByDateModified(string $date_modified) Return the first ChildOcTaxRate filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcTaxRate[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcTaxRate objects based on current ModelCriteria
 * @method     ChildOcTaxRate[]|ObjectCollection findByTaxRateId(int $tax_rate_id) Return ChildOcTaxRate objects filtered by the tax_rate_id column
 * @method     ChildOcTaxRate[]|ObjectCollection findByGeoZoneId(int $geo_zone_id) Return ChildOcTaxRate objects filtered by the geo_zone_id column
 * @method     ChildOcTaxRate[]|ObjectCollection findByName(string $name) Return ChildOcTaxRate objects filtered by the name column
 * @method     ChildOcTaxRate[]|ObjectCollection findByRate(string $rate) Return ChildOcTaxRate objects filtered by the rate column
 * @method     ChildOcTaxRate[]|ObjectCollection findByType(string $type) Return ChildOcTaxRate objects filtered by the type column
 * @method     ChildOcTaxRate[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcTaxRate objects filtered by the date_added column
 * @method     ChildOcTaxRate[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcTaxRate objects filtered by the date_modified column
 * @method     ChildOcTaxRate[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcTaxRateQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcTaxRateQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcTaxRate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcTaxRateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcTaxRateQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcTaxRateQuery) {
            return $criteria;
        }
        $query = new ChildOcTaxRateQuery();
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
     * @return ChildOcTaxRate|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcTaxRateTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcTaxRateTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcTaxRate A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tax_rate_id, geo_zone_id, name, rate, type, date_added, date_modified FROM oc_tax_rate WHERE tax_rate_id = :p0';
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
            /** @var ChildOcTaxRate $obj */
            $obj = new ChildOcTaxRate();
            $obj->hydrate($row);
            OcTaxRateTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcTaxRate|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcTaxRateTableMap::COL_TAX_RATE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcTaxRateTableMap::COL_TAX_RATE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tax_rate_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxRateId(1234); // WHERE tax_rate_id = 1234
     * $query->filterByTaxRateId(array(12, 34)); // WHERE tax_rate_id IN (12, 34)
     * $query->filterByTaxRateId(array('min' => 12)); // WHERE tax_rate_id > 12
     * </code>
     *
     * @param     mixed $taxRateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByTaxRateId($taxRateId = null, $comparison = null)
    {
        if (is_array($taxRateId)) {
            $useMinMax = false;
            if (isset($taxRateId['min'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_TAX_RATE_ID, $taxRateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxRateId['max'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_TAX_RATE_ID, $taxRateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateTableMap::COL_TAX_RATE_ID, $taxRateId, $comparison);
    }

    /**
     * Filter the query on the geo_zone_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGeoZoneId(1234); // WHERE geo_zone_id = 1234
     * $query->filterByGeoZoneId(array(12, 34)); // WHERE geo_zone_id IN (12, 34)
     * $query->filterByGeoZoneId(array('min' => 12)); // WHERE geo_zone_id > 12
     * </code>
     *
     * @param     mixed $geoZoneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByGeoZoneId($geoZoneId = null, $comparison = null)
    {
        if (is_array($geoZoneId)) {
            $useMinMax = false;
            if (isset($geoZoneId['min'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_GEO_ZONE_ID, $geoZoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geoZoneId['max'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_GEO_ZONE_ID, $geoZoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateTableMap::COL_GEO_ZONE_ID, $geoZoneId, $comparison);
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
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the rate column
     *
     * Example usage:
     * <code>
     * $query->filterByRate(1234); // WHERE rate = 1234
     * $query->filterByRate(array(12, 34)); // WHERE rate IN (12, 34)
     * $query->filterByRate(array('min' => 12)); // WHERE rate > 12
     * </code>
     *
     * @param     mixed $rate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByRate($rate = null, $comparison = null)
    {
        if (is_array($rate)) {
            $useMinMax = false;
            if (isset($rate['min'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_RATE, $rate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rate['max'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_RATE, $rate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateTableMap::COL_RATE, $rate, $comparison);
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
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
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
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcTaxRateTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcTaxRate $ocTaxRate Object to remove from the list of results
     *
     * @return $this|ChildOcTaxRateQuery The current query, for fluid interface
     */
    public function prune($ocTaxRate = null)
    {
        if ($ocTaxRate) {
            $this->addUsingAlias(OcTaxRateTableMap::COL_TAX_RATE_ID, $ocTaxRate->getTaxRateId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_tax_rate table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcTaxRateTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcTaxRateTableMap::clearInstancePool();
            OcTaxRateTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcTaxRateTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcTaxRateTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcTaxRateTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcTaxRateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcTaxRateQuery
