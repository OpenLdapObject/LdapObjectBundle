<?php

namespace OpenLdapObject\Bundle\LdapObjectBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use OpenLdapObject\LdapClient\Connection;
use OpenLdapObject\Manager\EntityManager;

class OpenLdapObjectLdapObjectBundle extends Bundle {
    public function boot() {
        parent::boot();

        if(!is_null($this->container->getParameter('ldap_object.host'))) {
            $connect = new Connection($this->container->getParameter('ldap_object.host'), $this->container->getParameter('ldap_object.port'));
            if(!is_null($this->container->getParameter('ldap_object.dn')) && !is_null($this->container->getParameter('ldap_object.password'))) {
                $connect->identify($this->container->getParameter('ldap_object.dn'), $this->container->getParameter('ldap_object.password'));
            }

            $client = $connect->connect();
            $client->setBaseDn($this->container->getParameter('ldap_object.base_dn'));
            try {
                EntityManager::addEntityManager('default', $client, true);
            } catch(Exception $e) {
                // Nothing
            }
        }
    }
}
