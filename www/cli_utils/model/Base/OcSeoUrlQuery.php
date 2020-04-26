<?php

namespace Base;

use \OcSeoUrl as ChildOcSeoUrl;
use \OcSeoUrlQuery as ChildOcSeoUrlQuery;
use \Exception;
use \PDO;
use Map\OcSeoUrlTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_seo_url' table.
 *
 *
 *
 * @method     ChildOcSeoUrlQuery orderBySeoUrlId($order = Criteria::ASC) Order by the seo_url_id column
 * @method     ChildOcSeoUrlQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildOcSeoUrlQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcSeoUrlQuery orderByQuery($order = Criteria::ASC) Order by the query column
 * @method     ChildOcSeoUrlQuery orderByKeyword($order = Criteria::ASC) Order by the keyword column
 *
 * @method     ChildOcSeoUrlQuery groupBySeoUrlId() Group by the seo_url_id column
 * @method     ChildOcSeoUrlQuery groupByStoreId() Group by the store_id column
 * @method     ChildOcSeoUrlQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcSeoUrlQuery groupByQuery() Group by the query column
 * @method     ChildOcSeoUrlQuery groupByKeyword() Group by the keyword column
 *
 * @method     ChildOcSeoUrlQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcSeoUrlQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcSeoUrlQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcSeoUrlQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcSeoUrlQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcSeoUrlQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcSeoUrl findOne(ConnectionInterface $con = null) Return the first ChildOcSeoUrl matching the query
 * @method     ChildOcSeoUrl findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcSeoUrl matching the query, or a new ChildOcSeoUrl object populated from the query conditions when no match is found
 *
 * @method     ChildOcSeoUrl findOneBySeoUrlId(int $seo_url_id) Return the first ChildOcSeoUrl filtered by the seo_url_id column
 * @method     ChildOcSeoUrl findOneByStoreId(int $store_id) Return the first ChildOcSeoUrl filtered by the store_id column
 * @method     ChildOcSeoUrl findOneByLanguageId(int $language_id) Return the first ChildOcSeoUrl filtered by the language_id column
 * @method     ChildOcSeoUrl findOneByQuery(string $query) Return the first ChildOcSeoUrl filtered by the query column
 * @method     ChildOcSeoUrl findOneByKeyword(string $keyword) Return the first ChildOcSeoUrl filtered by the keyword column *

 * @method     ChildOcSeoUrl requirePk($key, ConnectionInterface $con = null) Return the ChildOcSeoUrl by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcSeoUrl requireOne(ConnectionInterface $con = null) Return the first ChildOcSeoUrl matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcSeoUrl requireOneBySeoUrlId(int $seo_url_id) Return the first ChildOcSeoUrl filtered by the seo_url_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcSeoUrl requireOneByStoreId(int $store_id) Return the first ChildOcSeoUrl filtered by the store_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcSeoUrl requireOneByLanguageId(int $language_id) Return the first ChildOcSeoUrl filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcSeoUrl requireOneByQuery(string $query) Return the first ChildOcSeoUrl filtered by the query column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcSeoUrl requireOneByKeyword(string $keyword) Return the first ChildOcSeoUrl filtered by the keyword column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcSeoUrl[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcSeoUrl objects based on current ModelCriteria
 * @method     ChildOcSeoUrl[]|ObjectCollection findBySeoUrlId(int $seo_url_id) Return ChildOcSeoUrl objects filtered by the seo_url_id column
 * @method     ChildOcSeoUrl[]|ObjectCollection findByStoreId(int $store_id) Return ChildOcSeoUrl objects filtered by the store_id column
 * @method     ChildOcSeoUrl[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcSeoUrl objects filtered by the language_id column
 * @method     ChildOcSeoUrl[]|ObjectCollection findByQuery(string $query) Return ChildOcSeoUrl objects filtered by the query column
 * @method     ChildOcSeoUrl[]|ObjectCollection findByKeyword(string $keyword) Return ChildOcSeoUrl objects filtered by the keyword column
 * @method     ChildOcSeoUrl[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcSeoUrlQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcSeoUrlQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcSeoUrl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcSeoUrlQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcSeoUrlQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcSeoUrlQuery) {
            return $criteria;
        }
        $query = new ChildOcSeoUrlQuery();
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
     * @return ChildOcSeoUrl|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcSeoUrlTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcSeoUrlTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcSeoUrl A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT seo_url_id, store_id, language_id, query, keyword FROM oc_seo_url WHERE seo_url_id = :p0';
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
            /** @var ChildOcSeoUrl $obj */
            $obj = new ChildOcSeoUrl();
            $obj->hydrate($row);
            OcSeoUrlTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcSeoUrl|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcSeoUrlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcSeoUrlTableMap::COL_SEO_URL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcSeoUrlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcSeoUrlTableMap::COL_SEO_URL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the seo_url_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySeoUrlId(1234); // WHERE seo_url_id = 1234
     * $query->filterBySeoUrlId(array(12, 34)); // WHERE seo_url_id IN (12, 34)
     * $query->filterBySeoUrlId(array('min' => 12)); // WHERE seo_url_id > 12
     * </code>
     *
     * @param     mixed $seoUrlId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcSeoUrlQuery The current query, for fluid interface
     */
    public function filterBySeoUrlId($seoUrlId = null, $comparison = null)
    {
        if (is_array($seoUrlId)) {
            $useMinMax = false;
            if (isset($seoUrlId['min'])) {
                $this->addUsingAlias(OcSeoUrlTableMap::COL_SEO_URL_ID, $seoUrlId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seoUrlId['max'])) {
                $this->addUsingAlias(OcSeoUrlTableMap::COL_SEO_URL_ID, $seoUrlId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcSeoUrlTableMap::COL_SEO_URL_ID, $seoUrlId, $comparison);
    }

    /**
     * Filter the query on the store_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreId(1234); // WHERE store_id = 1234
     * $query->filterByStoreId(array(12, 34)); // WHERE store_id IN (12, 34)
     * $query->filterByStoreId(array('min' => 12)); // WHERE store_id > 12
     * </code>
     *
     * @param     mixed $storeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcSeoUrlQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(OcSeoUrlTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(OcSeoUrlTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcSeoUrlTableMap::COL_STORE_ID, $storeId, $comparison);
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
     * @return $this|ChildOcSeoUrlQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcSeoUrlTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcSeoUrlTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcSeoUrlTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
    }

    /**
     * Filter the query on the query column
     *
     * Example usage:
     * <code>
     * $query->filterByQuery('fooValue');   // WHERE query = 'fooValue'
     * $query->filterByQuery('%fooValue%', Criteria::LIKE); // WHERE query LIKE '%fooValue%'
     * </code>
     *
     * @param     string $query The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcSeoUrlQuery The current query, for fluid interface
     */
    public function filterByQuery($query = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($query)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcSeoUrlTableMap::COL_QUERY, $query, $comparison);
    }

    /**
     * Filter the query on the keyword column
     *
     * Example usage:
     * <code>
     * $query->filterByKeyword('fooValue');   // WHERE keyword = 'fooValue'
     * $query->filterByKeyword('%fooValue%', Criteria::LIKE); // WHERE keyword LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keyword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcSeoUrlQuery The current query, for fluid interface
     */
    public function filterByKeyword($keyword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keyword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcSeoUrlTableMap::COL_KEYWORD, $keyword, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcSeoUrl $ocSeoUrl Object to remove from the list of results
     *
     * @return $this|ChildOcSeoUrlQuery The current query, for fluid interface
     */
    public function prune($ocSeoUrl = null)
    {
        if ($ocSeoUrl) {
            $this->addUsingAlias(OcSeoUrlTableMap::COL_SEO_URL_ID, $ocSeoUrl->getSeoUrlId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_seo_url table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcSeoUrlTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcSeoUrlTableMap::clearInstancePool();
            OcSeoUrlTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcSeoUrlTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcSeoUrlTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcSeoUrlTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcSeoUrlTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcSeoUrlQuery
