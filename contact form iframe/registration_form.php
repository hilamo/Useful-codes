<?php global $site_options,$button_text;?>
<?php
    if(!$button_text){
        $button_text = isset($_GET['btn_text']) ? sanitize_text_field($_GET['btn_text']) : __("Start Trading","optionsclick");
    }
    $text_color = isset($_GET["text_color"]) ? sanitize_text_field($_GET["text_color"]) : "";
?>
<style>
    <?php if($text_color):?>
        .page-template-template-registration-standalone .checkbox .right{
            color:#<?php echo $text_color;?>;
        }
        a{
          color:#<?php echo $text_color;?>;
        }
    <?php endif;?>
</style>
<div class="right-content home-pos opacity-filter">
    <div class="contactForm">
        <div class="title_wrap">
            <h3><?php _e("Open a free account","optionsclick");?></h3>
        </div>

        <form id="account_lead_form_m" method="post" action="<?php echo esc_html($site_options["submit_registration_to"]);?>" novalidate target="<?php echo $button_text ? "_blank" :"";?>">
            <input type="hidden" name="oftc" value="" class="oftc"/>
            <input type="hidden" name="p1" value="" class="p1"/>
            <input type="hidden" name="p2" value="" class="p2"/>
            <input type="hidden" name="p3" value="" class="p3"/>
            <div>
                <label></label>
                <div class="field_wrap">
                    <input name="firstname" id="firstname" type="text" placeholder="<?php _e("First Name","optionsclick");?>:" required/>
                </div>
                <div class="field_wrap">
                    <input name="lastname" id="lastname" type="text" placeholder="<?php _e("Last Name","optionsclick");?>:"  required/>
                </div>
                <div class="field_wrap">
                    <input name="email" id="email" type="text" placeholder="<?php _e("Email","optionsclick");?>:"  required/>
                </div>
                <div class="field_wrap">
                    <select name="countryid" class="gwt-ListBox register_countrybox" id="country" tabindex="0"  required>
                        <option value="" selected="selected"><?php _e("Country","optionsclick");?></option>
                        <?php /* <option data-ext="1" title="Canada" value="CA">Canada</option> */?>
                        <option data-ext="33" title="France" value="FR">France</option>
                        <?php /*<option data-ext="1" title="United States" value="US">United States</option> */?>
                        <option disabled="disabled">--------------------------------------</option>
                        <option data-ext="93" title="Afghanistan" value="AF">Afghanistan</option>
                        <option data-ext="358" title="Aland Islands" value="AX">Aland Islands</option>
                        <option data-ext="355" title="Albania" value="AL">Albania</option>
                        <option data-ext="213" title="Algeria" value="DZ">Algeria</option>
                        <option data-ext="684" title="American Samoa" value="AS">American Samoa</option>
                        <option data-ext="376" title="Andorra" value="AD">Andorra</option>
                        <option data-ext="244" title="Angola" value="AO">Angola</option>
                        <option data-ext="264" title="Anguilla" value="AI">Anguilla</option>
                        <option data-ext="268" title="Antigua and Barbuda" value="AG">Antigua and Barbuda</option>
                        <option data-ext="54" title="Argentina" value="AR">Argentina</option>
                        <option data-ext="374" title="Armenia" value="AM">Armenia</option>
                        <option data-ext="297" title="Aruba" value="AW">Aruba</option>
                        <option data-ext="61" title="Australia" value="AU">Australia</option>
                        <option data-ext="43" title="Austria" value="AT">Austria</option>
                        <option data-ext="994" title="Azerbaijan" value="AZ">Azerbaijan</option>
                        <option data-ext="242" title="Bahamas" value="BS">Bahamas</option>
                        <option data-ext="973" title="Bahrain" value="BH">Bahrain</option>
                        <option data-ext="880" title="Bangladesh" value="BD">Bangladesh</option>
                        <option data-ext="246" title="Barbados" value="BB">Barbados</option>
                        <option data-ext="375" title="Belarus" value="BY">Belarus</option>
                        <option data-ext="32" title="Belgium" value="BE">Belgium</option>
                        <option data-ext="501" title="Belize" value="BZ">Belize</option>
                        <option data-ext="229" title="Benin" value="BJ">Benin</option>
                        <option data-ext="441" title="Bermuda" value="BM">Bermuda</option>
                        <option data-ext="975" title="Bhutan" value="BT">Bhutan</option>
                        <option data-ext="591" title="Bolivia" value="BO">Bolivia</option>
                        <option data-ext="387" title="Bosnia and Herzegovina" value="BA">Bosnia and Herzegovina</option>
                        <option data-ext="267" title="Botswana" value="BW">Botswana</option>
                        <option data-ext="55" title="Brazil" value="BR">Brazil</option>
                        <option data-ext="673" title="Brunei Darussalam" value="BN">Brunei Darussalam</option>
                        <option data-ext="359" title="Bulgaria" value="BG">Bulgaria</option>
                        <option data-ext="226" title="Burkina Faso" value="BF">Burkina Faso</option>
                        <option data-ext="257" title="Burundi" value="BI">Burundi</option>
                        <option data-ext="855" title="Cambodia" value="KH">Cambodia</option>
                        <option data-ext="237" title="Cameroon" value="CM">Cameroon</option>
                        <option data-ext="1" title="Canada" value="CA">Canada</option>
                        <option data-ext="238" title="Cape Verde" value="CV">Cape Verde</option>
                        <option data-ext="345" title="Cayman Islands" value="KY">Cayman Islands</option>
                        <option data-ext="236" title="Central African Republic" value="CF">Central African Republic</option>
                        <option data-ext="235" title="Chad" value="TD">Chad</option>
                        <option data-ext="56" title="Chile" value="CL">Chile</option>
                        <option data-ext="86" title="China" value="CN">China</option>
                        <option data-ext="57" title="Colombia" value="CO">Colombia</option>
                        <option data-ext="269" title="Comoros" value="KM">Comoros</option>
                        <option data-ext="242" title="Congo" value="CG">Congo</option>
                        <option data-ext="243" title="Congo" value="CD">Congo</option>
                        <option data-ext="682" title="Cook Islands" value="CK">Cook Islands</option>
                        <option data-ext="506" title="Costa Rica" value="CR">Costa Rica</option>
                        <option data-ext="225" title="Cote d'Ivoire" value="CI">Cote d'Ivoire</option>
                        <option data-ext="385" title="Croatia" value="HR">Croatia</option>
                        <option data-ext="53" title="Cuba" value="CU">Cuba</option>
                        <option data-ext="357" title="Cyprus" value="CY">Cyprus</option>
                        <option data-ext="420" title="Czech Republic" value="CZ">Czech Republic</option>
                        <option data-ext="45" title="Denmark" value="DK">Denmark</option>
                        <option data-ext="253" title="Djibouti" value="DJ">Djibouti</option>
                        <option data-ext="767" title="Dominica" value="DM">Dominica</option>
                        <option data-ext="809" title="Dominican Republic" value="DO">Dominican Republic</option>
                        <option data-ext="593" title="Ecuador" value="EC">Ecuador</option>
                        <option data-ext="20" title="Egypt" value="EG">Egypt</option>
                        <option data-ext="503" title="El Salvador" value="SV">El Salvador</option>
                        <option data-ext="240" title="Equatorial Guinea" value="GQ">Equatorial Guinea</option>
                        <option data-ext="291" title="Eritrea" value="ER">Eritrea</option>
                        <option data-ext="372" title="Estonia" value="EE">Estonia</option>
                        <option data-ext="251" title="Ethiopia" value="ET">Ethiopia</option>
                        <option data-ext="500" title="Falkland Islands (Malvinas)" value="FK">Falkland Islands (Malvinas)</option>
                        <option data-ext="298" title="Faroe Islands" value="FO">Faroe Islands</option>
                        <option data-ext="679" title="Fiji" value="FJ">Fiji</option>
                        <option data-ext="358" title="Finland" value="FI">Finland</option>
                        <option data-ext="33" title="France" value="FR">France</option>
                        <option data-ext="594" title="French Guiana" value="GF">French Guiana</option>
                        <option data-ext="689" title="French Polynesia" value="PF">French Polynesia</option>
                        <option data-ext="241" title="Gabon" value="GA">Gabon</option>
                        <option data-ext="220" title="Gambia" value="GM">Gambia</option>
                        <option data-ext="995" title="Georgia" value="GE">Georgia</option>
                        <option data-ext="49" title="Germany" value="DE">Germany</option>
                        <option data-ext="233" title="Ghana" value="GH">Ghana</option>
                        <option data-ext="350" title="Gibraltar" value="GI">Gibraltar</option>
                        <option data-ext="30" title="Greece" value="GR">Greece</option>
                        <option data-ext="299" title="Greenland" value="GL">Greenland</option>
                        <option data-ext="473" title="Grenada" value="GD">Grenada</option>
                        <option data-ext="590" title="Guadeloupe" value="GP">Guadeloupe</option>
                        <option data-ext="671" title="Guam" value="GU">Guam</option>
                        <option data-ext="502" title="Guatemala" value="GT">Guatemala</option>
                        <option data-ext="44" title="Guernsey" value="GG">Guernsey</option>
                        <option data-ext="224" title="Guinea" value="GN">Guinea</option>
                        <option data-ext="245" title="Guinea-bissau" value="GW">Guinea-bissau</option>
                        <option data-ext="592" title="Guyana" value="GY">Guyana</option>
                        <option data-ext="509" title="Haiti" value="HT">Haiti</option>
                        <option data-ext="379" title="Holy See (Vatican City State)" value="VA">Holy See (Vatican City State)</option>
                        <option data-ext="504" title="Honduras" value="HN">Honduras</option>
                        <option data-ext="852" title="Hong kong" value="HK">Hong kong</option>
                        <option data-ext="36" title="Hungary" value="HU">Hungary</option>
                        <option data-ext="354" title="Iceland" value="IS">Iceland</option>
                        <option data-ext="91" title="India" value="IN">India</option>
                        <option data-ext="62" title="Indonesia" value="ID">Indonesia</option>
                        <option data-ext="98" title="Iran" value="IR">Iran</option>
                        <option data-ext="964" title="Iraq" value="IQ">Iraq</option>
                        <option data-ext="353" title="Ireland" value="IE">Ireland</option>
                        <option data-ext="44" title="Isle of Man" value="IM">Isle of Man</option>
                        <option data-ext="972" title="Israel" value="IL">Israel</option>
                        <option data-ext="39" title="Italy" value="IT">Italy</option>
                        <option data-ext="876" title="Jamaica" value="JM">Jamaica</option>
                        <option data-ext="81" title="Japan" value="JP">Japan</option>
                        <option data-ext="44" title="Jersey" value="JE">Jersey</option>
                        <option data-ext="962" title="Jordan" value="JO">Jordan</option>
                        <option data-ext="7" title="Kazakhstan" value="KZ">Kazakhstan</option>
                        <option data-ext="254" title="Kenya" value="KE">Kenya</option>
                        <option data-ext="686" title="Kiribati" value="KI">Kiribati</option>
                        <option data-ext="850" title="Korea, democratic people's Republic of" value="KP">Korea, democratic people's Republic of</option>
                        <option data-ext="82" title="Korea, Republic of" value="KR">Korea, Republic of</option>
                        <option data-ext="965" title="Kuwait" value="KW">Kuwait</option>
                        <option data-ext="996" title="Kyrgyzstan" value="KG">Kyrgyzstan</option>
                        <option data-ext="856" title="Lao people's Democratic Republic" value="LA">Lao people's Democratic Republic</option>
                        <option data-ext="371" title="Latvia" value="LV">Latvia</option>
                        <option data-ext="961" title="Lebanon" value="LB">Lebanon</option>
                        <option data-ext="266" title="Lesotho" value="LS">Lesotho</option>
                        <option data-ext="231" title="Liberia" value="LR">Liberia</option>
                        <option data-ext="218" title="Libyan Arab Jamahiriya" value="LY">Libyan Arab Jamahiriya</option>
                        <option data-ext="423" title="Liechtenstein" value="LI">Liechtenstein</option>
                        <option data-ext="370" title="Lithuania" value="LT">Lithuania</option>
                        <option data-ext="352" title="Luxembourg" value="LU">Luxembourg</option>
                        <option data-ext="853" title="Macao" value="MO">Macao</option>
                        <option data-ext="389" title="Macedonia" value="MK">Macedonia</option>
                        <option data-ext="261" title="Madagascar" value="MG">Madagascar</option>
                        <option data-ext="265" title="Malawi" value="MW">Malawi</option>
                        <option data-ext="60" title="Malaysia" value="MY">Malaysia</option>
                        <option data-ext="960" title="Maldives" value="MV">Maldives</option>
                        <option data-ext="223" title="Mali" value="ML">Mali</option>
                        <option data-ext="356" title="Malta" value="MT">Malta</option>
                        <option data-ext="692" title="Marshall Islands" value="MH">Marshall Islands</option>
                        <option data-ext="596" title="Martinique" value="MQ">Martinique</option>
                        <option data-ext="222" title="Mauritania" value="MR">Mauritania</option>
                        <option data-ext="230" title="Mauritius" value="MU">Mauritius</option>
                        <option data-ext="52" title="Mexico" value="MX">Mexico</option>
                        <option data-ext="691" title="Micronesia, federated states of" value="FM">Micronesia, federated states of</option>
                        <option data-ext="373" title="Moldova, Republic of" value="MD">Moldova, Republic of</option>
                        <option data-ext="377" title="Monaco" value="MC">Monaco</option>
                        <option data-ext="976" title="Mongolia" value="MN">Mongolia</option>
                        <option data-ext="382" title="Montenegro" value="ME">Montenegro</option>
                        <option data-ext="664" title="Montserrat" value="MS">Montserrat</option>
                        <option data-ext="212" title="Morocco" value="MA">Morocco</option>
                        <option data-ext="258" title="Mozambique" value="MZ">Mozambique</option>
                        <option data-ext="95" title="Myanmar" value="MM">Myanmar</option>
                        <option data-ext="264" title="Namibia" value="NA">Namibia</option>
                        <option data-ext="674" title="Nauru" value="NR">Nauru</option>
                        <option data-ext="977" title="Nepal" value="NP">Nepal</option>
                        <option data-ext="31" title="Netherlands" value="NL">Netherlands</option>
                        <option data-ext="599" title="Netherlands Antilles" value="AN">Netherlands Antilles</option>
                        <option data-ext="687" title="New Caledonia" value="NC">New Caledonia</option>
                        <option data-ext="64" title="New Zealand" value="NZ">New Zealand</option>
                        <option data-ext="505" title="Nicaragua" value="NI">Nicaragua</option>
                        <option data-ext="227" title="Niger" value="NE">Niger</option>
                        <option data-ext="234" title="Nigeria" value="NG">Nigeria</option>
                        <option data-ext="683" title="Niue" value="NU">Niue</option>
                        <option data-ext="672" title="Norfolk Island" value="NF">Norfolk Island</option>
                        <option data-ext="670" title="Northern Mariana Islands" value="MP">Northern Mariana Islands</option>
                        <option data-ext="47" title="Norway" value="NO">Norway</option>
                        <option data-ext="968" title="Oman" value="OM">Oman</option>
                        <option data-ext="92" title="Pakistan" value="PK">Pakistan</option>
                        <option data-ext="680" title="Palau" value="PW">Palau</option>
                        <option data-ext="507" title="Panama" value="PA">Panama</option>
                        <option data-ext="675" title="Papua New Guinea" value="PG">Papua New Guinea</option>
                        <option data-ext="595" title="Paraguay" value="PY">Paraguay</option>
                        <option data-ext="51" title="Peru" value="PE">Peru</option>
                        <option data-ext="63" title="Philippines" value="PH">Philippines</option>
                        <option data-ext="48" title="Poland" value="PL">Poland</option>
                        <option data-ext="351" title="Portugal" value="PT">Portugal</option>
                        <option data-ext="787" title="Puerto Rico" value="PR">Puerto Rico</option>
                        <option data-ext="974" title="Qatar" value="QA">Qatar</option>
                        <option data-ext="262" title="Reunion" value="RE">Reunion</option>
                        <option data-ext="40" title="Romania" value="RO">Romania</option>
                        <option data-ext="7" title="Russian Federation" value="RU">Russian Federation</option>
                        <option data-ext="250" title="Rwanda" value="RW">Rwanda</option>
                        <option data-ext="290" title="Saint Helena" value="SH">Saint Helena</option>
                        <option data-ext="869" title="Saint Kitts and Nevis" value="KN">Saint Kitts and Nevis</option>
                        <option data-ext="758" title="Saint Lucia" value="LC">Saint Lucia</option>
                        <option data-ext="590" title="Saint Martin" value="MF">Saint Martin</option>
                        <option data-ext="508" title="Saint Pierre and Miquelon" value="PM">Saint Pierre and Miquelon</option>
                        <option data-ext="784" title="Saint Vincent and the Grenadines" value="VC">Saint Vincent and the Grenadines</option>
                        <option data-ext="685" title="Samoa" value="WS">Samoa</option>
                        <option data-ext="378" title="San Marino" value="SM">San Marino</option>
                        <option data-ext="239" title="Sao Tome and Principe" value="ST">Sao Tome and Principe</option>
                        <option data-ext="966" title="Saudi Arabia" value="SA">Saudi Arabia</option>
                        <option data-ext="221" title="Senegal" value="SN">Senegal</option>
                        <option data-ext="248" title="Seychelles" value="SC">Seychelles</option>
                        <option data-ext="232" title="Sierra Leone" value="SL">Sierra Leone</option>
                        <option data-ext="65" title="Singapore" value="SG">Singapore</option>
                        <option data-ext="421" title="Slovakia" value="SK">Slovakia</option>
                        <option data-ext="386" title="Slovenia" value="SI">Slovenia</option>
                        <option data-ext="677" title="Solomon Islands" value="SB">Solomon Islands</option>
                        <option data-ext="252" title="Somalia" value="SO">Somalia</option>
                        <option data-ext="27" title="South Africa" value="ZA">South Africa</option>
                        <option data-ext="34" title="Spain" value="ES">Spain</option>
                        <option data-ext="94" title="Sri Lanka" value="LK">Sri Lanka</option>
                        <option data-ext="249" title="Sudan" value="SD">Sudan</option>
                        <option data-ext="597" title="Suriname" value="SR">Suriname</option>
                        <option data-ext="268" title="Swaziland" value="SZ">Swaziland</option>
                        <option data-ext="46" title="Sweden" value="SE">Sweden</option>
                        <option data-ext="41" title="Switzerland" value="CH">Switzerland</option>
                        <option data-ext="963" title="Syrian Arab Republic" value="SY">Syrian Arab Republic</option>
                        <option data-ext="886" title="Taiwan, Province of China" value="TW">Taiwan, Province of China</option>
                        <option data-ext="992" title="Tajikistan" value="TJ">Tajikistan</option>
                        <option data-ext="255" title="Tanzania, United Republic of" value="TZ">Tanzania, United Republic of</option>
                        <option data-ext="66" title="Thailand" value="TH">Thailand</option>
                        <option data-ext="228" title="Togo" value="TG">Togo</option>
                        <option data-ext="690" title="Tokelau" value="TK">Tokelau</option>
                        <option data-ext="676" title="Tonga" value="TO">Tonga</option>
                        <option data-ext="868" title="Trinidad and Tobago" value="TT">Trinidad and Tobago</option>
                        <option data-ext="216" title="Tunisia" value="TN">Tunisia</option>
                        <option data-ext="90" title="Turkey" value="TR">Turkey</option>
                        <option data-ext="993" title="Turkmenistan" value="TM">Turkmenistan</option>
                        <option data-ext="649" title="Turks and Caicos Islands" value="TC">Turks and Caicos Islands</option>
                        <option data-ext="688" title="Tuvalu" value="TV">Tuvalu</option>
                        <option data-ext="256" title="Uganda" value="UG">Uganda</option>
                        <option data-ext="380" title="Ukraine" value="UA">Ukraine</option>
                        <option data-ext="971" title="United Arab Emirates" value="AE">United Arab Emirates</option>
                        <option data-ext="44" title="United Kingdom" value="GB">United Kingdom</option>
                        <option data-ext="1" title="United States" value="US">United States</option>
                        <option data-ext="598" title="Uruguay" value="UY">Uruguay</option>
                        <option data-ext="998" title="Uzbekistan" value="UZ">Uzbekistan</option>
                        <option data-ext="678" title="Vanuatu" value="VU">Vanuatu</option>
                        <option data-ext="58" title="Venezuela" value="VE">Venezuela</option>
                        <option data-ext="84" title="Vietnam" value="VN">Vietnam</option>
                        <option data-ext="284" title="Virgin Islands, British" value="VG">Virgin Islands, British</option>
                        <option data-ext="340" title="Virgin islands, U.S." value="VI">Virgin islands, U.S.</option>
                        <option data-ext="681" title="Wallis and Futuna" value="WF">Wallis and Futuna</option>
                        <option data-ext="212" title="Western Sahara" value="EH">Western Sahara</option>
                        <option data-ext="967" title="Yemen" value="YE">Yemen</option>
                        <option data-ext="260" title="Zambia" value="ZM">Zambia</option>
                        <option data-ext="263" title="Zimbabwe" value="ZW">Zimbabwe</option>
                    </select>
                </div>
                <div class="field_wrap phonebox">
                    <input type="text" style="width: 50px;" id="phoneRow" readonly="readonly" name="ext"/>
                    <input name="telephone" type="tel" id="telephone" placeholder="<?php _e("Phone Number","optionsclick");?>:" required/>
                </div>
                <div class="field_wrap">
                    <select name="currency">
                        <option value="1">USD</option>
                        <option value="2">GBP</option>
                        <option value="3">EUR</option>
                        <option value="22">SEK</option>
                        <option value="19">DKK</option>
                        <option value="7">NOK</option>
                        <option value="18">RUB</option>
                    </select>
                </div>
                <div class="checkbox">
                    <div class="field_wrap clearfix">
                        <input name="terms" type="checkbox" checked="checked" />
                        <span class="right">
                            <?php _e("I am over 18 years of age and I accept these","optionsclick");?>
                            <a href="<?php echo get_permalink($site_options["opt-terms_and_conditions_page_id"]);?>" target="_blank" style="text-decoration: underline;">
                                <?php _e("Legal Terms &amp; Conditions","optionsclick");?>
                            </a>
                            <?php _e("and I do not fall under the definition of a","optionsclick");?>
                            <a href="<?php echo get_permalink($site_options["opt-decleration_form_page_id"]);?>" target="_blank" style="text-decoration: underline;">
                                <?php _e("US reportable Person","optionsclick");?>
                            </a>
                        </span>
                    </div>
                </div>

                <button name="send" value="" type="submit" title="open a free account" class="form-submit"><?php echo $button_text;?></button>
            </div>
        </form><!-- /end #account_lead_form -->

    </div><!-- /end .contactForm -->
</div>
