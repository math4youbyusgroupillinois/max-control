#!/bin/sh
set -e

cp debian/control.zentyal debian/control
VERSION=$(dpkg-parsechangelog | awk '/^Version/ {print $2}')


[ "$1" != "nobuild" ] && debuild -us -uc -I


[ "$1" != "noupload" ] && rsync --bwlimit=500 -Pavz ../*${VERSION}* max.educa.madrid.org:/usr/local/max/logs/trac/incoming/branches/max-zentyal/
[ "$1" != "noupload" ] && ssh max.educa.madrid.org -t /usr/local/max/logs/root/bin/inject_incoming branches/max-zentyal



fakeroot debian/rules clean
rm -f debian/control
