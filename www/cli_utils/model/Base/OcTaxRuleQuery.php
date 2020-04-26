<?php

namespace Base;

use \OcTaxRule as ChildOcTaxRule;
use \OcTaxRuleQuery as ChildOcTaxRuleQuery;
use \Exception;
use \PDO;
use Map\OcTaxRuleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_tax_rule' table.
 *
 *
 *
 * @method     ChildOcTaxRuleQuery orderByTaxRuleId($order = Criteria::ASC) Order by the tax_rule_id column
 * @method     ChildOcTaxRuleQuery orderByTaxClassId($order = Criteria::ASC) Order by the tax_class_id column
 * @method     ChildOcTaxRuleQuery orderByTaxRateId($order = Criteria::ASC) Order by the tax_rate_id column
 * @method     ChildOcTaxRuleQuery orderByBased($order = Criteria::ASC) Order by the based column
 * @method     ChildOcTaxRuleQuery orderByPriority($order = Criteria::ASC) Order by the priority column
 *
 * @method     ChildOcTaxRuleQuery groupByTaxRuleId() Group by the tax_rule_id column
 * @method     ChildOcTaxRuleQuery groupByTaxClassId() Group by the tax_class_id column
 * @method     ChildOcTaxRuleQuery groupByTaxRateId() Group by the tax_rate_id column
 * @method     ChildOcTaxRuleQuery groupByBased() Group by the based column
 * @method     ChildOcTaxRuleQuery groupByPriority() Group by the priority column
 *
 * @method     ChildOcTaxRuleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcTaxRuleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcTaxRuleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcTaxRuleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcTaxRuleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcTaxRuleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcTaxRule findOne(ConnectionInterface $con = null) Return the first ChildOcTaxRule matching the query
 * @method     ChildOcTaxRule findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcTaxRule matching the query, or a new ChildOcTaxRule object populated from the query conditions when no match is found
 *
 * @method     ChildOcTaxRule findOneByTaxRuleId(int $tax_rule_id) Return the first ChildOcTaxRule filtered by the tax_rule_id column
 * @method     ChildOcTaxRule findOneByTaxClassId(int $tax_class_id) Return the first ChildOcTaxRule filtered by the tax_class_id column
 * @method     ChildOcTaxRule findOneByTaxRateId(int $tax_rate_id) Return the first ChildOcTaxRule filtered by the tax_rate_id column
 * @method     ChildOcTaxRule findOneByBased(string $based) Return the first ChildOcTaxRule filtered by the based column
 * @method     ChildOcTaxRule findOneByPriority(int $priority) Return the first ChildOcTaxRule filtered by the priority column *

 * @method     ChildOcTaxRule requirePk($key, ConnectionInterface $con = null) Return the ChildOcTaxRule by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRule requireOne(ConnectionInterface $con = null) Return the first ChildOcTaxRule matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcTaxRule requireOneByTaxRuleId(int $tax_rule_id) Return the first ChildOcTaxRule filtered by the tax_rule_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRule requireOneByTaxClassId(int $tax_class_id) Return the first ChildOcTaxRule filtered by the tax_class_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRule requireOneByTaxRateId(int $tax_rate_id) Return the first ChildOcTaxRule filtered by the tax_rate_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRule requireOneByBased(string $based) Return the first ChildOcTaxRule filtered by the based column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRule requireOneByPriority(int $priority) Return the first ChildOcTaxRule filtered by the priority column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcTaxRule[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcTaxRule objects based on current ModelCriteria
 * @method     ChildOcTaxRule[]|ObjectCollection findByTaxRuleId(int $tax_rule_id) Return ChildOcTaxRule objects filtered by the tax_rule_id column
 * @method     ChildOcTaxRule[]|ObjectCollection findByTaxClassId(int $tax_class_id) Return ChildOcTaxRule objects filtered by the tax_class_id column
 * @method     ChildOcTaxRule[]|ObjectCollection findByTaxRateId(int $tax_rate_id) Return ChildOcTaxRule objects filtered by the tax_rate_id column
 * @method     ChildOcTaxRule[]|ObjectCollection findByBased(string $based) Return ChildOcTaxRule objects filtered by the based column
 * @method     ChildOcTaxRule[]|ObjectCollection findByPriority(int $priority) Return ChildOcTaxRule objects filtered by the priority column
 * @method     ChildOcTaxRule[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcTaxRuleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcTaxRuleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcTaxRule', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcTaxRuleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcTaxRuleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcTaxRuleQuery) {
            return $criteria;
        }
        $query = new ChildOcTaxRuleQuery();
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
     * @return ChildOcTaxRule|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcTaxRuleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcTaxRuleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcTaxRule A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tax_rule_id, tax_class_id, tax_rate_id, based, priority FROM oc_tax_rule WHERE tax_rule_id = :p0';
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
            /** @var ChildOcTaxRule $obj */
            $obj = new ChildOcTaxRule();
            $obj->hydrate($row);
            OcTaxRuleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcTaxRule|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcTaxRuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RULE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcTaxRuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RULE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tax_rule_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxRuleId(1234); // WHERE tax_rule_id = 1234
     * $query->filterByTaxRuleId(array(12, 34)); // WHERE tax_rule_id IN (12, 34)
     * $query->filterByTaxRuleId(array('min' => 12)); // WHERE tax_rule_id > 12
     * </code>
     *
     * @param     mixed $taxRuleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRuleQuery The current query, for fluid interface
     */
    public function filterByTaxRuleId($taxRuleId = null, $comparison = null)
    {
        if (is_array($taxRuleId)) {
            $useMinMax = false;
            if (isset($taxRuleId['min'])) {
                $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RULE_ID, $taxRuleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxRuleId['max'])) {
                $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RULE_ID, $taxRuleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RULE_ID, $taxRuleId, $comparison);
    }

    /**
     * Filter the query on the tax_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxClassId(1234); // WHERE tax_class_id = 1234
     * $query->filterByTaxClassId(array(12, 34)); // WHERE tax_class_id IN (12, 34)
     * $query->filterByTaxClassId(array('min' => 12)); // WHERE tax_class_id > 12
     * </code>
     *
     * @param     mixed $taxClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRuleQuery The current query, for fluid interface
     */
    public function filterByTaxClassId($taxClassId = null, $comparison = null)
    {
        if (is_array($taxClassId)) {
            $useMinMax = false;
            if (isset($taxClassId['min'])) {
                $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_CLASS_ID, $taxClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxClassId['max'])) {
                $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_CLASS_ID, $taxClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_CLASS_ID, $taxClassId, $comparison);
    }

    /**
     * Filter the query on the tax_rate_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxRateId(1234); // WHERE tax_rate_id = 1234
     * $query->filterByTaxRateId(array(12, 34)); // WHERE tax_rate_id IN (12, 34)
     * $query->filterByTaxRateId(array('min' => 12)); // WHERE tax_rate_id > 12
     * </code>
     *
     * @param     mixed $taxRateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRuleQuery The current query, for fluid interface
     */
    public function filterByTaxRateId($taxRateId = null, $comparison = null)
    {
        if (is_array($taxRateId)) {
            $useMinMax = false;
            if (isset($taxRateId['min'])) {
                $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RATE_ID, $taxRateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxRateId['max'])) {
                $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RATE_ID, $taxRateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RATE_ID, $taxRateId, $comparison);
    }

    /**
     * Filter the query on the based column
     *
     * Example usage:
     * <code>
     * $query->filterByBased('fooValue');   // WHERE based = 'fooValue'
     * $query->filterByBased('%fooValue%', Criteria::LIKE); // WHERE based LIKE '%fooValue%'
     * </code>
     *
     * @param     string $based The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRuleQuery The current query, for fluid interface
     */
    public function filterByBased($based = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($based)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRuleTableMap::COL_BASED, $based, $comparison);
    }

    /**
     * Filter the query on the priority column
     *
     * Example usage:
     * <code>
     * $query->filterByPriority(1234); // WHERE priority = 1234
     * $query->filterByPriority(array(12, 34)); // WHERE priority IN (12, 34)
     * $query->filterByPriority(array('min' => 12)); // WHERE priority > 12
     * </code>
     *
     * @param     mixed $priority The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRuleQuery The current query, for fluid interface
     */
    public function filterByPriority($priority = null, $comparison = null)
    {
        if (is_array($priority)) {
            $useMinMax = false;
            if (isset($priority['min'])) {
                $this->addUsingAlias(OcTaxRuleTableMap::COL_PRIORITY, $priority['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priority['max'])) {
                $this->addUsingAlias(OcTaxRuleTableMap::COL_PRIORITY, $priority['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRuleTableMap::COL_PRIORITY, $priority, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcTaxRule $ocTaxRule Object to remove from the list of results
     *
     * @return $this|ChildOcTaxRuleQuery The current query, for fluid interface
     */
    public function prune($ocTaxRule = null)
    {
        if ($ocTaxRule) {
            $this->addUsingAlias(OcTaxRuleTableMap::COL_TAX_RULE_ID, $ocTaxRule->getTaxRuleId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_tax_rule table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcTaxRuleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcTaxRuleTableMap::clearInstancePool();
            OcTaxRuleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcTaxRuleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcTaxRuleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcTaxRuleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcTaxRuleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcTaxRuleQuery
