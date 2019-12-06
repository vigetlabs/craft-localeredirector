[![No Maintenance Intended](http://unmaintained.tech/badge.svg)](http://unmaintained.tech/)

# DEPRECATED

This Craft CMS 2.x plugin is no longer supported, but it is fully functional, and you may continue to use it as you see fit. The license also allows you to fork it and make changes as needed for legacy support reasons.

For Craft CMS 3.x functionality, consider Pierre Stoffe's [Language Redirector](https://github.com/pierrestoffe/craft-language-redirector) plugin, which can also be installed via the Craft Plugin Store in the Craft CP.

# Locale Redirector plugin for Craft CMS

Locale Redirector detects the language preferences set by the user, via cookie or browser settings, and redirects to the appropriate localized version of the page requested, if the locale has been enabled for the site.

1. **Cookie:** If the user's language preference has been saved in a cookie named locale, and the requested url is for a different locale currently enabled for the site, the user will be redirected to the locale saved in the cookie, for the requested url. For example:

  ```
  Requested URL: http://site.com/blog/article-title
  Cookie Present: es
  Configured Site Locales: en, fr, de, pt, es
  Redirects To: http://site.com/es/blog/article-title
  ```

2. **Browser Language Settings:** If the language preference has not yet been saved to a cookie, then the plugin will attempt to find a match between the browser's preferred languages and the site's enabled locales. If a match is found, the user will be redirected to the matched language setting. For example:

  ```
  Requested URL: http://site.com/blog/article-title
  Cookie Present: n/a
  Browser Languages: es, en
  Configured Site Locales: en, fr, de, pt, es
  Redirects To: http://site.com/es/blog/article-title
  ```

## Installation

To install Locale Redirector, follow these steps:

1. Download & unzip the file and place the `localeredirector` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/vigetlabs/localeredirector.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `localeredirector` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

Locale Redirector works on Craft 2.5.x and Craft 2.6.x.

## Important Notes

This plugin assumes that language links are available to the user. You can build this list of links any way you want, using custom template code with advanced logic, but the simplest approach is to use a craft plugin called [Language Link](https://github.com/lindseydiloreto/craft-languagelink). It provides an easy way to switch between languages by automatically outputting the correct links to the same page in different locales.

You can then set a locale cookie when one of these links is clicked, via JavaScript. You can use document.cookie for this, or use the [js-cookie](https://github.com/js-cookie/js-cookie) utility, which couldn't be simpler. To set a locale cookie to "es" and have it exipre in 1 year:

```
Cookies.set('locale', 'es', { expires: 365 });
```

## Credits

<a href="http://code.viget.com">
  <img src="http://code.viget.com/github-banner.png" alt="Code At Viget">
</a>

Visit [code.viget.com](https://code.viget.com) to see more projects from [Viget](https://viget.com).
