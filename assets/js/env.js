! function i(s, a, u) {
    function c(e, r) {
        if (!a[e]) {
            if (!s[e]) {
                var t = "function" == typeof require && require;
                if (!r && t) return t(e, !0);
                if (f) return f(e, !0);
                var n = new Error("Cannot find module '" + e + "'");
                throw n.code = "MODULE_NOT_FOUND", n
            }
            var o = a[e] = {
                exports: {}
            };
            s[e][0].call(o.exports, function (r) {
                var t = s[e][1][r];
                return c(t || r)
            }, o, o.exports, i, s, a, u)
        }
        return a[e].exports
    }
    for (var f = "function" == typeof require && require, r = 0; r < u.length; r++) c(u[r]);
    return c
}({
    1: [function (r, t, e) {
        "use strict";
        window.env = r("../../../../shared/src/assets/js/lib/env")
    }, {
        "../../../../shared/src/assets/js/lib/env": 2
    }],
    2: [function (r, t, e) {
        "use strict";
        var n = "production",
            o = window.location.hostname.split(".").shift();
        "staging" === o ? n = "staging" : "local" === o ? n = "local" : "qa" === o && (n = "qa"), t.exports = n
    }, {}]
}, {}, [1]);
