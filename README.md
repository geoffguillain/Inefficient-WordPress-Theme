# The Inefficient WordPress Theme
An intentionally inefficient theme developed for WordPress developer education.

## Why an inefficient theme?

Imagine that another developer has asked you to look at a theme that is currently in development to check performance issues and help them fix any that are present. Would you know what to look for and how to fix the problems? Well, a fun challenge has arrived that will test, and hopefully improve, your knowledge in this crucial area of theme development. I have developed a small, but inefficient theme that requires a rigorous review and suggestions for fixes.

## How to review it?

Feel free to fork the theme or clone it to your local environment. The theme does not have any front end output, all the code that needs to be reviewed stands in the `./inneficient/` folder so you should focus your review there. All the functions are working and return the right results but all of them would tremendously slow the website at scale.


## Recommended Tools

- [PHPCS with VIP GO Minimum ruleset](https://wpvip.com/documentation/how-to-install-php-code-sniffer-for-wordpress-com-vip/)
- [Query Monitor Plugin](https://wordpress.org/plugins/query-monitor/)
- [Documentation](https://wpvip.com/documentation/)


**Please remember not to run this theme or any of the snippet functions that are in the inefficient folder on any server that is accessible to the internet!**