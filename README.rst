check-mk-zope
=============

This package provides a plugin for OMD/check_mk
to monitor the status of your Zope2 instances

Install check-mk-zope on Debian
===============================

This package has a Makefile.
The command make deb builds two deb files:

 - check-mk-agent-zope_1.2-0_all.deb
 - omd-zope_1.2-0_all.deb

With this content::

    [ale@kenobi check-mk-zope]$ dpkg --contents omd-zope_*_all.deb|awk '{print $6}'
    ./
    ./omd/
    ./omd/versions/
    ./omd/versions/default/
    ./omd/versions/default/share/
    ./omd/versions/default/share/check_mk/
    ./omd/versions/default/share/check_mk/checks/
    ./omd/versions/default/share/check_mk/checks/zope2
    ./omd/versions/default/share/check_mk/pnp-templates/
    ./omd/versions/default/share/check_mk/pnp-templates/check_mk-zope2.zopethreads.php
    ./omd/versions/default/share/check_mk/pnp-templates/check_mk-zope2.zodbactivity.php
    ./omd/versions/default/share/check_mk/pnp-templates/check_mk-zope2.zopecache.php
    ./omd/versions/default/share/check_mk/pnp-templates/check_mk-zope2.zopememory.php
    ./usr/
    ./usr/share/
    ./usr/share/doc/
    ./usr/share/doc/omd-zope/
    ./usr/share/doc/omd-zope/README.Debian
    ./usr/share/doc/omd-zope/changelog.Debian.gz
    ./usr/share/doc/omd-zope/copyright
    [ale@kenobi check-mk-zope]$ dpkg --contents check-mk-agent-zope_1.2-0_all.deb|awk '{print $6}'
    ./
    ./usr/
    ./usr/share/
    ./usr/share/doc/
    ./usr/share/doc/check-mk-agent-zope/
    ./usr/share/doc/check-mk-agent-zope/README.Debian
    ./usr/share/doc/check-mk-agent-zope/changelog.Debian.gz
    ./usr/share/doc/check-mk-agent-zope/copyright
    ./usr/lib/
    ./usr/lib/check_mk_agent/
    ./usr/lib/check_mk_agent/plugins/
    ./usr/lib/check_mk_agent/plugins/mk_zope2
    ./etc/
    ./etc/check_mk/
    ./etc/check_mk/zope2.conf

The command `make install` builds and installs the deb packages.

Inventorize this plugin
=======================

Once installed, this plugin should be autodiscovered by check_mk.
You can update your inventory through the web or using the command line::

    OMD[omd]:~$ cmk -IIv my.host|grep zope
        1 zope2.zodbactivity
        1 zope2.zopecache
        1 zope2.zopeinstance
        1 zope2.zopememory
        1 zope2.zopethreads

Then restart omd::

    OMD[omd]:~$ cmk -R
    Generating configuration for core (type nagios)...OK
    Validating Nagios configuration...OK
    Precompiling host checks...OK
    Restarting monitoring core...OK

Tested on
=========

This package versions has been tested on:

 - Debian jessie 8.2
 - Zope2-2.13.23
 - omd-1.20

Troubleshoting
==============

If you are running a different version of omd, you may want to add it
in the following line::

    [ale@kenobi check-mk-zope]$ grep ^Depends omd-zope
    Depends: omd-0.52 | omd-0.54 | omd-1.20

Zope configuration
==================

Your zope instance should depend on munin.zope >= 1.3.1
and be configured with a munin.zope secret

If your using buildout this translates into::

  [instance]
  eggs =
       ...
       munin.zope >= 1.3.1

  zcml =
       ...
       munin.zope

  zope-conf-additional =
       <product-config munin.zope>
           secret MYSECRET
       </product-config>

TODO
====
* package: http://mathias-kettner.de/checkmk_packaging.html
* perfometer: http://mathias-kettner.de/checkmk_devel_perfometer.html
* counter: http://mathias-kettner.de/checkmk_devel_counters.html
* release package(s) on http://exchange.check-mk.org/
* parameters should be configurable by wato
* zopememory ...
