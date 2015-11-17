<?php

DEFINE('HOST', 'localhost');
DEFINE('DBNAME', 'memcached');
DEFINE('USER', 'root');
DEFINE('PASSWORD', 'root');

DEFINE('OPERATION_REPEAT', 5000);

function getMemcached() {
	if (!class_exists('Memcached')) {
	  die('This demo requires installed Memcached module.');
	}

	$cache = new Memcached();
	$cache->addServer("localhost", 11211);

	return $cache;
}

function getPdo() {
	try {
	  $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER , PASSWORD);
	} catch (Exception $ex) {
	  die($ex->getMessage() . "\n");
	}

  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	return $pdo;
}

function getIdsFromDb($pdo) {
	$query = $pdo->prepare("SELECT id FROM people");
	$query->execute();
	$result = $query->fetchAll();

	return $result;
}

function getPersonFromDb($id, $pdo) {
	$personQuery = $pdo->prepare("SELECT * FROM people WHERE id = :id");
	$personQuery->bindParam('id', $id);
	$personQuery->execute();
	$currentPerson = $personQuery->fetch();

	return $currentPerson;
}

function getIds($cache, $pdo)
{
	$ids = getIdsFromCache($cache);
	if ($ids !== FALSE) {
		$return = $ids;
	} else {
		$return = getIdsFromDb($pdo);
		setIdsToCache($return, $cache);
	}

	return $return;
}

function getIdsFromCache($cache)
{
	$ids = $cache->get('people_ids');
	if ($ids !== FALSE) {
		$return = $ids;
	} else {
		$return = FALSE;
	}

	return $return;
}

function setIdsToCache($ids, $cache)
{
	return $cache->set('people_ids', $ids);
}

function getPerson($id, $cache, $pdo) {
	$person = getPersonFromCache($cache);
	if ($ids !== FALSE) {
		$return = $person;
	} else {
		$return = getPersonFromDb($pdo);
		setPersonToCache($id, $cache);
	}

	return $return;
}

function setPersonToCache($id, $person, $cache)
{
	return $cache->set('people_' . $id, $person);
}
