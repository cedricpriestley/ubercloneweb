README file for Commerce Stripe

CONTENTS OF THIS FILE
---------------------
* Introduction
* Requirements
* Installation
* Configuration
* How it works
* Troubleshooting
* Maintainers

INTRODUCTION
------------
This project integrates Stripe online payments into
the Drupal Commerce payment and checkout systems.
https://stripe.com/docs/quickstart
* For a full description of the module, visit the project page:
  https://www.drupal.org/project/commerce_stripe
* To submit bug reports and feature suggestions, or to track changes:
  https://www.drupal.org/project/issues/commerce_stripe


REQUIREMENTS
------------
This module requires the following:
* Submodules of Drupal Commerce package (https://drupal.org/project/commerce)
  - Commerce core,
  - Commerce Payment (and its dependencies);
* Stripe PHP Library (https://github.com/stripe/stripe-php);
* Stripe Merchant account (https://dashboard.stripe.com/register).


INSTALLATION
------------
* This module needs to be installed via Composer, which will download
the required libraries.
composer require "drupal/commerce_stripe"
https://www.drupal.org/docs/8/extending-drupal-8/installing-modules-composer-dependencies

CONFIGURATION
-------------
* Create new Stripe payment gateway
  Administration > Commerce > Configuration > Payment gateways > Add payment gateway
  Stripe specific settings available:
  - Secret key.
  - Publishable key.
  All those API credentials are provided by the Stripe merchant account. It is
  recommended to enter test credentials and then override these with live
  credentials in settings.php. This way live credentials will not be exported to code.


HOW IT WORKS
------------

* General considerations:
  - Shop owner must have an Stripe merchant account
    Sign up
    https://dashboard.stripe.com/register
  - Customer should have a valid credit card.

* Checkout workflow:
  It follows the Drupal Commerce Credit Card workflow.
  The customer should enter its credit card data
  or to select one of the existing Stripe payment methods.

* Payment Terminal
  The store owners can Void, Capture and Refund the Stripe payments.


TROUBLESHOOTING
---------------
* No troubleshooting pending for now.


MAINTAINERS
-----------
Current maintainers:
* Tavi Toporjinschi (vasike) - https://www.drupal.org/u/vasike
* Scott Hooker (scotthooker) - https://www.drupal.org/u/scotthooker

This project has been developed by:
* TES Global
  TES Global is a digital education company that has been supporting educators
  for over 100 years. Our mission is to help teachers, schools and universities
  to develop and deliver the best education.
  Visit https://www.tes.com for more information.
* Commerce Guys by Actualys
  Visit https://commerceguys.fr for more information.
