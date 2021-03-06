<?php

namespace Base;

use \OcExtensionPath as ChildOcExtensionPath;
use \OcExtensionPathQuery as ChildOcExtensionPathQuery;
use \Exception;
use \PDO;
use Map\OcExtensionPathTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_extension_path' table.
 *
 *
 *
 * @method     ChildOcExtensionPathQuery orderByExtensionPathId($order = Criteria::ASC) Order by the extension_path_id column
 * @method     ChildOcExtensionPathQuery orderByExtensionInstallId($order = Criteria::ASC) Order by the extension_install_id column
 * @method     ChildOcExtensionPathQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     ChildOcExtensionPathQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcExtensionPathQuery groupByExtensionPathId() Group by the extension_path_id column
 * @method     ChildOcExtensionPathQuery groupByExtensionInstallId() Group by the extension_install_id column
 * @method     ChildOcExtensionPathQuery groupByPath() Group by the path column
 * @method     ChildOcExtensionPathQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcExtensionPathQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcExtensionPathQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcExtensionPathQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcExtensionPathQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcExtensionPathQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcExtensionPathQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcExtensionPath findOne(ConnectionInterface $con = null) Return the first ChildOcExtensionPath matching the query
 * @method     ChildOcExtensionPath findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcExtensionPath matching the query, or a new ChildOcExtensionPath object populated from the query conditions when no match is found
 *
 * @method     ChildOcExtensionPath findOneByExtensionPathId(int $extension_path_id) Return the first ChildOcExtensionPath filtered by the extension_path_id column
 * @method     ChildOcExtensionPath findOneByExtensionInstallId(int $extension_install_id) Return the first ChildOcExtensionPath filtered by the extension_install_id column
 * @method     ChildOcExtensionPath findOneByPath(string $path) Return the first ChildOcExtensionPath filtered by the path column
 * @method     ChildOcExtensionPath findOneByDateAdded(string $date_added) Return the first ChildOcExtensionPath filtered by the date_added column *

 * @method     ChildOcExtensionPath requirePk($key, ConnectionInterface $con = null) Return the ChildOcExtensionPath by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcExtensionPath requireOne(ConnectionInterface $con = null) Return the first ChildOcExtensionPath matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcExtensionPath requireOneByExtensionPathId(int $extension_path_id) Return the first ChildOcExtensionPath filtered by the extension_path_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcExtensionPath requireOneByExtensionInstallId(int $extension_install_id) Return the first ChildOcExtensionPath filtered by the extension_install_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcExtensionPath requireOneByPath(string $path) Return the first ChildOcExtensionPath filtered by the path column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcExtensionPath requireOneByDateAdded(string $date_added) Return the first ChildOcExtensionPath filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcExtensionPath[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcExtensionPath objects based on current ModelCriteria
 * @method     ChildOcExtensionPath[]|ObjectCollection findByExtensionPathId(int $extension_path_id) Return ChildOcExtensionPath objects filtered by the extension_path_id column
 * @method     ChildOcExtensionPath[]|ObjectCollection findByExtensionInstallId(int $extension_install_id) Return ChildOcExtensionPath objects filtered by the extension_install_id column
 * @method     ChildOcExtensionPath[]|ObjectCollection findByPath(string $path) Return ChildOcExtensionPath objects filtered by the path column
 * @method     ChildOcExtensionPath[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcExtensionPath objects filtered by the date_added column
 * @method     ChildOcExtensionPath[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcExtensionPathQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcExtensionPathQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcExtensionPath', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcExtensionPathQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcExtensionPathQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcExtensionPathQuery) {
            return $criteria;
        }
        $query = new ChildOcExtensionPathQuery();
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
     * @return ChildOcExtensionPath|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcExtensionPathTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcExtensionPathTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcExtensionPath A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT extension_path_id, extension_install_id, path, date_added FROM oc_extension_path WHERE extension_path_id = :p0';
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
            /** @var ChildOcExtensionPath $obj */
            $obj = new ChildOcExtensionPath();
            $obj->hydrate($row);
            OcExtensionPathTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcExtensionPath|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcExtensionPathQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_PATH_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcExtensionPathQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_PATH_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the extension_path_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExtensionPathId(1234); // WHERE extension_path_id = 1234
     * $query->filterByExtensionPathId(array(12, 34)); // WHERE extension_path_id IN (12, 34)
     * $query->filterByExtensionPathId(array('min' => 12)); // WHERE extension_path_id > 12
     * </code>
     *
     * @param     mixed $extensionPathId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcExtensionPathQuery The current query, for fluid interface
     */
    public function filterByExtensionPathId($extensionPathId = null, $comparison = null)
    {
        if (is_array($extensionPathId)) {
            $useMinMax = false;
            if (isset($extensionPathId['min'])) {
                $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_PATH_ID, $extensionPathId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($extensionPathId['max'])) {
                $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_PATH_ID, $extensionPathId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_PATH_ID, $extensionPathId, $comparison);
    }

    /**
     * Filter the query on the extension_install_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExtensionInstallId(1234); // WHERE extension_install_id = 1234
     * $query->filterByExtensionInstallId(array(12, 34)); // WHERE extension_install_id IN (12, 34)
     * $query->filterByExtensionInstallId(array('min' => 12)); // WHERE extension_install_id > 12
     * </code>
     *
     * @param     mixed $extensionInstallId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcExtensionPathQuery The current query, for fluid interface
     */
    public function filterByExtensionInstallId($extensionInstallId = null, $comparison = null)
    {
        if (is_array($extensionInstallId)) {
            $useMinMax = false;
            if (isset($extensionInstallId['min'])) {
                $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_INSTALL_ID, $extensionInstallId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($extensionInstallId['max'])) {
                $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_INSTALL_ID, $extensionInstallId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_INSTALL_ID, $extensionInstallId, $comparison);
    }

    /**
     * Filter the query on the path column
     *
     * Example usage:
     * <code>
     * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
     * $query->filterByPath('%fooValue%', Criteria::LIKE); // WHERE path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $path The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcExtensionPathQuery The current query, for fluid interface
     */
    public function filterByPath($path = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($path)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcExtensionPathTableMap::COL_PATH, $path, $comparison);
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
     * @return $this|ChildOcExtensionPathQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcExtensionPathTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcExtensionPathTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcExtensionPathTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcExtensionPath $ocExtensionPath Object to remove from the list of results
     *
     * @return $this|ChildOcExtensionPathQuery The current query, for fluid interface
     */
    public function prune($ocExtensionPath = null)
    {
        if ($ocExtensionPath) {
            $this->addUsingAlias(OcExtensionPathTableMap::COL_EXTENSION_PATH_ID, $ocExtensionPath->getExtensionPathId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_extension_path table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcExtensionPathTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcExtensionPathTableMap::clearInstancePool();
            OcExtensionPathTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcExtensionPathTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcExtensionPathTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcExtensionPathTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcExtensionPathTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcExtensionPathQuery
