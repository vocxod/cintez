<?php

namespace Base;

use \OcReturnReason as ChildOcReturnReason;
use \OcReturnReasonQuery as ChildOcReturnReasonQuery;
use \Exception;
use \PDO;
use Map\OcReturnReasonTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_return_reason' table.
 *
 *
 *
 * @method     ChildOcReturnReasonQuery orderByReturnReasonId($order = Criteria::ASC) Order by the return_reason_id column
 * @method     ChildOcReturnReasonQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcReturnReasonQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     ChildOcReturnReasonQuery groupByReturnReasonId() Group by the return_reason_id column
 * @method     ChildOcReturnReasonQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcReturnReasonQuery groupByName() Group by the name column
 *
 * @method     ChildOcReturnReasonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcReturnReasonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcReturnReasonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcReturnReasonQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcReturnReasonQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcReturnReasonQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcReturnReason findOne(ConnectionInterface $con = null) Return the first ChildOcReturnReason matching the query
 * @method     ChildOcReturnReason findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcReturnReason matching the query, or a new ChildOcReturnReason object populated from the query conditions when no match is found
 *
 * @method     ChildOcReturnReason findOneByReturnReasonId(int $return_reason_id) Return the first ChildOcReturnReason filtered by the return_reason_id column
 * @method     ChildOcReturnReason findOneByLanguageId(int $language_id) Return the first ChildOcReturnReason filtered by the language_id column
 * @method     ChildOcReturnReason findOneByName(string $name) Return the first ChildOcReturnReason filtered by the name column *

 * @method     ChildOcReturnReason requirePk($key, ConnectionInterface $con = null) Return the ChildOcReturnReason by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnReason requireOne(ConnectionInterface $con = null) Return the first ChildOcReturnReason matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcReturnReason requireOneByReturnReasonId(int $return_reason_id) Return the first ChildOcReturnReason filtered by the return_reason_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnReason requireOneByLanguageId(int $language_id) Return the first ChildOcReturnReason filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcReturnReason requireOneByName(string $name) Return the first ChildOcReturnReason filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcReturnReason[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcReturnReason objects based on current ModelCriteria
 * @method     ChildOcReturnReason[]|ObjectCollection findByReturnReasonId(int $return_reason_id) Return ChildOcReturnReason objects filtered by the return_reason_id column
 * @method     ChildOcReturnReason[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcReturnReason objects filtered by the language_id column
 * @method     ChildOcReturnReason[]|ObjectCollection findByName(string $name) Return ChildOcReturnReason objects filtered by the name column
 * @method     ChildOcReturnReason[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcReturnReasonQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcReturnReasonQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcReturnReason', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcReturnReasonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcReturnReasonQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcReturnReasonQuery) {
            return $criteria;
        }
        $query = new ChildOcReturnReasonQuery();
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
     * @param array[$return_reason_id, $language_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcReturnReason|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcReturnReasonTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcReturnReasonTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcReturnReason A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT return_reason_id, language_id, name FROM oc_return_reason WHERE return_reason_id = :p0 AND language_id = :p1';
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
            /** @var ChildOcReturnReason $obj */
            $obj = new ChildOcReturnReason();
            $obj->hydrate($row);
            OcReturnReasonTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcReturnReason|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcReturnReasonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcReturnReasonTableMap::COL_RETURN_REASON_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcReturnReasonTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcReturnReasonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcReturnReasonTableMap::COL_RETURN_REASON_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcReturnReasonTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the return_reason_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnReasonId(1234); // WHERE return_reason_id = 1234
     * $query->filterByReturnReasonId(array(12, 34)); // WHERE return_reason_id IN (12, 34)
     * $query->filterByReturnReasonId(array('min' => 12)); // WHERE return_reason_id > 12
     * </code>
     *
     * @param     mixed $returnReasonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnReasonQuery The current query, for fluid interface
     */
    public function filterByReturnReasonId($returnReasonId = null, $comparison = null)
    {
        if (is_array($returnReasonId)) {
            $useMinMax = false;
            if (isset($returnReasonId['min'])) {
                $this->addUsingAlias(OcReturnReasonTableMap::COL_RETURN_REASON_ID, $returnReasonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnReasonId['max'])) {
                $this->addUsingAlias(OcReturnReasonTableMap::COL_RETURN_REASON_ID, $returnReasonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnReasonTableMap::COL_RETURN_REASON_ID, $returnReasonId, $comparison);
    }

    /**
     * Filter the query on the language_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguageId(1234); // WHERE language_id = 1234
     * $query->filterByLanguageId(array(12, 34)); // WHERE language_id IN (12, 34)
     * $query->filterByLanguageId(array('min' => 12)); // WHERE language_id > 12
     * </code>
     *
     * @param     mixed $languageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcReturnReasonQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcReturnReasonTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcReturnReasonTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnReasonTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
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
     * @return $this|ChildOcReturnReasonQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcReturnReasonTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcReturnReason $ocReturnReason Object to remove from the list of results
     *
     * @return $this|ChildOcReturnReasonQuery The current query, for fluid interface
     */
    public function prune($ocReturnReason = null)
    {
        if ($ocReturnReason) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcReturnReasonTableMap::COL_RETURN_REASON_ID), $ocReturnReason->getReturnReasonId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcReturnReasonTableMap::COL_LANGUAGE_ID), $ocReturnReason->getLanguageId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_return_reason table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnReasonTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcReturnReasonTableMap::clearInstancePool();
            OcReturnReasonTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcReturnReasonTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcReturnReasonTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcReturnReasonTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcReturnReasonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcReturnReasonQuery
