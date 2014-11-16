# Truss

### A Responsive, Semantic WordPress Parent Theme

## Introduction

Truss is a Parent theme with the goal of making it **fast** to build responsive child themes with semantic HTML.

It makes this process fast by:

* Organizing CSS into Sass partials segregated by purpose, to ease re-skinning.
* Relying on WordPress hooks to load template partials, to ease supplementing, replacing, re-ordering, and removing template elements.
* Providing great documentation for child theme developers to come up to speed as quickly as possible.

At a glance, Truss uses:

* A modified version of [_s](http://underscores.me) for markup.
* An opinionated method of organizing and writing CSS


## What's Inside?

* A modified version of [_s](http://underscores.me) for markup.

* An opinionated method of organizing and writing CSS, including:
    * The [Object-oriented CSS](https://github.com/stubbornella/oocss/wiki) philosophy
    * The [Scalable and Modular Architecture for CSS (SMACCS)](http://smacss.com/) philosophy.
    * Digesting vendor stylesheets (such as resets) and stitching them intentionally into our partials to boost performance by minimizing rules overwriting rules.
    * [Sass](http://sass-lang.com), [Bourbon](http://bourbon.io/), and [Neat](http://neat.bourbon.io/) for Responsive grids.
    * [Sass-globbing](https://github.com/chriseppstein/sass-globbing) to include Sass partials in bulk
    * [Normalize](git.io/normalize) to reset CSS.

* [Theme Hook Alliance](https://github.com/zamoose/themehookalliance) hooks to ease extension by plugins.

* [Genericons](http://genericons.com/) and [Dashicons](https://github.com/melchoyce/dashicons/) icon fonts

* [Flexnav](http://jasonweaver.name/lab/flexiblenavigation/) responsive navigation menu system

### Browser Support

Truss takes a progressive enhancement approach, meaning that baseline support is guaranteed for an arbitrary list of older browsers, and enhanced CSS is served to newer browsers based on capatilbitiy detection.

Truss supports these baseline browsers, including verification testing:

(@todo replace "latest version" with specifics, as of release-time.)

* The latest version of these browsers for Mac OS X 10.8 and above:
	* Chrome
	* Firefox
	* Safari
* The latest version of these browsers for Ubuntu version (@todo) and above:
	* Firefox
	* (@todo)
* The latest version of these browsers for Windows 7 and above:
	* Internet Explorer (IE 8 and later) (@todo verify)
	* Firefox
	* Chrome
* iPhones: (@todo)
	* 4s (Mobile Safari X.X)
	* 5 (Mobile Safari X.X)
	* 5s (Mobile Safari X.X)
	* 5c (Mobile Safari X.X)
	* 6 (Mobile Safari X.X)
	* 6 plus (Mobile Safari X.X)
* iPads: (@todo)
	* Original (Mobile Safari X.X)
	* 2 (Mobile Safari X.X)
	* 3 (Mobile Safari X.X)
	* Air (Mobile Safari X.X)
	* Air 2 (Mobile Safari X.X)
	* Mini (Mobile Safari X.X)
	* Mini 2 (Mobile Safari X.X)

## CSS User Guide

Follow the SMACSS.com book's recommendations, in so far as they describe what to consider when writing and organizing CSS selectors and rules. The book's methods help result in CSS that is scalable and easier to maintain, by making as few assumptions about HTML structure as possible (if they need to change in the future, we aren't handcuffed) and by taking an object-oriented approach. 

When it comes to implementation, we do not necessary adhere to the book's specific recommendations. Using Sass allows us to organize things contextually, and gives us new flexibility for documenting CSS, which frees us from some non-semantic recommendations of the SMACSS book. For example, we don't use `l-` to prefix layout class names. That approach is arguably non-semantic, and is no longer necessary when we can provide documentation of every CSS rule in a Sass partial. (Truss will also eventually have an interactive code reference.)

Sass partials are organized into the following folders, sorted in order of import (which is based on dependency ordering):

* `sass/globals/` - everything that does not print out to CSS.
	* `sass/globals/frameworks/`- 
	* `sass/globals/variables/` - 
	* `sass/globals/functions/`- 
	* `sass/globals/mixins/` - 
	* `sass/globals/extends/` - 
	* _Note: You should be able to re-skin the entire theme by modifying only the contents of the `variables/` and `extends/` directories._
* `sass/base/` - Everything that is not for layout and is not specific to a module. Primarily HTML tag-specific rules. 


### Base

#### Definition and Philosophy

…

For more, see the [SMACSS chapter on base styles](http://smacss.com/book/type-module).

#### Base Organization in Truss

…

### Layout

#### Definition and Philosophy

…

For more, see the [SMACSS chapter on layout styles](http://smacss.com/book/type-layout).

#### Layout Organization in Truss

…


### Modules

#### Definition and Philosophy

Modules are minor groups of content, subordinate to layout, with a distinct and discrete visual design that makes them appear as a whole. 

Modules are **completely ignorant of their containing elements**. If you move them from inside of one layout container to another, its appearance and behavior should not change. 

From an object-oriented perspective, they are objects of a given class, and so their markup should identify the class and their CSS should implement a self-contained and self-determining encapsulation. (The same can be said of their JavaScript.) 

For more, see the [SMACSS chapter on module styles](http://smacss.com/book/type-module).

#### Module Organization in Truss

…

#### Sub-classing Modules

Avoid conditional styling based on location. If you are changing the look of a module for usage elsewhere on the page or site, sub-class the module, instead. 

To subclass a module, **add a class to it**, prefixed with the module name. For example:

```HTML
<!-- "Product" is the base class -->
<div class='product'>
	<span class='prod-name'>…</span>
	<span class='prod-vendor'>…</span>
</div>

<!-- "Product On Sale" is the sub class -->
<div class='product product-onsale'>
	<span class='prod-name'>…</span>
	<span class='prod-vendor'>…</span>
</div>
```

### State

#### Definition and Philosophy



The SMACSS Book explains that what distinguishes state from sub-modules are two things:

1. State may be applied to both `layout` and `module` objects.
1. State is changeable during the lifetime of the application, dependent on JS (whereas modules are set and do not change). 

We add a third distinction, to further clarify:

3. State is supplemental to modules, in that they are often (perhaps most of the time) module-dependent. In otherwords, state is not entirely meaningful without a module (or layout) context. 


For more, see the [SMACSS chapter on state styles](http://smacss.com/book/type-module).

#### State Organization in Truss

Truss' Sass partial organization splits the location of `state` styles into two different areas:

* Generic `state` classes are located in `sass/state/`.
* Module-dependent `state` classes are located in `sass/modules/`, in their module contexts as nested Sass selectors.

**Generic `state`** classes can be thought of as ignorant of their module contexts, in a similar way as modules are ignorant of their location contexts. 

A real example: `sass/state/_truss_is-hidden.scss`:

```SCSS
.is-hidden {
	display: none;
}
```

Grouping generic states allows defining them once, allowing modules to share them without having to re-define them, which reduces redundancy.

**Module-specific `state`** classes are unique to a module, or behave uniquely in a module. They should be grouped with their module's definition, as a nested Sass selector. 

A hypothetical example:



In the unusual event that a module needs to override a generic state class, that is easily done by the same mechanism. 

Getting Started
---------------

_TBD._


Folder Structure
---------------
* Theme Root
  * **library**
    * **assets** ( js, css, sass )
      * css
      * font
      * js
      * sass ( Where all scss files are stored )
    * **languages**
    * **vendors** ( 3rd party utilities like Theme Hook Alliance, TGM Plugin Activation etc... )
  * **page-templates** ( Standard Page Templates for Pages )
      * partials ( Template Parts viea get_template_parts() )


## Credits

Truss is a project of [Rocket Lift](http://rocketlift.com/), whose team includes:
* QA engineer Catherine Bridge
* Support tech Douglas Detrick
* Lead developer Matthew Eppelsheimer
* Developer Kevin Lenihan
* Sysadmin and QA engineer Matt Pearson

If you are Truss, and/or you'd like to collaborate on its development, please let us know! 

This theme is a fork of Alex Vasquez's [Some Like It Neat]().


## Vendor Licenses



This theme is based on Underscores, (C) 2012-2013 Automattic, Inc.
 - Source: http://underscores.me/
 - License: GNU GPL, Version 2 (or later)
 - License URI: license.txt
 
Flexnav, Copyright 2014 Jason Weaver.
 - Source: http://jasonweaver.name/lab/flexiblenavigation/
 - License: GNU GPL, Version 2 (or later)
 - License URI: https://github.com/indyplanets/flexnav/blob/master/LICENSE

Genericons, Copyright 2013 Automattic, Inc.
 - Source: http://www.genericons.com
 - License: GNU GPL, Version 2 (or later)
 - License URI: /font/license.txt

Theme Hook Alliance 
 - Source: https://github.com/zamoose/themehookalliance/blob/master/tha-theme-hooks.php
 - License: GNU GPL, Version 2 (or later)
 - License URI: 
 
Bourbon
 - Source: http://bourbon.io, © 2013 thoughtbot
 - License: The MIT License
 - License URI: https://github.com/thoughtbot/bourbon/blob/master/LICENSE

Neat
 - Source: http://neat.bourbon.io, © 2013 thoughtbot
 - License: The MIT License
 - License URI: https://github.com/thoughtbot/neat/blob/master/LICENSE
 
Hover Intent
 - Source: https://github.com/tristen/hoverintent
 - License: the MIT
 - License URI: license.txt
