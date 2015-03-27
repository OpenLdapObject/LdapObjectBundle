<?php

namespace OpenLdapObject\Bundle\LdapObjectBundle;


class LdapWrapper {
    /**
     * @var \OpenLdapObject\Manager\EntityManager
     */
    private $em;

    public function __construct() {
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