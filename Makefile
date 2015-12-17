all:

deb:
	equivs-build check-mk-agent-zope
	equivs-build omd-zope

install: deb
	sudo dpkg -i check-mk-agent-zope_*_all.deb
	omd-zope_*_all.deb
