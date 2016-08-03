
# coding: utf-8

# #This is a cleaned up version of TNO Individual Web Page.ipynb. Now showing expected exposures. 
# 
# pyOrbfit lynuszullo$ scp /Users/lynuszullo/pyOrbfit/newfile_list.txt  lynusz@login.itd.umich.edu:/afs/umich.edu/user/l/y/lynusz/Public/html 
# 
# Lynus,
# 
# To make this run, here is what you need to do.
# 
# 1) Make sure you can import all the libraries/methods in the first cell. You need to have pyOrbfit (Prof. Gerdes just / sent out instructions for downloading and installing this. You also need ccdBounds, which is on the dwgerdes GitHub / repository https://github.com/dwgerdes/tnofind
# 
# 2) Make sure you have installed ds9: http://ds9.si.edu/site/Download.html. Go with the X11 version for Mac. Test it out by going to your terminal and typing ds9. You may have to make a binary executable file.
# 
# 3) Have a directory with the following things in it: 
#     
#     1) good_2.csv
#     
#     2) exposures.csv
#     
#     3) style_content.css
# 
# 4) Go to sendObsRequest and sendSearchRequest and replace my username and password with your username and password
# 
# 5) Run this line of code: rawFileObs, rawFileSearch, observed, expected = getImageTar("good_2.csv")
# 
# 6) Go to http://desdev3.cosmology.illinois.edu:8000 (you may have enter your user name and password). Go and download the tar files and put them in the directory where everything else is stored. It may take a minute or two for the job to complete. 
# 
# 7) Run the following line of code (putting in the appropriate file path): makeIndividualWebpage('/Users/ColinS/Documents/TNOSearch','good_2.csv',expecteds, rawFileObs, rawFileSearch) 
# 
# Hopefully this works. 
# 
# -Colin
# 
# ps. You're totally right, that second break statement doesn't do anything. 
# 

# In[1]:

from __future__ import division
from ccdBounds import *
from pyOrbfit.Orbit import Orbit
import gzip
import glob # Lists files into a directory
import tarfile
import json
import pandas as pd
import pylab
import ephem
import os
import time
import numpy as np
import requests
import sys
import easyaccess as ea
from subprocess import call
from pandas import *
from pylab import *
from astropy.io import fits
from astropy.wcs import WCS


# In[2]:

def drawObsCircle(tempfits, imgfile, regfile, ra, dec):
    with open(regfile, 'w') as fout:
        #fout.write('fk5; circle '+str(ra)+' '+str(dec)+' 6" #dash=1') This line works
        w=WCS(tempfits)
        lon, lat = np.degrees(ephem.hours(ra)),np.degrees(ephem.degrees(dec))
        pixx,pixy= w.wcs_world2pix(lon,lat,3)
        fout.write('physical; circle '+str(pixx)+' '+str(pixy)+' 6" #dash=1')
    hdu=fits.getdata(tempfits)
    h=hdu.shape[0]
    w=hdu.shape[1]
    os.system(r'ds9 '+tempfits+' -scale mode zscale -colorbar no -height '+str(h)+' -width '+str(w)+' -zoom to fit -region'+' '+regfile+' -saveimage png '+imgfile+' -exit')


# In[3]:

def makeObsReg(regfile, ra, dec):
    with open(regfile,'w') as fout:
        fout.write('fk5; circle '+str(ra)+' '+str(dec)+' 6" #dash=1')


# In[4]:

def drawSearchEllipse(tempfits, imgfile, regfile, ra, dec, PA, a, b):
    with open(regfile, 'w') as fout:
        if a > 2:
            fout.write('fk5; ellipse '+str(ra)+' '+str(dec)+' '+str(a)+'" '+str(b)+'" '+str(PA-90)+' # dash=1')
        else:
            fout.write('fk5; box '+str(ra)+' '+str(dec)+' '+str(6)+'" '+str(6)+'" 0 #color=red dash=1')
    hdu=fits.getdata(tempfits)
    h=hdu.shape[0]
    w=hdu.shape[1]
    os.system("ds9 "+tempfits+" -scale mode zscale -colorbar no -height "+str(h)+" -width "+str(w)+" -zoom to fit -region"+" "+regfile+" -saveimage png "+imgfile+" -exit")


# In[5]:

