<?php

namespace Base;

use \OcInformation as ChildOcInformation;
use \OcInformationQuery as ChildOcInformationQuery;
use \Exception;
use \PDO;
use Map\OcInformationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_information' table.
 *
 *
 *
 * @method     ChildOcInformationQuery orderByInformationId($order = Criteria::ASC) Order by the information_id column
 * @method     ChildOcInformationQuery orderByBottom($order = Criteria::ASC) Order by the bottom column
 * @method     ChildOcInformationQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 * @method     ChildOcInformationQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcInformationQuery orderByIsnews($order = Criteria::ASC) Order by the isnews column
 * @method     ChildOcInformationQuery orderByOnhome($order = Criteria::ASC) Order by the onhome column
 *
 * @method     ChildOcInformationQuery groupByInformationId() Group by the information_id column
 * @method     ChildOcInformationQuery groupByBottom() Group by the bottom column
 * @method     ChildOcInformationQuery groupBySortOrder() Group by the sort_order column
 * @method     ChildOcInformationQuery groupByStatus() Group by the status column
 * @method     ChildOcInformationQuery groupByIsnews() Group by the isnews column
 * @method     ChildOcInformationQuery groupByOnhome() Group by the onhome column
 *
 * @method     ChildOcInformationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcInformationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcInformationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcInformationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcInformationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcInformationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcInformation findOne(ConnectionInterface $con = null) Return the first ChildOcInformation matching the query
 * @method     ChildOcInformation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcInformation matching the query, or a new ChildOcInformation object populated from the query conditions when no match is found
 *
 * @method     ChildOcInformation findOneByInformationId(int $information_id) Return the first ChildOcInformation filtered by the information_id column
 * @method     ChildOcInformation findOneByBottom(int $bottom) Return the first ChildOcInformation filtered by the bottom column
 * @method     ChildOcInformation findOneBySortOrder(int $sort_order) Return the first ChildOcInformation filtered by the sort_order column
 * @method     ChildOcInformation findOneByStatus(boolean $status) Return the first ChildOcInformation filtered by the status column
 * @method     ChildOcInformation findOneByIsnews(int $isnews) Return the first ChildOcInformation filtered by the isnews column
 * @method     ChildOcInformation findOneByOnhome(int $onhome) Return the first ChildOcInformation filtered by the onhome column *

 * @method     ChildOcInformation requirePk($key, ConnectionInterface $con = null) Return the ChildOcInformation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformation requireOne(ConnectionInterface $con = null) Return the first ChildOcInformation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcInformation requireOneByInformationId(int $information_id) Return the first ChildOcInformation filtered by the information_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformation requireOneByBottom(int $bottom) Return the first ChildOcInformation filtered by the bottom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformation requireOneBySortOrder(int $sort_order) Return the first ChildOcInformation filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformation requireOneByStatus(boolean $status) Return the first ChildOcInformation filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformation requireOneByIsnews(int $isnews) Return the first ChildOcInformation filtered by the isnews column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformation requireOneByOnhome(int $onhome) Return the first ChildOcInformation filtered by the onhome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcInformation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcInformation objects based on current ModelCriteria
 * @method     ChildOcInformation[]|ObjectCollection findByInformationId(int $information_id) Return ChildOcInformation objects filtered by the information_id column
 * @method     ChildOcInformation[]|ObjectCollection findByBottom(int $bottom) Return ChildOcInformation objects filtered by the bottom column
 * @method     ChildOcInformation[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcInformation objects filtered by the sort_order column
 * @method     ChildOcInformation[]|ObjectCollection findByStatus(boolean $status) Return ChildOcInformation objects filtered by the status column
 * @method     ChildOcInformation[]|ObjectCollection findByIsnews(int $isnews) Return ChildOcInformation objects filtered by the isnews column
 * @method     ChildOcInformation[]|ObjectCollection findByOnhome(int $onhome) Return ChildOcInformation objects filtered by the onhome column
 * @method     ChildOcInformation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcInformationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcInformationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcInformation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcInformationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcInformationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcInformationQuery) {
            return $criteria;
        }
        $query = new ChildOcInformationQuery();
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
     * @return ChildOcInformation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcInformationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcInformationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcInformation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT information_id, bottom, sort_order, status, isnews, onhome FROM oc_information WHERE information_id = :p0';
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
            /** @var ChildOcInformation $obj */
            $obj = new ChildOcInformation();
            $obj->hydrate($row);
            OcInformationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcInformation|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcInformationTableMap::COL_INFORMATION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcInformationTableMap::COL_INFORMATION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the information_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationId(1234); // WHERE information_id = 1234
     * $query->filterByInformationId(array(12, 34)); // WHERE information_id IN (12, 34)
     * $query->filterByInformationId(array('min' => 12)); // WHERE information_id > 12
     * </code>
     *
     * @param     mixed $informationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function filterByInformationId($informationId = null, $comparison = null)
    {
        if (is_array($informationId)) {
            $useMinMax = false;
            if (isset($informationId['min'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_INFORMATION_ID, $informationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationId['max'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_INFORMATION_ID, $informationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationTableMap::COL_INFORMATION_ID, $informationId, $comparison);
    }

    /**
     * Filter the query on the bottom column
     *
     * Example usage:
     * <code>
     * $query->filterByBottom(1234); // WHERE bottom = 1234
     * $query->filterByBottom(array(12, 34)); // WHERE bottom IN (12, 34)
     * $query->filterByBottom(array('min' => 12)); // WHERE bottom > 12
     * </code>
     *
     * @param     mixed $bottom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function filterByBottom($bottom = null, $comparison = null)
    {
        if (is_array($bottom)) {
            $useMinMax = false;
            if (isset($bottom['min'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_BOTTOM, $bottom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bottom['max'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_BOTTOM, $bottom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationTableMap::COL_BOTTOM, $bottom, $comparison);
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
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcInformationTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the isnews column
     *
     * Example usage:
     * <code>
     * $query->filterByIsnews(1234); // WHERE isnews = 1234
     * $query->filterByIsnews(array(12, 34)); // WHERE isnews IN (12, 34)
     * $query->filterByIsnews(array('min' => 12)); // WHERE isnews > 12
     * </code>
     *
     * @param     mixed $isnews The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function filterByIsnews($isnews = null, $comparison = null)
    {
        if (is_array($isnews)) {
            $useMinMax = false;
            if (isset($isnews['min'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_ISNEWS, $isnews['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isnews['max'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_ISNEWS, $isnews['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationTableMap::COL_ISNEWS, $isnews, $comparison);
    }

    /**
     * Filter the query on the onhome column
     *
     * Example usage:
     * <code>
     * $query->filterByOnhome(1234); // WHERE onhome = 1234
     * $query->filterByOnhome(array(12, 34)); // WHERE onhome IN (12, 34)
     * $query->filterByOnhome(array('min' => 12)); // WHERE onhome > 12
     * </code>
     *
     * @param     mixed $onhome The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function filterByOnhome($onhome = null, $comparison = null)
    {
        if (is_array($onhome)) {
            $useMinMax = false;
            if (isset($onhome['min'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_ONHOME, $onhome['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($onhome['max'])) {
                $this->addUsingAlias(OcInformationTableMap::COL_ONHOME, $onhome['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationTableMap::COL_ONHOME, $onhome, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcInformation $ocInformation Object to remove from the list of results
     *
     * @return $this|ChildOcInformationQuery The current query, for fluid interface
     */
    public function prune($ocInformation = null)
    {
        if ($ocInformation) {
            $this->addUsingAlias(OcInformationTableMap::COL_INFORMATION_ID, $ocInformation->getInformationId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_information table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcInformationTableMap::clearInstancePool();
            OcInformationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcInformationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcInformationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcInformationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcInformationQuery
