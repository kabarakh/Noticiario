==========
Noticiario
==========

A small file based news system made for a friend of mine

Usage
=====

Just include Noticiario.php at the place where you want to display the news. The script looks in the same folder for a dataFile.txt and parses that.

------------
dataFile.txt
------------

The dataFile.txt must have the following layout:

::
  date: 20130320                                                                  
  title: New project
  Today, my new project was started.
  It is a news system for a friend.
  Multiline article
  ----
  date: 20130321
  title: Noticiario ready
  Noticiario can be released to the website!

A line starting with date: (and with a string following with the format YYYYMMDD) is used as the date of the article, title: is used as the title. Every other line is appended to the article text.