def makeSearchReg(regfile, ra, dec, PA, a, b):
    with open(regfile, 'w') as fout:
        if a>2:
            fout.write('fk5; ellipse '+str(ra)+' '+str(dec)+' '+str(a)+'" '+str(b)+'" '+str(PA-90)+' # dash=1')
        else:
            fout.write('fk5; box '+str(ra)+' '+str(dec)+' '+str(6)+'" '+str(6)+'" 0 #color=red dash=1')


# In[6]:

def fit_orbit(df_obs):
    df_obs = df_obs.ix[['#' not in row['date'] for ind, row in df_obs.iterrows()]]   # filter comment lines
    nobs = len(df_obs)
    ralist = [ephem.hours(r) for r in df_obs['ra'].values]
    declist = [ephem.degrees(r) for r in df_obs['dec'].values]
    datelist = [ephem.date(d) for d in df_obs['date'].values]
    obscode = np.ones(nobs, dtype=int)*807
    orbit = Orbit(dates=datelist, ra=ralist, dec=declist, obscode=obscode, err=0.15)
    return orbit


# In[7]:

def compute_chip(rockra, rockdec, expra, expdec):
    '''
    Given the ra and dec of a point and of the center
    of an exposure, find the CCD containing that point.
    
    Returns a pair of the CCD name and number.
    '''
    deltara = 180/np.pi*ephem.degrees(rockra-expra).znorm  # compute difference in degrees (normalized between -180, +180)
    deltadec = 180/np.pi*ephem.degrees(rockdec-expdec).znorm  # the 180/pi is because ephem.Angle objects are natively in radians
    ccdname = 'None'
    for k in ccdBounds:
        if deltara > ccdBounds[k][0] and deltara < ccdBounds[k][1] and deltadec > ccdBounds[k][2] and deltadec < ccdBounds[k][3]:
            ccdname = k
    return ccdname, ccdNum[ccdname]



# In[8]:

#Unzips tar.gz files
def unzip_tar(tarname):
    fname = str(tarname)
    if (fname.endswith("tar.gz")):
        tar = tarfile.open(fname, 'r:gz')
        tar.extractall() ##Deleted the slash in front of c
        tar.close()
    elif (fname.endswith("tar")):
        tar = tarfile.open(fname, 'r:')
        tar.extractall()
        tar.close()
    raw_fname = fname[:36]
    return raw_fname


# In[9]:

def makeSearchArray(obs_properties, flist, directory, raw_fname, exp_values):
    
    os.mkdir(directory+'PermFiles/NotTempImgs_'+raw_fname) #makes the directory for all images needed for website.
    
    search_array=pandas.DataFrame.from_items([('expnum',[]),('refccd',[]),('refpng',[]), ('refdate',[]),('reftef',[]),('compimages',[]),('compexp',[]),('compccd',[]),('compdate',[]),('comptef',[])])
    
    def getkey(item):
            return item[0]
        
    for i in obs_properties.index:
        #print "entering row"+str(i), time.ctime()
        
        commandstr='ds9 '
        
        refnum=obs_properties['expnum'][i]
        refccd=obs_properties['ccd'][i]
        #refccd=obs_properties['ccdnum'][i]
        refband=obs_properties['band'][i]
        refdate=str(ephem.date(obs_properties['date'][i]))
        ref_ra=ephem.hours(obs_properties['can_ra'][i])
        ref_dec=ephem.degrees(obs_properties['can_dec'][i])
        ref_PA=obs_properties['PA'][i]
        ref_a=obs_properties['a'][i]
        ref_b=obs_properties['b'][i]
        CompImgs=[]
        expnums=[]
        refpng=''
        reftef=round(float(exp_values[exp_values['expnum']==refnum]['t_eff']),3)
        refisinobs=obs_properties['isinobs'][i]
        
        breaktime=False
        quicklabel=[]
        
        for thumb in flist:
            #print r"     checking thumb"+thumb, time.ctime()
            os.chdir(directory+raw_fname+'/'+thumb)
            fit_list = glob.glob('*fits')
        
            for f in fit_list:
                h=fits.open(f)
                if h[0].header["EXPNUM"]==refnum and h[0].header['CCDNUM']==refccd:
                    #print r"         Found correct thumb", time.ctime()
                    reffit=f
                    refpng='PermFiles/NotTempImgs_'+raw_fname+'/'+reffit[:-5]+'Circ.png' 
                    if refisinobs:
                        makeObsReg('temp.reg',ref_ra,ref_dec)
                    else:
                        makeSearchReg('temp.reg',ref_ra, ref_dec, ref_PA, ref_a, ref_b)
                    commandstr+=f+' -scale zscale '
                    for g in fit_list:
                        j=fits.open(g)
                        jnum=j[0].header['EXPNUM']
                        if (j[0].header['BAND']==refband and jnum != refnum and not (jnum in expnums)):
                            try:
                                teff=float(exp_values[exp_values['expnum']==jnum]['t_eff'])
                            except:
                                teff=0
                                #print jnum
                            pnglabel='Permfiles/NotTempImgs_'+raw_fname+'/'+g[:-5]+'Circ.png'
                            quicklabel+=[g[:-5]+'Circ.png']
                            date=str(j[0].header['DATE-OBS'])
                            nicedate=date[0:4]+'/'+date[5:7]+'/'+date[8:10]+' '+date[11:19]
                            CompImgs.append([teff,pnglabel, jnum, j[0].header['CCDNUM'], nicedate])
                            expnums+=[jnum]
                            commandstr+=' -file '+g
                        j.close()
                    commandstr+=' -single -region load all temp.reg -height 288 -width 288 -colorbar no -bg black '
                    for q in range(1,len(quicklabel)+1):
                        commandstr+=' -zoom to fit -saveimage png '+quicklabel[-q]+' -frame prev '
                    commandstr+='-zoom to fit -saveimage png '+reffit[:-5]+'Circ.png'+' -exit'
                    os.system(commandstr)
                    os.system('cp '+directory+raw_fname+'/'+thumb +'/*.png '+directory+'PermFiles/'+'NotTempImgs_'+raw_fname)
                    flist.remove(thumb)
                    breaktime=True
                    #print r"         Done writing row", time.ctime()
                    break 
                h.close()
            if breaktime:
                break
        
        
        sortedcomps=sorted(CompImgs, key=getkey, reverse=True)
        
        tempframe=pandas.DataFrame.from_items([('expnum', refnum),('refccd',refccd), ('refpng',[ refpng]), ('refdate', [refdate]),('reftef',[reftef]),('compimages', [[x[1] for x in sortedcomps]]),('compexp',[[x[2] for x in sortedcomps]]), ('compccd',[[x[3] for x in sortedcomps]]),('compdate',[[x[4] for x in sortedcomps]]),('comptef',[[round(x[0],3) for x in sortedcomps]])])                
        search_array=search_array.append(tempframe, ignore_index=True)
    
        
    return search_array


