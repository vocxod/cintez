<?php

namespace Base;

use \OcMarketing as ChildOcMarketing;
use \OcMarketingQuery as ChildOcMarketingQuery;
use \Exception;
use \PDO;
use Map\OcMarketingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_marketing' table.
 *
 *
 *
 * @method     ChildOcMarketingQuery orderByMarketingId($order = Criteria::ASC) Order by the marketing_id column
 * @method     ChildOcMarketingQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcMarketingQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildOcMarketingQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcMarketingQuery orderByClicks($order = Criteria::ASC) Order by the clicks column
 * @method     ChildOcMarketingQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcMarketingQuery groupByMarketingId() Group by the marketing_id column
 * @method     ChildOcMarketingQuery groupByName() Group by the name column
 * @method     ChildOcMarketingQuery groupByDescription() Group by the description column
 * @method     ChildOcMarketingQuery groupByCode() Group by the code column
 * @method     ChildOcMarketingQuery groupByClicks() Group by the clicks column
 * @method     ChildOcMarketingQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcMarketingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcMarketingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcMarketingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcMarketingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcMarketingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcMarketingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcMarketing findOne(ConnectionInterface $con = null) Return the first ChildOcMarketing matching the query
 * @method     ChildOcMarketing findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcMarketing matching the query, or a new ChildOcMarketing object populated from the query conditions when no match is found
 *
 * @method     ChildOcMarketing findOneByMarketingId(int $marketing_id) Return the first ChildOcMarketing filtered by the marketing_id column
 * @method     ChildOcMarketing findOneByName(string $name) Return the first ChildOcMarketing filtered by the name column
 * @method     ChildOcMarketing findOneByDescription(string $description) Return the first ChildOcMarketing filtered by the description column
 * @method     ChildOcMarketing findOneByCode(string $code) Return the first ChildOcMarketing filtered by the code column
 * @method     ChildOcMarketing findOneByClicks(int $clicks) Return the first ChildOcMarketing filtered by the clicks column
 * @method     ChildOcMarketing findOneByDateAdded(string $date_added) Return the first ChildOcMarketing filtered by the date_added column *

 * @method     ChildOcMarketing requirePk($key, ConnectionInterface $con = null) Return the ChildOcMarketing by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcMarketing requireOne(ConnectionInterface $con = null) Return the first ChildOcMarketing matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcMarketing requireOneByMarketingId(int $marketing_id) Return the first ChildOcMarketing filtered by the marketing_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcMarketing requireOneByName(string $name) Return the first ChildOcMarketing filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcMarketing requireOneByDescription(string $description) Return the first ChildOcMarketing filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcMarketing requireOneByCode(string $code) Return the first ChildOcMarketing filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcMarketing requireOneByClicks(int $clicks) Return the first ChildOcMarketing filtered by the clicks column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcMarketing requireOneByDateAdded(string $date_added) Return the first ChildOcMarketing filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcMarketing[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcMarketing objects based on current ModelCriteria
 * @method     ChildOcMarketing[]|ObjectCollection findByMarketingId(int $marketing_id) Return ChildOcMarketing objects filtered by the marketing_id column
 * @method     ChildOcMarketing[]|ObjectCollection findByName(string $name) Return ChildOcMarketing objects filtered by the name column
 * @method     ChildOcMarketing[]|ObjectCollection findByDescription(string $description) Return ChildOcMarketing objects filtered by the description column
 * @method     ChildOcMarketing[]|ObjectCollection findByCode(string $code) Return ChildOcMarketing objects filtered by the code column
 * @method     ChildOcMarketing[]|ObjectCollection findByClicks(int $clicks) Return ChildOcMarketing objects filtered by the clicks column
 * @method     ChildOcMarketing[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcMarketing objects filtered by the date_added column
 * @method     ChildOcMarketing[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcMarketingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcMarketingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcMarketing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcMarketingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcMarketingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcMarketingQuery) {
            return $criteria;
        }
        $query = new ChildOcMarketingQuery();
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
     * @return ChildOcMarketing|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcMarketingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcMarketingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcMarketing A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT marketing_id, name, description, code, clicks, date_added FROM oc_marketing WHERE marketing_id = :p0';
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
            /** @var ChildOcMarketing $obj */
            $obj = new ChildOcMarketing();
            $obj->hydrate($row);
            OcMarketingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcMarketing|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcMarketingTableMap::COL_MARKETING_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcMarketingTableMap::COL_MARKETING_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the marketing_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingId(1234); // WHERE marketing_id = 1234
     * $query->filterByMarketingId(array(12, 34)); // WHERE marketing_id IN (12, 34)
     * $query->filterByMarketingId(array('min' => 12)); // WHERE marketing_id > 12
     * </code>
     *
     * @param     mixed $marketingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function filterByMarketingId($marketingId = null, $comparison = null)
    {
        if (is_array($marketingId)) {
            $useMinMax = false;
            if (isset($marketingId['min'])) {
                $this->addUsingAlias(OcMarketingTableMap::COL_MARKETING_ID, $marketingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingId['max'])) {
                $this->addUsingAlias(OcMarketingTableMap::COL_MARKETING_ID, $marketingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcMarketingTableMap::COL_MARKETING_ID, $marketingId, $comparison);
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
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcMarketingTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcMarketingTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcMarketingTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the clicks column
     *
     * Example usage:
     * <code>
     * $query->filterByClicks(1234); // WHERE clicks = 1234
     * $query->filterByClicks(array(12, 34)); // WHERE clicks IN (12, 34)
     * $query->filterByClicks(array('min' => 12)); // WHERE clicks > 12
     * </code>
     *
     * @param     mixed $clicks The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function filterByClicks($clicks = null, $comparison = null)
    {
        if (is_array($clicks)) {
            $useMinMax = false;
            if (isset($clicks['min'])) {
                $this->addUsingAlias(OcMarketingTableMap::COL_CLICKS, $clicks['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clicks['max'])) {
                $this->addUsingAlias(OcMarketingTableMap::COL_CLICKS, $clicks['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcMarketingTableMap::COL_CLICKS, $clicks, $comparison);
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
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcMarketingTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcMarketingTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcMarketingTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcMarketing $ocMarketing Object to remove from the list of results
     *
     * @return $this|ChildOcMarketingQuery The current query, for fluid interface
     */
    public function prune($ocMarketing = null)
    {
        if ($ocMarketing) {
            $this->addUsingAlias(OcMarketingTableMap::COL_MARKETING_ID, $ocMarketing->getMarketingId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_marketing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcMarketingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcMarketingTableMap::clearInstancePool();
            OcMarketingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcMarketingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcMarketingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcMarketingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcMarketingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcMarketingQuery
