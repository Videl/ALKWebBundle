ALK Web Bundle working under Symfony2 framework
===============================================

This document contains information on how to install, and start
using the Bundle.


What are this Bundle's dependencies ?
-------------------------------------

This Bundle should be configured with :

  * Symfony2.1

  * Soft's DoctrineExtensions Bundle

  * A2lix's TranslationBundle


How to install the required Bundles ?
-------------------------------------

You should read every Bundle's documentation, at least to know how they work. Here's the Composer's script to download the required components, including the Bundles stated higher.
```
{
    "require": {
        "alk/alk-site-bundle": "dev-master"
    }
}
```
How does the menu in this Bundle works ?
----------------------------------------
When inputting a new menu, you can choose a few different things :
- Name : what will be used as headline
- Description : what will be used as the headline's description
- UrlType : basically, whether it's an article, a category or something. Inputting the route's name is much better.
- Url : what will be used as first argument. Only one argument allowed for now.
- Location : where should the link appear on the index page. I choosed 0 as the first horizontal menu right below the nav-bar.
- Priority : Should reflect the order of the menus. Need to implement a sort algorithm before one uses it. (MenuHolderController.php)


TO DO
=====

 * Gallery system
    * Image upload system and view
    * Galleries consists of one or multiple images
    * View for gallery
    * View for sorting images

Entities
--------
 * Gallery entity
    * Name ``string``
    * Description ``text``
    * Date ``date``
    * Images ``image`` [1-N]
    * Public ``bool``
 * Image Entity
    * Name ``string``
    * Description ``text``
    * Date ``date``
    * URL ``string``
    
Any ideas ? Enhancements ?
--------------------------
Feel free to tell me, or fork and pull request me :).


License
-------
The MIT License

Copyright (c) 2013 (Videl, videled@gmail.com)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