# In[10]:

def writeStatus():
    statstr=r'''<div>
                <br><br>
                <form>
	<select name = "status">
		<option>Accepted</option>
		<option>Rejected</option>
		<option>Uninspected</option>
		<option>Look Again</option>
		<option>Planet 9!!!</option>

	</select>
	<br>
	<button type = "submit" name = "submit" value = "submit">Submit</button>
</form>

<p> The status is:</p>

<?php
	if (isset($_GET['submit'])){
		$status = $_GET['status'];
		switch($status){
			case "Accepted":
				echo " Accepted!";
			break;
			case "Rejected":
				echo " Rejected :(";
			break;
			case "Uninspected":
				echo " Uninspected";
			break;
			case "Look Again":
				echo " Look Again";
			break;
			case "Planet 9!!!":
				echo " Get prepped for the cameras";
			break;


		}
	}
?>
            </div>'''
    return statstr


# In[11]:

def makeHead(obs_properties, objid):
    numobs=len(obs_properties)
    headstr=r"""
    <!DOCTYPE html>
    <html>
    <head>
    <title>Candidate: """+objid+ r"""</title>
    <link href ="style_content.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class = "main">
            <div class = "header">
                <h1> Candidate: """+objid+r"""</h1>
                <p><a href = "homepage2.html">Home</a></p>
            </div>"""+writeStatus()+r"""
            <div class = "tab" align = "center">
                
            <table width = "700" border="1" align="center">
            <tr>
            <td align="center" colspan="10"><b>Properties</b>
            </td>
            
            <tr align = "center">
                <td>Date</td>
                <td>Ra</td>
                <td>Dec</td>
                <td>Expnum</td>
                <td>Exptime</td>
                <td>Band</td>
                <td>Ccd</td>
                <td>Mag</td>
                <td>ml_score</td>
                <td>Object ID</td>
            </tr>"""

    for i in obs_properties.index:
        headstr+= r"""        <tr align = "center">
                <td>"""+str(ephem.date(obs_properties['date'][i]))+r"""</td>
                <td>"""+str(ephem.hours(obs_properties['can_ra'][i]))+r"""</td>
                <td>"""+str(ephem.degrees(obs_properties['can_dec'][i]))+r"""</td>
                <td>"""+str(int(obs_properties['expnum'][i]))+r"""</td>
                <td>"""+str(obs_properties['exptime'][i])+r"""</td>
                <td>"""+obs_properties['band'][i]+r"""</td>
                <td>"""+str(int(obs_properties['ccd'][i]))+r"""</td>
                <td>"""+str(obs_properties['mag'][i])+r"""</td>
                <td>"""+str(obs_properties['ml_score'][i])+r"""</td>
                <td>"""+str(int(obs_properties['objid'][i]))+r"""</td>
            </tr>"""

    headstr+="""
        </table>
            </div>"""
    return headstr



