# wamba
## What's wamba

Wamba (Web Samba) it's a simple tool to show connected user to a samba server and some useful informations
about them (SID, UID and so on) it doesn't needs authentication 'cause it's a read only tool

## How to install

Install php (on Debian: libapache2-mod-php5)

Add in your sudoers file:

    User_Alias	APACHE = www-data

    # Cmnd alias specification

    Cmnd_Alias	SAMBA = /usr/bin/smbstatus, /usr/bin/wbinfo

    # User privilege specification
    root	ALL=(ALL:ALL) ALL


    APACHE	ALL = (ALL) NOPASSWD: SAMBA

