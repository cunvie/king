// server.js
const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

app.use(bodyParser.json());

app.post('/send-email', (req, res) => {
    const orderDetails = req.body.orderDetails;

    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'kingcunvie@gmail.com',
            pass: 'Snejanka_9',
        },
    });

    const mailOptions = {
        from: 'kingcunvie@gmail.com',
        to: 'kingcunvie@gmail.com',
        subject: 'Order Confirmation',
        text: `Thank you for your order! Details: ${JSON.stringify(orderDetails)}`,
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error(error);
            res.status(500).json({ error: 'Email sending failed' });
        } else {
            console.log('Email sent:', info.response);
            res.status(200).json({ success: 'Email sent successfully' });
        }
    });
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