# In[12]:

def makeSearchTable(obs_properties, objid):
    headstr=r"""
            <div class = "tab" align = "center">
                
            <table width = "700" border="1" align="center">
            <tr>
            <td align="center" colspan="10"><b>Possible Exposures</b>
            </td>
            
            <tr align = "center">
                <td>Date</td>
                <td>Ra</td>
                <td>Dec</td>
                <td>Expnum</td>
                <td>Band</td>
                <td>Ccd</td>
                <td>PA </td>
                <td>a</td>
                <td>b</td>
            </tr>"""

    for i in obs_properties.index:
        headstr+= r"""        <tr align = "center">
                <td>"""+str(ephem.date(obs_properties['date'][i]))+r"""</td>
                <td>"""+str(ephem.hours(obs_properties['can_ra'][i]))+r"""</td>
                <td>"""+str(ephem.degrees(obs_properties['can_dec'][i]))+r"""</td>
                <td>"""+str(int(obs_properties['expnum'][i]))+r"""</td>
                <td>"""+str(obs_properties['band'][i])+r"""</td>
                <td>"""+str(int(obs_properties['ccd'][i]))+r"""</td>
                <td>"""+str(round(obs_properties['PA'][i],2))+r"""</td>
                <td>"""+str(round(obs_properties['a'][i],2))+r"""</td>
                <td>"""+str(round(obs_properties['b'][i],2))+r"""</td>
            </tr>"""

    headstr+=r"""
        </table>
            </div>"""
    return headstr
    


# In[13]:

def tableHeader(objid):
    tableHead = """		<div class = "img">
			<table ID="t02" >
				<tr>
					<td align="center" colspan="5"><b>Images of """+objid+"""</b>
					<p> Click on an image to expand it. </p>
					</td>
                </tr>
                    <th>Observations</th> <th>Comparison images ordered by decreasing t_eff</th> """
    return tableHead


# In[14]:

def searchHeader(objid):
    tableHead = """		<div class = "img">
			<table ID="t02" >
				<tr>
					<td align="center" colspan="5"><b>Exposures coinciding with best fit orbit of """+objid+"""</b>
					<p> Click on an image to expand it. </p>
					</td>
                </tr>
                    <th>Expected Observations</th> <th>Comparison images ordered by decreasing t_eff</th> """
    return tableHead


# In[15]:

def writeImgTable(ImgArray, directory, raw_fname):
    tableBody = ''
    for i in range(0,len(ImgArray)):
        refpng=ImgArray['refpng'][i]
        expnum=ImgArray['expnum'][i]
        refccd=ImgArray['refccd'][i]
        refdate=ImgArray['refdate'][i]
        reftef=ImgArray['reftef'][i]
        compimages=ImgArray['compimages'][i]
        compexp=ImgArray['compexp'][i]
        compccd=ImgArray['compccd'][i]
        compdate=ImgArray['compdate'][i]
        comptef=ImgArray['comptef'][i]
        tableBody+= '<tr align ="center">'
        tableBody+= '<tr><td><p></p></td></tr>'
        tableBody+= r'''<td> <u>t_eff = '''+str(reftef)+r'''</u></td>'''
        for j in range(0,len(compimages)):
            tableBody+= r'''<td><u> t_eff = '''+str(comptef[j])+'''</u></td>'''
        tableBody += '</tr>		<tr align = "center" valign="top">'
        tableBody += '			'+r''' <td><a href = "'''+directory+refpng+r'''" ><img src= "'''+directory+refpng+r'''" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>''' #This will have to change--probably get rid of: +raw_fname+'/'
        for j in range(0,len(compimages)):
            tableBody += '			'+r'''<td> <a href = "'''+directory+compimages[j]+'''"><img src="'''+directory+compimages[j]+'''" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>''' #once again get rid of teh raw_fname part
        tableBody+= r'''</tr>     <tr align = "center">'''
        tableBody+= r'''<td>Expnum = '''+str(int(expnum))+r''', ccd = '''+ str(int(refccd))+r'''</td>'''
        for j in range(0, len(compimages)):
            tableBody+='''<td>Expnum = '''+str(compexp[j])+r''', ccd = '''+ str(compccd[j])+r'''</td>'''
        tableBody+=r'''</tr> <tr align = "center" border-bottom="1px">'''
        tableBody+=r'''<td> Date: '''+str(refdate)+r'''</td>'''
        for j in range(0, len(compimages)):
            tableBody+=r'''<td> Date: '''+str(compdate[j])+r'''</td>'''
        tableBody += "</tr> \n"
    
    return tableBody


