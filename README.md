ALK Web Bundle working under Symfony2 framework
===============================================

This document contains information on how to install, and start
using the Bundle.


1) What are this Bundle's dependencies ?
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
3) How does the menu in this Bundle works ?
-------------------------------------------
When inputting a new menu, you can choose a few different things :
- Name : what will be used as headline
- Description : what will be used as the headline's description
- UrlType : basically, whether it's an article, a category or something. Inputting the route's name is much better.
- Url : what will be used as first argument. Only one argument allowed for now.
- Location : where should the link appear on the index page. I choosed 0 as the first horizontal menu right below the nav-bar.
- Priority : Should reflect the order of the menus. Need to implement a sort algorithm before one uses it. (MenuHolderController.php)
