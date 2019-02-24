LdapObjectBundle : Symfony2 Bundle for OpenLdapObject

LdapObjectBundle is a Symfony2 Bundle.
It is an interface for retrieving, modifying and persisting LDAP entities.
It requires an another Bundle : the OpenLdapObject Bundle which is the simple connector LDAP using PHP's native LDAP functions.
It can be use with Symfony version 2, 3 and 4, and add a system of complex Query and Conditions LDAP.


Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require openldapobject/ldapobjectbundle "~1"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Or add the bundle in your `composer.json` and launch this command `composer update`
```
...
    "require" : {
        ...
        "openldapobject/ldapobjectbundle": "~1.0",
        ...
    },
...
```

Step 2: Configuration
---------------------
Add configuration keys in the `app/config/parameters.yml` and `app/config/parameters.yml.dist` and configure for your openldap :
```
    ldap_hostname: ldap-test.univ.fr
    ldap_base_dn: 'dc=univ,dc=fr'
    ldap_dn: 'cn=login,ou=ldapusers,dc=univ,dc=fr'
    ldap_password: 'password'
```

Add configuration keys for the bundle in `app/config/config.yml`
```
# Ldap
open_ldap_object_ldap_object:
    host:     "%ldap_hostname%"
    dn:       "%ldap_dn%"
    password: "%ldap_password%"
    base_dn:  "%ldap_base_dn%"
```


Step 3: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new OpenLdapObject\Bundle\LdapObjectBundle\OpenLdapObjectLdapObjectBundle(),
        );

        // ...
    }

    // ...
}
```



Step 4: Use the Bundle
----------------------

To use the LdapObjectBundle you have to add annotation to an entity like this example:

For Accounts :
--------------

```php
<?php

namespace AppBundle\Entity;

use OpenLdapObject\Entity;
use OpenLdapObject\Collection\EntityCollection;
use OpenLdapObject\Annotations as OLO;

/**
 * @OLO\DN(value="ou=accounts")
 * @OLO\Entity({"udlAccount"})
 */
class Account extends Entity {
    /**
     * @OLO\Column(type="string")
     * @OLO\Index
     */
    private $uid; 

    /**
     * @OLO\Column(type="array")
     */
    private $sn;

    /**
     * @OLO\Column(type="array")
     */
    private $udlAccountDisplaySn;
    
    /**
     * @OLO\Column(type="array")
     */
    private $givenName;
    
    /**
     * @OLO\Column(type="array")
     */
    private $udlAccountDisplayGivenName;

    /**
     * @OLO\Column(type="string")
     */
    private $mail;

    /**
     * @OLO\Column(type="string")
     */
    private $supannEntiteAffectationPrincipale;
    
    /**
     * @OLO\Column(type="string")
     */
    private $eduPersonPrimaryAffiliation;

    /**
     * @OLO\Column(type="array")
     */
    private $eduPersonAffiliation;
  
    /**
     * @OLO\Column(type="array")
     */
    private $supannEntiteAffectation;
       
    /**
     * @OLO\Column(type="string")
     */
    private $supannCivilite;
    
    /**
     * @OLO\Column(type="array")
     */
    private $memberOf;
    

    public function getUid() {
        return $this->uid;
    }

    public function setUid($value) {
        $this->uid = $value;
        return $this;
    }

    public function getSn() {
        return $this->sn;
    }

    public function setSn($sn) {
        $this->sn = $sn;
        return $this;
    }
            
    public function addSn($value) {
        $this->sn->add($value);
        return $this;
    }

    public function removeSn($value) {
        $this->sn->removeElement($value);
        return $this;
    }

    public function getGivenName() {
        return $this->givenName;
    }
    
    public function setGivenName($givenName) {
        $this->givenName = $givenName;
        return $this;
    }
    
    public function addGivenName($value) {
        $this->givenName->add($value);
        return $this;
    }

    public function removeGivenName($value) {
        $this->givenName->removeElement($value);
        return $this;
    }
    
    public function getUdlAccountDisplayGivenName() {
        return $this->udlAccountDisplayGivenName;
    }
    