# In[16]:

def writeComments():
    comstr = r'''<div> 
    <br><br>
    
    
    <table id="t01" width = "700" align="center" cellspacing="6" cellpadding = "2" >
        <tr>
            <th align="center" colspan="5"><b>Comments</b> </th>
        </tr>
        <tr>
            <td> 12/18/2016 </td>
        </tr>
        <tr>
        <td > TNOs are so cool! </td>
        </tr>
        <tr>
            <td > 12/15/2016 </td>
        </tr>
        <tr>
            <td> This candidate is registered with the Minor Planet Center </td>
        </tr>
    
    
    
    </table>

    </div>'''
    
    return comstr


# In[17]:

def writeLeavCom(): ##Distant s-13 is hardcoded now.  Need to change that later
    formstr=r'''
<?php

if($_POST){
    $name = $_POST['name'];
    $content = $_POST['commentContent'];
    $file = 'distant_s13_y2.php';
    if (($handle = fopen($file, "a")) !== false) { 
        fwrite($handle,"<b>" . $name . "</b>:<br/>" . $content . "<br/>");
        fclose($handle);
    }
}

?>


<form action = "" method = "POST">
    Comments: <textarea rows = "10" cols = "30" name = "commentContent"></textarea><br/>
    Name: <input type = "text" name = "name"><br/>
    <input type = "submit" value = "Post!"><br/>
</form>
'''
    
    
    return formstr


# In[18]:

def buildpage(obs_properties, searchFrame, flistObs, flistSearch, directory, raw_fnameObs,raw_fnameSearch, exp_values, objid):
    #print "making image array", time.ctime()
    ImgArray=makeSearchArray(obs_properties, flistObs, directory, raw_fnameObs, exp_values)
    #print "making search array", time.ctime()
    SearchArray=makeSearchArray(searchFrame,flistSearch,directory,raw_fnameSearch, exp_values)
    #print "writing web page", time.ctime()
    indivpage = makeHead(obs_properties, objid) + tableHeader(objid) + '''</tr> \n
    '''+ writeImgTable(ImgArray, directory, raw_fnameObs)+'''
        		
		
		
	</table>
		
	</div>'''+writeComments()+writeLeavCom()+ makeSearchTable(searchFrame, objid)+searchHeader(objid)+'''</tr> \n
    '''+writeImgTable(SearchArray,directory, raw_fnameSearch)+r'''
    
    </table>
    </div>'''+writeComments()+writeLeavCom()+r'''
    
    </body>

    </html>'''
    return indivpage


# In[19]:

def findExposures(candidate):
    all_exps = read_csv('exposures.csv')
    df = read_csv(candidate)
    orb = fit_orbit(df)
    matches=DataFrame() #Dataframe is a panda function.  Creates an empty dataframe
    
    #Checks to see the position of the candidate in the orbit and does that position lie in any ccd
    for i in all_exps[all_exps['t_eff']>.3].index:
        e_ra, e_dec=all_exps['ra'][i],all_exps['dec'][i]
        pos=orb.predict_pos(all_exps['date'][i]) #Predicts position 
        pos_ra, pos_dec=pos['ra'], pos['dec']
        ccdname, ccdnum = compute_chip(pos_ra, pos_dec, e_ra, e_dec)
        if ccdnum>0:
            temp=all_exps.loc[i,['expnum','date','nite','band','t_eff']]
            temp['ccd']=ccdnum
            temp['PA']=pos['err']['PA']
            temp['a']=pos['err']['a'] #Semimajor axis of error elipse
            temp['b']=pos['err']['b'] #Semiminor axis of error elipse
            #temp['can_ra']=pos_ra
            #temp['can_dec']=pos_dec
            #temp['isinobs']=all_exps['expnum'][i] in list(df['expnum']) #True if it should be in top section of array aka we know if should be in that exposure
            if all_exps['expnum'][i] in list(df['expnum']):
                temp['isinobs']=True
                temp['objid']=int(df[df['expnum']==all_exps['expnum'][i]]['objid'])
                temp['mag']=float(df[df['expnum']==all_exps['expnum'][i]]['mag'])
                temp['ml_score']=float(df[df['expnum']==all_exps['expnum'][i]]['ml_score'])
                temp['exptime']=float(df[df['expnum']==all_exps['expnum'][i]]['exptime'])
                temp['can_ra']=float(ephem.hours(df[df['expnum']==all_exps['expnum'][i]]['ra'].get_values()[0]))
                temp['can_dec']=float(ephem.degrees(df[df['expnum']==all_exps['expnum'][i]]['dec'].get_values()[0]))
            else:
                temp['isinobs']=False
                temp['objid']=-99
                temp['mag']=-99
                temp['ml_score']=-99
                temp['exptime']=-99
                temp['can_ra']=pos_ra
                temp['can_dec']=pos_dec
            matches=matches.append(temp,ignore_index=True)
    return matches


