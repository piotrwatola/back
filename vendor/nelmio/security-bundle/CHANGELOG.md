### 2.5.1 (2018-03-21)

- Abort CSP compiler pass when CSP is not enabled

### 2.5.0 (2018-02-26)

  * Allows matching the query parameter for clickjacking protection
  * Cleanup content type restrictable listener
  * Added Symfony 4 support
  * Added support for 'worker-src' CSP directive
  * Removed PHP 5.3 support guarantees
  * Fix CSP noise filter compiler pass registration

### 2.4.0 (2017-06-22)

  * Deprecate calling ContentSecurityPolicyListener::getNonce without usage ('script' or 'style')
  * Added `forced_ssl > redirect_status_code` option to allow switching to permanent redirect (301) responses
  * Fixed HSTS header being sent even in non-secure responses unnecessarily
  * Fixed URLs with whitespace prefix not being seen as external redirects

### 2.3.1 (2017-03-17)

  * Fix arguments for Twig extension

### 2.3.0 (2017-03-17)

  * Add support for script-src 'strict-dynamic' (see https://w3c.github.io/webappsec-csp/#strict-dynamic-usage)
  * Improve CSP filtering
  * Remove Twig extension compiler pass in favor of tag
  * Use symfony/phpunit-bridge for testing on IC

### 2.2.4 (2017-02-13)

  * Fix exceptions thrown by Report::fromRequest

### 2.2.3 (2017-02-13)

  * Improve CSP filtering

### 2.2.2 (2017-02-07)

  * Improve CSP filtering
  * Fix injected script noise detector loading

### 2.2.1 (2017-02-07)

  * Fix dependency on UAParser

### 2.2.0 (2017-02-06)

  * Add CSP report filter
  * Fix Twig 2 support

### 2.1.0 (2017-01-26)

  * Add support for Referrer Policy
  * Content-Security-Policy header can now be disabled
  * Fix encrypter deprecation
  * Run the test suite on PHP 7.1
  * Run the test suite with lowest dependencies

### 2.0.4 (2016-10-19)

  * Enable manifest-src directive for Chrome, Opera and Firefox

### 2.0.3 (2016-10-13)

  * Fix deprecation warning with latest Twig 1.x

### 2.0.2 (2016-08-24)
  * Fix typo in the ALLOW-FROM implementation
  * Update browser_adaptive configuration. Allow custom adapters
  * Add Doctrine Cache and Psr Cache adapters for caching UA family parser

### 2.0.1 (2016-06-04)
  * Fix CookieSessionHandler::open that should return true unless there's an error

### 2.0.0 (2016-05-17)
  * Add support for Content-Security-Policy Level 2 directives
  * Add support for Content-Security-Policy Level 2 signatures (nonce and message digest)
  * Add browser adaptive directives - do not send directives not supported by browser - via browser_adaptive parameter
  * Allow report-uri to be defined as a scalar
  * Deprecate encrypted cookie support du to high coupling to mcrypt deprecated extension
  * Drop backward-compatibility with first deprecated CSP configuration

### 1.10.0 (2016-02-23)

  * Added ability to restrict forced_ssl capability to some hostnames only
  * Fixed Symfony 3 compatibility

### 1.9.1 (2016-01-17)

  * BugFix: Fix LoggerInterface type hints to support PSR-3 loggers and not only Symfony 2.0 loggers

### 1.9.0 (2016-01-04)

  * Add Symfony 3 compatibility
  * external_redirects definition can now contains full URL
  * Allow dynamic CSP configuration
  * BugFix: Fix clickjacking URL normalization when containing dash and no underscore

### 1.8.0 (2015-09-12)

  * Added HTTP response's content-type restriction for Clickjacking and CSP headers.
  * Added Microsoft's XSS-Protection support
  * Disabled Clickjacking, CSP and NoSniff headers in the context of HTTP redirects
  * Fixed bug in handling of the external_redirects.log being disabled

### 1.7.0 (2015-05-10)

  * Added a `Nelmio\SecurityBundle\ExternalRedirect\TargetValidator` interface to implement custom rules for the external_redirects feature. You can override the `nelmio_security.external_redirect.target_validator` service to change the default.
  * Added a `hosts` key in the CSP configuration to restrict CSP-checks to some host names
  * Fixed a bug in `flexible_ssl` where the auth cookie was updated with a wrong expiration time the second time the visitor comes to the site.
  * Removed X-Webkit-CSP header as none of the webkits using it are still current.

### 1.6.0 (2015-02-01)

  * Added a `forced_ssl.hsts_preload` flag to allow adding the preload attribute on HSTS headers

### 1.5.0 (2015-01-01)

  * Added ability to have different configs for both reported and enforced CSP rules
  * Added support for ALLOW and ALLOW-FROM syntaxes in the Clickjacking Protection
  * Added support for HHVM and PHP 5.6
  * Fixed enabling of cookie signing when the cookie list is empty

### 1.4.0 (2014-02-13)

  * Added default controller to log CSP violations
  * Added a flag to remove outdated non-standard CSP headers and only send the `Content-Security-Policy` one

### 1.3.0 (2014-01-08)

  * Added support for setting the X-Content-Type-Options header

### 1.2.0 (2013-07-29)

  * Added Content-Security-Policy (CSP) 1.0 support
  * Added forced_ssl.whitelist property to define URLs that do not need to be force-redirected
  * Fixed session loss bug on 404 URLs in the CookieSessionHandler

### 1.1.0 (2013-03-27)

  * Added a cookie session storage (use only if really needed, and combine it with `encrypted_cookie`)
  * Fixed error reporting if mcrypt is not enabled and you try to use encryption

### 1.0.0 (2013-01-08)

  * Initial release