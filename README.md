ALK Web Bundle working under Symfony2 framework
===============================================

This document contains information on how to install, and start
using the Bundle.


1) How does the Bundle works ?
-------------------------------

This Bundle should be configured with :

  * Symfony2.1

  * Soft's DoctrineExtensions Bundle

  * A2lix's TranslationBundle


2) How to install the required Bundles ?
----------------------------------------

You should read every Bundle's documentation, at least to know how they work. Here's the Composer's script to download the required components, including the Bundles stated higher.
```
{
    "require": {
        "alk/alk-site-bundle": "dev-master"
    }
}
```