# In[20]:

#Takes all the matches.  Sends the list of RA and DEC to the thumbnail generator

def sendObsRequest(matches,username,password):
    ra=list(np.degrees(matches[matches['isinobs']==True]['can_ra']))
    dec=list(np.degrees(matches[matches['isinobs']==True]['can_dec']))
    bands='[g,r,i,z]'
    req='http://descut.cosmology.illinois.edu:8000/api?username='+username+'&password='+password+'&ra=%s&dec=%s&bands=%s' % (ra,dec,bands)
    #req='http://descut.cosmology.illinois.edu:8000/api?username=scheibne&password=sch70chips&ra=%s&dec=%s&bands=%s' % (ra,dec,bands)
    submit = requests.get(req)
    return submit.json()['job'] # Returns job ID, long string


# In[21]:

#Does the same thing as sendObsRequest except for the reference images

def sendSearchRequest(matches,username,password):
    ra=list(np.degrees(matches[matches['isinobs']==False]['can_ra']))
    dec=list(np.degrees(matches[matches['isinobs']==False]['can_dec']))
    bands='[g,r,i,z]'
    req='http://descut.cosmology.illinois.edu:8000/api?username='+username+'&password='+password+'&ra=%s&dec=%s&bands=%s' % (ra,dec,bands)
    #req='http://descut.cosmology.illinois.edu:8000/api?username=scheibne&password=sch70chips&ra=%s&dec=%s&bands=%s' % (ra,dec,bands)
    submit = requests.get(req)
    return submit.json()['job']


# In[22]:

def getImageTar(candidate):
    matches=findExposures(candidate)
    username = raw_input('Enter username ')
    password = raw_input('Enter password ')
    
    #The name of the tar.gz file is just the job ID plus .tar.gz
    rawFileObs=sendObsRequest(matches,username,password)
    rawFileSearch=sendSearchRequest(matches,username,password)
    
    #Slices of matches where isinobs is true or false
    observed=matches[matches['isinobs']==True]
    expected=matches[matches['isinobs']==False]
    
    #print observed
    #print expected
    
    return rawFileObs,rawFileSearch,observed,expected


# In[23]:

#takes the filename of json and returns a list of dicts
def open_json(jsonName):
    f = open(jsonName, "r")
    s=f.read()
    type(s)
    book = json.loads(s)
    return book


# In[24]:

#takes a job id and returns "temp_<jobid>", which is the name of directory containting all the files from the thumbnail request
def fetchFiles(jobid):
   
    while True:
        os.system('wget -O file_list_'+jobid+'.txt http://descut.cosmology.illinois.edu:8000/static/uploads/lzullo/results/'+jobid+'/file_list.txt')
        #os.system('wget -O file_list_'+jobid+'.txt http://descut.cosmology.illinois.edu:8000/static/uploads/scheibne/results/'+jobid+'/file_list.txt')
        myfile=open(os.getcwd()+'/file_list_'+jobid+'.txt')
        mylines=myfile.readlines()
        if mylines==[]:
            time.sleep(10)
        else:
            break
            
            
    newlines=[]
    for l in mylines:
        if l[-5:-1]=='fits' or l[-5:-1]=='json':
            newlines+=['http://descut.cosmology.illinois.edu:8000'+l[37:]]
    newfilelist=open('newfile_list.txt','w')
    newfilelist.writelines(newlines)
    newfilelist.close()
    myfile.close()
    try:
        os.mkdir('temp_'+jobid) #will this work if directory already exists? Yes. Maybe just use the job id as the directory name
    except:
        print "temp_"+jobid+" already exists"
    os.chdir('temp_'+jobid)
    os.system('wget -i '+'../newfile_list.txt')
    os.chdir('..')
    
    #os.remove('file_list_'+jobid+'.txt')
    return 'temp_'+jobid


