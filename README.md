# blog-php
Blog made using PHP and MySQL
You can see it working at https://myhub.page/blog/

A simple example of programming using HTML, CSS, PHP and SQL.

Data entry fields are protected with forms of code cleaning to avoid code injection by users.

First we access the registration and login where we create our particular user. This user is saved in a different table than posts. The access password of each user is hidden with a hash to prevent someone from knowing it.

The registration and access form has a "Honey Pot" which is a trap for bots to fill in an invisible field and thus avoid spam. It is also used in the search bar. This system joins a CSS property to hide a field from the user that a bot can see.

In addition to its own CCS styles, it incorporates a "normalize" sheet to avoid the most common interpretation errors in different browsers.

Each registered user can create their posts. The post form verifies that all fields are filled out before creating a post. That includes an image. When the post is created, it includes who created it and the creation date.

Created posts can be viewed from the home page. You can also use the search bar part of a desired content. The blog has a pagination that places the desired number of posts on each page. This number can be easily adjusted.

In each displayed post there is a link to its author to access all the posts created by that author.

Each user has a control panel from which they can create, view, modify or delete their posts.

From the contact form you can send me a message. This contact form also has a "Honey Pot" and verification to complete the fields and that the email is correct.

The construction of the blog has been done by modules so that it is easy to maintain, and to be able to expand it easily. In this case it is a demonstration of functionalities focused on users with large screens, and therefore it is not responsive.

All the main functions are collected in a single file and are written using "object-oriented programming".
