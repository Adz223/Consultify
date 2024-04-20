        //<![CDATA[
        //function to fix height of iframe!
        var calcHeight = function() {
            var headerDimensions = $('.preview__header').height();
            $('.full-screen-preview__frame').height($(window).height() - headerDimensions);
        }

        $(document).ready(function() {
            calcHeight();
        });

        $(window).resize(function() {
            calcHeight();
        }).load(function() {
            calcHeight();
        });

        
            //<![CDATA[
            var ACCOUNTS = ["m"];
            window.ga = window.ga || function() {
                (ga.q = ga.q || []).push(arguments)
            };
            ga.l = +new Date;
    
            var consentCookie = getCookie('CookieConsent');
    
            if (consentCookie) {
                var hasConsent = Market.Helpers.CookieConsent.given('statistics');
    
                if (hasConsent) {
                    setupGoogleAnalytics();
                    loadGoogleAnalytics();
                    loadClickTracker();
                    loadLinkingForAllAccounts();
                }
            } else {
                setupGoogleAnalytics();
                loadGoogleAnalytics();
                loadClickTracker();
                loadLinkingForAllAccounts();
            }
    
            window.addEventListener('CookiebotOnAccept', handleCookiebotAcceptDeclineEvent, false);
            window.addEventListener('CookiebotOnDecline', handleCookiebotAcceptDeclineEvent, false);
            removeOldExperimentCookies();
            trimGacUaCookies();
            trimGaSessionCookies();
    
            function removeOldExperimentCookies() {
                let cookies = document.cookie.split('; ');
                for (let i in cookies) {
                    let [cookieName, cookieVal] = cookies[i].split('=', 2);
                    if (cookieName.startsWith('market_experiment_')) {
                        $.removeCookie(cookieName, {
                            path: '/',
                            domain: '.' + window.location.host
                        });
                    }
                }
            }
    
            function trimGacUaCookies() {
                // Trim the list of gac cookies and only leave the most recent ones. This
                // prevents rejecting the request later on when the cookie size grows larger
                // than nginx buffers.
                let maxCookies = 15;
                var gacCookies = [];
    
                let cookies = document.cookie.split('; ');
                for (let i in cookies) {
                    let [cookieName, cookieVal] = cookies[i].split('=', 2);
                    if (cookieName.startsWith('_gac_UA')) {
                        gacCookies.push([cookieName, cookieVal]);
                    }
                }
    
                if (gacCookies.length <= maxCookies)
                    return;
    
                gacCookies.sort((a, b) => {
                    return (a[1] > b[1] ? -1 : 1);
                });
    
                for (let i in gacCookies) {
                    if (i < maxCookies) continue;
                    $.removeCookie(gacCookies[i][0], {
                        path: '/',
                        domain: '.' + window.location.host
                    });
                }
            }
    
            function trimGaSessionCookies() {
                // Trim the list of ga session cookies and only leave the most recent ones. This
                // prevents rejecting the request later on when the cookie size grows larger
                // than nginx buffers.
                let maxCookies = 15;
                var gaCookies = [];
    
                let cookies = document.cookie.split('; ');
                for (let i in cookies) {
                    let [cookieName, cookieVal] = cookies[i].split('=', 2);
                    if (cookieName.startsWith('_ga_')) {
                        gaCookies.push([cookieName, cookieVal]);
                    }
                }
    
                if (gaCookies.length <= maxCookies)
                    return;
    
                gaCookies.sort((a, b) => {
                    return (a[1] > b[1] ? -1 : 1);
                });
    
                for (let i in gaCookies) {
                    if (i < maxCookies) continue;
                    $.removeCookie(gaCookies[i][0], {
                        path: '/',
                        domain: '.' + window.location.host
                    });
                }
            }
    
            function handleCookiebotAcceptDeclineEvent() {
                if (Cookiebot.consent.statistics) {
                    if (!(window.ga && ga.create)) {
                        setupGoogleAnalytics();
                        loadGoogleAnalytics();
                        loadClickTracker();
                        loadLinkingForAllAccounts();
                    }
                } else {
                    unloadGoogleAnalytics()
                }
    
                if (!consentToExperimentsEnrollmentGiven()) {
                    unenrollFromExperiments();
                }
            }
    
            function getCookie(name) {
                var name = name + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var cookieContent = decodedCookie.split(';');
    
                for (var i = 0; i < cookieContent.length; i++) {
                    var c = cookieContent[i];
    
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
    
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
    
                return false;
            }
    
            function delete_cookie_by_name(name) {
                document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            }
    
            function unloadGoogleAnalytics() {
                var payload = {
                    "name": "m",
                    "allowLinker": true
                };
                var accountId = "UA-11834194-7";
    
                // Set the GA User Opt-out flag
                window['ga-disable-' + accountId] = true;
    
                // Do not explicitly make any further calls to ga()
                ga(payload.name + ".remove");
    
                // Delete any existing GA cookies (_ga, _gat & _gaid) and GA Client ID from localStorage
                delete_cookie_by_name('_ga');
                delete_cookie_by_name('_gat');
                delete_cookie_by_name('_gid');
    
                // Delete LocalStorage Entries
                if (Market.Helpers.GaLsUtils.localStorageAvailable()) {
                    var clientId = Market.Helpers.GaLsUtils.getClientId();
    
                    if (!clientId) {
                        return;
                    }
    
                    Market.Helpers.GaLsUtils.removeClientId();
                }
    
                // Do not transmit the Client ID to other sites upon navigation (i.e. autoLink)
            }
    
            function domLoaded() {
                return new Promise(resolve => {
                    if (
                        document.readyState === 'interactive' ||
                        document.readyState === 'complete'
                    ) {
                        resolve()
                    } else {
                        document.addEventListener(
                            'DOMContentLoaded',
                            () => {
                                resolve()
                            }, {
                                capture: true,
                                once: true,
                                passive: true
                            }
                        )
                    }
                })
            }
    
            function consentToExperimentsEnrollmentGiven() {
                return Market.Helpers.CookieConsent.given('preferences') && Market.Helpers.CookieConsent.given('statistics');
            }
    
            function unenrollFromExperiments() {
                var experimentCookieNames = [
                    'market_experiments',
                    'mk_ex',
                    'meqc',
                    'meqc2',
                    'meqc3'
                ]
    
                var deletedCookies = [];
    
                _.each(experimentCookieNames, function(cookieName) {
                    if ($.cookie(cookieName)) {
                        $.removeCookie(cookieName, {
                            path: '/',
                            domain: '.' + window.location.host
                        });
                        deletedCookies.push(cookieName);
                    }
                });
                for (var i = 0; i < ACCOUNTS.length; i++) {
                    var t = ACCOUNTS[i];
                    if (deletedCookies.length > 0) {
                        ga(t + '.set', "exp", null);
                        ga(t + '.set', "dimension21", null);
                        ga(t + '.set', "dimension22", null);
                    }
                }
            }
    
            function setExperimentEnrollments(experimentEnrolmentsDataString) {
                for (var i = 0; i < ACCOUNTS.length; i++) {
                    var t = ACCOUNTS[i];
                    var cookieValue = $.cookie('mk_ex');
                    if (cookieValue && cookieValue.replace(/\*/g, '!') === experimentEnrolmentsDataString) {
                        ga(t + '.set', "exp", experimentEnrolmentsDataString);
                        ga(t + '.set', "dimension21", experimentEnrolmentsDataString);
                        ga(t + '.set', "dimension22", experimentEnrolmentsDataString);
                    } else {
                        ga(t + '.set', "exp", null);
                        ga(t + '.set', "dimension21", null);
                        ga(t + '.set', "dimension22", null);
                    }
                }
            }
    
            function loadLinkingForAllAccounts() {
                domLoaded().then(() => {
                    window._envGaTrackerNames = ACCOUNTS;
    
                    for (var i = 0; i < ACCOUNTS.length; i++) {
                        var t = ACCOUNTS[i];
    
                        ga(t + '.require', 'linker');
    
                        ga(t + '.require', 'linkid', 'linkid.js');
                    };
    
                    document.body.addEventListener('click', function(event) {
                        decorateLink(event);
                    });
                    document.body.addEventListener('contextmenu', function(event) {
                        // Aside from a normal click, we need to handle the variety of ways users
                        // can open a link in a new tab
                        // Right click to open context menu
                        decorateLink(event);
                    });
                    document.body.addEventListener('mousedown', function(event) {
                        // Aside from a normal click, we need to handle the variety of ways users
                        // can open a link in a new tab
                        // Middle mouse button click
                        if (event.button === 1) {
                            decorateLink(event);
                        }
                    });
                });
            }
    
            function decorateLink(event) {
    
                window._envGaTrackerNames = ACCOUNTS;
    
                var currentTarget = jQuery(event.target);
                var link = currentTarget.closest('a')[0];
                var ourDomains = ["audiojungle.net", "themeforest.net", "videohive.net", "graphicriver.net", "3docean.net", "codecanyon.net", "photodune.net", "market.styleguide.envato.com", "elements.envato.com", "build.envatohostedservices.com", "author.envato.com", "tutsplus.com", "sites.envato.com", "account.envato.com", "forums.envato.com"];
                var filteredDomains = ourDomains.filter(function(domain) {
                    return domain !== document.location.hostname;
                });
    
                for (var i = 0; i < ACCOUNTS.length; i++) {
                    var t = ACCOUNTS[i];
    
                    if (link && link.href) {
                        if (filteredDomains.includes(link.hostname) || currentSiteLinkOpensInNewWindow(link)) {
                            ga(t + '.linker:decorate', link)
                        }
                    }
                }
            }
    
            function currentSiteLinkOpensInNewWindow(link) {
                return document.location.hostname === link.hostname && link.target === '_blank';
            }
    
            function setupGoogleAnalytics() {
                (function() {
                    var accountId = "UA-11834194-7";
                    window['ga-disable-' + accountId] = false;
    
                    var options = {
                        "name": "m",
                        "allowLinker": true
                    };
    
                    if (Market.Helpers.GaLsUtils.localStorageAvailable()) {
                        if (Market.Helpers.GaLsUtils.clientIdNotPresent()) {
                            options.clientId = Market.Helpers.GaLsUtils.retrieveClientId();
                        }
    
                        ga("create", accountId, options);
                        ga(function() {
                            var tracker = ga.getByName(options.name);
                            Market.Helpers.GaLsUtils.storeClientId(tracker.get('clientId'));
                            for (var i = 0; i < ACCOUNTS.length; i++) {
                                var t = ACCOUNTS[i];
                                ga(t + '.set', 'dimension18', Market.Helpers.GaLsUtils.retrieveClientId())
                            }
                        })
                    } else {
                        ga("create", accountId, options);
                    }
    
                    window._envGaTrackerNames = ACCOUNTS;
    
                    for (var i = 0; i < ACCOUNTS.length; i++) {
                        var t = ACCOUNTS[i];
    
                        ga(t + '.require', "GTM-5VPWWP");
    
                        ga(t + '.require', 'ec');
    
                        ga(t + '.require', 'displayfeatures');
    
                        ga(t + '.set', 'dimension20', 'other')
    
                        var itemPageIdMatch = window.location.pathname.match(/^\/item\/[a-z-]+\/(?:reviews\/)?(\d+)(?:\/comments|\/support)?$/);
                        if (itemPageIdMatch) {
                            // Fetch item ID from path
                            var itemId = itemPageIdMatch[1];
                            ga(t + '.set', 'dimension23', itemId);
                        }
    
    
    
                        if (!getCookie('CookieConsent') || consentToExperimentsEnrollmentGiven()) {
                            var experimentEnrolmentsDataString = ""
                            setExperimentEnrollments(experimentEnrolmentsDataString);
                        }
    
                        if ('') {
                            ga(t + '.send', {
                                hitType: 'pageview',
                                page: ''
                            });
                        } else if ('') {
                            // append the analytics_suffix to the page path so the flash alert/error type can be tracked
                            var analyticsSuffix = $.trim('').replace(/([A-Z])/g, '$1').replace(/[-_\s]+/g, '-').toLowerCase();
                            var url = new URL(window.location.pathname + window.location.search, 'https://localhost');
                            url.pathname += '/' + analyticsSuffix;
                            var tracking_path = url.pathname + url.search;
                            ga(t + '.send', {
                                hitType: 'pageview',
                                page: tracking_path,
                            });
                        } else {
                            ga(t + '.send', 'pageview');
                        }
                    }
    
                    loadLinkingForAllAccounts()
                }());
            }
    
            function loadGoogleAnalytics() {
                (function() {
    
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = 'https://www.google-analytics.com/analytics.js';
                    var x = document.getElementsByTagName('script')[0];
                    x.parentNode.insertBefore(s, x);
                }());
            }
    
            function loadClickTracker() {
                $('body').click(function(e) {
                    sendStandardEvent(e.target, {
                        eventType: 'click'
                    });
                });
            }
    
    
    
            //]]>
    
            //<![CDATA[
    
            if (typeof Cookiebot !== 'undefined' && Cookiebot.consent && Cookiebot.consent.statistics) {
                enableGoogleAnalyticsLinkWrapper();
            } else {
                window.addEventListener('CookiebotOnAccept', function(e) {
                    if (Cookiebot.consent.statistics) {
                        enableGoogleAnalyticsLinkWrapper();
                    }
                }, false);
            }
    
            function enableGoogleAnalyticsLinkWrapper() {
                // GA: universal analytics link wrapper
                (function() {
                    window._envTrkrs = [
                        ["m", "UA-11834194-7"]
                    ];
    
                    var debug = false;
                    var MAX_RETRIES = 10;
    
                    /*
                       The script needs to wait until the Analytics script
                       has been downloaded from Google before initializing
                    */
                    var waitForAnalytics = function() {
                        this.count = this.count || 0;
    
                        if (window.ga && ga.getByName) {
                            e.init();
                        } else {
                            if (count < MAX_RETRIES) {
                                setTimeout(waitForAnalytics, 250);
                            }
                            count++;
                        }
                    };
    
                    var e = {
                        _envArray: [],
                        _envTrkrs: (window._envTrkrsCust && window._envTrkrsCust.length) ? window._envTrkrs.concat(window._envTrkrsCust) : window._envTrkrs,
                        init: function() {
                            for (var i = 0; i < _envTrkrs.length; i++) {
                                var name = _envTrkrs[i][0];
    
                                if (!ga.getByName(name)) {
                                    var accountId = _envTrkrs[i][1];
    
                                    var options = {
                                        name: name,
                                        allowLinker: true,
                                        cookieDomain: "auto",
                                    };
    
                                    if (Market.Helpers.GaLsUtils.localStorageAvailable()) {
                                        if (Market.Helpers.GaLsUtils.clientIdNotPresent()) {
                                            options.clientId = Market.Helpers.GaLsUtils.retrieveClientId();
                                        }
    
                                        ga("create", accountId, options);
                                    } else {
                                        ga("create", accountId, options);
                                    }
                                }
                            }
    
                            document.addEventListener('DOMContentLoaded', function() {
                                e.wrapperInit();
                            });
    
                            if (debug) {
                                console.log('Initiated');
                            }
                        },
                        wrapperInit: function() {
                            if (typeof window._envIsRunning != 'undefined' || window._envIsRunning == true) {
                                return
                            }
                            window._envIsRunning = true;
    
                            if (document.addEventListener) {
                                document.addEventListener('click', function(event) {
                                    var target = event.target;
                                    if (target && target.tagName === 'A') {
                                        e._envLinksTracker(event);
                                    }
                                });
                            }
                        },
                        isInArray: function(e, t) {
                            for (var n = 0; n < t.length; n++) {
                                var r = new RegExp(t[n], 'i');
                                if (r.test(e)) {
                                    return n
                                }
                            }
                            return -1
                        },
                        _envTrackevent: function(e, t, n, r) {
                            for (var i = 0; i < this._envTrkrs.length; i++) {
                                var s = this._envTrkrs[i][0].length == 0 ? '' : this._envTrkrs[i][0] + '.';
                                r.length == 0 ? ga(s + 'send', 'event', e, t, n) : ga(s + 'send', 'event', e, t, n, r)
                            }
                        },
                        _envTrackpageview: function(e, t) {
                            t = t.charAt(0) == '/' ? t : '/' + t;
                            for (var n = 0; n < this._envTrkrs.length; n++) {
                                var r = this._envTrkrs[n][0].length == 0 ? '' : this._envTrkrs[n][0] + '.';
                                ga(r + 'send', 'pageview', e + t);
                            }
                        },
                        _envLinksTracker: function(t) {
                            var r = false;
                            var i = {
                                outbound: {
                                    run: true,
                                    useEvent: true
                                },
                                download: {
                                    run: true,
                                    useEvent: true,
                                    reg: ''
                                },
                                self: {
                                    run: false,
                                    useEvent: true
                                },
                                mail: {
                                    run: true,
                                    useEvent: true
                                },
                                ext: /\.(doc.?|xls.?|ppt.?|exe|zip|rar|gz|tar|tgz|dmg|csv|pdf|xpi|txt|mp3)$/i
                            };
                            var s = t.srcElement ? t.srcElement : this;
                            if (t.srcElement) {
                                r = true
                            }
                            while (s.tagName != 'A') {
                                s = s.parentNode
                            }
                            if (s.href == undefined || s.href == null) {
                                return true
                            }
                            var o = s.href;
                            if (o.length == 0) return;
                            var u = s.hostname.toLowerCase();
                            var a = s.pathname;
                            if (a.length == 0) {
                                a = '/'
                            } else if (a.substr(0, 1) != '/') {
                                a = '/' + a
                            }
                            var f = s.protocol;
                            var l = s.search;
                            var c = location.hostname;
                            c = c.replace(/^www\./i, '').toLowerCase();
                            u = u.replace(/^www\./i, '').toLowerCase();
                            if (o.match(/^#/)) {
                                if (i.self.run) {
                                    i.self.useEvent ? e._envTrackevent('self', 'click - ' + c, o, '') : e._envTrackpageview('/virtual/self', '/' + o);
                                    return true
                                }
                            } else if (f.match(/^mailto:/i)) {
                                if (i.mail.run) {
                                    o = o.replace(/^mailto:/i, '');
                                    i.mail.useEvent ? e._envTrackevent('mailto', 'click - ' + c, o, '') : e._envTrackpageview('/virtual/mailto', o);
                                    return true
                                }
                            } else if ((new RegExp(i.ext)).test(a)) {
                                if (i.download.run) {
                                    o = o.replace(/^https?:\/\//i, '');
                                    i.download.useEvent ? e._envTrackevent('download', 'click - ' + c, o, '') : e._envTrackpageview('/virtual/download', o);
                                    return true
                                }
                            } else if (u == undefined || u.length == 0 || f.match(/^javascript:/i)) {
                                return
                            } else if ((new RegExp(c + '$', 'i')).test(u) || (new RegExp(u + '$', 'i')).test(c)) {
                                if (i.download.run && i.download.reg.length != 0) {
                                    if ((new RegExp(i.download.reg, 'i')).test(a + l)) {
                                        o = o.replace(/^https?:\/\//i, '');
                                        i.download.useEvent ? e._envTrackevent('download', 'click - ' + c, o, '') : e._envTrackpageview('/virtual/download', o);
                                        return true
                                    }
                                }
                            } else if (u != c) {
                                if (e.isInArray(u, e._envArray) == -1) {
                                    if (i.outbound.run) {
                                        i.outbound.useEvent ? e._envTrackevent('outbound', 'click - ' + c, u + a + l, '') : e._envTrackpageview('/virtual/outbound', u + a);
                                        return true
                                    }
                                } else if (e.isInArray(u, e._envArray) != -1) {
                                    var h = s.target;
                                    if (h != null && h == '_blank') {
                                        if ((new RegExp(/_utma=/)).test(l)) {
                                            return true
                                        }
                                        var p = e._envTrkrs[0][0].length == 0 ? '' : _envTrkrs[0][0] + '.';
                                        return true
                                    } else {
                                        return false
                                    }
                                }
                            }
                        }
                    };
    
                    waitForAnalytics();
                })()
            }
    
            //]]>
    
    
            //<![CDATA[
            // Set Datadog custom attributes
            (function() {
                if (typeof window.datadog_attributes != 'object')
                    window.datadog_attributes = {}
                window.datadog_attributes['pageType'] = 'other'
    
                // Log experiment enrolment
                var experiment_data_string = "" + "!"
                window.datadog_attributes['experiments'] = experiment_data_string
            })()
    
            //]]>