# In[25]:

#takes a directory, preferablly the directory given from fetchFiles. Creates sub directories called thumbs_0, thumbs_1 ,...
#populates each thumb directory with fits files sharing the same ra/dec center. 
def organizeTempDirectory(tempDirectory):
    os.chdir(tempDirectory)
    jsonlist=glob.glob('*.json*')
    for i in range(len(jsonlist)):
        try:
            os.mkdir('thumbs_'+str(i))
        except:
            print 'thumbs_'+str(i)+' already exists'
        jarray=open_json(jsonlist[i])
        for j in jarray:
            try: 
                os.system('mv '+j['png_name'][:-3]+'fits'+' thumbs_'+str(i)) 
            except:
                print "Could not move file"
    os.chdir('..')


# In[26]:

#Opens and querys the desoper database

def accessDB():
    db = ea.connect(section = "desoper")
    cursor = db.cursor()
    
    #Need to change query so that it shows the objects we are looking for
    #query = "select distinct expnum, date_obs, telra, teldec, exptime, band, object from prod.exposure where \
    #nite=20140818 and program='survey' order by expnum "
    
    #query = "select * from prod.exposure where nite=20140818 and program='survey' order by expnum "
    #select date_obs, telra, teldec, expnum, exptime
    query = "select * from prod.exposure order by expnum"
    
    #Can we import as a csv instead of a pandas database?
    result = db.query_to_pandas(query)
    
    db.close()
    
    return result.head(15)


# In[27]:

#accessDB()


# In[28]:

def copyFCS(directory, username):
    permDirec = (directory+'PermFiles')
    print permDirec
    os.chdir(permDirec)
    #print permDirec
    notTemps = glob.glob('NotTemp*')
    #print notTemps
    for notTemp in notTemps:
        tempDirec = permDirec+ '/'+ notTemp
        os.chdir(tempDirec)
        pnglist = glob.glob('*png')
        print pnglist
        for png in pnglist:
            #print png
            os.system('scp '+tempDirec+'/'+png+ ' '+username+'@login.itd.umich.edu:/afs/umich.edu/user/l/y/'+username+'/Public/html')
        
    
    


# In[29]:

##copyFCS('/Users/lynuszullo/pyOrbfit/','lynusz')


# In[30]:

def main(directory, obfile):
    
    #add two statements to make ds9 run in background
    os.chdir(directory)
    obs_props=read_csv(obfile) #The .csv files contain a list of RA and DEC of an object in the sky at every point it was observed
    #obs_props = (obfile, "rb")
    
    objid=obfile[:-4]
    
    print "finding exposures"#, time.ctime()
    #Exposures is a ton of exposures with teff over a certain threshold
    exposures = read_csv('exposures.csv') 
    exp_values = exposures.ix[:,['expnum','t_eff']]
    
    print "sending job"#, time.ctime()
    
    rawFileObs, rawFileSearch, observed, expecteds = getImageTar(obfile)
    
    
    print "job sent"#, time.ctime()
    
    
    raw_fnameObs =  fetchFiles(rawFileObs) 
    raw_fnameSearch= fetchFiles(rawFileSearch)
  
    print "job retrieved"#, time.ctime()       
        
    organizeTempDirectory(raw_fnameObs)
    organizeTempDirectory(raw_fnameSearch)

    print "job organized"#, time.ctime()
    
    os.chdir(directory+'/'+raw_fnameObs)
    flistObs = glob.glob('thumbs*')
    os.chdir(directory+'/'+raw_fnameSearch)
    flistSearch = glob.glob('thumbs*')

    print "building page"#, time.ctime()
    page = buildpage(observed, expecteds, flistObs, flistSearch, directory, raw_fnameObs, raw_fnameSearch, exp_values, objid)
    os.chdir(directory)

    print "page built, writing page"#, time.ctime()
    with open(objid+'.php', 'w') as fout:
        fout.write(page)

    tempList = glob.glob('temp*')
    for t in tempList:
        os.system('rm -r '+str(t))
    
    fileList = glob.glob('file_list*')
    for f in fileList:
        os.system('rm -r '+str(f))
    
    #copyFCS(directory,'lynusz')
    print 'done'#, time.ctime()
