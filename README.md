# Laravel Multilogin SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chrisreedio/laravel-multilogin-sdk.svg?style=flat-square)](https://packagist.org/packages/chrisreedio/laravel-multilogin-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/chrisreedio/laravel-multilogin-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/chrisreedio/laravel-multilogin-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/chrisreedio/laravel-multilogin-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/chrisreedio/laravel-multilogin-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/chrisreedio/laravel-multilogin-sdk.svg?style=flat-square)](https://packagist.org/packages/chrisreedio/laravel-multilogin-sdk)

A comprehensive Laravel package that provides an elegant SDK for the Multilogin API. This package allows you to manage browser profiles, automate browser sessions, handle proxies, and perform advanced browser fingerprinting operations through Multilogin's powerful antidetect browser platform.

Built on top of the robust [Saloon HTTP client](https://docs.saloon.dev/), this SDK provides a clean, Laravel-friendly interface to all of Multilogin's API endpoints with full type safety and IDE autocompletion.

## Features

- **Complete API Coverage**: Access all Multilogin API endpoints through intuitive resource classes
- **Browser Profile Management**: Create, update, clone, and manage browser profiles with ease  
- **Advanced Proxy Support**: Validate and manage proxy configurations
- **Cookie Management**: Handle pre-made cookies and import/export functionality
- **Two-Factor Authentication**: Full 2FA management capabilities
- **Object Storage**: Manage extensions and cloud storage objects
- **Script Runner**: Execute Selenium automation scripts with browser profiles
- **Laravel Integration**: Service provider, facade, and publishable config/migrations
- **Type Safety**: Full PHP type declarations and IDE autocompletion support

## Installation

You can install the package via composer:

```bash
composer require chrisreedio/laravel-multilogin-sdk
```

Optionally, you can publish the config file:

```bash
php artisan vendor:publish --tag="laravel-multilogin-sdk-config"
```

You can also publish migrations and views if needed:

```bash
# Publish migrations
php artisan vendor:publish --tag="laravel-multilogin-sdk-migrations"
php artisan migrate

# Publish views  
php artisan vendor:publish --tag="laravel-multilogin-sdk-views"
```

## Usage

### Basic Setup

```php
use ChrisReedIO\MultiloginSDK\MultiloginSDK;

// Create SDK instance
$sdk = new MultiloginSDK();

// Or use the facade
use MultiloginSDK;
```

### Browser Profile Management

```php
// Start a browser profile
$response = $sdk->launcher()->startBrowserProfile(
    folderId: 'your-folder-id',
    profileId: 'your-profile-id',
    automationType: 'selenium'
);

// Create a new profile
$response = $sdk->profileManagement()->profileCreate([
    'name' => 'My New Profile',
    'browser' => 'mimic',
    'os' => 'win'
]);

// Stop a running profile
$response = $sdk->launcher()->stopBrowserProfile('your-profile-id');
```

### Proxy Management

```php
// Validate a proxy
$response = $sdk->launcher()->validateProxy(
    type: 'http',
    host: '127.0.0.1',
    port: '8080',
    username: 'user',
    password: 'pass'
);
```

### Quick Profile Operations

```php
// Start a quick profile with custom settings
$response = $sdk->launcher()->startQuickProfileV3(
    browserType: 'mimic',
    osType: 'windows',
    automation: 'selenium'
);

// Get status of all profiles
$response = $sdk->launcher()->getAllProfilesStatus();
```

### Available Resources

The SDK provides access to all Multilogin API endpoints through these resource classes:

- `bookmarkManagement()` - Import/export bookmarks
- `browserProfileData()` - Manage profile data 
- `launcher()` - Core browser operations
- `objectStorage()` - Manage extensions and cloud objects
- `preMadeCookies()` - Handle pre-made cookie sets
- `profileAccessManagement()` - User authentication and workspaces
- `profileImportExport()` - Import/export profile data
- `profileManagement()` - Create, update, manage profiles
- `proxy()` - Proxy validation and management  
- `scriptRunner()` - Execute automation scripts
- `twoFactor()` - Two-factor authentication

## Testing

Run the test suite:

```bash
composer test

# With coverage
composer test-coverage

# Run static analysis
composer analyse

# Format code
composer format
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Chris Reed](https://github.com/chrisreedio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
