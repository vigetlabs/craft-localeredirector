# Locale Redirector plugin for Craft CMS

Locale Redirector detects the language preferences set by the user, via cookie or browser settings, and redirects to the appropriate localized version of the page requested, if the locale has been enabled for the site.

1. **Cookie:** If the user's language preference has been saved in a cookie (named locale), and the requested url is for a different locale currently enabled for the site, the user will be redirected to the correct locale for the requested url. For example:

  ```
  Requested URL: http://site.com/
  Cookie: es
  Site Locales: en, fr, de, pt, es
  Redirects To: http://site.com/es
  ```

2. **Browser Language Settings:** If the language preference has not yet been saved to a cookie, then the plugin will attempt to find a match between the browser's preferred languages and the site's enabled locales. If a match is found, the user will be redirected to the matched language setting. For example:

  ```
  Requested URL: http://site.com/
  Cookie: n/a
  Browser Languages: es, en
  Site Locales: en, fr, de, pt, es
  Redirects To: http://site.com/es
  ```

## Installation

To install Locale Redirector, follow these steps:

1. Download & unzip the file and place the `localeredirector` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/vigetlabs/localeredirector.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `localeredirector` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

Locale Redirector works on Craft 2.5.x and Craft 2.6.x.

## Locale Redirector Roadmap

Some things to do, and ideas for potential features:

* Make locale cookie name and expiration configurable

## Locale Redirector Changelog

### 1.0.0 -- 2016.10.03

* Initial release

<a href="http://code.viget.com">
  <img src="http://code.viget.com/github-banner.png" alt="Code At Viget">
</a>

Visit [code.viget.com](http://code.viget.com) to see more projects from [Viget](https://viget.com).
