<?php

namespace Base;

use \OcDownloadDescription as ChildOcDownloadDescription;
use \OcDownloadDescriptionQuery as ChildOcDownloadDescriptionQuery;
use \Exception;
use \PDO;
use Map\OcDownloadDescriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_download_description' table.
 *
 *
 *
 * @method     ChildOcDownloadDescriptionQuery orderByDownloadId($order = Criteria::ASC) Order by the download_id column
 * @method     ChildOcDownloadDescriptionQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcDownloadDescriptionQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     ChildOcDownloadDescriptionQuery groupByDownloadId() Group by the download_id column
 * @method     ChildOcDownloadDescriptionQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcDownloadDescriptionQuery groupByName() Group by the name column
 *
 * @method     ChildOcDownloadDescriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcDownloadDescriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcDownloadDescriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcDownloadDescriptionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcDownloadDescriptionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcDownloadDescriptionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcDownloadDescription findOne(ConnectionInterface $con = null) Return the first ChildOcDownloadDescription matching the query
 * @method     ChildOcDownloadDescription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcDownloadDescription matching the query, or a new ChildOcDownloadDescription object populated from the query conditions when no match is found
 *
 * @method     ChildOcDownloadDescription findOneByDownloadId(int $download_id) Return the first ChildOcDownloadDescription filtered by the download_id column
 * @method     ChildOcDownloadDescription findOneByLanguageId(int $language_id) Return the first ChildOcDownloadDescription filtered by the language_id column
 * @method     ChildOcDownloadDescription findOneByName(string $name) Return the first ChildOcDownloadDescription filtered by the name column *

 * @method     ChildOcDownloadDescription requirePk($key, ConnectionInterface $con = null) Return the ChildOcDownloadDescription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcDownloadDescription requireOne(ConnectionInterface $con = null) Return the first ChildOcDownloadDescription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcDownloadDescription requireOneByDownloadId(int $download_id) Return the first ChildOcDownloadDescription filtered by the download_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcDownloadDescription requireOneByLanguageId(int $language_id) Return the first ChildOcDownloadDescription filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcDownloadDescription requireOneByName(string $name) Return the first ChildOcDownloadDescription filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcDownloadDescription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcDownloadDescription objects based on current ModelCriteria
 * @method     ChildOcDownloadDescription[]|ObjectCollection findByDownloadId(int $download_id) Return ChildOcDownloadDescription objects filtered by the download_id column
 * @method     ChildOcDownloadDescription[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcDownloadDescription objects filtered by the language_id column
 * @method     ChildOcDownloadDescription[]|ObjectCollection findByName(string $name) Return ChildOcDownloadDescription objects filtered by the name column
 * @method     ChildOcDownloadDescription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcDownloadDescriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcDownloadDescriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcDownloadDescription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcDownloadDescriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcDownloadDescriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcDownloadDescriptionQuery) {
            return $criteria;
        }
        $query = new ChildOcDownloadDescriptionQuery();
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
     * @param array[$download_id, $language_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcDownloadDescription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcDownloadDescriptionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcDownloadDescriptionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcDownloadDescription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT download_id, language_id, name FROM oc_download_description WHERE download_id = :p0 AND language_id = :p1';
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
            /** @var ChildOcDownloadDescription $obj */
            $obj = new ChildOcDownloadDescription();
            $obj->hydrate($row);
            OcDownloadDescriptionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcDownloadDescription|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcDownloadDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_DOWNLOAD_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcDownloadDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcDownloadDescriptionTableMap::COL_DOWNLOAD_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcDownloadDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the download_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDownloadId(1234); // WHERE download_id = 1234
     * $query->filterByDownloadId(array(12, 34)); // WHERE download_id IN (12, 34)
     * $query->filterByDownloadId(array('min' => 12)); // WHERE download_id > 12
     * </code>
     *
     * @param     mixed $downloadId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcDownloadDescriptionQuery The current query, for fluid interface
     */
    public function filterByDownloadId($downloadId = null, $comparison = null)
    {
        if (is_array($downloadId)) {
            $useMinMax = false;
            if (isset($downloadId['min'])) {
                $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_DOWNLOAD_ID, $downloadId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($downloadId['max'])) {
                $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_DOWNLOAD_ID, $downloadId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_DOWNLOAD_ID, $downloadId, $comparison);
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
     * @return $this|ChildOcDownloadDescriptionQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
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
     * @return $this|ChildOcDownloadDescriptionQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcDownloadDescriptionTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcDownloadDescription $ocDownloadDescription Object to remove from the list of results
     *
     * @return $this|ChildOcDownloadDescriptionQuery The current query, for fluid interface
     */
    public function prune($ocDownloadDescription = null)
    {
        if ($ocDownloadDescription) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcDownloadDescriptionTableMap::COL_DOWNLOAD_ID), $ocDownloadDescription->getDownloadId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcDownloadDescriptionTableMap::COL_LANGUAGE_ID), $ocDownloadDescription->getLanguageId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_download_description table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcDownloadDescriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcDownloadDescriptionTableMap::clearInstancePool();
            OcDownloadDescriptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcDownloadDescriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcDownloadDescriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcDownloadDescriptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcDownloadDescriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcDownloadDescriptionQuery
