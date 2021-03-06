<?php

namespace Base;

use \OcGeoZone as ChildOcGeoZone;
use \OcGeoZoneQuery as ChildOcGeoZoneQuery;
use \Exception;
use \PDO;
use Map\OcGeoZoneTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_geo_zone' table.
 *
 *
 *
 * @method     ChildOcGeoZoneQuery orderByGeoZoneId($order = Criteria::ASC) Order by the geo_zone_id column
 * @method     ChildOcGeoZoneQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcGeoZoneQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildOcGeoZoneQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcGeoZoneQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 *
 * @method     ChildOcGeoZoneQuery groupByGeoZoneId() Group by the geo_zone_id column
 * @method     ChildOcGeoZoneQuery groupByName() Group by the name column
 * @method     ChildOcGeoZoneQuery groupByDescription() Group by the description column
 * @method     ChildOcGeoZoneQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcGeoZoneQuery groupByDateModified() Group by the date_modified column
 *
 * @method     ChildOcGeoZoneQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcGeoZoneQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcGeoZoneQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcGeoZoneQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcGeoZoneQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcGeoZoneQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcGeoZone findOne(ConnectionInterface $con = null) Return the first ChildOcGeoZone matching the query
 * @method     ChildOcGeoZone findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcGeoZone matching the query, or a new ChildOcGeoZone object populated from the query conditions when no match is found
 *
 * @method     ChildOcGeoZone findOneByGeoZoneId(int $geo_zone_id) Return the first ChildOcGeoZone filtered by the geo_zone_id column
 * @method     ChildOcGeoZone findOneByName(string $name) Return the first ChildOcGeoZone filtered by the name column
 * @method     ChildOcGeoZone findOneByDescription(string $description) Return the first ChildOcGeoZone filtered by the description column
 * @method     ChildOcGeoZone findOneByDateAdded(string $date_added) Return the first ChildOcGeoZone filtered by the date_added column
 * @method     ChildOcGeoZone findOneByDateModified(string $date_modified) Return the first ChildOcGeoZone filtered by the date_modified column *

 * @method     ChildOcGeoZone requirePk($key, ConnectionInterface $con = null) Return the ChildOcGeoZone by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcGeoZone requireOne(ConnectionInterface $con = null) Return the first ChildOcGeoZone matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcGeoZone requireOneByGeoZoneId(int $geo_zone_id) Return the first ChildOcGeoZone filtered by the geo_zone_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcGeoZone requireOneByName(string $name) Return the first ChildOcGeoZone filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcGeoZone requireOneByDescription(string $description) Return the first ChildOcGeoZone filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcGeoZone requireOneByDateAdded(string $date_added) Return the first ChildOcGeoZone filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcGeoZone requireOneByDateModified(string $date_modified) Return the first ChildOcGeoZone filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcGeoZone[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcGeoZone objects based on current ModelCriteria
 * @method     ChildOcGeoZone[]|ObjectCollection findByGeoZoneId(int $geo_zone_id) Return ChildOcGeoZone objects filtered by the geo_zone_id column
 * @method     ChildOcGeoZone[]|ObjectCollection findByName(string $name) Return ChildOcGeoZone objects filtered by the name column
 * @method     ChildOcGeoZone[]|ObjectCollection findByDescription(string $description) Return ChildOcGeoZone objects filtered by the description column
 * @method     ChildOcGeoZone[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcGeoZone objects filtered by the date_added column
 * @method     ChildOcGeoZone[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcGeoZone objects filtered by the date_modified column
 * @method     ChildOcGeoZone[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcGeoZoneQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcGeoZoneQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcGeoZone', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcGeoZoneQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcGeoZoneQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcGeoZoneQuery) {
            return $criteria;
        }
        $query = new ChildOcGeoZoneQuery();
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
     * @return ChildOcGeoZone|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcGeoZoneTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcGeoZoneTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcGeoZone A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT geo_zone_id, name, description, date_added, date_modified FROM oc_geo_zone WHERE geo_zone_id = :p0';
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
            /** @var ChildOcGeoZone $obj */
            $obj = new ChildOcGeoZone();
            $obj->hydrate($row);
            OcGeoZoneTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcGeoZone|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcGeoZoneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcGeoZoneTableMap::COL_GEO_ZONE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcGeoZoneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcGeoZoneTableMap::COL_GEO_ZONE_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOcGeoZoneQuery The current query, for fluid interface
     */
    public function filterByGeoZoneId($geoZoneId = null, $comparison = null)
    {
        if (is_array($geoZoneId)) {
            $useMinMax = false;
            if (isset($geoZoneId['min'])) {
                $this->addUsingAlias(OcGeoZoneTableMap::COL_GEO_ZONE_ID, $geoZoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geoZoneId['max'])) {
                $this->addUsingAlias(OcGeoZoneTableMap::COL_GEO_ZONE_ID, $geoZoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcGeoZoneTableMap::COL_GEO_ZONE_ID, $geoZoneId, $comparison);
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
     * @return $this|ChildOcGeoZoneQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcGeoZoneTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildOcGeoZoneQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcGeoZoneTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildOcGeoZoneQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcGeoZoneTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcGeoZoneTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcGeoZoneTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
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
     * @return $this|ChildOcGeoZoneQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcGeoZoneTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcGeoZoneTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcGeoZoneTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcGeoZone $ocGeoZone Object to remove from the list of results
     *
     * @return $this|ChildOcGeoZoneQuery The current query, for fluid interface
     */
    public function prune($ocGeoZone = null)
    {
        if ($ocGeoZone) {
            $this->addUsingAlias(OcGeoZoneTableMap::COL_GEO_ZONE_ID, $ocGeoZone->getGeoZoneId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_geo_zone table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcGeoZoneTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcGeoZoneTableMap::clearInstancePool();
            OcGeoZoneTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcGeoZoneTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcGeoZoneTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcGeoZoneTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcGeoZoneTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcGeoZoneQuery
