<?php

namespace Base;

use \OcLengthClass as ChildOcLengthClass;
use \OcLengthClassQuery as ChildOcLengthClassQuery;
use \Exception;
use \PDO;
use Map\OcLengthClassTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_length_class' table.
 *
 *
 *
 * @method     ChildOcLengthClassQuery orderByLengthClassId($order = Criteria::ASC) Order by the length_class_id column
 * @method     ChildOcLengthClassQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     ChildOcLengthClassQuery groupByLengthClassId() Group by the length_class_id column
 * @method     ChildOcLengthClassQuery groupByValue() Group by the value column
 *
 * @method     ChildOcLengthClassQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcLengthClassQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcLengthClassQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcLengthClassQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcLengthClassQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcLengthClassQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcLengthClass findOne(ConnectionInterface $con = null) Return the first ChildOcLengthClass matching the query
 * @method     ChildOcLengthClass findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcLengthClass matching the query, or a new ChildOcLengthClass object populated from the query conditions when no match is found
 *
 * @method     ChildOcLengthClass findOneByLengthClassId(int $length_class_id) Return the first ChildOcLengthClass filtered by the length_class_id column
 * @method     ChildOcLengthClass findOneByValue(string $value) Return the first ChildOcLengthClass filtered by the value column *

 * @method     ChildOcLengthClass requirePk($key, ConnectionInterface $con = null) Return the ChildOcLengthClass by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLengthClass requireOne(ConnectionInterface $con = null) Return the first ChildOcLengthClass matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLengthClass requireOneByLengthClassId(int $length_class_id) Return the first ChildOcLengthClass filtered by the length_class_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLengthClass requireOneByValue(string $value) Return the first ChildOcLengthClass filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLengthClass[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcLengthClass objects based on current ModelCriteria
 * @method     ChildOcLengthClass[]|ObjectCollection findByLengthClassId(int $length_class_id) Return ChildOcLengthClass objects filtered by the length_class_id column
 * @method     ChildOcLengthClass[]|ObjectCollection findByValue(string $value) Return ChildOcLengthClass objects filtered by the value column
 * @method     ChildOcLengthClass[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcLengthClassQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcLengthClassQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcLengthClass', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcLengthClassQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcLengthClassQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcLengthClassQuery) {
            return $criteria;
        }
        $query = new ChildOcLengthClassQuery();
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
     * @return ChildOcLengthClass|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcLengthClassTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcLengthClassTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcLengthClass A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT length_class_id, value FROM oc_length_class WHERE length_class_id = :p0';
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
            /** @var ChildOcLengthClass $obj */
            $obj = new ChildOcLengthClass();
            $obj->hydrate($row);
            OcLengthClassTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcLengthClass|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcLengthClassQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcLengthClassTableMap::COL_LENGTH_CLASS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcLengthClassQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcLengthClassTableMap::COL_LENGTH_CLASS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the length_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLengthClassId(1234); // WHERE length_class_id = 1234
     * $query->filterByLengthClassId(array(12, 34)); // WHERE length_class_id IN (12, 34)
     * $query->filterByLengthClassId(array('min' => 12)); // WHERE length_class_id > 12
     * </code>
     *
     * @param     mixed $lengthClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLengthClassQuery The current query, for fluid interface
     */
    public function filterByLengthClassId($lengthClassId = null, $comparison = null)
    {
        if (is_array($lengthClassId)) {
            $useMinMax = false;
            if (isset($lengthClassId['min'])) {
                $this->addUsingAlias(OcLengthClassTableMap::COL_LENGTH_CLASS_ID, $lengthClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lengthClassId['max'])) {
                $this->addUsingAlias(OcLengthClassTableMap::COL_LENGTH_CLASS_ID, $lengthClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLengthClassTableMap::COL_LENGTH_CLASS_ID, $lengthClassId, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLengthClassQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(OcLengthClassTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(OcLengthClassTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLengthClassTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcLengthClass $ocLengthClass Object to remove from the list of results
     *
     * @return $this|ChildOcLengthClassQuery The current query, for fluid interface
     */
    public function prune($ocLengthClass = null)
    {
        if ($ocLengthClass) {
            $this->addUsingAlias(OcLengthClassTableMap::COL_LENGTH_CLASS_ID, $ocLengthClass->getLengthClassId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_length_class table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcLengthClassTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcLengthClassTableMap::clearInstancePool();
            OcLengthClassTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcLengthClassTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcLengthClassTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcLengthClassTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcLengthClassTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcLengthClassQuery
