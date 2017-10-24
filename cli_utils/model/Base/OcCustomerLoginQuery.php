<?php

namespace Base;

use \OcCustomerLogin as ChildOcCustomerLogin;
use \OcCustomerLoginQuery as ChildOcCustomerLoginQuery;
use \Exception;
use \PDO;
use Map\OcCustomerLoginTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_customer_login' table.
 *
 *
 *
 * @method     ChildOcCustomerLoginQuery orderByCustomerLoginId($order = Criteria::ASC) Order by the customer_login_id column
 * @method     ChildOcCustomerLoginQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildOcCustomerLoginQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildOcCustomerLoginQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildOcCustomerLoginQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcCustomerLoginQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 *
 * @method     ChildOcCustomerLoginQuery groupByCustomerLoginId() Group by the customer_login_id column
 * @method     ChildOcCustomerLoginQuery groupByEmail() Group by the email column
 * @method     ChildOcCustomerLoginQuery groupByIp() Group by the ip column
 * @method     ChildOcCustomerLoginQuery groupByTotal() Group by the total column
 * @method     ChildOcCustomerLoginQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcCustomerLoginQuery groupByDateModified() Group by the date_modified column
 *
 * @method     ChildOcCustomerLoginQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomerLoginQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomerLoginQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomerLoginQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomerLoginQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomerLoginQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomerLogin findOne(ConnectionInterface $con = null) Return the first ChildOcCustomerLogin matching the query
 * @method     ChildOcCustomerLogin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomerLogin matching the query, or a new ChildOcCustomerLogin object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomerLogin findOneByCustomerLoginId(int $customer_login_id) Return the first ChildOcCustomerLogin filtered by the customer_login_id column
 * @method     ChildOcCustomerLogin findOneByEmail(string $email) Return the first ChildOcCustomerLogin filtered by the email column
 * @method     ChildOcCustomerLogin findOneByIp(string $ip) Return the first ChildOcCustomerLogin filtered by the ip column
 * @method     ChildOcCustomerLogin findOneByTotal(int $total) Return the first ChildOcCustomerLogin filtered by the total column
 * @method     ChildOcCustomerLogin findOneByDateAdded(string $date_added) Return the first ChildOcCustomerLogin filtered by the date_added column
 * @method     ChildOcCustomerLogin findOneByDateModified(string $date_modified) Return the first ChildOcCustomerLogin filtered by the date_modified column *

 * @method     ChildOcCustomerLogin requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomerLogin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerLogin requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomerLogin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerLogin requireOneByCustomerLoginId(int $customer_login_id) Return the first ChildOcCustomerLogin filtered by the customer_login_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerLogin requireOneByEmail(string $email) Return the first ChildOcCustomerLogin filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerLogin requireOneByIp(string $ip) Return the first ChildOcCustomerLogin filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerLogin requireOneByTotal(int $total) Return the first ChildOcCustomerLogin filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerLogin requireOneByDateAdded(string $date_added) Return the first ChildOcCustomerLogin filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerLogin requireOneByDateModified(string $date_modified) Return the first ChildOcCustomerLogin filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerLogin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomerLogin objects based on current ModelCriteria
 * @method     ChildOcCustomerLogin[]|ObjectCollection findByCustomerLoginId(int $customer_login_id) Return ChildOcCustomerLogin objects filtered by the customer_login_id column
 * @method     ChildOcCustomerLogin[]|ObjectCollection findByEmail(string $email) Return ChildOcCustomerLogin objects filtered by the email column
 * @method     ChildOcCustomerLogin[]|ObjectCollection findByIp(string $ip) Return ChildOcCustomerLogin objects filtered by the ip column
 * @method     ChildOcCustomerLogin[]|ObjectCollection findByTotal(int $total) Return ChildOcCustomerLogin objects filtered by the total column
 * @method     ChildOcCustomerLogin[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCustomerLogin objects filtered by the date_added column
 * @method     ChildOcCustomerLogin[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcCustomerLogin objects filtered by the date_modified column
 * @method     ChildOcCustomerLogin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomerLoginQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomerLoginQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomerLogin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomerLoginQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomerLoginQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomerLoginQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomerLoginQuery();
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
     * @return ChildOcCustomerLogin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomerLoginTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomerLoginTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCustomerLogin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT customer_login_id, email, ip, total, date_added, date_modified FROM oc_customer_login WHERE customer_login_id = :p0';
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
            /** @var ChildOcCustomerLogin $obj */
            $obj = new ChildOcCustomerLogin();
            $obj->hydrate($row);
            OcCustomerLoginTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCustomerLogin|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the customer_login_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerLoginId(1234); // WHERE customer_login_id = 1234
     * $query->filterByCustomerLoginId(array(12, 34)); // WHERE customer_login_id IN (12, 34)
     * $query->filterByCustomerLoginId(array('min' => 12)); // WHERE customer_login_id > 12
     * </code>
     *
     * @param     mixed $customerLoginId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function filterByCustomerLoginId($customerLoginId = null, $comparison = null)
    {
        if (is_array($customerLoginId)) {
            $useMinMax = false;
            if (isset($customerLoginId['min'])) {
                $this->addUsingAlias(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID, $customerLoginId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerLoginId['max'])) {
                $this->addUsingAlias(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID, $customerLoginId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID, $customerLoginId, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerLoginTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%', Criteria::LIKE); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerLoginTableMap::COL_IP, $ip, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(OcCustomerLoginTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(OcCustomerLoginTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerLoginTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCustomerLoginTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCustomerLoginTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerLoginTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified('2011-03-14'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified('now'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified(array('max' => 'yesterday')); // WHERE date_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcCustomerLoginTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcCustomerLoginTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerLoginTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomerLogin $ocCustomerLogin Object to remove from the list of results
     *
     * @return $this|ChildOcCustomerLoginQuery The current query, for fluid interface
     */
    public function prune($ocCustomerLogin = null)
    {
        if ($ocCustomerLogin) {
            $this->addUsingAlias(OcCustomerLoginTableMap::COL_CUSTOMER_LOGIN_ID, $ocCustomerLogin->getCustomerLoginId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_customer_login table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerLoginTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomerLoginTableMap::clearInstancePool();
            OcCustomerLoginTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerLoginTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomerLoginTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomerLoginTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomerLoginTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomerLoginQuery
