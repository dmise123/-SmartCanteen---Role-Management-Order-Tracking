const { validate } = require('./utils.js');
const currentTime = new Date().toISOString(); 

function InitServer(io, DB) {
    const connectedSockets = [];

    io.on("connection", function (socket) {
        const user_id = socket.handshake.query.id;
        const existingSocket = connectedSockets.find(
            (s) => s.user.id === user_id
        );
        if (!existingSocket) {
            connectedSockets.push({
                socket,
                user: {
                    id: user_id,
                },
            });
        }

        console.log("User Connected", socket.handshake.query.id);

        socket.on("chat", (message) => {
            io.emit("chat", message);
        });

        function findSocketById(id) {
            return connectedSockets.find(
                (socket) => socket.user.id === id
            );
        }


        // STATUS TOKO BUKA / TUTUP
        socket.on(
            "status_toko",({status}) =>{
                const senderId = socket.handshake.query.id;
                if(status == "buka"){
                    socket.broadcast.emit("terima_status_toko", {
                        status : "buka",
                        id_toko: senderId,
                    });

                }else if (status == "tutup"){
                    socket.broadcast.emit("terima_status_toko", {
                        status : "tutup",
                        id_toko: senderId,
                    });
                }
            }
        );



        // PESAN MAKANAN MAHASISWA -> TOKO
        socket.on(
            "pesan",({pemesan, toko, orders, total, deskripsi, token1, token2, token3, token4}) =>{
                if(validate(pemesan,token2) && validate(toko,token3) && validate(orders,token1) && validate(total,token4)){
                    const dataOrder = JSON.parse(orders);
                    const targetSocket = findSocketById(toko);
                    const query =
                    "INSERT INTO transaksi(total_harga, mahasiswa_id_users, deskripsi, status_pesanan_id_status, created_at, updated_at) VALUES (?,?,?,2,?,?)";
                    DB.query(
                    query,
                    [total, pemesan, deskripsi, currentTime, currentTime],
                    (error, results) => {
                        if (error) {
                            console.error(error.message);
                        } else {
                            const lastOrderId = results.insertId;
                            dataOrder.forEach((order) => {
                                const insertDetailQuery =
                                    "INSERT INTO detail_transaksi(transaksi_id_transaksi, menu_id_menu, kuantitas, sub_total_harga, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
                                DB.query(
                                    insertDetailQuery,
                                    [
                                        lastOrderId,
                                        order["id_menu"],
                                        order["kuantitas"],
                                        order["sub_total_harga"],
                                        currentTime, 
                                        currentTime
                                    ],
                                    (error) => {
                                        if (error) {
                                            console.error(error.message);
                                        } else {
                                            console.log(
                                                "detail transaksi noted"
                                            );
                                        }
                                    }
                                );
                            });

                            if (targetSocket) {
                                console.log(
                                    "TOKO ONLINE! Mengirim Pesanan ke Toko : ",
                                    lastOrderId
                                );
                                targetSocket.socket.emit("pesan_toko", {
                                    pemesan,
                                    lastOrderId,
                                });
                            }
                        }
                    
                    }
                );
            }
        }
        );
    });
}

module.exports = { InitServer };
