/*!
 * widgets
 * @version: 9.0.017.30
 * @license: Genesys Telecom Labs
 */
widgetsJsonpFunction([24],{"./webapp/plugins/cx-webchat-service/controllers/transport-controller.js":function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a=n("./node_modules/jquery/dist/jquery.js"),s=o(a),i=n("./webapp/plugins/cx-common/cx-common.js"),d=o(i);CXBus.registerModule("webchatservicenextgen",function(){function e(){y=!1,j=s.default.extend([],D),x=s.default.extend([],S),v.data("sessionActive",y),D=[],S=[],P=[]}function t(){d.default.deleteCookie(T)}function n(){P.length&&(P.forEach(function(e){e.resolve({sessionActive:y})}),P=[])}function o(e,t){e().done(function(e){t.deferred.resolve(e)}).fail(function(e){t.deferred.reject(e)})}function a(e){for(var t=0;t<A.standard.length;t++)if((e+"").match(A.standard[t]))return!1;for(var n=0;n<A.custom.length;n++)if((e+"").match(A.custom[n]))return!1;return!0}function i(){for(var e,t={custom:[]},n=0;n<A.custom.length;n++)e=A.custom[n],t.custom.push({source:e.source,flags:e.flags});d.default.setCookie(T,JSON.stringify(t))}function c(){if(d.default.getCookie(T)){var e=JSON.parse(d.default.getCookie(T));return s.default.each(e.custom,function(){A.custom.push(new RegExp(this.source,this.flags))}),!0}return!1}function l(e){if(e instanceof RegExp){e.length||(e=[e]);for(var t=0;t<e.length;t++)A.custom.filter(function(n){return String(n)===String(e[t])}).length||A.custom.push(e[t]);i()}}function u(){A.custom=[],d.default.deleteCookie(T)}function f(e,t){"string"==typeof e&&t instanceof RegExp&&(l(t),v.command("sendMessage",{message:e}))}function p(e){return E.push(e),e}function g(e){var t=s.default.Deferred(),n=E.length;return n?E.forEach(function(o,r){e=o(e)||e,n===r+1&&t.resolve(e)}):t.resolve(e),t.promise()}function m(i){var d=s.default.Deferred(),m={async:!1,asyncClose:"hideChat",pagination:!1,fileUpload:!0};if(v.registerEvents(["ready","restored","restoreTimeout","restoreFailed","messageReceived","error","started","ended","agentTypingStarted","agentTypingStopped","agentTypingTimeout","pollingStarted","pollingStopped","clientConnected","clientDisconnected","agentConnected","agentDisconnected","supervisorConnected","supervisorDisconnected","clientTypingStarted","clientTypingStopped","ajaxResponse","disconnected","reconnected","chatServerWentOffline","chatServerBackOnline","capabilitiesChanged","sleeping","waking","sessionLost"]),C.sleepEnabled&&v.data("sleeping",!1),v.data("sessionActive",y),C&&h){var T="";"pureengage-v3-rest"==h?T="pure-engage-v3-rest-transport":"purecloud-v2-sockets"==h?T="pure-cloud-v2-sockets-transport":"pureconnect-v4-rest"==h?T="pure-connect-v4-rest-transport":"pureconnect-v4-chatbots"==h?T="pure-connect-v4-bots-transport":i.deferred.reject("Invalid transport configuration"),T&&CXBus.loadModule(T).done(function(i){b=new i(C),b.onChatStarted=function(e,t){v.publish("started",e),v.command("App.registerAutoLoad")},b.onPollingStarted=function(){v.publish("pollingStarted")},b.onPollingStopped=function(){v.publish("pollingStopped")},b.onTypingStarted=function(){v.publish("clientTypingStarted")},b.onTypingStopped=function(){v.publish("clientTypingStopped")},b.onAgentConnected=function(e){v.publish("agentConnected",e)},b.onAgentDisconnected=function(e){v.publish("agentDisconnected",e)},b.onAgentTypingStarted=function(e){v.publish("agentTypingStarted",e)},b.onAgentTypingTimeout=function(e){v.publish("agentTypingTimeout",e)},b.onAgentTypingStopped=function(e){v.publish("agentTypingStopped",e)},b.onBotConnected=function(e){v.publish("botConnected",e)},b.onBotDisconnected=function(e){v.publish("botDisconnected",e)},b.onSuperVisorConnected=function(e){v.publish("supervisorConnected",e)},b.onSuperVisorDisconnected=function(e){v.publish("supervisorDisconnected",e)},b.onClientConnected=function(e){v.publish("clientConnected",e)},b.onClientDisconnected=function(e){v.publish("clientDisconnected",e)},b.onSleep=function(){C.sleepEnabled&&v.publish("sleeping")},b.onWake=function(){v.publish("waking")},b.onMessageReceived=function(e){if(e.data){var t=e.data;t.messages instanceof Array&&(t.messages=t.messages.filter(function(e){return a(e.text||"")}).map(function(e){var t=null;return g(e).done(function(e){t=e}),t}),D=D.concat(t.messages)),t.originalMessages instanceof Array&&(t.originalMessages=t.originalMessages.filter(function(e){return a(e.body||e.text||"")}),S=S.concat(t.originalMessages)),t.messages&&t.messages.length>0&&v.publish("messageReceived",{originalMessages:t.originalMessages,messages:t.messages,restoring:t.restoring,sessionData:t.sessionData,oldMessages:t.oldMessages})}},b.onCapabilitiesChanged=function(e){e.async&&(m.async=e.async),e.asyncClose&&(m.asyncClose=e.asyncClose),"boolean"==typeof e.pagination&&(m.pagination=e.pagination),"boolean"==typeof e.fileUpload&&(m.fileUpload=e.fileUpload),v.data("capabilities",m),v.publish("capabilitiesChanged",m)},b.onRestore=function(e){v.publish("restored",e),e&&e.async&&v.data("WebChatService.mode",{async:!0}),b.bSessionActive&&(y=!0,v.data("sessionActive",y)),n()},b.onRestoreFailed=function(o){e(),t(),n(),v.publish("restoreFailed",o)},b.onRestoreTimeout=function(){t(),n(),v.publish("restoreTimeout")},b.onReconnected=function(){v.publish("reconnected")},b.onDisconnected=function(){v.publish("disconnected")},b.onChatServerWentOffline=function(){v.publish("chatServerWentOffline")},b.onChatServerBackOnline=function(){v.publish("chatServerBackOnline")},b.onChatEnded=function(){e(),t(),u(),v.publish("clientDisconnected"),v.publish("ended"),v.command("App.deregisterAutoLoad")},b.onSessionLost=function(n){e(),t(),v.publish("sessionLost",n)},b.onError=function(e){v.publish("error",{errors:[e]})},v.registerCommand("startChat",function(e){y?e.deferred.reject("There is already an active chat session"):(C.sleepEnabled&&v.command("wake"),e.data&&(e.data.userData&&v.data("userData",s.default.extend(!0,v.data("userData"),e.data.userData||{})),e.data.interactionData&&v.data("interactionData",s.default.extend(!0,v.data("interactionData"),e.data.interactionData||{}))),b.startChat(e.data).done(function(t){v.publishDirect("ajaxResponse",t),y=!0,v.data("sessionActive",y),e.deferred.resolve(t)}).fail(function(t){e.deferred.reject(t)}),j=[],x=[])}),v.registerCommand("sendMessage",function(e){w.Interval&&b.onTypingStopped(),clearInterval(w.Interval),w.Interval=!1,w.Timer=0,w.text="",w.IdleCount=0,"string"!=typeof e.data.message||""==(e.data.message+"").trim()?e.deferred.reject("No message text provided"):(C.sleepEnabled&&v.command("wake"),b.sendMessage(e.data).done(function(t){e.deferred.resolve(t)}).fail(function(t){e.deferred.reject(t)}))}),v.registerCommand("endChat",function(e){b.endChat().done(function(t){e.deferred.resolve(t||{})}).fail(function(t){e.deferred.reject(t)}),y=!1,v.data("sessionActive",y)}),v.registerCommand("asyncRestore",function(e){b.asyncRestore().done(function(){y=!0,v.data("sessionActive",y),e.deferred.resolve()}).fail(function(){e.deferred.reject()})}),v.registerCommand("fetchHistory",function(e){b.fetchHistory().done(function(t){e.deferred.resolve(t)}).fail(function(t){e.deferred.reject(t)})}),v.registerCommand("getSessionData",function(e){e.deferred.resolve(b.fetchSessionData())}),v.registerCommand("startPoll",function(e){if(!y)return e.deferred.reject("There is no active chat session"),!1;"function"==typeof b.startPoll?(b.startPoll(),e.deferred.resolve()):e.deferred.reject("This transport doesn't support polling.")}),v.registerCommand("pausePoll",function(e){if(!y)return e.deferred.reject("There is no active chat session"),!1;"function"==typeof b.pausePoll?(b.pausePoll(),e.deferred.resolve()):e.deferred.reject("This transport doesn't support polling.")}),v.registerCommand("stopPoll",function(e){"function"==typeof b.stopPoll?b.stopPoll().done(function(){e.deferred.resolve()}).fail(function(t){e.deferred.reject(t)}):e.deferred.reject("This transport doesn't support polling.")}),v.registerCommand("poll",function(e){e.commander!=v.namespace()&&e.deferred.reject("Access Denied to private command. Only WebChatService is allowed to invoke this command"),"function"==typeof b.poll?b.poll().done(function(){e.deferred.resolve()}).fail(function(t){e.deferred.reject(t)}):e.deferred.reject("This transport doesn't support polling.")}),v.registerCommand("resetPollExceptions",function(e){"function"==typeof b.resetPollExceptions?o(b.resetPollExceptions,e):e.deferred.reject("This transport doesn't support resetPollExceptions command.")}),v.registerCommand("getAgents",function(e){e.deferred.resolve({agents:b.getAgents()})}),v.registerCommand("getTranscript",function(e){var t={messages:y?D:j,originalMessages:y?S:x};e.deferred.resolve(t)}),v.registerCommand("getStats",function(e){var t={agents:b.getAgents()||{},startTime:!1,endTime:!1,duration:!1};D.length>0&&(t.startTime=D[0].timestamp,t.endTime=D[D.length-1].timestamp,t.duration=new Date(t.endTime)-new Date(t.startTime)),e.deferred.resolve(t)}),v.registerCommand("registerPreProcessor",function(e){"function"==typeof e.data.preprocessor&&"function"==typeof p?e.deferred.resolve(p(e.data.preprocessor)):e.deferred.reject("No preprocessor function provided. Type provided was '"+r(e.data.preprocessor)+"'.")}),v.registerCommand("getFileLimits",function(e){"function"==typeof b.getFileLimits?o(b.getFileLimits,e):e.deferred.reject("This transport doesn't support getFileLimits command.")}),v.registerCommand("sendCustomNotice",function(e){"function"==typeof b.sendCustomNotice?o(b.sendCustomNotice,e):e.deferred.reject("This transport doesn't support sendCustomNotice command.")}),v.registerCommand("downloadFile",function(e){"function"==typeof b.downloadFile?o(b.downloadFile,e):e.deferred.reject("This transport doesn't support file download.")}),v.registerCommand("addPrefilter",function(e){if(e.data.filters&&e.data.filters instanceof RegExp)l(e.data.filters),e.deferred.resolve(s.default.extend({},A.custom));else if(e.data.filters&&e.data.filters.length>0&&e.data.filters[0]instanceof RegExp){for(var t=0;t<e.data.filters.length;t++)l(e.data.filters[t]);e.deferred.resolve(s.default.extend({},A.custom))}else e.deferred.reject("Missing or invalid filters provided. Please provide a regular expression or an array of regular expressions")}),v.registerCommand("sendFilteredMessage",function(e){y?(f(e.data.message,e.data.regex),e.deferred.resolve()):e.deferred.reject("No active chat session.")}),v.registerCommand("restore",function(e){var t=e.data&&e.data.sessionData||{};b.restore(t).done(function(t){y=!0,v.data("sessionActive",y),e.deferred.resolve(t)}).fail(function(t){e.deferred.reject(t)})}),v.registerCommand("verifySession",function(e){if(!b.fetchSessionAndRestoringInfo)return void e.deferred.reject("Transport not supported");var t=b.fetchSessionAndRestoringInfo(),n=t.bRestoring,o=t.bSessionValid;n?P.push(e.deferred):o?e.deferred.resolve({sessionActive:!0}):e.deferred.resolve({sessionActive:!1})}),v.registerCommand("sendFile",function(e){b.sendFile(e).done(function(t){e.deferred.resolve(t)}).fail(function(t){e.deferred.reject(t)})}),v.registerCommand("registerTypingPreviewInput",function(e){var t=(0,s.default)(e.data.input);!t||"text"!=t[0].type&&"textarea"!=t[0].type?e.deferred.reject("Invalid value provided for the 'input' property. An HTML element reference to a textarea or text input is required."):(I=(0,s.default)(t),e.deferred.resolve())}),v.registerCommand("updateUserData",function(e){var t=C,n=v.data("userData")||{};v.data("userData",s.default.extend(!0,n,e.data||{})),s.default.extend(!0,t.oUserData,v.data("userData")),y?b.updateUserData(e.data).done(function(t){e.deferred.resolve(t)}).fail(function(t){e.deferred.reject(t)}):e.deferred.resolve(t.oUserData)}),v.registerCommand("updateInteractionData",function(e){var t=C,n=v.data("interactionData")||{};v.data("interactionData",s.default.extend(!0,n,e.data||{})),s.default.extend(!0,t.oInteractionData,v.data("interactionData")),y?b.updateInteractionData(e.data).done(function(t){e.deferred.resolve(t)}).fail(function(t){e.deferred.reject(t)}):e.deferred.resolve(t.oInteractionData)}),v.registerCommand("sendTyping",function(e){var t=w;if(t.Interval)t.Timer=0,e.deferred.resolve();else{var n=e.data,o=!1;n.type="TypingStarted",n.message=n.message||I&&I.val()||"",o=b.sendTyping(n),b.onTypingStarted(),t.Interval=setInterval(function(){t.Timer+=t.TimeInterval,t.Timer>=t.Timeout&&(n.type="TypingStopped",n.message=n.message||I&&I.val()||"",clearInterval(t.Interval),t.Interval=!1,t.Timer=0,o=b.sendTyping(n),b.onTypingStopped())},t.TimeInterval),o.done(function(t){e.deferred.resolve(t)}).fail(function(t){e.deferred.reject(t)})}}),v.registerCommand("sleep",function(e){C.sleepEnabled&&!v.data("sleeping")&&y&&(v.publish("sleeping"),v.data("sleeping",!0),"function"==typeof b.pausePoll&&b.pausePoll()),e.deferred.resolve()}),v.registerCommand("wake",function(e){C.sleepEnabled&&v.data("sleeping")&&y&&(v.publish("waking"),v.data("sleeping",!1),"function"==typeof b.continuePoll&&b.continuePoll()),e.deferred.resolve()}),v.subscribe("App.data.pageFocus",function(e){C.sleepEnabled&&y&&(!1===e.data.value?v.command("sleep"):!0===e.data.value&&v.command("wake"))}),v.subscribe("App.data.pageHidden",function(e){C.sleepEnabled&&y&&(!1===e.data.value?v.command("wake"):!0===e.data.value&&v.command("sleep"))}),v.subscribe("WebChat.closed",function(){j=[],x=[]}),c(),v.ready(),v.republish("ready"),d.resolve()})}return d.promise()}var v="",h="",b={},y=!1,C={sCookie_Prefix:"_genesys.widgets.webchat.state",oUserData:{},oInteractionData:{},sleepEnabled:!1},T=C.sCookie_Prefix+".filters",D=[],S=[],j=[],x=[],A={standard:[/\{start\:[0-9]{9}\}/],custom:[]},I=!1,w={Timer:0,Timeout:2e3,TimeInterval:100,Interval:!1,IdleCount:0,IdleLimit:2,Text:""},E=[],P=[];return{init:function(e){(v=e)&&(v.registerCommand("configure",function(e){if(e.data&&Object.keys(e.data).length){var t=e.data,n="object",o=C;if(r(t.userData)==n&&s.default.extend(o.oUserData,t.userData),"number"==r(t.ajaxTimeout)&&(o.iAjaxTimeout=parseInt(t.ajaxTimeout)),r(t.transport)==n){var a=t.transport;"string"==r(a.type)&&(h=a.type),r(a.interactionData)==n&&(o.oInteractionData=a.interactionData),"boolean"==r(a.sleepEnabled)&&(o.sleepEnabled=a.sleepEnabled),o.transport=a}v.data("userData",o.oUserData),v.data("interactionData",o.oInteractionData),"boolean"==typeof t.enableCustomHeader&&(o.bEnableCustomHeader=t.enableCustomHeader),m(e).done(function(){v.command("asyncRestore")}).fail(function(t){e.deferred.reject(t)}),e.deferred.resolve()}else e.deferred.reject("Invalid configuration")}),v.command("configure",_genesys.widgets.webchat))}}})}},["./webapp/plugins/cx-webchat-service/controllers/transport-controller.js"]);