#print pag


# In[35]:

if __name__ == '__main__':
    start_time = time.time()
    main('/Users/lynuszullo/pyOrbfit/','distant_s13_y2.csv')
    #main('/Users/ColinS/Documents/TNO_Webpage/','distant_s17_y2.csv')
    minutes = (((time.time() - start_time)) / 60)
    print("%s minutes" % (minutes))


# In[30]:




# In[29]:

#rawFileObs, rawFileSearch, observed, expecteds = getImageTar("good_2.csv")


# In[30]:

#main('/Users/ColinS/Documents/TNO_Webpage/','good_2.csv',expecteds, rawFileObs, rawFileSearch)


# In[122]:

checkout=read_csv('good_2.csv')
checkout


# In[138]:

ephem.hours(checkout[checkout['expnum']==388201]['ra'].get_values()[0])


# In[144]:

myarray=[1,2,3,4]
myarray[-1]


# makeIndividualWebpage('/Users/ColinS/Documents/TNOSearch','gold_27.csv','5ad98083-9dcb-41e3-aed2-b9bd25237430.tar.gz')

# In[32]:

#makeIndividualWebpage('/Users/lynuszullo/pyOrbfit','good_2.csv',expecteds,'8e9ca6ad-11b1-4d58-ac89-18009f2a797b.tar', 'a84925eb-f279-437c-8619-9c9b8edc2d74.tar')


# makeIndividualWebpage('/Users/ColinS/Documents/TNOSearch','QR441.csv','8e1523a8-2194-4464-a80b-1306feadacad.tar')

# Here is an example of an input:
# makeIndividualWebpage('/Users/ColinS/Documents/TNOSearch','Fakegold.csv','5ad98083-9dcb-41e3-aed2-b9bd25237430.tar.gz')
# 

# In[33]:

all_exps=read_csv('exposures.csv')
mymatches=findExposures('good_2.csv')


# In[34]:

goodObs=read_csv('good_2.csv')


# In[35]:

goodObs[goodObs['expnum']==386739]


# In[36]:

mymatches.head()


# In[37]:

expecteds=mymatches[mymatches['isinobs']==False]


# In[38]:

expecteds


# In[39]:

unzip_tar('a84925eb-f279-437c-8619-9c9b8edc2d74.tar')


# In[ ]:

os.chdir('/Users/ColinS/Documents/TNOSearch/'+'a84925eb-f279-437c-8619-9c9b8edc2d74')


# In[ ]:

myflist=glob.glob('thumbs*')


# In[ ]:

tempSearchArray=makeSearchArray(expecteds,myflist,'/Users/ColinS/Documents/TNOSearch','a84925eb-f279-437c-8619-9c9b8edc2d74',all_exps)


# In[ ]:

tempSearchArray.head()


# In[ ]:

str(ephem.hours(expecteds['can_ra'][1]))


# In[ ]:

np.degrees(expecteds['can_ra'][1])


# In[ ]:

len(myflist)


# Potential Problem expousure numbers:
#     459985
# 230084
# 231480
# 238906
# 240458
# 245899
# 247890
# 251065
# 255875
# 261942
# 267565
# 275246
# 277592
# 354905
# 359571
# 360540
# 369023
# 372919
# 379269
# 381508
# 382518
# 389436
# 391629
# 395515
# 398240
# 400779
# 403386
# 459983
# 464794
# 466292
# 474311
# 475839
# 478352
# 483388
# 484472
# 506645
# 459985
# 459985
# 345372
# 345373
# 226647
# 228716
# 230090
# 231474
# 237666
# 242388
# 243829
# 245905
# 255881
# 258477
# 275252
# 277598
# 280306
# 345371
# 348369
# 352863
# 359564
# 367108
# 371612
# 376673
# 379263
# 381225
# 381502
# 389430
# 401525
# 475492
# 482091
# 485807
# 492427
# 494279
# 497332
# 500457
# 501985
# 506784
# 508804
# 345372
# 345373
# 345372
# 345373
# 345372
# 459985

# In[ ]:

mySearchTable=makeSearchTable(expecteds, "good_2")


# In[ ]:

str(expecteds['b'][0])


# In[ ]:

str(round(expecteds['b'][0],3))


# In[ ]:

str(ephem.date(4444444.5))


# In[ ]:

all_exps[all_exps['t_eff']>.3].index


# In[ ]:



