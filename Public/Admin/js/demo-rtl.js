var storage, fail, uid;
try {
    uid = new Date; (storage = window.localStorage).setItem(uid, uid);
    fail = storage.getItem(uid) != uid;
    storage.removeItem(uid);
    fail && (storage = false);
} catch(e) {}
if (storage) {
    try {
        var rtlSupport = localStorage.getItem('config-rtl-layout');
        if (rtlSupport != '' && rtlSupport != null) {
            document.write('<link href="/Sirius/Public/Admin/css/libs/bootstrap-rtl.min.css" type="text/css" rel="stylesheet">');
        }
    } catch(e) {}
}