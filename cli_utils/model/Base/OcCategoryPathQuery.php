<?php

namespace Base;

use \OcCategoryPath as ChildOcCategoryPath;
use \OcCategoryPathQuery as ChildOcCategoryPathQuery;
use \Exception;
use \PDO;
use Map\OcCategoryPathTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_category_path' table.
 *
 *
 *
 * @method     ChildOcCategoryPathQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ChildOcCategoryPathQuery orderByPathId($order = Criteria::ASC) Order by the path_id column
 * @method     ChildOcCategoryPathQuery orderByLevel($order = Criteria::ASC) Order by the level column
 *
 * @method     ChildOcCategoryPathQuery groupByCategoryId() Group by the category_id column
 * @method     ChildOcCategoryPathQuery groupByPathId() Group by the path_id column
 * @method     ChildOcCategoryPathQuery groupByLevel() Group by the level column
 *
 * @method     ChildOcCategoryPathQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCategoryPathQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCategoryPathQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCategoryPathQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCategoryPathQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCategoryPathQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCategoryPath findOne(ConnectionInterface $con = null) Return the first ChildOcCategoryPath matching the query
 * @method     ChildOcCategoryPath findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCategoryPath matching the query, or a new ChildOcCategoryPath object populated from the query conditions when no match is found
 *
 * @method     ChildOcCategoryPath findOneByCategoryId(int $category_id) Return the first ChildOcCategoryPath filtered by the category_id column
 * @method     ChildOcCategoryPath findOneByPathId(int $path_id) Return the first ChildOcCategoryPath filtered by the path_id column
 * @method     ChildOcCategoryPath findOneByLevel(int $level) Return the first ChildOcCategoryPath filtered by the level column *

 * @method     ChildOcCategoryPath requirePk($key, ConnectionInterface $con = null) Return the ChildOcCategoryPath by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryPath requireOne(ConnectionInterface $con = null) Return the first ChildOcCategoryPath matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCategoryPath requireOneByCategoryId(int $category_id) Return the first ChildOcCategoryPath filtered by the category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryPath requireOneByPathId(int $path_id) Return the first ChildOcCategoryPath filtered by the path_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryPath requireOneByLevel(int $level) Return the first ChildOcCategoryPath filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCategoryPath[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCategoryPath objects based on current ModelCriteria
 * @method     ChildOcCategoryPath[]|ObjectCollection findByCategoryId(int $category_id) Return ChildOcCategoryPath objects filtered by the category_id column
 * @method     ChildOcCategoryPath[]|ObjectCollection findByPathId(int $path_id) Return ChildOcCategoryPath objects filtered by the path_id column
 * @method     ChildOcCategoryPath[]|ObjectCollection findByLevel(int $level) Return ChildOcCategoryPath objects filtered by the level column
 * @method     ChildOcCategoryPath[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCategoryPathQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCategoryPathQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCategoryPath', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCategoryPathQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCategoryPathQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCategoryPathQuery) {
            return $criteria;
        }
        $query = new ChildOcCategoryPathQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$category_id, $path_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcCategoryPath|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCategoryPathTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCategoryPathTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcCategoryPath A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT category_id, path_id, level FROM oc_category_path WHERE category_id = :p0 AND path_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOcCategoryPath $obj */
            $obj = new ChildOcCategoryPath();
            $obj->hydrate($row);
            OcCategoryPathTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcCategoryPath|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildOcCategoryPathQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcCategoryPathTableMap::COL_CATEGORY_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcCategoryPathTableMap::COL_PATH_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCategoryPathQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcCategoryPathTableMap::COL_CATEGORY_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcCategoryPathTableMap::COL_PATH_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildOcCategoryPathQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(OcCategoryPathTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(OcCategoryPathTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryPathTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the path_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPathId(1234); // WHERE path_id = 1234
     * $query->filterByPathId(array(12, 34)); // WHERE path_id IN (12, 34)
     * $query->filterByPathId(array('min' => 12)); // WHERE path_id > 12
     * </code>
     *
     * @param     mixed $pathId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryPathQuery The current query, for fluid interface
     */
    public function filterByPathId($pathId = null, $comparison = null)
    {
        if (is_array($pathId)) {
            $useMinMax = false;
            if (isset($pathId['min'])) {
                $this->addUsingAlias(OcCategoryPathTableMap::COL_PATH_ID, $pathId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pathId['max'])) {
                $this->addUsingAlias(OcCategoryPathTableMap::COL_PATH_ID, $pathId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryPathTableMap::COL_PATH_ID, $pathId, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryPathQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(OcCategoryPathTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(OcCategoryPathTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryPathTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCategoryPath $ocCategoryPath Object to remove from the list of results
     *
     * @return $this|ChildOcCategoryPathQuery The current query, for fluid interface
     */
    public function prune($ocCategoryPath = null)
    {
        if ($ocCategoryPath) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcCategoryPathTableMap::COL_CATEGORY_ID), $ocCategoryPath->getCategoryId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcCategoryPathTableMap::COL_PATH_ID), $ocCategoryPath->getPathId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_category_path table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCategoryPathTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCategoryPathTableMap::clearInstancePool();
            OcCategoryPathTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCategoryPathTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCategoryPathTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCategoryPathTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCategoryPathTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCategoryPathQuery
