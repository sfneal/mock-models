# Changelog

All notable changes to `mock-models` will be documented in this file


## 0.1.0 - 2021-04-13
- initial pre-release


## 0.2.0 - 2021-04-20
- make Utils\Interfaces & Utils\Traits namespaces for testing tools


## 0.2.1 - 2021-04-20
- fix sfneal/address composer requirement to allow for 'dev' & 'master' branch installations
- add $eventsToFake param to `EventFaker` trait's `eventFaker()` method


## 0.2.2 - 2021-04-20
- fix sfneal/address composer requirement to allow any 'dev-' branch


## 0.3.0 - 2021-04-21
- make `RequestCreator` interface for implementing custom request creators in test suites
- add tests for `CreateRequest`, `EventFaker` & `QueueFaker` traits
- add laravel/framework min version v8.34 composer requirement


## 0.3.1 - 2021-04-22
- add registering of the `AddressServiceProvider` to `MockModelsServiceProvider`
- add "minimum-stability": "dev" to composer.json to try & fix issue with sfneal/address Travis CI pipeline