    public function setUdlAccountDisplayGivenName($udlAccountDisplayGivenName) {
        $this->udlAccountDisplayGivenName = $udlAccountDisplayGivenName;
        return $this;
    }
    
    public function addUdlAccountDisplayGivenName($value) {
        $this->udlAccountDisplayGivenName->add($value);
        return $this;
    }

    public function removeUdlAccountDisplayGivenName($value) {
        $this->udlAccountDisplayGivenName->removeElement($value);
        return $this;
    }

    public function getUdlAccountDisplaySn() {
        return $this->udlAccountDisplaySn;
    }
    
    public function setUdlAccountDisplaySn($udlAccountDisplaySn) {
        $this->udlAccountDisplaySn = $udlAccountDisplaySn;
        return $this;
    }
    
    public function addUdlAccountDisplaySn($value) {
        $this->udlAccountDisplaySn->add($value);
        return $this;
    }
    
    public function removeUdlAccountDisplaySn($value) {
        $this->udlAccountDisplaySn->removeElement($value);
        return $this;
    }
    
    public function getMail() {
        return $this->mail;
    }

    public function setMail($value) {
        $this->mail = $value;
        return $this;
    }
    
    public function getSupannEntiteAffectationPrincipale() {
        return $this->supannEntiteAffectationPrincipale;
    }
    
    public function setSupannEntiteAffectationPrincipale($supannEntiteAffectationPrincipale) {
        $this->supannEntiteAffectationPrincipale = $supannEntiteAffectationPrincipale;
        return $this;
    }

    public function getEduPersonPrimaryAffiliation() {
        return $this->eduPersonPrimaryAffiliation;
    }

    public function setEduPersonPrimaryAffiliation($eduPersonPrimaryAffiliation) {
        $this->eduPersonPrimaryAffiliation = $eduPersonPrimaryAffiliation;
        return $this;
    }

    public function getEduPersonAffiliation() {
        return $this->eduPersonAffiliation;
    }
    
    public function setEduPersonAffiliation($eduPersonAffiliation) {
        $this->eduPersonAffiliation = $eduPersonAffiliation;
        return $this;
    }

    public function addEduPersonAffiliation($value) {
        $this->eduPersonAffiliation->add($value);
        return $this;
    }

    public function removeEduPersonAffiliation($value) {
        $this->eduPersonAffiliation->removeElement($value);
        return $this;
    }
    
    public function getSupannEntiteAffectation() {
        return $this->supannEntiteAffectation;
    }
    
    public function setSupannEntiteAffectation($supannEntiteAffectation) {
        $this->supannEntiteAffectation = $supannEntiteAffectation;
        return $this;
    }

    public function addSupannEntiteAffectation($supannEntiteAffectation) {
        $this->supannEntiteAffectation->add($supannEntiteAffectation);
        return $this;
    }

    public function removeSupannEntiteAffectation($supannEntiteAffectation) {
        $this->supannEntiteAffectation->removeElement($supannEntiteAffectation);
        return $this;
    }
    
    public function getSupannCivilite() {
       return $this->supannCivilite; 
    } 
    
    public function setSupannCivilite($value) {
        $this->supannCivilite = $value;
        return $this;
    }
    
    public function getMemberOf(){
       return $this->memberOf; 
    } 
    
    public function setMemberOf($memberOf) {
        $this->memberOf = $memberOf;
        return $this;
    }
    
    public function addMemberOf($memberOf) {
        $this->memberOf->add($memberOf);
        return $this;
    }

    public function removeMemberOf($memberOf) {
        $this->memberOf->removeElement($memberOf);
        return $this;
    }
}
```

* Name of each attributes are the ldap object field
* Column : Use this annotation to type the ldap object field (string or array)
* Entity : Use this annotation to attribute to a php entity class an ldapObjectClass
* Dn : Use this annotation to build the dn with twig syntaxe

After you can use entity like this example:

```php
$a = new Account();
$a->setUid('john.doo');
$a->setGivenname('John');
$a->setSn('Doo');
$em = $this->get('ldap_object.manager');
$em->persist($a);
$em->flush();

