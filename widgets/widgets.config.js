window._genesys.widgets.webchat = {

	apikey: 'n3eNkgLLgLKXREBMYjGm6lygOHHOK8VA',
	dataURL: 'https://api.genesyscloud.com/gms-chat/2/chat',
	userData: {},
	emojis: true,
	uploadsEnabled: false,
	confirmFormCloseEnabled: true,
	actionsMenu: true,
	maxMessageLength: 140,

	autoInvite: {

		enabled: false,
		timeToInviteSeconds: 10,
		inviteTimeoutSeconds: 30
	},

	chatButton: {

		enabled: true,
		template: '<div class="cx-widget cx-webchat-chat-button cx-side-button" role="button" tabindex="0" data-message="ChatButton" data-gcb-service-node="true"><span class="cx-icon" data-icon="chat"></span><span class="i18n cx-chat-button-label" data-message="ChatButton"></span></div>',
		effect: 'fade',
		openDelay: 1000,
		effectDuration: 300,
		hideDuringInvite: true
	},

	async: {

		enabled: true, 
		newMessageRestoreState: 'minimized', 

		getSessionData: function(sessionData, Cookie, CookieOptions) {

			// Note: You don't have to use Cookies. You can, instead, store in a secured location like a database.

			Cookie.set('customer-defined-session-cookie', JSON.stringify(sessionData), CookieOptions);
		},

		setSessionData: function(Open, Cookie, CookieOptions) {

			// Retrieve from your secured location.

			return Cookie.get('customer-defined-session-cookie');
		}
	},

	minimizeOnMobileRestore: false,

	markdown: false,

	ariaIdleAlertIntervals:[50,25,10],

	ariaCharRemainingIntervals:[75, 25, 10]
};