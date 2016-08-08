
    <!DOCTYPE html>
    <html>
    <head>
    <title>Candidate: centaur_s13_y2</title>
    <link href ="style_content.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class = "main">
            <div class = "header">
                <h1> Candidate: centaur_s13_y2</h1>
                <p><a href = "homepage2.html">Home</a></p>
            </div><div>
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
            </div>
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
            </tr>        <tr align = "center">
                <td>2014/10/21 08:31:56</td>
                <td>2:59:52.84</td>
                <td>-10:38:15.9</td>
                <td>369938</td>
                <td>90.0</td>
                <td>g</td>
                <td>34</td>
                <td>23.69</td>
                <td>0.872</td>
                <td>28632960</td>
            </tr>        <tr align = "center">
                <td>2014/10/21 08:37:51</td>
                <td>2:59:52.80</td>
                <td>-10:38:16.1</td>
                <td>369941</td>
                <td>90.0</td>
                <td>i</td>
                <td>7</td>
                <td>22.47</td>
                <td>0.933</td>
                <td>28813385</td>
            </tr>        <tr align = "center">
                <td>2014/10/23 08:20:03</td>
                <td>2:59:39.40</td>
                <td>-10:39:54.5</td>
                <td>370734</td>
                <td>90.0</td>
                <td>i</td>
                <td>55</td>
                <td>23.06</td>
                <td>0.83</td>
                <td>28869833</td>
            </tr>        <tr align = "center">
                <td>2014/10/23 08:22:00</td>
                <td>2:59:39.41</td>
                <td>-10:39:54.7</td>
                <td>370735</td>
                <td>90.0</td>
                <td>r</td>
                <td>34</td>
                <td>23.06</td>
                <td>0.893</td>
                <td>28928859</td>
            </tr>        <tr align = "center">
                <td>2014/10/28 08:03:23</td>
                <td>2:59:04.88</td>
                <td>-10:43:44.8</td>
                <td>372225</td>
                <td>90.0</td>
                <td>i</td>
                <td>40</td>
                <td>23.44</td>
                <td>0.757</td>
                <td>29041484</td>
            </tr>        <tr align = "center">
                <td>2014/11/3 07:38:28</td>
                <td>2:58:22.23</td>
                <td>-10:47:46.7</td>
                <td>374608</td>
                <td>90.0</td>
                <td>g</td>
                <td>10</td>
                <td>23.6</td>
                <td>0.87</td>
                <td>29471684</td>
            </tr>        <tr align = "center">
                <td>2015/12/17 04:35:16</td>
                <td>3:08:22.75</td>
                <td>-10:13:11.3</td>
                <td>502705</td>
                <td>90.0</td>
                <td>r</td>
                <td>11</td>
                <td>22.82</td>
                <td>0.861</td>
                <td>31619604</td>
            </tr>        <tr align = "center">
                <td>2015/12/17 04:37:16</td>
                <td>3:08:22.73</td>
                <td>-10:13:11.4</td>
                <td>502706</td>
                <td>90.0</td>
                <td>g</td>
                <td>11</td>
                <td>23.72</td>
                <td>0.87</td>
                <td>31653054</td>
            </tr>
        </table>
            </div>		<div class = "img">
			<table ID="t02" >
				<tr>
					<td align="center" colspan="5"><b>Images of centaur_s13_y2</b>
					<p> Click on an image to expand it. </p>
					</td>
                </tr>
                    <th>Observations</th> <th>Comparison images ordered by decreasing t_eff</th> </tr> 

    <tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.51</u></td><td><u> t_eff = 0.648</u></td><td><u> t_eff = 0.558</u></td><td><u> t_eff = 0.46</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103815.9_g_20141020Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103815.9_g_20141020Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103815.9_g_20151216Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103815.9_g_20151216Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103815.9_g_20141102Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103815.9_g_20141102Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103815.9_g_20141022Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103815.9_g_20141022Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 369938, ccd = 34</td><td>Expnum = 502701, ccd = 60</td><td>Expnum = 374608, ccd = 7</td><td>Expnum = 370733, ccd = 55</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/10/21 08:31:56</td><td> Date: 2015/12/17 04:27:12</td><td> Date: 2014/11/03 07:38:27</td><td> Date: 2014/10/23 08:18:05</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.808</u></td><td><u> t_eff = 0.797</u></td><td><u> t_eff = 0.511</u></td><td><u> t_eff = 0.376</u></td><td><u> t_eff = 0.0</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20141020Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20141020Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20151216Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20151216Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20141022Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20141022Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20141027Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20141027Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20160115Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025952.8-103816.1_i_20160115Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 369941, ccd = 7</td><td>Expnum = 502700, ccd = 60</td><td>Expnum = 370734, ccd = 55</td><td>Expnum = 372225, ccd = 34</td><td>Expnum = 511747, ccd = 47</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/10/21 08:37:51</td><td> Date: 2015/12/17 04:25:13</td><td> Date: 2014/10/23 08:20:02</td><td> Date: 2014/10/28 08:03:22</td><td> Date: 2016/01/16 02:45:07</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.511</u></td><td><u> t_eff = 0.797</u></td><td><u> t_eff = 0.376</u></td><td><u> t_eff = 0.0</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.5_i_20141022Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.5_i_20141022Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.5_i_20151216Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.5_i_20151216Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.5_i_20141027Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.5_i_20141027Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.5_i_20160115Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.5_i_20160115Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 370734, ccd = 55</td><td>Expnum = 502700, ccd = 60</td><td>Expnum = 372225, ccd = 34</td><td>Expnum = 511747, ccd = 47</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/10/23 08:20:03</td><td> Date: 2015/12/17 04:25:13</td><td> Date: 2014/10/28 08:03:22</td><td> Date: 2016/01/16 02:45:07</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.471</u></td><td><u> t_eff = 0.792</u></td><td><u> t_eff = 0.508</u></td><td><u> t_eff = 0.27</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.7_r_20141022Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.7_r_20141022Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.7_r_20151216Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.7_r_20151216Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.7_r_20141030Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.7_r_20141030Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.7_r_20140824Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025939.4-103954.7_r_20140824Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 370735, ccd = 34</td><td>Expnum = 502699, ccd = 60</td><td>Expnum = 373296, ccd = 55</td><td>Expnum = 351755, ccd = 55</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/10/23 08:22:00</td><td> Date: 2015/12/17 04:23:14</td><td> Date: 2014/10/31 05:53:55</td><td> Date: 2014/08/25 09:24:37</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.376</u></td><td><u> t_eff = 0.808</u></td><td><u> t_eff = 0.797</u></td><td><u> t_eff = 0.0</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025904.9-104344.8_i_20141027Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025904.9-104344.8_i_20141027Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025904.9-104344.8_i_20141020Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025904.9-104344.8_i_20141020Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025904.9-104344.8_i_20151216Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025904.9-104344.8_i_20151216Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025904.9-104344.8_i_20160115Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025904.9-104344.8_i_20160115Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 372225, ccd = 40</td><td>Expnum = 369941, ccd = 11</td><td>Expnum = 502700, ccd = 60</td><td>Expnum = 511747, ccd = 46</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/10/28 08:03:23</td><td> Date: 2014/10/21 08:37:51</td><td> Date: 2015/12/17 04:25:13</td><td> Date: 2016/01/16 02:45:07</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.558</u></td><td><u> t_eff = 0.708</u></td><td><u> t_eff = 0.51</u></td><td><u> t_eff = 0.46</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025822.2-104746.7_g_20141102Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025822.2-104746.7_g_20141102Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025822.2-104746.7_g_20151216Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025822.2-104746.7_g_20151216Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025822.2-104746.7_g_20141020Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025822.2-104746.7_g_20141020Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025822.2-104746.7_g_20141022Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ025822.2-104746.7_g_20141022Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 374608, ccd = 10</td><td>Expnum = 502698, ccd = 38</td><td>Expnum = 369938, ccd = 40</td><td>Expnum = 370733, ccd = 58</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/11/3 07:38:28</td><td> Date: 2015/12/17 04:21:10</td><td> Date: 2014/10/21 08:31:56</td><td> Date: 2014/10/23 08:18:05</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.973</u></td><td><u> t_eff = 0.633</u></td><td><u> t_eff = 0.59</u></td><td><u> t_eff = 0.226</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.3_r_20151216Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.3_r_20151216Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.3_r_20140926Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.3_r_20140926Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.3_r_20141020Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.3_r_20141020Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.3_r_20140824Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.3_r_20140824Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 502705, ccd = 11</td><td>Expnum = 362923, ccd = 33</td><td>Expnum = 369939, ccd = 31</td><td>Expnum = 351757, ccd = 59</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2015/12/17 04:35:16</td><td> Date: 2014/09/27 07:29:21</td><td> Date: 2014/10/21 08:33:54</td><td> Date: 2014/08/25 09:28:43</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.754</u></td><td><u> t_eff = 0.666</u></td><td><u> t_eff = 0.457</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.4_g_20151216Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.4_g_20151216Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.4_g_20140926Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.4_g_20140926Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.4_g_20141027Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_9d143ab8-2cf6-4ad4-b765-14993f272a55/DESJ030822.7-101311.4_g_20141027Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 502706, ccd = 11</td><td>Expnum = 362922, ccd = 33</td><td>Expnum = 372226, ccd = 31</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2015/12/17 04:37:16</td><td> Date: 2014/09/27 07:27:22</td><td> Date: 2014/10/28 08:05:20</td></tr> 

        		
		
		
	</table>
		
	</div><div> 
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

    </div>
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
            </tr>        <tr align = "center">
                <td>2014/10/23 08:18:05</td>
                <td>2:59:39.41</td>
                <td>-10:39:54.5</td>
                <td>370733</td>
                <td>g</td>
                <td>55</td>
                <td>95.23</td>
                <td>0.07</td>
                <td>0.06</td>
            </tr>        <tr align = "center">
                <td>2014/10/28 08:01:25</td>
                <td>2:59:04.87</td>
                <td>-10:43:44.7</td>
                <td>372224</td>
                <td>r</td>
                <td>11</td>
                <td>23.47</td>
                <td>0.09</td>
                <td>0.07</td>
            </tr>        <tr align = "center">
                <td>2014/12/12 05:04:58</td>
                <td>2:53:58.57</td>
                <td>-10:55:51.3</td>
                <td>386748</td>
                <td>z</td>
                <td>10</td>
                <td>77.64</td>
                <td>2.31</td>
                <td>0.06</td>
            </tr>        <tr align = "center">
                <td>2015/1/26 01:42:22</td>
                <td>2:51:57.65</td>
                <td>-10:24:57.5</td>
                <td>403015</td>
                <td>z</td>
                <td>35</td>
                <td>82.53</td>
                <td>7.35</td>
                <td>0.17</td>
            </tr>        <tr align = "center">
                <td>2015/11/1 07:42:57</td>
                <td>3:13:39.90</td>
                <td>-10:03:33.4</td>
                <td>488903</td>
                <td>z</td>
                <td>41</td>
                <td>84.98</td>
                <td>13.24</td>
                <td>0.1</td>
            </tr>        <tr align = "center">
                <td>2015/11/30 06:02:44</td>
                <td>3:10:09.64</td>
                <td>-10:15:06.7</td>
                <td>497814</td>
                <td>i</td>
                <td>45</td>
                <td>96.28</td>
                <td>4.85</td>
                <td>0.1</td>
            </tr>        <tr align = "center">
                <td>2015/11/30 06:04:45</td>
                <td>3:10:09.63</td>
                <td>-10:15:06.7</td>
                <td>497815</td>
                <td>i</td>
                <td>12</td>
                <td>96.28</td>
                <td>4.84</td>
                <td>0.1</td>
            </tr>        <tr align = "center">
                <td>2015/12/19 02:35:24</td>
                <td>3:08:12.30</td>
                <td>-10:12:33.3</td>
                <td>503522</td>
                <td>z</td>
                <td>62</td>
                <td>106.02</td>
                <td>0.52</td>
                <td>0.11</td>
            </tr>
        </table>
            </div>		<div class = "img">
			<table ID="t02" >
				<tr>
					<td align="center" colspan="5"><b>Exposures coinciding with best fit orbit of centaur_s13_y2</b>
					<p> Click on an image to expand it. </p>
					</td>
                </tr>
                    <th>Expected Observations</th> <th>Comparison images ordered by decreasing t_eff</th> </tr> 

    <tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.46</u></td><td><u> t_eff = 0.648</u></td><td><u> t_eff = 0.51</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025939.4-103954.5_g_20141022Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025939.4-103954.5_g_20141022Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025939.4-103954.5_g_20151216Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025939.4-103954.5_g_20151216Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025939.4-103954.5_g_20141020Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025939.4-103954.5_g_20141020Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 370733, ccd = 55</td><td>Expnum = 502701, ccd = 60</td><td>Expnum = 369938, ccd = 34</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/10/23 08:18:05</td><td> Date: 2015/12/17 04:27:12</td><td> Date: 2014/10/21 08:31:56</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.498</u></td><td><u> t_eff = 0.792</u></td><td><u> t_eff = 0.508</u></td><td><u> t_eff = 0.471</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025904.9-104344.7_r_20141027Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025904.9-104344.7_r_20141027Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025904.9-104344.7_r_20151216Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025904.9-104344.7_r_20151216Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025904.9-104344.7_r_20141030Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025904.9-104344.7_r_20141030Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025904.9-104344.7_r_20141022Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025904.9-104344.7_r_20141022Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 372224, ccd = 11</td><td>Expnum = 502699, ccd = 60</td><td>Expnum = 373296, ccd = 59</td><td>Expnum = 370735, ccd = 40</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/10/28 08:01:25</td><td> Date: 2015/12/17 04:23:14</td><td> Date: 2014/10/31 05:53:55</td><td> Date: 2014/10/23 08:21:59</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.988</u></td><td><u> t_eff = 0.761</u></td><td><u> t_eff = 0.62</u></td><td><u> t_eff = 0.459</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025358.6-105551.3_z_20141211Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025358.6-105551.3_z_20141211Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025358.6-105551.3_z_20150125Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025358.6-105551.3_z_20150125Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025358.6-105551.3_z_20150107Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025358.6-105551.3_z_20150107Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025358.6-105551.3_z_20151120Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025358.6-105551.3_z_20151120Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 386748, ccd = 10</td><td>Expnum = 403015, ccd = 55</td><td>Expnum = 395541, ccd = 30</td><td>Expnum = 495435, ccd = 35</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2014/12/12 05:04:58</td><td> Date: 2015/01/26 01:42:22</td><td> Date: 2015/01/08 03:17:53</td><td> Date: 2015/11/21 05:48:49</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.761</u></td><td><u> t_eff = 0.62</u></td><td><u> t_eff = 0.552</u></td><td><u> t_eff = 0.459</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025157.6-102457.5_z_20150125Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025157.6-102457.5_z_20150125Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025157.6-102457.5_z_20150107Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025157.6-102457.5_z_20150107Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025157.6-102457.5_z_20140914Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025157.6-102457.5_z_20140914Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025157.6-102457.5_z_20151120Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ025157.6-102457.5_z_20151120Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 403015, ccd = 35</td><td>Expnum = 395541, ccd = 6</td><td>Expnum = 359279, ccd = 31</td><td>Expnum = 495435, ccd = 14</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2015/1/26 01:42:22</td><td> Date: 2015/01/08 03:17:53</td><td> Date: 2014/09/15 07:42:19</td><td> Date: 2015/11/21 05:48:49</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.614</u></td><td><u> t_eff = 0.762</u></td><td><u> t_eff = 0.402</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031339.9-100333.4_z_20151031Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031339.9-100333.4_z_20151031Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031339.9-100333.4_z_20141005Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031339.9-100333.4_z_20141005Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031339.9-100333.4_z_20151218Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031339.9-100333.4_z_20151218Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 488903, ccd = 41</td><td>Expnum = 366087, ccd = 16</td><td>Expnum = 503523, ccd = 21</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2015/11/1 07:42:57</td><td> Date: 2014/10/06 07:58:22</td><td> Date: 2015/12/19 02:37:23</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.596</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/" ><img src= "/Users/lynuszullo/pyOrbfit/" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td></tr>     <tr align = "center"><td>Expnum = 497814, ccd = 45</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2015/11/30 06:02:44</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.703</u></td><td><u> t_eff = 1.068</u></td><td><u> t_eff = 0.693</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031009.6-101506.7_i_20151129Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031009.6-101506.7_i_20151129Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031009.6-101506.7_i_20140926Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031009.6-101506.7_i_20140926Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031009.6-101506.7_i_20141020Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ031009.6-101506.7_i_20141020Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 497815, ccd = 12</td><td>Expnum = 362924, ccd = 41</td><td>Expnum = 369944, ccd = 19</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2015/11/30 06:04:45</td><td> Date: 2014/09/27 07:31:19</td><td> Date: 2014/10/21 08:43:46</td></tr> 
