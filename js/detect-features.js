function supportsTransitions() {
    var b = document.body || document.documentElement;
    var s = b.style;
    var p = 'transition';
    if(typeof s[p] == 'string') {
        return true;
    }

    // Tests for vendor specific prop
    var v = ['Moz', 'Webkit', 'Khtml', 'O', 'ms'],
    p = p.charAt(0).toUpperCase() + p.substr(1);
    for(var i=0; i<v.length; i++) {
        if(typeof s[v[i] + p] == 'string') {
            return true;
        }
    }
    return false;
}
            
function supportsTransforms() {
    var b = document.body || document.documentElement;
    var s = b.style;
    var p = 'transform';
    if(typeof s[p] == 'string') {
        return true;
    }

    // Tests for vendor specific prop
    var v = ['Moz', 'Webkit', 'Khtml', 'O', 'ms'],
    p = p.charAt(0).toUpperCase() + p.substr(1);
    for(var i=0; i<v.length; i++) {
        if(typeof s[v[i] + p] == 'string') {
            return true;
        }
    }
    return false;
}