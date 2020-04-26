<?php

namespace Base;

use \ModxSiteContent as ChildModxSiteContent;
use \ModxSiteContentQuery as ChildModxSiteContentQuery;
use \Exception;
use \PDO;
use Map\ModxSiteContentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'modx_site_content' table.
 *
 *
 *
 * @method     ChildModxSiteContentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildModxSiteContentQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildModxSiteContentQuery orderByOntentType($order = Criteria::ASC) Order by the ontent_type column
 * @method     ChildModxSiteContentQuery orderByPagetitle($order = Criteria::ASC) Order by the pagetitle column
 * @method     ChildModxSiteContentQuery orderByLongtitle($order = Criteria::ASC) Order by the longtitle column
 * @method     ChildModxSiteContentQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildModxSiteContentQuery orderByAlias($order = Criteria::ASC) Order by the alias column
 * @method     ChildModxSiteContentQuery orderByLinkAttributes($order = Criteria::ASC) Order by the link_attributes column
 * @method     ChildModxSiteContentQuery orderByPublished($order = Criteria::ASC) Order by the published column
 * @method     ChildModxSiteContentQuery orderByPubDate($order = Criteria::ASC) Order by the pub_date column
 * @method     ChildModxSiteContentQuery orderByUnpubDate($order = Criteria::ASC) Order by the unpub_date column
 * @method     ChildModxSiteContentQuery orderByParent($order = Criteria::ASC) Order by the parent column
 * @method     ChildModxSiteContentQuery orderByIsfolder($order = Criteria::ASC) Order by the isfolder column
 * @method     ChildModxSiteContentQuery orderByIntrotext($order = Criteria::ASC) Order by the introtext column
 * @method     ChildModxSiteContentQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildModxSiteContentQuery orderByRichtext($order = Criteria::ASC) Order by the richtext column
 * @method     ChildModxSiteContentQuery orderByTemplate($order = Criteria::ASC) Order by the template column
 * @method     ChildModxSiteContentQuery orderByMenuindex($order = Criteria::ASC) Order by the menuindex column
 * @method     ChildModxSiteContentQuery orderBySearchable($order = Criteria::ASC) Order by the searchable column
 * @method     ChildModxSiteContentQuery orderByCacheable($order = Criteria::ASC) Order by the cacheable column
 * @method     ChildModxSiteContentQuery orderByCreatedby($order = Criteria::ASC) Order by the createdby column
 * @method     ChildModxSiteContentQuery orderByCreatedon($order = Criteria::ASC) Order by the createdon column
 * @method     ChildModxSiteContentQuery orderByEditedby($order = Criteria::ASC) Order by the editedby column
 * @method     ChildModxSiteContentQuery orderByEditedon($order = Criteria::ASC) Order by the editedon column
 * @method     ChildModxSiteContentQuery orderByDdeleted($order = Criteria::ASC) Order by the ddeleted column
 * @method     ChildModxSiteContentQuery orderByDeletedon($order = Criteria::ASC) Order by the deletedon column
 * @method     ChildModxSiteContentQuery orderByDeletedby($order = Criteria::ASC) Order by the deletedby column
 * @method     ChildModxSiteContentQuery orderByPublishedon($order = Criteria::ASC) Order by the publishedon column
 * @method     ChildModxSiteContentQuery orderByPublishedby($order = Criteria::ASC) Order by the publishedby column
 * @method     ChildModxSiteContentQuery orderByMenutitle($order = Criteria::ASC) Order by the menutitle column
 * @method     ChildModxSiteContentQuery orderByDonthit($order = Criteria::ASC) Order by the donthit column
 * @method     ChildModxSiteContentQuery orderByPrivateweb($order = Criteria::ASC) Order by the privateweb column
 * @method     ChildModxSiteContentQuery orderByPrivatemgr($order = Criteria::ASC) Order by the privatemgr column
 * @method     ChildModxSiteContentQuery orderByContentDispo($order = Criteria::ASC) Order by the content_dispo column
 * @method     ChildModxSiteContentQuery orderByHidemenu($order = Criteria::ASC) Order by the hidemenu column
 * @method     ChildModxSiteContentQuery orderByClassKey($order = Criteria::ASC) Order by the class_key column
 * @method     ChildModxSiteContentQuery orderByContextKey($order = Criteria::ASC) Order by the context_key column
 * @method     ChildModxSiteContentQuery orderByContentType($order = Criteria::ASC) Order by the content_type column
 * @method     ChildModxSiteContentQuery orderByUri($order = Criteria::ASC) Order by the uri column
 * @method     ChildModxSiteContentQuery orderByUriOverride($order = Criteria::ASC) Order by the uri_override column
 * @method     ChildModxSiteContentQuery orderByHideChildrenInTree($order = Criteria::ASC) Order by the hide_children_in_tree column
 * @method     ChildModxSiteContentQuery orderByShowInTree($order = Criteria::ASC) Order by the show_in_tree column
 * @method     ChildModxSiteContentQuery orderByProperties($order = Criteria::ASC) Order by the properties column
 *
 * @method     ChildModxSiteContentQuery groupById() Group by the id column
 * @method     ChildModxSiteContentQuery groupByType() Group by the type column
 * @method     ChildModxSiteContentQuery groupByOntentType() Group by the ontent_type column
 * @method     ChildModxSiteContentQuery groupByPagetitle() Group by the pagetitle column
 * @method     ChildModxSiteContentQuery groupByLongtitle() Group by the longtitle column
 * @method     ChildModxSiteContentQuery groupByDescription() Group by the description column
 * @method     ChildModxSiteContentQuery groupByAlias() Group by the alias column
 * @method     ChildModxSiteContentQuery groupByLinkAttributes() Group by the link_attributes column
 * @method     ChildModxSiteContentQuery groupByPublished() Group by the published column
 * @method     ChildModxSiteContentQuery groupByPubDate() Group by the pub_date column
 * @method     ChildModxSiteContentQuery groupByUnpubDate() Group by the unpub_date column
 * @method     ChildModxSiteContentQuery groupByParent() Group by the parent column
 * @method     ChildModxSiteContentQuery groupByIsfolder() Group by the isfolder column
 * @method     ChildModxSiteContentQuery groupByIntrotext() Group by the introtext column
 * @method     ChildModxSiteContentQuery groupByContent() Group by the content column
 * @method     ChildModxSiteContentQuery groupByRichtext() Group by the richtext column
 * @method     ChildModxSiteContentQuery groupByTemplate() Group by the template column
 * @method     ChildModxSiteContentQuery groupByMenuindex() Group by the menuindex column
 * @method     ChildModxSiteContentQuery groupBySearchable() Group by the searchable column
 * @method     ChildModxSiteContentQuery groupByCacheable() Group by the cacheable column
 * @method     ChildModxSiteContentQuery groupByCreatedby() Group by the createdby column
 * @method     ChildModxSiteContentQuery groupByCreatedon() Group by the createdon column
 * @method     ChildModxSiteContentQuery groupByEditedby() Group by the editedby column
 * @method     ChildModxSiteContentQuery groupByEditedon() Group by the editedon column
 * @method     ChildModxSiteContentQuery groupByDdeleted() Group by the ddeleted column
 * @method     ChildModxSiteContentQuery groupByDeletedon() Group by the deletedon column
 * @method     ChildModxSiteContentQuery groupByDeletedby() Group by the deletedby column
 * @method     ChildModxSiteContentQuery groupByPublishedon() Group by the publishedon column
 * @method     ChildModxSiteContentQuery groupByPublishedby() Group by the publishedby column
 * @method     ChildModxSiteContentQuery groupByMenutitle() Group by the menutitle column
 * @method     ChildModxSiteContentQuery groupByDonthit() Group by the donthit column
 * @method     ChildModxSiteContentQuery groupByPrivateweb() Group by the privateweb column
 * @method     ChildModxSiteContentQuery groupByPrivatemgr() Group by the privatemgr column
 * @method     ChildModxSiteContentQuery groupByContentDispo() Group by the content_dispo column
 * @method     ChildModxSiteContentQuery groupByHidemenu() Group by the hidemenu column
 * @method     ChildModxSiteContentQuery groupByClassKey() Group by the class_key column
 * @method     ChildModxSiteContentQuery groupByContextKey() Group by the context_key column
 * @method     ChildModxSiteContentQuery groupByContentType() Group by the content_type column
 * @method     ChildModxSiteContentQuery groupByUri() Group by the uri column
 * @method     ChildModxSiteContentQuery groupByUriOverride() Group by the uri_override column
 * @method     ChildModxSiteContentQuery groupByHideChildrenInTree() Group by the hide_children_in_tree column
 * @method     ChildModxSiteContentQuery groupByShowInTree() Group by the show_in_tree column
 * @method     ChildModxSiteContentQuery groupByProperties() Group by the properties column
 *
 * @method     ChildModxSiteContentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildModxSiteContentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildModxSiteContentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildModxSiteContentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildModxSiteContentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildModxSiteContentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildModxSiteContent findOne(ConnectionInterface $con = null) Return the first ChildModxSiteContent matching the query
 * @method     ChildModxSiteContent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildModxSiteContent matching the query, or a new ChildModxSiteContent object populated from the query conditions when no match is found
 *
 * @method     ChildModxSiteContent findOneById(int $id) Return the first ChildModxSiteContent filtered by the id column
 * @method     ChildModxSiteContent findOneByType(string $type) Return the first ChildModxSiteContent filtered by the type column
 * @method     ChildModxSiteContent findOneByOntentType(string $ontent_type) Return the first ChildModxSiteContent filtered by the ontent_type column
 * @method     ChildModxSiteContent findOneByPagetitle(string $pagetitle) Return the first ChildModxSiteContent filtered by the pagetitle column
 * @method     ChildModxSiteContent findOneByLongtitle(string $longtitle) Return the first ChildModxSiteContent filtered by the longtitle column
 * @method     ChildModxSiteContent findOneByDescription(string $description) Return the first ChildModxSiteContent filtered by the description column
 * @method     ChildModxSiteContent findOneByAlias(string $alias) Return the first ChildModxSiteContent filtered by the alias column
 * @method     ChildModxSiteContent findOneByLinkAttributes(string $link_attributes) Return the first ChildModxSiteContent filtered by the link_attributes column
 * @method     ChildModxSiteContent findOneByPublished(boolean $published) Return the first ChildModxSiteContent filtered by the published column
 * @method     ChildModxSiteContent findOneByPubDate(int $pub_date) Return the first ChildModxSiteContent filtered by the pub_date column
 * @method     ChildModxSiteContent findOneByUnpubDate(int $unpub_date) Return the first ChildModxSiteContent filtered by the unpub_date column
 * @method     ChildModxSiteContent findOneByParent(int $parent) Return the first ChildModxSiteContent filtered by the parent column
 * @method     ChildModxSiteContent findOneByIsfolder(boolean $isfolder) Return the first ChildModxSiteContent filtered by the isfolder column
 * @method     ChildModxSiteContent findOneByIntrotext(string $introtext) Return the first ChildModxSiteContent filtered by the introtext column
 * @method     ChildModxSiteContent findOneByContent(string $content) Return the first ChildModxSiteContent filtered by the content column
 * @method     ChildModxSiteContent findOneByRichtext(boolean $richtext) Return the first ChildModxSiteContent filtered by the richtext column
 * @method     ChildModxSiteContent findOneByTemplate(int $template) Return the first ChildModxSiteContent filtered by the template column
 * @method     ChildModxSiteContent findOneByMenuindex(int $menuindex) Return the first ChildModxSiteContent filtered by the menuindex column
 * @method     ChildModxSiteContent findOneBySearchable(boolean $searchable) Return the first ChildModxSiteContent filtered by the searchable column
 * @method     ChildModxSiteContent findOneByCacheable(boolean $cacheable) Return the first ChildModxSiteContent filtered by the cacheable column
 * @method     ChildModxSiteContent findOneByCreatedby(int $createdby) Return the first ChildModxSiteContent filtered by the createdby column
 * @method     ChildModxSiteContent findOneByCreatedon(int $createdon) Return the first ChildModxSiteContent filtered by the createdon column
 * @method     ChildModxSiteContent findOneByEditedby(int $editedby) Return the first ChildModxSiteContent filtered by the editedby column
 * @method     ChildModxSiteContent findOneByEditedon(int $editedon) Return the first ChildModxSiteContent filtered by the editedon column
 * @method     ChildModxSiteContent findOneByDdeleted(int $ddeleted) Return the first ChildModxSiteContent filtered by the ddeleted column
 * @method     ChildModxSiteContent findOneByDeletedon(int $deletedon) Return the first ChildModxSiteContent filtered by the deletedon column
 * @method     ChildModxSiteContent findOneByDeletedby(int $deletedby) Return the first ChildModxSiteContent filtered by the deletedby column
 * @method     ChildModxSiteContent findOneByPublishedon(int $publishedon) Return the first ChildModxSiteContent filtered by the publishedon column
 * @method     ChildModxSiteContent findOneByPublishedby(int $publishedby) Return the first ChildModxSiteContent filtered by the publishedby column
 * @method     ChildModxSiteContent findOneByMenutitle(string $menutitle) Return the first ChildModxSiteContent filtered by the menutitle column
 * @method     ChildModxSiteContent findOneByDonthit(boolean $donthit) Return the first ChildModxSiteContent filtered by the donthit column
 * @method     ChildModxSiteContent findOneByPrivateweb(boolean $privateweb) Return the first ChildModxSiteContent filtered by the privateweb column
 * @method     ChildModxSiteContent findOneByPrivatemgr(boolean $privatemgr) Return the first ChildModxSiteContent filtered by the privatemgr column
 * @method     ChildModxSiteContent findOneByContentDispo(boolean $content_dispo) Return the first ChildModxSiteContent filtered by the content_dispo column
 * @method     ChildModxSiteContent findOneByHidemenu(boolean $hidemenu) Return the first ChildModxSiteContent filtered by the hidemenu column
 * @method     ChildModxSiteContent findOneByClassKey(string $class_key) Return the first ChildModxSiteContent filtered by the class_key column
 * @method     ChildModxSiteContent findOneByContextKey(string $context_key) Return the first ChildModxSiteContent filtered by the context_key column
 * @method     ChildModxSiteContent findOneByContentType(int $content_type) Return the first ChildModxSiteContent filtered by the content_type column
 * @method     ChildModxSiteContent findOneByUri(string $uri) Return the first ChildModxSiteContent filtered by the uri column
 * @method     ChildModxSiteContent findOneByUriOverride(boolean $uri_override) Return the first ChildModxSiteContent filtered by the uri_override column
 * @method     ChildModxSiteContent findOneByHideChildrenInTree(boolean $hide_children_in_tree) Return the first ChildModxSiteContent filtered by the hide_children_in_tree column
 * @method     ChildModxSiteContent findOneByShowInTree(boolean $show_in_tree) Return the first ChildModxSiteContent filtered by the show_in_tree column
 * @method     ChildModxSiteContent findOneByProperties(string $properties) Return the first ChildModxSiteContent filtered by the properties column *

 * @method     ChildModxSiteContent requirePk($key, ConnectionInterface $con = null) Return the ChildModxSiteContent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOne(ConnectionInterface $con = null) Return the first ChildModxSiteContent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildModxSiteContent requireOneById(int $id) Return the first ChildModxSiteContent filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByType(string $type) Return the first ChildModxSiteContent filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByOntentType(string $ontent_type) Return the first ChildModxSiteContent filtered by the ontent_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByPagetitle(string $pagetitle) Return the first ChildModxSiteContent filtered by the pagetitle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByLongtitle(string $longtitle) Return the first ChildModxSiteContent filtered by the longtitle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByDescription(string $description) Return the first ChildModxSiteContent filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByAlias(string $alias) Return the first ChildModxSiteContent filtered by the alias column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByLinkAttributes(string $link_attributes) Return the first ChildModxSiteContent filtered by the link_attributes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByPublished(boolean $published) Return the first ChildModxSiteContent filtered by the published column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByPubDate(int $pub_date) Return the first ChildModxSiteContent filtered by the pub_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByUnpubDate(int $unpub_date) Return the first ChildModxSiteContent filtered by the unpub_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByParent(int $parent) Return the first ChildModxSiteContent filtered by the parent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByIsfolder(boolean $isfolder) Return the first ChildModxSiteContent filtered by the isfolder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByIntrotext(string $introtext) Return the first ChildModxSiteContent filtered by the introtext column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByContent(string $content) Return the first ChildModxSiteContent filtered by the content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByRichtext(boolean $richtext) Return the first ChildModxSiteContent filtered by the richtext column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByTemplate(int $template) Return the first ChildModxSiteContent filtered by the template column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByMenuindex(int $menuindex) Return the first ChildModxSiteContent filtered by the menuindex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneBySearchable(boolean $searchable) Return the first ChildModxSiteContent filtered by the searchable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByCacheable(boolean $cacheable) Return the first ChildModxSiteContent filtered by the cacheable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByCreatedby(int $createdby) Return the first ChildModxSiteContent filtered by the createdby column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByCreatedon(int $createdon) Return the first ChildModxSiteContent filtered by the createdon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByEditedby(int $editedby) Return the first ChildModxSiteContent filtered by the editedby column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByEditedon(int $editedon) Return the first ChildModxSiteContent filtered by the editedon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByDdeleted(int $ddeleted) Return the first ChildModxSiteContent filtered by the ddeleted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByDeletedon(int $deletedon) Return the first ChildModxSiteContent filtered by the deletedon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByDeletedby(int $deletedby) Return the first ChildModxSiteContent filtered by the deletedby column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByPublishedon(int $publishedon) Return the first ChildModxSiteContent filtered by the publishedon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByPublishedby(int $publishedby) Return the first ChildModxSiteContent filtered by the publishedby column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByMenutitle(string $menutitle) Return the first ChildModxSiteContent filtered by the menutitle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByDonthit(boolean $donthit) Return the first ChildModxSiteContent filtered by the donthit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByPrivateweb(boolean $privateweb) Return the first ChildModxSiteContent filtered by the privateweb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByPrivatemgr(boolean $privatemgr) Return the first ChildModxSiteContent filtered by the privatemgr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByContentDispo(boolean $content_dispo) Return the first ChildModxSiteContent filtered by the content_dispo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByHidemenu(boolean $hidemenu) Return the first ChildModxSiteContent filtered by the hidemenu column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByClassKey(string $class_key) Return the first ChildModxSiteContent filtered by the class_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByContextKey(string $context_key) Return the first ChildModxSiteContent filtered by the context_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByContentType(int $content_type) Return the first ChildModxSiteContent filtered by the content_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByUri(string $uri) Return the first ChildModxSiteContent filtered by the uri column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByUriOverride(boolean $uri_override) Return the first ChildModxSiteContent filtered by the uri_override column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByHideChildrenInTree(boolean $hide_children_in_tree) Return the first ChildModxSiteContent filtered by the hide_children_in_tree column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByShowInTree(boolean $show_in_tree) Return the first ChildModxSiteContent filtered by the show_in_tree column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModxSiteContent requireOneByProperties(string $properties) Return the first ChildModxSiteContent filtered by the properties column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildModxSiteContent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildModxSiteContent objects based on current ModelCriteria
 * @method     ChildModxSiteContent[]|ObjectCollection findById(int $id) Return ChildModxSiteContent objects filtered by the id column
 * @method     ChildModxSiteContent[]|ObjectCollection findByType(string $type) Return ChildModxSiteContent objects filtered by the type column
 * @method     ChildModxSiteContent[]|ObjectCollection findByOntentType(string $ontent_type) Return ChildModxSiteContent objects filtered by the ontent_type column
 * @method     ChildModxSiteContent[]|ObjectCollection findByPagetitle(string $pagetitle) Return ChildModxSiteContent objects filtered by the pagetitle column
 * @method     ChildModxSiteContent[]|ObjectCollection findByLongtitle(string $longtitle) Return ChildModxSiteContent objects filtered by the longtitle column
 * @method     ChildModxSiteContent[]|ObjectCollection findByDescription(string $description) Return ChildModxSiteContent objects filtered by the description column
 * @method     ChildModxSiteContent[]|ObjectCollection findByAlias(string $alias) Return ChildModxSiteContent objects filtered by the alias column
 * @method     ChildModxSiteContent[]|ObjectCollection findByLinkAttributes(string $link_attributes) Return ChildModxSiteContent objects filtered by the link_attributes column
 * @method     ChildModxSiteContent[]|ObjectCollection findByPublished(boolean $published) Return ChildModxSiteContent objects filtered by the published column
 * @method     ChildModxSiteContent[]|ObjectCollection findByPubDate(int $pub_date) Return ChildModxSiteContent objects filtered by the pub_date column
 * @method     ChildModxSiteContent[]|ObjectCollection findByUnpubDate(int $unpub_date) Return ChildModxSiteContent objects filtered by the unpub_date column
 * @method     ChildModxSiteContent[]|ObjectCollection findByParent(int $parent) Return ChildModxSiteContent objects filtered by the parent column
 * @method     ChildModxSiteContent[]|ObjectCollection findByIsfolder(boolean $isfolder) Return ChildModxSiteContent objects filtered by the isfolder column
 * @method     ChildModxSiteContent[]|ObjectCollection findByIntrotext(string $introtext) Return ChildModxSiteContent objects filtered by the introtext column
 * @method     ChildModxSiteContent[]|ObjectCollection findByContent(string $content) Return ChildModxSiteContent objects filtered by the content column
 * @method     ChildModxSiteContent[]|ObjectCollection findByRichtext(boolean $richtext) Return ChildModxSiteContent objects filtered by the richtext column
 * @method     ChildModxSiteContent[]|ObjectCollection findByTemplate(int $template) Return ChildModxSiteContent objects filtered by the template column
 * @method     ChildModxSiteContent[]|ObjectCollection findByMenuindex(int $menuindex) Return ChildModxSiteContent objects filtered by the menuindex column
 * @method     ChildModxSiteContent[]|ObjectCollection findBySearchable(boolean $searchable) Return ChildModxSiteContent objects filtered by the searchable column
 * @method     ChildModxSiteContent[]|ObjectCollection findByCacheable(boolean $cacheable) Return ChildModxSiteContent objects filtered by the cacheable column
 * @method     ChildModxSiteContent[]|ObjectCollection findByCreatedby(int $createdby) Return ChildModxSiteContent objects filtered by the createdby column
 * @method     ChildModxSiteContent[]|ObjectCollection findByCreatedon(int $createdon) Return ChildModxSiteContent objects filtered by the createdon column
 * @method     ChildModxSiteContent[]|ObjectCollection findByEditedby(int $editedby) Return ChildModxSiteContent objects filtered by the editedby column
 * @method     ChildModxSiteContent[]|ObjectCollection findByEditedon(int $editedon) Return ChildModxSiteContent objects filtered by the editedon column
 * @method     ChildModxSiteContent[]|ObjectCollection findByDdeleted(int $ddeleted) Return ChildModxSiteContent objects filtered by the ddeleted column
 * @method     ChildModxSiteContent[]|ObjectCollection findByDeletedon(int $deletedon) Return ChildModxSiteContent objects filtered by the deletedon column
 * @method     ChildModxSiteContent[]|ObjectCollection findByDeletedby(int $deletedby) Return ChildModxSiteContent objects filtered by the deletedby column
 * @method     ChildModxSiteContent[]|ObjectCollection findByPublishedon(int $publishedon) Return ChildModxSiteContent objects filtered by the publishedon column
 * @method     ChildModxSiteContent[]|ObjectCollection findByPublishedby(int $publishedby) Return ChildModxSiteContent objects filtered by the publishedby column
 * @method     ChildModxSiteContent[]|ObjectCollection findByMenutitle(string $menutitle) Return ChildModxSiteContent objects filtered by the menutitle column
 * @method     ChildModxSiteContent[]|ObjectCollection findByDonthit(boolean $donthit) Return ChildModxSiteContent objects filtered by the donthit column
 * @method     ChildModxSiteContent[]|ObjectCollection findByPrivateweb(boolean $privateweb) Return ChildModxSiteContent objects filtered by the privateweb column
 * @method     ChildModxSiteContent[]|ObjectCollection findByPrivatemgr(boolean $privatemgr) Return ChildModxSiteContent objects filtered by the privatemgr column
 * @method     ChildModxSiteContent[]|ObjectCollection findByContentDispo(boolean $content_dispo) Return ChildModxSiteContent objects filtered by the content_dispo column
 * @method     ChildModxSiteContent[]|ObjectCollection findByHidemenu(boolean $hidemenu) Return ChildModxSiteContent objects filtered by the hidemenu column
 * @method     ChildModxSiteContent[]|ObjectCollection findByClassKey(string $class_key) Return ChildModxSiteContent objects filtered by the class_key column
 * @method     ChildModxSiteContent[]|ObjectCollection findByContextKey(string $context_key) Return ChildModxSiteContent objects filtered by the context_key column
 * @method     ChildModxSiteContent[]|ObjectCollection findByContentType(int $content_type) Return ChildModxSiteContent objects filtered by the content_type column
 * @method     ChildModxSiteContent[]|ObjectCollection findByUri(string $uri) Return ChildModxSiteContent objects filtered by the uri column
 * @method     ChildModxSiteContent[]|ObjectCollection findByUriOverride(boolean $uri_override) Return ChildModxSiteContent objects filtered by the uri_override column
 * @method     ChildModxSiteContent[]|ObjectCollection findByHideChildrenInTree(boolean $hide_children_in_tree) Return ChildModxSiteContent objects filtered by the hide_children_in_tree column
 * @method     ChildModxSiteContent[]|ObjectCollection findByShowInTree(boolean $show_in_tree) Return ChildModxSiteContent objects filtered by the show_in_tree column
 * @method     ChildModxSiteContent[]|ObjectCollection findByProperties(string $properties) Return ChildModxSiteContent objects filtered by the properties column
 * @method     ChildModxSiteContent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ModxSiteContentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ModxSiteContentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ModxSiteContent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildModxSiteContentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildModxSiteContentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildModxSiteContentQuery) {
            return $criteria;
        }
        $query = new ChildModxSiteContentQuery();
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
     * @return ChildModxSiteContent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ModxSiteContentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ModxSiteContentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildModxSiteContent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, type, ontent_type, pagetitle, longtitle, description, alias, link_attributes, published, pub_date, unpub_date, parent, isfolder, introtext, content, richtext, template, menuindex, searchable, cacheable, createdby, createdon, editedby, editedon, ddeleted, deletedon, deletedby, publishedon, publishedby, menutitle, donthit, privateweb, privatemgr, content_dispo, hidemenu, class_key, context_key, content_type, uri, uri_override, hide_children_in_tree, show_in_tree, properties FROM modx_site_content WHERE id = :p0';
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
            /** @var ChildModxSiteContent $obj */
            $obj = new ChildModxSiteContent();
            $obj->hydrate($row);
            ModxSiteContentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildModxSiteContent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the ontent_type column
     *
     * Example usage:
     * <code>
     * $query->filterByOntentType('fooValue');   // WHERE ontent_type = 'fooValue'
     * $query->filterByOntentType('%fooValue%', Criteria::LIKE); // WHERE ontent_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ontentType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByOntentType($ontentType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ontentType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_ONTENT_TYPE, $ontentType, $comparison);
    }

    /**
     * Filter the query on the pagetitle column
     *
     * Example usage:
     * <code>
     * $query->filterByPagetitle('fooValue');   // WHERE pagetitle = 'fooValue'
     * $query->filterByPagetitle('%fooValue%', Criteria::LIKE); // WHERE pagetitle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pagetitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPagetitle($pagetitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pagetitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PAGETITLE, $pagetitle, $comparison);
    }

    /**
     * Filter the query on the longtitle column
     *
     * Example usage:
     * <code>
     * $query->filterByLongtitle('fooValue');   // WHERE longtitle = 'fooValue'
     * $query->filterByLongtitle('%fooValue%', Criteria::LIKE); // WHERE longtitle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $longtitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByLongtitle($longtitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longtitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_LONGTITLE, $longtitle, $comparison);
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
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the alias column
     *
     * Example usage:
     * <code>
     * $query->filterByAlias('fooValue');   // WHERE alias = 'fooValue'
     * $query->filterByAlias('%fooValue%', Criteria::LIKE); // WHERE alias LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alias The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByAlias($alias = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alias)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_ALIAS, $alias, $comparison);
    }

    /**
     * Filter the query on the link_attributes column
     *
     * Example usage:
     * <code>
     * $query->filterByLinkAttributes('fooValue');   // WHERE link_attributes = 'fooValue'
     * $query->filterByLinkAttributes('%fooValue%', Criteria::LIKE); // WHERE link_attributes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $linkAttributes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByLinkAttributes($linkAttributes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($linkAttributes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_LINK_ATTRIBUTES, $linkAttributes, $comparison);
    }

    /**
     * Filter the query on the published column
     *
     * Example usage:
     * <code>
     * $query->filterByPublished(true); // WHERE published = true
     * $query->filterByPublished('yes'); // WHERE published = true
     * </code>
     *
     * @param     boolean|string $published The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPublished($published = null, $comparison = null)
    {
        if (is_string($published)) {
            $published = in_array(strtolower($published), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PUBLISHED, $published, $comparison);
    }

    /**
     * Filter the query on the pub_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPubDate(1234); // WHERE pub_date = 1234
     * $query->filterByPubDate(array(12, 34)); // WHERE pub_date IN (12, 34)
     * $query->filterByPubDate(array('min' => 12)); // WHERE pub_date > 12
     * </code>
     *
     * @param     mixed $pubDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPubDate($pubDate = null, $comparison = null)
    {
        if (is_array($pubDate)) {
            $useMinMax = false;
            if (isset($pubDate['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_PUB_DATE, $pubDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pubDate['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_PUB_DATE, $pubDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PUB_DATE, $pubDate, $comparison);
    }

    /**
     * Filter the query on the unpub_date column
     *
     * Example usage:
     * <code>
     * $query->filterByUnpubDate(1234); // WHERE unpub_date = 1234
     * $query->filterByUnpubDate(array(12, 34)); // WHERE unpub_date IN (12, 34)
     * $query->filterByUnpubDate(array('min' => 12)); // WHERE unpub_date > 12
     * </code>
     *
     * @param     mixed $unpubDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByUnpubDate($unpubDate = null, $comparison = null)
    {
        if (is_array($unpubDate)) {
            $useMinMax = false;
            if (isset($unpubDate['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_UNPUB_DATE, $unpubDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unpubDate['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_UNPUB_DATE, $unpubDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_UNPUB_DATE, $unpubDate, $comparison);
    }

    /**
     * Filter the query on the parent column
     *
     * Example usage:
     * <code>
     * $query->filterByParent(1234); // WHERE parent = 1234
     * $query->filterByParent(array(12, 34)); // WHERE parent IN (12, 34)
     * $query->filterByParent(array('min' => 12)); // WHERE parent > 12
     * </code>
     *
     * @param     mixed $parent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByParent($parent = null, $comparison = null)
    {
        if (is_array($parent)) {
            $useMinMax = false;
            if (isset($parent['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_PARENT, $parent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parent['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_PARENT, $parent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PARENT, $parent, $comparison);
    }

    /**
     * Filter the query on the isfolder column
     *
     * Example usage:
     * <code>
     * $query->filterByIsfolder(true); // WHERE isfolder = true
     * $query->filterByIsfolder('yes'); // WHERE isfolder = true
     * </code>
     *
     * @param     boolean|string $isfolder The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByIsfolder($isfolder = null, $comparison = null)
    {
        if (is_string($isfolder)) {
            $isfolder = in_array(strtolower($isfolder), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_ISFOLDER, $isfolder, $comparison);
    }

    /**
     * Filter the query on the introtext column
     *
     * Example usage:
     * <code>
     * $query->filterByIntrotext('fooValue');   // WHERE introtext = 'fooValue'
     * $query->filterByIntrotext('%fooValue%', Criteria::LIKE); // WHERE introtext LIKE '%fooValue%'
     * </code>
     *
     * @param     string $introtext The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByIntrotext($introtext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($introtext)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_INTROTEXT, $introtext, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%', Criteria::LIKE); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the richtext column
     *
     * Example usage:
     * <code>
     * $query->filterByRichtext(true); // WHERE richtext = true
     * $query->filterByRichtext('yes'); // WHERE richtext = true
     * </code>
     *
     * @param     boolean|string $richtext The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByRichtext($richtext = null, $comparison = null)
    {
        if (is_string($richtext)) {
            $richtext = in_array(strtolower($richtext), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_RICHTEXT, $richtext, $comparison);
    }

    /**
     * Filter the query on the template column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplate(1234); // WHERE template = 1234
     * $query->filterByTemplate(array(12, 34)); // WHERE template IN (12, 34)
     * $query->filterByTemplate(array('min' => 12)); // WHERE template > 12
     * </code>
     *
     * @param     mixed $template The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByTemplate($template = null, $comparison = null)
    {
        if (is_array($template)) {
            $useMinMax = false;
            if (isset($template['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_TEMPLATE, $template['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($template['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_TEMPLATE, $template['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_TEMPLATE, $template, $comparison);
    }

    /**
     * Filter the query on the menuindex column
     *
     * Example usage:
     * <code>
     * $query->filterByMenuindex(1234); // WHERE menuindex = 1234
     * $query->filterByMenuindex(array(12, 34)); // WHERE menuindex IN (12, 34)
     * $query->filterByMenuindex(array('min' => 12)); // WHERE menuindex > 12
     * </code>
     *
     * @param     mixed $menuindex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByMenuindex($menuindex = null, $comparison = null)
    {
        if (is_array($menuindex)) {
            $useMinMax = false;
            if (isset($menuindex['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_MENUINDEX, $menuindex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($menuindex['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_MENUINDEX, $menuindex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_MENUINDEX, $menuindex, $comparison);
    }

    /**
     * Filter the query on the searchable column
     *
     * Example usage:
     * <code>
     * $query->filterBySearchable(true); // WHERE searchable = true
     * $query->filterBySearchable('yes'); // WHERE searchable = true
     * </code>
     *
     * @param     boolean|string $searchable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterBySearchable($searchable = null, $comparison = null)
    {
        if (is_string($searchable)) {
            $searchable = in_array(strtolower($searchable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_SEARCHABLE, $searchable, $comparison);
    }

    /**
     * Filter the query on the cacheable column
     *
     * Example usage:
     * <code>
     * $query->filterByCacheable(true); // WHERE cacheable = true
     * $query->filterByCacheable('yes'); // WHERE cacheable = true
     * </code>
     *
     * @param     boolean|string $cacheable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByCacheable($cacheable = null, $comparison = null)
    {
        if (is_string($cacheable)) {
            $cacheable = in_array(strtolower($cacheable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_CACHEABLE, $cacheable, $comparison);
    }

    /**
     * Filter the query on the createdby column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedby(1234); // WHERE createdby = 1234
     * $query->filterByCreatedby(array(12, 34)); // WHERE createdby IN (12, 34)
     * $query->filterByCreatedby(array('min' => 12)); // WHERE createdby > 12
     * </code>
     *
     * @param     mixed $createdby The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByCreatedby($createdby = null, $comparison = null)
    {
        if (is_array($createdby)) {
            $useMinMax = false;
            if (isset($createdby['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_CREATEDBY, $createdby['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdby['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_CREATEDBY, $createdby['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_CREATEDBY, $createdby, $comparison);
    }

    /**
     * Filter the query on the createdon column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedon(1234); // WHERE createdon = 1234
     * $query->filterByCreatedon(array(12, 34)); // WHERE createdon IN (12, 34)
     * $query->filterByCreatedon(array('min' => 12)); // WHERE createdon > 12
     * </code>
     *
     * @param     mixed $createdon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByCreatedon($createdon = null, $comparison = null)
    {
        if (is_array($createdon)) {
            $useMinMax = false;
            if (isset($createdon['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_CREATEDON, $createdon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdon['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_CREATEDON, $createdon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_CREATEDON, $createdon, $comparison);
    }

    /**
     * Filter the query on the editedby column
     *
     * Example usage:
     * <code>
     * $query->filterByEditedby(1234); // WHERE editedby = 1234
     * $query->filterByEditedby(array(12, 34)); // WHERE editedby IN (12, 34)
     * $query->filterByEditedby(array('min' => 12)); // WHERE editedby > 12
     * </code>
     *
     * @param     mixed $editedby The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByEditedby($editedby = null, $comparison = null)
    {
        if (is_array($editedby)) {
            $useMinMax = false;
            if (isset($editedby['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_EDITEDBY, $editedby['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($editedby['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_EDITEDBY, $editedby['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_EDITEDBY, $editedby, $comparison);
    }

    /**
     * Filter the query on the editedon column
     *
     * Example usage:
     * <code>
     * $query->filterByEditedon(1234); // WHERE editedon = 1234
     * $query->filterByEditedon(array(12, 34)); // WHERE editedon IN (12, 34)
     * $query->filterByEditedon(array('min' => 12)); // WHERE editedon > 12
     * </code>
     *
     * @param     mixed $editedon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByEditedon($editedon = null, $comparison = null)
    {
        if (is_array($editedon)) {
            $useMinMax = false;
            if (isset($editedon['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_EDITEDON, $editedon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($editedon['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_EDITEDON, $editedon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_EDITEDON, $editedon, $comparison);
    }

    /**
     * Filter the query on the ddeleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDdeleted(1234); // WHERE ddeleted = 1234
     * $query->filterByDdeleted(array(12, 34)); // WHERE ddeleted IN (12, 34)
     * $query->filterByDdeleted(array('min' => 12)); // WHERE ddeleted > 12
     * </code>
     *
     * @param     mixed $ddeleted The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByDdeleted($ddeleted = null, $comparison = null)
    {
        if (is_array($ddeleted)) {
            $useMinMax = false;
            if (isset($ddeleted['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_DDELETED, $ddeleted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ddeleted['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_DDELETED, $ddeleted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_DDELETED, $ddeleted, $comparison);
    }

    /**
     * Filter the query on the deletedon column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedon(1234); // WHERE deletedon = 1234
     * $query->filterByDeletedon(array(12, 34)); // WHERE deletedon IN (12, 34)
     * $query->filterByDeletedon(array('min' => 12)); // WHERE deletedon > 12
     * </code>
     *
     * @param     mixed $deletedon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByDeletedon($deletedon = null, $comparison = null)
    {
        if (is_array($deletedon)) {
            $useMinMax = false;
            if (isset($deletedon['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_DELETEDON, $deletedon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedon['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_DELETEDON, $deletedon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_DELETEDON, $deletedon, $comparison);
    }

    /**
     * Filter the query on the deletedby column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedby(1234); // WHERE deletedby = 1234
     * $query->filterByDeletedby(array(12, 34)); // WHERE deletedby IN (12, 34)
     * $query->filterByDeletedby(array('min' => 12)); // WHERE deletedby > 12
     * </code>
     *
     * @param     mixed $deletedby The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByDeletedby($deletedby = null, $comparison = null)
    {
        if (is_array($deletedby)) {
            $useMinMax = false;
            if (isset($deletedby['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_DELETEDBY, $deletedby['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedby['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_DELETEDBY, $deletedby['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_DELETEDBY, $deletedby, $comparison);
    }

    /**
     * Filter the query on the publishedon column
     *
     * Example usage:
     * <code>
     * $query->filterByPublishedon(1234); // WHERE publishedon = 1234
     * $query->filterByPublishedon(array(12, 34)); // WHERE publishedon IN (12, 34)
     * $query->filterByPublishedon(array('min' => 12)); // WHERE publishedon > 12
     * </code>
     *
     * @param     mixed $publishedon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPublishedon($publishedon = null, $comparison = null)
    {
        if (is_array($publishedon)) {
            $useMinMax = false;
            if (isset($publishedon['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_PUBLISHEDON, $publishedon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publishedon['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_PUBLISHEDON, $publishedon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PUBLISHEDON, $publishedon, $comparison);
    }

    /**
     * Filter the query on the publishedby column
     *
     * Example usage:
     * <code>
     * $query->filterByPublishedby(1234); // WHERE publishedby = 1234
     * $query->filterByPublishedby(array(12, 34)); // WHERE publishedby IN (12, 34)
     * $query->filterByPublishedby(array('min' => 12)); // WHERE publishedby > 12
     * </code>
     *
     * @param     mixed $publishedby The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPublishedby($publishedby = null, $comparison = null)
    {
        if (is_array($publishedby)) {
            $useMinMax = false;
            if (isset($publishedby['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_PUBLISHEDBY, $publishedby['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publishedby['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_PUBLISHEDBY, $publishedby['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PUBLISHEDBY, $publishedby, $comparison);
    }

    /**
     * Filter the query on the menutitle column
     *
     * Example usage:
     * <code>
     * $query->filterByMenutitle('fooValue');   // WHERE menutitle = 'fooValue'
     * $query->filterByMenutitle('%fooValue%', Criteria::LIKE); // WHERE menutitle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $menutitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByMenutitle($menutitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($menutitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_MENUTITLE, $menutitle, $comparison);
    }

    /**
     * Filter the query on the donthit column
     *
     * Example usage:
     * <code>
     * $query->filterByDonthit(true); // WHERE donthit = true
     * $query->filterByDonthit('yes'); // WHERE donthit = true
     * </code>
     *
     * @param     boolean|string $donthit The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByDonthit($donthit = null, $comparison = null)
    {
        if (is_string($donthit)) {
            $donthit = in_array(strtolower($donthit), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_DONTHIT, $donthit, $comparison);
    }

    /**
     * Filter the query on the privateweb column
     *
     * Example usage:
     * <code>
     * $query->filterByPrivateweb(true); // WHERE privateweb = true
     * $query->filterByPrivateweb('yes'); // WHERE privateweb = true
     * </code>
     *
     * @param     boolean|string $privateweb The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPrivateweb($privateweb = null, $comparison = null)
    {
        if (is_string($privateweb)) {
            $privateweb = in_array(strtolower($privateweb), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PRIVATEWEB, $privateweb, $comparison);
    }

    /**
     * Filter the query on the privatemgr column
     *
     * Example usage:
     * <code>
     * $query->filterByPrivatemgr(true); // WHERE privatemgr = true
     * $query->filterByPrivatemgr('yes'); // WHERE privatemgr = true
     * </code>
     *
     * @param     boolean|string $privatemgr The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByPrivatemgr($privatemgr = null, $comparison = null)
    {
        if (is_string($privatemgr)) {
            $privatemgr = in_array(strtolower($privatemgr), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PRIVATEMGR, $privatemgr, $comparison);
    }

    /**
     * Filter the query on the content_dispo column
     *
     * Example usage:
     * <code>
     * $query->filterByContentDispo(true); // WHERE content_dispo = true
     * $query->filterByContentDispo('yes'); // WHERE content_dispo = true
     * </code>
     *
     * @param     boolean|string $contentDispo The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByContentDispo($contentDispo = null, $comparison = null)
    {
        if (is_string($contentDispo)) {
            $contentDispo = in_array(strtolower($contentDispo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_CONTENT_DISPO, $contentDispo, $comparison);
    }

    /**
     * Filter the query on the hidemenu column
     *
     * Example usage:
     * <code>
     * $query->filterByHidemenu(true); // WHERE hidemenu = true
     * $query->filterByHidemenu('yes'); // WHERE hidemenu = true
     * </code>
     *
     * @param     boolean|string $hidemenu The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByHidemenu($hidemenu = null, $comparison = null)
    {
        if (is_string($hidemenu)) {
            $hidemenu = in_array(strtolower($hidemenu), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_HIDEMENU, $hidemenu, $comparison);
    }

    /**
     * Filter the query on the class_key column
     *
     * Example usage:
     * <code>
     * $query->filterByClassKey('fooValue');   // WHERE class_key = 'fooValue'
     * $query->filterByClassKey('%fooValue%', Criteria::LIKE); // WHERE class_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByClassKey($classKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_CLASS_KEY, $classKey, $comparison);
    }

    /**
     * Filter the query on the context_key column
     *
     * Example usage:
     * <code>
     * $query->filterByContextKey('fooValue');   // WHERE context_key = 'fooValue'
     * $query->filterByContextKey('%fooValue%', Criteria::LIKE); // WHERE context_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contextKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByContextKey($contextKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contextKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_CONTEXT_KEY, $contextKey, $comparison);
    }

    /**
     * Filter the query on the content_type column
     *
     * Example usage:
     * <code>
     * $query->filterByContentType(1234); // WHERE content_type = 1234
     * $query->filterByContentType(array(12, 34)); // WHERE content_type IN (12, 34)
     * $query->filterByContentType(array('min' => 12)); // WHERE content_type > 12
     * </code>
     *
     * @param     mixed $contentType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByContentType($contentType = null, $comparison = null)
    {
        if (is_array($contentType)) {
            $useMinMax = false;
            if (isset($contentType['min'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_CONTENT_TYPE, $contentType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contentType['max'])) {
                $this->addUsingAlias(ModxSiteContentTableMap::COL_CONTENT_TYPE, $contentType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_CONTENT_TYPE, $contentType, $comparison);
    }

    /**
     * Filter the query on the uri column
     *
     * Example usage:
     * <code>
     * $query->filterByUri('fooValue');   // WHERE uri = 'fooValue'
     * $query->filterByUri('%fooValue%', Criteria::LIKE); // WHERE uri LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uri The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByUri($uri = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uri)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_URI, $uri, $comparison);
    }

    /**
     * Filter the query on the uri_override column
     *
     * Example usage:
     * <code>
     * $query->filterByUriOverride(true); // WHERE uri_override = true
     * $query->filterByUriOverride('yes'); // WHERE uri_override = true
     * </code>
     *
     * @param     boolean|string $uriOverride The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByUriOverride($uriOverride = null, $comparison = null)
    {
        if (is_string($uriOverride)) {
            $uriOverride = in_array(strtolower($uriOverride), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_URI_OVERRIDE, $uriOverride, $comparison);
    }

    /**
     * Filter the query on the hide_children_in_tree column
     *
     * Example usage:
     * <code>
     * $query->filterByHideChildrenInTree(true); // WHERE hide_children_in_tree = true
     * $query->filterByHideChildrenInTree('yes'); // WHERE hide_children_in_tree = true
     * </code>
     *
     * @param     boolean|string $hideChildrenInTree The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByHideChildrenInTree($hideChildrenInTree = null, $comparison = null)
    {
        if (is_string($hideChildrenInTree)) {
            $hideChildrenInTree = in_array(strtolower($hideChildrenInTree), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_HIDE_CHILDREN_IN_TREE, $hideChildrenInTree, $comparison);
    }

    /**
     * Filter the query on the show_in_tree column
     *
     * Example usage:
     * <code>
     * $query->filterByShowInTree(true); // WHERE show_in_tree = true
     * $query->filterByShowInTree('yes'); // WHERE show_in_tree = true
     * </code>
     *
     * @param     boolean|string $showInTree The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByShowInTree($showInTree = null, $comparison = null)
    {
        if (is_string($showInTree)) {
            $showInTree = in_array(strtolower($showInTree), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_SHOW_IN_TREE, $showInTree, $comparison);
    }

    /**
     * Filter the query on the properties column
     *
     * Example usage:
     * <code>
     * $query->filterByProperties('fooValue');   // WHERE properties = 'fooValue'
     * $query->filterByProperties('%fooValue%', Criteria::LIKE); // WHERE properties LIKE '%fooValue%'
     * </code>
     *
     * @param     string $properties The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function filterByProperties($properties = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($properties)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModxSiteContentTableMap::COL_PROPERTIES, $properties, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildModxSiteContent $modxSiteContent Object to remove from the list of results
     *
     * @return $this|ChildModxSiteContentQuery The current query, for fluid interface
     */
    public function prune($modxSiteContent = null)
    {
        if ($modxSiteContent) {
            $this->addUsingAlias(ModxSiteContentTableMap::COL_ID, $modxSiteContent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the modx_site_content table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ModxSiteContentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ModxSiteContentTableMap::clearInstancePool();
            ModxSiteContentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ModxSiteContentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ModxSiteContentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ModxSiteContentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ModxSiteContentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ModxSiteContentQuery
