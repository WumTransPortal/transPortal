@extends('layouts.master')

@section('head')

<script type="text/javascript">

function limitText(limitField, limitCount, limitNum) {
  if(limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}

function storeUsername() {

  var inputOldusername = document.getElementById("userusernamevalue").value;
  localStorage.setItem("userusernamevalue", inputOldusername);

  var inputUsername = document.getElementById("username").value;
  localStorage.setItem("username", inputUsername);

  if(inputUsername) {
    if(inputUsername != inputOldusername) {
    document.getElementById("oldUsername").innerHTML = "<strike>{{$user->username}}</strike>" + " " + "<font color='red'>" + inputUsername + "</font>";
    document.querySelector('#stored_username').value = inputUsername;
      } 
    } else {
    document.getElementById("oldUsername").innerHTML = "{{$user->username}}";
  }
}

function storeEmail() {
  
  var inputOldmail = document.getElementById("usermailvalue").value;
  localStorage.setItem("usermailvalue", inputOldmail);

  var inputFirstmail = document.getElementById("first_mail").value;
  var inputSecondmail = document.getElementById("second_mail").value;
  localStorage.setItem("first_mail", inputFirstmail);
  localStorage.setItem("second_mail", inputSecondmail);
  
  if(inputFirstmail != inputOldmail && inputFirstmail == inputSecondmail) {
   document.getElementById("oldEmail").innerHTML = "<strike>{{$user->email}}</strike>" + " " + "<font color='red'>" + inputFirstmail + "</font>";
   document.querySelector('#stored_email').value = inputFirstmail; 
  } else if(inputFirstmail == inputOldmail && inputFirstmail == inputSecondmail) {
   document.getElementById("oldEmail").innerHTML = "{{$user->email}}";
  }

  if(!inputFirstmail && !inputSecondmail) {
   document.getElementById("oldEmail").innerHTML = "{{$user->email}}"; 
  }

  if(inputFirstmail != inputSecondmail) {
    alert('The e-mails you entered do not match');
  }
}

function storeAddress() {

  var inputOldstreet = document.getElementById("userstreetvalue").value;
  var inputOldzipcode = document.getElementById("userzipcodevalue").value;
  var inputOldcity = document.getElementById("usercityvalue").value;   
  localStorage.setItem("userstreetvalue", inputOldstreet);
  localStorage.setItem("userzipcodevalue", inputOldzipcode);
  localStorage.setItem("usercityvalue", inputOldcity);

  var inputStreet = document.getElementById("street").value;
  var inputZipcode = document.getElementById("zipcode").value;
  var inputCity = document.getElementById("city").value;
  localStorage.setItem("street", inputStreet);
  localStorage.setItem("zipcode", inputZipcode);
  localStorage.setItem("city", inputCity);

  if(inputStreet || inputZipcode || inputCity) {
    // 1: [NEW] STREET, [NO] ZIPCODE, [NO] CITY
    if(inputStreet != inputOldstreet && !inputZipcode && !inputCity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "<font color='red'>" + inputStreet + "</font>" + " " + "{{$user->zipcode}}" + " " + "{{$user->city}}";
      document.querySelector('#stored_street').value = inputStreet;
    } 
    // 2: [NO] STREET, [NEW] ZIPCODE, [NO] CITY
    else if(inputZipcode != inputOldzipcode && !inputStreet && !inputCity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "{{$user->street}}" + ", " + "<font color='red'>" + inputZipcode + "</font>" + " " + "{{$user->city}}";
      document.querySelector('#stored_zipcode').value = inputZipcode;
    } 
    // 3: [NO] STREET, [NO] ZIPCODE, [NEW] CITY
    else if(inputCity != inputOldcity && !inputStreet && !inputZipcode) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "{{$user->street}}" + ", " + "{{$user->zipcode}}" + " " + "<font color='red'>" + inputCity + "</font>";
      document.querySelector('#stored_city').value = inputCity;
    } 
    // 4: [NEW] STREET, [NEW] ZIPCODE, [NO] CITY
    else if(inputStreet != inputOldstreet && inputZipcode != inputOldzipcode && !inputCity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "<font color='red'>" + inputStreet + ", " + inputZipcode + "</font>" + " " + "{{$user->city}}";
      document.querySelector('#stored_street').value = inputStreet;
      document.querySelector('#stored_zipcode').value = inputZipcode;
    } 
    // 5: [NEW] STREET, [NO] ZIPCODE, [NEW] CITY
    else if(inputStreet != inputOldstreet && !inputZipcode && inputCity != inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "<font color='red'>" + inputStreet + ", " + "{{$user->zipcode}}" + " " + "<font color='red'>" + inputCity + "</font>";
      document.querySelector('#stored_street').value = inputStreet;
      document.querySelector('#stored_city').value = inputCity;
    } 
    // 6: [NO] STREET, [NEW] ZIPCODE, [NEW] CITY
    else if(!inputStreet && inputZipcode != inputOldzipcode && inputCity != inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "{{$user->street}}" + ", " + "<font color='red'>" + inputZipcode + " " + inputCity + "</font>";
      document.querySelector('#stored_zipcode').value = inputZipcode;
      document.querySelector('#stored_city').value = inputCity;
    } 
    // 7: [NEW] STREET, [NEW] ZIPCODE, [NEW] CITY
    else if(inputStreet != inputOldstreet && inputZipcode != inputOldzipcode && inputCity != inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "<font color='red'>" + inputStreet + ", " + inputZipcode + " " + inputCity + "</font>";
      document.querySelector('#stored_street').value = inputStreet;
      document.querySelector('#stored_zipcode').value = inputZipcode;
      document.querySelector('#stored_city').value = inputCity;
    }
    // 8: [SAME] STREET, [SAME] ZIPCODE, [SAME] CITY
    else if(inputStreet == inputOldstreet && inputZipcode == inputOldzipcode && inputCity == inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}";
    }
    // 9: [SAME] STREET, [NEW] ZIPCODE, [NEW] CITY
    else if(inputStreet == inputOldstreet && inputZipcode != inputOldzipcode && inputCity != inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "{{$user->street}}" + ", " + "<font color='red'>" + inputZipcode + " " + inputCity + "</font>";
      document.querySelector('#stored_zipcode').value = inputZipcode;
      document.querySelector('#stored_city').value = inputCity;
    } 
    // 10: [NEW] STREET, [SAME] ZIPCODE, [NEW] CITY
    else if(inputStreet != inputOldstreet && inputZipcode == inputOldzipcode && inputCity != inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "<font color='red'>" + inputStreet + ", " + "{{$user->zipcode}}" + " " + "<font color='red'>" + inputCity + "</font>";
      document.querySelector('#stored_street').value = inputStreet;
      document.querySelector('#stored_city').value = inputCity;
    }
    // 11: [NEW] STREET, [NEW] ZIPCODE, [SAME] CITY
    else if(inputStreet != inputOldstreet && inputZipcode != inputOldzipcode && inputCity == inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "<font color='red'>" + inputStreet + ", " + inputZipcode + "</font>" + " " + "{{$user->city}}";
      document.querySelector('#stored_street').value = inputStreet;
      document.querySelector('#stored_zipcode').value = inputZipcode;
    }
    // 12: [SAME] STREET, [SAME] ZIPCODE, [NEW] CITY
     else if(inputCity != inputOldcity && inputStreet == inputOldstreet && inputZipcode == inputOldzipcode) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "{{$user->street}}" + ", " + "{{$user->zipcode}}" + " " + "<font color='red'>" + inputCity + "</font>";
      document.querySelector('#stored_city').value = inputCity;
    }
    // 13: [NEW] STREET, [SAME] ZIPCODE, [SAME] CITY
    if(inputStreet != inputOldstreet && inputZipcode == inputOldzipcode && inputCity == inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "<font color='red'>" + inputStreet + "</font>" + " " + "{{$user->zipcode}}" + " " + "{{$user->city}}";
      document.querySelector('#stored_street').value = inputStreet;
    }
    // 14: [SAME] STREET, [NEW] ZIPCODE, [SAME] CITY
    else if(inputZipcode != inputOldzipcode && inputStreet == inputOldstreet && inputCity == inputOldcity) {
      document.getElementById("oldAddress").innerHTML = "<strike>{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}</strike>" + " " + "{{$user->street}}" + ", " + "<font color='red'>" + inputZipcode + "</font>" + " " + "{{$user->city}}";
      document.querySelector('#stored_zipcode').value = inputZipcode;
    } 
  } else {
      document.getElementById("oldAddress").innerHTML = "{{$user->street}}" + ", " + " {{$user->zipcode}}" + " " + "{{$user->city}}";
  }
}

