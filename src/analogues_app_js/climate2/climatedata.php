<!DOCTYPE html>
<!--
Copyright (C) 2016 JGALLEGO

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
    </head>
    <body>
        <div>
            <div>
                <h1 style="text-align: center;">Climate Data</h1>
                <br/>

                <h4>The folder structure used for running Climate Analogues on desktop is:
                    <br/>
                    ccafs-analogues/tiles/
                    <br/>
                    this should contain the folders a1b, a2, b1 and baseline, every one of these named folders should have its country distribution in the different resolution and then inside that folder, the different models according to the scenario.
                </h4>
                <h2>Download our downscaled climate data </h2>
            </div>
            <form>
                <div>
                    <table>
                        <tr>
                            <td>
                                <label>Extent</label>
                            </td>
                            <td>
                                <select>
                                    <option>Global</option>
                                    <option>Region</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Fileset : Empirical/Statistical Downscaling</label></td>
                            <td>
                                <select>
                                    <option>Delta Method IPCC AR5</option>
                                    <option>Delta Method IPCC AR4</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Scenario</label></td>
                            <td>
                                <select>
                                    <!-- AR4 -->
                                    <option>Baseline</option>
                                    <option>A1B</option>
                                    <option>A2</option>
                                    <option>B1</option>
                                    <!-- AR5 create different select -->
                                    <option>RCP26</option>
                                    <option>RCP45</option>
                                    <option>RCP60</option>
                                    <option>RCP85</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Period</label></td>
                            <td>
                                <select>
                                    <option>1960-1990</option>
                                    <option>2020-2049</option>
                                </select>
                        </tr>
                        <tr>
                            <td>
                                <label>Model</label></td>
                            <td>
                                <select id="refgcm" multiple="multiple" name="refModelGCM" size="5" style="width:250px;" onchange="changeRefGCM(this.options[this.selectedIndex].value);">
                                    <option value="CURRENT" selected="">CURRENT</option>
                                    <option value="ENSEMBLE" disabled="disabled">ENSEMBLE</option>
                                    <option value="BCCR_BCM2_0" disabled="disabled">BCCR_BCM2_0</option>
                                    <option value="CCCMA_CGCM3_1_T47" disabled="disabled">CCCMA_CGCM3_1_T47</option>
                                    <option value="CCCMA_CGCM3_1_T63" disabled="disabled">CCCMA_CGCM3_1_T63</option>
                                    <option value="CNRM_CM3" disabled="disabled">CNRM_CM3</option>
                                    <option value="CSIRO_MK3_0" disabled="disabled">CSIRO_MK3_0</option>
                                    <option value="CSIRO_MK3_5" disabled="disabled">CSIRO_MK3_5</option>
                                    <option value="GFDL_CM2_0" disabled="disabled">GFDL_CM2_0</option>
                                    <option value="GFDL_CM2_1" disabled="disabled">GFDL_CM2_1</option>
                                    <option value="GISS_AOM" disabled="disabled">GISS_AOM</option>
                                    <option value="GISS_MODEL_EH" disabled="disabled">GISS_MODEL_EH</option>
                                    <option value="GISS_MODEL_ER" disabled="disabled">GISS_MODEL_ER</option>
                                    <option value="IAP_FGOALS1_0_G" disabled="disabled">IAP_FGOALS1_0_G</option>
                                    <option value="INGV_ECHAM4" disabled="disabled">INGV_ECHAM4</option>
                                    <option value="INM_CM3_0" disabled="disabled">INM_CM3_0</option>
                                    <option value="IPSL_CM4" disabled="disabled">IPSL_CM4</option>
                                    <option value="MIROC3_2_HIRES" disabled="disabled">MIROC3_2_HIRES</option>
                                    <option value="MIROC3_2_MEDRES" disabled="disabled">MIROC3_2_MEDRES</option>
                                    <option value="MIUB_ECHO_G" disabled="disabled">MIUB_ECHO_G</option>
                                    <option value="MPI_ECHAM5" disabled="disabled">MPI_ECHAM5</option>
                                    <option value="MRI_CGCM2_3_2A" disabled="disabled">MRI_CGCM2_3_2A</option>
                                    <option value="NCAR_CCSM3_0" disabled="disabled">NCAR_CCSM3_0</option>
                                    <option value="NCAR_PCM1" disabled="disabled">NCAR_PCM1</option>
                                    <option value="UKMO_HADCM3" disabled="disabled">UKMO_HADCM3</option>
                                    <option value="UKMO_HADGEM1" disabled="disabled">UKMO_HADGEM1</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Resolution</label></td>
                            <td>
                                <select>
                                    <option value="30s" disabled="disabled">30 arc-seconds</option>
                                    <option value="2_5min">2.5 arc-minutes</option>
                                    <option value="10min" selected="" >10 arc-minutes</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Country</label></td>
                            <td><select id="ClimaticZone" style="width:150px;display:inline;" title="" onchange="ZoomtoClimaticZone(this.options[this.selectedIndex].value);"> 	                                &lt;--! 	                                <option value="global" selected="selected">Global</option> 	<optgroup label="Continent"><option value="0">Africa</option><option value="0">Asia</option><option value="0">Europe</option><option value="0">North America</option><option value="0">South America</option><option value="0">Oceania</option></optgroup>                                <optgroup label="COUNTRY"><option value="0">Afghanistan</option><option value="1">Aland Islands</option><option value="2">Albania</option><option value="3">Algeria</option><option value="4">Andorra</option><option value="5">Angola</option><option value="6">Antigua and Barbuda</option><option value="7">Argentina</option><option value="8">Armenia</option><option value="9">Australia</option><option value="10">Austria</option><option value="11">Azerbaijan</option><option value="12">Bahrain</option><option value="13">Bangladesh</option><option value="14">Barbados</option><option value="15">Belarus</option><option value="16">Belgium</option><option value="17">Belize</option><option value="18">Benin</option><option value="19">Bermuda</option><option value="20">Bhutan</option><option value="21">Bolivia</option><option value="22">Bosnia-Herzegovina</option><option value="23">Botswana</option><option value="24">Brazil</option><option value="25">Brunei</option><option value="26">Bulgaria</option><option value="27">Burkina Faso</option><option value="28">Burundi</option><option value="29">Cambodia</option><option value="30">Cameroon</option><option value="31">Canada</option><option value="32">Cape Verde</option><option value="33">Central African Republic</option><option value="34">Chad</option><option value="35">Chile</option><option value="36">China</option><option value="37">Colombia</option><option value="38">Comoros</option><option value="39">Costa Rica</option><option value="40">Croatia</option><option value="41">Cuba</option><option value="42">Cyprus</option><option value="43">Czech Republic</option><option value="44">Denmark</option><option value="45">Djibouti</option><option value="46">Dominica</option><option value="47">Dominican Republic</option><option value="48">Ecuador</option><option value="49">Egypt</option><option value="50">El Salvador</option><option value="51">Equatorial Guinea</option><option value="52">Eritrea</option><option value="53">Estonia</option><option value="54">Ethiopia</option><option value="55">Faroe Islands</option><option value="56">Fiji</option><option value="57">Finland</option><option value="58">France</option><option value="59">French Guiana</option><option value="60">Gabon</option><option value="61">Georgia</option><option value="62">Germany</option><option value="63">Ghana</option><option value="64">Greece</option><option value="65">Greenland</option><option value="66">Grenada</option><option value="67">Guadeloupe</option><option value="68">Guatemala</option><option value="69">Guinea</option><option value="70">Guinea-Bissau</option><option value="71">Guyana</option><option value="72">Haiti</option><option value="73">Honduras</option><option value="74">Hungary</option><option value="75">Iceland</option><option value="76">India</option><option value="77">Indonesia</option><option value="78">Iran</option><option value="79">Iraq</option><option value="80">Ireland</option><option value="81">Israel</option><option value="82">Italy</option><option value="83">Ivory Coast</option><option value="84">Jamaica</option><option value="85">Japan</option><option value="86">Jordan</option><option value="87">Kazakhstan</option><option value="88">Kenya</option><option value="89">Kiribati</option><option value="90">Kuwait</option><option value="91">Kyrgyzstan</option><option value="92">Laos</option><option value="93">Latvia</option><option value="94">Lebanon</option><option value="95">Lesotho</option><option value="96">Liberia</option><option value="97">Libya</option><option value="98">Liechtenstein</option><option value="99">Lithuania</option><option value="100">Luxembourg</option><option value="101">Macau</option><option value="102">Macedonia</option><option value="103">Madagascar</option><option value="104">Malawi</option><option value="105">Malaysia</option><option value="106">Mali</option><option value="107">Martinique</option><option value="108">Mauritania</option><option value="109">Mauritius</option><option value="110">Mexico</option><option value="111">Monaco</option><option value="112">Mongolia</option><option value="113">Morocco</option><option value="114">Mozambique</option><option value="115">Myanmar</option><option value="116">Namibia</option><option value="117">Nepal</option><option value="118">Netherlands</option><option value="119">New Caledonia</option><option value="120">New Zealand</option><option value="121">Nicaragua</option><option value="122">Niger</option><option value="123">Nigeria</option><option value="124">North Korea</option><option value="125">Northern Mariana Islands</option><option value="126">Norway</option><option value="127">Oman</option><option value="128">Pakistan</option><option value="129">Panama</option><option value="130">Papua New Guinea</option><option value="131">Paraguay</option><option value="132">Peru</option><option value="133">Philippines</option><option value="134">Poland</option><option value="135">Portugal</option><option value="136">Puerto Rico</option><option value="137">Qatar</option><option value="138">Republic of Moldova</option><option value="139">Republic of the Congo</option><option value="140">Reunion</option><option value="141">Romania</option><option value="142">Russia</option><option value="143">Rwanda</option><option value="144">Saint Lucia</option><option value="145">Samoa</option><option value="146">San Marino</option><option value="147">Sao Tome and Principe</option><option value="148">Saudi Arabia</option><option value="149">Senegal</option><option value="150">Seychelles</option><option value="151">Sierra Leone</option><option value="152">Slovakia</option><option value="153">Slovenia</option><option value="154">Solomon Islands</option><option value="155">Somalia</option><option value="156">South Africa</option><option value="157">South Korea</option><option value="158">Spain</option><option value="159">Sri Lanka</option><option value="160">St. Vincent &amp; the Grenadines</option><option value="161">Sudan</option><option value="162">Suriname</option><option value="163">Svalbard and Jan Mayen Is.</option><option value="164">Swaziland</option><option value="165">Sweden</option><option value="166">Switzerland</option><option value="167">Syria</option><option value="168">Taiwan</option><option value="169">Tajikistan</option><option value="170">Tanzania</option><option value="171">Thailand</option><option value="172">The Bahamas</option><option value="173">The Gambia</option><option value="174">The Maldives</option><option value="175">Togo</option><option value="176">Tonga</option><option value="177">Tunisia</option><option value="178">Turkey</option><option value="179">Turkmenistan</option><option value="180">Turks and Caicos Islands</option><option value="181">Uganda</option><option value="182">Ukraine</option><option value="183">United Arab Emirates</option><option value="184">United Kingdom</option><option value="185">United States</option><option value="186">Uruguay</option><option value="187">Uzbekistan</option><option value="188">Vanuatu</option><option value="189">Venezuela</option><option value="190">Vietnam</option><option value="191">Western Sahara</option><option value="192">Yemen</option><option value="193">Zambia</option><option value="194">Zimbabwe</option></optgroup>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
