# wamba

Add in your sudoers file:

    User_Alias	APACHE = www-data

    # Cmnd alias specification

    Cmnd_Alias	SAMBA = /usr/bin/smbstatus, /usr/bin/wbinfo

    # User privilege specification
    root	ALL=(ALL:ALL) ALL


    APACHE	ALL = (ALL) NOPASSWD: SAMBA