<tr align ="center"><tr><td><p></p></td></tr><td> <u>t_eff = 0.441</u></td><td><u> t_eff = 0.958</u></td><td><u> t_eff = 0.696</u></td><td><u> t_eff = 0.641</u></td><td><u> t_eff = 0.564</u></td><td><u> t_eff = 0.294</u></td><td><u> t_eff = 0.219</u></td></tr>		<tr align = "center" valign="top">			 <td><a href = "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20151218Circ.png" ><img src= "/Users/lynuszullo/pyOrbfit/PermFiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20151218Circ.png" align='center' alt = "No Reference Image Available"
                width ="200" height="200" align="center" border = "1"></img> </a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20141020Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20141020Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20150107Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20150107Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20141211Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20141211Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20151031Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20151031Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20141013Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20141013Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td>			<td> <a href = "/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20151023Circ.png"><img src="/Users/lynuszullo/pyOrbfit/Permfiles/NotTempImgs_temp_a7337a71-a187-44fa-8cbf-fff944943e3c/DESJ030812.3-101233.3_z_20151023Circ.png" align='center' alt = "Example 1 pic"
                width ="200" height="200" align="center" border = "1"></img></a> </td></tr>     <tr align = "center"><td>Expnum = 503522, ccd = 62</td><td>Expnum = 369943, ccd = 33</td><td>Expnum = 395543, ccd = 31</td><td>Expnum = 386750, ccd = 58</td><td>Expnum = 488901, ccd = 11</td><td>Expnum = 367656, ccd = 58</td><td>Expnum = 487214, ccd = 11</td></tr> <tr align = "center" border-bottom="1px"><td> Date: 2015/12/19 02:35:24</td><td> Date: 2014/10/21 08:41:48</td><td> Date: 2015/01/08 03:21:52</td><td> Date: 2014/12/12 05:08:55</td><td> Date: 2015/11/01 07:39:34</td><td> Date: 2014/10/14 08:40:42</td><td> Date: 2015/10/24 07:10:58</td></tr> 

    
    </table>
    </div><div> 
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

    </div>
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

    
    </body>

    </html>