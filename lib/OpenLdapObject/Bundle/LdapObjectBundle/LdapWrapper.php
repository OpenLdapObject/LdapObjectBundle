<?php

namespace OpenLdapObject\Bundle\LdapObjectBundle;

use OpenLdapObject\LdapClient\Connection;
use OpenLdapObject\Manager\EntityManager;

class LdapWrapper
{
    const DEFAULT_PORT = 389;
    /**
     * @var \OpenLdapObject\Manager\EntityManager
     */
    private $em;

    public function __construct($hostname = false, $port = false, $base_dn = false, $dn = false, $password = false)
    {
        if ($hostname && $base_dn && $dn && $password) {
            $this->initEntityManager($hostname, $port, $base_dn, $dn, $password);
        }
        $this->em = \OpenLdapObject\Manager\EntityManager::getEntityManager();
    }

    /**
     * @return \OpenLdapObject\Manager\EntityManager
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    public function getRepository($entityName)
    {
        return $this->em->getRepository($entityName);
    }

    private function initEntityManager($hostname, $port, $base_dn, $dn, $password)
    {
        $port = $port ? $port : self::DEFAULT_PORT;
        $connect = new Connection($hostname, $port);
        if ($dn && $password) {
            $connect->identify($dn, $password);
        }
        $client = $connect->connect();
        $client->setBaseDn($base_dn);
        try {
            \OpenLdapObject\Manager\EntityManager::addEntityManager('default', $client, true);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
} 
