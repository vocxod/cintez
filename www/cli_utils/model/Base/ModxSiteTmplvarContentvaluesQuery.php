<?php

namespace Base;

use \ModxSiteTmplvarContentvalues as ChildModxSiteTmplvarContentvalues;
use \ModxSiteTmplvarContentvaluesQuery as ChildModxSiteTmplvarContentvaluesQuery;
use \Exception;
use \PDO;
use Map\ModxSiteTmplvarContentvaluesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'modx_site_tmplvar_contentvalues' table.
 *
 *
 *
 * @method     ChildModxSiteTmplvarContentvaluesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildModxSiteTmplvarContentvaluesQuery orderByTmplvarid($order = Criteria::ASC) Order by the tmplvarid column
 * @method     ChildModxSiteTmplvarContentvaluesQuery orderByContentid($order = Criteria::ASC) Order by the contentid column
 * @method     ChildModxSiteTmplvarContentvaluesQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     ChildModxSiteTmplvarContentvaluesQuery groupById() Group by the id column
 * @method     ChildModxSiteTmplvarContentvaluesQuery groupByTmplvarid() Group by the tmplvarid column
 * @method     ChildModxSiteTmplvarContentvaluesQuery groupByContentid() Group by the contentid column
 * @method     ChildModxSiteTmplvarContentvaluesQuery groupByValue() Group by the value column
 *
 * @method     ChildModxSiteTmplvarContentvaluesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildModxSiteTmplvarContentvaluesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildModxSiteTmplvarContentvaluesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildModxSiteTmplvarContentvaluesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildModxSiteTmplvarContentvaluesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildModxSiteTmplvarContentvaluesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildModxSiteTmplvarContentvalues findOne(ConnectionInterface $con = null) Return the first ChildModxSiteTmplvarContentvalues matching the query
 * @method     ChildModxSiteTmplvarContentvalues findOneOrCreate(ConnectionInterface $con = null) Return the first ChildModxSiteTmplvarContentvalues matching the query, or a new ChildModxSiteTmplvarContentvalues object populated from the query conditions when no match is found
 *
 * @method     ChildModxSiteTmplvarContentvalues findOneById(int $id) Return the first ChildModxSiteTmplvarContentvalues filtered by the id column
 * @method     ChildModxSiteTmplvarContentvalues findOneByTmplvarid(int $tmplvarid) Return the first ChildModxSiteTmplvarContentvalues filtered by the tmplvarid column
 * @method     ChildModxSiteTmplvarContentvalues findOneByContentid(int $contentid) Return the first ChildModxSiteTmplvarContentvalues filtered by the contentid column
 * @method     ChildModxSiteTmplvarContentvalues findOneByValue(string $value) Return the first ChildModxSiteTmplvarContentvalues filtered by the value column *

 * @method     ChildModxSiteTmplvarContentvalues requirePk($key, ConnectionInterface $con = null) Return the ChildModxSiteTmplvarContentvalues by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteTmplvarContentvalues requireOne(ConnectionInterface $con = null) Return the first ChildModxSiteTmplvarContentvalues matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildModxSiteTmplvarContentvalues requireOneById(int $id) Return the first ChildModxSiteTmplvarContentvalues filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteTmplvarContentvalues requireOneByTmplvarid(int $tmplvarid) Return the first ChildModxSiteTmplvarContentvalues filtered by the tmplvarid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteTmplvarContentvalues requireOneByContentid(int $contentid) Return the first ChildModxSiteTmplvarContentvalues filtered by the contentid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteTmplvarContentvalues requireOneByValue(string $value) Return the first ChildModxSiteTmplvarContentvalues filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildModxSiteTmplvarContentvalues[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildModxSiteTmplvarContentvalues objects based on current ModelCriteria
 * @method     ChildModxSiteTmplvarContentvalues[]|ObjectCollection findById(int $id) Return ChildModxSiteTmplvarContentvalues objects filtered by the id column
 * @method     ChildModxSiteTmplvarContentvalues[]|ObjectCollection findByTmplvarid(int $tmplvarid) Return ChildModxSiteTmplvarContentvalues objects filtered by the tmplvarid column
 * @method     ChildModxSiteTmplvarContentvalues[]|ObjectCollection findByContentid(int $contentid) Return ChildModxSiteTmplvarContentvalues objects filtered by the contentid column
 * @method     ChildModxSiteTmplvarContentvalues[]|ObjectCollection findByValue(string $value) Return ChildModxSiteTmplvarContentvalues objects filtered by the value column
 * @method     ChildModxSiteTmplvarContentvalues[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ModxSiteTmplvarContentvaluesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ModxSiteTmplvarContentvaluesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ModxSiteTmplvarContentvalues', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildModxSiteTmplvarContentvaluesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildModxSiteTmplvarContentvaluesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildModxSiteTmplvarContentvaluesQuery) {
            return $criteria;
        }
        $query = new ChildModxSiteTmplvarContentvaluesQuery();
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
     * @return ChildModxSiteTmplvarContentvalues|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ModxSiteTmplvarContentvaluesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ModxSiteTmplvarContentvaluesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildModxSiteTmplvarContentvalues A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tmplvarid, contentid, value FROM modx_site_tmplvar_contentvalues WHERE id = :p0';
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
            /** @var ChildModxSiteTmplvarContentvalues $obj */
            $obj = new ChildModxSiteTmplvarContentvalues();
            $obj->hydrate($row);
            ModxSiteTmplvarContentvaluesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildModxSiteTmplvarContentvalues|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildModxSiteTmplvarContentvaluesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildModxSiteTmplvarContentvaluesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteTmplvarContentvaluesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the tmplvarid column
     *
     * Example usage:
     * <code>
     * $query->filterByTmplvarid(1234); // WHERE tmplvarid = 1234
     * $query->filterByTmplvarid(array(12, 34)); // WHERE tmplvarid IN (12, 34)
     * $query->filterByTmplvarid(array('min' => 12)); // WHERE tmplvarid > 12
     * </code>
     *
     * @param     mixed $tmplvarid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteTmplvarContentvaluesQuery The current query, for fluid interface
     */
    public function filterByTmplvarid($tmplvarid = null, $comparison = null)
    {
        if (is_array($tmplvarid)) {
            $useMinMax = false;
            if (isset($tmplvarid['min'])) {
                $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_TMPLVARID, $tmplvarid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmplvarid['max'])) {
                $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_TMPLVARID, $tmplvarid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_TMPLVARID, $tmplvarid, $comparison);
    }

    /**
     * Filter the query on the contentid column
     *
     * Example usage:
     * <code>
     * $query->filterByContentid(1234); // WHERE contentid = 1234
     * $query->filterByContentid(array(12, 34)); // WHERE contentid IN (12, 34)
     * $query->filterByContentid(array('min' => 12)); // WHERE contentid > 12
     * </code>
     *
     * @param     mixed $contentid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteTmplvarContentvaluesQuery The current query, for fluid interface
     */
    public function filterByContentid($contentid = null, $comparison = null)
    {
        if (is_array($contentid)) {
            $useMinMax = false;
            if (isset($contentid['min'])) {
                $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_CONTENTID, $contentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contentid['max'])) {
                $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_CONTENTID, $contentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_CONTENTID, $contentid, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%', Criteria::LIKE); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteTmplvarContentvaluesQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildModxSiteTmplvarContentvalues $modxSiteTmplvarContentvalues Object to remove from the list of results
     *
     * @return $this|ChildModxSiteTmplvarContentvaluesQuery The current query, for fluid interface
     */
    public function prune($modxSiteTmplvarContentvalues = null)
    {
        if ($modxSiteTmplvarContentvalues) {
            $this->addUsingAlias(ModxSiteTmplvarContentvaluesTableMap::COL_ID, $modxSiteTmplvarContentvalues->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the modx_site_tmplvar_contentvalues table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ModxSiteTmplvarContentvaluesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ModxSiteTmplvarContentvaluesTableMap::clearInstancePool();
            ModxSiteTmplvarContentvaluesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ModxSiteTmplvarContentvaluesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ModxSiteTmplvarContentvaluesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ModxSiteTmplvarContentvaluesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ModxSiteTmplvarContentvaluesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ModxSiteTmplvarContentvaluesQuery
