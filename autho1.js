// The client ID is obtained from the Google Developers Console
// at https://console.developers.google.com/.
// If you run this code from a server other than http://localhost,
// you need to register your own client ID.
var OAUTH2_CLIENT_ID = '401858810874-q4v417j67ajafopfab17roks8nut8r6f.apps.googleusercontent.com';
var OAUTH2_SCOPES = [  'https://www.googleapis.com/auth/plus.me https://www.googleapis.com/auth/userinfo.email'];
var apiKey = 'AIzaSyD-LrLanA_QdxKQ3VwKLZTVsaTY91jgrtM';
	
	

// Upon loading, the Google APIs JS client automatically invokes this callback.
googleApiClientReady = function() {
  gapi.auth.init(function() {
    window.setTimeout(checkAuth, 1);
  });
}

//OR
// function googleApiClientReady(){
	//gapi.client.setApiKey(apiKey);
	//window.setTimeout(checkAuth,1);
	//}

	
	

 
// Attempt the immediate OAuth 2.0 client flow as soon as the page loads.
// If the currently logged-in Google Account has previously authorized
// the client specified as the OAUTH2_CLIENT_ID, then the authorization
// succeeds with no user intervention. Otherwise, it fails and the
// user interface that prompts for authorization needs to display.
function checkAuth() {
  gapi.auth.authorize({
    client_id: OAUTH2_CLIENT_ID,
    scope: OAUTH2_SCOPES,
    immediate: true
  }, handleAuthResult);
}

// Handle the result of a gapi.auth.authorize() call.
function handleAuthResult(authResult) {
  if (authResult && !authResult.error) {
    // Authorization was successful. Hide authorization prompts and show
    // content that should be visible after authorization succeeds.
    //$('#login-link').hide();
    getEmail();
    //makeApiCall();
    $('#signinButton').show();
    loadAPIClientInterfaces();
  } else {
    // Make the #login-link clickable. Attempt a non-immediate OAuth 2.0
    // client flow. The current function is called when that flow completes.
    $('#signinButton').click(function() {
      gapi.auth.authorize({
        client_id: OAUTH2_CLIENT_ID,
        scope: OAUTH2_SCOPES,
        immediate: false
        }, handleAuthResult);
    });
  }
}
function getEmail(){
    // Load the oauth2 libraries to enable the userinfo methods.
    gapi.client.load('oauth2', 'v2', function() {
          var request = gapi.client.oauth2.userinfo.get();
          request.execute(getEmailCallback);
        });
  }


function getEmailCallback(obj){
      
    console.log(obj);
    var re = new RegExp("Login","g");
    
    //$('#imgHolder').attr('src', obj.result.picture);
    //$('#login-link').append($('#imgHolder').attr('src', obj.result.picture));
    
    $('#signinButton').html($('#signinButton').html().replace(re, obj.result.name));
    //$('#login-link').prepend('<span><i class="icon-user"></i></span>');
    //$('#login-link').replacewith(obj.result.name);
}

