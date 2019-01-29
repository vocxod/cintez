<?php

namespace Base;

use \OcUserGroup as ChildOcUserGroup;
use \OcUserGroupQuery as ChildOcUserGroupQuery;
use \Exception;
use \PDO;
use Map\OcUserGroupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_user_group' table.
 *
 *
 *
 * @method     ChildOcUserGroupQuery orderByUserGroupId($order = Criteria::ASC) Order by the user_group_id column
 * @method     ChildOcUserGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcUserGroupQuery orderByPermission($order = Criteria::ASC) Order by the permission column
 *
 * @method     ChildOcUserGroupQuery groupByUserGroupId() Group by the user_group_id column
 * @method     ChildOcUserGroupQuery groupByName() Group by the name column
 * @method     ChildOcUserGroupQuery groupByPermission() Group by the permission column
 *
 * @method     ChildOcUserGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcUserGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcUserGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcUserGroupQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcUserGroupQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcUserGroupQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcUserGroup findOne(ConnectionInterface $con = null) Return the first ChildOcUserGroup matching the query
 * @method     ChildOcUserGroup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcUserGroup matching the query, or a new ChildOcUserGroup object populated from the query conditions when no match is found
 *
 * @method     ChildOcUserGroup findOneByUserGroupId(int $user_group_id) Return the first ChildOcUserGroup filtered by the user_group_id column
 * @method     ChildOcUserGroup findOneByName(string $name) Return the first ChildOcUserGroup filtered by the name column
 * @method     ChildOcUserGroup findOneByPermission(string $permission) Return the first ChildOcUserGroup filtered by the permission column *

 * @method     ChildOcUserGroup requirePk($key, ConnectionInterface $con = null) Return the ChildOcUserGroup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcUserGroup requireOne(ConnectionInterface $con = null) Return the first ChildOcUserGroup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcUserGroup requireOneByUserGroupId(int $user_group_id) Return the first ChildOcUserGroup filtered by the user_group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcUserGroup requireOneByName(string $name) Return the first ChildOcUserGroup filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcUserGroup requireOneByPermission(string $permission) Return the first ChildOcUserGroup filtered by the permission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcUserGroup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcUserGroup objects based on current ModelCriteria
 * @method     ChildOcUserGroup[]|ObjectCollection findByUserGroupId(int $user_group_id) Return ChildOcUserGroup objects filtered by the user_group_id column
 * @method     ChildOcUserGroup[]|ObjectCollection findByName(string $name) Return ChildOcUserGroup objects filtered by the name column
 * @method     ChildOcUserGroup[]|ObjectCollection findByPermission(string $permission) Return ChildOcUserGroup objects filtered by the permission column
 * @method     ChildOcUserGroup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcUserGroupQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcUserGroupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcUserGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcUserGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcUserGroupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcUserGroupQuery) {
            return $criteria;
        }
        $query = new ChildOcUserGroupQuery();
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
     * @return ChildOcUserGroup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcUserGroupTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcUserGroupTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcUserGroup A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_group_id, name, permission FROM oc_user_group WHERE user_group_id = :p0';
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
            /** @var ChildOcUserGroup $obj */
            $obj = new ChildOcUserGroup();
            $obj->hydrate($row);
            OcUserGroupTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcUserGroup|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcUserGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcUserGroupTableMap::COL_USER_GROUP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcUserGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcUserGroupTableMap::COL_USER_GROUP_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user_group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserGroupId(1234); // WHERE user_group_id = 1234
     * $query->filterByUserGroupId(array(12, 34)); // WHERE user_group_id IN (12, 34)
     * $query->filterByUserGroupId(array('min' => 12)); // WHERE user_group_id > 12
     * </code>
     *
     * @param     mixed $userGroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcUserGroupQuery The current query, for fluid interface
     */
    public function filterByUserGroupId($userGroupId = null, $comparison = null)
    {
        if (is_array($userGroupId)) {
            $useMinMax = false;
            if (isset($userGroupId['min'])) {
                $this->addUsingAlias(OcUserGroupTableMap::COL_USER_GROUP_ID, $userGroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userGroupId['max'])) {
                $this->addUsingAlias(OcUserGroupTableMap::COL_USER_GROUP_ID, $userGroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcUserGroupTableMap::COL_USER_GROUP_ID, $userGroupId, $comparison);
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
     * @return $this|ChildOcUserGroupQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcUserGroupTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the permission column
     *
     * Example usage:
     * <code>
     * $query->filterByPermission('fooValue');   // WHERE permission = 'fooValue'
     * $query->filterByPermission('%fooValue%', Criteria::LIKE); // WHERE permission LIKE '%fooValue%'
     * </code>
     *
     * @param     string $permission The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcUserGroupQuery The current query, for fluid interface
     */
    public function filterByPermission($permission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($permission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcUserGroupTableMap::COL_PERMISSION, $permission, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcUserGroup $ocUserGroup Object to remove from the list of results
     *
     * @return $this|ChildOcUserGroupQuery The current query, for fluid interface
     */
    public function prune($ocUserGroup = null)
    {
        if ($ocUserGroup) {
            $this->addUsingAlias(OcUserGroupTableMap::COL_USER_GROUP_ID, $ocUserGroup->getUserGroupId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_user_group table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcUserGroupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcUserGroupTableMap::clearInstancePool();
            OcUserGroupTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcUserGroupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcUserGroupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcUserGroupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcUserGroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcUserGroupQuery
