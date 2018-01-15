<?php

namespace Base;

use \OcCategoryDescription as ChildOcCategoryDescription;
use \OcCategoryDescriptionQuery as ChildOcCategoryDescriptionQuery;
use \Exception;
use \PDO;
use Map\OcCategoryDescriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_category_description' table.
 *
 *
 *
 * @method     ChildOcCategoryDescriptionQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ChildOcCategoryDescriptionQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcCategoryDescriptionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcCategoryDescriptionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildOcCategoryDescriptionQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method     ChildOcCategoryDescriptionQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method     ChildOcCategoryDescriptionQuery orderByMetaKeyword($order = Criteria::ASC) Order by the meta_keyword column
 * @method     ChildOcCategoryDescriptionQuery orderBySidebarTitle($order = Criteria::ASC) Order by the sidebar_title column
 *
 * @method     ChildOcCategoryDescriptionQuery groupByCategoryId() Group by the category_id column
 * @method     ChildOcCategoryDescriptionQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcCategoryDescriptionQuery groupByName() Group by the name column
 * @method     ChildOcCategoryDescriptionQuery groupByDescription() Group by the description column
 * @method     ChildOcCategoryDescriptionQuery groupByMetaTitle() Group by the meta_title column
 * @method     ChildOcCategoryDescriptionQuery groupByMetaDescription() Group by the meta_description column
 * @method     ChildOcCategoryDescriptionQuery groupByMetaKeyword() Group by the meta_keyword column
 * @method     ChildOcCategoryDescriptionQuery groupBySidebarTitle() Group by the sidebar_title column
 *
 * @method     ChildOcCategoryDescriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCategoryDescriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCategoryDescriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCategoryDescriptionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCategoryDescriptionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCategoryDescriptionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCategoryDescription findOne(ConnectionInterface $con = null) Return the first ChildOcCategoryDescription matching the query
 * @method     ChildOcCategoryDescription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCategoryDescription matching the query, or a new ChildOcCategoryDescription object populated from the query conditions when no match is found
 *
 * @method     ChildOcCategoryDescription findOneByCategoryId(int $category_id) Return the first ChildOcCategoryDescription filtered by the category_id column
 * @method     ChildOcCategoryDescription findOneByLanguageId(int $language_id) Return the first ChildOcCategoryDescription filtered by the language_id column
 * @method     ChildOcCategoryDescription findOneByName(string $name) Return the first ChildOcCategoryDescription filtered by the name column
 * @method     ChildOcCategoryDescription findOneByDescription(string $description) Return the first ChildOcCategoryDescription filtered by the description column
 * @method     ChildOcCategoryDescription findOneByMetaTitle(string $meta_title) Return the first ChildOcCategoryDescription filtered by the meta_title column
 * @method     ChildOcCategoryDescription findOneByMetaDescription(string $meta_description) Return the first ChildOcCategoryDescription filtered by the meta_description column
 * @method     ChildOcCategoryDescription findOneByMetaKeyword(string $meta_keyword) Return the first ChildOcCategoryDescription filtered by the meta_keyword column
 * @method     ChildOcCategoryDescription findOneBySidebarTitle(string $sidebar_title) Return the first ChildOcCategoryDescription filtered by the sidebar_title column *

 * @method     ChildOcCategoryDescription requirePk($key, ConnectionInterface $con = null) Return the ChildOcCategoryDescription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryDescription requireOne(ConnectionInterface $con = null) Return the first ChildOcCategoryDescription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCategoryDescription requireOneByCategoryId(int $category_id) Return the first ChildOcCategoryDescription filtered by the category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryDescription requireOneByLanguageId(int $language_id) Return the first ChildOcCategoryDescription filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryDescription requireOneByName(string $name) Return the first ChildOcCategoryDescription filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryDescription requireOneByDescription(string $description) Return the first ChildOcCategoryDescription filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryDescription requireOneByMetaTitle(string $meta_title) Return the first ChildOcCategoryDescription filtered by the meta_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryDescription requireOneByMetaDescription(string $meta_description) Return the first ChildOcCategoryDescription filtered by the meta_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryDescription requireOneByMetaKeyword(string $meta_keyword) Return the first ChildOcCategoryDescription filtered by the meta_keyword column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategoryDescription requireOneBySidebarTitle(string $sidebar_title) Return the first ChildOcCategoryDescription filtered by the sidebar_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCategoryDescription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCategoryDescription objects based on current ModelCriteria
 * @method     ChildOcCategoryDescription[]|ObjectCollection findByCategoryId(int $category_id) Return ChildOcCategoryDescription objects filtered by the category_id column
 * @method     ChildOcCategoryDescription[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcCategoryDescription objects filtered by the language_id column
 * @method     ChildOcCategoryDescription[]|ObjectCollection findByName(string $name) Return ChildOcCategoryDescription objects filtered by the name column
 * @method     ChildOcCategoryDescription[]|ObjectCollection findByDescription(string $description) Return ChildOcCategoryDescription objects filtered by the description column
 * @method     ChildOcCategoryDescription[]|ObjectCollection findByMetaTitle(string $meta_title) Return ChildOcCategoryDescription objects filtered by the meta_title column
 * @method     ChildOcCategoryDescription[]|ObjectCollection findByMetaDescription(string $meta_description) Return ChildOcCategoryDescription objects filtered by the meta_description column
 * @method     ChildOcCategoryDescription[]|ObjectCollection findByMetaKeyword(string $meta_keyword) Return ChildOcCategoryDescription objects filtered by the meta_keyword column
 * @method     ChildOcCategoryDescription[]|ObjectCollection findBySidebarTitle(string $sidebar_title) Return ChildOcCategoryDescription objects filtered by the sidebar_title column
 * @method     ChildOcCategoryDescription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCategoryDescriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCategoryDescriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCategoryDescription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCategoryDescriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCategoryDescriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCategoryDescriptionQuery) {
            return $criteria;
        }
        $query = new ChildOcCategoryDescriptionQuery();
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
     * @param array[$category_id, $language_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcCategoryDescription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCategoryDescriptionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCategoryDescriptionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcCategoryDescription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT category_id, language_id, name, description, meta_title, meta_description, meta_keyword, sidebar_title FROM oc_category_description WHERE category_id = :p0 AND language_id = :p1';
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
            /** @var ChildOcCategoryDescription $obj */
            $obj = new ChildOcCategoryDescription();
            $obj->hydrate($row);
            OcCategoryDescriptionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcCategoryDescription|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_CATEGORY_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcCategoryDescriptionTableMap::COL_CATEGORY_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcCategoryDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
     * </code>
     *
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
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
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
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
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the meta_title column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaTitle('fooValue');   // WHERE meta_title = 'fooValue'
     * $query->filterByMetaTitle('%fooValue%', Criteria::LIKE); // WHERE meta_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaTitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaTitle($metaTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaTitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_META_TITLE, $metaTitle, $comparison);
    }

    /**
     * Filter the query on the meta_description column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaDescription('fooValue');   // WHERE meta_description = 'fooValue'
     * $query->filterByMetaDescription('%fooValue%', Criteria::LIKE); // WHERE meta_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaDescription The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaDescription($metaDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaDescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_META_DESCRIPTION, $metaDescription, $comparison);
    }

    /**
     * Filter the query on the meta_keyword column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaKeyword('fooValue');   // WHERE meta_keyword = 'fooValue'
     * $query->filterByMetaKeyword('%fooValue%', Criteria::LIKE); // WHERE meta_keyword LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaKeyword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaKeyword($metaKeyword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaKeyword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_META_KEYWORD, $metaKeyword, $comparison);
    }

    /**
     * Filter the query on the sidebar_title column
     *
     * Example usage:
     * <code>
     * $query->filterBySidebarTitle('fooValue');   // WHERE sidebar_title = 'fooValue'
     * $query->filterBySidebarTitle('%fooValue%', Criteria::LIKE); // WHERE sidebar_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sidebarTitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function filterBySidebarTitle($sidebarTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sidebarTitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryDescriptionTableMap::COL_SIDEBAR_TITLE, $sidebarTitle, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCategoryDescription $ocCategoryDescription Object to remove from the list of results
     *
     * @return $this|ChildOcCategoryDescriptionQuery The current query, for fluid interface
     */
    public function prune($ocCategoryDescription = null)
    {
        if ($ocCategoryDescription) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcCategoryDescriptionTableMap::COL_CATEGORY_ID), $ocCategoryDescription->getCategoryId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcCategoryDescriptionTableMap::COL_LANGUAGE_ID), $ocCategoryDescription->getLanguageId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_category_description table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCategoryDescriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCategoryDescriptionTableMap::clearInstancePool();
            OcCategoryDescriptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCategoryDescriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCategoryDescriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCategoryDescriptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCategoryDescriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCategoryDescriptionQuery
