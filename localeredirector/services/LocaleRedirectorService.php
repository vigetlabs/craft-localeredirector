<?php
namespace Craft;

class LocaleRedirectorService extends BaseApplicationComponent
{

	protected $expires;

	// Public Methods
	// =========================================================================

	/**
	 * Constructor
	 */
	public function __construct()
	{
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

	// Private Methods
	// =========================================================================

	/**
	 * Return a new url with locale included
	 * @param string $locale
	 */
	private function newUrl($locale)
	{
		$path = $this->path = craft()->request->getPath();
		$params = $this->querystring = craft()->request->getQueryStringWithoutPath();

		return UrlHelper::getSiteUrl($path, $params, null, $locale);
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
