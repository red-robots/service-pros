<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136611224-5');
</script>
<script
  id="purecloud-webchat-js"
  type="text/javascript"
  src="https://apps.usw2.pure.cloud/webchat/jsapi-v1.js"
  region="us-west-2"
  org-guid="76e8a29e-0e64-4a14-869e-5871d46e07a2"
  deployment-key=""
>
	let chatConfig = {
  "webchatAppUrl": "https://apps.usw2.pure.cloud/webchat",
  "webchatServiceUrl": "https://realtime.usw2.pure.cloud:443",
  "orgId": "3056",
  "orgGuid": "76e8a29e-0e64-4a14-869e-5871d46e07a2",
  "orgName": "serviceprosinstallationgroup",
  "queueName": "",
  "logLevel": "DEBUG",
  "locale": "en",
  "data": {
    "firstName": "",
    "lastName": "",
    "addressStreet": "",
    "addressCity": "",
    "addressPostalCode": "",
    "addressState": "",
    "phoneNumber": "",
    "customField1Label": "",
    "customField1": "",
    "customField2Label": "",
    "customField2": "",
    "customField3Label": "",
    "customField3": ""
  },
  "companyLogo": {
    "width": 600,
    "height": 149,
    "url": "https://d3a63qt71m2kua.cloudfront.net/developer-tools/2280/assets/images/PC-blue-nomark.png"
  },
  "companyLogoSmall": {
    "width": 25,
    "height": 25,
    "url": "https://d3a63qt71m2kua.cloudfront.net/developer-tools/2280/assets/images/companylogo.png"
  },
  "agentAvatar": {
    "width": 462,
    "height": 462,
    "url": "https://d3a63qt71m2kua.cloudfront.net/developer-tools/2280/assets/images/agent.jpg"
  },
  "welcomeMessage": "Thanks for chatting using the dev tools chat page.",
  "cssClass": "webchat-frame",
  "css": {
    "width": "100%",
    "height": "100%"
  }
};

ININ.webchat.create(chatConfig, function(err, webchat) {
    if (err) {
        console.error(err);
        throw err;
    }

    webchat.renderPopup({
        width: 400,
        height: 400,
        title: 'Chat'
    });
});



</script>