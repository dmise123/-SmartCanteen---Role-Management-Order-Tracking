const config = require('./config.json');

module.exports = {
    database: {
        username: config.database.DB_USERNAME,
        password: config.database.DB_PASSWORD,
        port: config.database.DB_PORT,
        host: config.database.DB_HOST,
        name: config.database.DB_NAME,
    },
    server: {
        ip: config.server.IP,
        port: config.server.PORT,
    },
    token: {
        password: config.token.PASSWORD,
    },
};
