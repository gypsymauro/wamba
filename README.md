# wamba
## What's wamba

Wamba (Web Samba) it's a simple WEB GUI to samba's tools (smbstatus and wbinfo), it shows connected user to a samba server and some useful informations
and tools:
* list of the connected users;
* a VNC protocol link to connect to the users's clients;
* list of locked files;
* simple tail of configured log files;
* can delete parent.lock file from firefox profile

it doens't needs authentication 'cause it's a readonly tool,
at work we use it to monitor the server where Roaming Profiles and Redirected Folders are stored.

## What's not wamba

It's not a tool for configuring samba its just for monitoring

## How to install

Install php and sudo (on Debian: apt-get install libapache2-mod-php5 sudo) 

Add in your sudoers file:

    User_Alias	APACHE = www-data

    # Cmnd alias specification

    Cmnd_Alias	SAMBA = /usr/bin/smbstatus, /usr/bin/wbinfo , /usr/bin/find,/bin/rm, /bin/kill

    # User privilege specification
    root	ALL=(ALL:ALL) ALL

    APACHE	ALL = (ALL) NOPASSWD: SAMBA
