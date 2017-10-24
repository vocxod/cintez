<?php

namespace Base;

use \OcManufacturer as ChildOcManufacturer;
use \OcManufacturerQuery as ChildOcManufacturerQuery;
use \Exception;
use \PDO;
use Map\OcManufacturerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_manufacturer' table.
 *
 *
 *
 * @method     ChildOcManufacturerQuery orderByManufacturerId($order = Criteria::ASC) Order by the manufacturer_id column
 * @method     ChildOcManufacturerQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcManufacturerQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildOcManufacturerQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcManufacturerQuery groupByManufacturerId() Group by the manufacturer_id column
 * @method     ChildOcManufacturerQuery groupByName() Group by the name column
 * @method     ChildOcManufacturerQuery groupByImage() Group by the image column
 * @method     ChildOcManufacturerQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcManufacturerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcManufacturerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcManufacturerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcManufacturerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcManufacturerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcManufacturerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcManufacturer findOne(ConnectionInterface $con = null) Return the first ChildOcManufacturer matching the query
 * @method     ChildOcManufacturer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcManufacturer matching the query, or a new ChildOcManufacturer object populated from the query conditions when no match is found
 *
 * @method     ChildOcManufacturer findOneByManufacturerId(int $manufacturer_id) Return the first ChildOcManufacturer filtered by the manufacturer_id column
 * @method     ChildOcManufacturer findOneByName(string $name) Return the first ChildOcManufacturer filtered by the name column
 * @method     ChildOcManufacturer findOneByImage(string $image) Return the first ChildOcManufacturer filtered by the image column
 * @method     ChildOcManufacturer findOneBySortOrder(int $sort_order) Return the first ChildOcManufacturer filtered by the sort_order column *

 * @method     ChildOcManufacturer requirePk($key, ConnectionInterface $con = null) Return the ChildOcManufacturer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcManufacturer requireOne(ConnectionInterface $con = null) Return the first ChildOcManufacturer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcManufacturer requireOneByManufacturerId(int $manufacturer_id) Return the first ChildOcManufacturer filtered by the manufacturer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcManufacturer requireOneByName(string $name) Return the first ChildOcManufacturer filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcManufacturer requireOneByImage(string $image) Return the first ChildOcManufacturer filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcManufacturer requireOneBySortOrder(int $sort_order) Return the first ChildOcManufacturer filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcManufacturer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcManufacturer objects based on current ModelCriteria
 * @method     ChildOcManufacturer[]|ObjectCollection findByManufacturerId(int $manufacturer_id) Return ChildOcManufacturer objects filtered by the manufacturer_id column
 * @method     ChildOcManufacturer[]|ObjectCollection findByName(string $name) Return ChildOcManufacturer objects filtered by the name column
 * @method     ChildOcManufacturer[]|ObjectCollection findByImage(string $image) Return ChildOcManufacturer objects filtered by the image column
 * @method     ChildOcManufacturer[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcManufacturer objects filtered by the sort_order column
 * @method     ChildOcManufacturer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcManufacturerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcManufacturerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcManufacturer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcManufacturerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcManufacturerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcManufacturerQuery) {
            return $criteria;
        }
        $query = new ChildOcManufacturerQuery();
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
     * @return ChildOcManufacturer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcManufacturerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcManufacturerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcManufacturer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT manufacturer_id, name, image, sort_order FROM oc_manufacturer WHERE manufacturer_id = :p0';
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
            /** @var ChildOcManufacturer $obj */
            $obj = new ChildOcManufacturer();
            $obj->hydrate($row);
            OcManufacturerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcManufacturer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcManufacturerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcManufacturerTableMap::COL_MANUFACTURER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcManufacturerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcManufacturerTableMap::COL_MANUFACTURER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the manufacturer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByManufacturerId(1234); // WHERE manufacturer_id = 1234
     * $query->filterByManufacturerId(array(12, 34)); // WHERE manufacturer_id IN (12, 34)
     * $query->filterByManufacturerId(array('min' => 12)); // WHERE manufacturer_id > 12
     * </code>
     *
     * @param     mixed $manufacturerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcManufacturerQuery The current query, for fluid interface
     */
    public function filterByManufacturerId($manufacturerId = null, $comparison = null)
    {
        if (is_array($manufacturerId)) {
            $useMinMax = false;
            if (isset($manufacturerId['min'])) {
                $this->addUsingAlias(OcManufacturerTableMap::COL_MANUFACTURER_ID, $manufacturerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($manufacturerId['max'])) {
                $this->addUsingAlias(OcManufacturerTableMap::COL_MANUFACTURER_ID, $manufacturerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcManufacturerTableMap::COL_MANUFACTURER_ID, $manufacturerId, $comparison);
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
     * @return $this|ChildOcManufacturerQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcManufacturerTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcManufacturerQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcManufacturerTableMap::COL_IMAGE, $image, $comparison);
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
     * @return $this|ChildOcManufacturerQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcManufacturerTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcManufacturerTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcManufacturerTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcManufacturer $ocManufacturer Object to remove from the list of results
     *
     * @return $this|ChildOcManufacturerQuery The current query, for fluid interface
     */
    public function prune($ocManufacturer = null)
    {
        if ($ocManufacturer) {
            $this->addUsingAlias(OcManufacturerTableMap::COL_MANUFACTURER_ID, $ocManufacturer->getManufacturerId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_manufacturer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcManufacturerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcManufacturerTableMap::clearInstancePool();
            OcManufacturerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcManufacturerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcManufacturerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcManufacturerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcManufacturerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcManufacturerQuery
