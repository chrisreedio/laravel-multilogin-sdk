# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel package that provides an SDK for the Multilogin API. The package uses the Saloon HTTP client library to interact with Multilogin's REST API, providing a structured way to manage browser profiles, proxies, cookies, and other browser automation features.

## Development Commands

Based on the composer.json scripts section, use these commands:

```bash
# Run tests
composer test
# or directly with Pest
vendor/bin/pest

# Run tests with coverage
composer test-coverage
# or directly
vendor/bin/pest --coverage

# Format code with Laravel Pint
composer format
# or directly
vendor/bin/pint

# Run static analysis
composer analyse
# or directly
vendor/bin/phpstan analyse

# Prepare/setup package
composer prepare
# or directly
php vendor/bin/testbench package:discover --ansi
```

## Architecture Overview

### Core Structure
- **Main SDK Class**: `ChrisReedIO\MultiloginSDK\MultiloginSDK` - Extends Saloon's Connector class
- **Base URL**: `https://api.multilogin.com`
- **Service Provider**: `MultiloginSDKServiceProvider` - Registers config, views, migrations, and commands
- **Facade**: `MultiloginSDK` facade available via Laravel's service container

### Request-Resource Pattern
The SDK follows Saloon's resource-based architecture:

- **Resources** (in `src/Resource/`): Group related API endpoints logically
  - Each resource class extends `Saloon\Http\BaseResource`
  - Resources contain methods that return `Saloon\Http\Response` objects
  - Examples: `Launcher`, `ProfileManagement`, `ObjectStorage`, `TwoFactor`

- **Requests** (in `src/Requests/`): Individual API endpoint implementations
  - Organized by resource type in subdirectories
  - Each request class extends `Saloon\Http\Request`
  - Define HTTP method, endpoint, query parameters, and headers
  - Example: `src/Requests/Launcher/StartBrowserProfile.php`

### Available Resources
- **BookmarkManagement**: Import/export bookmarks
- **BrowserProfileData**: Manage profile data and unlock locked profiles
- **Launcher**: Core browser operations (start/stop profiles, manage browser cores)
- **ObjectStorage**: Manage extensions and objects in cloud storage
- **PreMadeCookies**: Handle pre-made cookie sets
- **ProfileAccessManagement**: User authentication and workspace management
- **ProfileImportExport**: Import/export profile data
- **ProfileManagement**: Create, update, clone, and manage profiles
- **Proxy**: Proxy validation and management
- **ScriptRunner**: Execute automation scripts with Selenium
- **TwoFactor**: Two-factor authentication management

## Testing Framework

- **Framework**: Uses Pest PHP testing framework
- **Base Class**: `ChrisReedIO\MultiloginSDK\Tests\TestCase` extends Orchestra Testbench
- **Test Location**: `tests/` directory
- **Configuration**: Tests use Orchestra Testbench for Laravel package testing
- **Quality Tools**: PHPStan (level 5), Laravel Pint for code formatting

## Package Structure

- **Config**: `config/multilogin-sdk.php` (currently empty but published via service provider)
- **Migrations**: Database migration stub in `database/migrations/`
- **Views**: Resources directory for publishable views
- **Factories**: Model factory support in `database/factories/`
- **Commands**: Artisan command in `src/Commands/MultiloginSDKCommand.php`

## Laravel Integration

The package integrates with Laravel through:
- Service provider auto-discovery
- Publishable config file: `php artisan vendor:publish --tag="laravel-multilogin-sdk-config"`
- Publishable migrations: `php artisan vendor:publish --tag="laravel-multilogin-sdk-migrations"`
- Publishable views: `php artisan vendor:publish --tag="laravel-multilogin-sdk-views"`
- Facade registration for easy access: `MultiloginSDK::launcher()->startBrowserProfile(...)`

## Key Dependencies

- **saloonphp/saloon**: HTTP client library for API interactions
- **spatie/laravel-package-tools**: Laravel package development utilities
- **pestphp/pest**: Testing framework
- **larastan/larastan**: PHPStan integration for Laravel