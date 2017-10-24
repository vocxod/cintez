<?php

namespace Base;

use \OcLayoutRoute as ChildOcLayoutRoute;
use \OcLayoutRouteQuery as ChildOcLayoutRouteQuery;
use \Exception;
use \PDO;
use Map\OcLayoutRouteTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_layout_route' table.
 *
 *
 *
 * @method     ChildOcLayoutRouteQuery orderByLayoutRouteId($order = Criteria::ASC) Order by the layout_route_id column
 * @method     ChildOcLayoutRouteQuery orderByLayoutId($order = Criteria::ASC) Order by the layout_id column
 * @method     ChildOcLayoutRouteQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildOcLayoutRouteQuery orderByRoute($order = Criteria::ASC) Order by the route column
 *
 * @method     ChildOcLayoutRouteQuery groupByLayoutRouteId() Group by the layout_route_id column
 * @method     ChildOcLayoutRouteQuery groupByLayoutId() Group by the layout_id column
 * @method     ChildOcLayoutRouteQuery groupByStoreId() Group by the store_id column
 * @method     ChildOcLayoutRouteQuery groupByRoute() Group by the route column
 *
 * @method     ChildOcLayoutRouteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcLayoutRouteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcLayoutRouteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcLayoutRouteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcLayoutRouteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcLayoutRouteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcLayoutRoute findOne(ConnectionInterface $con = null) Return the first ChildOcLayoutRoute matching the query
 * @method     ChildOcLayoutRoute findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcLayoutRoute matching the query, or a new ChildOcLayoutRoute object populated from the query conditions when no match is found
 *
 * @method     ChildOcLayoutRoute findOneByLayoutRouteId(int $layout_route_id) Return the first ChildOcLayoutRoute filtered by the layout_route_id column
 * @method     ChildOcLayoutRoute findOneByLayoutId(int $layout_id) Return the first ChildOcLayoutRoute filtered by the layout_id column
 * @method     ChildOcLayoutRoute findOneByStoreId(int $store_id) Return the first ChildOcLayoutRoute filtered by the store_id column
 * @method     ChildOcLayoutRoute findOneByRoute(string $route) Return the first ChildOcLayoutRoute filtered by the route column *

 * @method     ChildOcLayoutRoute requirePk($key, ConnectionInterface $con = null) Return the ChildOcLayoutRoute by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutRoute requireOne(ConnectionInterface $con = null) Return the first ChildOcLayoutRoute matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLayoutRoute requireOneByLayoutRouteId(int $layout_route_id) Return the first ChildOcLayoutRoute filtered by the layout_route_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutRoute requireOneByLayoutId(int $layout_id) Return the first ChildOcLayoutRoute filtered by the layout_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutRoute requireOneByStoreId(int $store_id) Return the first ChildOcLayoutRoute filtered by the store_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutRoute requireOneByRoute(string $route) Return the first ChildOcLayoutRoute filtered by the route column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLayoutRoute[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcLayoutRoute objects based on current ModelCriteria
 * @method     ChildOcLayoutRoute[]|ObjectCollection findByLayoutRouteId(int $layout_route_id) Return ChildOcLayoutRoute objects filtered by the layout_route_id column
 * @method     ChildOcLayoutRoute[]|ObjectCollection findByLayoutId(int $layout_id) Return ChildOcLayoutRoute objects filtered by the layout_id column
 * @method     ChildOcLayoutRoute[]|ObjectCollection findByStoreId(int $store_id) Return ChildOcLayoutRoute objects filtered by the store_id column
 * @method     ChildOcLayoutRoute[]|ObjectCollection findByRoute(string $route) Return ChildOcLayoutRoute objects filtered by the route column
 * @method     ChildOcLayoutRoute[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcLayoutRouteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcLayoutRouteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcLayoutRoute', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcLayoutRouteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcLayoutRouteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcLayoutRouteQuery) {
            return $criteria;
        }
        $query = new ChildOcLayoutRouteQuery();
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
     * @return ChildOcLayoutRoute|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcLayoutRouteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcLayoutRouteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcLayoutRoute A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT layout_route_id, layout_id, store_id, route FROM oc_layout_route WHERE layout_route_id = :p0';
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
            /** @var ChildOcLayoutRoute $obj */
            $obj = new ChildOcLayoutRoute();
            $obj->hydrate($row);
            OcLayoutRouteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcLayoutRoute|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcLayoutRouteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ROUTE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcLayoutRouteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ROUTE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the layout_route_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLayoutRouteId(1234); // WHERE layout_route_id = 1234
     * $query->filterByLayoutRouteId(array(12, 34)); // WHERE layout_route_id IN (12, 34)
     * $query->filterByLayoutRouteId(array('min' => 12)); // WHERE layout_route_id > 12
     * </code>
     *
     * @param     mixed $layoutRouteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLayoutRouteQuery The current query, for fluid interface
     */
    public function filterByLayoutRouteId($layoutRouteId = null, $comparison = null)
    {
        if (is_array($layoutRouteId)) {
            $useMinMax = false;
            if (isset($layoutRouteId['min'])) {
                $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ROUTE_ID, $layoutRouteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($layoutRouteId['max'])) {
                $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ROUTE_ID, $layoutRouteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ROUTE_ID, $layoutRouteId, $comparison);
    }

    /**
     * Filter the query on the layout_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLayoutId(1234); // WHERE layout_id = 1234
     * $query->filterByLayoutId(array(12, 34)); // WHERE layout_id IN (12, 34)
     * $query->filterByLayoutId(array('min' => 12)); // WHERE layout_id > 12
     * </code>
     *
     * @param     mixed $layoutId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLayoutRouteQuery The current query, for fluid interface
     */
    public function filterByLayoutId($layoutId = null, $comparison = null)
    {
        if (is_array($layoutId)) {
            $useMinMax = false;
            if (isset($layoutId['min'])) {
                $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ID, $layoutId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($layoutId['max'])) {
                $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ID, $layoutId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ID, $layoutId, $comparison);
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
     * @return $this|ChildOcLayoutRouteQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(OcLayoutRouteTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(OcLayoutRouteTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutRouteTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the route column
     *
     * Example usage:
     * <code>
     * $query->filterByRoute('fooValue');   // WHERE route = 'fooValue'
     * $query->filterByRoute('%fooValue%', Criteria::LIKE); // WHERE route LIKE '%fooValue%'
     * </code>
     *
     * @param     string $route The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLayoutRouteQuery The current query, for fluid interface
     */
    public function filterByRoute($route = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($route)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutRouteTableMap::COL_ROUTE, $route, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcLayoutRoute $ocLayoutRoute Object to remove from the list of results
     *
     * @return $this|ChildOcLayoutRouteQuery The current query, for fluid interface
     */
    public function prune($ocLayoutRoute = null)
    {
        if ($ocLayoutRoute) {
            $this->addUsingAlias(OcLayoutRouteTableMap::COL_LAYOUT_ROUTE_ID, $ocLayoutRoute->getLayoutRouteId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_layout_route table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcLayoutRouteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcLayoutRouteTableMap::clearInstancePool();
            OcLayoutRouteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcLayoutRouteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcLayoutRouteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcLayoutRouteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcLayoutRouteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcLayoutRouteQuery
