<?php

namespace Base;

use \OcLayoutModule as ChildOcLayoutModule;
use \OcLayoutModuleQuery as ChildOcLayoutModuleQuery;
use \Exception;
use \PDO;
use Map\OcLayoutModuleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_layout_module' table.
 *
 *
 *
 * @method     ChildOcLayoutModuleQuery orderByLayoutModuleId($order = Criteria::ASC) Order by the layout_module_id column
 * @method     ChildOcLayoutModuleQuery orderByLayoutId($order = Criteria::ASC) Order by the layout_id column
 * @method     ChildOcLayoutModuleQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcLayoutModuleQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildOcLayoutModuleQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcLayoutModuleQuery groupByLayoutModuleId() Group by the layout_module_id column
 * @method     ChildOcLayoutModuleQuery groupByLayoutId() Group by the layout_id column
 * @method     ChildOcLayoutModuleQuery groupByCode() Group by the code column
 * @method     ChildOcLayoutModuleQuery groupByPosition() Group by the position column
 * @method     ChildOcLayoutModuleQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcLayoutModuleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcLayoutModuleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcLayoutModuleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcLayoutModuleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcLayoutModuleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcLayoutModuleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcLayoutModule findOne(ConnectionInterface $con = null) Return the first ChildOcLayoutModule matching the query
 * @method     ChildOcLayoutModule findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcLayoutModule matching the query, or a new ChildOcLayoutModule object populated from the query conditions when no match is found
 *
 * @method     ChildOcLayoutModule findOneByLayoutModuleId(int $layout_module_id) Return the first ChildOcLayoutModule filtered by the layout_module_id column
 * @method     ChildOcLayoutModule findOneByLayoutId(int $layout_id) Return the first ChildOcLayoutModule filtered by the layout_id column
 * @method     ChildOcLayoutModule findOneByCode(string $code) Return the first ChildOcLayoutModule filtered by the code column
 * @method     ChildOcLayoutModule findOneByPosition(string $position) Return the first ChildOcLayoutModule filtered by the position column
 * @method     ChildOcLayoutModule findOneBySortOrder(int $sort_order) Return the first ChildOcLayoutModule filtered by the sort_order column *

 * @method     ChildOcLayoutModule requirePk($key, ConnectionInterface $con = null) Return the ChildOcLayoutModule by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutModule requireOne(ConnectionInterface $con = null) Return the first ChildOcLayoutModule matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLayoutModule requireOneByLayoutModuleId(int $layout_module_id) Return the first ChildOcLayoutModule filtered by the layout_module_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutModule requireOneByLayoutId(int $layout_id) Return the first ChildOcLayoutModule filtered by the layout_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutModule requireOneByCode(string $code) Return the first ChildOcLayoutModule filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutModule requireOneByPosition(string $position) Return the first ChildOcLayoutModule filtered by the position column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLayoutModule requireOneBySortOrder(int $sort_order) Return the first ChildOcLayoutModule filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLayoutModule[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcLayoutModule objects based on current ModelCriteria
 * @method     ChildOcLayoutModule[]|ObjectCollection findByLayoutModuleId(int $layout_module_id) Return ChildOcLayoutModule objects filtered by the layout_module_id column
 * @method     ChildOcLayoutModule[]|ObjectCollection findByLayoutId(int $layout_id) Return ChildOcLayoutModule objects filtered by the layout_id column
 * @method     ChildOcLayoutModule[]|ObjectCollection findByCode(string $code) Return ChildOcLayoutModule objects filtered by the code column
 * @method     ChildOcLayoutModule[]|ObjectCollection findByPosition(string $position) Return ChildOcLayoutModule objects filtered by the position column
 * @method     ChildOcLayoutModule[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcLayoutModule objects filtered by the sort_order column
 * @method     ChildOcLayoutModule[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcLayoutModuleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcLayoutModuleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcLayoutModule', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcLayoutModuleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcLayoutModuleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcLayoutModuleQuery) {
            return $criteria;
        }
        $query = new ChildOcLayoutModuleQuery();
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
     * @return ChildOcLayoutModule|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcLayoutModuleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcLayoutModuleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcLayoutModule A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT layout_module_id, layout_id, code, position, sort_order FROM oc_layout_module WHERE layout_module_id = :p0';
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
            /** @var ChildOcLayoutModule $obj */
            $obj = new ChildOcLayoutModule();
            $obj->hydrate($row);
            OcLayoutModuleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcLayoutModule|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcLayoutModuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_MODULE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcLayoutModuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_MODULE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the layout_module_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLayoutModuleId(1234); // WHERE layout_module_id = 1234
     * $query->filterByLayoutModuleId(array(12, 34)); // WHERE layout_module_id IN (12, 34)
     * $query->filterByLayoutModuleId(array('min' => 12)); // WHERE layout_module_id > 12
     * </code>
     *
     * @param     mixed $layoutModuleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLayoutModuleQuery The current query, for fluid interface
     */
    public function filterByLayoutModuleId($layoutModuleId = null, $comparison = null)
    {
        if (is_array($layoutModuleId)) {
            $useMinMax = false;
            if (isset($layoutModuleId['min'])) {
                $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_MODULE_ID, $layoutModuleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($layoutModuleId['max'])) {
                $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_MODULE_ID, $layoutModuleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_MODULE_ID, $layoutModuleId, $comparison);
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
     * @return $this|ChildOcLayoutModuleQuery The current query, for fluid interface
     */
    public function filterByLayoutId($layoutId = null, $comparison = null)
    {
        if (is_array($layoutId)) {
            $useMinMax = false;
            if (isset($layoutId['min'])) {
                $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_ID, $layoutId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($layoutId['max'])) {
                $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_ID, $layoutId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_ID, $layoutId, $comparison);
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
     * @return $this|ChildOcLayoutModuleQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutModuleTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition('fooValue');   // WHERE position = 'fooValue'
     * $query->filterByPosition('%fooValue%', Criteria::LIKE); // WHERE position LIKE '%fooValue%'
     * </code>
     *
     * @param     string $position The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLayoutModuleQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($position)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutModuleTableMap::COL_POSITION, $position, $comparison);
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
     * @return $this|ChildOcLayoutModuleQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcLayoutModuleTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcLayoutModuleTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLayoutModuleTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcLayoutModule $ocLayoutModule Object to remove from the list of results
     *
     * @return $this|ChildOcLayoutModuleQuery The current query, for fluid interface
     */
    public function prune($ocLayoutModule = null)
    {
        if ($ocLayoutModule) {
            $this->addUsingAlias(OcLayoutModuleTableMap::COL_LAYOUT_MODULE_ID, $ocLayoutModule->getLayoutModuleId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_layout_module table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcLayoutModuleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcLayoutModuleTableMap::clearInstancePool();
            OcLayoutModuleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcLayoutModuleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcLayoutModuleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcLayoutModuleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcLayoutModuleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcLayoutModuleQuery
