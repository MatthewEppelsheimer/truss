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

## PHP User Guide

### PHP File Organization

TBD.

### Truss Components

Truss is a library of _components_. 

A _component_ in Truss is a discrete element of design or area of interface, such as a column, a content area, a banner, or a button. 

Components may be comparatively large or small, and can be nested.

**Each Truss component is implemented in PHP** by a single WordPress action hook, and functions hooked to them that provide PHP, typically including nested components with additional `truss( '<component_name>` )` calls.

**Each component is implemented in Sass** with a unique and single-purpose class. Truss' Sass library includes 

**The goal of this system — the "Why" — is to make child theming as easy as possible.**

- Child themers can completely remove a default component, change the ordering of components, and add new custom components by utilizing `add_action()` and `remove_action()` calls.
- Child themers can change the appearance of components with custom Sass rules targeting the component's class. This avoids requiring non-modular CSS selector nesting and `!important` declaration hell in order to successfully override default CSS in the Truss library.

#### Creating a Component

A Truss fully implemented Truss component has:

1. A unique, descriptive, and semantic class name string to serve as its global identifier throughout Truss' code (PHP and Sass).
1. A file in `includes/components` named `truss-<component-name>.php` that defines callbacks to run on the `truss_<component_name>` action.
    * Use the [Yeoman generator script](https://bitbucket.org/rocketlift/wp-truss-generator/) to create and add to these files.
1. A Sass file in a subdirectory of `library/assets/sass/globals/extends` named `<component-name>.scss`, which defines a Sass placeholder `%<component-name>`, fully implementing the intended layout/appearance.
    *  If the component is for layout, its extend should be in `sass/globals/extends/layout/`
    *  If the component is for appearance, its extend should be in `sass/globals/extends/components/`
1. A Sass file in the `library/assets/sass/component` or `library/assets/sass/layout` directory that defines rules for the `.<component-name>` selector, which merely extends `%<component-name>`.
    *  The file should go in `sass/layout` if the component's role is  about page layout, as opposed to appearance — for example, a section row or a column.
    *  The file should go in `sass/component` if it doesn't qualify as a 'layout' class.
    *  See _"CSS User Guide"_ below for more info on this. 

### Component Nomenclature

- Use simple, plain-English descriptive terms. Avoid existing jargon. Avoid introducing new jargon.
- Prefix with `truss_`
- Keep names as brief as possible while still being unique and descriptive. 
- Add specificity as needed to make component names unique. Add suffixes for specificity
    -  In other words, `truss_<thing>_<type>` creates a more specific type of `truss_<thing>`. Don't use `truss_<type>_<thing>`.
    - `truss_column_main` is good because it can be alpha-grouped with columns of other types. `truss_main_column` is bad because it can't. 
- Be as specific as needed to avoid component names that could mean various things. 
    - `truss_column_main` instead of `truss_main`. ("Main what?")

### PHP Standards for Components and their Content

- When in doubt, make it filterable.
- Always use HTML classes, never use HTML ids.
- 100% of PHP that implements a component should be wrapped in one or more functions that are hooked to the component's action.

### Converting Truss to fully use this Component System

Truss is a fork of another project that didn't have this component system — the component system is unique to Truss. As such, as of this writing, most of the page templates in Truss do not yet implement this system. 

It is a short term goal of the Truss development project to fully convert page templates to this nested component system — a mark of success will be removing this section of this documentation.

Here are a few things to keep in mind while **updating page templates to properly use components:**

- You'll often need to convert existing markup into components. Go ahead and do it as needed.
- Carefully consider the naming of new components, following the _Rules for Component Nomenclature_ (see above).
- Translate existing markup into _Truss standards_ (see above).
- Migrate code to where its should be within Truss' file structure.
    * Page templates themselves should be quite brief, and just fire off action hooks where the exiting things happen. See `index.php` as a basic but poignant example.

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

Documentation for Truss' Sass library is available at [trusstheme.com/sass](https://trusstheme.com/sass/). This is compiled from comments in our Sass sourcecode, using [Sassdoc](http://sassdoc.com/). 

#### Making inline annotations for Sassdoc

**As you add and edit Sass, document it inline to include it automatically at compile time, using Sassdoc.**

Each Sassdoc block line must begin with `/// `. C-style comment blocks (`/**`) and lines with only two slashes will not compile.

```css
/// Here is the description
/// On several lines if you like
///
/// @example
///   4 + 2 = 8
///   4 / 2 = 2
///
/// @example scss - Clamp function
///   clamp(42, $min: 13, $max: 37)
///   // 37
///
/// @group truss
/// @author Matthew Eppelsheimer
/// @since 0.1
%some-placeholder {
	display: block;
}
```

Here is the complete list of [Sassdoc Annotations](http://sassdoc.com/annotations//). 

#### Compiling Sassdoc

Install `sassdoc` from the `npm` repository. `$ npm install sassdoc -g` will install it globally on your system.

To compile, switch to Truss' project root and run `$ sassdoc library/assets/sass/`. Be sure to note any errors.

You may optionally control the directory name where generated documentation site files are output by passing a `dest` argument. This example will place output in directory `foo/`, which should be load immediately in a browser. 

```
$ sassdoc library/assets/sass/ --dest=foo
```

We use the default `sassdoc/` output directory for this project, and it is included in the `.gitignore` file. **So you can (and should) safely compile at will after adding or editing Sass documentation, to test your changes.**

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
