# About the Truss Starter Child Theme

Truss is a parent theme framework. It is not designed to be edited directly, but rather used alongside a child theme that you customize. The directory this readme file is located in is a starter child theme you can use to begin a new theme project that uses Truss.

## Using this Starter to create your own theme

To begin:

1. Copy it into your `wp-content/themes/` directory.
2. Retitle the theme directory to your new child theme's slug.
3. Edit `library/assets/sass/style.scss`, inside your new theme directory to give your theme meta information such as the title, description, author, and URI.

After this point, as long as Truss is also installed in `wp-content/themes/`, you should be able to `compass compile`.

## Documentation

Refer to Truss's documentation in its README file. (We'll drop a link or two here once it stabilizes.)

### Notes on Compiling Sass for your child theme

_(For now we assume you're comfortable with `gem`, `compass` and `sass` and know what you're doing. Eventually we'll make docs more helpful to at least point you in the right direction if you don't.)_

1. Before you can compile, you must have `compass` and `sass-globbing` installed.
2. Compile with `compass compile` or `compass watch` from the child theme directory root. 
3. Unfortunately you can't pass variables to Sass' `@import` directories, so we're stuck with rigid assumptions about where Truss, the child theme, and the child theme's Sass source files live in relation to each other. Hence the Sass bootstrap pattern provided in `library/assets/sass/style.css`.