function storeCompany() {

  var inputOldcompany = document.getElementById("usercompanyvalue").value;
  localStorage.setItem("usercompanyvalue", inputOldcompany);

  var inputCompany = document.getElementById("company").value;
  localStorage.setItem("company", inputCompany);

  if(inputCompany) {
    if(inputCompany != inputOldcompany) {
    document.getElementById("oldCompany").innerHTML = "<strike>{{$user->company}}</strike>" + " " + "<font color='red'>" + inputCompany + "</font>";
    document.querySelector('#stored_company').value = inputCompany;
    } else {
    document.getElementById("oldCompany").innerHTML = "{{$user->company}}";
    }
  }
}

</script>

@endsection

@section('content')

<div class="setting-wrapper"> 
  <div class="create_title">
    <p>Account Management</p> 
  </div>  
  <div class="general-setting">
    <h3>General Settings</h3>
    <ul style="list-style: none; margin:0; padding:0; display: inline-block; width: 100%;">
      <li id="item-username">     
        <div id="item-label"><strong class="col-sm-2">Username:</strong></div>
        <div id="item-data"><p id="oldUsername">{{$user->username}}</p></div>
        <a href="#" style="float:right">Edit</a>     
      </li>
      <form id="setting-username"role="form">
         <input type="hidden" name="userusernamevalue" id="userusernamevalue" value="{{$user->username}}">
        <strong>Edit username</strong>
        <div><p>Type new username</p></div>
        <div class="form-group">
          <input type="text" name="username" id="username" class="form-control" >
        </div>     
        <button style="width:80px; border-radius: 0;" type="button" id="clickdone1" onclick="storeUsername()" class="btn btn-success">Done</button>
      </form>
      <li id="item-email">     
        <div id="item-label"><strong class="col-sm-2">Email:</strong></div>
        <div id="item-data"><p id="oldEmail">{{$user->email}}</p></div>
        <a href="#" style="float:right">Edit</a>     
      </li>
      <form role="form" id="setting-email">
        <input type="hidden" name="usermailvalue" id="usermailvalue" value="{{$user->email}}">
        <strong>Edit email</strong>
        <div><p>Type new email</p></div>
        <div class="form-group">
          <input type="email" name="first_mail" id="first_mail" class="form-control" >
        </div>     
        <div><p>Retype new email</p></div>
        <div class="form-group">
          <input type="email" name="second_mail" id="second_mail" class="form-control" >
        </div> 
        <button style="width:80px; border-radius: 0;" type="button" id="clickdone2" class="btn btn-success" onclick="storeEmail()">Done</button>
      </form>
      <li id="item-address">     
        <div id="item-label"><strong class="col-sm-2">Address:</strong></div>
        <div id="item-data"><p id="oldAddress">{{$user->street}}, {{$user->zipcode}} {{$user->city}}</p></div>
        <a href="#" style="float:right">Edit</a>     
      </li>
      <form role="form" id="setting-address">
        <input type="hidden" name="userstreetvalue" id="userstreetvalue" value="{{$user->street}}">
        <input type="hidden" name="userzipcodevalue" id="userzipcodevalue" value="{{$user->zipcode}}">
        <input type="hidden" name="usercityvalue" id="usercityvalue" value="{{$user->city}}">
        <strong>Edit address</strong>
        <div><p>Type new street</p></div>
        <div class="form-group">
          <input type="text" name="street" id="street" placeholder="{{$user->street}}"class="form-control" >
        </div>     
        <div><p>Type new zipcode</p></div>
        <div class="form-group">
          <input type="text" name="zipcode" id="zipcode" placeholder="{{$user->zipcode}}" class="form-control" >
        </div>
        <div><p>Type new city</p></div>
        <div class="form-group">
          <input type="text" name="city" id="city" placeholder="{{$user->city}}" class="form-control" >
        </div> 
        <button style="width:80px; border-radius: 0;" type="button" id="clickdone3" class="btn btn-success" onclick="storeAddress()">Done</button>
      </form>
       <li id="item-company">     
        <div id="item-label"><strong class="col-sm-2">Company:</strong></div>
        <div id="item-data"><p id="oldCompany">{{$user->company}}</p></div>
        <a href="#" style="float:right">Edit</a>     
      </li>
      <form id="setting-company"role="form">
        <strong>Edit company</strong>
        <div><p>Type company</p></div>
        <div class="form-group">
          <input type="hidden" name="usercompanyvalue" id="usercompanyvalue" value="{{$user->company}}">
          <input type="text" name="company" id="company" class="form-control" >
        </div>     
        <button style="width:80px; border-radius: 0;" type="button" id="clickdone" onclick="storeCompany()" class="btn btn-success">Done</button>
      </form>        
    </ul>            
  </div>
 
  <div class="password"> 
    <h3>Password</h3>
    <form method="post" action="passwordchange/update" autocomplete="off">
      <!-- CSRF Token -->
      <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
      <input type="hidden" name="_id" value="{{ $user->id }}" />
      <div><p>Type current password</p></div>       
      <div class="form-group">
        <input name="current_password" id="current_password" type="password" class="form-control" >
      </div>    
      <div><p>Type new password</p></div>
      <div class="form-group">
        <input name="password" id="password" type="password" class="form-control" >
      </div>     
      <div><p>Retype new password</p></div>
      <div class="form-group">
        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" >
      </div>
  </div>  

  <div class="user-description">
    <h3>Your description</h3>  
    <textarea placeholder="{{$user->description}}" name="limitedtextarea" id="limitedtextarea" onKeyDown="limitText (this.form.limitedtextarea,this.form.countdown,42);" onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,42);" class="form-control" rows="3"></textarea>
    <i>You have <input style="border:0; width:15px" readonly type="text" name="countdown" size="3" value="42"> characters left.</i>
  </div> 
 
 </div>
 
  <input type="hidden" name="stored_username" id="stored_username" value="{{$user->username}}" placeholder="{{$user->username}}" class="form-control" >
  <input type="hidden" name="stored_email" id="stored_email" value="{{$user->email}}"  placeholder="{{$user->email}}" class="form-control" >
  <input type="hidden" name="stored_street" id="stored_street" value="{{$user->street}}"  placeholder="{{$user->street}}" class="form-control" >
  <input type="hidden" name="stored_zipcode" id="stored_zipcode" value="{{$user->zipcode}}"  placeholder="{{$user->zipcode}}" class="form-control" >
  <input type="hidden" name="stored_city" id="stored_city" value="{{$user->city}}"  placeholder="{{$user->city}}" class="form-control" >
  <input type="hidden" name="stored_company" id="stored_company" value="{{$user->company}}"  placeholder="{{$user->company}}" class="form-control" >
  
  <div style="margin-top: 20px; display: inline; float: right;">
     <button style="width:80px; border-radius: 0;" type="button" class="btn btn-warning">Cancel</button>
      <button style="width:80px; border-radius: 0;" type="submit" onclick="{{$user->id}}" class="btn btn-success">Save</button>      
  </form>
  </div>
 

@stop