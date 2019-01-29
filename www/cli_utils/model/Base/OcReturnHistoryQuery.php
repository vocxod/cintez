<?php

namespace Base;

use \OcReturnHistory as ChildOcReturnHistory;
use \OcReturnHistoryQuery as ChildOcReturnHistoryQuery;
use \Exception;
use \PDO;
use Map\OcReturnHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_return_history' table.
 *
 *
 *
 * @method     ChildOcReturnHistoryQuery orderByReturnHistoryId($order = Criteria::ASC) Order by the return_history_id column
 * @method     ChildOcReturnHistoryQuery orderByReturnId($order = Criteria::ASC) Order by the return_id column
 * @method     ChildOcReturnHistoryQuery orderByReturnStatusId($order = Criteria::ASC) Order by the return_status_id column
 * @method     ChildOcReturnHistoryQuery orderByNotify($order = Criteria::ASC) Order by the notify column
 * @method     ChildOcReturnHistoryQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildOcReturnHistoryQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcReturnHistoryQuery groupByReturnHistoryId() Group by the return_history_id column
 * @method     ChildOcReturnHistoryQuery groupByReturnId() Group by the return_id column
 * @method     ChildOcReturnHistoryQuery groupByReturnStatusId() Group by the return_status_id column
 * @method     ChildOcReturnHistoryQuery groupByNotify() Group by the notify column
 * @method     ChildOcReturnHistoryQuery groupByComment() Group by the comment column
 * @method     ChildOcReturnHistoryQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcReturnHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcReturnHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcReturnHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcReturnHistoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcReturnHistoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcReturnHistoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcReturnHistory findOne(ConnectionInterface $con = null) Return the first ChildOcReturnHistory matching the query
 * @method     ChildOcReturnHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcReturnHistory matching the query, or a new ChildOcReturnHistory object populated from the query conditions when no match is found
 *
 * @method     ChildOcReturnHistory findOneByReturnHistoryId(int $return_history_id) Return the first ChildOcReturnHistory filtered by the return_history_id column
 * @method     ChildOcReturnHistory findOneByReturnId(int $return_id) Return the first ChildOcReturnHistory filtered by the return_id column
 * @method     ChildOcReturnHistory findOneByReturnStatusId(int $return_status_id) Return the first ChildOcReturnHistory filtered by the return_status_id column
 * @method     ChildOcReturnHistory findOneByNotify(boolean $notify) Return the first ChildOcReturnHistory filtered by the notify column
 * @method     ChildOcReturnHistory findOneByComment(string $comment) Return the first ChildOcReturnHistory filtered by the comment column
 * @method     ChildOcReturnHistory findOneByDateAdded(string $date_added) Return the first ChildOcReturnHistory filtered by the date_added column *

 * @method     ChildOcReturnHistory requirePk($key, ConnectionInterface $con = null) Return the ChildOcReturnHistory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnHistory requireOne(ConnectionInterface $con = null) Return the first ChildOcReturnHistory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcReturnHistory requireOneByReturnHistoryId(int $return_history_id) Return the first ChildOcReturnHistory filtered by the return_history_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnHistory requireOneByReturnId(int $return_id) Return the first ChildOcReturnHistory filtered by the return_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnHistory requireOneByReturnStatusId(int $return_status_id) Return the first ChildOcReturnHistory filtered by the return_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnHistory requireOneByNotify(boolean $notify) Return the first ChildOcReturnHistory filtered by the notify column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnHistory requireOneByComment(string $comment) Return the first ChildOcReturnHistory filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnHistory requireOneByDateAdded(string $date_added) Return the first ChildOcReturnHistory filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcReturnHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcReturnHistory objects based on current ModelCriteria
 * @method     ChildOcReturnHistory[]|ObjectCollection findByReturnHistoryId(int $return_history_id) Return ChildOcReturnHistory objects filtered by the return_history_id column
 * @method     ChildOcReturnHistory[]|ObjectCollection findByReturnId(int $return_id) Return ChildOcReturnHistory objects filtered by the return_id column
 * @method     ChildOcReturnHistory[]|ObjectCollection findByReturnStatusId(int $return_status_id) Return ChildOcReturnHistory objects filtered by the return_status_id column
 * @method     ChildOcReturnHistory[]|ObjectCollection findByNotify(boolean $notify) Return ChildOcReturnHistory objects filtered by the notify column
 * @method     ChildOcReturnHistory[]|ObjectCollection findByComment(string $comment) Return ChildOcReturnHistory objects filtered by the comment column
 * @method     ChildOcReturnHistory[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcReturnHistory objects filtered by the date_added column
 * @method     ChildOcReturnHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcReturnHistoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcReturnHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcReturnHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcReturnHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcReturnHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcReturnHistoryQuery) {
            return $criteria;
        }
        $query = new ChildOcReturnHistoryQuery();
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
     * @return ChildOcReturnHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcReturnHistoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcReturnHistoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcReturnHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT return_history_id, return_id, return_status_id, notify, comment, date_added FROM oc_return_history WHERE return_history_id = :p0';
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
            /** @var ChildOcReturnHistory $obj */
            $obj = new ChildOcReturnHistory();
            $obj->hydrate($row);
            OcReturnHistoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcReturnHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the return_history_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnHistoryId(1234); // WHERE return_history_id = 1234
     * $query->filterByReturnHistoryId(array(12, 34)); // WHERE return_history_id IN (12, 34)
     * $query->filterByReturnHistoryId(array('min' => 12)); // WHERE return_history_id > 12
     * </code>
     *
     * @param     mixed $returnHistoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function filterByReturnHistoryId($returnHistoryId = null, $comparison = null)
    {
        if (is_array($returnHistoryId)) {
            $useMinMax = false;
            if (isset($returnHistoryId['min'])) {
                $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID, $returnHistoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnHistoryId['max'])) {
                $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID, $returnHistoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID, $returnHistoryId, $comparison);
    }

    /**
     * Filter the query on the return_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnId(1234); // WHERE return_id = 1234
     * $query->filterByReturnId(array(12, 34)); // WHERE return_id IN (12, 34)
     * $query->filterByReturnId(array('min' => 12)); // WHERE return_id > 12
     * </code>
     *
     * @param     mixed $returnId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function filterByReturnId($returnId = null, $comparison = null)
    {
        if (is_array($returnId)) {
            $useMinMax = false;
            if (isset($returnId['min'])) {
                $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_ID, $returnId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnId['max'])) {
                $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_ID, $returnId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_ID, $returnId, $comparison);
    }

    /**
     * Filter the query on the return_status_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnStatusId(1234); // WHERE return_status_id = 1234
     * $query->filterByReturnStatusId(array(12, 34)); // WHERE return_status_id IN (12, 34)
     * $query->filterByReturnStatusId(array('min' => 12)); // WHERE return_status_id > 12
     * </code>
     *
     * @param     mixed $returnStatusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function filterByReturnStatusId($returnStatusId = null, $comparison = null)
    {
        if (is_array($returnStatusId)) {
            $useMinMax = false;
            if (isset($returnStatusId['min'])) {
                $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_STATUS_ID, $returnStatusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnStatusId['max'])) {
                $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_STATUS_ID, $returnStatusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_STATUS_ID, $returnStatusId, $comparison);
    }

    /**
     * Filter the query on the notify column
     *
     * Example usage:
     * <code>
     * $query->filterByNotify(true); // WHERE notify = true
     * $query->filterByNotify('yes'); // WHERE notify = true
     * </code>
     *
     * @param     boolean|string $notify The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function filterByNotify($notify = null, $comparison = null)
    {
        if (is_string($notify)) {
            $notify = in_array(strtolower($notify), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcReturnHistoryTableMap::COL_NOTIFY, $notify, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnHistoryTableMap::COL_COMMENT, $comment, $comparison);
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
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcReturnHistoryTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcReturnHistoryTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnHistoryTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcReturnHistory $ocReturnHistory Object to remove from the list of results
     *
     * @return $this|ChildOcReturnHistoryQuery The current query, for fluid interface
     */
    public function prune($ocReturnHistory = null)
    {
        if ($ocReturnHistory) {
            $this->addUsingAlias(OcReturnHistoryTableMap::COL_RETURN_HISTORY_ID, $ocReturnHistory->getReturnHistoryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_return_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcReturnHistoryTableMap::clearInstancePool();
            OcReturnHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcReturnHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcReturnHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcReturnHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcReturnHistoryQuery
