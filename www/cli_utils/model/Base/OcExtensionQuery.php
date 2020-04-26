<?php

namespace Base;

use \OcExtension as ChildOcExtension;
use \OcExtensionQuery as ChildOcExtensionQuery;
use \Exception;
use \PDO;
use Map\OcExtensionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_extension' table.
 *
 *
 *
 * @method     ChildOcExtensionQuery orderByExtensionId($order = Criteria::ASC) Order by the extension_id column
 * @method     ChildOcExtensionQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOcExtensionQuery orderByCode($order = Criteria::ASC) Order by the code column
 *
 * @method     ChildOcExtensionQuery groupByExtensionId() Group by the extension_id column
 * @method     ChildOcExtensionQuery groupByType() Group by the type column
 * @method     ChildOcExtensionQuery groupByCode() Group by the code column
 *
 * @method     ChildOcExtensionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcExtensionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcExtensionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcExtensionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcExtensionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcExtensionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcExtension findOne(ConnectionInterface $con = null) Return the first ChildOcExtension matching the query
 * @method     ChildOcExtension findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcExtension matching the query, or a new ChildOcExtension object populated from the query conditions when no match is found
 *
 * @method     ChildOcExtension findOneByExtensionId(int $extension_id) Return the first ChildOcExtension filtered by the extension_id column
 * @method     ChildOcExtension findOneByType(string $type) Return the first ChildOcExtension filtered by the type column
 * @method     ChildOcExtension findOneByCode(string $code) Return the first ChildOcExtension filtered by the code column *

 * @method     ChildOcExtension requirePk($key, ConnectionInterface $con = null) Return the ChildOcExtension by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcExtension requireOne(ConnectionInterface $con = null) Return the first ChildOcExtension matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcExtension requireOneByExtensionId(int $extension_id) Return the first ChildOcExtension filtered by the extension_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcExtension requireOneByType(string $type) Return the first ChildOcExtension filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcExtension requireOneByCode(string $code) Return the first ChildOcExtension filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcExtension[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcExtension objects based on current ModelCriteria
 * @method     ChildOcExtension[]|ObjectCollection findByExtensionId(int $extension_id) Return ChildOcExtension objects filtered by the extension_id column
 * @method     ChildOcExtension[]|ObjectCollection findByType(string $type) Return ChildOcExtension objects filtered by the type column
 * @method     ChildOcExtension[]|ObjectCollection findByCode(string $code) Return ChildOcExtension objects filtered by the code column
 * @method     ChildOcExtension[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcExtensionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcExtensionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcExtension', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcExtensionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcExtensionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcExtensionQuery) {
            return $criteria;
        }
        $query = new ChildOcExtensionQuery();
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
     * @return ChildOcExtension|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcExtensionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcExtensionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcExtension A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT extension_id, type, code FROM oc_extension WHERE extension_id = :p0';
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
            /** @var ChildOcExtension $obj */
            $obj = new ChildOcExtension();
            $obj->hydrate($row);
            OcExtensionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcExtension|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcExtensionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcExtensionTableMap::COL_EXTENSION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcExtensionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcExtensionTableMap::COL_EXTENSION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the extension_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExtensionId(1234); // WHERE extension_id = 1234
     * $query->filterByExtensionId(array(12, 34)); // WHERE extension_id IN (12, 34)
     * $query->filterByExtensionId(array('min' => 12)); // WHERE extension_id > 12
     * </code>
     *
     * @param     mixed $extensionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcExtensionQuery The current query, for fluid interface
     */
    public function filterByExtensionId($extensionId = null, $comparison = null)
    {
        if (is_array($extensionId)) {
            $useMinMax = false;
            if (isset($extensionId['min'])) {
                $this->addUsingAlias(OcExtensionTableMap::COL_EXTENSION_ID, $extensionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($extensionId['max'])) {
                $this->addUsingAlias(OcExtensionTableMap::COL_EXTENSION_ID, $extensionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcExtensionTableMap::COL_EXTENSION_ID, $extensionId, $comparison);
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
     * @return $this|ChildOcExtensionQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcExtensionTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildOcExtensionQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcExtensionTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcExtension $ocExtension Object to remove from the list of results
     *
     * @return $this|ChildOcExtensionQuery The current query, for fluid interface
     */
    public function prune($ocExtension = null)
    {
        if ($ocExtension) {
            $this->addUsingAlias(OcExtensionTableMap::COL_EXTENSION_ID, $ocExtension->getExtensionId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_extension table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcExtensionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcExtensionTableMap::clearInstancePool();
            OcExtensionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcExtensionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcExtensionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcExtensionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcExtensionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcExtensionQuery
