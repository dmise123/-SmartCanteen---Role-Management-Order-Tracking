const CryptoJS = require('crypto-js');
const config = require('./config/config.js');

function validate(str, hash) {
    const key = CryptoJS.enc.Utf8.parse(config.token.password);
    const hmac = CryptoJS.HmacSHA256(str, key);
    const calculatedHash = hmac.toString(CryptoJS.enc.Hex);
    return calculatedHash === hash;
}

module.exports = { validate };
