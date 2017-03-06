# phpue for Hypermedia 2 and Web Technologies

This is the template repository for PHP and jQuery classes in Hypermedia 2 ([Media Technology and Design](https://www.fh-ooe.at/en/hagenberg-campus/studiengaenge/bachelor/media-technology-and-design/)) and Web Technologies ([Secure Information Systems](https://www.fh-ooe.at/en/hagenberg-campus/studiengaenge/bachelor/secure-information-systems/)).

Use these files as a start for the various exercises. HTML templates, CSS and PHP structures are already provided to help students focus purely on the exercise tasks.

## Technologies and Requirements

This code has been developed with the [XAMPP](https://www.apachefriends.org/) package in mind. Other development environments (MAMP, Vagrant images, Docker containers, etc.) will most likely as well but haven't been tested.

*You will need at least PHP 7.0 to run these examples since they make use of features such as type hinting or the null-coalescing operator.*

The following standards and conventions were used in the development of these examples:

* [PHP 7.0](http://php.net/manual/en/migration70.new-features.php)
* [HTML 5.1](https://www.w3.org/TR/html51/)
* [CSS3](https://www.w3.org/Style/CSS/)
* [PSR-1: Basic Coding Standard](http://www.php-fig.org/psr/psr-1/)
* [PSR-2: Coding Style Guide](http://www.php-fig.org/psr/psr-2/)
* [PSR Naming Conventions](http://www.php-fig.org/bylaws/psr-naming-conventions/)

## Structure of this Repository

Folder | Description
--- | ---
``/examples`` | Small example projects that are shown during classes to introduce certain aspects of PHP or jQuery. These can be used as references for exercises.
``/includes`` | PHP classes and files that are (re)-used throughout the different exercises. These contain general functionality that is not tied to a specific exercise.
``/sibue`` | Exercises for the Web-Technologies class in Secure Information Systems.
``/ue01`` | Exercise 1 for Hypermedia in Media Technology and Design. A money counter that uses regular expressions to find sums of money in some arbitrary text.
``/ue02`` | Exercise 2 for Hypermedia in Media Technology and Design. This a web for for ordering books, based on the procedural norm_form.
``/ue03`` | Exercise 3 for Hypermedia in Media Technology and Design. A number guessing game that employs sessions, based on the procedural norm_form.
``/ue04-06`` | Exercise 4, 5 and 6 for Hypermedia in Media Technology and Design. IMAR - The HM2 Image Archive, that uses file uploads, file writing, image processing and a login mechanism.
``/ue07-09`` | Exercise 7, 8 and 9 for Hypermedia in Media Technology and Design. An address book application that writes and reads XML, and uses jQuery for front end tasks and AJAX calls.
``/vendor`` | Third party libraries installed with composer or added as Git submodules: [jQuery](http://jquery.com/), [jsOnlyLightbox](https://github.com/felixhagspiel/jsOnlyLightbox) and [NormForm](https://github.com/Digital-Media/normform).
