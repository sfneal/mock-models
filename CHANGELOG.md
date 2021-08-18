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
- cut sfneal/address dev-master allowed version


## 0.4.0 - 2021-04-26
- refactor `ModelAttributeAssertions` traits methods into `assertModelAttributesSame()` & `assertModelAttributesEqual()` methods


## 0.5.0 - 2021-04-26
- make `ModelBuilderTest`, `ModelFactoryTest` & `ModelRelationshipsTest` test interfaces
- add use of new interfaces in `PeopleTest`


## 0.6.0 - 2021-05-10
- make `MiddlewareEnable` interface & `EnableMiddleware` trait for using middleware mocks in test suites


## 0.7.0 - 2021-07-08
- make `InterfaceTest` trait for creating test classes that test interfaces
- add `InterfaceTestTest` for testing `InterfaceTest` trait


## 0.8.0 - 2021-07-30
- fix issue with sfneal/address package interdependency by removing requirement and adding a package suggestion

 
## 0.9.0 - 2021-08-04
- make `AssertInterface` trait with custom assertion methods
- refactor `ModelAttributeAssertions` trait to `AssertModelAttributes`

 
## 0.9.1 - 2021-08-04
- make `AssertArrayValues` trait with custom assertion methods
- add 'ext-json' to composer requirements


## 0.9.2 - 2021-08-18
- fix sfneal/address min version to v1.2 since broken v1.2.0 & v1.2.1 versions have been removed
