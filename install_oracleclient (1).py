import getpass
import os,sys
import re
#import requests
#from requests.auth import HTTPBasicAut
from urllib2 import urlopen, URLError, HTTPError
import base64
import urllib2

def dlfile(url,filep,user,passwd):
    # Open the url
    try:
        url=url+filep
        request = urllib2.Request(url)
        base64string = base64.b64encode(user+':'+passwd)
        request.add_header("Authorization", "Basic %s" % base64string)
        f = urllib2.urlopen(request)
        print "downloading " + url

        # Open our local file for writing
        with open(filep, "wb") as local_file:
            local_file.write(f.read())
        return 0

    #handle errors
    except HTTPError, e:
        #print "HTTP Error:", e.code, url
        return e.code
    except URLError, e:
        return e.code
        #print "URL Error:", e.reason, url


def getshell():
    val = os.popen("echo $0")
    return val.readlines()[0].strip()




def determineFlavor():
    """Return the current flavor"""
    """ Taken from eups """
    
    uname = os.uname()[0]
    mach =  os.uname()[4]

    if uname == "Linux":
       if re.search(r"_64$", mach):
           flav = "Linux64"
       else:
           flav = "Linux"
    elif uname == "Darwin":
       if re.search(r"(^x86_64|i386)$", mach):
           flav = "DarwinX86"
       else:
           flav = "Darwin"
    elif uname == "SunOS":
        if re.search(r"^sun4", mach):
            flav = "SunOS"
        else:
            flav = "SunOSX86"
    else:
        raise RuntimeError, ("Unknown flavor: (%s, %s)" % (uname, mach))

    return flav




from os.path import expanduser
home = expanduser("~")

oracle_dir=os.path.join(home,'LOCAL_ORACLE')

print
oracle= raw_input("Please enter folder for oracleclient to be installed["+oracle_dir+"]:") or oracle_dir
print
if not os.path.exists(oracle): os.makedirs(oracle)
os.chdir(oracle)

flavor=determineFlavor()

print 'Flavor = ', flavor

VERSION='11.2.0.3.0'
files=[]
if flavor=='Linux64':
    files.append('instantclient-basic-linux.x64-'+VERSION+'.zip')
    files.append('instantclient-jdbc-linux.x64-'+VERSION+'.zip')
    files.append('instantclient-sdk-linux.x64-'+VERSION+'.zip')
    files.append('instantclient-sqlplus-linux.x64-'+VERSION+'.zip')
    files.append('instantclient-sqlldr-linux.x64-'+VERSION+'.zip')
elif flavor=='Linux':
  files.append('instantclient-basic-linux-'+VERSION+'.zip')
  files.append('instantclient-jdbc-linux-'+VERSION+'.zip')
  files.append('instantclient-sdk-linux-'+VERSION+'.zip')
  files.append('instantclient-sqlplus-linux-'+VERSION+'.zip')
elif flavor=='DarwinX86':
    files.append('instantclient-basic-macos.x64-'+VERSION+'.zip')
    files.append('instantclient-jdbc-macos.x64-'+VERSION+'.zip')
    files.append('instantclient-sdk-macos.x64-'+VERSION+'.zip')
    files.append('instantclient-sqlplus-macos.x64-'+VERSION+'.zip')
else:
    print 'Unsupported architecture %s. Only Linux, Linux64, DarwinX86 (no sqlldr) are supported' % (flavor)


path="""http://deslogin.cosmology.illinois.edu/eupsroot/external/oracle/"""

good=False
print 'Use DES collaboration credentials'
for i in range(3):
    user=raw_input('Enter username : ')
    pw1=getpass.getpass(prompt='Enter password : ')
    #r = requests.get(path+files[0],auth=(user, pw1))
    r = dlfile(path,files[0],user,pw1)
    if not good and r == 401:
        print '\nWrong user/password. Try again\n'
    if r == 0: 
        good=True
        break

if not good:
    sys.exit(0)

if good:
    for i in xrange(len(files)):
        #r = requests.get(path+files[i],auth=(user, pw1))
        try: os.remove(files[i])
        except: pass
        r=dlfile(path,files[i],user,pw1)
        #with open(files[i], "wb") as code:
            #code.write(r.content)
        os.system('unzip '+files[i])
        os.remove(files[i])


oracle=os.path.join(oracle,'instantclient_11_2')

print oracle

os.chdir(oracle)

print '\n\nCreating symlinks...\n'
if flavor=='Linux64':
    try:
        os.symlink('libclntsh.so.11.1','libclntsh.so')
        os.symlink('libocci.so.11.1','libocci.so')
    except OSError:
        pass
elif flavor=='Linux':
    try:
        os.symlink('libclntsh.so.11.1','libclntsh.so')
        os.symlink('libocci.so.11.1','libocci.so')
    except OSError:
        pass
elif flavor=='DarwinX86':
    try:
        os.symlink('libclntsh.dylib.11.1','libclntsh.dylib')
        os.symlink('libocci.dylib.11.1','libocci.dylib')
    except OSError:
        pass
else:
    print 'Unsupported architecture %s. Only Linux, Linux64, DarwinX86 (no sqlldr) are supported' % (flavor)

print
print '*********************************************************'
print 'Add following lines to your .profile, .bashrc, .tcshrc, etc...)\n'
print '*********************************************************'
print

sh=os.getenv('SHELL')

if sh.find('tcsh') > -1:

    print """setenv PATH $PATH:"""+oracle+""" """
    print """setenv LD_LIBRARY_PATH $LD_LIBRARY_PATH:"""+oracle+"""  """
    if flavor=='DarwinX86': print """setenv DYLD_LIBRARY_PATH $DYLD_LIBRARY_PATH:"""+oracle+"""  """
    print """setenv ORACLE_BASE """+oracle+""" """
    print """setenv ORACLE_HOME """+oracle+""" """
    print """setenv ORACLE_LIB_DIR """+oracle+""" """
    print """setenv ORACLE_INC_DIR """+os.path.join(oracle,'sdk/include')+""" """
else:

    print """export PATH="$PATH:"""+oracle+"""" """
    print """export LD_LIBRARY_PATH="$LD_LIBRARY_PATH:"""+oracle+"""" """
    if flavor=='DarwinX86': print """export DYLD_LIBRARY_PATH="$DYLD_LIBRARY_PATH:"""+oracle+"""" """
    print """export ORACLE_BASE="""+oracle+""" """
    print """export ORACLE_HOME="""+oracle+""" """
    print """export ORACLE_LIB_DIR="""+oracle+""" """
    print """export ORACLE_INC_DIR="""+os.path.join(oracle,'sdk/include')+""" """



