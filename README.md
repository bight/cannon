# Packet Boat

[![Build Status](https://travis-ci.org/bight/packetboat.svg?branch=development)](https://travis-ci.org/bight/packetboat
)
[![Coverage Status](https://codecov.io/gh/bight/packetboat/branch/development/graph/badge.svg)](https://codecov.io/gh/bight/packetboat)
[![Packagist](https://img.shields.io/packagist/v/bight/packetboat.svg)](https://packagist.org/packages/bight/packetboat)

A service-agnostic vehicle for WordPress transactional email.

## Requirements

* PHP >= 5.6
* WordPress >= 4.7

And one of the following services:

* [Postmark](https://postmarkapp.com)
* [Mailgun](https://mailgun.com) (coming soon)
* [Sendgrid](https://sendgrid.com) (coming soon)

## Installation

If you're using [Bedrock](https://roots.io/bedrock):

`composer require bight/packetboat`

If you're not:

```
git clone --depth=1 https://github.com/bight/packetboat.git wp-content/plugins/packetboat
cd /wp-content/plugins/packetboat
rm -rf .git
composer install --no-dev
```

## Configuration

Activate the plugin (or network activate it if you're on WordPress Multisite). Then complete the service-specific configuration procedure.

### Postmark

Add the following lines to `wp-config.php`:

```
// Postmark server API token, see: http://developer.postmarkapp.com/developer-api-overview.html#authentication
define('POSTMARK_SERVER_TOKEN', 'your-postmark-server-token');

// Postmark verified sender signature, see: https://account.postmarkapp.com/signatures
define('POSTMARK_SENDER_SIGNATURE', 'foo@bar.com');
```

### Mailgun

TK.

### Sendgrid

TK.
