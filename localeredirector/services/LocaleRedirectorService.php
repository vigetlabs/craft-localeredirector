<?php
namespace Craft;

class LocaleRedirectorService extends BaseApplicationComponent
{

  protected $path;
  protected $querystring;
  protected $expires;

  // Public Methods
  // =========================================================================

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->path = craft()->request->getPath();
    $this->querystring = craft()->request->getQueryStringWithoutPath();
    $this->expires = 60 * 60 * 24 * 365; // 1 year
  }

  /**
   * Redirect to provided locale
   * @param string $locale
   */
  public function redirectToLocale($locale)
  {
    $url = $this->newUrl($locale);
    $this->setCookie('locale', $locale, time() + $this->expires);
    craft()->request->redirect($url, true, 302);
  }

  /**
   * Tries to find a match between the browser's preferred locales and the
   * site's configured locales.
   * Craft provides getTranslatedBrowserLanguage(), but it matches against all
   * of Craft's application locales using getAppLocaleIds()
   *
   * @return string
   */
  public function getBrowserLanguageMatch()
  {
    $browserLanguages = craft()->request->getBrowserLanguages();

    if ($browserLanguages)
    {
      $siteLocaleIds = craft()->i18n->getSiteLocaleIds();

      foreach ($browserLanguages as $language)
      {
        if (in_array($language, $siteLocaleIds))
        {
          return $language;
        }
      }
    }

    return false;
  }

  // Private Methods
  // =========================================================================

  /**
   * Return a new url with locale included
   * @param string $locale
   */
  private function newUrl($locale)
  {
    $qs = $this->querystring ? '?' . $this->querystring : '';

    return UrlHelper::getSiteUrl($this->path, null, null, $locale) . $qs;
  }

  /**
   * Set a cookie
   * @param string $name
   * @param string $value
   * @param int $expire
   * @param string $path
   * @param string $domain
   * @param mixed $secure
   * @param mixed $httponly
   */
  private function setCookie($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
  {
    setcookie($name, $value, (int) $expire, $path, $domain, $secure, $httponly);
    $_COOKIE[$name] = $value;
  }
}
