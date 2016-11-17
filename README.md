Symfony2 Bundle for OpenLdapObject

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
