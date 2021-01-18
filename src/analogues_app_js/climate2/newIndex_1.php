<!DOCTYPE html>
<!--
Copyright (C) 2015 JGALLEGO

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="//serverapi.arcgisonline.com/jsapi/arcgis/?v=3.4"></script>
        <script src="js/OpenLayers.js"></script>
        <script type="text/javascript" src="js/climateAnalogues_v1_1.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-1.11.3.js" type="text/javascript"></script>
        <link rel="stylesheet" href="http://serverapi.arcgisonline.com/jsapi/arcgis/3.4/js/dojo/dijit/themes/nihilo/nihilo.css">
        <link rel="stylesheet" href="//serverapi.arcgisonline.com/jsapi/arcgis/3.4/js/esri/css/esri.css">
        <link rel="stylesheet" href="js/theme/default/style.css" type="text/css">
        <link rel="stylesheet" href="js/ccafs/dijit/mapgallery/css/mapgallery.css">
        <link rel="stylesheet" href="css/analoguesdtb_.css">
        <script type="text/javascript">
            $(document).ready(function () {
                var map = new google.maps.Map(document.getElementById('map_canvas'), {
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: new google.maps.LatLng(0, 0),
                    zoom: 2
                });
            });
        </script>
        <style>
            html {
                height: 100%
            }
            body {
                height: 100%;
                margin: 0;
                padding: 0
            }
            #map_canvas {
                height: 800px;
            }
            #wrapper {
                position: relative;
            }
            #over_map {
                position: absolute;
                background-color: transparent;
                height:800px;
                top: 0px;
                left: 0px;
                padding-top: 20px;
                padding-left: 20px;
                /*height: 500px;*/
                z-index: 99;
                background: #f2f3f0;
                width:300px;
            }
            #over_map_right {
                position: absolute;
                opacity: 0.9;
                height:800px;
                top: 0px;
                right: 0px;
                z-index: 99;
            }
            .right-buttons{
                background: rgb(165,165,165);
                color: #f9f9f9;
                border:#999;
                font-size: 0.8em;
                margin-top: 10px;
                margin-bottom: 10px;
                padding-top:10px;
                height: 75px;
                text-align: center;
                width: 75px;
            }
            .right-buttons img{
                background: #FFFFFF;
                padding: 5px;
                width: 30px;
                height: 30px;
            }
            .right-buttons p{
                margin-top: 5px;
                width: 40px;
                line-height: 11px;
                margin-left: 21%;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="map_canvas"></div>
            <div id="over_map">
                <!-- Steps to Run the Analysis-->
                <div style="height: 60px;padding-top: 10px;">                  
                    <ol class="carousel-indicators" data-dojo-attach-point="indicatorsNode">
                        <a id="helpTitleSection" href="#" onClick="displaySection('step1Title')"><li class="active" data-slide-to="0">1</li></a>
                        <a id="helpTitleSection" href="#" onClick="displaySection('step2Title')"><li data-slide-to="1">2</li></a>
                        <a id="helpTitleSection" href="#" onClick="displaySection('step3Title')"><li data-slide-to="2">3</li></a>
                        <a id="helpTitleSection" href="#" onClick="displaySection('step4Title')"><li data-slide-to="3">4</li></a>
                    </ol>                     
                </div>
                <div id="step1Title" class="stepContent">

                    <div style="height:400px;margin:1px;border:1px solid #999;background:#f9f9f9; "> 
                        <div id="step1" style="padding-left:15px;padding-right:15px;"> 
                            <h3>Step 1: Select your location</h3> 
                            <p style="display:inline;">i) Select a reference site:</p> 
                            <div id="zoneshelp" style="position:relative;margin-left:10px;margin-bottom:5px;" class="icon-question-sign"></div> 
                            <div class="alert fade in"> 
                                Use the tab below to zoom to a country then click a location on the map to get coordinates, or alternatively, enter the latitude and longitude directly 
                            </div> 
                            <select id="ClimaticZone" style="width:100px;display:inline;" title="" onchange="ZoomtoClimaticZone(this.options[this.selectedIndex].value);"> 
                                <!-- <option disabled="disabled" value="none" selected="">Zoom to country</option>--> 
                                <option value="global" selected="selected" >Global</option> 
                                <optgroup label="COUNTRY">

                                </optgroup>
                            </select> 
                            <div style="position:relative;width:120px;float:right;top:-10px;"> 
                                <div class="form-horizontal control-group"> 
                                    <label class="control-label" for="lat">Latitude:</label> 
                                    <div class="controls"> 
                                        <input id="lat" onchange="addSiteSelected();" type="number" step="any" min="-60.0" max="90.0" class="input-small"  value="" placeholder="eg. 33.593"/> 
                                        <span id="lathelp" class="icon-question-sign"></span> 
                                    </div> 
                                </div> 
                                <div class="form-horizontal control-group"> 
                                    <label class="control-label" for="lng">Longitude:</label> 
                                    <div class="controls"> 
                                        <input id="lng" onchange="addSiteSelected();" type="number" step="any" min="-180.0" max="180.0" class="input-small" value="" placeholder="eg. 0.732" /> 
                                        <span id="lnghelp" class="icon-question-sign"></span> 
                                    </div> 
                                </div>
                            </div>
                            <hr/>
                            <p style="display:inline;">ii) Select a search range:</p> 
                            <div id="searchrangehelp" style="position:relative;margin-left:10px;margin-bottom:10px;margin-right:25px;" class="icon-question-sign"></div> 
                            <select id="SearchRange" onchange="checkClimaticZones();"> 
                                <option value="global" selected="">Global</option> 
                                <optgroup label="COUNTRY">

                                </optgroup>
                            </select>
                            <hr/> 
                        </div> 
                    </div>
                </div>
                <!-- End of the Step 1 -->
                <div class="stepContent" id="step2Title" > 
                    <h3>Step 2: Select a direction and global climate models </h3> 
                    <div> 
                        <h5 style=" margin-right:20px;">Direction:</h5> 
                        <div id="directionBtns" class="btn-group" data-toggle="buttons-radio"> 
                            <button type="button" class="btn" name="backward">Backward</button> 
                            <button type="button" class="btn" name="forward">Forward</button> 
                            <button type="button" class="active btn btn-primary" name="none">None</button> 
                        </div> 
                        <span id="directionhelp" class="icon-question-sign"></span> 
                        
                    </div> 
                    <div> 
                        <h5 style="margin-bottom:0px;">Global climate models: <span id="gcmshelp" class="icon-question-sign"></span></h5> 
                        <table style="margin-bottom:0px; background-color:#f9f9f9;"> 
                            <tr>
                                <td style="width:20%;text-align:center;vertical-align:top;"> 
                                    <div style="margin-top:48px;"><strong>Period</strong> <span id="periodhelp" class="icon-question-sign"></span></div> 
                                    <div style="margin-top:24px;"><strong>Scenario</strong> <span id="scenariohelp" class="icon-question-sign"></span></div> 
                                    <div style="margin-top:55px;"><strong>Model</strong> <span id="modelhelp" class="icon-question-sign"></span></div> 
                                    <div style="margin-top:60px;"><strong>Resolution</strong> <span id="resolutionhelp" class="icon-question-sign"></span></div> 
                                </td>
                                <td style="width:40%;"> 
                                    <div class="gcmOptions"> 
                                        <h5 style="text-align:center;">Reference site:</h5> 
                                        <select id="refPeriod" style="width:250px;" onchange="changeRefPeriod(this.options[this.selectedIndex].value);"> 
                                            <option value="1960_1990" selected="">1960 - 1990</option> 
                                            <option value="2020_2049">2020 - 2049</option> 
                                        </select>
                                        <select id="refScenario" style="width:250px;" onchange="changeRefScenario(this.options[this.selectedIndex].value);"> 
                                            <option value="baseline" selected="">Baseline</option> 
                                            <option value="a1b">SRES A1B</option> 
                                            <option value="a2" disabled="disabled">SRES A2</option> 
                                            <option value="b1" disabled="disabled">SRES B1</option> 
                                        </select>
                                        <select id="refgcm" multiple="multiple" name="refModelGCM" size="5" style="width:250px;" onchange="changeRefGCM(this.options[this.selectedIndex].value);">
                                        </select> 
                                        <select id="refResolution" style="width:250px;" onchange="changeRefResolution(this.options[this.selectedIndex].value);"> 
                                            <option value="30s" disabled="disabled">30 arc-seconds</option> 
                                            <option value="2_5min" >2.5 arc-minutes</option> 
                                            <option value="10min" selected="" >10 arc-minutes</option> 
                                        </select>
                                    </div> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td style="width:20%;text-align:center;vertical-align:top;"> 
                                    <div style="margin-top:48px;"><strong>Period</strong> <span id="periodhelp" class="icon-question-sign"></span></div> 
                                    <div style="margin-top:24px;"><strong>Scenario</strong> <span id="scenariohelp" class="icon-question-sign"></span></div> 
                                    <div style="margin-top:55px;"><strong>Model</strong> <span id="modelhelp" class="icon-question-sign"></span></div> 
                                    <div style="margin-top:60px;"><strong>Resolution</strong> <span id="resolutionhelp" class="icon-question-sign"></span></div> 
                                </td>
                                <td style="width:40%;"> 
                                    <div class="gcmOptions"> 
                                        <h5 style="text-align:center;">Search range:</h5> 
                                        <select id="targetPeriod" style="width:250px;" onchange="changeTargetPeriod(this.options[this.selectedIndex].value);"> 
                                            <option value="1960_1990" selected="">1960 - 1990</option> 
                                            <option value="2020_2049">2020 - 2049</option> 
                                        </select>
                                        <select id="targetScenario" style="width:250px;" onchange="changeTargetScenario(this.options[this.selectedIndex].value);"> 
                                            <option value="baseline" selected="">Baseline</option> 
                                            <option value="a1b">SRES A1B</option> 
                                            <option value="a2" disabled="disabled">SRES A2</option> 
                                            <option value="b1" disabled="disabled">SRES B1</option> 
                                        </select>
                                        <select id="targetgcm" multiple="multiple" name="targetModelGCM" size="5" style="width:250px;" onchange="changeTargetGCM(this.options[this.selectedIndex].value);">
                                        </select> 
                                        <select id="targetResolution" style="width:250px;" onchange="changeTargetResolution(this.options[this.selectedIndex].value);">
                                            <option value="30s" disabled="disabled">30 arc-seconds</option>
                                            <option value="2_5min">2.5 arc-minutes</option>
                                            <option value="10min" selected="" >10 arc-minutes</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <p class="btnStep2"><a id="step2Btn" class="btn btn-success btn-large" href="JavaScript:void(0);" >Continue &raquo;</a></p> -->
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
                <!-- End of the Step 2 -->
                <div class="stepContent" id="step3Title" style="width:500px;">
                    <h3>Step 3: Select climate variables and define other analysis settings</h3>
                    <div style="width:100%;height:325px;overflow:visible;">
                        <table style="width:100%;height:325px;">
                            <tr>
                                <td width="55%">
                                    <p style="position:relative;float:left;font-weight:bold;">Climatic and bioclimatic variables &nbsp;&nbsp;
                                        <span id="climaticvarshelp" class="icon-question-sign"></span></p>
                                    <p style="position:relative;float:right;margin-right:35px;ont-weight:bold;">Weights&nbsp;&nbsp;
                                        <span id="weightshelp" class="icon-question-sign"></span></p>
                                    <div id="divclimaticvars" style="width:100%;height:288px;overflow-y:auto;border: 1px solid rgb(41, 116, 53);border-radius: 5px;"
                                         class="form-horizontal">
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_tmean" checked="true"/>
                                            <label class="control-label" for="tmean">MONTHLY MEAN TEMPERATURE</label>
                                            <input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="0.5" id="tmean"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_prec" checked="true"/>
                                            <label class="control-label" for="prec">MONTHLY PRECIPITATION</label>
                                            <input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="0.5" id="prec"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_1"/>
                                            <label class="control-label" for="bio_1">ANNUAL MEAN TEMPERATURE</label>
                                            <input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_1"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_2"/>
                                            <label class="control-label" for="bio_2">MEAN DIURNAL RANGE</label>
                                            <input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_2"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_3"/>
                                            <label class="control-label" for="bio_3">ISOTHERMALITY</label>
                                            <input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_3"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_4"/>
                                            <label class="control-label" for="bio_4">TEMPERATURE SEASONALITY
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_4"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_5"/>
                                            <label class="control-label" for="bio_5">MAX TEMPERATURE OF WARMEST PERIOD
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_5"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_6"/>
                                            <label class="control-label" for="bio_6">MIN TEMPERATURE OF COLDEST PERIOD
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_6"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_7"/>
                                            <label class="control-label" for="bio_7">TEMPERATURE ANNUAL RANGE
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_7"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_8"/>
                                            <label class="control-label" for="bio_8">MEAN TEMPERATURE OF WETTEST QUARTER
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_8"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_9"/>
                                            <label class="control-label" for="bio_9">MEAN TEMPERATURE OF DRIEST QUARTER
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_9"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_10"/>
                                            <label class="control-label" for="bio_10">MEAN TEMPERATURE OF WARMEST QUARTER
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_10"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_11"/>
                                            <label class="control-label" for="bio_11">MEAN TEMPERATURE OF COLDEST QUARTER
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_11"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_12"/>
                                            <label class="control-label" for="bio_12">ANNUAL PRECIPITATION
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_12"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_13"/>
                                            <label class="control-label" for="bio_13">PRECIPITATION OF WETTEST PERIOD
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_13"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_14"/>
                                            <label class="control-label" for="bio_14">PRECIPITATION OF DRIEST PERIOD
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_14"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_15"/>
                                            <label class="control-label" for="bio_15">PRECIPITATION SEASONALITY
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_15"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_16"/>
                                            <label class="control-label" for="bio_16">PRECIPITATION OF WETTEST QUARTER
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_16"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_17"/>
                                            <label class="control-label" for="bio_17">PRECIPITATION OF DRIEST QUARTER
                                            </label><input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_17"></p>
                                        <p class="pclimaticvars"><input type="checkbox" id="chk_bio_18"/>
                                            <label class="control-label" for="bio_18">PRECIPITATION OF WARMEST QUARTER</label>
                                            <input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_18"></p>
                                        <p class="pclimaticvars bgGray"><input type="checkbox" id="chk_bio_19"/>
                                            <label class="control-label" for="bio_19">PRECIPITATION OF COLDEST QUARTER</label>
                                            <input onkeypress="onkeypressClimaticVars();" type="number" step="0.01" min="0.0" max="1.0" class="input-small" value="" id="bio_19"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="divOtherSettings">
                                        <div style="display:none;">
                                            <h5 style="display:inline; margin-right:20px;">Similarity Index:</h5>
                                            <div id="methodBtns" class="btn-group">
                                                <button type="button" class="active btn btn-primary" name="ccafs">ccafs</button>
                                                <button type="button" class="btn" name="hallegatte">hallegatte</button>
                                            </div>
                                            <span id="similarityIndexhelp" class="icon-question-sign"></span>
                                        </div>
                                        <div id="rotationOpts">
                                            <h5 style="display:inline; margin-right:10px;">Rotation:</h5>
                                            <div id="rotationBtns" class="btn-group">
                                                <button type="button" class="btn" name="prec" id="precbtn">prec</button>
                                                <button type="button" class="btn" name="tmean" id="tmeanbtn">tmean</button>
                                                <button type="button" class="btn" name="both" id="bothbtn">both</button>
                                                <button type="button" class="active btn btn-primary" name="none" id="nonebtn">none</button>
                                            </div>
                                            <span id="rotationhelp" class="icon-question-sign"></span>
                                        </div>
                                        <div>
                                            <h5>Temporal scope: &nbsp;&nbsp;<span id="growingseasonhelp" class="icon-question-sign"></span></h5>
                                            <div id="temporalScope" class="temporalScope">
                                                <table style="width:100%;text-align:center;">
                                                    <tr><td rowspan="2"><strong>Growing season date 1:</strong></td><td>Start</td><td></td><td>End</td></tr>
                                                    <tr>
                                                        <td><input id="growingSeason1_startDate" value="1" class="span1" type="number" min="1" max="12" data-dojo-type="bootstrap/Datepicker"></td>
                                                        <td></td>
                                                        <td><input id="growingSeason1_endDate" value="12" class="span1" type="number" min="1" max="12" data-dojo-type="bootstrap/Datepicker"></td>
                                                    </tr>
                                                    <tr><td rowspan="2"><strong>Growing season date 2:</strong></td><td>Start</td><td></td><td>End</td></tr>
                                                    <tr>
                                                        <td><input id="growingSeason2_startDate" value="" class="span1" type="number" min="1" max="12" data-dojo-type="bootstrap/Datepicker"></td>
                                                        <td></td>
                                                        <td><input id="growingSeason2_endDate" value="" class="span1" type="number" min="1" max="12" data-dojo-type="bootstrap/Datepicker"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="thresholddiv">
                                            <h5>Threshold: 
                                                <input id="threshold" type="number" step="0.01" min="0.0" max="1.0" value="0.0" class="input-mini"/>
                                                &nbsp;&nbsp;<span id="thresholdhelp" class="icon-question-sign"></span></h5>
                                        </div>
                                    </div>
                                    <p class="btnStep3"><a id="step3Btn" class="btn btn-success btn-large" href="JavaScript:void(0);" >Run Analysis &raquo;</a></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- End of the Step 3 -->
                <div class="stepContent" id="step4Title" style="">
                    <table cellpadding="4" style="width:100%;height:100%;">
                        <tr><td style="width:50%;">
                                <div style="width:100%; height:400px;margin:1px;border:1px solid #999;background:#f9f9f9;">
                                    <div id="step4" style="padding-left:15px;padding-right:15px;">
                                        <h3>Step 4: Selecting candidate analogue sites:</h3>
                                        <div id="divResults">
                                            <table id="tablelyrResults" class="table table-striped" style="margin:5px 0px;width:100%;">
                                            </table>
                                        </div>
                                        <div id="sessionBtns" style="display:block;text-align:left;margin-top:5px;">
                                            <div class="fileinputs">
                                                <input id="fileToLoad" type="file" class="file" onChange="loadSession();"/>
                                                <div class="fakefile">
                                                    <input style="width:80px;height:20px;" class="btn btn-primary" />
                                                    <p class="loadFileTitle">Load Session</p>
                                                </div>
                                            </div>
                                            <a id="saveSessionBtn" class="btn btn-primary" href="JavaScript:saveSession();">Save Session</a>
                                        </div>
                                        <hr style="margin:13px;"/>
                                        <div>
                                            <!--<div id="divProgressBar" class="progress progress-success progress-striped active">
                                                <div class="bar" style="width: 100%;">
                                                    <i style="position:relative;top:4px;">Calculating Climate Analogues for the selected site...</i>
                                                </div>
                                            </div>-->
                                            <!-- <p style="position:relative;float:left;text-align:center;"><a id="step4DownloadBtn" class="btn btn-success btn-large" href="JavaScript:void(0);" >Download Last Result</a></p>
                                            <p style="position:relative;float:right;text-align:center;"><a id="step4showMapLargeScreenBtn" class="btn btn-success btn-large" href="JavaScript:void(0);" >View Larger Map</a></p> -->
                                        </div>
                                    </div>
                            </td>
                            <!-- <td style="width:50%;">
                                <div id="mapaResultado"><div id="loading"><div id="loadingMessage">Processing Climate Similarity...<br><img src="imgs/loading_gray_circle.gif"></div> </div></div>
                                <div id="mapResults">
                                    <div id="mapResultsMouseposition" class="unselectable"></div>
                                    <div id="mapResultsLegend" class="unselectable" title="Interpreting results: Areas that have higher similarity values more closely resemble the specified climate at the reference site."></div>
                                </div>
                            </td> -->
                        </tr>

                    </table>
                </div>
                <!-- End of the Step 4 -->
            </div><!-- End of the steps -->

            <div id="over_map_right">
                <div class="right-buttons">
                    <img src="imgs/worldicon.png">
                    <p>Basemap Layer</p>
                </div>
                <div class="right-buttons">
                    <img src="imgs/files.png">
                    <p>Previous Runs</p>
                </div>
            </div>
        </div>

    </body>
</html>
