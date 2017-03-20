<?php
namespace Craft;

class LocaleRedirectorPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Locale Redirector');
	}

	public function getDescription()
	{
		return Craft::t('Detects the language preferences set by the user, via cookie or browser settings, and redirects to the appropriate locale, if it exists.');
	}

	public function getVersion()
	{
		return '1.0.1';
	}

	public function getDeveloper()
	{
		return 'Jeremy Frank';
	}

	public function getDeveloperUrl()
	{
		return 'http://viget.com';
	}

	public function getDocumentationUrl()
	{
		return 'https://github.com/vigetlabs/craft-localeredirector';
	}

	public function getReleaseFeedUrl()
	{
		return 'https://raw.githubusercontent.com/vigetlabs/craft-localeredirector/master/releases.json';
	}

	public function init()
	{
		// redirects only take place out of the CP
		if(!craft()->isConsole() && craft()->request->isSiteRequest() && !craft()->request->isLivePreview()) {
			$currentLocale = craft()->i18n->getLocaleById(craft()->language);
			$localeCookie = isset($_COOKIE['locale']) ? $_COOKIE['locale'] : null;
			$browserLanguageMatch = craft()->localeRedirector->getBrowserLanguageMatch();

			// if there is a locale cookie
			// redirect if it doesn't match the locale of the page requested
			if ($localeCookie && $currentLocale != $localeCookie) {
				craft()->localeRedirector->redirectToLocale($localeCookie);
			}

			// if there is no locale cookie
			// redirect if there is a match between browser language settings and available Craft locales
			if (!$localeCookie && $browserLanguageMatch) {
				craft()->localeRedirector->redirectToLocale($browserLanguageMatch);
			}
		}
	}
}