$repo = $em->getRepository('AppBundle\Entity\Account');
$a = $repo->find('john.doo');
```

you also can set complex request ldap :
```php
$conditions = Array();
$not = true;
$conditions[] = new Condition('sn', 'Hetru');
$conditions[] = new Condition('sn', 'Bomy', $not);
        
$query = new Query(Query::CAND); 
$query->cAnd($conditions);
        
$em = $this->get('ldap_object.manager');
$repo = $em->getRepository('AppBundle\Entity\Account');
$a = $repo->findByQuery($query);
```

For Groups :
------------

```php
<?php

namespace AppBundle\Entity;

use OpenLdapObject\Entity;
use OpenLdapObject\Annotations as OLO;

/**
 * @OLO\Dn(value="ou=groups")
 * @OLO\Entity({"udlGroupe"})
 */
class Group extends Entity {
    
    /**
     * @OLO\Column(type="string")
     * @OLO\Index
     */
    private $cn;
    
    /**
     * @OLO\Column(type="string")
     */
    private $description;
    
    /**
     * @OLO\Column(type="array")
     */
    private $member;

    public function getCn() {
        return $this->cn;   
    }
    
    public function setCn($cn) {
        $this->cn = $cn;
        return $this;
    }
    
    public function getDescription() {
        return $this->description;   
    }
    
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }
   
    public function getMember() {
        return $this->member;   
    }
    
    public function setMember($member) {
        $this->member = $member;
        return $this;
    }
    
    public function addMember($member) {
        $this->member->add($member);
        return $this;
    }

    public function removeMember($member) {
        $this->member->removeElement($member);
        return $this;
    }
}
```

After you can use entity like this example:

```php
$g = new Group();
$g->setCn('APP:TEST');
$g->setDescription('APPTEST');
$g->addMember('uid=1940,ou=accounts,dc=univ,dc=fr');
$em = $this->get('ldap_object.manager');
$em->persist($g);
$em->flush();

$repo = $em->getRepository('AppBundle\Entity\Group');
$g = $repo->find('APP:TEST');
```



For Structures :
----------------

```php
<?php

namespace AppBundle\Entity;

use OpenLdapObject\Entity;
use OpenLdapObject\Annotations as OLO;

/**
 * @OLO\Dn(value="ou=structures")
 * @OLO\Entity({"udlStructure"})
 */
class Structure extends Entity {
    /**
     * @OLO\Column(type="string")
     * @OLO\Index
     */
    private $supannCodeEntite;
    
    /**
     * @OLO\Column(type="string")
     */
    private $ou;
    
    /**
     * @OLO\Column(type="string")
     */
    private $supannCodeEntiteParent;
    
    /**
     * @OLO\Column(type="string")
     */
    private $description;

    /**
     * 
     * @OLO\Column(type="string")
     */
    private $udlStructureLibelleCourt;

    public function getSupannCodeEntite() {
        return $this->supannCodeEntite;
    }

    public function setSupannCodeEntite($supannCodeEntite) {
        $this->supannCodeEntite = $supannCodeEntite;
        return $this;
    }
    
    public function getOu() {
        return $this->ou;
    }
     
    public function setOu($ou) {
        $this->ou = $ou;
        return $this;
    }
    
    public function getSupannCodeEntiteParent() {
        return $this->supannCodeEntiteParent;   
    }
    
    public function setSupannCodeEntiteParent($supannCodeEntite) {
        $this->supannCodeEntiteParent = $supannCodeEntite;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }
    
    public function getUdlStructureLibelleCourt() {
        return $this->udlStructureLibelleCourt;
    }
    
    public function setUdlStructureLibelleCourt($udlStructureLibelleCourt) {
        $this->udlStructureLibelleCourt = $udlStructureLibelleCourt;
        return $this;
    }
}
```


After you can use entity like this example:

```php
$s = new Structure();
$s->setSupannCodeEntite('STTRUCMUCHE');
$s->setOu('STTRUCMUCHE);
$s->setSupannCodeEntiteParent('STUDL');
$s->setDescription('{acronyme1}STRUCTURE TRUC MUCHE');
$em = $this->get('ldap_object.manager');
$em->persist($s);
$em->flush();

$repo = $em->getRepository('AppBundle\Entity\Structure');
$s = $repo->find('STTRUCMUCHE');
```
