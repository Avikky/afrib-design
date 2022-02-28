@extends('layouts.app')
@section('pageTitle', 'Location')
@section('content')
<div class="content">
  <div class="container">
    
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
      @endif

      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Error!</strong>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    <div class="row">
      <div class="col-md-4">
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">Add Location</h3>
          </div>

          <div class="card-body">
            <form role="form" action="{{ route('create.location') }}" method="POST" >
                {{ csrf_field() }}
                <!-- text input -->
                    <div class="form-group">
                        <label>Select Country</label>

                        <!-- country codes (ISO 3166) and Dial codes. -->
                        <select class="form-control" name="country" id="">
                            <option data-countryCode="GB">UK (+44)</option>
                            <option data-countryCode="US" Selected>USA (+1)</option>
                            <optgroup label="Other countries">
                                <option data-countryCode="DZ">Algeria (+213)</option>
                                <option data-countryCode="AD" >Andorra (+376)</option>
                                <option data-countryCode="AO">Angola (+244)</option>
                                <option data-countryCode="AI" >Anguilla (+1264)</option>
                                <option data-countryCode="AG">Antigua &amp; Barbuda (+1268)</option>
                                <option data-countryCode="AR">Argentina (+54)</option>
                                <option data-countryCode="AM" >Armenia (+374)</option>
                                <option data-countryCode="AW">Aruba (+297)</option>
                                <option data-countryCode="AU" >Australia (+61)</option>
                                <option data-countryCode="AT">Austria (+43)</option>
                                <option data-countryCode="AZ">Azerbaijan (+994)</option>
                                <option data-countryCode="BS" >Bahamas (+1242)</option>
                                <option data-countryCode="BH" >Bahrain (+973)</option>
                                <option data-countryCode="BD">Bangladesh (+880)</option>
                                <option data-countryCode="BB">Barbados (+1246)</option>
                                <option data-countryCode="BY">Belarus (+375)</option>
                                <option data-countryCode="BE">Belgium (+32)</option>
                                <option data-countryCode="BZ">Belize (+501)</option>
                                <option data-countryCode="BJ">Benin (+229)</option>
                                <option data-countryCode="BM" >Bermuda (+1441)</option>
                                <option data-countryCode="BT" >Bhutan (+975)</option>
                                <option data-countryCode="BO">Bolivia (+591)</option>
                                <option data-countryCode="BA">Bosnia Herzegovina (+387)</option>
                                <option data-countryCode="BW">Botswana (+267)</option>
                                <option data-countryCode="BR">Brazil (+55)</option>
                                <option data-countryCode="BN">Brunei (+673)</option>
                                <option data-countryCode="BG">Bulgaria (+359)</option>
                                <option data-countryCode="BF">Burkina Faso (+226)</option>
                                <option data-countryCode="BI" >Burundi (+257)</option>
                                <option data-countryCode="KH" >Cambodia (+855)</option>
                                <option data-countryCode="CM">Cameroon (+237)</option>
                                <option data-countryCode="CA" >Canada (+1)</option>
                                <option data-countryCode="CV" >Cape Verde Islands (+238)</option>
                                <option data-countryCode="KY">Cayman Islands (+1345)</option>
                                <option data-countryCode="CF">Central African Republic (+236)</option>
                                <option data-countryCode="CL">Chile (+56)</option>
                                <option data-countryCode="CN">China (+86)</option>
                                <option data-countryCode="CO">Colombia (+57)</option>
                                <option data-countryCode="KM">Comoros (+269)</option>
                                <option data-countryCode="CG">Congo (+242)</option>
                                <option data-countryCode="CK">Cook Islands (+682)</option>
                                <option data-countryCode="CR">Costa Rica (+506)</option>
                                <option data-countryCode="HR">Croatia (+385)</option>
                                <option data-countryCode="CU">Cuba (+53)</option>
                                <option data-countryCode="CY">Cyprus North (+90392)</option>
                                <option data-countryCode="CY">Cyprus South (+357)</option>
                                <option data-countryCode="CZ">Czech Republic (+42)</option>
                                <option data-countryCode="DK">Denmark (+45)</option>
                                <option data-countryCode="DJ">Djibouti (+253)</option>
                                <option data-countryCode="DM">Dominica (+1809)</option>
                                <option data-countryCode="DO">Dominican Republic (+1809)</option>
                                <option data-countryCode="EC">Ecuador (+593)</option>
                                <option data-countryCode="EG">Egypt (+20)</option>
                                <option data-countryCode="SV">El Salvador (+503)</option>
                                <option data-countryCode="GQ">Equatorial Guinea (+240)</option>
                                <option data-countryCode="ER">Eritrea (+291)</option>
                                <option data-countryCode="EE">Estonia (+372)</option>
                                <option data-countryCode="ET">Ethiopia (+251)</option>
                                <option data-countryCode="FK">Falkland Islands (+500)</option>
                                <option data-countryCode="FO">Faroe Islands (+298)</option>
                                <option data-countryCode="FJ">Fiji (+679)</option>
                                <option data-countryCode="FI">Finland (+358)</option>
                                <option data-countryCode="FR">France (+33)</option>
                                <option data-countryCode="GF">French Guiana (+594)</option>
                                <option data-countryCode="PF">French Polynesia (+689)</option>
                                <option data-countryCode="GA">Gabon (+241)</option>
                                <option data-countryCode="GM">Gambia (+220)</option>
                                <option data-countryCode="GE">Georgia (+7880)</option>
                                <option data-countryCode="DE">Germany (+49)</option>
                                <option data-countryCode="GH" >Ghana (+233)</option>
                                <option data-countryCode="GI">Gibraltar (+350)</option>
                                <option data-countryCode="GR" >Greece (+30)</option>
                                <option data-countryCode="GL" >Greenland (+299)</option>
                                <option data-countryCode="GD" >Grenada (+1473)</option>
                                <option data-countryCode="GP" >Guadeloupe (+590)</option>
                                <option data-countryCode="GU" >Guam (+671)</option>
                                <option data-countryCode="GT" >Guatemala (+502)</option>
                                <option data-countryCode="GN" >Guinea (+224)</option>
                                <option data-countryCode="GW" >Guinea - Bissau (+245)</option>
                                <option data-countryCode="GY" >Guyana (+592)</option>
                                <option data-countryCode="HT" >Haiti (+509)</option>
                                <option data-countryCode="HN" >Honduras (+504)</option>
                                <option data-countryCode="HK" >Hong Kong (+852)</option>
                                <option data-countryCode="HU" >Hungary (+36)</option>
                                <option data-countryCode="IS" >Iceland (+354)</option>
                                <option data-countryCode="IN">India (+91)</option>
                                <option data-countryCode="ID" >Indonesia (+62)</option>
                                <option data-countryCode="IR" >Iran (+98)</option>
                                <option data-countryCode="IQ">Iraq (+964)</option>
                                <option data-countryCode="IE">Ireland (+353)</option>
                                <option data-countryCode="IL">Israel (+972)</option>
                                <option data-countryCode="IT"> Italy (+39)</option>
                                <option data-countryCode="JM">Jamaica (+1876)</option>
                                <option data-countryCode="JP">Japan (+81)</option>
                                <option data-countryCode="JO">Jordan (+962)</option>
                                <option data-countryCode="KZ">Kazakhstan (+7)</option>
                                <option data-countryCode="KE" >Kenya (+254)</option>
                                <option data-countryCode="KI">Kiribati (+686)</option>
                                <option data-countryCode="KP">Korea North (+850)</option>
                                <option data-countryCode="KR">Korea South (+82)</option>
                                <option data-countryCode="KW">Kuwait (+965)</option>
                                <option data-countryCode="KG">Kyrgyzstan (+996)</option>
                                <option data-countryCode="LA">Laos (+856)</option>
                                <option data-countryCode="LV">Latvia (+371)</option>
                                <option data-countryCode="LB">Lebanon (+961)</option>
                                <option data-countryCode="LS">Lesotho (+266)</option>
                                <option data-countryCode="LR">Liberia (+231)</option>
                                <option data-countryCode="LY">Libya (+218)</option>
                                <option data-countryCode="LI">Liechtenstein (+417)</option>
                                <option data-countryCode="LT">Lithuania (+370)</option>
                                <option data-countryCode="LU">Luxembourg (+352)</option>
                                <option data-countryCode="MO">Macao (+853)</option>
                                <option data-countryCode="MK">Macedonia (+389)</option>
                                <option data-countryCode="MG">Madagascar (+261)</option>
                                <option data-countryCode="MW">Malawi (+265)</option>
                                <option data-countryCode="MY">Malaysia (+60)</option>
                                <option data-countryCode="MV">Maldives (+960)</option>
                                <option data-countryCode="ML">Mali (+223)</option>
                                <option data-countryCode="MT">Malta (+356)</option>
                                <option data-countryCode="MH">Marshall Islands (+692)</option>
                                <option data-countryCode="MQ">Martinique (+596)</option>
                                <option data-countryCode="MR">Mauritania (+222)</option>
                                <option data-countryCode="YT">Mayotte (+269)</option>
                                <option data-countryCode="MX">Mexico (+52)</option>
                                <option data-countryCode="FM">Micronesia (+691)</option>
                                <option data-countryCode="MD">Moldova (+373)</option>
                                <option data-countryCode="MC">Monaco (+377)</option>
                                <option data-countryCode="MN">Mongolia (+976)</option>
                                <option data-countryCode="MS">Montserrat (+1664)</option>
                                <option data-countryCode="MA">Morocco (+212)</option>
                                <option data-countryCode="MZ">Mozambique (+258)</option>
                                <option data-countryCode="MN">Myanmar (+95)</option>
                                <option data-countryCode="NA">Namibia (+264)</option>
                                <option data-countryCode="NR">Nauru (+674)</option>
                                <option data-countryCode="NP">Nepal (+977)</option>
                                <option data-countryCode="NL" >Netherlands (+31)</option>
                                <option data-countryCode="NC">New Caledonia (+687)</option>
                                <option data-countryCode="NZ" >New Zealand (+64)</option>
                                <option data-countryCode="NI">Nicaragua (+505)</option>
                                <option data-countryCode="NE">Niger (+227)</option>
                                <option data-countryCode="NG">Nigeria (+234)</option>
                                <option data-countryCode="NU">Niue (+683)</option>
                                <option data-countryCode="NF">Norfolk Islands (+672)</option>
                                <option data-countryCode="NP">Northern Marianas (+670)</option>
                                <option data-countryCode="NO">Norway (+47)</option>
                                <option data-countryCode="OM">Oman (+968)</option>
                                <option data-countryCode="PW">Palau (+680)</option>
                                <option data-countryCode="PA">Panama (+507)</option>
                                <option data-countryCode="PG">Papua New Guinea (+675)</option>
                                <option data-countryCode="PY">Paraguay (+595)</option>
                                <option data-countryCode="PE">Peru (+51)</option>
                                <option data-countryCode="PH">Philippines (+63)</option>
                                <option data-countryCode="PL">Poland (+48)</option>
                                <option data-countryCode="PT">Portugal (+351)</option>
                                <option data-countryCode="PR">Puerto Rico (+1787)</option>
                                <option data-countryCode="QA">Qatar (+974)</option>
                                <option data-countryCode="RE">Reunion (+262)</option>
                                <option data-countryCode="RO">Romania (+40)</option>
                                <option data-countryCode="RU">Russia (+7)</option>
                                <option data-countryCode="RW">Rwanda (+250)</option>
                                <option data-countryCode="SM">San Marino (+378)</option>
                                <option data-countryCode="ST">Sao Tome &amp; Principe (+239)</option>
                                <option data-countryCode="SA">Saudi Arabia (+966)</option>
                                <option data-countryCode="SN">Senegal (+221)</option>
                                <option data-countryCode="CS">Serbia (+381)</option>
                                <option data-countryCode="SC">Seychelles (+248)</option>
                                <option data-countryCode="SL">Sierra Leone (+232)</option>
                                <option data-countryCode="SG">Singapore (+65)</option>
                                <option data-countryCode="SK">Slovak Republic (+421)</option>
                                <option data-countryCode="SI">Slovenia (+386)</option>
                                <option data-countryCode="SB">Solomon Islands (+677)</option>
                                <option data-countryCode="SO">Somalia (+252)</option>
                                <option data-countryCode="ZA">South Africa (+27)</option>
                                <option data-countryCode="ES">Spain (+34)</option>
                                <option data-countryCode="LK">Sri Lanka (+94)</option>
                                <option data-countryCode="SH">St. Helena (+290)</option>
                                <option data-countryCode="KN">St. Kitts (+1869)</option>
                                <option data-countryCode="SC" >St. Lucia (+1758)</option>
                                <option data-countryCode="SD">Sudan (+249)</option>
                                <option data-countryCode="SR">Suriname (+597)</option>
                                <option data-countryCode="SZ">Swaziland (+268)</option>
                                <option data-countryCode="SE">Sweden (+46)</option>
                                <option data-countryCode="CH">Switzerland (+41)</option>
                                <option data-countryCode="SI">Syria (+963)</option>
                                <option data-countryCode="TW">Taiwan (+886)</option>
                                <option data-countryCode="TJ">Tajikstan (+7)</option>
                                <option data-countryCode="TH">Thailand (+66)</option>
                                <option data-countryCode="TG">Togo (+228)</option>
                                <option data-countryCode="TO">Tonga (+676)</option>
                                <option data-countryCode="TT">Trinidad &amp; Tobago (+1868)</option>
                                <option data-countryCode="TN">Tunisia (+216)</option>
                                <option data-countryCode="TR">Turkey (+90)</option>
                                <option data-countryCode="TM">Turkmenistan (+7)</option>
                                <option data-countryCode="TM">Turkmenistan (+993)</option>
                                <option data-countryCode="TC">Turks &amp; Caicos Islands (+1649)</option>
                                <option data-countryCode="TV">Tuvalu (+688)</option>
                                <option data-countryCode="UG">Uganda (+256)</option>
                                <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                <option data-countryCode="UA">Ukraine (+380)</option>
                                <option data-countryCode="AE" >United Arab Emirates (+971)</option>
                                <option data-countryCode="UY" >Uruguay (+598)</option>
                                <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                <option data-countryCode="UZ">Uzbekistan (+7)</option>
                                <option data-countryCode="VU">Vanuatu (+678)</option>
                                <option data-countryCode="VA">Vatican City (+379)</option>
                                <option data-countryCode="VE">Venezuela (+58)</option>
                                <option data-countryCode="VN">Vietnam (+84)</option>
                                <option data-countryCode="VG">Virgin Islands - British (+1284)</option>
                                <option data-countryCode="VI">Virgin Islands - US (+1340)</option>
                                <option data-countryCode="WF">Wallis &amp; Futuna (+681)</option>
                                <option data-countryCode="YE">Yemen (North)(+969)</option>
                                <option data-countryCode="YE">Yemen (South)(+967)</option>
                                <option data-countryCode="ZM">Zambia (+260)</option>
                                <option data-countryCode="ZW">Zimbabwe (+263)</option>
                            </optgroup>
                        </select>

                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                  <!-- textarea -->
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" placeholder="city" class="form-control">
                     @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                      @endif
                  </div>

                  <div class="form-group">
                    <label>State (optional)</label>
                    <input type="text" name="state" placeholder="State (optional)" class="form-control">
                     @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                      @endif
                  </div>
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-success">
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mt-3">
          <div class="card-body">
            <div class="table-responsive p-2">
              <table class="table table-hover" id="example2">
                <thead>
                  <tr>
                    <th>country</th>
                    <th>city</th>
                    <th>state</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>

                  @forelse($locations as $location)
                    <tr>
                      <td>{{ $location->country }}</td>
                      <td>{{ $location->city }}</td>
                      <td>{{ $location->state }}</td>
                      <td>
                        <form action="{{ route('delete.location', ['id' => $location->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ Method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <p>No location added yet</p>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </div>
</div>
@endsection
