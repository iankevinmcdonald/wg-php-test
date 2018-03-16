# wg-php-test

WG Coding Test

Front End
=========

See 'front' directory.

Back end
========

See 'wg_test' (which is a child theme of twentyfifteen, as I thought that was the best way to show the code)

(NB: If the WordPress URL option is set as 'plain', then the Wordpress REST API at `wp-json/wp/v2/wg_recipes/` is not exposed. This seems to be a bug in WordPress.)

General Questions
=================

1. What do I think many websites do wrong?

Far too many website build for the CEO rather than the user, with the result that
they look very flash, but load very slowly for people on old computers and bad
connections. Far too often, I've had an urgent need to call a business from my
mobile, and had to wait for a large home page image to load before I can get to
their phone number.

As web developers, we do sometimes need to be able to tell stories to CEOs to
explain why they'd be better off without loading everything on the home page. 
But the other half of it is to build standards-compliant websites (eg with 
image height and width attributes) that let users take advantage of features
like source selection.

2. Bug replication

Bug replication boils down to the rote task of replicating conditions.
What browser, version, and OS is my colleague using? What steps is he/she
taking beforehand? Is the bug intermittent? 

If that doesn't work, then start looking at things you wouldn't expect to
make any difference. If I login with their (test) account from my machine, 
or if they log on from mine, for example? This can catch times when the
conditions that replicate the bug are related to the user state.

This is a two-pronged approach. I'm trying to reproduce their circumstances
in order to reproduce the bug. But also, for evasive bugs, it's worth them trying 
to reproduce my conditions to discover when they *don't* get the bug.

It's not just a question of being able to reproduce it. Once you've found the 
exact conditions that trigger the bug, you're halfway to fixing it.

