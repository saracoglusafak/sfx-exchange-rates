function sfxexchangerates_extDetect(url) {
    // console.log(url.replace(/.*\.(.*?)/g,'$1'));
    return url.replace(/.*\.(.*?)/g, '$1');
}

function sfxexchangerates_stripTags(str) {
    return str.replace(/(<([^>]+)>)/gi, "");
}

String.prototype.sfxexchangerates_replaceAll = function (str1, str2, ignore) {
    return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g, "\\$&"), (ignore ? "gi" : "g")), (typeof (str2) == "string") ? str2.replace(/\$/g, "$$$$") : str2);
}

function sfxexchangerates_numberFormat(number, fixed, mark) {
    fixed = fixed || 2;
    mark = mark || ".";
    return number.toFixed(fixed).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1' + mark);
}

function sfxexchangerates_serialized(obj, clear) {
    // clear = clear || false;
    // console.log(obj);
    var _return = "";
    for (k in obj) {
        _return += '&' + k + '=' + obj[k];
    }

    if (clear)
        _return = _return.replace(/^\&(.*)$/g, '$1');

    return _return;
}



function sfxexchangerates_unserialize(data) {
    data = data.split('&');
    var response = {};
    for (var k in data) {
        var newData = data[k].split('=');
        response[newData[0]] = newData[1];
    }
    return response;
}



function sfxexchangerates_idGenerate(how, prefix, lower, upper, number) {
    how = how || 39;
    prefix = prefix || "x";

    if (typeof lower == "undefined")
        lower = true;

    if (typeof upper == "undefined")
        upper = true;

    if (typeof number == "undefined")
        number = true;


    // console.log(lower);

    var text = "";
    var possible = "";

    if (lower)
        possible += "abcdefghijklmnopqrstuvwxyz";

    if (upper)
        possible += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    if (number)
        possible += "0123456789";

    // console.log(possible);

    for (var i = 0; i < how; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    return prefix + text;
}