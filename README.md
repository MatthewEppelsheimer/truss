# Truss

### A Responsive, Semantic WordPress Parent Theme

## Introduction

Truss is a Parent theme with the goal of making it **fast** to build **responsive** WordPress **child themes**, with **semantic HTML**.

It makes this process fast by:

* Organizing CSS into Sass partials segregated by purpose, to ease re-skinning.
* Relying on WordPress hooks to load template partials, to ease supplementing, replacing, re-ordering, and removing template elements.
* Providing great documentation for child theme developers to come up to speed as quickly as possible.

At a glance, Truss uses:

* A modified version of [_s (Underscores)](http://underscores.me) for markup.
* An opinionated method of organizing and writing CSS


## What's Inside?

* A modified version of [_s (Underscores)](http://underscores.me) for markup.

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

* [TGM Plugin Activation](#) to recommend and require plugins

* [Sassdoc](/) documentation of Sass variables, mixins, and placeholders, available at [trusstheme.com/sass](https://trusstheme.com/sass/).

### Browser Support

Truss takes a progressive enhancement approach, meaning that baseline support is guaranteed for an arbitrary list of older browsers, and enhanced CSS is served to newer browsers based on capatilbitiy detection.

Truss authors have verified Truss styles behave as expected in these browsers:

(@todo replace "latest version" with specifics, as of release-time.)

* The latest version of these browsers for Mac OS X 10.10 and above:
	* Chrome
	* Firefox
	* Safari
* The latest version of these browsers for Windows 8 and above:
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
	* 2 (Mobile Safari X.X)
	* 3 (Mobile Safari X.X)
	* Air (Mobile Safari X.X)
	* Air 2 (Mobile Safari X.X)
	* Mini (Mobile Safari X.X)
	* Mini 2 (Mobile Safari X.X)

## CSS User Guide

Follow the [SMACSS.com](http://smacss.com/) book's recommendations for writing and organizing CSS selectors and rules. These recommendations result in CSS that is scalable and easier to maintain, by making as few assumptions about HTML structure as possible (if they need to change in the future, we aren't handcuffed), and by limiting the potential for changes and additions to have unintended consequences. 

We follow the books's philosophy, but not all of its specific recommendations. Using Sass allows us to organize things contextually, and gives us new flexibility for documenting CSS, which frees us from some non-semantic recommendations of the SMACSS book. For example, we don't use `l-` to prefix layout class names. That approach is arguably non-semantic, and is no longer necessary when we can provide documentation of every CSS rule in a Sass partial. 

### Object-Oriented CSS

Build visual/UI elements as standalone, reusable "objects", or pieces — modules, essentially — that have no knowledge of their parent container. 

Objects may be responsible for layout, or a visual component, but generally not both. Contextual page layout is always treated separately from visual components. 

**Do not:** Re-use existing HTML classes for new CSS purposes.

**Do:** Create a new HTML class / CSS selector pairing when you need to define new objects. 

**Do not:** Supplement or modify existing style rules without considering whether your changes should apply to all instances of that class in HTML — current or future, known or unknown.

**Do:** Supplement or modify existing style rules for a given class when you intend to change any instance of the module site-wide. 

**Do:** Keep all code to do with a single class in as few places as possible: Ideally one CSS selector per class.

#### Resources:

* [Tutsplus Tutorial on OOCSS](http://code.tutsplus.com/tutorials/object-oriented-css-what-how-and-why--net-6986)

### The Single Responsibility Principle

**[The Single Responsibility Principle](https://en.wikipedia.org/wiki/Single_responsibility_principle):** every class should have a single responsibility, and that responsibility should be entirely encapsulated by the class.

*Do not:* write CSS selectors targeting existing classes in HTML that may be used for other purposes.

*Do:* Create a new, reusable, semantic classes to target against, to avoid collisions with current or future style rules leading to `!important` hell when yours are applied too broadly and overwrite the cascade in unforseeable ways. 

## Sass Organization

Sass partials are organized into the following folders, sorted in import-order, which is based on dependency ordering:

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



The SMACSS Book explains that what distinguishes state from sub-modules are two things. We add a third distinction, to further clarify:

1. State may be applied to both `layout` and `module` objects.
1. State is changeable during the lifetime of the application, dependent on JS (whereas modules are set and do not change). 
1. State is supplemental to modules, in that they are often (perhaps most of the time) module-dependent. In otherwords, state is not entirely meaningful without a module (or layout) context. 


For more, see the [SMACSS chapter on state styles](http://smacss.com/book/type-module).

#### State Organization in Truss

Truss' Sass partial organization splits the location of `state` styles into two different areas:

* Generic `state` classes are located in `sass/state/`.
* Module-dependent `state` classes are located in `sass/modules/`, in their module contexts as nested Sass selectors.

**Generic `state`** classes can be thought of as ignorant of their module contexts, in a similar way as modules are ignorant of their location contexts. 

An example: `sass/state/_truss_is-hidden.scss`:

```SCSS
.is-hidden {
	display: none;
}
```

Grouping generic states allows defining them once, allowing modules to share them without having to re-define them, which reduces redundancy.

**Module-specific `state`** classes are unique to a module, or behave uniquely in a module. They should be grouped with their module's definition, as a nested Sass selector. 

A hypothetical example:

@todo

In the unusual event that a module needs to override a generic state class, that is easily done by the same mechanism. 

## Child Theming

### Recommending and Requiring Plugins

Truss packages TGM Plugin Activation, a PHP library that allows you to easily require or recommend plugins. It allows your users to install and even automatically activate plugins. You can reference pre-packaged plugins, plugins from the WordPress Plugin Repository or even plugins hosted elsewhere on the internet.

To use TGM Plugin Activation in your child theme:

1. Copy `truss/library/child-themes/child-theme.php` into the root of your child theme
2. Follow instructions in this file.

For more information, refer to `truss/library/vendors/tgm-plugin-activation/README.md`.

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
      * partials ( Template Parts via get_template_parts() )

## Maintainting Documentation

### Sassdoc

Sass documentation is available at [trusstheme.com/sass](https://trusstheme.com/sass/). This is compiled using [Sassdoc](http://sassdoc.com/). 

To compile, run: `$ sassdoc library/assets/sass/`

You may optionally control the directory name where generated documentation site files are output by passing a `dest` argument. This example will place output in directory `foo/`. 

```
$ sassdoc library/assets/sass/ --dest=foo
```

Note that running this command is a destructive operation to anything already in the destination directory.

For more on using Sassdoc, run `$ sassdoc --help` or visit [sassdoc.com](http://sassdoc.com/).

### This README file

You're reading it right now. Be sure to keep this up to date as Truss grows and changes.

## Credits

Truss is a project of [Rocket Lift](http://rocketlift.com/), whose technical team includes:
* QA engineer Catherine Bridge
* Support tech Douglas Detrick
* Lead developer Matthew Eppelsheimer
* Sysadmin and QA engineer Matt Pearson

If you are Truss, and/or you'd like to collaborate on its development, please let us know! 

This theme began as a fork of Alex Vasquez's [Some Like It Neat](http://somelikeitneat.com/).


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
