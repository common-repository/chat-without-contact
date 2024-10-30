<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<style>

h1.wawc-title {
  margin: 0 0 30px 0;
  text-align: center;
}


.wawc input[type="tel"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  font-weight: bold;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 10px;
  width: 100%;
  background-color: #e8eeef;
  color: #444444;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
  border-radius: 5px;
}

.wawc .wa-button {
  padding: 10px 0px 10px 0px;
  color: #FFF;
  background-color: #0dc143;
  font-size: 20px;
  text-align: center;
  font-weight: bold;
  border-radius: 5px;
  text-decoration: none;
  text-transform: uppercase;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
  display: block;
}
.wawc .wa-button:hover
{
  color: #FFF;
}
.wawc fieldset {
  margin-bottom: 30px;
  border: none;
}
.wawc legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}
.wawc .number {
  background-color: #0dc143;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}
</style>

<form class="wawc" >
        <h1 class="wawc-title">WhatsApp Without Contact</h1>
        
        <fieldset>
          
          <legend><span class="number">1</span> Select Your Device Type</legend>
          <select id="base-type" name="base-type">
            <option value="api" id="api-option">Mobile</option>
            <option value="web" id="web-option">PC</option>
          </select>
          <legend><span class="number">2</span>Phone number without +91</legend>
          <input type="tel" id="phone" name="phone" required>
          <legend><span class="number">2</span> Your text message</legend>
          
          <textarea id="message" name="message" required></textarea>
          <a id="send-button" class="wa-button" href="#" role="submit" target="_blank"> Send</a>
        </fieldset>
        
</form>



<script>
 // Check if the user is on a mobile device
 function sdcwcIsMobileDevice() {
    return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
  }

  // Set the default option based on the device type
  if (sdcwcIsMobileDevice()) {
    document.getElementById("api-option").selected = true;
  } else {
    document.getElementById("web-option").selected = true;
  }

  // Get the form fields and send button
const phoneField = document.getElementById("phone");
const messageField = document.getElementById("message");
const sendButton = document.getElementById("send-button");

// Set up event listener for send button click
sendButton.addEventListener('click', function(event) {
  // Check if phone number is valid
  const phoneRegex = /^[0-9]{10}$/;
  if (!phoneRegex.test(phoneField.value)) {
    alert("Please enter a 10-digit phone number.");
    event.preventDefault();
  }

  // Prevent link click if there are errors
  if (event.defaultPrevented) {
    return false;
  }
});


document.addEventListener("DOMContentLoaded", function() {
  var baseType = document.getElementById("base-type");
  var phone = document.getElementById("phone");
  var message = document.getElementById("message");
  var sendButton = document.getElementById("send-button");

  function sdcwcGenerateLink() {
    var baseTypeValue = baseType.value;
    var phoneValue = encodeURIComponent(phone.value);
    var messageValue = encodeURIComponent(message.value);
    var targetLink = "https://" + baseTypeValue + ".whatsapp.com/send?phone=" + phoneValue + "&text=" + messageValue;
    sendButton.href = targetLink;
  }

  baseType.addEventListener("change",  sdcwcGenerateLink);
  phone.addEventListener("change",  sdcwcGenerateLink);
  message.addEventListener("change",  sdcwcGenerateLink);
});

</script>




