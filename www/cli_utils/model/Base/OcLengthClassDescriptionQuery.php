<?php

namespace Base;

use \OcLengthClassDescription as ChildOcLengthClassDescription;
use \OcLengthClassDescriptionQuery as ChildOcLengthClassDescriptionQuery;
use \Exception;
use \PDO;
use Map\OcLengthClassDescriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_length_class_description' table.
 *
 *
 *
 * @method     ChildOcLengthClassDescriptionQuery orderByLengthClassId($order = Criteria::ASC) Order by the length_class_id column
 * @method     ChildOcLengthClassDescriptionQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcLengthClassDescriptionQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildOcLengthClassDescriptionQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 *
 * @method     ChildOcLengthClassDescriptionQuery groupByLengthClassId() Group by the length_class_id column
 * @method     ChildOcLengthClassDescriptionQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcLengthClassDescriptionQuery groupByTitle() Group by the title column
 * @method     ChildOcLengthClassDescriptionQuery groupByUnit() Group by the unit column
 *
 * @method     ChildOcLengthClassDescriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcLengthClassDescriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcLengthClassDescriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcLengthClassDescriptionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcLengthClassDescriptionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcLengthClassDescriptionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcLengthClassDescription findOne(ConnectionInterface $con = null) Return the first ChildOcLengthClassDescription matching the query
 * @method     ChildOcLengthClassDescription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcLengthClassDescription matching the query, or a new ChildOcLengthClassDescription object populated from the query conditions when no match is found
 *
 * @method     ChildOcLengthClassDescription findOneByLengthClassId(int $length_class_id) Return the first ChildOcLengthClassDescription filtered by the length_class_id column
 * @method     ChildOcLengthClassDescription findOneByLanguageId(int $language_id) Return the first ChildOcLengthClassDescription filtered by the language_id column
 * @method     ChildOcLengthClassDescription findOneByTitle(string $title) Return the first ChildOcLengthClassDescription filtered by the title column
 * @method     ChildOcLengthClassDescription findOneByUnit(string $unit) Return the first ChildOcLengthClassDescription filtered by the unit column *

 * @method     ChildOcLengthClassDescription requirePk($key, ConnectionInterface $con = null) Return the ChildOcLengthClassDescription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLengthClassDescription requireOne(ConnectionInterface $con = null) Return the first ChildOcLengthClassDescription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLengthClassDescription requireOneByLengthClassId(int $length_class_id) Return the first ChildOcLengthClassDescription filtered by the length_class_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLengthClassDescription requireOneByLanguageId(int $language_id) Return the first ChildOcLengthClassDescription filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLengthClassDescription requireOneByTitle(string $title) Return the first ChildOcLengthClassDescription filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLengthClassDescription requireOneByUnit(string $unit) Return the first ChildOcLengthClassDescription filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLengthClassDescription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcLengthClassDescription objects based on current ModelCriteria
 * @method     ChildOcLengthClassDescription[]|ObjectCollection findByLengthClassId(int $length_class_id) Return ChildOcLengthClassDescription objects filtered by the length_class_id column
 * @method     ChildOcLengthClassDescription[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcLengthClassDescription objects filtered by the language_id column
 * @method     ChildOcLengthClassDescription[]|ObjectCollection findByTitle(string $title) Return ChildOcLengthClassDescription objects filtered by the title column
 * @method     ChildOcLengthClassDescription[]|ObjectCollection findByUnit(string $unit) Return ChildOcLengthClassDescription objects filtered by the unit column
 * @method     ChildOcLengthClassDescription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcLengthClassDescriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcLengthClassDescriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcLengthClassDescription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcLengthClassDescriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcLengthClassDescriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcLengthClassDescriptionQuery) {
            return $criteria;
        }
        $query = new ChildOcLengthClassDescriptionQuery();
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
     * @param array[$length_class_id, $language_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcLengthClassDescription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcLengthClassDescriptionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcLengthClassDescriptionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcLengthClassDescription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT length_class_id, language_id, title, unit FROM oc_length_class_description WHERE length_class_id = :p0 AND language_id = :p1';
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
            /** @var ChildOcLengthClassDescription $obj */
            $obj = new ChildOcLengthClassDescription();
            $obj->hydrate($row);
            OcLengthClassDescriptionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcLengthClassDescription|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcLengthClassDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_LENGTH_CLASS_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcLengthClassDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcLengthClassDescriptionTableMap::COL_LENGTH_CLASS_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcLengthClassDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildOcLengthClassDescriptionQuery The current query, for fluid interface
     */
    public function filterByLengthClassId($lengthClassId = null, $comparison = null)
    {
        if (is_array($lengthClassId)) {
            $useMinMax = false;
            if (isset($lengthClassId['min'])) {
                $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_LENGTH_CLASS_ID, $lengthClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lengthClassId['max'])) {
                $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_LENGTH_CLASS_ID, $lengthClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_LENGTH_CLASS_ID, $lengthClassId, $comparison);
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
     * @return $this|ChildOcLengthClassDescriptionQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLengthClassDescriptionQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the unit column
     *
     * Example usage:
     * <code>
     * $query->filterByUnit('fooValue');   // WHERE unit = 'fooValue'
     * $query->filterByUnit('%fooValue%', Criteria::LIKE); // WHERE unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLengthClassDescriptionQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLengthClassDescriptionTableMap::COL_UNIT, $unit, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcLengthClassDescription $ocLengthClassDescription Object to remove from the list of results
     *
     * @return $this|ChildOcLengthClassDescriptionQuery The current query, for fluid interface
     */
    public function prune($ocLengthClassDescription = null)
    {
        if ($ocLengthClassDescription) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcLengthClassDescriptionTableMap::COL_LENGTH_CLASS_ID), $ocLengthClassDescription->getLengthClassId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcLengthClassDescriptionTableMap::COL_LANGUAGE_ID), $ocLengthClassDescription->getLanguageId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_length_class_description table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcLengthClassDescriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcLengthClassDescriptionTableMap::clearInstancePool();
            OcLengthClassDescriptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcLengthClassDescriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcLengthClassDescriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcLengthClassDescriptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcLengthClassDescriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcLengthClassDescriptionQuery
