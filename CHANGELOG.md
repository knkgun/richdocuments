# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/).

## [Unreleased] -


## [2.6.0] - 2021-05-31

## Fixed

- Only verify path if filename is given, additional log error - [#418](https://github.com/owncloud/richdocuments/pull/418)
- Don't log warning message on PUT in favour of debug - [#407](https://github.com/owncloud/richdocuments/pull/407)
- Prevent documents with tabs in filenames / or any other invalid chars from being created - [enterprise#4628](https://github.com/owncloud/enterprise/issues/4628)

### Changed 

- Introduced "Open documents in Secure View with watermark by default" setting - [#400](https://github.com/owncloud/richdocuments/pull/400) - [#402](https://github.com/owncloud/richdocuments/pull/402)
- Enable comments on PDFs - [#404](https://github.com/owncloud/richdocuments/pull/404)
- Use app icon for Open in Collabora action - [#406](https://github.com/owncloud/richdocuments/pull/406)


- Library updates


## [2.5.0] - 2021-04-28

### Changed

- In OC10.7 we changed the logic for encryption events -  [#392](https://github.com/owncloud/richdocuments/pull/392)
- Improved auditing capabilities for access via Collabora - [#371](https://github.com/owncloud/richdocuments/pull/371)
- Changes to allow opening documents explicitly with Collabora - [#370](https://github.com/owncloud/richdocuments/pull/370)
- Let wopi client decide the actions when token about to expire
- Translation updates
- Library updates

### Fixed
- Fix Public Links shared from Local Storage - [#385](https://github.com/owncloud/richdocuments/pull/385)
- Make Secure View licensing compatible with new license manager - [#356](https://github.com/owncloud/richdocuments/pull/356)
- Fix wrong default name


## [2.4.1] - 2020-10-19

### Changed
- Add warning for secure view regarding license
- Translation updates

### Fixed
- Hotfix for checking license for a specific feature in richdocuments


## [2.4.0] - 2020-07-30


[Unreleased]: https://github.com/owncloud/guests/compare/v2.5.0...master
[2.6.0]: https://github.com/owncloud/guests/compare/v2.5.0...v2.6.0
[2.5.0]: https://github.com/owncloud/guests/compare/v2.4.1...v2.5.0
[2.4.1]: https://github.com/owncloud/guests/compare/v2.4.0...v2.4.1
[2.4.0]: https://github.com/owncloud/guests/compare/v2.2.0...v2.4.0

