QUICK START
===========

Zope buildout::

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
* zopememory ...
