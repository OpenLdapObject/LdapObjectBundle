<?php

namespace OpenLdapObject\Bundle\LdapObjectBundle;

use OpenLdapObject\LdapClient\Connection;
use OpenLdapObject\Manager\EntityManager;

class LdapWrapper {
    /**
     * @var \OpenLdapObject\Manager\EntityManager
     */
    private $em;

    public function __construct($hostname = false, $port = false, $base_dn = false, $dn = false, $password = false) {
        
        if (($hostname != false) && ($port != false) && ($base_dn != false) && ($dn != false) && ($password != false)) {
            if (($port == "") || ($port == false) || (empty($port)) || (is_null($port))) {
                $port = 389;
            }
            $connect = new Connection($hostname, $port);
            if (!is_null($dn) && !is_null($password)) {
                $connect->identify($dn, $password);
            }

            $client = $connect->connect();
            $client->setBaseDn($base_dn);
            try {
                \OpenLdapObject\Manager\EntityManager::addEntityManager('default', $client, true);
            } catch(Exception $e) {
                // Nothing
            }
        }
        $this->em = \OpenLdapObject\Manager\EntityManager::getEntityManager();
    }

    /**
     * @return \OpenLdapObject\Manager\EntityManager
     */
    public function getEntityManager() {
        return $this->em;
    }

    public function getRepository($entityName) {
        return $this->em->getRepository($entityName);
    }
} 
